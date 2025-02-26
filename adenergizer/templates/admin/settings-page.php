<?php

use \Adenergizer\AdEnergizer\Admin\SettingsPage;

SettingsPage::maybe_show_plugin_review_notice();
?>
<div class="wrap">
    <h1 class="wp-heading-inline"><?php _e( 'AdEnergizer Settings', 'adenergizer' ); ?></h1>
	<?php settings_errors( SettingsPage::PAGE_ID ); ?>
    <form action="<?php echo admin_url( 'admin-post.php' ); ?>" method="post">
        <input type="hidden" name="action" value="<?php echo SettingsPage::PAGE_ID; ?>"/>
		<?php
		wp_nonce_field( SettingsPage::PAGE_ID );
		do_settings_sections( SettingsPage::PAGE_ID );
		submit_button();
		?>
    </form>
</div>