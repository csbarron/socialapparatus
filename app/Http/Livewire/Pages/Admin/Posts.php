<?php

namespace App\Http\Livewire\Pages\Admin;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Posts extends Component
{

    use WithPagination;

    public $q;

    public function render()
    {
        return view('livewire.pages.admin.posts',[
            'posts'=>Post::where([
                ['title','like','%'.$this->q.'%']
            ])->paginate(10)
        ]);
    }
}
