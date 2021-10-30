<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\App;

// padrão psr7
$app->get('/postagens', function (Request $request, Response $response) {

    $response->getBody()->write("Escrever no corpo da resposta.");

    return $response;
});

$app->post('/usuarios/adiciona', function (Request $request, Response $response) {

    $post = $request->getParsedBody();

    $nome = $post['nome'];
    $email = $post['email'];

    // salvar em banco de dados por exemplo.  

    return $response->getBody()->write($nome . ' - ' . $email);
});

$app->put('/usuarios/atualiza/{id}', function (Request $request, Response $response) {

    $id = $post['id'];
    $nome = $post['nome'];
    $email = $post['email'];

    return $response->getBody()->write('Sucesso ao atualizar');
});

$app->delete('/usuarios/remove/{id}', function (Request $request, Response $response) {

    $id = $request->getAttribute('id');
    return $response->getBody()->write("Sucesso ao remover usuario $id");
});

$app->run();
