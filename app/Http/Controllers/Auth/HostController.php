<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class HostController extends Controller {

    public function getIndex($req, $res, $args) {

        $os = $this->auth->host()->host_type;

        if(file_exists(APP_VIEWS . "auth/host/{$os}.twig")) {
            return $this->view->render($res, "auth/host/{$os}.twig");
        } else {
            return $this->view->render($res, "auth/host/BASIC.twig");
        }

    }

    public function getWall($req, $res, $args) {
       $wall = $this->auth->host()->host_content;
       echo $wall;
    }



}
