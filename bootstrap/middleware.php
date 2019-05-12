<?php

// Application middleware

$app->add(new App\Http\Middleware\System\ValidationErrorsMiddleware($container));

$app->add(new App\Http\Middleware\System\PersistingInputMiddleware($container));

$app->add(new App\Http\Middleware\System\InputMiddleware($container));

$app->add($container->csrf);

