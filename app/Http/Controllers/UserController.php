<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function register(UserRequest $request){
        $data = $request->validated();

        $data['password'] = bcrypt($data['password']);

        $user = User::where('email', $data['email'])->first();

        if ($user) return response(['message' => 'User with this email already exists']);
        $user = User::create($data);

        $token = auth()->tokenById($user->id);

        return response([
            'success' => true,
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => 60
        ]);
    }
}
