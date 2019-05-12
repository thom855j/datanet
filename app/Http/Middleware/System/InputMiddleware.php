<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Middleware\System;
use App\Http\Middleware\Middleware;

class InputMiddleware extends Middleware {

    public function __invoke($req, $res, $next) {

        $_SESSION['input'] = explode(" ", $req->getParam('input'));

        return $next($req, $res);
    }

}
