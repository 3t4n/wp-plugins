<?php
/* Some setup */
define('PPM_TESTIMONIAL_NAME', "Testimonials");
define('PPM_TESTIMONIAL_SINGLE', "Testimonial");
define('PPM_TESTIMONIAL_TYPE', "ppm-testimonial");
define('PPM_TESTIMONIAL_ADD_NEW_ITEM', "Add New Testimonial");
define('PPM_TESTIMONIAL_EDIT_ITEM', "Edit Testimonial");
define('PPM_TESTIMONIAL_NEW_ITEM', "New Testimonial");
define('PPM_TESTIMONIAL_VIEW_ITEM', "View Testimonial");

/* Register custom post for Testimonial*/
function ppm_TESTIMONIAL_custom_post_register() {  
    $args = array(  
        'labels' => array (
			'name' => __( PPM_TESTIMONIAL_NAME ),
			'singular_label' => __(PPM_TESTIMONIAL_SINGLE),  
			'add_new_item' => __(PPM_TESTIMONIAL_ADD_NEW_ITEM),
			'edit_item' => __(PPM_TESTIMONIAL_EDIT_ITEM),
			'new_item' => __(PPM_TESTIMONIAL_NEW_ITEM),
			'view_item' => __(PPM_TESTIMONIAL_VIEW_ITEM),
		), 
        'public' => true,  
        'show_ui' => true,  
        'capability_type' => 'post',  
        'hierarchical' => false,  
        'rewrite' => true,  
        'supports' => array('title', 'editor')  
       );  
    register_post_type(PPM_TESTIMONIAL_TYPE , $args );  
}
add_action('init', 'ppm_TESTIMONIAL_custom_post_register');

?>