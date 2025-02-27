<?php
/**
 * Settings Page
 *
 * @package Preloader for Website - WPOS
 * @since 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Taking some data
$spiner_data		= plwao_get_preloader_opts();
$bg_size_data		= plwao_img_size_opts();
$bg_repeat_data		= plwao_img_repeat_opts();
$is_preloader		= plwao_get_option( 'is_preloader' );
$plwao_spinner		= plwao_get_option( 'plwao_spinner', 'spinner-1' );
$custom_content		= plwao_get_option( 'custom_content' );
$content_font_size	= plwao_get_option( 'content_font_size' );
$content_font_clr	= plwao_get_option( 'content_font_clr' );
$plwao_bgcolor		= plwao_get_option( 'plwao_bgcolor' );
$preloader_type		= plwao_get_option( 'preloader_type' );

if( empty( $preloader_type ) ) {
	$preloader_type = 'default';
} ?>

<div class="wrap plwao-settings">

	<h2><?php esc_html_e( 'Page Loader Settings', 'preloader-for-website' ); ?></h2>

	<?php
	// Reset message
	if( ! empty( $_POST['plwao_reset_settings'] ) ) {
		echo '<div id="message" class="updated notice notice-success is-dismissible">
				<p><strong>'.esc_html__("All settings reset successfully.", "preloader-for-website").'</strong></p>
			  </div>';
	}

	// Success message
	if( isset($_GET['settings-updated']) && $_GET['settings-updated'] == 'true' ) {
		echo '<div id="message" class="updated notice notice-success is-dismissible">
				<p><strong>'.esc_html__("Your changes saved successfully.", "preloader-for-website").'</strong></p>
			  </div>';
	} ?>

	<!-- Plugin reset settings form -->
	<form action="" method="post" id="plwao-reset-sett-form" class="plwao-right plwao-reset-sett-form">
		<input type="submit" class="button button-primary plwao-btn plwao-reset-sett plwao-resett-sett-btn plwao-reset-sett" name="plwao_reset_settings" id="plwao-reset-sett" value="<?php echo esc_attr__( 'Reset All Settings', 'preloader-for-website' ); ?>" />
		<?php wp_nonce_field( 'plwao_reset_settings', 'plwao_reset_sett_nonce' ); ?>
	</form>

	<form action="options.php" method="POST" id="plwao-settings-form" class="plwao-settings-form">
		
		<?php settings_fields( 'plwao_plugin_options' ); ?>

		<div class="textright plwao-clearfix">
			<input type="submit" name="plwao_settings_submit" class="button button-primary right plwao-btn plwao-sett-submit" value="<?php esc_html_e('Save Changes', 'preloader-for-website'); ?>" />
		</div>

		<!-- General Settings Starts -->
		<div id="plwao-general-sett" class="post-box-container plwao-general-sett">
			<div class="metabox-holder">
				<div class="meta-box-sortables ui-sortable">
					<div id="general" class="postbox">

						<div class="postbox-header">
							<h3 class="hndle">
								<span><?php esc_html_e( 'General Settings', 'preloader-for-website' ); ?></span>
							</h3>
						</div>

						<div class="inside">
							<table class="form-table plwao-general-sett-tbl">
								<tbody>
									<tr>
										<th>
											<label for="plwao-enable-preloader"><?php esc_html_e('Enable Preloader', 'preloader-for-website'); ?></label>
										</th>
										<td>
											<input type="checkbox" name="plwao_options[is_preloader]" value="1" <?php checked( $is_preloader, 1 ); ?> id="plwao-enable-preloader" class="paoc-checkbox plwao-enable-preloader" /><br/>
											<span class="description"><?php esc_html_e('Enable preloader for.','preloader-for-website'); ?></span>
										</td>
									</tr>

									<tr>
										<th>
											<label for="plwao-preloader-type"><?php esc_html_e('Preloader Type', 'preloader-for-website'); ?></label>
										</th>
										<td>
											<select name="plwao_options[preloader_type]" id="plwao-preloader-type" class="plwao-select plwao-show-hide plwao-preloader-type" />
												<option value="default"><?php esc_html_e('Default Loader', 'preloader-for-website'); ?></option>
												<option value="disable" <?php selected( $preloader_type, 'disable' ); ?>><?php esc_html_e('Only Content', 'preloader-for-website'); ?></option>
											</select><br/>
											<span class="description"><?php esc_html_e('Choose preloader type.', 'preloader-for-website'); ?></span>
										</td>
									</tr>

									<!-- Preloader Type `Default` - Start -->
									<tr class="plwao-show-hide-row plwao-show-if-default" style="<?php if( $preloader_type != 'default' ) { echo 'display: none;'; } ?>">
										<td class="plwao-no-padding" colspan="2">
											<table class="form-table plwao-tbl">
												<tbody>
													<tr>
														<th>
															<label for="plwao-spinner"><?php esc_html_e('Spinner', 'preloader-for-website'); ?></label>
														</th>
														<td>
															<?php if( ! empty( $spiner_data ) ) {
																foreach ($spiner_data as $spinner_key => $spinner_val) { ?>
																	<label class="plwao-spinner-class <?php if ( $plwao_spinner == $spinner_key ){ echo 'plwao-active'; } ?>" for="plwao-<?php echo esc_attr($spinner_key); ?>">
																		<input class="plwao-check" id="plwao-<?php echo esc_attr($spinner_key); ?>" type="radio" name="plwao_options[plwao_spinner]" value="<?php echo esc_attr( $spinner_key ); ?>" <?php checked( $spinner_key, $plwao_spinner ); ?>/>
																		<img src="<?php echo esc_url(PLWAO_URL); ?>assets/images/<?php echo esc_attr($spinner_key); ?>.gif">
																	</label>
																<?php }
															} ?>
															<br/>
															<span class="description"><?php esc_html_e('Select spinner image.','preloader-for-website'); ?></span><br/>
															<span class="description paoc-pro-feature"><?php echo esc_attr__('If you want to more spinner. ', 'preloader-for-website') . paoc_upgrade_pro_link(); ?></span>
														</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
									<!-- Preloader Type `Default` - End -->

									<tr>
										<th>
											<label for="plwao-custom-content"><?php esc_html_e('Custom Content', 'preloader-for-website'); ?></label>
										</th>
										<td>
											<?php wp_editor( $custom_content, 'plwao-custom-content', array('textarea_name' => 'plwao_options[custom_content]', 'textarea_rows' => 8, 'media_buttons' => true) ); ?>
											<span class="description"><?php esc_html_e('Enter preloader content.', 'preloader-for-website'); ?></span>
										</td>
									</tr>

									<!-- Preloader Type `Default` - Start -->
									<tr class="plwao-show-hide-row plwao-show-if-default" style="<?php if( $preloader_type != 'default' ) { echo 'display: none;'; } ?>">
										<td class="plwao-no-padding" colspan="2">
											<table class="form-table plwao-tbl">
												<tbody>
													<tr class="paoc-pro-feature">
														<th>
															<label for="plwao-visibility"><?php esc_html_e('Preloader Visibility', 'preloader-for-website'); ?></label>
														</th>
														<td>
															<select name="" id="plwao-visibility" class="plwao-select plwao-visibility" disabled>
																<option value=""><?php esc_html_e('Each Page Load', 'preloader-for-website'); ?></option>
																<option value=""><?php esc_html_e('Once Per Browser Session', 'preloader-for-website'); ?></option>
															</select><br/>
															<span class="description"><?php echo esc_attr__('Choose preloader visibility. ', 'preloader-for-website') . paoc_upgrade_pro_link(); ?></span>
														</td>
													</tr>

													<tr class="paoc-pro-feature">
														<th>
															<label for="plwao-spinner-size"><?php esc_html_e('Spinner Size', 'preloader-for-website'); ?></label>
														</th>
														<td>
															<select id="plwao-spinner-size" name="" disabled>
																<option value=""><?php esc_html_e('Small - (32 x 32)', 'preloader-for-website'); ?></option>
																<option value=""><?php esc_html_e('Medium - (64 x 64)', 'preloader-for-website'); ?></option>
																<option value=""><?php esc_html_e('Large - (128 x 128)', 'preloader-for-website'); ?></option>
															</select><br/>
															<span class="description"><?php echo esc_attr__('Select spinner image size. ', 'preloader-for-website') . paoc_upgrade_pro_link(); ?></span>
														</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
									<!-- Preloader Type `Default` - End -->

									<tr class="paoc-pro-feature">
										<th>
											<label for="plwao-min-loader"><?php esc_html_e('Preloader Minimum Runtime', 'preloader-for-website'); ?></label>
										</th>
										<td>
											<input type="text" name="" value="" id="plwao-min-loader" class="plwao-min-loader" disabled /> <?php esc_html_e('Sec', 'preloader-for-website'); ?><br/>
											<span class="description"><?php echo esc_attr__('Set preloader minimum run time. Leave it empty to run preloader till website is loaded. ', 'preloader-for-website') . paoc_upgrade_pro_link(); ?></span><br/>
										</td>
									</tr>

									<tr class="paoc-pro-feature">
										<th>
											<label for="plwao-hide-loader"><?php esc_html_e('Preloader Disappear Time', 'preloader-for-website'); ?></label>
										</th>
										<td>
											<input type="text" name="" value="" id="plwao-hide-loader" class="plwao-hide-loader" disabled /> <?php esc_html_e('Sec', 'preloader-for-website'); ?><br/>
											<span class="description"><?php echo esc_attr__('Set preloader disappear time. Leave it empty to disappear when website is loaded. ', 'preloader-for-website') . paoc_upgrade_pro_link(); ?></span><br/>
										</td>
									</tr>

									<tr class="paoc-pro-feature">
										<th>
											<label for="plwao-hide-locs"><?php esc_html_e('Hide on Locations', 'preloader-for-website'); ?></label>
										</th>
										<td>
											<textarea name="" id="plwao-hide-locs" class="large-text plwao-textarea plwao-hide-locs" disabled></textarea><br/>
											<span class="description"><?php echo esc_attr('Enter one location (URL) fragment per line. Use * character as a wildcard. Example: category/peace/* to target all matching URLs. ', 'preloader-for-website') . paoc_upgrade_pro_link(); ?></span>
										</td>
									</tr>

									<!-- Preloader Area Background Setting - Start -->
									<tr>
										<th colspan="2">
											<div class="plwao-sub-sett-title"><i class="dashicons dashicons-admin-generic"></i> <?php esc_html_e('Design Settings', 'preloader-for-website'); ?></div>
										</th>
									</tr>
									<tr>
										<th>
											<label for="plwao-cont-fontsize"><?php esc_html_e('Content Font Size', 'preloader-for-website'); ?></label>
										</th>
										<td>
											<input type="text" name="plwao_options[content_font_size]" value="<?php echo esc_attr( $content_font_size ); ?>" id="plwao-cont-fontsize" class="plwao-text plwao-cont-fontsize" /> <?php esc_html_e('PX', 'preloader-for-website'); ?><br/>
											<span class="description"><?php esc_html_e('Enter preloader content font size.', 'preloader-for-website'); ?></span>
										</td>
									</tr>
									<tr>
										<th>
											<label for="plwao-cont-fontclr"><?php esc_html_e('Content Font Color', 'preloader-for-website'); ?></label>
										</th>
										<td>
											<input type="text" name="plwao_options[content_font_clr]" value="<?php echo esc_attr( $content_font_clr ); ?>" id="plwao-cont-fontclr" class="plwao-text plwao-color-box plwao-cont-fontclr" /><br/>
											<span class="description"><?php esc_html_e('Choose preloader content font color.', 'preloader-for-website'); ?></span>
										</td>
									</tr>
									<tr>
										<th>
											<label for="plwao-bgcolor"><?php esc_html_e('Background Color', 'preloader-for-website'); ?></label>
										</th>
										<td>
											<input id="plwao-bgcolor" class="plwao-color-box" type="text" name="plwao_options[plwao_bgcolor]" value="<?php echo esc_attr( $plwao_bgcolor ); ?>"/><br/>
											<span class="description"><?php esc_html_e('Choose preloader area background color.','preloader-for-website'); ?></span>
										</td>
									</tr>

									<tr class="paoc-pro-feature">
										<th>
											<label for="plwao-bgimg"><?php esc_html_e('Background Image', 'preloader-for-website'); ?></label>
										</th>
										<td>
											<input id="plwao-bgimg" type="text" name="" value="" id="plwao-custom-image" class="regular-text plwao-bgimg plwao-img-upload-input" disabled />
											<input type="button" name="" class="button-secondary plwao-img-uploader" value="<?php esc_attr_e( 'Upload Image', 'preloader-for-website'); ?>" disabled />
											<input type="button" name="" id="plwao-bg-img-clear" class="button button-secondary plwao-image-clear" value="<?php esc_attr_e( 'Clear', 'preloader-for-website'); ?>" disabled /><br/>
											<span class="description"><?php echo esc_attr__('Choose preloader area background image. ', 'preloader-for-website') . paoc_upgrade_pro_link(); ?></span>
										</td>
									</tr>

									<tr class="paoc-pro-feature">
										<th>
											<label for="plwao-bg-size"><?php esc_html_e('Background Image Size', 'preloader-for-website'); ?></label>
										</th>
										<td>
											<select name="" id="plwao-bg-size" class="plwao-select plwao-bg-size" disabled>
											<?php if( ! empty( $bg_size_data ) ) {
												foreach ($bg_size_data as $bg_size_key => $bg_size_val) { ?>
													<option value=""><?php echo esc_attr($bg_size_val); ?></option>
												<?php }
											} ?>
											</select><br/>
											<span class="description"><?php esc_html_e('Select preloader area background image size. ', 'preloader-for-website') . paoc_upgrade_pro_link(); ?></span>
										</td>
									</tr>

									<tr class="paoc-pro-feature">
										<th>
											<label for="plwao-bg-repeat"><?php esc_html_e('Background Image Repeat', 'preloader-for-website'); ?></label>
										</th>
										<td>
											<select name="" id="plwao-bg-repeat" class="plwao-select plwao-bg-repeat" disabled>
											<?php if( ! empty( $bg_repeat_data ) ) {
												foreach ($bg_repeat_data as $bg_repeat_key => $bg_repeat_val) { ?>
													<option value=""><?php echo esc_attr($bg_repeat_val); ?></option>
												<?php }
											} ?>
											</select><br/>
											<span class="description"><?php echo esc_attr__('Choose preloader area background image repeat property. ', 'preloader-for-website') . paoc_upgrade_pro_link(); ?></span>
										</td>
									</tr>
									<!-- Preloader Area Background Setting - End -->

									<tr>
										<td colspan="2">
											<input type="submit" name="plwao-settings-submit" class="button button-primary right plwao-settings-submit" value="<?php esc_attr_e('Save Changes','preloader-for-website'); ?>" />
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form><!-- end .plwao-settings-form -->
</div><!-- end .plwao-settings -->