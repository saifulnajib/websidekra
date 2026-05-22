<?php

namespace App\Filament\Resources\Feedbacks\Schemas;

use App\Models\Feedback;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;
use Filament\Support\Enums\TextSize;

class FeedbackInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3)
                    ->components([
                        // Left column: pengirim + meta (2 cols wide)
                        Section::make('Informasi Pengirim')
                            ->icon('heroicon-o-user-circle')
                            ->description('Detail kontak pengirim pesan')
                            ->columnSpan(2)
                            ->columns(2)
                            ->components([
                                TextEntry::make('name')
                                    ->label('Nama Lengkap')
                                    ->icon('heroicon-o-user')
                                    ->weight('bold')
                                    ->size(TextSize::Large),
                                TextEntry::make('email')
                                    ->label('Alamat Email')
                                    ->icon('heroicon-o-envelope')
                                    ->placeholder('Tidak dicantumkan')
                                    ->url(fn (Feedback $record): ?string => $record->email ? "mailto:{$record->email}" : null)
                                    ->color(fn (Feedback $record): ?string => $record->email ? 'primary' : null),
                                TextEntry::make('created_at')
                                    ->label('Dikirim Pada')
                                    ->icon('heroicon-o-clock')
                                    ->dateTime('l, d F Y - H:i')
                                    ->since()
                                    ->dateTimeTooltip('d F Y, H:i:s'),
                                TextEntry::make('updated_at')
                                    ->label('Terakhir Diperbarui')
                                    ->icon('heroicon-o-arrow-path')
                                    ->dateTime('d M Y, H:i')
                                    ->placeholder('-'),
                            ]),

                        // Right column: status card (1 col wide)
                        Section::make('Status')
                            ->icon('heroicon-o-information-circle')
                            ->columnSpan(1)
                            ->components([
                                TextEntry::make('type')
                                    ->label('Tipe Pesan')
                                    ->badge()
                                    ->size(TextSize::Large)
                                    ->color(fn (string $state): string => match ($state) {
                                        'kritik' => 'danger',
                                        'saran' => 'success',
                                        'umum' => 'info',
                                        default => 'gray',
                                    })
                                    ->icon(fn (string $state): string => match ($state) {
                                        'kritik' => 'heroicon-o-exclamation-triangle',
                                        'saran' => 'heroicon-o-light-bulb',
                                        'umum' => 'heroicon-o-chat-bubble-left-ellipsis',
                                        default => 'heroicon-o-question-mark-circle',
                                    })
                                    ->formatStateUsing(fn (string $state): string => ucfirst($state)),
                                IconEntry::make('is_read')
                                    ->label('Status Baca')
                                    ->boolean()
                                    ->trueIcon('heroicon-o-check-circle')
                                    ->falseIcon('heroicon-o-x-circle')
                                    ->trueColor('success')
                                    ->falseColor('danger'),
                            ]),
                    ]),

                // Full-width message section
                Section::make('Isi Pesan')
                    ->icon('heroicon-o-chat-bubble-bottom-center-text')
                    ->description(fn (Feedback $record): string => "Subjek: {$record->subject}")
                    ->components([
                        TextEntry::make('message')
                            ->label('')
                            ->prose()
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
