<?php
/**
* Plugin Name: SmartAss Highlighter
* Plugin URI: http://justtechthings.com/smartass-highlighter
* Description: SmartAss Highlighter is extremely simple and easy to use syntax highlighter for your code. To add this highlighter simply use <i>shortcode</i> <strong><code>[highlighter]</code></strong> in any post, the code within <strong><code>&lt;pre&gt;</code></strong> and <strong><code>&lt;/pre&gt;</code></strong> tags would be highlighted after the page load.
* Version: 1.0
* Author: Harshvardhan Malpani
* Author URI: https://plus.google.com/+HarshvardhanMalpani
* License: MIT
*/

# Global variables used
$line_numbers = ' unknown';
$line_number_confirm = 'non existing';
#$highlight_js = "http://cdn.justtechthings.com/js/highlighter.js";
#$highlight_style = "http://cdn.justtechthings.com/css/highlighter.css";
$highlight_js = plugins_url('/highlighter.js', __FILE__);
$highlight_style = plugins_url('/highlighter.css', __FILE__);

# Function to strip slashes #
function smartass_tag_stripper($code){
	$code=str_replace('\\"', '"',$code);
	$code=htmlspecialchars($code,ENT_QUOTES);
	return $code;
}

# Filter to add prettyprint class to <pre> tag #
function highlight_filter($content=null) {
	global $line_number_confirm;
	return preg_replace("/<pre(.*?)>(.*?)<\/pre>/ise",
		"'<pre class=\"prettyprint$line_number_confirm\">'.smartass_tag_stripper('$2').'</pre>'", $content);
}

# The actual matchstick to lighten up the above filter #
function powerup_smartass($f)
{
	global $line_number_confirm;
	$line_number_confirm=$f;
	add_filter('the_content', 'highlight_filter',2);
}

# Addition of Javascript and CSS for the highlighter #
function smartass_highlighter()
{
	global $highlight_style,$highlight_js;
	echo '<script type="text/javascript" src="'.$highlight_js.'" async></script><script type="text/javascript">window.onload = function(){prettyPrint();};</script><link rel="stylesheet" type="text/css" href="'.$highlight_style.'" />';
}

# The shortcode #
function highlighter($atts, $content = null) {
	$a = shortcode_atts( array('line' => "1"), $atts );
	global $line_numbers,$line_number_confirm;
	if($a['line'])
	$line_numbers = " linenums:1";
	else $line_numbers = " linenums:0";
	$line_number_confirm= $line_numbers;
	powerup_smartass($line_number_confirm);
	add_action('wp_footer', 'smartass_highlighter');
}

add_shortcode('highlighter', 'highlighter');

###
# Backend done #
###

###
# Adding Buttons in Editor Panel
# visible to authors / editors only
###
define ( 'JS_PATH' , plugin_dir_url(__FILE__).'/button.js');

function smartass_tags()
{
	$output = "<script type='text/javascript'>\n
	/* <![CDATA[ */ \n";
	wp_print_scripts( 'quicktags' );
	$buttons = array();
	$buttons[] = array(
		'name' => 'SmartAss Highlighter',
		'options' => array(
			'display_name' => 'Add SmartAss Highlighter',
			'open_tag' => '\n[highlighter]',
			'close_tag' => '',
			'key' => ''
			)
		);
	for ($i=0; $i <= (count($buttons)-1); $i++)
	{
		$output .= "edButtons[edButtons.length] = new edButton('ed_{$buttons[$i]['name']}'
			,'{$buttons[$i]['options']['display_name']}','{$buttons[$i]['options']['open_tag']}'
		); \n";
		}
	$output .= "\n /* ]]> */ </script>";
	echo $output;
	}
add_action('admin_head','smartass_tags');

# Security Check and Adding buttons
function smartass_buttons()
{
	if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
		return;
	if ( get_user_option('rich_editing') == 'true')
	{
		add_filter("mce_external_plugins", "add_smartass_button");
		add_filter('mce_buttons_3', 'register_smartass_button');
		}
	}
	
# Buttons in Text and Visual Editor Mode
function register_smartass_button($buttons)
{
	array_push($buttons,"SmartAss-Highlighter"	);
	return $buttons;
	} 

function add_smartass_button($plugin_array)
{
	$plugin_array['SmartAss'] = JS_PATH;
	return $plugin_array;
	}
	
# Action to queue the buttons
add_action('init', 'smartass_buttons');
# Admin Page
if(is_admin()){require_once('SmartAss-Highlighter-admin.php');}
?>