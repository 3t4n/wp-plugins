<?php 
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
class Booknow_Appointments_Frontend {
	function __construct(){	
		add_action('wp_enqueue_scripts', array($this,'add_lib'));
	}
	function add_lib() {
		wp_enqueue_style("booknow_font",BOOKNOW_PLUGIN_URL ."frontend/css/booknow_font.css");
		wp_enqueue_style("booknow",BOOKNOW_PLUGIN_URL ."frontend/css/mark-your-calendar.css");
		wp_enqueue_script("booknow_hooks",BOOKNOW_PLUGIN_URL ."frontend/js/hooks.js",array("jquery"));
        wp_enqueue_script("mark-your-calendar",BOOKNOW_PLUGIN_URL ."frontend/js/mark-your-calendar.js",array("jquery"));
		wp_enqueue_script("booknow",BOOKNOW_PLUGIN_URL ."frontend/js/booknow.js",array("jquery"));
        $datas = get_option("booknow_settings");
        $date_format = 'F j, Y';
        if( isset($datas["date_format"])){
        	$date_format = $datas["date_format"];
        }
        wp_localize_script( 'booknow', 'booknow',
            array( 
                'ajax_url' => admin_url( 'admin-ajax.php' ),
                'weeks_short' => Booknow_Functions::get_week(false),
                'weeks_full' => Booknow_Functions::get_week(),
                'months_short' => Booknow_Functions::get_month(false),
                'months_full' => Booknow_Functions::get_month(),
                'date_format' => $date_format
        ) );
	}
}
new Booknow_Appointments_Frontend;