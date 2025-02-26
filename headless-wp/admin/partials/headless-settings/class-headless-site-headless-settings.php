<?php

class Mo_Headless_Site_Headless_Settings {

	public static function headless_settings() {
		$enable_headless = get_option('mo_enable_headless') ? get_option('mo_enable_headless') : 'off';
	 ?>
		<div class="mo_table_layout">
			<h1>Frontend Settings</h1>
			Enable or Disable the frontend of your site<br><br>
			<form name="frontend_settings" method="post" action="" style="padding: 10px;">
				<?php wp_nonce_field('mo_headless_frontend_settings_form','mo_headless_frontend_settings_form_fields'); ?>
				<input type="hidden" name="option" value="mo_disable_wp_frontend">
				<label class="mo_switch">
	                <input autocomplete="off" onclick="turnOff(this, \'mo_headless_toggle\')"
	                <?php if($enable_headless === 'on') { echo "checked"; } ?>
	                type="checkbox" name="mo_enable_headless">
					<span id="mo_headless_toggle" class="mo_slider mo_round with_on_text"></span>
				</label>&emsp;<strong>Disable WP Frontend</strong><br><br>
				A <b>403 Unauthorized</b> error will be shown when users access the frontend of your site. Users can still login at <b><?php echo site_url(); ?>/wp-login.php</b><br><br>
				<input type="submit" name="submit" value="Save" class="button button-primary button-large">
			</form>
		</div>
	<?php
	}
}