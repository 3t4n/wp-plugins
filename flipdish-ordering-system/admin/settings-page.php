<?php // Flipdish Ordering - Settings Page

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {

	die;

}


/**
 * display the plugin settings page
 * @since 1.4.2 Display php version number
 */
function flipdish_ordering_display_settings_page() {

	// check is user is allowed access
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	?>

	<div class="wrap">

		<div class="flipdishHeader">
			<?php echo '<img width="700px" src="' . esc_url( plugins_url( 'images/flipdish_header_large.png', __FILE__ ) ) . '" > '; ?>
		</div>

		<div class="flipdishBody">

			<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

			<p>
				<a href="https://flipdish.com/">Flipdish</a> provides ordering systems for restaurants, takeaways, shops and delis. Visit <a href="https://portal.flipdish.com/">our portal page</a> to set up your business with Flipdish.
			</p>

			<p><strong>Plugin:</strong> V<?php echo FLIPDISH_ORDERING_VERSION; ?> - <strong>PHP:</strong> V<?php echo phpversion(); ?></p>

			<hr />

			<?php settings_errors(); ?>

			<form action="options.php" method="post">

				<?php

				// output security fields
				settings_fields( 'flipdish_ordering_options' );

				// output settings sections
				do_settings_sections( 'flipdish_ordering' );

				// submit button
				?>

				<div class="flipdishSubmit">
					<?php submit_button(); ?>
				</div>

			</form>

			<hr />

			<input style="position:absolute; left: -9999px;" type="text" value="[flipdish_ordering]" id="shortcodeText" placeholder="flipdish_ordering">

			<h3>Please insert the shortcode below into the page to which you wish to add the ordering system:</h3>

			<p class="shortcodeText">[flipdish_ordering]</p>
			<button class="copyShortcode" onclick="shortcodeCopy()">Copy Shortcode</button>

			<hr />


			<form action="<?php echo esc_attr( admin_url( 'admin-post.php' ) ); ?>" method="post" onsubmit="return confirm('Are you sure you want to reset your Flipdish ordering settings?');">

				<h2>Reset Plugin Data</h2>
				<p>Are you having any issues or want to start over? You can reset this plugins settings to the default options here.</p>

				<input type="hidden" name="action" value="flipdish_ordering_reset_data">

				<div class="flipdishSubmit">
					<?php submit_button( 'Reset Data' ); ?>
				</div>
			</form>

		</div>

	</div>

	<?php

}
