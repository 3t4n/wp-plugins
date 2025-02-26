<?php
/*
Plugin Name: Add rel=nofollow
Plugin URI: http://aneeskA.com
Description: Add rel=nofollow Plugin is a wordpress plugin that inserts the HTML tag rel=nofollow on every &lt;a&gt; tag mentioned in the post.
Version: 0.1.1
Author: aneeskA, contact@aneeskA.com
Author URI: http://aneeskA.com
License: GPL2
*/

/*  Copyright 2012  aneeskA  (email : contact@aneeskA.com)

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
?><?php

// some definition we will use
define( 'EPT_PUGIN_NAME', 'Add rel=nofollow');
define( 'EPT_PLUGIN_DIRECTORY', 'add-relnofollow-to-links');
define( 'EPT_CURRENT_VERSION', '0.1.1' );
define( 'EPT_CURRENT_BUILD', '1.1' );
define( 'EPT_DEBUG', false);    # never use debug mode on productive systems


register_activation_hook(__FILE__, 'addrelnofollow_activate');
register_deactivation_hook(__FILE__, 'addrelnofollow_deactivate');
register_uninstall_hook(__FILE__, 'addrelnofollow_uninstall');

// activating the default values
function addrelnofollow_activate() {
  add_option('addrelnofollow_option_3', 'any_value');
}

// deactivating
function addrelnofollow_deactivate() {
  // needed for proper deletion of every option
  delete_option('eaddrelnofollow_option_3');
}

// uninstalling
function addrelnofollow_uninstall() {
  # delete all data stored
  delete_option('addrelnofollow_option_3');
}

add_filter ( 'wp_insert_post_data' , 'addrelnofollow_link', 99);
function addrelnofollow_link ( $post ) {
    $post = str_ireplace("<a href", "<a rel=\"nofollow\" href", $post);
    $post = str_ireplace("<a title", "<a rel=\"nofollow\" title", $post);
  return $post;
}
?>