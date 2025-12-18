<?php

namespace App\Filament\Resources\Galleries\Relations;

use App\Models\GalleryItem;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GalleryItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'galleryItems';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('type')
                    ->options([
                        'photo' => 'Photo',
                        'video' => 'Video',
                    ])
                    ->required()
                    ->live()
                    ->afterStateUpdated(function ($state, $set) {
                        if ($state === 'video') {
                            $set('path', null);
                        } else {
                            $set('url', null);
                        }
                    }),

                FileUpload::make('path')
                    ->label('Photo')
                    ->disk('public')
                    ->directory('galleries')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/gif', 'image/webp'])
                    ->maxSize(10240)
                    ->visible(fn ($get) => $get('type') === 'photo')
                    ->required(fn ($get) => $get('type') === 'photo'),

                TextInput::make('url')
                    ->label('YouTube URL')
                    ->url()
                    ->placeholder('https://www.youtube.com/watch?v=...')
                    ->visible(fn ($get) => $get('type') === 'video')
                    ->required(fn ($get) => $get('type') === 'video'),

                TextInput::make('caption')
                    ->label('Caption')
                    ->maxLength(255),

                TextInput::make('order')
                    ->label('Order')
                    ->numeric()
                    ->default(0),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('caption')
            ->columns([
                Tables\Columns\TextColumn::make('type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'photo' => 'success',
                        'video' => 'warning',
                    }),

                Tables\Columns\ImageColumn::make('path')
                    ->label('Photo')
                    ->disk('public')
                    ->height(50)
                    ->width(50)
                    ->visible(fn ($record) => $record && $record->type === 'photo'),

                Tables\Columns\TextColumn::make('url')
                    ->label('Video URL')
                    ->limit(30)
                    ->visible(fn ($record) => $record && $record->type === 'video'),

                Tables\Columns\TextColumn::make('caption')
                    ->searchable(),

                Tables\Columns\TextColumn::make('order')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make(),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('order');
    }
}