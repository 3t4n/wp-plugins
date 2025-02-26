<?php
/*
Plugin Name: Rocket Fireworks
Description: Rocket Fireworks Celebration Plugin for your blog or website.
Version: 1.4
Author: Shahaji Deshmukh
Author URI: https://profiles.wordpress.org/shahaji9/
Plugin URI: https://wordpress.org/plugins/rocket-fireworks/
*/

/***********************************************
 * 
 *  WP Hooks
 * 
 **********************************************/
function sdrf_frontend_scripts() {
    if(!is_admin()){
        //wp_enqueue_style('sdrf-front', plugins_url('css/sdrf-front.css', __FILE__));
        wp_enqueue_script('sdrf-rocket-fireworks', plugins_url('js/rocket-fireworks.js',__FILE__), array('jquery'),'', true);
        
        /*@Since 1.2*/
        $pluginUrl = array('pluginUrl' => plugins_url());
        wp_localize_script('sdrf-rocket-fireworks', 'sdrfvars', $pluginUrl);
    }
}

add_action('wp_enqueue_scripts', 'sdrf_frontend_scripts');

//Insert rockets into the footer before </body> tag
function sdrf_custom_function() { ?>
    <style>
        .RocketFireworksAnimation{
            position: fixed;
            bottom: -100px;
            left: 50%;
            z-index: 99999999999999;
        }
    </style>
    <div id="RocketFireworks">
        <img id="RocketBox_0" src="<?php echo plugins_url() . '/rocket-fireworks/Rocket.gif'; ?>" class="RocketFireworksAnimation" />
        <img id="RocketBox_1" src="<?php echo plugins_url() . '/rocket-fireworks/Rocket.gif'; ?>" class="RocketFireworksAnimation" />
        <img id="RocketBox_2" src="<?php echo plugins_url() . '/rocket-fireworks/Rocket.gif'; ?>" class="RocketFireworksAnimation" />
        <img id="RocketBox_3" src="<?php echo plugins_url() . '/rocket-fireworks/Rocket.gif'; ?>" class="RocketFireworksAnimation" />
        <img id="RocketBox_4" src="<?php echo plugins_url() . '/rocket-fireworks/Rocket.gif'; ?>" class="RocketFireworksAnimation" />
    </div>    
<?php
}

add_action( 'wp_footer', 'sdrf_custom_function' );
