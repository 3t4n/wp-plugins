<?php
/*
Plugin Name: Auto AnimateImage
Plugin URI: http://attosoft.info/en/blog/auto-animateimage/
Description: Automatically applies AnimateImage script to your site. AnimateImage displays multiple images continuously like animated GIF. All you have to do is write img elements, and the images will be animated automatically.
Version: 0.6
Author: attosoft
Author URI: http://attosoft.info/en/
License: GPL 2.0
Text Domain: animateimage
Domain Path: /languages
*/

/*	Copyright 2012 attosoft (contact@attosoft.info)

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

define('AUTO_ANIMATE_IMAGE_VER', '0.6');

class Animate_Image {

	/**
	 * scripts()
	 *
	 * @return void
	 **/
	function scripts() {
		$in_footer = $this->options['script_place'] == 'footer';
		wp_enqueue_script('animate-image', $this->util->plugins_url('animate-image.min.js'), false, AUTO_ANIMATE_IMAGE_VER, $in_footer);
	}

	function print_resources() {
		echo '<!-- Auto AnimateImage by attosoft (' . $this->util->__('http://attosoft.info/en/') . ') -->' . "\n";
		$this->custom_scripts();
		$this->custom_styles();
	}

	var $js_options = array('delay', 'cycleDelay', 'repeat', 'rewind',
		'pauseAtFirst', 'pauseAtLast', 'showBlank', 'stretchBlank', 'output', 'className', 'blankClassName');

	function custom_scripts() {
		$script = '';

		foreach ($this->js_options as $option) {
			if ( $this->is_default_options('options.' . $option) )
				continue;

			$value = $this->options['options.' . $option];
			if ( is_numeric($value) || $value == 'true' || $value == 'false' )
				$script .= "AnimateImage.options.{$option} = {$value};\n";
			else
				$script .= "AnimateImage.options.{$option} = '{$value}';\n";
		}

		if ( $this->options['options.blankPath'] )
			$script .= "AnimateImage.options.blankPath = '{$this->options['options.blankPath']}';\n";

		if ($script)
			echo "<script type='text/javascript'>\n/* <![CDATA[ */\n{$script}/* ]]> */\n</script>\n";
	}

	function custom_styles() {
		$style = '';

		$style_ = $this->_custom_styles('anim.');
		$className = 'img.' . $this->options['options.className'];
		if ( $style_ )
			$style .= "{$className} {\n{$style_}}\n";

		$style_ = $this->_custom_styles('blank.');
		$className .= '.' . $this->options['options.blankClassName'];
		if ( $style_ )
			$style .= "{$className} {\n{$style_}}\n";

		if ( $style )
			echo "<style type='text/css'>\n{$style}</style>\n";
	}

	function _custom_styles($prefix) {
		$style = '';

		if ( !$this->is_default_options($prefix . 'background-color') )
			$style .= "\t" . "background-color: {$this->options[$prefix . 'background-color']};\n";

		if ( !$this->is_default_options($prefix . 'margin') )
			$style .= "\t" . "margin: {$this->options[$prefix . 'margin']}px;\n";
		if ( !$this->is_default_options($prefix . 'padding') )
			$style .= "\t" . "padding: {$this->options[$prefix . 'padding']}px;\n";

		if ( !$this->is_default_options($prefix . 'border-width') )
			$style .= "\t" . "border-width: {$this->options[$prefix . 'border-width']}px;\n";
		if ( !$this->is_default_options($prefix . 'border-style') )
			$style .= "\t" . "border-style: {$this->options[$prefix . 'border-style']};\n";
		if ( !$this->is_default_options($prefix . 'border-color') )
			$style .= "\t" . "border-color: {$this->options[$prefix . 'border-color']};\n";

		if ( !$this->is_default_options($prefix . 'border-radius') ) {
			$val = $this->options[$prefix . 'border-radius'];
			$style .= "\t" . "-moz-border-radius: {$val}px; -webkit-border-radius: {$val}px; -khtml-border-radius: {$val}px; border-radius: {$val}px;\n";
		}
		if ( !$this->is_default_options($prefix . 'opacity') ) {
			$val = $this->options[$prefix . 'opacity'];
			$val_100 = $val * 100;
			$style .= "\t" . "-ms-filter: \"progid:DXImageTransform.Microsoft.Alpha(Opacity={$val_100})\"; filter: alpha(opacity={$val_100}); -moz-opacity: {$val}; opacity: {$val};\n";
		}
		if ( !$this->is_default_options($prefix . 'box-shadow') ) {
			$val = $this->options[$prefix . 'box-shadow'];
			$style .= "\t" . "-moz-box-shadow: {$val}; -webkit-box-shadow: {$val}; -khtml-box-shadow: {$val}; box-shadow: {$val};\n";
		}

		if ( !$this->is_default_options($prefix . 'width') )
			$style .= "\t" . "width: {$this->options[$prefix . 'width']}px;\n";
		if ( !$this->is_default_options($prefix . 'height') )
			$style .= "\t" . "height: {$this->options[$prefix . 'height']}px;\n";
		if ( !$this->is_default_options($prefix . 'max-width') )
			$style .= "\t" . "max-width: {$this->options[$prefix . 'max-width']}px;\n";
		if ( !$this->is_default_options($prefix . 'max-height') )
			$style .= "\t" . "max-height: {$this->options[$prefix . 'max-height']}px;\n";
		if ( !$this->is_default_options($prefix . 'min-width') )
			$style .= "\t" . "min-width: {$this->options[$prefix . 'min-width']}px;\n";
		if ( !$this->is_default_options($prefix . 'min-height') )
			$style .= "\t" . "min-height: {$this->options[$prefix . 'min-height']}px;\n";

		return $style;
	}

	function is_default_options($names) {
		if (!is_array($names))
			return $this->options[$names] == $this->options_def[$names];

		foreach ($names as $name) {
			if ($this->options[$name] != $this->options_def[$name])
				return false;
		}
		return true;
	}

	function add_animate_image_action_links($links, $file) {
		if ( $file == plugin_basename(__FILE__) )
			$links[] = '<a href="options-general.php?page=auto-animateimage">' . $this->util->__('Settings') . '</a>';
		return $links;
	}

	// Additional links on the Plugins page
	function add_animate_image_links($links, $file) {
		if ( $file == plugin_basename(__FILE__) ) {
			$links[] = '<a href="plugin-install.php?tab=plugin-information&plugin=auto-animateimage&TB_iframe" class="thickbox" title="Auto AnimateImage">' . $this->util->__('Show Details', 'Details') . '</a>';
			$links[] = '<a href="http://wordpress.org/support/plugin/auto-animateimage/" target="_blank">' . $this->util->__('Support') . '</a>';
			$links[] = '<a href="' . $this->util->__('http://attosoft.info/en/') . 'contact/" target="_blank">' . ucfirst($this->util->__('Contact', 'contact')) . '</a>';
			$links[] = '<a href="' . $this->util->__('http://attosoft.info/en/') . 'donate/" target="_blank">' . $this->util->__('Donate') . '</a>';
		}
		return $links;
	}

	var $options, $options_def;
	var $util;

	function Animate_Image() {
		$this->__construct(); // for PHP4
	}

	function __construct() {
		load_plugin_textdomain('animateimage', false, 'auto-animateimage/languages');

		if (require_once dirname(__FILE__) . '/animateimage-utils.php')
			$this->util = new Animate_Image_Utils();
		$this->init_options();

		if ( is_admin() ) {
			if (include_once dirname(__FILE__) . '/animateimage-options.php')
				new Animate_Image_Options($this);
			add_filter('plugin_action_links', array(&$this, 'add_animate_image_action_links'), 10, 2);
			add_filter('plugin_row_meta', array(&$this, 'add_animate_image_links'), 10, 2);
		} else {
			add_action('wp_print_scripts', array(&$this, 'scripts'));

			$res_hook = $this->options['script_place'] == 'header' ? 'wp_head' : 'wp_footer';
			add_action($res_hook, array(&$this, 'print_resources'), 20);
		}
	}

	function init_options() {
		$this->options_def = array(
			'script_place' => 'header',
			'post_id' => '0', // for Media Uploader

			'options.delay' => '500',
			'options.repeat' => '-1',
			'options.rewind' => 'false',
			'options.pauseAtFirst' => 'false',
			'options.pauseAtLast' => 'false',
			'options.showBlank' => 'false',
			'options.stretchBlank' => 'true',
			'options.cycleDelay' => '0',
			'options.className' => 'animation',
			'options.blankClassName' => 'blank',
			'options.blankPath' => $this->util->plugins_url('images/blank.gif'),
			'options.output' => 'true',

			'anim.max-height' => '',
			'anim.min-width' => '0',
			'anim.min-height' => '0',
			'anim.background-color' => 'transparent',
			'anim.margin' => '0',
			'anim.padding' => '0',
			'anim.border-width' => '0',
			'anim.border-style' => 'none',
			'anim.border-color' => 'transparent',
			'anim.border-radius' => '0',
			'anim.opacity' => '1',
			'anim.box-shadow' => 'none',
			'anim.width' => '',
			'anim.height' => '',
			'anim.max-width' => '',

			'blank.max-height' => '',
			'blank.min-width' => '0',
			'blank.min-height' => '0',
			'blank.background-color' => 'transparent',
			'blank.margin' => '0',
			'blank.padding' => '0',
			'blank.border-width' => '0',
			'blank.border-style' => 'none',
			'blank.border-color' => 'transparent',
			'blank.border-radius' => '0',
			'blank.opacity' => '1',
			'blank.box-shadow' => 'none',
			'blank.width' => '',
			'blank.height' => '',
			'blank.max-width' => ''
		);
		$this->options = get_option('auto-animateimage');
		$this->options = $this->options ? wp_parse_args($this->options, $this->options_def) : $this->options_def;

		if ($this->is_default_options('post_id')) {
			$args = array(
				'post_status' => 'draft',
				'post_type' => 'auto-animateimage'
			);
			$posts = get_posts($args);
			if (count($posts))
				$this->options['post_id'] = $posts[0]->ID;
			else {
				$args['post_title'] = 'Auto AnimateImage';
				$this->options['post_id'] = wp_insert_post($args);
			}
			$updateOption = true;
		}
		// XXX: workaround for the issue that Media Uploader does not work in WordPress 3.3.3 or later
		if ( version_compare('3.3.3', get_bloginfo('version')) <= 0 ) {
			// @see http://core.trac.wordpress.org/changeset/21048/trunk/wp-admin/media-upload.php
			$this->options['post_id'] = 0;
		}
	}

} # class Animate_Image

add_action('init', 'init_Animate_Image');
function init_Animate_Image() {
	new Animate_Image();
}
?>