<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
/**
 * Albnet Shortcodes
 * 
 * @package Albnet
 * @author Albreis Network
 * @copyright 2018 Albreis Network
 * @license GPL 3.0
 * 
 * @wordpress-plugin
 * Plugin Name: Albnet Shortcodes
 * Plugin URI: https://shortcodes.albreis.com.br
 * Description: A lot of shortcodes to show posts
 * Version: 1.4.0
 * Author: Albreis Network <contato@albreis.com.br>
 * Author URI: https://albreis.com.br
 * Text Domain: albnet-shortcodes
 * Domain Path: /languages
 * License: GPL 3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 */

defined('IS_MOBILE') or define('IS_MOBILE', wp_is_mobile());

/**
 * Load settings page
 */
require 'settings/init.php';

/**
 * Add admin menu
 */
add_action( 'admin_menu', function(){
    
  add_menu_page( 'Albnet Shortcodes', 'Albnet Shortcodes', 'publish_posts', 'albnet_shortcodes', function(){
    require 'settings/index.php';
  }, 'dashicons-schedule', 0 );

} );


/**
 * Load JS e CSS
 */
function albnet_shortcodes_scripts() {

    wp_enqueue_script( 'ui-kit-js', plugin_dir_url(__FILE__) . '/js/uikit.min.js', null, time(), true);
    wp_enqueue_script( 'ui-kit-js-icons', plugin_dir_url(__FILE__) . '/js/uikit-icons.min.js', null, time(), true);
    wp_enqueue_style( 'ui-kit-css', plugin_dir_url(__FILE__) . '/css/uikit.min.css', null, time(), 'all', true);
    wp_enqueue_style( 'style-albnet-shortcodes', plugin_dir_url(__FILE__) . '/style.css', null, time(), 'all', true);

}
add_action( 'wp_enqueue_scripts', 'albnet_shortcodes_scripts' );

/**
 * Images sizes
 */
add_image_size( '720x380', 720, 380, true );
add_image_size( '360x360', 360, 360, true );
add_image_size( '320x240', 320, 240, true );
add_image_size( '120x120', 120, 120, true );


/**
 * Load shortcodes
 */
add_shortcode('albnet_shortcodes', 'albnet_shortcodes');

function albnet_shortcodes($atts = []){

    $a = shortcode_atts( [
        // Layout
        'layout' => 'card',

        // Show Ads
        'show_ads' => false,

        // Interval in the loop to show ads
        'ads_step' => 3,

        // Thumbnail size
        'image_size' => '720x380',

        // Section title
        'title' => '',

        // Post type
        'post_type'=>'post',

        // Number of posts to show
        'posts_per_page' => 4,

        // Current page
        'paged' => '',

        // Posts ordering
        'order' => 'DESC',

        // Field to ordering
        'orderby' => 'date',

        // Show pagination? Only if "paged" is set
        'show_pagination' => false,

        // Start loop from (ignored if "paged" is set)
        'offset' => 0,

        // Taxonomy
        'taxonomy' => 'category',

        // Taxonomy field for filtering
        'field' => 'slug',

        // Taxonomy value (depends on filter)
        'terms' => '',

        //Show only posts with featured images?
        'only_with_thumb' => true,

        // Show post thumbnail?
        'show_thumb' => true,

        // Show vídeo iframe if post has it
        'show_video' => false,

        // Show post title?
        'show_title' => true,

        // Show post excerpt?
        'show_excerpt' => false,

        // Show post author?
        'show_author' => false,

        // Show post date?
        'show_date' => false,

        // Show post times ago?
        'show_times_ago' => true,

        // Show post category?
        'show_category' => false,

        // Show post comments?
        'show_comments' => false,

        // Show views?
        'show_views' => false,

        // Icon to show before title
        'title_icon' => '',

        // Class of loop's container
        'container_class' => '',

        // Class for items inside loop
        'item_class' => '',

        // Ratio for slideshow format
        'ratio' => '16:9'
    ], $atts );

    
    include 'shortcode-' . $a['layout'] . '.php';

}

function albnet_get_args($conf) {

    
    /**
     * Post type
     */
    $albnet_args['post_type'] = $conf['post_type'];

    /**
     * Posts per page
     */
    $albnet_args['posts_per_page'] = $conf['posts_per_page'];

    /**
     * Current page
     */
    $albnet_args['paged'] = $conf['paged'];

    /**
     * Check if has paged
     */
    if(!$albnet_args['paged']) {
        /**
         * If paged remove offset setting
         */
        $albnet_args['offset'] = $conf['offset'];
    }

    /**
     * Show only posts with featured images
     */
    if($conf['only_with_thumb'] && 0) {
        $albnet_args['meta_query'] = [
            [
                'key' => '_thumbnail_id',
                'compare' => 'EXISTS'
            ],
        ];
    }

    /**
     * Remove offset setting if is paginated
     */
    if($conf['paged']) {
        unset($albnet_args['offset']);
    }
    
    /**
     * Check if has fields to filter by taxonomy
     */
    if($conf['taxonomy'] && $conf['field'] && $conf['terms']) {
        $albnet_args['tax_query'] = [
            [
                'taxonomy' => $conf['taxonomy'],
                'field' => $conf['field'],
                'terms' => $conf['terms']
            ]
        ];
    }

    $albnet_args['post_status'] = 'publish';

    /**
     * Set posts ordering
     */
    $albnet_args['order'] = $conf['order'];
    $albnet_args['orderby'] = $conf['orderby'];

    /**
     * Query optmizations
     */
	$albnet_args['no_found_rows'] = true; 
	$albnet_args['update_post_meta_cache'] = false; 
	$albnet_args['update_post_term_cache'] = false;
	//$albnet_args['fields'] = 'ids';
    

    return array_filter($albnet_args);
}