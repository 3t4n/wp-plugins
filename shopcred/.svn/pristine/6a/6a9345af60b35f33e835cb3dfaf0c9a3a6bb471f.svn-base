<?php
namespace ShopCred;
/**
 * 
 * Plugin Dashboard Settings
 * 
 * @package ShopCred
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Define Controller class
 */
class Admin_Setting_Pages {

	public $subpage_modules = array();
	
	public $page_modules = array();

	// Here initialize our namespace and resource name.
	public function __construct() {
	
		shopCred_admin_settings_config()->init();

		$this->subpage_modules = apply_filters( 'shopcred/settings/registered-subpage-modules', array(
			// 'shopcred-plugin-dashboard' => array(
			// 	'class' => 'ShopCred\\Plugin_Dashboard',
			// 	'args'  => array(),
			// ),
			'shopcred-general-settings' => array(
				'class' => 'ShopCred\\General_Setting',
				'args'  => array(),
			),			
			'shopcred-available-blocks' => array(
				'class' => 'ShopCred\\Available_Blocks',
				'args'  => array(),
			),
		
		) );

		if(!is_plugin_active(SPC_PLUGIN_PRO_FOLDER_NAME_TYPE1.'/shopcred-pro.php')){
			add_action( 'init', array( $this, 'register_settings_category' ), 10 );
		}
		add_action( 'init', array( $this, 'init_plugin_subpage_modules' ), 10 );

	}

	public function register_settings_category() {
	
		\ShopCred\Dashboard::get_instance()->module_manager->register_module_category(
			array(
				'name'     => '<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
								<circle cx="20" cy="20" r="20" fill="#EEF5FA"/>
								<path fill-rule="evenodd" clip-rule="evenodd" d="M16.25 13.4375C16.25 11.539 17.9289 10 20 10C22.0711 10 23.75 11.539 23.75 13.4375V13.75H25.625C26.6605 13.75 27.5 14.5895 27.5 15.625V28.125C27.5 29.1605 26.6605 30 25.625 30H14.375C13.3395 30 12.5 29.1605 12.5 28.125V15.625C12.5 14.5895 13.3395 13.75 14.375 13.75H16.25V13.4375ZM22.5 15.625V15H17.5V15.625C17.5 15.9702 17.3084 16.25 16.9318 16.25C16.5553 16.25 16.25 15.9702 16.25 15.625V15H14.375C14.0298 15 13.75 15.2798 13.75 15.625V28.125C13.75 28.4702 14.0298 28.75 14.375 28.75H25.625C25.9702 28.75 26.25 28.4702 26.25 28.125V15.625C26.25 15.2798 25.9702 15 25.625 15H23.75V15.625C23.75 15.9702 23.4447 16.25 23.0682 16.25C22.6916 16.25 22.5 15.9702 22.5 15.625ZM22.5 13.4375V13.75H17.5V13.4375C17.5 12.2294 18.682 11.25 20 11.25C21.318 11.25 22.5 12.2294 22.5 13.4375ZM17.1875 20.625C17.7053 20.625 18.125 20.2053 18.125 19.6875C18.125 19.1697 17.7053 18.75 17.1875 18.75C16.6697 18.75 16.25 19.1697 16.25 19.6875C16.25 20.2053 16.6697 20.625 17.1875 20.625ZM16.7004 22.5247C17.0319 22.4287 17.3785 22.6196 17.4745 22.9512C17.8282 24.1727 18.8515 25 19.9992 25C21.1469 25 22.1701 24.1727 22.5238 22.9512C22.6199 22.6196 22.9665 22.4287 23.298 22.5247C23.6296 22.6207 23.8205 22.9673 23.7245 23.2989C23.2388 24.9762 21.7813 26.25 19.9992 26.25C18.2171 26.25 16.7595 24.9762 16.2738 23.2989C16.1778 22.9673 16.3688 22.6207 16.7004 22.5247ZM23.9998 20.4999C24.2759 20.7071 24.6677 20.6512 24.8749 20.3751C25.082 20.099 25.0262 19.7073 24.7501 19.5001C24.1227 19.0293 23.343 18.75 22.5 18.75C21.6569 18.75 20.8773 19.0293 20.2498 19.5001C19.9737 19.7073 19.9179 20.099 20.1251 20.3751C20.3322 20.6512 20.724 20.7071 21.0001 20.4999C21.419 20.1855 21.9372 20 22.5 20C23.0627 20 23.5809 20.1855 23.9998 20.4999Z" fill="black" fill-opacity="0.5"/>
								</svg>' . esc_html__( 'ShopCred', 'shopCred' ),
				'slug'     => 'shopcred-builder-settings',
				'priority' => 1
			));
	}

	public function init_plugin_subpage_modules() {
	
		require base_init()->plugin_admin_path( 'subpage-modules/available-blocks.php' );
		require base_init()->plugin_admin_path( 'subpage-modules/general-settings.php' );

		// require base_init()->plugin_admin_path( 'subpage-modules/plugin-dashboard.php' );
	
		foreach ( $this->subpage_modules as $subpage => $subpage_data ) {
			\ShopCred\Dashboard::get_instance()->module_manager->register_subpage_module( $subpage, $subpage_data );
	
		}
	}
	
}

