<?php
 return [
     'doctrine' => array(
         'driver' => array(
             'oauth2_driver' => array(
                 'class' => 'Doctrine\\ORM\\Mapping\\Driver\\XmlDriver',
                 'paths' => array(
                     0 => __DIR__ . '/orm',
                 ),
             ),
             'orm_default' => array(
                 'class' => 'Doctrine\\ORM\\Mapping\\Driver\\DriverChain',
                 'drivers' => array(
                     'ZF\\OAuth2\\Doctrine\\Entity' => 'oauth2_driver',
                 ),
             ),
         ),
     ),
];