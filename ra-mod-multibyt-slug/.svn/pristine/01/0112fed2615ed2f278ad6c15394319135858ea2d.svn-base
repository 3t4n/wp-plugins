<?php 
/*
Plugin Name: RA - Mod Multibyte Slug
Description: When the multi-byte character is used in slug of new creation post, it changes so that post_type and post_ID may be used.
Author: Rasin (skuraomoto)
Author URI: http://www.rains.jp/
Version: 1.0.4
License: GPLv2
Text Domain: rains-mmsn
Domain Path: /languages/
*/
/*
  Copyright 2013 Rains
  
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

$ra_mmsn_lang = dirname(plugin_basename(__FILE__)) . "/languages/";
load_plugin_textdomain("rains-mmsn", false, $ra_mmsn_lang);

function ra_modify_multibyte_slug_newpost($slug, $post_ID, $post_status, $post_type) {

  $target_status = array('draft', 'pending', 'auto-draft');
  $post_raw_status = get_post_status($post_ID);

  if(($post_status != '' && $post_raw_status == 'draft') || in_array($post_raw_status, $target_status)) {
      if(preg_match('/(%[0-9a-f]{2})+/', $slug)) {
          $slug = utf8_uri_encode($post_type) . '-' . $post_ID;
      }
  }

  return $slug;
  
}
add_filter('wp_unique_post_slug', 'ra_modify_multibyte_slug_newpost', 10, 4 );