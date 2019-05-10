<?php


$app->get('/user/{username}', 'UserController:getIndex')->setName('auth.user');
