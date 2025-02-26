<?php
add_action( 'wpcf7_save_contact_form', 'wpda_save_contact_form', 9, 1 );
function wpda_save_contact_form( $contact_form ) 
{
	$tags = $contact_form->scan_form_tags();  
	$post_id = $contact_form->id();	

	foreach ($tags as $value) 
	{
		if($value['type'] == 'text*' || $value['type'] == 'email*' || $value['type'] == 'textarea*' || $value['type'] == 'tel*'
		|| $value['type'] == 'url*' || $value['type'] == 'checkbox*' || $value['type'] == 'file*' || $value['type'] == 'date*' || $value['type'] == 'radio'
		|| $value['type'] == 'number*'){
			$key = "_customcf7_".$value['name']."-valid";
			update_post_meta($post_id,$key, $value['name']);  
		}
	}
}

add_action( 'wpcf7_after_create', 'wpda_wpcf7_after_create', 9, 1 );
function wpda_wpcf7_after_create( $instance ) 
{
    $tags = $instance->form_scan_shortcode();  
	$post_id = $instance->id(); 
	 
	foreach ($tags as $value) {
	
		if($value['type'] == 'text*' || $value['type'] == 'email*' || $value['type'] == 'textarea*' || $value['type'] == 'tel*'
		|| $value['type'] == 'url*' || $value['type'] == 'checkbox*' || $value['type'] == 'file*' || $value['type'] == 'date*' || $value['type'] == 'radio'
		|| $value['type'] == 'number*'){
			$key = "_customcf7_".$value['name']."-valid";
			update_post_meta($post_id,$key, $value['name']); 
		}
	}
}

function wpda_get_meta_values($p_id ='', $key = '') {

    global $wpdb;
    if( empty( $key ) )
        return;
  
    $r = $wpdb->get_results( "SELECT pm.meta_value FROM {$wpdb->postmeta} pm WHERE pm.meta_key LIKE '%$key%' AND pm.post_id = $p_id ");

    return $r;
}


function wpda_wpcf7_messages( $messages ) {
	if(isset($_GET['post']) && !empty($_GET['post']) )
	{
		$p_id = $_GET['post']; 
		$p_val = wpda_get_meta_values($p_id, '_customcf7_');
	  
		foreach ($p_val as $value) {
			$key = $value->meta_value;
			$newmsg = array(
			 'description' => "Error message for $value->meta_value field",
			 'default' =>  "Please enter $value->meta_value."
			 );
			 
			 $messages[$key] = $newmsg ;
		}
	}
 	return $messages;
}

add_filter( 'wpcf7_messages', 'wpda_wpcf7_messages', 10, 1 );

/* Validation filter */

add_filter( 'wpcf7_validate_text', 'wpda_wpcf7_validation', 10, 2 );
add_filter( 'wpcf7_validate_text*', 'wpda_wpcf7_validation', 10, 2 );
add_filter( 'wpcf7_validate_email', 'wpda_wpcf7_validation', 10, 2 );
add_filter( 'wpcf7_validate_email*', 'wpda_wpcf7_validation', 10, 2 );
add_filter( 'wpcf7_validate_url', 'wpda_wpcf7_validation', 10, 2 );
add_filter( 'wpcf7_validate_url*', 'wpda_wpcf7_validation', 10, 2 );
add_filter( 'wpcf7_validate_tel', 'wpda_wpcf7_validation', 10, 2 );
add_filter( 'wpcf7_validate_tel*', 'wpda_wpcf7_validation', 10, 2 );
add_filter( 'wpcf7_validate_textarea', 'wpda_wpcf7_validation', 10, 2 );
add_filter( 'wpcf7_validate_textarea*', 'wpda_wpcf7_validation', 10, 2 );
add_filter( 'wpcf7_validate_number', 'wpda_wpcf7_validation', 10, 2 );
add_filter( 'wpcf7_validate_number*', 'wpda_wpcf7_validation', 10, 2 );
add_filter( 'wpcf7_validate_range', 'wpda_wpcf7_validation', 10, 2 );
add_filter( 'wpcf7_validate_range*', 'wpda_wpcf7_validation', 10, 2 );
add_filter( 'wpcf7_validate_date', 'wpda_wpcf7_validation', 10, 2 );
add_filter( 'wpcf7_validate_date*', 'wpda_wpcf7_validation', 10, 2 );
add_filter( 'wpcf7_validate_checkbox', 'wpda_wpcf7_validation', 10, 2 );
add_filter( 'wpcf7_validate_checkbox*', 'wpda_wpcf7_validation', 10, 2 );
add_filter( 'wpcf7_validate_radio', 'wpda_wpcf7_validation', 10, 2 );
add_filter( 'wpcf7_validate_file', 'wpda_wpcf7_validation', 10, 2 );
add_filter( 'wpcf7_validate_file*', 'wpda_wpcf7_validation', 10, 2 );

function wpda_wpcf7_validation( $result, $tag ) {

	$tag_name = $tag->name;
	$name =  $tag_name;

	if( empty( $name ) ) {
		$name = "invalid_required";
	}
	
	if ( 'text' == $tag->basetype ) {
		$value = isset( $_POST[$tag_name] )
		? trim( wp_unslash( strtr( (string) $_POST[$tag_name], "\n", " " ) ) )
		: '';
		if ( $tag->is_required() && '' == $value ) {
			$result->invalidate( $tag, wpcf7_get_message( $name ) );
		}
	}

	if ( 'email' == $tag->basetype ) {
		
		$value = isset( $_POST[$tag_name] )
		? trim( wp_unslash( strtr( (string) $_POST[$tag_name], "\n", " " ) ) )
		: '';
		if ( $tag->is_required() && '' == $value ) {
			$result->invalidate( $tag, wpcf7_get_message( $name ) );
		} elseif ( '' != $value && ! wpcf7_is_email( $value ) ) {
			$result->invalidate( $tag, wpcf7_get_message( $name ) );
		}
	}

	if ( 'url' == $tag->basetype ) {
		
		$value = isset( $_POST[$tag_name] )
		? trim( wp_unslash( strtr( (string) $_POST[$tag_name], "\n", " " ) ) )
		: '';
		if ( $tag->is_required() && '' == $value ) {
			$result->invalidate( $tag, wpcf7_get_message( $name ) );
		} elseif ( '' != $value && ! wpcf7_is_url( $value ) ) {
			$result->invalidate( $tag, wpcf7_get_message( $name ) );
		}
	}

	if ( 'tel' == $tag->basetype ) {
		
		$value = isset( $_POST[$tag_name] )
		? trim( wp_unslash( strtr( (string) $_POST[$tag_name], "\n", " " ) ) )
		: '';
		if ( $tag->is_required() && '' == $value ) {
			$result->invalidate( $tag, wpcf7_get_message( $name ) );
		} elseif ( '' != $value && ! wpcf7_is_tel( $value ) ) {
			$result->invalidate( $tag, wpcf7_get_message( $name ) );
		}
	}	
	
	if ( 'number' == $tag->basetype ) {
		
		$value = isset( $_POST[$tag_name] )
		? trim( wp_unslash( strtr( (string) $_POST[$tag_name], "\n", " " ) ) )
		: '';
		$min = $tag->get_option( 'min', 'signed_int', true );
		$max = $tag->get_option( 'max', 'signed_int', true );

		if ( $tag->is_required() && '' == $value ) {
			$result->invalidate( $tag, wpcf7_get_message( $name ) );
		} elseif ( '' != $value && ! wpcf7_is_number( $value ) ) {
			$result->invalidate( $tag, wpcf7_get_message( $name ) );
			$result->invalidate( $tag, wpcf7_get_message( $name ) );
		} elseif ( '' != $value && '' != $min && (float) $value < (float) $min ) {
			$result->invalidate( $tag, wpcf7_get_message( 'number_too_small' ) );
		} elseif ( '' != $value && '' != $max && (float) $max < (float) $value ) {
			$result->invalidate( $tag, wpcf7_get_message( 'number_too_large' ) );
		}
	}	
	if ( 'date' == $tag->basetype ) {
		
		$min = $tag->get_date_option( 'min' );
		$max = $tag->get_date_option( 'max' );

		$value = isset( $_POST[$tag_name] )
			? trim( strtr( (string) $_POST[$tag_name], "\n", " " ) )
			: '';

		if ( $tag->is_required() && '' == $value ) {
			$result->invalidate( $tag, wpcf7_get_message( $name ) );
		} elseif ( '' != $value && ! wpcf7_is_date( $value ) ) {
			$result->invalidate( $tag, wpcf7_get_message( 'invalid_date' ) );
		} elseif ( '' != $value && ! empty( $min ) && $value < $min ) {
			$result->invalidate( $tag, wpcf7_get_message( 'date_too_early' ) );
		} elseif ( '' != $value && ! empty( $max ) && $max < $value ) {
			$result->invalidate( $tag, wpcf7_get_message( 'date_too_late' ) );
		}
	}	

	if ( 'textarea' == $tag->basetype ) {
		$value = isset( $_POST[$tag_name] ) ? (string) $_POST[$tag_name] : '';

		if ( $tag->is_required() && '' == $value ) {
			$result->invalidate( $tag, wpcf7_get_message( $name ) );
		}

		if ( '' !== $value ) {
			$maxlength = $tag->get_maxlength_option();
			$minlength = $tag->get_minlength_option();

			if ( $maxlength && $minlength && $maxlength < $minlength ) {
				$maxlength = $minlength = null;
			}

			$code_units = wpcf7_count_code_units( stripslashes( $value ) );

			if ( false !== $code_units ) {
				if ( $maxlength && $maxlength < $code_units ) {
					$result->invalidate( $tag, wpcf7_get_message( 'invalid_too_long' ) );
				} elseif ( $minlength && $code_units < $minlength ) {
					$result->invalidate( $tag, wpcf7_get_message( 'invalid_too_short' ) );
				}
			}
		}
	}

	if ( 'checkbox' == $tag->basetype || 'radio' == $tag->basetype ) {
		
		$is_required = $tag->is_required() || 'radio' == $tag->type;
		$value = isset( $_POST[$tag_name] ) ? (array) $_POST[$tag_name] : array();
		if ( $is_required && empty( $value ) ) {
			$result->invalidate( $tag, wpcf7_get_message( $name ) );
		}
	}
	
	if( 'file' == $tag->basetype ){  
		if ( $tag->is_required() && empty($_FILES[$tag_name]['name']) ){	
			$result->invalidate( $name, wpcf7_get_message( $name ) );
		}
	}
	return $result;
} ?>