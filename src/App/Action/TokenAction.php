<?php

namespace App\Action;

use App\Entity\Usuario;
use DateTime;
use Doctrine\ORM\EntityManager;
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
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        // Pegar dados

        $params = $request->getParsedBody();

        // Verificar dados

        /* @var $usuario Usuario */
        $usuario = $this->entityManager
            ->getRepository(Usuario::class)
            ->findOneBy([
                'email' => $params['email'],
                'senha' => $params['senha'],
            ]);

        if ($usuario == null) {
            return new JsonResponse($params, 400);
        }

        // Gerar token

        $now = new DateTime();
        $future = new DateTime("now +2 hours");

        $jti = [
            'idUsuario' => $usuario->getIdUsuario()
        ];

        $payload = [
            "iat" => $now->getTimeStamp(),
            "exp" => $future->getTimeStamp(),
            "jti" => $jti
        ];
        $secret = "IFMSNV";
        $token = JWT::encode($payload, $secret, "HS256");
        $data["status"] = "ok";
        $data["token"] = $token;

        return new JsonResponse($data);
    }
}
