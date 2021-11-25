<?php

namespace Ore\GalliumUi\Presets;

use Illuminate\Support\Arr;
use Laravel\Ui\Presets\Preset;
use Ore\GalliumUi\Presets\HasTheme;
use Illuminate\Filesystem\Filesystem;

class AuthPreset extends Preset
{
    use HasTheme;

    const NPM_PACKAGES_TO_ADD = [
        '@tailwindcss/forms' => '^0.3',
        '@tailwindcss/typography' => '^0.4',
        'alpinejs' => '^3.2',
        'laravel-mix-tailwind' => '^0.1',
        'resolve-url-loader' => '^3.1',
        'sass' => '^1.32',
        'sass-loader' => '^8.0',
        'tailwindcss' => '^2.2',
    ];

    const NPM_PACKAGES_TO_REMOVE = [
        'lodash',
        'axios',
    ];

    public static function install(array $preset_settings)
    {
        // dd($preset_settings['theme']);
        static::updatePackages();

        $filesystem = new Filesystem();
        $filesystem->deleteDirectory(resource_path('sass'));
        $filesystem->copyDirectory(__DIR__ . '/../stubs/default', base_path());

        static::updateFile(base_path('app/Providers/RouteServiceProvider.php'), function ($file) {
            return str_replace("public const HOME = '/home';", "public const HOME = '/';", $file);
        });

        static::updateFile(base_path('app/Http/Middleware/RedirectIfAuthenticated.php'), function ($file) {
            return str_replace("RouteServiceProvider::HOME", "route('home')", $file);
        });
        dd(static::bootHasTheme($preset_settings['name']));
    }

    public static function installAuth()
    {
        $filesystem = new Filesystem();

        $filesystem->copyDirectory(__DIR__ . '/../stubs/auth', base_path());
    }

    protected static function updatePackageArray(array $packages)
    {
        return array_merge(
            static::NPM_PACKAGES_TO_ADD,
            Arr::except($packages, static::NPM_PACKAGES_TO_REMOVE)
        );
    }

    /**
     * Update the contents of a file with the logic of a given callback.
     */
    protected static function updateFile(string $path, callable $callback)
    {
        $originalFileContents = file_get_contents($path);
        $newFileContents = $callback($originalFileContents);
        file_put_contents($path, $newFileContents);
    }



}
