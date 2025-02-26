<?php
/*
Plugin Name: Avatar Preview
Description: Shows an avatar preview on the comment form.
Version: 1.1.3
Author: Xaquseg
Author URI: http://xaquseg.dswebhost.net
*/

/*  Copyright 2009-2010 Xaquseg (email : nightshadowz88@gmail.com)

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

wp_register_script('md5', get_option('siteurl') . '/wp-content/plugins/' . basename(dirname(__FILE__)) . '/javascript/md5.js', array(), "2.1");
wp_register_script('avatarpreview', get_option('siteurl') . '/wp-content/plugins/' . basename(dirname(__FILE__)) . '/javascript/avatarpreview.js', array('md5'), "1.1.3", true);
wp_localize_script('avatarpreview', 'avatarpreviewconf', array("rating" => strtolower(get_option('avatar_rating', 'g')), 
    "defaultav" => get_option('avatar_default', 'identicon')));

function avatarpreview_addjavascript() {
  if (is_user_logged_in() || !is_singular() || !comments_open()) return;
  wp_enqueue_script('avatarpreview');
}

add_action('wp_print_scripts', 'avatarpreview_addjavascript');

?>
