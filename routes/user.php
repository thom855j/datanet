<?php

use App\Http\Middleware\AuthMiddleware;

$app->group('', function() {

    // Home
    $this->get('/user/{username}', 'UserController:getIndex')->setName('auth.user');

    // CMDs //
    
    // Finger
    $this->get('/cmd/finger', 'FingerController:get')->setName('cmd.finger');
    $this->post('/cmd/finger', 'FingerController:post');

    // Status
    $this->get('/cmd/status', 'StatusController:get')->setName('cmd.status');
    $this->post('/cmd/status', 'StatusController:post');

})->add(new AuthMiddleware($container));
