<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public $user_service; 

	public function __construct(
        UserService $user_service)
	{
        $this->user_service = $user_service; 
		$this->middleware('auth');
	}

    public function index(Request $request)
    {   
        return view('users.index', ['users' => $this->user_service->getUsers() ]);
    }

    public function profile(Request $req, $id)
    {
        $user = User::findOrFail($id); 
        return view('users.profile', 
            [
                'user'      => $user,
                'person'    => $user->person()->first(),
            ]); 
    }

    public function add(Request $req)
    {
        return view('users.create'); 
    }

    public function edit(Request $req)
    {
        return view('users.edit'); 
    }

    public function config(Request $req)
    {
        return view('users.config'); 
    }


    public function add2(Request $request)
    {

        $data = null; 
        $companies = Company::pluck('name', 'id'); 

        if ($request->isMethod('post')) {

            //valida dados do formulário ------------------------------------------------------------
            
            $validator = $this->validateUser($request);

            if ($validator->fails()) {
                Session::flash("notification", [
                    "class"     => "red",
                    "message"   => "Identificamos que alguns dados não são válidos nesse cadastro."
                ]);
                return redirect()->back(); 
            } 
            
            //----------------------------------------------------------------------------------------

            $user = new User; 
            $user->name = $request->input('name'); 
            $user->cpf = $request->input('cpf'); 
            $user->entry = $request->input('entry'); 
            $user->company()->associate(Company::find($request->input('company')));  
            $user->email = $request->input('email'); 
            $user->password = Hash::make($request->input('password')); 

            $saved = $user->save();

            Session::flash("notification", [
                "class"     => !$saved ? "red" : "green",
                "message"   => !$saved ? "Por favor, verifique o preenchimento do formulário" :
                "Usuário cadastrado com sucesso!"
            ]);
        
            $data = !$saved ? $user : null; 
        }

        return view('users.add', ['companies' => $companies, 'data' => $data]);
    }

    public function remove($id)
    {
        if ($user = User::findOrFail($id)){
            $user->delete(); 

            Session::flash("notification", [
                "class"     => "red",
                "message"   => "{$user->name} foi removido do sistema!"
            ]);

            return redirect()->back();
        }
    }

    public function edit2($id)
    {
        $user = User::find($id); 

        if (!$user) {
            Session::flash("notification", [
                "class"     => "amber",
                "message"   => "Esse usuário não foi encontrado!"
            ]);
            return redirect('home'); 
        } 

        $companies = Company::all(); 

        return view('users.edit', ['companies' => $companies, 'data' => $user]);
    }

    public function update(Request $request)
    {
        
        if (!$request->input('id') || !is_numeric($request->input('id'))) {
            
            Session::flash("notification", [
                "class"     => "red",
                "message"   => "Algo errado aconteceu ao tentar editar esse usuário, favor tente novamente."
            ]);

            return redirect()->back(); 
        }

        //valida dados do formulário ------------------------------------------------------------
        
        $ignorePassword = true; 
        $validator = $this->validateUser($request, $ignorePassword); 
    
        if ($validator->fails()) {
            Session::flash("notification", [
                "class"     => "red",
                "message"   => "Identificamos que alguns dados não são válidos nesse cadastro."
            ]);
            return redirect()->back(); 
        } 


        
        //----------------------------------------------------------------------------------------
  

        $user = User::find($request->input('id')); 
        $user->name = $request->input('name'); 
        $user->cpf = $request->input('cpf'); 
        $user->entry = $request->input('entry'); 
        $user->email = $request->input('email');

        $user->company()->associate(Company::find($request->input('company'))); 
                
        //validação de password e confirmação ---------------------------------------------------

        if (!empty($request->input('password')) && !empty($request->input('confirm_password'))){

            if ($request->input('password') != $request->input('confirm_password')) {
                Session::flash("notification", [
                    "class"     => "red",
                    "message"   => "O campo confirmação de senha está incorreto. A senha NÃO foi atualizada!" 
                ]);
                return redirect()->back(); 
            }
            $user->password = Hash::make($request->input('password')); 
        }
        //--------------------------------------------------------------------------------------

        $saved = $user->save(); 

        Session::flash("notification", [
            "class"     => !$saved ? "red" : "green",
            "message"   => !$saved ? "Aconteceu algum problema ao atualizar os dados de {$user->name}, favor tente novamente." :
            "Usuário {$user->name} foi atualizado com sucesso!" 
        ]);
        
        return redirect()->back();
    }

    public function validateUser($request, $ignorePassword = false) 
    {
        //validations------------------------

        $rules = array(
            'name'        => 'required',                        
            'cpf'         => 'required|unique:users,{$request->id}|regex:/^[0-9]{3}.[0-9]{3}+.[0-9]{3}+\-[0-9]{2}+$/',     
            'entry'       => 'required|date_format:d/m/Y',
            'email'       => 'required|email|unique:users,{$request->id}',
        );

        if (!$ignorePassword)
            $rules['password'] ='required'; 

        //-----------------------------------

        return Validator::make($request->all(), $rules);
    }



    public function profileImage($id)
    {
        return Image::make(storage_path() . '/app/users/profile/'.$id.'/'.$id.'jpg')->response();
    }
}
