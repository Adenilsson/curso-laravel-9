<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::get();
       // dd($users);
        return view('users.index',compact('users'));
    }
    public function show($id){
        //$user = User::where('id',$id)->first();
        if(!$user = User::find($id)){
           // return redirect()->back();
           return redirect()->route('users.index');
        }


        return view('users.show', compact('user'));
    }
    public function create(){
        return view('users.create');
    }
    public function store(StoreUpdateUserFormRequest $request){
        //$request all() retorna todos os dados do formulario
        /*$request only([
            'name', 'email', 'passowrd'
        ])*/ //$request only() retorna os imputs que forem informados 
        /*dd($request->only([
            'name', 'email', 'passowrd'
        ]));*/
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $user = User::create($data);
        return redirect()->route('users.index');
        //return redirect()->route('users.show'$user->id)


    }
    public function edit(){
        if(!$user = User::find($id)){
            // return redirect()->back();
            return redirect()->route('users.index');
         }
        return view('users.edit', compact('user'));
    }
}

