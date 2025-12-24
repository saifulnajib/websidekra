<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        try {
            if (\Illuminate\Support\Facades\Schema::hasTable('site_configs')) {
                $configs = \App\Models\SiteConfig::all();

                foreach ($configs as $config) {
                    $value = $config->value;

                    if (in_array($config->type, ['file', 'image']) && $value) {
                        $value = asset('storage/' . $value);
                    } else {
                        $value = \App\Models\SiteConfig::castValue($value, $config->type);
                    }

                    \Illuminate\Support\Facades\View::share($config->key, $value);
                }
            }
        } catch (\Exception $e) {
            // Log error or ignore if DB not ready
        }

        \Illuminate\Pagination\Paginator::useBootstrapFive();
    }
}
