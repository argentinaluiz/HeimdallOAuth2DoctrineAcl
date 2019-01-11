<?php

return [
    'doctrine' => [
        'driver' => [
            'Heimdall_driver' => [
                'class' => \Doctrine\ORM\Mapping\Driver\AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [
                    0 => './module/Heimdall/src/V1/Entity',
                ],
            ],
            'orm_default' => [
                'drivers' => [
                    'Heimdall' => 'Heimdall_driver',
                ],
            ],
        ],
    ],
    'router' => [
        'routes' => [
            'heimdall.rest.doctrine.user' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/user[/:user_id]',
                    'defaults' => [
                        'controller' => 'Heimdall\\V1\\Rest\\User\\Controller',
                    ],
                ],
            ],
            'heimdall.rest.doctrine.acl-role' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/acl-role[/:acl_role_id]',
                    'defaults' => [
                        'controller' => 'Heimdall\\V1\\Rest\\AclRole\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'heimdall.rest.doctrine.user',
            1 => 'heimdall.rest.doctrine.acl-role',
        ],
    ],
    'zf-rest' => [
        'Heimdall\\V1\\Rest\\User\\Controller' => [
            'listener' => \Heimdall\V1\Rest\User\UserResource::class,
            'route_name' => 'heimdall.rest.doctrine.user',
            'route_identifier_name' => 'user_id',
            'entity_identifier_name' => 'id',
            'collection_name' => 'user',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Heimdall\V1\Entity\User::class,
            'collection_class' => \Heimdall\V1\Rest\User\UserCollection::class,
            'service_name' => 'User',
        ],
        'Heimdall\\V1\\Rest\\AclRole\\Controller' => [
            'listener' => \Heimdall\V1\Rest\AclRole\AclRoleResource::class,
            'route_name' => 'heimdall.rest.doctrine.acl-role',
            'route_identifier_name' => 'acl_role_id',
            'entity_identifier_name' => 'id',
            'collection_name' => 'acl_role',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Heimdall\V1\Entity\AclRoleOld::class,
            'collection_class' => \Heimdall\V1\Rest\AclRole\AclRoleCollection::class,
            'service_name' => 'AclRole',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'Heimdall\\V1\\Rest\\User\\Controller' => 'HalJson',
            'Heimdall\\V1\\Rest\\AclRole\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'Heimdall\\V1\\Rest\\User\\Controller' => [
                0 => 'application/vnd.heimdall.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Heimdall\\V1\\Rest\\AclRole\\Controller' => [
                0 => 'application/vnd.heimdall.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'Heimdall\\V1\\Rest\\User\\Controller' => [
                0 => 'application/vnd.heimdall.v1+json',
                1 => 'application/json',
            ],
            'Heimdall\\V1\\Rest\\AclRole\\Controller' => [
                0 => 'application/vnd.heimdall.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \Heimdall\V1\Entity\User::class => [
                'route_identifier_name' => 'user_id',
                'entity_identifier_name' => 'id',
                'route_name' => 'heimdall.rest.doctrine.user',
                'hydrator' => 'Heimdall\\V1\\Rest\\User\\UserHydrator',
            ],
            \Heimdall\V1\Rest\User\UserCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'heimdall.rest.doctrine.user',
                'is_collection' => true,
            ],
            \Heimdall\V1\Entity\AclRoleOld::class => [
                'route_identifier_name' => 'acl_role_id',
                'entity_identifier_name' => 'id',
                'route_name' => 'heimdall.rest.doctrine.acl-role',
                'hydrator' => 'Heimdall\\V1\\Rest\\AclRole\\AclRoleHydrator',
            ],
            \Heimdall\V1\Rest\AclRole\AclRoleCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'heimdall.rest.doctrine.acl-role',
                'is_collection' => true,
            ],
        ],
    ],
    'zf-apigility' => [
        'doctrine-connected' => [
            \Heimdall\V1\Rest\User\UserResource::class => [
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'hydrator' => 'Heimdall\\V1\\Rest\\User\\UserHydrator',
            ],
            \Heimdall\V1\Rest\AclRole\AclRoleResource::class => [
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'hydrator' => 'Heimdall\\V1\\Rest\\AclRole\\AclRoleHydrator',
            ],
        ],
    ],
    'doctrine-hydrator' => [
        'Heimdall\\V1\\Rest\\User\\UserHydrator' => [
            'entity_class' => \Heimdall\V1\Entity\User::class,
            'object_manager' => 'doctrine.entitymanager.orm_default',
            'by_value' => true,
            'strategies' => [],
            'use_generated_hydrator' => true,
        ],
        'Heimdall\\V1\\Rest\\AclRole\\AclRoleHydrator' => [
            'entity_class' => \Heimdall\V1\Entity\AclRoleOld::class,
            'object_manager' => 'doctrine.entitymanager.orm_default',
            'by_value' => true,
            'strategies' => [],
            'use_generated_hydrator' => true,
        ],
    ],
    'zf-content-validation' => [
        'Heimdall\\V1\\Rest\\User\\Controller' => [
            'input_filter' => 'Heimdall\\V1\\Rest\\User\\Validator',
        ],
        'Heimdall\\V1\\Rest\\AclRole\\Controller' => [
            'input_filter' => 'Heimdall\\V1\\Rest\\AclRole\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'Heimdall\\V1\\Rest\\User\\Validator' => [
            0 => [
                'name' => 'username',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 80,
                        ],
                    ],
                ],
            ],
            1 => [
                'name' => 'firstName',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 45,
                        ],
                    ],
                ],
            ],
            2 => [
                'name' => 'lastName',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 45,
                        ],
                    ],
                ],
            ],
            3 => [
                'name' => 'password',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 80,
                        ],
                    ],
                ],
            ],
        ],
        'Heimdall\\V1\\Rest\\AclRole\\Validator' => [
            0 => [
                'name' => 'aclName',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 45,
                        ],
                    ],
                ],
            ],
        ],
    ],
];
