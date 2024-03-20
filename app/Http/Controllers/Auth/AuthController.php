<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Login\StoreRequest as LoginStoreRequest;
use App\Http\Requests\Register\StoreRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(StoreRequest $request)
    {
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $user->save();

        return response()->json([
            'message' => 'Successfully created user!',
        ], 201);
    }
    public function login(LoginStoreRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user || !\Hash::check($request->password, $user->password)) {
            return response()->json([
                'errors' => [
                    'password' => ['The provided credentials are incorrect.']
                ]
            ], 401);
        }
        $auth_token = $user->createToken('auth-token')->plainTextToken;
        return response()->json([
            'access_token' => $auth_token,
            'token_type' => 'Bearer'
        ]);
    }

    public function logout(Request $request)
    {
        /* auth()->user()->tokens()->delete(); */
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}
