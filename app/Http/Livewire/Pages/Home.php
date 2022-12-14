<?php

namespace App\Http\Livewire\Pages;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Home extends Component
{

    use WithPagination;

    public function render()
    {
        return view('livewire.pages.home',[
            'posts'=>Post::orderBy('created_at','desc')->paginate(10)
        ]);
    }
}
