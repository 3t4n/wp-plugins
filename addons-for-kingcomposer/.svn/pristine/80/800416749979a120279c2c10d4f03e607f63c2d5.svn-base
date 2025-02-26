<?php
add_action('init', 'akc_servicebox_shortcode_init', 99 );
 
function akc_servicebox_shortcode_init(){
            
    global $kc;
    $kc->add_map(
        array(
            'akc_servicebox' => array(
                'name' => 'Service Box',
                'description' => __('service box shortcode', 'kingcomposer'),
                'icon' => 'akc_servicebox_icon',
                'css_box' => true,
                'category' => 'Addons KingComposer',
                'params' => array(



                'General' => array(  
                
                    array(
                        "type" => "select",
                        "label" => __("Box Style", "kingcomposer"),
                        "name" => "style",
                        'options' => array(
                             1   => 'Style 1',
                             2   => 'Style 2',
                             3   => 'Style 3',
                             4   => 'Style 4',
                             5   => 'Style 5',
                        ),                        
                        "value" => 1,
                        "admin_label" => true,
                        "description" => __("", "kingcomposer")
                    ),
                    
                    array(
                        "type" => "select",
                        "label" => __("Direction", "kingcomposer"),
                        "name" => "direction",
                        'options' => array(
                             'up' => 'Up',
                             'down' => 'Down',
                             'left' => 'Left',
                             'right' => 'Right',
                        ),
                        "value" => "up",
                        'relation' => array(
                            'parent' => 'style',
                            'show_when' => '1',
                        ),
                        "description" => __("Select animation direction", "kingcomposer")
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
                        "label" => __("Icon Image", "kingcomposer"),
                        "name" => "icon_image",
                        "value" => "",
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
                        "label" => __("Image Icon Size", "kingcomposer"),
                        "name" => "image_icon_size",
                        'options' => array(
                            'min' => 5,
                            'max' => 100,
                            'unit' => 'px',
                            'show_input' => true
                        ),                        
                        "value" => 32,
                        "description" => __("Provide icon size", "kingcomposer"),
                        'relation' => array(
                            'parent' => 'icon_type',
                            'show_when' => 'image',
                        ),
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
                        "label"     => __( "Icon Background Color", "kingcomposer" ),
                        "name"  => "icon_bg_color",
                        "value"       => "",
                        "description" => __( "Choose icon bg color. Works with style 4 and 5", "kingcomposer" ),
                        'relation' => array(
                            'parent' => 'icon_type',
                            'show_when' => 'icon',
                        ),
                    ),                                       
                    array(
                        "type"        => "color_picker",
                        "label"     => __( "Icon Hover Color", "kingcomposer" ),
                        "name"  => "icon_hover_color",
                        "value"       => "",
                        "description" => __( "Choose icon hover color. Works with style 4 and 5", "kingcomposer" ),
                        'relation' => array(
                            'parent' => 'icon_type',
                            'show_when' => 'icon',
                        ),
                    ),                                                             
                    array(
                        "type"        => "text",
                        "label"     => __( "Title", 'kingcomposer' ),
                        "name"  => "title",
                        "admin_label" => true,
                        "value"       => "",
                    ),
                    array(
                        "type" => "textarea",
                        "label" => __("Description", "kingcomposer"),
                        "name" => "content",
                        "value" => "",
                        "description" => __("Provide the description for this box.", "kingcomposer"),
                    ),
                    
                    array(
                        "type"        => "color_picker",
                        "label"     => __( "Box Color", "kingcomposer" ),
                        "name"  => "box_color",
                        "description" => __( "Choose box color", "kingcomposer" ),
                        'relation' => array(
                            'parent' => 'style',
                            'show_when' => '1',
                        ),
                    ),
                    array(
                        "type"        => "color_picker",
                        "label"     => __( "Box Border Color", "kingcomposer" ),
                        "name"  => "border_color",
                        "description" => __( "Choose border color", "kingcomposer" ),
                        'relation' => array(
                            'parent' => 'style',
                            'show_when' => '2',
                        ),
                    ),                                        
                    
                    array(
                        "type"        => "color_picker",
                        "label"     => __( "Line Color", "kingcomposer" ),
                        "name"  => "line_color",
                        "description" => __( "Choose title bottom line color", "kingcomposer" ),
                        'relation' => array(
                            'parent' => 'style',
                            'show_when' => '3',
                        ),
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
                        "value" => "",
                        "description" => __("Add a custom link or select existing page. You can remove existing link as well.", "kingcomposer"),
                        'relation' => array(
                            'parent' => 'on_click',
                            'show_when' => 'box',
                        ),
                    ),                    

                    array(
                        "type" => "text",
                        "label" => __("Extra class name", "kingcomposer"),
                        "name" => "extraclass",
                        "value" => "",
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
                        "value" => 1,                        
                        "description" => __("Provide paragraph line height", "kingcomposer"),
                    ), 
                    
                ),    
                    
                                       
                    
                    
                )
            )
        )
    );        
}
            
            function akc_servicebox_shortcode_function( $atts, $content = null, $tag ) {
                extract( shortcode_atts( array(
                    'style'    => '',
                    'direction'    => 'up',
                    'icon_type'       => '',
                    'icon'            => '',
                    'icon_image'      => '',
                    'icon_fontawesome' => '',
                    'icon_size' => '42',
                    'image_icon_size' => '42',
                    'icon_color' => '',
                    'icon_bg_color' => '',
                    'icon_hover_color' => '',
                    'title' => '',
                    'content' => '',
                    'box_color' => '',
                    'border_color' => '',
                    'line_color' => '#e5b63c',
                    'on_click' => '',
                    'link' => '',
                    'bg_color' => '',
                    'title_f_size' => '18',
                    'desc_f_size' => '14',
                    'title_color' => '',
                    'descr_color' => '',
                    'extraclass' => '',
                    
                ), $atts ) );
                
                
                wp_register_style( 'servicebox-css', plugins_url( '/css/service-box.css',  __FILE__) );
                wp_enqueue_style( 'servicebox-css' );
                
            
                $icon_image = wp_get_attachment_image_src( $icon_image, 'full' );
                $link    = kc_parse_link($link);

                $output ='';
                
                
                if ( $style == '1' ) {
                  
                    $output .='<div class="service-1-'.$direction.' effect-'.$direction.' '.$extraclass.'">';
                    $output .='<ul>
                                <li>
                                <div class="h-center" style="background:'.$box_color.';">
                                <div class="v-center">';
                    
                    if ($icon_type=='image') {            
                        $output .='<img style="width:'.$image_icon_size.';" alt="" src="'.$icon_image[0].'">';
                    }
                    if ($icon_type=='icon') {            
                        $output .='<i style="color:'.$icon_color.'; font-size:'.$icon_size.'" class="'.$icon_fontawesome.'"></i>';                        
                    }            
                    $output .='<h2 style="font-size:'.$title_f_size.'; color:'.$title_color.';" class="title">'.$title.'</h2>
                                </div>
                                </div>
                                </li>';
                                
                    $output .='<li>';
                                
                    if ( $on_click == 'box' ) {
                            $output .='<a class="href" href="'.$link['url'].'" title="'.$link['title'].'" target="'.$link['target'].'">';      }             
                    

                    $output .='<div class="h-center">
                                        <div class="v-center">
                                            <h3 style="font-size:'.$title_f_size.'; color:'.$title_color.';" class="title-after"><span class="txt-h">'.$title.'</span></h3>
                                            <p style="font-size:'.$desc_f_size.'; color:'.$descr_color.';" class="des">'.$content.'</p>
                                    
                                        </div>
                                    </div>';
                        
                    if ( $on_click == 'box' ) {
                            $output .='</a>';
                        }            
                                
                    $output .='</li>
                                </ul>
                        </div>';
                
                }

                if ( $style == '2' ) {
                    
                    if ( $on_click == 'box' ) {
                            $output .='<a class="href" href="'.$link['url'].'" title="'.$link['title'].'" target="'.$link['target'].'">';      }
                    
                    $output .='<div class="service-2 '.$extraclass.'" style="border:1px solid '.$border_color.';" >';
                    
                    if ($icon_type=='image') {           
                        $output .='<img style="width:'.$image_icon_size.';" alt="" src="'.$icon_image[0].'">';
                    }
                    if ($icon_type=='icon') {          
                        $output .='<i style="color:'.$icon_color.'; font-size:'.$icon_size.'" class="'.$icon_fontawesome.'"></i>';                        
                    }
                    $output .='<h3 class="title" style="font-size:'.$title_f_size.'; color:'.$title_color.';">'.$title.'</h3>
                        <p style="font-size:'.$desc_f_size.'; color:'.$descr_color.';">'.$content.'</p>
                        </div>';
                        
                    if ( $on_click == 'box' ) {
                            $output .='</a>';
                        } 
                
                
                }
                
                
                if ( $style == '3' ) {
                    
                
                    if ( $on_click == 'box' ) {
                            $output .='<a class="href" href="'.$link['url'].'" title="'.$link['title'].'" target="'.$link['target'].'">';      }
                    
                    $output .='<div class="service-4-item '.$extraclass.'">
                                <div class="service-4-icon">';
                                
                    if ($icon_type=='image') {            
                        $output .='<img style="width:'.$image_icon_size.';" alt="" src="'.$icon_image[0].'">';
                    }
                    if ($icon_type=='icon') {            
                        $output .='<i style="color:'.$icon_color.'; font-size:'.$icon_size.'" class="'.$icon_fontawesome.'"></i>';                        
                    }                                

                    $output .='</div>
                                <div class="service-4-des">
                                    <h3 style="font-size:'.$title_f_size.'; color:'.$title_color.';">'.$title.'</h3>
                                    <div class="sep-v"></div>
                                    <p style="font-size:'.$desc_f_size.'; color:'.$descr_color.';">'.$content.'</p>

                                </div>
                            </div>';
                
                    if ( $on_click == 'box' ) {
                            $output .='</a>';
                        }
                        
                        
                    $output .='<style>.sep-v::before {
                            background-color: '.$line_color.' !important;
                        }
                        .sep-v {
                            background-color: '.$line_color.' !important;
                        }</style>';    
                }
                

                if ( $style == '4' ) {                
                
                    if ( $on_click == 'box' ) {
                            $output .='<a class="href" href="'.$link['url'].'" title="'.$link['title'].'" target="'.$link['target'].'">';      
}
                    
                    $output .='<div class="service-5 '.$extraclass.'">
                        <div class="icon-box-animaiton">
                            <div class="icon-box pull-left margin-t-25">';
                            
                            
                    if ($icon_type=='image') {            
                        $output .='<img class="style4_img" style="width:'.$image_icon_size.';" alt="" src="'.$icon_image[0].'">';
                    }
                    if ($icon_type=='icon') {             
                        $output .='<i aria-hidden="true" style="background:'.$icon_bg_color.'; color:'.$icon_color.'; font-size:'.$icon_size.'" class="'.$icon_fontawesome.' icons"></i>';                        
                    }                            
       
                    $output .='</div>
                            <div class="pad-l-100">
                                <h3 style="font-size:'.$title_f_size.'; color:'.$title_color.';">'.$title.'</h3>
                                <p style="font-size:'.$desc_f_size.'; color:'.$descr_color.';">'.$content.'</p>
                            </div>
                        </div>
                    </div>';
                
                    if ( $on_click == 'box' ) {
                            $output .='</a>';
                        }
                
                    $output .='<style>.service-5 .icon-box-animaiton:hover .icon-box > .icons::before {
                                color: '.$icon_hover_color.' !important;
                            }</style>';
                
                
                }
                
                if ( $style == '5' ) {
                    
                    if ( $on_click == 'box' ) {
                            $output .='<a class="href" href="'.$link['url'].'" title="'.$link['title'].'" target="'.$link['target'].'">';      
}
                
                    $output .='<div class="service-6 text-center service-wrap '.$extraclass.'">
                            <div class="icon" style="background:'.$icon_bg_color.';">';
                            
                    if ($icon_type=='image') {            
                        $output .='<img class="style5_img" style="width:'.$image_icon_size.';" alt="" src="'.$icon_image[0].'">';
                    }
                    if ($icon_type=='icon') {             
                        $output .='<i aria-hidden="true" style="color:'.$icon_color.'; font-size:'.$icon_size.'" class="'.$icon_fontawesome.' icons"></i>';                        
                    }        
          
                    $output .='</div>
                            <div class="service-info">
                                <h3 style="font-size:'.$title_f_size.'; color:'.$title_color.';">'.$title.'</h3>
                                <p style="font-size:'.$desc_f_size.'; color:'.$descr_color.';">'.$content.'</p>
                            </div>
                        </div>';
                
                    if ( $on_click == 'box' ) {
                            $output .='</a>';
                        }
                        
                    $output .='<style>.service-6:hover .icon {
                                background-color: '.$icon_color.' !important;
                                color: '.$icon_hover_color.' !important;
                            }.service-6:hover .icon i{
                                color: '.$icon_hover_color.' !important;
                            }
                            </style>';


                }

                return $output;
            }


            add_shortcode( 'akc_servicebox', 'akc_servicebox_shortcode_function' );