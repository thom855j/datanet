<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Middleware\Cmd;
use App\Http\Middleware\Middleware;

class AuthMiddleware extends Middleware {

    public function __invoke($req, $res, $next) {

        if(!$this->auth->checkUser()) {
            $this->response->withStatus(404);
        }

        return $next($req, $res);
    }

}
