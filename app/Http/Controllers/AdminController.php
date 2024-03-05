<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Middleware\RefreshFacebookToken;
use App\Models\User;
use App\repository\AdminRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{
    private AdminRepository $adminRepository;

    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function dashboard()
    {

        return $this->adminRepository->dashboard();
    }

    public function home()
    {
        return view('admin.home');
    }

    public function register()
    {
        return view('register');
    }

    public function developer()
    {
        return view('admin.developer');
    }

    public function login()
    {
        return view('login');
    }

    public function profile()
    {
        return view('admin.profile');
    }


    public function read_lead_message()
    {
        return $this->adminRepository->read_lead_message();
    }

    public function getFacebookId($profile_name)
    {
        // $user = User::where('name', $profile_name)->first();

        // return view('admin.user-detail', ['user' => $user]);
        return $this->adminRepository->getFacebookId($profile_name);
    }
}
