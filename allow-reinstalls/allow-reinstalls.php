<?php 
/**
Plugin Name: allow-reinstalls
Plugin URI: https://www.oik-plugins.com/oik-plugins/allow-reinstalls
Description: Allow re-installation of plugins and themes by upload
Version: 0.0.5
Author: bobbingwide
Author URI: https://www.bobbingwide.com/about-bobbing-wide
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

    Copyright 2016-2023 Bobbing Wide (email : herb@bobbingwide.com )

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License version 2,
    as published by the Free Software Foundation.

    You may NOT assume that you can use any other version of the GPL.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    The license for this software can likely be found here:
    http://www.gnu.org/licenses/gpl-2.0.html

*/

/**
 * Filter the package options before running an update. 
 *
 * @since 4.3.0
 */
add_filter( "upgrader_package_options", "allow_reinstalls_upgrader_package_options" );

/**
 * Implement "upgrader_package_options" for allow-reinstalls
 *
 * See @link https://core.trac.wordpress.org/ticket/27754/ 
 * 
 * @param array $options {
 *     Options used by the upgrader. 
 * 
 *     @type string $package                     Package for update. 
 *     @type string $destination                 Update location. 
 *     @type bool   $clear_destination           Clear the destination resource. 
 *     @type bool   $clear_working               Clear the working resource. 
 *     @type bool   $abort_if_destination_exists Abort if the Destination directory exists. 
 *     @type bool   $is_multi                    Whether the upgrader is running multiple times. 
 *     @type array  $hook_extra                  Extra hook arguments. 
 * } 
 * @return array - updated with "abort_if_destination_exists" to false
 */
function allow_reinstalls_upgrader_package_options( $options ) {
	$options['abort_if_destination_exists'] = false;
	return( $options );
}