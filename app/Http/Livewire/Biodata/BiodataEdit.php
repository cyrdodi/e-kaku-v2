<?php

namespace App\Http\Livewire\Biodata;

use Filament\Forms;
use App\Models\Agama;
use App\Models\Biodata;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Livewire\Component;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\StatusPerkawinan;
use App\Models\PendidikanTerakhir;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Blade;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Forms\Concerns\InteractsWithForms;

class BiodataEdit extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data;

    public Biodata $biodata;

    public function mount()
    {
        $this->form->fill($this->biodata->toArray());
    }

    public function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\Wizard::make([
                    Forms\Components\Wizard\Step::make('Informasi Pribadi')
                        ->schema([
                            Forms\Components\TextInput::make('nik')
                                ->label('NIK')
                                ->minLength(16)
                                ->numeric()
                                ->required(),

                            Forms\Components\TextInput::make('name')
                                ->label('Nama Lengkap')
                                ->required(),

                            Forms\Components\TextInput::make('tempat_lahir')
                                ->label('Tempat Lahir')
                                ->required(),

                            Forms\Components\Grid::make()
                                ->schema([
                                    Forms\Components\DatePicker::make('tanggal_lahir')
                                        ->label('Tanggal Lahir')
                                        ->required(),

                                    Forms\Components\Select::make('jenis_kelamin')
                                        ->label('Jenis Kelamin')
                                        ->options(['l' => 'Laki-laki', 'p' => 'Perempuan'])
                                        ->required(),
                                ]),



                            Forms\Components\Section::make('Alamat')
                                ->schema([
                                    Forms\Components\Textarea::make('alamat')
                                        ->label('Alamat')
                                        ->required(),
                                    Forms\Components\Grid::make()
                                        ->schema([
                                            Forms\Components\TextInput::make('provinsi')
                                                ->label('Provinsi')
                                                ->default('Banten')
                                                ->readOnly()
                                                ->required(),

                                            Forms\Components\TextInput::make('kabupaten')
                                                ->label('Kabupaten')
                                                ->default('Pandeglang')
                                                ->readOnly()
                                                ->required(),

                                            Forms\Components\Select::make('kecamatan_id')
                                                ->label('Kecamatan')
                                                ->options(Kecamatan::all()->sortBy('name')->pluck('name', 'id'))
                                                ->searchable()
                                                ->required()
                                                ->live(onBlur: true)
                                                ->afterStateUpdated(function (Set $set) {
                                                    $set('kelurahan_id', null);
                                                    $set('kode_pos', null);
                                                }),

                                            Forms\Components\Select::make('kelurahan_id')
                                                ->label('Desa/Kelurahan')
                                                ->options(fn (Get $get) =>  Kelurahan::where('kecamatan_id', $get('kecamatan_id'))->pluck('name', 'id'))
                                                ->afterStateUpdated(function (Set $set, $state) {
                                                    $kodepos = Kelurahan::where('id', $state)->first();
                                                    return $set('kode_pos', $kodepos->kodepos);
                                                })
                                                ->searchable()
                                                ->required()
                                                ->live(onBlur: true),

                                            Forms\Components\TextInput::make('kode_pos')
                                                ->label('Kode Pos')
                                                ->required(),

                                            Forms\Components\TextInput::make('rtrw')
                                                ->label('RT/RW')
                                                ->required(),

                                        ]),

                                ]),


                        ]),

                    Forms\Components\Wizard\Step::make('Informasi Lanjutan')
                        ->schema([
                            Forms\Components\TextInput::make('no_hp')
                                ->label('No. Handphone')
                                ->required(),

                            Forms\Components\TextInput::make('email')
                                ->label('Email')
                                ->email()
                                ->required(),

                            Forms\Components\Select::make('agama_id')
                                ->options(Agama::all()->pluck('name', 'id'))
                                ->label('Agama')
                                ->required(),

                            Forms\Components\Select::make('status_perkawinan_id')
                                ->options(StatusPerkawinan::where('is_active', true)->pluck('name', 'id'))
                                ->label('Status Perkawinan')
                                ->required(),

                            Forms\Components\Grid::make()
                                ->schema([
                                    Forms\Components\TextInput::make('tinggi_badan')
                                        ->label('Tinggi Badan (cm)')
                                        ->numeric()
                                        ->required(),

                                    Forms\Components\TextInput::make('berat_badan')
                                        ->label('Berat Badan (kg)')
                                        ->numeric()
                                        ->required()
                                ]),

                            Forms\Components\Select::make('disabilitas')
                                ->label('Apakah anda penyandang disabilitas?')
                                ->options([0 => 'Tidak', 1 => 'Ya'])
                                ->required(),
                        ]),

                    Forms\Components\Wizard\Step::make('Pendidikan  & Pengalaman')
                        ->schema([
                            Forms\Components\Grid::make()
                                ->schema([
                                    Forms\Components\Select::make('pendidikan_terakhir_id')
                                        ->options(PendidikanTerakhir::all()->pluck('name', 'id'))
                                        ->label('Pendidikan Terakhir')
                                        ->required(),

                                    Forms\Components\TextInput::make('tahun_lulus')
                                        ->required()
                                        ->numeric(),

                                    Forms\Components\TextInput::make('institusi_pendidikan')
                                        ->required(),

                                    Forms\Components\TextInput::make('jurusan')
                                        ->required(),

                                    Forms\Components\Textarea::make('keterampilan'),

                                    Forms\Components\Textarea::make('pengalaman'),

                                    Forms\Components\TextInput::make('tujuan_lamaran')
                                        ->label('Tempat/Tujuan Melamar'),

                                ])
                        ]),

                    Forms\Components\Wizard\Step::make('Berkas')
                        ->schema([
                            Forms\Components\FileUpload::make('pas_foto_path')
                                ->directory('berkas')
                                ->storeFileNamesIn('pas_foto'),

                            Forms\Components\FileUpload::make('ktp_path')
                                ->directory('berkas')
                                ->storeFileNamesIn('ktp'),

                            Forms\Components\FileUpload::make('ijazah_path')
                                ->directory('berkas')
                                ->storeFileNamesIn('ijazah'),

                            Forms\Components\FileUpload::make('sertifikat_path')
                                ->directory('berkas')
                                ->storeFileNamesIn('sertifikat'),
                        ])

                ])
                    ->persistStepInQueryString()
                    ->submitAction(new HtmlString(Blade::render(<<<BLADE
                        <x-filament::button
                            type="submit"
                        >
                            Update
                        </x-filament::button>
                    BLADE)))

            ])
            ->statePath('data');
    }

    public function submit()
    {

        try {
            $this->biodata->update($this->form->getState());
            Notification::make()
                ->title('Update berhasil')
                ->success()
                ->send();

            return redirect()->route('dashboardShow', ['biodata' => $this->biodata]);
        } catch (\Exception $e) {
            Notification::make()
                ->title('Update gagal')
                ->body(env('APP_ENV') === 'production' ? $e->getCode() : $e->getMessage())
                ->danger()
                ->send();
        }
    }

    public function render()
    {
        return view('livewire.biodata.biodata-edit');
    }
}
