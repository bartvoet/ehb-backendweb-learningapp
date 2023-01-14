<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserInfoController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth', ['except' => ['index', 'show']]);
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
      
}
