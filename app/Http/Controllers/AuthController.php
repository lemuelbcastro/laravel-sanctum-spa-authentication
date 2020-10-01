<?php

namespace App\Http\Controllers;

use App\Http\Resources\User as UserResource;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($validated)) {
            return response()->json(['user' => new UserResource(Auth::user())]);
        }

        throw new AuthenticationException;
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed'
        ]);

        $validated['password'] = bcrypt($request->password);

        $user = User::create($validated);

        return response()->json(['user' => new UserResource($user)]);
    }

    public function user(Request $request)
    {
        return new UserResource($request->user());
    }
}
