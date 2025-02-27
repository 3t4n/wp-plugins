<div class="wrap about-wrap full-width-layout qlwrap">
	<form id="qltgm_button_form" method="post" action="options.php">
		<table class="form-table">
		<tbody>
			<tr>
			<th scope="row"><?php esc_html_e( 'Layout', 'quadlayers-telegram-chat' ); ?></th>
			<td>
				<select name="layout" class="qltgm-select2">
				<option value="button" <?php selected( $button['layout'], 'button' ); ?>><?php esc_html_e( 'Button', 'quadlayers-telegram-chat' ); ?></option>
				<option value="bubble" <?php selected( $button['layout'], 'bubble' ); ?>><?php esc_html_e( 'Bubble', 'quadlayers-telegram-chat' ); ?></option>
				</select>
				<p class="description hidden"><?php esc_html_e( 'Switch to change the button layout.', 'quadlayers-telegram-chat' ); ?></p>
			</td>
			</tr>
			<tr>
			<th scope="row"><?php esc_html_e( 'Box', 'quadlayers-telegram-chat' ); ?></th>
			<td>
				<select name="box" class="qltgm-select2">
				<option value="yes" <?php selected( $button['box'], 'yes' ); ?>><?php esc_html_e( 'Enable contact box', 'quadlayers-telegram-chat' ); ?></option>
				<option value="no" <?php selected( $button['box'], 'no' ); ?>><?php esc_html_e( 'Disable contact box', 'quadlayers-telegram-chat' ); ?></option>
				</select>
			</td>
			</tr>
			<tr>
			<th scope="row"><?php esc_html_e( 'Rounded', 'quadlayers-telegram-chat' ); ?></th>
			<td>
				<select name="rounded" class="qltgm-select2">
				<option value="yes" <?php selected( $button['rounded'], 'yes' ); ?>><?php esc_html_e( 'Add rounded border', 'quadlayers-telegram-chat' ); ?></option>
				<option value="no" <?php selected( $button['rounded'], 'no' ); ?>><?php esc_html_e( 'Remove rounded border', 'quadlayers-telegram-chat' ); ?></option>
				</select>
				<p class="description hidden"><?php esc_html_e( 'Add rounded border to the button.', 'quadlayers-telegram-chat' ); ?></p>
			</td>
			</tr>
			<tr>
			<th scope="row"><?php esc_html_e( 'Position', 'quadlayers-telegram-chat' ); ?></th>
			<td>
				<select name="position" class="qltgm-select2">
				<option value="middle-left" <?php selected( $button['position'], 'middle-left' ); ?>><?php esc_html_e( 'Middle Left', 'quadlayers-telegram-chat' ); ?></option>
				<option value="middle-right" <?php selected( $button['position'], 'middle-right' ); ?>><?php esc_html_e( 'Middle Right', 'quadlayers-telegram-chat' ); ?></option>
				<option value="bottom-left" <?php selected( $button['position'], 'bottom-left' ); ?>><?php esc_html_e( 'Bottom Left', 'quadlayers-telegram-chat' ); ?></option>
				<option value="bottom-right" <?php selected( $button['position'], 'bottom-right' ); ?>><?php esc_html_e( 'Bottom Right', 'quadlayers-telegram-chat' ); ?></option>
				</select>
				<p class="description hidden"><?php esc_html_e( 'Switch to change the button position.', 'quadlayers-telegram-chat' ); ?></p>
			</td>
			</tr>
	<!--         <tr>
			<th scope="row"><?php esc_html_e( 'Icon', 'quadlayers-telegram-chat' ); ?></th>
			<td>
				<div class="submit qltgm-premium-field">
				<?php submit_button( esc_html__( 'Add Icon', 'quadlayers-telegram-chat' ), 'secondary', null, false, array( 'id' => 'qltgm_icon_add' ) ); ?>
				<p class="description hidden"><small><?php esc_html_e( 'This is a premium feature', 'quadlayers-telegram-chat' ); ?></small></p>
				</div>
				<input type="text" name="icon" placeholder="<?php echo esc_html( $button['icon'] ); ?>" value="<?php echo esc_attr( $button['icon'] ); ?>" class="qltgm-input" />
			</td>
			</tr> -->
			<!--<tr>
			<th scope="row"><2?php esc_html_e('Discreet link', 'quadlayers-telegram-chat'); ?></th>
			<td>
				<select name="developer" class="qltgm-select2">
				<option value="yes" <2?php selected($button['developer'], 'yes'); ?>><2?php esc_html_e('Show developer link', 'quadlayers-telegram-chat'); ?></option>
				<option value="no" <2?php selected($button['developer'], 'no'); ?>><2?php esc_html_e('Hide developer link', 'quadlayers-telegram-chat'); ?></option>
				</select>
				<p class="description hidden"><2?php esc_html_e('Leave a discrete link to developer to help and keep new updates and support.', 'quadlayers-telegram-chat'); ?></p>        
			</td>        
			</tr> -->
			<tr>
			<th scope="row"><?php esc_html_e( 'Text', 'quadlayers-telegram-chat' ); ?></th>
			<td>
				<input type="text" name="text" placeholder="<?php echo esc_html( $button['text'] ); ?>" value="<?php echo esc_attr( $button['text'] ); ?>" class="qltgm-input" />
				<p class="description hidden"><?php esc_html_e( 'Customize your text.', 'quadlayers-telegram-chat' ); ?></p>
			</td>
			</tr>
	<!--        <tr>
			<th scope="row"><2?php esc_html_e('Phone', 'quadlayers-telegram-chat'); ?></th>
			<td>
				<input type="text" name="phone" placeholder="" value="<2?php echo esc_attr($button['phone']); ?>" class="qltgm-input" required="required" />
				<p class="description hidden"><2?php esc_html_e('Full phone number in international format.', 'quadlayers-telegram-chat'); ?></p>

			</td>
			</tr> -->			
			<tr class="<?php echo esc_attr( $button['box'] == 'yes' ? 'hidden' : '' ); ?>">
			<th scope="row"><?php esc_html_e( 'Username', 'quadlayers-telegram-chat' ); ?></th>
			<td>
				<input type="text" name="username" placeholder="" value="<?php echo esc_attr( $button['username'] ); ?>" class="qltgm-input" required="required" />
				<p class="description hidden"><?php esc_html_e( 'Full phone number in international format.', 'quadlayers-telegram-chat' ); ?></p>
			</td>
			</tr>
			<!--        <tr>
			<th scope="row"><2?php esc_html_e('Message', 'quadlayers-telegram-chat'); ?></th>
			<td>
				<textarea maxlength="500" style="width:75%;height:50px;padding:8px;" name="message" placeholder="<2?php echo esc_html($button['message']); ?>"><2?php echo esc_html(trim($button['message'])); ?></textarea>
				<p class="description hidden"><2?php esc_html_e('Message that will automatically appear in the text field of a chat.', 'quadlayers-telegram-chat'); ?></p>
			</td>
			</tr> 
			<tr>
			<th scope="row"><?php esc_html_e( 'Schedule', 'quadlayers-telegram-chat' ); ?></th>
			<td class="qltgm-premium-field">
				<b><?php esc_html_e( 'From', 'quadlayers-telegram-chat' ); ?></b>
				<input type="time" name="timefrom" placeholder="<?php echo esc_html( $button['timefrom'] ); ?>" value="<?php echo esc_html( $button['timefrom'] ); ?>" />
				<b><?php esc_html_e( 'To', 'quadlayers-telegram-chat' ); ?></b>
				<input type="time" name="timeto" placeholder="<?php echo esc_html( $button['timeto'] ); ?>" value="<?php echo esc_html( $button['timeto'] ); ?>" />
				<p class="description hidden"><small><?php esc_html_e( 'This is a premium feature', 'quadlayers-telegram-chat' ); ?></small></p>
			</td>
			</tr>
			<tr>
			<th scope="row"><?php esc_html_e( 'Timezone', 'quadlayers-telegram-chat' ); ?></th>
			<td class="qltgm-premium-field">
				<select name="timezone" aria-describedby="timezone-description" required="" class="qltgm-select2">
				<?php echo wp_timezone_choice( $button['timezone'], get_user_locale() ); ?>
				</select>
				<p class="description"><small><?php esc_html_e( 'Hide button if the user is out of the available hours.', 'quadlayers-telegram-chat' ); ?></small></p>
				<p class="description hidden"><small><?php esc_html_e( 'This is a premium feature', 'quadlayers-telegram-chat' ); ?></small></p>
			</td>
			</tr>
			<tr>
			<th scope="row"><?php esc_html_e( 'Available days', 'quadlayers-telegram-chat' ); ?></th>
			<td class="qltgm-premium-field">
				<select name="timedays[]" multiple style="height:100px;">
				<option value="0" <?php echo in_array( '0', $button['timedays'] ) ? 'selected="selected"' : ''; ?>><?php esc_html_e( 'Sunday', 'quadlayers-telegram-chat' ); ?></option>
				<option value="1" <?php echo in_array( '1', $button['timedays'] ) ? 'selected="selected"' : ''; ?>><?php esc_html_e( 'Monday', 'quadlayers-telegram-chat' ); ?></option>
				<option value="2" <?php echo in_array( '2', $button['timedays'] ) ? 'selected="selected"' : ''; ?>><?php esc_html_e( 'Tuesday', 'quadlayers-telegram-chat' ); ?></option>
				<option value="3" <?php echo in_array( '3', $button['timedays'] ) ? 'selected="selected"' : ''; ?>><?php esc_html_e( 'Wednesday', 'quadlayers-telegram-chat' ); ?></option>
				<option value="4" <?php echo in_array( '4', $button['timedays'] ) ? 'selected="selected"' : ''; ?>><?php esc_html_e( 'Thursday', 'quadlayers-telegram-chat' ); ?></option>
				<option value="5" <?php echo in_array( '5', $button['timedays'] ) ? 'selected="selected"' : ''; ?>><?php esc_html_e( 'Friday', 'quadlayers-telegram-chat' ); ?></option>
				<option value="6" <?php echo in_array( '6', $button['timedays'] ) ? 'selected="selected"' : ''; ?>><?php esc_html_e( 'Saturday', 'quadlayers-telegram-chat' ); ?></option>
				</select>
				<p class="description hidden"><small><?php esc_html_e( 'This is a premium feature', 'quadlayers-telegram-chat' ); ?></small></p>
			</td>
			</th>
			</tr>
			<tr>
			<th scope="row">
			<?php
			// esc_html_e('Timeout', 'quadlayers-telegram-chat');
			?>
							</th>
			<td  class="qltgm-premium-field">
				<select name="timeout" class="qltgm-select2">
				<option value="yes" 
				<?php
				// selected($button['timeout'], 'yes');
				?>
									><?php esc_html_e( 'Show the button as read only', 'quadlayers-telegram-chat' ); ?></option>
				<option value="no" 
				<?php
				// selected($button['timeout'], 'no');
				?>
									><?php esc_html_e( 'Do not show the button', 'quadlayers-telegram-chat' ); ?></option>
				</select> 
				<p class="description hidden"><small>
				<?php
				// esc_html_e('This is a premium feature', 'quadlayers-telegram-chat');
				?>
													</small></p>    
			</td>        
			</tr> -->
		</tbody>
		</table>
		<?php wp_nonce_field( 'qltgm_save_button', 'qltgm_button_form_nonce' ); ?>
		<p class="submit">
		<?php submit_button( esc_html__( 'Save', 'quadlayers-telegram-chat' ), 'primary', 'submit', false ); ?>
		<span class="settings-save-status">
			<span class="saved"><?php esc_html_e( 'Saved successfully!' ); ?></span>
			<span class="spinner" style="float: none"></span>
		</span>
		</p>
	</form>
</div>
