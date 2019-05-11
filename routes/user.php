<?php

use App\Http\Middleware\Auth\UserMiddleware;

$app->group('', function() {

    // Home
    $this->get('/user/{username}', 'UserController:getIndex')->setName('auth.user');

})->add(new UserMiddleware($container));
