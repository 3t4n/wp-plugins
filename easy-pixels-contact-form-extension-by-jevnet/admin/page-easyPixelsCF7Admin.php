<div class="wrap">
	<h1><?php echo __('Contact Form 7 tracking','easy-pixels-contact-form-extension-by-jevnet'); ?></h1>

	<?php
	echo '<h2 class="nav-tab-wrapper">';
	do_action('easypixels_admintabs');
	echo '</h2>';
	?>

     <p><?php echo __('Track Contact Form 7! Works with Google Tag Manager, Google Analytics, Google Ads, Bing, Facebook and Twitter. This plugin sends the events shown at the right side of each form to all platforms with no extra configuration. Automatically it sends the event including the form name and the form id.','easy-pixels-contact-form-extension-by-jevnet'); ?><br/><br/></p>

	<form method="post" action="options.php">
	<?php
		settings_fields('jnAnalyticsCF7Settings-group');
		do_settings_sections('jnAnalyticsCF7Settings-group');

		do_action('easyPixelsContactForm');
		submit_button(); 
		?>
	</form>
</div>