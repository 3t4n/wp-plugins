<?php
/*
Plugin Name: ActiveLink
Plugin URI: http://henning.imaginemore.de/activelink/
Description: Easily set links to wikipedia definitions in multiple languages when creating or editing posts
Version: 0.1.0
Author: Henning Schaefer
Author URI: http://henning.imaginemore.de
*/

/*  Copyright 2007  Henning Schaefer  (email : henning.schaefer@gmail.com)

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
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

// Replace old plugins page
function al_parse_links($content) {
  $content = eregi_replace("{([a-z]+):([^}|]+)\|([^}]+)}([^ ]+)?","<a href='http://\\1.wikipedia.org/wiki/\\2' target='_blank'>\\3\\4</a>", $content);
  $content = eregi_replace("{([a-z]+):([^}]+)}([^ ]+)?","<a href='http://\\1.wikipedia.org/wiki/\\2' target='_blank'>\\2\\3</a>", $content);
  return $content;
}

add_filter('the_content', 'al_parse_links');
?>