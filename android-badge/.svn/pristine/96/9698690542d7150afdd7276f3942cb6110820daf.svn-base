<?php
/*
Plugin Name: Android Badge
Plugin Script: android-badge.php
Description: Füge Informationen über Android Apps in Artikel und Seiten ein!
Version: 1.6
License: GPL
Author: AndroidHIT
Author URI: https://www.androidhit.de

=== RELEASE NOTES ===
2012-09-28 - v1.0 - first version
2012-10-07 - v1.2 - width / height option
2013-01-11 - v1.3 - badge without frame + more information
2013-01-11 - v1.4 - css + js included
2013-01-11 - v1.5 - fix errors
2015-09-11 - v1.6 - renamed
*/

/* 
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
Online: http://www.gnu.org/licenses/gpl.txt
*/
?><?php
add_shortcode("appbadge", "appbadge_handler");
function appbadge_handler($a) {
  $appid = $a[id];
  return '<script type="text/javascript" src="//www1.androidhit.de/embed?id='.$appid.'"></script>';
}
?>