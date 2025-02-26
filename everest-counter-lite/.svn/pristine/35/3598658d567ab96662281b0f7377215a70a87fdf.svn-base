<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
/*
  Plugin name: Everest Counter Lite
  Plugin URI: https://accesspressthemes.com/wordpress-plugins/everest-counter-lite/
  Description: A plugin to add various stat counters to posts/pages content using shortcodes and widgets.
  version: 2.1.0
  Author: AccessPress Themes
  Author URI: https://accesspressthemes.com/
  Text Domain: everest-counter-lite
  Domain Path: /languages/
  License: GPLv2 or later
*/

/**
* Plugin's main class initilization
*/
include_once( 'inc/backend/widget.php' );
if(! class_exists( 'everestCounterClass_lite' )){
	class everestCounterClass_lite {
		function __construct() {
			add_action( 'init', array( $this, 'plugin_contants') );
			add_action( 'init',  array( $this, 'plugin_variables' ) );
			add_action( 'init', array( $this, 'plugin_text_domain' ) );
			add_action( 'init', array( $this, 'register_everest_counter_post_type_and_meta_boxes' ) );
			//add_action( 'init', array( $this, 'include' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'register_plugin_assets' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'register_frontend_assets' ) );
			add_action( 'wp_ajax_backend_ajax', array( $this, 'ec_backend_ajax' ) );
			add_action( 'wp_ajax_nopriv_backend_ajax', array( $this, 'ec_backend_ajax' ) );
			add_action( 'save_post', array( $this, 'e_counter_save_meta_data' ) );
			add_filter( 'manage_everest-counter_posts_columns', array( $this, 'everest_counter_columns_head' ) ); 
			add_action( 'manage_everest-counter_posts_custom_column', array( $this, 'everest_counter_columns_content' ), 10, 2 );
			add_filter( 'post_row_actions', array( $this, 'remove_row_actions'), 10, 1 );
			add_action( 'admin_menu', array( $this, 'register_about_page' ) );
			add_shortcode( 'everest_counter', array( $this, 'ec_shortcode' ) );
			add_action( 'widgets_init', array( $this, 'register_ec_widget' ) );
			add_filter( 'plugin_row_meta', array( $this, 'wpcd_plugin_row_meta' ), 10, 2 );
			add_filter( 'admin_footer_text', array( $this, 'wpcd_admin_footer_text' ) );
			include('inc/ecl-block/ecl-block-init.php');
		}

		function wpcd_plugin_row_meta( $links, $file ){
			if ( strpos( $file, 'everest-counter-lite.php' ) !== false ) {
				$new_links = array(
					'demo' => '<a href="'.EC_LITE_DEMO.'" target="_blank"><span class="dashicons dashicons-welcome-view-site"></span>Live Demo</a>',
					'doc' => '<a href="'.EC_LITE_DOC.'" target="_blank"><span class="dashicons dashicons-media-document"></span>Documentation</a>',
					'support' => '<a href="http://accesspressthemes.com/support" target="_blank"><span class="dashicons dashicons-admin-users"></span>Support</a>',
					'pro' => '<a href="'.EC_PRO_LINK.'" target="_blank"><span class="dashicons dashicons-cart"></span>Premium version</a>'
				);
				$links = array_merge( $links, $new_links );
			}
			return $links;
		}

		function wpcd_admin_footer_text( $text ){
			global $post;
			if (isset($_GET['post_type']) && $_GET['post_type'] === 'everest-counter' ) {
				$text = 'Enjoyed ' . EC_LITE_PLUGIN_NAME . '? <a href="' . EC_LITE_RATING . '" target="_blank">Please leave us a ★★★★★ rating</a> We really appreciate your support! | Try premium version <a href="' . EC_PRO_LINK . '" target="_blank">' . EC_PRO_PLUGIN_NAME . '</a> - more features, more power!';
				return $text;
			} else {
				return $text;
			}
		}


		public function register_ec_widget() {
			register_widget( 'EC_Widget_Lite' );
		}

		public function ec_shortcode($atts, $content = null){
			$args = array(
				'post_type' => 'everest-counter',
				'post_status' => 'publish',
				'posts_per_page' => 1,
				'p' => $atts['id']
			);

			foreach ($atts as $key => $val) {
				$$key = $val;
			}
			$everest_counter = new WP_Query($args);
			if ($everest_counter->have_posts()){
				ob_start();
				include('inc/frontend/ec-shortcode.php');
				$return_data = ob_get_contents();
				ob_end_clean();
				wp_reset_query();
				if(isset($return_data)){
					return $return_data;
				}else{
					return NULL;
				}
			}else{
				wp_reset_query();
				return NULL;
			}
		}

		function remove_row_actions($actions) {
			if (get_post_type() == 'everest-counter') { 
				unset($actions['view']); 
				unset($actions['inline hide-if-no-js']);
			}
			return $actions;
		}

		function everest_counter_columns_head($columns) {
			$columns['shortcodes'] = __( 'Shortcodes', 'everest-counter-lite' );
			$columns['template'] = __( 'Template Include', 'everest-counter-lite' );
			return $columns;
		}

		function everest_counter_columns_content($column, $post_id) {
			if ($column == 'shortcodes') {
				$id = $post_id;
				?>
				<textarea class='ec-shortcode-display-value' style="resize: none;" rows="2" cols="25" readonly="readonly">[everest_counter id="<?php echo esc_attr($post_id); ?>"]</textarea>
				<span class="ec-copied-info" style="display: none;"><?php _e('Shortcode copied to your clipboard.', 'everest-counter-lite'); ?></span>
				<?php
			}
			if ($column == 'template') {
				$id = $post_id;
				?>
				<textarea class='ec-shortcode-template-display-value' style="resize: none;" rows="2" cols="45" readonly="readonly">&lt;?php echo do_shortcode("[everest_counter id='<?php echo esc_attr($post_id); ?>']"); ?&gt;</textarea>
				<span class="ec-copied-info" style="display: none;"><?php _e('Shortcode copied to your clipboard.', 'everest-counter-lite'); ?></span>
				<?php
			}
		}

		function e_counter_save_meta_data( $post_id ) {
			$is_autosave = wp_is_post_autosave($post_id);
			$is_revision = wp_is_post_revision($post_id);
			$is_valid_nonce = ( isset($_POST['ec_add_items_nonce']) && wp_verify_nonce($_POST['ec_add_items_nonce'], basename(__FILE__)) ) ? 'true' : 'false';

			if ($is_autosave || $is_revision || !$is_valid_nonce) {
				return;
			}

			$merge_array = array();
			if (isset($_POST['item'])) {
				$merge_array['item'] = (array) $_POST['item'];
			}

			if (isset($_POST['ec_display_settings'])) {
				$merge_array['ec_display_settings'] = (array) $_POST['ec_display_settings'];
			}

			$sanitized_array = everestCounterClass_lite:: sanitize_array($merge_array);
			update_post_meta($post_id, 'ec_counter_data', $sanitized_array);
			return;
		}

		function ec_backend_ajax(){
			$nonce = $_POST['_wpnonce'];
			$created_nonce = 'ec-backend-ajax-nonce';
			if ( ! wp_verify_nonce( $nonce, $created_nonce ) ) {
				die( __( 'Security check', 'everest-counter-lite' ) );
			}

			if($_POST['_action'] == 'add_item'){
				include('inc/backend/meta-boxes/item.php');
				die();
			}
		}

		public function plugin_variables() {
			global $ec_variables;
			include_once( E_COUNTER_PLUGIN_DIR . 'inc/plugin_variables.php' );
		}

		function register_plugin_assets() {
			wp_register_style( 'custom-icon-picker', E_COUNTER_CSS_DIR.'/icon-picker.css', false, E_COUNTER_VERSION );
			wp_register_style( 'font-awesome-icons-v4.7.0', E_COUNTER_CSS_DIR.'/font-awesome/font-awesome.min.css', false, E_COUNTER_VERSION );
			wp_register_style( 'ec_gener_icons', E_COUNTER_CSS_DIR . '/genericons.css', false, E_COUNTER_VERSION );
			wp_register_style( 'jquery-ui-css', E_COUNTER_CSS_DIR.'/jquery-ui.css', false, E_COUNTER_VERSION );
			wp_register_style( 'ec_admin_css', E_COUNTER_CSS_DIR . '/ec-backend.css', false, E_COUNTER_VERSION );
			wp_enqueue_style( 'ec_gener_icons' );
			wp_enqueue_style('custom-icon-picker');
			wp_enqueue_style('font-awesome-icons-v4.7.0');
			wp_enqueue_style('wp-color-picker');
			wp_enqueue_style('jquery-ui-css');
			wp_enqueue_style( 'ec_admin_css' );
			wp_register_script('ec_icon_picker', E_COUNTER_JS_DIR.'/icon-picker.js', array('jquery'), E_COUNTER_VERSION, true );
			wp_enqueue_script( 'wp-color-picker-alpha', E_COUNTER_JS_DIR.'/wp-color-picker-alpha.js',array('jquery','wp-color-picker'), '2.1.2' );
			wp_register_script( 'ec_admin_js', E_COUNTER_JS_DIR . '/ec-backend.js', array('jquery', 'wp-color-picker', 'wp-color-picker-alpha', 'ec_icon_picker', 'jquery-ui-sortable'),  E_COUNTER_VERSION, true );
			wp_enqueue_media();
			wp_enqueue_script('wp-color-picker');
			wp_enqueue_script('ec_icon_picker');
			wp_enqueue_script('ec_admin_js');
			wp_enqueue_script('jquery-ui-core');
			wp_enqueue_script('jquery-ui-slider');
			$ajax_nonce = wp_create_nonce( 'ec-backend-ajax-nonce' );
			wp_localize_script( 'ec_admin_js', 'ec_backend_ajax', array('ajax_url' => admin_url() . 'admin-ajax.php', 'ajax_nonce' => $ajax_nonce) );

		}

		function register_frontend_assets(){

			wp_enqueue_style( 'font-awesome-icons-v4.7.0', E_COUNTER_CSS_DIR.'/font-awesome/font-awesome.min.css', false, E_COUNTER_VERSION );
			wp_enqueue_style( 'ec_gener_icons', E_COUNTER_CSS_DIR . '/genericons.css', false, E_COUNTER_VERSION );
			wp_enqueue_style( 'dashicons' );
			wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Raleway|ABeeZee|Aguafina+Script|Open+Sans|Roboto|Roboto+Slab|Lato|Titillium+Web|Source+Sans+Pro|Playfair+Display|Montserrat|Khand|Oswald|Ek+Mukta|Rubik|PT+Sans+Narrow|Poppins|Oxygen:300,400,600,700', array(), E_COUNTER_VERSION );
			wp_enqueue_style( 'ec_frontend_css', E_COUNTER_CSS_DIR . '/frontend/ec-frontend.css', array(), E_COUNTER_VERSION );
			wp_enqueue_script('ec_waypoints_js', E_COUNTER_JS_DIR . '/jquery.waypoints.js', array('jquery'), E_COUNTER_VERSION , true );
			wp_enqueue_script('ec_counterup_js', E_COUNTER_JS_DIR . '/jquery.counterup.js', array('jquery', 'ec_waypoints_js'), E_COUNTER_VERSION , true );
			wp_enqueue_script('ec_frontend_js', E_COUNTER_JS_DIR . '/ec-frontend.js', array( 'jquery', 'ec_counterup_js' ), E_COUNTER_VERSION , true );
		}

		function plugin_contants(){

			defined('E_COUNTER_VERSION')  or define( 'E_COUNTER_VERSION', '2.1.0' );
			defined( 'E_COUNTER_IMAGE_DIR' ) or define( 'E_COUNTER_IMAGE_DIR', plugin_dir_url( __FILE__ ) . 'images' );
			defined( 'E_COUNTER_JS_DIR' ) or define( 'E_COUNTER_JS_DIR', plugin_dir_url( __FILE__ ) . 'js' );
			defined( 'E_COUNTER_CSS_DIR' ) or define( 'E_COUNTER_CSS_DIR', plugin_dir_url( __FILE__ ) . 'css' );
			defined( 'E_COUNTER_ASSETS_DIR' ) or define( 'E_COUNTER_ASSETS_DIR', plugin_dir_url( __FILE__ ) . 'assets' );
			defined( 'E_COUNTER_LANG_DIR' ) or define( 'E_COUNTER_LANG_DIR', basename( dirname( __FILE__ ) ) . '/languages/' );
			defined( 'E_COUNTER_TEXT_DOMAIN' ) or define( 'E_COUNTER_TEXT_DOMAIN', 'everest-counter-lite' );
			defined( 'E_COUNTER_SETTINGS' ) or define( 'E_COUNTER_SETTINGS', 'e_counter_settings' );
			defined('E_COUNTER_PLUGIN_DIR') or define( 'E_COUNTER_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
			defined( 'E_COUNTER_PLUGIN_DIR_URL' ) or define( 'E_COUNTER_PLUGIN_DIR_URL', plugin_dir_url( __FILE__ ) ); 

			defined('EC_LITE_PLUGIN_NAME') or define('EC_LITE_PLUGIN_NAME', 'Everest Counter Lite');
			defined('EC_LITE_DEMO') or define('EC_LITE_DEMO', 'http://demo.accesspressthemes.com/wordpress-plugins/everest-counter-lite');
			defined('EC_LITE_DOC') or define('EC_LITE_DOC', 'https://accesspressthemes.com/documentation/everest-counter-lite/');
			defined('EC_LITE_DETAIL') or define('EC_LITE_DETAIL', 'https://accesspressthemes.com/wordpress-plugins/everest-counter-lite/');
			defined('EC_LITE_RATING') or define('EC_LITE_RATING', 'https://wordpress.org/support/plugin/everest-counter-lite/reviews/#new-post');



			defined('EC_PRO_PLUGIN_NAME') or define('EC_PRO_PLUGIN_NAME', 'Everest Counter');
			defined('EC_PRO_LINK') or define('EC_PRO_LINK', 'https://accesspressthemes.com/wordpress-plugins/everest-counter/');
			defined('EC_PRO_DEMO') or define('EC_PRO_DEMO', 'http://demo.accesspressthemes.com/wordpress-plugins/everest-counter');
			defined('EC_PRO_DETAIL') or define('EC_PRO_DETAIL', 'https://accesspressthemes.com/wordpress-plugins/everest-counter/');
		}

		public function register_everest_counter_post_type_and_meta_boxes(){
			include('inc/backend/register-post-type-and-meta-boxes.php');
			add_action( 'add_meta_boxes_everest-counter', array($this, 'e_counter_adding_custom_meta_boxes') );
		}

		/*public function include(){
			 include(E_COUNTER_PLUGIN_DIR. 'inc/ecl-block/ecl-block-init.php');
		}*/

		function e_counter_adding_custom_meta_boxes() {
			add_meta_box(
				'counter-items',
				__( 'Counter Items', 'everest-counter-lite' ),
				array($this, 'add_counter_items'),
				'everest-counter',
				'normal',
				'default'
			);
			add_meta_box(
				'counter-display-settings',
				__( 'Display Settings', 'everest-counter-lite' ),
				array($this, 'render_display_settings'),
				'everest-counter',
				'normal',
				'default'
			);
			add_meta_box(
				'counter-shortcode-display',
				__( 'Genereated Shortcode', 'everest-counter-lite' ),
				array($this, 'render_shortcode_display'),
				'everest-counter',
				'side',
				'high'
			);
			add_meta_box(
				'counter-upgrade-section',
				__( 'Upgrade to Pro', 'everest-counter-lite' ),
				array($this, 'render_upgrade_section'),
				'everest-counter',
				'side',
				'low'
			);
		}

		function add_counter_items(){
			include('inc/backend/meta-boxes/add_items.php');
		}

		function render_display_settings(){
			include('inc/backend/meta-boxes/display_settings.php');
		}

		function render_shortcode_display(){
			global $post;
			$post_id = $post->ID;
			?>
			<label for='ec-shortcode-display' style="width: 100%"><?php _e('Please copy the below shortcode to display counter', 'everest-counter-lite' ); ?></label>
			<input type='text' class="ec-shortcode-display-value" readonly="" value="[everest_counter id='<?php echo esc_attr($post_id); ?>']" style="width: 100%;" onclick="select()" />
			<span class="ec-copied-info" style="display: none;"><?php _e('Shortcode copied to your clipboard.', 'everest-counter-lite'); ?></span>
			<?php
		}

		function render_upgrade_section(){
			?>
			<!-- <div class='ec-upgrade-section-wrap'>
				<img src='<?php //echo E_COUNTER_IMAGE_DIR; ?>/upgrade-banner-1.jpg' alt='Upgrade banner 1' />
				<div class="ec-buttons-wrapper">
					<a href="http://demo.accesspressthemes.com/wordpress-plugins/everest-counter/" target="_blank"><?php //_e('View Demo', 'everest-counter-lite' ); ?></a>
					<a href="https://codecanyon.net/item/everest-counter-beautiful-stat-counter-plugin-for-wordpress/20418334?ref=AccessKeys" target="_blank"><?php //_e('Purchase', 'everest-counter-lite'); ?></a>
					<a href="https://accesspressthemes.com/wordpress-plugins/everest-counter/" target="_blank"><?php //_e('Plugin Information', 'everest-counter-lite'); ?></a>
				</div>
			</div> -->

			<div class="ec-upgrade-section-wrap">
            <a href="<?php echo EC_PRO_LINK ?>" target="_blank">
                <img src="<?php echo E_COUNTER_IMAGE_DIR . '/upgrade-to-pro/upgrade-to-pro.png' ?>" style="width:100%;">
            </a>

            <div class="ec-upgrade-button-wrap-backend">

                <a href="<?php echo EC_PRO_DEMO; ?>" class="smls-demo-btn" target="_blank">Demo</a>

                <a href="<?php echo EC_PRO_LINK; ?>" target="_blank" class="smls-upgrade-btn">Upgrade</a>

                <a href="<?php echo EC_PRO_DETAIL; ?>" target="_blank" class="smls-upgrade-btn">Plugin Information</a>

            </div>

            <a href="<?php echo EC_PRO_LINK ?>" target="_blank">
                <img src="<?php echo E_COUNTER_IMAGE_DIR; ?>/upgrade-to-pro/upgrade-to-pro-feature.png" alt="<?php _e( 'Everest Comment Rating', 'everest-counter-lite' ); ?>" style="width:100%;">
            </a>
        </div>
			<?php
		}

		function plugin_text_domain(){
			load_plugin_textdomain( E_COUNTER_TEXT_DOMAIN, false, E_COUNTER_LANG_DIR );
		}

		public static function generateRandomIndex($length = 10) {
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
			}
			return $randomString;
		}

		static function sanitize_array( $array = array(), $sanitize_rule = array() ){
			if ( ! is_array( $array ) || count( $array ) == 0 ) {
				return array();
			}
			foreach ( $array as $k => $v ) {
				if ( ! is_array( $v ) ) {
					$default_sanitize_rule = (is_numeric( $k )) ? 'html' : 'text';
					$sanitize_type = isset( $sanitize_rule[ $k ] ) ? $sanitize_rule[ $k ] : $default_sanitize_rule;
					$array[ $k ] = self:: sanitize_value( $v, $sanitize_type );
				}
				if ( is_array( $v ) ) {
					$array[ $k ] = self:: sanitize_array( $v, $sanitize_rule );
				}
			}
			return $array;
		}

		static function sanitize_value( $value = '', $sanitize_type = 'text' ){
			switch ( $sanitize_type ) {
				case 'html':
				$allowed_html = wp_kses_allowed_html( 'post' );
				return wp_kses( $value, $allowed_html );
				break;
				default:
				return sanitize_text_field( $value );
				break;
			}
		}

		function register_about_page() {
			add_submenu_page( 'edit.php?post_type=everest-counter', __( 'More WordPress Stuff', 'everest-counter-lite' ), __( 'More WordPress Stuff', 'everest-counter-lite' ), 'manage_options', 'about-us', array( $this, 'about_us_submenu_page_callback' ) );

			global $submenu;
            $submenu['edit.php?post_type=everest-counter'][] = array( 'Documentation', 'manage_options', EC_LITE_DOC );
            $submenu['edit.php?post_type=everest-counter'][] = array( 'Check Premium Version', 'manage_options', EC_PRO_LINK );
		}

		function about_us_submenu_page_callback() {
			include('inc/backend/about-page.php');
		}

	}
	$new_everest_counter_obj = new everestCounterClass_lite();
}