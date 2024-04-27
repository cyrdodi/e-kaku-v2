<?php

namespace App\Http\Livewire\Biodata;

use Filament\Forms;
use App\Models\Agama;
use Livewire\Component;
use App\Models\Kecamatan;
use App\Models\PendidikanTerakhir;
use App\Models\StatusPerkawinan;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;

class BiodataCreate extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data;

    public function mount()
    {
        $this->form->fill();
    }

    public function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([

                Forms\Components\Grid::make([])
                    ->columns(2)
                    ->schema([
                        Forms\Components\Section::make('Informasi Pribadi')
                            ->columnSpan(1)
                            ->schema([
                                Forms\Components\TextInput::make('nik')
                                    ->label('NIK')
                                    ->minLength(16)
                                    ->required(),

                                Forms\Components\TextInput::make('name')
                                    ->label('Nama Lengkap')
                                    ->required(),

                                Forms\Components\TextInput::make('birth_place')
                                    ->label('Tempat Lahir')
                                    ->required(),

                                Forms\Components\Grid::make()
                                    ->schema([
                                        Forms\Components\DatePicker::make('birthday')
                                            ->label('Tanggal Lahir')
                                            ->required(),

                                        Forms\Components\Select::make('sex')
                                            ->label('Jenis Kelamin')
                                            ->options(['l' => 'Laki-laki', 'p' => 'Perempuan'])
                                            ->required(),
                                    ]),


                                Forms\Components\Textarea::make('address')
                                    ->label('Alamat')
                                    ->required(),

                                Forms\Components\Grid::make()
                                    ->schema([
                                        Forms\Components\TextInput::make('rtrw')
                                            ->label('RT/RW')
                                            ->required(),

                                        Forms\Components\TextInput::make('province')
                                            ->label('Provinsi')
                                            ->required(),

                                        Forms\Components\TextInput::make('regency')
                                            ->label('Kabupaten')
                                            ->required(),

                                        Forms\Components\Select::make('district')
                                            ->label('Kecamatan')
                                            ->options(Kecamatan::all()->pluck('name', 'id'))
                                            ->required(),

                                        Forms\Components\TextInput::make('village')
                                            ->label('Desa/Kelurahan')
                                            ->required(),

                                        Forms\Components\TextInput::make('post_code')
                                            ->label('Kode Pos')
                                            ->required(),

                                    ]),

                            ]),

                        Forms\Components\Section::make('Informasi Lanjutan')
                            ->columnSpan(1)
                            ->schema([
                                Forms\Components\TextInput::make('handphone')
                                    ->label('No. Handphone')
                                    ->required(),

                                Forms\Components\TextInput::make('email')
                                    ->label('Email')
                                    ->email()
                                    ->required(),

                                Forms\Components\Select::make('religion')
                                    ->options(Agama::all()->pluck('name', 'id'))
                                    ->label('Agama')
                                    ->required(),

                                Forms\Components\Select::make('status')
                                    ->options(StatusPerkawinan::all()->pluck('name', 'id'))
                                    ->label('Status Perkawinan')
                                    ->required(),

                                Forms\Components\Grid::make()
                                    ->schema([
                                        Forms\Components\TextInput::make('height')
                                            ->label('Tinggi Badan (cm)')
                                            ->numeric()
                                            ->required(),

                                        Forms\Components\TextInput::make('weight')
                                            ->label('Berat Badan (kg)')
                                            ->numeric()
                                            ->required()
                                    ]),

                                Forms\Components\Select::make('is_disability')
                                    ->label('Apakah anda penyandang disabilitas?')
                                    ->options([0 => 'Tidak', 1 => 'Ya'])
                                    ->required(),

                            ]),

                        Forms\Components\Section::make('Pendidikan & Pengalaman')
                            ->columnSpan(1)
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



                        Forms\Components\Section::make('Berkas')
                            ->columnSpan(1)
                            ->schema([
                                Forms\Components\FileUpload::make('pas_foto'),
                                Forms\Components\FileUpload::make('ktp'),
                                Forms\Components\FileUpload::make('ijazah'),
                                Forms\Components\FileUpload::make('sertifikat'),
                            ])

                    ]),







            ])
            ->statePath('data');
    }

    public function render()
    {
        return view('livewire.biodata.biodata-create');
    }
}
