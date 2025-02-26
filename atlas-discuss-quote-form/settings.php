<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

require_once ADF_PLUGIN_DIR . '/admin/function.php';
require_once ADF_PLUGIN_DIR . '/admin/shortcodes.php';
require_once ADF_PLUGIN_DIR . '/modules/text.php';
require_once ADF_PLUGIN_DIR . '/modules/process.php';

if (!function_exists('adf_custom_scripts_admin')) {
	// Enque script for admin
	function adf_custom_scripts_admin() {
		$screen = get_current_screen();
	    if( 'atlas_discuss_form' != $screen->post_type) {
	        return; // bail out if we're not on an Edit Post screen
	    }
	    wp_enqueue_script( 'repeatable', plugins_url( 'admin/js/repeatable.js', __FILE__ ),array('jquery'), false,false);  
	    wp_enqueue_style( 'adf_admin', plugins_url( '/admin/css/custom_admin.css', __FILE__ )); 
	}
	add_action( 'admin_enqueue_scripts', 'adf_custom_scripts_admin',100);
}	

if (!function_exists('adf_custom_scripts_front')) {
	// Enque script for frontend
	function adf_custom_scripts_front() {
		wp_enqueue_style( 'adf_google_font', 'http://fonts.googleapis.com/icon?family=Material+Icons'); 
		wp_enqueue_style( 'adf_materialize', plugins_url( '/assets/css/materialize.css', __FILE__ )); 
		wp_enqueue_style( 'adf_font', plugins_url( '/assets/css/font-awesome.css', __FILE__ )); 
		wp_enqueue_style( 'adf_custom', plugins_url( '/assets/css/custom.css', __FILE__ )); 

		wp_enqueue_script( 'adsf_materialize', plugins_url( 'assets/js/materialize.js', __FILE__ ),array('jquery'), false,false);   
		wp_enqueue_script( 'adsf_chart', plugins_url( 'assets/js/Chart.bundle.js', __FILE__ ),array('jquery'), false,false);   
		wp_enqueue_script( 'adsf_custom', plugins_url( 'assets/js/custom.js', __FILE__ ),array('jquery'), false,false);       
	}
	add_action( 'wp_enqueue_scripts', 'adf_custom_scripts_front',100);
}

if (!function_exists('adf_demo_ajaxurl')) {
	add_action('wp_head','adf_demo_ajaxurl');
	function adf_demo_ajaxurl() {
	?>

	<script type="text/javascript">
	var adf_demo_ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
	var adf_ajax_nonce = "<?php echo wp_create_nonce('adf_nonce_string'); ?>";	
	</script>
	<?php
	}
}