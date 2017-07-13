<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
// use Doctrine\ORM\EntityManager;

require 'vendor/autoload.php';

$container = require 'config/container.php';

// $em = $container->get(EntityManager::class);
$em = $container->get('doctrine.entity_manager.orm_default');

return ConsoleRunner::createHelperSet($em);