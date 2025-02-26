<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.asc27.com/
 * @since      1.0.0
 *
 * @package    Asimov
 * @subpackage Asimov/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * @package    Asimov
 * @subpackage Asimov/admin
 * @author     https://www.asc27.com/
 */
class Asimov_Admin {

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
	 *  Asimov Service APIS
	 *
	 * @since    1.1.0
	 * @access   private
	 * @var      Asimov_Service $asimovApi The class containing asimov services calls.
	 */
    private $asimovApi;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version, $asimov_service) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->asimovApi = $asimov_service;
		add_action('admin_menu', array( $this, 'addPluginAdminMenu' ), 9);   
		add_action('admin_init', array( $this, 'registerAndBuildFields' )); 

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
		 * defined in Asimov_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Asimov_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		$curr_page = sanitize_text_field($_GET["page"]);
		if ($curr_page === "asimov-plugin-wizard" ) {
			wp_enqueue_style( $this->plugin_name.'-bootstrap', plugin_dir_url( __FILE__ ) . 'css/includes/bootstrap/v4.6.0/bootstrap.min.css', array(), '4.6.0', 'all' );
			wp_enqueue_style( $this->plugin_name.'-fa-all', plugin_dir_url( __FILE__ ) . 'fonts/font-awesome/v5.12.2/css/all.css', array(), '5.12.2', 'all' );
			wp_enqueue_style( $this->plugin_name.'-fa', plugin_dir_url( __FILE__ ) . 'fonts/font-awesome/v5.12.2/css/fontawesome.min.css', array(), '5.12.2', 'all' );
		} else if ($curr_page === "asimov-plugin" ) {
			wp_enqueue_style( $this->plugin_name.'-bootstrap', plugin_dir_url( __FILE__ ) . 'css/includes/bootstrap/v4.6.0/bootstrap.min.css', array(), '4.6.0', 'all' );
			wp_enqueue_style( $this->plugin_name.'-fa-all', plugin_dir_url( __FILE__ ) . 'fonts/font-awesome/v5.12.2/css/all.css', array(), '5.12.2', 'all' );
		} else {
			//In Editor
			wp_enqueue_style( $this->plugin_name.'-bootstrap', plugin_dir_url( __FILE__ ) . 'css/includes/bootstrap/v4.6.0/bootstrap.min.css', array(), '4.6.0', 'all' );
			wp_enqueue_style( $this->plugin_name.'-fa-all', plugin_dir_url( __FILE__ ) . 'fonts/font-awesome/v5.12.2/css/all.css', array(), '5.12.2', 'all' );
			wp_enqueue_style( $this->plugin_name.'-fa', plugin_dir_url( __FILE__ ) . 'fonts/font-awesome/v4.7.0/css/font-awesome.min.css', array(), '4.7.0', 'all' );
		}
		wp_enqueue_style( $this->plugin_name.'-base', plugin_dir_url( __FILE__ ) . 'css/asimov-plugin.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name.'-social', plugin_dir_url( __FILE__ ) . 'css/bootstrap-social.css', array(), $this->version, 'all' );
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
		 * defined in Asimov_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Asimov_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		$curr_page = sanitize_text_field($_GET["page"]);
		if ($curr_page === "asimov-plugin-wizard" ) {
			wp_enqueue_script( $this->plugin_name.'-wizard', plugin_dir_url( __FILE__ ) . 'js/asimov-plugin-wizard.js', array( 'jquery' ), $this->version, false );
			wp_enqueue_script( $this->plugin_name.'-bootstrap', plugin_dir_url( __FILE__ ) . 'js/includes/bootstrap/v4.6.0/bootstrap.bundle.min.js', array( 'jquery'), '4.6.0', false );
			//wp_enqueue_script( $this->plugin_name.'-stripe', 'https://js.stripe.com/v3/', array( 'jquery' ), $this->version, false );
			
			wp_localize_script($this->plugin_name.'-wizard', 'LOCALIZED_VARS', array(
				'nonce' => wp_create_nonce('wp_rest'),
				'rest_url' => get_rest_url(),
				'remote_url' => $this->asimovApi->get_remote_url(),
				'origin_url' => menu_page_url($this->plugin_name.'-wizard', false),
				'plugin_url' => menu_page_url($this->plugin_name, false),
			));
		} else if ($curr_page === "asimov-plugin" ) {
		} else {
			//In Editor
			wp_enqueue_script( $this->plugin_name.'-circliful', plugin_dir_url( __FILE__ ) . 'js/metabox/jquery.circliful.js', array( 'jquery' ), $this->version, false );
			wp_enqueue_script( $this->plugin_name.'-logic', plugin_dir_url( __FILE__ ) . 'js/metabox/logic.js', array( 'jquery', 'wp-i18n' ), $this->version, false );
			wp_enqueue_script( $this->plugin_name.'-bootstrap', plugin_dir_url( __FILE__ ) . 'js/includes/bootstrap/v4.6.0/bootstrap.bundle.min.js', array( 'jquery'), '4.6.0', false );
			
			include plugin_dir_path( __DIR__ ) . 'includes/vars.php';
			
			wp_localize_script($this->plugin_name.'-logic', 'LOCALIZED_VARS', array(
				'nonce' => wp_create_nonce('wp_rest'),
				'rest_url' => get_rest_url(),
				'map_advice' => $map_advice,
				'direction_up' => $direction_up,
				'direction_up_bin' => $direction_up_bin,
				'direction_down' => $direction_down,
				'direction_down_bin' => $direction_down_bin,
			));
		}
	}
	
	public function register_endpoints() {
		register_rest_route( 'asimov-plugin/v1', '/save_info', array(
			'methods' => 'POST',
			'callback' => array( $this, 'saveSubscriptionInfo'),
			//'permission_callback' => array( $this, 'verifyEndpoint')
		));
		register_rest_route( 'asimov-plugin/v1', '/get_info', array(
			'methods' => 'POST',
			'callback' => array( $this, 'getSubscriptionInfo'),
			//'permission_callback' => array( $this, 'verifyEndpoint')
		));
		register_rest_route( 'asimov-plugin/v1', '/submit_article', array(
			'methods' => 'POST',
			'callback' => array( $this, 'submitArticle'),
			//'permission_callback' => array( $this, 'verifyEndpoint')
		));
		register_rest_route( 'asimov-plugin/v1', '/export_articles', array(
			'methods' => 'POST',
			'callback' => array( $this, 'exportArticlesRequest'),
			//'permission_callback' => array( $this, 'verifyEndpoint')
		));
		register_rest_route( 'asimov-plugin/v1', '/post_ga_info', array(
			'methods' => 'POST',
			'callback' => array( $this, 'postAnalyticsInfo'),
			//'permission_callback' => array( $this, 'verifyEndpoint')
		));
	}
	
	public function add_editor_box() {
		add_meta_box("asimov-metabox-recsys", "Asimov", array($this, "addAsimovRecSys"), "post", "normal");
	}
	
	public function plugin_locale_filter($locale, $domain) {
		if($domain === 'asimov-plugin')
		{
			if ($locale !== 'it_IT')
				return 'it_IT';
		}

		return $locale;
	}
	
	public function custom_schedules( $schedules ) {
		$schedules['asimov_monthly'] = array(
			'interval' => 28 * 24 * 60 * 60, // Every Day
			'display'  => __( 'Every Month' ),
		);
		$schedules['asimov_daily'] = array(
			'interval' => 1 * 24 * 60 * 60, // Every Day
			'display'  => __( 'Every Day' ),
		);
		$schedules['asimov_hourly'] = array(
			'interval' => 1 * 1 * 60 * 60, // Every Hour
			'display'  => __( 'Every Hour' ),
		);
		return $schedules;
	}
	
	public function asimov_hourly_routine() {
	}
	public function asimov_daily_routine() {
		$settings = get_option('asimov_settings', null);
		if( $settings !== null) {
			// Check Subscription Status
			//if($settings->is_active) {
			//	if($response && $response->active === false){
			//		$settings->is_active = false;
			//		update_option('asimov_settings', $settings);
			//	}
			//}
			// Check Article Import Status
			if(	!$settings->articles_processed ) {
				$subscription_id = $settings->subscription_id;
				$site_url = site_url('/');
				$import_status = $this->asimovApi->checkImportStatus($subscription_id, $site_url);
				if($import_status->success) {
					if($import_status->data->import_session_status === "COMPLETED") {
						$settings->articles_processed = true;

						$sub_data = $this->asimovApi->getSubscriptionData($subscription_id, $site_url);
						if($sub_data->success)
							$settings->sub_data = $sub_data->data;
						
						update_option('asimov_settings', $settings);
					}
				} else {
					if($settings->view_id) {
						$ga_status = $this->asimovApi->checkAnalytics($subscription_id, $site_url, $settings->view_id);
						if($ga_status->success)
							$ga_status = $this->asimovApi->exportArticles($subscription_id, $site_url, $settings->view_id);
					}
				}
			}
		}
	}
	
	public function addAsimovRecSys() {
		require_once 'partials/'.$this->plugin_name.'-admin-editor-recsys.php';
	}
	
	
	public function verifyEndpoint(WP_REST_Request $request) {
		return wp_verify_nonce( $request->get_header('X-WP-Nonce'), 'wp_rest' );
	}
	
	public function exportArticlesRequest(WP_REST_Request $request){
		if( $this->verifyEndpoint($request)) {
			$resp = export_articles();
			$response = new WP_REST_Response( $resp );
			$response->set_status( 200 );
			return $response;
		}
		$response = new WP_REST_Response( null );
		$response->set_status( 403 );
		return $response;
	}
	public function saveSubscriptionInfo(WP_REST_Request $request){
		if( $this->verifyEndpoint($request)) {
			$settings = new stdClass();
			$settings->user_id = $request->get_param('user_id');
			$settings->subscription_id = $request->get_param('subscription_id');
			$settings->activation_date = date("Y-m-d H:i:s");
			$settings->articles_processed = false;
			$settings->is_active = true;
			
			update_option('asimov_settings', $settings);
			
			$response = new WP_REST_Response( $settings );
			$response->set_status( 200 );
			return $response;
		}
		$response = new WP_REST_Response( null );
		$response->set_status( 403 );
		return $response;
	}

	public function postAnalyticsInfo(WP_REST_Request $request) {
		if( $this->verifyEndpoint($request)) {
			$view_id = $request->get_param('ga_view_id');
            $settings = get_option('asimov_settings', null);
            
			$status = $this->asimovApi->checkAnalytics($settings->subscription_id, site_url('/'), $view_id);
			if( $status->success || $status->data === "GA_VIEW_EMPTY" ) {
				$settings->view_id = $view_id;
				update_option('asimov_settings', $settings);
			} else {

			}
			$response = new WP_REST_Response( $status );
			$response->set_status( 200 );
			return $response;
		}
		$response = new WP_REST_Response( null );
		$response->set_status( 403 );
		return $response;
	}
	public function getSubscriptionInfo(WP_REST_Request $request) {
		if( $this->verifyEndpoint($request)) {
			$settings = get_option('asimov_settings', null);
		
			$response = new WP_REST_Response( $settings );
			$response->set_status( 200 );
			return $response;
		}
		$response = new WP_REST_Response( null );
		$response->set_status( 403 );
		return $response;
	}
	
	public function submitArticle(WP_REST_Request $request){
		if($this->verifyEndpoint($request)) {
			$post_id = $request->get_param('post_id');
			$pivots = $request->get_param('pivots');
			$settings = get_option('asimov_settings', null);

			$recsys_data = $this->asimovApi->postToRecSys($settings->subscription_id, $settings->user_id, site_url('/'), $post_id, $pivots);
			$response = new WP_REST_Response( $recsys_data );
			$response->set_status( 200 );
			return $response;
		}
		$response = new WP_REST_Response( null );
		$response->set_status( 403 );
		return $response;
	}
	
	public function addPluginAdminMenu() {
		add_menu_page(  $this->plugin_name, 'Asimov', 'administrator', $this->plugin_name, array( $this, 'displayPluginAdminSettings' ), 'dashicons-chart-area', 100 );
		add_submenu_page( NULL, 'Wizard', 'Wizard', 'administrator', $this->plugin_name.'-wizard', array( $this, 'displayPluginAdminWizard'));
	}
	public function displayPluginAdminDashboard() {
		require_once 'partials/'.$this->plugin_name.'-admin-dispay.php';
	}
	public function displayPluginAdminWizard() {
		require_once 'partials/'.$this->plugin_name.'-admin-settings-stepper.php';
	}
	public function displayPluginAdminSettings() {
		require_once 'partials/'.$this->plugin_name.'-admin-settings-display.php';
	}
	public function settingsPageSettingsMessages($error_message){
		switch ($error_message) {
				case '1':
						$message = __( 'There was an error adding this setting. Please try again.  If this persists, shoot us an email.', 'my-text-domain' );                 $err_code = esc_attr( 'settings_page_example_setting' );                 $setting_field = 'settings_page_example_setting';                 
						break;
		}
		$type = 'error';
		add_settings_error(
					$setting_field,
					$err_code,
					$message,
					$type
			);
	}
	public function registerAndBuildFields() {
			/**
		 * First, we add_settings_section. This is necessary since all future settings must belong to one.
		 * Second, add_settings_field
		 * Third, register_setting
		 */     
		add_settings_section(
			// ID used to identify this section and with which to register options
			'settings_page_general_section', 
			// Title to be displayed on the administration page
			'',  
			// Callback used to render the description of the section
				array( $this, 'settings_page_display_general_account' ),    
			// Page on which to add this section of options
			'settings_page_general_settings'                   
		);
		unset($args);
		$args = array (
							'type'      => 'input',
							'subtype'   => 'text',
							'id'    => 'settings_page_example_setting',
							'name'      => 'settings_page_example_setting',
							'required' => 'true',
							'get_options_list' => '',
							'value_type'=>'normal',
							'wp_data' => 'option'
					);
		add_settings_field(
			'settings_page_example_setting',
			'Example Setting',
			array( $this, 'settings_page_render_settings_field' ),
			'settings_page_general_settings',
			'settings_page_general_section',
			$args
		);


		register_setting(
						'settings_page_general_settings',
						'settings_page_example_setting'
						);

	}
	public function settings_page_display_general_account() {
		echo '<p>These settings apply to all Plugin Name functionality.</p>';
	} 
	public function settings_page_render_settings_field($args) {
			/* EXAMPLE INPUT
								'type'      => 'input',
								'subtype'   => '',
								'id'    => $this->plugin_name.'_example_setting',
								'name'      => $this->plugin_name.'_example_setting',
								'required' => 'required="required"',
								'get_option_list' => "",
									'value_type' = serialized OR normal,
			'wp_data'=>(option or post_meta),
			'post_id' =>
			*/     
		if($args['wp_data'] == 'option'){
			$wp_data_value = get_option($args['name']);
		} elseif($args['wp_data'] == 'post_meta'){
			$wp_data_value = get_post_meta($args['post_id'], $args['name'], true );
		}

		switch ($args['type']) {

			case 'input':
					$value = ($args['value_type'] == 'serialized') ? serialize($wp_data_value) : $wp_data_value;
					if($args['subtype'] != 'checkbox'){
							$prependStart = (isset($args['prepend_value'])) ? '<div class="input-prepend"> <span class="add-on">'.$args['prepend_value'].'</span>' : '';
							$prependEnd = (isset($args['prepend_value'])) ? '</div>' : '';
							$step = (isset($args['step'])) ? 'step="'.$args['step'].'"' : '';
							$min = (isset($args['min'])) ? 'min="'.$args['min'].'"' : '';
							$max = (isset($args['max'])) ? 'max="'.$args['max'].'"' : '';
							if(isset($args['disabled'])){
									// hide the actual input bc if it was just a disabled input the info saved in the database would be wrong - bc it would pass empty values and wipe the actual information
									echo $prependStart.'<input type="'.$args['subtype'].'" id="'.$args['id'].'_disabled" '.$step.' '.$max.' '.$min.' name="'.$args['name'].'_disabled" size="40" disabled value="' . esc_attr($value) . '" /><input type="hidden" id="'.$args['id'].'" '.$step.' '.$max.' '.$min.' name="'.$args['name'].'" size="40" value="' . esc_attr($value) . '" />'.$prependEnd;
							} else {
									echo $prependStart.'<input type="'.$args['subtype'].'" id="'.$args['id'].'" "'.$args['required'].'" '.$step.' '.$max.' '.$min.' name="'.$args['name'].'" size="40" value="' . esc_attr($value) . '" />'.$prependEnd;
							}
							/*<input required="required" '.$disabled.' type="number" step="any" id="'.$this->plugin_name.'_cost2" name="'.$this->plugin_name.'_cost2" value="' . esc_attr( $cost ) . '" size="25" /><input type="hidden" id="'.$this->plugin_name.'_cost" step="any" name="'.$this->plugin_name.'_cost" value="' . esc_attr( $cost ) . '" />*/

					} else {
							$checked = ($value) ? 'checked' : '';
							echo '<input type="'.$args['subtype'].'" id="'.$args['id'].'" "'.$args['required'].'" name="'.$args['name'].'" size="40" value="1" '.$checked.' />';
					}
					break;
			default:
					# code...
					break;
		}
	}
}