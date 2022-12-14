<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function delete() {
        $id = request()->input('id');
        $notification = auth()->user()->notifications()->where([['id','=',$id]]);
        if(shane()->canDelete($notification)) {
            $notification->delete();
        }

        return redirect()->back();
    }
}
