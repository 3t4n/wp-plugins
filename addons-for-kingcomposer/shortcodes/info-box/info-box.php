<?php
    add_action('init', 'aks_infobox_shortcode_init', 99 );
     
    function aks_infobox_shortcode_init(){
            
    global $kc;
    $kc->add_map(
        array(
            'akc_infobox' => array(
                'name' => 'InfoBox',
                'description' => __('info box shortcode', 'kingcomposer'),
                'icon' => 'akc_infobox_icon',
                'css_box' => true,
                'category' => 'Addons KingComposer',
                'params' => array(
                
                
                    'general' => array(                        
                        
                        array(
                            "type" => "select",
                            "label" => __("Select Style", "kingcomposer"),
                            "name" => "style",
                            'options' => array(
                                'style-1'  => 'Style 1',
                                'style-2'  => 'Style 2',
                                'style-3'  => 'Style 3',
                                'style-4'  => 'Style 4',
                                'style-5'  => 'Style 5',
                                'style-6'  => 'Style 6',
                            ),                        
                            "value" => "style-1",
                            "admin_label" => true,
                            "description" => __("", "kingcomposer")
                        ),
                        
                        array(
                            'type' => 'select',
                            'label' => __( 'Display Icon as', 'kingcomposer' ),
                            'name' => 'display_as',
                            'options' => array(
                                'circle'  => 'Circle',
                                'square'  => 'Square',
                            ),                        
                            "value" => "circle",
                            'relation' => array(
                                'parent' => 'style',
                                'show_when' => 'style-6',
                            ),                        
                        ),
                                            
                        array(
                            "type" => "select",
                            "label" => __("Icon Type", "kingcomposer"),
                            "name" => "icon_type",
                            'options' => array(
                                'icon'  => 'Icon (select the icon below)',
                                'image'  => 'Image (choose the icon image below)',
                            ),                        
                            "value" => "icon",
                            "description" => __("", "kingcomposer")
                        ),                   
                        array(
                            "type" => "attach_image",
                            "label" => __("Icon Image", "asvc"),
                            "name" => "icon_image",
                            'relation' => array(
                                'parent' => 'icon_type',
                                'show_when' => 'image',
                            ),                        
                            "description" => __("Select image from media library.", "kingcomposer")
                        ),                    
                                           
                        array(
                            'type' => 'icon_picker',
                            'label' => __( 'Icon', 'kingcomposer' ),
                            'name' => 'icon_fontawesome',
                            'value' => 'fa fa-camera',
                            'relation' => array(
                                'parent' => 'icon_type',
                                'show_when' => 'icon',
                            ),
                            'description' => __( 'Select icon from library.', 'kingcomposer' ),
                        ),
                        array(
                            "type" => "number_slider",
                            "label" => __("Icon Size", "kingcomposer"),
                            "name" => "icon_size",
                            'options' => array(
                                'min' => 16,
                                'max' => 300,
                                'unit' => 'px',
                                'show_input' => true
                            ),                        
                            "value" => 42,
                            "description" => __("Provide icon size", "kingcomposer"),
                        ),
                        
                        array(
                            "type"        => "color_picker",
                            "label"     => __( "Icon Color", "kingcomposer" ),
                            "name"  => "icon_color",
                            "value"       => "#343434",
                            "description" => __( "Choose icon color", "kingcomposer" ),
                            'relation' => array(
                                'parent' => 'icon_type',
                                'show_when' => 'icon',
                            ),
                        ),                    
                        array(
                            "type"        => "color_picker",
                            "label"     => __( "Icon Border Color", "kingcomposer" ),
                            "name"  => "icon_border_color",
                            "value"       => "#343434",
                            "description" => __( "Choose icon border color", "kingcomposer" ),
                            'relation' => array(
                                'parent' => 'icon_type',
                                'show_when' => 'icon',
                            ),                        
                        ),
                       
                        array(
                            "type"        => "color_picker",
                            "label"     => __( "Icon Background Color", "kingcomposer" ),
                            "name"  => "icon_bg_color",
                            "value"       => "#ffffff",
                            "description" => __( "Choose icon bg color", "kingcomposer" ),
                            'relation' => array(
                                'parent' => 'icon_type',
                                'show_when' => 'icon',
                            ),
                        ),                    
                        array(
                            "type"        => "color_picker",
                            "label"     => __( "Icon Hover Color", "kingcomposer" ),
                            "name"  => "icon_hover_color",
                            "value"       => "#1293d4",
                            "description" => __( "Choose icon hover color", "kingcomposer" ),
                            'relation' => array(
                                'parent' => 'icon_type',
                                'show_when' => 'icon',
                            ),
                        ),                    
                                                                 
                        array(
                            "type"        => "text",
                            "label"     => __( "Title", 'kingcomposer' ),
                            "name"  => "title",
                            "value"       => "",
                        ),
                        array(
                            "type" => "textarea",
                            "label" => __("Description", "kingcomposer"),
                            "name" => "content",
                            "value" => "",
                            "description" => __("Provide the description for this icon box.", "kingcomposer"),
                        ),
                        array(
                            "type" => "select",
                            "label" => __("On Click", "kingcomposer"),
                            "name" => "on_click",
                            'options' => array(
                                 'none' => 'No Link',
                                 'box' => 'Complete Box',
                            ),
                            "description" => __("Select whether to use color for icon or not.", "kingcomposer")
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

                        array(
                            "type" => "textfield",
                            "label" => __("Extra class name", "kingcomposer"),
                            "name" => "extraclass",
                            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "kingcomposer")
                        ),                     
                        
                    ),                
                


                    
                    'Typhography' => array(   
                                         
                        array(
                            'type'             => 'number_slider',
                            'label'          => __( 'Title Font Size', 'kingcomposer' ),
                            'name'       => 'title_f_size',
                            'options' => array(
                                'min' => 5,
                                'max' => 50,
                                'unit' => 'px',
                                'show_input' => true
                            ),
                            "value" => 16,
                            "description" => __("Chose Title Font Size as Pixel. Default is 18px", "kingcomposer"),
                        ),

                        array(
                            'type'             => 'number_slider',
                            'label'          => __( 'Description Font Size', 'kingcomposer' ),
                            'name'       => 'desc_f_size',
                            'options' => array(
                                'min' => 5,
                                'max' => 50,
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
                     
                        
                    ),                    

                    
                )
            )
        )
    );        
}
            
            
            
            
            function akc_infobox_shortcode_function( $atts, $content = null, $tag ) {
                extract( shortcode_atts( array(
                    'style'    => '',
                    'display_as'    => '',
                    'icon_type'       => '',
                    'icon'            => '',
                    'icon_image'      => '',
                    'icon_fontawesome' => '',
                    'icon_size' => '',
                    'icon_color' => '#343434',
                    'icon_border_color' => '#343434',
                    'icon_bg_color' => '#ffffff',
                    'icon_hover_color' => '#1293d4',
                    'title' => 'Title Here',
                    'content' => '',
                    'on_click' => '',
                    'link' => '',
                    'bg_color' => '',
                    'title_f_size' => '18',
                    'desc_f_size' => '14',
                    'title_color' => '',
                    'descr_color' => '',
                    'extraclass' => '',
                    
                ), $atts ) );
                
                
                wp_register_style( 'infobox-css', plugins_url( '/css/info-box.css',  __FILE__) );
                wp_enqueue_style( 'infobox-css' );
                
                $icon_image = wp_get_attachment_image_src( $icon_image, 'full' );
                $link    = kc_parse_link($link);
                
                $output ='';

                
                if ( $style !== 'style-6' ) {
                
                    if ( $on_click == 'box' ) {
                        $output .='<a class="href" href="'.$link['url'].'" title="'.$link['title'].'" target="'.$link['target'].'">';      }
    
                    
                    $output .='<div class="services-list '.$extraclass.'">
                                    <div class="asvc-info-box asvc-info-box-'.$style.'">
                                        <div class="asvc-info-box-top">';
                                        
                    if ($icon_type=='icon') {                    
                        $output .='<span style="background-color:'.$icon_bg_color.';"><i style="font-size:'.$icon_size.'; color:'.$icon_color.'; " class="'.$icon_fontawesome.'"></i></span>';
                    }
                    if ($icon_type=='image') {
                        
                        $output .='<span><img style="box-shadow: none;" width="'.$icon_size.'" src="'.$icon_image[0].'" alt=""></span>';
                    }
                    
                    $output .='<h4 style="font-size:'.$title_f_size.'; color:'.$title_color.';" class="semi-title">'.$title.'</h4>
                                        </div>
                                    <div class="asvc-info-box-desc">';
                                            
                                        
                    $output .='<p style="font-size:'.$desc_f_size.'; color:'.$descr_color.';">'.$content.'</p>                                               </div>
                                    </div>
                                </div>';
                                
                    if ( $on_click == 'box' ) {
                        $output .='</a>';
                    }
                    
                    $output .='<style>
                        .asvc-info-box:hover .asvc-info-box-top span i {
                            color:'.$icon_hover_color.' !important;
                        }

                    </style>';    
                              
                

                } //style 12345 end
            
                if ( $style == 'style-6' ) {
                    
                    if ( $on_click == 'box' ) {
                        $output .='<a class="href" href="'.$link['url'].'" title="'.$link['title'].'" target="'.$link['target'].'">';      }                
                    
                    $output .='<div class="asvc-info-box-2 '.$extraclass.'">
                                <div class="feature">
                                    <div class="icon parent">';
                                
                    
                    $output .='<div style="" class="circle parent">
                                    <div style="background:'.$icon_bg_color.'; " class="circle child-center">';
                                    
                                                            
                    if ($icon_type=='icon') {                      
                        $output .='<i style="font-size:'.$icon_size.'; color:'.$icon_color.'; " class="'.$icon_fontawesome.' child-center"></i>';
                    }
                    if ($icon_type=='image') {
                        
                        $output .='<img style="box-shadow: none;" class="child-center" width="'.$icon_size.'" src="'.$icon_image[0].'" alt="">';
                    }
                                                
                    $output .= '</div>
                                </div>
                            </div>
                            <div class="content text-center">
                                <h3 style="font-size:'.$title_f_size.'; color:'.$title_color.';">'.$title.'</h3>
                                <p style="font-size:'.$desc_f_size.'; color:'.$descr_color.';">'.$content.'</p>
                            </div>
                        </div>
                    </div>';
                    
                    if ( $on_click == 'box' ) {
                        $output .='</a>';
                    }
                    
                    
                    $output .='<style>
                        .asvc-info-box-2 .feature:hover .icon .circle {
                            border-color: #bdc3c7 !important;
                        }
                        .asvc-info-box-2 .feature:hover .content h3 {
                            color: '.$icon_border_color.' !important;
                        }

                    </style>';                                       
                    
                    
                }


                return $output;
            }


            add_shortcode( 'akc_infobox', 'akc_infobox_shortcode_function' );