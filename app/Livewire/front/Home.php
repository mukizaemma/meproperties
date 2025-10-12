<?php

namespace App\Livewire\Front;
use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Car;
use App\Models\Property;
use App\Models\Deal;
use App\Models\Setting;
use App\Models\Slide;
use App\Models\About;


class Home extends Component
{
    public $cars;
    public $carAdvert;
    public $houseAdvert;
    public $properties;
    public $products;
    public $setting;
    public $slides;
    public $about;

    public function mount()
    {
        $this->cars = Car::latest()->get();
        $this->carAdvert = Car::where('subscription_type', 'Premium')->latest()->first();
        $this->houseAdvert = Property::where('subscription_type', 'Premium')->latest()->first();
        $this->properties = Property::latest()->get();
        $this->products = Deal::latest()->get();
        $this->setting = Setting::first();
        $this->slides = Slide::oldest()->get();
        $this->about = About::first();
    }
    public function render()
    {

        return view('livewire.front.home')->layout('components.layouts.app');
    }
}
