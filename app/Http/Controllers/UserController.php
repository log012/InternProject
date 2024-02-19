<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller
{
    public function userLogin(){
       return Socialite::driver('facebook')->redirect();
    }

    public function userCallback(){
        $user=Socialite::driver('facebook')->user();
        
        // dd($user);
        $data=User::where('facebook_id',$user->getId())->first();
        if($data){
            Auth::login($data);
            return redirect('/');
        }else{
            $newUser= User::updateOrCreate(['name'=>$user->getName()],['email'=>$user->getEmail(),'facebook_id'=>$user->getId(),'password'=>encrypt('vipul123')]);
            
            Auth::login($newUser);
            return redirect('/');
        }
    }
}
