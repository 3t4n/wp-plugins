<?php

class News_Element_Style_Grabber {

	function __construct() {

		add_action( 'elementor/core/files/clear_cache', array( __CLASS__, 'generate_css' ), 10, 2 );
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueue_css' ) );
	}

	public static function compress_css( $css ) {

		$out = str_replace( '; ', ';', str_replace( ' }', '}', str_replace( '{ ', '{', str_replace( array(
			"\r\n",
			"\r",
			"\n",
			"\t",
			'  ',
			'    ',
			'    '
		), "", preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css ) ) ) ) );

		return $out;
	}
 
	public static function generate_css() {

		global $wp_filesystem;
		require_once( ABSPATH . 'wp-admin/includes/file.php' );
		$path            = realpath( NEWS_ELM_PATH . '/widgets/block/' );
		$self_files      = glob( $path . '/*.css' );
		$recursive_files = glob( $path . '/**/*.css' );
		$all_files       = $self_files + $recursive_files;
		$csscont         = '';
		foreach ( $all_files as $filename ) {
			$csscont .= file_get_contents( $filename );
		}

		$upload_dir = wp_upload_dir();
		$dir        = trailingslashit( $upload_dir['basedir'] );
		WP_Filesystem();
		$wp_filesystem->put_contents( $dir . 'news-element.css', self::compress_css( $csscont ), 0644 );
	}

	public static function enqueue_css() {
		$uploads = wp_upload_dir();
		wp_enqueue_style( 'news-element', trailingslashit( $uploads['baseurl'] ) . 'news-element.css', array() );
	}

}

new News_Element_Style_Grabber();

