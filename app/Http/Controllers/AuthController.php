<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Schedule;
 

class AuthController extends Controller
{
    public function auth(Request $request){
        
        $user = User::where('email', $request->email)->first(); #confere se o email esta no banco

        Hash::check($request->password, $user->password); #confere se a senha esta certa
        if(!$user || !Hash::check($request->password, $user->password)){
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect']
            ]);
        }

        $user->tokens()->delete();

        $token = $user->createToken($request->device_name, ['server:upda'])->plainTextToken;

        return response()->json([
            'token' => $token,
        ]);
    }
}
