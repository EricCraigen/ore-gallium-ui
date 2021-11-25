<?php

namespace Ore\GalliumUi\Console;

use Illuminate\Console\Command;
use Ore\GalliumUi\Presets\AuthPreset;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gallium:install
                {--auth : Run the Authentication scaffolding installer.}
                {name :  Theme to be installed on top of preset.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run the Gallium-Ui installation process.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        // dd($this->argument('theme_name'));
        if ($this->option('auth')) {
            $this->info('Please follow the prompts in order to finalize installion.');
            AuthPreset::install([
                'scaffolding' => $this->options(0)['auth'] ? 'auth' : 'base',
                'name' => $this->argument('name'),
            ]);
            // $this->info('Calling Preset\Themes\Auth\PuraVidaInstaller::install()');
        } else {
            $this->info('Calling Preset\Themes\Base\PuraVidaInstaller::install()...');
            $this->info('Calling Preset\Themes\Base\PuraVidaInstaller::install()...');
            $this->info('Calling Preset\Themes\Base\PuraVidaInstaller::install()...');
        }

        // $this->buildDockerCompose($services);
        // $this->replaceEnvVariables($services);

        // if ($this->option('devcontainer')) {
        //     $this->installDevContainer();
        // }

        $this->info($this->options(0)['auth'] ? 'Authenticantion scaffolding installed successfully' : 'Base scaffolding installed successfully');
    }
}
