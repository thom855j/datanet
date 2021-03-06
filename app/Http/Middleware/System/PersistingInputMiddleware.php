<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Middleware\System;
use App\Http\Middleware\Middleware;

class PersistingInputMiddleware extends Middleware {

    public function __invoke($req, $res, $next) {

        $this->c->view->getEnvironment()->addGlobal('input', $_SESSION['input']);
        $_SESSION['last_input'] = $req->getParams();

        return $next($req, $res);
    }

}
