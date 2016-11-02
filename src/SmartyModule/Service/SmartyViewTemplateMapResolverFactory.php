<?php

namespace SmartyModule\Service;

use Zend\View\Resolver as ViewResolver;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;


class SmartyViewTemplateMapResolverFactory implements FactoryInterface
{
    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = NULL)
    {
        $config = $container->get('Config');
        $map = array();
        if (is_array($config) && isset($config['view_manager'])) {
            $config = $config['view_manager'];
            if (is_array($config) && isset($config['template_map'])) {
                $map = $config['template_map'];
            }
        }
        return new ViewResolver\TemplateMapResolver($map);
    }
    
    public function createService(ServiceLocatorInterface $services)
    {
        return $this($services, 'SmartyRenderer');
    }
}
