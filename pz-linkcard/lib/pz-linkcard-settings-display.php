<?php defined('ABSPATH' ) || wp_die; ?>
<div class="pz-page" id="pz-display">
	<div class="pz-submit-float"><?php submit_button(); ?></div>
	<h2><?php echo	__('Display Settings', TEXT_DOMAIN ).$help_open.'display'.$help_close; ?></h2>

	<table class="form-table" style="width: 100%;">
		<tr>
			<th scope="row" rowspan="12"><?php _e('Link Card', TEXT_DOMAIN ); ?></th>
			<td>
				<?php pz_Option($prop, 'display-url', __('Position to display URL', TEXT_DOMAIN ), array(
								''		=>		__('None', TEXT_DOMAIN ),
								'1'		=>		__('Under Title', TEXT_DOMAIN ),
								'2'		=>		__('Bihind Site-Info', TEXT_DOMAIN ), ) ); ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php pz_Option($prop, 'display-date', __('For internal links, display date instead of URL.', TEXT_DOMAIN ), array(
								''		=>		__('Off', TEXT_DOMAIN ),
								'1'		=>		__('Post date', TEXT_DOMAIN ),
								'2'		=>		__('Update date', TEXT_DOMAIN ),
								'3'		=>		__('Post date and Update date', TEXT_DOMAIN ), ) ); ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php pz_Checkbox($prop, 'separator', __('Separator Line', TEXT_DOMAIN ) ); ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php pz_Checkbox($prop, 'content-inset', __('Show Contents Frame', TEXT_DOMAIN ) ); ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php pz_Checkbox($prop, 'display-excerpt', __('Show Excerpt', TEXT_DOMAIN ) ); ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php pz_Checkbox($prop, 'shadow-inset', __('Shadow-inset', TEXT_DOMAIN ) ); ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php pz_Checkbox($prop, 'shadow', __('Shadow', TEXT_DOMAIN ) ); ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php pz_Option($prop, 'radius', __('Round a square', TEXT_DOMAIN ), LIST_MARGIN ); ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php pz_Option($prop, 'border-style', __('Style', TEXT_DOMAIN ), LIST_BORDER ); ?>
				<?php pz_Option($prop, 'border-width', __('Width', TEXT_DOMAIN ), LIST_PX ); ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php
					pz_Option($prop, 'more-style', __('More button', TEXT_DOMAIN ), array(
								''		=>		__('None',				TEXT_DOMAIN ),
								'TXT'	=>		__('Text only',			TEXT_DOMAIN ),
								'SMP'	=>		__('Simple button',		TEXT_DOMAIN ),
								'BTN'	=>		__('Button',			TEXT_DOMAIN ),
								'PSH'	=>		__('Push Button',		TEXT_DOMAIN ),) );
				?>
			</td>
		</tr>
		<tr>
			<td>
				<?php pz_Option($prop, 'hover', __('When the mouse is on', TEXT_DOMAIN ), array(
								''		=>		__('None', TEXT_DOMAIN ),
								'1'		=>		__('Lighten', TEXT_DOMAIN ),
								'2'		=>		__('Hover (Light)', TEXT_DOMAIN ),
								'3'		=>		__('Hover (Dark)', TEXT_DOMAIN ),
								'4'		=>		__('Retract (for Shadow)', TEXT_DOMAIN ),
								'7'		=>		__('Radius', TEXT_DOMAIN ), ) ); ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php pz_Checkbox($prop, 'style-reset-img', __('When unnecessary frame is displayed on the image, you can improve it by case', TEXT_DOMAIN ) ); ?>
			</td>
		</tr>
		<tr>
			<th scope="row" rowspan="3"><?php _e('Thumbnail', TEXT_DOMAIN ); ?></th>
			<td>
				<?php pz_Checkbox($prop, 'thumbnail-border', __('Show Thumbnail Border', TEXT_DOMAIN ) ); ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php pz_Checkbox($prop, 'thumbnail-shadow', __('Show Thumbnail Shadow', TEXT_DOMAIN ) ); ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php pz_Option($prop, 'thumbnail-radius', __('Round a square', TEXT_DOMAIN ), array(
								''		=>		__('None', TEXT_DOMAIN ),
								'2px'	=>		__('2px', TEXT_DOMAIN ),
								'4px'	=>		__('4px', TEXT_DOMAIN ),
								'6px'	=>		__('6px', TEXT_DOMAIN ),
								'8px'	=>		__('8px', TEXT_DOMAIN ),
								'12px'	=>		__('12px', TEXT_DOMAIN ),
								'16px'	=>		__('16px', TEXT_DOMAIN ),
								'50%'	=>		__('50%', TEXT_DOMAIN ), ) ); ?>
			</td>
		</tr>
		<tr>
			<th scope="row"><?php _e('Display SNS Count', TEXT_DOMAIN ); ?></th>
			<td>
				<select name="properties[sns-position]">
					<option value=""  <?php selected($prop['sns-position'] == ''  ); ?>><?php _e('None',				TEXT_DOMAIN ); ?></option>
					<option value="1" <?php selected($prop['sns-position'] == '1' ); ?>><?php _e('Under Title',			TEXT_DOMAIN ); ?></option>
					<option value="2" <?php selected($prop['sns-position'] == '2' ); ?>><?php _e('Bihind Site-Info',	TEXT_DOMAIN ); ?></option>
				</select>
				<ul>
					<li>
						<label>
							<input type="hidden"   name="properties[sns-tw]" value="" />
							<input type="checkbox" name="properties[sns-tw]" value="1" <?php checked($prop['sns-tw'] ); ?> />
							<?php echo __('X (Twitter)', TEXT_DOMAIN ).__('* number is not updated', TEXT_DOMAIN ); ?>
						</label>
						<label>
							<input type="hidden"   name="properties[sns-tw-x]" value="" />
							<input type="checkbox" name="properties[sns-tw-x]" value="1" <?php checked($prop['sns-tw-x'] ); ?> />
							<?php echo __('Change the unit of measure to "tweets".', TEXT_DOMAIN ); ?>
						</label>
					</li>
					<li>
						<label>
							<input type="hidden"   name="properties[sns-fb]" value="" />
							<input type="checkbox" name="properties[sns-fb]" value="1" <?php checked($prop['sns-fb'] ); ?> />
							<?php echo __('Facebook', TEXT_DOMAIN ).__('* number is not updated', TEXT_DOMAIN ); ?>
						</label>
					</li>
					<li>
						<label>
							<input type="hidden"   name="properties[sns-hb]" value="" />
							<input type="checkbox" name="properties[sns-hb]" value="1" <?php checked($prop['sns-hb'] ); ?> />
							<?php echo __('Hatena', TEXT_DOMAIN ); ?>
						</label>
					</li>
					<li>
						<label>
							<input type="hidden"   name="properties[sns-po]" value="" />
							<input type="checkbox" name="properties[sns-po]" value="1" <?php checked($prop['sns-po'] ); ?> />
							<?php echo __('Pocket', TEXT_DOMAIN ); ?>
						</label>
					</li>
				</ul>
			</td>
		</tr>
	</table>
	<?php submit_button(); ?>
</div>
