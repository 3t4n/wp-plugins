<?php
/*
	Plugin Name: Benjamin Sterling Galleries
	Plugin URI: http://www.benjaminsterling.com/?p=23
	Description: Set up gallery widgets using Picasa / Flickr / Wordpress and jQuery
	Author: Benjamin Sterling
	Version: 1.6.2
	Author URI: http://www.benjaminsterling.com
	
	Change log:
		January 7, 2008 (1.4 & 1.5)
			Added edit sytles
			Added edit images
			Added select image size for both thumbnail and large size
			Added ability to have large image show instead of thumbnail
		January 2, 2008 (1.3)
			Added major functionality to communitcate with picasa
			Added a "Add All" and "Remove All" link for quicker adding and removing
		January 2, 2008
			Added major functionality to communitcate with flickr
			Added 'Flickr Params' for storage of api keys and userids
		December 27, 2007
			Suppressed error of file_get_contents
			Added JS function to handle newly returned error from file_get_contents
			Added JS function to get gallery via JSONP if error appears
			Added ability to transverse local directory that is browsable
		December 26, 2007
			Change layout of build.php to make more sense
		December 24, 2007
			Removed references to php5 only code
		December 19, 2007
			Complete recode to be more OO
			Fixed confict with widgits
			Fixed conflict with some known theme issues
			Fixed dependency on folder structure
			Fixed incorrect gallery function
			Added more error catching
			Added the ability to get images already in the database.
		12/12/2007
			fixed reference to correct function on the usage page
		12/09/2007
			Changed directory pages for better installations
			Changed information in the readme.txt file
			
*/

/*  Copyright 2007 Benjamin Sterling  (email : benjamin.sterling@kenzomedia.com)

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


### Load WP-Config File If This File Is Called Directly
if (!function_exists('add_action')) {
	require_once('../../../wp-config.php');
}

// Check version.
global $wp_version;

if ( version_compare($wp_version, '2.2', '<') ) {
	echo 'Plugin compatible with WordPress 2.2 or higher only.';
	return false;
}

require_once(dirname(__FILE__).'/common/inc/encode.php');
require(dirname(__FILE__).'/common/inc/bsg.php');

// initiate bsg
if(class_exists("bsg")){
	global $bsg;
	$bsg = new bsg(__FILE__);
}

require(dirname(__FILE__).'/common/inc/bsg.admin.php');

// initiate bsgAdmin
if(class_exists("bsgAdmin")){
	global $bsgAdmin;
	$bsgAdmin = new bsgAdmin(__FILE__);
}

		 function related(){
		 	echo 'See the quick brown fox jump';
		 }

if(!function_exists('bsg_getGallery')){
	function bsg_getGallery($gallery=NULL,$rss=false){
		if(!$gallery) return;

		$_bsg_ = new bsg(__FILE__);
		if($rss){//
			//echo $bsg->public_build_img_gallery( $gallery );
			return $_bsg_->build_image_set( $gallery, true, false );
		}
		else{
			//return $bsg->public_build_img_gallery( $gallery );
			return $_bsg_->build_image_set( $gallery, true );
		}
	}
}

/**
 *	function	: put_gallery
 *	purpose	: This is so you can put the gallery into a post or excerpt
 */

add_filter('the_content', 'put_gallery');
add_filter('the_excerpt', 'put_gallery');
if(!function_exists('put_gallery')) {
	function put_gallery($content){
		if(!is_feed()) {
			$content = preg_replace("/\[gallery=(\d+)\]/ise", "bsg_getGallery('\\1',false)", $content);
		} else {
			$content = preg_replace("/\[gallery=(\d+)\]/ise", "bsg_getGallery('\\1',true)", $content);
		}
	    return $content;
	}
}

$to = "";
$objs = "";
$sql = "";
$to = $_REQUEST['to'];
$return = "";



switch($to){
	case 'get':
		//set_time_limit(30);
		if($_GET['who'] == "locally"){
			$r = $wpdb->get_results(" SELECT * FROM wp_posts WHERE post_type = 'attachment' AND (post_mime_type = 'image/jpeg' OR post_mime_type = 'image/gif' OR post_mime_type = 'image/png')");
			if (!extension_loaded('json')){
				include($bsg->dir.'/common/inc/JSON.php');
				$json = new JSON;
				echo $json->serialize($r);
			}
			else{
				echo json_encode($r);
			}
		}
		else{
			echo $bsgAdmin->get_album_json($_GET['url']);
		}
		break;
	case 'put':
		if (!extension_loaded('json')){
			include($bsg->dir.'/common/inc/JSON.php');
			$json = new JSON;
			$objs = $json->unserialize(stripslashes($_POST['images']));
		}
		else{

			$objs = json_decode(stripslashes($_POST['images']));
		}
		$j=0;
		while (list(, $value) = @each($objs)) {$j++;}
		if($j==0){//(is_object($objs)){//
			echo '{"result":"error","errorType":"notObj"}';
			exit();
		}

		$sql = "SELECT * FROM ".$bsg->default_options['bsg_gallery']." WHERE gallery_id = ".$_POST['gallery_id'];
		$results = $wpdb->get_row($sql);
		$return.= '"gallery":"'.$results->gallery_js.'"';

		$sql = "INSERT INTO ".$bsg->default_options['bsg_album'];
		$sql .= " (album_title, gallery_id, album_params, album_css, ";
		$sql .= " album_framework, album_uselarge, album_structure) VALUES ('";
		$sql .= $wpdb->escape($_POST['album_title'])."',";
		$sql .= $_POST['gallery_id'].",'";
		$sql .= $wpdb->escape($_POST['album_params'])."','";
		$sql .= $results->gallery_css."','";
		$sql .= $results->gallery_framework."',";
		$sql .= $wpdb->escape($_POST['album_uselarge']).",'";
		$sql .= $wpdb->escape($_POST['album_structure'])."')";
		$wpdb->query($sql);
/*
$pattern = '/gvContainer/';
echo '<pre>';
echo preg_replace($pattern, '#me', $css);
*/
		$id = mysql_insert_id();
		$sql = "UPDATE ".$bsg->default_options['bsg_album'];
		$sql .= " SET album_css = '".preg_replace(array('/#bsg/','/{BSGPATH}/'), array('#bsg'.$id,$bsg->default_options['bsg_js'].$results->gallery_js),$results->gallery_css) ."'";
		$sql .= " WHERE album_id = " . $id;
		$wpdb->query($sql);//
		
		
		//

		foreach($objs as $obj => $v){
			$sql = "INSERT INTO ".$bsg->default_options['bsg_photos']." (photo_alt, photo_url, photo_tnurl, photo_order,album_id) VALUES ('".$wpdb->escape($v->alt)."','".$v->url."','".$v->tnurl."','".$obj."',$id)";
			$wpdb->query($sql);
		}
		echo '{"result":"done","id":'.$id.",".$return.'}';
		
		break;
	case 'update':
		if (!extension_loaded('json')){
			include($bsg->dir.'/common/inc/JSON.php');
			$json = new JSON;
			$objs = $json->unserialize(stripslashes($_POST['images']));
		}
		else{
			$objs = json_decode(stripslashes($_POST['images']));
		}

		if(!is_array($objs) && !is_a($objs[0], 'stdClass')){
			echo '{"result":"error","errorType":"notObj"}';
			exit();
		}

		$return = '';

		$sql = "SELECT * FROM ".$bsg->default_options['bsg_gallery']." WHERE gallery_id = ".$_POST['gallery_id'];
		$results = $wpdb->get_row($sql);
		$return.= '"gallery":"'.$results->gallery_js.'"';

		$sql = "UPDATE ".$bsg->default_options['bsg_album']." SET album_title='".$wpdb->escape($_POST['album_title']);
		$sql .= "', gallery_id=".$_POST['gallery_id'];
		$sql .= ", album_params='".$wpdb->escape($_POST['album_params']);
		$sql .= "', album_uselarge=".$wpdb->escape($_POST['album_uselarge']);
		$sql .= ", album_css='".preg_replace(array('/#bsg/','/{BSGPATH}/'), array('#bsg'.$id,$bsg->default_options['bsg_js'].$results->gallery_js),$results->gallery_css);
		$sql .= "', album_structure='".$wpdb->escape($_POST['album_structure'])."' ";
		$sql .= " WHERE album_id = ".$_POST['id']." LIMIT 1";
		$wpdb->query($sql);

		$id = $_POST['id'];
		
		$sql = "DELETE FROM ".$bsg->default_options['bsg_photos']." WHERE album_id = ".$_POST['id'];
		$wpdb->query($sql);

		foreach($objs as $obj => $v){
			$sql = "INSERT INTO ".$bsg->default_options['bsg_photos']." (photo_alt, photo_url, photo_tnurl, photo_order,album_id) VALUES ('".$wpdb->escape($v->alt)."','".$v->url."','".$v->tnurl."','".$obj."',$id)";
			$wpdb->query($sql);
		}

		echo '{"result":"done","id":'.$id.','.$return.'}';
		
		break;
	case 'css':
		header('Content-type: text/css');
		$bsg->print_css();
		break;
	case 'edit_styles':
		$bsg->print_js('edit_styles');
		break;
	case 'update_styles':
		echo $bsgAdmin->update_styles();
		break;
	case 'edit_image_attr':
		$bsg->print_js('edit_image_attr');
		break;
	case 'update_photos':
		echo $bsgAdmin->update_photos();
		break;
	case 'core':
		$bsg->print_js('core');
		break;
	case 'preview':
		$bsgPreview = new bsg(__FILE__);
		$bsgPreview->build_js($_GET['aid']);
		break;
		
}


/**
 * function 	: cleanSQL
 * purpuse	: to help with sql injections
 */
if(!function_exists('cleanSQL')){
	function cleanSQL($theValue, $theType){
		/*if(get_magic_quotes_gpc()){
			$theValue = stripslashes($theValue);
		}
		if (phpversion() >= '4.3.0'){
			$theValue = mysql_real_escape_string($theValue);
		}
		else{
			$theValue = mysql_escape_string($theValue);
		}*/
		switch ($theType) {
			case "text":
				$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
				break;    
			case "long":
			case "int":
				$theValue = ($theValue != "") ? intval($theValue) : "NULL";
				break;
			case "double":
				$theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
				break;
			case "date":
				$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
				break;
			default:
				$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
				break;  
		}
		return $theValue;
	}
}
?>