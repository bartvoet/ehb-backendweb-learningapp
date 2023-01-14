<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserInfoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function uploadAvatar(Request $request)
    {
        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images',$filename,'public');
            Auth()->user()->update(['avatar'=>$filename]);
        }
        return redirect()->back();
    }

    public function updateUser(Request $request)
    {
        $aboutme = $request->input("aboutme");
        $name = $request->input("name");
        $birthday = $request->input("birthday");
        $email = $request->input("email");
        Auth()->user()->update(['aboutme'=>$aboutme, 
                        'name' => $name, 
                        'birthday' => $birthday,
                     'email' => $email]);
        return redirect()->back();
    }
      
}
