<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterUserController extends Controller
{
    public function register(Request $request){
        $request->validate([
                'name' => 'required|min:4',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8|alpha_num'
            ]
        );

        $user['name'] = $request->name;
        $user['email'] = $request->email;
        $user['password'] = bcrypt($request->password);
        User::create($user);
        return response()->json( ['message'=> 'User created'] ,201);
    }
}
