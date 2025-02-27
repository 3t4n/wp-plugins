<div class="wrap">
	<div id="icon-options-general" class="icon32"></div>
	<h2><?php _e('HatenaBlogCard Settings', $this->text_domain); ?></h2>
	<div id="settings" style="clear:both;">
<?php
		if ( isset($_POST['properties'])) {
			check_admin_referer('pz_options');
			$this->options = $_POST['properties'];
			if (isset($this->options['initialize']) && $this->options['initialize'] == '1') {
				delete_option('Pz_HatenaBlogCard_options');
				$this->options = $this->defaults;
			}

			$this->options['ex-image'] = stripslashes($this->options['ex-image']);
			$this->options['in-image'] = stripslashes($this->options['in-image']);
			$this->options['th-image'] = stripslashes($this->options['th-image']);

			$this->options['ex-info'] = stripslashes($this->options['ex-info']);
			$this->options['in-info'] = stripslashes($this->options['in-info']);
			$this->options['th-info'] = stripslashes($this->options['th-info']);

			$this->options['favicon-api']   = preg_replace( array('/%DOMAIN%/i', '/%DOMAIN_URL%/i', '/%URL%/i' ), array('%DOMAIN%', '%DOMAIN_URL%', '%URL%'), (isset($this->options['favicon-api'])) ? $this->options['favicon-api'] : null );
			$this->options['thumbnail-api'] = preg_replace( array('/%DOMAIN%/i', '/%DOMAIN_URL%/i', '/%URL%/i' ), array('%DOMAIN%', '%DOMAIN_URL%', '%URL%'), (isset($this->options['thumbnail-api'])) ? $this->options['thumbnail-api'] : null );

			$this->options['saved-date'] = time();

			$result = true;
			if ($this->options['code1'] == '') {
				echo '<div class="error"><p><strong>'.__('Short code is not set.', $this->text_domain).'</strong></p></div>';
				$result = false;
			}
			$width = $this->options['width'];
			if (substr($width, -1 ) == '%') {
				$this->options['width'] = preg_replace('/[^0-9]/', '', $width).'%';
			} else {
				$width =  preg_replace('/[^0-9]/', '', $width);
				if ($width == '') {
					$this->options['width'] = '500px';
				} else {
					$this->options['width'] = $width.'px';
				}
			}
			$height = preg_replace('/[^0-9]/', '', $this->options['content-height']);
			if ($height == '') {
				$this->options['content-height'] = '108px';
			} else {
				$this->options['content-height'] = $height.'px';
			}

			if ($result == true) {
				$result = update_option('Pz_HatenaBlogCard_options', $this->options);
				if ($result == true) {
					echo '<div class="updated"><p><strong>'.__('Changes saved.', $this->text_domain).'</strong></p></div>';
				} else {
					echo '<div class="error"><p><strong>'.__('Not changed.', $this->text_domain).'</strong></p></div>';
				}
				require_once ('pz-hatenablogcard-style.php');
			}
		} else {
			if (!isset($this->options['hidden-note']) || is_null($this->options['hidden-note'])) {
				echo '<div class="updated"><p><strong>';
				echo sprintf(__('Thank you for using!<br>I has released a plug-in to be the successor. Thereby, this plugin become a maintenance phase.<br>We continue to make trouble of support , but the new features is rarely added.<br>If you are interested even a little , please try the "%s".<br>* This message you can hide in the field at the bottom.', $this->text_domain), '<a href="https://wordpress.org/plugins/pz-linkcard/" target="_blank">Pz-LinkCard</a>');
				echo '</strong></p></div>';
			}
		}
?>
		<form action="" method="post">
			<?php wp_nonce_field('pz_options'); ?>

			<h3><?php _e('Basic', $this->text_domain); ?></h3>
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="inputtext"><?php _e('ShortCode', $this->text_domain); ?></label></th>
					<td><input name="properties[code1]" type="text" id="inputtext" value="<?php echo esc_attr($this->options['code1']); ?>" class="regular-text" />
						<p><?php _e('distinguish between uppercase and lowercase letters', $this->text_domain); ?></p></td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="inputtext"><?php _e('ShortCode 2', $this->text_domain); ?></label></th>
					<td><input name="properties[code2]" type="text" id="inputtext" value="<?php echo esc_attr($this->options['code2']); ?>" class="regular-text" />
						<p><?php _e('distinguish between uppercase and lowercase letters', $this->text_domain); ?></p></td>
				</tr>
				<tr valign="top" style="display: none;">
					<th scope="row"><label for="inputtext"><?php _e('ShortCode 3', $this->text_domain); ?></label></th>
					<td><input name="properties[code3]" type="text" id="inputtext" value="<?php echo esc_attr($this->options['code3']); ?>" class="regular-text" />
						<p><?php _e('distinguish between uppercase and lowercase letters', $this->text_domain); ?></p></td>
				</tr>
				<tr valign="top" style="display: none;">
					<th scope="row"><label for="inputtext"><?php _e('ShortCode 4', $this->text_domain); ?></label></th>
					<td><input name="properties[code4]" type="text" id="inputtext" value="<?php echo esc_attr($this->options['code4']); ?>" class="regular-text" />
						<p><?php _e('distinguish between uppercase and lowercase letters', $this->text_domain); ?></p></td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="inputtext"><?php _e('Use inlinetext', $this->text_domain); ?></label></th>
					<td>
						<?php _e('[Shortcode url="xxx"]', $this->text_domain); ?>
						<select name="properties[use-inline]">
							<option value=""  <?php if($this->options['use-inline'] == '')  echo 'selected="selected"'; ?>><?php _e('No use', $this->text_domain); ?></option>
							<option value="1" <?php if($this->options['use-inline'] == '1') echo 'selected="selected"'; ?>><?php _e('Use to excerpt', $this->text_domain); ?></option>
							<option value="2" <?php if($this->options['use-inline'] == '2') echo 'selected="selected"'; ?>><?php _e('Use to title', $this->text_domain); ?></option>
						</select>
						<?php _e('[/Shortcode]', $this->text_domain); ?>
					</td>
				</tr>

				<tr valign="top">
					<th scope="row"><label for="inputtext"><?php _e('Special Format', $this->text_domain); ?></label></th>
					<td>
						<select name="properties[special-format]">
							<option value=""  <?php if($this->options['special-format'] == '')  echo 'selected="selected"'; ?>><?php _e('None', $this->text_domain); ?></option>
							<option value="1" <?php if($this->options['special-format'] == '1') echo 'selected="selected"'; ?>><?php _e('Cellophane tape "center"', $this->text_domain); ?></option>
							<option value="2" <?php if($this->options['special-format'] == '2') echo 'selected="selected"'; ?>><?php _e('Cellophane tape "Top corner"', $this->text_domain); ?></option>
							<option value="3" <?php if($this->options['special-format'] == '3') echo 'selected="selected"'; ?>><?php _e('Cellophane tape "long"', $this->text_domain); ?></option>
							<option value="5" <?php if($this->options['special-format'] == '5') echo 'selected="selected"'; ?>><?php _e('Slanting', $this->text_domain); ?></option>
							<option value="7" <?php if($this->options['special-format'] == '7') echo 'selected="selected"'; ?>><?php _e('3D Rotate', $this->text_domain); ?></option>
							<option value="9" <?php if($this->options['special-format'] == '9') echo 'selected="selected"'; ?>><?php _e('Curling paper', $this->text_domain); ?></option>
							<option value="10" <?php if($this->options['special-format'] == '10') echo 'selected="selected"'; ?>><?php _e('Neutral', $this->text_domain); ?></option>
							<option value="11" <?php if($this->options['special-format'] == '11') echo 'selected="selected"'; ?>><?php _e('Orange', $this->text_domain); ?></option>
							<option value="12" <?php if($this->options['special-format'] == '12') echo 'selected="selected"'; ?>><?php _e('Green', $this->text_domain); ?></option>
							<option value="13" <?php if($this->options['special-format'] == '13') echo 'selected="selected"'; ?>><?php _e('Blue', $this->text_domain); ?></option>
						</select>
						<br /><?php _e('Will some of the parameters are forcibly changed', $this->text_domain); ?></td>
						</td>
				</tr>
			</table>
			<?php submit_button(); ?>

			<h3><?php _e('Style', $this->text_domain); ?></h3>
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="inputtext"><?php _e('Position', $this->text_domain); ?></label></th>
					<td>
						<table style="border: 1px dashed #000; background-color: #eee;">
							<tr>
								<td>
								</td>
								<td align="center">
									<?php _e('Margin top', $this->text_domain); ?><br />
									<select name="properties[margin-top]">
										<option value="" <?php if($this->options['margin-top'] == '') echo 'selected="selected"'; ?>><?php _e('Not defined', $this->text_domain); ?></option>
										<option value="0" <?php if($this->options['margin-top'] == '0') echo 'selected="selected"'; ?>><?php _e('0', $this->text_domain); ?></option>
										<option value="4px" <?php if($this->options['margin-top'] == '4px') echo 'selected="selected"'; ?>><?php _e('4px', $this->text_domain); ?></option>
										<option value="8px" <?php if($this->options['margin-top'] == '8px') echo 'selected="selected"'; ?>><?php _e('8px', $this->text_domain); ?></option>
										<option value="16px" <?php if($this->options['margin-top'] == '16px') echo 'selected="selected"'; ?>><?php _e('16px', $this->text_domain); ?></option>
										<option value="32px" <?php if($this->options['margin-top'] == '32px') echo 'selected="selected"'; ?>><?php _e('32px', $this->text_domain); ?></option>
										<option value="64px" <?php if($this->options['margin-top'] == '64px') echo 'selected="selected"'; ?>><?php _e('64px', $this->text_domain); ?></option>
									</select>
								</td>
								<td></td>
							</tr>
							<tr>
								<td align="center">
									<?php _e('Margin left', $this->text_domain); ?><br />
									<select name="properties[margin-left]">
										<option value="" <?php if($this->options['margin-left'] == '') echo 'selected="selected"'; ?>><?php _e('Not defined', $this->text_domain); ?></option>
										<option value="0" <?php if($this->options['margin-left'] == '0') echo 'selected="selected"'; ?>><?php _e('0', $this->text_domain); ?></option>
										<option value="4px" <?php if($this->options['margin-left'] == '4px') echo 'selected="selected"'; ?>><?php _e('4px', $this->text_domain); ?></option>
										<option value="8px" <?php if($this->options['margin-left'] == '8px') echo 'selected="selected"'; ?>><?php _e('8px', $this->text_domain); ?></option>
										<option value="16px" <?php if($this->options['margin-left'] == '16px') echo 'selected="selected"'; ?>><?php _e('16px', $this->text_domain); ?></option>
										<option value="32px" <?php if($this->options['margin-left'] == '32px') echo 'selected="selected"'; ?>><?php _e('32px', $this->text_domain); ?></option>
										<option value="64px" <?php if($this->options['margin-left'] == '64px') echo 'selected="selected"'; ?>><?php _e('64px', $this->text_domain); ?></option>
									</select>
								</td>
								<td align="center" style="border: 1px solid #000; background-color: #fff;">
									<?php _e('Width', $this->text_domain); ?><input name="properties[width]" type="text" id="inputtext" value="<?php echo esc_attr($this->options['width']); ?>" style="width: 80px;" /><br />
									<?php _e('Height', $this->text_domain); ?><input name="properties[content-height]" type="text" id="inputtext" value="<?php echo esc_attr($this->options['content-height']); ?>" style="width: 80px;" /><br />
								</td>
								<td align="center">
									<?php _e('Margin right', $this->text_domain); ?><br />
									<select name="properties[margin-right]">
										<option value="" <?php if($this->options['margin-right'] == '') echo 'selected="selected"'; ?>><?php _e('Not defined', $this->text_domain); ?></option>
										<option value="0" <?php if($this->options['margin-right'] == '0') echo 'selected="selected"'; ?>><?php _e('0', $this->text_domain); ?></option>
										<option value="4px" <?php if($this->options['margin-right'] == '4px') echo 'selected="selected"'; ?>><?php _e('4px', $this->text_domain); ?></option>
										<option value="8px" <?php if($this->options['margin-right'] == '8px') echo 'selected="selected"'; ?>><?php _e('8px', $this->text_domain); ?></option>
										<option value="16px" <?php if($this->options['margin-right'] == '16px') echo 'selected="selected"'; ?>><?php _e('16px', $this->text_domain); ?></option>
										<option value="32px" <?php if($this->options['margin-right'] == '32px') echo 'selected="selected"'; ?>><?php _e('32px', $this->text_domain); ?></option>
										<option value="64px" <?php if($this->options['margin-right'] == '64px') echo 'selected="selected"'; ?>><?php _e('64px', $this->text_domain); ?></option>
									</select>
								</td>
							</tr>
							<tr>
								<td>
									<input name="properties[centering]" type="checkbox" id="check" value="1" <?php checked(isset($this->options['centering']) ? $this->options['centering'] : null, 1); ?> /><?php _e('Centering', $this->text_domain); ?>
								</td>
								<td align="center">
									<?php _e('Margin bottom', $this->text_domain); ?><br />
									<select name="properties[margin-bottom]">
										<option value="" <?php if($this->options['margin-bottom'] == '') echo 'selected="selected"'; ?>><?php _e('Not defined', $this->text_domain); ?></option>
										<option value="0" <?php if($this->options['margin-bottom'] == '0') echo 'selected="selected"'; ?>><?php _e('0', $this->text_domain); ?></option>
										<option value="4px" <?php if($this->options['margin-bottom'] == '4px') echo 'selected="selected"'; ?>><?php _e('4px', $this->text_domain); ?></option>
										<option value="8px" <?php if($this->options['margin-bottom'] == '8px') echo 'selected="selected"'; ?>><?php _e('8px', $this->text_domain); ?></option>
										<option value="16px" <?php if($this->options['margin-bottom'] == '16px') echo 'selected="selected"'; ?>><?php _e('16px', $this->text_domain); ?></option>
										<option value="32px" <?php if($this->options['margin-bottom'] == '32px') echo 'selected="selected"'; ?>><?php _e('32px', $this->text_domain); ?></option>
										<option value="64px" <?php if($this->options['margin-bottom'] == '64px') echo 'selected="selected"'; ?>><?php _e('64px', $this->text_domain); ?></option>
									</select>
								</td>
								<td>
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr valign="top">
					<th scope="row"><label for="inputtext"><?php _e('Border', $this->text_domain); ?></label></th>
					<td>
						<select name="properties[border]">
							<option value=""	<?php if($this->options['border'] == '')	echo 'selected="selected"'; ?>><?php _e('None', $this->text_domain); ?></option>
							<option value="1"	<?php if($this->options['border'] == '1')	echo 'selected="selected"'; ?>><?php _e('Gray thin', $this->text_domain); ?></option>
							<option value="2"	<?php if($this->options['border'] == '2')	echo 'selected="selected"'; ?>><?php _e('Gray', $this->text_domain); ?></option>
							<option value="4sg"	<?php if($this->options['border'] == '4sg')	echo 'selected="selected"'; ?>><?php _e('Gray thick', $this->text_domain); ?></option>
							<option value="3"	<?php if($this->options['border'] == '3')	echo 'selected="selected"'; ?>><?php _e('Black thin', $this->text_domain); ?></option>
							<option value="4"	<?php if($this->options['border'] == '4')	echo 'selected="selected"'; ?>><?php _e('Black', $this->text_domain); ?></option>
							<option value="5"	<?php if($this->options['border'] == '5')	echo 'selected="selected"'; ?>><?php _e('Black thick', $this->text_domain); ?></option>
							<option value="6"	<?php if($this->options['border'] == '6')	echo 'selected="selected"'; ?>><?php _e('Black frame', $this->text_domain); ?></option>
							<option value="7"	<?php if($this->options['border'] == '7')	echo 'selected="selected"'; ?>><?php _e('Dodgerblue', $this->text_domain); ?></option>
							<option value="8"	<?php if($this->options['border'] == '8')	echo 'selected="selected"'; ?>><?php _e('Mediumaquamarine', $this->text_domain); ?></option>
							<option value="9"	<?php if($this->options['border'] == '9')	echo 'selected="selected"'; ?>><?php _e('Hotpink', $this->text_domain); ?></option>
							<option value="10"	<?php if($this->options['border'] == '10')	echo 'selected="selected"'; ?>><?php _e('Double', $this->text_domain); ?></option>
							<option value="11"	<?php if($this->options['border'] == '11')	echo 'selected="selected"'; ?>><?php _e('Dotted', $this->text_domain); ?></option>
						</select>
					</td>
				</tr>

				<tr valign="top">
					<th scope="row"><?php _e('Layout', $this->text_domain); ?></th>
					<td><input name="properties[radius]" type="checkbox" id="check" value="1" <?php checked(isset($this->options['radius']) ? $this->options['radius'] : null, 1); ?> /><?php _e('Radius', $this->text_domain); ?></td>
				</tr>
				<tr>
					<th scope="row"></th>
					<td>
						
						<table style="border: 1px solid #000; background-color: #fff;">
							<tr>
								<td>
									<input name="properties[display-url]" type="checkbox" id="check" value="1" <?php checked(isset($this->options['display-url']) ? $this->options['display-url'] : null, 1); ?> /><?php _e('Display URL', $this->text_domain); ?>
								</td>
								<td rowspan="3" style="border: 1px solid #000;">
									<?php _e('Thumbnail', $this->text_domain); ?><br />
									<select name="properties[thumbnail-position]">
										<option value="0" <?php if($this->options['thumbnail-position'] == '0') echo 'selected="selected"'; ?>><?php _e('None',		$this->text_domain); ?></option>
										<option value="1" <?php if($this->options['thumbnail-position'] == '1') echo 'selected="selected"'; ?>><?php _e('Right',	$this->text_domain); ?></option>
										<option value="2" <?php if($this->options['thumbnail-position'] == '2') echo 'selected="selected"'; ?>><?php _e('Left',		$this->text_domain); ?></option>
									</select>
									<br /><input name="properties[thumbnail-shadow]" type="checkbox" id="check" value="1" <?php checked(isset($this->options['thumbnail-shadow']) ? $this->options['thumbnail-shadow'] : null, 1); ?> /><?php _e('Shadow', $this->text_domain); ?>
								</td>
							</tr>
							<tr>
								<td>
									<input name="properties[content-inset]" type="checkbox" id="check" value="1" <?php checked(isset($this->options['content-inset']) ? $this->options['content-inset'] : null, 1); ?> /><?php _e('Hollow content area', $this->text_domain); ?>
								</td>
							</tr>
							<tr>
								<td>
									<input name="properties[display-excerpt]" type="checkbox" id="check" value="1" <?php checked(isset($this->options['display-excerpt']) ? $this->options['display-excerpt'] : null, 1); ?> /><?php _e('Display excerpt', $this->text_domain); ?>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<?php _e('Site information', $this->text_domain); ?>
									<select name="properties[info-position]">
										<option value=""  <?php if($this->options['info-position'] == '')  echo 'selected="selected"'; ?>><?php _e('None',		$this->text_domain); ?></option>
										<option value="1" <?php if($this->options['info-position'] == '1') echo 'selected="selected"'; ?>><?php _e('Top',		$this->text_domain); ?></option>
										<option value="2" <?php if($this->options['info-position'] == '2') echo 'selected="selected"'; ?>><?php _e('Bottom',	$this->text_domain); ?></option>
									</select>
									<input name="properties[use-sitename]" type="checkbox" id="check" value="1" <?php checked(isset($this->options['use-sitename']) ? $this->options['use-sitename'] : null, 1); ?> /><?php _e('Use SiteName', $this->text_domain); ?>
								</td>
							</tr>
							<tr>
								<td>
									<input name="properties[shadow-inset]" type="checkbox" id="check" value="1" <?php checked(isset($this->options['shadow-inset']) ? $this->options['shadow-inset'] : null, 1); ?> /><?php _e('Hollow', $this->text_domain); ?>
								</td>
								<td>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"></th>
					<td><input name="properties[shadow]" type="checkbox" id="check" value="1" <?php checked(isset($this->options['shadow']) ? $this->options['shadow'] : null, 1); ?> /><?php _e('Shadow', $this->text_domain); ?></td>
				</tr>

				<tr valign="top">
					<th scope="row"><label for="inputtext"><?php _e('Display SNS Count', $this->text_domain); ?></label></th>
					<td>
						<select name="properties[sns-position]">
							<option value=""  <?php if($this->options['sns-position'] == '')  echo 'selected="selected"'; ?>><?php _e('None', $this->text_domain); ?></option>
							<option value="1" <?php if($this->options['sns-position'] == '1') echo 'selected="selected"'; ?>><?php _e('After Title', $this->text_domain); ?></option>
							<option value="2" <?php if($this->options['sns-position'] == '2') echo 'selected="selected"'; ?>><?php _e('After site-name', $this->text_domain); ?></option>
						</select>
						<input name="properties[sns-hatena]"	type="checkbox" id="check" value="1" <?php checked(isset($this->options['sns-hatena'])		? $this->options['sns-hatena']		: null, 1); ?> /><?php _e('Hatena', $this->text_domain); ?>
						<input name="properties[sns-facebook]"	type="checkbox" id="check" value="1" <?php checked(isset($this->options['sns-facebook'])	? $this->options['sns-facebook']	: null, 1); ?> /><?php _e('Facebook', $this->text_domain); ?>
						<input name="properties[sns-twitter]"	type="checkbox" id="check" value="1" <?php checked(isset($this->options['sns-twitter'])		? $this->options['sns-twitter']		: null, 1); ?> /><?php _e('Twitter', $this->text_domain); ?>
						<br /><?php _e('There is a possibility that the screen display is slow If you enable this setting.', $this->text_domain); ?>
					</td>
				</tr>
			</table>
			<?php submit_button(); ?>

			<h3><?php _e('Letters', $this->text_domain); ?></h3>
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="inputtext"><?php _e('Title', $this->text_domain); ?></label></th>
					<td>
						<input name="properties[color-title]" type="text" class="color-picker" id="pickedcolor" value="<?php	echo esc_attr($this->options['color-title']); ?>" />
						<br />
						<select name="properties[size-title]">
							<option value="14px"	<?php if($this->options['size-title'] == '14px')	echo 'selected="selected"'; ?>><?php _e('14px', $this->text_domain); ?></option>
							<option value="16px"	<?php if($this->options['size-title'] == '16px')	echo 'selected="selected"'; ?>><?php _e('16px', $this->text_domain); ?></option>
							<option value="18px"	<?php if($this->options['size-title'] == '18px')	echo 'selected="selected"'; ?>><?php _e('18px', $this->text_domain); ?></option>
							<option value="20px"	<?php if($this->options['size-title'] == '20px')	echo 'selected="selected"'; ?>><?php _e('20px', $this->text_domain); ?></option>
							<option value="24px"	<?php if($this->options['size-title'] == '24px')	echo 'selected="selected"'; ?>><?php _e('24px', $this->text_domain); ?></option>
							<option value="100%"	<?php if($this->options['size-title'] == '100%')	echo 'selected="selected"'; ?>><?php _e('100%', $this->text_domain); ?></option>
							<option value="120%"	<?php if($this->options['size-title'] == '120%')	echo 'selected="selected"'; ?>><?php _e('120%', $this->text_domain); ?></option>
							<option value="140%"	<?php if($this->options['size-title'] == '140%')	echo 'selected="selected"'; ?>><?php _e('140%', $this->text_domain); ?></option>
						</select>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="inputtext"><?php _e('URL', $this->text_domain); ?></label></th>
					<td>
						<input name="properties[color-url]" type="text" class="color-picker" id="pickedcolor" value="<?php		echo esc_attr($this->options['color-url']); ?>" />
						<br />
						<select name="properties[size-url]">
							<option value="9px"		<?php if($this->options['size-url'] == '9px')	echo 'selected="selected"'; ?>><?php _e('9px', $this->text_domain); ?></option>
							<option value="12px"	<?php if($this->options['size-url'] == '12px')	echo 'selected="selected"'; ?>><?php _e('12px', $this->text_domain); ?></option>
							<option value="14px"	<?php if($this->options['size-url'] == '14px')	echo 'selected="selected"'; ?>><?php _e('14px', $this->text_domain); ?></option>
							<option value="70%"		<?php if($this->options['size-url'] == '70%')	echo 'selected="selected"'; ?>><?php _e('70%', $this->text_domain); ?></option>
							<option value="80%"		<?php if($this->options['size-url'] == '80%')	echo 'selected="selected"'; ?>><?php _e('80%', $this->text_domain); ?></option>
							<option value="90%"		<?php if($this->options['size-url'] == '90%')	echo 'selected="selected"'; ?>><?php _e('90%', $this->text_domain); ?></option>
						</select>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="inputtext"><?php _e('Excerpt', $this->text_domain); ?></label></th>
					<td>
						<input name="properties[color-excerpt]" type="text" class="color-picker" id="pickedcolor" value="<?php	echo esc_attr($this->options['color-excerpt']); ?>" />
						<br />
						<select name="properties[size-excerpt]">
							<option value="9px"		<?php if($this->options['size-excerpt'] == '9px')	echo 'selected="selected"'; ?>><?php _e('9px', $this->text_domain); ?></option>
							<option value="11px"	<?php if($this->options['size-excerpt'] == '11px')	echo 'selected="selected"'; ?>><?php _e('11px', $this->text_domain); ?></option>
							<option value="12px"	<?php if($this->options['size-excerpt'] == '12px')	echo 'selected="selected"'; ?>><?php _e('12px', $this->text_domain); ?></option>
							<option value="14px"	<?php if($this->options['size-excerpt'] == '14px')	echo 'selected="selected"'; ?>><?php _e('14px', $this->text_domain); ?></option>
							<option value="70%"		<?php if($this->options['size-excerpt'] == '70%')	echo 'selected="selected"'; ?>><?php _e('70%', $this->text_domain); ?></option>
							<option value="80%"		<?php if($this->options['size-excerpt'] == '80%')	echo 'selected="selected"'; ?>><?php _e('80%', $this->text_domain); ?></option>
							<option value="90%"		<?php if($this->options['size-excerpt'] == '90%')	echo 'selected="selected"'; ?>><?php _e('90%', $this->text_domain); ?></option>
						</select>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="inputtext"><?php _e('Site-info.', $this->text_domain); ?></label></th>
					<td>
						<input name="properties[color-info]" type="text" class="color-picker" id="pickedcolor" value="<?php		echo esc_attr($this->options['color-info']); ?>" />
						<br />
						<select name="properties[size-info]">
							<option value="9px"		<?php if($this->options['size-info'] == '9px')	echo 'selected="selected"'; ?>><?php _e('9px', $this->text_domain); ?></option>
							<option value="11px"	<?php if($this->options['size-info'] == '11px')	echo 'selected="selected"'; ?>><?php _e('11px', $this->text_domain); ?></option>
							<option value="12px"	<?php if($this->options['size-info'] == '12px')	echo 'selected="selected"'; ?>><?php _e('12px', $this->text_domain); ?></option>
							<option value="13px"	<?php if($this->options['size-info'] == '13px')	echo 'selected="selected"'; ?>><?php _e('13px', $this->text_domain); ?></option>
							<option value="14px"	<?php if($this->options['size-info'] == '14px')	echo 'selected="selected"'; ?>><?php _e('14px', $this->text_domain); ?></option>
							<option value="60%"		<?php if($this->options['size-info'] == '60%')	echo 'selected="selected"'; ?>><?php _e('60%', $this->text_domain); ?></option>
							<option value="70%"		<?php if($this->options['size-info'] == '70%')	echo 'selected="selected"'; ?>><?php _e('70%', $this->text_domain); ?></option>
							<option value="80%"		<?php if($this->options['size-info'] == '80%')	echo 'selected="selected"'; ?>><?php _e('80%', $this->text_domain); ?></option>
							<option value="90%"		<?php if($this->options['size-info'] == '90%')	echo 'selected="selected"'; ?>><?php _e('90%', $this->text_domain); ?></option>
							<option value="100%"	<?php if($this->options['size-info'] == '100%')	echo 'selected="selected"'; ?>><?php _e('100%', $this->text_domain); ?></option>
						</select>
					</td>
				</tr>
				<tr valign="top" style="display: none;">
					<th scope="row"><label for="inputtext"><?php _e('Plugin-link', $this->text_domain); ?></label></th>
					<td>
						<input name="properties[color-plugin]" type="text" class="color-picker" id="pickedcolor" value="<?php	echo esc_attr($this->options['color-plugin']); ?>" />
						<br />
						<select name="properties[size-plugin]">
							<option value="4px"		<?php if($this->options['size-plugin'] == '4px')	echo 'selected="selected"'; ?>><?php _e('4px', $this->text_domain); ?></option>
							<option value="7px"		<?php if($this->options['size-plugin'] == '7px')	echo 'selected="selected"'; ?>><?php _e('7px', $this->text_domain); ?></option>
							<option value="9px"		<?php if($this->options['size-plugin'] == '9px')	echo 'selected="selected"'; ?>><?php _e('9px', $this->text_domain); ?></option>
						</select>
					</td>
				</tr>

			</table>
			<?php submit_button(); ?>


			<h3><?php _e('External link', $this->text_domain); ?></h3>
			<table class="form-table">

				<tr valign="top">
					<th scope="row"><label for="inputtext"><?php _e('Use HatenaBlogCard', $this->text_domain); ?></label></th>
					<td><input name="properties[dummy]" type="checkbox" id="check" value="1" checked="checked" disabled="disabled" />
						<?php _e('External links will use Always Hatena blog card', $this->text_domain); ?></td>
				</tr>
				<tr valign="top" style="display: none;">
					<th scope="row"><label for="inputtext"><?php _e('Use HatenaBlogCard', $this->text_domain); ?></label></th>
					<td><input name="properties[use-hatena]" type="checkbox" id="check" value="1" <?php checked(isset($this->options['use-hatena']) ? $this->options['use-hatena'] : null, 1); ?> />
						<?php _e('External links will use Always Hatena blog card', $this->text_domain); ?></td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="inputtext"><?php _e('Background Color', $this->text_domain); ?></label></th>
					<td><input name="properties[ex-bgcolor]" type="text" class="color-picker" id="pickedcolor" value="<?php echo esc_attr($this->options['ex-bgcolor']); ?>" />
						<br /><?php _e('This setting is not valid for " Hatena-Blogcard"', $this->text_domain); ?></td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="inputtext"><?php _e('Background image', $this->text_domain); ?></label></th>
					<td><input name="properties[ex-image]" type="text" id="inputtext" value="<?php echo esc_attr($this->options['ex-image']); ?>" size="80" />
						<br /><?php _e('This setting is not valid for " Hatena-Blogcard"', $this->text_domain); ?></td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="inputtext"><?php _e('Thumbnail', $this->text_domain); ?></label></th>
					<td>
						<select name="properties[ex-thumbnail]">
							<option value="" <?php if($this->options['ex-thumbnail'] == '') echo 'selected="selected"'; ?>><?php _e('None', $this->text_domain); ?></option>
							<option value="1" <?php if($this->options['ex-thumbnail'] == '1') echo 'selected="selected"'; ?> disabled="disabled"><?php _e('Direct', $this->text_domain); ?></option>
							<option value="3" <?php if($this->options['ex-thumbnail'] == '3') echo 'selected="selected"'; ?>><?php _e('Use WebAPI', $this->text_domain); ?></option>
						</select>
						<br /><?php _e('This setting is not valid for " Hatena-Blogcard"', $this->text_domain); ?></td>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="inputtext"><?php _e('Favicon', $this->text_domain); ?></label></th>
					<td>
						<select name="properties[ex-favicon]">
							<option value=""  <?php if($this->options['ex-favicon'] == '')  echo 'selected="selected"'; ?>><?php _e('None', $this->text_domain); ?></option>
							<option value="1" <?php if($this->options['ex-favicon'] == '1') echo 'selected="selected"'; ?> disabled="disabled"><?php _e('Direct', $this->text_domain); ?></option>
							<option value="3" <?php if($this->options['ex-favicon'] == '3') echo 'selected="selected"'; ?>><?php _e('Use WebAPI', $this->text_domain); ?></option>
						</select>
						<br /><?php _e('This setting is not valid for " Hatena-Blogcard"', $this->text_domain); ?></td>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="inputtext"><?php _e('Site information', $this->text_domain); ?></label></th>
					<td><input name="properties[ex-info]" type="text" id="inputtext" value="<?php echo esc_attr($this->options['ex-info']); ?>" class="regular-text" />
						<br /><?php _e('This setting is not valid for " Hatena-Blogcard"', $this->text_domain); ?></td>
				</tr>
				<tr valign="top" style="display: none;">
					<th scope="row"><label for="inputtext"><?php _e('Open new window/tab', $this->text_domain); ?></label></th>
					<td><input name="properties[ex-target]" type="checkbox" id="check" value="1" <?php checked(isset($this->options['ex-target']) ? $this->options['ex-target'] : null, 1); ?> /></td>
				</tr>

			</table>
			<?php submit_button(); ?>

			<h3><?php _e('Internal link', $this->text_domain); ?></h3>
			<table class="form-table">

				<tr valign="top" style="display: none;">
					<th scope="row"><label for="inputtext"><?php _e('Use HatenaBlogCard', $this->text_domain); ?></label></th>
					<td><input name="properties[use-hatena-in]" type="checkbox" id="check" value="1" <?php checked(isset($this->options['use-hatena-in']) ? $this->options['use-hatena-in'] : null, 1); ?> /></td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="inputtext"><?php _e('Background Color', $this->text_domain); ?></label></th>
					<td><input name="properties[in-bgcolor]" type="text" class="color-picker" id="pickedcolor" value="<?php echo esc_attr($this->options['in-bgcolor']); ?>" /></td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="inputtext"><?php _e('Background Image', $this->text_domain); ?></label></th>
					<td><input name="properties[in-image]" type="text" id="inputtext" value="<?php echo esc_attr($this->options['in-image']); ?>" size="80" /></td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="inputtext"><?php _e('Thumbnail', $this->text_domain); ?></label></th>
					<td>
						<select name="properties[in-thumbnail]">
							<option value="" <?php if($this->options['in-thumbnail'] == '') echo 'selected="selected"'; ?>><?php _e('None', $this->text_domain); ?></option>
							<option value="1" <?php if($this->options['in-thumbnail'] == '1') echo 'selected="selected"'; ?>><?php _e('Direct', $this->text_domain); ?></option>
							<option value="3" <?php if($this->options['in-thumbnail'] == '3') echo 'selected="selected"'; ?>><?php _e('Use WebAPI', $this->text_domain); ?></option>
						</select>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="inputtext"><?php _e('Favicon', $this->text_domain); ?></label></th>
					<td>
						<select name="properties[in-favicon]">
							<option value=""  <?php if($this->options['in-favicon'] == '')  echo 'selected="selected"'; ?>><?php _e('None', $this->text_domain); ?></option>
							<option value="1" <?php if($this->options['in-favicon'] == '1') echo 'selected="selected"'; ?> <?php if(!function_exists('has_site_icon')) echo 'disabled="disabled"'; ?>><?php _e('Direct', $this->text_domain); ?></option>
							<option value="3" <?php if($this->options['in-favicon'] == '3') echo 'selected="selected"'; ?>><?php _e('Use WebAPI', $this->text_domain); ?></option>
						</select>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="inputtext"><?php _e('Site information', $this->text_domain); ?></label></th>
					<td><input name="properties[in-info]" type="text" id="inputtext" value="<?php echo esc_attr($this->options['in-info']); ?>" class="regular-text" /><br /></td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="inputtext"><?php _e('Open new window/tab', $this->text_domain); ?></label></th>
					<td><input name="properties[in-target]" type="checkbox" id="check" value="1" <?php checked(isset($this->options['in-target']) ? $this->options['in-target'] : null, 1); ?> /></td>
				</tr>

				<tr valign="top">
					<th scope="row"><label for="inputtext"><?php _e('This page', $this->text_domain); ?></label></th>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="inputtext"><?php _e('Background Color', $this->text_domain); ?></label></th>
					<td><input name="properties[th-bgcolor]" type="text" class="color-picker" id="pickedcolor" value="<?php echo esc_attr($this->options['th-bgcolor']); ?>" /></td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="inputtext"><?php _e('Background Image', $this->text_domain); ?></label></th>
					<td><input name="properties[th-image]" type="text" id="inputtext" value="<?php echo esc_attr($this->options['th-image']); ?>" size="80" /></td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="inputtext"><?php _e('Site information', $this->text_domain); ?></label></th>
					<td><input name="properties[th-info]" type="text" id="inputtext" value="<?php echo esc_attr($this->options['th-info']); ?>" class="regular-text" /></td>
				</tr>

				<tr valign="top" style="display: none;">
					<th scope="row"><label for="inputtext"><?php _e('Use SNS Count Cache', $this->text_domain); ?></label></th>
					<td>
						<input name="properties[use-snscache]"	type="checkbox" id="check" value="1" <?php checked(isset($this->options['use-snscache'])		? $this->options['sns-hatena']		: null, 1); ?> />
					</td>
				</tr>

			</table>
			<?php submit_button(); ?>

			<h3><?php _e('Web-API', $this->text_domain); ?></h3>
			<table class="form-table"
				<tr valign="top">
					<th scope="row"><label for="inputtext"><?php _e('Favicon API', $this->text_domain); ?></label></th>
					<td><input name="properties[favicon-api]" type="text" id="inputtext" value="<?php echo esc_attr($this->options['favicon-api']); ?>" size="80" />
						<p><?php _e('%DOMAIN% replace to domain name (ex. poporon.poponet.jp )<br />%DOMAIN_URL% replace to domain URL (ex. http://poporon.poponet.jp )', $this->text_domain); ?></p></td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="inputtext"><?php _e('Thumbnail API', $this->text_domain); ?></label></th>
					<td><input name="properties[thumbnail-api]" type="text" id="inputtext" value="<?php echo esc_attr($this->options['thumbnail-api']); ?>" size="80" />
						<p><?php _e('%URL% replace to URL', $this->text_domain); ?></p></td>
				</tr>
			</table>
			<?php submit_button(); ?>

			<h3><?php _e('Debug', $this->text_domain); ?></h3>
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="inputtext"><?php _e('Use blockquote tag', $this->text_domain); ?></label></th>
					<td><input name="properties[blockquote]" type="checkbox" id="check" value="1" <?php checked(isset($this->options['blockquote']) ? $this->options['blockquote'] : null, 1); ?> />
						<?php _e('without using DIV tag, and use BLOCKQUOTE tag', $this->text_domain); ?>
						<br /><?php _e('This setting is not valid for " Hatena-Blogcard"', $this->text_domain); ?></td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="inputtext"><?php _e('Set nofollow', $this->text_domain); ?></label></th>
					<td><input name="properties[nofollow]" type="checkbox" id="check" value="1" <?php checked(isset($this->options['nofollow']) ? $this->options['nofollow'] : null, 1); ?> />
						<?php _e('In the case of an external site, it puts the "nofollow"', $this->text_domain); ?>
						<br /><?php _e('This setting is not valid for " Hatena-Blogcard"', $this->text_domain); ?></td>
				</tr>

				<tr valign="top">
					<th scope="row"><label for="inputtext"><?php _e('Link the whole', $this->text_domain); ?></label></th>
					<td><input name="properties[link-all]" type="checkbox" id="check" value="1" <?php checked(isset($this->options['link-all']) ? $this->options['link-all'] : null, 1); ?> />
						<?php _e('Enclose the entire card at anchor', $this->text_domain); ?>
					</td>
				</tr>

				<tr valign="top">
					<th scope="row"><label for="inputtext"><?php _e('Reset img style', $this->text_domain); ?></label></th>
					<td><input name="properties[style-reset-img]" type="checkbox" id="check" value="1" <?php checked(isset($this->options['style-reset-img']) ? $this->options['style-reset-img'] : null, 1); ?> />
						<?php _e('When unnecessary frame is displayed on the image, you can improve it by case', $this->text_domain); ?></td>
				</tr>

				<tr valign="top">
					<th scope="row"><label for="inputtext"><?php _e('specified CSS', $this->text_domain); ?></label></th>
					<td><input name="properties[style]" type="checkbox" id="check" value="1" <?php checked(isset($this->options['style']) ? $this->options['style'] : null, 1); ?> />
						<?php _e('Use specified CSS file', $this->text_domain); ?></td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="inputtext"><?php _e('CSS file', $this->text_domain); ?></label></th>
					<td><input name="properties[css-file]" type="text" id="inputtext" value="<?php echo esc_attr($this->options['css-file']); ?>" size="80" /><br />
						<p><?php _e('(ex. http://exsample.com/style.css )', $this->text_domain); ?></p></td>
				</tr>
				<tr valign="top" style="display: none;">
					<th scope="row"><label for="inputtext"><?php _e('CSS file', $this->text_domain); ?></label></th>
					<td><input name="properties[css-path]" type="text" id="inputtext" value="<?php echo esc_attr($this->options['css-path']); ?>" size="80" /><br />
				</tr>
				<tr valign="top" style="display: none;">
					<th scope="row"><label for="inputtext"><?php _e('CSS URL', $this->text_domain); ?></label></th>
					<td><input name="properties[css-url]" type="text" id="inputtext" value="<?php echo esc_attr($this->options['css-url']); ?>" size="80" /><br />
				</tr>

				<tr valign="top">
					<th scope="row"><label for="inputtext"><?php _e('Display link to author page', $this->text_domain); ?></label></th>
					<td><input name="properties[plugin-link]" type="checkbox" id="check" value="1" <?php checked(isset($this->options['plugin-link']) ? $this->options['plugin-link'] : null, 1); ?> disabled="disabled" />
						<a href="<?php echo $this->options['plugin-url']; ?>" target="_blank"><?php echo $this->options['plugin-name']; ?></a></td>
				</tr>
				<tr valign="top" style="display: none;">
					<th scope="row"><label for="inputtext"><?php _e('Plugin URL', $this->text_domain); ?></label></th>
					<td><input name="properties[plugin-url]" type="text" id="inputtext" value="<?php echo esc_attr($this->options['plugin-url']); ?>" class="regular-text" /></td>
				</tr>
				<tr valign="top" style="display: none;">
					<th scope="row"><label for="inputtext"><?php _e('Plugin name', $this->text_domain); ?></label></th>
					<td><input name="properties[plugin-name]" type="text" id="inputtext" value="<?php echo esc_attr($this->options['plugin-name']); ?>" class="regular-text" /></td>
				</tr>
				<tr valign="top" style="display: none;">
					<th scope="row"><label for="inputtext"><?php _e('Plugin version', $this->text_domain); ?></label></th>
					<td><input name="properties[plugin-version]" type="text" id="inputtext" value="<?php echo esc_attr($this->options['plugin-version']); ?>" class="regular-text" /></td>
				</tr>
				<tr valign="top" style="display: none;">
					<th scope="row"><label for="inputtext"><?php _e('Saved datetime', $this->text_domain); ?></label></th>
					<td><input name="properties[saved-date]" type="text" id="inputtext" value="<?php echo esc_attr($this->options['saved-date']); ?>" /></td>
				</tr>

				<tr valign="top">
					<th scope="row"><label for="inputtext"><?php _e('Note', $this->text_domain); ?></label></th>
					<td><input name="properties[hidden-note]" type="checkbox" id="check" value="1" <?php checked(isset($this->options['hidden-note']) ? $this->options['hidden-note'] : null, 1); ?> />
						<?php _e('Do not show the note at the beginning', $this->text_domain); ?></td>
				</tr>
	
				<tr valign="top">
					<th scope="row"><label for="inputtext"><?php _e('Display elapsed time', $this->text_domain); ?></label></th>
					<td><input name="properties[debug-time]" type="checkbox" id="check" value="1" <?php checked(isset($this->options['debug-time']) ? $this->options['debug-time'] : null, 1); ?> />
						<?php _e('Output the elapsed time to HTML comment.', $this->text_domain); ?></td>
				</tr>

				</table>
			<?php submit_button(); ?>

			<h3><?php _e('Initialize', $this->text_domain); ?></h3>
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="inputtext"><?php _e('Return to the initial setting', $this->text_domain); ?></label></th>
					<td><input name="properties[initialize]" type="checkbox" id="check" value="1" <?php checked(isset($this->options['initialize']) ? $this->options['initialize'] : null, 1); ?> /></td>
				</tr>
			</table>
			<?php submit_button(); ?>

		</form>
	</div>
<style>#wpfooter { position: fixed; }</style>