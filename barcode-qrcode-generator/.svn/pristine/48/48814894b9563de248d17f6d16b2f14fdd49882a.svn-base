<?php
/*
Plugin Name: Barcode QRcode Generator
Plugin URI: http://www.cmswp.jp/plugins/barcode_qrcode_generator/
Description: This plugin adds the functionality to output barcodes and qrcodes by use of the shortcodes.
Author: Hiroaki Miyashita
Author URI: http://www.cmswp.jp/
Version: 1.0.1
Text Domain: barcode-qrcode-generator
Domain Path: /
*/

/*  Copyright 2014 - 2018 Hiroaki Miyashita

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
	Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

class barcode_qrcode_generator {

	function __construct() {
		add_shortcode( 'barcode', array(&$this, 'barcode_qrcode_generator_barcode_add_shortcode') );
		add_shortcode( 'qrcode', array(&$this, 'barcode_qrcode_generator_qrcode_add_shortcode') );
	}
		
	function barcode_qrcode_generator_barcode_add_shortcode($attr) {
		$uploads = wp_upload_dir();

		extract(shortcode_atts(array(
			'text'     => '',
			'type'     => "ean13",
			'imgtype'  => 'png',
			'height'   => 60,
			'width'    => 1,
			'showtext' => 1,
			'rotation' => 0,
			'transparency' => 0,
			'remake'       => 0,
			'textfilename' => 0
		), $attr));
		
		if ( empty($text) ) return;
		
		if ( $showtext === 'false' ) $showtext = false;
		$showtext = (bool) $showtext;
		if ( $transparency === 'false' ) $transparency = false;
		$transparency = (bool) $transparency;

		if ( $textfilename ) $filename = $text.'.'.$imgtype;
		else $filename = sha1($text.$type.$imgtype.$height.$width.$showtext.$rotation.$transparency).'.'.$imgtype;
		
		if ( file_exists($uploads['basedir'].'/'.$filename) && empty($remake) )
			return '<img src="'.esc_attr($uploads['baseurl'].'/'.$filename).'" height="'.esc_attr($height).'" alt="'.esc_attr($text).'" />';
		
		$inc =  ini_get('include_path');
		ini_set('include_path', $inc.':'.dirname(__FILE__));
		
		require_once('Image/Barcode2.php');
		$code = new Image_Barcode2();
		$img = $code->draw($text, $type, $imgtype, false, $height-20, $width, $showtext, $rotation);
		if ( !empty($transpacenry) ) imagecolortransparent($img, imagecolorallocate($img, 255, 255, 255));
		
		switch ( $imgtype ) :
			case 'gif' : imagegif($img, $uploads['basedir'].'/'.$filename); break;
			case 'jpg' : imagejpeg($img, $uploads['basedir'].'/'.$filename); break;
			case 'png' : imagepng($img, $uploads['basedir'].'/'.$filename); break;
		endswitch;
		
		imagedestroy($img);
		
		return '<img src="'.esc_attr($uploads['baseurl'].'/'.$filename).'" height="'.esc_attr($height).'" alt="'.esc_attr($text).'" />';
	}

	function barcode_qrcode_generator_qrcode_add_shortcode($attr) {
		$uploads = wp_upload_dir();

		extract(shortcode_atts(array(
			'text'     => '',
			'eclevel'  => 3,
			'height'   => 60,
			'width'    => 60,
			'transparency' => 0,
			'remake'   => 0,
			'textfilename' => 0
		), $attr));
		
		if ( empty($text) ) return;

		if ( $textfilename ) $filename = $text.'.png';
		else $filename = sha1($text.$eclevel.$height.$width.$transparency).'.png';

		if ( file_exists($uploads['basedir'].'/'.$filename) && empty($remake) )
			return '<img src="'.esc_attr($uploads['baseurl'].'/'.$filename).'" height="'.esc_attr($height).'" width="'.esc_attr($width).'" alt="'.esc_attr($text).'" />';

		require_once('phpqrcode.php');
		
		QRcode::png($text, $uploads['basedir'].'/'.$filename, 3, 3, 4, false, 0xFFFFFF, 0x000000, $height, $width, $transparency);

		return '<img src="'.esc_attr($uploads['baseurl'].'/'.$filename).'" height="'.esc_attr($height).'" width="'.esc_attr($width).'" alt="'.esc_attr($text).'" />';
	}
}
$barcode_qrcode_generator = new barcode_qrcode_generator();
?>