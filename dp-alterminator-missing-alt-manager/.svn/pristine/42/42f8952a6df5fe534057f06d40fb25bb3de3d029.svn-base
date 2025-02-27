<?php
/**
 * Plugin Name: DP ALTerminator - Missing ALT manager
 * Plugin URI: http://www.danilopetrozzi.it/progetti/dp-alterminator-missing-alt-manager
 * Description: Adds ALT tags to your content images when they're missing or empty. It's pattern can be customized with simple shortcodes.
 * Version: 1.0.2
 * Author: Danilo Petrozzi
 * Author URI: http://www.danilopetrozzi.it
 * License: GPLv3
 */
 
// Security
if (!defined('ABSPATH')) {die();}
if (defined('WP_INSTALLING') && WP_INSTALLING) {return;}

// Include options page
include 'dp-alterminator-missing-alt-manager-opt.php';

// Main function
function dp_alterminator($content) {

global $post;

// Retrieve options
$pattern = get_option('dp_alterminator_w'); 
$dptitle = $post->post_title;
$dpdate = $post->post_date;
$dpdategmt = $post->post_date_gmt;
$dpexcerpt = $post->post_excerpt;
$dpurl = get_permalink($post->ID);

$pattern = str_replace( "\"", "", $pattern );

// Sobstitute shortcodes with correct elements
$pattern = str_replace( "%%DP_TITLE%%", $dptitle, $pattern );
$pattern = str_replace( "%%DP_URL%%", $dpurl, $pattern );
$pattern = str_replace( "%%DP_DATE%%", $dpdate, $pattern );
$pattern = str_replace( "%%DP_DATE_GMT%%", $dpdategmt, $pattern );
$pattern = str_replace( "%%DP_EXCERPT%%", $dpexcerpt, $pattern );

// Search images in $content
preg_match_all('/<img (.*?)\>/', $content, $images);


if(!is_null($images))
{
foreach($images[1] as $index => $value)
{
if(preg_match( '/alt=""/' , $value) || !preg_match( '/alt=/' , $value )) //if there's no ALT or it's empty
{
$nuovaimmagine = str_replace( '<img', '<img alt="' . $pattern . '"', $images[0][$index] );
$content = str_replace( $images[0][$index], $nuovaimmagine, $content );
}
}
}
return $content;


}

add_filter('the_content', 'dp_alterminator', 99999);

// Add settings link on plugin page
function dp_alterminator_settings_link($links) { 
  $settings_link = '<a href="options-general.php?page=dp-alterminator-missing-alt-manager.php">Settings</a>'; 
  array_unshift($links, $settings_link); 
  return $links; 
}
  
$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'dp_alterminator_settings_link' );

?>