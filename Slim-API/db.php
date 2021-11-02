<?php

if (PHP_SAPI != 'cli') {
    exit('Rodar via cli');
}

use Illuminate\Database\Capsule\Manager as Capsule;

require 'vendor/autoload.php';

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


$schema = $capsule::schema();
$tabela = 'produtos';

//Criando tabela
$schema->create($tabela, function ($table) {
    $table->increments('id');
    $table->string('titulo', 100)->unique();
    $table->text('descricao');
    $table->decimal('preco', 11, 2);
    $table->string('fabricante', 60);
    $table->timestamps();
});


//inserir na tabela
$capsule::table($tabela)->insert([
    'titulo' => 'Smartphone Motorola Moto G6 32GB Dual Chip',
    'descricao' => 'Android Oreo - 8.0 Tela 5.7" Octa-Core 1.8 GHz 4G Câmera 12 + 5MP (Dual Traseira) - Índigo',
    'preco' => 899.00,
    'fabricante' => 'Motorola',
    'created_at' => '2019-10-22',
    'updated_at' => '2019-10-22'
]);
 
$capsule::table($tabela)->insert([
    'titulo' => 'iPhone X Cinza Espacial 64GB',
    'descricao' => 'Tela 5.8" iOS 12 4G Wi-Fi Câmera 12MP - Apple',
    'preco' => 4999.00,
    'fabricante' => 'Apple',
    'created_at' => '2020-01-02',
    'updated_at' => '2020-01-02'
]);
