<?php

namespace App\Livewire\Front;

use App\Models\Car;
use Livewire\Component;

class Cars extends Component
{

    public $cars;
    public $carAdvert;
    
    public function mount(){
        $this->cars = Car::latest()->get();
        $this->carAdvert = Car::where('subscription_type', 'Premium')->latest()->first();
    }
    public function render()
    {
        return view('livewire.front.cars',['cars'=>$this->cars, 'carAdvert'=>$this->carAdvert])->layout('components.layouts.app');
    }
}
