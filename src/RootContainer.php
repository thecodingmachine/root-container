<?php
namespace Mouf;

use Acclimate\Container\CompositeContainer;
use Interop\Container\ContainerInterface;

/**
 * Static facade for the global container.
 * 
 * @author David Négrier <david@mouf-php.com>
 */
class RootContainer {
	
	private static $rootContainer;
	
	/**
	 * Finds an entry of the root container by its identifier and returns it.
	 * 
	 * @param string $id
	 * @return mixed
	 */
	public static function get($id) {
		return self::getInstance()->get($id);
	}
	
	/**
	 * Returns the instance of the root container.
	 * 
	 * @return ContainerInterface 
	 */
	public static function getInstance() {
		if (!self::$rootContainer) {
			self::$rootContainer = new CompositeContainer();
			
			$container_descriptors = require __DIR__.'/../../../../containers.php';
			
			foreach ($container_descriptors as $descriptor) {
				if ($descriptor['enable']) {
					$container = $descriptor['factory'](self::$rootContainer);
					$rootContainer->addContainer($container);
				}
			}
		}
		return self::$rootContainer;
	}
}