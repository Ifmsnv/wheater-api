<?php

namespace App\Action;

use App\Entity\Usuario;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;
use Doctrine\ORM\EntityManager;

class ChiquittoAction
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        /* @var $usuario Usuario */
        $usuario = $this->entityManager->find(Usuario::class, 1);
        return new JsonResponse($usuario->toArray());

        //return new JsonResponse($this->entityManager->getRepository(Usuario::class)->findAll());
    }
}