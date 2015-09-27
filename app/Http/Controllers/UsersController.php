<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }
    public function create()
    {
    	return View ('user.create');
    }

    public function store(){
    	$user=new User;
    	$user=Input::get('nama');
    	$user=Input::get('username');
    	$user=Input::get('password');
    	$user->save();
    }
}
