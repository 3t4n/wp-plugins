<?php

//Force templates admin on
update_site_option('_fl_builder_user_templates_admin','1');

//Load in the customizer settings
require_once 'j7-headers-footers-customizer.php';

//Shared function to Get the array of templates
function j7hft_get_bb_templates() {
	$data  = array();
	$query = new WP_Query( array(
		'post_type'     => 'fl-builder-template',
		'orderby'       => 'title',
		'order'       => 'ASC',
		'posts_per_page'  => '-1'
		));

	$data = array(
		'' => 'Choose A Template (Off)'
		);

	foreach( $query->posts as &$post ) {
		$data[ $post->ID ] = $post->post_title;
	}
	return $data;
}

//Set a default theme option so there aren't errors displaying
if ( get_theme_mod( 'bbp_hftcustom_header_template') == false ){
	set_theme_mod( 'bbp_hftcustom_header_template', '' );
}

if ( get_theme_mod( 'bbp_hftcustom_header_location') == false ){
	set_theme_mod( 'bbp_hftcustom_header_location', 'header_none' );
}

if ( get_theme_mod( 'bbp_hftcustom_header_absolute') == false ){
	set_theme_mod( 'bbp_hftcustom_header_absolute', 'insert_all' );
}

if ( get_theme_mod( 'bbp_hftcustom_header_opacity') == false ){
	set_theme_mod( 'bbp_hftcustom_header_opacity', 'false' );
}

if ( get_theme_mod( 'bbp_hftcustom_header_opacity_alpha') == false ){
	set_theme_mod( 'bbp_hftcustom_header_opacity_alpha', '0.0' );
}

// if ( get_theme_mod( 'bbp_hftcustom_header_scrollbehaviour') == false ){
// 	set_theme_mod( 'bbp_hftcustom_header_scrollbehaviour', 'false' );
// }






if ( get_theme_mod( 'bbp_hftcustom_footer_template') == false ){
	set_theme_mod( 'bbp_hftcustom_footer_template', '' );
}
if ( get_theme_mod( 'bbp_hftcustom_footer_location') == false ){
	set_theme_mod( 'bbp_hftcustom_footer_location', 'footer_none' );
}

if ( get_theme_mod( 'bbp_hftcustom_content_template') == false ){
	set_theme_mod( 'bbp_hftcustom_content_template', '' );
}
if ( get_theme_mod( 'bbp_hftcustom_content_location') == false ){
	set_theme_mod( 'bbp_hftcustom_content_location', 'content_none' );
}


// Set the old settings to the new ones
$oldsetting = get_theme_mod( 'bbp_hftcustom_header_location');
if ($oldsetting == 'option0' ){
	set_theme_mod( 'bbp_hftcustom_header_location', 'header_none' );
}
else if ($oldsetting == 'option1')
{
	set_theme_mod( 'bbp_hftcustom_header_location', 'header_above_top_bar' );
}
else if ($oldsetting == 'option2')
{
	set_theme_mod( 'bbp_hftcustom_header_location', 'header_above_default_header' );
}
else if ($oldsetting == 'option3')
{
	set_theme_mod( 'bbp_hftcustom_header_location', 'header_above_content' );
}

// Set the old settings to the new ones
$oldsetting = get_theme_mod( 'bbp_hftcustom_footer_location');
if ($oldsetting == 'option0' ){
	set_theme_mod( 'bbp_hftcustom_footer_location', 'footer_none' );
}
else if ($oldsetting == 'option1')
{
	set_theme_mod( 'bbp_hftcustom_footer_location', 'footer_above_default' );
}
else if ($oldsetting == 'option2')
{
	set_theme_mod( 'bbp_hftcustom_footer_location', 'footer_below_default' );
}
else if ($oldsetting == 'option3')
{
	set_theme_mod( 'bbp_hftcustom_footer_location', 'footer_above_default' );
}
else if ($oldsetting == 'option4')
{
	set_theme_mod( 'bbp_hftcustom_footer_location', 'footer_below_default' );
}


// Set the old settings to the new ones
$oldsetting = get_theme_mod( 'bbp_hftcustom_header_absolute', 'false');

if ($oldsetting == 'true' ){
	set_theme_mod( 'bbp_hftcustom_header_absolute', 'overlay_all' );
}
else if ($oldsetting == 'homepage')
{
	set_theme_mod( 'bbp_hftcustom_header_absolute', 'overlay_homepage_insertrest' );
}
else if ($oldsetting == 'fixed_all')
{
	set_theme_mod( 'bbp_hftcustom_header_absolute', 'fixed_all' );
}
else if ($oldsetting == 'fixed_homepage')
{
	set_theme_mod( 'bbp_hftcustom_header_absolute', 'fixed_homepage_insertrest' );
}
else if ($oldsetting == 'false')
{
	set_theme_mod( 'bbp_hftcustom_header_absolute', 'insert_all' );
}


// ##############################
// CONTENT ##################
// ##############################
include('j7-headers-footers-functions-content.php');

// ##############################
// HEADER ##################
// ##############################
include('j7-headers-footers-functions-header.php');

// ##############################
// FOOTER ##################
// ##############################
include('j7-headers-footers-functions-footer.php');
