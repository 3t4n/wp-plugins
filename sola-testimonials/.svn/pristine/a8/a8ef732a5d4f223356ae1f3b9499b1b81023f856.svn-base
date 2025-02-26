<?php
if(version_compare(get_bloginfo('version'),'5.0', '>=') ){

/**
* Registers gutenberg block for registration forms
**/
function sola_t_all_testimonial_block_editor_assets() {
    if(is_admin())
    {
        wp_register_style(
            'sola_t_all_testimonial-gutenberg-editor',
            SOLA_T_PLUGIN_DIR.'/includes/gutenberg-blocks/all-testimonials/editor.css',
            array( 'wp-edit-blocks' )
        
        );
    }   
   
    if(is_admin())
    {
        wp_register_script(
            'sola-t-all-testimonial-gutenberg-registration',
            SOLA_T_PLUGIN_DIR. '/includes/gutenberg-blocks/all-testimonials/block.js',
            array(
            'wp-blocks', 
            'wp-element', 
            'wp-components', 
            'wp-editor',
            )
        );
    }
   
    register_block_type( 'sola-t-all-testimonial-gutenberg-block/sola-t-all-testimonial-gutenberg-registration', array(
         'attributes' => array(
             'testimonial_all' => array(
                   'type' => 'string'
                       ),
                       'alignment' => array(
                           'type' => 'string',
                           'default' => 'center'
                       ),
                       'testimonial_slider' => array(
                           'type' => 'boolean',
                       ),
                        'testimonial_pagination' => array(
                         'type' => 'boolean',
                        ),
                        'testimonial_pagination_id'=> array(
                            'type' => 'string',
                        ),

                        'testimonial_cat'=> array(
                            'type' => 'boolean',
                        ),

                        'testimonial_cat_select_t'=> array(
                            'type' => 'string',
                        ),

                        'testimonial_cat_slider' => array(
                            'type' => 'boolean',
                        ),
                        'testimonial_cat_select_t_slider' => array(
                            'type' => 'string',
                        )
   
           ),
           'style' => 'sola_t_all_testimonial-gutenberg-style',
           'editor_style' => 'sola_t_all_testimonial-gutenberg-editor',
           'editor_script' => 'sola_t_all_testimonial-gutenberg-js',
          'render_callback' => 'sola_t_all_testimonial_gutenberg_render'
       ));
    
     

    // See if the Pro version is enabled
    if(function_exists('sola_t_register_pro')){

    $terms = get_terms('sola_t_categories');

    $terms_array[] = array(
		'value' => 0,
		'label' => 'Select Category'
	);
      
    foreach ($terms as $term) {
        $terms_array[] = array(
            'value' => $term->term_id,
            'label' => $term->name
        );
    }

    // Localize the category script
    wp_localize_script('sola-t-all-testimonial-gutenberg-registration', 'display_categories', $terms_array);
    wp_enqueue_script( 'sola-t-all-testimonial-gutenberg-registration' );

    // if Pro is active 
    $is_active = array(
        'pro_active' => "true",
    );

   }
else{
    // if Pro is deactivated 
    $is_active = array(
        'pro_active' => "false",
    );
}
    // Localize the pro script
   wp_localize_script('sola-t-all-testimonial-gutenberg-registration', 'is_pro_active', $is_active);
   wp_enqueue_script( 'sola-t-all-testimonial-gutenberg-registration' );


}
   // Render function
   function sola_t_all_testimonial_gutenberg_render($attributes){

    //Align text
    $txt_align = '';
    if(!empty($attributes['alignment'])){
        $txt_align = 'style = "text-align:' . $attributes['alignment'] . ';"';
    }

    //See if the user enabled the pagination setting
    if(isset($attributes['testimonial_pagination'])&& $attributes['testimonial_pagination'] == true){
        if(empty($attributes['testimonial_pagination_id'])){
            return "<p >Please specify how many testimonials you would like per page</p>";
        }
        return "<div $txt_align>" . do_shortcode('[sola_t_all_testimonials per_page="' . $attributes['testimonial_pagination_id'] . '"]') . "</div>";
    }
    
    //See if the Pro version is enabled
    if(function_exists('sola_t_register_pro')){
        //Slider enabled
        if(isset($attributes['testimonial_slider'])&& $attributes['testimonial_slider'] == true){
		return "<div $txt_align>" . do_shortcode('[sola_testimonial_slider]') . "</div>";
        }

        //Category button
        if(isset($attributes['testimonial_cat'])&& $attributes['testimonial_cat'] == true){
            //See if the user selected a category
            if(empty($attributes['testimonial_cat_select_t'])){
                return "<p >Please Select a Category in the settings block</p>";
            }
            return "<div $txt_align>" . do_shortcode('[sola_t_all_testimonials cat_id="' . $attributes['testimonial_cat_select_t'] . '"]') . "</div>";
        }

        //Category Slider button
        if(isset($attributes['testimonial_cat_slider'])&& $attributes['testimonial_cat_slider'] == true){
            //See if the user selected a category
            if(empty($attributes['testimonial_cat_select_t_slider'])){
                return "<p >Please Select a Category in the settings block</p>";
            }
         return "<div $txt_align>" . do_shortcode('[sola_testimonial_slider cat_id="' . $attributes['testimonial_cat_select_t_slider'] . '"]') . "</div>";
        }

    }
    
    
    //nothing selected, show all testimonials
    return "<div $txt_align>" . do_shortcode('[sola_t_all_testimonials]') . "</div>";
    
    
    }
   add_action( 'init', 'sola_t_all_testimonial_block_editor_assets' );

   add_action( 'wp_enqueue_scripts', 'sola_t_all_enqueue_styles' );

   function sola_t_all_enqueue_styles() {

       // Register script
       wp_register_style(
           'sola_t_all_testimonial-gutenberg-style',
           SOLA_T_PLUGIN_DIR. '/includes/gutenberg-blocks/all-testimonials/style.css',
           array( )
                   
       );
           
       //Only load style if the block is present
       if(has_block('sola-t-all-testimonial-gutenberg-block/sola-t-all-testimonial-gutenberg-registration')){
           wp_enqueue_style( 'sola_t_all_testimonial-gutenberg-style' );
       } 
   }
}
 