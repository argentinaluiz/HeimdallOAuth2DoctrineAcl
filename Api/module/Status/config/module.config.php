<?php
return [
    'controllers' => [
        'factories' => [
            'Status\\V1\\Rpc\\Ping\\Controller' => \Status\V1\Rpc\Ping\PingControllerFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'status.rpc.ping' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/ping',
                    'defaults' => [
                        'controller' => 'Status\\V1\\Rpc\\Ping\\Controller',
                        'action' => 'ping',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'status.rpc.ping',
        ],
    ],
    'zf-rpc' => [
        'Status\\V1\\Rpc\\Ping\\Controller' => [
            'service_name' => 'Ping',
            'http_methods' => [
                0 => 'GET',
            ],
            'route_name' => 'status.rpc.ping',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'Status\\V1\\Rpc\\Ping\\Controller' => 'Json',
        ],
        'accept_whitelist' => [
            'Status\\V1\\Rpc\\Ping\\Controller' => [
                0 => 'application/vnd.status.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
        ],
        'content_type_whitelist' => [
            'Status\\V1\\Rpc\\Ping\\Controller' => [
                0 => 'application/vnd.status.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-mvc-auth' => [
        'authorization' => [
            'Status\\V1\\Rpc\\Ping\\Controller' => [
                'actions' => [
                    'ping' => [
                        'GET' => true,
                        'POST' => false,
                        'PUT' => false,
                        'PATCH' => false,
                        'DELETE' => false,
                    ],
                ],
            ],
        ],
    ],
];
