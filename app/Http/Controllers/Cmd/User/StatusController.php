<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\Cmd\User;

use App\Http\Controllers\Controller;

class StatusController extends Controller {

    public function get($req, $res, $args) {
        return $this->post($req, $res, $args);
    }

    public function post($req, $res, $args) {

        $cmd = explode(' ', $req->getParam('input'));

        var_dump($cmd);

        if( count($cmd) < 2) {

            echo json_encode(['feedback'=> 'Missing parameters. Use <b>STATUS</b> < message > (250 chars max).']);
            return false;
        }

        if($this->auth->check()) {
            $message = $req->getParam('message');
            $this->auth->user()->update([
                'user_status' =>$req->getParam('message')
            ]);

            echo json_encode(['feedback'=> "Status set to '" . $message . "'"]);
        }

    }

}
