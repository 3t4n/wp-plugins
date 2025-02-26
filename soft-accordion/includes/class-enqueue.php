<?php

namespace Soft_Accordion;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue Class
 */
class Enqueue {

	/**
	 * Instance of the class.
	 *
	 * @var self|null
	 */
	protected static $instance = null;

	/**
	 * Constructor
	 */
	public function __construct() {
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_assets' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'frontend_assets' ) );
	}

	/**
	 * Frontend Assets
	 */
	public function frontend_assets() {
		wp_enqueue_style( 'dashicons' );
		wp_enqueue_style( 'sa-font-awesome', SOFT_ACCORDION_URL . '/assets/vendor/icon/fontawesome.min.css', array(), SOFT_ACCORDION_VERSION );
		wp_register_style( 'sa-frontend', SOFT_ACCORDION_ASSETS . '/css/frontend.css', array(), SOFT_ACCORDION_VERSION );

		wp_enqueue_script( 'sa-font-awesome', SOFT_ACCORDION_URL . '/assets/vendor/icon/all.min.js', array( 'jquery' ), SOFT_ACCORDION_VERSION, true );
		wp_enqueue_script(
			'sa-frontend',
			SOFT_ACCORDION_ASSETS . '/js/frontend.js',
			array(
				'wp-util',
				'jquery',
			),
			SOFT_ACCORDION_VERSION,
			true
		);

		wp_localize_script(
			'sa-frontend',
			'softAccordion',
			array(
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'isPro'   => sa_fs()->can_use_premium_code__premium_only(),
				'isAdmin' => is_admin(),
				'nonce'   => wp_create_nonce( 'soft_accordion' ),
			)
		);
	}

	/**
	 * Admin Assets
	 *
	 * @param string $hook The current admin page hook.
	 */
	public function admin_assets( $hook ) {
		// Styles.
		$style_deps = array( 'wp-components' );

		wp_enqueue_style( 'dashicons' );
		wp_enqueue_style( 'sa-swal', SOFT_ACCORDION_URL . '/assets/vendor/sweetalert2/sweetalert2.min.css', array(), SOFT_ACCORDION_VERSION );
		wp_enqueue_style( 'sa-google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap', array(), SOFT_ACCORDION_VERSION );
		wp_enqueue_style( 'sa-font-awesome', SOFT_ACCORDION_URL . '/assets/vendor/icon/fontawesome.min.css', array(), SOFT_ACCORDION_VERSION );
		wp_enqueue_style( 'sa-icon-picker', SOFT_ACCORDION_URL . '/assets/vendor/icon/fontawesome-iconpicker.min.css', array(), SOFT_ACCORDION_VERSION );
		wp_enqueue_style( 'sa-select2', SOFT_ACCORDION_URL . '/assets/vendor/select2/select2.min.css', array(), SOFT_ACCORDION_VERSION );
		wp_enqueue_style( 'sa-admin', SOFT_ACCORDION_URL . '/assets/css/admin.css', $style_deps, SOFT_ACCORDION_VERSION );

		// Enqueue media uploader and editor (needed for media handling and TinyMCE editor).
		if ( 'toplevel_page_soft-accordion' === $hook ) {
			wp_enqueue_media();
			wp_enqueue_editor();

			// animate css.
			wp_enqueue_style( 'sa-animate', SOFT_ACCORDION_URL . '/assets/vendor/animate/animate.min.css', array(), SOFT_ACCORDION_VERSION, 'all' );
		}

		// Enqueue code editor.
		if ( 'soft-accordion_page_soft-accordion-settings' === $hook ) {
			// code editor.
			wp_enqueue_code_editor(
				array(
					'type' => 'text/css',
				)
			);

			wp_enqueue_script( 'wp-theme-plugin-editor' );
			wp_enqueue_script( 'wp-codemirror' );
			wp_enqueue_style( 'wp-codemirror' );
		}

		// Scripts.
		$deps = array(
			'jquery',
			'wp-util',
			'wp-i18n',
			'wp-element',
			'wp-components',
		);

		wp_enqueue_script( 'sa-swal', SOFT_ACCORDION_URL . '/assets/vendor/sweetalert2/sweetalert2.min.js', array( 'jquery' ), SOFT_ACCORDION_VERSION, true );
		wp_enqueue_script( 'sa-font-awesome', SOFT_ACCORDION_URL . '/assets/vendor/icon/all.min.js', array( 'jquery' ), SOFT_ACCORDION_VERSION, true );
		wp_enqueue_script( 'sa-icon-picker', SOFT_ACCORDION_URL . '/assets/vendor/icon/fontawesome-iconpicker.min.js', array( 'jquery' ), SOFT_ACCORDION_VERSION, true );
		wp_enqueue_script( 'sa-select2', SOFT_ACCORDION_URL . '/assets/vendor/select2/select2.min.js', array( 'jquery' ), SOFT_ACCORDION_VERSION, true );

		wp_enqueue_script( 'sa-admin', SOFT_ACCORDION_URL . '/assets/js/admin.js', $deps, SOFT_ACCORDION_VERSION, true );

		if ( 'toplevel_page_soft-accordion' === $hook ) {
			wp_enqueue_script(
				'sa-frontend',
				SOFT_ACCORDION_ASSETS . '/js/frontend.js',
				array(
					'wp-util',
					'jquery',
				),
				SOFT_ACCORDION_VERSION,
				true
			);
		}

		wp_localize_script(
			'sa-admin',
			'softAccordion',
			array(
				'ajaxurl'        => admin_url( 'admin-ajax.php' ),
				'plugin_url'     => SOFT_ACCORDION_URL,
				'home_url'       => home_url(),
				'isAdmin'        => is_admin(),
				'is_pro'         => sa_fs()->can_use_premium_code__premium_only(),
				'upgradeUrl'     => sa_fs()->get_upgrade_url(),
				'data'           => soft_accordion_get_accordion_data(),
				'nonce'          => wp_create_nonce( 'soft_accordion' ),
				'post_id'        => isset( $_GET['post'] ) ? intval( $_GET['post'] ) : null,
				'post_category'  => get_categories( array( 'hide_empty' => false ) ),
				'post_tag'       => get_terms(
					array(
						'taxonomy'   => 'post_tag',
						'hide_empty' => false,
					)
				),
				'post_format'    => get_terms(
					array(
						'taxonomy'   => 'post_format',
						'hide_empty' => false,
					)
				),
				'all_posts'      => soft_accordion_post_fetch( 'post' ),
				'all_pages'      => soft_accordion_post_fetch( 'page' ),
				'accordions'     => soft_accordion_get_accordions(),
				'settings'       => soft_accordion_get_settings(),
				'wooInstalled'   => ! file_exists( WP_PLUGIN_DIR . '/woocommerce/woocommerce.php' ) ? false : true,
				'wooActive'      => is_plugin_active( 'woocommerce/woocommerce.php' ),
				'wooProduct'     => soft_accordion_post_fetch( 'product' ),
				'wooCategories'  => get_terms(
					array(
						'taxonomy'   => 'product_cat',
						'hide_empty' => false,
					)
				),
				'wooInstallLink' => wp_nonce_url(
					add_query_arg(
						array(
							's'    => 'woocommerce',
							'tab'  => 'search',
							'type' => 'term',
						),
						admin_url( 'plugin-install.php' )
					),
					'install-plugin_woocommerce'
				),
			)
		);
	}

	/**
	 * Get the instance of Enqueue class.
	 *
	 * @since 1.0.0
	 * @return Enqueue
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}
}

Enqueue::instance();
