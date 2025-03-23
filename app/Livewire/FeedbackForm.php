<?php

namespace App\Livewire;

use Livewire\Component;
use App\Mail\FeedbackMail;
use Illuminate\Support\Facades\Mail;

class FeedbackForm extends Component
{
    public $name;
    public $email;
    public $message;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email',
        'message' => 'required|min:10',
    ];

    public function submit()
    {
        $this->validate();



        

        $this->reset(['name', 'email', 'message']);

  
        session()->flash('message', 'Ваше сообщение успешно отправлено!');
    }

    public function render()
    {
        return view('livewire.feedback-form');
    }
}