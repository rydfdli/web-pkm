<?php

namespace App\Filament\Resources;

use App\Models\Jam;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\JamOperasional;
use Filament\Resources\Resource;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\JamOperasionalResource\Pages;
use App\Filament\Resources\JamOperasionalResource\RelationManagers;

class JamOperasionalResource extends Resource
{
    protected static ?string $model = Jam::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('hari')
                    ->required()
                    ->label('Hari'),

                TimePicker::make('jam_mulai')
                    ->label('Jam Mulai')
                    ->required(),

                TimePicker::make('jam_selesai')
                    ->label('Jam Selesai')
                    ->required(),

                Textarea::make('keterangan')
                    ->label('Keterangan')
                    ->rows(2)
                    ->placeholder('Contoh: hanya tindakan darurat')
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('hari')->sortable()->searchable(),
                TextColumn::make('jam_mulai'),
                TextColumn::make('jam_selesai'),
                TextColumn::make('keterangan')->wrap(),
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
        return [
            'index' => Pages\ListJamOperasionals::route('/'),
            'create' => Pages\CreateJamOperasional::route('/create'),
            'edit' => Pages\EditJamOperasional::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return 'Jadwal Operasional';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Jadwal Operasional';
    }
}
