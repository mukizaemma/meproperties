<?php

namespace App\Livewire\Admin;

use App\Models\Car;
use App\Models\Deal;
use App\Models\User;
use App\Models\Setting;
use Livewire\Component;
use App\Models\Property;
use App\Models\BlogComment;
use App\Models\Subscription;

class Dashboard extends Component
{

    public $users;
    public $blogCommets;
    public $blogCommetsCount;
    public $data;
    public $setting;
    public $cars;
    public $deals;
    public $subscriptions;
    public $properties;
    public $totalPropertyPrice;
    public $totalCarPrice;
    public $totalDealPrice;
    public $totalSubscriptionPrice;
    public $totalSum;

    public function mount(){
        $this->users = User::all();
        $this->blogCommets = BlogComment::latest()->get();
        $this->blogCommetsCount = $this->blogCommets->count();
        $this->data = Setting::first();
        $this->properties = Property::latest()->get();
        $this->cars = Car::latest()->get();
        $this->deals = Deal::latest()->get();
        $this->subscriptions = Subscription::latest()->get();
        $this->setting = Setting::first();

        $this->totalPropertyPrice = Property::sum('price');
        $this->totalCarPrice = Car::sum('price');
        $this->totalDealPrice = Deal::sum('price');
        $this->totalSubscriptionPrice = Subscription::sum('amount_paid');

        $this->totalSum = $this->totalPropertyPrice + $this->totalCarPrice + $this->totalDealPrice + $this->totalSubscriptionPrice;


    }
    public function render()
    {
        return view('livewire.admin.dashboard')->layout('components/layouts/admin');
    }
}
