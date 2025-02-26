<?php
add_action('init', 'akc_promobox_shortcode_init', 99 );
 
function akc_promobox_shortcode_init(){
            
    global $kc;
    $kc->add_map(
        array(
            'akc_promobox' => array(
                'name' => 'PromoBox',
                'description' => __('promo box shortcode', 'kingcomposer'),
                'icon' => 'akc_promobox_icon',
                'css_box' => true,
                'category' => 'Addons KingComposer',
                'params' => array(
                    
                
                'general' => array( 
                                 
                    array(
                        "type" => "select",
                        "label" => __("Background as", "kingcomposer"),
                        "name" => "bg_as",
                        'options' => array(
                             'back_color' => 'Color',
                             'image' => 'Image (choose the icon image below)',
                        ),                        
                        "value" => "bg_color",
                        "description" => __("", "kingcomposer")
                    ),                    
                    array(
                        "type" => "attach_image",
                        "label" => __("Background Image", "kingcomposer"),
                        "name" => "bg_image",
                        'relation' => array(
                            'parent' => 'bg_as',
                            'show_when' => 'image',
                        ),
                        "description" => __("Select image from media library.", "kingcomposer")
                    ),
                    array(
                        "type" => "select",
                        "label" => __("Image Overlay Color:", "kingcomposer"),
                        "name" => "overlay_color",
                        'options' => array(
                             'dark' => 'Dark',
                             'light' => 'Light',
                             'blue' => 'Blue',
                             'red' => 'Red',
                             'orange' => 'Orange',
                             'gray' => 'Gray',
                        ),
                        "value" => "dark",
                        'relation' => array(
                            'parent' => 'bg_as',
                            'show_when' => 'image',
                        ),                        
                    ),                    
                                        
                    array(
                        "type"        => "color_picker",
                        "label"     => __( "Background Color", "kingcomposer" ),
                        "name"  => "bg_color",
                        "description" => __( "Choose icon color", "kingcomposer" ),
                        'relation' => array(
                            'parent' => 'bg_as',
                            'show_when' => 'back_color',
                        ),
                    ),                                       
                    
                    array(
                        "type"        => "text",
                        "label"     => __( "Title", 'kingcomposer' ),
                        "name"      => "title",
                        "value"       => "",
                    ),
                    array(
                        "type" => "textarea",
                        "label" => __("Description", "kingcomposer"),
                        "name" => "content",
                        "description" => __("Provide the description for this box.", "kingcomposer"),
                    ),
                    
                    array(
                        "type" => "select",
                        "label" => __("Button Style:", "kingcomposer"),
                        "name" => "btn_style",
                        'options' => array(
                             'dark' => 'Dark',
                             'orange' => 'Orange',
                             'gray' => 'Gray',
                        ),                        
                        "value" => "gray",
                        "description" => __("", "kingcomposer")
                    ),                    
                    array(
                        "type" => "text",
                        "label" => __("Button Text", "kingcomposer"),
                        "name" => "btn_text",
                        "value" => "Read More",
                    ),                    
                    array(
                        "type" => "link",
                        "label" => __("Add Link", "kingcomposer"),
                        "name" => "link",
                        "description" => __("Add a custom link or select existing page. You can remove existing link as well.", "kingcomposer"),
                    ),                    

                    array(
                        "type" => "text",
                        "label" => __("Extra class name", "kingcomposer"),
                        "name" => "extraclass",
                        "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "kingcomposer")
                    ),
                    
                ),    
                      
                'typhography' => array( 
                    
                    array(
                        'type'             => 'number_slider',
                        'label'          => __( 'Title Font Size', 'kingcomposer' ),
                        'name'       => 'title_f_size',
                        'options' => array(
                            'min' => 5,
                            'max' => 100,
                            'unit' => 'px',
                            'show_input' => true
                        ),                        
                        "value" => 18,
                        "description" => __("Chose Title Font Size as Pixel. Default is 18px", "kingcomposer"),
                    ),
                    array(
                        'type'             => 'number_slider',
                        'label'          => __( 'Description Font Size', 'kingcomposer' ),
                        'name'       => 'desc_f_size',
                        'options' => array(
                            'min' => 5,
                            'max' => 100,
                            'unit' => 'px',
                            'show_input' => true
                        ),                        
                        "value" => 14,
                        "description" => __("Chose Description Font Size as Pixel. Default is 14px", "kingcomposer"),
                    ),

                    array(
                        "type"        => "color_picker",
                        "label"     => __( "Title color", "kingcomposer" ),
                        "name"  => "title_color",
                        "description" => __( "Choose text color", "kingcomposer" ),
                    ),
                    array(
                        "type"        => "color_picker",
                        "label"     => __( "Description color", "kingcomposer" ),
                        "name"  => "descr_color",
                        "description" => __( "Choose text color", "kingcomposer" ),
                    ),
                    array(
                        'type'             => 'number_slider',
                        'label'          => __( 'Line Height', 'kingcomposer' ),
                        'name'       => 'line_height',
                        'options' => array(
                            'min' => 1,
                            'max' => 100,
                            'unit' => 'px',
                            'show_input' => true
                        ),                        
                        "value" => 22,
                        "description" => __("Provide paragraph line height", "kingcomposer"),
                    ),                    
                    
                ),    
                    
                )
            )
        )
    );        
} 
            
            function akc_promobox_shortcode_function( $atts, $content = null, $tag ) {
                extract( shortcode_atts( array(
                    //'style'    => '1',
                    'bg_as'    => '',
                    'bg_image' => '',
                    'overlay_color' => 'dark',
                    'title' => '',
                    'content' => '',
                    'link' => '',
                    'btn_style' => 'gray',
                    'btn_text' => 'Sign Up',
                    'bg_color' => '',
                    'title_f_size' => '18',
                    'desc_f_size' => '14',
                    'title_color' => '',
                    'descr_color' => '',
                    'line_height' => '22',
                    'extraclass' => '',
                    
                ), $atts ) );
                
                
                wp_register_style( 'promobox-css', plugins_url( '/css/promo-box.css',  __FILE__) );
                wp_enqueue_style( 'promobox-css' );
                
                wp_register_script('asvc_jarallax', plugins_url('js/jarallax.js', __FILE__), array('jquery'), '', true );
                wp_enqueue_script('asvc_jarallax');
            
            
                $bg_image = wp_get_attachment_image_src( $bg_image, 'full' );
                $link    = kc_parse_link($link);
                
                $output ='';
                
                    
                    if ( $bg_as=='image' ) {
                  
                    $output .='<div class="call-box-1 pad-t-50 pad-b-50 asvc-overlay overlay-'.$overlay_color.' '.$extraclass.'"  style="background-image:url('.$bg_image[0].'); background-size: 100% auto;">';
                    }
                    
                    if ( $bg_color ) {
                  
                    $output .='<div class="call-box-1 pad-t-50 pad-b-50 '.$extraclass.'" style="background: '.$bg_color.'; ">';
                    }

                    $output .='<h3 style="font-size:'.$title_f_size.'; color:'.$title_color.';">'.$title.'</h3>
                               <p style="font-size:'.$desc_f_size.'; color:'.$descr_color.'; line-height: '.$line_height.';">'.$content.'</p>
                               <a class="promo-btn btn-l btn-'.$btn_style.'" href="'.$link['url'].'" title="'.$link['title'].'" target="'.$link['target'].'">'.$btn_text.'</a>
                                </div>';
                           
                

                return $output;
            }


            add_shortcode( 'akc_promobox', 'akc_promobox_shortcode_function' );
