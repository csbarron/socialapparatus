<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Navigation extends Component
{

    protected $listeners = [
        'updateHeader'=>'render'
    ];

    public function render()
    {
        return view('livewire.navigation');
    }
}
