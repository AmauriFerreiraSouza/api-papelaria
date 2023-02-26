<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //Login
    public function login(Request $request)
    {
        $array = ['error' => ''];

        $creds = $request->only('email', 'password');

        $token = Auth::attempt($creds);

        if ($token) {

            $array['token'] = $token;

            User::where('email', $creds['email'])

                ->update(['token' => $token]);

        } else {

            $array['error'] = "E-mail e/ou senhas incorretos.";

        }
        
        return $array;
    }

    public function logout()
    {
        $array = ['error' => ''];

        Auth::logout();

        return $array;
    }
}
