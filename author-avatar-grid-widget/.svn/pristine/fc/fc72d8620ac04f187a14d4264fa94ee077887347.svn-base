<?php
/*
Plugin Name: Author Avatar Grid Widget
Plugin URI: http://CudaThemes.com/plugins/display-users-widget
Description: Widget which displays a grid of user Gravatars based on selections of user's role and whether or not they've published posts.
Version: 1.1
Author: Josh Mallard
Author URI: http://joshmallard.com
Author Email: Josh@limecuda.com
Text Domain: cuda-display-users-name-locale
Domain Path: /lang/
Network: false
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Copyright 2013 CudaThemes (josh@limecuda.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

class Cuda_Display_Users_Widget extends WP_Widget {

	/*--------------------------------------------------*/
	/* Constructor
	/*--------------------------------------------------*/

	/**
	 * Specifies the classname and description, instantiates the widget,
	 * loads localization files, and includes necessary stylesheets and JavaScript.
	 */
	public function __construct() {

		// load plugin text domain
		add_action( 'init', array( $this, 'widget_textdomain' ) );

		parent::__construct(
			'cuda-display-users-widget-id',
			__( 'Avatar Grid Widget', 'cudathemes' ),
			array(
				'classname'		=>	'cuda-display-users-widget-class',
				'description'	=>	__( 'Displays images for users of selected roles', 'cudathemes' )
			)
		);

		// Register site styles and scripts
		add_action( 'wp_enqueue_scripts', array( $this, 'register_widget_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'register_widget_scripts' ) );

	} // end constructor

	/*--------------------------------------------------*/
	/* Widget API Functions
	/*--------------------------------------------------*/

	/**
	 * Outputs the content of the widget.
	 *
	 * @param	array	args		The array of form elements
	 * @param	array	instance	The current instance of the widget
	 */
	public function widget( $args, $instance ) {

		extract( $args, EXTR_SKIP );

		echo $before_widget;

		$title = apply_filters('widget_title', $instance['title']);
		$role = $instance['role'];
		$postcount = $instance['postcount'];
		$size = $instance['size'];

		include( plugin_dir_path( __FILE__ ) . '/views/widget.php' );

		echo $after_widget;

	} // end widget

	/**
	 * Processes the widget's options to be saved.
	 *
	 * @param	array	new_instance	The previous instance of values before the update.
	 * @param	array	old_instance	The new instance of values to be generated via the update.
	 */
	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['role'] = $new_instance['role'];
		$instance['postcount'] = $new_instance['postcount'];
		$instance['size'] = strip_tags($new_instance['size'] );

		return $instance;

	} // end widget

	/**
	 * Generates the administration form for the widget.
	 *
	 * @param	array	instance	The array of keys and values for the widget.
	 */
	public function form( $instance ) {

    	$defaults = array(
    		'title'=>__('Contributors','cudathemes'),
    		'size' => '64'
    	);
		$instance = wp_parse_args(
			(array) $instance, $defaults
		);

		// Display the admin form
		include( plugin_dir_path(__FILE__) . '/views/admin.php' );

	} // end form

	/*--------------------------------------------------*/
	/* Public Functions
	/*--------------------------------------------------*/

	/**
	 * Loads the Widget's text domain for localization and translation.
	 */
	public function widget_textdomain() {

		load_plugin_textdomain( 'cudathemes', false, plugin_dir_path( __FILE__ ) . '/lang/' );

	} // end widget_textdomain

	/**
	 * Registers and enqueues widget-specific styles.
	 */
	public function register_widget_styles() {

		wp_enqueue_style( 'cuda-display-users-widget-widget-styles', plugins_url( 'author-avatar-grid-widget/css/widget.css' ) );

	} // end register_widget_styles

	/**
	 * Registers and enqueues widget-specific scripts.
	 */
	public function register_widget_scripts() {

		wp_enqueue_script( 'cuda-display-users-widget-script', plugins_url( 'author-avatar-grid-widget/js/widget.js' ), array( 'jquery' ), 1, true );

	} // end register_widget_scripts

} // end class

add_action( 'widgets_init', create_function( '', 'register_widget("Cuda_Display_Users_Widget");' ) );
