<?php 
defined('ABSPATH') or die("No direct script access!");
?>
		<div class="aims-accordion-list wrap">   
			<h1 class="wp-heading-inline"><?php esc_html_e('Toastr Settings', 'message-toastr-contact-form-7'); ?></h1>
		    <hr class="wp-header-end" />
		    <br/>
        	<div class="aims-accordion-box aims-accordion-active">   
                <div class="aims-container">
                	<form method="post" action="options.php">
						<?php settings_fields( 'aims-cf7-settings-group' ); ?>
						<?php do_settings_sections( 'aims-cf7-settings-group' ); ?>

						<table class="form-table">     
								
							<tr valign="top">
								<th scope="row"><?php esc_html_e('Enable Toastr Notification', 'message-toastr-contact-form-7'); ?></th>
								<td>
									
			                    <label class="aims-checkbox-switch">
			                      <input type="checkbox" name="aims_cf7_settings_enable" class="aims-checkbox-switch-input" <?php echo (get_option('aims_cf7_settings_enable') == '' ? esc_attr( get_option('aims_cf7_settings_enable')): esc_attr( 'checked="checked"' )); ?>>
			                      <span class="aims-checkbox-switch-label" data-on="On" data-off="Off"></span>
			                      <span class="aims-checkbox-switch-handle"></span>
			                    </label>
								<i><?php esc_html_e('Show Toastr Notification Message with Contact Form 7', 'message-toastr-contact-form-7'); ?></i>					
								</td>
							</tr>     
								
							<tr valign="top">
								<th scope="row"><?php esc_html_e('Default Notification', 'message-toastr-contact-form-7'); ?></th>
								<td>
									
			                    <label class="aims-checkbox-switch">
			                      <input type="checkbox" name="aims_cf7_settings_default_notice_disable" class="aims-checkbox-switch-input" <?php echo (get_option('aims_cf7_settings_default_notice_disable') == '' ? esc_attr( get_option('aims_cf7_settings_default_notice_disable')): esc_attr( 'checked="checked"' )); ?>>
			                      <span class="aims-checkbox-switch-label" data-on="On" data-off="Off"></span>
			                      <span class="aims-checkbox-switch-handle"></span>
			                    </label>
								<i><?php esc_html_e('Disable Default Contact Form 7 Notification Message', 'message-toastr-contact-form-7'); ?></i>					
								</td>
							</tr>  
								
							<tr valign="top">
								<th scope="row"><?php esc_html_e('Close Button', 'message-toastr-contact-form-7'); ?></th>
								<td>
									
			                    <label class="aims-checkbox-switch">
			                      <input type="checkbox" name="aims_cf7_settings_close_button" class="aims-checkbox-switch-input" <?php echo (get_option('aims_cf7_settings_close_button') == '' ? esc_attr( get_option('aims_cf7_settings_close_button')): esc_attr( 'checked="checked"' )); ?>>
			                      <span class="aims-checkbox-switch-label" data-on="On" data-off="Off"></span>
			                      <span class="aims-checkbox-switch-handle"></span>
			                    </label>
								<i><?php esc_html_e('Disable Toastr Close Button', 'message-toastr-contact-form-7'); ?></i>					
								</td>
							</tr>
								
							<tr valign="top">
								<th scope="row"><?php esc_html_e('Progress Bar', 'message-toastr-contact-form-7'); ?></th>
								<td>
									
			                    <label class="aims-checkbox-switch">
			                      <input type="checkbox" name="aims_cf7_settings_progress_bar" class="aims-checkbox-switch-input" <?php echo (get_option('aims_cf7_settings_progress_bar') == '' ? esc_attr( get_option('aims_cf7_settings_progress_bar')): esc_attr( 'checked="checked"' )); ?>>
			                      <span class="aims-checkbox-switch-label" data-on="On" data-off="Off"></span>
			                      <span class="aims-checkbox-switch-handle"></span>
			                    </label>
								<i><?php esc_html_e('Disable Toastr Progress Bar', 'message-toastr-contact-form-7'); ?></i>					
								</td>
							</tr>
								
							<tr valign="top">
								<th scope="row"><?php esc_html_e('Prevent Duplicates', 'message-toastr-contact-form-7'); ?></th>
								<td>
									
			                    <label class="aims-checkbox-switch">
			                      <input type="checkbox" name="aims_cf7_settings_prevent_duplicates" class="aims-checkbox-switch-input" <?php echo (get_option('aims_cf7_settings_prevent_duplicates') == '' ? esc_attr( get_option('aims_cf7_settings_prevent_duplicates')): esc_attr( 'checked="checked"' )); ?>>
			                      <span class="aims-checkbox-switch-label" data-on="On" data-off="Off"></span>
			                      <span class="aims-checkbox-switch-handle"></span>
			                    </label>
								<i><?php esc_html_e('Prevent Duplicates Toastr Message', 'message-toastr-contact-form-7'); ?></i>					
								</td>
							</tr>
							
							<tr valign="top">
								<th scope="row"><?php esc_html_e('Popup TimeOut', 'message-toastr-contact-form-7'); ?></th>
								<td>
									
		                    		<input type="number" class="aims_cf7_settings_show_popup_timeout" name="aims_cf7_settings_show_popup_timeout" value="<?php echo ( get_option('aims_cf7_settings_show_popup_timeout')!=''? esc_attr( get_option('aims_cf7_settings_show_popup_timeout') ) : '' ); ?>">	
								<i><b><?php esc_html_e('( Seconds ) ', 'message-toastr-contact-form-7') ?></b><?php esc_html_e('Popup will hide after 5 Seconds', 'message-toastr-contact-form-7'); ?></i>							
								</td>
							</tr>
							
							<tr valign="top">
								<th scope="row"><?php esc_html_e('Position', 'message-toastr-contact-form-7'); ?></th>
								<td>
									
		                    		<div class="aims-field-content">
		                    			
					                    <p><input type="radio" name="aims_cf7_settings_box_position" id="top-left" value="top-left" <?php echo (get_option('aims_cf7_settings_box_position') == '' ? esc_attr( get_option('aims_cf7_settings_box_position')): esc_attr( 'checked="checked"' )); ?>><label for="top-left"><?php esc_html_e('Top Left', 'message-toastr-contact-form-7'); ?></label></p>

					                    <p><input type="radio" name="aims_cf7_settings_box_position" id="top-center" value="top-center" <?php echo (get_option('aims_cf7_settings_box_position') == 'top-center' ?  esc_attr( 'checked="checked"' ) : '' ); ?>><label for="top-center"><?php esc_html_e('Top Center', 'message-toastr-contact-form-7'); ?></label></p>

					                    <p><input type="radio" name="aims_cf7_settings_box_position" id="top-right" value="top-right" <?php echo (get_option('aims_cf7_settings_box_position') == 'top-right' ?  esc_attr( 'checked="checked"' ) : '' ); ?>><label for="top-right"><?php esc_html_e('Top Right', 'message-toastr-contact-form-7'); ?></label></p>

					                    <p><input type="radio" name="aims_cf7_settings_box_position" id="top-full-width" value="top-full-width" <?php echo (get_option('aims_cf7_settings_box_position') == 'top-full-width' ?  esc_attr( 'checked="checked"' ) : '' ); ?>><label for="top-full-width"><?php esc_html_e('Top Full Width', 'message-toastr-contact-form-7'); ?></label></p>

					                    <p><input type="radio" name="aims_cf7_settings_box_position" id="bottom-left" value="bottom-left" <?php echo (get_option('aims_cf7_settings_box_position') == 'bottom-left' ?  esc_attr( 'checked="checked"' ) : '' ); ?>><label for="bottom-left"><?php esc_html_e('Bottom Left', 'message-toastr-contact-form-7'); ?></label></p>

					                    <p><input type="radio" name="aims_cf7_settings_box_position" id="bottom-center" value="bottom-center" <?php echo (get_option('aims_cf7_settings_box_position') == 'bottom-center' ?  esc_attr( 'checked="checked"' ) : '' ); ?>><label for="bottom-center"><?php esc_html_e('Bottom center', 'message-toastr-contact-form-7'); ?></label></p>

					                    <p><input type="radio" name="aims_cf7_settings_box_position" id="bottom-right" value="bottom-right" <?php echo (get_option('aims_cf7_settings_box_position') == 'bottom-right' ?  esc_attr( 'checked="checked"' ) : '' ); ?>><label for="bottom-right"><?php esc_html_e('Bottom right', 'message-toastr-contact-form-7'); ?></label></p>

					                    <p><input type="radio" name="aims_cf7_settings_box_position" id="bottom-full-width" value="bottom-full-width" <?php echo (get_option('aims_cf7_settings_box_position') == 'bottom-full-width' ?  esc_attr( 'checked="checked"' ) : '' ); ?>><label for="bottom-full-width"><?php esc_html_e('Bottom Full Width', 'message-toastr-contact-form-7'); ?></label></p>

					                </div>	
					                <br/>
									<p><i><?php esc_html_e('There is 8 Toastr position support', 'message-toastr-contact-form-7'); ?></i>	</p>						
								</td>
							</tr>
								
							<tr valign="top">
								<th scope="row"><?php esc_html_e('Custom Settings', 'message-toastr-contact-form-7'); ?></th>
								<td>
									
			                    <label class="aims-checkbox-switch">
			                      <input type="checkbox" name="aims_cf7_settings_custom_settings_disable" class="aims-checkbox-switch-input" <?php echo (get_option('aims_cf7_settings_custom_settings_disable') == '' ? esc_attr( get_option('aims_cf7_settings_custom_settings_disable')): esc_attr( 'checked="checked"' )); ?>>
			                      <span class="aims-checkbox-switch-label" data-on="On" data-off="Off"></span>
			                      <span class="aims-checkbox-switch-handle"></span>
			                    </label>
								<i><?php esc_html_e('Enable to work Custom Settings', 'message-toastr-contact-form-7'); ?></i>					
								</td>
							</tr>
							
							<tr valign="top">
								<th scope="row"><?php esc_html_e('Global Success Message', 'message-toastr-contact-form-7'); ?></th>
								<td>
									
		                    		<input type="text" class="regular-text" name="aims_cf7_settings_success_msg_text" placeholder="Enter your Name" value="<?php echo ( get_option('aims_cf7_settings_success_msg_text')!=''? esc_attr( get_option('aims_cf7_settings_success_msg_text') ) : '' ); ?>">
		                    		<i><?php esc_html_e('Thank you for your message. It has been sent.', 'message-toastr-contact-form-7') ?></i>			
		                    		<p> <b><?php esc_html_e('Leave empty to show default message', 'message-toastr-contact-form-7'); ?></b></p>		
								</td>
							</tr>
							
							<tr valign="top">
								<th scope="row"><?php esc_html_e('Popup Text Color', 'message-toastr-contact-form-7'); ?></th>
								<td>
									
		                    		<input type="text" class="aims-cf7-color" name="aims_cf7_settings_text_color" value="<?php echo ( get_option('aims_cf7_settings_text_color')!=''? esc_attr( get_option('aims_cf7_settings_text_color') ) : '' ); ?>">	
									<i><?php esc_html_e('If you want to change Success Message Background Color', 'message-toastr-contact-form-7'); ?></i>							
								</td>
							</tr>
							
							<tr valign="top">
								<th scope="row"><?php esc_html_e('Success Background Color', 'message-toastr-contact-form-7'); ?></th>
								<td>
									
		                    		<input type="text" class="aims-cf7-color" name="aims_cf7_settings_success_bg_color" value="<?php echo ( get_option('aims_cf7_settings_success_bg_color')!=''? esc_attr( get_option('aims_cf7_settings_success_bg_color') ) : '' ); ?>">	
									<i><?php esc_html_e('If you want to change Success Message Background Color', 'message-toastr-contact-form-7'); ?></i>							
								</td>
							</tr>
							
							<tr valign="top">
								<th scope="row"><?php esc_html_e('Warning Background Color', 'message-toastr-contact-form-7'); ?></th>
								<td>
									
		                    		<input type="text" class="aims-cf7-color" name="aims_cf7_settings_warning_bg_color" value="<?php echo ( get_option('aims_cf7_settings_warning_bg_color')!=''? esc_attr( get_option('aims_cf7_settings_warning_bg_color') ) : '' ); ?>">	
									<i><?php esc_html_e('If you want to change Warning Message Background Color', 'message-toastr-contact-form-7'); ?></i>							
								</td>
							</tr>
							
							<tr valign="top">
								<th scope="row"><?php esc_html_e('Error Background Color', 'message-toastr-contact-form-7'); ?></th>
								<td>
									
		                    		<input type="text" class="aims-cf7-color" name="aims_cf7_settings_error_bg_color" value="<?php echo ( get_option('aims_cf7_settings_error_bg_color')!=''? esc_attr( get_option('aims_cf7_settings_error_bg_color') ) : '' ); ?>">	
									<i><?php esc_html_e('If you want to change Error Message Background Color', 'message-toastr-contact-form-7'); ?></i>							
								</td>
							</tr>

						</table>

                 
			
					<?php submit_button(); ?>

					</form>

                </div> 
        </div> 
    </div>