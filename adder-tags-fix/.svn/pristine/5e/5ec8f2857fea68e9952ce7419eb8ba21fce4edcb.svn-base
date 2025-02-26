<?php
/*
Plugin Name: Adder Tags Fix
Plugin URI: http://www.poradnik-webmastera.com/projekty/adder_tags_fix/
Description: Adder uses ISO-8859-2 encoding for tags, instead of UTF-8. This plugin fixes this.
Author: Daniel Frużyński
Version: 1.0.4
Author URI: http://www.poradnik-webmastera.com/
License: GPL2
*/

/*  Copyright 2009,2011  Daniel Frużyński  (email : daniel [A-T] poradnik-webmastera.com)

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

/* DEBUG code */
//$_POST['tags_input'] = mb_convert_encoding( 'ace ąćę ace', 'iso-8859-2', 'utf-8' ); unset($_POST['tax_input']);
//$_POST['tax_input']['post_tag'] = mb_convert_encoding( 'ace ąćę ace', 'iso-8859-2', 'utf-8' );

if ( !function_exists( 'atf_fix_encoding' ) ) {
	mb_detect_order( array( 'utf-8', 'iso-8859-2' ) );
	
	function atf_fix_encoding( $str ) {
		$enc = mb_detect_encoding( $str, 'utf-8,iso-8859-2' );
		if ( strtolower( $enc ) == 'iso-8859-2' ) {
			$str = mb_convert_encoding( $str, 'utf-8', 'iso-8859-2' );
		}
		return $str;
	}
	
	if ( is_array( $_POST ) ) {
		if ( !empty( $_POST['tax_input'] ) && is_array( $_POST['tax_input'] ) && isset( $_POST['tax_input']['post_tag'] ) ) {
			$_POST['tax_input']['post_tag'] = atf_fix_encoding( $_POST['tax_input']['post_tag'] );
		} else if ( !empty( $_POST['tags_input'] ) ) {
			$_POST['tags_input_ori'] = $_POST['tags_input'];
			$_POST['tags_input'] = atf_fix_encoding( $_POST['tags_input'] );
		}
	}
}

?>