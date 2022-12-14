<?php

namespace App\Http\Livewire\Pages\Profile;

use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{

    use WithFileUploads;

    public $name;
    public $avatar;
    public $cover_photo;
    public $about;
    public $website;
    public $facebook;
    public $twitter;
    public $linkedin;

    public function mount() {
        $user = auth()->user();
        $this->name = $user->name;
        $this->avatar_url = $user->avatar();
        $this->cover_photo = $user->cover();
        $this->about = $user->about;
        $this->website = $user->website;
        $this->facebook = $user->facebook;
        $this->twitter = $user->twitter;
        $this->linkedin = $user->linkedin;
    }

    public function removeCover() {
        auth()->user()->cover_photo = "";
        auth()->user()->save();
    }

    public function removeAvatar() {
        auth()->user()->avatar_url = "";
        auth()->user()->save();
    }

    public function save() {
        $this->validate([
            'name'=>'required',
            'avatar_url'=>'sometimes',
            'cover_photo'=>'sometimes',
            'about'=>'sometimes',
            'website'=>'sometimes',
            'facebook'=>'sometimes',
            'twitter'=>'sometimes',
            'linkedin'=>'sometimes'
        ]);
        $user = auth()->user();
        $user->name = $this->name;
        $user->about = $this->about;
        $user->website = $this->website;
        $user->facebook = $this->facebook;
        $user->twitter = $this->twitter;
        $user->linkedin = $this->linkedin;
        $user->save();

        if(is_file($this->avatar_url)) {
            $user->avatar_url = $this->avatar_url->store('avatars');
            $user->save();
            $this->emit('updateHeader');
        }

        if(is_file($this->cover_photo)) {
            $user->cover_photo = $this->cover_photo->store('covers');
            $user->save();
        }

        return redirect(route('profile'));

    }

    public function render()
    {
        return view('livewire.pages.profile.edit');
    }
}
