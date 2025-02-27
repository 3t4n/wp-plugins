<?php

namespace Codemanas\CmBlocks;

use Codemanas\CmBlocks\Database\FavoritesDB;
use Codemanas\CmBlocks\Enhancement\BlockVisibility\BlockVisibility;
use Codemanas\CmBlocks\Enhancement\MaintenanceMode;
use Codemanas\CmBlocks\Enhancement\ScrollToTop;
use Codemanas\CmBlocks\Importer\Favorites;
use Codemanas\CmBlocks\Rest\RestModules;

defined( 'ABSPATH' ) || exit;

class Bootstrap {
	private static ?Bootstrap $_instance = null;
	private string $category_slug = 'codemanas-blocks';
	private ?string $category_title;

	public static function get_instance(): ?Bootstrap {
		return ( self::$_instance == null ) ? self::$_instance = new self() : self::$_instance;
	}

	protected function __construct() {
		require_once CM_BLOCKS_DIR_PATH . '/vendor/autoload.php';
		$this->category_title = __( 'Codemanas Blocks', 'cm-blocks' );
		add_action( 'plugins_loaded', [ $this, 'load_modules' ] );
		FavoritesDB::get_instance();

		// Register activation hook
		register_activation_hook( CM_BLOCKS_FILE_PATH, [ $this, 'on_activation' ] );
		add_action( 'admin_init', [ $this, 'redirect_to_cm_blocks_setting' ] );

	}

	/**
	 * Loads the necessary modules for the plugin.
	 *
	 * This method loads the required modules for the plugin to function properly.
	 * It includes the autoloader file, registers block categories and blocks,
	 * initializes singleton instances of several classes, and performs any additional
	 * initialization tasks required by the plugin.
	 *
	 * @return void
	 */
	public function load_modules(): void {
		add_filter( 'plugin_action_links', [ $this, 'add_plugin_link' ], 10, 2 );
		add_filter( 'block_categories_all', [ $this, 'register_categories' ], 20 );
		add_action( 'init', [ $this, 'load_textdomain' ] );
		add_action( 'init', [ $this, 'register_blocks' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'cm_blocks_enqueue_styles_and_scripts' ] );
		Patterns::get_instance();
		Admin::get_instance();
		License::get_instance();
		Favorites::get_instance();
		Importer\Importer::get_instance();
		BlockRender::get_instance();
		RestModules::get_instance();
		Editor::get_instance();
		//Load Modules that add functionality to the site
		Enhancement\Main::get_instance();
	}

	/**
	 * Check if a given slug exists in the array of items.
	 *
	 * @param  array  $array  An array of items.
	 * @param  string  $targetSlug  The target slug to check for existence.
	 *
	 * @return bool Returns true if the target slug exists in the array, otherwise false.
	 */
	public function isSlugExists( array $array, string $targetSlug ): bool {
		$slugs = array_map( function ( $item ) {
			return $item['slug'];
		}, $array );

		return in_array( $targetSlug, $slugs );
	}


	/**
	 * @param  array  $categories
	 *
	 * @return array
	 */
	public function register_categories( array $categories ): array {
		if ( empty( $categories ) ) {
			return $categories;
		}

		if ( $this->isSlugExists( $categories, $this->category_slug ) ) {
			return $categories;
		}

		// Adding a new category.
		array_unshift( $categories, [
				'slug'  => $this->category_slug,
				'title' => $this->category_title
			]
		);

		return $categories;
	}

	/**
	 * Register blocks.
	 *
	 * This method registers various blocks used in the application. It uses the `register_block_type` function to register each block.
	 *
	 * @return void
	 */
	public function register_blocks(): void {
		//slider
		register_block_type( CM_BLOCKS_DIR_PATH . '/build/blocks/slider' );
		register_block_type( CM_BLOCKS_DIR_PATH . '/build/blocks/slide-item' );
		//accordion
		register_block_type( CM_BLOCKS_DIR_PATH . '/build/blocks/accordion', [
			'keywords' => array(
				__( 'FAQs', 'cm-blocks' ),
				__( 'FAQ', 'cm-blocks' ),
				__( 'FAQS', 'cm-blocks' ),
				__( 'Q&A', 'cm-blocks' ),
				__( 'questions', 'cm-blocks' ),
			),
		] );
		register_block_type( CM_BLOCKS_DIR_PATH . '/build/blocks/accordion-item' );
		//progress-bar
		register_block_type( CM_BLOCKS_DIR_PATH . '/build/blocks/progress-bar' );
		//counter
		register_block_type( CM_BLOCKS_DIR_PATH . '/build/blocks/counter' );
		//masonry gallery
		register_block_type( CM_BLOCKS_DIR_PATH . '/build/blocks/masonry-gallery' );
		//countdown
		register_block_type( CM_BLOCKS_DIR_PATH . '/build/blocks/countdown' );
		//Social Share
		register_block_type( CM_BLOCKS_DIR_PATH . '/build/blocks/social-share' );
		register_block_type( CM_BLOCKS_DIR_PATH . '/build/blocks/social-share-item' );
		//Icon block
		register_block_type( CM_BLOCKS_DIR_PATH . '/build/blocks/icon' );
		//Timeline
		register_block_type( CM_BLOCKS_DIR_PATH . '/build/blocks/timeline' );
		//Timeline Item
		register_block_type( CM_BLOCKS_DIR_PATH . '/build/blocks/timeline/timeline-item' );
		//Timeline Content
		register_block_type( CM_BLOCKS_DIR_PATH . '/build/blocks/timeline/timeline-content' );
		//Star Rating block
		register_block_type( CM_BLOCKS_DIR_PATH . '/build/blocks/star-rating' );
		//time to read
		register_block_type( CM_BLOCKS_DIR_PATH . '/build/blocks/time-to-read' );
		//time to read
		register_block_type( CM_BLOCKS_DIR_PATH . '/build/blocks/icon-list' );
		register_block_type( CM_BLOCKS_DIR_PATH . '/build/blocks/icon-list-item' );
		//Icon Box
		register_block_type( CM_BLOCKS_DIR_PATH . '/build/blocks/icon-box' );

	}

	/**
	 * Load plugin textdomain.
	 */
	function load_textdomain(): void {
		load_plugin_textdomain( 'cm-blocks', false, CM_BLOCKS_DIR_PATH . '/languages' );
	}

	public function add_plugin_link( $plugin_actions, $plugin_file ): array {
		$new_actions = array();

		if ( basename( "cm-blocks/cm-blocks.php" === $plugin_file ) ) {

			// Translators: %s is the URL to the settings page.
			$new_actions['cmBlocks_settings'] = sprintf(
			/* translators: %s is the URL to the settings page. */
				__( '<a href="%1s">%2s</a>', 'cm-blocks' ),
				esc_url( admin_url( 'admin.php?page=cm-blocks' ) ),
				esc_html( __( 'Settings', 'cm-blocks' ) )
			);
		}

		return array_merge( $plugin_actions, $new_actions );
	}

	/**
	 * Activation hook callback
	 */

	public function on_activation() {
		add_option( 'cmblocks_plugin_activated', true );
	}

	/**
	 * Redirect to the CM Blocks Admin/Setting page
	 */
	public function redirect_to_cm_blocks_setting() {
		if ( get_option( 'cmblocks_plugin_activated', false ) ) {
			delete_option( 'cmblocks_plugin_activated' );
			wp_redirect( admin_url( 'admin.php?page=cm-blocks' ) );
			exit;
		}
	}

	public function cm_blocks_enqueue_styles_and_scripts() {
		wp_enqueue_style(
			'cm-blocks-frontend-styles',
			CM_BLOCKS_DIR_PATH_URL . 'build/frontend/index.css',
			array(),
			'1.0.0'
		);
	}

}

Bootstrap::get_instance();


