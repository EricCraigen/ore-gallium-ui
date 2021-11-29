<?php

namespace Ore\GalliumUi\Console;

use Illuminate\Console\Command;
use Ore\GalliumUi\Presets\PresetInstaller;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gallium:install
                {--auth : Install Gallium-Ui with the Livewire Authentication Scaffolding.}';

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
        $installation_options = [
            'preset' => $this->options()['auth'],
            'theme' => 'gallium'
        ];
        if (!$installation_options['preset']) {
            $installation_options['preset'] = $this->choice('Which scaffolding preset would you like to install?', [1 => 'base', 2 => 'auth']);
        } else {
            $installation_options['auth'] = 'auth';
        }
        $installation_options['theme'] = $this->choice('Which theme would you like to install on top of the preset?', [1 => 'Gallium', 2 => 'Cobalt']);
        $installation_options['theme'] = strtolower($installation_options['theme']);
        PresetInstaller::install();
        $this->info($installation_options['preset'] ? 'Authenticantion scaffolding installed successfully!' : 'Base scaffolding installed successfully!');
        $this->info($installation_options['theme'].' theme installed successfully!');
        // dd(json_encode($installation_options));
    }
}
