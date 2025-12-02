<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\VisiMisi;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\VisiMisiResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\VisiMisiResource\RelationManagers;
use Filament\Forms\Components\RichEditor;

class VisiMisiResource extends Resource
{
    protected static ?string $model = VisiMisi::class;

    protected static ?string $navigationIcon = 'heroicon-o-eye';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                // Forms\Components\TextInput::make('visi')
                //     ->label('Visi')
                //     ->required()
                //     ->maxLength(255),
                // Forms\Components\TextInput::make('misi')
                //     ->label('Misi')
                //     ->required()
                //     ->maxLength(255),
                RichEditor::make('visi')
                    ->label('Visi')
                    ->required()
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'underline',
                        'strike',
                        'link',
                        'bulletList',
                        'orderedList',
                        'blockquote',
                        'undo',
                        'redo',
                    ])
                    ->maxLength(1000),
                RichEditor::make('misi')
                    ->label('Misi')
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'underline',
                        'strike',
                        'link',
                        'bulletList',
                        'orderedList',
                        'blockquote',
                        'undo',
                        'redo',
                    ])
                    ->required()
                    ->maxLength(1000),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->paginated(false)
            ->columns([
                //
                Tables\Columns\TextColumn::make('visi')
                    ->label('Visi')
                    ->limit(50),
                Tables\Columns\TextColumn::make('misi')
                    ->label('Misi')
                    ->limit(50),
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
        if(! app()->runningInConsole()){
            try {
                if (VisiMisi::count() === 0) {
                VisiMisi::create([
                    'visi' => '',
                    'misi' => '',
                ]);
            }        
            
        } catch (\Exception $e) {
            // Tangani pengecualian jika diperlukan
        }
        }

        return [
            'index' => Pages\ListVisiMisis::route('/'),
            'edit' => Pages\EditVisiMisi::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return 'Visi & Misi';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Visi & Misi';
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
