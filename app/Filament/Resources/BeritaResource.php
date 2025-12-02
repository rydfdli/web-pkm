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

class BeritaResource extends Resource
{
    protected static ?string $model = Berita::class;
    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationLabel = 'Berita & Kegiatan';
    protected static ?string $pluralModelLabel = 'Berita & Kegiatan';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Basic Information
                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, $set, $operation, $record) => 
                        self::generateSlug($state, $set, $operation, $record)
                    ),

                Forms\Components\TextInput::make('slug')
                    ->disabled()
                    ->unique(ignoreRecord: true),

                Forms\Components\Select::make('kategori')
                    ->required()
                    ->options(self::getKategoriOptions())
                    ->native(false),

                // Content
                Forms\Components\Textarea::make('excerpt')
                    ->rows(2)
                    ->maxLength(300)
                    ->columnSpanFull(),

                Forms\Components\RichEditor::make('isi')
                    ->required()
                    ->columnSpanFull(),

                // Media
                Forms\Components\FileUpload::make('gambar')
                    ->image()
                    ->disk('public')
                    ->directory('berita')
                    ->maxSize(2048),

                // Tags
                Forms\Components\TagsInput::make('tags')
                    ->columnSpanFull(),

                // Publication Settings
                Forms\Components\Grid::make(3)
                    ->schema([
                        Forms\Components\Toggle::make('is_featured')
                            ->label('Berita Utama'),
                        
                        Forms\Components\Toggle::make('is_published')
                            ->label('Publikasikan')
                            ->default(true),
                        
                        Forms\Components\DateTimePicker::make('published_at')
                            ->label('Tanggal Publikasi')
                            ->default(now()),
                    ]),

                // SEO (Optional Section)
                Forms\Components\Section::make('SEO')
                    ->schema([
                        Forms\Components\Textarea::make('meta_description')
                            ->maxLength(160)
                            ->rows(2),
                    ])
                    ->collapsed(),

                Forms\Components\Hidden::make('user_id')
                    ->default(auth()->id()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('gambar')
                    ->height(50)
                    ->width(70),

                Tables\Columns\TextColumn::make('judul')
                    ->searchable()
                    ->sortable()
                    ->limit(50)
                    ->weight('bold'),

                Tables\Columns\BadgeColumn::make('kategori')
                    ->colors([
                        'primary' => 'pengumuman',
                        'success' => 'program', 
                        'warning' => 'kegiatan',
                        'info' => 'edukasi',
                        'secondary' => 'info',
                    ]),

                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Utama')
                    ->boolean()
                    ->trueIcon('heroicon-o-star')
                    ->trueColor('warning'),

                Tables\Columns\IconColumn::make('is_published')
                    ->label('Status')
                    ->boolean()
                    ->trueColor('success')
                    ->falseColor('danger'),

                Tables\Columns\TextColumn::make('views_count')
                    ->label('Views')
                    ->badge()
                    ->alignCenter(),

                Tables\Columns\TextColumn::make('published_at')
                    ->dateTime('d/m/Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('user.name')
                    ->label('Penulis')
                    ->toggleable(),
            ])
            ->defaultSort('published_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('kategori')
                    ->options(self::getKategoriOptions()),

                Tables\Filters\TernaryFilter::make('is_featured')
                    ->label('Berita Utama'),

                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Status'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->url(fn ($record) => route('berita.show', $record->slug))
                    ->openUrlInNewTab(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    
                    Tables\Actions\BulkAction::make('publish')
                        ->label('Publikasikan')
                        ->icon('heroicon-o-eye')
                        ->color('success')
                        ->action(fn ($records) => $records->each->update([
                            'is_published' => true,
                            'published_at' => now()
                        ])),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBeritas::route('/'),
            'create' => Pages\CreateBerita::route('/create'),
            'edit' => Pages\EditBerita::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('is_published', true)->count();
    }

    // Helper Methods
    private static function getKategoriOptions(): array
    {
        return [
            'pengumuman' => 'Pengumuman',
            'program' => 'Program Kesehatan',
            'kegiatan' => 'Kegiatan', 
            'edukasi' => 'Edukasi',
            'info' => 'Informasi Umum',
        ];
    }

    private static function generateSlug($state, $set, $operation, $record): void
    {
        if ($operation === 'edit' && $record?->slug) return;

        if ($state) {
            $baseSlug = Str::slug($state);
            $slug = $baseSlug;
            $counter = 1;

            while (Berita::where('slug', $slug)
                ->when($record, fn($query) => $query->where('id', '!=', $record->id))
                ->exists()) {
                $slug = $baseSlug . '-' . $counter++;
            }

            $set('slug', $slug);
        }
    }
}