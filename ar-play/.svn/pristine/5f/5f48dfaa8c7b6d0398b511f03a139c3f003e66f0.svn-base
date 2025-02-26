<?php

/**
 * @package  Arplay
 */

?>

<div class="wrap">

	<h1 style="margin-bottom: 20px">AR Play for WooCommerce</h1>

	<?php settings_errors(); ?>

	<ul class="nav nav-tabs">
		<li class="active"><a href="#tab-1">Settings</a></li>
	</ul>

	<div class="tab-content">

		<div id="tab-1" class="tab-pane active">

			<div style="width: 40%; display: inline-block; vertical-align: top">

				<h1>Page position | QR code | Mobile button</h1>

				<form method="post" action="options.php">
					<?php
					settings_fields( 'arplay_woocommerce_settings' );
					do_settings_sections( 'arplay_woocommerce' );
					submit_button();
					?>
				</form>

			</div>

			<div style="width: 59%; display: inline-block">
				<img style="max-height: 1200px" src="<?php echo plugins_url('../assets/img/positions.png', __FILE__); ?>" alt="Woocommerce Single page position map Image">
			</div>

		</div>

	</div>

</div>