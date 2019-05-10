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

class LoginController extends Controller {

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

        $cmd = explode(' ', $req->getParam('input'));

        if( count($cmd) < 2) {
            echo json_encode(['error'=> 'Missing parameters. Have to be <b>LOGIN</b> < username > < password >.']);
            return false;
        }

        $user = $this->auth->attempt($req->getParam('username'), $req->getParam('password'));

        if($user && $user->user_status == 1) {

            $this->auth->update(['user_ip' =>getIP()]);
            return $this->redirectUrl($req->getParam('username'));

        } else {
            echo json_encode(
                ['error'=> 'Identification not recognized by system or user banned. Please try again.']
            );
            return false;
        }

    }

}
