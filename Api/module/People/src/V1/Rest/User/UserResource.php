<?php
namespace People\V1\Rest\User;

use Doctrine\Instantiator\InstantiatorInterface;
use ZF\Apigility\Doctrine\Server\Resource\DoctrineResource;
use ZF\Apigility\Doctrine\Server\Event\DoctrineResourceEvent;

class UserResource extends DoctrineResource
{
    private $entityFactory;
    public function __construct(InstantiatorInterface $entityFactory = null)
    {
        $this->entityFactory = $entityFactory;
        parent::__construct($entityFactory);
    }

    public function create($data)
    {
        $entityClass = $this->getEntityClass();

        $data = $this->getQueryCreateFilter()->filter($this->getEvent(), $entityClass, $data);
        if ($data instanceof ApiProblem) {
            return $data;
        }

        $entity = $this->entityFactory
            ? $this->entityFactory->instantiate($entityClass)
            : new $entityClass();

        $results = $this->triggerDoctrineEvent(DoctrineResourceEvent::EVENT_CREATE_PRE, $entity, $data);

        if ($results->last() instanceof ApiProblem) {
            return $results->last();
        } elseif (! $results->isEmpty() && $results->last() !== null) {
            // TODO Change to a more logical/secure way to see if data was acted and and we have the expected response
            $preEventData = $results->last();
        } else {
            $preEventData = $data;
        }

        $hydrator = $this->getHydrator();
        $hydrator->hydrate((array) $preEventData, $entity);

        $this->getObjectManager()->persist($entity);

        $results = $this->triggerDoctrineEvent(DoctrineResourceEvent::EVENT_CREATE_POST, $entity, $data);
        if ($results->last() instanceof ApiProblem) {
            return $results->last();
        }

        $this->getObjectManager()->flush();
        return $entity;
    }

}
