<?php

namespace App\Http\Livewire\Pages;

use App\Models\User;
use Livewire\Component;

class Profile extends Component
{

    public $user;

    public function mount($id=false) {
        if(!$id) {
            $id = auth()->user()->id;
        }
        $this->user = User::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.pages.profile');
    }
}
