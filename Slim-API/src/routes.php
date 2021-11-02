<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

require __DIR__ . '/Rotes/Produtos.php';

return function (App $app) {
    $container = $app->getContainer();
/*
    $app->get('/[{name}]', function (Request $request, Response $response, array $args) use ($container) {
// Sample log message
        $container->get('logger')->info("Slim-Skeleton '/' route");

// Render index view
        return $container->get('renderer')->render($response, 'index.phtml', $args);
    });
*/
    $app->get('/api/v1/produtos', function (Request $request, Response $response, array $args) use ($container) {

// Render index view
        return $response->withJson(['nome' => 'Moto G']);
    });
};

/*
  $app->group('/api/v1', function(){
  $this->get('/produtos', function($request, $response){
  echo "Teste";
  //return $response->withJson(['nome' => 'Moto G']);
  });
  });
 */







