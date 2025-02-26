<?php

namespace APG\Core;

use APG\Core\Posttype as Posttype;
use APG\Admin\Init as AdminInit;
use APG\Frontend\Styles;
use APG\Frontend\Render;
use APG\Frontend\Shortcodes;

/**
 * Class Init
 * @package APG\Core
 */
class Init {

	/**
	 * @var
	 */
	private $version;

	/**
	 * @var
	 */
	private $plugin_path;

    /**
     * @var
     */
    private $extensions;

	/**
	 * Init the APG plugin
	 *
	 * @param $version
	 * @param $plugin_path
	 */
	public function init_plugin( $version, $plugin_path ) {
		$this->version     = $version;
		$this->plugin_path = $plugin_path;

		$this->before_init();

		$posttype = new Posttype();
		$posttype->register();

		add_action( 'plugins_loaded', array( $this, 'apg_load_textdomain' ) );
        add_action( 'init', array( $this, 'apg_set_extensions' ), 1 );

		if( is_admin() ){
            add_action( 'init', array( $this, 'apg_load_admin' ), 2 );
		}
        else{
            new Styles( $this->extensions );
            new Render( $this->extensions );
            new Shortcodes();
        }

		new Widgets();
	}

    /**
     * Load the admin
     */
    public function apg_load_admin() {
        new AdminInit( $this->extensions );

        if( get_transient( 'agp_rewrite_flush' ) === false ) {
            add_action( 'admin_init', array( $this, 'apg_flush_rewrites' ) );
            set_transient( 'agp_rewrite_flush', true, ( 60 * 60 * 24 ) );
        }
    }

	/**
	 * APG Flush rewrites
	 */
	public function apg_flush_rewrites() {
		flush_rewrite_rules();
	}

	/**
	 * Load the APG translations
	 */
	public function apg_load_textdomain() {
		load_plugin_textdomain( 'apg', false, dirname( plugin_basename( APG_ROOT_PATH ) ) . '/languages/' );
	}

    /**
     * Load all registered extensions
     */
    public function apg_set_extensions(){
        $this->extensions = apply_filters( 'apg_extensions', array() );
    }

	/**
	 * Before init
	 */
	protected function before_init() {
		register_deactivation_hook( __FILE__, array( $this, 'apg_flush_rewrites' ) );
		register_activation_hook( __FILE__, array( $this, 'apg_flush_rewrites' ) );

		/**
		 * Register our custom thumbnail sizes
		 */
		add_image_size( 'apg-thumbnail-150-150', 150, 150, true );
		add_image_size( 'apg-thumbnail-150-84', 150, 84, true ); // 16:9
		add_image_size( 'apg-thumbnail-125-125', 125, 125, true );
		add_image_size( 'apg-thumbnail-100-100', 100, 100, true );
		add_image_size( 'apg-thumbnail-75-75', 75, 75, true );
		add_image_size( 'apg-thumbnail-50-50', 50, 50, true );
	}

}