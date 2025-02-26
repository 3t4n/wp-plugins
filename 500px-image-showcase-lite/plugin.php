<?php

/*
  Plugin Name: 500px Image Showcase Lite
  Plugin URI: http://extend.inceptive.gr/500px-image-showcase-lite/
  Description: Image showcase from 500px photography community. This lite version of 500px Image Showcase does not include the full set of features that are available in the premium version. To see all the features available in the premium versions, check our <a target="_blank" href="http://extend.inceptive.gr/500px-image-showcase/">extensions website</a>.
  Version: 1.1
  Author: Inceptive Design Labs
  Author URI: http://www.inceptive.gr
  Author Email: extend@inceptive.gr
  License: GPL v2

  Copyright 2012 Inceptive Design Labs (extend@inceptive.gr)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

class Inceptive500pxImageShowcase {
	/* -------------------------------------------------- */
	/* Private variables
	  /*-------------------------------------------------- */

	private $consumerKey_500px;

	/* -------------------------------------------------- */
	/* Constructor
	  /*-------------------------------------------------- */

	public function __construct() {
				
		$options = get_option( 'plugin_options' ); 
		$this->consumerKey_500px = $options['consumerkey'];
		
		load_plugin_textdomain('Inceptive500pxImageShowcase-locale', false, plugin_dir_path(__FILE__) . '/lang/');
		
		//Admin options
		require_once( plugin_dir_path(__FILE__) . 'plugin-options.php' );
		
		//Shortcode
		require_once( plugin_dir_path(__FILE__) . 'plugin-shortcode.php' );
		new Inceptive500pxImageShowcaseShortcode($this->consumerKey_500px);
		
		//Widget
		require_once( plugin_dir_path(__FILE__) . 'plugin-widget.php' );
		add_action('widgets_init', create_function('', 'register_widget("Inceptive500pxImageShowcaseWidget");'));
	}

}

new Inceptive500pxImageShowcase();