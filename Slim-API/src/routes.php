<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\Produto;

return function (App $app) {
    $container = $app->getContainer();

    $app->options('/{routes:.+}', function ($request, $response, $args) {
        return $response;
    });
    
    require __DIR__ . '/routes/produtos.php';
    require __DIR__ . '/routes/autenticacao.php';

    

    $app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function ($req, $res) {
        $handler = $this->notFoundHandler; // handle using the default Slim page not found handler
        return $handler($req, $res);
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







