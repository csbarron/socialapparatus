<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function delete() {
        $id = request()->input('id');
        if($id != auth()->user()->id && shane()->isAdmin()) {
            $user = User::findOrFail($id);
            $user->delete();
        }

        return redirect()->back();
    }
}
