<?php
// Controller configuration

$container['LobbyController'] = function ($c) {
    return new App\Http\Controllers\Guest\LobbyController($c);
};

$container['UserController'] = function ($c) {
    return new App\Http\Controllers\Auth\UserController($c);
};

$container['HostController'] = function ($c) {
    return new App\Http\Controllers\Auth\HostController($c);
};


// CMDs //


// Help
$container['HelpController'] = function ($c) {
    return new App\Http\Controllers\Cmd\System\HelpController($c);
};

// Echo
$container['EchoController'] = function ($c) {
    return new App\Http\Controllers\Cmd\System\EchoController($c);
};

// Guest
$container['NewUserController'] = function ($c) {
    return new App\Http\Controllers\Cmd\Auth\NewUserController($c);
};

$container['LoginController'] = function ($c) {
    return new App\Http\Controllers\Cmd\Auth\LoginController($c);
};

$container['LogoutController'] = function ($c) {
    return new App\Http\Controllers\Cmd\Auth\LogoutController($c);
};


// Auth
$container['StatusController'] = function ($c) {
    return new App\Http\Controllers\Cmd\User\StatusController($c);
};

$container['RloginController'] = function ($c) {
    return new App\Http\Controllers\Cmd\Host\RloginController($c);
};

$container['UsersController'] = function ($c) {
    return new App\Http\Controllers\Cmd\User\UsersController($c);
};

$container['FingerController'] = function ($c) {
    return new App\Http\Controllers\Cmd\User\FingerController($c);
};

$container['HostsController'] = function ($c) {
    return new App\Http\Controllers\Cmd\Host\HostsController($c);
};


// Host
$container['NewHostController'] = function ($c) {
    return new App\Http\Controllers\Cmd\Host\NewHostController($c);
};
