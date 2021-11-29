<?php

namespace Ore\GalliumUi\Presets;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

trait HasTheme
{
    public $config = [];

    public static function theme_config(string $name)
    {
        // dd($name);
        static::parse_theme_config($name);
        // Artisan::call('gallium-ui:boot-theme');
        // $originalFileContents = file(base_path('/vendor/ore/gallium-ui/src/Themes/'.$name.'/theme_config.php'));
        // dd(file_get_contents(base_path('/vendor/ore/gallium-ui/src/Themes/'.$name.'/theme_config.php')));
        // switch ($name) {
        //     case 'gallium-ui':

        //         break;
        //         default: static::load_boilerplate_theme();
        // }
        // if ($name == 'gallium-ui'){
        //     $theme = config('themes.'.$name);
        // }
        return static::parse_theme_config($name);
    }

    public static function parse_theme_config(string $name)
    {
        $theme_config = [];
        // dd(config('gallium-ui.themes_path_prefix').$name.'/theme_config.php');
        // $message = Artisan::call('gallium-ui:booting-theme', ['process' => 1]);
        // echo $message;
        $originalFileContents = file_get_contents(base_path(config('gallium-ui.themes_path_prefix').$name.'/theme_config.php'), FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        preg_match_all('/\'(.*?)\'/', $originalFileContents, $theme_config);
        unset($theme_config[0]);
        $config_array = [];
        // foreach ($theme_config as $name) {
        //     if ($name = 'info')
        // }
        // dd($theme_config);
        return $theme_config;
    }

    protected static function slpit_to_key_value_pair() {

    }
}
