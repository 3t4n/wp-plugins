<?php
/*
Plugin Name: 17sai-kyou
Plugin URI: http://enginner.aistear.info
Description: It is a plug-in for 「17 sai kyou」
Version: 1.0
Author: S.Endoh(Mebius0)
Author URI: http://enginner.aistear.info
License: GPLv2
*/

/* 
Copyright (C) 2014 S.Endoh(Mebius0)

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
*/

// File Include
include_once( __DIR__ . '/17sai-admin.php' );
include_once( __DIR__ . '/17sai-functions.php' );


// Langage File
load_plugin_textdomain( '17sai', false, basename( dirname( __FILE__ ) ) . '/lang' );


// Add Meta Box
add_action( 'admin_init', 'age_display_box' );
function age_display_box() {
	add_meta_box( 'age_meta_box', __('Your age', '17sai' ), 'age_meta_box', 'dashboard', 'side' );
}
function age_meta_box() {
	$days = birthday_calculation();
	$display = 'Your age is %d Date and 17 years old.';
	// $display = 'あなたの年齢は17歳と%d日です。';
	$oioi = 'ヾ(ﾟДﾟ )oioi';
	// $oioi = 'ヾ(ﾟДﾟ )ｫｨｫｨ';
	echo sprintf( __( $display, '17sai' ), $days );
	echo '<br />';
	echo __( $oioi, '17sai' );
}
