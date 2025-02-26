<?php
/**
 * Renders form elements for admin settings pages.
 */
class wdshare_AdminFormRenderer {
	function _get_option ($key=false) {
		$opts = WP_NETWORK_ADMIN ? get_site_option('wdshare') : get_option('wdshare');
		return $key ? @$opts[$key] : $opts;
	}

	function _create_checkbox ($name) {
		$opt = $this->_get_option();
		$value = @$opt[$name];
		return
			"<input type='radio' name='wdshare[{$name}]' id='{$name}-yes' value='1' " . ((int)$value ? 'checked="checked" ' : '') . " /> " .
				"<label for='{$name}-yes'>" . __('Yes', 'wdshare') . "</label>" .
			'&nbsp;' .
			"<input type='radio' name='wdshare[{$name}]' id='{$name}-no' value='0' " . (!(int)$value ? 'checked="checked" ' : '') . " /> " .
				"<label for='{$name}-no'>" . __('No', 'wdshare') . "</label>" .
		"";
	}

	function _create_radiobox ($name, $value) {
		$opt = $this->_get_option();
		$checked = (@$opt[$name] == $value) ? true : false;
		return "<input type='radio' name='wdshare[{$name}]' id='{$name}-{$value}' value='{$value}' " . ($checked ? 'checked="checked" ' : '') . " /> ";
	}

	/**
	 * Create the services box into plugin.
	 */
	function create_services_box () {
		$services = array (
			'google' => 'Google +1',
			'facebook' => 'Facebook Like',
			'twitter' => 'Tweet this',
			'stumble_upon' => 'Stumble upon',
			'delicious' => 'Del.icio.us',
			'reddit' => 'Reddit',
			'linkedin' => 'LinkedIn',
		);
		$externals = array (
			'google',
			'twitter',
			'linkedin',
		);

		$load = $this->_get_option('services');
		$load = is_array($load) ? $load : array();

		$services = array_merge($load, $services);

		$skip = $this->_get_option('skip_script');
		$skip = is_array($skip) ? $skip : array();

		echo "<ul id='wdshare-services'>";
		foreach ($services as $key => $name) {
			$disabled = isset($load[$key]) ? '' : 'wdshare-disabled';
			echo "<li class='wdshare-service-item {$disabled}'>";
			if (is_array($name)) {
				echo $name['name'] .
					"<br/><a href='#' class='wdshare_remove_service'>" . __('Remove this service', 'wdshare') . '</a>' .
					'<input type="hidden" name="wdshare[services][' . $key . '][name]" value="' . esc_attr($name['name']) . '" />' .
					'<input type="hidden" name="wdshare[services][' . $key . '][code]" value="' . esc_attr($name['code']) . '" />' .
				'</div>';
			} else {
				echo "<img src='" . wdshare_PLUGIN_URL . "/img/{$key}.png' width='50px' />" .
					"<input type='checkbox' name='wdshare[services][{$key}]' value='{$key}' " .
						"id='wdshare-services-{$key}' " .
						(in_array($key, $load) ? "checked='checked'" : "") .
					"/> " .
						"<label for='wdshare-services-{$key}'>{$name}</label>" .
					'<br />';
				if (in_array($key, $externals)) echo
					"<input type='checkbox' name='wdshare[skip_script][{$key}]' value='{$key}' " .
						"id='wdshare-skip_script-{$key}' " .
						(in_array($key, $skip) ? "checked='checked'" : "") .
					"/> " .
						"<label for='wdshare-skip_script-{$key}'>" .
							'<small>' . __('My page already uses scripts from this service', 'wdshare') . '</small>' .
						"</label>" .
					"";
			}

			echo "<div class='clear'></div></li>";
		}
		echo "</ul>";
	}
	/**
	 * Create custom service box.
	 */
	function create_custom_service_box () {
		echo '<p>' .
			'<label for="wdshare_new_custom_service-name">' . __('Name', 'wdshare') . '</label>' .
			'<input type="text" name="wdshare[new_service][name]" id="wdshare_new_custom_service-name" class="widefat" />' .
		'</p>';
		echo '<p>' .
			'<label for="wdshare_new_custom_service-code">' . __('Code', 'wdshare') . '</label>' .
			'<textarea rows="1" name="wdshare[new_service][code]" id="wdshare_new_custom_service-code" class="widefat"></textarea>' .
		'</p>';
		echo '<p>' .
			'<input type="submit" class="button" value="' . __('Add', 'wdshare') . '" />' .
		'</p>';
		'';
	}
	/**
	 * Gets the appearance box o the plugin.
	 */
	function create_appearance_box () {
		$background = $this->_get_option('background');
		$border = $this->_get_option('border');

		echo '<label for="wdshare-background">' .
			__('Background', 'wdshare') . '</label> ' .
			"<input type='text' class='widefat' name='wdshare[background]' id='wdshare-background' value='{$background}' />" .
			'<div><small>' . __('e.g. <code>#C6C6C6</code>') . '</small></div>' .
		'<br />';
		echo '<label for="wdshare-border">' .
			__('Border', 'wdshare') . '</label> ' .
			"<input type='text' class='widefat' name='wdshare[border]' id='wdshare-border' value='{$border}' />" .
			'<div><small>' . __('e.g. <code>2px solid #AAA</code>') . '</small></div>' .
		'<br />';
	}

	function create_min_width_box () {
		$width = $this->_get_option('min_width');

		echo "<input type='text' size='4' name='wdshare[min_width]' id='wdshare-min_width' value='{$width}' /> px" .
			'<div><small>' . __('The box will be shown inline in windows narrower then this width <br />This is dependent on your theme layout', 'wdshare') . '</small></div>' .
		'<br />';
	}

	function create_top_offset_box () {
		$top_offset = (int)$this->_get_option('top_offset');
		$top_relative = $this->_get_option('top_relative');
		$top_selector = $this->_get_option('top_selector');

		$tops = array(
			'text' => __('Text', 'wdshare'),
			'page-top' => __('Page top', 'wdshare'),
			'page-bottom' => __('Page bottom', 'wdshare'),
			'selector' => __('Selector', 'wdshare'),
		);

		echo
			"<label for='wdshare-top_relative'>" . __('My box will be vertically positioned with respect to:', 'wdshare') . '</label> ' .
			'<select name="wdshare[top_relative]" id="wdshare-top_relative">'
		;
		foreach ($tops as $pos => $label) {
			$selected = ($pos == $top_relative) ? 'selected="selected"' : '';
			echo "<option value='{$pos}' {$selected}>{$label}</option>";
		}
		echo '</select><br />';
		echo
			"<label for='wdshare-top_offset'>" . __('Offset:', 'wdshare') . '</label> ' .
				"<input type='text' size='4' name='wdshare[top_offset]' id='wdshare-top_offset' value='{$top_offset}' /> px" .
				'<div><small>' . __('The box will be shown this far from the top or bottom edge, text, or from your selector below', 'wdshare') . '</small></div>'
		;
		echo
			'<div id="wdshare-top_selector-root">' .
			'<label for="wdshare-top_selector">' . __('Stick to element with this selector', 'wdshare') . '</label>' .
			"<input type='text' class='widefat' name='wdshare[top_selector]' id='wdshare-top_selector' value='{$top_selector}' />" .
			'<div><small>' . __('e.g. <code>#primary</code>') . '</small></div>' .
		'</div>';
	}
	function create_horizontal_offset_box () {
		$offset = (int)$this->_get_option('horizontal_offset');
		$relative = $this->_get_option('horizontal_relative');
		$selector = $this->_get_option('horizontal_selector');
		$direction = $this->_get_option('horizontal_direction');

		$lefts = array(
			'text' => __('Text', 'wdshare'),
			'page' => __('Page', 'wdshare'),
			'selector' => __('Selector', 'wdshare'),
		);
		$dirs = array(
			'left' => __('left', 'wdshare'),
			'right' => __('right', 'wdshare'),
		);

		echo
			"<label for='wdshare-left_relative'>" . __('Horizontal position of my box will be calculated with respect to', 'wdshare') . '</label> ' .
				'<select name="wdshare[horizontal_direction]">'
			;
		foreach ($dirs as $dir => $label) {
			$selected = ($dir == $direction) ? 'selected="selected"' : '';
			echo "<option value='{$dir}' {$selected}>{$label}</option>";
		}
		echo '</select>';
		_e('side of my', 'wdshare');
		echo '<select name="wdshare[horizontal_relative]" id="wdshare-left_relative">';
		foreach ($lefts as $pos => $label) {
			$selected = ($pos == $relative) ? 'selected="selected"' : '';
			echo "<option value='{$pos}' {$selected}>{$label}</option>";
		}
		echo '</select><br />';
		echo
			"<label for='wdshare-left_offset'>" . __('Offset:', 'wdshare') . '</label> ' .
				"<input type='text' size='4' name='wdshare[horizontal_offset]' id='wdshare-left_offset' value='{$offset}' /> px" .
				'<div><small>' . __('The box will be shown this far from the left edge, text, or from your selector below', 'wdshare') . '</small></div>'
		;
		echo
			'<div id="wdshare-left_selector-root">' .
			'<label for="wdshare-left_selector">' . __('Stick to element with this selector', 'wdshare') . '</label>' .
			"<input type='text' class='widefat' name='wdshare[horizontal_selector]' id='wdshare-left_selector' value='{$selector}' />" .
			'<div><small>' . __('e.g. <code>#primary</code>') . '</small></div>' .
		'</div>';
	}

	function create_advanced_box () {
		$zidx = $this->_get_option('z-index');
		$zidx = $zidx ? $zidx : 10000000;
		echo "<label for='wdshare-z-index'>" . __('Z index', 'wdshare') . '</label>';
		echo "<input type='text' size='8' id='wdshare-z-index' name='wdshare[z-index]' value='{$zidx}' />";
		echo '<div><small>' . __("This value will be applied to the entire floating box", 'wdshare') . '</small></div>';
		echo "<label for='wdshare-allow_fixed'>" . __('Allow fixed positioning in IE', 'wdshare') . '</label> ';
		echo $this->_create_checkbox('allow_fixed');
	}

	function create_css_box () {
		$css = $this->_get_option('css');
		echo "<textarea rows='8' name='wdshare[css]' class='widefat'>$css</textarea>";
		echo '<div><small>' . __("These are some of the selectors you may want to use: <code>#wdshare-share-box</code>, <code>.wdshare-item</code>", 'wdshare') . '</small></div>';
	}

}