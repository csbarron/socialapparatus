<?php

namespace App\Http\Livewire\Pages\Admin;

use App\Models\Settings;
use Livewire\Component;

class General extends Component
{

    public $site_name;
    public $site_description;
    public $keywords;
    public $home_page;

    public function mount() {
        if(!shane()->isAdmin()) {
            die('404');
        }
        $setting = Settings::first();
        $this->site_name = $setting->site_name;
        $this->site_description = $setting->site_description;
        $this->keywords = $setting->keywords;
        $this->home_page = $setting->home_page;
    }

    public function save() {
        $this->validate([
            'site_name'=>'string|required',
            'site_description'=>'string|sometimes',
            'keywords'=>'sometimes',
            'home_page'=>'sometimes'
        ]);
        $setting = Settings::first();
        $setting->site_name = $this->site_name;
        $setting->site_description = $this->site_description;
        $setting->keywords = $this->keywords;
        $setting->home_page = $this->home_page;
        $setting->save();
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.pages.admin.general');
    }
}
