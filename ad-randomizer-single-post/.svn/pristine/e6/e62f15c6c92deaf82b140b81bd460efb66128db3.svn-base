<?php

// Setup the admin options

add_action( 'admin_init', 'adransipo_plugin_options_init' );
add_action( 'admin_menu', 'adransipo_add_menu_page' );

/**
 * Add theme options page styles
 */
/*wp_register_style( 'adransipo', get_template_directory_uri() . '/inc/theme-options.css', '', '0.1' );
if ( isset( $_GET['page'] ) && $_GET['page'] == 'theme_options' ) {
	wp_enqueue_style( 'adransipo' );
}*/

/**
 * Init plugin options to white list our options
 */
function adransipo_plugin_options_init(){
	register_setting( 'adransipo_options', 'adransipo_plugin_options', 'adransipo_plugin_options_validate' );
}

/**
 * Load up the menu page
 */
function adransipo_add_menu_page() {

		add_menu_page('Ad Randomizer', 'Ad Randomizer', 'activate_plugins', 'knowledgringppgt.php', 'adransipo_plugin_options_do_page', '');

}


/**
 * Return array for credit link options
 */
function adransipo_yes_no_options_credit_links() {
	$yes_no_options_cl = array(
		'yes' => array(
			'value' => 'yes',
			'label' => __( 'Yes, I prefer not to credit plugin author' )
		),
		'no' => array(
			'value' => 'no',
			'label' => __( 'No, I would like to credit plugin author' ),
		),
	);

	return $yes_no_options_cl;
}

/**
 * Return array for disable enable
 */
function adransipo_disable_enable_ad_top_content() {
	$disable_enable_ad_top_content = array(
		'Disable' => array(
			'value' => 'Disable',
			'label' => __( 'Disable Ad Top Content' )
		),
		'Enable' => array(
			'value' => 'Enable',
			'label' => __( 'Enable Ad Top Content' ),
		),
	);

	return $disable_enable_ad_top_content;
}

function adransipo_disable_enable_ad_left_content_top() {
	$disable_enable_ad_left_content_top = array(
		'Disable' => array(
			'value' => 'Disable',
			'label' => __( 'Disable Ad floating top left of content' )
		),
		'Enable' => array(
			'value' => 'Enable',
			'label' => __( 'Enable Ad floating top left of content' ),
		),
	);

	return $disable_enable_ad_left_content_top;
}

function adransipo_disable_enable_ad_right_content_top() {
	$disable_enable_ad_right_content_top = array(
		'Disable' => array(
			'value' => 'Disable',
			'label' => __( 'Disable Ad floating top right of content' )
		),
		'Enable' => array(
			'value' => 'Enable',
			'label' => __( 'Enable Ad floating top right of content' ),
		),
	);

	return $disable_enable_ad_right_content_top;
}

function adransipo_disable_enable_ad_left_content_middle() {
	$disable_enable_ad_left_content_middle = array(
		'Disable' => array(
			'value' => 'Disable',
			'label' => __( 'Disable Ad floating middle left of content' )
		),
		'Enable' => array(
			'value' => 'Enable',
			'label' => __( 'Enable Ad floating middle left of content' ),
		),
	);

	return $disable_enable_ad_left_content_middle;
}

function adransipo_disable_enable_ad_right_content_middle() {
	$disable_enable_ad_right_content_middle = array(
		'Disable' => array(
			'value' => 'Disable',
			'label' => __( 'Disable Ad floating middle right of content' )
		),
		'Enable' => array(
			'value' => 'Enable',
			'label' => __( 'Enable Ad floating middle right of content' ),
		),
	);

	return $disable_enable_ad_right_content_middle;
}

function adransipo_disable_enable_ad_bottom_content() {
	$disable_enable_ad_bottom_content = array(
		'Disable' => array(
			'value' => 'Disable',
			'label' => __( 'Disable Ad Bottom Content' )
		),
		'Enable' => array(
			'value' => 'Enable',
			'label' => __( 'Enable Ad Bottom Content' ),
		),
	);

	return $disable_enable_ad_bottom_content;
}

/**
 * Return array for show ads on static pages
 */
function adransipo_yes_no_options_ads_on_pages() {
	$yes_no_options_ads_on_pages = array(
		'yes' => array(
			'value' => 'yes',
			'label' => __( 'Yes, show ads on pages' )
		),
		'no' => array(
			'value' => 'no',
			'label' => __( 'No, do not show ads on pages' ),
		),
	);

	return $yes_no_options_ads_on_pages;
}


/**
 * Set default options
 */
function adransipo_default_options() {
	$options = get_option( 'adransipo_plugin_options' );

	if ( ! isset( $options['yes_no_options_cl'] ) ) {
		$options['yes_no_options_cl'] = 'no';
		update_option( 'adransipo_plugin_options', $options );
	}

	if ( ! isset( $options['yes_no_options_ads_on_pages'] ) ) {
		$options['yes_no_options_ads_on_pages'] = 'no';
		update_option( 'adransipo_plugin_options', $options );
	}

	if ( ! isset( $options['ad_top_content'] ) ) {
		$options['ad_top_content'] = '';
		update_option( 'adransipo_plugin_options', $options );
	}

	if ( ! isset( $options['ad_left_content_top'] ) ) {
		$options['ad_left_content_top'] = '';
		update_option( 'adransipo_plugin_options', $options );
	}

	if ( ! isset( $options['ad_right_content_top'] ) ) {
		$options['ad_right_content_top'] = '';
		update_option( 'adransipo_plugin_options', $options );
	}

	if ( ! isset( $options['ad_left_content_middle'] ) ) {
		$options['ad_left_content_middle'] = '';
		update_option( 'adransipo_plugin_options', $options );
	}

	if ( ! isset( $options['ad_right_content_middle'] ) ) {
		$options['ad_right_content_middle'] = '';
		update_option( 'adransipo_plugin_options', $options );
	}

	if ( ! isset( $options['ad_bottom_content'] ) ) {
		$options['ad_bottom_content'] = '';
		update_option( 'adransipo_plugin_options', $options );
	}

	if ( ! isset( $options['disable_enable_ad_bottom_content'] ) ) {
		$options['disable_enable_ad_bottom_content'] = 'Enable';
		update_option( 'adransipo_plugin_options', $options );
	}

	if ( ! isset( $options['disable_enable_ad_top_content'] ) ) {
		$options['disable_enable_ad_top_content'] = 'Enable';
		update_option( 'adransipo_plugin_options', $options );
	}

	if ( ! isset( $options['disable_enable_ad_left_content_top'] ) ) {
		$options['disable_enable_ad_left_content_top'] = 'Enable';
		update_option( 'adransipo_plugin_options', $options );
	}

	if ( ! isset( $options['disable_enable_ad_right_content_top'] ) ) {
		$options['disable_enable_ad_right_content_top'] = 'Enable';
		update_option( 'adransipo_plugin_options', $options );
	}
	if ( ! isset( $options['disable_enable_ad_left_content_middle'] ) ) {
		$options['disable_enable_ad_left_content_middle'] = 'Enable';
		update_option( 'adransipo_plugin_options', $options );
	}

	if ( ! isset( $options['disable_enable_ad_right_content_middle'] ) ) {
		$options['disable_enable_ad_right_content_middle'] = 'Enable';
		update_option( 'adransipo_plugin_options', $options );
	}


}
add_action( 'init', 'adransipo_default_options' );

/**
 * Create the options page
 */
function adransipo_plugin_options_do_page() {

	if ( ! isset( $_REQUEST['updated'] ) )
		$_REQUEST['updated'] = false;

	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . sprintf( __( 'Ad Randomizer Single Post Admin Options', 'adransipo' ), '' )
		 . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'adransipo' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'adransipo_options' ); ?>
			<?php $options = get_option( 'adransipo_plugin_options' ); ?>
			<table class="form-table">


				<?php
				/**
				 * Show Ads on Static Pages? (If this option is not selected ads will only be shown where the condition is_single() is met. if this is selected ads will also be shown where the condition is_page() is met.)
				 */
				?>
				<tr valign="top" id="adransipo-ads-on-pages"><th scope="row"><?php _e( 'Show ads on pages?', 'adransipo' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Show ads on pages?', 'adransipo' ); ?></span></legend>
						<?php
							if ( ! isset( $checked ) )
								$checked = '';
							foreach ( adransipo_yes_no_options_ads_on_pages() as $option ) {
								$radio_setting = $options['yes_no_options_ads_on_pages'];

								if ( '' != $radio_setting ) {
									if ( $options['yes_no_options_ads_on_pages'] == $option['value'] ) {
										$checked = "checked=\"checked\"";
									} else {
										$checked = '';
									}
								}
								?>
								<div class="layout">
								<label class="description">
									<input type="radio" name="adransipo_plugin_options[yes_no_options_ads_on_pages]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> />
									<span>
										<?php echo $option['label']; ?>
									</span>
								</label>
								</div>
								<?php
							}
						?>
						</fieldset>
					</td>
				</tr>


				<?php
				/**
				 * Code for ad to display at the top of the post content
				 */
				?>
				<tr valign="top" id="adransipo-ads-top-content"><th scope="row"><?php _e( 'Ad Top Content', 'adransipo' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Ad Top Content', 'adransipo' ); ?></span></legend>
								<div class="layout">
								<label class="description">
									<textarea cols="100" rows="6" id="adransipo_plugin_options[ad_top_content]" name="adransipo_plugin_options[ad_top_content]"><?php esc_attr_e( $options['ad_top_content'] ); ?></textarea>
								</label>
								</div>
								<p>
														<?php
															if ( ! isset( $checked ) )
																$checked = '';
															foreach ( adransipo_disable_enable_ad_top_content() as $option ) {
																$radio_setting = $options['disable_enable_ad_top_content'];

																if ( '' != $radio_setting ) {
																	if ( $options['disable_enable_ad_top_content'] == $option['value'] ) {
																		$checked = "checked=\"checked\"";
																	} else {
																		$checked = '';
																	}
																}
																?>
																<div class="layout">
																<label class="description">
																	<input type="radio" name="adransipo_plugin_options[disable_enable_ad_top_content]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> />
																	<span>
																		<?php echo $option['label']; ?>
																	</span>
																</label>
																</div>
																<?php
															}
						?>
						</p>
						</fieldset>
					</td>
				</tr>

				<?php
				/**
				 * Code for ad to display at the top left of the post content
				 */
				?>
				<tr valign="top" id="adransipo-top-content-left"><th scope="row"><?php _e( 'Ad floating top left of content', 'adransipo' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Ad floating top left of content', 'adransipo' ); ?></span></legend>
								<div class="layout">
								<label class="description">
									<textarea cols="100" rows="6" id="adransipo_plugin_options[ad_left_content_top]" name="adransipo_plugin_options[ad_left_content_top]"><?php esc_attr_e( $options['ad_left_content_top'] ); ?></textarea>
								</label>
								</div>
								<p>
														<?php
															if ( ! isset( $checked ) )
																$checked = '';
															foreach ( adransipo_disable_enable_ad_left_content_top() as $option ) {
																$radio_setting = $options['disable_enable_ad_left_content_top'];

																if ( '' != $radio_setting ) {
																	if ( $options['disable_enable_ad_left_content_top'] == $option['value'] ) {
																		$checked = "checked=\"checked\"";
																	} else {
																		$checked = '';
																	}
																}
																?>
																<div class="layout">
																<label class="description">
																	<input type="radio" name="adransipo_plugin_options[disable_enable_ad_left_content_top]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> />
																	<span>
																		<?php echo $option['label']; ?>
																	</span>
																</label>
																</div>
																<?php
															}
						?>
						</p>
							</fieldset>
					</td>
				</tr>

				<?php
				/**
				 * Code for ad to display at the top right of the post content
				 */
				?>
				<tr valign="top" id="adransipo-top-content-right"><th scope="row"><?php _e( 'Ad floating top right of content', 'adransipo' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Ad floating top right of content', 'adransipo' ); ?></span></legend>
								<div class="layout">
								<label class="description">
									<textarea cols="100" rows="6" id="adransipo_plugin_options[ad_right_content_top]" name="adransipo_plugin_options[ad_right_content_top]"><?php esc_attr_e( $options['ad_right_content_top'] ); ?></textarea>
								</label>
								</div>
								<p>
														<?php
															if ( ! isset( $checked ) )
																$checked = '';
															foreach ( adransipo_disable_enable_ad_right_content_top() as $option ) {
																$radio_setting = $options['disable_enable_ad_right_content_top'];

																if ( '' != $radio_setting ) {
																	if ( $options['disable_enable_ad_right_content_top'] == $option['value'] ) {
																		$checked = "checked=\"checked\"";
																	} else {
																		$checked = '';
																	}
																}
																?>
																<div class="layout">
																<label class="description">
																	<input type="radio" name="adransipo_plugin_options[disable_enable_ad_right_content_top]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> />
																	<span>
																		<?php echo $option['label']; ?>
																	</span>
																</label>
																</div>
																<?php
															}
						?>
						</p>
							</fieldset>
					</td>
				</tr>


				<?php
				/**
				 * Code for ad to display at the middle left of the post content
				 */
				?>
				<tr valign="top" id="adransipo-middle-content-left"><th scope="row"><?php _e( 'Ad floating middle left of content', 'adransipo' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Ad floating middle left of content', 'adransipo' ); ?></span></legend>
								<div class="layout">
								<label class="description">
									<textarea cols="100" rows="6" id="adransipo_plugin_options[ad_left_content_middle]" name="adransipo_plugin_options[ad_left_content_middle]"><?php esc_attr_e( $options['ad_left_content_middle'] ); ?></textarea>
								</label>
								</div>
								<p>
														<?php
															if ( ! isset( $checked ) )
																$checked = '';
															foreach ( adransipo_disable_enable_ad_left_content_middle() as $option ) {
																$radio_setting = $options['disable_enable_ad_left_content_middle'];

																if ( '' != $radio_setting ) {
																	if ( $options['disable_enable_ad_left_content_middle'] == $option['value'] ) {
																		$checked = "checked=\"checked\"";
																	} else {
																		$checked = '';
																	}
																}
																?>
																<div class="layout">
																<label class="description">
																	<input type="radio" name="adransipo_plugin_options[disable_enable_ad_left_content_middle]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> />
																	<span>
																		<?php echo $option['label']; ?>
																	</span>
																</label>
																</div>
																<?php
															}
						?>
						</p>
						</fieldset>
					</td>
				</tr>

				<?php
				/**
				 * Code for ad to display at the middle right of the post content
				 */
				?>
				<tr valign="top" id="adransipo-middle-content-right"><th scope="row"><?php _e( 'Ad floating middle right of content', 'adransipo' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Ad floating middle right of content', 'adransipo' ); ?></span></legend>
								<div class="layout">
								<label class="description">
									<textarea cols="100" rows="6" id=name="adransipo_plugin_options[ad_right_content_middle]" name="adransipo_plugin_options[ad_right_content_middle]"><?php esc_attr_e( $options['ad_right_content_middle'] ); ?></textarea>
								</label>
								</div>
								<p>
														<?php
															if ( ! isset( $checked ) )
																$checked = '';
															foreach ( adransipo_disable_enable_ad_right_content_middle() as $option ) {
																$radio_setting = $options['disable_enable_ad_right_content_middle'];

																if ( '' != $radio_setting ) {
																	if ( $options['disable_enable_ad_right_content_middle'] == $option['value'] ) {
																		$checked = "checked=\"checked\"";
																	} else {
																		$checked = '';
																	}
																}
																?>
																<div class="layout">
																<label class="description">
																	<input type="radio" name="adransipo_plugin_options[disable_enable_ad_right_content_middle]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> />
																	<span>
																		<?php echo $option['label']; ?>
																	</span>
																</label>
																</div>
																<?php
															}
						?>
						</p>
						</fieldset>
					</td>
				</tr>

				<?php
				/**
				 * Code for ad to display at the bottom of the post content
				 */
				?>
				<tr valign="top" id="adransipo-bottom-content"><th scope="row"><?php _e( 'Ad to display at bottom of content', 'adransipo' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Ad to display at bottom of content', 'adransipo' ); ?></span></legend>
								<div class="layout">
								<label class="description">
									<textarea cols="100" rows="6" id="adransipo_plugin_options[ad_bottom_content]" name="adransipo_plugin_options[ad_bottom_content]"><?php esc_attr_e( $options['ad_bottom_content'] ); ?></textarea>
								</label>
								</div>
								<p>
														<?php
															if ( ! isset( $checked ) )
																$checked = '';
															foreach ( adransipo_disable_enable_ad_bottom_content() as $option ) {
																$radio_setting = $options['disable_enable_ad_bottom_content'];

																if ( '' != $radio_setting ) {
																	if ( $options['disable_enable_ad_bottom_content'] == $option['value'] ) {
																		$checked = "checked=\"checked\"";
																	} else {
																		$checked = '';
																	}
																}
																?>
																<div class="layout">
																<label class="description">
																	<input type="radio" name="adransipo_plugin_options[disable_enable_ad_bottom_content]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> />
																	<span>
																		<?php echo $option['label']; ?>
																	</span>
																</label>
																</div>
																<?php
															}
						?>
						</p>
						</fieldset>
					</td>
				</tr>

			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'adransipo' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}
/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function adransipo_plugin_options_validate( $input ) {



	// Ad Bottom Content
	$input['ad_bottom_content'] = esc_textarea( $input['ad_bottom_content'] );

	// Ad Top Content
	$input['ad_top_content'] = esc_textarea($input['ad_top_content'] );

	// Ad Top Left Content
	$input['ad_left_content_top'] = esc_textarea( $input['ad_left_content_top'] );

	// Ad Top Right Content
	$input['ad_right_content_top'] = esc_textarea( $input['ad_right_content_top'] );

	// Ad Middle Left Content
	$input['ad_left_content_middle'] = esc_textarea( $input['ad_left_content_middle'] );

	// Ad Middle Right Content
	$input['ad_right_content_middle'] = esc_textarea( $input['ad_right_content_middle'] );


	// Our radio option must actually be in our array of radio options
	if ( ! isset( $input['yes_no_options_cl'] ) )
		$input['yes_no_options_cl'] = null;
	if ( ! array_key_exists( $input['yes_no_options_cl'], adransipo_yes_no_options_credit_links() ) )
		$input['yes_no_options_cl'] = null;

	if ( ! isset( $input['yes_no_options_ads_on_pages'] ) )
		$input['yes_no_options_ads_on_pages'] = null;
	if ( ! array_key_exists( $input['yes_no_options_ads_on_pages'], adransipo_yes_no_options_ads_on_pages() ) )
		$input['yes_no_options_ads_on_pages'] = null;






	return $input;
}
