<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\api\UserResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function index(Request $request)
    {

        return response(User::all());
    }


    public function store(Request $request)
    {
        $this->validateUser();
        if (\request('password') != \request('confirm')){
            return response(['message' => 'Passwords does not match '], 400);
        }
        $user = new User(request(['name', 'email']));
        $user->password = Hash::make($request->password);
        $user->save();

//        return $user;

        //Create Token for new user
        $login = [
            'email' => $user->email,
            'password' => $request->password
        ];
        if (!Auth::attempt($login)) {
            return response([
                'message' => 'Invalid Login Credentials'
            ]);
        }

        $accessToken = Auth::user()
            ->createToken('authToken')
            ->accessToken;


        return response(new UserResource([
            'message' => 'Registration Successful',
            'user' => Auth::user(),
            'token' => $accessToken
        ]), 201);

    }


    public function show(User $user)
    {
        //get Authenticated user profile
        $user = Auth::user();

        //return user profile as a JSON resource
        return response(new UserResource($user));
    }


    public function update(Request $request, User $user)
    {
        //
    }


    public function destroy(User $user)
    {
        //
    }


    public function validateUser()
    {
        return request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
        ]);
    }
}
