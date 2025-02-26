<?php
if( !class_exists('Aeiwooc') ):
	class Aeiwooc{
		 const FIELDS_GROUP = 'Aeiwooc-fields-group'; 
		 
		/**
		 * Constructor
		 */
		function __construct() {
			define( 'WPSHARE247_CLASS_Aeiwooc', get_class($this) );
			$this->slug = WPSHARE247_AEIWOOC_SETTING_PAGE_SLUG;
			$this->option_group = self::FIELDS_GROUP;
			add_action('admin_menu',  array( $this, 'add_setting_page' ) );
			add_action('admin_init', array( $this, 'register_plugin_settings_option_fields' ) );
			add_action('admin_footer',  array( $this, 'admin_footer_script' ) );
			add_action('admin_enqueue_scripts', array( $this, 'register_admin_css_js' ));
			add_filter('plugin_action_links', array( $this, 'add_action_link' ), 999, 2 );
		}
		
		public function add_action_link( $links, $file  ){
			$plugin_file = basename ( dirname ( WPSHARE247_AEIWOOC ) ) . '/'. basename(WPSHARE247_AEIWOOC, '');
			if($file == $plugin_file){
				$setting_link = '<a href="' . admin_url('admin.php?page='.WPSHARE247_AEIWOOC_SETTING_PAGE_SLUG) . '">'.__( 'Settings' ).'</a>';
				array_unshift( $links, $setting_link );
			}
			return $links;
		}
		
		
		static function is_woocommerce_active(){
			include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
			if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
				return true;
			} 
			return false;
		}
		
		static function is_pro(){
			$lib =  WPSHARE247_AEIWOOC_PLUGIN_PRO_DIR . '/Classes/PHPExcel.php';
			if( file_exists($lib) ){
				return true;
			}
			return false;
		}

		public function add_setting_page() {
			add_submenu_page( 
				'woocommerce',
				__("Configuration file attachment excel invoice", WPSHARE247_AEIWOOC_TEXTDOMAIN),
				__("Configure AEIWOOC", WPSHARE247_AEIWOOC_TEXTDOMAIN),
				'manage_options',
				$this->slug,
				array($this, 'the_content_setting_page')
			);
		}
		
		/*static function get_plugin_setting_url(){
			return admin_url("options-general.php?page=".WPSHARE247_AEIWOOC_SETTING_PAGE_SLUG);
		}*/
		
		static function create_option_prefix($field_name){
			return WPSHARE247_AEIWOOC_PREFIX.$field_name;
		}
		
		public function get_option($field_name){
			return get_option(WPSHARE247_AEIWOOC_PREFIX.$field_name);
		}
		
		static function class_get_option($field_name){
			return get_option(WPSHARE247_AEIWOOC_PREFIX.$field_name);
		}
		
		public function register_field($field_name){
			register_setting( $this->option_group, WPSHARE247_AEIWOOC_PREFIX.$field_name);
		}
		
		public function admin_footer_script(){
			require_once WPSHARE247_AEIWOOC_PLUGIN_INC_ASSETS . '/addmin_footer_js.php';
		}
		
		public function register_admin_css_js(){
			wp_enqueue_style( 'wp-color-picker' );
    		wp_enqueue_script( 'wp-color-picker');
			
			wp_register_style( 'admin_aeiwooc_css', WPSHARE247_AEIWOOC_PLUGIN_INC_ASSETS_URL . '/admin_aeiwooc.css', false, '1.0.0' );
       		wp_enqueue_style( 'admin_aeiwooc_css' );
			
			wp_enqueue_script( 'admin_aeiwooc_js', WPSHARE247_AEIWOOC_PLUGIN_INC_ASSETS_URL . '/admin_aeiwooc.js', array(), '1.0' );
		}
		
		static function get_wp_upload_dir( $s_path ){
			$upload = wp_upload_dir();
			$upload_dir = $upload['basedir'];
			if($s_path){
				$upload_dir = $upload_dir . '/' . $s_path;
			}
			return $upload_dir;
		}
		
		static function get_wp_upload_url( $string ){
			$upload = wp_upload_dir();
			$upload_url = $upload['baseurl'];
			if($string){
				$upload_url = $upload_url . '/' . $string;
			}
			return $upload_url;
		}
		
		static function get_wp_upload_dir_default(){
			return self::get_wp_upload_dir(WPSHARE247_AEIWOOC_FILE_PATH);
		}
		
		static function get_wp_upload_url_default(){
			return self::get_wp_upload_url(WPSHARE247_AEIWOOC_FILE_PATH);
		}
		
		static function get_wp_upload_dir_file(){
			$file_path = self::class_get_option('file_path');
			if($file_path){
				$wpshare247_woocommerce_invoices = self::get_wp_upload_dir($file_path);
			}else{
				$wpshare247_woocommerce_invoices = self::get_wp_upload_dir_default();
			}
			return $wpshare247_woocommerce_invoices;
		}
		
		static function get_wp_upload_url_file(){
			$file_path = self::class_get_option('file_path');
			if($file_path){
				$wpshare247_woocommerce_invoices = self::get_wp_upload_url($file_path);
			}else{
				$wpshare247_woocommerce_invoices = self::get_wp_upload_url_default();
			}
			return $wpshare247_woocommerce_invoices;
		}
		
		public function register_plugin_settings_option_fields() {
			/***
			****register list fields
			****/
			$arr_register_fields = array(
											//-------------------------------general tab
											'title', 'address', 'tel', 'email', 'unit', 'unit_hide', 'head_bg','head_color',
											'border', 'order_key_text', 'order_date_text',
											'co_address_text', 'co_tel_text', 'co_email_text',
											'order_product_stt_text', 'order_product_name_text',
											'order_product_unit_text', 'order_product_quantity_text',
											'order_product_subtotal_text', 'order_product_total_text',
											'order_subtotal_text', 'order_total_text', 'order_ship_text',
											'order_customer_name_text', 'order_customer_tel_text',
											'order_customer_email_text', 'order_customer_address_text',
											'order_customer_note_text', 'order_customer_payment_text',
											'file_path','file_name_save', 'order_coupon_text', 'order_date_format',
											'border_style',
											
											//-------------------------------pro tab
											'logo', 'excel_template'
										);
			
			if($arr_register_fields){
				foreach($arr_register_fields as $key){
					$this->register_field($key);
				}
			}
		}
		
		public function the_content_setting_page(){
			require_once WPSHARE247_AEIWOOC_PLUGIN_INC_DIR . '/option-form-template.php';
		}
		
		static function show_pro_message(){
			if(!self::is_pro()){
				echo '<small class="pro-message">'.__("Pro version only", WPSHARE247_AEIWOOC_TEXTDOMAIN).'</small>';
			}
		}
		

	//End class--------------	
	}
	
	new Aeiwooc();
endif;
