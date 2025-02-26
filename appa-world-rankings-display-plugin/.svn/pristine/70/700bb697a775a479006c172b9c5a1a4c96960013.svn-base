<?php
/**
 * Plugin Name: APPA World Rankings Display Plugin
 * Plugin URI: http://
 * Description: Display the APPA / PSP World Rankings for a given season.
 * Version: 1.0.0
 * Author: Joe Rieger / APPA LLC
 * Author URI: http://www.paintball-players.org
 * License: GPL2
 */
/*  Copyright 2013  Joe Rieger / APPA LLC (email : ids@paintball-players.org)

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

if ( !function_exists("appa_world_rankings_inject") ) {
	function appa_world_rankings_inject( $atts ) {

		extract ( shortcode_atts( array (
			'season'	=> date("Y"),
		), $atts ) );		

		if ( !preg_match("/^(\d+)$/", $season ) ) {
			$season = date("Y");
		}
		if ( $season < 2012 || $season > date("Y") ) {
			return "Sorry, we couldn't get the APPA / PSP World Rankings.";
		}

		$ranking_content = '';
		try {
			@$ranking_content = file_get_contents("http://www.paintball-players.org/modules/world_rankings/rankings${season}.html");
		} catch (Exception $ex ) {
			return "Sorry, we couldn't get the APPA / PSP World Rankings.";
		}
		if ( $ranking_content == '' ) { return "Sorry, we couldn't get the APPA / PSP World Rankings."; }

		return $ranking_content;
	}
}	

add_shortcode('appa_world_rankings','appa_world_rankings_inject');

?>
