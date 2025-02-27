<?php

function surbma_gpga_social_fields_init() {
	register_setting(
		'surbma_gpga_social_options',
		'surbma_gpga_social_fields',
		'surbma_gpga_social_fields_validate'
	);
}
add_action( 'admin_init', 'surbma_gpga_social_fields_init' );

$ssbcontentlocation_options = array(
	'before' => array(
		'value' => 'before',
		'label' => __( 'Before Content', 'surbma-gdpr-proof-google-analytics' )
	),
	'after' => array(
		'value' => 'after',
		'label' => __( 'After Content', 'surbma-gdpr-proof-google-analytics' )
	),
	'before-and-after' => array(
		'value' => 'before-and-after',
		'label' => __( 'Before AND After Content', 'surbma-gdpr-proof-google-analytics' )
	)
);

$ssbstyle_options = array(
	'simple-colored' => array(
		'value' => 'simple-colored',
		'label' => __( 'Simple Colored', 'surbma-gdpr-proof-google-analytics' )
	),
	'simple-mono' => array(
		'value' => 'simple-mono',
		'label' => __( 'Simple Mono', 'surbma-gdpr-proof-google-analytics' )
	),
	'button-square' => array(
		'value' => 'button-square',
		'label' => __( 'Button Square', 'surbma-gdpr-proof-google-analytics' )
	),
	'button-rounded' => array(
		'value' => 'button-rounded',
		'label' => __( 'Button Rounded', 'surbma-gdpr-proof-google-analytics' )
	),
	'button-circle' => array(
		'value' => 'button-circle',
		'label' => __( 'Button Circle', 'surbma-gdpr-proof-google-analytics' )
	)
);

function surbma_gpga_social_page() {

	global $ssbcontentlocation_options;
	global $ssbstyle_options;

	$freeNotification = '<p class="uk-text-meta uk-text-center">' . __( 'Inactive options are available in the Premium Version of this plugin with an Active License.', 'surbma-gdpr-proof-google-analytics' ) . '</p>';

?>
<div class="surbma-admin surbma-social-page">
	<?php surbma_gpga_admin_header( __( 'Social Integration' ) ); ?>
	<div class="wrap">
		<?php if ( isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] == true ) { ?>
			<div class="updated notice is-dismissible"><p><strong><?php _e( 'Settings saved.' ); ?></strong></p></div>
		<?php } ?>

		<div class="uk-grid-small" uk-grid>
			<div class="uk-width-3-4@l">
				<form class="uk-form-horizontal" method="post" action="options.php">
					<?php settings_fields( 'surbma_gpga_social_options' ); ?>
					<?php $options = get_option( 'surbma_gpga_social_fields' ); ?>

					<div class="uk-card uk-card-small uk-card-default uk-card-hover">
						<div class="uk-card-header uk-background-muted">
							<h3 class="uk-card-title"><?php _e( 'Social Share Buttons', 'surbma-gdpr-proof-google-analytics' ); ?> <a class="uk-float-right uk-margin-small-top" uk-icon="icon: more-vertical" uk-toggle="target: #socialsharebuttons"></a></h3>
						</div>
		            	<div id="socialsharebuttons" class="uk-card-body">
					    	<div class="uk-margin">
								<div class="uk-form-label"><?php _e( 'Social Networks', 'surbma-gdpr-proof-google-analytics' ); ?></div>
								<div class="uk-form-controls">
									<p class="switch-wrap">
										<?php _e( 'Facebook Share', 'surbma-gdpr-proof-google-analytics' ); ?>:
										<label class="switch">
											<?php $ssbfacebookValue = isset( $options['ssbfacebook'] ) ? $options['ssbfacebook'] : 0; ?>
											<input id="surbma_gpga_social_fields[ssbfacebook]" name="surbma_gpga_social_fields[ssbfacebook]" type="checkbox" value="1" <?php checked( '1', $ssbfacebookValue ); ?> />
											<span class="slider round"></span>
										</label>
									</p>
									<p class="switch-wrap">
										<?php _e( 'Twitter Share', 'surbma-gdpr-proof-google-analytics' ); ?>:
										<label class="switch">
											<?php $ssbtwitterValue = isset( $options['ssbtwitter'] ) ? $options['ssbtwitter'] : 0; ?>
											<input id="surbma_gpga_social_fields[ssbtwitter]" name="surbma_gpga_social_fields[ssbtwitter]" type="checkbox" value="1" <?php checked( '1', $ssbtwitterValue ); ?> />
											<span class="slider round"></span>
										</label>
									</p>
									<p class="switch-wrap">
										<?php _e( 'LinkedIn Share', 'surbma-gdpr-proof-google-analytics' ); ?>:
										<label class="switch">
											<?php $ssblinkedinValue = isset( $options['ssblinkedin'] ) ? $options['ssblinkedin'] : 0; ?>
											<input id="surbma_gpga_social_fields[ssblinkedin]" name="surbma_gpga_social_fields[ssblinkedin]" type="checkbox" value="1" <?php checked( '1', $ssblinkedinValue ); ?> />
											<span class="slider round"></span>
										</label>
									</p>
									<p class="switch-wrap">
										<?php _e( 'Pinterest Share', 'surbma-gdpr-proof-google-analytics' ); ?>:
										<label class="switch">
											<?php $ssbpinterestValue = isset( $options['ssbpinterest'] ) ? $options['ssbpinterest'] : 0; ?>
											<input id="surbma_gpga_social_fields[ssbpinterest]" name="surbma_gpga_social_fields[ssbpinterest]" type="checkbox" value="1" <?php checked( '1', $ssbpinterestValue ); ?> />
											<span class="slider round"></span>
										</label>
									</p>
									<p class="switch-wrap">
										<?php _e( 'Email Share', 'surbma-gdpr-proof-google-analytics' ); ?>:
										<label class="switch">
											<?php $ssbemailValue = isset( $options['ssbemail'] ) ? $options['ssbemail'] : 0; ?>
											<input id="surbma_gpga_social_fields[ssbemail]" name="surbma_gpga_social_fields[ssbemail]" type="checkbox" value="1" <?php checked( '1', $ssbemailValue ); ?> />
											<span class="slider round"></span>
										</label>
									</p>
					    		</div>
							</div>
							<h4 class="uk-heading-divider"><?php _e( 'Location', 'surbma-gdpr-proof-google-analytics' ); ?></h4>
					    	<div class="uk-margin">
								<div class="uk-form-label"><?php _e( 'Posts', 'surbma-gdpr-proof-google-analytics' ); ?></div>
								<div class="uk-form-controls">
									<p class="switch-wrap">
										<?php _e( 'Display Social Share Buttons on single posts', 'surbma-gdpr-proof-google-analytics' ); ?>:
										<label class="switch">
											<?php $ssbpostsValue = isset( $options['ssbposts'] ) ? $options['ssbposts'] : 0; ?>
											<input id="surbma_gpga_social_fields[ssbposts]" name="surbma_gpga_social_fields[ssbposts]" type="checkbox" value="1" <?php checked( '1', $ssbpostsValue ); ?> />
											<span class="slider round"></span>
										</label>
									</p>
					    		</div>
							</div>
					    	<div class="uk-margin<?php if ( SURBMA_GPGA_PLUGIN_VERSION == 'free' || SURBMA_GPGA_PLUGIN_LICENSE != 'valid' ) echo ' disabled'; ?>">
								<div class="uk-form-label"><?php _e( 'Pages', 'surbma-gdpr-proof-google-analytics' ); ?></div>
								<div class="uk-form-controls">
									<p class="switch-wrap">
										<?php _e( 'Display Social Share Buttons on single pages', 'surbma-gdpr-proof-google-analytics' ); ?>:
										<label class="switch">
											<?php $ssbpagesValue = isset( $options['ssbpages'] ) ? $options['ssbpages'] : 0; ?>
											<input id="surbma_gpga_social_fields[ssbpages]" name="surbma_gpga_social_fields[ssbpages]" type="checkbox" value="1" <?php checked( '1', $ssbpagesValue ); ?><?php if ( SURBMA_GPGA_PLUGIN_VERSION == 'free' || SURBMA_GPGA_PLUGIN_LICENSE != 'valid' ) echo ' disabled'; ?> />
											<span class="slider round"></span>
										</label>
									</p>
					    		</div>
							</div>
					    	<div class="uk-margin<?php if ( SURBMA_GPGA_PLUGIN_VERSION == 'free' || SURBMA_GPGA_PLUGIN_LICENSE != 'valid' ) echo ' disabled'; ?>">
								<label class="uk-form-label" for="surbma_gpga_social_fields[ssbcpts]"><?php _e( 'Custom Post Types', 'surbma-gdpr-proof-google-analytics' ); ?></label>
								<div class="uk-form-controls">
									<?php $ssbcptsValue = isset( $options['ssbcpts'] ) ? $options['ssbcpts'] : ''; ?>
									<input id="surbma_gpga_social_fields[ssbcpts]" class="uk-input" type="text" name="surbma_gpga_social_fields[ssbcpts]" value="<?php echo $ssbcptsValue; ?>" placeholder="CPT slugs in apostrophes, comma separated"<?php if ( SURBMA_GPGA_PLUGIN_VERSION == 'free' || SURBMA_GPGA_PLUGIN_LICENSE != 'valid' ) echo ' disabled'; ?> />
									<p class="uk-text-meta"><?php _e( 'This will enable Social Share Buttons on CPT single pages.', 'surbma-gdpr-proof-google-analytics' ); ?></p>
								</div>
							</div>
					    	<div class="uk-margin<?php if ( SURBMA_GPGA_PLUGIN_VERSION == 'free' || SURBMA_GPGA_PLUGIN_LICENSE != 'valid' ) echo ' disabled'; ?>">
								<label class="uk-form-label" for="surbma_gpga_social_fields[ssbcontentlocation]"><?php _e( 'Content Location', 'surbma-gdpr-proof-google-analytics' ); ?></label>
								<div class="uk-form-controls">
									<select class="uk-select" name="surbma_gpga_social_fields[ssbcontentlocation]"<?php if ( SURBMA_GPGA_PLUGIN_VERSION == 'free' || SURBMA_GPGA_PLUGIN_LICENSE != 'valid' ) echo ' disabled'; ?>>
										<?php
											$ssbcontentlocationValue = isset( $options['ssbcontentlocation'] ) ? $options['ssbcontentlocation'] : 'after';
											$selected = $ssbcontentlocationValue;
											$p = '';
											$r = '';

											foreach ( $ssbcontentlocation_options as $option ) {
												$label = $option['label'];
												if ( $selected == $option['value'] ) // Make default first in list
													$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
												else
													$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
											}
											echo $p . $r;
										?>
									</select>
					    		</div>
							</div>
							<?php if ( SURBMA_GPGA_PLUGIN_VERSION == 'free' || SURBMA_GPGA_PLUGIN_LICENSE != 'valid' ) { ?>
							<?php } ?>
							<h4 class="uk-heading-divider"><?php _e( 'Design Settings', 'surbma-gdpr-proof-google-analytics' ); ?></h4>
					    	<div class="uk-margin<?php if ( SURBMA_GPGA_PLUGIN_VERSION == 'free' || SURBMA_GPGA_PLUGIN_LICENSE != 'valid' ) echo ' disabled'; ?>">
								<label class="uk-form-label" for="surbma_gpga_social_fields[ssbstyle]"><?php _e( 'Styles', 'surbma-gdpr-proof-google-analytics' ); ?></label>
								<div class="uk-form-controls">
									<select class="uk-select" name="surbma_gpga_social_fields[ssbstyle]"<?php if ( SURBMA_GPGA_PLUGIN_VERSION == 'free' || SURBMA_GPGA_PLUGIN_LICENSE != 'valid' ) echo ' disabled'; ?>>
										<?php
											$ssbstyleValue = isset( $options['ssbstyle'] ) ? $options['ssbstyle'] : 'simple-colored';
											$selected = $ssbstyleValue;
											$p = '';
											$r = '';

											foreach ( $ssbstyle_options as $option ) {
												$label = $option['label'];
												if ( $selected == $option['value'] ) // Make default first in list
													$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
												else
													$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
											}
											echo $p . $r;
										?>
									</select>
					    		</div>
							</div>
							<?php if ( SURBMA_GPGA_PLUGIN_VERSION == 'free' || SURBMA_GPGA_PLUGIN_LICENSE != 'valid' ) { ?>
							<?php } ?>
						</div>
				    	<div class="uk-card-footer uk-background-muted">
							<p><input type="submit" class="uk-button uk-button-primary" value="<?php _e( 'Save Changes' ); ?>" /></p>
						</div>
					</div>
				</form>
			</div>
			<div class="uk-width-1-4@l">
				<?php surbma_gpga_admin_sidebar(); ?>
			</div>
		</div>
		<div class="uk-margin-bottom" id="bottom"></div>
	</div>
	<?php surbma_gpga_admin_footer(); ?>
</div>
<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function surbma_gpga_social_fields_validate( $input ) {
	global $ssbcontentlocation_options;
	global $ssbstyle_options;

	$options = get_option( 'surbma_gpga_social_fields' );

	// Say our text option must be safe text with no HTML tags.
	$input['ssbcpts'] = wp_filter_nohtml_kses( str_replace( ' ', '', $input['ssbcpts'] ) );

	// Checkbox validation.
	$input['ssbfacebook'] = isset( $input['ssbfacebook'] ) && $input['ssbfacebook'] == 1 ? 1 : 0;
	$input['ssbtwitter'] = isset( $input['ssbtwitter'] ) && $input['ssbtwitter'] == 1 ? 1 : 0;
	$input['ssblinkedin'] = isset( $input['ssblinkedin'] ) && $input['ssblinkedin'] == 1 ? 1 : 0;
	$input['ssbpinterest'] = isset( $input['ssbpinterest'] ) && $input['ssbpinterest'] == 1 ? 1 : 0;
	$input['ssbemail'] = isset( $input['ssbemail'] ) && $input['ssbemail'] == 1 ? 1 : 0;
	$input['ssbposts'] = isset( $input['ssbposts'] ) && $input['ssbposts'] == 1 ? 1 : 0;
	$input['ssbpages'] = isset( $input['ssbpages'] ) && $input['ssbpages'] == 1 ? 1 : 0;

	// Our select option must actually be in our array of select options.
	if ( !array_key_exists( $input['ssbcontentlocation'], $ssbcontentlocation_options ) )
		$input['ssbcontentlocation'] = 'after';
	if ( !array_key_exists( $input['ssbstyle'], $ssbstyle_options ) )
		$input['ssbstyle'] = 'simple-colored';

	// If no valid license, check if field has any value. If yes, save it, if no, set to default.
	if ( SURBMA_GPGA_PLUGIN_LICENSE != 'valid' ) {
		$input['ssbpages'] = isset( $options['ssbpages'] ) ? $options['ssbpages'] : 0;
		$input['ssbcpts'] = isset( $options['ssbcpts'] ) ? $options['ssbcpts'] : '';
		$input['ssbcontentlocation'] = isset( $options['ssbcontentlocation'] ) ? $options['ssbcontentlocation'] : 'after';
		$input['ssbstyle'] = isset( $options['ssbstyle'] ) ? $options['ssbstyle'] : 'simple-colored';
	}

	return $input;
}
