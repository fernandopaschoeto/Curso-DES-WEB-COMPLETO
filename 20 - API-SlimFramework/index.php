<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\App;

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

$container = $app->getContainer();
$container['Home'] = function(){
    return new MyApp\Controllers\Home(new MyApp\View);
};

$app->get('/usuario', 'Home:index');

$app->run();