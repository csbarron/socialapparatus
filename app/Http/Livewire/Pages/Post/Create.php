<?php

namespace App\Http\Livewire\Pages\Post;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{

    use WithFileUploads;

    public $title;
    public $body;
    public $photos = [];
    public $category;
    protected $listeners = [
        'updateCommentsCount'=>'render',
        'refreshAll'=>'render'
    ];
    public function save() {
        $this->validate([
            'title'=>'required',
            'body'=>'required',
            'photos'=>'sometimes'
        ]);
        if(!$this->category) {
            $this->category = 1;
        }
        $category = Category::findOrFail($this->category);
        $post = $category->posts()->create([
            'title'=>$this->title,
            'body'=>$this->title,
            'user_id'=>auth()->user()->id
        ]);

        if($this->photos) {
            foreach($this->photos as $photo) {
                $post->photos()->create([
                    'path'=>$photo->store('photos')
                ]);
            }
        }
        return redirect($post->getRoute());
    }
    public function render()
    {
        return view('livewire.pages.post.create');
    }
}
