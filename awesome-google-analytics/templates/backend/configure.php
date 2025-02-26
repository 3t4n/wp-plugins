<form action="<?php echo admin_url( 'admin.php?page=aga_googleanalytics' ); ?>" method="post">

	<?php wp_nonce_field( 'aga_settings_nonce', 'aga_settings_nonce' ); ?>
	<h3><?php _e( 'Configure tracking code', 'awesome-google-analytics' ); ?></h3>
	<table class="form-table">
		<tr>
			<th><?php _e( 'UA Code', 'awesome-google-analytics' ); ?></th>
			<td><input type="text" name="aga_settings[ua_code]" value="<?php echo esc_attr( $this->options['ua_code'] ); ?>"
			           class="regular-text"/><br/><i><?php _e( 'This plugin supports the Universal tracking code only.', 'awesome-google-amalytics' ); ?></i>
			</td>
		</tr>
		<tr>
			<th></th>
			<td><input type="submit" class="button button-primary" value="<?php _e( 'Save settings', 'awesome-google-analytics' ); ?>"/> <a href="<?php echo admin_url('admin.php?page=aga_googleanalytics'); ?>" class="button">Cancel</a></td>
		</tr>
	</table>


</form>