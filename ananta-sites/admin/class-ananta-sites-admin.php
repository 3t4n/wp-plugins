<?php
/**
 * The admin-specific functionality of the plugin.
 *
 *
 * @package    Ananta_Sites
 * @subpackage Ananta_Sites/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ananta_Sites
 * @subpackage Ananta_Sites/admin
 * @author     Anantsites <https://anantsites.com/>
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly     
class Ananta_Sites_Admin {

	/**
	 * The ID of this plugin.
	 *
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = sanitize_key($plugin_name);
		$this->version = sanitize_text_field($version);

	}
        
	//import data handler
	public function import_data_ajax() {
		// Verify nonce
		if ( ! isset( $_POST['check_import_nonce'] ) && ! wp_verify_nonce( sanitize_text_field( wp_unslash ( $_POST['check_import_nonce'] ) ) , 'nonce_check' ) ) {
			wp_send_json_error('Nonce verification failed');
		}
	
		// Check user capabilities
		if ( !current_user_can('edit_posts') ) {
			wp_send_json_error('Insufficient permissions');
		}

		$step		= isset($_POST['step']) ? sanitize_text_field($_POST['step']) : '';
		$theme_id 	= isset($_POST['theme_id']) ? absint($_POST['theme_id']) : 0;

		if($step == 'init'){
			$ananta_sites = new Ananta_Sites();
			$response = $ananta_sites->init_import($theme_id);
			
			if($response['status'] == 'error'){
				wp_send_json($response);
			} else {
				$resp = ['status' => 'ok', 'msg' => 'Import Data Initailized Successfully'];
				wp_send_json($resp);
			}

		}

		if($step == 'install_plugins'){
			$ananta_sites = new Ananta_Sites();
			$response = $ananta_sites->install_required_plugins($theme_id);
			if($response['status'] == 'error'){
				wp_send_json($response);
			} else {
				$elem_options = array(
					"elementor_experiment-container" => "active",
					"elementor_experiment-container_grid" => "active",
					"elementor_experiment-e_swiper_latest" => "inactive",						
					"elementor_experiment-e_optimized_css_loading" => "inactive",						
					"elementor_experiment-e_font_icon_svg" => "inactive",						
					"elementor_unfiltered_files_upload" => true,						
				);

				foreach($elem_options as $key => $value){
					update_option($key, $value);
				}
				
				// Update Elementor content width
				if ( class_exists( 'woocommerce' ) ) {
					$delete_pages = array(
						"Shop",
						"shop",
						"Cart",
						"cart",
						"Checkout",						
						"checkout",						
						// "My Account",						
					);
	
					foreach($delete_pages as $delete_page){
						$delete_page = get_posts(
							array(
								'post_type'      => 'page',
								'post_title'     => $delete_page,
								'post_status'    => 'any',
								'numberposts'    => 1,
							)
						);
						
						if (!empty($delete_page)) {
							$page_id = $delete_page[0]->ID;
							wp_delete_post($page_id, true);
						}
					}
				}

				$resp = ['status' => 'ok', 'msg' => 'Required Plugins Installed Successfully'];
				wp_send_json($resp);
			}
		}

		if($step == 'import_data'){
			$is_import_customizer = sanitize_key($_POST['is_customizer_selected']);
			$is_import_content = sanitize_key($_POST['is_content_selected']);
			$is_replace_content = sanitize_key($_POST['is_replace_content_selected']);
			$theme_options = array(
				'import_customizer' => $is_import_customizer,
				'import_content' => $is_import_content,
				'is_replace_content' => $is_replace_content
			);
			$ananta_sites = new Ananta_Sites();
			$response = $ananta_sites->install_demo($theme_id, $theme_options);
			if($response['status'] == 'error'){
				wp_send_json($response);
			} else {
				$resp = ['status' => 'ok', 'msg' => 'Theme data imported Successfully'];
				wp_send_json($resp);
			}
			
		}
	}
	
	public function register_theme_page() {
		$menu_icon = 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjIiIGhlaWdodD0iMjIiIHZpZXdCb3g9IjAgMCAyMiAyMiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0wIDExQzAgNC45MjQ4NyA0LjkyNDg3IDAgMTEgMEMxNy4wNzUxIDAgMjIgNC45MjQ4NyAyMiAxMUMyMiAxNy4wNzUxIDE3LjA3NTEgMjIgMTEgMjJDNC45MjQ4NyAyMiAwIDE3LjA3NTEgMCAxMVpNMTcgNy4xQzE3IDYuNDkyNDkgMTYuNTA3NSA2IDE1LjkgNkg4LjIwMDAySDguMkg3LjAwNDM3QzYuNDQ5NjggNiA2LjAwMDAyIDYuNDQ5NjYgNi4wMDAwMiA3LjAwNDM1VjguMTg5ODZMNiA4LjJINi4wMDAwMlYxMi42QzYuMDAwMDIgMTMuMjA3NSA2LjQ5MjUxIDEzLjcgNy4xMDAwMiAxMy43QzcuNzA3NTQgMTMuNyA4LjIwMDAyIDEzLjIwNzUgOC4yMDAwMiAxMi42VjguMkgxNS45QzE2LjUwNzUgOC4yIDE3IDcuNzA3NTEgMTcgNy4xWk02LjAwMDA3IDE1LjkwMDFDNi4wMDAwNyAxNi41MDc2IDYuNDkyNTYgMTcuMDAwMSA3LjEwMDA3IDE3LjAwMDFDNy43MDc1OSAxNy4wMDAxIDguMjAwMDcgMTYuNTA3NiA4LjIwMDA3IDE1LjkwMDFDOC4yMDAwNyAxNS4yOTI2IDcuNzA3NTkgMTQuODAwMSA3LjEwMDA3IDE0LjgwMDFDNi40OTI1NiAxNC44MDAxIDYuMDAwMDcgMTUuMjkyNiA2LjAwMDA3IDE1LjkwMDFaTTEwLjkyMTEgMTdDMTAuNjMzMyAxNyAxMC40IDE2Ljc2NjcgMTAuNCAxNi40Nzg5VjEzLjRDMTAuNCAxMS43NDMxIDExLjc0MzIgMTAuNCAxMy40IDEwLjRIMTYuNDc5QzE2Ljc2NjcgMTAuNCAxNyAxMC42MzMzIDE3IDEwLjkyMTFDMTcgMTQuMjc4NCAxNC4yNzg0IDE3IDEwLjkyMTEgMTdaIiBmaWxsPSIjQTVBN0E5Ii8+Cjwvc3ZnPgo=';
		add_menu_page( esc_html__('Anant Sites', 'ananta-sites'), esc_html__('Anant Sites', 'ananta-sites'), 'manage_options', 'ananta-demo-import', array($this, 'theme_option_page'), $menu_icon, 30);	
		
		add_submenu_page(
			'ananta-demo-import',
			__('Template Library', 'ananta-sites'),
			__('Template Library', 'ananta-sites'),
			'manage_options',
			'ananta-demo-import'
		);
		
	}
	
	/**
	* Render the options page for plugin
	*/
	public function theme_option_page() {
		require_once ANANTA_SITES_DIR_PATH . 'admin/partials/ananta-sites-admin-display.php';
	}

	/**
	 * Register the stylesheets for the admin area.
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ananta_Sites_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ananta_Sites_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		if( isset($_GET['page']) && $_GET['page'] == 'ananta-demo-import'){
			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ananta-sites-admin.css', array(), $this->version, 'all' );
			wp_enqueue_style('ananta-custom-fonts', plugin_dir_url( __FILE__ ) . 'css/custom-fonts.css', array(), $this->version, 'all' );
			wp_enqueue_style('ananta-font-awesome-6', plugin_dir_url( __FILE__ ) . 'css/all.min.css', array(), $this->version, 'all' );
		}

	}

	/**
	 * Register the JavaScript for the admin area.
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ananta_Sites_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ananta_Sites_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		if( isset($_GET['page']) && $_GET['page'] == 'ananta-demo-import'){
			wp_enqueue_script( 'ananta-confetti', plugin_dir_url( __FILE__ ) . 'js/confetti.js', array( 'jquery' ), $this->version, false );
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ananta-sites-admin.js', array( 'jquery' ), $this->version, false );
		}       
		/* Anant Sites ajax_object */
		$theme_data = wp_get_theme();
		$theme_name = $theme_data->get('Name');
		$theme_slug = $theme_data->get('TextDomain');
		wp_localize_script(
			$this->plugin_name, 
			'my_ajax_object', 
			array(
				'ajax_url' => admin_url('admin-ajax.php'), 
				'nonce' => wp_create_nonce('nonce_check'), 
				'theme_name' => $theme_name,
				'block_editor_url' => add_query_arg(['page' => 'ananta-demo-import', 'step' => '1', 'editor' => 'block'], admin_url('admin.php')),
				'elementor_editor_url' => add_query_arg(['page' => 'ananta-demo-import', 'step' => '1', 'editor' => 'elementor'], admin_url('admin.php')),
				'install_theme_url' => add_query_arg(['action' => 'install-theme', 'theme' => 'twentytwentyone', '_wpnonce' => wp_create_nonce('install-theme')], admin_url('updates.php'))
			)
		);

	}
}