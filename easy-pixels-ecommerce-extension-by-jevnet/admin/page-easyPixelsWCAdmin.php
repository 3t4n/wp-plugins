<div class="wrap">
	<h1><?php echo __('WooCommerce tracking by <b>JEVNET</b>','easy-pixels-ecommerce-extension-by-jevnet'); ?></h1>
     <p><?php echo __('Track WooCommerce! Works with Google Tag Manager, Google Analytics, Microsoft Advertising, Google Ads and Facebook. <a href="https://wordpress.org/plugins/easy-pixels-ecommerce-extension-by-jevnet/">More info</a>','easy-pixels-ecommerce-extension-by-jevnet');?><br/><br/></p>

	<?php
	echo '<h2 class="nav-tab-wrapper">';
	do_action('easypixels_admintabs');
	echo '</h2>';
	?>
	<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
	<?php
		settings_fields('jnEasyPixelsSettings-group');
//		do_settings_sections('jnEasyPixelsSettings-group');
		do_action('easyPixelsWC');
		submit_button( __('Save Settings','easy-pixels-by-jevnet'), 'primary', 'wpdocs-save-settings',false );
		 ?>
	</form>
</div>