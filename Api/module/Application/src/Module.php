<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2014-2016 Zend Technologies USA Inc. (http://www.zend.com)
 */

namespace Application;

use Zend\ServiceManager\AbstractFactory\ReflectionBasedAbstractFactory;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function onBootstrap($e)
    {
        $serviceManager = $e->getApplication()->getServiceManager();
        $identity = $serviceManager->get('authentication')->getIdentity();

        $application = $e->getApplication();
        $container = $application->getServiceManager();

        $container->addAbstractFactory(new ReflectionBasedAbstractFactory([
            \Zend\ServiceManager::class => 'serviceManager',
        ]));
    }
}
