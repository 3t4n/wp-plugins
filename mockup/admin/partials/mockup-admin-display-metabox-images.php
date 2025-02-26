<?php // Hidden fields
wp_nonce_field(-1, 'mockupnonce_backend');
echo '<input type="hidden" id="mockup_id" name="mockup_id" value="'.$mockup_id.'">';
echo '<input type="hidden" id="mockup_background_id" name="mockup_background_id" value="'.$mockup_background_id.'">'; ?>

<div class="table table_content">

	<table cellspacing="0" cellpadding="0" width="100%">

		<tbody valign="top">

			<?php if(isset($mockup_status['approved']) && $mockup_status['approved'] === true) { ?>

				<tr id="mockup_status">

					<td width="25%">

						<span>

							<strong><?php _e('Status:', 'MockUp'); ?></strong>
							<br />
							<a href="#" id="mockup_unapprove" class="mockup_delete" postid="<?php echo $post->ID; ?>"><?php _e('Remove approval', 'MockUp'); ?></a>

						</span>

					</td>


					<td width="75%">

						<span>

							<?php if(!empty($mockup_status['approved_name'])) $post_status_text = printf(__('Approved by %s', 'MockUp'), $mockup_status['approved_name']);
							else $post_status_text = __('Approved', 'MockUp'); ?>

						</span>

					</td>

				</tr>

			<?php } ?>



			<tr id="mockup">

				<td width="25%">

					<span>

						<strong><?php _e('Set the MockUp', 'MockUp'); ?></strong>

						<br /><br />

						<?php mockup_make_buttons($mockup_id, 'mockup', __('Set MockUp', 'MockUp'), __('Delete MockUp', 'MockUp'), $mockup_status); ?>

						<br /><br />

						<a href="#" id="mockup_show_image_settings"><?php _e('Show settings', 'MockUp'); ?></a>

					</span>

				</td>

				<td width="75%">

					<div class="preview-mockup<?php if(empty($mockup_id)) echo ' preview-mockup-empty'; ?>" text="<?php echo $no_mockup; ?>" style="background-image: url(<?php echo $image_data[0]; ?>);">

						<p><?php if(empty($mockup_id)) echo $no_mockup; ?></p>

						
						<a href="<?php echo $image_data_full[0]; ?>?TB_iframe=true&width=<?php echo $image_data_full[1]; ?>&height=<?php echo $image_data_full[2]; ?>" class="thickbox"></a>

					</div>

				</td>

			</tr>



			<tr class="mockup_hide">

				<td><span><strong><?php _e('MockUp position:', 'MockUp'); ?></strong></span></td>

				<td><select id="mockup_position" name="mockup_position_1"<?php echo $disabled; ?>>

						<option value="center top"<?php if($position == 'center top' || empty($position)) echo ' selected' ; ?>>Center / Top</option>
						<option value="center center"<?php if($position == 'center center') echo ' selected' ; ?>>Center / Center</option>
						<option value="left top"<?php if($position == 'left top') echo ' selected' ; ?>>Left / Top</option>
						<option value="left center"<?php if($position == 'left center') echo ' selected' ; ?>>Left / Center</option>
						<option value="right top"<?php if($position == 'right top') echo ' selected' ; ?>>Right / Top</option>
						<option value="right center"<?php if($position == 'right center') echo ' selected' ; ?>>Right / Center</option>

					</select>

				</td>

			</tr>



			<tr class="mockup_hide">

				<td width="25%"><span><strong><?php _e('Background Color:', 'MockUp'); ?></strong></span></td>

				<td width="75%"><input type="text" id="mockup_background_color" name="mockup_background_color_1" value="<?php echo esc_attr($mockup_background_color); ?>" class="mockup-colorpicker" data-default-color="<?php echo get_option( 'mockup_default_background_color', '#ffffff' ); ?>" /></td>

			</tr>


			<tr id="background" class="mockup_hide">

				<td>

					<span>

						<strong><?php _e('Background:', 'MockUp'); ?></strong>

						<br /><br />

						<?php mockup_make_buttons($mockup_background_id, 'background', __('Set background image', 'MockUp'), __('Delete background image', 'MockUp'), $mockup_status); ?>

					</span>

				</td>


				<td>

					<div class="preview-mockup<?php if(empty($mockup_background_id)) echo ' preview-mockup-empty'; ?>" text="<?php echo $no_mockup_bg; ?>"  style="background-image: url(<?php echo $image_data_bg[0]; ?>)">

						<p><?php if(empty($mockup_background_id)) echo $no_mockup_bg; ?></p>

					</div>

				</td>

			</tr>



			<tr class="mockup_hide">

				<td><span><strong><?php _e('Background image position:', 'MockUp'); ?></strong></span></td>

				<td>

					<?php $position_bg = get_post_meta($post->ID, '_mockup_background_position_1', true); ?>

					<select id="mockup_background_position_1" name="mockup_background_position_1"<?php echo $disabled; ?>>

						<option value="repeat"<?php if($position_bg == 'repeat' || empty($position_bg)) echo ' selected' ; ?>>Repeat</option>
						<option value="repeat-y"<?php if($position_bg == 'repeat-y') echo ' selected' ; ?>>Repeat Y</option>
						<option value="repeat-x"<?php if($position_bg == 'repeat-x') echo ' selected' ; ?>>Repeat X</option>

					</select>

				</td>

			</tr>

		</tbody>

	</table> 

</div>