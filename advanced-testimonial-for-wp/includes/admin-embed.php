<?php
	if ( ! defined( 'ABSPATH' ) ) exit;
    wp_enqueue_style(ITT_TESTIMONIAL_FIELDS_PERFIX.'custom-css', ITT_TESTIMONIAL_CSS_URL . 'custom_css.css', array() , null);
wp_enqueue_style(ITT_TESTIMONIAL_FIELDS_PERFIX.'public-css', ITT_TESTIMONIAL_CSS_URL. 'public.css', array() , null);
///////// grid responsive ///////////
    wp_register_style(ITT_TESTIMONIAL_FIELDS_PERFIX . 'responsive-grid', ITT_TESTIMONIAL_CSS_URL . 'grid.css', true);
    wp_enqueue_style(ITT_TESTIMONIAL_FIELDS_PERFIX . 'responsive-grid');

//CSS
    // TyTabs
    wp_enqueue_script(ITT_TESTIMONIAL_FIELDS_PERFIX . 'tytabs', ITT_TESTIMONIAL_JS_PLUGIN_URL . 'tytabs/tytabs.jquery.min.js');
    wp_enqueue_style(ITT_TESTIMONIAL_FIELDS_PERFIX . 'tytabs-css', ITT_TESTIMONIAL_JS_PLUGIN_URL . 'tytabs/styles.css');

    //FONTAWESOME STYLE //font-awesome-css
    wp_register_style(ITT_TESTIMONIAL_FIELDS_PERFIX . 'font-awesome-ccc', ITT_TESTIMONIAL_CSS_URL . 'font-awesome.css', true);
    wp_enqueue_style(ITT_TESTIMONIAL_FIELDS_PERFIX . 'font-awesome-ccc');

    /////////ADMIN STYLE/////////////////
    wp_enqueue_style(ITT_TESTIMONIAL_FIELDS_PERFIX . 'admin-style', ITT_TESTIMONIAL_CSS_URL . 'back-end/admin-style.css', true);

    wp_register_style(ITT_TESTIMONIAL_FIELDS_PERFIX . 'css-custom', ITT_TESTIMONIAL_CSS_URL . 'style.css', true);
    wp_enqueue_style(ITT_TESTIMONIAL_FIELDS_PERFIX . 'css-custom');


    /////////////////////////CSS CHOSEN///////////////////////
    wp_register_style(ITT_TESTIMONIAL_FIELDS_PERFIX . 'chosen_css_1', ITT_TESTIMONIAL_CSS_URL . 'back-end/chosen/chosen.css', false, '1.0.0');
    wp_enqueue_style(ITT_TESTIMONIAL_FIELDS_PERFIX . 'chosen_css_1');

    wp_enqueue_style(ITT_TESTIMONIAL_FIELDS_PERFIX . 'style-css', ITT_TESTIMONIAL_CSS_URL . 'back-end/style.css', false, '1.0.0');
	
	///////////////////Animation.css//////////////////////
	wp_register_style(ITT_TESTIMONIAL_FIELDS_PERFIX . 'animate', ITT_TESTIMONIAL_CSS_URL . 'animate.css', true);
    wp_enqueue_style(ITT_TESTIMONIAL_FIELDS_PERFIX . 'animate');
    //JS


    /////COLOR PICKKER//////
    wp_enqueue_style('wp-color-picker');

    /////JS ENQUEUE////////////
    wp_enqueue_script('jquery');
    wp_enqueue_script('wp-color-picker');
	
	wp_register_script(ITT_TESTIMONIAL_FIELDS_PERFIX . 'wow', ITT_TESTIMONIAL_JS_URL . 'front-end/wow.js', array('jquery'), false, true );
	wp_enqueue_script(ITT_TESTIMONIAL_FIELDS_PERFIX . 'wow');

    //FOR UPLOAD FILE IN TAXONOMY
    if (function_exists('wp_enqueue_media')) {
        wp_enqueue_media();
    } else {
        wp_enqueue_style('thickbox');
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
    }
    //////////////////DEPENDENCY//////////////////////////
    global $post_type;
    if (ITT_Testimonial_Post == $post_type || (isset($_GET['post_type']) && ITT_Testimonial_Post == $_GET['post_type'])) {
        wp_register_script(ITT_TESTIMONIAL_FIELDS_PERFIX . 'dependency', ITT_TESTIMONIAL_JS_URL . 'back-end/dependency/dependsOn-1.0.1.min.js', false, '1.0.0');
        wp_enqueue_script(ITT_TESTIMONIAL_FIELDS_PERFIX . 'dependency');
    }

    //////////////////CUSTOM JS//////////////////////////
    wp_register_script(ITT_TESTIMONIAL_FIELDS_PERFIX . 'js-custom', ITT_TESTIMONIAL_JS_URL . 'back-end/custom-js.js', true , rand());
    wp_enqueue_script(ITT_TESTIMONIAL_FIELDS_PERFIX . 'js-custom');

	/////////Ajax Object ////////////////////////////////
	wp_localize_script( ITT_TESTIMONIAL_FIELDS_PERFIX . 'js-custom', 'ajax_object', array(
		'ajax_url' => admin_url( 'admin-ajax.php' ),
        'nonce' => wp_create_nonce( 'itt_testimonial_nonce' ) ) );

    if (!function_exists('itt_testimonial_dependency')) {
        function itt_testimonial_dependency($element_id, $args)
        {
            $output = '';
            $output .= '
			<script type="text/javascript">
				jQuery(document).ready(function(jQuery){
				
				jQuery("#"+"' . $element_id . '").dependsOn({';
            foreach ($args['parent_id'] as $parent) {
                $element_type = $args[$parent][0];
                unset($args[$parent][0]);
                switch ($element_type) {
                    case "select": {
                        $output .= '
								"#' . $parent . '": {
										values: [\'' . (is_array($args[$parent]) ? implode("','", $args[$parent]) : $args[$parent]) . '\']
								},';
                    }
                        break;

                    case "checkbox" :
	                    {
                        if ($args[$parent] == 'true')
                            $output .= '
									"#' . $parent . '": {
										checked: true
									},';
                        else
                            $output .= '
									"#' . $parent . '": {
										checked: false
									},';
                    }
                        break;
                }
            }
            $output .= '
					});
				});
			 </script>';
            return $output;
        }
    }
?>