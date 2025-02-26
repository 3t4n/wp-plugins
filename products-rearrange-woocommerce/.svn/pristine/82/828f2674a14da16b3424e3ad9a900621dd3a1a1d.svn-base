<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://haywoodtech.it
 * @since      1.0.0
 *
 * @package    Wcpr
 * @subpackage Wcpr/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wcpr
 * @subpackage Wcpr/admin
 * @author     Devtea, <devteam@haywoodtech.it>
 */
class Wcpr_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string $plugin_name       The name of this plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wcpr_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wcpr_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_style( $this->plugin_name . '-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;900&display=swap', false, $this->version );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wcpr-admin.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wcpr_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wcpr_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wcpr-admin.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name . '-runtime', plugin_dir_url( __FILE__ ) . 'react/src/build/runtime~front.js', array( 'wp-element' ), $this->version, true );
		wp_enqueue_script( $this->plugin_name . '-front', plugin_dir_url( __FILE__ ) . 'react/src/build/front.js', array( 'wp-element' ), $this->version, true );
	}

	/**
	 * Add Plugin Settings in the WordPress plugin list.
	 *
	 * @since    1.1.0
	 *
	 * @param array $links WordPress Links.
	 */
	public function add_settings_link( $links ) {
		$url           = get_admin_url() . 'admin.php?page=wcpr-reorder-settings';
		$settings_link = '<a href="' . $url . '">' . __( 'Settings', 'wcpr' ) . '</a>';
		$links[]       = $settings_link;
		return $links;
	}

	/**
	 * Increase REST maximumn perpage parameter.
	 *
	 * @param mixed $params WordPress Rest parameters.
	 */
	public function add_rest_params( $params ) {
		$params['per_page']['maximum'] = 10000;
		$params['per_page']['default'] = 200;
		$params['orderby']['enum'][]   = 'menu_order';
		return $params;
	}

	/**
	 *
	 * Add Admin menu for the Product Reorder
	 */
	public function admin_menu() {
		add_menu_page(
			__( 'Product Rearrange', 'wcpr' ),
			'Product Reorder',
			'manage_options',
			'wcpr-reorder',
			array( $this, 'admin_display' ),
			'dashicons-sort',
			55
		);
		add_submenu_page(
			'wcpr-reorder',
			__( 'API Settings', 'wcpr' ),
			__( 'API Settings', 'wcpr' ),
			'manage_options',
			'wcpr-reorder-settings',
			array( $this, 'admin_settings_display' ),
		);
	}

	/**
	 * Render Admin display page from the admin_menu function
	 */
	public function admin_display() {
		require_once 'partials/wcpr-admin-display.php';
	}

	/**
	 * Render Admin display page from the settings page
	 */
	public function admin_settings_display() {
		require_once 'partials/wcpr-admin-settings.php';
	}

	/**
	 *
	 * Register API for Updating
	 */
	public function register_api() {
		register_rest_route(
			'wcpr/api',
			'wcprupdate',
			array(
				'methods'             => WP_REST_Server::CREATABLE,
				'callback'            => array( $this, 'wcprupdate' ),
				'show_in_index'       => false,
				'permission_callback' => '__return_true',
			)
		);
		register_rest_route(
			'wcpr/api',
			'/wcprsettings_update/',
			array(
				'methods'             => 'POST',
				'callback'            => array( $this, 'wcprsettings_update' ),
				'show_in_index'       => false,
				'permission_callback' => '__return_true',
			)
		);
		register_rest_route(
			'wcpr/api',
			'/wcprsettings_fetch/',
			array(
				'methods'             => 'POST',
				'callback'            => array( $this, 'wcprsettings_fetch' ),
				'show_in_index'       => false,
				'permission_callback' => '__return_true',
			)
		);
	}

	/**
	 * REST Callback function for update.
	 *
	 * @param array $request_data Requested Data from the API.
	 */
	public function wcprupdate( $request_data ) {
		global $wpdb;
		$param       = $request_data->get_params();
		$insert_data = $param['update'];
		$result      = $this->wp_insert_rows( $insert_data, $wpdb->prefix . 'posts', true, 'ID' );
		return new WP_REST_Response( $result, 200 );
	}

	/**
	 * REST Callback function for settings update.
	 *
	 * @param array $request_data Requested Data from the API.
	 */
	public function wcprsettings_update( $request_data ) {
		$insert_data = $request_data->get_params();
		update_option( WCPR_SETTINGS, $insert_data );
		return new WP_REST_Response( $insert_data, 200 );
	}

	/**
	 * REST Callback function for settings fetch.
	 *
	 * @since    1.0.0
	 */
	public function wcprsettings_fetch() {
		$fetched_data = get_option( WCPR_SETTINGS );
		return new WP_REST_Response( $fetched_data, 200 );
	}

	/**
	 * Insert or Update Multiple Entries in the Stocks table.
	 *
	 * @since    1.0.0
	 *
	 * @param array  $row_arrays Requested Data from the API.
	 * @param array  $table_name Table Name.
	 * @param bool   $update Insert or Update Boolean value.
	 * @param string $primary_key Primary key field of the table.
	 */
	public function wp_insert_rows( $row_arrays, $table_name, $update = false, $primary_key = null ) {
		global $wpdb;
		$table_name    = esc_sql( $table_name );
		$values        = array();
		$place_holders = array();
		$query         = '';
		$query_columns = '';

		$query .= "INSERT INTO `{$table_name}` (";
		foreach ( $row_arrays as $count => $row_array ) {
			foreach ( $row_array as $key => $value ) {
				if ( 2 === $count ) {
					if ( $query_columns ) {
						$query_columns .= ', ' . $key . '';
					} else {
						$query_columns .= '' . $key . '';
					}
				}

				$values[] = $value;

				$symbol = '%s';
				if ( is_numeric( $value ) ) {
					if ( is_float( $value ) ) {
						$symbol = '%f';
					} else {
						$symbol = '%d';
					}
				}
				if ( isset( $place_holders[ $count ] ) ) {
					$place_holders[ $count ] .= ", '$symbol'";
				} else {
					$place_holders[ $count ] = "( '$symbol'";
				}
			}
			$place_holders[ $count ] .= ')';
		}

		$query .= " $query_columns ) VALUES ";
		$query .= implode( ', ', $place_holders );
		if ( $update ) {
			$update = " ON DUPLICATE KEY UPDATE $primary_key=VALUES( $primary_key ),";
			$cnt    = 0;
			foreach ( $row_arrays[2] as $key => $value ) {
				if ( 0 === $cnt ) {
					$update .= "$key=VALUES($key)";
					$cnt     = 1;
				} else {
					$update .= ", $key=VALUES($key)";
				}
			}
			$query .= $update;
		}

		$sql = $wpdb->prepare( $query, $values ); //phpcs:ignore
		if ( $wpdb->query( $sql ) ) { //phpcs:ignore
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Add Custom Sort option for sorting in the admin.
	 *
	 * @since    1.2.1
	 *
	 * @param mixed $sortby Sorting option from Woocommerce.
	 */
	public function add_woocommerce_catalog_orderby( $sortby ) {
		$sortby['menu_order'] = 'Default sorting (Custom ordering + Menu order)';
		return $sortby;
	}

	/**
	 * Updating the orderby values when user select the Default Sorting .
	 *
	 * @since    1.2.1
	 *
	 * @param mixed $args Woocommerce Order by arguments.
	 */
	public function update_woocommerce_catalog_orderby( $args ) {
		// phpcs:disable
		$orderby_value = isset( $_GET['orderby'] ) ? wc_clean( wp_unslash( $_GET['orderby'] ) ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
		if ( 'menu_order' === $orderby_value ) {
			$args['orderby'] = 'menu_order';
			$args['order']   = 'ASC';
		}
		return $args;
	}

}
