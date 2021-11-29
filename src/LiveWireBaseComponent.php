<?php

namespace Ore\GalliumUi;

use Livewire\Component;
use Ore\GalliumUi\Themes\ThemeInterface;

class GalliumUiBaseLiveWireComponent extends Component implements ThemeInterface
{
    public $name;
    public $config;

    public function theme_config() : array {
        // static Parse via hasTheme

        return $this->config;
    }
}
