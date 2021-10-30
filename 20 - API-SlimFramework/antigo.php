<?php

require 'vendor/autoload.php';

$app = new \Slim\App;

$app->get('/postagens/[{ano}[/{mes}]]', function ($request, $response) {
    $ano = $request->getAttribute('ano');
    $mes = $request->getAttribute('mes');

    echo 'Listagem de postagem ' . $ano . ' ' . $mes;
});

$app->get('/usuarios/[{id}]', function ($request, $response) {
    $id = $request->getAttribute('id');

    echo 'Listagem de usuarios com ID ' . $id;
});

// Dentro das chaves é possível atribuir quaisquer itens usando expressão regular
// após os :. no exemplo foi usado * que aceitaria qualquer coisa. 

$app->get('/lista/{item:.*}', function ($request, $response) {
    $item = $request->getAttribute('item');

    //echo $item;
    var_dump(explode("/", $item));
});

$app->get('/blog/postagens/{id}', function ($request, $response) {
    echo "Listar postagem para um id $id";
})->setName('blog');

$app->get('/meusite', function ($request, $response) {
    $retorno = $this->get("router")->pathFor("blog", ["id" => "5"]);

    echo $retorno;
});

$app->group('/v1', function () {
    $this->get('/usuarios', function ($request, $response) {
        echo 'Listagem de usuarios ';
    });

    $this->get('/postagens', function ($request, $response) {
        echo 'Listagem de postagens ';
    });
});

$app->Run();
