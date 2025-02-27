<?php
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Woo_Variation_Price_Display_Backend' ) ) {
	/**
	 * Plugin Back-End
	 */
	class Woo_Variation_Price_Display_Backend {
		protected static $_instance = null;

		protected function __construct() {
			$this->includes();
			$this->hooks();
			$this->init();

			do_action( 'woo_variation_price_display_backend_loaded', $this );
		}

		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}

			return self::$_instance;
		}

		protected function includes() {
		}

		protected function hooks() {
			add_action( 'admin_enqueue_scripts', array( $this, 'admin_assets' ) );
			add_filter( 'plugin_action_links_' . plugin_basename( WOO_VARIATION_PRICE_DISPLAY_PLUGIN_FILE ), array(
				$this,
				'plugin_action_links'
			) );
			add_filter( 'plugin_row_meta', array( $this, 'plugin_row_meta' ), 9, 2 );

			add_filter( 'woocommerce_get_settings_pages', array( $this, 'admin_settings_page' ), 11 );
			add_action( 'admin_menu', array( $this, 'admin_settings_menu' ) );

			add_filter( 'woocommerce_product_data_tabs', array( $this, 'product_data_tab' ) );
			add_action( 'woocommerce_product_data_panels', array( $this, 'product_data_panel' ) );
		}

		protected function init() {
		}

		/**
		 * Admin Scripts
		 */
		public function admin_assets() {
			wp_enqueue_script( 'woo-variation-price-display-admin-script', untrailingslashit( plugin_dir_url( __FILE__ ) ) . '/admin/js/scripts.js', array( 'jquery' ), '1.0.1' );
		}

		/**
		 * Plugin Action Links
		 */
		public function plugin_action_links( $links ) {
			$settings_link = array(
				'settings' => sprintf(
					'<a href="%1$s" title="%2$s">%2$s</a>',
					esc_url( add_query_arg( array(
						'page' => 'wc-settings',
						'tab'  => 'woo-variation-price-display'
					), admin_url( 'admin.php' ) ) ),
					esc_attr__( 'Settings', 'woo-variation-price-display' )
				)
			);

			$pro_link = array(
				'go-pro' => sprintf(
					'<a target="_blank" style="color: #45b450; font-weight: bold;" href="%1$s" title="%2$s">%2$s</a>',
					esc_url( 'https://wpxpress.net/products/woocommerce-variation-price-display/' ),
					esc_attr__( 'Go Pro', 'woo-variation-price-display' )
				)
			);

			if ( woo_variation_price_display()->is_pro() ) {
				$pro_link = array();
			}

			return array_merge( $settings_link, $links, $pro_link );
		}

		/**
		 * Plugin Row Meta
		 */
		public function plugin_row_meta( $links, $file ) {
			if ( plugin_basename( WOO_VARIATION_PRICE_DISPLAY_PLUGIN_FILE ) !== $file ) {
				return $links;
			}

			$report_url        = 'https://wpxpress.net/submit-ticket/';
			$documentation_url = 'https://wpxpress.net/docs/woocommerce-variation-price-display/';

			$row_meta['docs']    = sprintf( '<a target="_blank" href="%1$s" title="%2$s">%2$s</a>', esc_url( $documentation_url ), esc_html__( 'Documentation', 'woo-variation-price-display' ) );
			$row_meta['support'] = sprintf( '<a target="_blank" href="%1$s">%2$s</a>', esc_url( $report_url ), esc_html__( 'Get Help &amp; Support', 'woo-variation-price-display' ) );

			return array_merge( $links, $row_meta );
		}

		/**
		 * Admin Settings Page
		 */
		public function admin_settings_page( $settings ) {
			$settings = include dirname( __FILE__ ) . '/admin/class-woo-variation-price-display-settings.php';

			return $settings;
		}

		/**
		 * Admin Settings Menu
		 */
		public function admin_settings_menu() {
			$page_title = esc_html__( 'Variation Price Display Settings', 'woo-variation-price-display' );
			$menu_title = esc_html__( 'Variation Price', 'woo-variation-price-display' );

			$settings_link = esc_url( add_query_arg(
				array(
					'page' => 'wc-settings',
					'tab'  => 'woo-variation-price-display'
				),
				admin_url( 'admin.php' )
			) );

			add_menu_page( $page_title, $menu_title, 'edit_theme_options', $settings_link, '', 'dashicons-money-alt', 35 );
		}

		/**
		 * Product level settings tab
		 */
		public function product_data_tab( $tabs ) {
			$tabs['woo-variation-price-display-pro'] = array(
				'label'    => esc_html__( 'Price Display', 'woo-variation-price-display' ),
				'target'   => 'woo-variation-price-display-pro-options',
//				'class'    => array( 'show_if_variable' ),
				'priority' => 2,
			);

			return $tabs;
		}

		/**
		 * Product level settings panel
		 */
		public function product_data_panel() {
			$is_disable_on_shop   = get_post_meta( get_the_ID(), 'wclp_is_disable_on_shop', true );
			$is_disable_on_single = get_post_meta( get_the_ID(), 'wclp_is_disable_on_single', true );
			$price_type           = get_post_meta( get_the_ID(), 'wclp_price_type', true );
			$title_before_price   = get_post_meta( get_the_ID(), 'wclp_title_before_price', true );
			$title_after_price    = get_post_meta( get_the_ID(), 'wclp_title_after_price', true );
			$is_pro               = ! woo_variation_price_display()->is_pro() ? 'is-pro' : '';

			echo "<div id='woo-variation-price-display-pro-options' class='panel woocommerce_options_panel " . $is_pro . "'>";

			echo "<h3 style='margin-bottom: 0; padding: 0 13px;'>" . esc_html__( 'Price Display Settings', 'woo-variation-price-display' ) . "</h3>";

			echo "<p style='padding: 0 13px; margin-bottom: 15px;'>" . esc_html__( 'The following options control the price display for this product.', 'woo-variation-price-display' ) . "</p>";

			woocommerce_wp_checkbox( array(
				'id'            => 'wclp_is_disable_on_shop', // Old id 'is_disable_wclp'
				'value'         => $is_disable_on_shop,
				'label'         => esc_html__( 'Disable Features on', 'woo-variation-price-display' ),
				'description'   => esc_html__( 'Shop/Archive page', 'woo-variation-price-display' ),
				'checkboxgroup' => 'start',
			) );

			woocommerce_wp_checkbox( array(
				'id'            => 'wclp_is_disable_on_single',
				'value'         => $is_disable_on_single,
				'label'         => "",
				'description'   => esc_html__( 'Single product page', 'woo-variation-price-display' ),
				'checkboxgroup' => 'end',
			) );

			woocommerce_wp_select( array(
				'id'            => 'wclp_price_type',
				'value'         => $price_type,
				'label'         => esc_html__( 'Price Type', 'woo-variation-price-display' ),
				'wrapper_class' => 'show_if_variable',
				'options'       => array(
					''           => esc_html__( 'Global', 'woo-variation-price-display' ),
					'min'        => esc_html__( 'Show Only Minimum (Lowest) Price.', 'woo-variation-price-display' ),
					'max'        => esc_html__( 'Show Only Maximum (Highest) Price.', 'woo-variation-price-display' ),
					'min-to-max' => __( 'Minimum to Maximum Price.', 'woo-variation-price-display' ),
					'max-to-min' => __( 'Maximum to Minimum Price.', 'woo-variation-price-display' ),
					'list'       => __( 'List All Variation Prices.', 'woo-variation-price-display' ),
				),
				'description'   => esc_html__( 'Select which price type will show for this product.', 'woo-variation-price-display' ),
				'desc_tip'      => true,
			) );

			woocommerce_wp_text_input( array(
				'id'          => 'wclp_title_before_price',
				'value'       => $title_before_price,
				'label'       => esc_html__( 'Text Before the price', 'woo-variation-price-display' ),
				'description' => esc_html__( 'Enter Text to Show before the price for this product.', 'woo-variation-price-display' ),
				'desc_tip'    => true,
			) );

			woocommerce_wp_text_input( array(
				'id'          => 'wclp_title_after_price',
				'value'       => $title_after_price,
				'label'       => esc_html__( 'Text After the price', 'woo-variation-price-display' ),
				'description' => esc_html__( 'Enter Text to Show after the price for this product.', 'woo-variation-price-display' ),
				'desc_tip'    => true,
			) );

			echo "</div>";
		}


	}
}