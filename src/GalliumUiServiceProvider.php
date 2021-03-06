<?php

namespace Ore\GalliumUi;

use Illuminate\Support\ServiceProvider;
use Ore\GalliumUi\Console\BootThemeCommand;
use Ore\GalliumUi\Console\InstallCommand;

class GalliumUiServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/config.php' => config_path('gallium-ui.php'),
        ], 'config');
        $this->registerCommands();
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'gallium-ui');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'gallium-ui');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');
        // dd('GalliumUi ServiceProvider Booting...');
    //     if ($this->app->runningInConsole()) {
    //         // Publishing the views.
    //         /*$this->publishes([
    //             __DIR__.'/../resources/views' => resource_path('views/vendor/gallium-ui'),
    //         ], 'views');*/

    //         // Publishing assets.
    //         /*$this->publishes([
    //             __DIR__.'/../resources/assets' => public_path('vendor/gallium-ui'),
    //         ], 'assets');*/

    //         // Publishing the translation files.
    //         /*$this->publishes([
    //             __DIR__.'/../resources/lang' => resource_path('lang/vendor/gallium-ui'),
    //         ], 'lang');*/

    //         // Registering package commands.
    //         // $this->commands([]);
    //     }
    }

    protected function registerCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
                BootThemeCommand::class,
                // PublishCommand::class,
            ]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'gallium-ui');

        // Register the main class to use with the facade
        $this->app->singleton('gallium-ui', function () {
            return new GalliumUi;
        });
    }
}
 