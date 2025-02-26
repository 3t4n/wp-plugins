<?php /* 
Plugin Name: Awesome Scroll To Top
Plugin URI: http://www.help4cms.com/ 
Version: 0.1 
Author: Mudit Kumawat 
Author URI: http://www.help4cms.com/ 
Description: Awesome Scroll to Top plugin allow your website users to easily scroll back to the top of your page with one click of the button. This gives your website better navigation and also adds a more professional look to your Website.  
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
define('directory', plugins_url('awesome-scroll-to-top') );
add_action('wp_footer','awesome_scroll_to_top');
function awesome_scroll_to_top(){
echo '<a href="#" class="awesome-scroll-top">&#10148;</a>';	
}


// Add Script And Css File
function awesome_scroll_to_top_script_css() {
wp_enqueue_script('awesome-scroll-to-top-jquery', directory . '/assets/js/awesome-scroll-to-top.js', array('jquery'), '1.0', true);
wp_enqueue_style( 'awesome-scroll-to-top-stylesheet', directory . '/assets/css/style.css' );
}
add_action('wp_enqueue_scripts', 'awesome_scroll_to_top_script_css','30');
