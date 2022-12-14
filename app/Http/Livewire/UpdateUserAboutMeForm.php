<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UpdateUserAboutMeForm extends Component
{

    public $about;
    public $user;

    public function mount() {
        $this->user = auth()->user();
        $this->about = $this->user->about;
    }

    public function updateAboutMe() {
        $this->user->about = $this->about;
        $this->user->save();
        $this->resetErrorBag();
        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.update-user-about-me-form');
    }
}
