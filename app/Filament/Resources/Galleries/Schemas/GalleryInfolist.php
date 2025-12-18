<?php

namespace App\Filament\Resources\Galleries\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class GalleryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title'),
                TextEntry::make('description')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('news.title')
                    ->label('News')
                    ->placeholder('-'),

                RepeatableEntry::make('galleryItems')
                    ->label('Gallery Items')
                    ->schema([
                        ImageEntry::make('path')
                            ->label('Photo')
                            ->disk('public')
                            ->height(150)
                            ->width(200)
                            ->visible(fn ($record) => $record && $record->type === 'photo'),
                        TextEntry::make('url')
                            ->label('Video URL')
                            ->visible(fn ($record) => $record && $record->type === 'video')
                            ->formatStateUsing(fn ($state) => $state ? '📺 ' . $state : '-'),
                        TextEntry::make('caption')
                            ->label('Caption')
                            ->placeholder('-'),
                        TextEntry::make('type')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'photo' => 'success',
                                'video' => 'warning',
                            }),
                    ])
                    ->columns(2)
                    ->grid(3)
                    ->columnSpanFull(),

                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
