<?php

namespace Ore\GalliumUi\Console;

class PublishCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gallium:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish Assets.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->option('auth')) {
            $this->info('Please follow the prompts in order to finalize installion.');
            AuthPreset::install();
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
