<?php
/*
 * Plugin Name: Brackets Ninja - Brackets for leagues, tournaments, and championships
 * Plugin URI: https://brackets.commoninja.com
 * Description: Create <strong>beautiful brackets</strong> for leagues, tournaments, and championships, and easily add them to your Wordpress website. No prior knowledge require. Just a simple integration with Brackets Ninja.
 * Version: 2.1.0
 * Author: Common Ninja
 * Author URI: https://www.commoninja.com/
 * License: GPLv2 or later
 */

/*
 * Shortcode to diplay Brackets Ninja bracket in a website.
 * 
 *	   The list of arguments is below:
 *     'bracketid' 	(string) 	- Bracket GUID
 */
 
function bracketsninja_shortcode( $atts ) {
	extract( shortcode_atts( array(
		'bracketid' => '2e09f426-e4ab-4d7e-bd2c-edc850e2f142',
	), $atts ) );
	
	$html = "<div class=\"commonninja_component\" comp-type=\"bracket\" comp-id=\"$bracketid\"></div>
	<script type=\"text/javascript\">
	(function() {
		var script = document.createElement('script');
		script.type = 'text/javascript';
		script.src = 'https://cdn.commoninja.com/sdk/latest/commonninja.js';
		document.getElementsByTagName('head')[0].appendChild(script);
	})();
	</script>";

	return $html;
}

add_shortcode( 'bracketsninja', 'bracketsninja_shortcode' );

?>