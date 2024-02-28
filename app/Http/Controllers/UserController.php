<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller
{
    public function userLogin(){
       return Socialite::driver('facebook')->redirect();
    }

  /**
   * Callback function for user authentication via Facebook
   */
  public function userCallback(){
      // Get user data from Facebook
      $user = Socialite::driver('facebook')->user();
      
      // Check if the user already exists in the database
      $data = User::where('facebook_id', $user->getId())->first();
      if($data){
          // If user exists, log them in and redirect to the dashboard
          Auth::login($data);
          session()->put('userName', $user->getName());
          return redirect('/admin/dashboard');
      }else{
          // If user doesn't exist, create a new user and log them in, then redirect to the dashboard
          $newUser = User::updateOrCreate(
              ['name' => $user->getName()],
              [
                  'email' => $user->getEmail(),
                  'facebook_id' => $user->getId(),
                  'facebook_access_token' => $user->token,
                  'password' => encrypt('vipul123')
              ]
          );
          Auth::login($newUser);
          return redirect('/admin/dashboard');
      }
  }

 /**
  * Log out the user and forget the user's name from the session
  *
  * @return \Illuminate\View\View
  */
/**
 * Logout the user and return the welcome view.
 */
public function logout(){
    // Forget the userName session
    Session::flash('userName');
    // Logout the user
    Auth::logout();
    // Return the welcome view
    return view('welcome');
}
}
