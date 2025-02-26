<?php
/**
 * @package Internals
 */
add_shortcode( "git_form", "git_formshortcode" );
add_shortcode( "git_map", "git_mapshortcode" );

function git_formshortcode( $atts)	
{
	global $git_token;
	extract( shortcode_atts( array(
			'id' => 0,
	), $atts ) );

	//set token
	if($git_token == '') {
		$git_token = md5(time() * rand(1000,9999));
		$_SESSION['git_token'] = $git_token;
	}
	
	return git_form_shortcode($id);		
}

function git_mapshortcode( $atts)	
{
	global $git_token;
	extract( shortcode_atts( array(
			'id' => 0,
	), $atts ) );

	//set token
	if($git_token == '') {
		$git_token = md5(time() * rand(1000,9999));
		$_SESSION['git_token'] = $git_token;
	}
	return git_map_shortcode($id);		
}


?>