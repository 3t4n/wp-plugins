<?php

    add_action('init', 'aks_hover_shortcode_init', 99 );
     
    function aks_hover_shortcode_init(){
            
    global $kc;
    $kc->add_map(
        array(
            'akc_hover' => array(
                'name' => 'Hover Effects',
                'description' => __('best hover effects', 'kingcomposer'),
                'icon' => 'akc_hover_effects_icon',
                'css_box' => true,
                'category' => 'Addons KingComposer',
                'params' => array(
            
 
            'general' => array(                        
                array(
                    "type"   => "select",
                    "label"  => __( "Select Style", "kingcomposer" ),
                    "name"   => "style",
                    'options' => array(
                         'circle'   => 'Circle',
                         'square'   => 'Square',
                         'square2'  => 'Square 2',
                         'caption'  => 'Caption',
                         'jibon'    => 'Jibon',
                         'others'   => 'Others',
                    ),
                    "admin_label"		=> true,
                    "description"       => __( "Select the style for the hover effect.", "kingcomposer" ),
                ),
                
                array(
                    "type"              => "select",
                    "label"           => __( "Select Effect", "kingcomposer" ),
                    "name"        => "circle_effects",
                    'options' => array(
                         'effect1'         => 'Effect 1',
                         'effect2'         => 'Effect 2',
                         'effect3'         => 'Effect 3',
                         'effect4'         => 'Effect 4',
                         'effect5'         => 'Effect 5',
                         'effect6'         => 'Effect 6',
                         'effect7'         => 'Effect 7',
                         'effect8'         => 'Effect 8',
                         'effect9'         => 'Effect 9',
                         'effect10'        => 'Effect 10',
                         'effect11'        => 'Effect 11',
                         'effect12'        => 'Effect 12',
                         'effect13'        => 'Effect 13',
                         'effect14'        => 'Effect 14',
                         'effect15'        => 'Effect 15',
                         'effect16'        => 'Effect 16',
                         'effect17'        => 'Effect 17',
                         'effect18'        => 'Effect 18',
                         'effect19'        => 'Effect 19',
                         'effect20'        => 'Effect 20',
                    ),
                    'relation' => array(
                        'parent' => 'style',
                        'show_when' => 'circle',
                    ),
                ),            
                
                array(
                    "type"              => "select",
                    "label"           => __( "Select Effect", "kingcomposer" ),
                    "name"        => "square_effects",
                    'options' => array(
                         'effect1'         => 'Effect 1',
                         'effect2'         => 'Effect 2',
                         'effect3'         => 'Effect 3',
                         'effect4'         => 'Effect 4',
                         'effect5'         => 'Effect 5',
                         'effect6'         => 'Effect 6',
                         'effect7'         => 'Effect 7',
                         'effect8'         => 'Effect 8',
                         'effect9'         => 'Effect 9',
                         'effect10'        => 'Effect 10',
                         'effect11'        => 'Effect 11',
                         'effect12'        => 'Effect 12',
                         'effect13'        => 'Effect 13',
                         'effect14'        => 'Effect 14',
                         'effect15'        => 'Effect 15',
                    ),
                    'relation' => array(
                        'parent' => 'style',
                        'show_when' => 'square',
                    ),
                ),            

                array(
                    "type"              => "select",
                    "label"           => __( "Select Effect", "kingcomposer" ),
                    "name"        => "square2_effects",
                    'options' => array(
                         'effect1'         => 'Effect 1',
                         'effect2'         => 'Effect 2',
                         'effect3'         => 'Effect 3',
                         'effect4'         => 'Effect 4',
                         'effect5'         => 'Effect 5',
                         'effect6'         => 'Effect 6',
                         'effect7'         => 'Effect 7',
                         'effect8'         => 'Effect 8',
                         'effect9'         => 'Effect 9',
                         'effect10'        => 'Effect 10',
                         'effect11'        => 'Effect 11',
                         'effect12'        => 'Effect 12',
                         'effect13'        => 'Effect 13',
                         'effect14'        => 'Effect 14',
                         'effect15'        => 'Effect 15',
                         'effect16'        => 'Effect 16',
                         'effect17'        => 'Effect 17',
                         'effect18'        => 'Effect 18',
                         'effect19'        => 'Effect 19',
                         'effect20'        => 'Effect 20',
                    ),
                    'relation' => array(
                        'parent' => 'style',
                        'show_when' => 'square2',
                    ),
                ),

                array(
                    "type"              => "select",
                    "label"           => __( "Select Effect", "kingcomposer" ),
                    "name"        => "caption_effects",
                    'options' => array(
                         'effect1'         => 'Effect 1',
                         'effect2'         => 'Effect 2',
                         'effect3'         => 'Effect 3',
                         'effect4'         => 'Effect 4',
                         'effect5'         => 'Effect 5',
                         'effect6'         => 'Effect 6',
                         'effect7'         => 'Effect 7',
                         'effect8'         => 'Effect 8',
                         'effect9'         => 'Effect 9',
                         'effect10'        => 'Effect 10',
                         'effect11'        => 'Effect 11',
                         'effect12'        => 'Effect 12',
                         'effect13'        => 'Effect 13',
                         'effect14'        => 'Effect 14',
                         'effect15'        => 'Effect 15',
                         'effect16'        => 'Effect 16',
                         'effect17'        => 'Effect 17',
                         'effect18'        => 'Effect 18',
                         'effect19'        => 'Effect 19',
                         'effect20'        => 'Effect 20',
                    ),
                    'relation' => array(
                        'parent' => 'style',
                        'show_when' => 'caption',
                    ),
                ),

                array(
                    "type"              => "select",
                    "label"           => __( "Select Effect", "kingcomposer" ),
                    "name"        => "jibon_effects",
                    'options' => array(
                         'effect1'         => 'Effect 1',
                         'effect2'         => 'Effect 2',
                         'effect3'         => 'Effect 3',
                         'effect4'         => 'Effect 4',
                         'effect5'         => 'Effect 5',
                         'effect6'         => 'Effect 6',
                         'effect7'         => 'Effect 7',
                         'effect8'         => 'Effect 8',
                         'effect9'         => 'Effect 9',
                         'effect10'        => 'Effect 10',
                         'effect11'        => 'Effect 11',
                         'effect12'        => 'Effect 12',
                    ),
                    'relation' => array(
                        'parent' => 'style',
                        'show_when' => 'jibon',
                    ),
                ),


                array(
                    "type"              => "select",
                    "label"           => __( "Select Animation Direction", "kingcomposer" ),
                    "name"        => "animation",
                    'options' => array(
                         'left_to_right'         => 'Left To Right',
                         'right_to_left'         => 'Right To Left',
                         'top_to_bottom'         => 'Top To Bottom',
                         'bottom_to_top'         => 'Bottom To Top',
                    ),
                    'relation' => array(
                        'parent' => 'style',
                        'show_when' => array('square', 'circle'),
                    ),
                ),

                array(
                    "type" => "attach_image",
                    "label" => __("Image", "kingcomposer"),
                    "name" => "image",
                ),            
                    
                 array(
                    "type" => "text",
                    "label" => __("Heading", "kingcomposer"),
                    "name"  => "title",
                ), 
                                
                 array(
                    "type" => "textarea",
                    "label" => __("Description", "kingcomposer"),
                    "name" => "description",
                    'relation' => array(
                        'parent' => 'style',
                        'show_when' => array('square', 'circle', 'caption', 'jibon'),
                    ),
                ), 
                
                array(
                    "type" => "link",
                    "label" => __("Link", "kingcomposer"),
                    "name" => "link",
                    "description" => __("keep blank if you don't want", "kingcomposer"),
                    
                ),
                array(
                    'type' => 'text',
                    'label' => __('Extra class name', 'kingcomposer'),
                    'name' => 'css_class',
                    'description' => __('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'kingcomposer')
                ),                
      
                
            ),


            'Settings' => array(                        

                array(
                    "type"              => "text",
                    "label"           => __( "Custom Image Width", "kingcomposer" ),
                    "name"        => "image_width",
                    "value"             => '216',
                    "description" => __("custom image width in px, default value is 216px ", "kingcomposer"),
                ),            
                array(
                    "type"              => "text",
                    "label"           => __( "Custom Image Height", "kingcomposer" ),
                    "name"        => "image_height",
                    "value"             => '216',
                    "description" => __("custom image height in px, default value is 216px ", "kingcomposer"),
                    'relation' => array(
                        'parent' => 'style',
                        'show_when' => array('square', 'square2', 'caption','jibon'),
                    ),                
                ),  

                     
                array(
                    "type"              => "text",
                    "label"           => __( "Heading Font Size", "kingcomposer" ),
                    "name"        => "heading_font_size",
                    "value"             => '16',
                    "description" => __("default value is 16px", "kingcomposer"),
                ), 
                array(
                    "type"              => "color_picker",
                    "label"           => __( "Heading Color", "kingcomposer" ),
                    "name"        => "heading_color",
                    "value"             => '#ffffff',
                    "description" => __("default color is #ffffff", "kingcomposer"),
                ),     
                array(
                    "type"              => "text",
                    "label"           => __( "Description Font Size", "kingcomposer" ),
                    "name"        => "desc_font_size",
                    "value"             => '12',
                    "description" => __("default value is 12px", "kingcomposer"),
                ),
                array(
                    "type"              => "color_picker",
                    "label"           => __( "Description Color", "kingcomposer" ),
                    "name"        => "desc_color",
                    "value"             => '#ffffff',
                    "description" => __("default color is #ffffff", "kingcomposer"),
                ),             
                                      
                array(
                    "type"              => "color_picker",
                    "label"           => __( "Background Color", "kingcomposer" ),
                    "name"        => "color",
                    "description" => __("use Alpha/rgba color for transperant bg", "kingcomposer"),
                    'relation' => array(
                        'parent' => 'style',
                        'show_when' => array('circle', 'square', 'caption'),
                    ),
                ),            
                
                
                array(
                    "type" => "checkbox",
                    "label" => __("Remove Border", "kingcomposer"),
                    "name" => "remove_border",
                    "admin_label"		=> true,
                    'options' => array(
                        'yes' => 'Yes',
                    ),
                    'relation' => array(
                        'parent' => 'style',
                        'show_when' => array('circle', 'square'),
                    ),
                ),            
                array(
                    "type" => "checkbox",
                    "label" => __("Remove Underline", "kingcomposer"),
                    "name" => "remove_underline",
                    'options' => array(
                        'yes' => 'Yes',
                    ),
                    'relation' => array(
                        'parent' => 'style',
                        'show_when' => array('circle'),
                    ),

                ),             
                
                array(
                    "type"              => "text",
                    "label"           => __( "Move Texts to Bottom", "kingcomposer" ),
                    "name"        => "move_texts",
                    "value"             => '0',
                    "description" => __("moving heading & desc texts to bottom. default value is 0px", "kingcomposer"),
                    'relation' => array(
                        'parent' => 'style',
                        'show_when' => array('circle', 'square', 'caption'),
                    ),                
                ),
                
                array(
                    "type" => "checkbox",
                    "label" => __("Description Text to Normal", "kingcomposer"),
                    "name" => "desc_normal",
                    'options' => array(
                        'yes' => 'Yes',
                    ),
                    'relation' => array(
                        'parent' => 'style',
                        'show_when' => array('circle', 'square'),
                    ), 
                ),
                        
                
            ),
              
                
            )
        ) 
    
        )
    );        
}  
    
    
    
function akc_hover_effects( $atts, $content = null, $tag ) {
                extract(shortcode_atts(array(
                
                        "style" => 'circle',
                        "circle_effects" => 'effect1',
                        "square_effects" => 'effect1',
                        "square2_effects" => 'effect1',
                        "caption_effects" => 'effect1',
                        "jibon_effects" => 'effect1',
                        "animation" => 'left_to_right',
                        "image" => '',
                        "title" => 'Heading Goes Here',
                        "description" => 'description goes here',
                        "link" => '',
                        "image_width" => '216',
                        "image_height" => '216',
                        //"move_texts_topbottom" => '15',
                        //"move_texts_leftright" => '15',
                        "font" => 'Open+Sans',
                        "heading_font_size" => '16',
                        "heading_color" => '#ffffff',
                        "desc_font_size" => '12',
                        "desc_color" => '#ffffff',
                        "color" => '',
                        "remove_border" => '',
                        "remove_underline" => '',
                        "open_link" => '',
                        "move_texts" => '',
                        "desc_normal" => '',
                        "css_class" => '',
                        
                ), $atts));
                
                
                
                wp_register_style('hvc_ihover', plugins_url( 'css/ihover.css' , __FILE__ ) );
                wp_enqueue_style( 'hvc_ihover' );
                
                wp_register_style('hvc_square2', plugins_url( 'css/square2.css' , __FILE__ ) );
                wp_enqueue_style( 'hvc_square2' );
                
                wp_register_style('hvc_caption', plugins_url( 'css/caption.css' , __FILE__ ) );
                wp_enqueue_style( 'hvc_caption' );
                
                wp_register_style('hvc_othersFour', plugins_url( 'css/othersFour.css' , __FILE__ ) );
                wp_enqueue_style( 'hvc_othersFour' );
                
                wp_register_style('hvc_custom', plugins_url( 'css/custom.css' , __FILE__ ) ); 
                wp_enqueue_style( 'hvc_custom' );               
                
                
                
                

                $image = wp_get_attachment_image_src( $image, 'full' ); 
                $link    = kc_parse_link($link);
                $output = '';
                
                if ($remove_underline=='yes') {
                        $remove_underline = 'none';
                }
                
                if ($desc_normal=='yes') {
                    $output .='<style>.ih-item .info p {
                                                font-style: normal !important;
                                        }</style>';
                }      

                
                if ( $style=='circle' && $circle_effects=='effect1' ){
        
                        $output .= '<div class="ih-item circle effect1 '.$css_class.'" style="width:'.$image_width.'px; height:'.$image_width.'px;background:'.$color.'"><a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                        <div class="spinner"></div>
                                                                <div class="img" style="box-shadow:none; width:'.$image_width.'px; height:'.$image_width.'px;"><img src="'.$image[0].'"></div>
                                                                        <div class="info" style="background:'.$color.'">
                                                                <div class="info-back" >
                                                                <h3 style="letter-spacing: 0px; margin-top: '.$move_texts.'px; font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.';">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; border-top: '.$remove_underline.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                        
                                        </div></div></a></div>';
                }
                
                if ( $style=='circle' && $circle_effects=='effect2' ){
        
                        $output .= '<div class="ih-item circle effect2 '.$animation.' '.$css_class.'" style="width:'.$image_width.'px; height:'.$image_width.'px;background:'.$color.'"><a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                        <div class="spinner"></div>
                                                                <div class="img" style="box-shadow:none; width:'.$image_width.'px; height:'.$image_width.'px;"><img src="'.$image[0].'"></div>
                                                                        <div class="info" style="background:'.$color.'">
                                                                <h3 style="letter-spacing: 0px; margin-top: '.$move_texts.'px; font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.';">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; border-top: '.$remove_underline.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                        
                                        </div></a></div>';
                }
                                
                if ( $style=='circle' && $circle_effects=='effect3' ){
        
                        $output .= '<div class="ih-item circle effect3 '.$animation.' '.$css_class.'" style="width:'.$image_width.'px; height:'.$image_width.'px;background:'.$color.'"><a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                        <div class="spinner"></div>
                                                                <div class="img" style="box-shadow:none; width:'.$image_width.'px; height:'.$image_width.'px;"><img src="'.$image[0].'"></div>
                                                                        <div class="info" style="background:'.$color.'">
                                                                <h3 style="letter-spacing: 0px; margin-top: '.$move_texts.'px; font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.';">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; border-top: '.$remove_underline.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                        
                                        </div></a></div>';
                }
                
                if ( $style=='circle' && $circle_effects=='effect4' ){
        
                        $output .= '<div class="ih-item circle effect4 '.$animation.' '.$css_class.'" style="width:'.$image_width.'px; height:'.$image_width.'px;background:'.$color.'"><a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                        <div class="spinner"></div>
                                                                <div class="img" style="box-shadow:none; width:'.$image_width.'px; height:'.$image_width.'px;"><img src="'.$image[0].'"></div>
                                                                        <div class="info" style="background:'.$color.'">
                                                                <h3 style="letter-spacing: 0px; margin-top: '.$move_texts.'px; font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.';">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; border-top: '.$remove_underline.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                        
                                        </div></a></div>';
                }
                
                if ( $style=='circle' && $circle_effects=='effect5' ){
        
                        $output .= '<div class="ih-item circle effect5 '.$animation.' '.$css_class.'" style="width:'.$image_width.'px; height:'.$image_width.'px;background:'.$color.'"><a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                        <div class="spinner"></div>
                                                                <div class="img" style="width:'.$image_width.'px; height:'.$image_width.'px;"><img src="'.$image[0].'"></div>
                                                                        <div class="info">
                                                                <div class="info-back" style="background:'.$color.'">
                                                                <h3 style="letter-spacing: 0px; margin-top: '.$move_texts.'px; font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.';">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; border-top: '.$remove_underline.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                        
                                        </div></div></a></div>';
                }        
 

                if ( $style=='circle' && $circle_effects=='effect6' ){
        
                        $output .= '<div class="ih-item circle effect6 scale_down_up '.$css_class.'" style="width:'.$image_width.'px; height:'.$image_width.'px;background:'.$color.'"><a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                        <div class="spinner"></div>
                                                                <div class="img" style="box-shadow:none; width:'.$image_width.'px; height:'.$image_width.'px;"><img src="'.$image[0].'"></div>
                                                                        <div class="info" style="background:'.$color.'">
                                                                <h3 style="letter-spacing: 0px; margin-top: '.$move_texts.'px; font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.';">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; border-top: '.$remove_underline.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                        
                                        </div></a></div>';
                }

                if ( $style=='circle' && $circle_effects=='effect7' ){
        
                        $output .= '<div class="ih-item circle effect7 '.$animation.' '.$css_class.'" style="width:'.$image_width.'px; height:'.$image_width.'px;background:'.$color.'"><a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                        <div class="spinner"></div>
                                                                <div class="img" style="width:'.$image_width.'px; height:'.$image_width.'px;"><img src="'.$image[0].'"></div>
                                                                        <div class="info">
                                                                <div class="info-back" style="background:'.$color.'">
                                                                <h3 style="letter-spacing: 0px; margin-top: '.$move_texts.'px; font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.';">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; border-top: '.$remove_underline.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                        
                                        </div></div></a></div>';
                }
                
                if ( $style=='circle' && $circle_effects=='effect8' ){
        
                                                $output .= '<div class="ih-item circle effect8 '.$animation.' '.$css_class.'" style="width:'.$image_width.'px; height:'.$image_width.'px;background:'.$color.'"><a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                                                                                                <div class="img-container">
                                                                                                                                        <div class="img" style="width:'.$image_width.'px; height:'.$image_width.'px;"><img src="'.$image[0].'"></div>
                                                                                                                                </div>
                                                                                                                                <div class="info-container">
                                                                                                                                        <div class="info" style="background:'.$color.'">
                                                                                                                                                <h3 style="letter-spacing: 0px; margin-top: '.$move_texts.'px; font-family: '.$font.'; font-size: '.$heading_font.'px; color:'.$heading_color.';">'.$title.'</h3>
                                                                                                                                                <p style="font-family: '.$font.'; border-top: '.$remove_underline.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                                                                                                                        </div>
                                                                </div></a></div>';
                }        
                
                if ( $style=='circle' && $circle_effects=='effect9' ){
        
                        $output .= '<div class="ih-item circle effect9 '.$animation.' '.$css_class.'" style="width:'.$image_width.'px; height:'.$image_width.'px;background:'.$color.'"><a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                        <div class="spinner"></div>
                                                                <div class="img" style="box-shadow:none; width:'.$image_width.'px; height:'.$image_width.'px;"><img src="'.$image[0].'"></div>
                                                                        <div class="info" style="background:'.$color.'">
                                                                <h3 style="letter-spacing: 0px; margin-top: '.$move_texts.'px; font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.';">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; border-top: '.$remove_underline.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                        
                                        </div></a></div>';
                }
                                
                if ( $style=='circle' && $circle_effects=='effect10' ){
        
                        $output .= '<div class="ih-item circle effect10 top_to_bottom '.$css_class.'" style="width:'.$image_width.'px; height:'.$image_width.'px;background:'.$color.'"><a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                        <div class="spinner"></div>
                                                                <div class="img" style="box-shadow:none; width:'.$image_width.'px; height:'.$image_width.'px;"><img src="'.$image[0].'"></div>
                                                                        <div class="info" style="background:'.$color.'">
                                                                <h3 style="letter-spacing: 0px; margin-top: '.$move_texts.'px; font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.';">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; border-top: '.$remove_underline.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                        
                                        </div></a></div>';
                }      
                    
                if ( $style=='circle' && $circle_effects=='effect11' ){
        
                        $output .= '<div class="ih-item circle effect11 '.$animation.' '.$css_class.'" style="width:'.$image_width.'px; height:'.$image_width.'px;background:'.$color.'"><a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                        <div class="spinner"></div>
                                                                <div class="img" style="box-shadow:none; width:'.$image_width.'px; height:'.$image_width.'px;"><img src="'.$image[0].'"></div>
                                                                        <div class="info" style="background:'.$color.'">
                                                                <h3 style="letter-spacing: 0px; margin-top: '.$move_texts.'px; font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.';">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; border-top: '.$remove_underline.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                        
                                        </div></a></div>';
                }        
                
                if ( $style=='circle' && $circle_effects=='effect12' ){
        
                        $output .= '<div class="ih-item circle effect12 '.$animation.' '.$css_class.'" style="width:'.$image_width.'px; height:'.$image_width.'px;background:'.$color.'"><a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                        <div class="spinner"></div>
                                                                <div class="img" style="box-shadow:none; width:'.$image_width.'px; height:'.$image_width.'px;"><img src="'.$image[0].'"></div>
                                                                        <div class="info" style="background:'.$color.'">
                                                                <h3 style="letter-spacing: 0px; margin-top: '.$move_texts.'px; font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.';">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; border-top: '.$remove_underline.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                        
                                        </div></a></div>';
                }

                if ( $style=='circle' && $circle_effects=='effect13' ){
        
                        $output .= '<div class="ih-item circle effect13 from_left_and_right '.$css_class.'" style="width:'.$image_width.'px; height:'.$image_width.'px;background:'.$color.'"><a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                        <div class="spinner"></div>
                                                                <div class="img" style="width:'.$image_width.'px; height:'.$image_width.'px;"><img src="'.$image[0].'"></div>
                                                                        <div class="info">
                                                                <div class="info-back" style="background:'.$color.'">
                                                                <h3 style="letter-spacing: 0px; margin-top: '.$move_texts.'px; font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.';">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; border-top: '.$remove_underline.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                        
                                        </div></div></a></div>';
                }
                
                if ( $style=='circle' && $circle_effects=='effect14' ){
        
                        $output .= '<div class="ih-item circle effect14 '.$animation.' '.$css_class.'" style="width:'.$image_width.'px; height:'.$image_width.'px;background:'.$color.'"><a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                        <div class="spinner"></div>
                                                                <div class="img" style="box-shadow:none; width:'.$image_width.'px; height:'.$image_width.'px;"><img src="'.$image[0].'"></div>
                                                                        <div class="info" style="background:'.$color.'">
                                                                <h3 style="letter-spacing: 0px; margin-top: '.$move_texts.'px; font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.';">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; border-top: '.$remove_underline.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                        
                                        </div></a></div>';
                }        
                
                if ( $style=='circle' && $circle_effects=='effect15' ){
        
                        $output .= '<div class="ih-item circle effect15 left_to_right '.$css_class.'" style="width:'.$image_width.'px; height:'.$image_width.'px;background:'.$color.'"><a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                        <div class="spinner"></div>
                                                                <div class="img" style="box-shadow:none; width:'.$image_width.'px; height:'.$image_width.'px;"><img src="'.$image[0].'"></div>
                                                                        <div class="info" style="background:'.$color.'">
                                                                <h3 style="letter-spacing: 0px; margin-top: '.$move_texts.'px; font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.';">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; border-top: '.$remove_underline.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                        
                                        </div></a></div>';
                }        
                
                if ( $style=='circle' && $circle_effects=='effect16' ){
        
                        $output .= '<div class="ih-item circle effect16 left_to_right '.$css_class.'" style="width:'.$image_width.'px; height:'.$image_width.'px;background:'.$color.'"><a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                        <div class="spinner"></div>
                                                                <div class="img" style="box-shadow:none; width:'.$image_width.'px; height:'.$image_width.'px;"><img src="'.$image[0].'"></div>
                                                                        <div class="info" style="background:'.$color.'">
                                                                <h3 style="letter-spacing: 0px; margin-top: '.$move_texts.'px; font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.';">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; border-top: '.$remove_underline.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                        
                                        </div></a></div>';
                }         
                
                if ( $style=='circle' && $circle_effects=='effect17' ){
        
                        $output .= '<div class="ih-item circle effect17 '.$css_class.'" style="width:'.$image_width.'px; height:'.$image_width.'px;background:'.$color.'"><a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                        <div class="spinner"></div>
                                                                <div class="img" style="box-shadow:none; width:'.$image_width.'px; height:'.$image_width.'px;"><img src="'.$image[0].'"></div>
                                                                        <div class="info" style="background:'.$color.'">
                                                                <h3 style="letter-spacing: 0px; margin-top: '.$move_texts.'px; font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.';">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; border-top: '.$remove_underline.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                        
                                        </div></a></div>';
                }         
                
                if ( $style=='circle' && $circle_effects=='effect18' ){
        
                        $output .= '<div class="ih-item circle effect18 '.$animation.' '.$css_class.'" style="width:'.$image_width.'px; height:'.$image_width.'px;background:'.$color.'"><a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                        <div class="spinner"></div>
                                                                <div class="img" style="width:'.$image_width.'px; height:'.$image_width.'px;"><img src="'.$image[0].'"></div>
                                                                        <div class="info">
                                                                <div class="info-back" style="background:'.$color.'">
                                                                <h3 style="letter-spacing: 0px; margin-top: '.$move_texts.'px; font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.';">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; border-top: '.$remove_underline.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                        
                                        </div></div></a></div>';
                }    
                        
                if ( $style=='circle' && $circle_effects=='effect19' ){
        
                        $output .= '<div class="ih-item circle effect19 '.$animation.' '.$css_class.'" style="width:'.$image_width.'px; height:'.$image_width.'px;background:'.$color.'"><a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                        <div class="spinner"></div>
                                                                <div class="img" style="box-shadow:none; width:'.$image_width.'px; height:'.$image_width.'px;"><img src="'.$image[0].'"></div>
                                                                        <div class="info" style="background:'.$color.'">
                                                                <h3 style="letter-spacing: 0px; margin-top: '.$move_texts.'px; font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.';">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; border-top: '.$remove_underline.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                        
                                        </div></a></div>';
                }        

                if ( $style=='circle' && $circle_effects=='effect20' ){
        
                        $output .= '<div class="ih-item circle effect20 '.$animation.' '.$css_class.'" style="width:'.$image_width.'px; height:'.$image_width.'px;background:'.$color.'"><a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                        <div class="spinner"></div>
                                                                <div class="img" style="width:'.$image_width.'px; height:'.$image_width.'px;"><img src="'.$image[0].'"></div>
                                                                        <div class="info">
                                                                <div class="info-back" style="background:'.$color.'">
                                                                <h3 style="letter-spacing: 0px; margin-top: '.$move_texts.'px; font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.';">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; border-top: '.$remove_underline.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                        
                                        </div></div></a></div>';
                }        
                
                if ( $style=='square' && $square_effects=='effect1' ){
        
                        $output .= '<div class="ih-item square effect1 left_and_right '.$css_class.'" style="background:'.$color.'; height: '.$image_height.'px; width: '.$image_width.'px;"><a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                        <div class="spinner"></div>
                                                                <div class="img"><img style="height: '.$image_height.'px; width: '.$image_width.'px;" src="'.$image[0].'"></div>
                                                                        <div class="info" style="background:'.$color.'">
                                                                <h3 style="font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.'; margin-top: '.$move_texts.'px">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                        
                                        </div></a></div>';
                }        
                
                if ( $style=='square' && $square_effects=='effect2' ){
        
                        $output .= '<div class="ih-item square effect2 '.$css_class.'" style="background:'.$color.'; height: '.$image_height.'px; width: '.$image_width.'px;"><a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                        <div class="spinner"></div>
                                                                <div class="img"><img style="height: '.$image_height.'px; width: '.$image_width.'px;" src="'.$image[0].'"></div>
                                                                        <div class="info" style="background:'.$color.'">
                                                                <h3 style="font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.'; margin-top: '.$move_texts.'px">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                        
                                        </div></a></div>';
                }        

                if ( $style=='square' && $square_effects=='effect3' ){
        
                        $output .= '<div class="ih-item square effect3 '.$animation.' '.$css_class.'" style="background:'.$color.'; height: '.$image_height.'px; width: '.$image_width.'px;"><a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                        <div class="spinner"></div>
                                                                <div class="img"><img style="height: '.$image_height.'px; width: '.$image_width.'px;" src="'.$image[0].'"></div>
                                                                        <div class="info" style="background:'.$color.'">
                                                                <h3 style="font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.'; margin-top: '.$move_texts.'px">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                        
                                        </div></a></div>';
                }

                if ( $style=='square' && $square_effects=='effect4' ){
        
                        $output .= '<div class="ih-item square effect4 '.$css_class.'" style="background:'.$color.'; height: '.$image_height.'px; width: '.$image_width.'px;"><a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                        <div class="spinner"></div>
                                                        <div class="img"><img style="height: '.$image_height.'px; width: '.$image_width.'px;" src="'.$image[0].'"></div>
                                                        <div class="mask1" style="position: absolute; height: '.$image_height.'px; width: '.$image_width.'px;; left: auto; right: 0px; top: 0px;"></div>
                                                        <div class="mask2" style="position: absolute; height: '.$image_height.'px; width: '.$image_width.'px; top: auto; bottom: 0px; left: 0px;"></div>
                                                        <div class="info" style="background:'.$color.'">
                                                            <h3 style="font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.'; margin-top: '.$move_texts.'px">'.$title.'</h3>
                                                            <p style="font-family: '.$font.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                </div></a></div>';
                }

                if ( $style=='square' && $square_effects=='effect5' ){
        
                        $output .= '<div class="ih-item square effect5 '.$animation.' '.$css_class.'" style="background:'.$color.'; height: '.$image_height.'px; width: '.$image_width.'px;"><a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                        <div class="spinner"></div>
                                                                <div class="img"><img style="height: '.$image_height.'px; width: '.$image_width.'px;" src="'.$image[0].'"></div>
                                                                        <div class="info" style="background:'.$color.'">
                                                                <h3 style="font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.'; margin-top: '.$move_texts.'px">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                        
                                        </div></a></div>';
                }

                if ( $style=='square' && $square_effects=='effect6' ){
        
                        $output .= '<div class="ih-item square effect6 from_top_and_bottom '.$css_class.'" style="background:'.$color.'; height: '.$image_height.'px; width: '.$image_width.'px;"><a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                        <div class="spinner"></div>
                                                                <div class="img"><img style="height: '.$image_height.'px; width: '.$image_width.'px;" src="'.$image[0].'"></div>
                                                                        <div class="info" style="background:'.$color.'">
                                                                <h3 style="font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.'; margin-top: '.$move_texts.'px">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                        
                                        </div></a></div>';
                }

                if ( $style=='square' && $square_effects=='effect7' ){
        
                        $output .= '<div class="ih-item square effect7 '.$css_class.'" style="background:'.$color.'; height: '.$image_height.'px; width: '.$image_width.'px;"><a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                        <div class="spinner"></div>
                                                                <div class="img"><img style="height: '.$image_height.'px; width: '.$image_width.'px;" src="'.$image[0].'"></div>
                                                                        <div class="info" style="background:'.$color.'">
                                                                <h3 style="font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.'; margin-top: '.$move_texts.'px">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                        
                                        </div></a></div>';
                }
                
                if ( $style=='square' && $square_effects=='effect8' ){
        
                        $output .= '<div class="ih-item square effect8 scale_up '.$css_class.'" style="background:'.$color.'; height: '.$image_height.'px; width: '.$image_width.'px;"><a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                        <div class="spinner"></div>
                                                                <div class="img"><img style="height: '.$image_height.'px; width: '.$image_width.'px;" src="'.$image[0].'"></div>
                                                                        <div class="info" style="background:'.$color.'">
                                                                <h3 style="font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.'; margin-top: '.$move_texts.'px">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                        
                                        </div></a></div>';
                }
                
                if ( $style=='square' && $square_effects=='effect9' ){
        
                        $output .= '<div class="ih-item square effect9 '.$animation.' '.$css_class.'" style="background:'.$color.'; height: '.$image_height.'px; width: '.$image_width.'px;"><a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                        <div class="spinner"></div>
                                                                <div class="img" style="height: '.$image_height.'px; background:'.$color.'"><img style="height: '.$image_height.'px; width: '.$image_width.'px;" src="'.$image[0].'"></div>
                                                                        <div class="info">
                                                                        <div class="info-back"  style="background:'.$color.'">
                                                                <h3 style="font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.'; margin-top: '.$move_texts.'px">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                        
                                        </div></div></a></div>';
                }
                
                if ( $style=='square' && $square_effects=='effect10' ){
        
                        $output .= '<div class="ih-item square effect10 '.$animation.' '.$css_class.'" style="background:'.$color.'; height: '.$image_height.'px; width: '.$image_width.'px;"><a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                        <div class="spinner"></div>
                                                                <div class="img"><img style="height: '.$image_height.'px; width: '.$image_width.'px;" src="'.$image[0].'"></div>
                                                                        <div class="info" style="background:'.$color.'">
                                                                <h3 style="font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.'; margin-top: '.$move_texts.'px">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                        
                                        </div></a></div>';
                }

                if ( $style=='square' && $square_effects=='effect11' ){
        
                        $output .= '<div class="ih-item square effect11 '.$animation.' '.$css_class.'" style="background:'.$color.'; height: '.$image_height.'px; width: '.$image_width.'px;"><a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                        <div class="spinner"></div>
                                                                <div class="img"><img style="height: '.$image_height.'px; width: '.$image_width.'px;" src="'.$image[0].'"></div>
                                                                        <div class="info" style="background:'.$color.'">
                                                                <h3 style="font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.'; margin-top: '.$move_texts.'px">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                        
                                        </div></a></div>';
                }
                
                if ( $style=='square' && $square_effects=='effect12' ){
        
                        $output .= '<div class="ih-item square effect12 '.$animation.' '.$css_class.'" style="background:'.$color.'; height: '.$image_height.'px; width: '.$image_width.'px;"><a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                        <div class="spinner"></div>
                                                                <div class="img"><img style="height: '.$image_height.'px; width: '.$image_width.'px;" src="'.$image[0].'"></div>
                                                                        <div class="info" style="background:'.$color.'">
                                                                <h3 style="font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.'; margin-top: '.$move_texts.'px">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                        
                                        </div></a></div>';
                }

                if ( $style=='square' && $square_effects=='effect13' ){
        
                        $output .= '<div class="ih-item square effect13 '.$animation.' '.$css_class.'" style="background:'.$color.'; height: '.$image_height.'px; width: '.$image_width.'px;"><a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                        <div class="spinner"></div>
                                                                <div class="img"><img style="height: '.$image_height.'px; width: '.$image_width.'px;" src="'.$image[0].'"></div>
                                                                        <div class="info" style="background:'.$color.'">
                                                                <h3 style="font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.'; margin-top: '.$move_texts.'px">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                        
                                        </div></a></div>';
                }

                if ( $style=='square' && $square_effects=='effect14' ){
        
                        $output .= '<div class="ih-item square effect14 '.$animation.' '.$css_class.'" style="background:'.$color.'; height: '.$image_height.'px; width: '.$image_width.'px;"><a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                        <div class="spinner"></div>
                                                                <div class="img"><img style="height: '.$image_height.'px; width: '.$image_width.'px;" src="'.$image[0].'"></div>
                                                                        <div class="info" style="background:'.$color.'">
                                                                <h3 style="font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.'; margin-top: '.$move_texts.'px">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                        
                                        </div></a></div>';
                }

                if ( $style=='square' && $square_effects=='effect15' ){
        
                        $output .= '<div class="ih-item square effect15 '.$animation.' '.$css_class.'" style="background:'.$color.'; height: '.$image_height.'px; width: '.$image_width.'px;"><a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                        <div class="spinner"></div>
                                                                <div class="img"><img style="height: '.$image_height.'px; width: '.$image_width.'px;" src="'.$image[0].'"></div>
                                                                        <div class="info" style="background:'.$color.'">
                                                                <h3 style="font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.'; margin-top: '.$move_texts.'px">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                        
                                        </div></a></div>';
                }

                if ( $style=='square2' && $square2_effects=='effect1' ){
        
                        $output .= '<a class="square2_link" href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                <div id="square-box" class="burst-circle ahe-square-teal '.$css_class.'" style="height: '.$image_height.'px; width: '.$image_width.'px;">
                                                        <div class="ahe-square"></div>
                                                        <img src="'.$image[0].'">
                                                        <h1 style="top: '.$move_texts.'%; font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.';" >'.$title.'</h1>
                                                </div></a>';
                }

                if ( $style=='square2' && $square2_effects=='effect2' ){
        
                        $output .= '<a class="square2_link" href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                <div id="square-box" class="burst-circle strawberry '.$css_class.'" style="height: '.$image_height.'px; width: '.$image_width.'px;">
                                                        <div class="ahe-square"></div>
                                                        <img src="'.$image[0].'">
                                                        <h1 style="top: '.$move_texts.'%; font-family: '.$font.'; font-size: '.$heading_font_size.'px;" >'.$title.'</h1>
                                                </div></a>';
                }

                if ( $style=='square2' && $square2_effects=='effect3' ){
        
                        $output .= '<a class="square2_link" href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                <div id="square-box" class="burst-circle grape '.$css_class.'" style="height: '.$image_height.'px; width: '.$image_width.'px;">
                                                        <div class="ahe-square"></div>
                                                        <img src="'.$image[0].'">
                                                        <h1 style="top: '.$move_texts.'%; font-family: '.$font.'; font-size: '.$heading_font_size.'px;" >'.$title.'</h1>
                                                </div></a>';
                }

                if ( $style=='square2' && $square2_effects=='effect4' ){
        
                        $output .= '<a class="square2_link" href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                <div id="square-box" class="burst-circle orange '.$css_class.'" style="height: '.$image_height.'px; width: '.$image_width.'px;">
                                                        <div class="ahe-square"></div>
                                                        <img src="'.$image[0].'">
                                                        <h1 style="top: '.$move_texts.'%; font-family: '.$font.'; font-size: '.$heading_font_size.'px;" >'.$title.'</h1>
                                                </div></a>';
                }
                
                if ( $style=='square2' && $square2_effects=='effect5' ){
        
                        $output .= '<a class="square2_link" href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                <div id="square-box" class="burst-rumb ahe-square-teal '.$css_class.'" style="height: '.$image_height.'px; width: '.$image_width.'px;">
                                                        <div class="ahe-square"></div>
                                                        <img src="'.$image[0].'">
                                                        <h1 style="top: '.$move_texts.'%; font-family: '.$font.'; font-size: '.$heading_font_size.'px;" >'.$title.'</h1>
                                                </div></a>';
                }
                
                if ( $style=='square2' && $square2_effects=='effect6' ){
        
                        $output .= '<a class="square2_link" href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                <div id="square-box" class="burst-rumb strawberry '.$css_class.'" style="height: '.$image_height.'px; width: '.$image_width.'px;">
                                                        <div class="ahe-square"></div>
                                                        <img src="'.$image[0].'">
                                                        <h1 style="top: '.$move_texts.'%; font-family: '.$font.'; font-size: '.$heading_font_size.'px;" >'.$title.'</h1>
                                                </div></a>';
                }
                
                if ( $style=='square2' && $square2_effects=='effect7' ){
        
                        $output .= '<a class="square2_link" href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                <div id="square-box" class="burst-rumb grape '.$css_class.'" style="height: '.$image_height.'px; width: '.$image_width.'px;">
                                                        <div class="ahe-square"></div>
                                                        <img src="'.$image[0].'">
                                                        <h1 style="top: '.$move_texts.'%; font-family: '.$font.'; font-size: '.$heading_font_size.'px;" >'.$title.'</h1>
                                                </div></a>';
                }
                
                if ( $style=='square2' && $square2_effects=='effect8' ){
        
                        $output .= '<a class="square2_link" href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                <div id="square-box" class="burst-rumb orange '.$css_class.'" style="height: '.$image_height.'px; width: '.$image_width.'px;">
                                                        <div class="ahe-square"></div>
                                                        <img src="'.$image[0].'">
                                                        <h1 style="top: '.$move_texts.'%; font-family: '.$font.'; font-size: '.$heading_font_size.'px;" >'.$title.'</h1>
                                                </div></a>';
                }
                
                if ( $style=='square2' && $square2_effects=='effect9' ){
        
                        $output .= '<a class="square2_link" href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                <div id="square-box" class="burst-up ahe-square-teal '.$css_class.'" style="height: '.$image_height.'px; width: '.$image_width.'px;">
                                                        <div class="ahe-square"></div>
                                                        <img src="'.$image[0].'">
                                                        <h1 style="top: '.$move_texts.'%; font-family: '.$font.'; font-size: '.$heading_font_size.'px;" >'.$title.'</h1>
                                                </div></a>';
                }
                
                if ( $style=='square2' && $square2_effects=='effect10' ){
        
                        $output .= '<a class="square2_link" href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                <div id="square-box" class="burst-up strawberry '.$css_class.'" style="height: '.$image_height.'px; width: '.$image_width.'px;">
                                                        <div class="ahe-square"></div>
                                                        <img src="'.$image[0].'">
                                                        <h1 style="top: '.$move_texts.'%; font-family: '.$font.'; font-size: '.$heading_font_size.'px;" >'.$title.'</h1>
                                                </div></a>';
                }
                
                if ( $style=='square2' && $square2_effects=='effect11' ){
        
                        $output .= '<a class="square2_link" href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                <div id="square-box" class="burst-up grape '.$css_class.'" style="height: '.$image_height.'px; width: '.$image_width.'px;">
                                                        <div class="ahe-square"></div>
                                                        <img src="'.$image[0].'">
                                                        <h1 style="top: '.$move_texts.'%; font-family: '.$font.'; font-size: '.$heading_font_size.'px;" >'.$title.'</h1>
                                                </div></a>';
                }
                
                if ( $style=='square2' && $square2_effects=='effect12' ){
        
                        $output .= '<a class="square2_link" href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                <div id="square-box" class="burst-up orange '.$css_class.'" style="height: '.$image_height.'px; width: '.$image_width.'px;">
                                                        <div class="ahe-square"></div>
                                                        <img src="'.$image[0].'">
                                                        <h1 style="top: '.$move_texts.'%; font-family: '.$font.'; font-size: '.$heading_font_size.'px;" >'.$title.'</h1>
                                                </div></a>';
                }
                
                if ( $style=='square2' && $square2_effects=='effect13' ){
        
                        $output .= '<a class="square2_link" href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                <div id="square-box" class="burst-side ahe-square-teal '.$css_class.'" style="height: '.$image_height.'px; width: '.$image_width.'px;">
                                                        <div class="ahe-square"></div>
                                                        <img src="'.$image[0].'">
                                                        <h1 style="top: '.$move_texts.'%; font-family: '.$font.'; font-size: '.$heading_font_size.'px;" >'.$title.'</h1>
                                                </div></a>';
                }
                
                if ( $style=='square2' && $square2_effects=='effect14' ){
        
                        $output .= '<a class="square2_link" href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                <div id="square-box" class="burst-side strawberry '.$css_class.'" style="height: '.$image_height.'px; width: '.$image_width.'px;">
                                                        <div class="ahe-square"></div>
                                                        <img src="'.$image[0].'">
                                                        <h1 style="top: '.$move_texts.'%; font-family: '.$font.'; font-size: '.$heading_font_size.'px;" >'.$title.'</h1>
                                                </div></a>';
                }
                
                if ( $style=='square2' && $square2_effects=='effect15' ){
        
                        $output .= '<a class="square2_link" href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                <div id="square-box" class="burst-side grape '.$css_class.'" style="height: '.$image_height.'px; width: '.$image_width.'px;">
                                                        <div class="ahe-square"></div>
                                                        <img src="'.$image[0].'">
                                                        <h1 style="top: '.$move_texts.'%; font-family: '.$font.'; font-size: '.$heading_font_size.'px;" >'.$title.'</h1>
                                                </div></a>';
                }        
                
                if ( $style=='square2' && $square2_effects=='effect16' ){
        
                        $output .= '<a class="square2_link" href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                <div id="square-box" class="burst-side orange '.$css_class.'" style="height: '.$image_height.'px; width: '.$image_width.'px;">
                                                        <div class="ahe-square"></div>
                                                        <img src="'.$image[0].'">
                                                        <h1 style="top: '.$move_texts.'%; font-family: '.$font.'; font-size: '.$heading_font_size.'px;" >'.$title.'</h1>
                                                </div></a>';
                }         
                
                if ( $style=='square2' && $square2_effects=='effect17' ){
        
                        $output .= '<a class="square2_link" href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                <div id="square-box" class="triangle ahe-square-teal '.$css_class.'" style="height: '.$image_height.'px; width: '.$image_width.'px;">
                                                        <div class="ahe-square"></div>
                                                        <img src="'.$image[0].'">
                                                        <h1 style="top: '.$move_texts.'%; font-family: '.$font.'; font-size: '.$heading_font_size.'px;" >'.$title.'</h1>
                                                </div></a>';
                }        
                
                if ( $style=='square2' && $square2_effects=='effect18' ){
        
                        $output .= '<a class="square2_link" href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                <div id="square-box" class="triangle strawberry '.$css_class.'" style="height: '.$image_height.'px; width: '.$image_width.'px;">
                                                        <div class="ahe-square"></div>
                                                        <img src="'.$image[0].'">
                                                        <h1 style="top: '.$move_texts.'%; font-family: '.$font.'; font-size: '.$heading_font_size.'px;" >'.$title.'</h1>
                                                </div></a>';
                }        
                
                if ( $style=='square2' && $square2_effects=='effect19' ){
        
                        $output .= '<a class="square2_link" href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                <div id="square-box" class="triangle grape '.$css_class.'" style="height: '.$image_height.'px; width: '.$image_width.'px;">
                                                        <div class="ahe-square"></div>
                                                        <img src="'.$image[0].'">
                                                        <h1 style="top: '.$move_texts.'%; font-family: '.$font.'; font-size: '.$heading_font_size.'px;" >'.$title.'</h1>
                                                </div></a>';
                }        
                
                if ( $style=='square2' && $square2_effects=='effect20' ){
        
                        $output .= '<a class="square2_link" href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                <div id="square-box" class="triangle orange '.$css_class.'" style="height: '.$image_height.'px; width: '.$image_width.'px;">
                                                        <div class="ahe-square"></div>
                                                        <img src="'.$image[0].'">
                                                        <h1 style="top: '.$move_texts.'%; font-family: '.$font.'; font-size: '.$heading_font_size.'px;" >'.$title.'</h1>
                                                </div></a>';
                }        
                
                
                
                
                
                if ( $style=='caption' && $caption_effects=='effect1' ){
        
                        $output .= '<div  class="wcp-caption-plugin '.$css_class.'" style="width:'.$image_width.'px; height:'.$image_height.'px;box-shadow: 1px 2px 2px #cacaca;border-radius: ;">

                <a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                
                        <div class="image-caption-box">
                                <div class="caption spaceoutleft-image captiontext" style="width:'.$image_width.'px; height:'.$image_height.'px; background-color: '.$color.'; color: ; opacity: ;">
                                                <div style="display:table; height:100%; width: 100%;">
                                                        <div style="text-align: center; padding: 5px;" class="centered-text">
                                                                <h3 style="letter-spacing: 0px; margin-top: 0px; font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.';">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                                        </div>
                                                </div>
                                </div>
                                                <img style="width:'.$image_width.'px; height:'.$image_height.'px; transition: all 1s ease; animation-duration: 1s;" src="'.$image[0].'" class="wcp-caption-image">

                                </div>
                        </a>
                </div>';
                }     
                    
                if ( $style=='caption' && $caption_effects=='effect2' ){
        
                        $output .= '<div  class="wcp-caption-plugin '.$css_class.'" style="width:'.$image_width.'px; height:'.$image_height.'px;box-shadow: 1px 2px 2px #cacaca;border-radius: ;">

                <a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                
                        <div class="image-caption-box">
                                <div class="caption spaceoutup-image captiontext" style="width:'.$image_width.'px; height:'.$image_height.'px; background-color: '.$color.'; color: ; opacity: ;">
                                                <div style="display:table; height:100%; width: 100%;">
                                                        <div style="text-align: center; padding: 5px;" class="centered-text">
                                                                <h3 style="letter-spacing: 0px; margin-top: 0px; font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.';">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                                        </div>
                                                </div>
                                </div>
                                                <img style="width:'.$image_width.'px; height:'.$image_height.'px; transition: all 1s ease; animation-duration: 1s;" src="'.$image[0].'" class="wcp-caption-image">

                                </div>
                        </a>
                </div>';
                }        
                
                if ( $style=='caption' && $caption_effects=='effect3' ){
        
                        $output .= '<div  class="wcp-caption-plugin '.$css_class.'" style="width:'.$image_width.'px; height:'.$image_height.'px;box-shadow: 1px 2px 2px #cacaca;border-radius: ;">

                <a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                
                        <div class="image-caption-box">
                                <div class="caption spaceoutdown-image captiontext" style="width:'.$image_width.'px; height:'.$image_height.'px; background-color: '.$color.'; color: ; opacity: ;">
                                                <div style="display:table; height:100%; width: 100%;">
                                                        <div style="text-align: center; padding: 5px;" class="centered-text">
                                                                <h3 style="letter-spacing: 0px; margin-top: 0px; font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.';">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                                        </div>
                                                </div>
                                </div>
                                                <img style="width:'.$image_width.'px; height:'.$image_height.'px; transition: all 1s ease; animation-duration: 1s;" src="'.$image[0].'" class="wcp-caption-image">

                                </div>
                        </a>
                </div>';
                }        
                
                if ( $style=='caption' && $caption_effects=='effect4' ){
        
                        $output .= '<div  class="wcp-caption-plugin '.$css_class.'" style="width:'.$image_width.'px; height:'.$image_height.'px;box-shadow: 1px 2px 2px #cacaca;border-radius: ;">

                <a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                
                        <div class="image-caption-box">
                                <div class="caption spaceoutright-image captiontext" style="width:'.$image_width.'px; height:'.$image_height.'px; background-color: '.$color.'; color: ; opacity: ;">
                                                <div style="display:table; height:100%; width: 100%;">
                                                        <div style="text-align: center; padding: 5px;" class="centered-text">
                                                                <h3 style="letter-spacing: 0px; margin-top: 0px; font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.';">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                                        </div>
                                                </div>
                                </div>
                                                <img style="width:'.$image_width.'px; height:'.$image_height.'px; transition: all 1s ease; animation-duration: 1s;" src="'.$image[0].'" class="wcp-caption-image">

                                </div>
                        </a>
                </div>';
                } 
                
                if ( $style=='caption' && $caption_effects=='effect5' ){
        
                        $output .= '<div  class="wcp-caption-plugin '.$css_class.'" style="width:'.$image_width.'px; height:'.$image_height.'px;box-shadow: 1px 2px 2px #cacaca;border-radius: ;">

                <a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                
                        <div class="image-caption-box" style="perspective: 2500px; perspective-origin: 50% 50%;">
                                <div class="caption flip-image-horizontal captiontext" style="width:'.$image_width.'px; height:'.$image_height.'px; background-color: '.$color.'; color: ; opacity: ;">
                                                <div style="display:table; height:100%; width: 100%;">
                                                        <div style="text-align: center; padding: 5px;" class="centered-text">
                                                                <h3 style="letter-spacing: 0px; margin-top: 0px; font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.';">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                                        </div>
                                                </div>
                                </div>
                                                <img style="width:'.$image_width.'px; height:'.$image_height.'px; transition: all 1s ease; animation-duration: 1s;" src="'.$image[0].'" class="wcp-caption-image">

                                </div>
                        </a>
                </div>';
                }        
                
                if ( $style=='caption' && $caption_effects=='effect6' ){
        
                        $output .= '<div  class="wcp-caption-plugin '.$css_class.'" style="width:'.$image_width.'px; height:'.$image_height.'px;box-shadow: 1px 2px 2px #cacaca;border-radius: ;">

                <a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                
                        <div class="image-caption-box" style="perspective: 2500px; perspective-origin: 50% 50%;">
                                <div class="caption flip-image-horizontal captiontext" style="width:'.$image_width.'px; height:'.$image_height.'px; background-color: '.$color.'; color: ; opacity: ;">
                                                <div style="display:table; height:100%; width: 100%;">
                                                        <div style="text-align: center; padding: 5px;" class="centered-text">
                                                                <h3 style="letter-spacing: 0px; margin-top: 0px; font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.';">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                                        </div>
                                                </div>
                                </div>
                                                <img style="width:'.$image_width.'px; height:'.$image_height.'px; transition: all 1s ease; animation-duration: 1s;" src="'.$image[0].'" class="wcp-caption-image">

                                </div>
                        </a>
                </div>';
                }
                

                if ( $style=='caption' && $caption_effects=='effect7' ){
        
                        $output .= '<div  class="wcp-caption-plugin '.$css_class.'" style="width:'.$image_width.'px; height:'.$image_height.'px;box-shadow: 1px 2px 2px #cacaca;border-radius: ;">

                <a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                
                        <div class="image-caption-box" style="perspective: 2500px; perspective-origin: 50% 50%;">
                                <div class="caption page-turn-from-top captiontext" style="width:'.$image_width.'px; height:'.$image_height.'px; background-color: '.$color.'; color: ; opacity: ;">
                                                <div style="display:table; height:100%; width: 100%;">
                                                        <div style="text-align: center; padding: 5px;" class="centered-text">
                                                                <h3 style="letter-spacing: 0px; margin-top: 0px; font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.';">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                                        </div>
                                                </div>
                                </div>
                                                <img style="width:'.$image_width.'px; height:'.$image_height.'px; transition: all 1s ease; animation-duration: 1s;" src="'.$image[0].'" class="wcp-caption-image">

                                </div>
                        </a>
                </div>';
                }       
                
                                
                if ( $style=='caption' && $caption_effects=='effect8' ){
        
                        $output .= '<div  class="wcp-caption-plugin '.$css_class.'" style="width:'.$image_width.'px; height:'.$image_height.'px;box-shadow: 1px 2px 2px #cacaca;border-radius: ;">

                <a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                
                        <div class="image-caption-box" style="perspective: 2500px; perspective-origin: 50% 50%;">
                                <div class="caption page-turn-from-bottom captiontext" style="width:'.$image_width.'px; height:'.$image_height.'px; background-color: '.$color.'; color: ; opacity: ;">
                                                <div style="display:table; height:100%; width: 100%;">
                                                        <div style="text-align: center; padding: 5px;" class="centered-text">
                                                                <h3 style="letter-spacing: 0px; margin-top: 0px; font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.';">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                                        </div>
                                                </div>
                                </div>
                                                <img style="width:'.$image_width.'px; height:'.$image_height.'px; transition: all 1s ease; animation-duration: 1s;" src="'.$image[0].'" class="wcp-caption-image">

                                </div>
                        </a>
                </div>';
                }        
                
                if ( $style=='caption' && $caption_effects=='effect9' ){
        
                        $output .= '<div  class="wcp-caption-plugin '.$css_class.'" style="width:'.$image_width.'px; height:'.$image_height.'px;box-shadow: 1px 2px 2px #cacaca;border-radius: ;">

                <a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                
                        <div class="image-caption-box">
                                <div class="caption swap-caption captiontext" style="width:'.$image_width.'px; height:'.$image_height.'px; background-color: '.$color.'; color: ; opacity: ;">
                                                <div style="display:table; height:100%; width: 100%;">
                                                        <div style="text-align: center; padding: 5px;" class="centered-text">
                                                                <h3 style="letter-spacing: 0px; margin-top: 0px; font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.';">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                                        </div>
                                                </div>
                                </div>
                                                <img style="width:'.$image_width.'px; height:'.$image_height.'px; transition: all 1s ease; animation-duration: 1s;" src="'.$image[0].'" class="wcp-caption-image">

                                </div>
                        </a>
                </div>';
                }        
                
                if ( $style=='caption' && $caption_effects=='effect10' ){
        
                        $output .= '<div  class="wcp-caption-plugin '.$css_class.'" style="width:'.$image_width.'px; height:'.$image_height.'px;box-shadow: 1px 2px 2px #cacaca;border-radius: ;">

                <a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                
                        <div class="image-caption-box">
                                <div class="caption rotateup-image captiontext" style="width:'.$image_width.'px; height:'.$image_height.'px; background-color: '.$color.'; color: ; opacity: ;">
                                                <div style="display:table; height:100%; width: 100%;">
                                                        <div style="text-align: center; padding: 5px;" class="centered-text">
                                                                <h3 style="letter-spacing: 0px; margin-top: 0px; font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.';">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                                        </div>
                                                </div>
                                </div>
                                                <img style="width:'.$image_width.'px; height:'.$image_height.'px; transition: all 1s ease; animation-duration: 1s;" src="'.$image[0].'" class="wcp-caption-image">

                                </div>
                        </a>
                </div>';
                } 
                
                
                if ( $style=='caption' && $caption_effects=='effect11' ){
        
                        $output .= '<div  class="wcp-caption-plugin '.$css_class.'" style="width:'.$image_width.'px; height:'.$image_height.'px;box-shadow: 1px 2px 2px #cacaca;border-radius: ;">

                <a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                
                        <div class="image-caption-box">
                                <div class="caption rotatedown-image captiontext" style="width:'.$image_width.'px; height:'.$image_height.'px; background-color: '.$color.'; color: ; opacity: ;">
                                                <div style="display:table; height:100%; width: 100%;">
                                                        <div style="text-align: center; padding: 5px;" class="centered-text">
                                                                <h3 style="letter-spacing: 0px; margin-top: 0px; font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.';">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                                        </div>
                                                </div>
                                </div>
                                                <img style="width:'.$image_width.'px; height:'.$image_height.'px; transition: all 1s ease; animation-duration: 1s;" src="'.$image[0].'" class="wcp-caption-image">

                                </div>
                        </a>
                </div>';
                }        
                
                if ( $style=='caption' && $caption_effects=='effect12' ){
        
                        $output .= '<div  class="wcp-caption-plugin '.$css_class.'" style="width:'.$image_width.'px; height:'.$image_height.'px;box-shadow: 1px 2px 2px #cacaca;border-radius: ;">

                <a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                
                        <div class="image-caption-box">
                                <div class="caption fall-down-image captiontext" style="width:'.$image_width.'px; height:'.$image_height.'px; background-color: '.$color.'; color: ; opacity: ;">
                                                <div style="display:table; height:100%; width: 100%;">
                                                        <div style="text-align: center; padding: 5px;" class="centered-text">
                                                                <h3 style="letter-spacing: 0px; margin-top: 0px; font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.';">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                                        </div>
                                                </div>
                                </div>
                                                <img style="width:'.$image_width.'px; height:'.$image_height.'px; transition: all 1s ease; animation-duration: 1s;" src="'.$image[0].'" class="wcp-caption-image">

                                </div>
                        </a>
                </div>';
                }        
                
                if ( $style=='caption' && $caption_effects=='effect13' ){
        
                        $output .= '<div  class="wcp-caption-plugin '.$css_class.'" style="width:'.$image_width.'px; height:'.$image_height.'px;box-shadow: 1px 2px 2px #cacaca;border-radius: ;">

                <a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                
                        <div class="image-caption-box">
                                <div class="caption zoom-image-out-caption-twist captiontext" style="width:'.$image_width.'px; height:'.$image_height.'px; background-color: '.$color.'; color: ; opacity: ;">
                                                <div style="display:table; height:100%; width: 100%;">
                                                        <div style="text-align: center; padding: 5px;" class="centered-text">
                                                                <h3 style="letter-spacing: 0px; margin-top: 0px; font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.';">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                                        </div>
                                                </div>
                                </div>
                                                <img style="width:'.$image_width.'px; height:'.$image_height.'px; transition: all 1s ease; animation-duration: 1s;" src="'.$image[0].'" class="wcp-caption-image">

                                </div>
                        </a>
                </div>';
                }                        

                if ( $style=='caption' && $caption_effects=='effect14' ){
        
                        $output .= '<div  class="wcp-caption-plugin '.$css_class.'" style="width:'.$image_width.'px; height:'.$image_height.'px;box-shadow: 1px 2px 2px #cacaca;border-radius: ;">

                <a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                
                        <div class="image-caption-box">
                                <div class="caption opendoorup-image captiontext" style="width:'.$image_width.'px; height:'.$image_height.'px; background-color: '.$color.'; color: ; opacity: ;">
                                                <div style="display:table; height:100%; width: 100%;">
                                                        <div style="text-align: center; padding: 5px;" class="centered-text">
                                                                <h3 style="letter-spacing: 0px; margin-top: 0px; font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.';">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                                        </div>
                                                </div>
                                </div>
                                                <img style="width:'.$image_width.'px; height:'.$image_height.'px; transition: all 1s ease; animation-duration: 1s;" src="'.$image[0].'" class="wcp-caption-image">

                                </div>
                        </a>
                </div>';
                }        
                
                if ( $style=='caption' && $caption_effects=='effect15' ){
        
                        $output .= '<div  class="wcp-caption-plugin '.$css_class.'" style="width:'.$image_width.'px; height:'.$image_height.'px;box-shadow: 1px 2px 2px #cacaca;border-radius: ;">

                <a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                
                        <div class="image-caption-box">
                                <div class="caption tinright-image captiontext" style="width:'.$image_width.'px; height:'.$image_height.'px; background-color: '.$color.'; color: ; opacity: ;">
                                                <div style="display:table; height:100%; width: 100%;">
                                                        <div style="text-align: center; padding: 5px;" class="centered-text">
                                                                <h3 style="letter-spacing: 0px; margin-top: 0px; font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.';">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                                        </div>
                                                </div>
                                </div>
                                                <img style="width:'.$image_width.'px; height:'.$image_height.'px; transition: all 1s ease; animation-duration: 1s;" src="'.$image[0].'" class="wcp-caption-image">

                                </div>
                        </a>
                </div>';
                }

                if ( $style=='caption' && $caption_effects=='effect16' ){
        
                        $output .= '<div  class="wcp-caption-plugin '.$css_class.'" style="width:'.$image_width.'px; height:'.$image_height.'px;box-shadow: 1px 2px 2px #cacaca;border-radius: ;">

                <a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                
                        <div class="image-caption-box">
                                <div class="caption rotateleft-image captiontext" style="width:'.$image_width.'px; height:'.$image_height.'px; background-color: '.$color.'; color: ; opacity: ;">
                                                <div style="display:table; height:100%; width: 100%;">
                                                        <div style="text-align: center; padding: 5px;" class="centered-text">
                                                                <h3 style="letter-spacing: 0px; margin-top: 0px; font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.';">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                                        </div>
                                                </div>
                                </div>
                                                <img style="width:'.$image_width.'px; height:'.$image_height.'px; transition: all 1s ease; animation-duration: 1s;" src="'.$image[0].'" class="wcp-caption-image">

                                </div>
                        </a>
                </div>';
                }

                if ( $style=='caption' && $caption_effects=='effect17' ){
        
                        $output .= '<div  class="wcp-caption-plugin '.$css_class.'" style="width:'.$image_width.'px; height:'.$image_height.'px;box-shadow: 1px 2px 2px #cacaca;border-radius: ;">

                <a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                
                        <div class="image-caption-box">
                                <div class="caption opendoorleft-image captiontext" style="width:'.$image_width.'px; height:'.$image_height.'px; background-color: '.$color.'; color: ; opacity: ;">
                                                <div style="display:table; height:100%; width: 100%;">
                                                        <div style="text-align: center; padding: 5px;" class="centered-text">
                                                                <h3 style="letter-spacing: 0px; margin-top: 0px; font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.';">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                                        </div>
                                                </div>
                                </div>
                                                <img style="width:'.$image_width.'px; height:'.$image_height.'px; transition: all 1s ease; animation-duration: 1s;" src="'.$image[0].'" class="wcp-caption-image">

                                </div>
                        </a>
                </div>';
                }

                if ( $style=='caption' && $caption_effects=='effect18' ){
        
                        $output .= '<div  class="wcp-caption-plugin '.$css_class.'" style="width:'.$image_width.'px; height:'.$image_height.'px;box-shadow: 1px 2px 2px #cacaca;border-radius: ;">

                <a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                
                        <div class="image-caption-box">
                                <div class="caption simple-fade captiontext" style="width:'.$image_width.'px; height:'.$image_height.'px; background-color: '.$color.'; color: ; opacity: ;">
                                                <div style="display:table; height:100%; width: 100%;">
                                                        <div style="text-align: center; padding: 5px;" class="centered-text">
                                                                <h3 style="letter-spacing: 0px; margin-top: 0px; font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.';">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                                        </div>
                                                </div>
                                </div>
                                                <img style="width:'.$image_width.'px; height:'.$image_height.'px; transition: all 1s ease; animation-duration: 1s;" src="'.$image[0].'" class="wcp-caption-image">

                                </div>
                        </a>
                </div>';
                }

                if ( $style=='caption' && $caption_effects=='effect19' ){
        
                        $output .= '<div  class="wcp-caption-plugin '.$css_class.'" style="width:'.$image_width.'px; height:'.$image_height.'px;box-shadow: 1px 2px 2px #cacaca;border-radius: ;">

                <a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                
                        <div class="image-caption-box">
                                <div class="caption foolish-image captiontext" style="width:'.$image_width.'px; height:'.$image_height.'px; background-color: '.$color.'; color: ; opacity: ;">
                                                <div style="display:table; height:100%; width: 100%;">
                                                        <div style="text-align: center; padding: 5px;" class="centered-text">
                                                                <h3 style="letter-spacing: 0px; margin-top: 0px; font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.';">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                                        </div>
                                                </div>
                                </div>
                                                <img style="width:'.$image_width.'px; height:'.$image_height.'px; transition: all 1s ease; animation-duration: 1s;" src="'.$image[0].'" class="wcp-caption-image">

                                </div>
                        </a>
                </div>';
                }

                if ( $style=='caption' && $caption_effects=='effect20' ){
        
                        $output .= '<div  class="wcp-caption-plugin '.$css_class.'" style="width:'.$image_width.'px; height:'.$image_height.'px;box-shadow: 1px 2px 2px #cacaca;border-radius: ;">

                <a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                
                        <div class="image-caption-box">
                                <div class="caption opendoorright-image captiontext" style="width:'.$image_width.'px; height:'.$image_height.'px; background-color: '.$color.'; color: ; opacity: ;">
                                                <div style="display:table; height:100%; width: 100%;">
                                                        <div style="text-align: center; padding: 5px;" class="centered-text">
                                                                <h3 style="letter-spacing: 0px; margin-top: 0px; font-family: '.$font.'; font-size: '.$heading_font_size.'px; color:'.$heading_color.';">'.$title.'</h3>
                                                                <p style="font-family: '.$font.'; font-size: '.$desc_font_size.'px; color:'.$desc_color.';">'.$description.'</p>
                                                        </div>
                                                </div>
                                </div>
                                                <img style="width:'.$image_width.'px; height:'.$image_height.'px; transition: all 1s ease; animation-duration: 1s;" src="'.$image[0].'" class="wcp-caption-image">

                                </div>
                        </a>
                </div>';
                }

                if ( $style=='jibon' && $jibon_effects=='effect1' ){
        
                        $output .= '<div class="style4">
                                                        <div style="max-width: '.$image_width.'px; max-height: '.$image_height.'px;" class="pic">
                                                <a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                <img src="'.$image[0].'" class="pic-image">
                                                        <span class="pic-caption top-to-bottom">
                                                                <h1 style="font-size: '.$heading_font_size.'px; font-family: '.$font.'; color: '.$heading_color.';" class="pic-title">'.$title.'</h1>
                                                                <p style="font-size: 13px; font-family: '.$font.'; color: '.$desc_color.';">'.$description.'</p>
                                                        </span>
                                                </a>
                                                </div>
                                        </div>';
                }

                if ( $style=='jibon' && $jibon_effects=='effect2' ){
        
                        $output .= '<div class="style4">
                                                        <div style="max-width: '.$image_width.'px; max-height: '.$image_height.'px;" class="pic">
                                                <a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                <img src="'.$image[0].'" class="pic-image">
                                                        <span class="pic-caption bottom-to-top">
                                                                <h1 style="font-size: '.$heading_font_size.'px; font-family: '.$font.'; color: '.$heading_color.';" class="pic-title">'.$title.'</h1>
                                                                <p style="font-size: 13px; font-family: '.$font.'; color: '.$desc_color.';">'.$description.'</p>
                                                        </span>
                                                </a>
                                                </div>
                                        </div>';
                                        
                }          

                if ( $style=='jibon' && $jibon_effects=='effect3' ){
        
                        $output .= '<div class="style4">
                                                        <div style="max-width: '.$image_width.'px; max-height: '.$image_height.'px;" class="pic">
                                                <a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                <img src="'.$image[0].'" class="pic-image">
                                                        <span class="pic-caption left-to-right">
                                                                <h1 style="font-size: '.$heading_font_size.'px; font-family: '.$font.'; color: '.$heading_color.';" class="pic-title">'.$title.'</h1>
                                                                <p style="font-size: 13px; font-family: '.$font.'; color: '.$desc_color.';">'.$description.'</p>
                                                        </span>
                                                </a>
                                                </div>
                                        </div>';
                                        
                }
                
                if ( $style=='jibon' && $jibon_effects=='effect4' ){
        
                        $output .= '<div class="style4">
                                                        <div style="max-width: '.$image_width.'px; max-height: '.$image_height.'px;" class="pic">
                                                <a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                <img src="'.$image[0].'" class="pic-image">
                                                        <span class="pic-caption right-to-left">
                                                                <h1 style="font-size: '.$heading_font_size.'px; font-family: '.$font.'; color: '.$heading_color.';" class="pic-title">'.$title.'</h1>
                                                                <p style="font-size: 13px; font-family: '.$font.'; color: '.$desc_color.';">'.$description.'</p>
                                                        </span>
                                                </a>
                                                </div>
                                        </div>';
                                        
                }

                if ( $style=='jibon' && $jibon_effects=='effect5' ){
        
                        $output .= '<div class="style4">
                                                        <div style="max-width: '.$image_width.'px; max-height: '.$image_height.'px;" class="pic">
                                                <a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                <img src="'.$image[0].'" class="pic-image">
                                                        <span class="pic-caption rotate-in">
                                                                <h1 style="font-size: '.$heading_font_size.'px; font-family: '.$font.'; color: '.$heading_color.';" class="pic-title">'.$title.'</h1>
                                                                <p style="font-size: 13px; font-family: '.$font.'; color: '.$desc_color.';">'.$description.'</p>
                                                        </span>
                                                </a>
                                                </div>
                                        </div>';
                                        
                }
                if ( $style=='jibon' && $jibon_effects=='effect6' ){
        
                        $output .= '<div class="style4">
                                                        <div style="max-width: '.$image_width.'px; max-height: '.$image_height.'px;" class="pic">
                                                <a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                <img src="'.$image[0].'" class="pic-image">
                                                        <span class="pic-caption rotate-out">
                                                                <h1 style="font-size: '.$heading_font_size.'px; font-family: '.$font.'; color: '.$heading_color.';" class="pic-title">'.$title.'</h1>
                                                                <p style="font-size: 13px; font-family: '.$font.'; color: '.$desc_color.';">'.$description.'</p>
                                                        </span>
                                                </a>
                                                </div>
                                        </div>';
                                        
                }
                if ( $style=='jibon' && $jibon_effects=='effect7' ){
        
                        $output .= '<div class="style4">
                                                        <div style="max-width: '.$image_width.'px; max-height: '.$image_height.'px;" class="pic">
                                                <a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                <img src="'.$image[0].'" class="pic-image">
                                                        <span class="pic-caption open-up">
                                                                <h1 style="font-size: '.$heading_font_size.'px; font-family: '.$font.'; color: '.$heading_color.';" class="pic-title">'.$title.'</h1>
                                                                <p style="font-size: 13px; font-family: '.$font.'; color: '.$desc_color.';">'.$description.'</p>
                                                        </span>
                                                </a>
                                                </div>
                                        </div>';
                                        
                }

                if ( $style=='jibon' && $jibon_effects=='effect8' ){
        
                        $output .= '<div class="style4">
                                                        <div style="max-width: '.$image_width.'px; max-height: '.$image_height.'px;" class="pic">
                                                <a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                <img src="'.$image[0].'" class="pic-image">
                                                        <span class="pic-caption open-down">
                                                                <h1 style="font-size: '.$heading_font_size.'px; font-family: '.$font.'; color: '.$heading_color.';" class="pic-title">'.$title.'</h1>
                                                                <p style="font-size: 13px; font-family: '.$font.'; color: '.$desc_color.';">'.$description.'</p>
                                                        </span>
                                                </a>
                                                </div>
                                        </div>';
                                        
                }
                if ( $style=='jibon' && $jibon_effects=='effect9' ){
        
                        $output .= '<div class="style4">
                                                        <div style="max-width: '.$image_width.'px; max-height: '.$image_height.'px;" class="pic">
                                                <a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                <img src="'.$image[0].'" class="pic-image">
                                                        <span class="pic-caption open-left">
                                                                <h1 style="font-size: '.$heading_font_size.'px; font-family: '.$font.'; color: '.$heading_color.';" class="pic-title">'.$title.'</h1>
                                                                <p style="font-size: 13px; font-family: '.$font.'; color: '.$desc_color.';">'.$description.'</p>
                                                        </span>
                                                </a>
                                                </div>
                                        </div>';
                                        
                }
                if ( $style=='jibon' && $jibon_effects=='effect10' ){
        
                        $output .= '<div class="style4">
                                                        <div style="max-width: '.$image_width.'px; max-height: '.$image_height.'px;" class="pic">
                                                <a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                <img src="'.$image[0].'" class="pic-image">
                                                        <span class="pic-caption open-right">
                                                                <h1 style="font-size: '.$heading_font_size.'px; font-family: '.$font.'; color: '.$heading_color.';" class="pic-title">'.$title.'</h1>
                                                                <p style="font-size: 13px; font-family: '.$font.'; color: '.$desc_color.';">'.$description.'</p>
                                                        </span>
                                                </a>
                                                </div>
                                        </div>';
                                        
                }
                if ( $style=='jibon' && $jibon_effects=='effect11' ){
        
                        $output .= '<div class="style4">
                                                        <div style="max-width: '.$image_width.'px; max-height: '.$image_height.'px;" class="pic">
                                                <a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                <img src="'.$image[0].'" class="pic-image">
                                                        <span class="pic-caption come-left">
                                                                <h1 style="font-size: '.$heading_font_size.'px; font-family: '.$font.'; color: '.$heading_color.';" class="pic-title">'.$title.'</h1>
                                                                <p style="font-size: 13px; font-family: '.$font.'; color: '.$desc_color.';">'.$description.'</p>
                                                        </span>
                                                </a>
                                                </div>
                                        </div>';
                                        
                }
                if ( $style=='jibon' && $jibon_effects=='effect12' ){
        
                        $output .= '<div class="style4">
                                                        <div style="max-width: '.$image_width.'px; max-height: '.$image_height.'px;" class="pic">
                                                <a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">
                                                <img src="'.$image[0].'" class="pic-image">
                                                        <span class="pic-caption come-right">
                                                                <h1 style="font-size: '.$heading_font_size.'px; font-family: '.$font.'; color: '.$heading_color.';" class="pic-title">'.$title.'</h1>
                                                                <p style="font-size: 13px; font-family: '.$font.'; color: '.$desc_color.';">'.$description.'</p>
                                                        </span>
                                                </a>
                                                </div>
                                        </div>';
                                        
                }
                
        return $output;
 }

        add_shortcode('akc_hover', 'akc_hover_effects');    

