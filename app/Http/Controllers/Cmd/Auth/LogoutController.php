<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\Cmd\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Respect\Validation\Validator as v;

class LogoutController extends Controller {

    private function redirectUrl($username) {

        echo json_encode([
            'redirect' => 1, 
            'redirect_url' => $this->router->pathFor('auth.user', ['username' => $username])
        ]);
    }

    public function get($req, $res, $args) {
        return $this->post($req, $res, $args);
    }

    public function post($req, $res, $args) {


    }

}
