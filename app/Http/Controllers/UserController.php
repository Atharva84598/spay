<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;
class UserController extends Controller
{
    public function store(Request $request){

$request->validate([
'name'   => 'required',
'email'  => 'required',
'password' => 'required|max:12|min:5'

]);

$input = $request->all(); 
$input['password']= Hash::make($input['password']);
User::create($input);
return redirect('/register')->with('success','form submitted successfully');


    }

public function registerview(){

    return view('Auth.register');
}


public function login(Request $request){

    $cred = $request->validate([
        'email'   => 'required',
        'password'  => 'required'
    ]);


    if(Auth::attempt($cred)){
         
        return "working";
    }
}
}
