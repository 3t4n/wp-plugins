<?php
/*
Plugin Name: Dhrup Social Share
Plugin URI: http://dhrup.com
Description: Basic Social Share Plugin with Floating Sidebar
Version: 2.0
Author: Dhrup IT Solutions
*/
//Admin "Dhrup Share Buttons with Floating Sidebar" Menu Item
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if(!class_exists('Dpss_Class'))
{
    class Dpss_Class
    {
        /**
         * Construct the plugin object
         */
        public function __construct()
        {
            // register actions
			add_action('admin_init', array(&$this, 'dpss_admin_init'));
			add_action('admin_menu', array(&$this, 'dpss_sidebar_menu'));
        } // END public function __construct
		
		/**
		 * hook into WP's admin_init action hook
		 */
		public function dpss_admin_init()
		{
			// Set up the settings for this plugin
			$this->dpss_sidebar_init();
			// Possibly do additional admin_init tasks
		} // END public static function activate
        /**
        
		 * Initialize some custom settings
		 */     
		public  function dpss_sidebar_init()
		{
			// register the settings for this plugin
			register_setting('dpss_sidebar_options','dpss_active');
			register_setting('dpss_sidebar_options','dpss_position');
			register_setting('dpss_sidebar_options','dpss_btn_position');
			register_setting('dpss_sidebar_options','dpss_btn_text');
			register_setting('dpss_sidebar_options','dpsss_fb_image');
			register_setting('dpss_sidebar_options','dpss_tw_image');
			register_setting('dpss_sidebar_options','dpss_li_image');	
			register_setting('dpss_sidebar_options','dpss_re_image');	
			register_setting('dpss_sidebar_options','dpss_st_image');	
			register_setting('dpss_sidebar_options','dpss_mail_image');	
			register_setting('dpss_sidebar_options','dpss_gp_image');	
			register_setting('dpss_sidebar_options','dpss_pin_image');
			register_setting('dpss_sidebar_options','dpss_yt_image');	
			register_setting('dpss_sidebar_options','dpss_fb_bg');
			register_setting('dpss_sidebar_options','dpss_tw_bg');
			register_setting('dpss_sidebar_options','dpss_li_bg');	
			register_setting('dpss_sidebar_options','dpss_mail_bg');	
			register_setting('dpss_sidebar_options','dpss_gp_bg');	
			register_setting('dpss_sidebar_options','dpss_pin_bg');	
			register_setting('dpss_sidebar_options','dpss_re_bg');	
			register_setting('dpss_sidebar_options','dpss_st_bg');
			register_setting('dpss_sidebar_options','dpss_yt_bg');	
			register_setting('dpss_sidebar_options','dpss_page_fb_bg');
			register_setting('dpss_sidebar_options','dpss_page_tw_bg');
			register_setting('dpss_sidebar_options','dpss_page_li_bg');	
			register_setting('dpss_sidebar_options','dpss_page_mail_bg');	
			register_setting('dpss_sidebar_options','dpss_page_gp_bg');	
			register_setting('dpss_sidebar_options','dpss_page_pin_bg');	
			register_setting('dpss_sidebar_options','dpss_page_re_bg');	
			register_setting('dpss_sidebar_options','dpss_page_st_bg');
			register_setting('dpss_sidebar_options','dpss_page_yt_bg');	
			register_setting('dpss_sidebar_options','dpss_fpublishBtn');	
			register_setting('dpss_sidebar_options','dpss_tpublishBtn');	
			register_setting('dpss_sidebar_options','dpss_gpublishBtn');	
			register_setting('dpss_sidebar_options','dpss_ppublishBtn');	
			register_setting('dpss_sidebar_options','dpss_ytpublishBtn');
			register_setting('dpss_sidebar_options','dpss_republishBtn');
			register_setting('dpss_sidebar_options','dpss_stpublishBtn');	
			register_setting('dpss_sidebar_options','dpss_ytPath');	
			register_setting('dpss_sidebar_options','dpss_lpublishBtn');	
			register_setting('dpss_sidebar_options','dpss_mpublishBtn');	
			register_setting('dpss_sidebar_options','dpss_mailMessage');
			register_setting('dpss_sidebar_options','dpss_top_margin');
			register_setting('dpss_sidebar_options','dpss_delayTimeBtn');
			register_setting('dpss_sidebar_options','dpss_btn_display');
			/** Image Alt */
			register_setting('dpss_sidebar_options','dpss_fb_title');
			register_setting('dpss_sidebar_options','dpss_tw_title');
			register_setting('dpss_sidebar_options','dpss_li_title');
			register_setting('dpss_sidebar_options','dpss_pin_title');
			register_setting('dpss_sidebar_options','dpss_gp_title');
			register_setting('dpss_sidebar_options','dpss_mail_title');
			register_setting('dpss_sidebar_options','dpss_yt_title');
			register_setting('dpss_sidebar_options','dpss_re_title');
			register_setting('dpss_sidebar_options','dpss_st_title');
			register_setting('dpss_sidebar_options','dpss_page_fb_title');
			register_setting('dpss_sidebar_options','dpss_page_tw_title');
			register_setting('dpss_sidebar_options','dpss_page_li_title');
			register_setting('dpss_sidebar_options','dpss_page_pin_title');
			register_setting('dpss_sidebar_options','dpss_page_gp_title');
			register_setting('dpss_sidebar_options','dpss_page_mail_title');
			register_setting('dpss_sidebar_options','dpss_page_yt_title');
			register_setting('dpss_sidebar_options','dpss_page_re_title');
			register_setting('dpss_sidebar_options','dpss_page_st_title');
			register_setting('dpss_sidebar_options','dpss_auto_hide');
			//Options for post/pages
			register_setting('dpss_sidebar_options','dpss_buttons_active');
			register_setting('dpss_sidebar_options','dpss_page_hide_home');
			register_setting('dpss_sidebar_options','dpss_page_hide_post');
			register_setting('dpss_sidebar_options','dpss_page_hide_page');
			register_setting('dpss_sidebar_options','dpss_page_hide_archive');
			register_setting('dpss_sidebar_options','dpss_hide_home');
			register_setting('dpss_sidebar_options','dpss_page_fb_image');
			register_setting('dpss_sidebar_options','dpss_page_tw_image');
			register_setting('dpss_sidebar_options','dpss_page_li_image');	
			register_setting('dpss_sidebar_options','dpss_page_mail_image');	
			register_setting('dpss_sidebar_options','dpss_page_gp_image');	
			register_setting('dpss_sidebar_options','dpss_page_pin_image');
			register_setting('dpss_sidebar_options','dpss_page_re_image');
			register_setting('dpss_sidebar_options','dpss_page_st_image');
			register_setting('dpss_sidebar_options','dpss_page_yt_image');
			/** message content */	
			register_setting('dpss_sidebar_options','dpss_show_btn');	
			register_setting('dpss_sidebar_options','dpss_hide_btn');	
			register_setting('dpss_sidebar_options','dpss_share_msg');
			register_setting('dpss_sidebar_options','dpss_rmSHBtn');	
			register_setting('dpss_sidebar_options','dpss_deactive_for_mob');
		} // END public function init_custom_settings()
		/**
		
		 * add a menu
		 */     
		public function dpss_sidebar_menu()
		{
			add_options_page('Dhrup Social Share','Dhrup Social Share','manage_options','dpss-settings',array(&$this,'dpss_sidebar_admin_option_page'));

		} // END public function add_menu()

		public function dpss_sidebar_admin_option_page()
				{
					if(!current_user_can('manage_options'))
					{
						wp_die(__('You do not have sufficient permissions to access this page.'));
					}

					// Render the settings template
					include(sprintf("%s/lib/settings.php", dirname(__FILE__)));
					/** 
					 * REGISTER SCRIPT
					 * */
					 wp_enqueue_script('media-upload');
					 wp_enqueue_script('thickbox');
					 wp_register_script('dpss-image-upload', plugins_url('/js/dpss.js',__FILE__ ), array('jquery','media-upload','thickbox','wp-color-picker'));
					 wp_enqueue_script('dpss-image-upload');
					/** 
					 * REGISTER STYLE
					 * */
					wp_register_style( 'dpss_admin_style', plugins_url( 'css/admin-dpss.css',__FILE__ ) );
					wp_enqueue_style( 'dpss_admin_style' );
					wp_enqueue_style( 'wp-color-picker' ); 
					wp_enqueue_style('thickbox');

			 }// END public static function dpss_sidebar_admin_option_page
        /**
		 * hook into WP's plugin_action_links_ action hook
		 */
     public static function dpss_add_settings_link( $links ) {
            $settings_link = '<a href="options-general.php?page=dpss-settings">' . __( 'Settings', 'dpss' ) . '</a>';
			
            return $links;
        }
        /**
         * uninstall the plugin
         */
        public function dpss_uninstall()
        {
			delete_option('dpss_active');
			delete_option('dpssbuttons_active');
			delete_option('dpss_position');
			delete_option('dpss_btn_position');
			delete_option('dpss_btn_text');
			delete_option('dpss_fb_image');
			delete_option('dpss_tw_image');
			delete_option('dpss_li_image');
			delete_option('dpss_re_image');
			delete_option('dpss_st_image');
			delete_option('dpss_mail_image');
			delete_option('dpss_gp_image');
			delete_option('dpss_pin_image');
			delete_option('dpss_yt_image');
			delete_option('dpss_re_image');
			delete_option('dpss_st_image');	
			delete_option('dpss_ytPath');
			delete_option('dpss_fb_bg');
			delete_option('dpss_tw_bg');
			delete_option('dpss_li_bg');
			delete_option('dpss_mail_bg');
			delete_option('dpss_gp_bg');
			delete_option('dpss_pin_bg');	
			delete_option('dpss_yt_bg');
			delete_option('dpss_fpublishBtn');
			delete_option('dpss_tpublishBtn');
			delete_option('dpss_gpublishBtn');	
			delete_option('dpss_ppublishBtn');	
			delete_option('dpss_lpublishBtn');	
			delete_option('dpss_mpublishBtn');	
			delete_option('dpss_republishBtn');	
			delete_option('dpss_stpublishBtn');
			delete_option('dpss_ytpublishBtn');	
			delete_option('dpss_mailMessage');
			delete_option('dpss_top_margin');
			delete_option('dpss_page_hide_home');
			delete_option('dpss_page_hide_post');
			delete_option('dpss_page_hide_page');
			delete_option('dpss_fb_title');
			delete_option('dpss_tw_title');
			delete_option('dpss_li_title');
			delete_option('dpss_pin_title');
			delete_option('dpss_gp_title');
			delete_option('dpss_mail_title');
			delete_option('dpss_yt_title');
			delete_option('dpss_re_title');
			delete_option('dpss_st_title');
			delete_option('dpss_page_fb_image');
			delete_option('dpss_page_tw_image');
			delete_option('dpss_page_li_image');	
			delete_option('dpss_page_re_image');	
			delete_option('dpss_page_st_image');	
			delete_option('dpss_page_mail_image');	
			delete_option('dpss_page_gp_image');	
			delete_option('dpss_page_pin_image');		
			delete_option('dpss_page_yt_image');	
			delete_option('dpss_rmSHBtn');
			//delete_option('csbwfs_featuredshrimg');	
			//delete_option('csbwfs_defaultfeaturedshrimg');
			delete_option('dpss_deactive_for_mob');
            // Do nothing
        } // END public static function uninstall
        /**
         * Activate the plugin
         */
        public static function dpss_activate()
        {
            // Do nothing
        } // END public static function activate
    
        /**
         * Deactivate the plugin
         */     
        public static function dpss_deactivate()
        {
            // Do nothing
        } // END public static function deactivate
		
    } // END class Dpss_Class
} // END if(!class_exists('Dpss_Class'))


if(class_exists('Dpss_Class'))
{
   // Installation and uninstallation hooks
   register_activation_hook(__FILE__, array('Dpss_Class', 'dpss_activate'));
   register_deactivation_hook(__FILE__, array('Dpss_Class', 'dpss_deactivate'));
   register_uninstall_hook(__FILE__, array('Dpss_Class', 'dpss_uninstall')); 
    // instantiate the plugin class
    $dpss_plugin_template = new Dpss_Class();
	// Add a link to the settings page onto the plugin page
	if(isset($dpss_plugin_template))
	{
		$plugin = plugin_basename(__FILE__); 
		add_filter("plugin_action_links_$plugin", array('Dpss_Class','dpss_add_settings_link'));
	    require dirname(__FILE__).'/dpss-class.php';
	}
	
	
}
?>
