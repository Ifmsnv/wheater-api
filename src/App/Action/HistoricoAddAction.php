<?php

namespace App\Action;

use App\Entity\Estacao;
use App\Entity\Historico;
use App\Entity\Usuario;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;
use Doctrine\ORM\EntityManager;

class HistoricoAddAction
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        $params = $request->getParsedBody();

        $estacao = $this->entityManager->find(Estacao::class, $params['idEstacao']);

        $historico = new Historico();
        $historico->setEstacao($estacao);
        $historico->setData(new \DateTime("now"));
        $historico->setTemperaturaAr($params['temperaturaAr']);
        $historico->setTemperaturaSolo($params['temperaturaSolo']);
        $historico->setUmidadeAr($params['umidadeAr']);
        $historico->setUmidadeSolo($params['umidadeSolo']);
        $historico->setMolhamentoFoliar($params['molhamentoFoliar']);

        $this->entityManager->persist($historico);
        $this->entityManager->flush();

        return new JsonResponse($historico);
    }
}