<?php

/**
 * Class for working with TINYMCE button
 * sliders with images and other attachments.
 *
 * @package CS_TinyMCE
 * @since 1.1
 * @author Imran Khan
 * @copyright Copyright (c) 2016  Imran Khan.
 * @license http://codecanyon.net/licenses/faq Envato marketplace licenses
 */

// class CS_tinyMCE {


function cyberslider_mce_button() {
	 // check user permissions
	 if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
	  return;
	 }
	 // check if WYSIWYG is enabled
	 if ( 'true' == get_user_option( 'rich_editing' ) ) {
	  add_filter( 'mce_external_plugins', 'cyberslider_add_mce_plugin' );
	  add_filter( 'mce_buttons', 'cyberslider_register_mce_button' );
	 }
	}
	add_action( 'admin_head', 'cyberslider_mce_button' );

// Script for our mce button
function cyberslider_add_mce_plugin( $plugin_array ) {
	 $plugin_array['cyberslider_mce_button'] = CS_ROOT_URL.'/assets/js/backend/cs_tinyMCE.js';
	 return $plugin_array;
}

// Register our button in the editor
function cyberslider_register_mce_button( $buttons ) {
	 array_push( $buttons, 'cyberslider_mce_button' );
	 return $buttons;
}

// fatch data from cyberslider
function cyberslider_sliders() {

	 global $wpdb;
	 	$table_name=$wpdb->prefix .'cyberslider';
	        $slider = $wpdb->get_results( 
	        "SELECT id, name FROM $table_name 
	        ORDER BY id ASC"
	    );

	    $list = array();

	    foreach ( $slider as $row ) {
		  $selected = '';
		  $slider_id = $row->id;
		  $slider_name = $row->name;
		  $list[] = array(
		   'text' => $slider_name,
		   'value' => $slider_id
		  );
	 }

	wp_send_json( $list );
}


// get all sliders to dropdown in TINYMCE Button List
function cyberslider_list_ajax() {
	 // check for nonce
	check_ajax_referer( 'cyberslider-nonce', 'security' );
	$sliders = cyberslider_sliders();
 	return $sliders;
}


add_action( 'wp_ajax_cyberslider_list', 'cyberslider_list_ajax' );


function cyberslider_list() {
 // create nonce
 global $pagenow;
 if( $pagenow != 'admin.php' ){
  	$nonce = wp_create_nonce( 'cyberslider-nonce' ); ?>

	  <script type="text/javascript">
	   		jQuery( document ).ready( function( $ ) {
			    var data = {
			     'action' : 'cyberslider_list', // wp ajax action
			     'security' : '<?php echo $nonce; ?>' // nonce value created earlier
			    };
		    	// fire ajax
		        jQuery.post( ajaxurl, data, function( response ) {
	      		 // if nonce fails then not authorized else settings saved
		      		 if( response === '-1' ){
				        // do nothing
				        console.log('error');
		      		 } else {
		        		if (typeof(tinyMCE) != 'undefined') {
		         			if (tinyMCE.activeEditor != null) {
		        				tinyMCE.activeEditor.settings.cybersliderList = response;
		      				 }
		      			}
		       		}
	      		});
	   		});

	  </script>
<?php 
 	}
}
add_action( 'admin_footer', 'cyberslider_list' );?>