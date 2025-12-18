<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteConfig extends Model
{
    protected $fillable = [
        'key',
        'value',
        'type',
        'group',
        'label',
        'description',
        'is_public',
        'sort_order',
    ];

    protected $casts = [
        'is_public' => 'boolean',
        'sort_order' => 'integer',
        'value' => 'string',
    ];

    /**
     * Get configuration value by key
     */
    public static function get(string $key, $default = null)
    {
        return Cache::remember("site_config_{$key}", 3600, function () use ($key, $default) {
            $config = static::where('key', $key)->first();
            if (!$config) {
                return $default;
            }

            return static::castValue($config->value, $config->type);
        });
    }

    /**
     * Set configuration value
     */
    public static function set(string $key, $value): bool
    {
        $config = static::where('key', $key)->first();

        if ($config) {
            $config->update(['value' => (string) $value]);
            Cache::forget("site_config_{$key}");
            return true;
        }

        return false;
    }

    /**
     * Get all configurations by group
     */
    public static function getGroup(string $group): array
    {
        return Cache::remember("site_config_group_{$group}", 3600, function () use ($group) {
            return static::where('group', $group)
                ->where('is_public', true)
                ->orderBy('sort_order')
                ->get()
                ->mapWithKeys(function ($config) {
                    return [$config->key => static::castValue($config->value, $config->type)];
                })
                ->toArray();
        });
    }

    /**
     * Get all public configurations
     */
    public static function getAllPublic(): array
    {
        return Cache::remember('site_config_all_public', 3600, function () {
            return static::where('is_public', true)
                ->orderBy('group')
                ->orderBy('sort_order')
                ->get()
                ->mapWithKeys(function ($config) {
                    return [$config->key => static::castValue($config->value, $config->type)];
                })
                ->toArray();
        });
    }

    /**
     * Cast value based on type
     */
    protected static function castValue($value, string $type)
    {
        return match ($type) {
            'boolean' => filter_var($value, FILTER_VALIDATE_BOOLEAN),
            'integer', 'number' => (int) $value,
            'float' => (float) $value,
            'json' => json_decode($value, true) ?? $value,
            'array' => json_decode($value, true) ?? explode(',', $value),
            default => $value,
        };
    }

    /**
     * Clear all configuration cache
     */
    public static function clearCache(): void
    {
        $configs = static::all();
        foreach ($configs as $config) {
            Cache::forget("site_config_{$config->key}");
        }
        Cache::forget('site_config_all_public');

        // Clear group caches
        $groups = static::distinct('group')->pluck('group');
        foreach ($groups as $group) {
            Cache::forget("site_config_group_{$group}");
        }
    }

    /**
     * Get available groups
     */
    public static function getGroups(): array
    {
        return [
            'general' => 'General',
            'branding' => 'Branding',
            'hero' => 'Hero Section',
            'contact' => 'Contact',
            'social' => 'Social Media',
            'footer' => 'Footer',
            'seo' => 'SEO',
            'features' => 'Features',
            'stats' => 'Statistics',
        ];
    }

    /**
     * Get available types
     */
    public static function getTypes(): array
    {
        return [
            'text' => 'Text',
            'textarea' => 'Textarea',
            'email' => 'Email',
            'url' => 'URL',
            'file' => 'File',
            'image' => 'Image',
            'boolean' => 'Boolean',
            'number' => 'Number',
            'json' => 'JSON',
            'array' => 'Array',
        ];
    }
}
