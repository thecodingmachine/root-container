<?php
namespace Mouf\RootContainer;

use Interop\Container\ContainerInterface;
use Interop\Framework\ModuleInterface;

/**
 * Static facade for the global container.
 * 
 * @author David Négrier <david@mouf-php.com>
 */
class RootContainerModule implements ModuleInterface {


	/**
	 * Returns the name of the module.
	 *
	 * @return string
	 */
	function getName()
	{
		return "root-container";
	}

	/**
	 * You can return a container if the module provides one.
	 *
	 * It will be chained to the application's root container.
	 *
	 * @param ContainerInterface $rootContainer
	 * @return ContainerInterface|null
	 */
	function getContainer(ContainerInterface $rootContainer)
	{
		// TODO: Implement getContainer() method.
	}

	/**
	 * You can provide init scripts here.
	 */
	function init()
	{
		// Let's do nothing
	}
}