<?php

/*
Plugin Name: Simple Divi Shortcode 
Plugin URI:  https://www.creaweb2b.com/plugins/
Description: Plugin creating a shortcode allowing you to embed any Divi Library item within php template or within another Divi module/section content
Author:      Fabrice ESQUIROL - Creaweb2b
Version:     1.2
Author URI:  https://www.creaweb2b.com
License:     GPL2

Copyright 2017 Fabrice ESQUIROL (email : admin@creaweb2b.com)

This program is free software; you can redistribute it and/or modify it under the terms of the GNU
General Public License as published by the Free Software Foundation; either version 2 of the License,
or any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

//Exit if direct access
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

add_action( 'load-post.php', 'cw_post_meta_boxes_setup' );
add_action( 'load-post-new.php', 'cw_post_meta_boxes_setup' );

function cw_post_meta_boxes_setup() { 
  add_action( 'add_meta_boxes', 'cw_add_post_meta_boxes' );
}

function cw_add_post_meta_boxes() {
  add_meta_box('cw-post-code',esc_html__( 'Shortcode'),'cw_post_code_meta_box','et_pb_layout','side','default');
}

function cw_post_code_meta_box( $object, $box ) {  
   echo '<p>Click on the shortcode to copy it to clipboard and paste it where you want the content of this layout to be inserted</p>';
   echo '<h4 class="show-shortcode">[showmodule id="' . $object->ID . '"]</h4>';  
}

function cw_shortcode_add_column( $columns ) {
  $new_columns = array(  
  'shortcode' => __( 'Shortcode')
  );
  $filtered_columns = array_merge( $columns, $new_columns ); 
  return $filtered_columns;
}
add_filter('manage_et_pb_layout_posts_columns' , 'cw_shortcode_add_column');

function cw_shortcode_custom_column_content( $column ) {  
  global $post;
  switch ( $column ) {
    case 'shortcode' :   
      $shortcode = '[showmodule id="' . $post->ID .'"]';      
      echo '<h4 class="show-shortcode">'.$shortcode.'</h4>';
    break;      
  }
}
add_action( 'manage_et_pb_layout_posts_custom_column', 'cw_shortcode_custom_column_content' );
// Function to show the module
function showmodule_shortcode($atts) {
	$atts = shortcode_atts(array('id' => ''), $atts);
	return do_shortcode('[et_pb_section global_module="'.$atts['id'].'"][/et_pb_section]');	
}
add_shortcode('showmodule', 'showmodule_shortcode');  
  
function add_my_script() {
$screen = get_current_screen();
if ($screen->id!='edit-et_pb_layout' and $screen->id!='et_pb_layout') {
	return;
}
// We inject our code only on the Divi library :)...
$local =  substr( get_locale(), 0, 2 );
switch ($local) {
	case 'en':
		$alert = 'shortcode copied';
		break;
	case 'it':
		$alert = 'shortcode copiato';
		break;
	case 'es':
		$alert = 'shortcode copiado';
		break;
	case 'de':
		$alert = 'shortcode kopiert';
		break;
	default:
		$alert = 'shortcode copié';
}
?>
<style type="text/css">
	h4.show-shortcode:hover {
		cursor:copy;
                background-color:rgba(0,220,255,0.2);               
	}	
</style>
<script language="javascript">
	jQuery( ".show-shortcode" ).click(function(event ) {
		var shortcode = jQuery(this).text();
		var aux = document.createElement("input");
		aux.setAttribute("value", shortcode);
		document.body.appendChild(aux);
		aux.select();
		document.execCommand("copy");
		document.body.removeChild(aux);
		alert("<?php echo $alert; ?> "+ shortcode);
	});
</script>
<?php }
add_action( 'admin_footer', 'add_my_script', 11 );

?>