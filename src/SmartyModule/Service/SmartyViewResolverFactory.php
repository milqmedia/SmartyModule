<?php

namespace SmartyModule\Service;

use Zend\View\Resolver as ViewResolver;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * @category   Zend
 * @package    Zend_Mvc
 * @subpackage Service
 */
class SmartyViewResolverFactory implements FactoryInterface
{
    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = NULL)
    {
        $resolver = new ViewResolver\AggregateResolver();
        $resolver->attach($container->get('SmartyViewTemplateMapResolver'));
        $resolver->attach($container->get('SmartyViewTemplatePathStack'));
        return $resolver;
    }
    
    public function createService(ServiceLocatorInterface $services)
    {
        return $this($services, 'SmartyRenderer');
    }
}
