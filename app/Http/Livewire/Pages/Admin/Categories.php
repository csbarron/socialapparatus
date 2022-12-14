<?php

namespace App\Http\Livewire\Pages\Admin;

use App\Models\Category;
use Livewire\Component;

class Categories extends Component
{

    public $editing = 0;
    public $title;

    public function mount() {
        if(!shane()->isAdmin()) {
            die('404');
        }
    }

    public function edit($id) {
        $this->resetErrorBag();
        if($this->editing == $id) {
            $this->reset();
        } else {
            $this->editing = $id;
            $category = Category::findOrFail($id);
            $this->title = $category->title;
        }
    }

    public function save() {
        $category = Category::findOrFail($this->editing);
        $category->title = $this->title;
        $category->save();
        $this->resetErrorBag();
        $this->reset();
        $this->emit('resetCategories');
    }

    public function cancel() {
        $this->resetErrorBag();
        $this->reset();
    }

    public function updateCategoryOrder($data) {
        foreach($data as $d) {
            $order = $d['order'];
            $value = $d['value'];
            $category = Category::findOrFail($value);
            $category->order = $order;
            $category->save();
        }
        $this->emit('resetCategories');
    }

    public function render()
    {
        return view('livewire.pages.admin.categories',[
            'categories'=>Category::orderBy('order','asc')->get()
        ]);
    }
}
