<?php

namespace App;


use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','nama', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    public $timestamps=false;

    // protected $hidden = ['password', 'remember_token'];

    public static $rules = [
        'nama'=>'required',
        'email'=>'required|email',
        'password'=>'required'
    ];

    public static $pesan = [
        'nama.required'=>'nama harus di isi',
        'email.required'=>'email harus di isi',
        'password.required'=>'password harus di isi',  
    ];

    public function addUser(Request $request){
        $user=new User;
        $user->nama=$request->input('nama');
        $user->email=$request->input('email');
        $user->password=bcrypt($request->input('password'));
        $user->save();
    }
}
