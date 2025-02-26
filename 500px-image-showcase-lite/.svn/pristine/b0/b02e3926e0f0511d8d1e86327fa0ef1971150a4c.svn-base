<?php

add_action( 'admin_init', 'plugin_options_init' );
add_action( 'admin_menu', 'plugin_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function plugin_options_init(){
	register_setting( 'sample_options', 'plugin_options', 'plugin_options_validate' );
}

/**
 * Load up the menu page
 */
function plugin_options_add_page() {
	add_menu_page( __( '500px Showcase', 'Inceptive500pxImageShowcase-locale' ), __( ' 500px Showcase', 'Inceptive500pxImageShowcase-locale' ), 'administrator', __FILE__, 'plugin_options_do_page',plugins_url('/img/500px-icon.png', __FILE__));
}

/**
 * Create the options page
 */
function plugin_options_do_page() {

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	<div class="wrap">
		<?php echo "<h2>" . __( '500px Image Showcase Settings', 'Inceptive500pxImageShowcase-locale' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'Inceptive500pxImageShowcase-locale' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'sample_options' ); ?>
			<?php $options = get_option( 'plugin_options' ); ?>

			<table class="form-table">
				
				<?php
				/**
				 * 500px Consumer key
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( '500px Consumer Key', 'Inceptive500pxImageShowcase-locale' ); ?></th>
					<td>
						<input id="plugin_options[consumerkey]" class="regular-text" type="text" name="plugin_options[consumerkey]" value="<?php esc_attr_e( $options['consumerkey'] ); ?>" />
						<label class="description" for="plugin_options[consumerkey]"><?php _e( 'Type the 500px consumer key', 'Inceptive500pxImageShowcase-locale' ); ?></label>
					</td>
				</tr>

			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'Inceptive500pxImageShowcase-locale' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function plugin_options_validate( $input ) {
	global $select_options, $radio_options;

	// Consumer Key
	$input['consumerkey'] = wp_filter_nohtml_kses( $input['consumerkey'] );

	return $input;
}

// adapted from http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/