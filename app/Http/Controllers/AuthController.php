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
        
         #confere se a senha esta certa
        if(!$user || !Hash::check($request->password, $user->password)){
            //  throw ValidationException::withMessages([
            //     'email' => ['The provided credentials are incorrect']
                
            //  ]);
            return view('user.index');
            
        }
        else{
            $user->tokens()->delete();

            $token = $user->createToken('Teste', ['asda'])->plainTextToken;
            

            return redirect()->route('recurso.index')->with('success','Login realizado com sucesso!');
        }

        

        // return response()->json([
        //     'token' => $token,
        // ]);
    }
}
