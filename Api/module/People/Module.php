<?php
namespace People;

use People\V1\Entity\User;
use ZF\Apigility\Provider\ApigilityProviderInterface;

class Module implements ApigilityProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function onBootstrap($e)
    {
        $app = $e->getTarget();
        $services = $app->getServiceManager();
        $helpers  = $services->get('ViewHelperManager');
//        $hal      = $helpers->get('Hal');
//
//        $hal->getEventManager()->attach('renderEntity', [$this, 'onRenderEntity']);
//        $hal->getEventManager()->attach('renderEntity.post', [$this, 'onRenderEntityPost']);
//        $hal->getEventManager()->attach('renderCollection', [$this, 'onRenderCollection']);
    }

//    public function onRenderEntity($e)
//    {
//        $entity = $e->getParam('entity');
//        if (! $entity->getEntity() instanceof User) {
//            return;
//        }
//
//        //TEST
//        $entity->getLinks()->add(\ZF\Hal\Link\Link::factory([
//            'rel' => 'describedBy',
//            'route' => [
//                'name' => 'people.rest.doctrine.user',
//                'params'  => [ 'user_id' => 1],
//            ],
//        ]));
//        return;
//    }
//
//    public function onRenderEntityPost($e)
//    {
//        $entity = $e->getParam('entity');
//        print_r($entity);die();
//        if (! $entity->entity instanceof User) {
//            // do nothing
//            return;
//        }
//        $payload = $e->getParam('payload');
//        $payload['phones'] = array(
//            $e->getParam('entity')->getEntity()->getPhoneCollection(),
//        );
//    }
//
//    public function onRenderCollection($e)
//    {
//        $entity = $e->getParam('entity');
//        if (! $entity->entity instanceof User) {
//            // do nothing
//            return;
//        }
//
//        //...
//    }


    public function getAutoloaderConfig()
    {
        return [
            'ZF\Apigility\Autoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src',
                ],
            ],
        ];
    }
}
