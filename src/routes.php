<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\ORM;

return function (App $app) {
    $container = $app->getContainer();

    // Rutas ORM
    $routes = require_once 'routes/routesORM.php';
    $routes($app);

    $app->get('[/]', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/' route");

        // Render index view
        return $container->get('renderer')->render($response, 'index.phtml', $args);
    });
};
