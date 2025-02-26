<?php
/*
Plugin Name: Silencesoft Protect RSS
Plugin URI: http://www.silencesoft.net
Description: A plugin to protect rss feeds to only registered users
Version: 1.0
Author: Byron Herrera
Author URI: http://byronh.axul.net

    Copyright 2010  Byron Herrera  (email : bh at axul dot net)

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

function sil_protect_rss() {
	global $wpdb;
  if (! is_feed()) return;
  if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="RSS Feeds"');
    header('HTTP/1.1 401 Unauthorized');
    echo 'This rss feeds requires authentication.';
    exit;
  } else {
    if (user_pass_ok($_SERVER['PHP_AUTH_USER'],$_SERVER['PHP_AUTH_PW'])) {
      //  can proceed normally
    } else {
      header('WWW-Authenticate: Basic realm="RSS Feeds"');
      header('HTTP/1.1 401 Unauthorized');
      echo 'Error on username or password.';
      exit;
    }
  }
}

add_action('pre_get_posts', 'sil_protect_rss');
