<?php
/*
	Plugin Name: Easy Lite Preloader
	Description: Fully customizable, responsive, lightweight preloader for your website.
	Version: 1.2.0
	Author: Jerome Angeles
*/

if(!defined('ABSPATH')) exit;

if(!defined('ELPRELOADER')) {
	define('ELPRELOADER', plugin_dir_url( __FILE__ ));
}

function elpreloader_add_admin_menu() {
	if(current_user_can('administrator')) {
		add_theme_page('EL Preloader', 'EL Preloader', 'manage_options', __FILE__, 'elpreloader_settings');
	}
}

function enqueue_elpreloader_css_js() {
	wp_enqueue_style('elpl-style', ELPRELOADER . 'assets/css/elpl-style.css', array(), null);
    wp_enqueue_script('elpl-script', ELPRELOADER . 'assets/js/elpl-script.js', array(), null, true);

	if(current_user_can('administrator')) {
	    wp_enqueue_script('elpl-jscolor', ELPRELOADER . 'assets/js/elpl-jscolor.js', array(), null, true);
	}
}

function elpreloader_settings() {
	include_once('elpreloader-settings.php');
}

function elpreloader_output() {
	$settings = get_option('elpreloader_settings');

	if(isset($settings['show_in'])) {
		if($settings['show_in'] == 'entire' || ($settings['show_in'] == 'custom' && (
			(isset($settings['pages']['front']) && is_front_page()) || 
			(isset($settings['pages']['posts']) && is_single()) || 
			(isset($settings['pages']['search']) && is_search()) || 
			(isset($settings['pages']['categories']) && is_category()) || 
			(isset($settings['pages']['archives']) && is_archive()) || 
			isset($settings['pages'][get_the_ID()]) || 
			is_author()
		))) {
			$dimension = explode('x', $settings['image-dimension']);

			list($r, $g, $b) = sscanf($settings['background'], "%02x%02x%02x");
			$background = "rgba(".$r.", ".$g.", ".$b.", ".$settings['bg-transparency'].")";
			?>
			<div id="easy-lite-preloader" class="<?php echo isset($settings['show-on-desktop']) ? '':'elpl-rm-desktop' ?> <?php echo isset($settings['show-on-mobile']) ? '':'elpl-rm-mobile' ?>" style="background: <?php echo $background; ?>;">
				<div class="easy-lite-preloader-wrap">
					<img data-elplsrc="<?php echo $settings['image-url']; ?>" alt="Loading..." style="display: none; width: <?php echo esc_attr($dimension[0]); ?>px; height: <?php echo esc_attr($dimension[1]); ?>px;">
					<p style="display: none; color: #<?php echo esc_attr($settings['message-color']); ?>; font-size: <?php echo esc_attr($settings['message-font']); ?>px;"><?php echo esc_attr($settings['message']); ?></p>
				</div>
			</div>
		<?php
		}
	}
}

add_action('admin_menu', 'elpreloader_add_admin_menu');
add_action('init', 'enqueue_elpreloader_css_js');
add_action('wp_footer', 'elpreloader_output');
?>