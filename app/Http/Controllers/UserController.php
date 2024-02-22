<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller
{
    public function userLogin(){
       return Socialite::driver('facebook')->redirect();
    }

    public function userCallback(){
        
        $user=Socialite::driver('facebook')->user();
        
        // dd($user->token);
        $data=User::where('facebook_id',$user->getId())->first();
        if($data){
            Auth::login($data);
        //    $singleUser= User::where('facebook_id',$user->getId())->update(['facebook_access_token'=>$user->token]);
        //    dd($singleUser);
        //    $singleUser->facebook_access_token=$user->token;
        session()->put(
          'userName',$user->getName()
        );
            return redirect('/home');
        }else{
            $newUser= User::updateOrCreate(['name'=>$user->getName()],['email'=>$user->getEmail(),'facebook_id'=>$user->getId(),'facebook_access_token'=>$user->token,'password'=>encrypt('vipul123')]);
            
            Auth::login($newUser);
            return redirect('/');
        }
    }

    public function logout(){
        session()->forget('userName');
        Auth::logout();
        return redirect('/home');
    }
}
