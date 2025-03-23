<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use App\Models\Order;

class Orders extends Component
{
    public $orders;

    
    public function mount()
    {
        
        $this->orders = Order::where('user_id', auth()->id())->get();
    }

    public function render()
    {
        return view('livewire.profile.orders');
    }
}
