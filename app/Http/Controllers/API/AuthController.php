<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'name'  => 'required|string|max:255',
            'email'     => 'required|string|max:255|unique:users',
            'password'  => 'required|string|min:8'
        ]);

        //jika validasi gagal
        if ($validator->fails()) {
            return response()->json($validator->errors());

        }

        // membuat akun user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //membuat response json
        return response()->json([
            'success' => true,
            'data' => $user,
            'message' => 'akun berhasil dibuat'
        ], 201);

    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $user = User::where('email', $request->email)->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Login berhasil',
            'access_token' => $token,
            'token_type' => 'Bearer Token',
        ], 200);
    }

    public function logout(Request $request)
    {
       $request->user()->tokens()->delete();
       return response()->json([
            'message' => 'Logout berhasil'
        ], 200);
    }
}
