<?php

$app->get('/cmd/newuser', 'NewUserController:get')->setName('cmd.newuser');
$app->post('/cmd/newuser', 'NewUserController:post');

$app->get('/cmd/login', 'LoginController:get');
$app->post('/cmd/login', 'LoginController:post');

$app->get('/cmd/logout', 'LogoutController:get');
$app->post('/cmd/logout', 'LogoutController:post');

