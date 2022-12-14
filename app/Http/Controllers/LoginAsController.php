<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginAsController extends Controller
{
    public function loginas() {
        if(shane()->isAdmin()) {
            $id = request()->input('id');


            $user = Auth::loginUsingId($id);
            session(['password_hash_sanctum' => $user->getAuthPassword()]);

        }

        return redirect(route('profile'));
    }
}
