# Laporan Audit Keamanan — E-Kaku v2

> **Tanggal Audit:** 22 Mei 2026
> **Target:** E-Kaku v2 (Laravel 11 — Sistem Biodata & Job Placement Disnakertrans Pandeglang)
> **Tingkat Keparahan:** Menggunakan skala **Critical / High / Medium / Low / Informational**

---

## Daftar Temuan

| # | Temuan | Severity | Status |
|---|--------|----------|--------|
| 1 | `APP_DEBUG=true` pada environment aktif | **Critical** | ❌ Terbuka |
| 2 | `APP_KEY` terekspos di `.env` | **Critical** | ❌ Terbuka |
| 3 | Credential database plaintext & lemah | **Critical** | ❌ Terbuka |
| 4 | CORS terlalu permisif (`*`) | **High** | ❌ Terbuka |
| 5 | Tidak ada security headers (CSP, HSTS, XFO, dll) | **High** | ❌ Terbuka |
| 6 | Session encryption tidak aktif | **High** | ❌ Terbuka |
| 7 | Mass assignment protection dimatikan total (`$guarded = []`) | **High** | ❌ Terbuka |
| 8 | Route `/test` tanpa proteksi autentikasi | **High** | ❌ Terbuka |
| 9 | Clockwork (debug toolbar) ada di dependency production | **Medium** | ❌ Terbuka |
| 10 | Tidak ada aturan kompleksitas password | **Medium** | ❌ Terbuka |
| 11 | File upload tanpa validasi tipe file ketat | **Medium** | ❌ Terbuka |
| 12 | Session driver menggunakan file (bukan database/redis) | **Medium** | ❌ Terbuka |
| 13 | Remember Me diaktifkan tanpa mitigasi | **Medium** | ❌ Terbuka |
| 14 | HTTPS tidak dienforce (`SESSION_SECURE_COOKIE` tidak diset) | **High** | ❌ Terbuka |
| 15 | Tidak ada rate limiting global | **Medium** | ❌ Terbuka |
| 16 | Email verification tidak diaktifkan (opsional) | **Low** | ❌ Terbuka |
| 17 | Authorization check tidak eksplisit di controller method | **Low** | ❌ Terbuka |
| 18 | Param `$bulan`/`$tahun` pada export tidak divalidasi ketat | **Low** | ❌ Terbuka |

---

## Temuan Detail & Solusi

### 1. `APP_DEBUG=true` pada Environment Aktif  — **Critical**

**Deskripsi:** File `.env` memiliki `APP_DEBUG=true`. Jika ini digunakan di production, error detail (stack trace, query, variable) akan ditampilkan ke pengguna — membocorkan struktur aplikasi, credential, dan path absolut server.

**Solusi:**

```env
APP_DEBUG=false
APP_ENV=production
```

Tambahkan pengecekan di `AppServiceProvider` atau `.env` untuk memastikan debug mode mati di production.

---

### 2. `APP_KEY` Terekspos  — **Critical**

**Deskripsi:** `APP_KEY=base64:uYCHNpFJ8kp4lTQ1ErByMzmsFlBofK8EZd2+aqxfgAc=` terlihat jelas di `.env`. Key ini digunakan untuk enkripsi session, cookie, dan data terenkripsi lainnya. Jika bocor, attacker bisa mendekripsi session dan cookie.

**Solusi:**
1. Rotate key segera:
   ```bash
   php artisan key:generate
   ```
2. Semua session yang ada akan invalid — rencanakan downtime.
3. Jangan pernah menyimpan APP_KEY di repository atau berbagi di channel tidak aman.

---

### 3. Credential Database Plaintext & Lemah  — **Critical**

**Deskripsi:** `DB_PASSWORD=password` — password database adalah kata sandi paling umum dan lemah.

**Solusi:**

```env
DB_PASSWORD=<strong-random-password-min-32-char>
```

Gunakan generator password (contoh: `openssl rand -base64 32`). Untuk production, gunakan secrets management atau setidaknya environment variable terpisah.

---

### 4. CORS Terlalu Permisif  — **High**

**Lokasi:** `config/cors.php`

**Deskripsi:** `allowed_origins = ['*']`, `allowed_methods = ['*']`, `allowed_headers = ['*']`. Ini memungkinkan domain manapun mengirim request ke aplikasi.

**Solusi:** Batasi origin ke domain spesifik:

```php
'allowed_origins' => [env('APP_URL', 'https://example.com')],
'supports_credentials' => true, // jika pakai session-based auth
```

---

### 5. Tidak Ada Security Headers  — **High**

**Deskripsi:** Aplikasi tidak mengirimkan header keamanan standar seperti CSP, X-Frame-Options, HSTS, X-Content-Type-Options, Referrer-Policy, Permissions-Policy.

**Solusi:** Buat middleware baru dan daftarkan ke kernel.

<details>
<summary>Click to expand code</summary>

```php
<?php
// app/Http/Middleware/SecurityHeaders.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-Frame-Options', 'DENY');
        $response->headers->set('X-XSS-Protection', '0');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->headers->set('Permissions-Policy', 'geolocation=(), microphone=(), camera=()');
        $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');

        // Content-Security-Policy — sesuaikan dengan kebutuhan
        $csp = "default-src 'self'; script-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net; style-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net; img-src 'self' data:; font-src 'self'; form-action 'self'; frame-ancestors 'none'";
        $response->headers->set('Content-Security-Policy', $csp);

        return $response;
    }
}
```

Daftarkan di `bootstrap/app.php`:

```php
->withMiddleware(function (Middleware $middleware) {
    $middleware->append(\App\Http\Middleware\SecurityHeaders::class);
})
```

</details>

---

### 6. Session Encryption Tidak Aktif  — **High**

**Lokasi:** `config/session.php`

**Deskripsi:** `'encrypt' => false` — session tidak dienkripsi. Nilai session bisa dibaca jika attacker mendapatkan akses ke file session.

**Solusi:**

```php
'encrypt' => true,
```

---

### 7. Mass Assignment Protection Dimatikan Total  — **High**

**Lokasi:** Semua model (`app/Models/*.php`)

**Deskripsi:** Semua model memiliki `protected $guarded = []` yang berarti **semua kolom** bisa diisi massal melalui `Model::create($request->all())`. Ini adalah celah **Mass Assignment** klasik.

**Solusi:** Ganti `$guarded = []` dengan `$fillable` yang eksplisit di setiap model:

```php
// sebelum
protected $guarded = [];

// sesudah — contoh model User
protected $fillable = [
    'name', 'email', 'password', 'is_active',
];
```

> **Catatan:** `is_admin` TIDAK boleh ada di `$fillable` untuk mencegah user meng-escalate role sendiri.

---

### 8. Route `/test` Tanpa Proteksi  — **High**

**Lokasi:** `routes/web.php` — route `GET /test`

**Deskripsi:** Route `/test` memanggil `BiodataController@test` tanpa middleware `auth` atau `guest`. Informasi apa yang di-generate perlu diperiksa, karena bisa membocorkan data sensitif.

**Solusi:**
- Hapus jika tidak diperlukan.
- Atau beri middleware `auth` + `admin`.
- Atau beri rate limiting ketat.

---

### 9. Clockwork di Dependency Production  — **Medium**

**Deskripsi:** Package `itsgoingd/clockwork` ada di `require` (bukan `require-dev`) di `composer.json`. Clockwork adalah debug toolbar yang bisa mengekspos informasi query, log, request, dll.

**Solusi:** Pindahkan ke `require-dev`:

```json
"require-dev": {
    "itsgoingd/clockwork": "^5.2"
}
```

Kemudian jalankan `composer remove --dev itsgoingd/clockwork && composer require --dev itsgoingd/clockwork` atau edit manual file `composer.json`.

---

### 10. Tidak Ada Aturan Kompleksitas Password  — **Medium**

**Lokasi:** Validasi password di `RegisterUser` dan `LoginRequest`

**Deskripsi:** Hanya menggunakan `Rules\Password::defaults()` tanpa kustomisasi.

**Solusi:** Tambahkan aturan minimal:

```php
use Illuminate\Validation\Rules\Password;

// Di Form Request atau Controller
'password' => [
    'required',
    'confirmed',
    Password::min(8)
        ->mixedCase()
        ->letters()
        ->numbers()
        ->symbols()
        ->uncompromised(),
],
```

---

### 11. File Upload Tanpa Validasi Ketat  — **Medium**

**Lokasi:** Upload biodata (pas_foto, ktp, ijazah, sertifikat)

**Deskripsi:** Tidak ada validasi tipe file ketat selain MIME type dasar. Berpotensi upload file berbahaya (PHP shell, dll).

**Solusi:**

```php
// Contoh validasi di Form Request
'pas_foto' => [
    'required',
    'image',
    'mimes:jpeg,png,jpg',
    'max:2048',
    'dimensions:min_width=200,min_height=200,max_width=2000,max_height=2000',
],
```

Dan pastikan folder storage tidak mengeksekusi PHP:

```apache
# Di public/storage/.htaccess
<FilesMatch "\.php$">
    Deny from all
</FilesMatch>
```

---

### 12. Session Driver Menggunakan File  — **Medium**

**Lokasi:** `config/session.php`

**Deskripsi:** `'driver' => env('SESSION_DRIVER', 'file')` — di lingkungan production dengan banyak user, file session tidak scalable dan rawan kebocoran.

**Solusi:** Gunakan database atau Redis:

```env
SESSION_DRIVER=database
# atau
SESSION_DRIVER=redis
```

Jika memilih database, jalankan:
```bash
php artisan session:table
php artisan migrate
```

---

### 13. Remember Me Diaktifkan Tanpa Mitigasi  — **Medium**

**Deskripsi:** Fitur Remember Me menghasilkan token persistensi di tabel `users`. Aman jika dienkripsi, tetapi tetap ada risiko jika token bocor.

**Solusi:**
1. Tambahkan opsi untuk menonaktifkan remember me di admin panel.
2. Pastikan `encrypt` session = `true` (sudah ada di rekomendasi #6).
3. Implementasi logout dari semua perangkat:

```php
// Saat password diubah — invalidate all sessions
Auth::logoutOtherDevices($currentPassword);
```

---

### 14. HTTPS Tidak Di-enforce  — **High**

**Deskripsi:** `SESSION_SECURE_COOKIE` tidak diset di `.env`, artinya session cookie bisa dikirim melalui koneksi HTTP (plaintext).

**Solusi:**

```env
SESSION_SECURE_COOKIE=true
```

Dan di production, redirect HTTP ke HTTPS via `.htaccess`:

```apache
RewriteEngine On
RewriteCond %{HTTPS} off
RewriteRule ^(.*)$ https://%{HTTP_HOST}/$1 [R=301,L]
```

---

### 15. Tidak Ada Rate Limiting Global  — **Medium**

**Lokasi:** Hanya ada rate limiting di login (5 attempt/menit) dan API (60/menit).

**Deskripsi:** Endpoint lain (registrasi, form biodata) tidak dilindungi dari brute force atau DoS.

**Solusi:** Tambahkan throttle middleware ke route group:

```php
// Di routes/web.php
Route::middleware(['throttle:10,1'])->group(function () {
    Route::post('/register', [RegisteredUserController::class, 'store']);
    Route::post('/biodata/create', [BiodataController::class, 'store']);
    // ... form submission lainnya
});
```

---

### 16. Email Verification Tidak Diaktifkan  — **Low**

**Lokasi:** `app/Models/User.php`

**Deskripsi:** User model tidak mengimplementasikan `MustVerifyEmail`. User bisa langsung login tanpa verifikasi email.

**Solusi:**

```php
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    // ...
}
```

---

### 17. Authorization Tidak Eksplisit di Controller  — **Low**

**Deskripsi:** Method seperti `DashboardController@show`, `@edit`, `@create` tidak memiliki `$this->authorize()` atau `Gate::check()`. Proteksi hanya dari route middleware (kurang defense-in-depth).

**Solusi:** Tambahkan authorize call di method controller:

```php
public function edit(Biodata $biodata)
{
    $this->authorize('update', $biodata);
    // ...
}
```

---

### 18. Parameter Export Tidak Divalidasi Ketat  — **Low**

**Lokasi:** `routes/web.php` — `GET /report/export/{bulan}/{tahun}`

**Deskripsi:** Parameter `$bulan` dan `$tahun` tidak divalidasi formatnya secara ketat.

**Solusi:** Gunakan route pattern atau validasi di controller:

```php
// Di RouteServiceProvider atau routes/web.php
Route::pattern('bulan', '0[1-9]|1[0-2]');
Route::pattern('tahun', '20[2-9][0-9]');
```

---

## Ringkasan Prioritas Tindakan

| Prioritas | Tindakan | Temuan # |
|-----------|----------|----------|
| 🔴 **Segera (1-2 hari)** | Matikan APP_DEBUG, rotate APP_KEY, ganti DB password | #1, #2, #3 |
| 🔴 **Segera (1-2 hari)** | Tambah security headers & enforce HTTPS | #5, #14 |
| 🟠 **Cepat (1 minggu)** | Batasi CORS, aktifkan session encryption | #4, #6 |
| 🟠 **Cepat (1 minggu)** | Perbaiki mass assignment ($fillable) | #7 |
| 🟠 **Cepat (1 minggu)** | Proteksi route /test & tambah rate limiting | #8, #15 |
| 🟡 **Sedang (2 minggu)** | Pindahkan Clockwork ke dev, tambah kompleksitas password | #9, #10 |
| 🟡 **Sedang (2 minggu)** | Validasi upload file, ganti session driver | #11, #12 |
| 🔵 **Rendah** | Aktifkan email verify, authorize controller, validasi parameter | #16, #17, #18 |

---

## Checklist Remediasi

- [ ] Set `APP_DEBUG=false` dan `APP_ENV=production` di `.env`
- [ ] Rotate `APP_KEY` dengan `php artisan key:generate`
- [ ] Ganti `DB_PASSWORD` dengan strong password
- [ ] Buat & daftarkan `SecurityHeaders` middleware
- [ ] Set `SESSION_SECURE_COOKIE=true` dan redirect HTTP→HTTPS
- [ ] Perbaiki `config/cors.php` — batasi origin
- [ ] Set `'encrypt' => true` di `config/session.php`
- [ ] Ubah semua model — ganti `$guarded = []` dengan `$fillable`
- [ ] Proteksi route `/test` (hapus atau beri middleware)
- [ ] Pindahkan `clockwork` ke `require-dev`
- [ ] Tambah aturan kompleksitas password
- [ ] Tambah validasi tipe file untuk upload
- [ ] Migrasi session ke database/redis
- [ ] Tambah throttle middleware ke form submissions
- [ ] Implementasikan `MustVerifyEmail` di User model
- [ ] Tambah `$this->authorize()` di controller methods
- [ ] Tambah route pattern untuk parameter export

---

## Tools yang Bisa Digunakan untuk Audit Lanjutan

| Tool | Kegunaan |
|------|----------|
| [Laravel Security Checker](https://github.com/facade/ignition) | Deteksi dependency dengan CVE |
| `composer audit` | Cek vulnerability di dependency |
| [OWASP ZAP](https://www.zaproxy.org/) | Automated security scanning |
| [Laravel Pulse](https://laravel.com/docs/11/pulse) | Monitoring production (opsional) |
| [Laravel Pennant](https://laravel.com/docs/11/pennant) | Feature flags untuk rollback cepat |

---

*Audit dilakukan secara statis terhadap kode dan konfigurasi. Beberapa celah mungkin hanya terdeteksi melalui penetration testing langsung terhadap instance production.*
