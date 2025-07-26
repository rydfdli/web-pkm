<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Models\StrukturOrganisasi;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\StrukturOrganisasiResource\Pages;
use App\Filament\Resources\StrukturOrganisasiResource\RelationManagers;

class StrukturOrganisasiResource extends Resource
{
    protected static ?string $model = StrukturOrganisasi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                FileUpload::make('foto')
                    ->label('Foto Bagan Struktur')
                    ->image()
                    ->imagePreviewHeight('250') // tampilkan preview
                    ->disk('public') // folder simpan
                    ->required()
                    ->maxSize(2048), // 2MB
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->paginated(false)
            ->columns([
                //

                Tables\Columns\ImageColumn::make('foto')
                    ->label('Foto Bagan Struktur')
                    ->disk('public')
                    ->size(150) // lebar gambar
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

    public static function getPages(): array
    {
        if (StrukturOrganisasi::count() === 0) {
            StrukturOrganisasi::create([
                'foto' => 'tidak ada foto',
            ]);
        }

        return [
            'index' => Pages\ListStrukturOrganisasis::route('/'),
            'edit' => Pages\EditStrukturOrganisasi::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return 'Struktur Organisasi';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Struktur Organisasi';
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
