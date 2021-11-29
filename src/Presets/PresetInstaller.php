<?php

namespace Ore\GalliumUi\Presets;

use Illuminate\Support\Arr;
use Laravel\Ui\Presets\Preset;
use Illuminate\Filesystem\Filesystem;

class PresetInstaller extends Preset
{
    // use HasTheme;

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

    public static function install()
    {

        // dd(static::theme_config($installation_options['theme']));
        // ThemeConfigParser - get config settings for theme

        static::updatePackages();

        $filesystem = new Filesystem();
        $filesystem->deleteDirectory(resource_path('sass'));
        // Move theme stubs to project
        $filesystem->copyDirectory(__DIR__ . '../../Themes/Gallium/default', base_path());
        // Move auth stubs if auth is selected
        $filesystem->copyDirectory(__DIR__ . '../../Themes/Gallium/auth', base_path());

        // Update home route to point at project root in RouteServiceProvider
        static::updateFile(base_path('app/Providers/RouteServiceProvider.php'), function ($file) {
            return str_replace("public const HOME = '/home';", "public const HOME = '/';", $file);
        });

        // Update home route name to welcome in RedirectIfAuthenticated middleware
        static::updateFile(base_path('app/Http/Middleware/RedirectIfAuthenticated.php'), function ($file) {
            return str_replace("RouteServiceProvider::HOME", "route('welcome')", $file);
        });


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

    // public static function theme_config(string $name) : array {
    //     $name = ['Eric', 'Jamie'];
    //     return $name;
    // }
}
