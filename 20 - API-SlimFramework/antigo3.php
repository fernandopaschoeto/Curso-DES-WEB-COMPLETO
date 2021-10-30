<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);

//Tipos de respostas
// cabeçalho, texto, json, xml

$app->get('/header', function(Request $request, Response $response){
    $response->write('Esse é um retorno Header');
    return $response->withHeader('allow', 'PUT')
            ->withAddedHeader('Content-Length', 25);
    
});

$app->get('/json', function(Request $request, Response $response){
    return $response->withJson([
        'nome' => 'Fernando Paschoeto',
        'email' => 'fernandopaschoeto@gmail.com'  
        ]);   
});

$app->get('/xml', function(Request $request, Response $response){
    $xml = file_get_contents('arquivo.xml');
    $response->write($xml);
    
    return $response->withHeader('Content-Type', 'application/xml');
});

//muddleware

$app->add(function($request, $response, $next) {
    $response->write(' Inicio Camada 1 + ');
    //return $next($request, $response);
    $response = $next($request, $response);
    return $response->write(' + Fim Camada 1 ');
});
/*
$app->add(function($request, $response, $next) {
    $response->write(' Inicio Camada 2 + ');
    return $next($request, $response);
});
*/
$app->get('/usuarios', function(Request $request, Response $response){
    $response->write('Ação principal Usuarios. ');

});

$app->get('/postagens', function(Request $request, Response $response){
    $response->write('Ação principal Postagens. ');

});

$app->run();

/*

class Servico{
    
}

// usando injessão de dependência para adicionar uma classe externa a rota do slim usando pimple.
$container = $app->getContainer();
$container['servico'] = function(){
  return new Servico;  
};
$app->get('/servico', function(Request $request, Response $response){
    
    $servico = $this->get('servico');
    var_dump($servico);
});
/*
$container = $app->getContainer();
$container['View'] = function(){
    return new MyApp\View;
};

$app->get('/usuario', '\MyApp\Controllers\Home:index');
*/
/*
$container = $app->getContainer();
$container['Home'] = function(){
    return new MyApp\Controllers\Home(new MyApp\View);
};

$app->get('/usuario', 'Home:index');

$app->run();
 * 
 * 
 */