<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\Cmd\Host;

use App\Http\Controllers\Controller;
use App\Models\Hosts\Host;

class HostnameController extends Controller {

    public function get($req, $res, $args) {
        
    }

        public function post($req, $res, $args) {

        if( count($_SESSION['input']) === 1) {
            
            if ($this->auth->checkHost()) {
                $hostname = $this->auth->host()->host_name;
                $os = $this->auth->host()->host_type;
                echo json_encode(['feedback'=> "{$hostname} ($os)"]);
            }
          
        }

    }

}
