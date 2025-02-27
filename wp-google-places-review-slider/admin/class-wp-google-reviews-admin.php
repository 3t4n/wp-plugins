<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    WP_Google_Reviews
 * @subpackage WP_Google_Reviews/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    WP_Google_Reviews
 * @subpackage WP_Google_Reviews/admin
 * @author     Your Name <email@example.com>
 */
class WP_Google_Reviews_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugintoken    The ID of this plugin.
	 */
	private $plugintoken;

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
	 * @param      string    $plugintoken       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugintoken, $version ) {

		$this->_token = $plugintoken;
		//$this->version = $version;
		//for testing==============
		$this->version = time();
		//===================
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
		 * defined in WP_Google_Reviews_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The WP_Google_Reviews_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		//only load for this plugin
		if(isset($_GET['page'])){
			if( strpos( $_GET['page'], "wp_fb-" ) !== false ){
				wp_enqueue_style( $this->_token, plugin_dir_url( __FILE__ ) . 'css/wprev_admin.css', array(), $this->version, 'all' );
				wp_enqueue_style( $this->_token."_wprev_w3", plugin_dir_url( __FILE__ ) . 'css/wprev_w3.css', array(), $this->version, 'all' );
			}
			
			//load template styles for wp_pro-templates_posts page
			if($_GET['page']=="wp_fb-templates_posts"){
				//enque template styles for preview
				wp_enqueue_style( $this->_token."_style1", plugin_dir_url(dirname(__FILE__)) . 'public/css/wprev-public_template1.css', array(), $this->version, 'all' );

			}
		}

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
		 * defined in WP_Google_Reviews_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The WP_Google_Reviews_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		

		//scripts for all pages in this plugin
		if(isset($_GET['page'])){
			if( strpos( $_GET['page'], "wp_fb-" ) !== false ){
				//pop-up script
				wp_register_script( 'simple-popup-js',  plugin_dir_url( __FILE__ ) . 'js/wprev_simple-popup.min.js' , '', $this->version, false );
				wp_enqueue_script( 'simple-popup-js' );
			}
		}

		//scripts for get google reviews page
		if(isset($_GET['page'])){
			if($_GET['page']=="wp_fb-googlesettings" ){
				$options = get_option('wpfbr_google_options');

				if( ! empty( $options['google_api_key'] ) )
				{
				wp_register_script( 'wpfbr_google_places_gmaps', 'https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=' . esc_attr( $options['google_api_key'] ), array( 'jquery' ) );
				wp_enqueue_script( 'wpfbr_google_places_gmaps' );
				}

				//admin js
				wp_enqueue_script( $this->_token, plugin_dir_url( __FILE__ ) . 'js/wprev_getgoogle.js', array( 'jquery' ), $this->version, false );
				//used for ajax
				wp_localize_script($this->_token, 'adminjs_script_vars', 
					array(
						'wpfb_nonce'=> wp_create_nonce('randomnoncestring'),
						'ajax_url' => admin_url( 'admin-ajax.php' ),
						'i18n'     => array( 'google_auth_error' => 
						sprintf( 
						__( '%1$sGoogle API Error:%2$s Wrong Key or Maps API not added. Due to recent changes by Google you must now add the Maps API to your existing API key in order to use the Location Lookup feature of the Google Places Widget. %3$sView documentation here%4$s', 'wp_fb-settings' ), 
						'<strong>', 
						'</strong>', 
						'<br><a href="https://wordimpress.com/documentation/google-places-reviews/creating-your-google-places-api-key/" target="_blank" class="new-window">', 
						'</a>' 
						) ) 
					)
				);
				
			}
		}
		
		//scripts for get fb reviews page
		/*
		if(isset($_GET['page'])){
			if($_GET['page']=="wp_fb-settings"){
				//admin js
				wp_enqueue_script( $this->_token, plugin_dir_url( __FILE__ ) . 'js/wprev_admin.js', array( 'jquery' ), $this->version, false );
				//used for ajax
				wp_localize_script($this->_token, 'adminjs_script_vars', 
					array(
					'wpfb_nonce'=> wp_create_nonce('randomnoncestring')
					)
				);
			}
		}
		*/
		
		//scripts for review list page
		if(isset($_GET['page'])){
			if($_GET['page']=="wp_fb-reviews"){
				//admin js
				wp_enqueue_script('review_list_page-js', plugin_dir_url( __FILE__ ) . 'js/review_list_page.js', array( 'jquery' ), $this->version, false );
			}
			
			//scripts for templates posts page
			if($_GET['page']=="wp_fb-templates_posts"){
				//admin js
				wp_enqueue_script('templates_posts_page-js', plugin_dir_url( __FILE__ ) . 'js/templates_posts_page.js', array( 'jquery' ), $this->version, false );
				wp_localize_script('templates_posts_page-js', 'adminjs_script_vars', 
					array(
					'wpfb_nonce'=> wp_create_nonce('randomnoncestring'),
					'pluginsUrl' => wpgooglerev_plugin_url
					)
				);
				//add color picker here
				wp_enqueue_style( 'wp-color-picker' );
				//enque alpha color add-on wprevpro-wp-color-picker-alpha.js
				wp_enqueue_script( 'wp-color-picker-alpha', plugin_dir_url( __FILE__ ) . 'js/wprevpro-wp-color-picker-alpha.js', array( 'wp-color-picker' ), '1.2.2', false );
			}
		}
		
	}
	
	public function add_menu_pages() {

		/**
		 * adds the menu pages to wordpress
		 */

		
		$page_title = 'WP Google Reviews: Get Google Reviews';
		$menu_title = 'WP Google Reviews';
		$capability = 'manage_options';
		$menu_slug = 'wp_fb-googlesettings';
		
		add_menu_page($page_title, $menu_title, $capability, $menu_slug, array($this,'wp_fb_googlesettings'),'dashicons-star-half');
		
		// We add this submenu page with the same slug as the parent to ensure we don't get duplicates
		$sub_menu_title = 'Get Google Reviews';
		add_submenu_page($menu_slug, $page_title, $sub_menu_title, $capability, $menu_slug, array($this,'wp_fb_googlesettings'));		
		

		// Now add the submenu page for the actual reviews list
		$submenu_page_title = 'WP FB Reviews: Reviews List';
		$submenu_title = 'Reviews List';
		$submenu_slug = 'wp_fb-reviews';
		add_submenu_page($menu_slug, $submenu_page_title, $submenu_title, $capability, $submenu_slug, array($this,'wp_fb_reviews'));
		
		// Now add the submenu page for the reviews templates
		$submenu_page_title = 'WP FB Reviews: Templates';
		$submenu_title = 'Templates';
		$submenu_slug = 'wp_fb-templates_posts';
		add_submenu_page($menu_slug, $submenu_page_title, $submenu_title, $capability, $submenu_slug, array($this,'wp_fb_templates_posts'));
		
		// Now add the submenu page for the reviews templates
		$submenu_page_title = 'WP FB Reviews: Upgrade';
		$submenu_title = 'Get Pro';
		$submenu_slug = 'wp_fb-get_pro';
		add_submenu_page($menu_slug, $submenu_page_title, $submenu_title, $capability, $submenu_slug, array($this,'wp_fb_getpro'));
	}
	
	public function wp_fb_settings() {
		require_once plugin_dir_path( __FILE__ ) . '/partials/settings.php';
	}

	public function wp_fb_reviews() {
		require_once plugin_dir_path( __FILE__ ) . '/partials/review_list.php';
	}
	public function wp_fb_googlesettings() {
		require_once plugin_dir_path( __FILE__ ) . '/partials/googlesettings.php';
	}
	public function wp_fb_templates_posts() {
		require_once plugin_dir_path( __FILE__ ) . '/partials/templates_posts.php';
	}
	public function wp_fb_getpro() {
		require_once plugin_dir_path( __FILE__ ) . '/partials/get_pro.php';
	}
	
	/**
	 * custom option and settings on settings page
	 */
	public function wpfbr_settings_init()
	{
		//--======================= FACEBOOK =======================--//
		// register a new setting for "wp_fb-settings" page
		/*
		register_setting('wp_fb-settings', 'wpfbr_options');
	 
		// register a new section in the "wp_fb-settings" page
		add_settings_section(
			'wpfbr_section_developers',
			'',
			array($this,'wpfbr_section_developers_cb'),
			'wp_fb-settings'
		);
	 
		//register fb app id input field
		add_settings_field(
			'fb_app_ID', // as of WP 4.6 this value is used only internally
			'Facebook App ID',
			array($this,'wpfbr_field_fb_app_id_cb'),
			'wp_fb-settings',
			'wpfbr_section_developers',
			array(
				'label_for'         => 'fb_app_ID',
				'class'             => 'wpfbr_row',
				'wpfbr_custom_data' => 'custom',
			)
		);
		//register get access token btn field
		add_settings_field(
			'fb_user_token_btn', // as of WP 4.6 this value is used only internally
			'Get Access Token',
			array($this,'wpfbr_gettoken_cb'),
			'wp_fb-settings',
			'wpfbr_section_developers',
			array(
				'label_for'         => 'fb_user_token_btn',
				'class'             => 'wpfbr_row'
			)
		);
		//register fb Access Token input field
		add_settings_field(
			'fb_user_token_field_display', // as of WP 4.6 this value is used only internally
			'FB Access Token',
			array($this,'wpfbr_field_fb_access_cb'),
			'wp_fb-settings',
			'wpfbr_section_developers',
			array(
				'label_for'         => 'fb_user_token_field_display',
				'class'             => 'wpfbr_row hide'
			)
		);
		*/
		//--======================= GOOGLE =======================--//

		// register a new setting for "wp_fb-google_settings" page
		register_setting('wp_fb-google_settings', 'wpfbr_google_options', array( &$this, 'wpfbr_schedule_cron' ) );

		// register a new section in the "wp_fb-google_settings" page
		add_settings_section(
			'wpfbr_section_developers_google',
			'',
			array($this,'wpfbr_section_developers_google_cb'),
			'wp_fb-google_settings'
		);
	 
		//register Google API key input field
		add_settings_field(
			'google_api_key', 
			'Google API Key',
			array($this,'wpfbr_field_google_api_key_cb'),
			'wp_fb-google_settings',
			'wpfbr_section_developers_google',
			array(
				'label_for'         => 'google_api_key',
				'class'             => 'wpfbr_row'
			)
		);
		//register location type
		add_settings_field(
			'google_location_type', 
			'Location Type',
			array($this,'wpfbr_location_type_cb'),
			'wp_fb-google_settings',
			'wpfbr_section_developers_google',
			array(
				'label_for'         => 'google_location_type',
				'class'             => 'wpfbr_row wpfbr_hide2'
			)
		);
		//register location search field
		add_settings_field(
			'google_location_txt', 
			'Location',
			array($this,'wpfbr_location_cb'),
			'wp_fb-google_settings',
			'wpfbr_section_developers_google',
			array(
				'label_for'         => 'google_location_txt',
				'class'             => 'wpfbr_row wpfbr_hide2'
			)
		);
		//register location field after autocomplete
		add_settings_field(
			'google_location_set', 
			'Location',
			array($this,'wpfbr_location_set_cb'),
			'wp_fb-google_settings',
			'wpfbr_section_developers_google',
			array(
				'label_for'         => array( 'google_location_set' => array( 'location'=>'', 'place_id'=>'' ) ),//'reference_id'=>'', 
				'class'             => 'wpfbr_row wpfbr_hide2'
			)
		);
		//fetch google reviews with a minimum of X rating
		add_settings_field(
			'google_location_minrating', 
			'Minimum Rating',
			array($this,'wpfbr_location_minrating_cb'),
			'wp_fb-google_settings',
			'wpfbr_section_developers_google',
			array(
				'label_for'         => 'google_location_minrating',
				'class'             => 'wpfbr_row wpfbr_hide2'
			)
		);
		//run cron everyday to get 5 more reviews; google places API only gives 5 reviews;
		add_settings_field(
			'google_review_cron',
			'Auto Fetch Reviews', 
			array($this,'wpfbr_location_review_cron_cb'),
			'wp_fb-google_settings',
			'wpfbr_section_developers_google',
			array(
				'label_for'         => 'google_review_cron',
				'class'             => 'wpfbr_row wpfbr_hide2'
			)
		);
		//--======================= /GOOGLE =======================--//
	}
	/**
	 * custom option and settings:
	 * callback functions
	 */
	 
	//==== developers section cb ====
	// section callbacks can accept an $args parameter, which is an array.
	// $args have the following keys defined: title, id, callback.
	// the values are defined at the add_settings_section() function.
	public function wpfbr_section_developers_cb($args)
	{
		//echos out at top of section
	}


	//--======================= GOOGLE =======================--//
	//callback function for register_settings::line 295; 
	public function wpfbr_schedule_cron( $input )
	{
		if( $input['google_review_cron'] == 1 )
		{
			if( ! wp_next_scheduled( 'wpfbr_cron_google_review' )) 
			{
				wp_schedule_event(time(), 'daily', 'wpfbr_cron_google_review');
			}
		}
		else
			wp_clear_scheduled_hook( 'wpfbr_cron_google_review' );

		return $input;
	}
	public function wpfbr_cron_googlereviews()
	{
		$options = get_option('wpfbr_google_options');
		$ret = $this->get_google_reviews( $options );
		return $ret;
	}

	// the values are defined at the add_settings_section() function.
	public function wpfbr_section_developers_google_cb($args)
	{
		//echos out at top of section
	}
	
	//==== field cb =====
	// field callbacks can accept an $args parameter, which is an array.
	// $args is defined at the add_settings_field() function.
	// wordpress has magic interaction with the following keys: label_for, class.
	// the "label_for" key value is used for the "for" attribute of the <label>.
	// the "class" key value is used for the "class" attribute of the <tr> containing the field.
	// you can add custom key value pairs to be used inside your callbacks.
	public function wpfbr_field_google_api_key_cb($args)
	{
		// get the value of the setting we've registered with register_setting()
		$options = get_option('wpfbr_google_options');

		// output the field
		?>
		<input class="regular-text" id="<?php echo esc_attr($args['label_for']); ?>" type="text" name="wpfbr_google_options[<?php echo esc_attr($args['label_for']); ?>]" placeholder="Google API Key" value="<?php echo esc_attr( $options[$args['label_for']] ); ?>">
		<p class="description">
			<?php echo  esc_html__('Enter the Google API Key of your newly created app and click Save Settings.', 'wp_fb-settings'); ?>
		</p>
		<?php
	}
	public function wpfbr_location_cb($args)
	{
		$options = get_option('wpfbr_google_options');
		?>
		<input class="regular-text" id="<?php echo esc_attr($args['label_for']); ?>" type="text" name="wpfbr_google_options[<?php echo esc_attr($args['label_for']); ?>]" 
			placeholder="Enter a location" autocomplete="off" value="<?php echo esc_attr( $options[$args['label_for']] ); ?>">
		<p class="description">
			<?php echo  esc_html__('Search for your Location. Try &#34;City name, business name&#34; if you have problems searching for your business.', 'wp_fb-settings'); ?>
		</p>
		<div id="wpfbr_result"></div>
		<?php
	}
	public function wpfbr_location_type_cb($args)
	{
		// get the value of the setting we've registered with register_setting()
		$options = get_option('wpfbr_google_options');

		$location_type = array( "all" => __('All','wp_fb-settings'), "address"=>__('Address','wp_fb-settings'), "establishment" => __('Establishment','wp_fb-settings'), "(regions)" => __('Regions','wp_fb-settings') );
		// output the field
		?>
		<select id="<?php echo  esc_attr($args['label_for']); ?>" name="wpfbr_google_options[<?php echo  esc_attr($args['label_for']); ?>]">
			<?php foreach( $location_type as $location_i => $location_v ) { ?>
			<option value="<?php echo esc_attr( $location_i ); ?>" <?php selected( $options[$args['label_for']], $location_i ); ?>><?php echo esc_attr( $location_v ); ?></option>
			<?php } ?>
		</select>		
		<p class="description">
			<?php echo  esc_html__('Enter Location Type.', 'wp_fb-settings'); ?>
		</p>
		<?php
	}

	public function wpfbr_location_set_cb( $args )
	{
		$options = get_option('wpfbr_google_options');

		foreach( $args['label_for'] as $label=>$val ){
			foreach( $val as $labeli=>$valv ){
		?>
		<label>
		<input class="regular-text" id="wpfbr_<?php echo esc_attr($labeli); ?>" type="text" readonly 
				name="wpfbr_google_options[<?php echo esc_attr($label); ?>][<?php echo esc_attr($labeli); ?>]" 
				placeholder="<?php _e('No Location set','wp_fb-settings');?>" value="<?php echo esc_attr($options[$label][$labeli]); ?>"> <?php echo ucfirst( $labeli ); ?></label><br/>
		<?php
		}}
		?>
		<p class="description">
			<?php echo  esc_html__('Found Location.', 'wp_fb-settings'); ?>
		</p>
		<?php
	}
	public function wpfbr_location_minrating_cb($args)
	{
		$options = get_option('wpfbr_google_options');
		?>
		<select id="<?php echo  esc_attr($args['label_for']); ?>" name="wpfbr_google_options[<?php echo  esc_attr($args['label_for']); ?>]">
			<?php foreach( range( 1, 5 ) as $minr ) { ?>
			<option value="<?php echo esc_attr( $minr ); ?>" <?php selected( $options[$args['label_for']], $minr ); ?>><?php echo esc_attr( $minr ); ?></option>
			<?php } ?>
		</select>		
		<p class="description">
			<?php echo  esc_html__('Only import reviews with a minimum rating of X.', 'wp_fb-settings'); ?>
		</p>
		<?php
	}

	public function wpfbr_location_review_cron_cb($args)
	{
		$options = get_option('wpfbr_google_options');
		?>
		<input type="checkbox" id="<?php echo  esc_attr($args['label_for']); ?>" name="wpfbr_google_options[<?php echo esc_attr($args['label_for']); ?>]" value="1" <?php checked( $options[$args['label_for']], "1" ); ?>/>
		<p class="description">
		<?php echo  esc_html__('Run a wp-cron to import 5 reviews everyday. Google limits the amount of reviews you can download to 5, this option allows you to get new reviews as they are added.', 'wp_fb-settings'); ?>
		</p>
		<?php
	}

	public function wpfbr_ajax_google_reviews()
	{
		global $wpdb, $current_user;
		get_currentuserinfo();

		if(!is_user_logged_in())  
		{
			$out = __('User not logged in','wpcvt_lang');
			//header( "Content-Type: application/json" );
			echo $out;
			die();
		}
		check_ajax_referer('randomnoncestring', 'wpfb_nonce');
		
		if(!defined('DOING_AJAX')) define('DOING_AJAX', 1);
		set_time_limit(60);

		$options = get_option('wpfbr_google_options');

		if( empty( $options['google_api_key'] )){
			_e('Google Places API Key not found.');
			die();
		}

		if( empty( $options['google_location_set']['place_id'] )){
			_e('There is no location set. Please search and select location to get reviews.');
			die();
		}

		echo $this->get_google_reviews( $options );
		die();
	}

	public function get_google_reviews( $options = array() )
	{
		global $wpdb;

		if( empty( $options ) )
			$options = get_option('wpfbr_google_options');

		$google_places_url = add_query_arg(
			array(
				'placeid' => $options['google_location_set']['place_id'],
				'key'     => $options['google_api_key']
			),
			'https://maps.googleapis.com/maps/api/place/details/json'
		);
		$response = $this->get_reviews( $google_places_url );

		//Error message from google;
		if ( ! empty( $response->error_message ) ) 
		{
			return '<strong>'.$response->status.'</strong>: '.$response->error_message;
		} 
		//Error essage from wordpress//
		elseif ( isset( $response['error_message'] ) && ! empty( $response['error_message'] ) ) 
		{
			return '<strong>' . $response['status'] . '</strong>: ' . $response['error_message'];
		}
		//-----------------------------------------------

		$stats = array();
		$table_name = $wpdb->prefix . 'wpfb_reviews';

		//foreach element in $arr
		foreach( $response['result']['reviews'] as $item) 
		{ 
			//only enter reviews with ratings more than X;
			if( ! empty( $options['google_location_minrating'] )&& ! empty($item['rating'])&& (int)$options['google_location_minrating'] > (int)$item['rating'])
				continue;

			//check to see if row is in db already
			$checkrow = $wpdb->get_var( "SELECT id FROM ".$table_name." WHERE created_time_stamp = '".$item['time']."' " );
			if( empty( $checkrow ) )
			{
				$stats[] =array( 
					'pageid' 			=> $response['result']['place_id'], 
					'pagename' 			=> $response['result']['name'], 
					'created_time' 		=> date( "Y-m-d H:i:s", $item['time'] ),
					'created_time_stamp' 	=> $item['time'],
					'reviewer_name' 		=> $item['author_name'],
					'reviewer_id' 		=> $item['author_name'],
					'rating' 			=> $item['rating'],
					'review_text' 		=> $item['text'],
					'hide' 			=> '',
					'review_length' 		=> str_word_count($item['text']),
					'type' 			=> 'Google',
					'userpic'			=> $item['profile_photo_url']
				);
			}
		}
		$i = 0;
		$insertnum = 0;
		foreach ( $stats as $stat ){
			$insertnum = $wpdb->insert( $table_name, $stat );
			$i=$i + 1;
		}
		return sprintf( __('%d Reviews inserted.', 'wp_fb-settings' ), $i );
	}

	/**
	 * cURL (wp_remote_get) the Google Places API
	 *
	 * @description: CURLs the Google Places API with our url parameters and returns JSON response
	 *
	 * @param $url
	 *
	 * @return array|mixed
	 */
	function get_reviews( $url ) 
	{
		//Sanitize the URL
		$url = esc_url_raw( $url );

		// Send API Call using WP's HTTP API
		$data = wp_remote_get( $url );

		if ( is_wp_error( $data ) ) 
		{
			$response['error_message'] 	= $data->get_error_message();
			$reponse['status'] 		= $data->get_error_code();
			return $response;
		}
		$response = json_decode( $data['body'], true );

		if( ! ( isset( $response['result']['reviews'] ) && ! empty( $response['result']['reviews'] ) ) )
		{
			$response['error_message'] 	= __('No Google Reviews Found.','wp_fb-settings');
			$reponse['status'] 		= __LINE__;
			return $response;
		}

		//Get Reviewers Avatars
		$response = $this->get_reviewers_avatars( $response );

		//Google response data
		return $response;
	}

	/**
	 * Get Reviewers Avatars
	 *
	 * Get avatar from Places API response or provide placeholder.
	 *
	 * @return array
	 */
	function get_reviewers_avatars( $response ) 
	{
		// Includes Avatar image from user.
		if ( isset( $response['result']['reviews'] ) && ! empty( $response['result']['reviews'] ) ) 
		{
			// Loop Google Places reviews.
			foreach( $response['result']['reviews'] as $i => $review ) {
				// Check to see if image is empty (no broken images).
				if ( ! empty( $review['profile_photo_url'] ) ) {
					$avatar_img = $review['profile_photo_url'] . '?sz=100';
				} else {
					$avatar_img = wpgooglerev_plugin_url . '/public/css/imgs/mystery-man.png';
				}
				$response['result']['reviews'][$i]['profile_photo_url'] = $avatar_img;
			}
		}
		return $response;
	}

	/**
	 * Store reviews in table, called from javascript file admin.js
	 * @access  public
	 * @since   1.0.0
	 * @return  void
	 */
	public function wpfb_process_ajax(){
	//ini_set('display_errors',1);  
	//error_reporting(E_ALL);
		
		check_ajax_referer('randomnoncestring', 'wpfb_nonce');
		
		$postreviewarray = $_POST['postreviewarray'];
		
		//var_dump($postreviewarray);

		//loop through each one and insert in to db
		global $wpdb;
		$table_name = $wpdb->prefix . 'wpfb_reviews';
		
		$stats = array();
		
		foreach($postreviewarray as $item) { //foreach element in $arr
			$pageid = $item['pageid'];
			$pagename = $item['pagename'];
			$created_time = $item['created_time'];
			$created_time_stamp = strtotime($created_time);
			$reviewer_name = $item['reviewer_name'];
			$reviewer_id = $item['reviewer_id'];
			$rating = $item['rating'];
			$review_text = $item['review_text'];
			$review_length = str_word_count($review_text);
			$rtype = $item['type'];
			
			//check to see if row is in db already
			$checkrow = $wpdb->get_row( "SELECT id FROM ".$table_name." WHERE created_time = '$created_time'" );
			if ( null === $checkrow ) {
				$stats[] =array( 
						'pageid' => $pageid, 
						'pagename' => $pagename, 
						'created_time' => $created_time,
						'created_time_stamp' => strtotime($created_time),
						'reviewer_name' => $reviewer_name,
						'reviewer_id' => $reviewer_id,
						'rating' => $rating,
						'review_text' => $review_text,
						'hide' => '',
						'review_length' => $review_length,
						'type' => $rtype
					);
			}
		}
		$i = 0;
		$insertnum = 0;
		foreach ( $stats as $stat ){
			$insertnum = $wpdb->insert( $table_name, $stat );
			$i=$i + 1;
		}
	
		$insertid = $wpdb->insert_id;

		//header('Content-Type: application/json');
		echo $insertnum."-".$insertid."-".$i;

		die();
	}

	/**
	 * adds drop down menu of templates on post edit screen
	 * @access  public
	 * @since   1.0.0
	 * @return  void
	 */	
	//add_action('media_buttons','add_sc_select',11);
	public function add_sc_select(){
		//get id's and names of templates that are post type 
		global $wpdb;
		$table_name = $wpdb->prefix . 'wpfb_post_templates';
		$currentforms = $wpdb->get_results("SELECT id, title, template_type FROM $table_name WHERE template_type = 'post'");
		if(count($currentforms)>0){
		echo '&nbsp;<select id="wprs_sc_select"><option value="select">Review Template</option>';
		foreach ( $currentforms as $currentform ){
			$shortcodes_list .= '<option value="[wprevpro_usetemplate tid=\''.$currentform->id.'\']">'.$currentform->title.'</option>';
		}
		 echo $shortcodes_list;
		 echo '</select>';
		}
	}
	//add_action('admin_head', 'button_js');
	public function button_js() {
			echo '<script type="text/javascript">
			jQuery(document).ready(function(){
			   jQuery("#wprs_sc_select").change(function() {
							if(jQuery("#wprs_sc_select :selected").val()!="select"){
							  send_to_editor(jQuery("#wprs_sc_select :selected").val());
							}
							  return false;
					});
			});
			</script>';
	}
	
	
	

}
