<?php

use App\Http\Middleware\Auth\AuthUserMiddleware;

$app->group('', function() {

    // Home
    $this->get('/user/{username}', 'UserController:getIndex')->setName('auth.user');

})->add(new AuthUserMiddleware($container));
