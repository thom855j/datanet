<?php

// DIC configuration
$container = $app->getContainer();

// db
$capsule = new Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container->get('settings')['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();
$container['db'] = function ($c) use ($capsule) {
    return $capsule;
};

// Custom 404
$container['notFoundHandler'] = function ($c) {
    return function ($request, $response) use ($c) {
        return $response
            ->withStatus(308)
            ->withRedirect($c->router->pathFor('system.lobby'));
    };
};

// Auth
$container['auth'] = function ($c) {
    return new App\Helpers\Auth;
};

// Twig view renderer
$container['view'] = function ($c) {

    $settings = $c->get('settings')['renderer'];
    $view = new Slim\Views\Twig($settings['template_path'], [
        'cache' => $settings['cache_path'],
    ]);

    $view->addExtension(new Slim\Views\TwigExtension(
            $c->router, $c->request->getUri()
    ));

    $view->getEnvironment()->addGlobal('auth', [
        'checkUser' => $c->auth->checkUser(),
        'checkHost' => $c->auth->checkHost(),
        'user' => $c->auth->user(),
        'host' => $c->auth->host()
    ]);

    $view->getEnvironment()->addGlobal('settings', $c->get('settings'));

    $view->getEnvironment()->addGlobal('url', APP_SITEURL);

    return $view;
};


// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

// validation
use Respect\Validation\Validator as v;

$container['validator'] = function ($c) {
    return new App\Validation\Validator;
};
v::with('App\\Validation\\Rules\\');

