<?php

namespace App\Http\Livewire\Models;

use Livewire\Component;

class Feed extends Component
{

    public $feed;

    protected $listeners = [
        'updateCommentsCount'=>'render'
    ];

    public function mount($feed) {
        $this->feed = $feed;
    }

    public function delete() {
        $this->feed->delete();
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.models.feed');
    }
}
