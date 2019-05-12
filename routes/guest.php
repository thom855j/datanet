<?php

use App\Http\Middleware\Auth\GuestMiddleware;

$app->group('', function() {

    $this->get('/', 'LobbyController:index')->setName('system.lobby');

})->add(new GuestMiddleware($container));

