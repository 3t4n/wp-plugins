<?php

/**
 * Editor page
 *
 * Provides an admin area view for the plugin. This file is used to markup the admin-facing Editor page in the admin area.
 *
 * @link       https://codealtdel.com/
 * @since      1.0.0
 * @see        class Age_Okay_Admin method partials_age_okay_editor
 *
 * @package    Age_Okay
 * @subpackage Age_Okay/admin/partials
 */

// @see class Age_Okay_Shared
$this->shared->load_options_debug();
$this->shared->load_lang_debug();
?>
<div class="wrap">
	<h2></h2>
	<div id='age_okay_wrap'>
		<h1 class="wp-heading-inline">Age Okay - <?php _e( 'Editor', 'age-okay' ); ?></h1>
		<div id='age_okay_editor_table'>
			<div id='age_okay_editor_tr'>
				<div id='age_okay_editor_iframe_td'>
					<iframe id='age_okay_iframe' frameborder="0" data-src='<?php echo home_url(); ?>' data-key='&age_okay_debug=age_okay_debug#age_okay_debug' src='<?php echo home_url() . '?age_okay_nocache=' . microtime( true ) . '&age_okay_debug=age_okay_debug#age_okay_debug'; ?>'></iframe>
				</div>
				<div id='age_okay_editor_td' class='age_okay_active'>
					<div id='age_okay_hamburger' class='age_okay_active'>
						<div id='age_okay_hamburger_container'>
							<div id='age_okay_hamburger_inner'></div>
						</div>
					</div>
					<div id='age_okay_editor'>
						<div id='age_okay_editor_content'>
							<p id='age_okay_editor_title'><?php _e( 'Editor', 'age-okay' ); ?> <i id='age_okay_editor_title_status'>- 
								<span class='age_okay_title_status_span <?php echo ( empty( $this->shared->options['v'] ) ? '' : 'age_okay_hidden' ); ?>'><?php _e( 'viewing default', 'age-okay' ); ?></span>
								<span class='age_okay_title_status_span age_okay_title_status_span_preview <?php echo ( ! empty( $this->shared->options['v'] ) && $this->shared->options['v'] == 'p' ? '' : 'age_okay_hidden' ); ?>'><?php _e( 'viewing preview', 'age-okay' ); ?></span>
								<span class='age_okay_title_status_span age_okay_title_status_span_live <?php echo ( ! empty( $this->shared->options['v'] ) && $this->shared->options['v'] == 'l' ? '' : 'age_okay_hidden' ); ?>'><?php _e( 'viewing live', 'age-okay' ); ?></span>
							</i></p>
							<div id='age_okay_editor_buttons' class='age_okay_active'>
								<button type="button" class="age_okay_editor_button_preview"><?php _e( 'Preview', 'age-okay' ); ?></button>
								<button type="button" class="age_okay_editor_button_save"><?php _e( 'Save', 'age-okay' ); ?></button>
							</div>
							<div id='age_okay_editor_inner'>
							<section>
								<p class='age_okay_editor_labels'>Load Style</p>
								<div class='age_okay_editor_options'>
									<div class='age_okay_form_group'>
										<label class='age_okay_form_label'>
											<input type='radio' name='load_type' value='cache' checked /> <span><b><?php _e( 'Cache', 'age-okay' ); ?></b> - <i><?php _e( 'Use with cache plugin', 'age-okay' ); ?></i></span>
										</label>
										<label class='age_okay_form_label age_okay_red'>
											<span class='age_okay_tooltip'><input type='radio' name='load_type' value='cache_preload' <?php echo ( $this->shared->options['load_type'] == 'cache_preload' ? 'checked' : '' ); ?> disabled /> <span><b><?php _e( 'Cache Preload', 'age-okay' ); ?></b> - <i style='font-weight:400;'><?php _e( 'Use with cache plugin, blur page content before Age Okay has loaded', 'age-okay' ); ?></i></span><span class="age_okay_tooltip_text"><?php _e( 'Available in PRO', 'age-okay' ); ?></span></span>
										</label>
										<label class='age_okay_form_label age_okay_red'>
											<span class='age_okay_tooltip'><input type='radio' name='load_type' value='nocache' <?php echo ( $this->shared->options['load_type'] == 'nocache' ? 'checked' : '' ); ?> disabled /> <span><b><?php _e( 'Live', 'age-okay' ); ?></b> - <i style='font-weight:400;'><?php _e( "Not using cache plugin, loads instantly", 'age-okay' ); ?></i></span><span class="age_okay_tooltip_text"><?php _e( 'Available in PRO', 'age-okay' ); ?></span></span>
										</label>
									</div>
								</div>
							</section>
							<section>
								<p class='age_okay_editor_labels'><?php _e( 'Verification Options', 'age-okay' ); ?></p>
								<div class='age_okay_editor_options'>
									<div class='age_okay_form_group age_okay_form_margin'>
										<label class='age_okay_form_label'>
											<span><?php _e( 'Verification Age', 'age-okay' ); ?></span>
											<div class='age_okay_form_input_group'>
												<input type='text' name='age_diff' value='<?php echo esc_attr( ! empty( $this->shared->lang['age_diff'] ) ? $this->shared->lang['age_diff'] : '' ); ?>' />
												<span><?php _e( 'Years', 'age-okay' ); ?></span>
											</div>
										</label>
									</div>
									<div class='age_okay_form_group'>
										<label class='age_okay_form_label' for='cookie_usertime'>
											<span><?php _e( 'Cookie Life', 'age-okay' ); ?></span>
											<span class='age_okay_form_info'><?php _e( "Set to 0 to expire when user closes internet browser", 'age-okay' ); ?></span>
										</label>
										<div class='age_okay_form_input_group age_okay_form_label'>
											<input class='age_okay_cookie_inputs age_okay_input_50l' type='text' name='cookie_usertime' id='cookie_usertime' value='<?php echo esc_attr( $this->shared->options['cookie_usertime'] ); ?>' /><select class='age_okay_cookie_inputs age_okay_input_50r' name='cookie_type' data-value='<?php echo esc_attr( $this->shared->options['cookie_type'] ); ?>'>
												<option value='hours'><?php _e( 'Hours', 'age-okay' ); ?></option>
												<option value='days'><?php _e( 'Days', 'age-okay' ); ?></option>
												<option value='months'><?php _e( 'Months', 'age-okay' ); ?></option>
												<option value='years'><?php _e( 'Years', 'age-okay' ); ?></option>
											</select>
										</div>
									</div>
								</div>
							</section>
							<section>
								<p class='age_okay_editor_labels'><?php _e( 'Content Options', 'age-okay' ); ?></p>
								<div class='age_okay_editor_options'>
									<div class='age_okay_form_group'>
										<label class='age_okay_form_label'>
											<span><?php _e( 'Logo', 'age-okay' ); ?></span>
										</label>
									</div>
									<div class='age_okay_image_uploader'>
										<div class='age_okay_editor_buttons_up'>
											<button type="button" class="age_okay_editor_button_image_upload"><?php _e( 'Upload', 'age-okay' ); ?></button>
											<button type="button" class="age_okay_editor_button_image_remove"><?php _e( 'Remove', 'age-okay' ); ?></button>
										</div>
										<img class="age_okay_image <?php echo ( ! empty( $this->shared->options['logo'] ) ? '' : 'age_okay_hidden' ); ?>" src="<?php echo esc_attr( ! empty( $this->shared->options['logo'] ) ? wp_get_attachment_image_src( $this->shared->options['logo'], 'medium' )[0] : 'data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==' ); ?>" />
										<input type="hidden" class="age_okay_image_url" name="logo" value="<?php echo esc_attr( $this->shared->options['logo'] ); ?>" />
									</div>
									<div class='age_okay_form_group age_okay_form_margin'>
										<label class='age_okay_form_label'>
											<span class='age_okay_tooltip'><?php _e( 'Title', 'age-okay' ); ?> <?php _e( '(Optional)', 'age-okay' ); ?> <sup>&#8644;</sup><span class="age_okay_tooltip_text"><?php _e( 'Age placeholder available', 'age-okay' ); ?> - %ao-age%</span></span>
											<textarea name='title'><?php echo esc_html( $this->shared->lang['title'] ); ?></textarea>
										</label>
									</div>
									<div class='age_okay_form_group age_okay_form_margin'>
										<label class='age_okay_form_label'>
											<span class='age_okay_tooltip'><?php _e( 'Description', 'age-okay' ); ?> <?php _e( '(Optional)', 'age-okay' ); ?> <sup>&#8644;</sup><span class="age_okay_tooltip_text"><?php _e( 'Age placeholder available', 'age-okay' ); ?> - %ao-age%</span></span>
											<textarea name='desc'><?php echo esc_html( $this->shared->lang['desc'] ); ?></textarea>
										</label>
									</div>
									<div class='age_okay_form_group age_okay_form_margin'>
										<label class='age_okay_form_label'>
											<span class='age_okay_tooltip'><?php _e( 'Text after buttons', 'age-okay' ); ?> <?php _e( '(Optional)', 'age-okay' ); ?> <sup>&#8644;</sup><span class="age_okay_tooltip_text"><?php _e( 'Age placeholder available', 'age-okay' ); ?> - %ao-age%</span></span>
											<textarea name='endtext'><?php echo esc_html( $this->shared->lang['endtext'] ); ?></textarea>
										</label>
									</div>
									<div class='age_okay_form_margin'>
										<div class='age_okay_form_group'>
											<label class='age_okay_form_label'>
												<span><?php _e( 'Text Colour', 'age-okay' ); ?></span>
											</label>
										</div>
										<input type='text' class='age_okay_color_field' name='text_color' value='<?php echo esc_attr( $this->shared->options['text_color'] ); ?>' data-default-color='<?php echo esc_attr( $this->shared->options['text_color'] ); ?>' />
									</div>
									<div class='age_okay_form_group'>
										<label class='age_okay_form_label'>
											<span><?php _e( 'Error Text Colour', 'age-okay' ); ?></span>
										</label>
									</div>
									<input type='text' class='age_okay_color_field' name='error_color' value='<?php echo esc_attr( $this->shared->options['error_color'] ); ?>' data-default-color='<?php echo esc_attr( $this->shared->options['error_color'] ); ?>' />
								</div>
							</section>
							<section>
								<p class='age_okay_editor_labels'><?php _e( 'Background Type', 'age-okay' ); ?></p>
								<div class='age_okay_editor_options'>
									<div class='age_okay_form_group'>
										<label class='age_okay_form_label'>
											<input type='radio' name='back_type' value='cthru' <?php echo ( $this->shared->options['back_type'] == 'cthru' ? 'checked' : '' ); ?> /> <span><b><?php _e( 'Clear', 'age-okay' ); ?></b> - <i><?php _e( "Page will be visible, can create modal look", 'age-okay' ); ?></i></span>
										</label>
										<label class='age_okay_form_label'>
											<input type='radio' name='back_type' value='color' <?php echo ( $this->shared->options['back_type'] == 'color' ? 'checked' : '' ); ?> /> <span><b><?php _e( 'Colour', 'age-okay' ); ?></b> - <i><?php _e( 'Solid or transparent colour', 'age-okay' ); ?></i></span>
										</label>
										<label class='age_okay_form_label'>
											<input type='radio' name='back_type' value='gradient' <?php echo ( $this->shared->options['back_type'] == 'gradient' ? 'checked' : '' ); ?> /> <span><b><?php _e( 'Gradient', 'age-okay' ); ?></b> - <i><?php _e( "Three colours that change across screen", 'age-okay' ); ?></i></span>
										</label>
										<label class='age_okay_form_label'>
											<input type='radio' name='back_type' value='pattern' <?php echo ( $this->shared->options['back_type'] == 'pattern' ? 'checked' : '' ); ?> /> <span><b><?php _e( 'Pattern', 'age-okay' ); ?></b> - <i><?php _e( "Small image is repeated across screen", 'age-okay' ); ?></i></span>
										</label>
										<label class='age_okay_form_label'>
											<input type='radio' name='back_type' value='image' <?php echo ( $this->shared->options['back_type'] == 'image' ? 'checked' : '' ); ?> /> <span><b><?php _e( 'Image', 'age-okay' ); ?></b> - <i><?php _e( "Large image fitted to screen", 'age-okay' ); ?></i></span>
										</label>
										<!--<label class='age_okay_label'><input type='radio' name='back_type' value='video' <?php echo ( $this->shared->options['back_type'] == 'video' ? 'checked' : '' ); ?> /> <b><?php _e( 'Video', 'age-okay' ); ?></b> - <?php _e( "Use a video to play across the whole screen", 'age-okay' ); ?></label>-->
									</div>
								</div>
							</section>
							<section class='age_okay_section_bs <?php echo ( ! in_array( $this->shared->options['back_type'], array( 'pattern', 'image' ) ) ? 'age_okay_hidden' : '' ); ?>' id='age_okay_section_bsimg'>
								<p class='age_okay_editor_labels'><?php _e( 'Image Upload', 'age-okay' ); ?></p>
								<div class='age_okay_editor_options'>
									<div class='age_okay_image_uploader'>
										<div class='age_okay_editor_buttons_up'>
											<button type="button" class="age_okay_editor_button_image_upload"><?php _e( 'Upload', 'age-okay' ); ?></button>
											<button type="button" class="age_okay_editor_button_image_remove"><?php _e( 'Remove', 'age-okay' ); ?></button>
										</div>
										<img style="max-width:100%;" class="age_okay_image <?php echo ( ! empty( $this->shared->options['image_url'] ) ? '' : 'age_okay_hidden' ); ?>" src="<?php echo esc_attr( ! empty( $this->shared->options['image_url'] ) ? wp_get_attachment_image_src( $this->shared->options['image_url'], 'medium' )[0] : 'data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==' ); ?>" />
										<input type="hidden" class="age_okay_image_url" name="image_url" value="<?php echo esc_attr( $this->shared->options['image_url'] ); ?>" />
									</div>
								</div>
							</section>
							<section class='age_okay_section_bs <?php echo ( ! in_array( $this->shared->options['back_type'], array( 'color', 'pattern', 'image', 'video' ) ) ? 'age_okay_hidden' : '' ); ?>' id='age_okay_section_bsc'>
								<p class='age_okay_editor_labels'>
									<span class='age_okay_editor_labels_bsc_overlay <?php echo ( ! in_array( $this->shared->options['back_type'], array( 'pattern', 'image', 'video' ) ) ? 'age_okay_hidden' : '' ); ?>'><?php _e( 'Overlay Style', 'age-okay' ); ?></span>
									<span class='age_okay_editor_labels_bsc_back <?php echo ( ! in_array( $this->shared->options['back_type'], array( 'color' ) ) ? 'age_okay_hidden' : '' ); ?>'><?php _e( 'Background Style', 'age-okay' ); ?></span>
								</p>
								<div class='age_okay_editor_options'>
									<div class='age_okay_color_opacityp'>
										<div class='age_okay_form_margin'>
											<div class='age_okay_section_bs age_okay_editor_labels_bsc_overlay age_okay_form_group <?php echo ( ! in_array( $this->shared->options['back_type'], array( 'pattern', 'image', 'video' ) ) ? 'age_okay_hidden' : '' ); ?>'>
												<label class='age_okay_form_label'>
													<span><?php _e( 'Overlay Colour', 'age-okay' ); ?></span>
												</label>
											</div>
											<div class='age_okay_section_bs age_okay_editor_labels_bsc_back age_okay_form_group <?php echo ( ! in_array( $this->shared->options['back_type'], array( 'color' ) ) ? 'age_okay_hidden' : '' ); ?>'>
												<label class='age_okay_form_label'>
													<span><?php _e( 'Background Colour', 'age-okay' ); ?></span>
												</label>
											</div>
											<input type='text' class='age_okay_color_field age_okay_color_opacityc' name='overlay_color' value='<?php echo esc_attr( $this->shared->options['overlay_color'] ); ?>' data-default-color='<?php echo esc_attr( $this->shared->options['overlay_color'] ); ?>' />
										</div>
										<div class='age_okay_section_bs age_okay_editor_labels_bsc_overlay age_okay_form_group <?php echo ( ! in_array( $this->shared->options['back_type'], array( 'pattern', 'image', 'video' ) ) ? 'age_okay_hidden' : '' ); ?>'>
											<label class='age_okay_form_label'>
												<span><?php _e( 'Overlay Opacity', 'age-okay' ); ?></span>
											</label>
										</div>
										<div class='age_okay_section_bs age_okay_editor_labels_bsc_back age_okay_form_group <?php echo ( ! in_array( $this->shared->options['back_type'], array( 'color' ) ) ? 'age_okay_hidden' : '' ); ?>'>
											<label class='age_okay_form_label'>
												<span><?php _e( 'Background Opacity', 'age-okay' ); ?></span>
											</label>
										</div>
										<div class='age_okay_slider_container'>
											<div class='age_okay_slider_display' style='background: <?php echo esc_attr( $this->shared->options['overlay_color'] ); ?>; opacity: <?php echo esc_attr( $this->shared->options['overlay_opacity'] ); ?>'></div>
											<input type='range' class='age_okay_slider' name='overlay_opacity' min='0' max='1' step='0.1' value='<?php echo esc_attr( $this->shared->options['overlay_opacity'] ); ?>' />
										</div>
									</div>
								</div>
							</section>
							<section class='age_okay_section_bs <?php echo ( $this->shared->options['back_type'] != 'gradient' ? 'age_okay_hidden' : '' ); ?>' id='age_okay_section_bsg'>
								<p class='age_okay_editor_labels'><?php _e( 'Background Style', 'age-okay' ); ?></p>
								<div class='age_okay_editor_options'>
									<div class='age_okay_form_margin'>
										<div class='age_okay_form_group'>
											<label class='age_okay_form_label'>
												<span><?php _e( 'Fallback Colour', 'age-okay' ); ?></span>
											</label>
										</div>
										<input type='text' class='age_okay_color_field' name='gradient_color_f' value='<?php echo esc_attr( $this->shared->options['gradient_color_f'] ); ?>' data-default-color='<?php echo esc_attr( $this->shared->options['gradient_color_f'] ); ?>' />
									</div>
									<div class='age_okay_color_opacitygp'>
										<div class='age_okay_form_group age_okay_form_margin'>
											<label class='age_okay_form_label'>
												<span><?php _e( 'Gradient Direction', 'age-okay' ); ?></span>
												<select class='age_okay_gradient_select' name='gradient_type' data-value='<?php echo esc_attr( $this->shared->options['gradient_type'] ); ?>'>
													<option value='to bottom'><?php _e( 'Start from top', 'age-okay' ); ?></option>
													<option value='to top'><?php _e( 'Start from bottom', 'age-okay' ); ?></option>
													<option value='to right'><?php _e( 'Start from left', 'age-okay' ); ?></option>
													<option value='to left'><?php _e( 'Start from right', 'age-okay' ); ?></option>
													<option value='to bottom right'><?php _e( 'Start from top left', 'age-okay' ); ?></option>
													<option value='to bottom left'><?php _e( 'Start from top right', 'age-okay' ); ?></option>
													<option value='to top right'><?php _e( 'Start from bottom left', 'age-okay' ); ?></option>
													<option value='to top left'><?php _e( 'Start from bottom right', 'age-okay' ); ?></option>
													<option value='radial'><?php _e( 'Circular', 'age-okay' ); ?></option>
												</select>
											</label>
										</div>
										<div class='age_okay_form_margin'>
											<div class='age_okay_form_group'>
												<label class='age_okay_form_label'>
													<span><?php _e( 'Start Colour', 'age-okay' ); ?></span>
												</label>
											</div>
											<input type='text' class='age_okay_color_field age_okay_color_opacitygc' name='gradient_color_s' value='<?php echo esc_attr( $this->shared->options['gradient_color_s'] ); ?>' data-default-color='<?php echo esc_attr( $this->shared->options['gradient_color_s'] ); ?>' />
										</div>
										<div class='age_okay_form_margin'>
											<div class='age_okay_form_group'>
												<label class='age_okay_form_label'>
													<span><?php _e( 'Middle Colour', 'age-okay' ); ?></span>
												</label>
											</div>
											<input type='text' class='age_okay_color_field age_okay_color_opacitygc' name='gradient_color_m' value='<?php echo esc_attr( $this->shared->options['gradient_color_m'] ); ?>' data-default-color='<?php echo esc_attr( $this->shared->options['gradient_color_m'] ); ?>' />
										</div>
										<div class='age_okay_form_margin'>
											<div class='age_okay_form_group'>
												<label class='age_okay_form_label'>
													<span><?php _e( 'End Colour', 'age-okay' ); ?></span>
												</label>
											</div>
											<input type='text' class='age_okay_color_field age_okay_color_opacitygc' name='gradient_color_e' value='<?php echo esc_attr( $this->shared->options['gradient_color_e'] ); ?>' data-default-color='<?php echo esc_attr( $this->shared->options['gradient_color_e'] ); ?>' />
										</div>
										<div class='age_okay_slider_container'>
											<div class='age_okay_slider_display' style='background: <?php echo esc_attr( $this->shared->options['gradient'] ); ?>; opacity: <?php echo esc_attr( $this->shared->options['gradient_opacity'] ); ?>'></div>
											<input type='range' class='age_okay_slider' name='gradient_opacity' min='0' max='1' step='0.1' value='<?php echo esc_attr( $this->shared->options['gradient_opacity'] ); ?>' />
										</div>
										<input type='hidden' id='age_okay_gradient_final' name='gradient' value='<?php echo esc_attr( $this->shared->options['gradient'] ); ?>' />
									</div>
								</div>
							</section>
							<section>
								<p class='age_okay_editor_labels'><?php _e( 'Container Style', 'age-okay' ); ?></p>
								<div class='age_okay_editor_options'>
									<div class='age_okay_form_group age_okay_form_margin'>
										<label class='age_okay_form_label'>
											<span><?php _e( 'Container Max Width', 'age-okay' ); ?></span>
											<div class='age_okay_form_input_group'>
												<input type='number' name='max_width' min='300' max='2000' pattern='[0-9]' step='10' value='<?php echo esc_attr( $this->shared->options['max_width'] ); ?>' />
												<span>PX</span>
											</div>
										</label>
									</div>
									<div class='age_okay_form_margin'>
										<div class='age_okay_form_group'>
											<label class='age_okay_form_label'>
												<span><?php _e( 'Container Colour', 'age-okay' ); ?></span>
											</label>
										</div>
										<input type='text' class='age_okay_color_field' name='inner_color' value='<?php echo esc_attr( $this->shared->options['inner_color'] ); ?>' />
									</div>
									<div class='age_okay_form_group age_okay_form_margin'>
										<label class='age_okay_form_label'>
											<span><?php _e( 'Border Width', 'age-okay' ); ?></span>
											<div class='age_okay_form_input_group'>
												<input type='number' name='border_width' min='0' max='50' pattern='[0-9]' value='<?php echo esc_attr( $this->shared->options['border_width'] ); ?>' />
												<span>PX</span>
											</div>
										</label>
									</div>
									<div class='age_okay_form_group'>
										<label class='age_okay_form_label'>
											<span><?php _e( 'Border Colour', 'age-okay' ); ?></span>
										</label>
									</div>
									<input type='text' class='age_okay_color_field' name='border_color' value='<?php echo esc_attr( $this->shared->options['border_color'] ); ?>' />
								</div>
							</section>
							<section>
								<p class='age_okay_editor_labels'><?php _e( 'Verification Type', 'age-okay' ); ?></p>
								<div class='age_okay_editor_options'>
									<div class='age_okay_form_group'>
										<label class='age_okay_form_label'>
											<input type='radio' name='type' value='simple' <?php echo ( $this->shared->options['type'] == 'simple' ? 'checked' : '' ); ?> /> <span><b><?php _e( 'Button', 'age-okay' ); ?></b></span>
										</label>
										<label class='age_okay_form_label'>
											<input type='radio' name='type' value='check' <?php echo ( $this->shared->options['type'] == 'check' ? 'checked' : '' ); ?> /> <span><b><?php _e( 'Checkbox', 'age-okay' ); ?></b></span>
										</label>
										<label class='age_okay_form_label'>
											<input type='radio' name='type' value='input' <?php echo ( $this->shared->options['type'] == 'input' ? 'checked' : '' ); ?> /> <span><b><?php _e( 'Input DOB', 'age-okay' ); ?></b></span>
										</label>
									</div>
								</div>
							</section>
							<section class='age_okay_section_vd <?php echo ( $this->shared->options['type'] != 'check' ? 'age_okay_hidden' : '' ); ?>' id='age_okay_section_vdc'>
								<p class='age_okay_editor_labels'><?php _e( 'Verification Details', 'age-okay' ); ?></p>
								<div class='age_okay_editor_options'>
									<div class='age_okay_form_group age_okay_form_margin'>
										<label class='age_okay_form_label'>
											<span class='age_okay_tooltip'><?php _e( 'Checkbox Text', 'age-okay' ); ?> <sup>&#8644;</sup><span class="age_okay_tooltip_text"><?php _e( 'Age placeholder available', 'age-okay' ); ?> - %ao-age%</span></span>
											<textarea name='check_text'><?php echo esc_html( $this->shared->lang['check_text'] ); ?></textarea>
										</label>
									</div>
									<div class='age_okay_form_group'>
										<label class='age_okay_form_label'>
											<span class='age_okay_tooltip'><?php _e( 'Error Text', 'age-okay' ); ?> <sup>&#8644;</sup><span class="age_okay_tooltip_text"><?php _e( 'Age placeholder available', 'age-okay' ); ?> - %ao-age%</span></span>
											<textarea name='check_error'><?php echo esc_html( $this->shared->lang['check_error'] ); ?></textarea>
										</label>
									</div>
								</div>
							</section>
							<section class='age_okay_section_vd <?php echo ( $this->shared->options['type'] != 'input' ? 'age_okay_hidden' : '' ); ?>' id='age_okay_section_vdi'>
								<p class='age_okay_editor_labels'><?php _e( 'Verification Details', 'age-okay' ); ?></p>
								<div class='age_okay_editor_options'>
									<div class='age_okay_form_group age_okay_form_margin'>
										<label class='age_okay_form_label'>
											<span><?php _e( 'Input Order', 'age-okay' ); ?></span>
											<select name='date_order' data-value='<?php echo esc_attr( $this->shared->lang['date_order'] ); ?>'>
												<option value='dmy'><?php _e( 'DMY', 'age-okay' ); ?></option>
												<option value='dym'><?php _e( 'DYM', 'age-okay' ); ?></option>
												<option value='mdy'><?php _e( 'MDY', 'age-okay' ); ?></option>
												<option value='myd'><?php _e( 'MYD', 'age-okay' ); ?></option>
												<option value='ydm'><?php _e( 'YDM', 'age-okay' ); ?></option>
												<option value='ymd'><?php _e( 'YMD', 'age-okay' ); ?></option>
											</select>
										</label>
									</div>
									<div class='age_okay_form_group age_okay_form_margin'>
										<label class='age_okay_form_label'>
											<span><?php _e( 'Day Placeholder', 'age-okay' ); ?></span>
											<input type='text' name='placeholder_d' value='<?php echo esc_attr( $this->shared->lang['placeholder_d'] ); ?>' />
										</label>
									</div>
									<div class='age_okay_form_group age_okay_form_margin'>
										<label class='age_okay_form_label'>
											<span><?php _e( 'Month Placeholder', 'age-okay' ); ?></span>
											<input type='text' name='placeholder_m' value='<?php echo esc_attr( $this->shared->lang['placeholder_m'] ); ?>' />
										</label>
									</div>
									<div class='age_okay_form_group age_okay_form_margin'>
										<label class='age_okay_form_label'>
											<span><?php _e( 'Year Placeholder', 'age-okay' ); ?></span>
											<input type='text' name='placeholder_y' value='<?php echo esc_attr( $this->shared->lang['placeholder_y'] ); ?>' />
										</label>
									</div>
									<div class='age_okay_form_group age_okay_form_margin'>
										<label class='age_okay_form_label'>
											<span class='age_okay_tooltip'><?php _e( 'Invalid Date Error', 'age-okay' ); ?> <sup>&#8644;</sup><span class="age_okay_tooltip_text"><?php _e( 'Age placeholder available', 'age-okay' ); ?> - %ao-age%</span></span>
											<textarea name='input_error_invalid'><?php echo esc_html( $this->shared->lang['input_error_invalid'] ); ?></textarea>
										</label>
									</div>
									<div class='age_okay_form_group'>
										<label class='age_okay_form_label'>
											<span class='age_okay_tooltip'><?php _e( 'Too Young Error', 'age-okay' ); ?> <sup>&#8644;</sup><span class="age_okay_tooltip_text"><?php _e( 'Age placeholder available', 'age-okay' ); ?> - %ao-age%</span></span>
											<textarea name='input_error_under'><?php echo esc_html( $this->shared->lang['input_error_under'] ); ?></textarea>
										</label>
									</div>
								</div>
							</section>
							<section>
								<p class='age_okay_editor_labels'><?php _e( 'Buttons', 'age-okay' ); ?></p>
								<div class='age_okay_editor_options'>
									<div class='age_okay_form_group age_okay_form_margin'>
										<label class='age_okay_form_label'>
											<span><?php _e( 'Button Style', 'age-okay' ); ?></span>
											<select name='button_style' data-value='<?php echo esc_attr( $this->shared->options['button_style'] ); ?>'>
												<option value='square'><?php _e( 'Square', 'age-okay' ); ?></option>
												<option value='smooth'><?php _e( 'Smooth', 'age-okay' ); ?></option>
												<option value='round'><?php _e( 'Rounded', 'age-okay' ); ?></option>
												<option value='circular'><?php _e( 'Circular', 'age-okay' ); ?></option>
											</select>
										</label>
									</div>
									<hr />
									<div class='age_okay_form_group age_okay_form_margin'>
										<label class='age_okay_form_label'>
											<span><?php _e( 'Submit Button Text', 'age-okay' ); ?></span>
											<input type='text' name='ok_button' value='<?php echo esc_attr( $this->shared->lang['ok_button'] ); ?>' />
										</label>
									</div>
									<div class='age_okay_form_margin'>
										<div class='age_okay_form_group'>
											<label class='age_okay_form_label'>
												<span><?php _e( 'Submit Button Colour', 'age-okay' ); ?></span>
											</label>
										</div>
										<input type='text' class='age_okay_color_field' name='button_color' value='<?php echo esc_attr( $this->shared->options['button_color'] ); ?>' data-default-color='<?php echo esc_attr( $this->shared->options['button_color'] ); ?>' />
									</div>
									<div class='age_okay_form_margin'>
										<div class='age_okay_form_group'>
											<label class='age_okay_form_label'>
												<span><?php _e( 'Submit Text Colour', 'age-okay' ); ?></span>
											</label>
										</div>
										<input type='text' class='age_okay_color_field' name='button_tcolor' value='<?php echo esc_attr( $this->shared->options['button_tcolor'] ); ?>' data-default-color='<?php echo esc_attr( $this->shared->options['button_tcolor'] ); ?>' />
									</div>
									<div class='age_okay_form_margin'>
										<div class='age_okay_form_group'>
											<label class='age_okay_form_label'>
												<span><?php _e( 'Submit Button Hover Colour', 'age-okay' ); ?></span>
											</label>
										</div>
										<input type='text' class='age_okay_color_field' name='hbutton_color' value='<?php echo esc_attr( $this->shared->options['hbutton_color'] ); ?>' data-default-color='<?php echo esc_attr( $this->shared->options['hbutton_color'] ); ?>' />
									</div>
									<div class='age_okay_form_margin'>
										<div class='age_okay_form_group'>
											<label class='age_okay_form_label'>
												<span><?php _e( 'Submit Hover Text Colour', 'age-okay' ); ?></span>
											</label>
										</div>
										<input type='text' class='age_okay_color_field' name='hbutton_tcolor' value='<?php echo esc_attr( $this->shared->options['hbutton_tcolor'] ); ?>' data-default-color='<?php echo esc_attr( $this->shared->options['hbutton_tcolor'] ); ?>' />
									</div>
									<hr />
									<div class='age_okay_form_group age_okay_form_margin'>
										<label class='age_okay_form_label'>
											<input type='checkbox' name='exit' value='true' <?php echo ( $this->shared->options['exit'] == 'true' ? 'checked' : '' ); ?> /> <span><b><?php _e( 'Exit Button', 'age-okay' ); ?></b></span>
										</label>
									</div>
									<div class='age_okay_section_secondary <?php echo ( $this->shared->options['exit'] != 'true' ? 'age_okay_hidden' : '' ); ?>'>
										<div class='age_okay_form_group age_okay_form_margin'>
											<label class='age_okay_form_label'>
												<span><?php _e( 'Exit Button Text', 'age-okay' ); ?></span>
												<input type='text' name='no_button' value='<?php echo esc_attr( $this->shared->lang['no_button'] ); ?>' />
											</label>
										</div>
										<div class='age_okay_form_group age_okay_form_margin'>
											<label class='age_okay_form_label'>
												<span><?php _e( 'Exit Button Target', 'age-okay' ); ?></span>
												<select class='age_okay_exit_target_select' name='no_type' data-value='<?php echo esc_attr( $this->shared->options['no_type'] ); ?>'>
													<option value='back'><?php _e( 'Previous Page', 'age-okay' ); ?></option>
													<option value='url'><?php _e( 'Webpage', 'age-okay' ); ?></option>
													<option value='text'><?php _e( 'Output Text', 'age-okay' ); ?></option>
												</select>
											</label>
										</div>
										<div class='age_okay_section_securl <?php echo ( $this->shared->options['no_type'] == 'url' ? '' : 'age_okay_hidden' ); ?>'>
											<div class='age_okay_form_group age_okay_form_margin'>
												<label class='age_okay_form_label'>
													<span><?php _e( 'Exit Target', 'age-okay' ); ?></span>
													<input type='text' name='no_url' value='<?php echo esc_attr( $this->shared->lang['no_url'] ); ?>' placeholder='http://www.website.com' />
												</label>
											</div>
										</div>
										<div class='age_okay_section_sectext <?php echo ( $this->shared->options['no_type'] == 'text' ? '' : 'age_okay_hidden' ); ?>'>
											<div class='age_okay_form_group age_okay_form_margin'>
												<label class='age_okay_form_label'>
													<span class='age_okay_tooltip'><?php _e( 'Exit Text', 'age-okay' ); ?> <sup>&#8644;</sup><span class="age_okay_tooltip_text"><?php _e( 'Age placeholder available', 'age-okay' ); ?> - %ao-age%</span></span>
													<textarea name='no_text'><?php echo esc_html( $this->shared->lang['no_text'] ); ?></textarea>
												</label>
											</div>
										</div>
										<hr />
										<div class='age_okay_form_group age_okay_form_margin'>
											<label class='age_okay_form_label'>
												<input type='checkbox' name='ebutton_style' value='true' <?php echo ( $this->shared->options['ebutton_style'] == 'true' ? 'checked' : '' ); ?> /> <span><b><?php _e( 'Exit button different styling', 'age-okay' ); ?></b></span>
											</label>
										</div>
										<div class='age_okay_section_secstyle <?php echo ( $this->shared->options['ebutton_style'] == 'true' ? '' : 'age_okay_hidden' ); ?>'>
											<div class='age_okay_form_margin'>
												<div class='age_okay_form_group'>
													<label class='age_okay_form_label'>
														<span><?php _e( 'Exit Button Colour', 'age-okay' ); ?></span>
													</label>
												</div>
												<input type='text' class='age_okay_color_field' name='ebutton_color' value='<?php echo esc_attr( $this->shared->options['ebutton_color'] ); ?>' data-default-color='<?php echo esc_attr( $this->shared->options['ebutton_color'] ); ?>' />
											</div>
											<div class='age_okay_form_margin'>
												<div class='age_okay_form_group'>
													<label class='age_okay_form_label'>
														<span><?php _e( 'Exit Text Colour', 'age-okay' ); ?></span>
													</label>
												</div>
												<input type='text' class='age_okay_color_field' name='ebutton_tcolor' value='<?php echo esc_attr( $this->shared->options['ebutton_tcolor'] ); ?>' data-default-color='<?php echo esc_attr( $this->shared->options['ebutton_tcolor'] ); ?>' />
											</div>
											<div class='age_okay_form_margin'>
												<div class='age_okay_form_group'>
													<label class='age_okay_form_label'>
														<span><?php _e( 'Exit Hover Colour', 'age-okay' ); ?></span>
													</label>
												</div>
												<input type='text' class='age_okay_color_field' name='ehbutton_color' value='<?php echo esc_attr( $this->shared->options['ehbutton_color'] ); ?>' data-default-color='<?php echo esc_attr( $this->shared->options['ehbutton_color'] ); ?>' />
											</div>
											<div class='age_okay_form_group'>
												<label class='age_okay_form_label'>
													<span><?php _e( 'Exit Hover Text Colour', 'age-okay' ); ?></span>
												</label>
											</div>
											<input type='text' class='age_okay_color_field' name='ehbutton_tcolor' value='<?php echo esc_attr( $this->shared->options['ehbutton_tcolor'] ); ?>' data-default-color='<?php echo esc_attr( $this->shared->options['ehbutton_tcolor'] ); ?>' />
										</div>
									</div>
								</div>
							</section>
							<section class='age_okay_discard_section <?php echo ( ! empty( $this->shared->options['v'] ) && $this->shared->options['v'] == 'p' ? '' : 'age_okay_hidden' ); ?>' id='age_okay_discard_section'>
								<p class='age_okay_editor_labels'><?php _e( 'Discard Preview', 'age-okay' ); ?></p>
								<div class='age_okay_editor_options'>
									<span><i><?php _e( 'Discard any previewed changes made after your most recent save and see what your users see.', 'age-okay' ); ?></i></span><br />
									<div class='age_okay_editor_buttons_up'>
										<button type="button" id="age_okay_editor_button_discard"><?php _e( 'Discard Changes', 'age-okay' ); ?></button>
									</div>
								</div>
							</section>
							<input type='hidden' id='editor_nonce' name='editor_nonce' value='<?php echo wp_create_nonce( 'editor_nonce' ); ?>' />
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id='age_okay_mobile_check'></div>
</div>
