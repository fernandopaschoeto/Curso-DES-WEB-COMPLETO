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
    
    require __DIR__ . '/routes/autenticacao.php';

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







