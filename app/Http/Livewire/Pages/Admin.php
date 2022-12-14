<?php

namespace App\Http\Livewire\Pages;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Admin extends Component
{

    use WithPagination;

    public $q;

    public function mount() {
        if(!shane()->isAdmin()) {
            die('404');
        }
    }

    public function render()
    {
        return view('livewire.pages.admin',[
            'users'=>User::where([
                ['email','like','%'.$this->q.'%']
            ])->orWhere([
                ['name','like','%'.$this->q.'%']
            ])->paginate(10)
        ]);
    }
}
