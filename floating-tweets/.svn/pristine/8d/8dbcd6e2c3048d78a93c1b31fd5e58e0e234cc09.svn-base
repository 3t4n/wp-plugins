<?php
/*
		Plugin Name: Floating Tweets
		Plugin URI: http://www.designchemical.com/blog/index.php/wordpress-plugins/wordpress-plugin-floating-tweets/
		Tags: jquery, flyout, drop down, floating, twitter, tweets, sliding, social networking, vertical, animated, widget
		Description: Floating Tweets creates a sticky, floating widget that displays a live twitter feed.
		Author: Lee Chestnutt
		Version: 1.0.1
		Author URI: http://www.designchemical.com
*/

global $registered_skins, $wp_version;

class dc_jqfloatingtweets {

	function dc_jqfloatingtweets(){
	
		global $registered_skins, $wp_version;
		
		// Chec for json class
		if ( version_compare( $wp_version, '2.9', '<' ) && !class_exists( 'Services_JSON' ) ) {
			include_once( dirname( __FILE__ ) . '/inc/class.json.php' );
		}
	
		if(!is_admin()){
			// Header styles
			add_action( 'wp_head', array('dc_jqfloatingtweets', 'header') );
			// Scripts
			wp_enqueue_script( 'jquery' );
			wp_enqueue_script( 'jqueryeasing', dc_jqfloatingtweets::get_plugin_directory() . '/js/jquery.easing.js', array('jquery') );
			wp_enqueue_script( 'jqueryhoverintent', dc_jqfloatingtweets::get_plugin_directory() . '/js/jquery.hoverIntent.minified.js', array('jquery') );
			wp_enqueue_script( 'dcjqfloatingtweets', dc_jqfloatingtweets::get_plugin_directory() . '/js/jquery.floater.1.2.js', array('jquery') );
			// Shortcodes
			add_shortcode( 'dcflt-link', 'dcflt_tweet_link_shortcode' );
		}
		add_action( 'wp_footer', array('dc_jqfloatingtweets', 'footer') );
		
		$registered_skins = array();
	}

	function header(){
		//echo "\n\t";
	}
	
	function footer(){
		//echo "\n\t";
	}
	
	function options(){}

	function get_plugin_directory(){
		return WP_PLUGIN_URL . '/floating-tweets';	
	}

};

/* Time since function taken from WordPress.com */
if (!function_exists('wpcom_time_since')) :

function wpcom_time_since( $original, $do_more = 0 ) {
        // array of time period chunks
        $chunks = array(
                array(60 * 60 * 24 * 365 , 'year'),
                array(60 * 60 * 24 * 30 , 'month'),
                array(60 * 60 * 24 * 7, 'week'),
                array(60 * 60 * 24 , 'day'),
                array(60 * 60 , 'hour'),
                array(60 , 'minute'),
        );

        $today = time();
        $since = $today - $original;

        for ($i = 0, $j = count($chunks); $i < $j; $i++) {
                $seconds = $chunks[$i][0];
                $name = $chunks[$i][1];

                if (($count = floor($since / $seconds)) != 0)
                        break;
        }

        $print = ($count == 1) ? '1 '.$name : "$count {$name}s";

        if ($i + 1 < $j) {
                $seconds2 = $chunks[$i + 1][0];
                $name2 = $chunks[$i + 1][1];

                // add second item if it's greater than 0
                if ( (($count2 = floor(($since - ($seconds * $count)) / $seconds2)) != 0) && $do_more )
                        $print .= ($count2 == 1) ? ', 1 '.$name2 : ", $count2 {$name2}s";
        }
        return $print;
}
endif;

if (!function_exists('http_build_query')) :
    function http_build_query($query_data, $numeric_prefix='', $arg_separator='&'){
       $arr = array();
       foreach ( $query_data as $key => $val )
         $arr[] = urlencode($numeric_prefix.$key) . '=' . urlencode($val);
       return implode($arr, $arg_separator);
    }
endif;

// Include the widget
include_once('dcwp_floating_tweets_widget.php');

// Initialize the plugin.
$dcjqfloatingtweets = new dc_jqfloatingtweets();

// Register the widget
add_action('widgets_init', create_function('', 'return register_widget("dc_jqfloatingtweets_widget");'));

/**
* Create a link shortcode for opening/closing the menu
*/
function dcflt_tweet_link_shortcode($atts){
	
	extract(shortcode_atts( array(
		'text' => 'Click Here',
		'action' => 'link'
	), $atts));

	return "<a href='#' class='dcflt-$action'>$text</a>";

}

?>