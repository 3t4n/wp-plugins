<?php

namespace GS_BOOKS;
use function GS_BOOKS_PRO\is_pro_valid;

defined( 'ABSPATH' ) || exit;

/**
 * Responsible for enqueuing plugins script.
 *
 * @since 1.2.11
 */
class Scripts {

	/**
	 * Contains styles handlers and paths.
	 *
	 * @since 1.0.0
	 */
	public $styles = array();

	/**
	 * Contains scripts handlers and paths.
	 *
	 * @since 1.0.0
	 */
	public $scripts = array();

	/**
	 * Class constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		$this->add_assets();

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_frontend_assets' ), 9999 );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_assets' ), 9999 );
		add_action( 'admin_head', [ $this, 'print_plugin_icon_css' ] );

		return $this;
	}

	/**
	 * Adding assets on the $this->styles[] array.
	 *
	 * @since 1.0.0
	 */
	public function add_assets() {

		$this->add_style( 'gs-bootstrap-grid', GS_BOOKS_PLUGIN_URI . '/assets/libs/bootstrap-grid/bootstrap-grid.min.css', array(), GS_BOOKS_VERSION, 'all' );
		$this->add_style( 'gs-swiper', GS_BOOKS_PLUGIN_URI . '/assets/libs/swiper-js/swiper.min.css', array(), GS_BOOKS_VERSION, 'all' );
		$this->add_style( 'gs-font-awesome-5', GS_BOOKS_PLUGIN_URI . '/assets/libs/font-awesome/css/font-awesome.min.css', array(), GS_BOOKS_VERSION, 'all' );
		
		// Scripts
		$this->add_script( 'gs-swiper', GS_BOOKS_PLUGIN_URI . '/assets/libs/swiper-js/swiper.min.js', array( 'jquery' ), GS_BOOKS_VERSION, true );
		$this->add_style( 'gs-magnific-popup', GS_BOOKS_PLUGIN_URI . '/assets/libs/magnific-popup/magnific-popup.min.css', array(), GS_BOOKS_VERSION, 'all' );
		$this->add_script( 'gs-magnific-popup', GS_BOOKS_PLUGIN_URI . '/assets/libs/magnific-popup/magnific-popup.min.js', array( 'jquery' ), GS_BOOKS_VERSION, true );
		
		if ( ! is_pro_active() || ! is_pro_valid() ) {
			$this->add_style( 'gs-books-showcase-public', GS_BOOKS_PLUGIN_URI . '/assets/css/gs-books-showcase.min.css', array( 'gs-bootstrap-grid', 'gs-font-awesome-5' ), GS_BOOKS_VERSION, 'all' );
			$this->add_script( 'gs-books-showcase-public', GS_BOOKS_PLUGIN_URI . '/assets/js/gs-books-showcase.min.js', array( 'jquery' ), GS_BOOKS_VERSION, true );
		}

		do_action( 'gs_book__add_assets', $this );	
	}

	/**
	 * Store styles on the $this->styles[] queue.
	 *
	 * @since 1.0.0
	 *
	 * @param  string  $handler Name of the stylesheet.
	 * @param  string  $src     Full URL of the stylesheet
	 * @param  array   $deps    Array of registered stylesheet handles this stylesheet depends on.
	 * @param  boolean $ver     Specifying stylesheet version number
	 * @param  string  $media   The media for which this stylesheet has been defined.
	 * @return void
	 */
	public function add_style( $handler, $src, $deps = array(), $ver = false, $media = 'all' ) {
		$this->styles[ $handler ] = array(
			'src'   => $src,
			'deps'  => $deps,
			'ver'   => $ver,
			'media' => $media,
		);
	}

	/**
	 * Store scripts on the $this->scripts[] queue.
	 *
	 * @since 1.0.0
	 *
	 * @param  string  $handler  Name of the script.
	 * @param  string  $src      Full URL of the script
	 * @param  array   $deps      Array of registered script handles this script depends on.
	 * @param  boolean $ver       Specifying script version number
	 * @param  boolean $in_footer Whether to enqueue the script before </body> instead of in the <head>
	 * @return void
	 */
	public function add_script( $handler, $src, $deps = array(), $ver = false, $in_footer = false ) {
		$this->scripts[ $handler ] = array(
			'src'       => $src,
			'deps'      => $deps,
			'ver'       => $ver,
			'in_footer' => $in_footer,
		);
	}

	/**
	 * Return style if exits on the $this->styles[] list.
	 *
	 * @since 3.0.9
	 * @param string $handler The style name.
	 */
	public function get_style( $handler ) {
		if ( empty( $style = $this->styles[ $handler ] ) ) {
			return false;
		}

		return $style;
	}

	/**
	 * Return the script if exits on the $this->scripts[] list.
	 *
	 * @since 3.0.9
	 * @param string $handler The script name.
	 */
	public function get_script( $handler ) {
		if ( empty( $script = $this->scripts[ $handler ] ) ) {
			return false;
		}

		return $script;
	}

	/**
	 * A wrapper for registering styles.
	 *
	 * @since 1.0.0
	 *
	 * @param  string $handler The name of the stylesheet.
	 * @return boolean|void          If it gets the stylesheet then register it or false.
	 */
	public function wp_register_style( $handler ) {
		$style = $this->get_style( $handler );

		if ( ! $style ) {
			return;
		}

		$deps = (array) apply_filters( $handler . '--style', $style['deps'] );

		wp_register_style(
			$handler,
			$style['src'],
			$deps,
			$style['ver'],
			$style['media']
		);
	}

	/**
	 * A wrapper for registering scripts.
	 *
	 * @since 1.0.0
	 *
	 * @param  string $handler The name of the script.
	 * @return boolean|void          If it gets the script then register it or false.
	 */
	public function wp_register_script( $handler ) {
		$script = $this->get_script( $handler );

		if ( ! $script ) {
			return;
		}

		$deps = (array) apply_filters( $handler . '--script', $script['deps'] );
		wp_register_script(
			$handler,
			$script['src'],
			$deps,
			$script['ver'],
			$script['in_footer']
		);
	}

	/**
	 * Returns all publicly enqueuable stylesheets.
	 *
	 * @since  1.0.0
	 * @return array List of publicly enqueuable stylesheets.
	 */
	public function _get_public_style_all() {
		return (array) apply_filters(
			'gs_books_showcase_public_style_all',
			array(
				'gs-swiper',
				'gs-font-awesome-5',
				'gs-bootstrap-grid',
				'gs-magnific-popup',
				'gs-books-showcase-public',
			)
		);
	}

	/**
	 * Returns all publicly enqueuable scripts.
	 *
	 * @since  1.0.0
	 * @return array List of publicly enqueuable scripts.
	 */
	public function _get_public_script_all() {
		return (array) apply_filters(
			'gs_books_showcase_public_script_all',
			array(
				'gs-swiper',
				'gs-magnific-popup',
				'gs-books-showcase-public',
			)
		);
	}

	public function _get_assets_all( $asset_type, $group, $excludes = array() ) {

		if ( ! in_array( $asset_type, array( 'style', 'script' ) ) || ! in_array( $group, array( 'public' ) ) ) {
			return;
		}

		$get_assets = sprintf( '_get_%s_%s_all', $group, $asset_type );
		$assets     = $this->$get_assets();

		if ( ! empty( $excludes ) ) {
			$assets = array_diff( $assets, $excludes );
		}

		return (array) apply_filters( sprintf( 'gs_books_showcase_%s__%s_all', $group, $asset_type ), $assets );

	}

	public function _wp_load_assets_all( $function, $asset_type, $group, $excludes = array() ) {

		if ( ! in_array( $function, array( 'enqueue', 'register' ) ) || ! in_array( $asset_type, array( 'style', 'script' ) ) ) {
			return;
		}

		$assets   = $this->_get_assets_all( $asset_type, $group, $excludes );
		$function = sprintf( 'wp_%s_%s', $function, $asset_type );

		foreach ( $assets as $asset ) {

			$this->$function( $asset );
		}
	}

	public function wp_register_style_all( $group, $excludes = array() ) {
		$this->_wp_load_assets_all( 'register', 'style', $group, $excludes );
	}

	public function wp_enqueue_style_all( $group, $excludes = array() ) {
		$this->_wp_load_assets_all( 'enqueue', 'style', $group, $excludes );
	}

	public function wp_register_script_all( $group, $excludes = array() ) {
		$this->_wp_load_assets_all( 'register', 'script', $group, $excludes );
	}

	public function wp_enqueue_script_all( $group, $excludes = array() ) {
		$this->_wp_load_assets_all( 'enqueue', 'script', $group, $excludes );
	}

	// Use to direct enqueue
	public function wp_enqueue_style( $handler ) {
		$style = $this->get_style( $handler );

		if ( ! $style ) {
			return;
		}

		$deps = (array) apply_filters( $handler . '--style-enqueue', $style['deps'] );
		wp_enqueue_style(
			$handler,
			$style['src'],
			$deps,
			$style['ver'],
			$style['media']
		);
	}

	public function wp_enqueue_script( $handler ) {
		$script = $this->get_script( $handler );

		if ( ! $script ) {
			return;
		}

		$deps = (array) apply_filters( $handler . '--script-enqueue', $script['deps'] );

		wp_enqueue_script(
			$handler,
			$script['src'],
			$deps,
			$script['ver'],
			$script['in_footer']
		);
	}

	/**
	 * Enqueue assets for the plugin based on all dep checks and only
	 * if current page contains the shortcode.
	 *
	 * @since  3.0.9
	 *
	 * @return void
	 */
	public function enqueue_frontend_assets() {

		// Register Styles
		$this->wp_register_style_all( 'public' );

		// Register Scripts
		$this->wp_register_script_all( 'public' );

		// Enqueue for Single & Archive Pages
		if ( is_archive() || is_singular( 'gs_bookshowcase' ) || is_post_type_archive( 'gs_bookshowcase' ) || is_tax( array( 'bookshowcase_group', 'gsb_author' ) ) ) {
			wp_enqueue_style( 'gs-swiper' );
			wp_enqueue_script( 'gs-swiper' );
			wp_enqueue_style( 'gs-books-showcase-public' );
			wp_enqueue_script( 'gs-books-showcase-public' );
		}

		// Maybe enqueue assets
		gsBooksAssetGenerator()->enqueue( gsBooksAssetGenerator()->get_current_page_id() );

		do_action( 'gs_books_assets_loaded' );
	}

	public function admin_enqueue_assets( $hook ) {

		if ( $hook === 'post.php' || $hook === 'term.php' || ( isset( $_GET['post_type'] ) && $_GET['post_type'] === 'gs_bookshowcase' ) ) {

			wp_enqueue_media();
			
			wp_register_style( 'gs-datepicker', GS_BOOKS_PLUGIN_URI . '/assets/libs/date-picker/date-picker.min.css', '', GS_BOOKS_VERSION );
	
			wp_enqueue_style( 'gs-font-awesome-5', GS_BOOKS_PLUGIN_URI . '/assets/libs/font-awesome/css/font-awesome.min.css', array(), GS_BOOKS_VERSION );
	
			do_action( 'gs_book__admin_enqueue_assets' );
	
			wp_enqueue_style( 'gs-book-showcase-admin', GS_BOOKS_PLUGIN_URI . '/assets/admin/css/admin.min.css', array( 'gs-datepicker' ), GS_BOOKS_VERSION );
			wp_enqueue_script( 'gs-book-showcase-admin', GS_BOOKS_PLUGIN_URI . '/assets/admin/js/admin.min.js', array( 'jquery', 'jquery-ui-datepicker' ), GS_BOOKS_VERSION, true );

		}

	}

	public function print_plugin_icon_css() {
		?>
		<style>
			#menu-posts-gs_bookshowcase li {
				clear: both
			}

			#menu-posts-gs_bookshowcase li:has( a[href^="edit.php?post_type=gs_bookshowcase&page=gs-books-shortcode#/taxonomies"] ),
			#menu-posts-gs_bookshowcase li:nth-last-child(2) {
				position: relative;
				margin-top: 16px;
			}
			
			#menu-posts-gs_bookshowcase li:has( a[href^="edit.php?post_type=gs_bookshowcase&page=gs-books-shortcode#/taxonomies"] ):before,
			#menu-posts-gs_bookshowcase li:nth-last-child(2):before {
				content: "";
				position: absolute;
				background: hsla(0, 0%, 100%, .2);
				width: calc(100%);
				height: 1px;
				top: -8px;
			}
		</style>
		<?php
	}

	public static function add_dependency_scripts( $handle, $scripts ) {

		add_action(
			'wp_footer',
			function() use ( $handle, $scripts ) {

				global $wp_scripts;

				if ( empty( $scripts ) || empty( $handle ) ) {
					return;
				}
				if ( ! isset( $wp_scripts->registered[ $handle ] ) ) {
					return;
				}

				$wp_scripts->registered[ $handle ]->deps = array_unique( array_merge( $wp_scripts->registered[ $handle ]->deps, $scripts ) );

			}
		);

	}

	public static function add_dependency_styles( $handle, $styles ) {

		global $wp_styles;

		if ( empty( $styles ) || empty( $handle ) ) {
			return;
		}
		if ( ! isset( $wp_styles->registered[ $handle ] ) ) {
			return;
		}

		$wp_styles->registered[ $handle ]->deps = array_unique( array_merge( $wp_styles->registered[ $handle ]->deps, $styles ) );

	}
}
