<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\Cmd\Host;

use App\Http\Controllers\Controller;
use App\Models\Hosts\Host;
use Respect\Validation\Validator as v;

class RloginController extends Controller {

    private function redirectUrl($username) {

         echo json_encode([
            'redirect' => 1, 
            'redirect_url' => $this->router->pathFor('auth.host', ['hostname' => $hostname])
        ]);
    }

    public function get($req, $res, $args) {
        return $this->post($req, $res, $args);
    }

    public function post($req, $res, $args) {

        if( count($_SESSION['input']) < 2) {
            echo json_encode(['feedback'=> 'Missing parameters. Use <b>RLOGIN</b> < hostname > < password >.']);
            return false;
        }

        $user = $this->auth->hostAttempt($req->getParam('hostname'), $req->getParam('password'));

        if($user && $this->auth->host()->host_active == 1) {

            //$this->auth->user()->update(['user_ip' => getUserLocation()]);
            return $this->redirectUrl($req->getParam('username'));

        } else {
            echo json_encode(
                ['feedback'=> 'Identification not recognized by remote system or user banned. Please try again.']
            );
            return false;
        }

    }

}
