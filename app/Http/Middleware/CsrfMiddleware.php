<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Middleware;

class CsrfMiddleware extends Middleware {

    public function __invoke($req, $res, $next) {

        $keyPair = $this->c->csrf->generateToken();

        $this->c->view->getEnvironment()->addGlobal('csrf', [
            'field' =>
            '<input type="hidden" name="' . $this->c->csrf->getTokenNameKey() . '" value="' . $keyPair['csrf_name'] . '">'
            . '<input type="hidden" name="' . $this->c->csrf->getTokenValueKey() . '" value="' . $keyPair['csrf_value'] . '">
            ']);

        return $next($req, $res);
    }

}
