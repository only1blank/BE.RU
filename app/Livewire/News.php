<?php
namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\News as NewsModel;
use Illuminate\Support\Facades\Storage;

class News extends Component
{
    use WithFileUploads;

    public $title, $content, $image;
    public $editMode = false; 
    public $newsId; 

    
    public $newsList;

    public function mount()
    {
        $this->loadNews(); 
    }

    
    public function loadNews()
    {
        $this->newsList = NewsModel::latest()->get();
    }

  
    public function addNews()
    {
        $this->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => $this->editMode ? 'nullable|image|max:2048' : 'required|image|max:2048', 
        ]);

        $data = [
            'title' => $this->title,
            'content' => $this->content,
        ];

      
        if ($this->image) {
            $data['image'] = $this->image->store('images', 'public');
        }

        if ($this->editMode) {
           
            $news = NewsModel::find($this->newsId);
            $news->update($data);
        } else {
           
            NewsModel::create($data);
        }

        $this->resetForm(); 
        $this->loadNews(); 
    }

    public function editNews($id)
    {
        $news = NewsModel::findOrFail($id);
        $this->newsId = $news->id;
        $this->title = $news->title;
        $this->content = $news->content;
        $this->editMode = true; 
    }

    
    public function deleteNews($id)
    {
        $news = NewsModel::findOrFail($id);

        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();
        $this->loadNews(); 
    }

    
    public function resetForm()
    {
        $this->reset(['title', 'content', 'image', 'editMode', 'newsId']);
    }

    public function render()
    {
        return view('livewire.news');
    }
}