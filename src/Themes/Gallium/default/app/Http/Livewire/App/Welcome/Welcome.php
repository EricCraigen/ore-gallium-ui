<?php

namespace App\Http\Livewire\App\Welcome;

use Livewire\Component;
use Ore\GalliumUi\Presets\HasTheme;

// use Ore\GalliumUi\Themes\ThemeInterface;

class Welcome extends Component
{
    use HasTheme;

    public function render()
    {
        return view('livewire.app.welcome.welcome')
            ->extends('layouts.base')
            ->section('content');
    }
}
