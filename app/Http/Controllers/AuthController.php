<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    use HttpResponses;

    public function login(Request $request){
        if (Auth::attempt($request->only('email', 'password'))){
            return $this->success('Authorized', 200, ['token' => $request->user()->createToken('invoice')->plainTextToken]);
        }
        return $this->error('Unauthorized', 403);
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();

        return $this->success('Logged out', 200);
    }

}
