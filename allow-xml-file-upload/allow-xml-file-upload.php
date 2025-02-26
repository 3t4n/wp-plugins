<?php
/*
Plugin Name: Allow XML file upload
Plugin URI: 
Description: Import any XML files to WordPress with Media Uploader
Version: 0.1
Author: Dekadesign.it
Author URI: http://dekadesign.it
License: GPLv2
License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/


add_filter('upload_mimes', 'custom_upload_xml');
 
function custom_upload_xml($mimes) {
    $mimes = array_merge($mimes, array('xml' => 'application/xml'));
    return $mimes;
}