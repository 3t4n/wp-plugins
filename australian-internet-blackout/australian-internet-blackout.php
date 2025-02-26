<?php
/*
Plugin Name: Australian Internet Blackout
Plugin URI: http://leefe.ratestheworld.com.au/dev/wp-plugin/australian-internet-blackout/
Description: Adds the Australian Internet Blackout layer to your blog
Version: 1.0
Author: Leefe Hicks
Author URI: http://leefe.ratestheworld.com.au/
*/
?>
<?php
/*  Copyright 2010  Leefe Hicks  (email : leefe@tengutech.net)

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
?>
<?php
if ( !class_exists("AustralianInternetBlackout") ) {
    class AustralianInternetBlackout {
    
    	var $ver = "1.0";
    	var $aij_url = "http://www.internetblackout.com.au/ib/blackout.js";
    
        function AustralianInternetBlackout() { //constructor
        }
		
		function addHeaderCode() {
			echo("<!-- Australian Internet Blackout $this->ver -->\n");
        }
        
        function loadBlackoutScript() {
        	wp_enqueue_script( 'aus_i_blackout', $this->aij_url, array('jquery') );
        }
	}

} //End Class AustralianInternetBlackout

// Create instance of class
if ( class_exists("AustralianInternetBlackout") ) {
    $aus_i_blackout = new AustralianInternetBlackout();
}

// Load Blackout JavaScript
if ( ! is_admin() && isset($aus_i_blackout) ) {
	add_action( 'wp_head', array(&$aus_i_blackout, 'addHeaderCode') );
	add_action( 'init', array(&$aus_i_blackout, 'loadBlackoutScript') );
}