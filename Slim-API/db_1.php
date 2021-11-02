<?php



  if (PHP_SAPI != 'cli') {
  exit('Rodar via cli');
  }


use Slim\App;
use Illuminate\Database\Capsule\Manager as Capsule;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/src/dependencies.php';

session_start();

// Instantiate the app
$settings = require __DIR__ . '/src/settings.php';
$app = new \Slim\App($settings);

$db = $container->get('db');
var_dump($db);

/*
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

/*
  $db = ;

  $schema = $db->schema;
  $tabela = 'produtos';

  $schema->dropIfExists($tabela);
  $schema->create($tabela, function($table){

  $table->increments('id');
  $table->string('titulo', 100)->unique();
  $table->text('descricao');
  $table->decimal('preco', 11, 2);
  $table->string('fabricante', 60);
  $table->date('dt_criacao');

  });
 * 
 */
/*
$schema = $db->schema;
$tabela = 'produtos';

$schema->dropIfExists($tabela);
$schema->create($tabela, function($table){
$table->increments('id');
$table->string('titulo', 100)->unique();
$table->text('descricao');
$table->decimal('preco', 11, 2);
$table->string('fabricante', 60);
$table->date('dt_criacao');
});

 */