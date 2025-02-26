<?php
	if ( ! defined( 'ABSPATH' ) ) exit;
	///////////////////METABOXES//////////////////////////////////

	// change thumbnail box from side on top
	add_action( 'do_meta_boxes', 'itt_testimonial_image_box' );
	function itt_testimonial_image_box() {
		remove_meta_box( 'postimagediv', ITT_Testimonial_Post, 'side' );
		add_meta_box( 'postimagediv',
			__( 'Testimonial Image' ,ITT_TESTIMONIAL_TEXTDOMAIN),
			'post_thumbnail_meta_box',
			ITT_Testimonial_Post,
			'normal',
			'high' );
	}

	// Custom fields
	if(!function_exists('itt_testimonial_add_metabox')){
		function itt_testimonial_add_metabox() {
			add_meta_box(  
				'itt_testimonial_metaboxname', // $id
				__('Testimonial Details',ITT_TESTIMONIAL_TEXTDOMAIN), // $title
				'itt_testimonial_metaboxname', // $callback
				ITT_Testimonial_Post, // $page
				'normal', // $context  
				'default');
				
		}  
		add_action('add_meta_boxes', 'itt_testimonial_add_metabox');
	}
	///////////////////END METABOXES//////////////////////////////////
	
	
	///////////////////LIST OF FILDS VARIABLES//////////////////////////////////
		
	include  'customfields-fields-variables.php';
	
	///////////////////END LIST OF FIELDS VARIABLES/////////////////////////////

	
	/////////////////SHOW CUSTOM FIELD////////////////////////
	
	include  'customfields-fields-functions.php';	
	
	/////////////////END SHOW CUSTOM FIELD////////////////////

    // Change title place holder
    function itt_testimonial_change_default_title( $title ) {
        $screen = get_current_screen();
        if( isset( $screen->post_type ) ) {
            if ( ITT_Testimonial_Post == $screen->post_type ) {
                $title = 'Enter Testimonial Name ,Example : John Doe';
            }
        }
        return $title;
    }
    add_filter( 'enter_title_here', 'itt_testimonial_change_default_title' );
	
?>