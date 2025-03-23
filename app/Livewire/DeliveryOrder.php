<?php

namespace App\Livewire;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DeliveryOrder extends Component
{
    public $from;
    public $to;
    public $packageSize;
    public $tracking_id;

    protected $rules = [
        'from' => 'required|string|max:255',    
        'to' => 'required|string|max:255',
        'packageSize' => 'required|string|in:Маленький,Средний,Большой',
    ];

   

    public function submit()
    {
        $this->validate();

        
        $order = Order::create([
            'user_id' => Auth::id(),
            'from' => $this->from,
            'to' => $this->to,
            'package_size' => $this->packageSize,
            'status' => 'Не оплачено',
            'tracking_id' => $this->tracking_id,
        ]);

  
        $this->reset(['from', 'to', 'packageSize']);

        return redirect()->to('/profile')->with('success', '');
    } 
    public function render()
    {
        return view('livewire.delivery-order');
    }
}
