<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\Cmd\System;

use App\Http\Controllers\Controller;

class HelpController extends Controller {

    public function get($req, $res, $args) {

    }

    public function post($req, $res, $args) {

        if( count($_SESSION['input']) === 1) {

            if($this->auth->check()) {
                $data = require APP_DATA . 'commands/auth.php';
                echo json_encode(['feedback'=> multiTable($data)]);
            } else {
                $data = require APP_DATA . 'commands/guest.php';
                echo json_encode(['feedback'=> multiTable($data)]);
            }
          
        }

    }

}
