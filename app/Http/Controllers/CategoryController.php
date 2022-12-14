<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public function delete() {
        if(shane()->isAdmin()) {
            $id = request()->input('id');
            $category = Category::findOrFail($id);
            $category->delete();
        }

        return redirect()->back();
    }
}
