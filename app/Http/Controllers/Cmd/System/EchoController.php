<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\Cmd\System;

use App\Http\Controllers\Controller;

class EchoController extends Controller {

    public function get($req, $res, $args) {

    }

    public function post($req, $res, $args) {

        if( count($_SESSION['input']) < 2) {

            echo json_encode(['feedback'=> 'Missing parameters. Use <b>ECHO</b> < text > .']);
            return false;
        }

        echo json_encode(['feedback'=> $req->getParam('message')]);

    }

}
