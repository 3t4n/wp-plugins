<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/*
Plugin Name: AZScore
Plugin URI: https://azscore.com/football/widget
Description: Add football livescores to your website - fully responsive with customizable fonts and colors and without any ads for free.
Version: 1.0.3
Author: azscore.com
Author URI: https://azscore.com
License: GPLv3

Copyright (C) 2024 azscore.com

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

include_once('src/Azscr_ThemeOptions.php');
include_once('src/renderer.php');

Azscr_ThemeOptions::get_instance();

add_shortcode( 'azscore', 'azscr_code' );
