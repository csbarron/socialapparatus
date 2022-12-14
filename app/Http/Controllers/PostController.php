<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    public function delete() {
        $id = request()->input('id');
        $post = Post::findOrFail($id);
        if(shane()->canDelete($post)) {
            $post->delete();
        }

        return redirect()->back();
    }
}
