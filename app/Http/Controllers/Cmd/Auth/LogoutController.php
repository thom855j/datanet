<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\Cmd\Auth;

use App\Http\Controllers\Controller;
use App\Models\Users\User;
use Respect\Validation\Validator as v;

class LogoutController extends Controller {

    private function redirectUrl($url, $auth) {

        echo json_encode([
            'redirect' => 1, 
            'feedback' => 'Session closed.',
            'redirect_url' => $this->router->pathFor($url, $auth)
        ]);
    }

    public function get($req, $res, $args) {

        echo 'Nope';
    }

    public function post($req, $res, $args) {

        if($this->auth->checkUser()) {

            if($this->auth->checkHost()) {

                $this->auth->hostLogout();
                return $this->redirectUrl('auth.user', 
                    ['username' => $this->auth->user()->user_name]
                );

            } else {

                $this->auth->user()->touch();
                $this->auth->userLogout();
                return $this->redirectUrl('system.lobby');
            }

        }

        return false;
    }

}
