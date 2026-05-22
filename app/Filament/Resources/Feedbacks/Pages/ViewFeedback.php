<?php

namespace App\Filament\Resources\Feedbacks\Pages;

use App\Filament\Resources\Feedbacks\FeedbackResource;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\ViewRecord;

class ViewFeedback extends ViewRecord
{
    protected static string $resource = FeedbackResource::class;

    public function getTitle(): string
    {
        return $this->record->subject;
    }

    public function getSubheading(): ?string
    {
        return 'Dari: ' . $this->record->name . ($this->record->email ? " ({$this->record->email})" : '');
    }

    protected function afterMount(): void
    {
        // Mark as read when viewed
        if (! $this->record->is_read) {
            $this->record->update(['is_read' => true]);
        }
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('toggleRead')
                ->label(fn () => $this->record->is_read ? 'Tandai Belum Dibaca' : 'Tandai Sudah Dibaca')
                ->icon(fn () => $this->record->is_read ? 'heroicon-o-envelope' : 'heroicon-o-envelope-open')
                ->color('gray')
                ->action(function () {
                    $this->record->update(['is_read' => !$this->record->is_read]);
                    $this->refreshFormData(['is_read']);
                }),
            DeleteAction::make(),
        ];
    }
}
