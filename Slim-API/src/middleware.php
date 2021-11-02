<?php

use Slim\App;

return function (App $app) {
    $container = $app->getContainer();
    $app->add(new Tuupola\Middleware\JwtAuthentication([
                "header" => "X-Key",
                "regexp" => "/(.*)/",
                "secret" => "supersecretkeyyoushouldnotcommittogithub",
                "path" =>  '/api'/*["/api", "/admin"]*/,
                "ignore" => ["/api/token"],
                "secret" => $container->get('settings')['secretKey']
    ]));

    $app->add(function ($req, $res, $next) {
        $response = $next($req, $res);
        return $response
                ->withHeader('Access-Control-Allow-Origin', '*')
                ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
                ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    });
};


//eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6MSwibm9tZSI6IkZlcm5hbmRvIiwiZW1haWwiOiJmZXJuYW5kb3Bhc2Nob2V0b0BnbWFpbC5jb20iLCJzZW5oYSI6Ijg5Nzk0YjYyMWEzMTNiYjU5ZWVkMGQ5ZjBmNGU4MjA1In0.YgnXJD-L6LpiJxbk2N4rk0S-VUrQgXTcrHcZlG6xuX4