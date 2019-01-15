<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2014-2016 Zend Technologies USA Inc. (http://www.zend.com)
 */

namespace Application;

use Zend\ServiceManager\AbstractFactory\ReflectionBasedAbstractFactory;
use Zend\Uri\UriFactory;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function onBootstrap($e)
    {

        UriFactory::registerScheme('chrome-extension', 'Zend\Uri\Uri');

        $serviceManager = $e->getApplication()->getServiceManager();
        $identity = $serviceManager->get('authentication')->getIdentity();

        $application = $e->getApplication();
        $container = $application->getServiceManager();

        $container->addAbstractFactory(new ReflectionBasedAbstractFactory([
             \Zend\Console\Adapter\AdapterInterface::class     => 'ConsoleAdapter',
    \Zend\Filter\FilterPluginManager::class           => 'FilterManager',
    \Zend\Hydrator\HydratorPluginManager::class       => 'HydratorManager',
    \Zend\InputFilter\InputFilterPluginManager::class => 'InputFilterManager',
    \Zend\Log\FilterPluginManager::class              => 'LogFilterManager',
    \Zend\Log\FormatterPluginManager::class           => 'LogFormatterManager',
    \Zend\Log\ProcessorPluginManager::class           => 'LogProcessorManager',
    \Zend\Log\WriterPluginManager::class              => 'LogWriterManager',
    \Zend\Serializer\AdapterPluginManager::class      => 'SerializerAdapterManager',
    \Zend\Validator\ValidatorPluginManager::class     => 'ValidatorManager',
        ]));
    }
}
