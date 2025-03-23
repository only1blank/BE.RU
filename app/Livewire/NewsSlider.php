<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\News;

class NewsSlider extends Component
{
    public function render()
    {
        $news = News::latest()->get();
        return view('livewire.news-slider', compact('news'));
    }
}