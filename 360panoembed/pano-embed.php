<?php
/*
Plugin Name: 360 Panorama Embed
Plugin URI: http://highedwebtech.com
Description: A shortcode to embed 360 Panoramas created by the 360 Panorama App from Occipital
Version: 0.3
Author: Mike Richwalsky
Author URI: http://highedwebtech.com

*/
/*  Copyright 2011  Mike Richwalsky  (email : mrichwalsky@gmail.com)

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

// Embed Codes look like this:  <script src="http://occipital.com/360/embed.js?pano=sS5Cpw&width=640&height=480"></script>
// This Function requres PHP 5
// Thanks to this blog post for help: http://themocracy.com/2010/03/a-flickr-badge-using-wordpress-shortcodes/


function pano_embed_shortcode($atts){
	$query_atts = shortcode_atts(
			array('pano'=>'AcXGwu',
				  'width'=>'620',
				  'height'=>'300'), $atts);

	return sprintf('<script src="http://occipital.com/360/embed.js?%s"></script>',http_build_query($query_atts));
}

add_shortcode('panoembed','pano_embed_shortcode');


?>