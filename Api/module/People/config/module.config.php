<?php
return [
    'doctrine' => [
        'driver' => [
            'People_driver' => [
                'class' => \Doctrine\ORM\Mapping\Driver\AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [
                    0 => './module/People/src/V1/Entity',
                ],
            ],
            'orm_default' => [
                'drivers' => [
                    'People' => 'People_driver',
                ],
            ],
        ],
    ],
    'router' => [
        'routes' => [
            'people.rest.doctrine.user' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/user[/:user_id]',
                    'defaults' => [
                        'controller' => 'People\\V1\\Rest\\User\\Controller',
                    ],
                ],
            ],
            'people.rest.doctrine.address' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/address[/:address_id]',
                    'defaults' => [
                        'controller' => 'People\\V1\\Rest\\Address\\Controller',
                    ],
                ],
            ],
            'people.rest.doctrine.email' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/email[/:email_id]',
                    'defaults' => [
                        'controller' => 'People\\V1\\Rest\\Email\\Controller',
                    ],
                ],
            ],
            'people.rest.doctrine.phone' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/phone[/:phone_id]',
                    'defaults' => [
                        'controller' => 'People\\V1\\Rest\\Phone\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'people.rest.doctrine.user',
            1 => 'people.rest.doctrine.address',
            2 => 'people.rest.doctrine.email',
            3 => 'people.rest.doctrine.phone',
        ],
    ],
    'zf-rest' => [
        'People\\V1\\Rest\\User\\Controller' => [
            'listener' => \People\V1\Rest\User\UserResource::class,
            'route_name' => 'people.rest.doctrine.user',
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
                2 => 'DELETE',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \People\V1\Entity\User::class,
            'collection_class' => \People\V1\Rest\User\UserCollection::class,
            'service_name' => 'User',
        ],
        'People\\V1\\Rest\\Address\\Controller' => [
            'listener' => \People\V1\Rest\Address\AddressResource::class,
            'route_name' => 'people.rest.doctrine.address',
            'route_identifier_name' => 'address_id',
            'entity_identifier_name' => 'id',
            'collection_name' => 'address',
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
            'entity_class' => \People\V1\Entity\Address::class,
            'collection_class' => \People\V1\Rest\Address\AddressCollection::class,
            'service_name' => 'Address',
        ],
        'People\\V1\\Rest\\Email\\Controller' => [
            'listener' => \People\V1\Rest\Email\EmailResource::class,
            'route_name' => 'people.rest.doctrine.email',
            'route_identifier_name' => 'email_id',
            'entity_identifier_name' => 'id',
            'collection_name' => 'email',
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
            'entity_class' => \People\V1\Entity\Email::class,
            'collection_class' => \People\V1\Rest\Email\EmailCollection::class,
            'service_name' => 'Email',
        ],
        'People\\V1\\Rest\\Phone\\Controller' => [
            'listener' => \People\V1\Rest\Phone\PhoneResource::class,
            'route_name' => 'people.rest.doctrine.phone',
            'route_identifier_name' => 'phone_id',
            'entity_identifier_name' => 'id',
            'collection_name' => 'phone',
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
            'entity_class' => \People\V1\Entity\Phone::class,
            'collection_class' => \People\V1\Rest\Phone\PhoneCollection::class,
            'service_name' => 'Phone',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'People\\V1\\Rest\\User\\Controller' => 'HalJson',
            'People\\V1\\Rest\\Address\\Controller' => 'HalJson',
            'People\\V1\\Rest\\Email\\Controller' => 'HalJson',
            'People\\V1\\Rest\\Phone\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'People\\V1\\Rest\\User\\Controller' => [
                0 => 'application/vnd.people.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'People\\V1\\Rest\\Address\\Controller' => [
                0 => 'application/vnd.people.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'People\\V1\\Rest\\Email\\Controller' => [
                0 => 'application/vnd.people.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'People\\V1\\Rest\\Phone\\Controller' => [
                0 => 'application/vnd.people.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'People\\V1\\Rest\\User\\Controller' => [
                0 => 'application/vnd.people.v1+json',
                1 => 'application/json',
            ],
            'People\\V1\\Rest\\Address\\Controller' => [
                0 => 'application/vnd.people.v1+json',
                1 => 'application/json',
            ],
            'People\\V1\\Rest\\Email\\Controller' => [
                0 => 'application/vnd.people.v1+json',
                1 => 'application/json',
            ],
            'People\\V1\\Rest\\Phone\\Controller' => [
                0 => 'application/vnd.people.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \People\V1\Entity\User::class => [
                'route_identifier_name' => 'user_id',
                'entity_identifier_name' => 'id',
                'route_name' => 'people.rest.doctrine.user',
                'hydrator' => 'People\\V1\\Rest\\User\\UserHydrator',
               // 'render_embedded_entities' => true, //linha gera erro
            ],
            \People\V1\Rest\User\UserCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'people.rest.doctrine.user',
                'is_collection' => true,
            ],
            \People\V1\Entity\Address::class => [
                'route_identifier_name' => 'address_id',
                'entity_identifier_name' => 'id',
                'route_name' => 'people.rest.doctrine.address',
                'hydrator' => 'People\\V1\\Rest\\Address\\AddressHydrator',
            ],
            \People\V1\Rest\Address\AddressCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'people.rest.doctrine.address',
                'is_collection' => true,
            ],
            \People\V1\Entity\Email::class => [
                'route_identifier_name' => 'email_id',
                'entity_identifier_name' => 'id',
                'route_name' => 'people.rest.doctrine.email',
                'hydrator' => 'People\\V1\\Rest\\Email\\EmailHydrator',
            ],
            \People\V1\Rest\Email\EmailCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'people.rest.doctrine.email',
                'is_collection' => true,
            ],
            \People\V1\Entity\Phone::class => [
                'route_identifier_name' => 'phone_id',
                'entity_identifier_name' => 'id',
                'route_name' => 'people.rest.doctrine.phone',
                'hydrator' => 'People\\V1\\Rest\\Phone\\PhoneHydrator',
            ],
            \People\V1\Rest\Phone\PhoneCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'people.rest.doctrine.phone',
                'is_collection' => true,
            ],
        ],
    ],
    'zf-apigility' => [
        'doctrine-connected' => [
            \People\V1\Rest\User\UserResource::class => [
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'hydrator' => 'People\\V1\\Rest\\User\\UserHydrator',
            ],
            \People\V1\Rest\Address\AddressResource::class => [
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'hydrator' => 'People\\V1\\Rest\\Address\\AddressHydrator',
            ],
            \People\V1\Rest\Email\EmailResource::class => [
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'hydrator' => 'People\\V1\\Rest\\Email\\EmailHydrator',
            ],
            \People\V1\Rest\Phone\PhoneResource::class => [
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'hydrator' => 'People\\V1\\Rest\\Phone\\PhoneHydrator',
            ],
        ],
    ],
    'doctrine-hydrator' => [
        'People\\V1\\Rest\\User\\UserHydrator' => [
            'entity_class' => \People\V1\Entity\User::class,
            'object_manager' => 'doctrine.entitymanager.orm_default',
            'by_value' => true,
            'strategies' => [],
            'use_generated_hydrator' => true,
        ],
        'People\\V1\\Rest\\Address\\AddressHydrator' => [
            'entity_class' => \People\V1\Entity\Address::class,
            'object_manager' => 'doctrine.entitymanager.orm_default',
            'by_value' => true,
            'strategies' => [],
            'use_generated_hydrator' => true,
        ],
        'People\\V1\\Rest\\Email\\EmailHydrator' => [
            'entity_class' => \People\V1\Entity\Email::class,
            'object_manager' => 'doctrine.entitymanager.orm_default',
            'by_value' => true,
            'strategies' => [],
            'use_generated_hydrator' => true,
        ],
        'People\\V1\\Rest\\Phone\\PhoneHydrator' => [
            'entity_class' => \People\V1\Entity\Phone::class,
            'object_manager' => 'doctrine.entitymanager.orm_default',
            'by_value' => true,
            'strategies' => [],
            'use_generated_hydrator' => true,
        ],
    ],
    'zf-content-validation' => [
        'People\\V1\\Rest\\User\\Controller' => [
            'input_filter' => 'People\\V1\\Rest\\User\\Validator',
        ],
        'People\\V1\\Rest\\Address\\Controller' => [
            'input_filter' => 'People\\V1\\Rest\\Address\\Validator',
        ],
        'People\\V1\\Rest\\Email\\Controller' => [
            'input_filter' => 'People\\V1\\Rest\\Email\\Validator',
        ],
        'People\\V1\\Rest\\Phone\\Controller' => [
            'input_filter' => 'People\\V1\\Rest\\Phone\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'People\\V1\\Rest\\User\\Validator' => [
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
                'name' => 'ref',
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
                'name' => 'photo',
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
                            'max' => 254,
                        ],
                    ],
                ],
            ],
            3 => [
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
            4 => [
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
            5 => [
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
            6 => [
                'name' => 'createdAt',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            7 => [
                'name' => 'updatedAt',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            8 => [
                'name' => 'deleted',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            9 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'emails',
            ],
        ],
        'People\\V1\\Rest\\Address\\Validator' => [
            0 => [
                'name' => 'street',
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
                            'max' => 100,
                        ],
                    ],
                ],
            ],
            1 => [
                'name' => 'country',
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
                            'max' => 100,
                        ],
                    ],
                ],
            ],
            2 => [
                'name' => 'number',
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
                'name' => 'complement',
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
            4 => [
                'name' => 'city',
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
            5 => [
                'name' => 'zipCod',
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
            6 => [
                'name' => 'state',
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
            7 => [
                'name' => 'reference',
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
            8 => [
                'name' => 'parish',
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
            9 => [
                'name' => 'neighborhood',
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
        'People\\V1\\Rest\\Email\\Validator' => [
            0 => [
                'name' => 'email',
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
                            'max' => 254,
                        ],
                    ],
                ],
            ],
            1 => [
                'name' => 'isFirst',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            2 => [
                'name' => 'checked',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            3 => [
                'name' => 'hash',
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
            4 => [
                'name' => 'updatedAt',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            5 => [
                'name' => 'mailing',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
        ],
        'People\\V1\\Rest\\Phone\\Validator' => [
            0 => [
                'name' => 'phone',
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
            1 => [
                'name' => 'codPrefix',
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
                            'max' => 5,
                        ],
                    ],
                ],
            ],
            2 => [
                'name' => 'codCountry',
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
                            'max' => 5,
                        ],
                    ],
                ],
            ],
        ],
    ],
];
