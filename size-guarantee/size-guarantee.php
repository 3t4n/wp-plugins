<?php	
/**	
 * The plugin bootstrap file	
 *	
 * This file is read by WordPress to generate the plugin information in the plugin	
 * admin area. This file also includes all of the dependencies used by the plugin,	
 * registers the activation and deactivation functions, and defines a function	
 * that starts the plugin.	
 *	
 * @link              https://www.sizeguarantee.com/	
 * @since             1.0.0	
 * @package           Size_Guarantee	
 *	
 * @wordpress-plugin	
 * Plugin Name:       Size Guarantee	
 * Plugin URI:        https://www.sizeguarantee.com/how-it-works/	
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.	
 * Version:           1.0.0	
 * Author:            sizeguarantee	
 * Author URI:        http://sizeguarantee.com	
 * License:           GPL-2.0+	
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt	
 * Text Domain:       size-guarantee	
 * Domain Path:       /languages	
 * Requires at least: 4.9	
 * Tested up to: 5.7	
 * WC requires at least: 3.5	
 * WC tested up to: 5.1	
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Prefix for options
define ('size_guarantee_prefix','size_guarantee_');
define ('size_guarantee_group','size_guarantee');
/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'SIZE_GUARANTEE_VERSION', '1.0.0' );
define( 'SIZE_GUARANTEE_API_BASE_URL', 'https://console.sizeinterface.com/api/woocommerce' );
define( 'SIZE_GUARANTEE_PLUGIN_PATH', plugin_dir_url( __FILE__ ));

/**
 * [activate_size_guarantee The code that runs during plugin activation.
 * This action is documented in includes/class-size-guarantee-activator.php ]
 * @param  []  
*  @return []  
 */
function activate_size_guarantee() {


	require_once plugin_dir_path( __FILE__ ) . 'includes/class-size-guarantee-activator.php';
	Size_Guarantee_Activator::activate();

	if(!wp_next_scheduled('hourly')){
        wp_schedule_event(strtotime('22:00:00'), 'daily', 'size_guarantee_activation_check_hook');// add into the cron in scheduler

		}
}

/**
 * [deactivate_size_guarantee The code that runs during plugin deactivation. ]
 * This action is documented in includes/class-size-guarantee-deactivator.php
 * @param  []  
 * @return []          
 */
function deactivate_size_guarantee() {
	
	wp_clear_scheduled_hook('size_guarantee_activation_check_hook'); // remove the cron in scheduler

	require_once plugin_dir_path( __FILE__ ) . 'includes/class-size-guarantee-deactivator.php';


	Size_Guarantee_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_size_guarantee' );
register_deactivation_hook( __FILE__, 'deactivate_size_guarantee' );

add_action('size_guarantee_activation_check_hook', 'sizeGuaranteeTokenValidation');


/**
 * [sizeGuaranteeTokenValidation SizeGuarantee Token validation CRON ]
 * @param  []  
 * @return []          
 */

function sizeGuaranteeTokenValidation()
{
	$optionsArr = get_option( size_guarantee_group,'' );
	$apikey =!empty($optionsArr) ? $optionsArr[size_guarantee_prefix.'api_key'] : '' ;
	if($apikey){
		$shop = site_url();
		$size_cs_key=get_option(size_guarantee_prefix.'key');
    	$size_cs_secret=get_option(size_guarantee_prefix.'secret');
		$body = array('apiKey' => $apikey,'shop'=>$shop,'woo_key'=>$size_cs_key,'woo_sec'=>$size_cs_secret);
		$body = wp_json_encode( $body );		 
		$options = [
		    'body'        => $body,
		    'headers'     => [
		        'Content-Type' => 'application/json',
		    ],
		    'timeout'     => 60,
		    'redirection' => 5,
		    'blocking'    => true,
		    'httpversion' => '1.0',
		    'sslverify'   => false,
		    'data_format' => 'body',
		];		

		$sendPost= wp_remote_post( SIZE_GUARANTEE_API_BASE_URL.'/vaidate/apikey', $options );		
	    $responceData = json_decode(wp_remote_retrieve_body( $sendPost ));	
		update_option('cronAPI',json_encode($responceData));   
	    if($responceData){    // has response
 			if(!$responceData->success){	//not success
	    		update_option(size_guarantee_prefix.'connect',0); //API response 
	    	}else{
	    		$store_id=(isset($responceData->data->api_store_id)) ? $responceData->data->api_store_id : '';
	    		if($store_id){ // has store id
	    			update_option(size_guarantee_prefix.'connect',1); //
	    			update_option(size_guarantee_prefix.'store_id',$store_id);
	    		}
	    		else{ // if not have store id
	    			update_option(size_guarantee_prefix.'connect',0);
	    		}
	    	}
	    }
	    else{ // not have response
	    	update_option(size_guarantee_prefix.'connect',0);
	    }		
	}
}


// custom time added
/**
		 * [size_guarantee_add_cron_interval custom time added ]
		 * @param  [array]  
		 * @return [array]          
		 */
add_filter( 'cron_schedules', 'size_guarantee_add_cron_interval' );
function size_guarantee_add_cron_interval( $schedules ) { 
    $schedules['every_minute'] = array(
        'interval' => 60,
        'display'  => esc_html__( 'Every minute' ), );
    return $schedules;
}


/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-size-guarantee.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */

$options = get_option(size_guarantee_group, array());
$hook= 'woocommerce_after_add_to_cart_button';
if (!empty($options)){ //options not empty
	$hooks=[
		   'woocommerce_before_add_to_cart_form', 
	       'woocommerce_before_variations_form',
	       'woocommerce_before_add_to_cart_button',
	       'woocommerce_before_add_to_cart_quantity',
	       'woocommerce_after_add_to_cart_quantity',
	       'woocommerce_after_add_to_cart_button',
	       'woocommerce_after_add_to_cart_form'
	   ];

	//if have store id and TODO validate the store id
	if(isset($options[size_guarantee_prefix.'store_id'])){
		//if have style id
		if(isset($options[size_guarantee_prefix.'style'])){
			$hook=$hooks[$options[size_guarantee_prefix.'style']];	
		}
	}
}

//hooks section
if ( ! function_exists( $hook ) ) {
	if(!empty($hook)){
		/**
		* Inject button in product page
		*/
		function InjectButton () {			
			global $post;
			$options = get_option(size_guarantee_group, array());
			$enable= isset($options[size_guarantee_prefix.'enable']) ?  $options[size_guarantee_prefix.'enable'] : 0;
			$size_guarantee_api_key= isset($options[size_guarantee_prefix.'api_key']) ?  $options[size_guarantee_prefix.'api_key'] : '';
			$store_id='';
			$connect = get_option(size_guarantee_prefix.'connect');
			$store_id = get_option(size_guarantee_prefix.'store_id');
			if($enable==1){ //plugin enable
				if($connect==1){ //API check
					echo '<br><br><div  data-store_id="'.$store_id.'"  data-api_key="'.$size_guarantee_api_key.'"  id="size-guarantee-popup"></div><br> <script async src="https://shopify.sizeguarantee.com/popup/app.js"></script>';
					
				}else{
					echo '<br><br> <span class="size_guarantee-front-error"> Invalid API Key, Unable to show Know Your Size Button</span>';
				}
			}

		}
		add_filter( $hook , 'InjectButton' );
	}
}





// Checking WooCommerce Exisit or Not 

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

if ( !is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
  // echo '<div class="error"><p>Size Guarantee :Size Guarantee Plugin requires the WooCommerce plugin to be installed and active.</p></div>';
	$class = 'notice notice-error is-dismissible';
    $message = __( 'Size Guarantee :Size Guarantee Plugin requires the WooCommerce plugin to be installed and active', 'size-guarantee' );
    printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) ); 
}

/**
		 * [run_size_guarantee Class Object intialization ]
		 * @param  []  
		 * @return []          
		 */

function run_size_guarantee() {

	$plugin = new Size_Guarantee();
	$plugin->run();

}
run_size_guarantee();


