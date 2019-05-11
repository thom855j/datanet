<?php

use App\Http\Middleware\Cmd\AuthMiddleware;
use App\Http\Middleware\Cmd\UnknownMiddleware;

$app->group('', function() {
    // Newuser
    $this->get('/cmd/newuser', 'NewUserController:get')->setName('cmd.newuser');
    $this->post('/cmd/newuser', 'NewUserController:post');

    // Login
    $this->get('/cmd/login', 'LoginController:get')->setName('cmd.login');
    $this->post('/cmd/login', 'LoginController:post');

})->add(new UnknownMiddleware($container));


$app->group('', function() {

    // Hosts
    $this->get('/cmd/hosts', 'HostsController:get')->setName('cmd.hosts');
    $this->post('/cmd/hosts', 'HostsController:post');

    // Newhost
    $this->get('/cmd/newhost', 'NewHostController:get')->setName('cmd.newhost');
    $this->post('/cmd/newhost', 'NewHostController:post');

    // Finger
    $this->get('/cmd/finger', 'FingerController:get')->setName('cmd.finger');
    $this->post('/cmd/finger', 'FingerController:post');

    // Status
    $this->get('/cmd/status', 'StatusController:get')->setName('cmd.status');
    $this->post('/cmd/status', 'StatusController:post');

    // Logout
    $this->get('/cmd/logout', 'LogoutController:get')->setName('cmd.logout');
    $this->post('/cmd/logout', 'LogoutController:post');
    
})->add(new AuthMiddleware($container));



