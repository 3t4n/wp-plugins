<div id="wpbody">
    <div id="wpbody-content">
		<div class="wrap">
			<h1><?php _e( 'Settings', 'sls-logo-text' ) ?></h1>
			
			<div id="popmsg" class='notice sl-notice' style='margin-top:10px;display:none;'>
				<p class="message">
					<?php _e( '<span></span>', 'sls-logo-text' ) ?>
				</p>
				<button type="button" class="sl-btn-notice">
					<span class="screen-reader-text">Dismiss this notice.</span>
				</button>
			</div>
			
			<div class="sl-main-body sl-main-settings">
				<div class="sl-left-settings-body">
					<div class="sl-left-body-heading">
						<h3><?php _e( 'SL Logo', 'sls-logo-text' ) ?></h3>
					</div>
					<div class="sl-settings">
						<div class="sl-left-box">
							<form id="slsFormSettings" action="" method="post">
							<?php
								global $wpdb;
								$table_images = $wpdb->prefix . "sls_images";
								$image_count = $wpdb->get_var( "SELECT COUNT(*) FROM {$table_images}" );
							?>
							<table width="100%" border="0" cellspacing="5" cellpadding="5">
								<tbody>
									<tr>
										<td width="22%">
											<label><?php _e( "Slides to show", "sls-label" ); ?></label>
										</td>
										<td width="2%">
											<?php _e( " : ", "sls-dot" ); ?>
										</td>
										<td>
											<input type="number" min="2" max="<?php echo esc_html($image_count - 1); ?>" width="50" name="sls_slides_to_show" id="sl_slides_to_show" class="sl-options" value="<?php echo esc_html( SLS_SLIDES_TO_SHOW ); ?>">
										</td>
									</tr>
									<tr>
										<td width="22%">
											<label><?php _e( "Slides to scroll", "sls-label" ); ?></label>
										</td>
										<td width="2%">
											<?php _e( " : ", "sls-dot" ); ?>
										</td>
										<td>
											<input type="number" width="50" name="sls_slides_to_scroll" id="sl_slides_to_scroll" class="sl-options" value="<?php echo esc_html( SLS_SLIDES_TO_SCROLL ); ?>">
										</td>
									</tr>
									<tr>
										<td width="22%">
											<label><?php _e( "Autoplay", "sls-label" ); ?></label>
										</td>
										<td width="2%">
											<?php _e( " : ", "sls-dot" ); ?>
										</td>
										<td>
											<select name="sls_autoplay">
												<option value="1" <?php echo esc_html( SLS_AUTOPLAY ) == '1' ? 'selected="selected"' : ''; ?>><?php _e('true','sls-setting') ?></option>
												<option value="0" <?php echo esc_html( SLS_AUTOPLAY ) == '0' ? 'selected="selected"' : ''; ?>><?php _e('false','sls-setting') ?></option>
											</select>
										</td>
									</tr>
									<tr>
										<td width="22%">
											<label><?php _e( "Autoplay speed", "sls-label" ); ?></label>
										</td>
										<td width="2%">
											<?php _e( " : ", "sls-dot" ); ?>
										</td>
										<td>
											<input type="number" width="50" name="sls_autoplay_speed" id="sl_autoplay_speed" class="sl-options" value="<?php echo esc_html( SLS_AUTOPLAY_SPEED ); ?>">
										</td>
									</tr>
									<tr>
										<td width="22%">
											<label><?php _e( "Slider arrows", "sls-label" ); ?></label>
										</td>
										<td width="2%">
											<?php _e( " : ", "sls-dot" ); ?>
										</td>
										<td>
											<select name="sls_arrows">
												<option value="0" <?php echo esc_html( SLS_ARROWS ) == '0' ? 'selected="selected"' : ''; ?>><?php _e('false','sls-setting') ?></option>
												<option value="1" <?php echo esc_html( SLS_ARROWS ) == '1' ? 'selected="selected"' : ''; ?>><?php _e('true','sls-setting') ?></option>
											</select>
										</td>
									</tr>
									<tr>
										<td width="22%">
											<label><?php _e( "Slider dots", "sls-label" ); ?></label>
										</td>
										<td width="2%">
											<?php _e( " : ", "sls-dot" ); ?>
										</td>
										<td>
											<select name="sls_dots">
												<option value="0" <?php echo esc_html( SLS_DOTS ) == '0' ? 'selected="selected"' : ''; ?>><?php _e('false','sls-setting') ?></option>
												<option value="1" <?php echo esc_html( SLS_DOTS ) == '1' ? 'selected="selected"' : ''; ?>><?php _e('true','sls-setting') ?></option>
											</select>
										</td>
									</tr>
									<tr>
										<td width="22%">
											<label><?php _e( "Pause on hover", "sls-label" ); ?></label>
										</td>
										<td width="2%">
											<?php _e( " : ", "sls-dot" ); ?>
										</td>
										<td>
											<select name="sls_pause_on_hover">
												<option value="0" <?php echo esc_html( SLS_PAUSE_ON_HOVER ) == '0' ? 'selected="selected"' : ''; ?>><?php _e('false','sls-setting') ?></option>
												<option value="1" <?php echo esc_html( SLS_PAUSE_ON_HOVER ) == '1' ? 'selected="selected"' : ''; ?>><?php _e('true','sls-setting') ?></option>
											</select>
										</td>
									</tr>
									<tr>
										<td>
											<br><input type="submit" name="submit" value="Save Changes" title="<?php _e( "Save Changes", "sls-label" ); ?>">
										</td>
									</tr>
								</tbody>
							</table>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
