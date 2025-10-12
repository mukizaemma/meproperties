<?php

namespace App\Livewire\Front;

use Livewire\Component;

class Navigation extends Component
{
    public function navigateToAbout()
    {
        return redirect()->route('aboutUs');
    }

    public function render()
    {
        return view('livewire.front.navigation');
    }
}
