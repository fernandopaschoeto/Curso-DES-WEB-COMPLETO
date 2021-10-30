<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Illuminate\Database\Capsule\Manager as Capsule;

require 'vendor/autoload.php';

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
        ]);

$container = $app->getContainer();
$container['db'] = function () {
    $capsule = new Capsule;
    $capsule->addConnection([
        'driver' => 'mysql',
        'host' => 'localhost',
        'database' => 'slim',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'collation' => 'utf8_general_ci',
        'prefix' => '',
    ]);
    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
};

$app->get('/usuarios', function (Request $request, Response $response) {


    $db = $this->get('db');
    /*     // Criando tabelas
      $db->schema()->dropIfExists('usuarios');
      $db->schema()->create('usuarios', function ($table) {
      $table->increments('id');
      $table->string('nome')->unique();
      $table->string('email')->unique();
      $table->timestamps();
      });
     * 

      // Inserindo Registros
      $db->table('usuarios')->insert([
      'nome' => 'Alice',
      'email' => 'alice@gmail.com'
      ]);

     * 


    $db->table('usuarios')
            ->where('id', 1)
            ->update(['nome' => 'Fernando Paschoeto']);
     * 
     
    
        //Deletar
    
    $db->table('usuarios')
            ->where('id', 1)
            ->delete();
     * 
     */
     
    $tabela_usuarios = $db->table('usuarios');
    $usuarios = $tabela_usuarios->get();
    foreach ($usuarios as $usuario) {
        echo $usuario->id . '<br>';
        echo $usuario->nome . '<br>';
        echo $usuario->email . '<br>';
        echo '------------------- <br>';
    }
            
    
});

$app->run();
