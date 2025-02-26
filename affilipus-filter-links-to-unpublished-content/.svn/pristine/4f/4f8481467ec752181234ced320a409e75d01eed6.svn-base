<?php
namespace imbaa\AffilipusLinkfilter\Autoload;
/**
 * Class psr4
 * @since 1.0.0
 * @package Inpsyde\ERPConnect\Core\Autoload
 */
class Psr_4 {

	/**
	 * Namespace to folder
	 *
	 * @since 1.0.0
	 * @var array
	 */
	private $namespace_folder = array();


	/**
	 * Add Namespace for Directory
	 *
	 * @since 1.0.0
	 * @param string $namespace
	 * @param string $directory
	 */
	public function add( $namespace, $directory ) {

		if ( ! $namespace || ! $directory ) {
			return;
		}

		$namespace = trim( $namespace, '\\' ) . '\\';
		$directory = str_replace( array( '\\', '/' ), DIRECTORY_SEPARATOR, $directory );
		$directory = rtrim( $directory, DIRECTORY_SEPARATOR ) . DIRECTORY_SEPARATOR;

		$this->namespace_folder[ $namespace ] = $directory;
	}

	/**
	 * Autoload class files for namespace
	 *
	 * @since 1.0.0
	 * @param string $class_name
	 */
	public function autoload( $class_name ) {
		
		if ( ! $this->namespace_folder ) {
			return;
		}

		foreach ( $this->namespace_folder as $prefix => $dir ) {



			if ( $class_name === strstr( $class_name, $prefix ) ) {
				$class_path = str_replace( array( $prefix, '\\' ), array( '', DIRECTORY_SEPARATOR ) , $class_name ) . '.php';
				require $dir . $class_path;
			}
		}

	}
}
