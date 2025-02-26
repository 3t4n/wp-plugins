<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://flothemes.com
 * @since      1.0.0
 *
 * @package    Pictimewp
 * @subpackage Pictimewp/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Pictimewp
 * @subpackage Pictimewp/admin
 * @author     Flothemes <alexg@flothemes.com>
 */
class Pictimewp_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version, $api_url ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

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
		 * defined in Pictimewp_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Pictimewp_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
	  */

		if(defined('FLO_ENVIROMENT') && FLO_ENVIROMENT === 'DEV') {
			$ver = mt_rand(0, 99999);
		} else {
			$ver = $this->version;
		}

		$cpt =  array('flo_pictime_gallery');
		$screen = get_current_screen();

		//load the scripts only on pages belonging to our plugin
		if(isset($screen->post_type) && in_array($screen->post_type, $cpt) ||
					(isset($screen->base) && 'toplevel_page_flo_pictime_settings' == $screen->base ) ||
					(isset($screen->base) && strpos($screen->base, 'flo_pictime_settings') !== false )

				) {

			wp_enqueue_style( 'pt-icons', plugin_dir_url( __FILE__ ) . 'assets/icons-fonts/style.css', array(), $ver, 'all' );
			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/pictimewp-admin.css', array(), $ver, 'all' );

		}

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {


		$ver = $this->version;


		$cpt =  array('flo_pictime_gallery');
		$screen = get_current_screen();

		//load the scripts only on pages belonging to our plugin
		if(isset($screen->post_type) && in_array($screen->post_type, $cpt) ||
					(isset($screen->base) && 'toplevel_page_flo_pictime_settings' == $screen->base ) ||
					(isset($screen->base) && strpos($screen->base, 'flo_pictime_settings') !== false ) ||
					(isset($_GET['post_type']) && $_GET['post_type'] == 'flo_pictime_gallery') // new PT gallery page

				) {

			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/pictimewp-admin.js', array( 'jquery' ), $ver, false );

			// wp_enqueue_script( $this->plugin_name . '-lazyloading', plugin_dir_url( __FILE__ ) . 'js/flo-lazyloading.js', array( 'jquery' ), $ver, false );
			wp_enqueue_script( $this->plugin_name . '-app', plugin_dir_url( __FILE__ ) . 'js/app.min.js', array( 'jquery' ), $ver, false );
			wp_enqueue_script( $this->plugin_name . '-vendor', plugin_dir_url( __FILE__ ) . 'js/vendor.min.js', array( 'jquery' ), $ver, false );

			$pictime_api = new Flo_Pictime_Api();
			$projectData = $pictime_api->get_projects();
			$token = $pictime_api->get_saved_token();
			$api_url = 'https://productionapi.pic-time.com/apiV2/';
			$is_new_post = 1; // 0 means we are creating a new post

			$screen_data = $screen;
			if(isset($screen_data->post_type) && $screen_data->post_type=='flo_pictime_gallery' ) {
					if(isset($_GET['post']) && is_numeric($_GET['post']) ) {
							$is_new_post = 0;
					}

			}

			$pictime_data = [
				'projects' =>  is_array($projectData) ? $projectData['projects'] : NULL,
				'api_url' => $api_url,
				'token' => $token,
				'is_new_post' => $is_new_post,
				'wp_dashboard_url' => get_dashboard_url(),
				'wp_plugin_dir_url' => FLOPT_DIR_URL,
				'pt_settings_url' => get_dashboard_url(0, 'admin.php?page=flo_pictime_settings')
			];

			if(isset($_GET['post']) && is_numeric($_GET['post']) ) {
				$pt_gallery_data = get_post_meta($_GET['post'], 'pt_gallery_data', true);
				$pictime_data['pt_gallery_data'] = $pt_gallery_data;
			}

			wp_localize_script( $this->plugin_name, 'flo_ajax_var', array(
				'nonce' => wp_create_nonce('flo-pt-nonce')
			));

			wp_localize_script('pictimewp-app', 'pictime_data', $pictime_data);

			$pt_options = get_option('flo_pictime_options');

			if(!$pt_options){
				$pt_options = [];
			}
			wp_localize_script('pictimewp-app', 'pt_options', $pt_options);

			// if this flag is true, then it means the PRO features will not work
			$pt_needs_activation = array('0');
			if(FLOPT_IS_PRO){
				global $pta;
				if(!$pta){ // check if plugin is activated
					$pt_needs_activation = array('1');
				}
			}

			wp_localize_script('pictimewp-app', 'pt_needs_activation', $pt_needs_activation);


		}

	}

	/**
	 * Plugin option page menu
	 *
	 * @since    1.0.0
	 */
	public function flo_add_pictime_options() {

		$pictime_api = new Flo_Pictime_Api();
		add_menu_page( $page_title  = 'FloPicTime settings', $menu_title = 'FloPicTime Settings', $capability = 'manage_options', $menu_slug = 'flo_pictime_settings', $function = array(&$pictime_api, 'pictime_options') , $icon_url = 'dashicons-admin-generic', $position = '56' );
	}

	/**
	 *
	 * Handle the ajax request for PicTime logout action
	 *
	 */
	public function flo_pt_logout() {

		// Bail if we don't have proper permissions
		if(!current_user_can( 'manage_options' ) || !isset($_POST['nonce']) || !wp_verify_nonce( $_POST['nonce'], 'flo-pt-nonce' )) {
			die ( 'Error logout');
		}

		// we need just to delete the current option where the token is saved 'flo_pictime_options'
		delete_option('flo_pictime_options');
		delete_transient('flo_pictime_projects');
		delete_transient('account_integrations_data');


		_e('Logged out succesfully','pictimewp');

		exit();
	}

	/**
	 *
	 * Update the Account integration data
	 *
	 */
	public function flo_sync_data() {

		// Bail if we don't have proper permissions
		if(!current_user_can( 'manage_options' ) || !isset($_POST['nonce']) || !wp_verify_nonce( $_POST['nonce'], 'flo-pt-nonce' )) {
			die ( 'Error sync');
		}

		// get the current options
		$pictime_options = get_option('flo_pictime_options', array());

		$pictime_api = new Flo_Pictime_Api();

		$acces_token = $pictime_api->get_saved_token();

		delete_transient('account_integrations_data');
		$account_integration = $pictime_api->accountIntegrations($acces_token);



		$pictime_options['account_integrations'] = $account_integration;

		update_option( 'flo_pictime_options', $pictime_options, $autoload = false );
		echo "Account integration data updated succesfully";

		exit();
	}

	/*
	*	Process the Ajax requst that creates a Pic Time Post
	*/
	public function create_pt_gallery_post() {

		// Bail if we don't have proper permissions
		if(!current_user_can( 'manage_options' ) || !isset($_POST['nonce']) || !wp_verify_nonce( $_POST['nonce'], 'flo-pt-nonce' )) {
			die ( 'Error create gallery');
		}

		$response = array('status' => 'no_post_created');

		if(isset($_POST['title']) && isset($_POST['state']) ) {
			$new_post = array(
          'post_title' => sanitize_text_field($_POST['title']),
          'post_status' => 'publish',
          'post_type' => 'flo_pictime_gallery',
      );

			if(isset($_POST['post_id']) && is_numeric($_POST['post_id']) && $_POST['post_id'] > 0 ) {
				$new_post['ID'] = (int)$_POST['post_id']; // if we have the ID, we will update an existing post
			}

			$new_post_id = wp_insert_post($new_post);

			if(is_numeric($new_post_id) && $new_post_id > 0) {
				self::update_pt_gallery_meta($new_post_id, $_POST['state'] );
			}

			$response['created_post_id'] = $new_post_id;
			$response['status'] = 'ok';
			$response['post_edit_url'] = get_edit_post_link($new_post_id);
		}

		echo json_encode($response);
		exit();
	}

	public function update_pt_gallery_meta($post_id, $state) {
		update_post_meta($post_id, 'pt_gallery_data', wp_kses_post($state) );
	}


	/**
	 *
	 * Register Gutenberg block
	 *
	 */
	public function register_pt_gutenberg_block() {
		// Skip block registration if Gutenberg is not enabled/merged.
		if (!function_exists('register_block_type')) {
			return;
		}

		wp_register_script(
			'flo-pt-gallery', // flo picttime gallery
			//plugins_url($index_js, __FILE__),
			plugin_dir_url(__FILE__) . '../admin/js-non-merged/pt-gutenberg-block.js',
			array(
				'jquery',
				'wp-editor',
				'wp-blocks',
				'wp-i18n',
				'wp-element',
				'wp-dom-ready',
				'wp-components'
			),
			true // or maybe add the plugin version
		);

		// localize the array with PT posts that will be used in the Gutenberg Block settings
		wp_localize_script('flo-pt-gallery', 'pt_posts', self::getPtPosts());

		if ( defined( 'FLOPT_VERSION' ) ) {
			$plugin_version = FLOPT_VERSION;
		} else {
			$plugin_version = '1.0.0';
		}

		$plugin_public = new Pictimewp_Public( 'pictimewp', $plugin_version );

		$pictime_galleries = self::getPtPosts();
		if(is_array($pictime_galleries) && sizeof($pictime_galleries) && isset($pictime_galleries[0]['value'])){
			$default_pt_gallery = $pictime_galleries[0]['value'];
		}else{
			$default_pt_gallery = '';
		}

		register_block_type('flo-pt/gallery', array(
			'editor_script' => 'flo-pt-gallery',
			'render_callback' => array($plugin_public,'flo_pictime_shortcode'),
			'attributes' => [
				'id' => [
					'default' => $default_pt_gallery,
					'type' => "integer"
				],
			]
		));
	}

	/**
	 *
	 * return an array with all the Pictime Posts
	 *
	 */
	public static function getPtPosts() {
		$args = array(
       'post_type' => 'flo_pictime_gallery',
       'post_status' => 'publish',
       'posts_per_page' => -1,
   	);

		$loop = new WP_Query( $args );

		 $pt_posts = array();

	   while ( $loop->have_posts() ) : $loop->the_post();
				 $pt_posts[] = array(
					 'label' => html_entity_decode(get_the_title()),
					 'value' => $loop->post->ID
				 );
	   endwhile;

	   wp_reset_postdata();

		 return $pt_posts;
	}
}
