<?php
/*
Plugin Name: All Districts News
Plugin URI: http://www.jamunait.com/
Description:  All Districts News
Author: Emran Hossen
Version: 2.0
Author URI: http://ceo.jamunait.com/
*/
// Block direct requests
if ( !defined('ABSPATH') )
die('-1');
add_action( 'widgets_init', function(){
register_widget( 'All_Districts_News' );
});
/**
* Adds All_Districts_News widget.
*/
class All_Districts_News extends WP_Widget {
/**
* Register widget with WordPress.
*/
function __construct() {
parent::__construct(
'All_Districts_News', // Base ID
__('All Districts News', 'text_domain'), // Name
array( 'description' => __( 'All Districts News', 'text_domain' ), ) // Args
);
}

/**
* Front-end display of widget.
*
* @see WP_Widget::widget()
*
* @param array $args Widget arguments.
* @param array $instance Saved values from database.
*/
public function widget( $args, $instance ) {
echo $args['before_widget'];
if ( ! empty( $instance['title'] ) ) {
echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
}
include('menu-pages/widget.php');
echo $args['after_widget'];
}
/**
* Back-end widget form.
*
* @see WP_Widget::form()
*
* @param array $instance Previously saved values from database.
*/
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( '', 'text_domain' );
}
?>
	
<?php
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
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
}

add_action( 'admin_menu', 'register_all_districts_news_menu_page' );

function register_all_districts_news_menu_page(){
     add_menu_page( "All Districts News", "All Districts News", "manage_options", "all-districts-news", "all_districts_news_function", plugins_url( 'all-districts-news/menu-pages/images/icon.png' ) );
 add_submenu_page( "all-districts-news", "Installation", "Installation", "manage_options", "installation","add_installation");
 add_submenu_page( "all-districts-news", "Districts Code", "Districts Code", "manage_options", "districts-code","add_districts_code");
 

} 
function all_districts_news_function()
{
	include('menu-pages/all-districts-news.php');
}

//lead generation wordpress sub menu

function add_installation()
{
	include('menu-pages/installation.php');
}

//ad campaign wordpress sub menu

function add_districts_code()
{
	include('menu-pages/districts-code.php');
}

function shortcode_function( $atts ) {
	include('menu-pages/adn.php');
}
add_shortcode( 'alldistrictsnews', 'shortcode_function' );
?>