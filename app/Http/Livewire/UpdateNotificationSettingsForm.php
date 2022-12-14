<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UpdateNotificationSettingsForm extends Component
{

    public $settings = [];

    public function mount()
    {
        $this->settings  = json_decode(auth()->user()->notification_preferences,true);
    }

    public function updateNotificationPreferences()
    {
        $user = auth()->user();
        $user->notification_preferences = json_encode($this->settings);
        $user->save();
        $this->emit('saved');
    }


    public function render()
    {
        return view('livewire.update-notification-settings-form');
    }
}
