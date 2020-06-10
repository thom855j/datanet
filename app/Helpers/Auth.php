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
        if(isset($_SESSION['user'])) {
            return User::find($_SESSION['user']);
        }

        return false;
    }

     public function host() {
        if(isset($_SESSION['host'])) {
            return Host::where('ID', $_SESSION['host'])->first();
        }

        return false;
    }

    public function checkUser() {
        return isset($_SESSION['user']);
    }

    public function checkHost() {
        return isset($_SESSION['host']);
    }

    public function hostAttempt($hostname, $password) {

        $host = Host::where('host_name', $hostname)->first();

        if (!$host) {
            return false;
        }

        
        if ($password == base64_decode($host->host_password)) {

            $_SESSION['host'] = $host->ID;
            return true;
        }

        return false;
    }

    public function userAttempt($username, $password) {

        $user = User::where('user_name', $username)->first();

        if (!$user) {
            return false;
        }

        
        if ($password == base64_decode($user->user_pass)) {

            $_SESSION['user'] = $user->ID;
            return true;
        }

        return false;
    }

    public function userLogout() {
        unset($_SESSION['user']);
    }

    public function hostLogout() {
        unset($_SESSION['host']);
    }

}
