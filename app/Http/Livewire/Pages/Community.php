<?php

namespace App\Http\Livewire\Pages;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Community extends Component
{

    use WithPagination;

    public $q;

    public function render()
    {
        return view('livewire.pages.community',[
            'users'=>User::where([
                ['name','LIKE','%'.$this->q.'%']
            ])->simplePaginate(12)
        ]);
    }
}
