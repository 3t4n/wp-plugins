<?php
if ( ! defined( 'ABSPATH' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit;
}
?>

<div class="wrap">
    <h1><?php _e( 'Awesome Photo Gallery - Get Premium', 'apg' ); ?></h1>

    <p><?php _e( 'If you have already bought Awesome Photo Gallery premium, please enter your license key in the settings page.', 'apg' ); ?> <a href="<?php echo admin_url('edit.php?post_type=apg_photo_albums&page=apg_settings'); ?>" class="button"><?php _e('Enter license key', 'apg'); ?></a></p>

	<hr>
</div>