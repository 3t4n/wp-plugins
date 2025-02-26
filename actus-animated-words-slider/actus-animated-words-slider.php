<?php
/**
 * 
 * @package     Actus_Animated_Words_Slider
 *
 * Plugin Name: ACTUS Animated Words Slider
 * Plugin URI:  http://wp.actus.works/actus-animated-words-slider/
 * Description: An image slider with a unique effect..
 * Version:     1.2.3
 * Author:      Stelios Ignatiadis
 * Author URI:  http://wp.actus.works/
 * Text Domain: actus-aaws
 * License: GPL-2.0+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


/** 
 * Define Path Constants
 *
 * @since 0.1.0
 * @constant string ACTUS_THEME_DIR    Directory of the current Theme.
 * @constant string ACTUS_AAWS_NAME    Plugin Basename.
 * @constant string ACTUS_AAWS_DIR     Directory of the Plugin.
 * @constant string ACTUS_AAWS_DIR     URL of the Plugin.
 * @constant string ACTUS_AAWS_VERSION Plugin Version.
 */
function actus_aaws_define_constants() {
    if ( ! defined( 'ACTUS_AAWS_NAME' ) ) {
        define( 'ACTUS_AAWS_NAME', trim( dirname( plugin_basename(__FILE__) ), '/') );
    }
    if ( ! defined( 'ACTUS_AAWS_DIR' ) ) {
        define( 'ACTUS_AAWS_DIR', plugin_dir_path( __FILE__ ) );
    }
    if ( ! defined( 'ACTUS_AAWS_URL' ) ) {
        define( 'ACTUS_AAWS_URL', plugin_dir_url( __FILE__ ) );
    }
    if ( ! defined( 'ACTUS_AAWS_VERSION' ) ) {
        define( 'ACTUS_AAWS_VERSION', '1.2.3' );
    }
}
actus_aaws_define_constants();


// INCLUDE THE FILE THAT DEFINES VARIABLES AND DEFAULTS
require_once ACTUS_AAWS_DIR . '/includes/actus-aaws-variables.php';




// INITIALIZE
add_action( 'init', 'actus_aaws_init' );
add_action( 'current_screen', 'actus_aaws_admin' );




/* ********************************************************************* */
/* *********************************************************** FUNCTIONS */
/* ********************************************************************* */


/**
 * Plugin Initialization.
 *
 * Reads the options from database
 *
 * @global   array  $actus_anit_options        Array of plugin options.
 * @global   array  $actus_anit_default_terms  Array of default terms.
 *
 * @constant string ACTUS_AAWS_DIR             Directory of the Plugin.
 * @constant string ACTUS_AAWS_VERSION         Plugin Version.
 */
function actus_aaws_init() {
    
    
    update_option( 'ACTUS_AAWS_VERSION',    ACTUS_AAWS_VERSION );
    require_once ACTUS_AAWS_DIR . '/includes/actus-aaws-functions.php';
    
    // The Administration Options.
    if ( is_admin() ) {
        require_once ACTUS_AAWS_DIR . '/includes/actus-aaws-admin.php';
        require_once ACTUS_AAWS_DIR . '/includes/actus-aaws-edit.php';
    }

    add_shortcode( 'actus-awslider', 'actus_aaws_shortcode_start' );
} 




 
/**
 * Slider start.
 *
 * Initializes values and starts the slider animation.
 *
 * @since 0.1.0
 * @variable  array  $tmp_load_value                 Temporary holds the option data.
 * @variable  string $actus_aaws_slider_options_str  Temporary holds the option data.
 * @variable  array  $actus_aaws_params              Parameters to send to the script.
 *
 * @global    array  $actus_aaws_slider_options      The options for the slider animation.
 * @global    array  $actus_aaws_shortcode           The options of the slider shortcode.
 * @global    string $actus_aaws_outer_id            The id of the outer frame of the slider.
 * @global    int    $post_id                        The id of the current post or page.
 * @global    int    $post                           The current post.
 *
 * @constant  string ACTUS_AAWS_URL                  URL of the Plugin.
 */
function actus_aaws_start_slider( ) {
    global  $actus_aaws_slider_options,
            $actus_aaws_shortcode,
            $actus_aaws_outer_id,
            $post_id,
            $post;
    // Get post or page ID.
    $post_id = 0;
	if ( isset( $post->ID ) )         $post_id = $post->ID;
	if ( isset( $_GET['post'] ) )  $post_id = intval( $_GET['post'] );
	if ( isset( $_POST['post_ID'] ) ) $post_id = intval( $_POST['post_ID'] );
	if ( isset( $_GET['post_ID'] ) )  $post_id = intval( $_GET['post_ID'] );

	
    // Replace defaults with saved values if they exist.
    $tmp_load_value = get_post_meta( $post_id, 'actus_aaws_slider_options' );
    if ( $tmp_load_value != null ) {
        $actus_aaws_slider_options_str = $tmp_load_value[ 0 ];
        $actus_aaws_slider_options = json_decode( $actus_aaws_slider_options_str, true );
    }
	
    // Override options with shortcode parameters if they exist.
	if ( isset($actus_aaws_shortcode[ 'height' ]) )
    if ( $actus_aaws_shortcode[ 'height' ] > 0 ) {
        $actus_aaws_slider_options[ 'height' ] = $actus_aaws_shortcode[ 'height' ];
    }
	if ( isset($actus_aaws_shortcode[ 'density' ]) )
    if ( $actus_aaws_shortcode[ 'density' ] > 0 ) {
        $actus_aaws_slider_options[ 'density' ] = $actus_aaws_shortcode[ 'density' ];
    }
	if ( isset($actus_aaws_shortcode[ 'speed' ]) )
    if ( $actus_aaws_shortcode[ 'speed' ] > 0 ) {
        $actus_aaws_slider_options[ 'speed' ] = $actus_aaws_shortcode[ 'speed' ];
    }
	if ( isset($actus_aaws_shortcode[ 'words' ]) )
    if ( $actus_aaws_shortcode[ 'words' ] == 'off' ) {
        $actus_aaws_slider_options[ 'wordsStatus' ] = 0;
    }
	if ( isset($actus_aaws_shortcode[ 'target' ]) )
    $actus_aaws_slider_options[ 'target' ]   = $actus_aaws_shortcode[ 'target' ];
	if ( isset($actus_aaws_shortcode[ 'position' ]) )
    $actus_aaws_slider_options[ 'position' ] = $actus_aaws_shortcode[ 'position' ];
    
    // Enque styles and scripts
    wp_enqueue_style( 
        'actus-aaws-styles',
        ACTUS_AAWS_URL . 'css/actus-aaws.css',
        false, ACTUS_AAWS_VERSION, 'all'
    );
            
    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-ui-core');
    wp_enqueue_script('jquery-ui-sortable');
    
    wp_enqueue_script(
        'velocity',
        ACTUS_AAWS_URL . 'js/velocity.min.js',
        array( 'jquery' ), '0.1.0', true );


    wp_enqueue_script(
        'actus-aaws-script',
        ACTUS_AAWS_URL . 'js/actus-aaws-scripts.js',
        array( 'jquery', 'jquery-ui-sortable', 'velocity' ), ACTUS_AAWS_VERSION, true ); 
    
    // Send parameters to scripts
    $actus_aaws_params = array(
        'post_id'    => $post_id,
        'slider_opt' => $actus_aaws_slider_options,
        'outer_id'   => $actus_aaws_outer_id,
        'plugin_dir' => ACTUS_AAWS_URL
    );
    wp_localize_script(
        'actus-aaws-script',
        'actusAawsParams', $actus_aaws_params );
}



/**
 * Slider Administration.
 *
 * Initializes values and starts the slider administration.
 *
 * @since 0.1.0
 * @variable  string $post_content             The content of your post.
 * @variable  array  $post_tags                The tags of your post.
 * @variable  array  $post_tag                 Tag value in iteration.
 * @variable  array  $actus_aaws_params_admin  Parameters to send to the script.
 * @variable  string $actus_aaws_slider_options_str  Temporary holds the option data.
 *
 * @global    array  $actus_aaws_options       The slider administgration options.
 * @global    array  $actus_excluded_words     Words that will be excluded from words selection.
 * @global    string $actus_symbols            Symbols that will be excluded from words selection.
 * @global    string $actus_nonce              Nonce for the administration.
 * @global    int    $post_id                  The id of the current post or page.
 *
 * @constant  string ACTUS_AAWS_DIR            URL of the Plugin.
 * @constant  string ACTUS_AAWS_VERSION        Plugin Version.
 */
function actus_aaws_admin() {
    global  $actus_aaws_options,
            $actus_aaws_slider_options,
            $actus_excluded_words,
            $actus_symbols,
            $actus_nonce,
            $post_id;
    
     
    // ENQUE SCRIPTS FOR POST EDIT OR ADD
    if ( is_admin() && isset( get_current_screen()->id ) ) {
        if ( get_current_screen()->id == "post" || get_current_screen()->id == "page"  ) {
			
            $post_id = 0;
			if ( isset( $_POST['post'] ) )
				$post_id = intval( $_POST['post'] );
			if ( isset( $_GET['post'] ) )
				$post_id = intval( $_GET['post'] );
				     
			// Get post or page ID.
			$post_id = 0;
			if ( isset( $post->ID ) )         $post_id = $post->ID;
			if ( isset( $_GET['post'] ) )     $post_id = intval( $_GET['post'] );
			if ( isset( $_POST['post_ID'] ) ) $post_id = intval( $_POST['post_ID'] );
			if ( isset( $_GET['post_ID'] ) )  $post_id = intval( $_GET['post_ID'] );

			
			// Start the slider animation (initializes the slider options and functions)
			actus_aaws_start_slider();
            
   
            // Read post content and tags
            $post_content  = get_post_field( 'post_title', $post_id );         $post_content .= ' ' . get_post_field( 'post_content', $post_id );
            $post_content  = wp_strip_all_tags( $post_content );
            $post_tags     = get_the_tags( $post_id );
			
			
            // Read saved options and words
            $actus_aaws_options_str = get_post_meta( $post_id, 'actus_aaws_options' );
            if ( $actus_aaws_options_str != null ) {
                $actus_aaws_options = json_decode( $actus_aaws_options_str[ 0 ], true );
            }
			
			
			
            $actus_aaws_options[ 'tags' ] = '';
			if ( isset($post_tags) ) {
			if ( is_array($post_tags) || is_object($post_tags) ) {
            foreach ( $post_tags as $post_tag ) {
                $actus_aaws_options[ 'tags' ] .= $post_tag->name . ',';
            }
            $actus_aaws_options[ 'tags' ] = rtrim( $actus_aaws_options[ 'tags' ], ',' );
			}
			}
            
            
            
            // get post images
            //$actus_aaws_options[ 'images' ] =  actus_get_post_images( $post_id );
            actus_get_post_images( $post_id );

            
            // Enque styles and scripts
            wp_enqueue_style( 
                'actus-aaws-admin-edit-styles',
                ACTUS_AAWS_URL . 'css/actus-aaws-admin.css',
                false, ACTUS_AAWS_VERSION, 'all' );


            wp_enqueue_style( 'wp-color-picker' ); 
            
            wp_enqueue_script(
                'actus-aaws-admin-script',
                ACTUS_AAWS_URL . 'js/actus-aaws-scripts-admin.js',
                array( 'jquery', 'actus-aaws-script', 'wp-color-picker' ), ACTUS_AAWS_VERSION, true );

            wp_enqueue_script(
                'actus-aaws-admin-controls',
                ACTUS_AAWS_URL . 'js/actus-aaws-controls-admin.js',
                array( 'jquery', 'actus-aaws-script', 'actus-aaws-admin-script', 'wp-color-picker' ), ACTUS_AAWS_VERSION, true );


            // Send parameters to scripts
            $actus_nonce = wp_create_nonce( 'actus_nonce' );
            $actus_aaws_params_admin = array(
                'ajax_url'   => admin_url( 'admin-ajax.php' ),
                'nonce'      => $actus_nonce,
                'post_id'    => $post_id,
                'content'    => $post_content,
                'options'    => $actus_aaws_options,
                'slider_opt' => $actus_aaws_slider_options,
                'symbols'    => $actus_symbols,
                'excluded'   => $actus_excluded_words,
                'plugin_dir' => ACTUS_AAWS_URL
            );
            wp_localize_script(
                'actus-aaws-admin-script',
                'actusAawsParamsAdmin', $actus_aaws_params_admin );
            
            
            // Initialize and display the administration metaboxes
            // This action is documented in includes/actus-aaws-edit.php
            add_action( 'add_meta_boxes', 'actus_aaws_meta_boxes' );

        }
    }
}








/*
 * Add settings link on plugin page
 *
 * @since 0.1.0
 */
function actus_aaws_settings_link( $links ) { 
  $settings_link = '<a href="admin.php?page=actus-animated-words-slider">Settings</a>'; 
  array_unshift( $links, $settings_link ); 
  return $links; 
}
$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'actus_aaws_settings_link' );








/**
 * Executes the animation function when a shortcode is called.
 */
function actus_aaws_shortcode_start( $atts ) {
    global $actus_aaws_outer_id, $actus_aaws_shortcode;
    
	if ( ! isset($actus_aaws_shortcode[ 'height' ]) )
		$actus_aaws_shortcode[ 'height' ] = '';
	if ( ! isset($actus_aaws_shortcode[ 'words' ]) )
		$actus_aaws_shortcode[ 'words' ] = '';
	if ( ! isset($actus_aaws_shortcode[ 'density' ]) )
		$actus_aaws_shortcode[ 'density' ] = '';
	if ( ! isset($actus_aaws_shortcode[ 'speed' ]) )
		$actus_aaws_shortcode[ 'speed' ] = '';
	if ( ! isset($actus_aaws_shortcode[ 'target' ]) )
		$actus_aaws_shortcode[ 'target' ] = '';
	if ( ! isset($actus_aaws_shortcode[ 'position' ]) )
		$actus_aaws_shortcode[ 'position' ] = '';
	
	$atts = shortcode_atts(
		array(
			'height'   => $actus_aaws_shortcode[ 'height' ],
			'words'    => $actus_aaws_shortcode[ 'words' ],
			'density'  => $actus_aaws_shortcode[ 'density' ],
			'speed'    => $actus_aaws_shortcode[ 'speed' ],
            'target'   => $actus_aaws_shortcode[ 'target' ],
			'position' => $actus_aaws_shortcode[ 'position' ],
		), $atts, 'actus-awslider' );
    
    $actus_aaws_shortcode[ 'height' ]   = $atts[ 'height' ];
    $actus_aaws_shortcode[ 'words' ]    = $atts[ 'words' ];
    $actus_aaws_shortcode[ 'density' ]  = $atts[ 'density' ];
    $actus_aaws_shortcode[ 'speed' ]    = $atts[ 'speed' ];
    $actus_aaws_shortcode[ 'target' ]   = $atts[ 'target' ];
    $actus_aaws_shortcode[ 'position' ] = $atts[ 'position' ];
    
    $trg = '<div id="' . $actus_aaws_outer_id . '" class="actus-aaws-container"></div>';
    actus_aaws_start_slider();
    
    return $trg;
}


 

?>