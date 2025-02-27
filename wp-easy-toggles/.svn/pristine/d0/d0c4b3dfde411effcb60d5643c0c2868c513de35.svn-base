<?php
/**
 * Plugin Name: WP Easy Toggles
 * Description: WP Easy Toggles plugin add toggle functionality on your theme.
 * Version: 1.9.0
 * Author: Husain Ahmed Qureshi
 * Author URI: https://husain25.wordpress.com/
 * Author Email: husain.ahmed25@gmail.com
 * License: HAQV1
**/

add_action('admin_menu', 'haqwpet_admin_menu');
function haqwpet_admin_menu() {
        add_submenu_page( 'options-general.php', 'WP Easy Toggles', 'WP Easy Toggles', 'manage_options', 'haqwpet-settings', 'haqwpet_description');
    }
function haqwpet_description(){
    echo '<div class=""> <h1>Shortcode</h1><span>[toggles title="Lorem Ipsum is simply dummy text"]<br>Lorem Ipsum is simply dummy text of the printing and typesetting industry. <br>[/toggles]</span></div>';
}

add_action( 'init', 'haqwpet_init' ); 
function haqwpet_init() {
    if ( ! is_admin() ) {
        wp_enqueue_style( 'haqwpet-style', plugins_url( 'wp-easy-toggles' ) . '/assets/haqwpet.css' );
    }
}

function haqwpet_shortcode($attr, $description = null){ 
	extract(shortcode_atts(array(
        'title'      => '',
    ),  $attr));
	$html .= '<span class="easy_toggle"><i class="t-ico"></i>' .$title. '</span>';
	$html .= '<div class="toggle-desc" style="display: none;">';
	$html .= do_shortcode($description);
	$html .= '</div>';
   return $html;
}
add_shortcode('toggles', 'haqwpet_shortcode');


function haqwpet_jquery_initialization() { ?>
    <script>
        jQuery(document).ready(function(){
                jQuery(".toggle-desc").hide(); 
                jQuery(".easy_toggle").toggle(function(){
                        jQuery(this).addClass("toggle-active");
                        }, function () {
                        jQuery(this).removeClass("toggle-active");
                });
                jQuery(".easy_toggle").click(function(){
                        jQuery(this).next(".toggle-desc").slideToggle();
                });
        });
    </script>
<?php }
    add_action( 'wp_head', 'haqwpet_jquery_initialization', 10, 3 );
