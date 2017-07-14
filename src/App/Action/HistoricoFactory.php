<?php

namespace App\Action;

use Interop\Container\ContainerInterface;

class HistoricoFactory
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $em = $container->get('doctrine.entity_manager.orm_default');

        return new $requestedName($em);
    }
}