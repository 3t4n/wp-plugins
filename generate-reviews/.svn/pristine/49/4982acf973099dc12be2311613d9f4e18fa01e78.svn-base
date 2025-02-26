<?php
/*
Plugin Name: Generate Reviews
Plugin URI: https://evl.000webhostapp.com/generate-reviews
Description: This plugin created exclusively for Fivestar Reviews Site Clients with website. (https://www.fivestarreviewssite.com/)
Version: 1.0
Author: Erick Laxamana
Author URI: https://evl.000webhostapp.com/
License: GPLv2
*/


    if ( ! defined( 'ABSPATH' ) )
    die("Can't load this file directly");

    define('GENERATE_REVIEWS_PLUGIN_PATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
    define('generate_reviews_plugin_dir', plugin_dir_path( __FILE__ ) );
    add_filter('widget_text', 'do_shortcode');


    /*==========================================================================
        Generate Reviews (Google, Fivestar or Facebook Reviews)
    ==========================================================================*/
    function generate_reviews_shortcodes_script(){
        wp_enqueue_style('gr', GENERATE_REVIEWS_PLUGIN_PATH.'css/gr.css');
        wp_enqueue_script('jquery');
    }
    add_action('init', 'generate_reviews_shortcodes_script');


    function generate_reviews_shortcode( $atts  ) {
        extract( shortcode_atts( array(
            'fb_token'	=> '',
            'gg_token'	=> '',
            'fb_link'   => '',
            'fs_link'   => ''
        ), $atts ) );
        
        if ($gg_token == '') {
            return '';
        }

        // Limit the text depen on $limit
        // If text is less than $limit this function will return the original text
        function limit_text($text, $limit) {
            if (str_word_count($text, 0) > $limit) {
                $words = str_word_count($text, 2);
                $pos = array_keys($words);
                $text = substr($text, 0, $pos[$limit]) . '...';
            }
            return $text;
        }

        // FB Token and Google Token can get on fivestar page of the specific client

        $body = array(
            'gg_token' => $gg_token,
            'fb_token' => $fb_token
        );
         
        $args = array(
            'body' => $body,
            'timeout' => '5',
            'redirection' => '5',
            'httpversion' => '1.0',
            'blocking' => true,
            'headers' => array(),
            'cookies' => array()
        );

        // execute/call the api
        $url = 'https://www.fivestarreviewssite.com/wp-content/themes/child-theme/get-reviews.php';

        $response = wp_remote_post( $url, $args );

        // do anything you want with your response
        // Parse $reponse to json
        $response = json_decode($response['body'], true);

        // $totalReviews = count($response['gg']) + count($response['fb']) + count($response['fs']);
        $totalReviews = 0;

        if (count($response['gg']) > 0) {
            $totalReviews += (count($response['gg']) > 5) ? 5 : count($response['gg']);
        }

        if (count($response['fb']) > 0) {
            $totalReviews += (count($response['fb']) > 5) ? 5 : count($response['fb']);
        }

        if (count($response['fs']) > 0) {
            $totalReviews += (count($response['fs']) > 5) ? 5 : count($response['fs']);
        }
?>

<script type="text/javascript">

jQuery(document).ready(function(){
    jQuery(".revPop2").click(function(){
        jQuery( "#testimonial-container" ).addClass( "slidein" );
        jQuery( ".revPop2" ).addClass( "hideEl" );
    });

    jQuery("#testimonial-container .overlay-div").click(function(){
        jQuery( "#testimonial-container" ).removeClass( "slidein" );
        jQuery( ".revPop2" ).removeClass( "hideEl" );
    });

    jQuery("#testimonial-container .close-panel").click(function(){
        jQuery("#testimonial-container").removeClass( "slidein" );
        jQuery( ".revPop2" ).removeClass( "hideEl" );
    });

    var ctr = 1;
    jQuery('.review'+ctr).addClass('show');
    setInterval(function(){
        jQuery('.review'+ctr).removeClass('show');
        ctr++;
        jQuery('.review'+ctr).addClass('show');
        if(ctr==<?php echo $totalReviews+1;?>){
            jQuery('.review'+ctr).removeClass('show');
            ctr=1;
            jQuery('.review'+ctr).addClass('show');
        }
    }, 5000);
});

</script>

<?php

        ob_start();

        include('format.php');
        
        return ob_get_clean();
    }
    add_shortcode( 'generate-reviews', 'generate_reviews_shortcode' );

?>