<?php
/**
 * @package Airliners_widget
 * @version 1.1.1
 */
/*
  Plugin Name: Airliners Widget
  Plugin URI: http://wordpress.org/plugins/airliners-widget
  Description: Displays an Airliners.net picture (Random, Top Of Yesterday, or specific picture by ID) using official Airliners.net script
  Version: 1.1.1
  Author: Stéphane Moitry
  Author URI: http://stephane.moitry.fr
  License: GPLv2 or later
  Text Domain: airliners-widget
  Domain Path: /languages
 */

/*  Copyright 2013-2015  Stéphane Moitry (stephane.moitry@gmail.com)

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

/**
 * airliners_widget_Widget Class
 */
class airliners_widget_Widget extends WP_Widget {

	/** constructor */
	function airliners_widget_Widget() {
		parent::WP_Widget(false, 'Airliners Widget', array('description' => __('Displays an Airliners.net picture (Random, Top Of Yesterday, or specific picture by ID) using official Airliners.net script', 'airliners-widget')));
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$imgtype = esc_attr($instance['imgtype']);
		$imgid = esc_attr($instance['imgid']);

		echo $before_widget;

		if ($title) {
			echo $before_title . $title . $after_title;
		}

		echo $this->render($imgtype, $imgid);

		echo $after_widget;
	}

	/* Render the content, used by widget and shortcode methods */
	public static function render($imgtype, $imgid) {
		$text = "";
		
		if ($imgtype=='random') {
		    $text = "<SCRIPT LANGUAGE='JavaScript' SRC='http://www.airliners.net/random.inc' TYPE='text/javascript'></SCRIPT>";
		}
		if ($imgtype=='yesterday') {
		    $text = "<SCRIPT LANGUAGE='JavaScript' SRC='http://www.airliners.net/TopOfYest.inc' TYPE='text/javascript'></SCRIPT>";
		}
		if ($imgtype=='picture') {
		    $text = "<SCRIPT LANGUAGE='JavaScript' SRC='http://www.airliners.net/photoLink.inc?id=".$imgid."' TYPE='text/javascript'></SCRIPT>";
		}
		
		return $text;
	}

	/** @see WP_Widget::update */
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['imgtype'] = strip_tags($new_instance['imgtype']);
		$instance['imgid'] = strip_tags($new_instance['imgid']);
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance) {
		$title = '';
		$imgtype = 'random';
		$imgid = '1';

		if (isset($instance['title'])) {
			$title = esc_attr($instance['title']);
		}
		
		if (isset($instance['imgtype'])) {
			$imgtype = esc_attr($instance['imgtype']);
		}
		
		if (isset($instance['imgid'])) {
			$imgid = esc_attr($instance['imgid']);
		}
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'airliners-widget'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('imgtype'); ?>"><?php _e('Type:', 'airliners-widget'); ?> <select class="widefat" id="<?php echo $this->get_field_id('imgtype'); ?>" name="<?php echo $this->get_field_name('imgtype'); ?>">
		    <option value="random" <?php if ($imgtype=='random') echo "selected=\"selected\""; ?>><?php _e('Random picture', 'airliners-widget'); ?></option>
		    <option value="yesterday" <?php if($imgtype=='yesterday') echo "selected=\"selected\""; ?>><?php _e('Top of yesterday', 'airliners-widget'); ?></option>
		    <option value="picture" <?php if($imgtype=='picture') echo "selected=\"selected\""; ?>><?php _e('Specific picture (set ID below)', 'airliners-widget'); ?></option>
		</select></p>
		<p><label for="<?php echo $this->get_field_id('imgid'); ?>"><?php _e('Image Id:', 'airliners-widget'); ?> <input class="widefat" id="<?php echo $this->get_field_id('imgid'); ?>" name="<?php echo $this->get_field_name('imgid'); ?>" type="text" value="<?php echo $imgid; ?>" /></label></p>
<?php
	}

}

/* ShortCode Handler */
function airliners_widget_shortcode( $atts ) {
	$attributes = shortcode_atts( array(
	    'imgtype' => 'random',
	    'imgid' => '1'
	), $atts );
	
	$text = "<div class='widget_airliners_widget'>".airliners_widget_Widget::render($attributes['imgtype'], $attributes['imgid'])."</div>";
	
	return $text;
}

/* Initialization Handler */
function airliners_widget_init() {
	load_plugin_textdomain( 'airliners-widget', false, dirname( plugin_basename( __FILE__ ) ).'/languages' );
	register_widget( 'airliners_widget_Widget' );
	wp_enqueue_style( 'airliners_widget_Widget', plugin_dir_url( __FILE__ ).'airliners-widget.css');
}

// register Widget
add_action('widgets_init', 'airliners_widget_init');
// register ShortCode
add_shortcode( 'airliners', 'airliners_widget_shortcode' );
