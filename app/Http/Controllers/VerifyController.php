<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;

class VerifyController extends Controller
{
   
    public function verify(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        if ($validator->fails())
        	return json_encode(array('success' => false));

        $authenticable = Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]); 
        echo json_encode(array('success' => $authenticable ? true : false)); 
    }
}
