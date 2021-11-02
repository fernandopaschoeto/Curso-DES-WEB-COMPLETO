<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Produto
 *
 * @author Fernando Paschoeto
 */
class Produto extends Model{
    protected $fillable = [
        'titulo', 'descricao',
        'preco', 'fabricante',
        'updated_at', 'created_at'
    ];
}
