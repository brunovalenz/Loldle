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
    public function auth(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'The provided credentials are incorrect'], 401);
        } else {
            $user->tokens()->delete();

            $token = $user->createToken('Teste', ['Teste'])->plainTextToken;

            return response()->json(['token' => $token], 200);
        }
    }

        

        // return response()->json([
        //     'token' => $token,
        // ]);
}
