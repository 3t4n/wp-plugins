<?php

namespace FIC\Featured_Image_Customizer;

! defined( ABSPATH ) || exit;

if ( ! class_exists( 'FIC_FS' ) ) {

	class FIC_FS extends Featured_Image_Customizer {

		public function __construct() {
			parent::__construct();
		}

		public function get_file( $filename ) {
			return $this->settings['plugin_uploads'] . $filename;
		}

		public function save_file( $url, $filename ) {
			$file_contents = file_get_contents( $url );

			if ( ! $file_contents ) {
				return false;
			}

			if ( file_put_contents( $this->settings['plugin_uploads'] . $filename, $file_contents ) ) {
				return true;
			}

			return false;
		}

		public function file_exist( $filename ) {
			if ( ! file_exists( $this->settings['plugin_uploads'] . $filename ) ) {
				return false;
			}

			return true;
		}

		public function create_directory( $path ) {
			if ( is_dir( $path ) ) {
				return false;
			}

			if ( mkdir( $path, 0755 ) ) {
				return true;
			}

			return false;
		}

		public function remove_directory( $path ) {
			if ( ! is_dir( $path ) ) {
				return false;
			}

			$files = scandir( $path );

			foreach ( $files as $file ) {
				if ( '.' !== $file && '..' !== $file ) {
					$absolute_path = $path . DIRECTORY_SEPARATOR . $file;

					if ( is_dir( $absolute_path ) && ! is_link( $absolute_path ) ) {
						$this->remove_directory( $absolute_path );
					} else {
						wp_delete_file( $absolute_path );
					}
				}
			}

			return rmdir( $path );
		}
	}
}
