<?php

    add_action('init', 'aks_flipbox_3d_shortcode_init', 99 );
     
    function aks_flipbox_3d_shortcode_init(){
            
    global $kc;
    $kc->add_map(
        array(
            'akc_flipbox_3d' => array(
                'name' => 'FlipBox 3D',
                'description' => __('3d style flip box shortcode', 'kingcomposer'),
                'icon' => 'akc_flipbox_icon',
                'css_box' => true,
                'category' => 'Addons KingComposer',
                'params' => array(
                
                    'general' => array(                        
                        array(
                            "type" => "select",
                            "label" => __("Direction", "kingcomposer"),
                            "name" => "ddd_direction",
                            'options' => array(
                                 'flip-up' => 'Verticle',
                                 '' => 'Horizontal',
                            ),
                        ),
                        array(
                            'type' => 'text',
                            'label' => __('Extra class name', 'kingcomposer'),
                            'name' => 'extraclass',
                            'description' => __('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'kingcomposer')
                        ),                        
                        
                    ),
                    
                    'Front' => array(                        
                        array(
                            "type" => "select",
                            "name" => "display_as",
                            "label" => __("Display as", "kingcomposer"),
                            'options' => array(
                                 'content' => 'Content',
                                 'image' => 'Image',
                            ),
                            'value' => 'content',
                        ),
                        array(
                            'name' => 'front_image',
                            'label' => 'Image',
                            'type' => 'attach_image',
                            "description" => __("Select image from media library.", "kingcomposer"),
                            'relation' => array(
                                'parent' => 'display_as',
                                'show_when' => 'image',
                            ),
                        ),                        
                        array(
                            'name' => 'front_box_color',
                            'label' => 'Box color',
                            'type' => 'color_picker',
                            "description" => __("Choose flipbox color.", "kingcomposer"),
                        ),                        
                        array(
                            'name' => 'display_icon',
                            'label' => 'Display Icon',
                            'type' => 'select',
                            'options' => array(
                                 'icon' => 'Icon',
                                 'noicon' => 'No Icon',
                            ),
                            'value' => 'noicon',                            
                            'relation' => array(
                                'parent' => 'display_as',
                                'show_when' => 'content',
                            ),
                        ),                        
                        array(
                            'name' => 'icon_fontawesome',
                            'label' => 'Icon',
                            'type' => 'icon_picker',
                            "description" => __("Select icon from library.", "kingcomposer"),
                            'relation' => array(
                                'parent' => 'display_as',
                                'show_when' => 'content',
                            ),
                        ),                        
                        array(
                            'name' => 'icon_size',
                            'label' => 'Icon Size',
                            'type' => 'number_slider',
                            'options' => array(
                                'min' => 16,
                                'max' => 100,
                                'unit' => 'px',
                                'show_input' => true
                            ),
                            'value' => 20,
                            'description' => 'Provide icon size',
                            'relation' => array(
                                'parent' => 'display_as',
                                'show_when' => 'content',
                            ),                            
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => 'Icon Color',
                            'type' => 'color_picker',
                            'value' => '#343434',
                            "description" => __("Choose icon color.", "kingcomposer"),
                            'relation' => array(
                                'parent' => 'display_as',
                                'show_when' => 'content',
                            ),                            
                        ),                                                                       
                        array(
                            'name' => 'title',
                            'label' => 'Title',
                            'type' => 'text',
                            'relation' => array(
                                'parent' => 'display_as',
                                'show_when' => 'content',
                            ),                            
                        ),                        
                        array(
                            'name' => 'front_desc',
                            'label' => 'Description',
                            'type' => 'editor',
                            'relation' => array(
                                'parent' => 'display_as',
                                'show_when' => 'content',
                            ),                            
                        ),
                        array(
                            'name' => 'title_f_size',
                            'label' => 'Title Font Size',
                            'type' => 'number_slider',
                            'options' => array(
                                'min' => 10,
                                'max' => 50,
                                'unit' => 'px',
                                'show_input' => true
                            ),
                            'value' => 18,
                            'description' => 'Chose Title Font Size as Pixel. Default is 18px',
                            'relation' => array(
                                'parent' => 'display_as',
                                'show_when' => 'content',
                            ),                            
                        ),                        
                       
                        array(
                            'name' => 'title_color',
                            'label' => 'Title Color',
                            'type' => 'color_picker',
                            "description" => __("Choose text color", "kingcomposer"),
                            'relation' => array(
                                'parent' => 'display_as',
                                'show_when' => 'content',
                            ),                            
                        ),                        
                     
                        
                    ),                    
                    
                    'Back' => array(                        
                        array(
                            "type" => "select",
                            "name" => "back_display_as",
                            "label" => __("Display as", "kingcomposer"),
                            'options' => array(
                                 'content' => 'Content',
                                 'image' => 'Image',
                            ),
                            'value' => 'content',
                        ),
                        array(
                            'name' => 'back_image',
                            'label' => 'Image',
                            'type' => 'attach_image',
                            "description" => __("Select image from media library.", "kingcomposer"),
                            'relation' => array(
                                'parent' => 'back_display_as',
                                'show_when' => 'image',
                            ),
                        ),                        
                        array(
                            'name' => 'back_box_color',
                            'label' => 'Box color',
                            'type' => 'color_picker',
                            "description" => __("Choose flipbox color.", "kingcomposer"),
                        ),                                                       
                        array(
                            'name' => 'back_title',
                            'label' => 'Title',
                            'type' => 'text',
                            "description" => __("leave empty if you don't want.", "kingcomposer"),
                            'relation' => array(
                                'parent' => 'back_display_as',
                                'show_when' => 'content',
                            ),                            
                        ),                        
                        array(
                            'name' => 'back_desc',
                            'label' => 'Description',
                            'type' => 'editor',
                            'relation' => array(
                                'parent' => 'back_display_as',
                                'show_when' => 'content',
                            ),                            
                        ),
                        array(
                            'name' => 'back_title_f_size',
                            'label' => 'Title Font Size',
                            'type' => 'number_slider',
                            'options' => array(
                                'min' => 10,
                                'max' => 50,
                                'unit' => 'px',
                                'show_input' => true
                            ),
                            'value' => 18,
                            'description' => 'Chose Title Font Size as Pixel. Default is 18px',
                            'relation' => array(
                                'parent' => 'back_display_as',
                                'show_when' => 'content',
                            ),                            
                        ),                        
                        
                        array(
                            'name' => 'back_title_color',
                            'label' => 'Title Color',
                            'type' => 'color_picker',
                            "description" => __("Choose text color", "kingcomposer"),
                            'relation' => array(
                                'parent' => 'back_display_as',
                                'show_when' => 'content',
                            ),                            
                        ),                                                
                        
                    ),
                    'Link' => array(
                        array(
                            'name' => 'on_click',
                            'label' => 'On Click',
                            'type' => 'select',                     
                            'options' => array(
                                 'none' => 'No Link',
                                 'box' => 'Complete Box',
                            ),
                        ),                     
                        array(
                            "type" => "link",
                            "label" => __("Add Link", "kingcomposer"),
                            "name" => "link",
                            "description" => __("Add a custom link or select existing page. You can remove existing link as well.", "kingcomposer"),
                            'relation' => array(
                                'parent' => 'on_click',
                                'show_when' => 'box',
                            ),
                        ),

                    ),                    
                    
                                        
                    
                )
            )
        )
    );        
}        
            
            function asvc_flipbox_3d_shortcode_function( $atts, $content = null, $tag ) {
                extract( shortcode_atts( array(
                    'ddd_direction'    => 'flip-up',
                    'display_as'    => '',
                    'front_image'       => '',
                    'display_icon'      => 'noicon',
                    'icon_fontawesome'   => 'fa fa-camera',
                    'front_box_color'   => '#789e13',
                    'back_box_color'     => '#9bcc18',
                    'icon_size'            => '',
                    'icon_color'      => '#fff',
                    'title'         => '',
                    'front_desc'      => '',
                    'title_f_size'      => '',
                    'desc_f_size'      => '',
                    'title_color'      => '',
                    'descr_color'      => '',
                    'back_display_as'  => '',
                    'back_image'      => '',
                    'back_title'      => '',
                    'back_desc'      => '',
                    'back_title_f_size'  => '',
                    'back_desc_f_size'  => '',
                    'back_title_color'   => '',
                    'back_descr_color'   => '',
                    'on_click'      => '',
                    'link'      => '',
                    'css_flip_box'      => '',
                    'extraclass' => '',
                    
                ), $atts ) );
                
             
                wp_register_style( 'flipbox-css', plugins_url( 'css/flipbox-box.css',  __FILE__) );
                wp_enqueue_style( 'flipbox-css' );
                
                wp_register_script('flipbox-modernizr', plugins_url('js/modernizr_2.6.3-custom.js', __FILE__), array("jquery"));
                wp_enqueue_script('flipbox-modernizr');
                
            
                $front_image = wp_get_attachment_image_src( $front_image, 'full' );
                $back_image = wp_get_attachment_image_src( $back_image, 'full' );
                $link    = kc_parse_link($link);
                
                $output ='';

                    
                    if ( $on_click == 'box' ) {
                        $output .='<a class="href" href="'.$link['url'].'" title="'.$link['title'].'" target="'.$link['target'].'">';      }
                    
                    $output .='<div class="asvc-flip-box '.$ddd_direction.' '.$extraclass.'">';
                    
                    $output .='<div class="object">
                                    <div class="front" style="background-color:'.$front_box_color.' ">';
                    
                    if ( $display_as !== 'image' ) {
                        
                    $output .='<div class="flip-content">
                                <h3 style="font-size:'.$title_f_size.'px; color:'.$title_color.'; "><i style="font-size:'.$icon_size.'px; color:'.$icon_color.'; padding-right: 5px;" class="'.$icon_fontawesome.' "></i>'.$title.'</h3>

                                <div class="front_desc">'.$front_desc.'</div>
                                
                            </div>';
                    }else{
                        $output .='<img width="300" height="200" src="'.$front_image[0].'">';
                    }        
                            
                            
                    $output .='</div>';
                    
                    $output .='<div class="back" style="background-color:'.$back_box_color.' ">';
                    
                    
                    if ( $back_display_as !== 'image' ) {    
                    $output .='<div class="flip-content">
                                <h3 style="font-size:'.$back_title_f_size.'px; color:'.$back_title_color.';">'.$back_title.'</h3>
                                <div class="back_desc">'.$front_desc.'</div>
                            </div>';
                    }else{
                        $output .='<img width="300" height="200" src="'.$back_image[0].'">';
                    } 
                                    
                    $output .='</div>';
                    
                    $output .='<div class="flank" style="background-color:'.$front_box_color.' "></div>';
                     
                    $output .='</div>
                                </div>';
                                
                    if ( $on_click == 'box' ) {
                        $output .='</a>';
                    }
                    
                    if ( $display_icon == 'noicon' ) {
                        $output .='<style>
                            .asvc-flip-box h3 i {
                                display: none !important;
                            }
                        </style>';
                    }         
                



                return $output;
            }


            add_shortcode( 'akc_flipbox_3d', 'asvc_flipbox_3d_shortcode_function' );
            