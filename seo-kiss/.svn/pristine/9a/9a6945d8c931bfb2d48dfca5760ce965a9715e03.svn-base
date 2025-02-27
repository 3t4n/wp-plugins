<?php
class Meow_SeoKissAdmin extends MeowCommon_Admin {

	public $core;

	public function __construct( $core ) {
		$this->core = $core;
		
		parent::__construct( SEOKISS_PREFIX, SEOKISS_ENTRY, SEOKISS_DOMAIN, class_exists( 'MeowPro_SeoKissCore' ) );
		if ( is_admin() ) {
			add_action( 'admin_menu', array( $this, 'app_menu' ) );

			// Load the scripts only if they are needed by the current screen
			$page = isset( $_GET["page"] ) ? sanitize_text_field( $_GET["page"] ) : null;
			$is_seo_kiss_screen = in_array( $page, [ 'seokiss_settings', 'seo_kiss_dashboard' ] );
			$is_meowapps_dashboard = $page === 'meowapps-main-menu';
			if ( $is_meowapps_dashboard || $is_seo_kiss_screen ) {
				add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
			}
		}
	}

	function admin_enqueue_scripts() {

		// Load the scripts
		$physical_file = SEOKISS_PATH . '/app/index.js';
		$cache_buster = file_exists( $physical_file ) ? filemtime( $physical_file ) : SEOKISS_VERSION;
		wp_register_script( 'seo_kiss_seo-vendor', SEOKISS_URL . 'app/vendor.js',
			['wp-element', 'wp-i18n'], $cache_buster
		);
		wp_register_script( 'seo_kiss_seo', SEOKISS_URL . 'app/index.js',
			['seo_kiss_seo-vendor', 'wp-i18n'], $cache_buster
		);
		wp_set_script_translations( 'seo_kiss_seo', 'seo-kiss' );
		wp_enqueue_script('seo_kiss_seo' );

		// Load the fonts
		wp_register_style( 'meow-neko-ui-lato-font', '//fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&display=swap');
		wp_enqueue_style( 'meow-neko-ui-lato-font' );

		// Localize and options
		wp_localize_script( 'seo_kiss_seo', 'seo_kiss_seo', [
			'api_url' => rest_url( 'seo-kiss/v1' ),
			'rest_url' => rest_url(),
			'plugin_url' => SEOKISS_URL,
			'prefix' => SEOKISS_PREFIX,
			'domain' => SEOKISS_DOMAIN,
			'is_pro' => class_exists( 'MeowPro_SeoKissCore' ),
			'is_registered' => !!$this->is_registered(),
			'rest_nonce' => wp_create_nonce( 'wp_rest' ),
			'fabicon_url' => get_site_icon_url(),
			'site_name' => get_bloginfo('name'),
			'options' => $this->core->get_all_options(),
		] );
	}

	function is_registered() {
		return apply_filters( SEOKISS_PREFIX . '_meowapps_is_registered', false, SEOKISS_PREFIX );
	}

	function app_menu() {
		add_submenu_page( 'meowapps-main-menu', 'AI-SEO KISS', 'AI-SEO KISS', 'manage_options',
			'seokiss_settings', array( $this, 'admin_settings' ) );
	}

	function admin_settings() {
		echo '<div id="SEOKISS-admin-settings"></div>';
	}

	
}

?>