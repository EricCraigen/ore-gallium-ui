<?php

namespace Ore\GalliumUi\Console;

use Illuminate\Console\Command;

class BootThemeCommand extends Command
{
/**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gallium-ui:booting-theme {process}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Boot the application theme for installation.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->info($this->argument('process'));
        $this->info('Booting application theme...');

    }
}
