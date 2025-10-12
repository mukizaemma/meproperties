<?php

namespace App\Livewire\Front;

use App\Models\Deal;
use Livewire\Component;

class Deals extends Component
{
    public $products;

    public function mount(){
        $this->products = Deal::latest()->get();
    }
    public function render()
    {
        return view('livewire.front.deals',['products'=>$this->products]);
    }
}
