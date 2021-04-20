<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $req){

        $user = User::where([
            'email'=> $req->email
        ])->first();

        //if(!$user || Hash::check($req->password, $user->password)){
        if(!$user || Hash::check($req->password, $user->password)){
            
            print_r(Hash::make($req->password));
            print_r('<br/>');
            print_r($user->password);
            print_r('<br/>');
            return 'Username or password is not matched!';
        }
        else{
            $req->session()->put('user', $user);
            return redirect('/');
        }
        return $user;
    }
}
