<?php
/**
 * Plugin Name: Super Testimonials
 * Plugin URI: https://codecabin.io/
 * Description: A super easy to use and comprehensive Testimonial plugin.
 * Version: 3.0.0
 * Author: Sola Plugins
 * Author URI: https://codecabin.io/
 * License: GPL2
 * Text Domain: sola-testimonials
 */

/**
 * 3.0.0 - 2020-11-13 - Medium priority
 * Renamed to Super Testimonials
 * Resolved Security issues in settings and Feedback area
 * Tested up to WordPress 5.5.1
 * Added 'nofollow' link toggle setting
 * Modernized Settings and Feedback Area
 * Fixed bugs with setting selection and persistence
 * Fixed testimonial length implementation
 * Added new updated super shortcodes
 * Fixed a bug where round image styling was not loading with pagnination
 * Fixed various issues

 * 2.0.0 - 2020-01-08 - Medium priority
 * Tested up to WordPress 5.4
 * Fixed a bug where styles.css loads on all pages
 * Fixed a bug where Gutenberg files loads in frontend
 * 
 * 1.9.9 - 2019-11-14 - Medium priority
 * Added ability to regenerate the REST Token
 * Added click to copy short code
 * Updated the post type icon
 * Rebuild Gutenberg Blocks
 * Fixed errors when you disable settings in "Options" page
 * 
 * 1.9.8 - 2019-10-30 - Medium priority
 * Added ability to regenerate the REST Token
 * Added click to copy short code
 * Updated the post type icon
 * Rebuild Gutenberg Blocks
 * Fixed errors when you disable settings in "Options" page
 * 
 * 1.9.7 - 2019-05-28 - Low priority
 * Stopped enqueuing of super testmonial files where short code is not present
 * Tested the plugin on WP 5.2.1 
 *
 * 1.9.6 - 2019-01-24 - Low priority
 * Fixed a bug where UI and other style related code loaded on all the pages
 * Tested functionality where widget - Random is not displaying
 * Tested the plugin on WP 5.0.3
 * Tested single testimonial style fix
 *
 * 1.9.5 - 2018-01-17 - Low priority
 * Improved the UX in the settings area
 * Fixed a bug with the custom post types
 * Fixed a bug where [super_t_all_testimonials] was not working
 * Tested the plugin on WP 4.9.1
 * 
 * 1.9.4 - 2017-04-06 - Low Priority
 * REST API endpoint added - get_all_testimonials
 * Styling fix - Stray double quotes added to testimonial content have been removed
 * 
 * 1.9.3 - 2017-01-27 - Low Priority
 * New Shortcode Added - Ability to display the total count of your markers
 * [super_testimonials_count type='all'] - type accepts 'all', 'pending', 'approved'
 * Fixed a bug that caused the testimonial status to remain approved
 * 
 * 1.9.2 - 2016-12-06 - Medium Priority
 * PHP errors fixed upon activation
 * Tested on WordPress 4.7
 * 
 * 1.9.1 - 2016-09-16 - High priority
 * Bug fix that stopped testimonials from showing
 * 
 * 1.9.0 - 2016-09-15 - Low priority
 * Tested on WP 4.6.1
 * Added filters to the testimonial markup on the front end
 * New filters:
 *     sola_t_filter_title          Modify the title
 *     sola_t_filter_title_wrap     Modify the title wrap that houses the title
 *     sola_t_filter_content        Modify the content (the_content)
 *     sola_t_filter_content_wrap   Modify the content wrap that houses the content
 *     sola_t_filter_author         Modify the author name
 *     sola_t_filter_website_name   Modify the website name
 *     sola_t_filter_website        Modify the website URL
 *     sola_t_filter_website_wrap   Modify the wrap that houses website and website name
 *     sola_t_filter_structure      Modify the structure of the entire testimonial (data array supplied)
 *     sola_t_filter_layout         Modify the structure of the layout (data array supplied)
 * 
 * 
 * 1.8.5 2016-03-10 - Low Priority
 * Bug Fix: Pagination returned no results if you werent logged in
 * Bug Fix: Missing HTML tag caused layout issues on some pages
 * 
 * 1.8.4 - 2016-01-07 - Low Priority
 * Tested on WordPress 4.4
 * New Feature: You can now add pagination to your testimonials
 * 
 * 1.8.3 - 2015-09-16 - Low Priority
 * New Feature: Display your testimonials using a widget
 *
 * 1.8.2 - 2015-09-09 - Low Priority
 * Feedback form email address rectified
 * Translations added:
 *  Dutch (Thank you Albert van der Ploeg)
 *  French (Thank you Frederic Grolleau)
 * 
 * 1.8.1 2015-05-05 - Low Priority
 * Translations added:
 *  Brazilian Portuguese (Thank you Marcio Marodin)
 *  Spanish (Thank you Esteban Truelsegaard)
 * 
 * 1.8 2015-04-22 - Low Priority
 * New Feature: You can now strip all links out of a testimonial - Prevents single view 
 * New Feature: You can now redirect to a thank you page once a testimonial has been submitted (Pro)
 * Bug Fix: Display Star Rating Option not saving in slider tab fixed (Pro)
 * Translations added:
 *  Swedish (Thank you Jorgen Sjoholm)
 * 
 * 1.7 2015-03-24 - Low Priority
 * New Feature: You can now choose to display the excerpt or the full body of a testimonial
 * New Feature: You can now change the pagination speed of the slider (Pro)
 * 
 * 1.6 2015-02-20 - Low Priority
 * Bug Fix: Read More Link now shows at the end of a testimonial excerpt
 * New Feature: You can now add star ratings to your testimonials (Pro)
 * New Feature: You can now choose if you want guests to submit a testimonial (Pro)
 * 
 * 1.5 2015-02-03 Low Priority
 * New Feature: You can choose to render HTML in a testimonial
 * New Feature: Specify in the shortcode the theme and layout you would like to use for your testimonials
 * Bug Fix: Layout issues fixed when showing more than 4 testimonials
 * Bug Fix: Testimonial image style wouldnt change in slider
 * Bug Fix: Add Media has been removed and a Featured Image metabox for testimonial images
 * Enhancement (Pro): Less testimonial items will display per slide on mobile devices
 * 
 * 1.4 
 * New feature: Media button added to testimonial author image
 * 
 * 1.3
 * Code improvements
 * Testimonial structure improvements
 * Bug fix: Super Testimonials welcome page kept showing up for some users
 * New shortcode addition to show a random testimonial
 * Pro: Two new testimonial themes added
 * 
 * 1.2 2014-11-24
 * Fixed bug that caused Fatal error
 * 
 * 1.1 - 2014-11-21
 * Fixed the bug that caused an unnecessary break in the body of the testimonial
 * Neatened up the testimonial options page
 * 
 */

define('SOLA_T_PLUGIN_NAME', 'Sola Testimonials');
define('SOLA_T_SITE_URL', site_url());
define('SOLA_T_PLUGIN_DIR', plugin_dir_url( __FILE__ ));

add_action('init', 'sola_t_init');
add_action('init', 'sola_t_post_type');

add_action('add_meta_boxes', 'sola_t_meta_box');
add_action('add_meta_boxes', 'sola_t_side_meta_box');
add_action('do_meta_boxes', 'sola_t_featured_user_image');
add_action('admin_menu', 'sola_t_menu');

add_action('save_post', 'sola_t_save_testimonial_meta');
add_action('manage_posts_custom_column', 'sola_t_populate_columns');

add_action('admin_enqueue_scripts', 'sola_t_admin_styles');
add_action('admin_enqueue_scripts', 'sola_t_admin_scripts');

add_action('admin_head','sola_t_admin_head');
add_action('wp_head','sola_t_user_head');

remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'sola_t_custom_excerpt');

require_once 'includes/shortcodes.php';
require_once 'includes/widget.php';

// Gutenberg Blocks
 include "includes/gutenberg-blocks/single-testimonial/index.php";
 include "includes/gutenberg-blocks/all-testimonials/index.php";

add_action( 'widgets_init', 'sola_t_register_widgets' );

add_filter('pre_get_posts', 'sola_t_loop_control', 10);    

add_filter('manage_testimonials_posts_columns' , 'sola_t_columns');
add_filter('excerpt_more', 'sola_t_read_more',999);

register_activation_hook( __FILE__, 'sola_t_activate');
register_deactivation_hook(__FILE__, 'sola_t_deactivate');
register_uninstall_hook(__FILE__, 'sola_t_uninstall');

global $sola_t_version;
global $sola_t_version_string;

$sola_t_version = "3.0.0";
$sola_t_version_string = "Basic";

function sola_t_register_widgets(){
    
    register_widget( 'Sola_Testimonials_Widget_Single' );
    register_widget( 'Sola_Testimonials_Widget_Random' );

    if( function_exists( 'sola_t_pro_activate' ) ) {

        if( class_exists ( 'Sola_Testimonials_Widget_Slider_Pro' ) ) { 
            
            register_widget( 'Sola_Testimonials_Widget_Slider_Pro' );        

        }

    } else {

        register_widget( 'Sola_Testimonials_Widget_Slider_Basic' );

    }

}

function sola_t_init(){
    
   /*
    * Load Text Domain
    */
    $plugin_dir = basename(dirname(__FILE__))."/languages/";
    load_plugin_textdomain( 'sola-testimonials', false, $plugin_dir );
    
    if (isset($_POST['action']) && $_POST['action'] == 'sola_t_submit_find_us') {
        //sola_t_feedback_head();
        wp_redirect("./edit.php?post_type=testimonials&page=sola_t_settings", 302);
        exit();
    }
    if (isset($_POST['action']) && $_POST['action'] == 'sola_t_skip_find_us') {
        wp_redirect("./edit.php?post_type=testimonials&page=sola_t_settings", 302);
        exit();
    }

    if (isset($_GET['post_type']) && $_GET['post_type'] == "Testimonials") {
        
        global $sola_t_version;
        /* check if their using APC object cache, if yes, do nothing with the welcome page as it causes issues when caching the DB options */
        if (class_exists("APC_Object_Cache")) {
            /* do nothing here as this caches the "first time" option and the welcome page just loads over and over again. quite annoying really... */
        }  else { 
            if (isset($_GET['override']) && $_GET['override'] == "1") {
                $sola_t_first_time = $sola_t_version;
                update_option("sola_t_first_time",$sola_t_first_time);
            } else {
                $sola_t_first_time = get_option("sola_t_first_time");
                if (!$sola_t_first_time) { 
                    /* show welcome screen */
                    $sola_t_first_time = $sola_t_version;
                    update_option("sola_t_first_time",$sola_t_first_time);
                    wp_redirect('edit.php?post_type=testimonials&page=sola_t_settings&action=welcome_page');
                    exit();
                }
                
                if ($sola_t_first_time != $sola_t_version) {
                    // user has updated - will build update page
                    update_option("sola_t_first_time",$sola_t_version);
                    
                }
                
            }
        }
        
       
    }
    
} 

/* Deprecated Since: 3.0.0 */
/*
function sola_t_feedback_head() {
    if (function_exists('curl_version')) {

        $request_url = "http://www.solaplugins.com/apif-testimonials/rec.php";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $request_url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $_POST);
        curl_setopt($ch, CURLOPT_REFERER, $_SERVER['HTTP_HOST']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
    }
    return;
}
*/

function sola_t_activate(){
    
    $sola_t_token = get_option('sola_t_token');

    if( !$sola_t_token || $sola_t_token == "" ){
        
        $sola_t_new_token = md5( time()."sola_t_token" );
         
        update_option( 'sola_t_token', $sola_t_new_token );
    
    } 

    add_role('testimonial_author', __('Testimonial Author', 'sola-testimonials'), array('read' => true));
    
    $sola_t_options_settings = array(
        'show_title' => 1,
        'show_excerpt' => 1,
        'excerpt_length' => 20,
        'image_size' => 120,
        'read_more_link' => __('Read More', 'sola-testimonials'),
        'show_user_name' => 1,
        'show_user_web' => 1,
        'show_image' => 1,
        'sola_t_allow_html' => 0,
        'sola_t_allow_nofollow' => 1,
    );
    
    add_option('sola_t_options_settings', $sola_t_options_settings);
    
    $sola_t_style_settings = array(
        'custom_css' => '',
        'image_layout' => 'image-1',
        'chosen_layout' => 'layout-1',
        'chosen_theme' => 'theme-1'
    );
    
    add_option('sola_t_style_settings', $sola_t_style_settings);              
    
    /* Display All Testimonials */
    $sola_t_submit_testimonial = get_page_by_title( __('Our Testimonials', 'sola-testimonials'), OBJECT, 'page' );
    
    if(!$sola_t_submit_testimonial){
    
        $sola_t_page_contents = '[super_t_all_testimonials]';
        
        $sola_t_page = array(
            'post_title'    => __('Our Testimonials', 'sola-testimonials'),
            'post_content'  => $sola_t_page_contents,
            'post_status'   => 'publish',
            'post_author'   => 1,
            'ping_status'   => 'closed',
            'post_type'     => 'page',
            'comment_status'=> 'closed'
        );
        
        wp_insert_post($sola_t_page);
    }
    
    /*
     * Initiates Custom Post Type and Rewrite Flush
     */
    
    sola_t_post_type();

    flush_rewrite_rules();


}
function sola_t_deactivate(){
    /* Silence is Golden */
}

function sola_t_uninstall(){
    /* Silence is Golder */
//    remove_role('testimonial_author');
}

function sola_t_menu(){
    add_submenu_page('edit.php?post_type=testimonials', __('Settings','sola-testimonials'), __('Settings','sola-testimonials'), 'manage_options' , 'sola_t_settings', 'sola_t_settings_page');
    add_submenu_page('edit.php?post_type=testimonials', __('Feedback','sola-testimonials'), __('Feedback','sola-testimonials'), 'manage_options' , 'sola_t_feedback', 'sola_t_feedback_page');
}

function sola_t_admin_scripts(){
    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-ui-core');
    wp_enqueue_script('jquery-ui-tabs');  
    wp_enqueue_script('jquery-ui-dialog');  
    
//    wp_enqueue_script('thickbox');
//    wp_enqueue_script('media-upload');    
    
    wp_register_script('sola-t-general-js', SOLA_T_PLUGIN_DIR.'/js/sola_t.js', 'jquery');
    wp_enqueue_script('sola-t-general-js');
    
    if(!wp_script_is('registered', 'ace')){
        /* Enqueue the script then */
        wp_register_script('ace', SOLA_T_PLUGIN_DIR.'/js/ace/ace.js', 'jquery');
        wp_enqueue_script('ace');
    } else {
        if(!wp_script_is('queue', 'ace')){
            wp_enqueue_script('ace');
        }
    }
    
    if(!wp_script_is('registered', 'ace-theme-twilight')){
        /* Enqueue the script then */
        wp_register_script('ace-theme-twilight', SOLA_T_PLUGIN_DIR.'/js/ace/theme-twilight.js');
        wp_enqueue_script('ace-theme-twilight');
    } else {
        if(!wp_script_is('queue', 'ace-theme-twilight')){
            wp_enqueue_script('ace-theme-twilight');
        }
    }
    
    if(!wp_script_is('registered', 'ace-mode-css')){
        /* Enqueue the script then */
        wp_register_script('ace-mode-css', SOLA_T_PLUGIN_DIR.'/js/ace/mode-css.js');
        wp_enqueue_script('ace-mode-css');
    } else {
        if(!wp_script_is('queue', 'ace-mode-css')){
            wp_enqueue_script('ace-mode-css');
        }
    }
    
    if(!wp_script_is('registered', 'jquery-ace')){
        /* Enqueue the script then */
        wp_register_script('jquery-ace', SOLA_T_PLUGIN_DIR.'/js/jquery-ace.js');
        wp_enqueue_script('jquery-ace');
    } else {
        if(!wp_script_is('queue', 'jquery-ace')){
            wp_enqueue_script('jquery-ace');
        }
    }                    
}

function sola_t_admin_styles(){
    /* Settings and Feedback pages for if statement */
    $pages = array('sola_t_settings', 'sola_t_feedback');

    /* Check if user is viewing our admin pages */
    if((!empty($_GET['page']) && in_array($_GET['page'], $pages)) || (!empty('sola_t_subm_forms' === get_post_type())) || (!empty('testimonials' === get_post_type())) || (isset($_GET['taxonomy']) && $_GET['taxonomy'] === 'sola_t_categories') ){
        wp_enqueue_style('thickbox');
    
        wp_register_style('sola-t-jquery-ui-css', SOLA_T_PLUGIN_DIR.'/css/jquery-ui.css');
        wp_enqueue_style('sola-t-jquery-ui-css');
    
        wp_register_style('sola-t-jquery-css', SOLA_T_PLUGIN_DIR.'/css/jquery-ui.theme.min.css');
        wp_enqueue_style('sola-t-jquery-css');
        
        wp_register_style('sola-t-custom-admin-css', SOLA_T_PLUGIN_DIR.'/css/custom-admin.css');
        wp_enqueue_style('sola-t-custom-admin-css');
       }
}

function sola_t_front_end_styles(){
    wp_register_style('sola-t-layout-css', SOLA_T_PLUGIN_DIR.'/css/layouts.css');
    wp_enqueue_style('sola-t-layout-css');

    wp_register_style('sola-t-theme-css', SOLA_T_PLUGIN_DIR.'/css/themes.css');
    wp_enqueue_style('sola-t-theme-css');


}

function sola_t_front_end_scripts(){
    wp_enqueue_script('jquery');
    global $sola_t_version;
    
    wp_register_script('sola-t-form-validation', SOLA_T_PLUGIN_DIR.'/js/jquery.form-validator.min.js', array('jquery'), $sola_t_version);
    wp_enqueue_script('sola-t-form-validation');
    
    wp_register_script('sola-t-front-end-js', SOLA_T_PLUGIN_DIR.'/js/sola_t_frontend.js', array('jquery'), $sola_t_version);

    wp_localize_script( 'sola-t-front-end-js', 'sola_t_security', 'x' );
    wp_localize_script( 'sola-t-front-end-js', 'sola_t_ajaxurl', admin_url('admin-ajax.php') );

    wp_enqueue_script('sola-t-front-end-js');
    
    wp_register_script('imgLiquid', SOLA_T_PLUGIN_DIR.'/js/imgLiquid-min.js', array('jquery'), $sola_t_version);
    wp_enqueue_script('imgLiquid');
    
    if(!wp_script_is('registered', 'jquery-matchHeight')){
        /* Enqueue the script then */
        wp_register_script('jquery-matchHeight', SOLA_T_PLUGIN_DIR.'/js/jquery.matchHeight-min.js');
        wp_enqueue_script('jquery-matchHeight');
    } else {
        if(!wp_script_is('queue', 'jquery-matchHeight')){
            wp_enqueue_script('jquery-matchHeight');
        }
    }    
    
}

function sola_t_settings_page(){
    /*
    if (isset($_GET['page']) && $_GET['page'] == "sola_t_settings" && isset($_GET['action']) && $_GET['action'] == "welcome_page") {
        include('includes/welcome-page.php');
    } else {
        sola_t_save_options();
        include 'includes/settings.php';
    }
    */

    sola_t_save_options();

    if(function_exists('sola_t_pro_activate')){
        sola_t_save_pro_settings();
    }
    include 'includes/settings.php';
    
}

function sola_t_feedback_page(){
    include 'includes/feedback.php';
}

add_action('rest_api_init', 'sola_t_rest_routes_init');

function sola_t_rest_routes_init() {

    register_rest_route('sola_t/v1','/get_all_testimonials', array(
                        'methods' => 'GET, POST',
                        'callback' => 'sola_t_get_testimonials_rest',
                        'permission_callback' => '__return_true',
    ));

}

function sola_t_get_testimonials_rest( WP_REST_Request $data ) {

    $return_array = array();

    if( isset( $data ) ){

        if( isset( $data['token'] ) ){

            if( $data['token'] == get_option('sola_t_token') ){

                $args = array( 
                     'post_type' => 'Testimonials',
                     'posts_per_page' => -1                    
                );

                $the_query = new WP_Query( $args );

                $testimonial_array = array();

                if ( $the_query->have_posts() ) {

                    while ( $the_query->have_posts() ) {

                        $the_query->the_post();

                        $testimonial_array[] = array(
                            'title' => get_the_title(),
                            'content' => get_the_content()
                        );
                    }
                    wp_reset_postdata();
                } 
                $return_array['response'] = "Testimonials returned successfully";
                $return_array['code'] = "200";
                $return_array['data'] = array( $testimonial_array );

            } else {

                $return_array['response'] = "Secret token is invalid";
                $return_array['code'] = "401";

            }

        } else {

            $return_array['response'] = "No 'security' found";
            $return_array['code'] = "401";

        }

    } else{

        $return_array['response'] = "No request data found";
        $return_array['code'] = "400";

    }

    return $return_array;
}

function sola_t_post_type() {
    $labels = array(
        'name'               => __('Testimonials', 'sola-testimonials' ),
        'singular_name'      => __('Testimonial', 'sola-testimonials' ),
        'menu_name'          => __('Testimonials', 'sola-testimonials' ),
        'name_admin_bar'     => __('Testimonials', 'sola-testimonials' ),
        'add_new'            => __('Add New', 'sola-testimonials' ),
        'add_new_item'       => __('Add New Testimonial', 'sola-testimonials' ),
        'new_item'           => __('New Testimonial', 'sola-testimonials' ),
        'edit_item'          => __('Edit Testimonial', 'sola-testimonials' ),
        'view_item'          => __('View Testimonial', 'sola-testimonials' ),
        'all_items'          => __('All Testimonials', 'sola-testimonials' ),
        'search_items'       => __('Search Testimonials', 'sola-testimonials' ),
        'parent_item_colon'  => __('Parent Testimonials:', 'sola-testimonials' ),
        'not_found'          => __('No testimonials Found.', 'sola-testimonials' ),
        'not_found_in_trash' => __('No testimonials Found In Trash.', 'sola-testimonials' )
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'testimonials' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_icon'          => 'dashicons-testimonial',
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'thumbnail'),
     
    );

    register_post_type( 'Testimonials', $args ); 
}


function sola_t_read_more($more) {
    $options = get_option('sola_t_options_settings');
    $link = $options['read_more_link'];
    

    if (get_post_type() == "testimonials") {
        if(isset($link) && $link != ""){
            $more = "... <a class=\"read-more\" href=\"".get_permalink(get_the_ID())."\">$link</a>";
        } else {
            $more =  "... <a class=\"read-more\" href=\"".get_permalink(get_the_ID())."\">".__("Read More", "sola-testimonials")."</a>";
        }
    }
    return $more;
}

function sola_t_meta_box() {
    add_meta_box( 
        'sola_t_testimonial_meta_data',
        __('Testimonial Data', 'sola-testimonials'),
        'sola_t_meta_box_contents',
        'testimonials',
        'normal',
        'high'            
    );
}

function sola_t_meta_box_contents(){
    
    global $post;
    global $post_id;

    
    ?>

<table class="form-table">
    <tr>
        <th><label for="sola_t_user_name"><?php _e('User Name', 'sola-testimonials'); ?></label></th>
        <td>        
            <input class="sola_input" type="text" name="sola_t_user_name" value="<?php if($sola_t_user_name = get_post_meta($post_id, 'sola_t_user_name')){ echo esc_attr($sola_t_user_name[0]); } ?>" placeholder="<?php _e('User Name', 'sola-testimonials'); ?>"/>    
        </td>
    </tr>
    <tr>
        <th><label for="sola_t_image_url"><?php _e('User Email Address', 'sola-testimonials'); ?></label></th>
        <td>
            <input class="sola_input" type="text" name="sola_t_user_email" value="<?php if($sola_t_user_email = get_post_meta($post_id, 'sola_t_user_email')){ echo esc_attr($sola_t_user_email[0]); } ?>" placeholder="<?php _e('User Email Address', 'sola-testimonials'); ?>"/>            
            <div class="description">
                <p><?php _e('The users email address will be used to show their gravatar image. To use a custom image, leave this field blank and enter an Image URL below. ', 'sola-testimonials'); ?>
            </div>
        </td>        
    </tr>
    <tr>
        <th><label for="sola_t_image_url"><?php _e('Image URL', 'sola-testimonials'); ?></label></th>
        <td>
            <input class="sola_input" type="text" name="sola_t_image_url" id="sola_t_user_upload_image" value="<?php if($sola_t_image_url = get_post_meta($post_id, 'sola_t_image_url')){ echo esc_url($sola_t_image_url[0]); } ?>" placeholder="<?php _e('Image URL', 'sola-testimonials'); ?>"/>
            <div class="description">
                <p><?php _e('Leave this field blank to use the gravatar image of the author. The User Image (Right) will override this option.', 'sola-testimonials'); ?>
            </div>
        </td>
    </tr>
    <tr>
        <th><label for="sola_t_website_name"><?php _e('Website Name', 'sola-testimonials'); ?></label>
        <td>
            <input class="sola_input" type="text" name="sola_t_website_name" value="<?php if($sola_t_website_name = get_post_meta($post_id, 'sola_t_website_name')){ echo esc_attr($sola_t_website_name[0]); } ?>" placeholder="<?php _e('User Website Name', 'sola-testimonials'); ?>"/>
        </td>        
    </tr>
    <tr>
        <th><label for="sola_t_website_address"><?php _e('Website Address', 'sola-testimonials'); ?></label></th>
        <td>
            <input class="sola_input" type="text" name="sola_t_website_address" value="<?php if($sola_t_website_address_sanitized = get_post_meta($post_id, 'sola_t_website_address')){ echo esc_url($sola_t_website_address_sanitized[0]); } ?>" placeholder="<?php _e('User Web Address', 'sola-testimonials'); ?>"/>
        </td>
    </tr>
    <?php if(function_exists('sola_t_pro_activate')){ ?>
        <?php
        
        global $sola_t_pro_version;
        if($sola_t_pro_version <= "1.2"){
        ?>
         <tr>
            <th><label for="sola_t_rating"><?php _e('Rating', 'sola-testimonials'); ?></label></th>
            <td>
                <p><?php _e('Please update to the latest version of Super Testimonials Pro to take advantage of star ratings', 'sola-testimonials'); ?>
            </td>
        </tr>
        <?php
        } else {
        ?>
        <tr>
            <th><label for="sola_t_rating"><?php _e('Rating', 'sola-testimonials'); ?></label></th>
            <td>
                
                <?php 
                $sola_t_rating_value = get_post_meta($post_id, 'sola_t_rating', true);
                if($sola_t_rating_value){
                    $sola_t_rating_value = $sola_t_rating_value;
                } else {
                    $sola_t_rating_value = 0;
                }
                ?>
                <script>
                    jQuery(document).ready(function(){
                        jQuery('#sola_t_rating_container').raty({
                            score: <?php echo $sola_t_rating_value; ?>,
                            click: function(score, evt) {
                                jQuery("#sola_t_rating").val(score);
                            }
                        });
                    });
                </script>                
                <div id="sola_t_rating_container"></div>                
                <input class="sola_input" type="hidden" name="sola_t_rating" id="sola_t_rating" value="<?php echo esc_attr($sola_t_rating_value); ?>" />
            </td>
        </tr>
    <?php } } else { ?>
        <tr>
            <th><label for="sola_t_rating"><?php _e('Rating', 'sola-testimonials'); ?></label></th>
            <td>
                <?php $pro_link = "<a href=\"https://codecabin.io/store/super-testimonials-pro/?utm_source=plugin&utm_medium=link&utm_campaign=super_t_add_rating\" target=\"_BLANK\">".__('Premium Version', 'sola-testimonials')."</a>"; ?>
                <p><?php _e("Star Ratings are only available in the $pro_link", 'sola-testimonials'); ?>
            </td>
        </tr>
    <?php } ?>
    <tr>
        <th><label><?php _e('Shortcode', 'sola-testimonials'); ?></label></th>
        <td>
            <input class="sola_input" type="text" readonly name="sola_t_single_shortcode" value="<?php echo esc_attr('[super_testimonial id='.$post->ID.']'); ?>" />
        </td>
    </tr>
    
</table>
          
    <?php
}

function sola_t_save_testimonial_meta($post_id) {

    if ( SOLA_T_PLUGIN_NAME != isset($_POST['post_type'])){
        return;
    }
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
        return; 
    }
    if( !current_user_can( 'edit_post', $post_id ) ){
        return;  
    }
    
    $sola_t_username_sanitized = sanitize_text_field( $_REQUEST['sola_t_user_name'] );
    if(isset($sola_t_username_sanitized)){
        update_post_meta( $post_id, 'sola_t_user_name', $sola_t_username_sanitized );
    }

    $sola_t_website_name_sanitized = sanitize_text_field( $_REQUEST['sola_t_website_name'] );
    if(isset($sola_t_website_name_sanitized)){
        update_post_meta( $post_id, 'sola_t_website_name', $sola_t_website_name_sanitized );
    }

    $sola_t_website_address_sanitized = esc_url_raw( $_REQUEST['sola_t_website_address'] );
    if(isset($sola_t_website_address_sanitized)){
        if(($sola_t_website_address_sanitized) == ''){
            update_post_meta( $post_id, 'sola_t_website_address', '');
        } elseif ((substr($sola_t_website_address_sanitized, 0, 7) != 'http://') && (substr($sola_t_website_address_sanitized, 0, 8) != 'https://')){
            update_post_meta( $post_id, 'sola_t_website_address', 'https://'.$sola_t_website_address_sanitized );
        } else {
            update_post_meta( $post_id, 'sola_t_website_address', $sola_t_website_address_sanitized );
        }
    }
    
    $sola_t_image_url_sanitized = esc_url_raw( $_REQUEST['sola_t_image_url'] );
    if(isset($sola_t_image_url_sanitized)){
        update_post_meta( $post_id, 'sola_t_image_url', $sola_t_image_url_sanitized );
    }
    
    $sola_t_user_email_sanitized = sanitize_email( $_REQUEST['sola_t_user_email'] );
    if(isset($sola_t_user_email_sanitized)){
        update_post_meta( $post_id, 'sola_t_user_email', $sola_t_user_email_sanitized );
    }
    
    $sola_t_rating_sanitized = sanitize_text_field( $_REQUEST['sola_t_rating'] );
    if(isset($sola_t_rating_sanitized)){
        update_post_meta( $post_id, 'sola_t_rating', $sola_t_rating_sanitized );
    }
    
    $sola_t_submit_status_sanitized = sanitize_text_field( $_REQUEST['sola_t_submit_status'] );
    if( isset($sola_t_submit_status_sanitized) ){
        update_post_meta ($post_id, '_sola_t_status', $sola_t_submit_status_sanitized );
    }
    
}

function sola_t_side_meta_box() {
    add_meta_box( 
        'sola_t_testimonial_meta_side_data',
        __('Testimonial Status', 'sola-testimonials'),
        'sola_t_side_meta_box_contents',
        'testimonials',
        'side',
        'high'            
    );
}

function sola_t_side_meta_box_contents(){
    global $post_id;
    $post_meta = get_post_meta($post_id, '_sola_t_status');
    if(isset($post_meta[0]) && $post_meta[0] == 0){ $selected0 = "selected"; } else { $selected0 = ""; }
    if(isset($post_meta[0]) && $post_meta[0] == 1){ $selected1 = "selected"; } else { $selected1 = ""; }
    
    $content = "
        <table class=\"form-table\">
            <tr>
                <th>
                ".__('Status', 'sola-testimonials')."
                </th>
                <td>
                    <select name=\"sola_t_submit_status\" >
                        <option value=\"0\" $selected0>".__('Pending Approval', 'sola-testimonials')."</option>
                        <option value=\"1\" $selected1>".__('Approved', 'sola-testimonials')."</option>
                    </select>
                </td>
            </tr>
        </table>
        ";
    
    echo $content;
}

function sola_t_columns($columns) {
    
    $new_columns = array(
        'sola_t_user_name' => __('User Name', 'sola-testimonials'),
        'sola_t_website_name' => __('Website Name', 'sola-testimonials'),
        'sola_t_website_address' => __('Website Address', 'sola-testimonials'),
        'sola_t_status' => __('Status', 'sola-testimonials'),
        'sola_t_rating' => __('Rating', 'sola-testimonials'),
        'sola_t_single_shortcode' => __('Shortcode', 'sola-testimonials')
    );
    return array_merge($columns, $new_columns);
}

function sola_t_populate_columns($column) {
    global $post;
    
    if ( 'sola_t_user_name' == $column ) {
        $sola_t_user_title = get_post_meta( get_the_ID(), 'sola_t_user_name', true );
        echo esc_attr($sola_t_user_title);
        
    } else if ( 'sola_t_website_name' == $column ) {
        $sola_t_website_name = get_post_meta( get_the_ID(), 'sola_t_website_name', true );
        echo esc_attr($sola_t_website_name);
        
    } else if ( 'sola_t_website_address' == $column ) {
        $sola_t_website_address_sanitized = esc_url_raw( get_post_meta( get_the_ID(), 'sola_t_website_address', true ) );
        echo '<a href="http://'.$sola_t_website_address_sanitized.'" target="_BLANK">'.$sola_t_website_address_sanitized.'</a>';
    } else if ('sola_t_status' == $column){
        $sola_t_status = get_post_meta( get_the_ID(), '_sola_t_status', true );   
        if($sola_t_status == 1){
            $status = __('Approved', 'sola-testimonials');
        } else {
            $status = __('Pending Approval', 'sola-testimonials');
        }
        echo $status;
    } else if ('sola_t_rating' == $column){
        $sola_t_status = intval(get_post_meta( get_the_ID(), 'sola_t_rating', true ));
        echo $sola_t_status;
    }else if ( 'sola_t_single_shortcode' == $column ) {
        echo '[super_testimonial id='. intval($post->ID).']';
    }
    
}

function sola_t_admin_head(){
    if (isset($_POST['sola_t_send_feedback'])) {
        $nonceKey = 'sola_feedback_nonce';
        if(!wp_verify_nonce($_POST[$nonceKey], $nonceKey)){
            wp_die( __("Execution has been stopped!", 'sola-testimonials') );
        }

        $sola_t_feedback_email_sanitized = sanitize_email($_POST['sola_t_feedback_email']);
        $headers_mail = 'From: '.$sola_t_feedback_email_sanitized.' < '.$sola_t_feedback_email_sanitized.' >' ."\r\n";
        if(wp_mail("support@codecabin.co.za", "Plugin feedback", 
                "Name: ". sanitize_text_field($_POST['sola_t_feedback_name']) ."\n\r".
                "Email: ". sanitize_email($_POST['sola_t_feedback_email']) ."\n\r".
                "Website: ". esc_url_raw($_POST['sola_t_feedback_website']) ."\n\r".
                "Feedback:". sanitize_textarea_field($_POST['sola_t_feedback_feedback'])."\n\r
                Sent from Super Testimonials", $headers_mail)){
            echo "<div id=\"message\" class=\"updated\"><p>".__("Thank you for your feedback. We will be in touch soon","sola-testimonials")."</p></div>";
        } else {
            $request_url = "http://www.solaplugins.com/apif-testimonials/rec.php";
            $body = array(
                'name' => sanitize_text_field($_POST['sola_t_feedback_name']),
                'email' => sanitize_email($_POST['sola_t_feedback_email']),
                'website' => esc_url_raw($_POST['sola_t_feedback_website']),
                'feedback' => sanitize_textarea_field($_POST['sola_t_feedback_feedback'])
            );

            $args = array(
                'body' => $body
            );

            $result = wp_remote_post($request_url, $args);
            $http_code = wp_remote_retrieve_response_code( $result );
            
            if ($http_code === 200){
                echo "<div id=\"message\" class=\"updated\"><p>".__("Thank you for your feedback. We will be in touch soon","sola-testimonials")."</p></div>";
            } else {
                echo "<div id=\"message\" class=\"error\">";
                echo "<p>".__("There was a problem sending your feedback. Please log your feedback on ","sola-testimonials")."<a href='http://codecabin.io/store/support/' target='_BLANK'>http://codecabin.io/store/support/</a></p>";
                echo "</div>";
            }
        }
    }
} 

function sola_t_user_head(){
    
    $style_options = get_option('sola_t_style_settings');
    if(isset($style_options['custom_css']) && $style_options['custom_css'] != ""){
        $custom_css = "
            <!-- Super Testimonials Custom CSS -->
            <style type=\"text/css\">".
                $style_options['custom_css']
            ."</style>
            ";
        echo ($custom_css);
    }        
                
}

/* Save Options */
function sola_t_save_options(){   
    if (isset($_POST['sola_t_save_options'])){
        
        $nonceKey = 'sola_settings_options_nonce';
        if(!wp_verify_nonce($_POST[$nonceKey], $nonceKey)){
            wp_die( __("Execution has been stopped!", 'sola-testimonials') );
        }

        if(function_exists('sola_t_pro_activate')){
            if(function_exists('sola_t_pro_save_options')){
                sola_t_pro_save_options();
            }
        } else {
        
            extract($_POST);

            $sola_t_saved_forms = array();

            $sola_t_show_title_sanitized = sanitize_text_field($sola_t_show_title);
            $sola_t_show_excerpt_sanitized = sanitize_text_field($sola_t_show_excerpt);
            $sola_t_image_size_sanitized = sanitize_text_field($sola_t_image_size);
            $sola_t_except_length_sanitized = sanitize_text_field($sola_t_except_length);
            $sola_t_read_more_link_sanitized = sanitize_text_field($sola_t_read_more_link);
            $sola_t_show_user_name_sanitized = sanitize_text_field($sola_t_show_user_name);
            $sola_t_show_web_sanitized = sanitize_text_field($sola_t_show_web);
            $sola_t_show_image_sanitized = sanitize_text_field($sola_t_show_image);
            $sola_t_allow_html_sanitized = sanitize_text_field($sola_t_allow_html);
            $sola_t_content_type_sanitized = sanitize_text_field($sola_t_content_type);
            $sola_st_strip_links_sanitized = sanitize_text_field($sola_st_strip_links);
            $sola_t_allow_nofollow_sanitized = sanitize_text_field($sola_t_allow_nofollow);

            if(isset($sola_t_show_title_sanitized)){ $sola_t_saved_forms['show_title'] = $sola_t_show_title_sanitized; } else { $sola_t_saved_forms['show_title'] = ''; }
            if(isset($sola_t_show_excerpt_sanitized)){ $sola_t_saved_forms['show_excerpt'] = $sola_t_show_excerpt_sanitized; } else { $sola_t_saved_forms['show_excerpt'] = ''; }
            if(isset($sola_t_image_size_sanitized)){ $sola_t_saved_forms['image_size'] = $sola_t_image_size_sanitized; } else { $sola_t_saved_forms['image_size'] = '120'; }
            if(isset($sola_t_except_length_sanitized) && $sola_t_except_length_sanitized != ""){ $sola_t_saved_forms['excerpt_length'] = $sola_t_except_length_sanitized; } else { $sola_t_saved_forms['excerpt_length'] = 20; }
            if(isset($sola_t_read_more_link_sanitized) && $sola_t_read_more_link_sanitized != ""){ $sola_t_saved_forms['read_more_link'] = $sola_t_read_more_link_sanitized; } else { $sola_t_saved_forms['read_more_link'] = __('Read More', 'sola-testimonials'); }
            if(isset($sola_t_show_user_name_sanitized)){ $sola_t_saved_forms['show_user_name'] = $sola_t_show_user_name_sanitized; } else { $sola_t_saved_forms['show_user_name'] = ''; }
            if(isset($sola_t_show_web_sanitized)){ $sola_t_saved_forms['show_user_web'] = $sola_t_show_web_sanitized; } else { $sola_t_saved_forms['show_user_web'] = ''; }
            if(isset($sola_t_show_image_sanitized)){ $sola_t_saved_forms['show_image'] = $sola_t_show_image_sanitized; } else { $sola_t_saved_forms['show_image'] = ''; }
            if(isset($sola_t_allow_html_sanitized)){ $sola_t_saved_forms['sola_t_allow_html'] = $sola_t_allow_html_sanitized; } else { $sola_t_saved_forms['sola_t_allow_html'] = ''; }        
            if(isset($sola_t_content_type_sanitized)){ $sola_t_saved_forms['sola_t_content_type'] = $sola_t_content_type_sanitized; } else { $sola_t_saved_forms['sola_t_content_type'] = 0; }
            if(isset($sola_st_strip_links_sanitized)){ $sola_t_saved_forms['sola_st_strip_links'] = $sola_st_strip_links_sanitized; } else { $sola_t_saved_forms['sola_st_strip_links'] = ''; }
            if(isset($sola_t_allow_nofollow_sanitized)){ $sola_t_saved_forms['sola_t_allow_nofollow'] = $sola_t_allow_nofollow_sanitized; } else { $sola_t_saved_forms['sola_t_allow_nofollow'] = ''; }  
            
            $update_form = update_option('sola_t_options_settings', $sola_t_saved_forms);

            if($update_form){
                echo "
                    <div class=\"updated\">
                        <p>".__('Update Successful', 'sola-testimonials')."</p>
                    </div>
                ";
            } else {
                echo "
                    <div class=\"error\">
                        <p>".__('No changes were made', 'sola-testimonials')."</p>
                    </div>
                ";
            }
        }
    } else if(isset($_POST['sola_t_save_style_settings'])){

        $nonceKey = 'sola_settings_styles_nonce';
        if(!wp_verify_nonce($_POST[$nonceKey], $nonceKey)){
            wp_die( __("Execution has been stopped!", 'sola-testimonials') );
        }    

        extract($_POST);
        
        $sola_t_style_settings = array();

        $sola_t_custom_css_sanitized = sanitize_textarea_field($sola_t_custom_css);
        $sola_t_layout_sanitized = sanitize_text_field($sola_t_layout);
        $sola_t_image_layout_sanitized = sanitize_text_field($sola_t_image_layout);
        $sola_t_theme_sanitized = sanitize_text_field($sola_t_theme);
        if(isset($sola_t_custom_css_sanitized) && $sola_t_custom_css_sanitized != ""){ $sola_t_style_settings['custom_css'] =  $sola_t_custom_css_sanitized; } else { $sola_t_style_settings['custom_css'] = ""; }
        if(isset($sola_t_layout_sanitized) && $sola_t_layout_sanitized != ""){ $sola_t_style_settings['chosen_layout'] =  $sola_t_layout_sanitized; } else { $sola_t_style_settings['chosen_layout'] = ""; }
        if(isset($sola_t_image_layout_sanitized) && $sola_t_image_layout_sanitized != ""){ $sola_t_style_settings['image_layout'] =  $sola_t_image_layout_sanitized; } else { $sola_t_style_settings['image_layout'] = ""; }
        if(isset($sola_t_theme_sanitized) && $sola_t_theme_sanitized != ""){ $sola_t_style_settings['chosen_theme'] =  $sola_t_theme_sanitized; } else { $sola_t_style_settings['chosen_theme'] = ""; }
        
        $update_form = update_option('sola_t_style_settings', $sola_t_style_settings);
        
        if($update_form){
            echo "
                <div class=\"updated\">
                    <p>".__('Update Successful', 'sola-testimonials')."</p>
                </div>
            ";
        } else {
            echo "
                <div class=\"error\">
                    <p>".__('No changes were made', 'sola-testimonials')."</p>
                </div>
            ";
        }
    }
}

function sola_t_loop_control( $query ) {

    if (!is_single() && !is_admin()) { 
        if (isset($query->query['post_type']) && $query->query['post_type'] == "Testimonials") {            
            $query->set( 'meta_query', array(
                    array(
                          'key' => '_sola_t_status',
                          'value' => 1
                    )
            ));
        }    
    }
}

function sola_t_featured_user_image() {
    remove_meta_box('postimagediv', 'testimonials', 'side');
    add_meta_box('postimagediv', __('User Image', 'sola-testimonials'), 'post_thumbnail_meta_box', 'testimonials', 'side');
}

function sola_t_custom_excerpt($text) {
    $options = get_option('sola_t_options_settings');
        
    if(isset($options['excerpt_length'])) { $length = intval($options['excerpt_length']); } else { $length = 120; }

    if(isset($options['sola_t_allow_html']) && $options['sola_t_allow_html'] == 1) { $sola_t_allow_html = 1; } else { $sola_t_allow_html = 0; }
    
    $raw_excerpt = $text;
    
    if ( '' == $text ) {
        $text = get_the_content('');
 
        $text = strip_shortcodes( $text );

        $text = apply_filters('the_content', $text);
        
        if(!$sola_t_allow_html){
            $text = strip_tags($text);
        }

        $excerpt_length = apply_filters('excerpt_length', $length);

        $excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');

        $excerpt_regular_expression = '/(<a.*?a>)|\n|\r|\t|\s/';
        $words = preg_split( $excerpt_regular_expression, $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY|PREG_SPLIT_DELIM_CAPTURE );
        

        if( count($words) > $excerpt_length ){          //Check if longer than it should be
            while( count($words) > $excerpt_length ){   //While longer than than it should be
                array_pop($words);                      //Pop one off the end
            }
        
            $text = implode(' ', $words);               //Create excerpt with spaces
            $text .= $excerpt_more;                     //Add excerpt_more value
        } else{
            $text = implode(' ', $words);               //Create excerpt with spaces
        }
    }
    return apply_filters('new_wp_trim_excerpt', $text, $raw_excerpt);
}

function sola_t_is_secure() {
    return (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443;
}

add_shortcode( 'sola_testimonials_count', 'sola_t_return_testimonial_count' );

// New Super Shortcodes
add_shortcode( 'super_testimonials_count', 'sola_t_return_testimonial_count' );

function sola_t_return_testimonial_count( $atts ){    

    remove_filter( 'pre_get_posts', 'sola_t_loop_control', 10 );

    if( isset( $atts['type'] ) ){
        
        if( $atts['type'] == 'all' ){
            $args = array(
                'post_type' => 'Testimonials',            
                'meta_query' => array(
                    array(
                        'key'     => '_sola_t_status',
                        'value'   => null,
                        'compare' => '!=',
                    ),
                )            
            );
        } else if( $atts['type'] == 'approved' ){
            $args = array(
                'post_type' => 'Testimonials',            
                'meta_query' => array(
                    array(
                        'key'     => '_sola_t_status',
                        'value'   => 1,
                        'compare' => '==',
                    ),
                )            
            );
        } else if( $atts['type'] == 'pending' ){
            $args = array(
                'post_type' => 'Testimonials',            
                'meta_query' => array(
                    array(
                        'key'     => '_sola_t_status',
                        'value'   => 0,
                        'compare' => '==',
                    ),
                )            
            );
        } else {
            $args = array(
                'post_type' => 'Testimonials',            
                'meta_query' => array(
                    array(
                        'key'     => '_sola_t_status',
                        'value'   => null,
                        'compare' => '!=',
                    ),
                )            
            );
        }

        $my_query = new WP_Query( $args );               

        $post_count = $my_query->found_posts;

        return number_format( $post_count );

    }

}

