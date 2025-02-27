<?php
/**
 * Shortcode
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

//HOOKS
add_action('init','tbtc_shortcode_init');

    /**********************************/
    /*			FUNCTIONS FOR SHORTCODE
    ***********************************/
function tbtc_shortcode_init()
{
    add_shortcode('tbtc_testimonial', 'tbtc_testimonial_shortcode');
    add_shortcode('tbtc_teams', 'tbtc_teams_shortcode');
    add_shortcode('tbtc_price', 'tbtc_price_shortcode');
}

function tbtc_testimonial_shortcode($atts){
    ob_start();

    $atts = shortcode_atts(array(
        'number' => '-1'
    ), $atts);
    $testimonialPost = $atts['number'];

    set_query_var( 'testimonial_per_page', esc_attr( $testimonialPost ) );

    include TBTC_PLUGIN_DIR .'public/shortcode-layouts/testimonial-layout.php';

    return ob_get_clean();
}

function tbtc_teams_shortcode($atts){
    ob_start();
   
    $atts = shortcode_atts(array(
        'number' => '-1'
    ), $atts);
    $teamPost = $atts['number'];

    set_query_var( 'team_per_page', esc_attr( $teamPost ) );

    include TBTC_PLUGIN_DIR .'public/shortcode-layouts/team-layout.php';

    return ob_get_clean();
}


function tbtc_price_shortcode($atts){
    ob_start();
   
    $atts = shortcode_atts(array(
        'number' => '-1'
    ), $atts);
    $pricePost = $atts['number'];

    set_query_var( 'price_per_page', esc_attr( $pricePost ) );

    include TBTC_PLUGIN_DIR .'public/shortcode-layouts/price-layout.php';

    return ob_get_clean();
}