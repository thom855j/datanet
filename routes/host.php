<?php

use App\Http\Middleware\Auth\AuthHostMiddleware;

$app->group('', function() {

    // Home
    $this->get('/host/{hostname}', 'HostController:getIndex')->setName('auth.host');

})->add(new AuthHostMiddleware($container));
