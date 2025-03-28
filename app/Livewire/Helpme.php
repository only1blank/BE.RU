<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use App\Mail\FeedbackMail; // Создайте этот Mailable класс для отправки email

class Helpme extends Component
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

   
        Mail::to('support@be.ru')->send(new FeedbackMail($this->name, $this->email, $this->message));

      
        $this->reset(['name', 'email', 'message']);

     
        session()->flash('message', 'Ваше сообщение успешно отправлено!');
    }
    public function render()
    {
        return view('livewire.helpme');
    }
}
