<?php

use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\Produto;


$app->group('/api/v1', function () {
        $this->get('/produtos/lista', function (Request $request, Response $response) {
            $produtos = Produto::get();
            return $response->withJson($produtos);
        });

        $this->get('/produtos/lista/{id}', function (Request $request, Response $response, array $args) {
            $produto = Produto::findOrFail($args['id']);
            return $response->withJson($produto);
        });

        $this->put('/produtos/atualiza/{id}', function (Request $request, Response $response, array $args) {
            $dados = $request->getParsedBody();
            $produto = Produto::findOrFail($args['id']);
            $produto->update($dados);
            return $response->withJson($produto);
        });

        $this->delete('/produtos/remove/{id}', function (Request $request, Response $response, array $args) {
            $produto = Produto::findOrFail($args['id']);
            $produto->delete();
            return $response->withJson($produto);
        });

        $this->post('/produtos/add', function (Request $request, Response $response) {
            $dados = $request->getParsedBody();
            $produto = Produto::create($dados);
            return $response->withJson($produtos);
        });
    });



/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */


/*
  return function (App $app) {
  $container = $app->getContainer();

  $app->get('/[{name}]', function (Request $request, Response $response, array $args) use ($container) {
  // Sample log message
  $container->get('logger')->info("Slim-Skeleton '/' route");

  // Render index view
  return $container->get('renderer')->render($response, 'index.phtml', $args);
  });
  };
 */


/*
  $app->get('/[{name}]', function (Request $request, Response $response, array $args) use ($container) {
  // Sample log message
  $container->get('logger')->info("Slim-Skeleton '/' route");

  // Render index view
  return $container->get('renderer')->render($response, 'index.phtml', $args);
  });
 */


/*
$app->group('/v1', function(){
   $this->get('/produtos', function($request, $response){
       return $response->withJson(['nome' => 'Moto G']);
   });
});
 * 
 */