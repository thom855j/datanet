<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Helpers;

use App\Models\Users\User;
use App\Models\Hosts\Host;

class Auth {

    public function user() {
        return User::find($_SESSION['user']);
    }

     public function host() {
        return Host::where('host_root', '=', $_SESSION['user']);
    }

    public function check() {
        return isset($_SESSION['user']);
    }

    public function attempt($username, $password) {

        $user = User::where('user_login', $username)->first();

        if (!$user) {
            return false;
        }

        
        if ($password == base64_decode($user->user_pass)) {

            $_SESSION['user'] = $user->ID;
            return true;
        }

        return false;
    }

    public function logout() {
        unset($_SESSION['user']);
    }

}
