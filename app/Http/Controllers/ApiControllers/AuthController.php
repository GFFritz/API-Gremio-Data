<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->only('name', 'password');

        $credentials += [
            'active' => true,
        ];

        if ($token = $this->guard()->attempt($credentials)) {
            return $this->respondWithToken($token);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    public function register(Request $request, User $user) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $request->merge([
            'password' => Hash::make($request->input('password'))
        ]);

        $user = User::create($request->except(['is_admin']));

        $token = auth()->login($user);

        return $this->respondWithToken($token);
    }

    public function getAuthUser()
    {
        $userGuard = $this->guard()->user();

        $user = User::where('id', $userGuard->id)
            ->first();

        return response()->json($user);
    }

    public function logout()
    {
        $this->guard()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    protected function respondWithToken($token, $user = null)
    {
        $json = [
            'access_token' => $token,
            'token_type' => 'bearer',
            // 'expires_in' => $this->guard()->factory()->getTTL() * 60
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ];

        if ($user) {
            $json['user'] = $user;
        }

        return response()->json($json);
    }

    public function guard()
    {
        return Auth::guard();
    }
}
