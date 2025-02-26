<?php

namespace ProfitBlue\Helpers;

/**
 * Cache
 * 
 * This class save html code to file as cache
 * 
 * @since 1.0.0
 * 
 */
class Cache {
	
	/**
	 * dir_path
	 *
	 * @var undefined
	 */
	private $dir_path = null;
	
	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {

		$this->dir_path = $this->get_dir_path();
	}

	/**
	 * Get file if exists
	 * 
	 * @param  string $filename
	 * 
	 * @since 1.0.0
	 * @access public
	 * 
	 * @return string|false
	 */
	public function get_file( $filename ) {
		$cache_filename = $this->dir_path . $filename;
		if ( file_exists( $cache_filename ) ) {
			// phpcs:ignore WordPress.WP.AlternativeFunctions.file_system_operations_fopen	
			$cache_file = fopen( $cache_filename, "r" );
			// phpcs:ignore WordPress.WP.AlternativeFunctions.file_system_operations_fread	
			$file_contents = fread( $cache_file, filesize( $cache_filename ) );
			// phpcs:ignore WordPress.WP.AlternativeFunctions.file_system_operations_fclose	
			fclose( $cache_file );

			return  '<!-- Loaded from cache! -->' . $file_contents;

		} else {
			return false;
		}
	}

	/**
	 * Create file if exists
	 * 
	 * @param  string $filename
	 * @param  string $content
	 * 
	 * @since 1.0.0
	 * @access public
	 * 
	 * @return void
	 */
	public function create_file( $filename, $content ) {
		
		$cache_filename = $this->dir_path . $filename;
		// phpcs:ignore WordPress.WP.AlternativeFunctions.file_system_operations_fopen	
		$cache_file = fopen( $cache_filename, 'w' );
		// phpcs:ignore WordPress.WP.AlternativeFunctions.file_system_operations_fwrite	
		fwrite( $cache_file, $content );
		// phpcs:ignore WordPress.WP.AlternativeFunctions.file_system_operations_fclose
		fclose( $cache_file );		
	}
	
	/**
     * Get cache dir path
     *
     * @since 1.0.0
	 * @access public
	 * 
	 * @return string
     */           
    public function get_dir_path(){
  
        $upload_dir = wp_upload_dir();
		$dir_path = $upload_dir['basedir'] . '/profitblue-cache/';
		if ( ! is_dir( $dir_path ) ) {
			wp_mkdir_p( $dir_path );
		}
  
        return $dir_path;
        
    }

}