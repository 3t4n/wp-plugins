<?php
/*
Plugin Name: AwesomePress - Font Awesome Icons for WordPress
Plugin URI: http://www.w3xperts.net/awesomepress
Description: Use the full Font Awesome icon set within WordPress. Use HTML or shortcode to insert your icons anywhere.
Version: 1.0
Author: Nazmul Hasan Rupok
Author URI: http://www.rupok.me
Credits:
    The Font Awesome icon set was created by Dave Gandy (dave@davegandy.com)
     http://fortawesome.github.com/Font-Awesome/
	Original Font Awesome plugin by Rachel Baker (rachel@rachelbaker.me)
     http://rachelbaker.me/font-awesome-icons-wordpress-plugins/
License:

  Copyright (C) 2013  Nazmul Hasan Rupok

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.

*/

class AwesomePress {
    public function __construct() {
        add_action( 'init', array( &$this, 'init' ) );
    }

    public function init() {
        add_action( 'wp_enqueue_scripts', array( $this, 'register_plugin_styles' ) );
        add_shortcode( 'icon', array( $this, 'setup_shortcode' ) );
        add_filter( 'widget_text', 'do_shortcode' );
    }

    public function register_plugin_styles() {
        global $wp_styles;
       
	    wp_enqueue_style( 'font-awesome-styles', plugins_url( 'assets/css/font-awesome.min.css', __FILE__  ) );
		wp_enqueue_style( 'font-awesome-corporate-styles', plugins_url( 'assets/css/font-awesome-corporate.css', __FILE__  ) );
        wp_enqueue_style( 'font-awesome-extended-styles', plugins_url( 'assets/css/font-awesome-extended.css', __FILE__  ) );
        wp_enqueue_style( 'font-awesome-social-styles', plugins_url( 'assets/css/font-awesome-social.css', __FILE__  ) );
        wp_enqueue_style( 'font-awesome-ie7', plugins_url( 'assets/css/font-awesome-ie7.min.css', __FILE__ ), array(), '1.0', 'all'  );
        $wp_styles->add_data( 'font-awesome-ie7', 'conditional', 'lte IE 7' );
    }

    public function setup_shortcode( $params ) {
        extract( shortcode_atts( array(
                    'name'  => 'icon-wrench'
                ), $params ) );
        $icon = '<i class="'.$name.'">&nbsp;</i>';

        return $icon;
    }

}

new AwesomePress();
