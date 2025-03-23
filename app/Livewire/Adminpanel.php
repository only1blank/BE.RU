<?php

namespace App\Livewire;
use App\Models\User;
use Livewire\Component;
use App\Models\Order;



class Adminpanel extends Component
{
    public $orders;
    public $statuses = ['Оформлен', 'В пути', 'Доставлено', 'Отменено'];

    public function mount()
    {
        if (!auth()->check() || !auth()->user()->isAdmin()) {
            abort(403, 'Ошибка!');
        }
    
        $this->orders = Order::with('user')->get();
    }

    public function updateStatus($orderId, $status)
    {
        $order = Order::find($orderId);
        $order->status = $status;
        $order->save();

        
        $this->orders = Order::with('user')->get();
    }

    public function render()
    {
        return view('livewire.adminpanel');
    }
}
