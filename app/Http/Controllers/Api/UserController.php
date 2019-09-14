<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    //

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6'
        ]);

        $data = $request->all();
        $data['api_token'] = str_random(100);
        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);

        if($user) {
            return $user;
        }

    }
}
