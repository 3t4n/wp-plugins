<?php // Flipdish Ordering - Settings Page

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {

	die;

}


// display the ordering system preview page
function flipdish_ordering_display_preview_page() {

	// check is user is allowed access
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	?>

	<div class="wrap">

		<div class="flipdishBody">

			<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
			<p>Please note this preview may be different to the actual ordering system in the front-end of your site displayed to users.</p>
			<p>We recommend you check the front-end to get an acurate representation of your ordering system.</p>

			<?php settings_errors(); ?>

			<hr />

			<?php flipdish_ordering_system(); ?>

		</div>

	</div>

	<?php

}
