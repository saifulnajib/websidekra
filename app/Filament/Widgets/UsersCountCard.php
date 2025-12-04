<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use App\Models\User;

class UsersCountCard extends Widget
{
    protected string $view = 'filament.widgets.users-count-card';

    /**
     * Return the total number of registered users.
     */
    public function getUsersCount(): int
    {
        return User::count();
    }
}
