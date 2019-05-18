<?php

use App\Http\Middleware\Auth\AuthHostMiddleware;

$app->group('', function() {

    // Home
    $this->get('/host/{hostname}', 'HostController:getIndex')->setName('auth.host');

    $this->get('/host/{hostname}/wall', 'HostController:getWall')->setName('auth.host.wall');

})->add(new AuthHostMiddleware($container));
