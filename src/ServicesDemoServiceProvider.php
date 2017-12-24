<?php

namespace  Drupal\services_demo;
use Drupal\Core\DependencyInjection\ServiceProviderBase;
use Drupal\Core\DependencyInjection\ServiceProviderInterface;
use Drupal\Core\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;


class ServicesDemoServiceProvider extends ServiceProviderBase implements ServiceProviderInterface {
  public function alter(ContainerBuilder $container) {
	$definition = $container->getDefinition('link_generator');
	$definition->setClass('Drupal\services_demo\MyLinkGenerator\MyLinkGenerator');
	

	$definition = $container->getDefinition('language_manager');
        $definition->setClass('Drupal\services_demo\MyLanguage\MyLanguage')
        ->addArgument(new Reference('entity_type.manager'));

  }
}
