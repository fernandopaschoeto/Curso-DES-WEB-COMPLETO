<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\Produto;

return function (App $app) {
    $container = $app->getContainer();

    $app->group('/api/v1', function () {
        $this->get('/produtos/lista', function (Request $request, Response $response, array $args)  use ($container)  {
            $produtos = Produto::get();
            return $response->withJson($produtos);
        });

        $this->post('/produtos/add', function (Request $request, Response $response, array $args){
            $dados = $request->getParsedBody();
            $produto = Produto::create($dados);
            return $response->withJson($produtos);
        });

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







