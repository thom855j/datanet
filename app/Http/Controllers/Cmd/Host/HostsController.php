<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\Cmd\Host;

use App\Http\Controllers\Controller;
use App\Models\Hosts\Host;

class HostsController extends Controller {

    public function get($req, $res, $args) {
        
    }

        public function post($req, $res, $args) {

        if( count($_SESSION['input']) === 1) {
            $data = Host::all()
            ->toArray();

            echo json_encode(['feedback'=> htmlTable($data)]);
          
        }

    }

}
