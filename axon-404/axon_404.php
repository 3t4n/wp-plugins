<?php
/*
Plugin Name: Axon 404
Description: A simple and easy to use custom 404 page, or basic 404 to home page redirect.  
Version:     1.0
Author:      Angel Petrov
Author URI:  http://quaxen.com/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/


defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
 
function axon_redirect(){
	if(is_404()){
		//check if the page is created
	    if (get_page_by_path('axon')){
			wp_redirect('/axon', 301);
	    } 
		// if it's not, redirect to home
		else {
	        wp_redirect(home_url(), 301);
	    }
	}
}

//initiate the plugin
add_action('template_redirect','axon_redirect');