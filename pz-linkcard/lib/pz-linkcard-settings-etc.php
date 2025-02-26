<?php defined('ABSPATH' ) || wp_die; ?>
<div class="pz-page" id="pz-etc">
	<div class="pz-submit-float"><?php submit_button(); ?></div>
	<h2><?php echo	__('Stylesheet Settings', TEXT_DOMAIN ).$help_open.'css'.$help_close; ?></h2>
	<table class="form-table">
		<tr>
			<th scope="row"><?php _e('Stylesheet URL to Add', TEXT_DOMAIN ); ?></th>
			<td><input name="properties[css-add-url]"	type="url"  size="120" title="<?php echo	esc_attr($prop['css-add-url'] ); ?>" value="<?php echo	esc_attr($prop['css-add-url'] ); ?>" /><br><p><?php echo	__('(', TEXT_DOMAIN ).__('ex.', TEXT_DOMAIN ).' '.$this->home_url.'/style.css '.__(')', TEXT_DOMAIN ); ?></p></td>
		</tr>
		<tr>
			<th scope="row"><?php _e('Stylesheet Text to Add', TEXT_DOMAIN ); ?></th>
			<td>
				<textarea name="properties[css-add]" maxlength="1024" class="pz-css-add"><?php echo	esc_attr($prop['css-add'] ); ?></textarea>
			</td>
		</tr>
		<tr class="pz-debug-only">
			<th scope="row"><?php _e('Stylesheet Version', TEXT_DOMAIN ); ?></th>
			<td><input name="properties[css-count]"		type="text" size="10" title="<?php echo	esc_attr($prop['css-count'] ); ?>" value="<?php echo	esc_attr($prop['css-count'] ); ?>" readonly="readonly" <?php if ($prop['admin-mode'] ) { echo	'onDblClick="this.readOnly=false;" '; }?>/></td>
		</tr>
		<tr class="pz-debu-only">
			<th scope="row"><?php echo __('CSS File URL', TEXT_DOMAIN ); ?></th>
			<td><input name=""							type="text" size="120" title="<?php echo esc_attr(DIR_STYLE.'style.css'     ); ?>" class="pz-click-all-select" value="<?php echo	esc_attr(DIR_STYLE.'style.css'     ); ?>" readonly="readonly" /></td>
		</tr>
		<tr class="pz-debug-only">
			<th scope="row"><?php echo __('CSS File URL', TEXT_DOMAIN ).' '.__('(Compressed)', TEXT_DOMAIN ); ?></th>
			<td><input name="" 							type="text" size="120" title="<?php echo esc_attr(DIR_STYLE.'style.min.css' ); ?>" class="pz-click-all-select" value="<?php echo	esc_attr(DIR_STYLE.'style.min.css' ); ?>" readonly="readonly" /></td>
		</tr>
		<tr class="pz-debug-only">
			<th scope="row"><?php _e('Stylesheet Templete File', TEXT_DOMAIN ); ?></th>
			<td><input name=""	type="text" size="120" title="<?php echo esc_attr(FILE_TEMPLETE ); ?>" class="pz-click-all-select" value="<?php echo esc_attr(FILE_TEMPLETE ); ?>" readonly="readonly" /></td>
		</tr>

	</table>
	<?php submit_button(); ?>

	<h2><?php echo	__('Web-API Settings', TEXT_DOMAIN ).$help_open.'web-api'.$help_close; ?></h2>
	<table class="form-table">
		<tr>
			<th scope="row"><?php _e('Site Icon API', TEXT_DOMAIN ); ?></th>
			<td>
				<input name="properties[favicon-api]" type="url" size="120" class="pz-click-all-select" value="<?php echo	esc_attr($prop['favicon-api'] ); ?>" />
				<p><?php echo	__('%DOMAIN% replace to domain name.', TEXT_DOMAIN ).' '.__('(', TEXT_DOMAIN ).__('ex.', TEXT_DOMAIN ).' '.$pz_domain.' '.__(')', TEXT_DOMAIN ).'<br>'.__('%DOMAIN_URL% replace to domain URL.').' '.__('(', TEXT_DOMAIN ).__('ex.', TEXT_DOMAIN ).' '.$pz_domain_url.' '.__(')', TEXT_DOMAIN ).'<br>'.__('%URL% replace to URL.', TEXT_DOMAIN ).' '.__('(', TEXT_DOMAIN ).__('ex.', TEXT_DOMAIN ).' '.$pz_url.self::PLUGIN_PATH.' '.__(')', TEXT_DOMAIN ); ?>
				<p><?php _e('ex1.', TEXT_DOMAIN ); ?><input name="" type="text" size="70" class="pz-click-all-select" value="https://www.google.com/s2/favicons?domain=%DOMAIN%" readonly="readonly" /></p>
				<p><?php _e('ex2.', TEXT_DOMAIN ); ?><input name="" type="text" size="70" class="pz-click-all-select" value="https://favicon.hatena.ne.jp/?url=%URL%" readonly="readonly" /></p>
			</td>
		</tr>
		<tr>
			<th scope="row" rowspan="3"><?php _e('Thumbnail API', TEXT_DOMAIN ); ?></th>
			<td>
				<input name="properties[thumbnail-api]" type="url" size="120" class="pz-click-all-select" value="<?php echo	esc_attr($prop['thumbnail-api'] ); ?>" />
				<p><?php echo	__('%URL% replace to URL.', TEXT_DOMAIN ).' '.__('(', TEXT_DOMAIN ).__('ex.', TEXT_DOMAIN ).' '.$pz_url.self::PLUGIN_PATH.' '.__(')', TEXT_DOMAIN ); ?></p>
				<p><?php _e('ex1.', TEXT_DOMAIN ); ?><input name="" type="text" size="70" class="pz-click-all-select" value="https://s.wordpress.com/mshots/v1/%URL%?w=200" readonly="readonly" /></p>
				<p><?php _e('ex2.', TEXT_DOMAIN ); ?><input name="" type="text" size="70" class="pz-click-all-select" value="https://capture.heartrails.com/200x200?%URL%" readonly="readonly" /></p>
			</td>
		</tr>
	</table>
	<?php submit_button(); ?>

	<h2><?php echo	__('Image Settings', TEXT_DOMAIN ).$help_open.'image'.$help_close; ?></h2>
	<table class="form-table">
		<tr>
			<th scope="row"><?php _e('Image Cache URL', TEXT_DOMAIN ); ?></th>
			<td>
				<p><input name="" type="url" title="<?php echo	URL_CACHE; ?>" class="pz-click-all-select" value="<?php echo URL_CACHE; ?>" size="120" readonly="readonly" /></p>
				<p><?php _e('Schemes (http and https) are omitted.', TEXT_DOMAIN ); ?></p>
				<p><?php $size = pz_GetDirSize(DIR_CACHE ); echo	__('Used', TEXT_DOMAIN ).__(': ', TEXT_DOMAIN ).'<span class="pz-monospace">'.pz_GetSizeStringSi($size).' ('.pz_GetStringBytes($size).')'; ?></span></p>
			</td>
		</tr>
		<tr class="pz-debug-only">
			<th scope="row"><?php _e('Image Cache Directory', TEXT_DOMAIN ); ?></th>
			<td>
				<p><input name="" type="text" title="<?php echo DIR_CACHE; ?>" class="pz-click-all-select" value="<?php echo DIR_CACHE; ?>" size="120" readonly="readonly" /></p>
			</td>
		</tr>
	</table>
	<?php submit_button(); ?>

	<div class="pz-debug-only">
		<h2><?php echo	__('Survey Settings', TEXT_DOMAIN ); ?></h2>
		<table class="form-table">
			<tr class="pz-debug-only">
				<th scope="row"><?php _e('Log URL', TEXT_DOMAIN ); ?></th>
				<td>
					<p><input name="" type="url" title="<?php echo URL_DEBUG; ?>" class="pz-click-all-select" value="<?php echo URL_DEBUG; ?>" size="120" readonly="readonly" /></p>
					<p><?php _e('Schemes (http and https) are omitted.', TEXT_DOMAIN ); ?></p>
					<p><?php $size = pz_GetDirSize(DIR_DEBUG ); echo __('Used', TEXT_DOMAIN ).__(': ', TEXT_DOMAIN ).'<span class="pz-monospace">'.pz_GetSizeStringSi($size).' ('.pz_GetStringBytes($size).')'; ?></span></p>
					<p><button type="button" name="action" value="clear-log" class="pz-button" onclick="return confirm('<?php _e('(Unimplemented)', TEXT_DOMAIN ); ?>');"><?php _e('Clear LOG File', TEXT_DOMAIN ); ?></button><?php _e('(Unimplemented)', TEXT_DOMAIN ); ?></p>
				</td>
			</tr>
			<tr class="pz-debug-only">
				<th scope="row"><?php _e('Log Directory', TEXT_DOMAIN ); ?></th>
				<td>
					<p><input name="" type="text" title="<?php echo	DIR_DEBUG; ?>" class="pz-click-all-select" value="<?php echo DIR_DEBUG; ?>" size="120" readonly="readonly" /></p>
				</td>
			</tr>
		</table>
		<?php submit_button(); ?>
	</div>
</div>
