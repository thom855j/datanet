<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;

class LobbyController extends Controller {

    public function index($req, $res, $args) {
        return $this->view->render($res, 'guest/lobby.twig');
    }

}
