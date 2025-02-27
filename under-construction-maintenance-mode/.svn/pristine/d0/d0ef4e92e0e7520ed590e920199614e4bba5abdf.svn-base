<?php
/**
 * Plugin Name: Under Construction & Maintenance Mode
 * Plugin URI: https://wpbrigade.com/wordpress/plugins/under-construction-maintenance-mode/?utm_source=ucmm-org&utm_medium=plugin-url-link
 * Description: This plugin will Display an Under Construction, Maintenance Mode or Coming Soon landing Page that takes 5 seconds to setup, while you're doing maintenance work on your site.
 * Version: 2.1.1
 * Author: WPBrigade
 * Author URI: https://www.WPBrigade.com/?utm_source=ucmm-org&utm_medium=author-url-link
 * Requires at least: 5.0
 * Text Domain: ucmm-wpbrigade
 * Domain Path: /languages
 *
 * @package ucmm-wpbrigade
 * @category Core
 * @author WPBrigade
 */

/**
 *UnderConstruction main class.
 */

 
    if ( ! function_exists( 'ucmm_wpb50659630' ) ) {
        // Create a helper function for easy SDK access.
        function ucmm_wpb50659630() {
            global $ucmm_wpb50659630;

            if ( ! isset( $ucmm_wpb50659630 ) ) {
                // Include Telemetry SDK.
                require_once dirname(__FILE__) . '/lib/wpb-sdk/start.php';

                $ucmm_wpb50659630 = wpb_dynamic_init([
                    'id'                  => '1',
                    'slug'                => 'under-construction-maintenance-mode',
                    'type'                => 'plugin',
                    'public_key'          => '1|4aOA8EuyIN4pi2miMvC23LLpnHbBZFNki9R9pVmwd673d3c8',
                    'secret_key'          => 'sk_b36c525848fee035',
                    'is_premium'          => false,
                    'has_addons'          => false,
                    'has_paid_plans'      => false,
                    'menu'                => [
                        'slug'           => 'under-construction-maintenance-mode',
                        'account'        => false,
                        'support'        => false,
                    ],
                    'settings'           => [ 'ucmm_wpbrigade_setting' => '' , 'ucmm_wpbrigade_customization' => '' ],
                ]);
            }

            return $ucmm_wpb50659630;
        }

        // Init Telemetry.
        ucmm_wpb50659630();
        // Signal that SDK was initiated.
        do_action( 'ucmm_wpb50659630_loaded' );
    }
    

if ( ! class_exists( 'UCMM_WPBrigade' ) ) :

	class UCMM_WPBrigade {

		/**
		 * @var string
		 */
		public $version = '2.1.1';

		/**
		 * @var array
		 * @since 1.0.5
		 */
		public $ucmm_settings;

		/**
		 * @var array
		 * @since 1.0.6
		 */
		public $ucmm_customize_settings;

		function __construct() {

			$this->define_constants();
			$this->_hooks();
			$this->includes();
		}

		public function define_constants() {

			$this->define( 'UCMM_WPBRIGADE_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
			$this->define( 'UCMM_WPBRIGADE_DIR_PATH', plugin_dir_path( __FILE__ ) );
			$this->define( 'UCMM_WPBRIGADE_DIR_URL', plugin_dir_url( __FILE__ ) );
			$this->define( 'UCMM_WPBRIGADE_ROOT_PATH', dirname( __FILE__ ) . '/' );
			$this->define( 'UCMM_WPBRIGADE_VERSION', $this->version );
			$this->define( 'UCMM_WPBRIGADE_FEEDBACK_SERVER', 'https://wpbrigade.com/' );
			$this->define( 'UCMM_WPBRIGADE_MAIN_FILE', 'under-construction-maintenance-mode.php' );
		}

		/**
		 * Define all the hooks.
		 *
		 * @since 1.0.0
		 * @version 1.4.0
		 */
		public function _hooks() {

			register_activation_hook( __FILE__, array( $this, 'ucmm_activation' ) );
			register_deactivation_hook( __FILE__, array( $this, 'ucmm_deactivation' ) );

			add_action( 'init', array( $this, 'ucmm_redirect_customizer' ) );
			add_action( 'init', array( $this, 'ucmm_set_setting' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'ucmm_admin_scripts' ) );
			add_action( 'wp', array( $this, 'ucmm_parse_request' ), 10, 1 ); 
			add_action( 'admin_menu', array( $this, 'ucmm_callback_url' ), 99 );

			// add_action( 'wp_ajax_ucmm_deactivate', array( $this, 'ucmm_deactivate' ) );
			add_action( 'customize_controls_enqueue_scripts', array( $this, 'ucmm_customizer_js' ) );
			add_action( 'wp_ajax_ucmm_mc_api', array( $this, 'ucmm_mc_api_function' ) );
			add_action( 'wp_ajax_nopriv_ucmm_mc_api', array( $this, 'ucmm_mc_api_function' ) );
			add_action( 'admin_bar_menu', array( $this, 'ucmm_admin_top_menu' ), 100 );
			add_action( 'admin_footer', array( $this, 'ucmm_admin_css' ), 11 );

			add_action( 'admin_init', array( $this, 'redirect_optin' ) );
			add_action( 'admin_footer', array( $this, 'add_deactivate_modal' ) );
			add_action('admin_menu', array($this, 'register_ucmm_optin_page'));
			add_action( 'wp_ajax_ucmm_optout_yes', array( $this, 'optout_yes' ) );
			add_action( 'wp_wpb_sdk_after_uninstall', array( $this, 'plugin_uninstallation' ) );

		}

		/**
		 * Summary of register_ucmm_optin_page
		 * @since 1.5.4
		 */
		function register_ucmm_optin_page()
		{
			add_submenu_page( 'under-construction-maintenance-mode', __('Activate', 'under-construction-maintenance-mode'), __('Activate', 'under-construction-maintenance-mode'),'manage_options', 'ucmm-optin', array($this, 'ucmm_render_optin_page'));

		}

		/**
		 * Summary of ucmm_render_optin_page
		 * @since 1.5.4
		 */
		function ucmm_render_optin_page() {
			include plugin_dir_path(__FILE__) . 'includes/ucmm_optin_form.php';
		}
		
		/**
		 * Summary of add_deactivate_modal
		 * @since 1.5.4
		 */
		function add_deactivate_modal() {
			global $pagenow;

			if ( 'plugins.php' !== $pagenow ) {
				return;
			}

			include plugin_dir_path(__FILE__) . 'includes/ucmm_optout_form.php';
		}

		/**
		 * Summary of add_deactivate_modal
		 * @since 1.5.4
		 */
		function optout_yes() {

			if( ! current_user_can( 'manage_options' ) || ! check_ajax_referer( 'ucmm-optout-nonce', 'optout_nonce' ) ){
				wp_die( '<p>' . __( 'Sorry, you are not allowed to edit this item.' ) . '</p>', 403 );
			}

            // Get the current option and decode it as an associative array
            $sdk_data = json_decode(get_option('wpb_sdk_under-construction-maintenance-mode'), true);

            // If there is no current option, initialize an empty array
            if (!$sdk_data) {
                $sdk_data = array();
            }

            $setting_name = $_POST['setting_name'];  // e.g., communication, diagnostic_info, extensions
            $setting_value = $_POST['setting_value'];  // The new value to be updated

            // Update the specific setting in the array
            $sdk_data[$setting_name] = $setting_value;

            // Encode the array back into a JSON string and update the option
            update_option('wpb_sdk_under-construction-maintenance-mode', json_encode($sdk_data));

			wp_die();
		}

        /**
         * This function is triggered when the plugin is uninstalled.
		 * 
         * @since 2.1.0
         */
		function plugin_uninstallation() {
            include_once ( UCMM_WPBRIGADE_DIR_PATH . 'includes/uninstall.php' );
		}

		/**
		 * Summary of redirect_optin
		 * @since 1.5.4
		 */
		function redirect_optin() {

			/**
			 * Fix the Broken Access Control (BAC) security fix.
			 *
			 * @since 1.6.3
			 */
			if ( current_user_can( 'manage_options' ) ) {
				if ( isset( $_POST['ucmm-submit-optout'] ) ) {
					if ( ! wp_verify_nonce( sanitize_text_field( $_POST['ucmm_submit_optin_nonce'] ), 'ucmm_submit_optin_nonce' ) ) {
						return;
					}
					update_option( '_ucmm_optin', 'no' );
                    // Retrieve WPB SDK existing option and set user_skip
                    $sdk_data = json_decode(get_option('wpb_sdk_under-construction-maintenance-mode'), true);
                    $sdk_data['user_skip'] = '1';
                    $sdk_data_json = json_encode($sdk_data);
                    update_option('wpb_sdk_under-construction-maintenance-mode', $sdk_data_json);
				} elseif ( isset( $_POST['ucmm-submit-optin'] ) ) {
					if ( ! wp_verify_nonce( sanitize_text_field( $_POST['ucmm_submit_optin_nonce'] ), 'ucmm_submit_optin_nonce' ) ) {
						return;
					}
					update_option( '_ucmm_optin', 'yes' );
                    //WPB SDK OPT IN OPTIONS
                    $sdk_data = array(
                        'communication'   => '1',
                        'diagnostic_info' => '1',
                        'extensions'      => '1',
                        'user_skip'      => '0',
                    );
                    $sdk_data_json = json_encode($sdk_data);
                    update_option('wpb_sdk_under-construction-maintenance-mode', $sdk_data_json);
				} elseif ( ! get_option( '_ucmm_optin' ) && isset( $_GET['page'] ) && ( $_GET['page'] === 'ucmm_settings' || $_GET['page'] === 'under-construction-maintenance-mode' || $_GET['page'] === 'ucmm_settings' || $_GET['page'] === 'abw' ) ) {

				/**
				 * XSS Attack vector found and fixed.
				 *
				 * @since 1.5.11
				 */

				$page_redirect = '';

				if (isset($_GET['page'])) {
					if ($_GET['page'] === 'ucmm_settings') {
						$page_redirect = 'ucmm_settings';
					} elseif ($_GET['page'] === 'under-construction-maintenance-mode') {
						$page_redirect = 'under-construction-maintenance-mode';
					}
				}
				
				wp_redirect( admin_url('admin.php?page=ucmm-optin&redirect-page=' . $page_redirect) );
				exit;

				} elseif ( get_option( '_ucmm_optin' ) && ( get_option( '_ucmm_optin' ) == 'yes' ) && isset( $_GET['page'] ) && $_GET['page'] === 'ucmm-optin' ) {
					wp_redirect( admin_url( 'admin.php?page=ucmm_settings' ) );
					exit;
				}
			}
		}

		public function includes() {

			include_once UCMM_WPBRIGADE_DIR_PATH . 'classes/customizer.php';
			new UCMM_WPBrigade_Entities();
			include_once UCMM_WPBRIGADE_DIR_PATH . 'classes/ucmm-wpbrigade-setup.php';
			new UCMM_WPBrigade_Setting();
			include_once UCMM_WPBRIGADE_DIR_PATH . 'classes/plugin-meta.php';

		}

		public function ucmm_activation() {

			/*Activation Plugin*/
			$this::ucmm_remove_cache();

		}

		public function ucmm_deactivation() {

			/*Deactivation Plugin*/
			$this::ucmm_remove_cache();
		}

		public static function ucmm_remove_cache() {

			global $file_prefix;
			if ( function_exists( 'w3tc_pgcache_flush' ) ) {
				w3tc_pgcache_flush();
			}
			if ( function_exists( 'wp_cache_clean_cache' ) ) {
				wp_cache_clean_cache( $file_prefix, true );
			}
		}

		function ucmm_redirect_customizer() {

			if ( ! empty( $_GET['page'] ) ) {
				if ( $_GET['page'] == 'under-construction-maintenance-mode' ) {
					$customizer_url = home_url() . '/ucmm-customize.php/?watch=ucmm-customizer&customize=ucmm';
					wp_redirect( admin_url() . 'customize.php?url=' . rawurlencode( $customizer_url ) );

					// wp_redirect(get_admin_url()."customize.php?url=".home_url()."/ucmm-customize.php?watch=ucmm-customizer");
				}
			}

			$plugin_dir = dirname( plugin_basename( __FILE__ ) );
			load_plugin_textdomain( 'ucmm-wpbrigade', false, $plugin_dir . '/languages/' );
		}

		/**
		 * Time Remaining.
		 *
		 * @since 1.0.6
		 */
		function is_ucmm_time() {

			if ( get_option( 'timezone_string' ) ) {
				date_default_timezone_set( get_option( 'timezone_string' ) );
			}
				// the timezone will be auto set according to the server timezone
			else{
				date_default_timezone_set( date_default_timezone_get() );
			}
			$ucmm_customize_settings = get_option( 'ucmm_wpbrigade_setting' );
			$ucmm_now            = time();
			$schedule_start      = isset( $this->ucmm_customize_settings['ucmm_schedule_start'] ) ? $this->ucmm_customize_settings['ucmm_schedule_start'] : null;
			$ucmm_schedule_start = isset( $schedule_start ) ? strtotime( $schedule_start ) : false;
			$schedule_end        = isset( $this->ucmm_customize_settings['ucmm_schedule_end'] ) ? $this->ucmm_customize_settings['ucmm_schedule_end'] : null;

			$ucmm_schedule_end = isset( $schedule_end ) ? strtotime( $schedule_end ) : false;

			if ( $ucmm_now > $ucmm_schedule_start && $ucmm_now <= $ucmm_schedule_end   ) {
				return true;
			} else {
				return false;
			}

		}

	/**
	 * Check manual function to check if user has manually turned on ucmm mode or not
	 * 
	 * @return bool
	 * @since 1.1.0
	 */
	function check_manual() { 
		$ucmm_settings = get_option( 'ucmm_wpbrigade_setting' );
		if( isset( $ucmm_settings['ucmm-status'] ) && 'on' == $ucmm_settings['ucmm-status'] ) { 
			return true; 
		} else { 
			return false; 
		}
	}

	/**
	* Check schedule function to check if user has schduled mode turned on or not
	*
	* @return bool
	* @since 1.1.0
	*/
	//schedule enabled and time set
	function check_schedule() {
		$ucmm_customizer_settings = get_option( 'ucmm_wpbrigade_customization' );
		$is_schedule_checked			= isset( $ucmm_customizer_settings['ucmm_schedule_show_end_time'] ) ? $ucmm_customizer_settings['ucmm_schedule_show_end_time'] : false;

		//if schedule is checked and time is remaining
		if( $is_schedule_checked ) {
			return true;
		} else {
			return false;
		}
	}

		/**
		 * parse_request Fires once all query variables for the current request have been parsed.
		 *
		 * @param $wp Current WordPress environment instance (passed by reference)
		 * @since 1.0.0
		 * @version 1.4.0
		 */

		function ucmm_parse_request( $wp ) {

			// check to disable the enable page option if schedule end-time is less than current time 
			global $wp_customize, $current_user, $user_login;
			$ucmm_settings     = get_option( 'ucmm_wpbrigade_setting' );
			$current_user_role = current( $current_user->roles );
			$screen            = function_exists( 'get_current_screen' ) ? get_current_screen() : '';

			// Exclude UCMM on if edit page is being edited.
			if ( ! empty( $screen ) && $screen->id == 'edit-post' ) {
				return;
			}

			// Exclude UCMM page for the post/s and Pages.
			if ( $this->ucmm_exclude_post() && ! ( isset( $wp_customize ) && isset( $_GET['watch'] ) && $_GET['watch'] == 'ucmm-customizer' ) ) { 
				return; 
			}

			// Main condition and excluded role/s AND [schedule is disabled] or should be false and time is left
			if( $this->check_manual() && $this->check_schedule() && $this->is_ucmm_time() && !isset( $ucmm_settings['ucmm-enable'][ 'ucmm-wpbrigade_role_' . $current_user_role ] ) ) {

				include UCMM_WPBRIGADE_DIR_PATH . 'ucmm-customize.php';
				exit();
			}

			// check_schedule, time is remaining, excluded role/s AND [schedule is disabled] or should be true
			if( $this->check_schedule() && !isset( $ucmm_settings['ucmm-enable'][ 'ucmm-wpbrigade_role_' . $current_user_role ] ) ) {

				if($this->is_ucmm_time()){
					include UCMM_WPBRIGADE_DIR_PATH . 'ucmm-customize.php';
					exit();
				}
			}

			// check_manual, time is remaining and excluded role/s AND [check_schedule is disabled] or should be false
			if( $this->check_manual() && $this->check_schedule() && !isset( $ucmm_settings['ucmm-enable'][ 'ucmm-wpbrigade_role_' . $current_user_role ] ) ) {

				if( $this->is_ucmm_time() ){				
					include UCMM_WPBRIGADE_DIR_PATH . 'ucmm-customize.php';
					exit();
				}
			}
			
			// check_manual, check_schedule unchecked and excluded role/s AND [check_schedule is disabled] or should be false
			if( $this->check_manual() && $this->check_schedule() == false && !isset( $ucmm_settings['ucmm-enable'][ 'ucmm-wpbrigade_role_' . $current_user_role ] ) ) {

				//Go to UCMM page
				include UCMM_WPBRIGADE_DIR_PATH . 'ucmm-customize.php';
				exit();
			}

			// For customizer preview.
			if( isset( $wp_customize ) && isset( $_GET['watch'] ) && $_GET['watch'] == 'ucmm-customizer' ) {

				//Go to UCMM page
				include UCMM_WPBRIGADE_DIR_PATH . 'ucmm-customize.php';
				exit();
			}

		}

		/**
		 * Disable the UCMM functionality for specific page/s or post/s.
		 *
		 * @since 1.4.0
		 * @return bool true if a pages/posts is excluded | false if pages/posts are not excluded.
		 */
		public function ucmm_exclude_post() {

			/**
			 * Disable the UCMM functionality for specific page/s or post/s.
			 *
			 * @param array|string The post ID or Post Slug which you want to remove from UCMM functionality.
			 * @since 1.4.0
			 */
			$exclude_ids = apply_filters( 'ucmm_exclude_post', false );

			if ( ! $exclude_ids ) {
				return false;
			}

			global $wp_query;

			$post_obj  = $wp_query->get_queried_object();
			$post_id   = isset( $post_obj->ID ) ? $post_obj->ID : '';
			$post_slug = isset( $post_obj->post_name ) ? $post_obj->post_name : '';

			if ( $post_slug && false !== $exclude_ids ) {

				// if array is provided by user.
				if ( is_array( $exclude_ids ) ) {
					foreach ( $exclude_ids as $value ) {
						if ( $post_slug == $value || $post_id == $value ) {
							return true;
						}
					}
				} else {
					// if single value is provided by user.
					if ( $post_slug == $exclude_ids || $post_id == $exclude_ids ) {
						return true;
					}
				}
			}
		}

		/**
		 * Enqueue jQuery and use wp_localize_script.
		 *
		 * @since 1.0.4
		 * @version 1.5.1
		 */
		function ucmm_customizer_js() {

			wp_enqueue_script( 'jquery' );
			wp_enqueue_script( 'ucmm-customize-control', plugins_url( 'assets/js/customize-controls.js', __FILE__ ), array( 'jquery', 'customize-preview' ), UCMM_WPBRIGADE_VERSION, true );

			wp_localize_script(
				'ucmm-customize-control',
				'UCMM',
				array(
					'url_path'  => plugin_dir_url( __FILE__ ),
					'autoFocus' => ( isset( $_GET['customize'] ) && $_GET['customize'] == 'ucmm' ) ? true : false,
					'customizer_strings' => array(
						_x( 'Powered by: ', 'String for the "Show Some Love" footer text', 'ucmm-wpbrigade' ),
						_x( 'WPBrigade', 'String for the "Show Some Love" footer text', 'ucmm-wpbrigade' ),
					)
				)
			);
		}
		/**
		 * Define constant if not already set
		 *
		 * @param  string      $name
		 * @param  string|bool $value
		 * @since 1.0.0
		 */
		private function define( $name, $value ) {
			if ( ! defined( $name ) ) {
				define( $name, $value );
			}
		}

		public function ucmm_admin_scripts() {
			wp_enqueue_style( 'ucmm_stlye', plugins_url( 'assets/css/style.css', __FILE__ ), array(), UCMM_WPBRIGADE_VERSION );
			wp_enqueue_script( 'ucmm-js', plugins_url( 'assets/js/main.js', __FILE__ ), array( 'jquery' ), UCMM_WPBRIGADE_VERSION, true );

			/**
			*  Localizes a registered script with data for a JavaScript variable.
			*
			*  1st Attribute is the Handle that is same as our enqueue js file.
			*  2nd Attribute is the Name that is use in ajax => url.
			*  3rd Attribute is the Data itself in which we pass the admin-ajax path in array.
			*/
			wp_localize_script(
				'ucmm-js',
				'mc_api',
				array(
					'ajaxurl'    => admin_url( 'admin-ajax.php' ),
					'loader'     => admin_url( '/images/spinner.gif' ),
					'help_nonce' => wp_create_nonce( 'ucmm_help_nonce' ),
					'security' 	 => wp_create_nonce( 'security_under-construction-maintenance-mode' ),
				)
			);
		}

		public function ucmm_mc_api_function() {

			include UCMM_WPBRIGADE_DIR_PATH . 'includes/mc-get_lists.php';
			wp_die();
		}

		public function ucmm_callback_url() {

			global $submenu;

			$parent = 'index.php';
			$page   = 'under-construction-maintenance-mode';

			// Create specific url for login view
			$login_url = wp_login_url();
			$url       = add_query_arg(
				array(
					'url'    => urlencode( $login_url ),
					'return' => admin_url( 'themes.php' ),
				),
				admin_url( 'customize.php' )
			);

			// If is Not Design Menu, return
			if ( ! isset( $submenu[ $parent ] ) ) :
				return null;
		  endif;

			foreach ( $submenu[ $parent ] as $key => $value ) :
				// Set new URL for menu item
				if ( $page === $value[2] ) :
					$submenu[ $parent ][ $key ][2] = $url;
					break;
				endif;
		  endforeach;
		}
		/**
		 * @since 1.0.5
		 */
		public function ucmm_admin_top_menu() {
			global $wp_admin_bar;
			$value = $this->ucmm_get_options( 'ucmm-status', 'off' );
			if ( $value == 'on' ) {
				$argsParent = array(
					'id'    => 'ucmm_top_menu',
					'title' => __( 'Under Construction mode Enabled', 'ucmm-wpbrigade' ),
					'href'  => admin_url( '?page=ucmm_settings' ),
					'meta'  => array( 'class' => 'ucmm_top_menu' ),

				);
				$wp_admin_bar->add_menu( $argsParent );
			}

		}

		/**
		 * custom css for admin.
		 *
		 * @since 1.0.5
		 */
		public function ucmm_admin_css() {
			echo '<style>
     #wp-admin-bar-ucmm_top_menu a{
      background: #9522ce;
     }
      #wp-admin-bar-ucmm_top_menu a:hover{
      background: #731f9c !important;
      color:#fff!important;
     }

      </style>';

		}
		/**
		 * Get setting option uccm options
		 *
		 * @since 1.0.5
		 * @param string $ucmm_key option key in options.
		 * @param mixed  $default_value default value of the option.
		 *
		 * @return mixed  any type will me return.
		 */
		public function ucmm_get_options( $ucmm_key, $default_value = false ) {

			$ucmm_wpbrigade_array = $this->ucmm_settings;
			if ( array_key_exists( $ucmm_key, $ucmm_wpbrigade_array ) ) {
				return $ucmm_wpbrigade_array[ $ucmm_key ];
			} else {
				return $default_value;
			}
		}

		/**
		 * set setting of ucmm.
		 *
		 * @since 1.0.5
		 */
		public function ucmm_set_setting() {
			$this->ucmm_settings           = (array) get_option( 'ucmm_wpbrigade_setting' );
			$this->ucmm_customize_settings = (array) get_option( 'ucmm_wpbrigade_customization' );
		}
	}

endif;

new UCMM_WPBrigade();
