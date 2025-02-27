<div class="wrap about-wrap full-width-layout qlwrap">
	<form method="post" id="qltgm_scheme_form">
		<table class="form-table">
		<tbody>
			<tr>
			<th scope="row"><?php esc_html_e( 'Background', 'quadlayers-telegram-chat' ); ?></th>
			<td>
				<input class="qltgm-color-field" type="text" name="brand" value="<?php echo esc_attr( $scheme['brand'] ); ?>" />
			</td>
			</tr>
			<tr>
			<th scope="row"><?php esc_html_e( 'Color', 'quadlayers-telegram-chat' ); ?></th>
			<td>
				<input class="qltgm-color-field" type="text" name="text" value="<?php echo esc_attr( $scheme['text'] ); ?>" />
			</td>
			</tr>      
			<!--
			<tr class="qltgm-premium-field">
			<th scope="row"><?php esc_html_e( 'Link', 'quadlayers-telegram-chat' ); ?></th>
			<td>
				<input class="qltgm-color-field" type="link" name="link" value="<?php echo esc_attr( $scheme['link'] ); ?>" />
				<p class="description hidden"><small><?php esc_html_e( 'This is a premium feature', 'quadlayers-telegram-chat' ); ?></small></p>        
			</td>
			</tr>      
			<tr class="qltgm-premium-field">
			<th scope="row"><?php esc_html_e( 'Message', 'quadlayers-telegram-chat' ); ?></th>
			<td>
				<input class="qltgm-color-field" type="link" name="message" value="<?php echo esc_attr( $scheme['message'] ); ?>" />
				<p class="description hidden"><small><?php esc_html_e( 'This is a premium feature', 'quadlayers-telegram-chat' ); ?></small></p>      
			</td>
			</tr>      
			<tr class="qltgm-premium-field">
			<th scope="row"><?php esc_html_e( 'Label', 'quadlayers-telegram-chat' ); ?></th>
			<td>
				<input class="qltgm-color-field" type="link" name="label" value="<?php echo esc_attr( $scheme['label'] ); ?>" />
				<p class="description hidden"><small><?php esc_html_e( 'This is a premium feature', 'quadlayers-telegram-chat' ); ?></small></p>      
			</td>
			</tr>      
			<tr class="qltgm-premium-field">
			<th scope="row"><?php esc_html_e( 'Name', 'quadlayers-telegram-chat' ); ?></th>
			<td>
				<input class="qltgm-color-field" type="link" name="name" value="<?php echo esc_attr( $scheme['name'] ); ?>" />
				<p class="description hidden"><small><?php esc_html_e( 'This is a premium feature', 'quadlayers-telegram-chat' ); ?></small></p>
			</td>
			</tr>
			-->
		</tbody>
		</table>
		<?php wp_nonce_field( 'qltgm_save_scheme', 'qltgm_scheme_form_nonce' ); ?> 
		<p class="submit">
		<?php submit_button( esc_html__( 'Save', 'quadlayers-telegram-chat' ), 'primary', 'submit', false ); ?>
		<span class="settings-save-status">  
			<span class="saved"><?php esc_html_e( 'Saved successfully!' ); ?></span>
			<span class="spinner" style="float: none"></span>
		</span>
		</p> 
	</form>
</div>
