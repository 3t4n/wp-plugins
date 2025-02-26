<?php
/*
   Plugin Name: Currency Code
   Plugin URI: http://www.stevenkellow.com/plugins/currency-code/
   Version: 0.1
   Author: <a href="http://www.stevenkellow.com">Steven Kellow</a>
   Description: Simple shortcode to return live currency info
   Text Domain: currency-code
   License: GPLv3
*/

add_shortcode( 'currency', 'currency_run' );
function currency_run( $atts ) {
	   
        // Set default attributes for the shortcode
        $atts = shortcode_atts(
		array(
			'from' => 'GBP',
			'to' => 'USD',
            'round' => 2
		), $atts, 'currency' );
        
		// Get values from shortcode
		$source = $atts['from'];
		$target = $atts['to'];
        $round = $atts['round'];
    
        // Gets live exchange rates from fixer.io (all credit for rates goes to them)
		$currency_json = file_get_contents('http://api.fixer.io/latest?base=' . $source . '&symbols=' . $target);
		// Sample output
		// {"base":"GBP","date":"2016-10-18","rates":{"USD":1.2274}}

		$data = json_decode($currency_json);

		$val_data = $data->{'rates'}->{$target};
    
		$display_val = round( $val_data, $round );
		
        $output = '1' . $source . ' = ' . $display_val . $target;
    
        return $output;
        
 
}


// Include scripts and styles
add_action( 'wp_enqueue_scripts', 'currency_code_script_style', 10, 2 );
function currency_code_script_style(){
    
    wp_enqueue_script('currency-code-lib', plugin_dir_url( __FILE__ ) . 'js/money.min.js');
    
    wp_enqueue_script('currency-code-widget', plugin_dir_url( __FILE__ ) . 'js/currency-widget.js', array( 'jquery' ), '1.0.0', true);
    
    
}



// Include the sidebar widget
include_once("currency-widget.php");