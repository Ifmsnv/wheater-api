<?php

namespace App\Action;

use DateTime;
use Firebase\JWT\JWT;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface as ServerMiddlewareInterface;
use Zend\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ServerRequestInterface;

/**
    @link https://gist.github.com/tuupola/bb90a2311576e2f1573f8e927c78f86e
 */
class TokenAction implements ServerMiddlewareInterface
{
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $now = new DateTime();
        $future = new DateTime("now +2 hours");

        //$server = $request->getServerParams();
        $jti = "Chiquitto";

        $payload = [
            "iat" => $now->getTimeStamp(),
            "exp" => $future->getTimeStamp(),
            "jti" => $jti
        ];
        $secret = "supersecretkeyyoushouldnotcommittogithub";
        $token = JWT::encode($payload, $secret, "HS256");
        $data["status"] = "ok";
        $data["token"] = $token;

        //return $response->withStatus(201)
        //    ->withHeader("Content-Type", "application/json")
        //    ->write(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));

        return new JsonResponse($data);
    }
}
