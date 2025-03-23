<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;

class TrackPackage extends Component
{
    public $trackingId;
    public $package;

    public function track()
    {
        $this->validate([
            'trackingId' => 'required|string',
        ]);

        
        $this->package = Order::where('tracking_id', $this->trackingId)->first();

        if (!$this->package) {
            session()->flash('error', 'Посылка с таким трекинг-номером не найдена.');
        }
    }


    public function render()
    {
        return view('livewire.track-package');
    }
}
