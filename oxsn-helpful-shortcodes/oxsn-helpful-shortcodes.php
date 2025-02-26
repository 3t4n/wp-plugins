<?php


defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


/*
Plugin Name: OXSN Helpful Shortcodes
Plugin URI: https://wordpress.org/plugins/oxsn-helpful-shortcodes/
Description: This plugin adds helpful shortcodes with quicktags!
Author: oxsn
Author URI: https://oxsn.com/
Version: 0.0.1
*/


define( 'oxsn_helpful_shortcodes_plugin_basename', plugin_basename( __FILE__ ) );
define( 'oxsn_helpful_shortcodes_plugin_dir_path', plugin_dir_path( __FILE__ ) );
define( 'oxsn_helpful_shortcodes_plugin_dir_url', plugin_dir_url( __FILE__ ) );

if ( ! function_exists ( 'oxsn_helpful_shortcodes_settings_link' ) ) {

	add_filter( 'plugin_action_links', 'oxsn_helpful_shortcodes_settings_link', 10, 2 );
	function oxsn_helpful_shortcodes_settings_link( $links, $file ) {

		if ( $file != oxsn_helpful_shortcodes_plugin_basename )
		return $links;
		$settings_page = '<a href="' . menu_page_url( 'oxsn-helpful-shortcodes', false ) . '">' . esc_html( __( 'Settings', 'oxsn-helpful-shortcodes' ) ) . '</a>';
		array_unshift( $links, $settings_page );
		return $links;

	}

}


?><?php


/* OXSN Dashboard Tab */

if ( !function_exists('oxsn_dashboard_tab_nav_item') ) {

	add_action('admin_menu', 'oxsn_dashboard_tab_nav_item');
	function oxsn_dashboard_tab_nav_item() {

		add_menu_page('OXSN', 'OXSN', 'manage_options', 'oxsn-dashboard', 'oxsn_dashboard_tab' );

	}

}

if ( !function_exists('oxsn_dashboard_tab') ) {

	function oxsn_dashboard_tab() {

		if (!current_user_can('manage_options')) {

			wp_die( __('You do not have sufficient permissions to access this page.') );

		}

	?>

		<?php if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y') : ?>

			<div id="message" class="updated">

				<p><strong><?php _e('Settings saved.') ?></strong></p>

			</div>

		<?php endif; ?>
		
		<div class="wrap">
		
			<h2>OXSN / Digital Agency</h2>

			<div id="poststuff">

				<div id="post-body" class="metabox-holder columns-2">

					<div id="post-body-content" style="position: relative;">

						<div class="postbox">

							<h3 class="hndle cursor_initial">Information</h3>

							<div class="inside">

								<p></p>

							</div>
							
						</div>

					</div>

					<div id="postbox-container-1" class="postbox-container">

						<div class="postbox">

							<h3 class="hndle cursor_initial">Coming Soon</h3>

							<div class="inside">

								<p></p>

							</div>
							
						</div>

					</div>

				</div>

			</div>

		</div>

	<?php 

	}

}


?><?php


/* OXSN Plugin Tab */

if ( ! function_exists ( 'oxsn_helpful_shortcodes_plugin_tab_nav_item' ) ) {

	add_action('admin_menu', 'oxsn_helpful_shortcodes_plugin_tab_nav_item', 99);
	function oxsn_helpful_shortcodes_plugin_tab_nav_item() {

		add_submenu_page('oxsn-dashboard', 'OXSN Helpful Shortcodes', 'Helpful Shortcodes', 'manage_options', 'oxsn-helpful-shortcodes', 'oxsn_helpful_shortcodes_plugin_tab');

	}

}

if ( !function_exists('oxsn_helpful_shortcodes_plugin_tab') ) {

	function oxsn_helpful_shortcodes_plugin_tab() {

		if (!current_user_can('manage_options')) {

			wp_die( __('You do not have sufficient permissions to access this page.') );

		}

	?>

		<?php if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y') : ?>

			<div id="message" class="updated">

				<p><strong><?php _e('Settings saved.') ?></strong></p>

			</div>

		<?php endif; ?>
		
		<div class="wrap oxsn_settings_page">
		
			<h2>OXSN / Helpful Shortcodes Plugin</h2>

			<div id="poststuff">

				<div id="post-body" class="metabox-holder columns-2">

					<div id="post-body-content" style="position: relative;">

						<div class="postbox">

							<h3 class="hndle cursor_initial">Information</h3>

							<div class="inside">

								<p>Coming soon.</p>

							</div>
							
						</div>

					</div>

					<div id="postbox-container-1" class="postbox-container">

						<div class="postbox">

							<h3 class="hndle cursor_initial">Custom Project</h3>

							<div class="inside">

								<p>Want us to build you a custom project?</p>

								<p><a href="mailto:brief@oxsn.com?Subject=Custom%20Project%20Request%21&Body=Please%20answer%20the%20following%20questions%20to%20help%20us%20better%20understand%20your%20needs..%0A%0A1.%20What%20is%20the%20name%20of%20your%20company%3F%0A%0A2.%20What%20are%20the%20concepts%20and%20goals%20of%20your%20project%3F%0A%0A3.%20What%20is%20the%20proposed%20budget%20of%20this%20project%3F" class="button button-primary button-large">Email Us</a></p>

							</div>
							
						</div>

						<div class="postbox">

							<h3 class="hndle cursor_initial">Support</h3>

							<div class="inside">

								<p>Need help with this plugin? Visit the Wordpress plugin page for support..</p>

								<p><a href="https://wordpress.org/support/plugin/oxsn-helpful-shortcodes" target="_blank" class="button button-primary button-large">Support</a></p>

							</div>
							
						</div>

					</div>

				</div>

			</div>

		</div>

	<?php 

	}

}


?><?php


/* OXSN Shortcodes */

//[oxsn_h1 class=""][/oxsn_h1]
if ( ! function_exists ( 'oxsn_helpful_shortcodes_h1_shortcode' ) ) {

	add_shortcode( 'oxsn_h1', 'oxsn_helpful_shortcodes_h1_shortcode' );
	function oxsn_helpful_shortcodes_h1_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
		), $atts );

		$oxsn_helpful_shortcodes_h1_class = esc_attr($a['class']);
		if ($oxsn_helpful_shortcodes_h1_class != '') :

			$oxsn_helpful_shortcodes_h1_class = ' class="oxsn_h1 ' . $oxsn_helpful_shortcodes_h1_class . '" ';

		else : 

			$oxsn_helpful_shortcodes_h1_class = ' class="oxsn_h1" ';

		endif;

		$oxsn_helpful_shortcodes_h1_id = esc_attr($a['id']);
		if ($oxsn_helpful_shortcodes_h1_id != '') :

			$oxsn_helpful_shortcodes_h1_id = ' id="' . $oxsn_helpful_shortcodes_h1_id . '" ';

		endif;

		return '<h1 ' . $oxsn_helpful_shortcodes_h1_id . ' ' . $oxsn_helpful_shortcodes_h1_class . ' >' . do_shortcode($content) . '</h1>';

	}

}

//[oxsn_h2 class=""][/oxsn_h2]
if ( ! function_exists ( 'oxsn_helpful_shortcodes_h2_shortcode' ) ) {

	add_shortcode( 'oxsn_h2', 'oxsn_helpful_shortcodes_h2_shortcode' );
	function oxsn_helpful_shortcodes_h2_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
		), $atts );

		$oxsn_helpful_shortcodes_h2_class = esc_attr($a['class']);
		if ($oxsn_helpful_shortcodes_h2_class != '') :

			$oxsn_helpful_shortcodes_h2_class = ' class="oxsn_h2 ' . $oxsn_helpful_shortcodes_h2_class . '" ';

		else : 

			$oxsn_helpful_shortcodes_h2_class = ' class="oxsn_h2" ';

		endif;

		$oxsn_helpful_shortcodes_h2_id = esc_attr($a['id']);
		if ($oxsn_helpful_shortcodes_h2_id != '') :

			$oxsn_helpful_shortcodes_h2_id = ' id="' . $oxsn_helpful_shortcodes_h2_id . '" ';

		endif;

		return '<h2 ' . $oxsn_helpful_shortcodes_h2_id . ' ' . $oxsn_helpful_shortcodes_h2_class . ' >' . do_shortcode($content) . '</h2>';

	}

}

//[oxsn_h3 class=""][/oxsn_h3]
if ( ! function_exists ( 'oxsn_helpful_shortcodes_h3_shortcode' ) ) {

	add_shortcode( 'oxsn_h3', 'oxsn_helpful_shortcodes_h3_shortcode' );
	function oxsn_helpful_shortcodes_h3_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
		), $atts );

		$oxsn_helpful_shortcodes_h3_class = esc_attr($a['class']);
		if ($oxsn_helpful_shortcodes_h3_class != '') :

			$oxsn_helpful_shortcodes_h3_class = ' class="oxsn_h3 ' . $oxsn_helpful_shortcodes_h3_class . '" ';

		else : 

			$oxsn_helpful_shortcodes_h3_class = ' class="oxsn_h3" ';

		endif;

		$oxsn_helpful_shortcodes_h3_id = esc_attr($a['id']);
		if ($oxsn_helpful_shortcodes_h3_id != '') :

			$oxsn_helpful_shortcodes_h3_id = ' id="' . $oxsn_helpful_shortcodes_h3_id . '" ';

		endif;

		return '<h3 ' . $oxsn_helpful_shortcodes_h3_id . ' ' . $oxsn_helpful_shortcodes_h3_class . ' >' . do_shortcode($content) . '</h3>';

	}

}

//[oxsn_h4 class=""][/oxsn_h4]
if ( ! function_exists ( 'oxsn_helpful_shortcodes_h4_shortcode' ) ) {

	add_shortcode( 'oxsn_h4', 'oxsn_helpful_shortcodes_h4_shortcode' );
	function oxsn_helpful_shortcodes_h4_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
		), $atts );

		$oxsn_helpful_shortcodes_h4_class = esc_attr($a['class']);
		if ($oxsn_helpful_shortcodes_h4_class != '') :

			$oxsn_helpful_shortcodes_h4_class = ' class="oxsn_h4 ' . $oxsn_helpful_shortcodes_h4_class . '" ';

		else : 

			$oxsn_helpful_shortcodes_h4_class = ' class="oxsn_h4" ';

		endif;

		$oxsn_helpful_shortcodes_h4_id = esc_attr($a['id']);
		if ($oxsn_helpful_shortcodes_h4_id != '') :

			$oxsn_helpful_shortcodes_h4_id = ' id="' . $oxsn_helpful_shortcodes_h4_id . '" ';

		endif;

		return '<h4 ' . $oxsn_helpful_shortcodes_h4_id . ' ' . $oxsn_helpful_shortcodes_h4_class . ' >' . do_shortcode($content) . '</h4>';

	}

}

//[oxsn_h5 class=""][/oxsn_h5]
if ( ! function_exists ( 'oxsn_helpful_shortcodes_h5_shortcode' ) ) {

	add_shortcode( 'oxsn_h5', 'oxsn_helpful_shortcodes_h5_shortcode' );
	function oxsn_helpful_shortcodes_h5_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
		), $atts );

		$oxsn_helpful_shortcodes_h5_class = esc_attr($a['class']);
		if ($oxsn_helpful_shortcodes_h5_class != '') :

			$oxsn_helpful_shortcodes_h5_class = ' class="oxsn_h5 ' . $oxsn_helpful_shortcodes_h5_class . '" ';

		else : 

			$oxsn_helpful_shortcodes_h5_class = ' class="oxsn_h5" ';

		endif;

		$oxsn_helpful_shortcodes_h5_id = esc_attr($a['id']);
		if ($oxsn_helpful_shortcodes_h5_id != '') :

			$oxsn_helpful_shortcodes_h5_id = ' id="' . $oxsn_helpful_shortcodes_h5_id . '" ';

		endif;

		return '<h5 ' . $oxsn_helpful_shortcodes_h5_id . ' ' . $oxsn_helpful_shortcodes_h5_class . ' >' . do_shortcode($content) . '</h5>';

	}

}

//[oxsn_h6 class=""][/oxsn_h6]
if ( ! function_exists ( 'oxsn_helpful_shortcodes_h6_shortcode' ) ) {

	add_shortcode( 'oxsn_h6', 'oxsn_helpful_shortcodes_h6_shortcode' );
	function oxsn_helpful_shortcodes_h6_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
		), $atts );

		$oxsn_helpful_shortcodes_h6_class = esc_attr($a['class']);
		if ($oxsn_helpful_shortcodes_h6_class != '') :

			$oxsn_helpful_shortcodes_h6_class = ' class="oxsn_h6 ' . $oxsn_helpful_shortcodes_h6_class . '" ';

		else : 

			$oxsn_helpful_shortcodes_h6_class = ' class="oxsn_h6" ';

		endif;

		$oxsn_helpful_shortcodes_h6_id = esc_attr($a['id']);
		if ($oxsn_helpful_shortcodes_h6_id != '') :

			$oxsn_helpful_shortcodes_h6_id = ' id="' . $oxsn_helpful_shortcodes_h6_id . '" ';

		endif;

		return '<h6 ' . $oxsn_helpful_shortcodes_h6_id . ' ' . $oxsn_helpful_shortcodes_h6_class . ' >' . do_shortcode($content) . '</h6>';

	}

}

//[oxsn_p class=""][/oxsn_p]
if ( ! function_exists ( 'oxsn_helpful_shortcodes_p_shortcode' ) ) {

	add_shortcode( 'oxsn_p', 'oxsn_helpful_shortcodes_p_shortcode' );
	function oxsn_helpful_shortcodes_p_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
		), $atts );

		$oxsn_helpful_shortcodes_p_class = esc_attr($a['class']);
		if ($oxsn_helpful_shortcodes_p_class != '') :

			$oxsn_helpful_shortcodes_p_class = ' class="oxsn_p ' . $oxsn_helpful_shortcodes_p_class . '" ';

		else : 

			$oxsn_helpful_shortcodes_p_class = ' class="oxsn_p" ';

		endif;

		$oxsn_helpful_shortcodes_p_id = esc_attr($a['id']);
		if ($oxsn_helpful_shortcodes_p_id != '') :

			$oxsn_helpful_shortcodes_p_id = ' id="' . $oxsn_helpful_shortcodes_p_id . '" ';

		endif;

		return '<p ' . $oxsn_helpful_shortcodes_p_id . ' ' . $oxsn_helpful_shortcodes_p_class . ' >' . do_shortcode($content) . '</p>';

	}

}

//[oxsn_i class=""][/oxsn_i]
if ( ! function_exists ( 'oxsn_helpful_shortcodes_i_shortcode' ) ) {

	add_shortcode( 'oxsn_i', 'oxsn_helpful_shortcodes_i_shortcode' );
	function oxsn_helpful_shortcodes_i_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
		), $atts );

		$oxsn_helpful_shortcodes_i_class = esc_attr($a['class']);
		if ($oxsn_helpful_shortcodes_i_class != '') :

			$oxsn_helpful_shortcodes_i_class = ' class="oxsn_i ' . $oxsn_helpful_shortcodes_i_class . '" ';

		else : 

			$oxsn_helpful_shortcodes_i_class = ' class="oxsn_i" ';

		endif;

		$oxsn_helpful_shortcodes_i_id = esc_attr($a['id']);
		if ($oxsn_helpful_shortcodes_i_id != '') :

			$oxsn_helpful_shortcodes_i_id = ' id="' . $oxsn_helpful_shortcodes_i_id . '" ';

		endif;

		return '<i ' . $oxsn_helpful_shortcodes_i_id . ' ' . $oxsn_helpful_shortcodes_i_class . ' >' . do_shortcode($content) . '</i>';

	}

}

//[oxsn_strong class=""][/oxsn_strong]
if ( ! function_exists ( 'oxsn_helpful_shortcodes_strong_shortcode' ) ) {

	add_shortcode( 'oxsn_strong', 'oxsn_helpful_shortcodes_strong_shortcode' );
	function oxsn_helpful_shortcodes_strong_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
		), $atts );

		$oxsn_helpful_shortcodes_strong_class = esc_attr($a['class']);
		if ($oxsn_helpful_shortcodes_strong_class != '') :

			$oxsn_helpful_shortcodes_strong_class = ' class="oxsn_strong ' . $oxsn_helpful_shortcodes_strong_class . '" ';

		else : 

			$oxsn_helpful_shortcodes_strong_class = ' class="oxsn_strong" ';

		endif;

		$oxsn_helpful_shortcodes_strong_id = esc_attr($a['id']);
		if ($oxsn_helpful_shortcodes_strong_id != '') :

			$oxsn_helpful_shortcodes_strong_id = ' id="' . $oxsn_helpful_shortcodes_strong_id . '" ';

		endif;

		return '<strong ' . $oxsn_helpful_shortcodes_strong_id . ' ' . $oxsn_helpful_shortcodes_strong_class . ' >' . do_shortcode($content) . '</strong>';

	}

}

//[oxsn_center class=""][/oxsn_center]
if ( ! function_exists ( 'oxsn_helpful_shortcodes_center_shortcode' ) ) {

	add_shortcode( 'oxsn_center', 'oxsn_helpful_shortcodes_center_shortcode' );
	function oxsn_helpful_shortcodes_center_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
		), $atts );

		$oxsn_helpful_shortcodes_center_class = esc_attr($a['class']);
		if ($oxsn_helpful_shortcodes_center_class != '') :

			$oxsn_helpful_shortcodes_center_class = ' class="oxsn_center ' . $oxsn_helpful_shortcodes_center_class . '" ';

		else : 

			$oxsn_helpful_shortcodes_center_class = ' class="oxsn_center" ';

		endif;

		$oxsn_helpful_shortcodes_center_id = esc_attr($a['id']);
		if ($oxsn_helpful_shortcodes_center_id != '') :

			$oxsn_helpful_shortcodes_center_id = ' id="' . $oxsn_helpful_shortcodes_center_id . '" ';

		endif;

		return '<div class="oxsn_center_wrap"><div ' . $oxsn_helpful_shortcodes_center_id . ' ' . $oxsn_helpful_shortcodes_center_class . ' >' . do_shortcode($content) . '</div></div>';

	}

}

//[oxsn_hr class=""][/oxsn_hr]
if ( ! function_exists ( 'oxsn_helpful_shortcodes_hr_shortcode' ) ) {

	add_shortcode( 'oxsn_hr', 'oxsn_helpful_shortcodes_hr_shortcode' );
	function oxsn_helpful_shortcodes_hr_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
		), $atts );

		$oxsn_helpful_shortcodes_hr_class = esc_attr($a['class']);
		if ($oxsn_helpful_shortcodes_hr_class != '') :

			$oxsn_helpful_shortcodes_hr_class = ' class="oxsn_hr ' . $oxsn_helpful_shortcodes_hr_class . '" ';

		else : 

			$oxsn_helpful_shortcodes_hr_class = ' class="oxsn_hr" ';

		endif;

		$oxsn_helpful_shortcodes_hr_id = esc_attr($a['id']);
		if ($oxsn_helpful_shortcodes_hr_id != '') :

			$oxsn_helpful_shortcodes_hr_id = ' id="' . $oxsn_helpful_shortcodes_hr_id . '" ';

		endif;

		return '<hr ' . $oxsn_helpful_shortcodes_hr_id . ' ' . $oxsn_helpful_shortcodes_hr_class . ' />';

	}

}

//[oxsn_button class=""][/oxsn_button]
if ( ! function_exists ( 'oxsn_helpful_shortcodes_button_shortcode' ) ) {

	add_shortcode( 'oxsn_button', 'oxsn_helpful_shortcodes_button_shortcode' );
	function oxsn_helpful_shortcodes_button_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
			'autofocus' => '',
			'disabled' => '',
			'form' => '',
			'formaction' => '',
			'formenctype' => '',
			'formmethod' => '',
			'formnovalidate' => '',
			'formtarget' => '',
			'name' => '',
			'type' => '',
		), $atts );

		$oxsn_helpful_shortcodes_button_class = esc_attr($a['class']);
		if ($oxsn_helpful_shortcodes_button_class != '') :

			$oxsn_helpful_shortcodes_button_class = ' class="oxsn_button ' . $oxsn_helpful_shortcodes_button_class . '" ';

		else : 

			$oxsn_helpful_shortcodes_button_class = ' class="oxsn_button" ';

		endif;

		$oxsn_helpful_shortcodes_button_id = esc_attr($a['id']);
		if ($oxsn_helpful_shortcodes_button_id != '') :

			$oxsn_helpful_shortcodes_button_id = ' id="' . $oxsn_helpful_shortcodes_button_id . '" ';

		endif;

		$oxsn_helpful_shortcodes_button_autofocus = esc_attr($a['autofocus']);
		if ($oxsn_helpful_shortcodes_button_autofocus == 'true') :

			$oxsn_helpful_shortcodes_button_autofocus = 'autofocus';

		endif;

		$oxsn_helpful_shortcodes_button_disabled = esc_attr($a['disabled']);
		if ($oxsn_helpful_shortcodes_button_disabled == 'true') :

			$oxsn_helpful_shortcodes_button_disabled = 'disabled';

		endif;

		$oxsn_helpful_shortcodes_button_formnovalidate = esc_attr($a['formnovalidate']);
		if ($oxsn_helpful_shortcodes_button_formnovalidate == 'true') :

			$oxsn_helpful_shortcodes_button_formnovalidate = 'formnovalidate';

		endif;

		$oxsn_helpful_shortcodes_button_form = esc_attr($a['form']);
		if ($oxsn_helpful_shortcodes_button_form != '') :

			$oxsn_helpful_shortcodes_button_form = ' form="' . $oxsn_helpful_shortcodes_button_form . '" ';

		endif;

		$oxsn_helpful_shortcodes_button_formaction = esc_attr($a['formaction']);
		if ($oxsn_helpful_shortcodes_button_formaction != '') :

			$oxsn_helpful_shortcodes_button_formaction = ' formaction="' . $oxsn_helpful_shortcodes_button_formaction . '" ';

		endif;

		$oxsn_helpful_shortcodes_button_formenctype = esc_attr($a['formenctype']);
		if ($oxsn_helpful_shortcodes_button_formenctype != '') :

			$oxsn_helpful_shortcodes_button_formenctype = ' formenctype="' . $oxsn_helpful_shortcodes_button_formenctype . '" ';

		endif;

		$oxsn_helpful_shortcodes_button_formmethod = esc_attr($a['formmethod']);
		if ($oxsn_helpful_shortcodes_button_formmethod != '') :

			$oxsn_helpful_shortcodes_button_formmethod = ' formmethod="' . $oxsn_helpful_shortcodes_button_formmethod . '" ';

		endif;

		$oxsn_helpful_shortcodes_button_formnovalidate = esc_attr($a['formnovalidate']);
		if ($oxsn_helpful_shortcodes_button_formnovalidate != '') :

			$oxsn_helpful_shortcodes_button_formnovalidate = ' formnovalidate="' . $oxsn_helpful_shortcodes_button_formnovalidate . '" ';

		endif;

		$oxsn_helpful_shortcodes_button_formtarget = esc_attr($a['formtarget']);
		if ($oxsn_helpful_shortcodes_button_formtarget != '') :

			$oxsn_helpful_shortcodes_button_formtarget = ' formtarget="' . $oxsn_helpful_shortcodes_button_formtarget . '" ';

		endif;

		$oxsn_helpful_shortcodes_button_name = esc_attr($a['name']);
		if ($oxsn_helpful_shortcodes_button_name != '') :

			$oxsn_helpful_shortcodes_button_name = ' name="' . $oxsn_helpful_shortcodes_button_name . '" ';

		endif;

		$oxsn_helpful_shortcodes_button_type = esc_attr($a['type']);
		if ($oxsn_helpful_shortcodes_button_type != '') :

			$oxsn_helpful_shortcodes_button_type = ' type="' . $oxsn_helpful_shortcodes_button_type . '" ';

		endif;

		return '<button ' . $oxsn_helpful_shortcodes_button_id . ' ' . $oxsn_helpful_shortcodes_button_class . ' ' . $oxsn_helpful_shortcodes_button_autofocus . ' ' . $oxsn_helpful_shortcodes_button_disabled . ' ' . $oxsn_helpful_shortcodes_button_form . ' ' . $oxsn_helpful_shortcodes_button_formaction . ' ' . $oxsn_helpful_shortcodes_button_formenctype . ' ' . $oxsn_helpful_shortcodes_button_formmethod . ' ' . $oxsn_helpful_shortcodes_button_formnovalidate . ' ' . $oxsn_helpful_shortcodes_button_formtarget . ' ' . $oxsn_helpful_shortcodes_button_name . ' ' . $oxsn_helpful_shortcodes_button_type . ' >' . do_shortcode($content) . '</button>';

	}

}

//[oxsn_div class=""][/oxsn_div]
if ( ! function_exists ( 'oxsn_helpful_shortcodes_div_shortcode' ) ) {

	add_shortcode( 'oxsn_div', 'oxsn_helpful_shortcodes_div_shortcode' );
	function oxsn_helpful_shortcodes_div_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
		), $atts );

		$oxsn_helpful_shortcodes_div_class = esc_attr($a['class']);
		if ($oxsn_helpful_shortcodes_div_class != '') :

			$oxsn_helpful_shortcodes_div_class = ' class="oxsn_div ' . $oxsn_helpful_shortcodes_div_class . '" ';

		else : 

			$oxsn_helpful_shortcodes_div_class = ' class="oxsn_div" ';

		endif;

		$oxsn_helpful_shortcodes_div_id = esc_attr($a['id']);
		if ($oxsn_helpful_shortcodes_div_id != '') :

			$oxsn_helpful_shortcodes_div_id = ' id="' . $oxsn_helpful_shortcodes_div_id . '" ';

		endif;

		return '<div ' . $oxsn_helpful_shortcodes_div_id . ' ' . $oxsn_helpful_shortcodes_div_class . ' >' . do_shortcode($content) . '</div>';

	}

}

//[oxsn_panel class=""][/oxsn_panel]
if ( ! function_exists ( 'oxsn_helpful_shortcodes_panel_shortcode' ) ) {

	add_shortcode( 'oxsn_panel', 'oxsn_helpful_shortcodes_panel_shortcode' );
	function oxsn_helpful_shortcodes_panel_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
		), $atts );

		$oxsn_helpful_shortcodes_panel_class = esc_attr($a['class']);
		if ($oxsn_helpful_shortcodes_panel_class != '') :

			$oxsn_helpful_shortcodes_panel_class = ' class="oxsn_panel ' . $oxsn_helpful_shortcodes_panel_class . '" ';

		else : 

			$oxsn_helpful_shortcodes_panel_class = ' class="oxsn_panel" ';

		endif;

		$oxsn_helpful_shortcodes_panel_id = esc_attr($a['id']);
		if ($oxsn_helpful_shortcodes_panel_id != '') :

			$oxsn_helpful_shortcodes_panel_id = ' id="' . $oxsn_helpful_shortcodes_panel_id . '" ';

		endif;

		return '<div ' . $oxsn_helpful_shortcodes_panel_id . ' ' . $oxsn_helpful_shortcodes_panel_class . ' >' . do_shortcode($content) . '</div>';

	}

}

//[oxsn_container class=""][/oxsn_container]
if ( ! function_exists ( 'oxsn_helpful_shortcodes_container_shortcode' ) ) {

	add_shortcode( 'oxsn_container', 'oxsn_helpful_shortcodes_container_shortcode' );
	function oxsn_helpful_shortcodes_container_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
		), $atts );

		$oxsn_helpful_shortcodes_container_class = esc_attr($a['class']);
		if ($oxsn_helpful_shortcodes_container_class != '') :

			$oxsn_helpful_shortcodes_container_class = ' class="oxsn_container ' . $oxsn_helpful_shortcodes_container_class . '" ';

		else : 

			$oxsn_helpful_shortcodes_container_class = ' class="oxsn_container" ';

		endif;

		$oxsn_helpful_shortcodes_container_id = esc_attr($a['id']);
		if ($oxsn_helpful_shortcodes_container_id != '') :

			$oxsn_helpful_shortcodes_container_id = ' id="' . $oxsn_helpful_shortcodes_container_id . '" ';

		endif;

		return '<div ' . $oxsn_helpful_shortcodes_container_id . ' ' . $oxsn_helpful_shortcodes_container_class . ' >' . do_shortcode($content) . '</div>';

	}

}

//[oxsn_row class=""][/oxsn_row]
if ( ! function_exists ( 'oxsn_helpful_shortcodes_row_shortcode' ) ) {

	add_shortcode( 'oxsn_row', 'oxsn_helpful_shortcodes_row_shortcode' );
	function oxsn_helpful_shortcodes_row_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
		), $atts );

		$oxsn_helpful_shortcodes_row_class = esc_attr($a['class']);
		if ($oxsn_helpful_shortcodes_row_class != '') :

			$oxsn_helpful_shortcodes_row_class = ' class="oxsn_row ' . $oxsn_helpful_shortcodes_row_class . '" ';

		else : 

			$oxsn_helpful_shortcodes_row_class = ' class="oxsn_row" ';

		endif;

		$oxsn_helpful_shortcodes_row_id = esc_attr($a['id']);
		if ($oxsn_helpful_shortcodes_row_id != '') :

			$oxsn_helpful_shortcodes_row_id = ' id="' . $oxsn_helpful_shortcodes_row_id . '" ';

		endif;

		return '<div ' . $oxsn_helpful_shortcodes_row_id . ' ' . $oxsn_helpful_shortcodes_row_class . ' >' . do_shortcode($content) . '</div>';

	}

}

//[oxsn_column class=""][/oxsn_column]
if ( ! function_exists ( 'oxsn_helpful_shortcodes_column_shortcode' ) ) {

	add_shortcode( 'oxsn_column', 'oxsn_helpful_shortcodes_column_shortcode' );
	function oxsn_helpful_shortcodes_column_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
		), $atts );

		$oxsn_helpful_shortcodes_column_class = esc_attr($a['class']);
		if ($oxsn_helpful_shortcodes_column_class != '') :

			$oxsn_helpful_shortcodes_column_class = ' class="oxsn_column ' . $oxsn_helpful_shortcodes_column_class . '" ';

		else : 

			$oxsn_helpful_shortcodes_column_class = ' class="oxsn_column" ';

		endif;

		$oxsn_helpful_shortcodes_column_id = esc_attr($a['id']);
		if ($oxsn_helpful_shortcodes_column_id != '') :

			$oxsn_helpful_shortcodes_column_id = ' id="' . $oxsn_helpful_shortcodes_column_id . '" ';

		endif;

		return '<div ' . $oxsn_helpful_shortcodes_column_id . ' ' . $oxsn_helpful_shortcodes_column_class . ' >' . do_shortcode($content) . '</div>';

	}

}

//[oxsn_img class="" src=""][/oxsn_img]
if ( ! function_exists ( 'oxsn_helpful_shortcodes_img_shortcode' ) ) {

	add_shortcode( 'oxsn_img', 'oxsn_helpful_shortcodes_img_shortcode' );
	function oxsn_helpful_shortcodes_img_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
			'alt' => '',
			'crossorigin' => '',
			'height' => '',
			'width' => '',
			'ismap' => '',
			'longdesc' => '',
			'src' => '',
			'usemap' => '',
		), $atts );

		$oxsn_helpful_shortcodes_img_class = esc_attr($a['class']);
		if ($oxsn_helpful_shortcodes_img_class != '') :

			$oxsn_helpful_shortcodes_img_class = ' class="oxsn_img ' . $oxsn_helpful_shortcodes_img_class . '" ';

		else : 

			$oxsn_helpful_shortcodes_img_class = ' class="oxsn_img" ';

		endif;

		$oxsn_helpful_shortcodes_img_id = esc_attr($a['id']);
		if ($oxsn_helpful_shortcodes_img_id != '') :

			$oxsn_helpful_shortcodes_img_id = ' id="' . $oxsn_helpful_shortcodes_img_id . '" ';

		endif;

		$oxsn_helpful_shortcodes_img_alt = esc_attr($a['alt']);
		if ($oxsn_helpful_shortcodes_img_alt != '') :

			$oxsn_helpful_shortcodes_img_alt = ' alt="' . $oxsn_helpful_shortcodes_img_alt . '" ';

		endif;

		$oxsn_helpful_shortcodes_img_crossorigin = esc_attr($a['crossorigin']);
		if ($oxsn_helpful_shortcodes_img_crossorigin != '') :

			$oxsn_helpful_shortcodes_img_crossorigin = ' crossorigin="' . $oxsn_helpful_shortcodes_img_crossorigin . '" ';

		endif;

		$oxsn_helpful_shortcodes_img_height = esc_attr($a['height']);
		if ($oxsn_helpful_shortcodes_img_height != '') :

			$oxsn_helpful_shortcodes_img_height = ' height="' . $oxsn_helpful_shortcodes_img_height . '" ';

		endif;

		$oxsn_helpful_shortcodes_img_width = esc_attr($a['width']);
		if ($oxsn_helpful_shortcodes_img_width != '') :

			$oxsn_helpful_shortcodes_img_width = ' width="' . $oxsn_helpful_shortcodes_img_width . '" ';

		endif;

		$oxsn_helpful_shortcodes_img_ismap = esc_attr($a['ismap']);
		if ($oxsn_helpful_shortcodes_img_ismap != '') :

			$oxsn_helpful_shortcodes_img_ismap = ' ismap="' . $oxsn_helpful_shortcodes_img_ismap . '" ';

		endif;

		$oxsn_helpful_shortcodes_img_longdesc = esc_attr($a['longdesc']);
		if ($oxsn_helpful_shortcodes_img_longdesc != '') :

			$oxsn_helpful_shortcodes_img_longdesc = ' longdesc="' . $oxsn_helpful_shortcodes_img_longdesc . '" ';

		endif;

		$oxsn_helpful_shortcodes_img_src = esc_attr($a['src']);
		if ($oxsn_helpful_shortcodes_img_src != '') :

			$oxsn_helpful_shortcodes_img_src = ' src="' . $oxsn_helpful_shortcodes_img_src . '" ';

		endif;

		$oxsn_helpful_shortcodes_img_usemap = esc_attr($a['usemap']);
		if ($oxsn_helpful_shortcodes_img_usemap != '') :

			$oxsn_helpful_shortcodes_img_usemap = ' usemap="' . $oxsn_helpful_shortcodes_img_usemap . '" ';

		endif;

		return '<img ' . $oxsn_helpful_shortcodes_img_id . ' ' . $oxsn_helpful_shortcodes_img_class . ' ' . $oxsn_helpful_shortcodes_img_alt . ' ' . $oxsn_helpful_shortcodes_img_crossorigin . ' ' . $oxsn_helpful_shortcodes_img_height . ' ' . $oxsn_helpful_shortcodes_img_width . ' ' . $oxsn_helpful_shortcodes_img_ismap . ' ' . $oxsn_helpful_shortcodes_img_longdesc . ' ' . $oxsn_helpful_shortcodes_img_src . ' ' . $oxsn_helpful_shortcodes_img_usemap . ' />';

	}

}

//[oxsn_video class="" mp4="" ogg="" webm=""]
if ( ! function_exists ( 'oxsn_helpful_shortcodes_video_shortcode' ) ) {

	add_shortcode('oxsn_video', 'oxsn_helpful_shortcodes_video_shortcode');
	function oxsn_helpful_shortcodes_video_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
			'youtube' => '',
			'vimeo' => '',
			'mp4' => '',
			'ogg' => '',
			'ogv' => '',
			'webm' => '',
			'autoplay' => '',
			'controls' => '',
			'height' => '',
			'loop' => '',
			'muted' => '',
			'poster' => '',
			'preload' => '',
			'src' => '',
			'width' => '',
		), $atts );

		$oxsn_helpful_shortcodes_video_class = esc_attr($a['class']);
		if ($oxsn_helpful_shortcodes_video_class != '') :

			$oxsn_helpful_shortcodes_video_class = ' class="oxsn_video ' . $oxsn_helpful_shortcodes_video_class . '" ';

		else : 

			$oxsn_helpful_shortcodes_video_class = ' class="oxsn_video" ';

		endif;

		$oxsn_helpful_shortcodes_video_id = esc_attr($a['id']);
		if ($oxsn_helpful_shortcodes_video_id != '') :

			$oxsn_helpful_shortcodes_video_id = ' id="' . $oxsn_helpful_shortcodes_video_id . '" ';

		endif;

		$oxsn_helpful_shortcodes_video_autoplay = esc_attr($a['autoplay']);
		if ($oxsn_helpful_shortcodes_video_autoplay === 'true') :

			$oxsn_helpful_shortcodes_video_youtube_autoplay = '&autoplay=1';
			$oxsn_helpful_shortcodes_video_vimeo_autoplay = '&autoplay=1';
			$oxsn_helpful_shortcodes_video_autoplay = ' autoplay ';

		endif;

		$oxsn_helpful_shortcodes_video_controls = esc_attr($a['controls']);
		if ($oxsn_helpful_shortcodes_video_controls === 'true') :

			$oxsn_helpful_shortcodes_video_controls = ' controls ';

		endif;

		$oxsn_helpful_shortcodes_video_height = esc_attr($a['height']);
		if ($oxsn_helpful_shortcodes_video_height != '') :

			$oxsn_helpful_shortcodes_video_height = ' height="' . $oxsn_helpful_shortcodes_video_height . '" ';

		endif;

		$oxsn_helpful_shortcodes_video_loop = esc_attr($a['loop']);
		if ($oxsn_helpful_shortcodes_video_loop === 'true') :

			$oxsn_helpful_shortcodes_video_youtube_loop = '&loop=1';
			$oxsn_helpful_shortcodes_video_vimeo_loop = '&loop=1';
			$oxsn_helpful_shortcodes_video_loop = ' loop ';

		endif;

		$oxsn_helpful_shortcodes_video_muted = esc_attr($a['muted']);
		if ($oxsn_helpful_shortcodes_video_muted === 'true') :

			$oxsn_helpful_shortcodes_video_vimeo_muted = '&automute=1';
			$oxsn_helpful_shortcodes_video_muted = ' muted ';

		else :

			$oxsn_helpful_shortcodes_video_vimeo_muted = '&automute=0';

		endif;

		$oxsn_helpful_shortcodes_video_poster = esc_attr($a['poster']);
		if ($oxsn_helpful_shortcodes_video_poster != '') :

			$oxsn_helpful_shortcodes_video_poster = ' poster="' . $oxsn_helpful_shortcodes_video_poster . '" ';

		endif;

		$oxsn_helpful_shortcodes_video_preload = esc_attr($a['preload']);
		if ($oxsn_helpful_shortcodes_video_preload != '') :

			$oxsn_helpful_shortcodes_video_preload = ' preload="' . $oxsn_helpful_shortcodes_video_preload . '" ';

		endif;

		$oxsn_helpful_shortcodes_video_width = esc_attr($a['width']);
		if ($oxsn_helpful_shortcodes_video_width != '') :

			$oxsn_helpful_shortcodes_video_width = ' width="' . $oxsn_helpful_shortcodes_video_width . '" ';

		endif;

		$oxsn_helpful_shortcodes_video_youtube= esc_attr($a['youtube']);
		if ($oxsn_helpful_shortcodes_video_youtube != '') :

			parse_str( parse_url( $oxsn_helpful_shortcodes_video_youtube, PHP_URL_QUERY ), $my_array_of_vars );
			$oxsn_helpful_shortcodes_video_youtube =  $my_array_of_vars['v'];
			$oxsn_helpful_shortcodes_video_youtube = 'src="https://www.youtube.com/embed/' . $oxsn_helpful_shortcodes_video_youtube. '?rel=0' . $oxsn_helpful_shortcodes_video_youtube_autoplay . $oxsn_helpful_shortcodes_video_youtube_loop . '"';

		endif;

		$oxsn_helpful_shortcodes_video_vimeo= esc_attr($a['vimeo']);
		if ($oxsn_helpful_shortcodes_video_vimeo != '') :

			preg_match("/(https?:\/\/)?(www\.)?(player\.)?vimeo\.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*/", $oxsn_helpful_shortcodes_video_vimeo, $oxsn_helpful_shortcodes_return_id);
			$oxsn_helpful_shortcodes_video_vimeo = $oxsn_helpful_shortcodes_return_id[5];
			$oxsn_helpful_shortcodes_video_vimeo = 'src="https://player.vimeo.com/video/' . $oxsn_helpful_shortcodes_video_vimeo . $oxsn_helpful_shortcodes_video_vimeo_muted . $oxsn_helpful_shortcodes_video_vimeo_autoplay . $oxsn_helpful_shortcodes_video_vimeo_loop . '"';

		endif;

		$oxsn_helpful_shortcodes_video_mp4 = esc_attr($a['mp4']);
		if ($oxsn_helpful_shortcodes_video_mp4 != '') :

			$oxsn_helpful_shortcodes_video_mp4 = ' <source src="' . $oxsn_helpful_shortcodes_video_mp4 . '" type="video/mp4"> ';

		endif;

		$oxsn_helpful_shortcodes_video_webm = esc_attr($a['webm']);
		if ($oxsn_helpful_shortcodes_video_webm != '') :

			$oxsn_helpful_shortcodes_video_webm = ' <source src="' . $oxsn_helpful_shortcodes_video_webm . '" type="video/webm"> ';

		endif;

		$oxsn_helpful_shortcodes_video_ogg = esc_attr($a['ogg']);
		if ($oxsn_helpful_shortcodes_video_ogg != '') :

			$oxsn_helpful_shortcodes_video_ogg = ' <source src="' . $oxsn_helpful_shortcodes_video_ogg . '" type="video/ogg"> ';

		endif;

		$oxsn_helpful_shortcodes_return = '';

		if ($oxsn_helpful_shortcodes_video_mp4 != "" | $oxsn_helpful_shortcodes_video_ogg != "" | $oxsn_helpful_shortcodes_video_webm != "") :

			$oxsn_helpful_shortcodes_return .=
				'<video ' . $oxsn_helpful_shortcodes_video_class . ' ' . $oxsn_helpful_shortcodes_video_id . ' ' . $oxsn_helpful_shortcodes_video_autoplay . ' ' . $oxsn_helpful_shortcodes_video_controls . ' ' . $oxsn_helpful_shortcodes_video_height . ' ' . $oxsn_helpful_shortcodes_video_loop . ' ' . $oxsn_helpful_shortcodes_video_muted . ' ' . $oxsn_helpful_shortcodes_video_poster . ' ' . $oxsn_helpful_shortcodes_video_preload . ' ' . $oxsn_helpful_shortcodes_video_width . ' >';

			$oxsn_helpful_shortcodes_return .=
					$oxsn_helpful_shortcodes_video_mp4 .
					$oxsn_helpful_shortcodes_video_webm .
					$oxsn_helpful_shortcodes_video_ogg;

			$oxsn_helpful_shortcodes_return .=
				'</video>';

		elseif ($oxsn_helpful_shortcodes_video_youtube != "") :
				
			$oxsn_helpful_shortcodes_return .=
				'<iframe ' . $oxsn_helpful_shortcodes_video_class . ' ' . $oxsn_helpful_shortcodes_video_id . ' ' . $oxsn_helpful_shortcodes_video_width . ' ' . $oxsn_helpful_shortcodes_video_height . ' ' . $oxsn_helpful_shortcodes_video_youtube . ' frameborder="0" allowfullscreen></iframe>';

		elseif ($oxsn_helpful_shortcodes_video_vimeo != "") :

			$oxsn_helpful_shortcodes_return .=
				'<iframe ' . $oxsn_helpful_shortcodes_video_class . ' ' . $oxsn_helpful_shortcodes_video_id . ' ' . $oxsn_helpful_shortcodes_video_width . ' ' . $oxsn_helpful_shortcodes_video_height . ' ' . $oxsn_helpful_shortcodes_video_vimeo . ' frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';

		endif;

		return $oxsn_helpful_shortcodes_return;

	}

}

//[oxsn_ol class=""][/oxsn_ol]
if ( ! function_exists ( 'oxsn_helpful_shortcodes_ol_shortcode' ) ) {

	add_shortcode( 'oxsn_ol', 'oxsn_helpful_shortcodes_ol_shortcode' );
	function oxsn_helpful_shortcodes_ol_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
			'reversed' => '',
			'start' => '',
			'type' => '',
		), $atts );

		$oxsn_helpful_shortcodes_ol_class = esc_attr($a['class']);
		if ($oxsn_helpful_shortcodes_ol_class != '') :

			$oxsn_helpful_shortcodes_ol_class = ' class="oxsn_ol ' . $oxsn_helpful_shortcodes_ol_class . '" ';

		else : 

			$oxsn_helpful_shortcodes_ol_class = ' class="oxsn_ol" ';

		endif;

		$oxsn_helpful_shortcodes_ol_id = esc_attr($a['id']);
		if ($oxsn_helpful_shortcodes_ol_id != '') :

			$oxsn_helpful_shortcodes_ol_id = ' id="' . $oxsn_helpful_shortcodes_ol_id . '" ';

		endif;

		$oxsn_helpful_shortcodes_ol_reversed = esc_attr($a['reversed']);
		if ($oxsn_helpful_shortcodes_ol_reversed === 'true') :

			$oxsn_helpful_shortcodes_ol_reversed = ' reversed ';

		endif;

		$oxsn_helpful_shortcodes_ol_start = esc_attr($a['start']);
		if ($oxsn_helpful_shortcodes_ol_start != '') :

			$oxsn_helpful_shortcodes_ol_start = ' start="' . $oxsn_helpful_shortcodes_ol_start . '" ';

		endif;

		$oxsn_helpful_shortcodes_ol_type = esc_attr($a['type']);
		if ($oxsn_helpful_shortcodes_ol_type != '') :

			$oxsn_helpful_shortcodes_ol_type = ' type="' . $oxsn_helpful_shortcodes_ol_type . '" ';

		endif;

		return '<ol ' . $oxsn_helpful_shortcodes_ol_id . ' ' . $oxsn_helpful_shortcodes_ol_class . ' ' . $oxsn_helpful_shortcodes_ol_reversed . ' ' . $oxsn_helpful_shortcodes_ol_start . ' ' . $oxsn_helpful_shortcodes_ol_type . ' >' . do_shortcode($content) . '</ol>';

	}

}

//[oxsn_ul class=""][/oxsn_ul]
if ( ! function_exists ( 'oxsn_helpful_shortcodes_ul_shortcode' ) ) {

	add_shortcode( 'oxsn_ul', 'oxsn_helpful_shortcodes_ul_shortcode' );
	function oxsn_helpful_shortcodes_ul_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
			'reversed' => '',
			'start' => '',
			'type' => '',
		), $atts );

		$oxsn_helpful_shortcodes_ul_class = esc_attr($a['class']);
		if ($oxsn_helpful_shortcodes_ul_class != '') :

			$oxsn_helpful_shortcodes_ul_class = ' class="oxsn_ul ' . $oxsn_helpful_shortcodes_ul_class . '" ';

		else : 

			$oxsn_helpful_shortcodes_ul_class = ' class="oxsn_ul" ';

		endif;

		$oxsn_helpful_shortcodes_ul_id = esc_attr($a['id']);
		if ($oxsn_helpful_shortcodes_ul_id != '') :

			$oxsn_helpful_shortcodes_ul_id = ' id="' . $oxsn_helpful_shortcodes_ul_id . '" ';

		endif;

		$oxsn_helpful_shortcodes_ul_reversed = esc_attr($a['reversed']);
		if ($oxsn_helpful_shortcodes_ul_reversed === 'true') :

			$oxsn_helpful_shortcodes_ul_reversed = ' reversed ';

		endif;

		$oxsn_helpful_shortcodes_ul_start = esc_attr($a['start']);
		if ($oxsn_helpful_shortcodes_ul_start != '') :

			$oxsn_helpful_shortcodes_ul_start = ' start="' . $oxsn_helpful_shortcodes_ul_start . '" ';

		endif;

		$oxsn_helpful_shortcodes_ul_type = esc_attr($a['type']);
		if ($oxsn_helpful_shortcodes_ul_type != '') :

			$oxsn_helpful_shortcodes_ul_type = ' type="' . $oxsn_helpful_shortcodes_ul_type . '" ';

		endif;

		return '<ul ' . $oxsn_helpful_shortcodes_ul_id . ' ' . $oxsn_helpful_shortcodes_ul_class . ' ' . $oxsn_helpful_shortcodes_ul_reversed . ' ' . $oxsn_helpful_shortcodes_ul_start . ' ' . $oxsn_helpful_shortcodes_ul_type . ' >' . do_shortcode($content) . '</ul>';

	}

}

//[oxsn_li class=""][/oxsn_li]
if ( ! function_exists ( 'oxsn_helpful_shortcodes_li_shortcode' ) ) {

	add_shortcode( 'oxsn_li', 'oxsn_helpful_shortcodes_li_shortcode' );
	function oxsn_helpful_shortcodes_li_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
			'value' => '',
		), $atts );

		$oxsn_helpful_shortcodes_li_class = esc_attr($a['class']);
		if ($oxsn_helpful_shortcodes_li_class != '') :

			$oxsn_helpful_shortcodes_li_class = ' class="oxsn_li ' . $oxsn_helpful_shortcodes_li_class . '" ';

		else : 

			$oxsn_helpful_shortcodes_li_class = ' class="oxsn_li" ';

		endif;

		$oxsn_helpful_shortcodes_li_id = esc_attr($a['id']);
		if ($oxsn_helpful_shortcodes_li_id != '') :

			$oxsn_helpful_shortcodes_li_id = ' id="' . $oxsn_helpful_shortcodes_li_id . '" ';

		endif;

		$oxsn_helpful_shortcodes_li_value = esc_attr($a['value']);
		if ($oxsn_helpful_shortcodes_li_value != '') :

			$oxsn_helpful_shortcodes_li_value = ' value="' . $oxsn_helpful_shortcodes_li_value . '" ';

		endif;

		return '<li ' . $oxsn_helpful_shortcodes_li_id . ' ' . $oxsn_helpful_shortcodes_li_class . ' ' . $oxsn_helpful_shortcodes_li_value . ' >' . do_shortcode($content) . '</li>';

	}

}

//[oxsn_table class=""][/oxsn_table]
if ( ! function_exists ( 'oxsn_helpful_shortcodes_table_shortcode' ) ) {

	add_shortcode( 'oxsn_table', 'oxsn_helpful_shortcodes_table_shortcode' );
	function oxsn_helpful_shortcodes_table_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
			'border' => '',
			'sortable' => '',
		), $atts );

		$oxsn_helpful_shortcodes_table_class = esc_attr($a['class']);
		if ($oxsn_helpful_shortcodes_table_class != '') :

			$oxsn_helpful_shortcodes_table_class = ' class="oxsn_table ' . $oxsn_helpful_shortcodes_table_class . '" ';

		else : 

			$oxsn_helpful_shortcodes_table_class = ' class="oxsn_table" ';

		endif;

		$oxsn_helpful_shortcodes_table_id = esc_attr($a['id']);
		if ($oxsn_helpful_shortcodes_table_id != '') :

			$oxsn_helpful_shortcodes_table_id = ' id="' . $oxsn_helpful_shortcodes_table_id . '" ';

		endif;

		$oxsn_helpful_shortcodes_table_border = esc_attr($a['border']);
		if ($oxsn_helpful_shortcodes_table_border != '') :

			$oxsn_helpful_shortcodes_table_border = ' border="' . $oxsn_helpful_shortcodes_table_border . '" ';

		endif;

		$oxsn_helpful_shortcodes_table_sortable = esc_attr($a['sortable']);
		if ($oxsn_helpful_shortcodes_table_sortable != '') :

			$oxsn_helpful_shortcodes_table_sortable = ' sortable="' . $oxsn_helpful_shortcodes_table_sortable . '" ';

		endif;

		return '<table ' . $oxsn_helpful_shortcodes_table_id . ' ' . $oxsn_helpful_shortcodes_table_class . ' ' . $oxsn_helpful_shortcodes_table_border . ' ' . $oxsn_helpful_shortcodes_table_sortable . ' >' . do_shortcode($content) . '</table>';

	}

}

//[oxsn_th class=""][/oxsn_th]
if ( ! function_exists ( 'oxsn_helpful_shortcodes_th_shortcode' ) ) {

	add_shortcode( 'oxsn_th', 'oxsn_helpful_shortcodes_th_shortcode' );
	function oxsn_helpful_shortcodes_th_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
		), $atts );

		$oxsn_helpful_shortcodes_th_class = esc_attr($a['class']);
		if ($oxsn_helpful_shortcodes_th_class != '') :

			$oxsn_helpful_shortcodes_th_class = ' class="oxsn_th ' . $oxsn_helpful_shortcodes_th_class . '" ';

		else : 

			$oxsn_helpful_shortcodes_th_class = ' class="oxsn_th" ';

		endif;

		$oxsn_helpful_shortcodes_th_id = esc_attr($a['id']);
		if ($oxsn_helpful_shortcodes_th_id != '') :

			$oxsn_helpful_shortcodes_th_id = ' id="' . $oxsn_helpful_shortcodes_th_id . '" ';

		endif;

		return '<th ' . $oxsn_helpful_shortcodes_th_id . ' ' . $oxsn_helpful_shortcodes_th_class . ' >' . do_shortcode($content) . '</th>';

	}

}

//[oxsn_tr class=""][/oxsn_tr]
if ( ! function_exists ( 'oxsn_helpful_shortcodes_tr_shortcode' ) ) {

	add_shortcode( 'oxsn_tr', 'oxsn_helpful_shortcodes_tr_shortcode' );
	function oxsn_helpful_shortcodes_tr_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
		), $atts );

		$oxsn_helpful_shortcodes_tr_class = esc_attr($a['class']);
		if ($oxsn_helpful_shortcodes_tr_class != '') :

			$oxsn_helpful_shortcodes_tr_class = ' class="oxsn_tr ' . $oxsn_helpful_shortcodes_tr_class . '" ';

		else : 

			$oxsn_helpful_shortcodes_tr_class = ' class="oxsn_tr" ';

		endif;

		$oxsn_helpful_shortcodes_tr_id = esc_attr($a['id']);
		if ($oxsn_helpful_shortcodes_tr_id != '') :

			$oxsn_helpful_shortcodes_tr_id = ' id="' . $oxsn_helpful_shortcodes_tr_id . '" ';

		endif;

		return '<tr ' . $oxsn_helpful_shortcodes_tr_id . ' ' . $oxsn_helpful_shortcodes_tr_class . ' >' . do_shortcode($content) . '</tr>';

	}

}

//[oxsn_td class=""][/oxsn_td]
if ( ! function_exists ( 'oxsn_helpful_shortcodes_td_shortcode' ) ) {

	add_shortcode( 'oxsn_td', 'oxsn_helpful_shortcodes_td_shortcode' );
	function oxsn_helpful_shortcodes_td_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
			'colspan' => '',
		), $atts );

		$oxsn_helpful_shortcodes_td_class = esc_attr($a['class']);
		if ($oxsn_helpful_shortcodes_td_class != '') :

			$oxsn_helpful_shortcodes_td_class = ' class="oxsn_td ' . $oxsn_helpful_shortcodes_td_class . '" ';

		else : 

			$oxsn_helpful_shortcodes_td_class = ' class="oxsn_td" ';

		endif;

		$oxsn_helpful_shortcodes_td_id = esc_attr($a['id']);
		if ($oxsn_helpful_shortcodes_td_id != '') :

			$oxsn_helpful_shortcodes_td_id = ' id="' . $oxsn_helpful_shortcodes_td_id . '" ';

		endif;

		$oxsn_helpful_shortcodes_td_colspan = esc_attr($a['colspan']);
		if ($oxsn_helpful_shortcodes_td_colspan != '') :

			$oxsn_helpful_shortcodes_td_colspan = ' colspan="' . $oxsn_helpful_shortcodes_td_colspan . '" ';

		endif;

		return '<td ' . $oxsn_helpful_shortcodes_td_id . ' ' . $oxsn_helpful_shortcodes_td_class . ' ' . $oxsn_helpful_shortcodes_td_colspan . ' >' . do_shortcode($content) . '</td>';

	}

}

//[oxsn_logged_in_users user_roles=""][/oxsn_logged_in_users]
if ( ! function_exists ( 'oxsn_helpful_shortcodes_logged_in_users_shortcode' ) ) {

	add_shortcode('oxsn_logged_in_users', 'oxsn_helpful_shortcodes_logged_in_users_shortcode');
	function oxsn_helpful_shortcodes_logged_in_users_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'user_roles' => '',
		), $atts );

		$get_user_id = get_current_user_id();
        $get_user_data = get_userdata($get_user_id);
        $get_roles = implode($get_user_data->roles);
		$oxsn_helpful_shortcodes_logged_in_users_user_roles = esc_attr($a['user_roles']);
		$oxsn_helpful_shortcodes_logged_in_users_user_roles = strtolower($oxsn_helpful_shortcodes_logged_in_users_user_roles);

		if (is_user_logged_in()) :
			if ( $oxsn_helpful_shortcodes_logged_in_users_user_roles != '' ) :
				if ( $oxsn_helpful_shortcodes_logged_in_users_user_roles == $get_roles ) :
					$oxsn_helpful_shortcodes_return = do_shortcode($content);
				else :
					$oxsn_helpful_shortcodes_return = '';
				endif;
			else :
				$oxsn_helpful_shortcodes_return = do_shortcode($content);
			endif;
		else :
			$oxsn_helpful_shortcodes_return = '';
		endif;

		return $oxsn_helpful_shortcodes_return;

	}

}

//[oxsn_logged_out_users][/oxsn_logged_out_users]
if ( ! function_exists ( 'oxsn_helpful_shortcodes_logged_out_users_shortcode' ) ) {

	add_shortcode('oxsn_helpful_shortcodes_logged_out_users', 'oxsn_helpful_shortcodes_logged_out_users_shortcode');
	function oxsn_helpful_shortcodes_logged_out_users_shortcode( $atts, $content = null ) {

		if (!is_user_logged_in()) :
			$oxsn_helpful_shortcodes_return = do_shortcode($content);
		else :
			$oxsn_helpful_shortcodes_return = '';
		endif;

		return $oxsn_helpful_shortcodes_return;

	}

}

//[oxsn_navigation menu=""]
if ( ! function_exists ( 'oxsn_helpful_shortcodes_navigation_shortcode' ) ) {

	add_shortcode('oxsn_navigation', 'oxsn_helpful_shortcodes_navigation_shortcode');
	function oxsn_helpful_shortcodes_navigation_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'menu' => '',
			'menu_class' => '',
			'menu_id' => '',
			'container' => 'nav',
			'container_class' => '',
			'container_id' => '',
			'before' => '',
			'after' => '',
			'link_before' => '',
			'link_after' => '',
			'depth' => '',
			'walker' => '',
			'theme_location' => '',
		), $atts );

		$args = array();

		$oxsn_helpful_shortcodes_menu = esc_attr($a['menu']);
		if ($oxsn_helpful_shortcodes_menu != '') :

			$args['menu'] = $oxsn_helpful_shortcodes_menu;

		endif;

		$oxsn_helpful_shortcodes_menu_class = esc_attr($a['menu_class']);
		if ($oxsn_helpful_shortcodes_menu_class != '') :

			$args['menu_class'] = $oxsn_helpful_shortcodes_menu_class;

		endif;

		$oxsn_helpful_shortcodes_menu_id = esc_attr($a['menu_id']);
		if ($oxsn_helpful_shortcodes_menu_id != '') :

			$args['menu_id'] = $oxsn_helpful_shortcodes_menu_id;

		endif;

		$oxsn_helpful_shortcodes_container = esc_attr($a['container']);
		if ($oxsn_helpful_shortcodes_container != '') :

			$args['container'] = $oxsn_helpful_shortcodes_container;

		endif;

		$oxsn_helpful_shortcodes_container_class = esc_attr($a['container_class']);
		if ($oxsn_helpful_shortcodes_container_class != '') :

			$args['container_class'] = $oxsn_helpful_shortcodes_container_class;

		endif;

		$oxsn_helpful_shortcodes_container_id = esc_attr($a['container_id']);
		if ($oxsn_helpful_shortcodes_container_id != '') :

			$args['container_id'] = $oxsn_helpful_shortcodes_container_id;

		endif;
		
		$oxsn_helpful_shortcodes_before = esc_attr($a['before']);
		if ($oxsn_helpful_shortcodes_before != '') :

			$args['before'] = $oxsn_helpful_shortcodes_before;

		endif;

		$oxsn_helpful_shortcodes_after = esc_attr($a['after']);
		if ($oxsn_helpful_shortcodes_after != '') :

			$args['after'] = $oxsn_helpful_shortcodes_after;

		endif;

		$oxsn_helpful_shortcodes_link_before = esc_attr($a['link_before']);
		if ($oxsn_helpful_shortcodes_link_before != '') :

			$args['link_before'] = $oxsn_helpful_shortcodes_link_before;

		endif;

		$oxsn_helpful_shortcodes_link_after = esc_attr($a['link_after']);
		if ($oxsn_helpful_shortcodes_link_after != '') :

			$args['link_after'] = $oxsn_helpful_shortcodes_link_after;

		endif;

		$oxsn_helpful_shortcodes_depth = esc_attr($a['depth']);
		if ($oxsn_helpful_shortcodes_depth != '') :

			$args['depth'] = $oxsn_helpful_shortcodes_depth;

		endif;

		$oxsn_helpful_shortcodes_walker = esc_attr($a['walker']);
		if ($oxsn_helpful_shortcodes_walker != '') :

			$args['walker'] = $oxsn_helpful_shortcodes_walker;

		endif;

		$oxsn_helpful_shortcodes_theme_location = esc_attr($a['theme_location']);
		if ($oxsn_helpful_shortcodes_theme_location != '') :

			$args['theme_location'] = $oxsn_helpful_shortcodes_theme_location;

		endif;

		$oxsn_helpful_shortcodes_fallback_cb = esc_attr($a['fallback_cb']);
		if ($oxsn_helpful_shortcodes_fallback_cb != '') :

			$args['fallback_cb'] = $oxsn_helpful_shortcodes_fallback_cb;

		else : 

			$args['fallback_cb'] = 'false';

		endif;

		$oxsn_helpful_shortcodes_echo = esc_attr($a['echo']);
		if ($oxsn_helpful_shortcodes_echo != '') :

			$args['echo'] = $oxsn_helpful_shortcodes_echo;

		else : 

			$args['echo'] = 'false';

		endif;

		return wp_nav_menu( 
			$args
		);

	}

}

//[oxsn_breadcrumbs class=""]
if ( ! function_exists ( 'oxsn_helpful_shortcodes_breadcrumbs_shortcode' ) ) {

	add_shortcode('oxsn_breadcrumbs', 'oxsn_helpful_shortcodes_breadcrumbs_shortcode');
	function oxsn_helpful_shortcodes_breadcrumbs_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
		), $atts );

		$oxsn_helpful_shortcodes_breadcrumbs_class = esc_attr($a['class']);
		if ($oxsn_helpful_shortcodes_breadcrumbs_class != '') :

			$oxsn_helpful_shortcodes_breadcrumbs_class = ' class="oxsn_breadcrumbs ' . $oxsn_helpful_shortcodes_breadcrumbs_class . '" ';

		else : 

			$oxsn_helpful_shortcodes_breadcrumbs_class = ' class="oxsn_breadcrumbs" ';

		endif;

		$oxsn_helpful_shortcodes_breadcrumbs_id = esc_attr($a['id']);
		if ($oxsn_helpful_shortcodes_breadcrumbs_id != '') :

			$oxsn_helpful_shortcodes_breadcrumbs_id = ' id="' . $oxsn_helpful_shortcodes_breadcrumbs_id . '" ';

		endif;

		$oxsn_helpful_shortcodes_return = '<div ' . $oxsn_helpful_shortcodes_breadcrumbs_id . ' ' . $oxsn_helpful_shortcodes_breadcrumbs_class . ' >';
			$oxsn_helpful_shortcodes_return .= '<ul>';

				if (!is_front_page()) : 

					$oxsn_helpful_shortcodes_return .= '<li><a href="' . get_home_url() . '">Home</a></li>';

					if (is_home()) :

						$blog_title = get_the_title( get_option('page_for_posts', true) );

						$oxsn_helpful_shortcodes_return .= '<li>' . $blog_title . '</li>';

					endif;

					if (is_singular('post')) :

						$blog_title = get_the_title( get_option('page_for_posts', true) );

						$oxsn_helpful_shortcodes_return .= '<li><a href="' . get_permalink( get_option( 'page_for_posts' ) ) . '">' . $blog_title . '</a></li>';

					endif;

					if (is_post_type_archive()) : 

						$post_type = get_post_type();
						$post_type_object = get_post_type_object($post_type);
						$post_type_name = $post_type_object->labels->singular_name;

						$oxsn_helpful_shortcodes_return .= '<li>' . $post_type_name . '</li>';

					endif;

					if (!is_singular('post') && !is_page()) :

						if (is_singular()) : 

							$post_type = get_post_type();
							$post_type_object = get_post_type_object($post_type);
							$post_type_name = $post_type_object->labels->singular_name;

							$oxsn_helpful_shortcodes_return .= '<li><a href="' . get_post_type_archive_link($post_type) . '">' . $post_type_name . '</a></li>';

						endif;

					endif;

					global $post;
					if ( $post->post_parent ) {

						$ancestors = get_post_ancestors( $post->ID );
						
						foreach( array_reverse($ancestors) as $ancestor ) {
							$ancestor_id = get_page( $ancestor )->ID;
							$oxsn_helpful_shortcodes_return .= '<li><a href="' . get_permalink($ancestor_id) . '">' . get_page( $ancestor )->post_title . '</a></li>';
						}

					}

					if (is_singular()) :

						$oxsn_helpful_shortcodes_return .= '<li>' . get_the_title() . '</li>';

					endif;

					if(is_archive() && !is_post_type_archive()) :

						$oxsn_helpful_shortcodes_return .= '<li>' . get_the_archive_title() . '</li>';

					endif;

					if (is_search()) :

						$oxsn_helpful_shortcodes_return .= '<li>Search</li>';
						$oxsn_helpful_shortcodes_return .= '<li>' . get_search_query() . '</li>';

					endif;

					if (is_author()) :

						$oxsn_helpful_shortcodes_return .= '<li>User</li>';
						$oxsn_helpful_shortcodes_return .= '<li>' . get_the_author() . '</li>';

					endif;

					if (is_404()) :

						$oxsn_helpful_shortcodes_return .= '<li>404</li>';

					endif;

				endif;

			$oxsn_helpful_shortcodes_return .= '</ul>';
		$oxsn_helpful_shortcodes_return .= '</div>';

		return $oxsn_helpful_shortcodes_return;

	}

}

//[oxsn_list_pages post_type="page" class=""]
if ( ! function_exists ( 'oxsn_helpful_shortcodes_list_pages_shortcode' ) ) {

	add_shortcode('oxsn_list_pages', 'oxsn_helpful_shortcodes_list_pages_shortcode');
	function oxsn_helpful_shortcodes_list_pages_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
			'child_of' => '',
			'authors' => '',
			'date_format' => '',
			'depth' => '',
			'echo' => '0',
			'exclude' => '',
			'include' => '',
			'link_after' => '',
			'link_before' => '',
			'post_type' => 'page',
			'post_status' => '',
			'show_date' => '',
			'sort_column' => 'menu_order',
			'title_li' => '',
			'walker' => '',
			'exclude_tree' => '',
		), $atts );

		$oxsn_helpful_shortcodes_list_pages_class = esc_attr($a['class']);
		if ($oxsn_helpful_shortcodes_list_pages_class != '') :

			$oxsn_helpful_shortcodes_list_pages_class = ' class="oxsn_list_pages ' . $oxsn_helpful_shortcodes_list_pages_class . '" ';

		else : 

			$oxsn_helpful_shortcodes_list_pages_class = ' class="oxsn_list_pages" ';

		endif;

		$oxsn_helpful_shortcodes_list_pages_id = esc_attr($a['id']);
		if ($oxsn_helpful_shortcodes_list_pages_id != '') :

			$oxsn_helpful_shortcodes_list_pages_id = ' id="' . $oxsn_helpful_shortcodes_list_pages_id . '" ';

		endif;

		$args = array();

		$oxsn_helpful_shortcodes_list_pages_child_of = esc_attr($a['child_of']);
		if ($oxsn_helpful_shortcodes_list_pages_child_of != '') :

			$args['child_of'] = $oxsn_helpful_shortcodes_list_pages_child_of;

		endif;

		$oxsn_helpful_shortcodes_list_pages_authors = esc_attr($a['authors']);
		if ($oxsn_helpful_shortcodes_list_pages_authors != '') :

			$args['authors'] = $oxsn_helpful_shortcodes_list_pages_authors;

		endif;
		
		$oxsn_helpful_shortcodes_list_pages_date_format = esc_attr($a['date_format']);
		if ($oxsn_helpful_shortcodes_list_pages_date_format != '') :

			$args['date_format'] = $oxsn_helpful_shortcodes_list_pages_date_format;

		endif;
		
		$oxsn_helpful_shortcodes_list_pages_depth = esc_attr($a['depth']);
		if ($oxsn_helpful_shortcodes_list_pages_depth != '') :

			$args['depth'] = $oxsn_helpful_shortcodes_list_pages_depth;

		endif;
		
		$oxsn_helpful_shortcodes_list_pages_echo = esc_attr($a['echo']);
		if ($oxsn_helpful_shortcodes_list_pages_echo != '') :

			$args['echo'] = $oxsn_helpful_shortcodes_list_pages_echo;

		endif;
		
		$oxsn_helpful_shortcodes_list_pages_exclude = esc_attr($a['exclude']);
		if ($oxsn_helpful_shortcodes_list_pages_exclude != '') :

			$args['exclude'] = $oxsn_helpful_shortcodes_list_pages_exclude;

		endif;
		
		$oxsn_helpful_shortcodes_list_pages_include = esc_attr($a['include']);
		if ($oxsn_helpful_shortcodes_list_pages_include != '') :

			$args['include'] = $oxsn_helpful_shortcodes_list_pages_include;

		endif;
		
		$oxsn_helpful_shortcodes_list_pages_link_after = esc_attr($a['link_after']);
		if ($oxsn_helpful_shortcodes_list_pages_link_after != '') :

			$args['link_after'] = $oxsn_helpful_shortcodes_list_pages_link_after;

		endif;
		
		$oxsn_helpful_shortcodes_list_pages_link_before = esc_attr($a['link_before']);
		if ($oxsn_helpful_shortcodes_list_pages_link_before != '') :

			$args['link_before'] = $oxsn_helpful_shortcodes_list_pages_link_before;

		endif;
		
		$oxsn_helpful_shortcodes_list_pages_post_type = esc_attr($a['post_type']);
		if ($oxsn_helpful_shortcodes_list_pages_post_type != '') :

			$args['post_type'] = $oxsn_helpful_shortcodes_list_pages_post_type;

		endif;
		
		$oxsn_helpful_shortcodes_list_pages_post_status = esc_attr($a['post_status']);
		if ($oxsn_helpful_shortcodes_list_pages_post_status != '') :

			$args['post_status'] = $oxsn_helpful_shortcodes_list_pages_post_status;

		endif;
		
		$oxsn_helpful_shortcodes_list_pages_show_date = esc_attr($a['show_date']);
		if ($oxsn_helpful_shortcodes_list_pages_show_date != '') :

			$args['show_date'] = $oxsn_helpful_shortcodes_list_pages_show_date;

		endif;
		
		$oxsn_helpful_shortcodes_list_pages_sort_column = esc_attr($a['sort_column']);
		if ($oxsn_helpful_shortcodes_list_pages_sort_column != '') :

			$args['sort_column'] = $oxsn_helpful_shortcodes_list_pages_sort_column;

		endif;
		
		$oxsn_helpful_shortcodes_list_pages_title_li = esc_attr($a['title_li']);
		if ($oxsn_helpful_shortcodes_list_pages_title_li != '') :

			$args['title_li'] = $oxsn_helpful_shortcodes_list_pages_title_li;

		endif;
		
		$oxsn_helpful_shortcodes_list_pages_walker = esc_attr($a['walker']);
		if ($oxsn_helpful_shortcodes_list_pages_walker != '') :

			$args['walker'] = $oxsn_helpful_shortcodes_list_pages_walker;

		endif;
		
		$oxsn_helpful_shortcodes_list_pages_exclude_tree = esc_attr($a['exclude_tree']);
		if ($oxsn_helpful_shortcodes_list_pages_exclude_tree != '') :

			$args['exclude_tree'] = $oxsn_helpful_shortcodes_list_pages_exclude_tree;

		endif;

		$oxsn_helpful_shortcodes_return=
		'<ul ' . $oxsn_helpful_shortcodes_list_pages_id . ' ' . $oxsn_helpful_shortcodes_list_pages_class . ' >'.
			wp_list_pages( $args ) .
		'</ul>';

		return $oxsn_helpful_shortcodes_return;

	}

}

//[oxsn_wp_query post_type="any" posts_per_page="-1" pagination="true"]
if ( ! function_exists ( 'oxsn_wp_query_shortcode' ) ) {

	add_shortcode('oxsn_wp_query', 'oxsn_wp_query_shortcode');
	function oxsn_wp_query_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(

			'author' => '',
			'author_name' => '',
			'author__in' => '',
			'author__not_in' => '',

			'cat' => '',
			'category_name' => '',
			'category__and' => '',
			'category__in' => '',
			'category__not_in' => '',

			'tag' => '',
			'tag_id' => '',
			'tag__and' => '',
			'tag__in' => '',
			'tag__not_in' => '',
			'tag_slug__and' => '',
			'tag_slug__in' => '',

			'tax_query_relation' => '',
			'tax_query_one_taxonomy' => '',
			'tax_query_one_field' => '',
			'tax_query_one_terms' => '',
			'tax_query_one_include_children' => '',
			'tax_query_one_operator' => '',
			'tax_query_two_taxonomy' => '',
			'tax_query_two_field' => '',
			'tax_query_two_terms' => '',
			'tax_query_two_include_children' => '',
			'tax_query_two_operator' => '',

			'p' => '',
			'name' => '',
			'page_id' => '',
			'pagename' => '',
			'post_parent' => '',
			'post_parent__in' => '',
			'post_parent__not_in' => '',
			'post__in' => '',
			'post__not_in' => '',
			'has_password' => '',

			'post_password' => '',
			'post_type' => 'any',

			'post_status' => '',

			'posts_per_page' => '-1',

			'posts_per_archive_page' => '',

			'pagination' => '',

			'offset' => '',

			'order' => '',
			'orderby' => '',

			'year' => '',
			'monthnum' => '',
			'w' => '',
			'day' => '',
			'hour' => '',
			'minute' => '',
			'second' => '',
			'm' => '',

			'date_query_year' => '',
			'date_query_month' => '',
			'date_query_week' => '',
			'date_query_day' => '',
			'date_query_hour' => '',
			'date_query_minute' => '',
			'date_query_second' => '',
			'date_query_after' => '',
			'date_query_after_year' => '',
			'date_query_after_month' => '',
			'date_query_after_day' => '',
			'date_query_before' => '',
			'date_query_before_year' => '',
			'date_query_before_month' => '',
			'date_query_before_day' => '',
			'date_query_inclusive' => '',
			'date_query_compare' => '',
			'date_query_column' => '',
			'date_query_relation' => '',

			'meta_key' => '',
			'meta_value' => '',
			'meta_value_num' => '',
			'meta_compare' => '',

			'meta_query_relation' => '',
			'meta_query_one_key' => '',
			'meta_query_one_value' => '',
			'meta_query_one_type' => '',
			'meta_query_one_compare' => '',
			'meta_query_two_key' => '',
			'meta_query_two_value' => '',
			'meta_query_two_type' => '',
			'meta_query_two_compare' => '',

			'perm' => '',

			's' => '',
		), $atts );
		
		$args = array();

		$oxsn_wp_query_author = esc_attr($a['author']);
		if ($oxsn_wp_query_author != '') :

			$args['author'] = $oxsn_wp_query_author;

		endif;
		$oxsn_wp_query_author_name = esc_attr($a['author_name']);
		if ($oxsn_wp_query_author_name != '') :

			$args['author_name'] = $oxsn_wp_query_author_name;

		endif;
		$oxsn_wp_query_author__in = esc_attr($a['author__in']);
		if ($oxsn_wp_query_author__in != '') :

			$oxsn_wp_query_author__in = explode(',', $oxsn_wp_query_author__in);
			$args['author__in'] = $oxsn_wp_query_author__in;

		endif;
		$oxsn_wp_query_author__not_in = esc_attr($a['author__not_in']);
		if ($oxsn_wp_query_author__not_in != '') :

			$oxsn_wp_query_author__not_in = explode(',', $oxsn_wp_query_author__not_in);
			$args['author__not_in'] = $oxsn_wp_query_author__not_in;

		endif;

		$oxsn_wp_query_cat = esc_attr($a['cat']);
		if ($oxsn_wp_query_cat != '') :

			$args['cat'] = $oxsn_wp_query_cat;

		endif;
		$oxsn_wp_query_category_name = esc_attr($a['category_name']);
		if ($oxsn_wp_query_category_name != '') :

			$args['category_name'] = $oxsn_wp_query_category_name;

		endif;
		$oxsn_wp_query_category__and = esc_attr($a['category__and']);
		if ($oxsn_wp_query_category__and != '') :

			$oxsn_wp_query_category__and = explode(',', $oxsn_wp_query_category__and);
			$args['category__and'] = $oxsn_wp_query_category__and;

		endif;
		$oxsn_wp_query_category__in = esc_attr($a['category__in']);
		if ($oxsn_wp_query_category__in != '') :

			$oxsn_wp_query_category__in = explode(',', $oxsn_wp_query_category__in);
			$args['category__in'] = $oxsn_wp_query_category__in;

		endif;
		$oxsn_wp_query_category__not_in = esc_attr($a['category__not_in']);
		if ($oxsn_wp_query_category__not_in != '') :

			$oxsn_wp_query_category__not_in = explode(',', $oxsn_wp_query_category__not_in);
			$args['category__not_in'] = $oxsn_wp_query_category__not_in;

		endif;

		$oxsn_wp_query_tag = esc_attr($a['tag']);
		if ($oxsn_wp_query_tag != '') :

			$args['tag'] = $oxsn_wp_query_tag;

		endif;
		$oxsn_wp_query_tag_id = esc_attr($a['tag_id']);
		if ($oxsn_wp_query_tag_id != '') :

			$args['tag_id'] = $oxsn_wp_query_tag_id;

		endif;
		$oxsn_wp_query_tag__and = esc_attr($a['tag__and']);
		if ($oxsn_wp_query_tag__and != '') :

			$oxsn_wp_query_tag__and = explode(',', $oxsn_wp_query_tag__and);
			$args['tag__and'] = $oxsn_wp_query_tag__and;

		endif;
		$oxsn_wp_query_tag__in = esc_attr($a['tag__in']);
		if ($oxsn_wp_query_tag__in != '') :

			$oxsn_wp_query_tag__in = explode(',', $oxsn_wp_query_tag__in);
			$args['tag__in'] = $oxsn_wp_query_tag__in;

		endif;
		$oxsn_wp_query_tag__not_in = esc_attr($a['tag__not_in']);
		if ($oxsn_wp_query_tag__not_in != '') :

			$oxsn_wp_query_tag__not_in = explode(',', $oxsn_wp_query_tag__not_in);
			$args['tag__not_in'] = $oxsn_wp_query_tag__not_in;

		endif;
		$oxsn_wp_query_tag_slug__and = esc_attr($a['tag_slug__and']);
		if ($oxsn_wp_query_tag_slug__and != '') :

			$oxsn_wp_query_tag_slug__and = explode(',', $oxsn_wp_query_tag_slug__and);
			$args['tag_slug__and'] = $oxsn_wp_query_tag_slug__and;

		endif;
		$oxsn_wp_query_tag_slug__in = esc_attr($a['tag_slug__in']);
		if ($oxsn_wp_query_tag_slug__in != '') :

			$oxsn_wp_query_tag_slug__in = explode(',', $oxsn_wp_query_tag_slug__in);
			$args['tag_slug__in'] = $oxsn_wp_query_tag_slug__in;

		endif;

		$oxsn_wp_query_tax_query = array();
		$oxsn_wp_query_tax_query_array_one = array();
		$oxsn_wp_query_tax_query_array_two = array();
		$oxsn_wp_query_tax_query_relation = esc_attr($a['tax_query_relation']);
		$oxsn_wp_query_tax_query_one_taxonomy = esc_attr($a['tax_query_one_taxonomy']);
		$oxsn_wp_query_tax_query_one_field = esc_attr($a['tax_query_one_field']);
		$oxsn_wp_query_tax_query_one_terms = esc_attr($a['tax_query_one_terms']);
		$oxsn_wp_query_tax_query_one_include_children = esc_attr($a['tax_query_one_include_children']);
		$oxsn_wp_query_tax_query_one_operator = esc_attr($a['tax_query_one_operator']);
		$oxsn_wp_query_tax_query_two_taxonomy = esc_attr($a['tax_query_two_taxonomy']);
		$oxsn_wp_query_tax_query_two_field = esc_attr($a['tax_query_two_field']);
		$oxsn_wp_query_tax_query_two_terms = esc_attr($a['tax_query_two_terms']);
		$oxsn_wp_query_tax_query_two_include_children = esc_attr($a['tax_query_two_include_children']);
		$oxsn_wp_query_tax_query_two_operator = esc_attr($a['tax_query_two_operator']);
		if ($oxsn_wp_query_tax_query_relation != '') :

			$oxsn_wp_query_tax_query['relation'] = $oxsn_wp_query_tax_query_relation;

		endif;
		if ($oxsn_wp_query_tax_query_one_taxonomy != '') :

			$oxsn_wp_query_tax_query_array_one['taxonomy'] = $oxsn_wp_query_tax_query_one_taxonomy;

		endif;
		if ($oxsn_wp_query_tax_query_one_field != '') :

			$oxsn_wp_query_tax_query_array_one['field'] = $oxsn_wp_query_tax_query_one_field;

		endif;
		if ($oxsn_wp_query_tax_query_one_terms != '') :

			$oxsn_wp_query_tax_query_one_terms = explode(',', $oxsn_wp_query_tax_query_one_terms);
			$oxsn_wp_query_tax_query_array_one['terms'] = $oxsn_wp_query_tax_query_one_terms;

		endif;
		if ($oxsn_wp_query_tax_query_one_include_children != '') :

			$oxsn_wp_query_tax_query_array_one['include_children'] = $oxsn_wp_query_tax_query_one_include_children;

		endif;
		if ($oxsn_wp_query_tax_query_one_operator != '') :

			$oxsn_wp_query_tax_query_array_one['operator'] = $oxsn_wp_query_tax_query_one_operator;

		endif;
		if ($oxsn_wp_query_tax_query_two_taxonomy != '') :

			$oxsn_wp_query_tax_query_array_two['taxonomy'] = $oxsn_wp_query_tax_query_two_taxonomy;

		endif;
		if ($oxsn_wp_query_tax_query_two_field != '') :

			$oxsn_wp_query_tax_query_array_two['field'] = $oxsn_wp_query_tax_query_two_field;

		endif;
		if ($oxsn_wp_query_tax_query_two_terms != '') :

			$oxsn_wp_query_tax_query_two_terms = explode(',', $oxsn_wp_query_tax_query_two_terms);
			$oxsn_wp_query_tax_query_array_two['terms'] = $oxsn_wp_query_tax_query_two_terms;

		endif;
		if ($oxsn_wp_query_tax_query_two_include_children != '') :

			$oxsn_wp_query_tax_query_array_two['include_children'] = $oxsn_wp_query_tax_query_two_include_children;

		endif;
		if ($oxsn_wp_query_tax_query_two_operator != '') :

			$oxsn_wp_query_tax_query_array_two['operator'] = $oxsn_wp_query_tax_query_two_operator;

		endif;
		if ($oxsn_wp_query_tax_query_one_taxonomy != '' && $oxsn_wp_query_tax_query_two_taxonomy != '') :

			array_push($oxsn_wp_query_tax_query, $oxsn_wp_query_tax_query_array_one, $oxsn_wp_query_tax_query_array_two);
			$args['tax_query'] = $oxsn_wp_query_tax_query;

		elseif ($oxsn_wp_query_tax_query_one_taxonomy != '') :

			array_push($oxsn_wp_query_tax_query, $oxsn_wp_query_tax_query_array_one);
			$args['tax_query'] = $oxsn_wp_query_tax_query;

		elseif ($oxsn_wp_query_tax_query_two_taxonomy != '') :

			array_push($oxsn_wp_query_tax_query, $oxsn_wp_query_tax_query_array_two);
			$args['tax_query'] = $oxsn_wp_query_tax_query;

		endif;

		$oxsn_wp_query_p = esc_attr($a['p']);
		if ($oxsn_wp_query_p != '') :

			$args['p'] = $oxsn_wp_query_p;

		endif;
		$oxsn_wp_query_name = esc_attr($a['name']);
		if ($oxsn_wp_query_name != '') :

			$args['name'] = $oxsn_wp_query_name;

		endif;
		$oxsn_wp_query_page_id = esc_attr($a['page_id']);
		if ($oxsn_wp_query_page_id != '') :

			$args['page_id'] = $oxsn_wp_query_page_id;

		endif;
		$oxsn_wp_query_pagename = esc_attr($a['pagename']);
		if ($oxsn_wp_query_pagename != '') :

			$args['pagename'] = $oxsn_wp_query_pagename;

		endif;
		$oxsn_wp_query_post_parent = esc_attr($a['post_parent']);
		if ($oxsn_wp_query_post_parent != '') :

			$args['post_parent'] = $oxsn_wp_query_post_parent;

		endif;
		$oxsn_wp_query_post_parent__in = esc_attr($a['post_parent__in']);
		if ($oxsn_wp_query_post_parent__in != '') :

			$oxsn_wp_query_post_parent__in = explode(',', $oxsn_wp_query_post_parent__in);
			$args['post_parent__in'] = $oxsn_wp_query_post_parent__in;

		endif;
		$oxsn_wp_query_post_parent__not_in = esc_attr($a['post_parent__not_in']);
		if ($oxsn_wp_query_post_parent__not_in != '') :

			$oxsn_wp_query_post_parent__not_in = explode(',', $oxsn_wp_query_post_parent__not_in);
			$args['post_parent__not_in'] = $oxsn_wp_query_post_parent__not_in;

		endif;
		$oxsn_wp_query_post__in = esc_attr($a['post__in']);
		if ($oxsn_wp_query_post__in != '') :

			$oxsn_wp_query_post__in = explode(',', $oxsn_wp_query_post__in);
			$args['post__in'] = $oxsn_wp_query_post__in;

		endif;
		$oxsn_wp_query_post__not_in = esc_attr($a['post__not_in']);
		if ($oxsn_wp_query_post__not_in != '') :

			$oxsn_wp_query_post__not_in = explode(',', $oxsn_wp_query_post__not_in);
			$args['post__not_in'] = $oxsn_wp_query_post__not_in;

		endif;

		$oxsn_wp_query_has_password = esc_attr($a['has_password']);
		if ($oxsn_wp_query_has_password != '') :

			$args['has_password'] = $oxsn_wp_query_has_password;

		endif;
		$oxsn_wp_query_post_password = esc_attr($a['post_password']);
		if ($oxsn_wp_query_post_password != '') :

			$args['post_password'] = $oxsn_wp_query_post_password;

		endif;

		$oxsn_wp_query_post_type = esc_attr($a['post_type']);
		if ($oxsn_wp_query_post_type != '') :

			$oxsn_wp_query_post_type = explode(',', $oxsn_wp_query_post_type);
			$args['post_type'] = $oxsn_wp_query_post_type;

		endif;

		$oxsn_wp_query_post_status = esc_attr($a['post_status']);
		if ($oxsn_wp_query_post_status != '') :

			$oxsn_wp_query_post_status = explode(',', $oxsn_wp_query_post_status);
			$args['post_status'] = $oxsn_wp_query_post_status;

		endif;

		$oxsn_wp_query_posts_per_page = esc_attr($a['posts_per_page']);
		if ($oxsn_wp_query_posts_per_page != '') :

			$args['posts_per_page'] = $oxsn_wp_query_posts_per_page;

		endif;

		$oxsn_wp_query_posts_per_archive_page = esc_attr($a['posts_per_archive_page']);
		if ($oxsn_wp_query_posts_per_archive_page != '') :

			$args['posts_per_archive_page'] = $oxsn_wp_query_posts_per_archive_page;

		endif;

		$oxsn_wp_query_pagination = esc_attr($a['pagination']);
		if ($oxsn_wp_query_pagination == 'true') :

			$args['paged'] = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

		endif;

		$oxsn_wp_query_offset = esc_attr($a['offset']);
		if ($oxsn_wp_query_offset != '') :

			$args['offset'] = $oxsn_wp_query_offset;

		endif;

		$oxsn_wp_query_order = esc_attr($a['order']);
		if ($oxsn_wp_query_order != '') :

			$args['order'] = $oxsn_wp_query_order;

		endif;
		$oxsn_wp_query_orderby = esc_attr($a['orderby']);
		if ($oxsn_wp_query_orderby != '') :

			$args['orderby'] = $oxsn_wp_query_orderby;

		endif;

		$oxsn_wp_query_year = esc_attr($a['year']);
		if ($oxsn_wp_query_year != '') :

			$args['year'] = $oxsn_wp_query_year;

		endif;
		$oxsn_wp_query_monthnum = esc_attr($a['monthnum']);
		if ($oxsn_wp_query_monthnum != '') :

			$args['monthnum'] = $oxsn_wp_query_monthnum;

		endif;
		$oxsn_wp_query_w = esc_attr($a['w']);
		if ($oxsn_wp_query_w != '') :

			$args['w'] = $oxsn_wp_query_w;

		endif;
		$oxsn_wp_query_day = esc_attr($a['day']);
		if ($oxsn_wp_query_day != '') :

			$args['day'] = $oxsn_wp_query_day;

		endif;
		$oxsn_wp_query_hour = esc_attr($a['hour']);
		if ($oxsn_wp_query_hour != '') :

			$args['hour'] = $oxsn_wp_query_hour;

		endif;
		$oxsn_wp_query_minute = esc_attr($a['minute']);
		if ($oxsn_wp_query_minute != '') :

			$args['minute'] = $oxsn_wp_query_minute;

		endif;
		$oxsn_wp_query_second = esc_attr($a['second']);
		if ($oxsn_wp_query_second != '') :

			$args['second'] = $oxsn_wp_query_second;

		endif;
		$oxsn_wp_query_m = esc_attr($a['m']);
		if ($oxsn_wp_query_m != '') :

			$args['m'] = $oxsn_wp_query_m;

		endif;

		$oxsn_wp_query_date_query = array();
		$oxsn_wp_query_date_query_array_after = array();
		$oxsn_wp_query_date_query_array_before = array();
		$oxsn_wp_query_date_query_year = esc_attr($a['date_query_year']);
		$oxsn_wp_query_date_query_month = esc_attr($a['date_query_month']);
		$oxsn_wp_query_date_query_week = esc_attr($a['date_query_week']);
		$oxsn_wp_query_date_query_day = esc_attr($a['date_query_day']);
		$oxsn_wp_query_date_query_hour = esc_attr($a['date_query_hour']);
		$oxsn_wp_query_date_query_minute = esc_attr($a['date_query_minute']);
		$oxsn_wp_query_date_query_second = esc_attr($a['date_query_second']);
		$oxsn_wp_query_date_query_after_year = esc_attr($a['date_query_after_year']);
		$oxsn_wp_query_date_query_after_month = esc_attr($a['date_query_after_month']);
		$oxsn_wp_query_date_query_after_day = esc_attr($a['date_query_after_day']);
		$oxsn_wp_query_date_query_before_year = esc_attr($a['date_query_before_year']);
		$oxsn_wp_query_date_query_before_month = esc_attr($a['date_query_before_month']);
		$oxsn_wp_query_date_query_before_day = esc_attr($a['date_query_before_day']);
		$oxsn_wp_query_date_query_inclusive = esc_attr($a['date_query_inclusive']);
		$oxsn_wp_query_date_query_compare = esc_attr($a['date_query_compare']);
		$oxsn_wp_query_date_query_column = esc_attr($a['date_query_column']);
		$oxsn_wp_query_date_query_relation = esc_attr($a['date_query_relation']);
		if ($oxsn_wp_query_date_query_year != '') :

			$oxsn_wp_query_date_query['year'] = $oxsn_wp_query_date_query_year;

		endif;
		if ($oxsn_wp_query_date_query_month != '') :

			$oxsn_wp_query_date_query['month'] = $oxsn_wp_query_date_query_month;

		endif;
		if ($oxsn_wp_query_date_query_week != '') :

			$oxsn_wp_query_date_query['week'] = $oxsn_wp_query_date_query_week;

		endif;
		if ($oxsn_wp_query_date_query_day != '') :

			$oxsn_wp_query_date_query['day'] = $oxsn_wp_query_date_query_day;

		endif;
		if ($oxsn_wp_query_date_query_hour != '') :

			$oxsn_wp_query_date_query['hour'] = $oxsn_wp_query_date_query_hour;

		endif;
		if ($oxsn_wp_query_date_query_minute != '') :

			$oxsn_wp_query_date_query['minute'] = $oxsn_wp_query_date_query_minute;

		endif;
		if ($oxsn_wp_query_date_query_second != '') :

			$oxsn_wp_query_date_query['second'] = $oxsn_wp_query_date_query_second;

		endif;
		if ($oxsn_wp_query_date_query_after_year != '') :

			$oxsn_wp_query_date_query_array_after['year'] = $oxsn_wp_query_date_query_after_year;

		endif;
		if ($oxsn_wp_query_date_query_after_month != '') :

			$oxsn_wp_query_date_query_array_after['month'] = $oxsn_wp_query_date_query_after_month;

		endif;
		if ($oxsn_wp_query_date_query_after_day != '') :

			$oxsn_wp_query_date_query_array_after['day'] = $oxsn_wp_query_date_query_after_day;

		endif;
		if ($oxsn_wp_query_date_query_before_year != '') :

			$oxsn_wp_query_date_query_array_before['year'] = $oxsn_wp_query_date_query_before_year;

		endif;
		if ($oxsn_wp_query_date_query_before_month != '') :

			$oxsn_wp_query_date_query_array_before['month'] = $oxsn_wp_query_date_query_before_month;

		endif;
		if ($oxsn_wp_query_date_query_before_day != '') :

			$oxsn_wp_query_date_query_array_before['day'] = $oxsn_wp_query_date_query_before_day;

		endif;

		if ($oxsn_wp_query_date_query_inclusive != '') :

			$oxsn_wp_query_date_query['inclusive'] = $oxsn_wp_query_date_query_inclusive;

		endif;
		if ($oxsn_wp_query_date_query_compare != '') :

			$oxsn_wp_query_date_query['compare'] = $oxsn_wp_query_date_query_compare;

		endif;
		if ($oxsn_wp_query_date_query_column != '') :

			$oxsn_wp_query_date_query['column'] = $oxsn_wp_query_date_query_column;

		endif;
		if ($oxsn_wp_query_date_query_relation != '') :

			$oxsn_wp_query_date_query['relation'] = $oxsn_wp_query_date_query_relation;

		endif;
		if (!empty($oxsn_wp_query_date_query_array_after) && !empty($oxsn_wp_query_date_query_array_before)) :

			$oxsn_wp_query_date_query['after'] = $oxsn_wp_query_date_query_array_after;
			$oxsn_wp_query_date_query['before'] = $oxsn_wp_query_date_query_array_before;
			$args['date_query'] = array($oxsn_wp_query_date_query);

		elseif (!empty($oxsn_wp_query_date_query_array_after)) :

			$oxsn_wp_query_date_query['after'] = $oxsn_wp_query_date_query_array_after;
			$args['date_query'] = array($oxsn_wp_query_date_query);

		elseif (!empty($oxsn_wp_query_date_query_array_before)) :

			$oxsn_wp_query_date_query['before'] = $oxsn_wp_query_date_query_array_before;
			$args['date_query'] = array($oxsn_wp_query_date_query);

		elseif (!empty($oxsn_wp_query_date_query)) :

			$args['date_query'] = array($oxsn_wp_query_date_query);

		endif;

		$oxsn_wp_query_meta_key = esc_attr($a['meta_key']);
		if ($oxsn_wp_query_meta_key != '') :

			$args['meta_key'] = $oxsn_wp_query_meta_key;

		endif;
		$oxsn_wp_query_meta_value = esc_attr($a['meta_value']);
		if ($oxsn_wp_query_meta_value != '') :

			$args['meta_value'] = $oxsn_wp_query_meta_value;

		endif;
		$oxsn_wp_query_meta_value_num = esc_attr($a['meta_value_num']);
		if ($oxsn_wp_query_meta_value_num != '') :

			$args['meta_value_num'] = $oxsn_wp_query_meta_value_num;

		endif;
		$oxsn_wp_query_meta_compare = esc_attr($a['meta_compare']);
		if ($oxsn_wp_query_meta_compare != '') :

			$args['meta_compare'] = $oxsn_wp_query_meta_compare;

		endif;

		$oxsn_wp_query_meta_query = array();
		$oxsn_wp_query_meta_query_array_one = array();
		$oxsn_wp_query_meta_query_array_two = array();
		$oxsn_wp_query_meta_query_relation = esc_attr($a['meta_query_relation']);
		$oxsn_wp_query_meta_query_one_key = esc_attr($a['meta_query_one_key']);
		$oxsn_wp_query_meta_query_one_value = esc_attr($a['meta_query_one_value']);
		$oxsn_wp_query_meta_query_one_type = esc_attr($a['meta_query_one_type']);
		$oxsn_wp_query_meta_query_one_compare = esc_attr($a['meta_query_one_compare']);
		$oxsn_wp_query_meta_query_two_key = esc_attr($a['meta_query_two_key']);
		$oxsn_wp_query_meta_query_two_value = esc_attr($a['meta_query_two_value']);
		$oxsn_wp_query_meta_query_two_type = esc_attr($a['meta_query_two_type']);
		$oxsn_wp_query_meta_query_two_compare = esc_attr($a['meta_query_two_compare']);
		if ($oxsn_wp_query_meta_query_relation != '') :

			$oxsn_wp_query_meta_query['relation'] = $oxsn_wp_query_meta_query_relation;

		endif;
		if ($oxsn_wp_query_meta_query_one_key != '') :

			$oxsn_wp_query_meta_query_array_one['key'] = $oxsn_wp_query_meta_query_one_key;

		endif;
		if ($oxsn_wp_query_meta_query_one_value != '') :

			$oxsn_wp_query_meta_query_array_one['value'] = $oxsn_wp_query_meta_query_one_value;

		endif;
		if ($oxsn_wp_query_meta_query_one_type != '') :

			$oxsn_wp_query_meta_query_array_one['type'] = $oxsn_wp_query_meta_query_one_type;

		endif;
		if ($oxsn_wp_query_meta_query_one_compare != '') :

			$oxsn_wp_query_meta_query_array_one['compare'] = $oxsn_wp_query_meta_query_one_compare;

		endif;
		if ($oxsn_wp_query_meta_query_two_key != '') :

			$oxsn_wp_query_meta_query_array_two['key'] = $oxsn_wp_query_meta_query_two_key;

		endif;
		if ($oxsn_wp_query_meta_query_two_value != '') :

			$oxsn_wp_query_meta_query_array_two['value'] = $oxsn_wp_query_meta_query_two_value;

		endif;
		if ($oxsn_wp_query_meta_query_two_type != '') :

			$oxsn_wp_query_meta_query_array_two['type'] = $oxsn_wp_query_meta_query_two_type;

		endif;
		if ($oxsn_wp_query_meta_query_two_compare != '') :

			$oxsn_wp_query_meta_query_array_two['compare'] = $oxsn_wp_query_meta_query_two_compare;

		endif;
		if ($oxsn_wp_query_meta_query_one_key != '' && $oxsn_wp_query_meta_query_two_key != '') :

			array_push($oxsn_wp_query_meta_query, $oxsn_wp_query_meta_query_array_one, $oxsn_wp_query_meta_query_array_two);
			$args['meta_query'] = $oxsn_wp_query_meta_query;

		elseif ($oxsn_wp_query_meta_query_one_key != '') :

			array_push($oxsn_wp_query_meta_query, $oxsn_wp_query_meta_query_array_one);
			$args['meta_query'] = $oxsn_wp_query_meta_query;

		elseif ($oxsn_wp_query_meta_query_two_key != '') :

			array_push($oxsn_wp_query_meta_query, $oxsn_wp_query_meta_query_array_two);
			$args['meta_query'] = $oxsn_wp_query_meta_query;

		endif;

		$oxsn_wp_query_perm = esc_attr($a['perm']);
		if ($oxsn_wp_query_perm != '') :

			$args['perm'] = $oxsn_wp_query_perm;

		endif;

		$oxsn_wp_query_s = esc_attr($a['s']);
		if ($oxsn_wp_query_s != '') :

			$args['s'] = $oxsn_wp_query_s;

		endif;
		
		$oxsn_wp_query = new WP_Query( $args );
		$oxsn_helpful_shortcodes_return = '';

		while ( $oxsn_wp_query->have_posts() ) : $oxsn_wp_query->the_post();
			$oxsn_helpful_shortcodes_return .=
			do_shortcode($content);
		endwhile;

		if ($oxsn_wp_query_pagination == 'true') :
			$big = 999999999;
			$pagination_content = 
			'<div class="pagination">';
			$pagination_content .=  
			paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'total' => $oxsn_wp_query->max_num_pages
			) );	
			$pagination_content .= 
			'</div>';
		else :
			$pagination_content = '';
		endif;

		$oxsn_helpful_shortcodes_return .= $pagination_content;

		$oxsn_helpful_shortcodes_return .= '';

		wp_reset_postdata();
		return $oxsn_helpful_shortcodes_return;

	}

}

//[oxsn_permalink class="" page_id=""][/oxsn_permalink]
if ( ! function_exists ( 'oxsn_helpful_shortcodes_permalink_shortcode' ) ) {
	
	add_shortcode('oxsn_permalink', 'oxsn_helpful_shortcodes_permalink_shortcode');
	function oxsn_helpful_shortcodes_permalink_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
			'page_id' => '',
		), $atts );

		$oxsn_helpful_shortcodes_permalink_class = esc_attr($a['class']);
		if ($oxsn_helpful_shortcodes_permalink_class != '') :

			$oxsn_helpful_shortcodes_permalink_class = ' class="oxsn_permalink ' . $oxsn_helpful_shortcodes_permalink_class . '" ';

		else : 

			$oxsn_helpful_shortcodes_permalink_class = ' class="oxsn_permalink" ';

		endif;

		$oxsn_helpful_shortcodes_permalink_id = esc_attr($a['id']);
		if ($oxsn_helpful_shortcodes_permalink_id != '') :

			$oxsn_helpful_shortcodes_permalink_id = ' id="' . $oxsn_helpful_shortcodes_permalink_id . '" ';

		endif;

		$oxsn_helpful_shortcodes_permalink_page_id = esc_attr($a['page_id']);
		if ($oxsn_helpful_shortcodes_permalink_page_id != '') :

			$oxsn_helpful_shortcodes_permalink = get_permalink($oxsn_helpful_shortcodes_permalink_page_id);
			$oxsn_helpful_shortcodes_permalink = ' href="' . $oxsn_helpful_shortcodes_permalink . '" ';

		else :

			$oxsn_helpful_shortcodes_permalink = get_permalink();
			$oxsn_helpful_shortcodes_permalink = ' href="' . $oxsn_helpful_shortcodes_permalink . '" ';

		endif;

		return '<a ' . $oxsn_helpful_shortcodes_permalink_id . ' ' . $oxsn_helpful_shortcodes_permalink_class . ' ' . $oxsn_helpful_shortcodes_permalink . ' >' . do_shortcode($content) . '</a>';
		
	}

}

//[oxsn_featured_image class="" page_id=""]
if ( ! function_exists ( 'oxsn_helpful_shortcodes_featured_image_shortcode' ) ) {
	
	add_shortcode('oxsn_featured_image', 'oxsn_helpful_shortcodes_featured_image_shortcode');
	function oxsn_helpful_shortcodes_featured_image_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => '',
			'id' => '',
			'img_size' => 'thumbnail',
			'page_id' => '',
		), $atts );

		$oxsn_helpful_shortcodes_featured_image_class = esc_attr($a['class']);
		if ($oxsn_helpful_shortcodes_featured_image_class != '') :

			$oxsn_helpful_shortcodes_featured_image_class = ' class="oxsn_featured_image ' . $oxsn_helpful_shortcodes_featured_image_class . '" ';

		else : 

			$oxsn_helpful_shortcodes_featured_image_class = ' class="oxsn_featured_image" ';

		endif;

		$oxsn_helpful_shortcodes_featured_image_id = esc_attr($a['id']);
		if ($oxsn_helpful_shortcodes_featured_image_id != '') :

			$oxsn_helpful_shortcodes_featured_image_id = ' id="' . $oxsn_helpful_shortcodes_featured_image_id . '" ';

		endif;

		$oxsn_helpful_shortcodes_featured_image_img_size = esc_attr($a['img_size']);

		$oxsn_helpful_shortcodes_featured_image_page_id = esc_attr($a['page_id']);
		if ($oxsn_helpful_shortcodes_featured_image_page_id != '') :

			$url = wp_get_attachment_image_src( get_post_thumbnail_id($oxsn_helpful_shortcodes_featured_image_page_id), $oxsn_helpful_shortcodes_featured_image_img_size ); 
			$oxsn_helpful_shortcodes_featured_image_url = $url[0];

		else : 

			$url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $oxsn_helpful_shortcodes_featured_image_img_size ); 
			$oxsn_helpful_shortcodes_featured_image_url = $url[0];

		endif;

		return $oxsn_helpful_shortcodes_featured_image_url;

	}

}

//[oxsn_date format="F jS, Y" page_id=""]
if ( ! function_exists ( 'oxsn_helpful_shortcodes_date_shortcode' ) ) {

	add_shortcode('oxsn_date', 'oxsn_helpful_shortcodes_date_shortcode');
	function oxsn_helpful_shortcodes_date_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'page_id' => '',
			'format' => 'F jS, Y',
		), $atts );

		$oxsn_helpful_shortcodes_date_page_id = esc_attr($a['page_id']);
		$oxsn_helpful_shortcodes_date_format = esc_attr($a['format']);
		
		if ($oxsn_helpful_shortcodes_date_page_id != '') :

			$oxsn_helpful_shortcodes_return = get_the_time($oxsn_helpful_shortcodes_date_format, $oxsn_helpful_shortcodes_date_page_id);

		else :

			$oxsn_helpful_shortcodes_return = get_the_time($oxsn_helpful_shortcodes_date_format);

		endif;
		
		return $oxsn_helpful_shortcodes_return;
		
	}

}

//[oxsn_id]
if ( ! function_exists ( 'oxsn_helpful_shortcodes_id_shortcode' ) ) {

	add_shortcode('oxsn_id', 'oxsn_helpful_shortcodes_id_shortcode');
	function oxsn_helpful_shortcodes_id_shortcode( $atts, $content = null ) {

		$oxsn_helpful_shortcodes_return = get_the_ID();
		
		return $oxsn_helpful_shortcodes_return;
		
	}

}

//[oxsn_categories separator=", " parents="" page_id=""]
if ( ! function_exists ( 'oxsn_helpful_shortcodes_categories_shortcode' ) ) {

	add_shortcode('oxsn_categories', 'oxsn_helpful_shortcodes_categories_shortcode');
	function oxsn_helpful_shortcodes_categories_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'page_id' => '',
			'separator' => ', ',
			'parents' => '',
		), $atts );

		$oxsn_helpful_shortcodes_categories_page_id = esc_attr($a['page_id']);
		$oxsn_helpful_shortcodes_categories_separator = esc_attr($a['separator']);
		$oxsn_helpful_shortcodes_categories_parents = esc_attr($a['parents']);
		
		if ($oxsn_helpful_shortcodes_categories_page_id != '') :

			$oxsn_helpful_shortcodes_return = get_the_category_list($oxsn_helpful_shortcodes_categories_separator, $oxsn_helpful_shortcodes_categories_parents, $oxsn_helpful_shortcodes_categories_page_id);

		else :

			$oxsn_helpful_shortcodes_return = get_the_category_list($oxsn_helpful_shortcodes_categories_separator, $oxsn_helpful_shortcodes_categories_parents);

		endif;
		
		return $oxsn_helpful_shortcodes_return;
		
	}

}

//[oxsn_tags seperator=", " page_id=""]
if ( ! function_exists ( 'oxsn_helpful_shortcodes_tags_shortcode' ) ) {

	add_shortcode('oxsn_tags', 'oxsn_helpful_shortcodes_tags_shortcode');
	function oxsn_helpful_shortcodes_tags_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'page_id' => '',
			'seperator' => ', ',
		), $atts );

		$oxsn_helpful_shortcodes_tags_page_id = esc_attr($a['page_id']);
		$oxsn_helpful_shortcodes_tags_seperator = esc_attr($a['seperator']);
		
		if ($oxsn_helpful_shortcodes_tags_page_id != '') :

			$oxsn_helpful_shortcodes_tags_tags = get_the_tags($oxsn_helpful_shortcodes_tags_page_id);

		else :

			$oxsn_helpful_shortcodes_tags_tags = get_the_tags();

		endif;
		
		if ($oxsn_helpful_shortcodes_tags_tags) :

			$oxsn_helpful_shortcodes_tags_tags_last_check = $oxsn_helpful_shortcodes_tags_tags;

			$oxsn_helpful_shortcodes_return = '';

			foreach($oxsn_helpful_shortcodes_tags_tags as $tag) :

				$oxsn_helpful_shortcodes_return .= '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>';

				if (next($oxsn_helpful_shortcodes_tags_tags_last_check)) :

					$oxsn_helpful_shortcodes_return .= $oxsn_helpful_shortcodes_tags_seperator; 

				endif;
			
			endforeach;

		endif;

		return $oxsn_helpful_shortcodes_return;
		
	}

}

//[oxsn_title characters="35" page_id=""]
if ( ! function_exists ( 'oxsn_helpful_shortcodes_title_shortcode' ) ) {

	add_shortcode('oxsn_title', 'oxsn_helpful_shortcodes_title_shortcode');
	function oxsn_helpful_shortcodes_title_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'page_id' => '',
			'characters' => '35',
		), $atts );

		$oxsn_helpful_shortcodes_title_page_id = esc_attr($a['page_id']);
		$oxsn_helpful_shortcodes_title_characters = esc_attr($a['characters']);
		
		if ($oxsn_helpful_shortcodes_title_page_id != '') :

			if ($oxsn_helpful_shortcodes_title_characters != '') :

				$post = get_post($oxsn_helpful_shortcodes_title_page_id);
				$title = strip_shortcodes($post->post_title);

	 			if (strlen($title) > $oxsn_helpful_shortcodes_title_characters) :
					$oxsn_helpful_shortcodes_return = substr($title, 0, $oxsn_helpful_shortcodes_title_characters) . '...';
				else : 
					$oxsn_helpful_shortcodes_return = $title;
				endif;

			else :

				$post = get_post($oxsn_helpful_shortcodes_title_page_id);
				$title = apply_filters('the_title', $post->post_title);

	 			$oxsn_helpful_shortcodes_return = $title;

	 		endif;

		else :

			if ($oxsn_helpful_shortcodes_title_characters != '') :

				global $post;
				$title = strip_shortcodes($post->post_title);

				if (strlen($title) > $oxsn_helpful_shortcodes_title_characters) :
					$oxsn_helpful_shortcodes_return = substr($title, 0, $oxsn_helpful_shortcodes_title_characters) . '...';
				else : 
					$oxsn_helpful_shortcodes_return = $title;
				endif;

			else :

				global $post;
				$title = apply_filters('the_title', $post->post_title);

				$oxsn_helpful_shortcodes_return = $title;

			endif;

		endif;
		
		return $oxsn_helpful_shortcodes_return;
		
	}

}

//[oxsn_content characters="140" page_id=""]
if ( ! function_exists ( 'oxsn_helpful_shortcodes_content_shortcode' ) ) {

	add_shortcode('oxsn_content', 'oxsn_helpful_shortcodes_content_shortcode');
	function oxsn_helpful_shortcodes_content_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'page_id' => '',
			'characters' => '140',
		), $atts );

		$oxsn_helpful_shortcodes_content_page_id = esc_attr($a['page_id']);
		$oxsn_helpful_shortcodes_content_characters = esc_attr($a['characters']);

		if ($oxsn_helpful_shortcodes_content_page_id != '') :

			if ($oxsn_helpful_shortcodes_content_characters != '') :

				$post = get_post($oxsn_helpful_shortcodes_content_page_id);
				$content = strip_shortcodes($post->post_content);
				$content = strip_tags($content);

	 			if (strlen($content) > $oxsn_helpful_shortcodes_content_characters) :
					$oxsn_helpful_shortcodes_return = substr($content, 0, $oxsn_helpful_shortcodes_content_characters) . '...';
				else : 
					$oxsn_helpful_shortcodes_return = $content;
				endif;

			else :

				$post = get_post($oxsn_helpful_shortcodes_content_page_id);
				$content = apply_filters('the_content', $post->post_content);
				
				$oxsn_helpful_shortcodes_return = $content;

	 		endif;

		else :

			if ($oxsn_helpful_shortcodes_content_characters != '') :

				global $post;
				$content = strip_shortcodes($post->post_content);
				$content = strip_tags($content);

				if (strlen($content) > $oxsn_helpful_shortcodes_content_characters) :
					$oxsn_helpful_shortcodes_return = substr($content, 0, $oxsn_helpful_shortcodes_content_characters) . '...';
				else : 
					$oxsn_helpful_shortcodes_return = $content;
				endif;

			else :

				global $post;
				$content = apply_filters('the_content', $post->post_content);
				
				$oxsn_helpful_shortcodes_return = $content;

			endif;

		endif;
		
		return $oxsn_helpful_shortcodes_return;

	}

}

//[oxsn_excerpt characters="140" page_id=""]
if ( ! function_exists ( 'oxsn_helpful_shortcodes_excerpt_shortcode' ) ) {

	add_shortcode('oxsn_excerpt', 'oxsn_helpful_shortcodes_excerpt_shortcode');
	function oxsn_helpful_shortcodes_excerpt_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'page_id' => '',
			'characters' => '140',
		), $atts );

		$oxsn_helpful_shortcodes_excerpt_page_id = esc_attr($a['page_id']);
		$oxsn_helpful_shortcodes_excerpt_characters = esc_attr($a['characters']);

		if ($oxsn_helpful_shortcodes_excerpt_page_id != '') :

			if ($oxsn_helpful_shortcodes_excerpt_characters != '') :

				$post = get_post($oxsn_helpful_shortcodes_excerpt_page_id);
				$excerpt = strip_shortcodes($post->post_excerpt);
				$excerpt = strip_tags($excerpt);

	 			if (strlen($excerpt) > $oxsn_helpful_shortcodes_excerpt_characters) :
					$oxsn_helpful_shortcodes_return = substr($excerpt, 0, $oxsn_helpful_shortcodes_excerpt_characters) . '...';
				else : 
					$oxsn_helpful_shortcodes_return = $excerpt;
				endif;

			else :

				$post = get_post($oxsn_helpful_shortcodes_excerpt_page_id);
				$excerpt = strip_shortcodes($post->post_excerpt);
				
				$oxsn_helpful_shortcodes_return = $excerpt;

	 		endif;

		else :

			if ($oxsn_helpful_shortcodes_excerpt_characters != '') :

				global $post;
				$excerpt = strip_shortcodes($post->post_excerpt);
				$excerpt = strip_tags($excerpt);

				if (strlen($excerpt) > $oxsn_helpful_shortcodes_excerpt_characters) :
					$oxsn_helpful_shortcodes_return = substr($excerpt, 0, $oxsn_helpful_shortcodes_excerpt_characters) . '...';
				else : 
					$oxsn_helpful_shortcodes_return = $excerpt;
				endif;

			else :

				global $post;
				$excerpt = strip_shortcodes($post->post_excerpt);
				
				$oxsn_helpful_shortcodes_return = $excerpt;

			endif;

		endif;
		
		return $oxsn_helpful_shortcodes_return;

	}

}


?><?php


/* OXSN Quicktags */

if ( ! function_exists ( 'oxsn_helpful_shortcodes_quicktags' ) ) {

	add_action( 'admin_print_footer_scripts', 'oxsn_helpful_shortcodes_quicktags' );
	function oxsn_helpful_shortcodes_quicktags() {

		if ( wp_script_is( 'quicktags' ) ) {

		?>

			<script type="text/javascript">

				QTags.addButton( 'oxsn_helpful_shortcodes_h1_quicktag', '[oxsn_h1]', '[oxsn_h1 class=""]', '[/oxsn_h1]', 'oxsn_h1', 'Quicktags H1', 201 );
				QTags.addButton( 'oxsn_helpful_shortcodes_h2_quicktag', '[oxsn_h2]', '[oxsn_h2 class=""]', '[/oxsn_h2]', 'oxsn_h2', 'Quicktags H2', 202 );
				QTags.addButton( 'oxsn_helpful_shortcodes_h3_quicktag', '[oxsn_h3]', '[oxsn_h3 class=""]', '[/oxsn_h3]', 'oxsn_h3', 'Quicktags H3', 203 );
				QTags.addButton( 'oxsn_helpful_shortcodes_h4_quicktag', '[oxsn_h4]', '[oxsn_h4 class=""]', '[/oxsn_h4]', 'oxsn_h4', 'Quicktags H4', 204 );
				QTags.addButton( 'oxsn_helpful_shortcodes_h5_quicktag', '[oxsn_h5]', '[oxsn_h5 class=""]', '[/oxsn_h5]', 'oxsn_h5', 'Quicktags H5', 205 );
				QTags.addButton( 'oxsn_helpful_shortcodes_h6_quicktag', '[oxsn_h6]', '[oxsn_h6 class=""]', '[/oxsn_h6]', 'oxsn_h6', 'Quicktags H6', 206 );
				QTags.addButton( 'oxsn_helpful_shortcodes_p_quicktag', '[oxsn_p]', '[oxsn_p class=""]', '[/oxsn_p]', 'oxsn_p', 'Quicktags P', 207 );
				QTags.addButton( 'oxsn_helpful_shortcodes_i_quicktag', '[oxsn_i]', '[oxsn_i class=""]', '[/oxsn_i]', 'oxsn_i', 'Quicktags I', 208 );
				QTags.addButton( 'oxsn_helpful_shortcodes_strong_quicktag', '[oxsn_strong]', '[oxsn_strong class=""]', '[/oxsn_strong]', 'oxsn_strong', 'Quicktags STRONG', 209 );
				QTags.addButton( 'oxsn_helpful_shortcodes_center_quicktag', '[oxsn_center]', '[oxsn_center class=""]', '[/oxsn_center]', 'oxsn_center', 'Quicktags CENTER', 210 );
				QTags.addButton( 'oxsn_helpful_shortcodes_hr_quicktag', '[oxsn_hr]', '[oxsn_hr class=""]', '', 'oxsn_hr', 'Quicktags HR', 211 );
				QTags.addButton( 'oxsn_helpful_shortcodes_button_quicktag', '[oxsn_button]', '[oxsn_button class=""]', '', 'oxsn_button', 'Quicktags BUTTON', 211 );
				QTags.addButton( 'oxsn_helpful_shortcodes_div_quicktag', '[oxsn_div]', '[oxsn_div class=""]', '[/oxsn_div]', 'oxsn_div', 'Quicktags DIV', 212 );
				QTags.addButton( 'oxsn_helpful_shortcodes_panel_quicktag', '[oxsn_panel]', '[oxsn_panel class=""]', '[/oxsn_panel]', 'oxsn_panel', 'Quicktags PANEL', 213 );
				QTags.addButton( 'oxsn_helpful_shortcodes_container_quicktag', '[oxsn_container]', '[oxsn_container class=""]', '[/oxsn_container]', 'oxsn_container', 'Quicktags CONTAINER', 214 );
				QTags.addButton( 'oxsn_helpful_shortcodes_row_quicktag', '[oxsn_row]', '[oxsn_row class=""]', '[/oxsn_row]', 'oxsn_row', 'Quicktags ROW', 215 );
				QTags.addButton( 'oxsn_helpful_shortcodes_column_quicktag', '[oxsn_column]', '[oxsn_column class=""]', '[/oxsn_column]', 'oxsn_column', 'Quicktags COLUMN', 216 );
				QTags.addButton( 'oxsn_helpful_shortcodes_video_quicktag', '[oxsn_video]', '[oxsn_video class="" mp4="" ogg="" webm=""]', '[/oxsn_video]', 'oxsn_video', 'Quicktags VIDEO', 217 );
				QTags.addButton( 'oxsn_helpful_shortcodes_img_quicktag', '[oxsn_img]', '[oxsn_img class="" src=""]', '', 'oxsn_imgo', 'Quicktags IMG', 218 );
				QTags.addButton( 'oxsn_helpful_shortcodes_ul_quicktag', '[oxsn_ul]', '[oxsn_ul class=""]', '[/oxsn_ul]', 'oxsn_ul', 'Quicktags UL', 219 );
				QTags.addButton( 'oxsn_helpful_shortcodes_ol_quicktag', '[oxsn_ol]', '[oxsn_ol class=""]', '[/oxsn_ol]', 'oxsn_ol', 'Quicktags OL', 220 );
				QTags.addButton( 'oxsn_helpful_shortcodes_li_quicktag', '[oxsn_li]', '[oxsn_li class=""]', '[/oxsn_li]', 'oxsn_li', 'Quicktags LI', 221 );
				QTags.addButton( 'oxsn_helpful_shortcodes_table_quicktag', '[oxsn_table]', '[oxsn_table class=""]', '[/oxsn_table]', 'oxsn_table', 'Quicktags TABLE', 222 );
				QTags.addButton( 'oxsn_helpful_shortcodes_th_quicktag', '[oxsn_th]', '[oxsn_th class=""]', '[/oxsn_th]', 'oxsn_th', 'Quicktags TH', 223 );
				QTags.addButton( 'oxsn_helpful_shortcodes_tr_quicktag', '[oxsn_tr]', '[oxsn_tr class=""]', '[/oxsn_tr]', 'oxsn_tr', 'Quicktags TR', 224 );
				QTags.addButton( 'oxsn_helpful_shortcodes_td_quicktag', '[oxsn_td]', '[oxsn_td class=""]', '[/oxsn_td]', 'oxsn_td', 'Quicktags TD', 225 );
				QTags.addButton( 'oxsn_helpful_shortcodes_logged_in_users_quicktag', '[oxsn_logged_in_users]', '[oxsn_logged_in_users user_roles=""]', '[/oxsn_logged_in_users]', 'oxsn_logged_in_users', 'Quicktags LOGGED IN USERS', 226 );
				QTags.addButton( 'oxsn_helpful_shortcodes_logged_out_users_quicktag', '[oxsn_logged_out_users]', '[oxsn_logged_out_users user_roles=""]', '[/oxsn_logged_out_users]', 'oxsn_logged_out_users', 'Quicktags LOGGED OUT USERS', 227 );
				QTags.addButton( 'oxsn_helpful_shortcodes_navigation_quicktag', '[oxsn_navigation]', '[oxsn_navigation menu=""]', '', 'oxsn_navigation', 'Quicktags NAVIGATION', 228 );
				QTags.addButton( 'oxsn_helpful_shortcodes_breadcrumbs_quicktag', '[oxsn_breadcrumbs]', '[oxsn_breadcrumbs class=""]', '', 'oxsn_breadcrumbs', 'Quicktags BREADCRUMBS', 229 );
				QTags.addButton( 'oxsn_helpful_shortcodes_list_pages_quicktag', '[oxsn_list_pages]', '[oxsn_list_pages post_type="page" class=""]', '', 'oxsn_list_page', 'Quicktags LIST PAGES', 230 );
				QTags.addButton( 'oxsn_helpful_shortcodes_wp_query_quicktag', '[oxsn_wp_query]', '[oxsn_wp_query class="" post_type="post" posts_per_page="-1" pagination="true"]', '[/oxsn_wp_query]', 'oxsn_wp_query', 'Quicktags WP QUERY', 231 );
				QTags.addButton( 'oxsn_helpful_shortcodes_featured_image_quicktag', '[oxsn_featured_image]', '[oxsn_featured_image class="" page_id=""]', '', 'oxsn_featured_image', 'Quicktags FEATURED IMAGE', 232 );
				QTags.addButton( 'oxsn_helpful_shortcodes_permalink_quicktag', '[oxsn_permalink]', '[oxsn_permalink class="" page_id=""]', '[/oxsn_permalink]', 'oxsn_permalink', 'Quicktags PERMALINK', 233 );
				QTags.addButton( 'oxsn_helpful_shortcodes_title_quicktag', '[oxsn_title]', '[oxsn_title characters="35" page_id=""]', '', 'oxsn_title', 'Quicktags TITLE', 234 );
				QTags.addButton( 'oxsn_helpful_shortcodes_date_quicktag', '[oxsn_date]', '[oxsn_date style="F jS, Y" page_id=""]', '', 'oxsn_date', 'Quicktags DATE', 235 );
				QTags.addButton( 'oxsn_helpful_shortcodes_id_quicktag', '[oxsn_id]', '[oxsn_id]', '', 'oxsn_id', 'Quicktags ID', 236 );
				QTags.addButton( 'oxsn_helpful_shortcodes_categories_quicktag', '[oxsn_categories]', '[oxsn_categories separator=", " parents="" page_id=""]', '', 'oxsn_categories', 'Quicktags CATEGORIES', 237 );
				QTags.addButton( 'oxsn_helpful_shortcodes_tags_quicktag', '[oxsn_tags]', '[oxsn_tags seperator=", " page_id=""]', '', 'oxsn_tags', 'Quicktags TAGS', 238 );
				QTags.addButton( 'oxsn_helpful_shortcodes_content_quicktag', '[oxsn_content]', '[oxsn_content characters="140" page_id=""]', '', 'oxsn_content', 'Quicktags CONTENT', 239 );
				QTags.addButton( 'oxsn_helpful_shortcodes_excerpt_quicktag', '[oxsn_excerpt]', '[oxsn_excerpt characters="140" page_id=""]', '', 'oxsn_excerpt', 'Quicktags EXCERPT', 240 );

			</script>

		<?php

		}

	}

}


?><?php


/* OXSN Include CSS */

if ( ! function_exists ( 'oxsn_helpful_shortcodes_inc_css' ) ) {

  add_action( 'wp_enqueue_scripts', 'oxsn_helpful_shortcodes_inc_css' );
  function oxsn_helpful_shortcodes_inc_css() {

  	wp_enqueue_style( 'oxsn_helpful_shortcodes_css', oxsn_helpful_shortcodes_plugin_dir_url . 'inc/css/helpful-shortcodes.min.css', array(), '1.0.0', 'all' ); 

  }

}


?>