<?php
/*
Plugin Name: Alternate Mobile Tag
Description: Add mobile site url in HEAD sectiomn as Link tag with rel=alternate. Mobile url example http://m.example.com
Plugin URI: http://wpdeveloper.net
Author: WPDeveloper.net
Author URI: http://wpdeveloper.net
Version: 1.1
License: GPL2+
Text Domain: alternate-mobile-tag
Min WP Version: 2.5.0
Max WP Version: 4.2
*/

function alternate_curPageURL()
{
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://m.";//for mobile site
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
} 

function add_alternate_link_tag()
{
if(is_home() || (is_single()&& !is_attachment()) || is_page() || is_tag() || is_category()){
	?>
	<link rel="alternate" media="only screen and (max-width: 640px)" href="<?php echo esc_url(alternate_curPageURL()) ?>" >
<link rel="alternate" media="handheld" href="<?php echo esc_url(alternate_curPageURL()) ?>" >
	<?php
	}
}
add_action("wp_head", "add_alternate_link_tag");
?>