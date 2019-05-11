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

        return $this->view->render($res, 'auth/host/index.twig');
    }

}
