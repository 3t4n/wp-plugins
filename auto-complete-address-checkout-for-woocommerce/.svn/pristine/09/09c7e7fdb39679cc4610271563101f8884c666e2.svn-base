<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
* This class is loaded on the back-end since its main job is
* to display the Admin to box.
*/
class GMACAW_Frontend {
	
	public function __construct () {
		add_action( 'wp_enqueue_scripts', array($this,'GMACAW_wp_enqueue_scripts' ));
	}
	public function GMACAW_wp_enqueue_scripts() {
	    $api_key = get_option('gmacaw_google_places_api_key');

	    // Escape the API key before using it in a URL
	    $api_script = esc_url(
	        set_url_scheme('http://maps.googleapis.com/maps/api/js') . 
	        '?key=' . rawurlencode($api_key) . '&libraries=places'
	    );

	    // Prevent script loading if API key is missing
	    if (empty($api_key)) {
	        return;
	    }
	   

	    wp_enqueue_script('gmacaw-google-places-api', $api_script, array(), null, true);
	    wp_enqueue_script('gmacaw-front', GMACAW_PLUGINURL.'js/front.js', array(), null, true);
	}

}
