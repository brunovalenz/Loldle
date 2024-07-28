<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service\UsersServiceInterface;
use App\Http\Requests\UserFormRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $service;

    public function __construct(UsersServiceInterface $service)
    {
        $this->service = $service;
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        return view ('user.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(UserFormRequest $request){
        #validar o campo antes de efetivamente criar
        
        $registro=$request->all();
        
        try{
            
            $data = $request->validated();
            $registro = $this->service->store($registro);
            return redirect()->route('user.index')->with('success','Registro cadastrado com sucesso!');
        }catch(Exception $e){
            
            return view('user.create',['registro'=>$registro,'fail'=>$e->getMessage()]);
        }
    }
}
