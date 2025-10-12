<?php

namespace App\Livewire\Front;

use App\Models\Setting;
use App\Models\About;
use Livewire\Component;

class AboutUs extends Component
{

    public function render()
    {

        return view('livewire.front.aboutUs',['about' => About::first(), 'setting'=>Setting::first()])->layout('components.layouts.app');
    }
}
