<div class="wrap ytsb-wrap">
	<div class="notice notice-success is-dismissible" <?php echo $saved_state === 'yes' ? ' style="display: block;" ' : ' style="display: none;" '; ?>>
		<p><strong><?php esc_html_e( 'Options saved successfully.', 'youtube-subscribe-bar' ); ?></strong></p>
		<button type="button" class="notice-dismiss">
			<span class="screen-reader-text"><?php esc_html_e( 'Dismiss this notice.', 'youtube-subscribe-bar' ); ?></span>
		</button>
	</div>
	<h1><?php esc_html_e( 'YouTube Subscribe Bar Settings', 'youtube-subscribe-bar' ); ?></h1>
	<form method="post" action="options-general.php?page=<?php echo rawurlencode( $this->plugin_slug ); ?>" novalidate="novalidate">
		<input type="hidden" name="option_page" value="general">
		<input type="hidden" name="action" value="update">
		<?php wp_nonce_field( 'youtube-subscribe-bar-settings-nonce' ); ?>
		<div id="poststuff">
			<div id="post-body" class="metabox-holder columns-2">
				<div id="post-body-content">
					<div id="normal-sortables" class="meta-box-sortables ui-sortable">
						<div class="postbox">
							<h2 class="hndle"><?php esc_html_e( 'Channel Specific YouTube Settings', 'youtube-subscribe-bar' ); ?></h2>
							<div class="inside">
								<table class="form-table">
									<tbody>
										<tr class="channel-row">
											<th scope="row">
												<label for="ytsb_channel_id">
													YouTube
													<select id="ytsb_channel_type" name="ytsb_channel_type">
														<option
														<?php selected( $settings['ytsb_channel_type'], 'channel' ); ?>
														value="channel"><?php esc_html_e( 'Channel Name', 'youtube-subscribe-bar' ); ?></option>
														<option
														<?php selected( $settings['ytsb_channel_type'], 'channelid' ); ?>
														value="channelid"><?php esc_html_e( 'Channel ID', 'youtube-subscribe-bar' ); ?></option>
													</select>
												</label>
											</th>
											<td>
												<input name="ytsb_channel_id" type="text" id="ytsb_channel_id" aria-describedby="tagline-ytsb_channel_id" value="<?php echo esc_attr( $settings['ytsb_channel_id'] ); ?>" class="regular-text">
												<span class="red">*</span>
												<p class="description" id="tagline-ytsb_channel_id"><?php esc_html_e( 'Enter your YouTube Channel ID or Name. Note: Youtube Channel name and Channel ID are different and you need to enter either one.', 'youtube-subscribe-bar' ); ?></p>
											</td>
										</tr>
										<tr>
											<th scope="row"><label for="ytsb_button_layout"><?php esc_html_e( 'Subscribe Button Layout', 'youtube-subscribe-bar' ); ?></label></th>
											<td>
												<select name="ytsb_button_layout" id="ytsb_button_layout">
													<option
													<?php selected( $settings['ytsb_button_layout'], 'default' ); ?>
													value="default"><?php esc_html_e( 'Small', 'youtube-subscribe-bar' ); ?></option>
													<option
													<?php selected( $settings['ytsb_button_layout'], 'full' ); ?>
													value="full"><?php esc_html_e( 'Full', 'youtube-subscribe-bar' ); ?></option>
												</select>
											</td>
										</tr>
										<tr>
											<th scope="row"><label for="ytsb_button_theme"><?php esc_html_e( 'Subscribe Button Theme', 'youtube-subscribe-bar' ); ?></label></th>
											<td>
												<select name="ytsb_button_theme" id="ytsb_button_theme">
													<option
													<?php selected( $settings['ytsb_button_theme'], 'default' ); ?>
													value="default"><?php esc_html_e( 'Light', 'youtube-subscribe-bar' ); ?></option>
													<option
													<?php selected( $settings['ytsb_button_theme'], 'dark' ); ?>
													value="dark"><?php esc_html_e( 'Dark', 'youtube-subscribe-bar' ); ?></option>
												</select>
											</td>
										</tr>
										<tr>
											<th scope="row"><label for="ytsb_button_count"><?php esc_html_e( 'Show Subscribers Count?', 'youtube-subscribe-bar' ); ?></label></th>
											<td>
												<select name="ytsb_button_count" id="ytsb_button_count">
													<option
													<?php selected( $settings['ytsb_button_count'], 'default' ); ?>
													value="default"><?php esc_html_e( 'Yes', 'youtube-subscribe-bar' ); ?></option>
													<option
													<?php selected( $settings['ytsb_button_count'], 'hidden' ); ?>
													value="hidden"><?php esc_html_e( 'No', 'youtube-subscribe-bar' ); ?></option>
												</select>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="postbox">
							<h2 class="hndle"><?php esc_html_e( 'Plugin Settings', 'youtube-subscribe-bar' ); ?></h2>
							<div class="inside">
								<table class="form-table">
									<tbody>
										<tr>
											<th scope="row"><label for="ytsb_text"><?php esc_html_e( 'Subscribe to channel text', 'youtube-subscribe-bar' ); ?></label></th>
											<td>
												<input name="ytsb_text" type="text" id="ytsb_text" aria-describedby="tagline-ytsb_text" value="<?php echo esc_attr( $settings['ytsb_text'] ); ?>" class="regular-text">
												<p class="description" id="tagline-ytsb_text"><?php esc_html_e( 'Enter an info text that asks the user to click the Subscribe button. Leave empty to disable.', 'youtube-subscribe-bar' ); ?></p>
											</td>
										</tr>
										<tr>
											<th scope="row"><label for="ytsb_text_color"><?php esc_html_e( 'Subscribe to channel text color', 'youtube-subscribe-bar' ); ?></label></th>
											<td>
												<input name="ytsb_text_color" type="text" id="ytsb_text_color" aria-describedby="tagline-ytsb_text_color" value="<?php echo esc_attr( $settings['ytsb_text_color'] ); ?>" class="regular-text">
												<p class="description" id="tagline-ytsb_text_color"><?php esc_html_e( 'Leave empty to disable.', 'youtube-subscribe-bar' ); ?></p>
											</td>
										</tr>
										<tr>
											<th scope="row"><label for="ytsb_bg_color"><?php esc_html_e( 'Subscribe to channel background color', 'youtube-subscribe-bar' ); ?></label></th>
											<td>
												<input name="ytsb_bg_color" type="text" id="ytsb_bg_color" aria-describedby="tagline-ytsb_bg_color" value="<?php echo esc_attr( $settings['ytsb_bg_color'] ); ?>" class="regular-text">
												<p class="description" id="tagline-ytsb_bg_color"><?php esc_html_e( 'Leave empty to disable.', 'youtube-subscribe-bar' ); ?></p>
											</td>
										</tr>
									</tbody>
								</table>
								<p style="padding: 15px 0 0 0;"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"></p>
							</div>
						</div>
					</div>
				</div>
				<div id="postbox-container-1" class="postbox-container">
					<?php require_once 'admin_view_sidebar.php'; ?>
				</div>
			</div>
		</div>
	</form>
</div>
