<?php 
/*
Plugin Name: After The Deadline for Comments
Plugin URI: http://ottopress.com/wordpress-plugins/atd-for-comments/
Description: Makes your comments form have After The Deadline capabilities.
Author: Otto
Version: 1.0
Author URI: http://ottodestruct.com
License: GPL2

    Copyright 2010  Samuel Wood  (email : otto@ottodestruct.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License version 2, 
    as published by the Free Software Foundation. 
   
    You may NOT assume that you can use any other version of the GPL.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
    
    The license for this software can likely be found here: 
    http://www.gnu.org/licenses/gpl-2.0.html
*/

add_action('wp_enqueue_scripts','atdfc_enqueue');
function atdfc_enqueue() {
	if ( !is_singular() ) return;
	wp_enqueue_script('atd-textarea',plugins_url('atd-jquery/scripts/jquery.atd.textarea.js',__FILE__), array('jquery'), '032410');
	wp_enqueue_script('csshttprequest',plugins_url('atd-jquery/scripts/csshttprequest.js',__FILE__), array('atd-textarea'), '032410');
}

add_action('wp_head','atdfc_head');
function atdfc_head() {
	if ( !is_singular() ) return;
	echo '<link rel="stylesheet" type="text/css" media="screen" href="'.plugins_url('atd-jquery/css/atd.css',__FILE__).'" />';
	?>
<style>.AtD_proofread_button, .AtD_edit_button { margin:5px; }</style>
<?php
}

add_action('wp_footer','atdfc_footer');
function atdfc_footer() { 
	if ( !is_singular() ) return;
?>
<script type='text/javascript'>
	jQuery(function() {
		jQuery('#comment').addProofreader();
		jQuery('#AtD_0').insertAfter('#comment');
	});
</script>
<?php
}