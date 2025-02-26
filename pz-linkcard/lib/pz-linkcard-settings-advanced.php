<?php defined('ABSPATH' ) || wp_die; ?>
<div class="pz-page" id="pz-advanced">
	<div class="pz-submit-float"><?php submit_button(); ?></div>

	<h2><?php echo __('Senior Settings', TEXT_DOMAIN ).$help_open.'advanced'.$help_close; ?></h2>
	<table class="form-table">
		<?php
			// 末尾のスラッシュの除去
			$item_name		=	'trail-slash';
			$item_list		=	array(
				''			=>		__('As it',							TEXT_DOMAIN ),
				'1'			=> 		__('When only domain name, remove',	TEXT_DOMAIN ),
				'2'			=>		__('Always remove',					TEXT_DOMAIN ),
			);
			$item_descript		=	__('Trailing Slash',				TEXT_DOMAIN );
			echo_list($item_name, $prop[$item_name], $item_list, $item_descript, $item_notice );
		?>
		<tr>
			<th scope="row"><?php _e('Class ID to be Added (for PC)',	TEXT_DOMAIN ); ?></th>
			<td><input name="properties[class-pc]"			type="text" size="40" value="<?php echo	(isset($this->options['class-pc'] ) ? esc_attr($this->options['class-pc'] ) : '' ); ?>" /></td>
		</tr>
		<tr>
			<th scope="row"><?php _e('Class ID to be Added (for Mobile)',	TEXT_DOMAIN ); ?></th>
			<td><input name="properties[class-mobile]"		type="text" size="40" value="<?php echo	(isset($this->options['class-mobile'] ) ? esc_attr($this->options['class-mobile'] ) : '' ); ?>" /><br>
		</tr>
		<tr>
			<th scope="row"><?php _e('Filter Priority', TEXT_DOMAIN ); ?></th>
			<td>
				<label>
					<input name="properties[mce-priority]" type="number" min="0" max="9999" size="80" value="<?php echo esc_attr($this->options['mce-priority'] ); ?>" /><?php _e('(Null or 0-9999)',  TEXT_DOMAIN ); ?>
					<?php _e('Setting a larger value may improve when the insert button does not appear in the editor.', TEXT_DOMAIN ); ?>
				</label>
			</td>
		</tr>
		<tr>
			<th scope="row"><?php _e('Compress', TEXT_DOMAIN ); ?></th>
			<td>
				<label>
					<input type="hidden"   name="properties[flg-compress]" value="" />
					<input type="checkbox" name="properties[flg-compress]" value="1" <?php checked($this->options['flg-compress'] ); ?> />
					<?php _e('Compress CSS and JavaScript to improve access speed.', TEXT_DOMAIN ); ?>
				</label>
			</td>
		</tr>
		<tr>
			<th scope="row"><?php _e('Text Selection', TEXT_DOMAIN ); ?></th>
			<td>
				<label>
					<input type="hidden"   name="properties[flg-unti-select]" value="" />
					<input type="checkbox" name="properties[flg-unti-select]" value="1" <?php checked($this->options['flg-unti-select'] ); ?> />
					<?php _e('Prohibit the selection of text in the Link-Card.', TEXT_DOMAIN ); ?>
				</label>
			</td>
		</tr>
		<tr>
			<th scope="row"><?php _e('Date Format (Manager)',	TEXT_DOMAIN ); ?></th>
			<td><input name="properties[date-format-man]"		type="text" size="40" value="<?php echo	(isset($this->options['date-format-man'] ) ? esc_attr($this->options['date-format-man'] ) : '' ); ?>" list="date-dormat-man-default" /></td>
			<datalist id="date-dormat-man-default"><option value="Y\<\b\r\/\>m/d\<\b\r\/\>H:i">Y\<\b\r\/\>m/d\<\b\r\/\>H:i</option><option value="d-M\<\b\r\/\>Y\<\b\r\/\>h:i\<\b\r\/\>a">d-M\<\b\r\/\>Y\<\b\r\/\>h:i\<\b\r\/\>a</option></datalist>
		</tr>
		<tr>
			<th scope="row"><?php _e('Input Inhibit Time', TEXT_DOMAIN ); ?></th>
			<td>
				<label>
					<input type="hidden"   name="properties[flg-inhibit]" value="" />
					<input type="checkbox" name="properties[flg-inhibit]" value="1" <?php checked($this->options['flg-inhibit'] ); ?> />
					<?php _e('After pressing a button, the screen goes dark to prevent accidental input.', TEXT_DOMAIN ); ?>
				</label>
			</td>
		</tr>
	</table>
	<?php submit_button(); ?>

	<h2><?php echo	__('Not Recommended Settings', TEXT_DOMAIN ).$help_open.'deprecation'.$help_close; ?></h2>
	<table class="form-table">
		<tr>
			<th scope="row"><?php _e('Google AMP determination', TEXT_DOMAIN ); ?></th>
			<td>
				<p>
					<label>
						<input type="hidden"   name="properties[flg-amp-url]" value="" />
						<input type="checkbox" name="properties[flg-amp-url]" value="1" <?php checked($this->options['flg-amp-url'] ); ?> />
						<?php echo __('Simplified display if the URL ends with "/amp", "/amp/", or "/?amp=1".', TEXT_DOMAIN ).__('(Deprecation)', TEXT_DOMAIN ); ?>
					</label>
				</p>
			</td>
		</tr>
		<tr>
			<th scope="row"><?php _e('Use Blockquote Tag', TEXT_DOMAIN ); ?></th>
			<td>
				<?php
					pz_Checkbox($prop, 'blockquote', __('Without using DIV tag, and use BLOCKQUOTE tag.', TEXT_DOMAIN ).__('(Deprecation)', TEXT_DOMAIN ) );
				?>
			</td>
		</tr>
		<tr>
			<th scope="row"><?php _e('Hide URL Error', TEXT_DOMAIN ); ?></th>
			<td>
				<label>
					<input type="hidden"   name="properties[error-mode-hide]" value="" />
					<input type="checkbox" name="properties[error-mode-hide]" value="1" class="pz-tab-show" <?php checked($this->options['error-mode-hide'] ); ?> />
					<?php echo __('Do not display an error on the admin page.', TEXT_DOMAIN ).__('(Deprecation)', TEXT_DOMAIN ); ?>
				</label>
			</td>
		</tr>
	</table>
	<?php submit_button(); ?>

	<h2><?php echo	__('Extension Settings', TEXT_DOMAIN ).$help_open.'extension'.$help_close; ?></h2>
	<table class="form-table">
		<tr>
			<th scope="row"><?php _e('File Menu', TEXT_DOMAIN ); ?></th>
			<td>
				<label>
					<input type="hidden"   name="properties[flg-filemenu]" value="" />
					<input type="checkbox" name="properties[flg-filemenu]" value="1" <?php checked($this->options['flg-filemenu'] ); ?> />
					<?php _e('Display the file menu on the card management screen.', TEXT_DOMAIN ); ?>
				</label>
			</td>
		</tr>
		<tr>
			<th scope="row"><?php _e('Initialize Tab', TEXT_DOMAIN ); ?></th>
			<td>
				<label>
					<input type="hidden"   name="properties[flg-initialize]" value="" />
					<input type="checkbox" name="properties[flg-initialize]" value="1" class="pz-tab-show" <?php checked($this->options['flg-initialize'] ); ?> />
					<?php _e('Display the initialize tab on the settings screen.', TEXT_DOMAIN ); ?>
				</label>
			</td>
		</tr>
		<tr>
			<th scope="row" style="color: #06f !important; background-color: #ccccee !important;"><span ><?php _e('Debug Mode', TEXT_DOMAIN ); ?></span></th>
			<td	style="background-color: #f8f8ff !important;">
				<label>
					<input type="hidden"   name="properties[debug-mode]" value="" />
					<input type="checkbox" name="properties[debug-mode]" value="1" class="pz-tab-show" <?php checked($this->options['debug-mode'] ); ?> />
					<span style="color: #06f !important;"><?php echo __('Displays normally hidden items to find and fix defects.', TEXT_DOMAIN ).__('(Deprecation)', TEXT_DOMAIN ); ?></span>
				</label>
			</td>
		</tr>
		<tr class="pz-debug-only">
			<th scope="row" style="color: #06f !important; background-color: #ccccee !important;"><span ><?php _e('Survey Mode', TEXT_DOMAIN ); ?></span></th>
			<td	style="background-color: #f8f8ff !important;">
				<label>
					<input type="hidden"   name="properties[survey-mode]" value="" />
					<input type="checkbox" name="properties[survey-mode]" value="1" class="pz-tab-show" <?php checked($this->options['survey-mode'] ); ?> />
					<span style="color: #06f !important;"><?php echo __('Collect logs. May slow down operation.', TEXT_DOMAIN ).__('(Deprecation)', TEXT_DOMAIN ); ?></span>
				</label>
			</td>
		</tr>
		<tr class="pz-debug-only">
			<th scope="row" style="color: #c38 !important; background-color: #d8cce0 !important;"><?php _e('Administrator Mode', TEXT_DOMAIN ); ?></th>
			<td style="background-color: #fff8ff !important;">
				<label>
					<input type="hidden"   name="properties[admin-mode]" value="" />
					<input type="checkbox" name="properties[admin-mode]" value="1" class="pz-tab-show" <?php checked($this->options['admin-mode'] ); if (!$this->options['admin-mode'] ) {echo 'readonly="readonly"'; }; if (!$this->options['admin-mode'] ) { echo 'ondblclick="this.readOnly=false;"'; } ?> />
					<span style="color: #c38 !important;"><?php echo __('Display information that is not normally needed or open special settings.', TEXT_DOMAIN ).__('(Deprecation)', TEXT_DOMAIN ); ?></span>
				</label>
			</td>
		</tr>
		<tr class="pz-admin-only">
			<th scope="row" style="color: #f62 !important; background-color: #ddccbb !important;"><?php _e('MultiSite Mode', TEXT_DOMAIN ); ?></th>
			<td style="background-color: #fcf4f0 !important;">
				<label>
					<input type="hidden"   name="properties[multi-mode]" value="" />
					<input type="checkbox" name="properties[multi-mode]" value="1" <?php checked($menu_multi || $is_multisite ); echo ($is_multisite ? ' readonly="readonly"' : '' ); ?> />
					<span style="color: #f62 !important;"><?php _e('Displays a menu for Multi-Site', TEXT_DOMAIN ); ?></span>
				</label>
			</td>
		</tr>
		<tr  class="pz-develop-only">
			<th scope="row" style="color: #0a8 !important; background-color: #b0bbbb !important;"><?php _e('Develop Mode', TEXT_DOMAIN ); ?></th>
			<td style="background-color: #fffff8 !important;">
				<label>
					<input type="hidden"   name="properties[develop-mode]" value="" />
					<input type="checkbox" name="properties[develop-mode]" value="1" <?php checked($this->options['develop-mode'] ); ?> readonly="readonly" />
					<span style="color: #0a8 !important;"><?php _e('Currently working in a development environment.', TEXT_DOMAIN ); ?></span>
				</label>
			</td>
		</tr>
	</table>
	<?php submit_button(); ?>
</div>
