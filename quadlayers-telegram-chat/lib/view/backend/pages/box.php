<div class="wrap about-wrap full-width-layout qlwrap">
	<form id="qltgm_box_form" method="post" action="options.php">
		<table class="form-table">
		<tbody>
		<!--  
			<tr>
			<th scope="row"><?php esc_html_e( 'Auto open', 'quadlayers-telegram-chat' ); ?></th>
			<td class="qltgm-premium-field">
				<select name="auto_open" class="qltgm-select2">
				<option value="yes" <?php selected( $box['auto_open'], 'yes' ); ?>><?php esc_html_e( 'Enable auto open', 'quadlayers-telegram-chat' ); ?></option>
				<option value="no" <?php selected( $box['auto_open'], 'no' ); ?>><?php esc_html_e( 'Disable auto open', 'quadlayers-telegram-chat' ); ?></option>
				</select>
				<p class="description hidden"><small><?php esc_html_e( 'This is a premium feature', 'quadlayers-telegram-chat' ); ?></small></p>
			</td>
			</tr>
			<tr>
			<th scope="row"><?php esc_html_e( 'Delay', 'quadlayers-telegram-chat' ); ?></th>
			<td class="qltgm-premium-field">
				<input type="number" step="100" name="auto_delay_open" placeholder="<?php echo esc_html( $box['auto_delay_open'] ); ?>" value="<?php echo esc_attr( $box['auto_delay_open'] ); ?>" />
				<p class="description"><?php esc_html_e( 'In miliseconds', 'quadlayers-telegram-chat' ); ?></p>
				<p class="description hidden"><small><?php esc_html_e( 'This is a premium feature', 'quadlayers-telegram-chat' ); ?></small></p>
			</td>
			</tr>
			-->
			<tr>
			<th scope="row"><?php esc_html_e( 'Header', 'quadlayers-telegram-chat' ); ?></th>
			<td>
				<?php
				wp_editor(
					$box['header'],
					'qltgm_box_header',
					array(
						'editor_height' => 100,
						'textarea_name' => 'header',
						'tinymce'       => array( 'init_instance_callback' => 'function(editor) {   editor.on("change", function(e){jQuery(document).trigger("tinymce_change");}); }' ),
					)
				);
				?>
			</td>
			</tr>
			<tr>
			<th scope="row"><?php esc_html_e( 'Footer', 'quadlayers-telegram-chat' ); ?></th>
			<td>
				<?php
				// wp_editor($box['footer'], 'qltgm_box_footer', array('editor_height' => 50, 'textarea_name' => 'footer'));
				?>
				<?php
				wp_editor(
					$box['footer'],
					'qltgm_box_footer',
					array(
						'editor_height' => 50,
						'textarea_name' => 'footer',
						'tinymce'       => array( 'init_instance_callback' => 'function(editor) {   editor.on("change", function(){jQuery(document).trigger("tinymce_change");}); }' ),
					)
				);
				?>
			</td>
			</tr>
			<!-- <tr>
			<th scope="row"><?php esc_html_e( 'Response', 'quadlayers-telegram-chat' ); ?></th>
			<td>
				<input type="text" name="response" placeholder="<?php echo esc_html( $box['response'] ); ?>" value="<?php echo esc_attr( $box['response'] ); ?>" class="qltgm-input" />
				<p class="description hidden"><?php esc_html_e( 'Write a response text.', 'quadlayers-telegram-chat' ); ?></p>
			</td>
			</tr> -->

		</tbody>
		</table>
		<?php wp_nonce_field( 'qltgm_save_box', 'qltgm_box_form_nonce' ); ?>
		<p class="submit">
		<?php submit_button( esc_html__( 'Save', 'quadlayers-telegram-chat' ), 'primary', 'submit', false ); ?>
		<span class="settings-save-status">
			<span class="saved"><?php esc_html_e( 'Saved successfully!' ); ?></span>
			<span class="spinner" style="float: none"></span>
		</span>
		</p>
	</form>
	</div>
