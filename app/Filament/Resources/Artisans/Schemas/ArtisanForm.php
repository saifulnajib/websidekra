<?php

namespace App\Filament\Resources\Artisans\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ArtisanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Pengrajin')
                    ->required()
                    ->maxLength(255),
                Select::make('type')
                    ->label('Jenis')
                    ->options(['perorangan' => 'Perorangan', 'kelompok' => 'Kelompok'])
                    ->default('perorangan')
                    ->required(),
                TextInput::make('specialty')
                    ->label('Keahlian / Spesialisasi')
                    ->maxLength(255),
                Textarea::make('description')
                    ->label('Deskripsi')
                    ->columnSpanFull(),
                \Filament\Forms\Components\FileUpload::make('photo_path')
                    ->label('Foto Pengrajin')
                    ->image()
                    ->disk('public')
                    ->directory('artisans')
                    ->columnSpanFull(),
                TextInput::make('experience_years')
                    ->label('Lama Pengalaman (Tahun)')
                    ->numeric(),
                Textarea::make('address')
                    ->label('Alamat')
                    ->columnSpanFull(),
                TextInput::make('phone')
                    ->label('Nomor Telepon')
                    ->tel()
                    ->maxLength(255),
                Select::make('umkm_owner_id')
                    ->label('Tergabung di UMKM (Opsional)')
                    ->relationship('umkmOwner', 'business_name')
                    ->searchable()
                    ->preload(),
                Select::make('status')
                    ->label('Status')
                    ->options(['aktif' => 'Aktif', 'nonaktif' => 'Nonaktif'])
                    ->default('aktif')
                    ->required(),
            ]);
    }
}
