<?php
/*
Plugin Name: Mobile Frame
Plugin URI: www.virtual-brick.com/
Description: Display images in a mobile device frame. Wrap image with shortcode [mobileframe type="iphone"]	[/mobileframe] to display it in an iPhone frame.
for more examples check out the website 
Version: 1.1
Author: Roy Toledo
Author URI: www.virtual-brick.com
License: GPL2
*/


// error_reporting(E_ALL);
// ini_set('display_errors',1);



// Block direct requests
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

// Define plugin file constant
define( 'MOBILEFRAME_PLUGIN_FILE', __FILE__ );
define( 'MOBILEFRAME_PLUGIN_VERSION', '1.0.0' );

// Includes
require_once 'shortcodes.php';

//Register Widget Class
add_action( 'widgets_init', function(){ register_widget( 'MobileFrame' ); });

/**
 * Widget Class
 */
class MobileFrame extends WP_Widget
{
	
	/**
	 * Constructor
	 */
	function __construct() {
		/* Register widget with WordPress */
		parent::__construct(
				get_class($this), // Base ID
				__('My Useful Widget', 'text_domain'), // Name
				array('description' => __( 'Display images DESCRIPTION', 'text_domain' ),) // Args
		);
		// Register Scripts
		add_action( 'wp_head',	array( __CLASS__, 'register' ) );
	}
	
	/**
	 * Register assets
	 */
	public static function register() {
		//Registed JS Examples
// 		wp_register_script( 'chartjs', plugins_url( 'assets/js/chart.js', SU_PLUGIN_FILE ), false, '0.2', true );
// 		wp_register_script( 'simpleslider', plugins_url( 'assets/js/simpleslider.js', SU_PLUGIN_FILE ), array( 'jquery' ), '1.0.0', true );

		//Register CSS
		wp_register_style( 'mobileframe', plugins_url( 'assets/css/mobileframe.css', MOBILEFRAME_PLUGIN_FILE ), false, '1.0.0', 'all' );
	}
	
	
	/**
	 * Initiator
	 */
// 	function MobileFrame()
// 	{
// 		$widget_ops 	= array( 'classname' => get_class($this), 'description' => 'Display images in a mobile device frame !!' );
// 		$control_ops 	= array( 'id_base' => get_class($this) );
// 		$this->WP_Widget( get_class($this), 'Display images in a mobile device frame', $widget_ops , $control_ops);
// 	}
	
	
	/**
	 * Front-End Widget Display 
	 
	function widget($args)
	{
		echo $args['before_widget'];
		echo $args['before_title'] . 'TITLE' . $args['after_title'];
		
		echo 'I am your widget';
		?>
		<div class="textwidget">
			<div class="fb-activity" data-site="http://www.panelspolitics.co.il" data-width="210" data-height="300" data-header="false"></div>
			<div clas="clearfix"></div>
		</div>
		<?
		
		echo $args['after_widget'];
	}
	*/

	
}

?>
