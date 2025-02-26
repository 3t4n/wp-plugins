<?php
/*
Plugin Name: Quran
Plugin URI: http://kutucape.com
Description: Display random quran alquran via widget
Version: 1.0
Author: M. Zayn Hamdan
Author URI: http://kutucape.com

Copyright 2008  quran  (email : zaynhamdan@gmail.com)

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

function quran_widget()  {
  print '<div id="quran-container">';
  print '<h2>Random Quran</h2>';
  print '<script type="text/javascript" src="http://kutucape.com/quran.php"></script>';
  print '</div>';
}

function init_quran() {
  register_sidebar_widget("Random Quran", "quran_widget");
}

add_action("plugins_loaded", "init_quran");
?>
