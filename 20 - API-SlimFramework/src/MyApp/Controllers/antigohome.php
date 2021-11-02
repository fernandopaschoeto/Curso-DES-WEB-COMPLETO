<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Home
 *
 * @author Fernando Paschoeto
 */
namespace MyApp\Controllers;

class Home {
    
    protected $view;
    
    public function __construct($view) {
        $this->view = $view;
    }
    /*
    protected $container;
    
    public function __construct($container) {
        $this->container = $container;
    }
    */
    public function index($request, $response){
        //$view = $this->container->get('View');
        echo "<pre>";
        var_dump($this->view);
        echo "</pre>";
        return $response->getBody()->write("Teste Index.");
    }
}
