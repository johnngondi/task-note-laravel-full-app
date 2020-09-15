<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index(Request $request)
    {
        $login = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        if (!Auth::attempt($login)) {
            return response([
                'message' => 'Invalid Login Credentials'
            ]);
        }

        $accessToken = Auth::user()
            ->createToken('authToken')
            ->accessToken;
        return response([
            'message' => 'Login Successful',
            'user' => Auth::user(),
            'token' => $accessToken
        ]);
    }


}
