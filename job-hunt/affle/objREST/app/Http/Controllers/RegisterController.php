<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\User;

class RegisterController extends Controller
{
    public function register(StoreUserRequest $request){
    	
    	$user = new User;

    	$user->name = $request->get('name');
    	$user->email = $request->get('email');
    	$user->age = $request->get('age');
    	$user->password = bcrypt($request->get('password'));

    	$user->save();
    	
    }
}
