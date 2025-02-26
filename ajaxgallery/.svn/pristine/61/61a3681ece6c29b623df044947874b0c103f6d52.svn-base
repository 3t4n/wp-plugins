<?php
 /*
File Name: content.php
Plugin Name: ajaxGallery
Plugin URI: http://www.laciudadx.com/trabajos/ajaxgallery
Description: Ajax + Picasa + Thickbox
Author: Sergio Ceron Figueroa
Version: 2.0
Author URI: http://www.laciudadx.com

Copyright (C) 2007 Sergio Ceron F. (http://laciudadx.com)
    
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
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/
function gBody() {
	global $galleryurl;
	$body = "";
	$body .= "<link rel='stylesheet' href='". $galleryurl ."/css/thickbox.css' type='text/css' media='screen' />";
	$body .= "<link rel='stylesheet' href='". $galleryurl  ."/css/gallery.css' type='text/css' media='screen' />";
	$body .= "<script type='text/javascript' src='". $galleryurl  ."/js/jquery.js'></script>";
	$body .= "<script type='text/javascript' src='". $galleryurl  ."/js/thickbox.js'></script>";
	$body .= "<div id='container_ajaxgallery' align='center'></div>";
	$body .= "<script type='text/javascript' src='". $galleryurl  ."/js/gallery.js'></script>";
	$body .= "<script type='text/javascript'>";
	$body .= "	tb_pathToImage = '". $galleryurl ."/images/loadingAnimation.gif';";
	$body .= "	var config = {id: 'container_ajaxgallery', rows: ". get_option("ajaxgallery_rows") .", cols: ". get_option("ajaxgallery_cols") .", aligntable: '". get_option("ajaxgallery_align") ."', pag: 0, albums: 'none', album: 'none'};";
	$body .= "	var gallery = new ajaxgallery( config );";
	$body .= "</script>";
	$body .= "<div id='TB_load1'><img src='".$galleryurl."/js/loadingAnimation.gif'></div>";
	$body .= "<script type='text/javascript' src='http://picasaweb.google.com/data/feed/api/user/". get_option("ajaxgallery_user") ."?alt=json-in-script&callback=gallery.showAlbums&kind=album'></script>";
	return $body;
}
function ajaxgallery($content=''){
	return str_replace('[ajax_gallery]', GBody(), $content);
}
?>