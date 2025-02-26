<?php // Flipdish Ordering - System Info

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {

	die;

}

/**
 * System info page is responsible for displaying system info
 *
 * @since 1.4.2
 */
function flipdish_ordering_system_info_page() {

	// check is user is allowed access
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	require_once( 'classes/class-system-info.php' );
	$system = new System_Info();

	?>

	<div class="wrap">

		<div>

			<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

			<?php $system->display_info(); ?>

		</div>

	</div>

	<?php

}
