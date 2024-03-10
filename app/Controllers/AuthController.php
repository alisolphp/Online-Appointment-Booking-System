<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{
    private $user;

    public function __construct(){
        $this->user = new UserModel();
    }

    public function signin()
    {
        // Display login form
        return view('auth/login');
    }

    public function handleSignin()
    {   
        // Handle form submission for login
        $username = input('username');
        $password = input('password');

        $userID = $this->validateUser($username, $password);

        // Validate credentials
        if ($userID > 0) {
            // Authentication successful

            $cookie_name = "user_id";
            $cookie_value = $userID;
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

            response()->redirect(url('reservations'));
        } else {
            // Authentication failed
            response()->redirect(url('auth.signin').'?error=1');
        }
    }

    private function validateUser($username, $password)
    {
        // Validate user credentials against the database
        
        return $this->user->validateCredentials($username, $password);
    }


}
