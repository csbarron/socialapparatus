<?php

namespace App\Http\Livewire\Pages;

use App\Http\Livewire\Models\Post;
use Livewire\Component;

class Category extends Component
{

    public $category;
    public $currentCategory;

    public function mount() {
        $this->category = \App\Models\Category::findOrFail(request('id'));
        $this->currentCategory = request('id');
    }

    public function forwardToCategory() {
        $category = \App\Models\Category::findOrFail($this->currentCategory);
        return redirect($category->getRoute());
    }

    public function render()
    {
        return view('livewire.pages.category',[
            'posts'=>$this->category->findOrFail(request('id'))->posts()->orderBy('created_at','desc')->paginate(10)
        ]);
    }
}
