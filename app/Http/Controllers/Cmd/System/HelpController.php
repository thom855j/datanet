<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\Cmd\System;
use App\Models\System\Command;

use App\Http\Controllers\Controller;

class HelpController extends Controller {

    public function get($req, $res, $args) {

    }

    public function post($req, $res, $args) {

        if( count($_SESSION['input']) === 1) {

            if($this->auth->check()) {
                $data = Command::getCommands(true);
                $more = '<br> More commands become available after login to host.';
                
                echo json_encode(['feedback'=> multiTable($data) . $more]);
            } else {
                $data = Command::getCommands(false);
                $more = '<br> More commands become available after login.';

                echo json_encode(['feedback'=> multiTable($data) . $more]);
            }
          
        }

    }

}
