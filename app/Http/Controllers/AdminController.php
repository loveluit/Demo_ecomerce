<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function Admin_user()
    {
        $users = User::all();
        return view('Admin.user', [
            'users' => $users,
        ]);
    }

    // User Add Status ba usertype

    public function Admin_usertype($user_id)
    {

        $users = User::find($user_id);

        if ($users->usertype == 'admin') {

            User::find($user_id)->update([
                'usertype' => 'user',
            ]);
            return back();
        } else {

            User::find($user_id)->update([
                'usertype' => 'admin',
            ]);
            return back();
        }
    }  //
}
