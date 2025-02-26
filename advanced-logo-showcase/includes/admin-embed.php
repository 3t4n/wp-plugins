<?php
   if ( ! defined( 'ABSPATH' ) ) exit;
    wp_enqueue_style(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX.'custom-css', ITLS_LOGO_SHOWCASE_CSS_URL . 'custom_css.css', array() , null);
	wp_enqueue_style(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX.'public-css', ITLS_LOGO_SHOWCASE_CSS_URL. 'public.css', array() , null);
	
	
	///////// grid responsive ///////////
    wp_register_style(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'responsive-grid', ITLS_LOGO_SHOWCASE_CSS_URL . 'responsive-grid.css', true);
    wp_enqueue_style(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'responsive-grid');
	
	/////tooltip//////
	wp_enqueue_style(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'tooltip-css', ITLS_LOGO_SHOWCASE_JS_PLUGIN_URL . 'tooltip/src/stylesheets/tipsy.css');
	
	/////TyTabs////////
	wp_enqueue_style(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'tytabs-css', ITLS_LOGO_SHOWCASE_JS_PLUGIN_URL . 'tytabs/styles.css');
	
	//FONTAWESOME STYLE //font-awesome-css
    wp_register_style(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'font-awesome-ccc', ITLS_LOGO_SHOWCASE_CSS_URL . 'font-awesome.css', true);
    wp_enqueue_style(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'font-awesome-ccc');
	
	/////////ADMIN STYLE/////////////////
    wp_enqueue_style(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'admin-style', ITLS_LOGO_SHOWCASE_CSS_URL . 'back-end/admin-style.css', true);

    wp_register_style(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'css-custom', ITLS_LOGO_SHOWCASE_CSS_URL . 'style.css', true);
    wp_enqueue_style(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'css-custom');
	
	/////////////////////////CSS CHOSEN///////////////////////
    wp_register_style(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'chosen_css_1', ITLS_LOGO_SHOWCASE_CSS_URL . 'back-end/chosen/chosen.css', false, '1.0.0');
    wp_enqueue_style(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'chosen_css_1');

    wp_enqueue_style(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'style-css', ITLS_LOGO_SHOWCASE_CSS_URL . 'back-end/style.css', false, '1.0.0');

	/////COLOR PICKKER//////
    wp_enqueue_style('wp-color-picker');	
	
	
	//JS
	/////JS ENQUEUE////////////
    wp_enqueue_script('jquery');
	
	
	

	/////tooltip//////
    wp_enqueue_script(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'tooltip', ITLS_LOGO_SHOWCASE_JS_PLUGIN_URL . 'tooltip/src/javascripts/jquery.tipsy.js');
    
    // TyTabs
    wp_enqueue_script(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'tytabs', ITLS_LOGO_SHOWCASE_JS_PLUGIN_URL . 'tytabs/tytabs.jquery.min.js');
    
    ///////PICKKER//////
    wp_enqueue_script('wp-color-picker');

    //FOR UPLOAD FILE IN TAXONOMY
    if (function_exists('wp_enqueue_media')) {
        wp_enqueue_media();
    } else {
        wp_enqueue_style('thickbox');
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
    }


    //////////////////CHOSEN//////////////////////////
    wp_register_script(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'chosen_js1', ITLS_LOGO_SHOWCASE_JS_URL . 'back-end/chosen/chosen.jquery.min.js', false, '1.0.0');
    wp_enqueue_script(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'chosen_js1');


    //////////////////DEPENDENCY//////////////////////////
    global $post_type;
    if (ITLS_Custom_Post == $post_type || (isset($_GET['post_type']) && ITLS_Custom_Post == $_GET['post_type'])) {
        wp_register_script(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'dependency', ITLS_LOGO_SHOWCASE_JS_URL . 'back-end/dependency/dependsOn-1.0.1.min.js', false, '1.0.0');
        wp_enqueue_script(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'dependency');
    }

    //////////////////CUSTOM JS//////////////////////////
    wp_register_script(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'js-custom', ITLS_LOGO_SHOWCASE_JS_URL . 'back-end/custom-js.js', true);
    wp_enqueue_script(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'js-custom');

	/////////Ajax Object ////////////////////////////////
	wp_localize_script( ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'js-custom', 'ajax_object', array(
		'ajax_url' => admin_url( 'admin-ajax.php' ),
        'nonce' => wp_create_nonce( 'itls_logoshowcase_nonce' ) ) );

    $output = '
			<script type="text/javascript">
				jQuery(document).ready(function(jQuery){
					jQuery(".chosen-select-public").chosen();
			
					if(jQuery("#' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'fetch_type").val()=="build_query"){
						setTimeout(function(){
							if(jQuery(".chosen-select-build").is(":visible")) {
								jQuery(".chosen-select-build").chosen();
							}	
						},100);	
					}
					
					jQuery("#' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'fetch_type").change(function(){
						if(jQuery(this).val()=="build_query"){
							setTimeout(function(){
								if(jQuery(".chosen-select-build").is(":visible")) {
									jQuery(".chosen-select-build").chosen();
								}	
							},100);	
						}
					});	
				});
			</script>	
	';
    echo $output;

    if (!function_exists('itls_logo_showcase_dependency')) {
        function itls_logo_showcase_dependency($element_id, $args)
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