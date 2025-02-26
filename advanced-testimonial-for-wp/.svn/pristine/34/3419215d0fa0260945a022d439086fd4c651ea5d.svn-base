<?php
	if ( ! defined( 'ABSPATH' ) ) exit;
	//CSS
		//Enqueue You Css Here
    wp_enqueue_style(ITT_TESTIMONIAL_FIELDS_PERFIX.'custom-css', ITT_TESTIMONIAL_CSS_URL . 'custom_css.css', array() , null);
    wp_enqueue_style(ITT_TESTIMONIAL_FIELDS_PERFIX.'public-css', ITT_TESTIMONIAL_CSS_URL. 'public.css', array() , null);

	//JS
	/////JS ENQUEUE////////////
    wp_enqueue_script('jquery');


    
    //FONTAWESOME STYLE //font-awesome-css
    wp_register_style(ITT_TESTIMONIAL_FIELDS_PERFIX . 'font-awesome-ccc', ITT_TESTIMONIAL_CSS_URL . 'font-awesome.css', true);
    wp_enqueue_style(ITT_TESTIMONIAL_FIELDS_PERFIX . 'font-awesome-ccc');
    ///////// grid responsive ///////////
    wp_register_style(ITT_TESTIMONIAL_FIELDS_PERFIX . 'grid', ITT_TESTIMONIAL_CSS_URL . 'grid.css', true);
    wp_enqueue_style(ITT_TESTIMONIAL_FIELDS_PERFIX . 'grid');
	
	///////////////////Animation.css//////////////////////
	wp_register_style(ITT_TESTIMONIAL_FIELDS_PERFIX . 'animate', ITT_TESTIMONIAL_CSS_URL . 'animate.css', true);
    wp_enqueue_style(ITT_TESTIMONIAL_FIELDS_PERFIX . 'animate');

wp_register_script(ITT_TESTIMONIAL_FIELDS_PERFIX . 'ajaxForm', ITT_TESTIMONIAL_JS_URL . 'front-end/jquery.form.js', array('jquery'), false, true );
wp_enqueue_script(ITT_TESTIMONIAL_FIELDS_PERFIX . 'ajaxForm');

wp_register_script(ITT_TESTIMONIAL_FIELDS_PERFIX . 'wow', ITT_TESTIMONIAL_JS_URL . 'front-end/wow.js', array('jquery'), false, true );
wp_enqueue_script(ITT_TESTIMONIAL_FIELDS_PERFIX . 'wow');
    /////Perspective CAROUSEL//////
    //wp_enqueue_script(ITT_TESTIMONIAL_FIELDS_PERFIX . 'perspective', ITT_TESTIMONIAL_JS_PLUGIN_URL . 'jQuery-Waterwheel-Carousel/js/jquery.waterwheelCarousel.min.js');
    //wp_enqueue_style(ITT_TESTIMONIAL_FIELDS_PERFIX . 'perspective-css', ITT_TESTIMONIAL_JS_PLUGIN_URL . 'jQuery-Waterwheel-Carousel/style.css');

	//////////////////CUSTOM JS//////////////////////////
    wp_register_script( ITT_TESTIMONIAL_FIELDS_PERFIX.'ajaxHandle', ITT_TESTIMONIAL_JS_URL.'front-end/custom-js.js', array('jquery'), false, true );
    wp_enqueue_script( ITT_TESTIMONIAL_FIELDS_PERFIX.'ajaxHandle' );
    wp_localize_script( ITT_TESTIMONIAL_FIELDS_PERFIX.'ajaxHandle', 'ajax_object',
        array(
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
            'nonce' => wp_create_nonce( 'itt_testimonial_nonce' ) ) );

    /////COLOR PICKKER//////

    /////JS ENQUEUE////////////
    wp_enqueue_script('jquery');
?>