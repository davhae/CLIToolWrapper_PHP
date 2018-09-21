<?php

use Slim\Http\Request;
use Slim\Http\Response;
use davhae\lampiao\Controller\ToolsDependencyController;

// Routes

$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

$app->get('/core/checkToolDependencies', function () {
    return ToolsDependencyController::checkToolDependencies();
});