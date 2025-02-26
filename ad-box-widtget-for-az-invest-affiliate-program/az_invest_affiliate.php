<?php
/*
 * Plugin Name: AZ-INVEST affiliate program
 * Version: 1.0.0
 * Plugin URI: http://www.az-invest.eu/affiliate-program
 * Description: An ad display box for AZ-INVEST affiliate program. 
 * Author: Artur Zas
 * Author URI: https://www.facebook.com/Forex.Metatrader
 * License: GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */
require_once('ad_player.php');
class az_invest_affiliate extends WP_Widget {

	// constructor
	function __construct() {
		parent::__construct('az_invest_affiliate',
			__('AZ-INVEST affiliate box', 'wp_widget_plugin'), 
			array( 'description' => __( 'Displays an affiliate ad for AZ-INVEST Metatrader addons.', 'wp_widget_plugin' ), ) 
		);
	}

	// widget form creation
	function form($instance) {

	// Check values
	if($instance) {
		$title = esc_attr($instance['title']);
		$affiliate_url = esc_attr($instance['affiliate_url']);
		$description = esc_attr($instance['description']);
	} else {
		$title = esc_attr(__('Be sure to check out','wp_widget_plugin'));
		$affiliate_url = '';
		$description = esc_attr(__('Custom charting & professional trade manager software for MT4','wp_widget_plugin'));
	}

?>

	<p>
	<?php _e('Create an affiliate account with <a href="http://www.az-invest.eu/affiliate-program">AZ-INVEST</a> and enter your unique affiliate link in the textbox below.','wp_widget_plugin'); ?>
	</p>
	<p>
	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Ad box title', 'wp_widget_plugin'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
	</p>
	<p>
	<label for="<?php echo $this->get_field_id('affiliate_url'); ?>"><?php _e('Paste your affiliate link here', 'wp_widget_plugin'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('affiliate_url'); ?>" name="<?php echo $this->get_field_name('affiliate_url'); ?>" type="text" value="<?php echo $affiliate_url; ?>" />
	</p>
	<p>
	<label for="<?php echo $this->get_field_id('description'); ?>"><?php _e('Short description', 'wp_widget_plugin'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('description'); ?>" name="<?php echo $this->get_field_name('description'); ?>" type="text" value="<?php echo $description; ?>" />
	</p>

<?php
	}

	// widget update
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		// Fields
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['affiliate_url'] = strip_tags($new_instance['affiliate_url']);
		$instance['description'] = strip_tags($new_instance['description']);
		return $instance;	
	}

	// display widget
	function widget($args, $instance) {

		wp_enqueue_script('az-invest-affiliate_jquery');
		wp_enqueue_style( 'az-invest-affiliate_style' );

		extract( $args );
		// these are the widget options
		$title = $instance['title'];
		$affiliate_url = $instance['affiliate_url'];
		$desc = $instance['description'];

		if(!$title) 
			$complete_title = "";
		else
			$complete_title = $before_title . $title . $after_title;

		if(!$desc)
			$desc = "";

		echo $before_widget;	   
		if($affiliate_url) 
			echo show_ad($complete_title,$affiliate_url,$desc);
		echo $after_widget;
	}
  

}

// register jquery and style on initialization
add_action('init', 'register_script');

function register_script(){
	wp_register_script( 'az-invest-affiliate_jquery', plugins_url('/ad_player.js', __FILE__), array('jquery'), '2.5.1' );
	wp_register_style( 'az-invest-affiliate_style', plugins_url('/ad_player.css', __FILE__), false, '1.0.0', 'all');
}

// register widget
add_action('widgets_init', create_function('', 'return register_widget("az_invest_affiliate");'));

?>
