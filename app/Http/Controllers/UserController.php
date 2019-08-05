<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('user', ['user'=>$user]);
    }

    public function new(Request $request)
    {
        $user = new User();
        $user->name = ucwords($request->name);
        $user->division = $request->division;
        $user->department = $request->department;
        $user->role = $request->role;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('user.view');
    }

    public function ajax_delete_user(Request $request)
    {
        $user = User::destroy($request->id);
        return "Success";
    }
}
