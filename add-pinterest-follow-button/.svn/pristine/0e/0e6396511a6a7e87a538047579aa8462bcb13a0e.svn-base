<?php
/**
 * Plugin Name: Add Follow Button For Pinterest
 * Version: 1.3.7
 * Description: Pinterest follow button plugin give an ability to maximize your followers of Pinterest account.
 * Author: Weblizar
 * Author URI: http://weblizar.com/plugins/
 * Plugin URI: http://weblizar.com/plugins/pinterest-follow-button-plugin/
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 */

/**
 * Constant Values & Variables
 */
if (!defined('ABSPATH')) {
	exit;
}
define('WEBLIZAR_PINTEREST_PLUGIN_URL', plugin_dir_url(__FILE__));
define('WEBLIZAR_PINTEREST_TD', 'weblizar_pf');

if (!defined('WEBLIZAR_PINTEREST_PLUGIN_DIR_PATH')) {
	define('WEBLIZAR_PINTEREST_PLUGIN_DIR_PATH', plugin_dir_path(__FILE__));
}

/**
 * Widget Code
 */

function themeslug_enqueue_style()
{
	wp_register_style('pin-css', WEBLIZAR_PINTEREST_PLUGIN_URL . 'css/pin.css', false);
	wp_enqueue_style('pin-css');
	wp_enqueue_script('jquery');
	wp_register_script('pin-js', WEBLIZAR_PINTEREST_PLUGIN_URL . 'js/pin.js', array('jquery'), true, true);
	wp_enqueue_script('pin-js');
}

add_action('wp_enqueue_scripts', 'themeslug_enqueue_style');
/**
 * Define Pinterest Widget Class
 */
class WeblizarAddPinterestFollowButton extends WP_Widget
{

	/**
	 * Register widget with WordPress.
	 */
	public function __construct()
	{
		parent::__construct(
			'weblizar_pf', // Base ID
			'Add Pinterest Follow Button', // Name
			array('description' => esc_html__('Display Pinterest Follow Button', WEBLIZAR_PINTEREST_TD)) // Args
		);

		if (is_admin()) {
			require_once 'admin/class-add-pinterest-follow-button-admin.php';
			new WEBLIZAR_PINTEREST_ADMIN(); // Create Class object
		}
	}
	/**
	 * Front-end display of widget.
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget($args, $instance)
	{
		$WidgetTitle = array_key_exists('WidgetTitle', $instance) ? apply_filters('weblizar_widget_title', $instance['WidgetTitle']) : '';
		$PinterestName = array_key_exists('PinterestName', $instance) ? apply_filters('weblizar_pinterest_name', $instance['PinterestName']) : '';

		$PinterestProfileURL = array_key_exists('PinterestProfileURL', $instance) ? apply_filters('weblizar_pinterest_profile_url', $instance['PinterestProfileURL']) : '';
		$ButtonSize = array_key_exists('ButtonSize', $instance) ? apply_filters('weblizar_pinterest_button_size', $instance['ButtonSize']) : '';

		echo wp_kses_post($args['before_widget']);
		if (!empty($instance['WidgetTitle'])) {
			echo wp_kses_post($args['before_title'] . apply_filters('weblizar_widget_title', $instance['WidgetTitle']) . $args['after_title']);
		}
		if ($ButtonSize == 'large') { ?>
			<div id="pinterest_large">
				<a data-pin-do="buttonFollow"
					href="<?php echo esc_url($PinterestProfileURL); ?>"><?php echo esc_html($PinterestName); ?></a>
			</div>
			<?php
		} elseif ($ButtonSize == 'small') {
			?>
			<a data-pin-do="buttonFollow"
				href="<?php echo esc_url($PinterestProfileURL); ?>"><?php echo esc_html($PinterestName); ?></a>
			<?php
		}
		?>
		<script type="text/javascript" async defer src="<?php echo esc_url(WEBLIZAR_PINTEREST_PLUGIN_URL . 'js/pinit.js'); ?>">
		</script>
		<?php

		echo wp_kses_post($args['after_widget']);
	}
	/**
	 * Back-end widget form.
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form($instance)
	{
		if (isset($instance['WidgetTitle'])) {
			$WidgetTitle = $instance['WidgetTitle'];
		} else {
			$WidgetTitle = 'Follow Us On Pinterest';
		}

		if (isset($instance['PinterestName'])) {
			$PinterestName = $instance['PinterestName'];
		} else {
			$PinterestName = 'Weblizar Pro Themes & Plugins';
		}

		if (isset($instance['PinterestProfileURL'])) {
			$PinterestProfileURL = $instance['PinterestProfileURL'];
		} else {
			$PinterestProfileURL = 'http://www.pinterest.com/lizarweb/';
		}

		if (isset($instance['ButtonSize'])) {
			$ButtonSize = $instance['ButtonSize'];
		} else {
			$ButtonSize = 'large';
		}
		?>

		<p>
			<label
				for="<?php echo esc_attr($this->get_field_id('WidgetTitle')); ?>"><?php esc_html_e('Widget Title', WEBLIZAR_PINTEREST_TD); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('WidgetTitle')); ?>"
				name="<?php echo esc_attr($this->get_field_name('WidgetTitle')); ?>" type="text"
				value="<?php echo esc_attr($WidgetTitle); ?>">
		</p>
		<p>
			<label
				for="<?php echo esc_attr($this->get_field_id('PinterestName')); ?>"><?php esc_html_e('Pinterest Account Name', WEBLIZAR_PINTEREST_TD); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('PinterestName')); ?>"
				name="<?php echo esc_attr($this->get_field_name('PinterestName')); ?>" type="text"
				value="<?php echo esc_attr($PinterestName); ?>">
		</p>
		<p>
			<label
				for="<?php echo esc_attr($this->get_field_id('PinterestProfileURL')); ?>"><?php esc_html_e('Pinterest Profile URL (Required)', WEBLIZAR_PINTEREST_TD); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('PinterestProfileURL')); ?>"
				name="<?php echo esc_attr($this->get_field_name('PinterestProfileURL')); ?>" type="text"
				value="<?php echo esc_url($PinterestProfileURL); ?>">
		</p>
		<p>
			<a class="button button-primary" href="https://profiles.wordpress.org/weblizar#content-plugins"
				target="_new"><?php esc_html_e('Find Out More Free Plugins', WEBLIZAR_PINTEREST_TD); ?></a>
		</p>
		<p>
			<label
				for="<?php echo esc_attr($this->get_field_id('ButtonSize')); ?>"><?php esc_html_e('Button Size', WEBLIZAR_PINTEREST_TD); ?></label>
			<select id="<?php echo esc_attr($this->get_field_id('ButtonSize')); ?>"
				name="<?php echo esc_attr($this->get_field_name('ButtonSize')); ?>">
				<option value="large" <?php
				if ($ButtonSize == 'large') {
					echo esc_attr('selected=selected');
				}
				?>>
					<?php esc_html_e('Large', WEBLIZAR_PINTEREST_TD); ?>
				</option>
				<option value="small" <?php
				if ($ButtonSize == 'small') {
					echo esc_attr('selected=selected');
				}
				?>>
					<?php esc_html_e('Small', WEBLIZAR_PINTEREST_TD); ?>
				</option>
			</select>
		</p>
		<?php
	}
	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update($new_instance, $old_instance)
	{
		$instance = array();
		$instance['WidgetTitle'] = (!empty($new_instance['WidgetTitle'])) ? strip_tags($new_instance['WidgetTitle']) : 'Follow Us On Pinterest';
		$instance['PinterestName'] = (!empty($new_instance['PinterestName'])) ? strip_tags($new_instance['PinterestName']) : 'Weblizar Pro Themes & Plugins';
		$instance['PinterestProfileURL'] = (!empty($new_instance['PinterestProfileURL'])) ? strip_tags($new_instance['PinterestProfileURL']) : 'http://www.pinterest.com/lizarweb/';
		$instance['ButtonSize'] = (!empty($new_instance['ButtonSize'])) ? strip_tags($new_instance['ButtonSize']) : 'large';
		return $instance;
	}
} // end of class WeblizarAddPinterestFollowButton

// register Add Pinterest Follow Button Widget
function WeblizarPinterestFollowButton()
{
	register_widget('WeblizarAddPinterestFollowButton');
}
add_action('widgets_init', 'WeblizarPinterestFollowButton');