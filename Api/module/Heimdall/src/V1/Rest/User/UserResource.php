<?php
namespace Heimdall\V1\Rest\User;

use Doctrine\Instantiator\InstantiatorInterface;
use ZF\Apigility\Doctrine\Server\Resource\DoctrineResource;
use Heimdall\V1\Service\UserService;

class UserResource extends DoctrineResource
{
    public function __construct(InstantiatorInterface $entityFactory = null)
    {
        $service = new UserService();
        parent::__construct($entityFactory);



    }

}
