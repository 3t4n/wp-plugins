<?php
/**
 * @package  WooSearch
 * @developer  name : Joy Shaha
 */
namespace WOOS\Setup;
if (!class_exists('WOOSEnqueue')) {
	class WOOSEnqueue
	{

	    public function woos_register()
	    {
	    	if ( ( is_admin() && isset($_GET['page'])  && ( $_GET["page"] == "woos" || $_GET['page'] == 'woos' ))) {
				add_action( 'admin_enqueue_scripts', array( $this, 'woos_enqueue_script_admin' ) );
			}
			add_action( 'admin_enqueue_scripts', array( $this, 'woos_global_enqueue' ) );
			
			add_action( 'wp_enqueue_scripts', array( $this, 'woos_front_enqueue' ) );
			
	    }
	    /**
		 * Admin Script
		 * @return string
		 * Feature added by : Joy Shaha <joysaha7302@gmail.com>
		 * Date : 21.04.2020
		*/
	    public function woos_enqueue_script_admin(){
			$suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
			if ( ( isset($_GET['page']) && ( $_GET['page'] == 'woos' || $_GET['page'] == 'woos' ))) {
				wp_enqueue_script('jquery');
				wp_enqueue_style("woos-font",  woos_plugin_url('/assets/plugins/font-awesome/css/font-awesome.min.css'), null , WOOS_VERSION);
				wp_enqueue_style("woos-reset", woos_plugin_url('/assets/css/reset.css'), null , WOOS_VERSION);
				wp_enqueue_style("woos-robot", woos_plugin_url('/assets/plugins/roboto/roboto.css'), null , WOOS_VERSION);
				wp_enqueue_style("woos-vendor", woos_plugin_url('/assets/plugins/app-build/vendor.css'), null , WOOS_VERSION);
				wp_enqueue_style("woos-animate", woos_plugin_url('/assets/plugins/notify/animate.css'), null , WOOS_VERSION);
				wp_enqueue_style("woos-main", woos_plugin_url('/assets/plugins/app-build/main.css'), null , WOOS_VERSION);
				wp_enqueue_script("woos-boots", woos_plugin_url('/assets/plugins/bootstrap/js/bootstrap.min.js'),array( 'jquery' ), WOOS_VERSION, true);
				wp_enqueue_script("woos-notify", woos_plugin_url('/assets/plugins/notify/notify.min.js'), array( 'jquery' ), WOOS_VERSION, true);			
				wp_enqueue_script("woos-main", woos_plugin_url('/assets/plugins/app-build/main.js'), array( 'jquery' ), WOOS_VERSION, true);
			}
	    }
	    /**
		 * admin_enqueue_scripts global
		 * Feature added by : Joy Shaha <joysaha7302@gmail.com>
		 * Date : 21.04.2020
		*/
		public function woos_global_enqueue(){
			$suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
			wp_enqueue_style("woos-global", woos_plugin_url('/assets/plugins/app-build/global.css'), null , WOOS_VERSION);
			wp_enqueue_script("woos-global", woos_plugin_url('/assets/plugins/app-build/global.js'), array( 'jquery' ), WOOS_VERSION, true);
		}
	    /**
		 * Front scripts
		 * Feature added by : Joy Shaha <joysaha7302@gmail.com>
		 * Date : 21.04.2020
		*/
		public function woos_front_enqueue(){
			$suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
			wp_enqueue_style("woos-global", woos_plugin_url('/assets/woos-front.css'), null , WOOS_VERSION);
			wp_enqueue_script("woos-search", woos_plugin_url('/assets/woos-front.js'), array( 'jquery' ), WOOS_VERSION, true);
			wp_localize_script('woos-search', 'woo_search_param', array(
	                'ajaxUrl'   => admin_url('admin-ajax.php'),
	                'noResults' => esc_html__( 'No products found', 'woosearch' ),
	                'ajax_nonce' => wp_create_nonce( '_ajax_nonce' ),
	            	)
	        );
		}
	    
	}
}