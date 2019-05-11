<?php

use App\Http\Middleware\Auth\UserMiddleware;

$app->group('', function() {

    // Home
    $this->get('/host/{hostname}', 'HostController:getIndex')->setName('auth.host');

})->add(new UserMiddleware($container));
