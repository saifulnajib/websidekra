<?php

namespace App\Filament\Resources\News\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Malzariey\FilamentLexicalEditor\LexicalEditor;

class NewsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')->label('Judul')
                    ->required(),
                Textarea::make('excerpt')->label('Ringkasan')
                    ->columnSpanFull(),
                LexicalEditor::make('content')->label('Konten')
                    ->required(),
                Toggle::make('is_published')->label('Terbitkan')
                    ->required(),
                DateTimePicker::make('published_at')->label('Tanggal Terbit')
                    ->nullable(),
                FileUpload::make('featured_image_path')->label('Gambar')
                    ->image(),
                Hidden::make('views')
                    ->default(0),
                TextInput::make('meta_title'),
                Textarea::make('meta_description')
                    ->columnSpanFull(),
            ]);
    }
}
