<?php
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

require 'vendor/autoload.php';

session_start();
$app = new \Slim\App;

$app->get('/login', function (ServerRequestInterface $request, ResponseInterface $response) {
    $_SESSION["loggedIn"] = true;
    return $response->withStatus(204);
});

$app->get('/logout', function (ServerRequestInterface $request, ResponseInterface $response) {
    session_destroy();
    return $response->withStatus(204);
});

$app->get('/data', function (ServerRequestInterface $request, ResponseInterface $response) {
    if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"]) {
        return $response->withJson(
            [
                'simpleExample' => true,
                'user' => 'anon'
            ],
            200
        );
    }
    return $response->withStatus(401);
});

$app->run();
