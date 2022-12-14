<?php

namespace App\Http\Livewire\Models;

use Livewire\Component;

class Post extends Component
{

    public $post;

    protected $listeners = [
        'updateCommentsCount'=>'render'
    ];

    public function mount($post) {
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.models.post');
    }
}
