<?php
/*
Plugin Name: Auto Copyright Year Updater
Plugin URI:  http://plugins.era-solutions.com
Description: Light weight automatic copyright year updater, by placing shortcode.
Version:     1.3
Author URI:  http://plugins.era-solutions.com
Author:      ERA Solutions
License:     GPL2
 
auto copyright year updater is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
auto copyright year updater is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with auto copyright year updater. If not, see http://www.gnu.org/licenses/gpl-2.0.html.
*/


/**
 * [year] 
 * 
 * shortcode
 *
 *  @return Current Year
 */
function cr_display_current_year() {
	$date = getdate();
	return $date['year'];
}

add_shortcode( 'cr_year', 'cr_display_current_year' );



/**
 * [cr_symbol] 
 * 
 * shortcode
 * 
 * @return the Copyright Symbol.
 */
function cr_display_copyright_symbol() {
	return '&copy;';
}

add_shortcode( 'cr_symbol', 'cr_display_copyright_symbol' );

?>