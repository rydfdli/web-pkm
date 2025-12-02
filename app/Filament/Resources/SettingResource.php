<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Setting;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\SettingResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SettingResource\RelationManagers;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('nama_puskesmas')
                    ->label('Nama Puskesmas')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Masukkan nama puskesmas'),
                Forms\Components\FileUpload::make('logo')
                    ->label('Logo')
                    ->image()
                    ->disk('public')
                    ->directory('settings')
                    ->imagePreviewHeight('100')
                    ->maxSize(1024)
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->nullable(),

                Forms\Components\FileUpload::make('hero_image')
                    ->label('Hero Image')
                    ->image()
                    ->disk('public')
                    ->directory('settings')
                    ->imagePreviewHeight('100')
                    ->maxSize(2048)
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->nullable(),

                Forms\Components\TextInput::make('wellcome_text')->label('Teks Selamat Datang')
                    ->helperText('akan ditampilkan di halaman utama')
                    ->placeholder('Contoh: Selamat datang di Puskesmas XYZ'),
                Forms\Components\TextInput::make('wellcome_subtext')->label('Subteks Selamat Datang')
                    ->helperText('akan ditampilkan di halaman utama')
                    ->placeholder('Contoh: Kami siap melayani Anda dengan sepenuh hati'),
                Forms\Components\TextInput::make('visi_misi_tagline')->label('Tagline Visi Misi')
                    ->helperText('akan ditampilkan di halaman Visi Misi')
                    ->placeholder('Contoh: Komitmen Puskesmas xyz untuk Masyarakat'),
                Forms\Components\TextInput::make('struktur_tagline')->label('Tagline Struktur Organisasi')
                    ->helperText('akan ditampilkan di halaman Struktur Organisasi')
                    ->placeholder('Contoh: Struktur organisasi Puskesmas xyz'),
                Forms\Components\TextInput::make('layanan_tagline')->label('Tagline Layanan')
                    ->helperText('akan ditampilkan di halaman Layanan')
                    ->placeholder('Contoh: Layanan yang kami sediakan'),
                Forms\Components\TextInput::make('kontak_tagline')->label('Tagline Kontak')
                    ->helperText('akan ditampilkan di halaman Kontak')
                    ->placeholder('Contoh: Puskesmas xyz siap melayani Anda'),
                Forms\Components\TextInput::make('berita_tagline')->label('Tagline Berita')
                    ->helperText('akan ditampilkan di halaman Berita & Kegiatan')
                    ->placeholder('Contoh: Berita terbaru dari Puskesmas xyz'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->paginated(false)
            ->columns([
                //
                Tables\Columns\TextColumn::make('nama_puskesmas')->label('Nama Puskesmas'),
                Tables\Columns\ImageColumn::make('logo'),

                Tables\Columns\ImageColumn::make('hero_image'),

                Tables\Columns\TextColumn::make('wellcome_text')->label('Welcome Text'),
                Tables\Columns\TextColumn::make('wellcome_subtext')->label('Welcome Subtext'),
                Tables\Columns\TextColumn::make('visi_misi_tagline')->label('Visi Misi'),
                Tables\Columns\TextColumn::make('struktur_tagline')->label('Struktur'),
                Tables\Columns\TextColumn::make('layanan_tagline')->label('Layanan'),
                Tables\Columns\TextColumn::make('kontak_tagline')->label('Kontak'),
                Tables\Columns\TextColumn::make('berita_tagline')->label('Berita'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    // public static function getPages(): array
    // {
    //     if (Setting::count() === 0) {
    //         Setting::create([
    //             'nama_puskesmas' => 'Puskesmas Sehat Sentosa',
    //             'logo' => null,
    //             'hero_image' => null,
    //             'wellcome_text' => 'Selamat datang',
    //             'wellcome_subtext' => 'Kami siap melayani Anda',
    //             'visi_misi_tagline' => '',
    //             'struktur_tagline' => '',
    //             'layanan_tagline' => '',
    //             'kontak_tagline' => '',
    //             'berita_tagline' => '',
    //         ]);
    //     }

    //     return [
    //         'index' => Pages\ListSettings::route('/'),
    //         'edit' => Pages\EditSetting::route('/{record}/edit'),
    //     ];
    // }

    public static function getPages(): array
{
    // Jangan jalankan akses DB saat aplikasi berjalan di console (composer/artisan)
    if (! app()->runningInConsole()) {
        try {
            if (Setting::count() === 0) {
                Setting::create([
                    'nama_puskesmas'     => 'Puskesmas Sehat Sentosa',
                    'logo'               => null,
                    'hero_image'         => null,
                    'wellcome_text'      => 'Selamat datang',
                    'wellcome_subtext'   => 'Kami siap melayani Anda',
                    'visi_misi_tagline'  => '',
                    'struktur_tagline'   => '',
                    'layanan_tagline'    => '',
                    'kontak_tagline'     => '',
                    'berita_tagline'     => '',
                ]);
            }
        } catch (\Throwable $e) {
            // Abaikan sementara jika tabel/DB belum ada agar artisan/composer tidak gagal.
        }
    }

    return [
        'index' => Pages\ListSettings::route('/'),
        'edit'  => Pages\EditSetting::route('/{record}/edit'),
    ];
}


    public static function canCreate(): bool
    {
        return false;
    }

    public static function canDelete(Model $record): bool
    {
        return false;
    }

    public static function canDeleteAny(): bool
    {
        return false;
    }
}
