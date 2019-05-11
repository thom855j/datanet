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

    private function redirectUrl() {

        echo json_encode([
            'redirect' => 1, 
            'feedback' => 'Session closed.',
            'redirect_url' => $this->router->pathFor('system.lobby')
        ]);
    }

    public function get($req, $res, $args) {

        return $this->post($req, $res, $args);
    }

    public function post($req, $res, $args) {

        if($this->auth) {
        
            $this->auth->user()->touch();
            $this->auth->logout();
            return $this->redirectUrl();
        }

        return false;
    }

}
