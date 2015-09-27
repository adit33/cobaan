<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;


class UserController extends Controller
{

 

    public function index(){

        $users=User::all();

        return View('user.index',compact('users'));

    }

    public function apiUser() {
        $users = User::all();
        return $users;
    }

    public function apiStore(Request $request) {
      $user=new User;
      $data=$user->addUser($request);
       return response()->json($data);
    }

    public function create()
    {
         $users=User::all();
    	return View('user.create',compact('users'));
    }

    public function edit($id){
         $user=User::find($id);
         return View('user.edit',compact('user'));
    }

    public function store(Request $request){
        $user=new User;
        // $validator = Validator::make($request->all(),User::$rules,User::$pesan);
        // if ($validator->fails())
        // {
        //     return redirect('user/create')->withErrors($validator)->withInput();
        // }
        
        $user->addUser($request);
        return response()->json($user);
    }

    public function update($id){
        $user=User::find($id);
        $user->nama=$request->input('nama');
        $user->email=$request->input('email');
        $user->password=$request->input('password');
        $user->save();
        return response()->json(array('success' => TRUE));
    }

    public function destroy($id) {
       
        $user = User::find($id);
        if ($user->delete()) {
            return response()->json(array('success' => TRUE));
        }
    }

    public function login(){
        return View('login');
    }

    public function doLogin(Request $request)
    {
        $user=$request->input('email');

       
        $rules = array(
                        'email'    => 'required',
                        'password' => 'required|alphaNum|min:4'
        );

        $pesan = array(
                        'email.required'    => 'username harus di isi',
                        'password.required' => 'password harus di isi'
        );
        $validator = Validator::make($request->all(), $rules,$pesan);
        if ($validator->fails()) {
                        return redirect('login')
                                        ->withErrors($validator)
                                        ->withInput($request->except('password'));
        } 
        
        else {
                        $userdata = array(
                                        'email'       => $request->input('email'),
                                        'password'  => $request->input('password')
                        );

                        if (Auth::attempt($userdata)) {
                                        return redirect('/dashboard')->with('successMessage','Selamat Datang '.Auth::user()->nama);
                        } else {               
                                        return redirect('login')->with('errorMessage','Username dan Password tidak cocok');
                        }
        }
    }

    public function logout()
    {
        Auth::logout();
      //  Session::flush();
        return Redirect('/login')->with('successMessage','Anda berhasil Logout');
    }

}
