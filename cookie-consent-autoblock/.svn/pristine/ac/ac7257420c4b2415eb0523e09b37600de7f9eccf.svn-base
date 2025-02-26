<?php

/**
 * WP-SpruceJoy Admin functions
 *
 * Static functions to manage the plugin options tab.
 * 
 * This file is part of the WP-SpruceJoy plugin by SpruceJoy
 * You can find out more about this plugin at https://sprucejoy.com
 * Copyright (c) 2020-2021  SpruceJoy
 * WP-SpruceJoy(tm) is a trademark of sprucejoy.com
 *
 * @package WP-SpruceJoy
 * @author SpruceJoy
 * @copyright 2020-2021
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
	exit();
}

class WP_Sprucejoy_Admin_Tab_Options
{

	/**
	 * Creates the tab.
	 *
	 */
	static function do_tab($tab)
	{
		if ($tab == 'options' || !$tab) {
			// Render the about tab.
			return self::build_settings();
		} else {
			return false;
		}
	}

	/**
	 * Builds the settings panel.
	 *
	 */
	static function build_settings()
	{

		global $wpsj;
		wp_enqueue_style('wp-color-picker');
		wp_enqueue_script('wp-color-picker');


		$options = [
			'wpsprucejoy_enable_cookie_bar',
			// 'wpsprucejoy_compliance_status_notice',
			// 'wpsprucejoy_compliance_status_autoblocking',
			'wpsprucejoy_success_add_scripts',
			'wpsprucejoy_bar_color',
			'wpsprucejoy_text_color',
			'wpsprucejoy_button_color',
			'wpsprucejoy_buttontext_color',
			'wpsprucejoy_accept_button_text',
			'wpsprucejoy_message',
			'wpsprucejoy_reject_button_text'
		];

		foreach ($options as $key => $val) {
			$wpsj->{$val} = get_option($val);
		}
?>
		<div class="metabox-holder has-right-sidebar">

			<div class="inner-sidebar">
				<?php wpsprucejoy_a_meta_box(); ?>

			</div> <!-- .inner-sidebar -->

			<div id="post-body">
				<div id="post-body-content">
					<div class="postbox" style="padding:10px;background-color: #EFEFEF;">
						<div class="title">Cookie Consent & Autoblock for GDRP & CCPA</div>
						<div class="inside" style="font-size: 16px;letter-spacing: -0.408px;">
							<form name="updatesettings" id="updatesettings" method="post" action="<?php echo wpsprucejoy_admin_form_post_url(); ?>">
								<div style="padding-top:10px;">
									<?php
									if ($wpsj->wpsprucejoy_enable_cookie_bar == 1) {
									?>
										<div style="color:#37A000"><span style="font-size:28px;line-height: 13px;padding-right:8px;">●</span> <span>Cookie bar is currently active and autoblocking.</span></div>
									<?php } else { ?>
										<div style="color:red"><span style="font-size:28px;line-height: 13px;padding-right:8px;">●</span> <span>Cookie bar is disabled.</span></div>
									<?php } ?>
								</div>
								<ul>
									<li>
										<label>Enable cookie bar</label>
										<span>
											<input name="wpsprucejoy_enable_cookie_bar" type="radio" value="1" <?php echo  $wpsj->wpsprucejoy_enable_cookie_bar == 1 ? 'checked' : '' ?>> On
											&nbsp;&nbsp;
											<input name="wpsprucejoy_enable_cookie_bar" type="radio" value="0" <?php echo  $wpsj->wpsprucejoy_enable_cookie_bar == 0 ? 'checked' : '' ?>> Off
										</span>
									</li>
									<li>
										<label>Compliance status</label>
										<span>
											<span style="color:#37A000;    font-weight: bold;"> ✓ </span> &nbsp;Notice
											&nbsp;&nbsp;
											<span style="color:#37A000;    font-weight: bold;"> ✓ </span> &nbsp;Autoblocking
										</span>
									</li>
								</ul>
								<div style="font-weight: bold; ">Add Scripts</div>
								<ul >
									<li>
										<span>
											We autoblock popular scripts like Google Analytics, Google Maps, Youtube, Facebook Pixel and more. (Find all <a href="https://sprucejoy.com/resources/cookie-consent-gdpr/#builtin">built-in autoblocking scripts</a>.)
											<br />
											<br />
											If you need block more than built-in scripts that are setting cookies, please enter domains below, separated by comma.
											<textarea name="wpsprucejoy_success_add_scripts" rows="3" cols="30" id="" class="large-text code" style="margin-top: 10px;"><?php echo  $wpsj->wpsprucejoy_success_add_scripts ?></textarea>
										</span>
									</li>
								</ul>
								<div style="font-weight: bold; ">Appearance</div>								
								<ul>
									<li style="width:50%;float:left"><label>Bar Color</label><span><input name="wpsprucejoy_bar_color" class="color-field" type="text" size="20"  value="<?php echo  $wpsj->wpsprucejoy_bar_color ? $wpsj->wpsprucejoy_bar_color : '#000C14' ?>" /></span></li>
									<li style="width:50%;float:left"><label>Button Color</label><span><input name="wpsprucejoy_button_color" class="color-field" type="text" size="20"  value="<?php echo  $wpsj->wpsprucejoy_button_color ? $wpsj->wpsprucejoy_button_color : '#000C14' ?>" /></span></li>
									<li style="width:50%;float:left"><label>Text Color</label><span><input name="wpsprucejoy_text_color" class="color-field" type="text" size="20"  value="<?php echo  $wpsj->wpsprucejoy_text_color ? $wpsj->wpsprucejoy_text_color : '#EFEFEF' ?>" /></span></li>
									<li style="width:50%;float:left"><label>ButtonText Color</label><span><input name="wpsprucejoy_buttontext_color" class="color-field" type="text" size="20"  value="<?php echo  $wpsj->wpsprucejoy_buttontext_color ? $wpsj->wpsprucejoy_buttontext_color : '#EFEFEF' ?>" /></span></li>
									<li>
										<label>Message</label>
										<span>
											<textarea name="wpsprucejoy_message" rows="3" cols="50" id="" class="large-text code"  style="margin-top: 10px;"><?php echo  $wpsj->wpsprucejoy_message ? $wpsj->wpsprucejoy_message : 'We uses cookies to provide necessary site functionality and improve your experience. By browsing our website, you consent to our use of cookies.' ?></textarea>
										</span>
									</li>
									<li><label>Accept Button Text</label>
										<span><input name="wpsprucejoy_accept_button_text" type="text" size="20" value="<?php echo  $wpsj->wpsprucejoy_accept_button_text ? $wpsj->wpsprucejoy_accept_button_text : 'Accept' ?>" /></span>
									</li>
									<li><label>Reject Button Text</label>
										<span><input name="wpsprucejoy_reject_button_text" type="text" size="20" value="<?php echo  $wpsj->wpsprucejoy_reject_button_text ? $wpsj->wpsprucejoy_reject_button_text : 'Reject' ?>" /></span>
									</li>
								</ul>
								<ul>
									<input type="hidden" name="wpsprucejoy_admin_a" value="update_settings">
									<?php submit_button(__('Update Settings', 'wp-sprucejoy')); ?>
								</ul>
							</form>
						</div><!-- .inside -->
					</div>
				</div><!-- #post-body-content -->
			</div><!-- #post-body -->
		</div><!-- .metabox-holder -->
		<script>
			jQuery(document).ready(function($) {
				$('.color-field').wpColorPicker();
				$('.wp-picker-clear').hide();
				$('.wp-picker-holder').css('position', 'absolute');
			});
		</script>
<?php
	}

	/**
	 * Updates the plugin options.
	 *
	 */
	static function update($action)
	{

		( isset( $_POST['wpsprucejoy_enable_cookie_bar'] ) ) ? sanitize_text_field( $_POST[ 'wpsprucejoy_enable_cookie_bar' ] ) : '';

		update_option('wpsprucejoy_enable_cookie_bar', ( isset( $_POST['wpsprucejoy_enable_cookie_bar'] ) ) ? sanitize_text_field( $_POST[ 'wpsprucejoy_enable_cookie_bar' ] ) : '');
		// update_option('wpsprucejoy_compliance_status_notice', $_POST['wpsprucejoy_compliance_status_notice']);
		// update_option('wpsprucejoy_compliance_status_autoblocking', $_POST['wpsprucejoy_compliance_status_autoblocking']);
		update_option('wpsprucejoy_success_add_scripts',( isset( $_POST['wpsprucejoy_success_add_scripts'] ) ) ? sanitize_text_field( $_POST[ 'wpsprucejoy_success_add_scripts' ] ) : '');
		update_option('wpsprucejoy_bar_color', ( isset( $_POST['wpsprucejoy_bar_color'] ) ) ? sanitize_text_field( $_POST[ 'wpsprucejoy_bar_color' ] ) : '');
		update_option('wpsprucejoy_text_color',( isset( $_POST['wpsprucejoy_text_color'] ) ) ? sanitize_text_field( $_POST[ 'wpsprucejoy_text_color' ] ) : '');
		update_option('wpsprucejoy_button_color', ( isset( $_POST['wpsprucejoy_button_color'] ) ) ? sanitize_text_field( $_POST[ 'wpsprucejoy_button_color' ] ) : '');
		update_option('wpsprucejoy_buttontext_color', ( isset( $_POST['wpsprucejoy_buttontext_color'] ) ) ? sanitize_text_field( $_POST[ 'wpsprucejoy_buttontext_color' ] ) : '');
		update_option('wpsprucejoy_message', ( isset( $_POST['wpsprucejoy_enable_cwpsprucejoy_messageookie_bar'] ) ) ? sanitize_text_field( $_POST[ 'wpsprucejoy_message' ] ) : '');
		update_option('wpsprucejoy_accept_button_text', ( isset( $_POST['wpsprucejoy_accept_button_text'] ) ) ? sanitize_text_field( $_POST[ 'wpsprucejoy_accept_button_text' ] ) : '');
		update_option('wpsprucejoy_reject_button_text', ( isset( $_POST['wpsprucejoy_reject_button_text'] ) ) ? sanitize_text_field( $_POST[ 'wpsprucejoy_reject_button_text' ] ) : '');

		return __('WP-SpruceJoy settings were updated', 'wp-sprucejoy');
	}

} // End of file.