<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Models\User;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|alpha_num'
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $token = $user->createToken('LaravelSanctumAuth')->plainTextToken;
            return response()->json([
                'message' => 'user logged!',
                'token' => $token
            ], 200);
        }
        return response()->json(['message' => 'Invalid user or password'], 401);
    }
}
