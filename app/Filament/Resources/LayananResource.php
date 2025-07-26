<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Layanan;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Filters\TernaryFilter;
use App\Filament\Resources\LayananResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\LayananResource\RelationManagers;

class LayananResource extends Resource
{
    protected static ?string $model = Layanan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Layanan')
                    ->schema([
                        TextInput::make('judul_layanan')
                            ->label('Judul Layanan')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: Poli Umum'),

                        Textarea::make('deskripsi')
                            ->label('Deskripsi')
                            ->required()
                            ->rows(3)
                            ->placeholder('Pelayanan konsultasi dan pengobatan penyakit umum dengan dokter berpengalaman.')
                            ->columnSpanFull(),
                    ])->columns(1),

                Forms\Components\Section::make('Tampilan')
                    ->schema([
                        Select::make('icon')
                            ->label('Icon')
                            ->required()
                            ->searchable()
                            ->options([
                                'fas fa-user-md' => '👨‍⚕️ Dokter (fas fa-user-md)',
                                'fas fa-syringe' => '💉 Suntik (fas fa-syringe)',
                                'fas fa-baby' => '👶 Bayi (fas fa-baby)',
                                'fas fa-tooth' => '🦷 Gigi (fas fa-tooth)',
                                'fas fa-flask' => '🧪 Lab (fas fa-flask)',
                                'fas fa-pills' => '💊 Obat (fas fa-pills)',
                                'fas fa-heartbeat' => '💓 Jantung (fas fa-heartbeat)',
                                'fas fa-eye' => '👁️ Mata (fas fa-eye)',
                                'fas fa-bone' => '🦴 Tulang (fas fa-bone)',
                                'fas fa-brain' => '🧠 Otak (fas fa-brain)',
                                'fas fa-lungs' => '🫁 Paru (fas fa-lungs)',
                                'fas fa-stethoscope' => '🩺 Stetoskop (fas fa-stethoscope)',
                                'fas fa-hospital' => '🏥 Rumah Sakit (fas fa-hospital)',
                                'fas fa-ambulance' => '🚑 Ambulan (fas fa-ambulance)',
                                'fas fa-first-aid' => '🩹 P3K (fas fa-first-aid)',
                                'fas fa-microscope' => '🔬 Mikroskop (fas fa-microscope)',
                                'fas fa-x-ray' => '📻 X-Ray (fas fa-x-ray)',
                                'fas fa-wheelchair' => '♿ Kursi Roda (fas fa-wheelchair)',
                                'fas fa-shield-alt' => '🛡️ Perlindungan (fas fa-shield-alt)',
                                'fas fa-hand-holding-heart' => '🤲❤️ Perawatan (fas fa-hand-holding-heart)',
                            ])
                            ->placeholder('Pilih icon untuk layanan')
                            ->helperText('Icon akan ditampilkan di website'),

                        TextInput::make('badge_text')
                            ->label('Text Badge')
                            ->placeholder('Contoh: 24/7 Available, Free Program, dll')
                            ->helperText('Badge kecil yang muncul di layanan (opsional)'),

                        Select::make('badge_color')
                            ->label('Warna Badge')
                            ->options([
                                'primary' => '🔵 Primary (Biru)',
                                'secondary' => '⚫ Secondary (Abu)',
                                'success' => '🟢 Success (Hijau)',
                                'danger' => '🔴 Danger (Merah)',
                                'warning' => '🟡 Warning (Kuning)',
                                'info' => '🔵 Info (Biru Muda)',
                            ])
                            ->default('primary')
                            ->helperText('Warna badge yang akan ditampilkan'),
                    ])->columns(2),

                Forms\Components\Section::make('Pengaturan')
                    ->schema([
                        TextInput::make('urutan')
                            ->label('Urutan')
                            ->numeric()
                            ->default(0)
                            ->helperText('Semakin kecil angka, semakin atas urutannya'),

                        Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true)
                            ->helperText('Tampilkan layanan di website'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('urutan')
                    ->label('Urutan')
                    ->sortable()
                    ->width(80),

                TextColumn::make('icon')
                    ->label('Icon')
                    ->html()
                    ->formatStateUsing(fn ($state) => "<i class='{$state} text-lg'></i>")
                    ->width(60),

                TextColumn::make('judul_layanan')
                    ->label('Judul Layanan')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->limit(50)
                    ->tooltip(function (TextColumn $column): ?string {
                        $state = $column->getState();
                        if (strlen($state) <= 50) {
                            return null;
                        }
                        return $state;
                    }),

                BadgeColumn::make('badge_text')
                    ->label('Badge')
                    ->colors([
                        'primary' => 'primary',
                        'secondary' => 'secondary', 
                        'success' => 'success',
                        'danger' => 'danger',
                        'warning' => 'warning',
                        'info' => 'info',
                    ])
                    ->color(fn ($record) => $record->badge_color ?? 'primary')
                    ->placeholder('Tidak ada badge'),

                BooleanColumn::make('is_active')
                    ->label('Status')
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle'),

                TextColumn::make('user.name')
                    ->label('Dibuat Oleh')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Status')
                    ->boolean()
                    ->trueLabel('Aktif')
                    ->falseLabel('Tidak Aktif'),

                Tables\Filters\SelectFilter::make('badge_color')
                    ->label('Warna Badge')
                    ->options([
                        'primary' => 'Primary (Biru)',
                        'secondary' => 'Secondary (Abu)',
                        'success' => 'Success (Hijau)',
                        'danger' => 'Danger (Merah)',
                        'warning' => 'Warning (Kuning)',
                        'info' => 'Info (Biru Muda)',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('urutan')
            ->emptyStateHeading('Belum ada layanan')
            ->emptyStateDescription('Klik tombol "Buat" untuk menambah layanan pertama.')
            ->emptyStateIcon('heroicon-o-heart');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLayanans::route('/'),
            'create' => Pages\CreateLayanan::route('/create'),
            'edit' => Pages\EditLayanan::route('/{record}/edit'),
        ];
    }
}
