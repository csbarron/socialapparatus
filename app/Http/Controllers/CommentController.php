<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;

class CommentController extends Controller
{
    public function delete() {
        $id= request()->input('id');
        $comment = Comment::findOrFail($id);
        if(shane()->canDelete($comment)) {
            $comment->delete();
        }

        return redirect()->back();
    }
}
