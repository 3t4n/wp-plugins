<?php
/*
Plugin Name: WP MiniBar
Plugin URI: https://gitlab.com/CiaranG/wp-minibar
Description: Minimise the WordPress toolbar, in the front-end only.
Version: 1.0.5
Author: Ciaran Gultnieks
Author URI: http://ciarang.com
*/

/*  Copyright 2012-13 Ciaran Gultnieks (email : ciaran@ciarang.com)

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

// Plugin hooks/filters
add_action( 'init', 'wpminibar_init' );

function wpminibar_init()
{
	if (is_admin_bar_showing()) {
		wp_register_script('wpminibar', plugin_dir_url(__FILE__).'minibar.js', array('jquery'));
		wp_enqueue_script('jquery');
		wp_enqueue_script('wpminibar');
		add_action('wp_head', 'wpminibar_css', 100);
	}
}

function wpminibar_css()
{
	echo '<style type="text/css">#wpadminbar {top: -32px;} html {margin-top: 0px !important;} div#adminbar_tab {clear:both;text-align:center;background:transparent;width:38px;position:relative;top:0px;color:#000;font-size:12px;font-style:italic;background:#aaa;opacity:0.2;padding:4px;cursor:pointer;} div#adminbar_tab:hover {opacity:0.7;} </style>';
}


