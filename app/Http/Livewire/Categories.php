<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Categories extends Component
{

    public $categories = [];

    protected $listeners = [
        'resetCategories'=>'calculate'
    ];

    public function mount( ) {
        $this->calculate();
    }

    public function calculate() {
        $this->categories = \App\Models\Category::orderBy('order','asc')->get();
    }

    public function render()
    {
        return view('livewire.categories',[
            'categories'=>$this->categories
        ]);
    }
}
