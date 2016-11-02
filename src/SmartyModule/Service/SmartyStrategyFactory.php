<?php
namespace SmartyModule\Service;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;
use SmartyModule\View\Strategy\SmartyStrategy;

class SmartyStrategyFactory implements  FactoryInterface {

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return SmartyStrategy
     */    
    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = NULL)
    {
        $smartyRenderer = $container->get('SmartyRenderer');
        return new SmartyStrategy($smartyRenderer);
    }

    public function createService(ServiceLocatorInterface $services)
    {
        return $this($services, 'SmartyRenderer');
    }
}
