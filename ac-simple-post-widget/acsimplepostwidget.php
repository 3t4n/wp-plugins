<?php

/*
 * Plugin Name: AC Simple Post Widget
 * Plugin URI: 
 * Description: Adds a widget and able to choose what posts type to display of your site with excerpt and featured image.
 * Version: 1.0.0
 * Author: Aaron Carmen
 * Author URI: 
 * License: GPL2
 */


/*
 *  Assign Global Variables
 *
*/

$plugin_url = WP_PLUGIN_URL . 'acsearch';

//  number of post to be display
global $num_post;

//  type of post to be display
global $post_type;

//  set the featured image width
global $img_width;

//  set the featured image height
global $img_height;

//  set if you want the post to open in new tab
global $new_tab;

//  set if you want to display the title and the excerpt of the post
global $title_content;

// /*
//  *  Add link to our Plugin in the Wordpress Admin Menu
//  *  under 'Settings > AC Search'
//  *
// */

// function ac_search_menu() {

//     /*
//      *  Use add_theme_page function
//      *  add_theme_page( $page_title, $menu_title, $capability, $menu_slug, $function )
//      *
//     */

//     add_menu_page(
//         'AC Search Plugin',
//         'AC Search',
//         'manage_options',
//         'acsearch',
//         'ac_search_options_page'
//     );

// }
// add_action( 'admin_menu', 'ac_search_menu' );

// function ac_search_options_page() {

//     if ( ! current_user_can( 'manage_options' ) ) {

//         wp_die( 'You do not have sufficient permissions to access this page.' );

//     }

//     global $plugin_url;

//     require( 'inc/options-page-wrapper.php' );

// }



/*
 *  Register Widget
 *
*/
class AC_Simple_Post_Widget extends WP_Widget {

    public function __construct() {
        // Instantiate the parent object
        parent::__construct( false, 'AC Simple Post Widget' );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */

    public function widget( $args, $instance ) {
        // Widget output

        extract( $args );
        $title = apply_filters( 'widget_title', $instance['title'] );
        $num_post = $instance[ 'num_post' ];
        $new_tab = $instance[ 'new_tab' ];
        $post_type = $instance[ 'post_type' ];
        $img_width = $instance[ 'img_width' ];
        $img_height = $instance[ 'img_height' ];
	    $title_content = $instance[ 'title_content' ];

        require( 'inc/front-end.php' );

    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    
    public function update( $new_instance, $old_instance ) {

        $instance = $old_instance;

        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

        $instance['num_post'] = ( !empty( $new_instance['num_post'] ) ) ? strip_tags( $new_instance['num_post'] ) : '';

        $instance['new_tab'] = ( !empty( $new_instance['new_tab'] ) ) ? strip_tags( $new_instance['new_tab'] ) : '';

        $instance['post_type'] = ( !empty( $new_instance['post_list'] ) ) ? strip_tags( $new_instance['post_type'] ) : '';

        $instance['img_width'] = ( !empty( $new_instance['img_width'] ) ) ? strip_tags( $new_instance['img_width'] ) : '';

        $instance['img_height'] = ( !empty( $new_instance['img_height'] ) ) ? strip_tags( $new_instance['img_height'] ) : '';

	    $instance['title_content'] = ( !empty( $new_instance['title_content'] ) ) ? strip_tags( $new_instance['title_content'] ) : '';
 
        return $instance;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */

    public function form( $instance ) {
        // Output admin widget options form

        if ( isset( $instance[ 'title' ] ) || isset( $instance[ 'num_post' ] ) || isset( $instance[ 'new_tab' ] ) || isset( $instance[ 'post_type' ] ) || isset( $instance[ 'img_width' ] ) || isset( $instance[ 'img_height' ] ) || isset( $instance[ 'title_content' ] ) ) {

            $title = $instance[ 'title' ];
            $num_post = $instance[ 'num_post' ];
            $new_tab = $instance[ 'new_tab' ];
            $post_type = $instance[ 'post_type' ];
            $img_width = $instance[ 'img_width' ];
            $img_height = $instance[ 'img_height' ];
	        $title_content = $instance[ 'title_content' ];

        } else {

	        $title = __( 'AC Simple Post Widget', 'acsimplepostwidget' );
            $num_post = '4';
            $new_tab = '1';
            $post_type = "post";
            $img_width = "100";
            $img_height = "100";
	        $title_content = '1';

        }

        require( 'inc/widget-fields.php' );

    }

}

function ac_register_widgets() {

    register_widget( 'AC_Simple_Post_Widget' );

}
add_action( 'widgets_init', 'ac_register_widgets' );

function ac_simple_post_widget_shortcode( $atts, $content = null ) {

    global $post;
    global $before_widget;
    global $after_widget;

    extract( shortcode_atts( array(
        'post_type' => 'post',
        'num_post' => '4',
        'new_tab' => 'on',
        'img_width' => '100',
        'img_height' => '100',
	    'title_content' => 'on'
    ), $atts ) );

	if ( isset( $new_tab ) ) {
		if ( $new_tab == 'on' ) {
			$new_tab = 1;
		} else {
			$new_tab = 0;
		}
	}

	if ( isset( $title_content ) ) {
		if ( $title_content == 'on' ) {
			$title_content = 1;
		} else {
			$title_content = 0;
		}
	}

    ob_start();

    require( 'inc/front-end.php' );

    $content = ob_get_clean();

    return $content;

}
add_shortcode( 'ac_spw', 'ac_simple_post_widget_shortcode' );

function ac_backend_styles() {

    wp_enqueue_style( 'ac_backend_css', plugins_url( 'acsimplepostwidget/css/acsimplepostwidget.css' ) );

}
add_action( 'admin_head', 'ac_backend_styles' );

function ac_frontend_scripts_and_styles() {

    wp_enqueue_style( 'ac_frontend_css', plugins_url( 'acsimplepostwidget/css/acsimplepostwidget.css' ) );
    wp_enqueue_script( 'ac_frontend_js', plugins_url( 'acsimplepostwidget/js/acsimplepostwidget.js' ), array( 'jquery', '', 'true') );

}
add_action( 'wp_enqueue_scripts', 'ac_frontend_scripts_and_styles' );

function my_excerpt_length($length) {
	return 30;
}
add_filter( 'excerpt_length', 'my_excerpt_length' );

?>