<?php

return [
    'dependencies' => [
        'factories' => [
            'doctrine.entity_manager.orm_default' => \ContainerInteropDoctrine\EntityManagerFactory::class,
        ],
    ],
    'doctrine' => [
        'connection' => [
            'orm_default' => [
                'params' => [
                    'url' => 'mysql://root:001001@localhost/wheater',
                ],
            ],
        ],
        'driver' => [
            'orm_default' => [
                'class' => \Doctrine\Common\Persistence\Mapping\Driver\MappingDriverChain::class,
                'drivers' => [
                    'App\Entity' => 'my_entity',
                ],
            ],
            'my_entity' => [
                'class' => \Doctrine\ORM\Mapping\Driver\AnnotationDriver::class,
                'cache' => 'array',
                'paths' => __DIR__ . '/../../src/App/Entity',
            ],
        ],
    ],
];
