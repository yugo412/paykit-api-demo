<?php

declare(strict_types=1);

use App\Application\Actions\Product\ListProductAction;
use App\Application\Actions\Product\ViewProductAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');

        return $response;
    });

    $app->group('/product', function (Group $product): void {
        $product->get('/', ListProductAction::class);
        $product->get('/{id}', ViewProductAction::class);
    });
};
