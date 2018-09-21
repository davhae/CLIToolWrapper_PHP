<?php

use Slim\Http\Request;
use Slim\Http\Response;
use davhae\lampiao\Controller\ToolDependencyController;
use davhae\lampiao\Controller\ToolController;

// Routes
$app->get('/test', function (Request $request, Response $response) {
    $TC = new ToolController();
    return $TC->execute("EXEC_NMAP", "localhost", null,"-p 20", "-F");
});

$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

$app->get('/core/checkToolDependencies', function (Request $request, Response $response) {
    $statusArray = ToolDependencyController::checkToolDependencies();

    $viewArg = ["toolDependencies" => $statusArray];

    return $this->renderer->render($response, 'index.phtml', $viewArg);
});

$app->get('/toolController/nmap', function (Request $request, Response $response) {


    //$viewArg = ["toolDependencies" => $statusArray];

    return $this->renderer->render($response, 'toolController/nmap.phtml');
});

$app->post('/toolController/nmap', function (Request $request, Response $response) {
    $NC = new \davhae\lampiao\Controller\Tools\NmapController();
    return $NC->init($request);

    //return $this->renderer->render($response, 'toolController/nmap.phtml');
});