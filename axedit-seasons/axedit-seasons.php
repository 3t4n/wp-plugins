<?php
/*
Plugin Name: WP Seasons
Plugin URI: http://www.axedit.fr/wordpress-seasons/
Description: WP Seasons is a simple plugin to automatically show specific text according to the season.
Version: 0.1.2
Author: Lawrence DAINES
Author URI: http://lawrence.daines.fr
License: GPL2
*/

/*  Copyright 2012  Lawrence DAINES  (email : ldaines@axedit.com)

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

include 'settings.php';

function axdtss_get_season() {

	$period = date('md');
	$spring = '0320';
	$summer = '0620';
	$fall   = '0922';
	$winter = '1221';

	if(($period > $spring) && ($period <= $summer)){
		return 'spring';
	}elseif (($period > $summer) && ($period <= $fall)){
		return 'summer';
	}elseif (($period > $fall) && ($period <= $winter)){
		return 'fall';
	}else{
		return 'winter';
	}
}

// Shortcode managment
function axdtss_season_handler () {
	$curseason = axdtss_get_season();
	$curseason = 'axdt_' . $curseason;
	$textseason = get_option($curseason);
	return $textseason;
}

add_shortcode( 'season', 'axdtss_season_handler' );

?>