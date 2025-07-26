<?php

namespace App\Filament\Resources;

use Illuminate\Support\Str;
use Filament\Forms;
use Filament\Tables;
use App\Models\Berita;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\BeritaResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BeritaResource\RelationManagers;

class BeritaResource extends Resource
{
    protected static ?string $model = Berita::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->label('Judul')
                    ->required()
                    ->live(onBlur: true) // trigger saat user selesai ketik
                    ->afterStateUpdated(function ($state, callable $set, ?string $operation, ?Berita $record) {
                        // Jangan auto-generate slug saat edit jika slug sudah ada
                        if ($operation === 'edit' && $record?->slug) {
                            return;
                        }

                        if ($state) {
                            $baseSlug = Str::slug($state);
                            $slug = $baseSlug;
                            $counter = 1;

                            // Cek unique slug
                            while (Berita::where('slug', $slug)
                                ->when($record, fn($query) => $query->where('id', '!=', $record->id))
                                ->exists()
                            ) {
                                $slug = $baseSlug . '-' . $counter;
                                $counter++;
                            }

                            $set('slug', $slug);
                        }
                    })
                    ->maxLength(255),

                Forms\Components\TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->disabled(true) // disable
                    ->unique(Berita::class, 'slug', ignoreRecord: true)
                    ->rules(['alpha_dash']) // hanya huruf, angka, dash, underscore
                    ->helperText('URL slug untuk berita (otomatis dari judul)')
                    ->live(onBlur: true)
                    ->afterStateUpdated(function ($state, callable $set) {
                        if ($state) {
                            $set('slug', Str::slug($state));
                        }
                    }),

                Forms\Components\RichEditor::make('isi')
                    ->label('Isi Berita')
                    ->required()
                    ->columnSpanFull(), // full width


                Forms\Components\FileUpload::make('gambar')
                    ->label('Gambar Utama (Thumbnail)')
                    ->image()
                    ->imagePreviewHeight('250')
                    ->disk('public')
                    ->directory('berita/featured')
                    ->nullable() // tidak wajib karena sudah ada rich editor
                    ->maxSize(2048)
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->helperText('Opsional: Gambar utama untuk thumbnail/preview'),

                Forms\Components\Hidden::make('user_id')
                    ->default(optional(auth())->id),
            ]);
    }

    public static function mutateFormDataBeforeCreate(array $data): array
    {
        $data['published_by'] = auth()?->id;
        return $data;
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('gambar')
                    ->label('Thumbnail')
                    ->disk('public')
                    ->height(60)
                    ->defaultImageUrl('/images/no-image.png'), // fallback jika tidak ada gambar

                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul')
                    ->searchable()
                    ->sortable()
                    ->wrap()
                    ->limit(50),

                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable()
                    ->copyable()
                    ->copyMessage('Slug berhasil disalin!')
                    ->color('gray')
                    ->fontFamily('mono')
                    ->toggleable(),


                Tables\Columns\TextColumn::make('user.name')
                    ->label('Penulis')
                    ->sortable()
                    ->searchable(),

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
            'index' => Pages\ListBeritas::route('/'),
            'create' => Pages\CreateBerita::route('/create'),
            'edit' => Pages\EditBerita::route('/{record}/edit'),
        ];
    }
}
