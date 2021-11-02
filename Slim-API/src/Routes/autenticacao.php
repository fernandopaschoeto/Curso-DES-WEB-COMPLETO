<?php

use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\Usuario;
use Firebase\JWT\JWT;


//Rotas para criação de token
$app->post('/api/token', function ($request, $response, $args) {
    $dados = $request->getParsedBody();
    $email = $dados['email'] ?? null;
    $senha = $dados['senha'] ?? null;
    
    $usuario = Usuario::where('email', $email)->first();
    if (!is_null($usuario) && (md5($senha)) === $usuario->senha){
        $secretKey = $this->get('settings')['secretKey'];
        $chaveDeAcesso = JWT::encode($usuario, $secretKey);
        
        return $response->withJson([
            'chave' => $chaveDeAcesso
        ]);
    }
    
    return "Erro!";

});
