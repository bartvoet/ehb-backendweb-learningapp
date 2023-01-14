<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{

    private function prepareUsers(Request $request)
    {
        $users = NULL;
        if($request->has("userfilter")) {
            $users = User::
                    where('email', 'like', "%" . $request->input('userfilter') . "%")->get()
                    ->pluck('email', 'id');
            
        } else {
            $users = User::all()->pluck('email', 'id');
        }
        return view('admininfo',["users" => $users ]);
    }

    public function index(Request $request)
    {
        return $this->prepareUsers($request);
    }

    public function post(Request $request)
    {
        $userid = $request->input("userid");
        $user = User::find($userid);
        $user->is_admin = True;
        $user->save();
        return $this->prepareUsers($request);
    }
}
