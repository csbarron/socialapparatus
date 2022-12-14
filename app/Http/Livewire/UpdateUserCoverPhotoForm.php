<?php

namespace App\Http\Livewire;

use App\Models\Photo;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateUserCoverPhotoForm extends Component
{

    use WithFileUploads;

    public $user;
    public $photo;

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function updateCoverPhoto()
    {
        if($this->photo) {

            $this->user->cover_photo = $this->photo->store('photos');
            $this->user->save();


        }
        $this->resetErrorBag();
        $this->emit('saved');

        $this->emit('refresh-navigation-menu');
    }

    public function render()
    {
        return view('livewire.update-user-cover-photo-form');
    }
}
