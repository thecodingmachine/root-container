<?php
namespace Mouf\RootContainer;

use Acclimate\Container\CompositeContainer;
use Interop\Container\ContainerInterface;

/**
 * Static facade for the global container.
 * 
 * @author David Négrier <david@mouf-php.com>
 */
class RootContainer {
	
	private static $rootContainer;

	public static function init(ContainerInterface $rootContainer) {
		self::$rootContainer = $rootContainer;
	}
	
	/**
	 * Finds an entry of the root container by its identifier and returns it.
	 * 
	 * @param string $id
	 * @return mixed
	 */
	public static function get($id) {
		return self::$rootContainer->get($id);
	}

	/**
	 * Returns true if an entry is found in the root container.
	 *
	 * @param string $id
	 * @return bool
	 */
	public static function has($id) {
		return self::$rootContainer->has($id);
	}
}