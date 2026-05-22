# Dokumentasi Migrasi & Enkripsi Data Biodata (NIK, No. HP, & Email)

Dokumen ini memandu tim developer mengenai arsitektur, perubahan skema, enkripsi data otomatis menggunakan **Eloquent Encrypted Casts**, serta prosedur migrasi data existing berskala besar pada aplikasi **E-Kaku v2**.

---

## 1. Latar Belakang & Konsep Keamanan

Untuk mematuhi standar privasi data dan melindungi informasi sensitif pendaftar, kolom-kolom berikut dalam tabel `biodata` telah dilindungi menggunakan algoritma enkripsi **AES-256-CBC**:
* **NIK** (Nomor Induk Kependudukan)
* **No. HP** (Nomor Telepon Seluler)
* **Email** (Alamat Surat Elektronik)

### Cara Kerja Enkripsi
Laravel memanfaatkan native `Encrypter` dengan kunci enkripsi aplikasi (`APP_KEY` di file `.env`). 
Setiap kali data disimpan ke database, Laravel otomatis mengenkripsi string plain-text menjadi string terenkripsi base64 JSON payload. Sebaliknya, saat data dipanggil dari database, Laravel secara otomatis mendekripsinya kembali menjadi plain-text secara transparan tanpa perlu modifikasi manual pada controller atau view.

---

## 2. Perubahan Skema Database (Migration)

Payload hasil enkripsi AES-256 berukuran jauh lebih besar daripada data teks aslinya karena mengandung cipher-text raw, initialization vector (IV), dan signature HMAC. Oleh karena itu, tipe kolom harus diubah dari `VARCHAR(255)` menjadi `TEXT`.

File migrasi yang dibuat: `database/migrations/2026_05_22_175046_change_biodata_columns_to_text.php`

### Definisi Skema Migrasi:
```php
public function up(): void
{
    Schema::table('biodata', function (Blueprint $table) {
        $table->text('nik')->change();
        $table->text('no_hp')->change();
        $table->text('email')->change();
    });
}

public function down(): void
{
    Schema::table('biodata', function (Blueprint $table) {
        $table->string('nik')->change();
        $table->string('no_hp')->change();
        $table->string('email')->change();
    });
}
```

---

## 3. Konfigurasi Casts di Model Eloquent

Enkripsi diaktifkan secara native di model `app/Models/Biodata.php` dengan mendefinisikan casting `'encrypted'`:

```php
protected function casts(): array
{
    return [
        'nik' => 'encrypted',
        'no_hp' => 'encrypted',
        'email' => 'encrypted',
    ];
}
```

---

## 4. Migrasi & Enkripsi Data Existing (23.000+ Records)

Jika database production atau local Anda sudah memiliki data lama berformat plain-text, mengakses data tersebut akan memicu error `DecryptException: The payload is invalid` karena Laravel gagal mendekripsi string biasa.

Untuk mengatasi ini, kami membuat command Artisan khusus yang dapat dijalankan secara aman di backend:
```bash
php artisan biodata:encrypt-existing
```

### Keunggulan Command Kustom Ini:
1. **Bypass Eloquent Model Casts:** Menggunakan query builder direct SQL (`DB::table(...)`) agar proses load data lama tidak memicu error dekripsi saat booting model.
2. **Chunking Data (Memory-Safe):** Data diproses secara bertahap dalam **chunk berukuran 500 records** (`chunk(500)`) agar konsumsi RAM tetap ringan meskipun database memiliki puluhan ribu records.
3. **Idempotent (Aman Dijalankan Berulang):** Sistem otomatis mendeteksi apakah data di kolom tersebut *sudah terenkripsi* atau *masih plain-text*. Hanya data plain-text saja yang akan dienkripsi ulang.

Implementasi lengkap di: `app/Console/Commands/EncryptExistingBiodata.php`

---

## 5. Dampak pada Fitur Pencarian & Solusinya

> [!WARNING]
> **Keterbatasan Pencarian Database Terenkripsi:**
> Database SQL tidak dapat melakukan pencarian `LIKE` secara langsung pada kolom terenkripsi AES-256 (karena nilainya telah berubah menjadi random bytes di level DB).

### Penyesuaian Query Dashboard Admin
* **Pencarian Nama Saja:** Logika pencarian di `app/Http/Livewire/Dashboard/ListKartuPencariKerja.php` telah disederhanakan untuk memfilter berdasarkan kolom `name` saja guna menjaga kecepatan pagination database:
  ```php
  $biodata = Biodata::with('pendidikanTerakhir', 'kecamatan')
      ->whereYear('created_at', $this->year)
      ->when(!empty($this->search), function ($query) {
          return $query->where('name', 'like', '%' . $this->search . '%');
      })
      ->orderBy('id', 'desc')
      ->paginate(10);
  ```

### Penyelarasan Reaktivitas Input Livewire v3
Sejak upgrade ke Livewire v3, binding default `wire:model` bersifat deferred (ditunda). Agar pencarian langsung memfilter tabel secara real-time saat diketik, view `resources/views/livewire/dashboard/list-kartu-pencari-kerja.blade.php` disesuaikan sebagai berikut:
* **Kolom Input Pencarian:** `wire:model.live.debounce.150ms="search"`
* **Dropdown Filter Tahun:** `wire:model.live="year"`

---

## 6. Prosedur Deploy ke Staging / Production

Saat melakukan rilis (deployment) fitur enkripsi ini ke server server production, ikuti langkah-langkah berikut secara berurutan:

1. **Jalankan Migrasi Database:**
   ```bash
   php artisan migrate
   ```
   *(Mengubah kolom NIK, No HP, & Email menjadi TEXT)*

2. **Jalankan Migrasi Data Existing:**
   ```bash
   php artisan biodata:encrypt-existing
   ```
   *(Mengenkripsi data lama pendaftar secara otomatis & aman)*

3. **Bersihkan Cache Cache Aplikasi:**
   ```bash
   php artisan optimize:clear
   ```
