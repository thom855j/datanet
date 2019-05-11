<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\Cmd\User;

use App\Http\Controllers\Controller;
use App\Models\Users\User;

class FingerController extends Controller {

    public function get($req, $res, $args) {

    }

    public function post($req, $res, $args) {

        $cmd = explode(' ', $req->getParam('input'));

    if( count($cmd) === 1) {
        $data = User::where("user_active", "=", 1)
        ->select('user_login AS username', 'user_last as last', 'user_ip as where', 'user_status AS status')
        ->get()
        ->toArray();

        echo json_encode(['feedback'=> htmlTable($data)]);

          
        }

    }

}
