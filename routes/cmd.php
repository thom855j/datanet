<?php

use App\Http\Middleware\Cmd\AuthMiddleware;
use App\Http\Middleware\Cmd\UnknownMiddleware;

// System
$app->any('/cmd/help', 'HelpController:post');
$app->post('/cmd/echo', 'EchoController:post');

// Finger
$app->get('/cmd/finger', 'FingerController:get')->setName('cmd.finger');
$app->post('/cmd/finger', 'FingerController:post');

// Users
$app->get('/cmd/users', 'UsersController:get')->setName('cmd.users');
$app->post('/cmd/users', 'UsersController:post');

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

    // Status
    $this->get('/cmd/status', 'StatusController:get')->setName('cmd.status');
    $this->post('/cmd/status', 'StatusController:post');

    // Logout
    $this->get('/cmd/logout', 'LogoutController:get')->setName('cmd.logout');
    $this->post('/cmd/logout', 'LogoutController:post');
    
})->add(new AuthMiddleware($container));



