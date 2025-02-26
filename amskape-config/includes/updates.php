<div class="welcome-panel-content">
	<div class="welcome-panel-column-container">
		<div class="welcome-panel-column"><br>
			<h2 class="title">
				Manage Updates
			</h2>

			<table class="form-table" id="email_settings" style="width:80% !important;">
				<tbody >
					<tr class="form-field form-required">
						<th scope="row"><label for="wpda_core_update">Disable Core Updates</label></th>
						<td><input name="options[wpda_core_update]" type="checkbox" id="wpda_core_update" 
						value="1" <?php echo get_option('wpda_core_update')?'ckecked="checked"':''; ?>">
						<?php
						if ( defined( 'AUTOMATIC_UPDATER_DISABLED' ) && true == AUTOMATIC_UPDATER_DISABLED ) {
							?>
							<div class="mpsum-error"><p><strong><?php esc_html_e( 'Automatic updates are disabled. Please check your wp-config.php file for AUTOMATIC_UPDATER_DISABLED and remove the line.' ); ?> </strong></p></div>
							<?php
						}
						if ( defined( 'WP_AUTO_UPDATE_CORE' ) && false == WP_AUTO_UPDATE_CORE ) {
							?>
							<div class="mpsum-error"><p><strong><?php esc_html_e( 'Automatic updates for Core are disabled. Please check your wp-config.php file for WP_AUTO_UPDATE_CORE and remove the line.' ); ?> </strong></p></div>
							<?php
						}
						?>
						</td>
					</tr>
					<tr class="form-field">
						<th scope="row"><label for="wpda_plugin_update">Disable Plugin Updates</label></th>
						<td><input name="options[wpda_plugin_update]" type="checkbox" id="wpda_plugin_update" 
						value="1" <?php echo get_option('wpda_plugin_update')?'ckecked="checked"':''; ?>"></td>
					</tr>
					<tr class="form-field">
						<th scope="row"><label for="wpda_theme_update">Disable Theme Updates</label></th>
						<td><input name="options[wpda_theme_update]" type="checkbox" id="wpda_theme_update" 
						value="1" <?php echo get_option('wpda_theme_update')?'ckecked="checked"':''; ?>"></td>
					</tr>
					
				</tbody>
				<tfoot>
					<tr class="form-field">
						<th scope="row"></th>
						<td>
							<input type="submit" name="save" class="button button-primary" id="save" value="Save Changes">
							<input type="submit" name="cancel" value="Cancel" class="button button-default ">
						</td>
					</tr>
				</tfoot>
			</table>
			 
		</div>
	</div>
</div>
	<script type='text/javascript'>
jQuery(function($){
	
	$('#save').click(function(event){
		$('.form-required').each(function() {
			var value= $(this).find("input").val();
			if(value == ""){
				event.preventDefault();
				$(this).addClass("form-invalid");
			}else{
				$(this).removeClass("form-invalid");
			}
		});
	});
	
	
});
</script>