<?php
/*
Plugin Name: Attention bar
Plugin URI: http://wordpress.org/extend/plugins/attention-bar/
Description: Creates a nice attention bar on top of your screen, without disturbing your users. NO annoying pop-ups or annoying user messages.
Version: 0.7.2.1
Author: Pascal Dreissen
Author URI: http://pascal.dreissen.nl
License: GPL2
*/
/*  Copyright 2011 Pascal Dreissen (email : pascal@dreissen.nl)

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
?>
<?php
require_once dirname(__FILE__) . '/admin/define.php';
require_once dirname(__FILE__) . '/admin/install/install.php';
require_once dirname(__FILE__) . '/admin/database.php';
require_once dirname(__FILE__) . '/admin/init.php';
require_once dirname(__FILE__) . '/admin/getcontent.php';
require_once dirname(__FILE__) . '/admin/widgets.php';
require_once dirname(__FILE__) . '/admin/forms.php';
require_once dirname(__FILE__) . '/admin/adminmenu.php';
require_once dirname(__FILE__) . '/admin/functions.php';

load_plugin_textdomain('attention-bar', false, dirname( plugin_basename( __FILE__ )) . '/languages/');

function nb_add_to_head() {
	if (get_option('pd_nb_inserttype', 'header') == 'header') {
		global $post;
		if(is_single() || is_page()) {
			$exclude = get_post_meta($post->ID,'pd_nb_metastatus',true);
			if(empty($exclude) || $exclude == 'true') {
				echo nb_get_content() . chr(13);
			}
		}else{
			echo nb_get_content() . chr(13);
		}
	}
}

if ( is_admin() ) {
add_action("admin_init", "nb_admin_init");
add_action('admin_menu', 'nb_init_admin_menu');
add_action('admin_notices','nb_admin_notices');
}
add_action("plugins_loaded", "nb_widget_init");
add_action('init', 'nb_init_scripts');
add_action('wp_print_styles', 'nb_init_stylesheets');
add_action('wp_head', 'nb_add_to_head');
?>
