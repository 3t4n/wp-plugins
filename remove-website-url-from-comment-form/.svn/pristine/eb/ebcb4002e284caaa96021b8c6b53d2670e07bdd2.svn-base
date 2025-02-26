<?php
/**
 * @package Remove_Website_Url_From_Comment_Form
 * @version 1.0
 */
/*
Plugin Name: Remove Website Url From Comment Form
Plugin URI: http://wordpress.org/plugins/remove-website-url-from-comment-form/
Description: This is a very simple Plugin which removes Website url from Comment form and help you to cut down on spam. 
Author: NavThemes
Version: 1.0
Author URI: https://www.navthemes.com
*/

if(!function_exists('navthemes_remove_url')) : 

function navthemes_remove_url($fields)
 {
 if(isset($fields['url']))
 	unset($fields['url']);
 	return $fields;
 }

add_filter('comment_form_default_fields', 'navthemes_remove_url');

endif;