<?php
/*
 * Auto AnimateImage Options
 * Copyright (C) 2012 attosoft <http://attosoft.info/en/>
 * This file is distributed under the same license as the Auto AnimateImage package.
 * attosoft <contact@attosoft.info>, 2012.
 */

class Animate_Image_Options {

	function register_options_page() {
		add_options_page('Auto AnimateImage ' . $this->util->__('Settings'), 'Auto AnimateImage', 'manage_options', 'auto-animateimage', array(&$this, 'options_page'));
		add_meta_box( 'general-box', $this->util->__('General'), array(&$this, 'general_metabox'), $this->settings_page_type, 'normal' );
		add_meta_box( 'options-box', $this->util->__('Common Options'), array(&$this, 'options_metabox'), $this->settings_page_type, 'normal' );
		add_meta_box( 'anim-styles-box', $this->util->__('Styles') . ' (' . $this->util->__('Animated Images') . ')', array(&$this, 'anim_styles_metabox'), $this->settings_page_type, 'normal' );
		add_meta_box( 'blank-styles-box', $this->util->__('Styles') . ' (' . $this->util->__('Blank Image') . ')', array(&$this, 'blank_styles_metabox'), $this->settings_page_type, 'normal' );
		add_meta_box( 'about-box', $this->util->__('About'), array(&$this, 'about_metabox'), $this->settings_page_type, 'normal' );
		if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], 'post_id=' . $this->options['post_id']) !== false) {
			add_filter('gettext', array(&$this, 'replace_insert_button'), 20, 3);
			register_post_type('auto-animateimage', array('label' => 'Auto AnimateImage'));
		}
	}

	function replace_insert_button($translated_text, $text, $domain) {
		return $text == 'Insert into Post' ? $this->util->__('Insert Image', 'Insert an Image', 'Insert') : $translated_text;
	}

	function register_scripts() {
		$this->has_slider = function_exists('wp_script_is') && wp_script_is('jquery-ui-slider', 'registered');
		$deps = array('postbox', 'farbtastic', 'thickbox', 'media-upload');
		if ($this->has_slider) $deps[] = 'jquery-ui-slider';
		wp_enqueue_script('animateimage-options', $this->util->plugins_url('animateimage-options.js'), $deps, AUTO_ANIMATE_IMAGE_VER, true);
		echo "<script type='text/javascript'>/* <![CDATA[ */var post_id = {$this->options['post_id']};/* ]]> */</script>\n";
	}

	function register_styles() {
		wp_enqueue_style('animateimage-options', $this->util->plugins_url('animateimage-options.css'), array('farbtastic', 'thickbox'), AUTO_ANIMATE_IMAGE_VER);
	}

	function options_page() {
?>
<div class="wrap">
	<?php screen_icon(); ?>
	<h2>Auto AnimateImage <?php $this->util->_e('Settings'); ?></h2>
	<form method="post" action="options.php" name="form" novalidate>
	<?php settings_fields( $this->option_group ); ?>
		<div id="poststuff" class="metabox-holder">
		<?php
				wp_nonce_field( 'meta-box-order', 'meta-box-order-nonce', false );
				wp_nonce_field( 'closedpostboxes', 'closedpostboxesnonce', false );
				do_meta_boxes( $this->settings_page_type, 'normal', null );
		?>
		</div>
		<p class="submit">
			<input type="submit" class="button-primary" value="<?php $this->util->_e('Save Changes') ?>" />
			<input type="submit" class="button-primary" value="<?php $this->util->_e('Reset') ?>" name="reset" />
		</p>
	</form>
</div>
<?php
	}

	function general_metabox() {
?>
<table class="form-table">
	<tr>
		<th scope="row"><?php $this->util->_e('AnimateImage Script'); ?></th>
		<td>
			<label class="item"><input type="radio" name="auto-animateimage[script_place]" value="header"<?php $this->util->checked($this->options['script_place'], 'header'); ?> />
			<?php $this->util->_e('Header'); ?></label>
			<label class="item"><input type="radio" name="auto-animateimage[script_place]" value="footer"<?php $this->util->checked($this->options['script_place'], 'footer'); ?> />
			<?php $this->util->_e('Footer'); ?></label>
		</td>
	</tr>
</table>
<?php
	}

	function options_metabox() {
?>
<table class="form-table">
	<tr>
		<th scope="row"><?php $this->util->_e('Animation Delay'); ?></th>
		<td>
			<input type="number" min="0" name="auto-animateimage[options.delay]" value="<?php echo $this->options['options.delay']; ?>" class="small-text" /> ms
		</td>
	</tr>
	<tr>
		<th scope="row"><?php $this->util->_e('Delay between Animation Cycles'); ?></th>
		<td>
			<input type="number" min="0" name="auto-animateimage[options.cycleDelay]" value="<?php echo $this->options['options.cycleDelay']; ?>" class="small-text" /> ms
		</td>
	</tr>
	<tr>
		<th scope="row"><?php $this->util->_e('Repeat Count'); ?></th>
		<td>
			<input type="number" min="-1" name="auto-animateimage[options.repeat]" value="<?php echo $this->options['options.repeat']; ?>" onchange="onRepeatChange(this)" class="small-text" />
			<label class="boundary"><input type="checkbox" name="auto-animateimage[options.repeat]" value="-1"<?php $this->util->checked($this->options['options.repeat'], '-1'); ?> />
			<?php $this->util->_e('Infinite Iteration'); ?></label>
		</td>
	</tr>
	<tr>
		<th scope="row"><?php $this->util->_e('Rewind at the End of Animation'); ?></th>
		<td>
			<select name="auto-animateimage[options.rewind]">
				<option value="true"<?php selected($this->options['options.rewind'], 'true'); ?>>true</option>
				<option value="false"<?php selected($this->options['options.rewind'], 'false'); ?>>false</option>
			</select>
		</td>
	</tr>
	<tr>
		<th scope="row"><?php $this->util->_e('Pause at First Image'); ?></th>
		<td>
			<select name="auto-animateimage[options.pauseAtFirst]">
				<option value="true"<?php selected($this->options['options.pauseAtFirst'], 'true'); ?>>true</option>
				<option value="false"<?php selected($this->options['options.pauseAtFirst'], 'false'); ?>>false</option>
			</select>
		</td>
	</tr>
	<tr>
		<th scope="row"><?php $this->util->_e('Pause at Last Image'); ?></th>
		<td>
			<select name="auto-animateimage[options.pauseAtLast]">
				<option value="true"<?php selected($this->options['options.pauseAtLast'], 'true'); ?>>true</option>
				<option value="false"<?php selected($this->options['options.pauseAtLast'], 'false'); ?>>false</option>
			</select>
		</td>
	</tr>
	<tr>
		<th scope="row"><?php $this->util->_e('Show Blank Image between Animation Cycles'); ?></th>
		<td>
			<select name="auto-animateimage[options.showBlank]">
				<option value="true"<?php selected($this->options['options.showBlank'], 'true'); ?>>true</option>
				<option value="false"<?php selected($this->options['options.showBlank'], 'false'); ?>>false</option>
			</select>
		</td>
	</tr>
	<tr>
		<th scope="row"><?php $this->util->_e('Stretch Blank Image to the Size of Last Image'); ?></th>
		<td>
			<select name="auto-animateimage[options.stretchBlank]">
				<option value="true"<?php selected($this->options['options.stretchBlank'], 'true'); ?>>true</option>
				<option value="false"<?php selected($this->options['options.stretchBlank'], 'false'); ?>>false</option>
			</select>
		</td>
	</tr>
	<tr>
		<th scope="row"><?php $this->util->_e('Output img Elements when Using JavaScript Code'); ?></th>
		<td>
			<select name="auto-animateimage[options.output]">
				<option value="true"<?php selected($this->options['options.output'], 'true'); ?>>true</option>
				<option value="false"<?php selected($this->options['options.output'], 'false'); ?>>false</option>
			</select>
		</td>
	</tr>
	<tr>
		<th scope="row"><?php $this->util->_e('Class Name'); ?> (<?php $this->util->_e('Animated Images'); ?>)</th>
		<td>
			<input type="text" name="auto-animateimage[options.className]" value="<?php echo $this->options['options.className']; ?>" />
		</td>
	</tr>
	<tr>
		<th scope="row"><?php $this->util->_e('Class Name'); ?> (<?php $this->util->_e('Blank Image'); ?>)</th>
		<td>
			<input type="text" name="auto-animateimage[options.blankClassName]" value="<?php echo $this->options['options.blankClassName']; ?>" />
		</td>
	</tr>
	<tr>
		<th scope="row"><?php $this->util->_e('File Path'); ?> (<?php $this->util->_e('Blank Image'); ?>)</th>
		<td>
			<input type="text" name="auto-animateimage[options.blankPath]" value="<?php echo $this->options['options.blankPath']; ?>" class="regular-text" />
			<input type="button" class="media-uploader button" value="<?php $this->util->_e('Select a File', 'Select File'); ?>" />
		</td>
	</tr>
</table>
<?php
	}

	function anim_styles_metabox() {
		$this->styles_metabox('anim.');
	}

	function blank_styles_metabox() {
		$this->styles_metabox('blank.');
	}

	function styles_metabox($prefix) {
?>
<table class="form-table">
	<tr>
		<th scope="row"><a href="<?php $this->util->_e('https://developer.mozilla.org/en/CSS/background-color'); ?>" target="_blank"><?php $this->util->_e('Background Color'); ?></a></th>
		<td>
			<input type="text" class="colortext" name="auto-animateimage[<?php echo $prefix; ?>background-color]" value="<?php echo $this->options["{$prefix}background-color"]; ?>" />
			<a href="#" class="pickcolor colorpreview hide-if-no-js"></a>
			<input type="button" class="pickcolor button hide-if-no-js" value="<?php $this->util->_e('Select a Color', 'Select a color'); ?>" />
			<br /><div class="colorpicker"></div>
		</td>
	</tr>
	<tr>
		<th scope="row"><a href="<?php $this->util->_e('https://developer.mozilla.org/en/CSS/margin'); ?>" target="_blank"><?php $this->util->_e('Margin'); ?></a></th>
		<td>
			<input type="number" min="0" name="auto-animateimage[<?php echo $prefix; ?>margin]" value="<?php echo $this->options["{$prefix}margin"]; ?>" class="small-text" /> px
		</td>
	</tr>
	<tr>
		<th scope="row"><a href="<?php $this->util->_e('https://developer.mozilla.org/en/CSS/padding'); ?>" target="_blank"><?php $this->util->_e('Padding'); ?></a></th>
		<td>
			<input type="number" min="0" name="auto-animateimage[<?php echo $prefix; ?>padding]" value="<?php echo $this->options["{$prefix}padding"]; ?>" class="small-text" /> px
		</td>
	</tr>
	<tr>
		<th scope="row"><a href="<?php $this->util->_e('https://developer.mozilla.org/en/CSS/border'); ?>" target="_blank"><?php $this->util->_e('Border'); ?></a></th>
		<td>
			<input type="number" min="0" name="auto-animateimage[<?php echo $prefix; ?>border-width]" value="<?php echo $this->options["{$prefix}border-width"]; ?>" class="small-text" /> px
			<select name="auto-animateimage[<?php echo $prefix; ?>border-style]" style="margin:1px 3px">
				<?php $this->border_style_listbox('anim.border-style'); ?>
			</select>
			<input type="text" class="colortext" name="auto-animateimage[<?php echo $prefix; ?>border-color]" value="<?php echo $this->options["{$prefix}border-color"]; ?>" />
			<a href="#" class="pickcolor colorpreview hide-if-no-js"></a>
			<input type="button" class="pickcolor button hide-if-no-js" value="<?php $this->util->_e('Select a Color', 'Select a color'); ?>" />
			<br /><div class="colorpicker"></div>
		</td>
	</tr>
	<tr>
		<th scope="row"><a href="<?php $this->util->_e('https://developer.mozilla.org/en/CSS/border-radius'); ?>" target="_blank"><?php $this->util->_e('Border Radius'); ?></a></th>
		<td>
			<input type="number" min="0" name="auto-animateimage[<?php echo $prefix; ?>border-radius]" value="<?php echo $this->options["{$prefix}border-radius"]; ?>" class="small-text" /> px
		</td>
	</tr>
	<tr>
		<th scope="row"><a href="<?php $this->util->_e('https://developer.mozilla.org/en/CSS/opacity'); ?>" target="_blank"><?php $this->util->_e('Opacity'); ?></a></th>
		<td class="slider">
			<input type="number" min="0" max="1" step="0.05" name="auto-animateimage[<?php echo $prefix; ?>opacity]" value="<?php echo $this->options["{$prefix}opacity"]; ?>" class="small-text" />
			<?php if ($this->has_slider): ?>
				<label class="opacity-trans"><?php $this->util->_e('Transparent'); ?></label>
				<div class="opacity-slider"></div>
				<label class="opacity-opaque"><?php $this->util->_e('Opaque'); ?></label>
			<?php else: ?>
				<span>[0 - 1]</span>
			<?php endif; ?>
			<div style="clear:both"></div>
		</td>
	</tr>
	<tr>
		<th scope="row"><a href="<?php $this->util->_e('https://developer.mozilla.org/en/CSS/box-shadow'); ?>" target="_blank"><?php $this->util->_e('Box Shadow'); ?></a></th>
		<td>
			<input type="text" name="auto-animateimage[<?php echo $prefix; ?>box-shadow]" value="<?php echo $this->options["{$prefix}box-shadow"]; ?>" class="regular-text" />
		</td>
	</tr>
	<tr>
		<th scope="row"><a href="<?php $this->util->_e('https://developer.mozilla.org/en/CSS/width'); ?>" target="_blank"><?php $this->util->_e('Width'); ?></a> / <a href="<?php $this->util->_e('https://developer.mozilla.org/en/CSS/height'); ?>" target="_blank"><?php $this->util->_e('Height'); ?></a></th>
		<td>
			<label class="item"><?php $this->util->_e('Width'); ?>
			<input type="number" min="0" step="10" name="auto-animateimage[<?php echo $prefix; ?>width]" value="<?php echo $this->options["{$prefix}width"]; ?>" class="small-text" /> px</label>
			<label class="item boundary"><?php $this->util->_e('Height'); ?>
			<input type="number" min="0" step="10" name="auto-animateimage[<?php echo $prefix; ?>height]" value="<?php echo $this->options["{$prefix}height"]; ?>" class="small-text" /> px</label>
		</td>
	</tr>
	<tr>
		<th scope="row"><a href="<?php $this->util->_e('https://developer.mozilla.org/en/CSS/max-width'); ?>" target="_blank"><?php $this->util->_e('Max Width'); ?></a> / <a href="<?php $this->util->_e('https://developer.mozilla.org/en/CSS/max-height'); ?>" target="_blank"><?php $this->util->_e('Max Height'); ?></a></th>
		<td>
			<label class="item"><?php $this->util->_e('Width'); ?>
			<input type="number" min="0" step="10" name="auto-animateimage[<?php echo $prefix; ?>max-width]" value="<?php echo $this->options["{$prefix}max-width"]; ?>" class="small-text" /> px</label>
			<label class="item boundary"><?php $this->util->_e('Height'); ?>
			<input type="number" min="0" step="10" name="auto-animateimage[<?php echo $prefix; ?>max-height]" value="<?php echo $this->options["{$prefix}max-height"]; ?>" class="small-text" /> px</label>
		</td>
	</tr>
	<tr>
		<th scope="row"><a href="<?php $this->util->_e('https://developer.mozilla.org/en/CSS/min-width'); ?>" target="_blank"><?php $this->util->_e('Min Width'); ?></a> / <a href="<?php $this->util->_e('https://developer.mozilla.org/en/CSS/min-height'); ?>" target="_blank"><?php $this->util->_e('Min Height'); ?></a></th>
		<td>
			<label class="item"><?php $this->util->_e('Width'); ?>
			<input type="number" min="0" step="10" name="auto-animateimage[<?php echo $prefix; ?>min-width]" value="<?php echo $this->options["{$prefix}min-width"]; ?>" class="small-text" /> px</label>
			<label class="item boundary"><?php $this->util->_e('Height'); ?>
			<input type="number" min="0" step="10" name="auto-animateimage[<?php echo $prefix; ?>min-height]" value="<?php echo $this->options["{$prefix}min-height"]; ?>" class="small-text" /> px</label>
		</td>
	</tr>
</table>
<?php
	}

	function border_style_listbox($name) {
		foreach(array('none', 'dotted', 'dashed', 'solid', 'double', 'groove', 'ridge', 'inset', 'outset') as $value) {
			echo "<option value='{$value}'";
			selected($this->options[$name], $value);
			echo ">{$value}</option>";
		}
	}

	function about_metabox() {
?>
<ul class="about">
	<li class="wp"><a href="<?php $this->util->_e('http://attosoft.info/en/'); ?>blog/auto-animateimage/" target="_blank"><?php $this->util->_e('Visit plugin site', 'Visit plugin homepage'); ?></a></li>
	<li class="star"><a href="http://wordpress.org/extend/plugins/auto-animateimage/" target="_blank"><?php $this->util->_e('Put rating stars or vote compatibility (works/broken)'); ?></a></li>
	<li class="forum"><a href="http://wordpress.org/support/plugin/auto-animateimage" target="_blank"><?php $this->util->_e('View support forum or post a new topic'); ?></a></li>
	<li class="l10n"><a href="http://wordpress.org/extend/plugins/auto-animateimage/other_notes/#Localization" target="_blank"><?php $this->util->_e('Translate the plugin into your language'); ?></a></li>
	<li class="donate"><a href="<?php $this->util->_e('http://attosoft.info/en/'); ?>donate/" target="_blank"><?php $this->util->_e('Donate to support plugin development'); ?></a></li>
	<li class="contact"><a href="<?php $this->util->_e('http://attosoft.info/en/'); ?>contact/" target="_blank"><?php $this->util->_e('Contact me if you have any feedback'); ?></a></li>
</ul>
<?php
	}

	var $util;
	var $options, $options_def;
	var $has_slider;
	var $settings_page_type = 'settings_page_auto-animateimage';
	var $option_group = 'auto-animateimage-options';

	function Animate_Image_Options(&$core) {
		$this->__construct($core); // for PHP4
	}

	function __construct(&$core) {
		$this->util = &$core->util;
		$this->options_def = &$core->options_def;
		$this->options = &$core->options;

		add_action('admin_menu', array(&$this, 'register_options_page'));
		add_action('admin_init', array(&$this, 'register_options'));
		add_action('admin_print_scripts-' . $this->settings_page_type, array(&$this, 'register_scripts'));
		add_action('admin_print_styles-' . $this->settings_page_type, array(&$this, 'register_styles'));
	}

	function register_options() {
		register_setting( $this->option_group, 'auto-animateimage', array(&$this, 'options_callback') );
	}

	function options_callback($options) {
		if (isset($_POST['reset'])) {
			add_settings_error('general', 'settings_updated', $this->util->__('Settings reset.'), 'updated');
			return $this->options_def;
		}
		return $options;
	}
} # class Animate_Image_Options

?>