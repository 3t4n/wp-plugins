<?php
/**
 * Plugin Name: High Contrast Admin
 *
 * Description: Adds admin color schemes for the visually impaired.
 *
 * This plugin does not make any permanent changes.
 *
 * Plugin URI: http://www.miqrogroove.com/pro/software/
 * Author URI: http://www.miqrogroove.com/
 *
 * @author: Robert Chapin
 * @version: 1.1.2
 * @copyright Copyright © 2017 by Robert Chapin
 * @license GPL
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
 
/* Plugin Bootup */

if (!function_exists('add_action')) {
    header('HTTP/1.0 403 Forbidden');
    exit("Not allowed to run this file directly.");
}
add_action('admin_init', 'miqro_high_contrast_admin', 10, 0);
add_action('login_head', 'miqro_high_contrast_login', 10, 0);


/* Plugin Functions */

/**
 * Registers the new color scheme.
 */
function miqro_high_contrast_admin() {
	$anti_cache = '?css=2'; // Increment on any CSS revision.

    $key = 'high_contrast';
	$name = 'High Contrast';
	$url = plugins_url( 'default42.css', __FILE__ ) . $anti_cache;
	$colors = array( '#222', '#FFF', '#000', '#0073aa' );

	wp_admin_css_color( $key, $name, $url, $colors );

    $key = 'high_white';
	$name = 'High Contrast White';
	$url = plugins_url( 'white42.css', __FILE__ ) . $anti_cache;
	$colors = array( '#F0F0F0', '#FFF', '#000', '#04a4cc' );

	wp_admin_css_color( $key, $name, $url, $colors );
}

/**
 * Tested and working on 3.1 through 4.8.
 * Corrects login.css or wp-admin.css.
 */
function miqro_high_contrast_login() {
?>
<style type="text/css">
.login form .input,
.login input[type="text"],
.login input[type="checkbox"] {
    border-color: #000;
}
</style>
<?php
}
?>