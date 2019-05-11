<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Middleware;

class AuthMiddleware extends Middleware {

    public function __invoke($req, $res, $next) {

        if (!$this->auth->check()) {
            return $res->withRedirect($this->router->pathFor('system.lobby'));
        }

        return $next($req, $res);
    }

}
