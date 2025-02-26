<?php

vc_map( 

array(
    "name" => __( "Advanced Hover Effects", "aheiw" ),
    "base" => "aheiw_adv_hvr_efc_wb_th",
    "class" => "",
    "icon"        => "asvc_hover_effects_icon",
    "category" => __( "Advanced Hover Effects", "aheiw"),
    "description" => __( "Image On Advanced Hover Effects", "aheiw"),
    "params" => array(
    
    array(
        "type"              => "dropdown",
        "heading"           => __( "Select Style", "aheiw" ),
        "param_name"        => "cihwva_cr_style",
        "value"             => array(
            __( 'Style 1', "aheiw" )        => "style-one",
            __( 'Style 2', "aheiw" )        => "style-two",
            __( 'Style 3', "aheiw" )        => "style-four",
            __( 'Style 4', "aheiw" )        => "style-five",
            __( 'Style 5', "aheiw" )        => "style-six",
            __( 'Style 6', "aheiw" )        => "style-eight",
            __( 'Style 7', "aheiw" )        => "style-nine",
            __( 'Style 8', "aheiw" )        => "style-eleven",
            __( 'Style 9', "aheiw" )        => "style-twelve",
            __( 'Style 10', "aheiw" )        => "style-Thirteen",


        ),
        "admin_label"        => true,
    ),                      
    
    array(
        "type" => "attach_image",
        "heading" => __("Image", "aheiw"),
        "param_name" => "cihwva_cr_image",
        "value" => "",
        "description" => __("select image", "aheiw")
    ),            
    array(
        "type" => "textfield",
        "heading" => __("Title", "aheiw"),
        "param_name" => "cihwva_cr_title",
        "value" => "John Doe",
    ),
    array(
        "type"          => "textarea_html",
        "heading"       => __("Description", "aheiw"),
        "param_name"    => "content",
        "value"         => "<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr.</p>",
        "dependency"    => array( 'element' => "cihwva_cr_style", 'value' => array('style-two', 'style-three','style-five','style-eleven') ),
    ),
    array(
        'type' => 'iconpicker',
        'heading' => __( 'Icon', 'aheiw' ),
        'param_name' => 'cihwva_cr_icon',
        'value' => 'fa fa-check-square',
        // default value to backend editor admin_label
        'settings' => array(
        'emptyIcon' => false,
        // default true, display an "EMPTY" icon?
        'iconsPerPage' => 4000,
        // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
        'type' => 'fontawesome',
                    ),
        'description' => __( 'Select icon from library.', 'aheiw' ),
        "dependency"    => array( 'element' => "cihwva_cr_style", 'value' => array('style', 'style-four','style-six') ),
        ),
    array(
        'type' => 'textfield',
        'heading' => __( 'icon Size', 'aheiw' ),
        'param_name' => 'cihwva_cr_icon_size',
        'description' => __( 'px', 'aheiw' ),
        'value' => '',
        "dependency"    => array( 'element' => "cihwva_cr_style", 'value' => array('style', 'style-four','style-four','style-six') ),

        ),
    array(
        "type"              => "colorpicker",
        "heading"           => __( "Icon Color", "aheiw" ),
        "param_name"        => "cihwva_cr_icon_color",
        "value"             => '',
        "group"             => "Settings",
        "description" => __("This ios also title hover color", "aheiw"),
        "dependency"    => array( 'element' => "cihwva_cr_style", 'value' => array('style', 'style-four','style-four','style-six') ),
        ),
    array(
        'type' => 'textfield',
        'heading' => __( 'Add a Link To The Image', 'aheiw' ),
        'param_name' => 'image_link',
        'description' => __( 'If dont want to link,just leave it empty', 'aheiw' ),
        'value' => '#',
        "dependency"    => array( 'element' => "cihwva_cr_style", 'value' => array('style-one', 'style-four','style-five','style-four','style-six','style-nine','style-eleven','style-Thirteen') ),
        ),
    array(
        "type"              => "dropdown",
        "heading"           => __( "Link Open In", "aheiw" ),
        "param_name"        => "cihwva_cr_open_window",
        "value"             => array(
            __( 'Same Window', "aheiw" )   => "",
            __( 'New Window', "aheiw" )  => "_blank",

        ),
        "dependency"    => array( 'element' => "cihwva_cr_style", 'value' => array('style-one', 'style-four','style-five','style-four','style-six','style-nine','style-eleven','style-Thirteen') ),
    ),
    // Social Group
    array(
            'type' => 'param_group',
            'heading' => __( 'Social Links', 'aheiw' ),
            'param_name' => 'cihwva_cr_social_links',
            "dependency"    => array( 'element' => "cihwva_cr_style", 'value' => array('style-two', 'style-three','style-eleven') ),

            'params' => array(
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Social Link URL', 'aheiw' ),
                    'param_name' => 'social_link_url',
                    'description' => __( '', 'aheiw' ),
                    'value' => 'https://www.facebook.com/',

                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => __( 'Social icon', 'aheiw' ),
                    'param_name' => 'social_icon',
                    'value' => 'fa fa-check-square',
                    // default value to backend editor admin_label
                    'settings' => array(
                        'emptyIcon' => false,
                        // default true, display an "EMPTY" icon?
                        'iconsPerPage' => 4000,
                        // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
                        'type' => 'fontawesome',
                    ),
                    'description' => __( 'Select icon from library.', 'aheiw' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Social icon Size', 'aheiw' ),
                    'param_name' => 'social_icon_size',
                    'description' => __( '', 'aheiw' ),
                    'value' => '',

                ),
                array(
                    "type"              => "colorpicker",
                    "heading"           => __( "Icon Color", "aheiw" ),
                    "param_name"        => "sc_icon_color",
                    "value"             => '',
                    //"description" => __("default color is #ffffff", "aheiw"),
                ),
                //array(
                 //   "type"              => "colorpicker",
                 //   "heading"           => __( "Icon Color on Hover", "aheiw" ),
                 //   "param_name"        => "sc_icon_color_hvr",
                 //   "value"             => '',
                    //"description" => __("default color is #ffffff", "aheiw"),
                //),
                //array(
                   // "type"              => "colorpicker",
                   // "heading"           => __( "Icon Background", "aheiw" ),
                   // "param_name"        => "sc_icon_color_bg",
                  //  "value"             => '',
                    //"description" => __("default color is #ffffff", "aheiw"),
               // ),
                //array(
                //    "type"              => "colorpicker",
                //    "heading"           => __( "Icon Background On Hover", "aheiw" ),
                 //   "param_name"        => "sc_icon_color_bg_hvr",
                 //   "value"             => '',
                    //"description" => __("default color is #ffffff", "aheiw"),
               // ),
            ),
        ),
    array(
            'type' => 'param_group',
            'heading' => __( 'Links', 'aheiw' ),
            'param_name' => 'cihwva_cr_custom_links',
            "dependency"    => array( 'element' => "cihwva_cr_style", 'value' => array('style-twelve','style-Thirteen') ),

            'params' => array(
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Link Text', 'aheiw' ),
                    'param_name' => 'link_txt',
                    'description' => __( '', 'aheiw' ),
                    'value' => 'https://www.facebook.com/',

                ),

                array(
                    'type' => 'textfield',
                    'heading' => __( 'Link URL', 'aheiw' ),
                    'param_name' => 'link_url',
                    'description' => __( '', 'aheiw' ),
                    'value' => '#',
                ),

            ),
        ),
    array(
        "type"              => "colorpicker",
        "heading"           => __( "Overlay Color", "aheiw" ),
        "param_name"        => "cihwva_cr_ovrlay_color",
        "value"             => '',
        "description"       => __("Overlay background/border/ color", "aheiw"),
        //"description" => __("default color is #ffffff", "aheiw"),
        "group"             => "Settings",
        "dependency"    => array( 'element' => "cihwva_cr_style", 'value' => array('style-two','style-four','style-five','style-six','style-nine','style-eleven','style-twelve') ),
    ),

    array(
        "type"              => "colorpicker",
        "heading"           => __( "Overlay Color", "aheiw" ),
        "param_name"        => "cihwva_cr_ovrlay_color_1",
        "value"             => '',
        //"description" => __("default color is #ffffff", "cihwva_cr"),
        "group"             => "Settings",
        "dependency"    => array( 'element' => "cihwva_cr_style", 'value' => array('style-three','style-Thirteen') ),
    ),
    array(
        "type"              => "colorpicker",
        "heading"           => __( "Overlay Graddient Color 1", "aheiw" ),
        "param_name"        => "cihwva_cr_ovrlay_grd_1",
        "value"             => '',
        //"description" => __("default color is #ffffff", "aheiw"),
        "group"             => "Settings",
        "dependency"    => array( 'element' => "cihwva_cr_style", 'value' => array('style-three','style-Thirteen') ),
    ),
    array(
        "type"              => "colorpicker",
        "heading"           => __( "Overlay Graddient Color 2", "aheiw" ),
        "param_name"        => "cihwva_cr_ovrlay_grd_2",
        "value"             => '',
        //"description" => __("default color is #ffffff", "aheiw"),
        "group"             => "Settings",
        "dependency"    => array( 'element' => "cihwva_cr_style", 'value' => array('style-three','style-Thirteen') ),
    ),

    array(
        "type"              => "textfield",
        "heading"           => __( "Title Font Size", "aheiw" ),
        "param_name"        => "cihwva_cr_title_font_size",
        "value"             => '21',
        "description" => __("default value is 21px", "aheiw"),
        "group"             => "Settings",
    ),
    array(
        "type"              => "colorpicker",
        "heading"           => __( "Title Color", "aheiw" ),
        "param_name"        => "cihwva_cr_title_color",
        "value"             => '',
        "group"             => "Settings",
    ),
    array(
        "type"              => "dropdown",
        "heading"           => __( "Title to be <em>italic</em>", "aheiw" ),
        "param_name"        => "cihwva_cr_title_italic",
        "value"             => array(
            __( 'No', "aheiw" )   => "no",
            __( 'Yes', "aheiw" )  => "italic",

        ),
        "group"             => "Settings",
    ),
    array(
        "type"              => "textfield",
        "heading"           => __( "Description Font Size", "aheiw" ),
        "param_name"        => "cihwva_cr_desc_font_size",
        "value"             => '16',
        "description" => __("default value is 16px", "aheiw"),
        "group"             => "Settings",
        "dependency"    => array( 'element' => "cihwva_cr_style", 'value' => array('style-two','style-three','style-five','style-eleven') ),
    ),
    array(
        "type"              => "colorpicker",
        "heading"           => __( "Description Color", "aheiw" ),
        "param_name"        => "cihwva_cr_desc_color",
        "value"             => '',
        //"description" => __("default color is #ffffff", "aheiw"),
        "group"             => "Settings",
        "dependency"    => array( 'element' => "cihwva_cr_style", 'value' => array('style-two','style-three','style-five','style-eleven') ),
    ),
    array(
        "type"              => "dropdown",
        "heading"           => __( "Title to be <em>italic</em>", "aheiw" ),
        "param_name"        => "aheiw_desc_italic",
        "value"             => array(
            __( 'No', "aheiw" )   => "no",
            __( 'Yes', "aheiw" )  => "italic",

        ),
        "group"             => "Settings",
        "dependency"    => array( 'element' => "aheiw_style", 'value' => array('style-two','style-three','style-five','style-eleven') ),
    ),
    array(
        "type"              => "textfield",
        "heading"           => __( "Link Text Font Size", "aheiw" ),
        "param_name"        => "cihwva_cr_link_font_size",
        "value"             => '14',
        "description" => __("default value is 14px", "aheiw"),
        "group"             => "Settings",
        "dependency"    => array( 'element' => "cihwva_cr_style", 'value' => array('style-twelve','style-Thirteen') ),
    ),
    array(
        "type"              => "colorpicker",
        "heading"           => __( "Link Text Color", "aheiw" ),
        "param_name"        => "cihwva_cr_link_color",
        "value"             => '',
        //"description" => __("default color is #ffffff", "cihwva_cr"),
        "group"             => "Settings",
        "dependency"    => array( 'element' => "cihwva_cr_style", 'value' => array('style-twelve','style-Thirteen') ),
    ),
    array(
        "type"              => "dropdown",
        "heading"           => __( "Link Text To Be <em>Italic</em>", "aheiw" ),
        "param_name"        => "cihwva_cr_link_italic",
        "value"             => array(
            __( 'No', "aheiw" )   => "no",
            __( 'Yes', "aheiw" )  => "italic",

        ),
        "group"             => "Settings",
        "dependency"    => array( 'element' => "cihwva_cr_style", 'value' => array('style-twelve','style-Thirteen') ),
    ),
    
    array(
        "type"              => "textfield",
        "heading"           => __( "Custom CSS Class", "aheiw" ),
        "param_name"        => "cihwva_cr_css_class",
        "value"             => '',
        "description" => __("using custom class you can customize styles.", "aheiw"),
        "group"             => "Settings",
    ),




    )
)

);


function aheiw_adv_hvr_shortcode( $atts, $content = null, $tag ) {
    extract(shortcode_atts(array(

            "cihwva_cr_style"     => 'style-one',
            "cihwva_cr_image"     => '',
            "cihwva_cr_title"      => 'Title',
            "image_link"      => '',
            "cihwva_cr_icon"      => 'fa fa-home',
            "cihwva_cr_icon_size"      => '',
            "cihwva_cr_icon_color"      => '',
            "cihwva_cr_icon_color_hvr"      => '',
            "cihwva_cr_open_window"      => '',
            "cihwva_cr_social_links" => '',
            "cihwva_cr_custom_links" => '',
            "cihwva_cr_ovrlay_color" => '',
            "cihwva_cr_opacity" => '',
            "cihwva_cr_ovrlay_color_1" => '',
            "cihwva_cr_ovrlay_grd_1" => '',
            "cihwva_cr_ovrlay_grd_2" => '',
            "cihwva_cr_title_font_size" => '',
            "cihwva_cr_title_color" => '',
            "cihwva_cr_title_italic" => '',
            "cihwva_cr_desc_font_size" => '',
            "cihwva_cr_desc_color" => '',
            "cihwva_cr_desc_italic" => '',
            "cihwva_cr_link_font_size" => '',
            "cihwva_cr_link_color" => '',
            "cihwva_cr_link_italic" => '',
            "cihwva_cr_css_class" => '',

    ), $atts));
        



    wp_register_style( 'font-awesome', plugins_url( '/css/font-awesome.min.css',  __FILE__) );
    wp_enqueue_style( 'font-awesome' );
    wp_register_style('cihwva_cr_style_flowerx', plugins_url( 'css/style-flowerx.css' , __FILE__ ) );
    wp_enqueue_style( 'cihwva_cr_style_flowerx' );

    $image = wp_get_attachment_image_src( $cihwva_cr_image, 'full' );

    $output ='';
    //$output .= '<style>@import url(https://fonts.googleapis.com/css?family='.$font.');</style>';
    $image_linking='';
    If($image_link!== ''){
               $image_linking ='<a href="'.$image_link.'" target="'.$cihwva_cr_open_window.'"></a>';

    }

    $cihwva_cr_social_links = vc_param_group_parse_atts($cihwva_cr_social_links);


    if($cihwva_cr_style =='style-two'||$cihwva_cr_style =='style-eleven'){
        $cihwva_cr_social_links_html ='';
            $cihwva_cr_social_links_html .= '<div class="icons">';
            foreach ($cihwva_cr_social_links as $cihwva_cr_social_link) {
                 $social_url ='';
                 $social_icon ='';
                 $social_icon_size ='';
                 $sc_icon_color ='';
                 $sc_icon_color_hvr ='';
                 $sc_icon_color_bg ='';
                 $sc_icon_color_bg_hvr ='';

                if(!empty($cihwva_cr_social_link['social_link_url'])){    $social_url = $cihwva_cr_social_link['social_link_url'];}
                if(!empty($cihwva_cr_social_link['social_icon'])){    $social_icon = $cihwva_cr_social_link['social_icon'];      }
                if(!empty($cihwva_cr_social_link['social_icon_size'])){    $social_icon_size = $cihwva_cr_social_link['social_icon_size'];}
                if(!empty($cihwva_cr_social_link['sc_icon_color'])){    $sc_icon_color = $cihwva_cr_social_link['sc_icon_color'];       }
                if(!empty($cihwva_cr_social_link['sc_icon_color_hvr'])){   $sc_icon_color_hvr = $cihwva_cr_social_link['sc_icon_color_hvr']; }
                if(!empty($cihwva_cr_social_link['sc_icon_color_bg'])){    $sc_icon_color_bg = $cihwva_cr_social_link['sc_icon_color_bg']; }
                if(!empty($cihwva_cr_social_link['sc_icon_color_bg_hvr'])){    $sc_icon_color_bg_hvr = $cihwva_cr_social_link['sc_icon_color_bg_hvr'];  }

                    $cihwva_cr_social_links_html .= '
                    <style>
                          li{list-style:none;}

                    </style>

                    <a href="'.$social_url.'" target="_blank" ><i class="'.$social_icon.' puku" style="color:'.$sc_icon_color.'!important; font-size:'.$social_icon_size.'px;"></i></a> ';
            }
            $cihwva_cr_social_links_html  .='</div>';

    }
$cihwva_cr_custom_links = vc_param_group_parse_atts($cihwva_cr_custom_links);


    if($cihwva_cr_style == 'style-twelve'|| $cihwva_cr_style == 'style-Thirteen'){
        $cihwva_cr_custom_links_html ='';
        $cihwva_cr_social_links_html  ='';

            $cihwva_cr_social_links_html .= '<div class="links">';
            foreach ($cihwva_cr_custom_links as $cihwva_cr_custom_link) {
                $link_txt = $cihwva_cr_custom_link['link_txt'];
                $link_url = $cihwva_cr_custom_link['link_url'];

                    $cihwva_cr_custom_links_html .= '
                    <style>


                    </style>

                    <li> <a href="'.$link_url.'" style="color:'.$cihwva_cr_link_color.'; font-size:'.$cihwva_cr_link_font_size.'; font-style:'.$cihwva_cr_link_italic.';">'.$link_txt.'</a></li> ';
            }
            $cihwva_cr_custom_links_html  .='</div>';

    }

    if ( $cihwva_cr_style =='style-one' ){

        $output .='<figure class="style-one '.$cihwva_cr_css_class.' ">
                            <img src="'.$image[0].'" alt="'.$cihwva_cr_title.'" />
                            <figcaption>
                                <h3 style="color:'.$cihwva_cr_title_color.'; font-size:'.$cihwva_cr_title_font_size.'px; font-style:'.$cihwva_cr_title_italic.';">'.$cihwva_cr_title.'</h3>
                            </figcaption>
                            '.$image_linking.'
                        </figure>';

    }
    if ( $cihwva_cr_style =='style-two' ){

        $output .='

        <style>
        .style-two::after, .style-two::before, .style-two figcaption::after, .style-two figcaption::before{background:'.$cihwva_cr_ovrlay_color.'!important;}
        </style>

        <figure class="style-two '.$cihwva_cr_css_class.' ">
            <img src="'.$image[0].'" alt="'.$cihwva_cr_title.'" />
            <figcaption>
              <h2  style="color:'.$cihwva_cr_title_color.'; font-size:'.$cihwva_cr_title_font_size.'px; font-style:'.$cihwva_cr_title_italic.';">'.$cihwva_cr_title.'</h2>
              <p style="color:'.$cihwva_cr_desc_color.'; font-size:'.$cihwva_cr_desc_font_size.'px; font-style:'.$cihwva_cr_desc_italic.';">'.$content.'</p>

              '.$cihwva_cr_social_links_html.'
            </figcaption>
           </figure>
           '.$image_linking.'
           ';
    }
    if ( $cihwva_cr_style =='style-four' ){

        $output .='

        <style>
        .style-four {
            background: '.$cihwva_cr_ovrlay_color.' linear-gradient(to right, '.$cihwva_cr_ovrlay_grd_1.', '.$cihwva_cr_ovrlay_grd_2.') repeat scroll 0 0!important;}
        </style>

        <figure class="style-four '.$cihwva_cr_css_class.' ">
            <img src="'.$image[0].'" alt="'.$cihwva_cr_title.'" />
            <figcaption>
                <div>
                  <h2  style="color:'.$cihwva_cr_title_color.'; font-size:'.$cihwva_cr_title_font_size.'px; font-style:'.$cihwva_cr_title_italic.';">'.$cihwva_cr_title.'</h2>
                  <h4 style="color:'.$cihwva_cr_desc_color.'; font-size:'.$cihwva_cr_desc_font_size.'px; font-style:'.$cihwva_cr_desc_italic.';">'.$content.'</h4>
                </div>

            </figcaption>
           </figure>';
    }
    if ( $cihwva_cr_style =='style-five' ){

        $output .='

        <style>
            .style-five:hover .puku{
            color: '.$cihwva_cr_icon_color.'!important;
            }

                .style-five::before,.style-five figcaption {
                    background-color: '.$cihwva_cr_ovrlay_color.'!important;}
        </style>

                        <figure class="style-five '.$cihwva_cr_css_class.' ">
                            <img src="'.$image[0].'" alt="'.$cihwva_cr_title.'" />
                            <figcaption>
                                <h3  class="puku" style="color:'.$cihwva_cr_title_color.'; font-size:'.$cihwva_cr_title_font_size.'px; font-style:'.$cihwva_cr_title_italic.';">'.$cihwva_cr_title.'</h3>

                            </figcaption><i class="'.$cihwva_cr_icon.'" style="color:'.$cihwva_cr_icon_color.'; font-size:'.$cihwva_cr_icon_size.'px;"></i>
                            '.$image_linking.'
                        </figure>';
    }
    if ( $cihwva_cr_style =='style-six' ){

        $output .='

        <style>
                .style-six figcaption {background-color: '.$cihwva_cr_ovrlay_color.'!important;}
                .style-six::before, .style-six::after {border: 1px solid '.$cihwva_cr_ovrlay_color.'!important;}
        </style>

                        <figure class="style-six">
                                <img src="'.$image[0].'" alt="'.$cihwva_cr_title.'" />
                                <figcaption>
                                    <h3 style="color:'.$cihwva_cr_title_color.'; font-size:'.$cihwva_cr_title_font_size.'px; font-style:'.$cihwva_cr_title_italic.';">'.$cihwva_cr_title.'</h3>
                                    <p  style="color:'.$cihwva_cr_desc_color.'; font-size:'.$cihwva_cr_desc_font_size.'px; font-style:'.$cihwva_cr_desc_italic.';text-align:center;">'.$content.'</p>
                                </figcaption>
                                '.$image_linking.'

                        </figure>'

                        ;
    }

    if ( $cihwva_cr_style =='style-eight' ){

        $output .='

        <style>
               .style-eight figcaption{background-color: '.$cihwva_cr_ovrlay_color.'!important;}
        </style>

                    <figure class="style-eight">
                        <div class="image">
                            <img src="'.$image[0].'" alt="'.$cihwva_cr_title.'" /></div>
                        <figcaption>
                            <h4  style="color:'.$cihwva_cr_title_color.'; font-size:'.$cihwva_cr_title_font_size.'px; font-style:'.$cihwva_cr_title_italic.';">'.$cihwva_cr_title.'</h4>
                            <i class="'.$cihwva_cr_icon.'" style="color:'.$cihwva_cr_icon_color.'; font-size:'.$cihwva_cr_icon_size.'px;"></i>
                        </figcaption>
                        '.$image_linking.'
                    </figure>';
    }

    if ( $cihwva_cr_style =='style-nine' ){

        $output .='

        <style>

               .style-nine::after{border:8px solid '.$cihwva_cr_ovrlay_color.'!important;}
        </style>

                    <figure class="style-nine">
                            <img src="'.$image[0].'" alt="'.$cihwva_cr_title.'"/>
                                <figcaption>
                                    <h3 style="color:'.$cihwva_cr_title_color.'; font-size:'.$cihwva_cr_title_font_size.'px; font-style:'.$cihwva_cr_title_italic.';">'.$cihwva_cr_title.'</h3>
                                </figcaption>
                                '.$image_linking.'
                        </figure>';
    }

    if ( $cihwva_cr_style =='style-eleven' ){

        $output .='

        <style>

               .style-eleven::after, .style-eleven::before, .style-eleven figcaption::after, .style-eleven figcaption::before {background: '.$cihwva_cr_ovrlay_color.'!important;}
        </style>

                    <figure class="style-eleven">
                      <img src="'.$image[0].'" alt="'.$cihwva_cr_title.'" />
                      <figcaption>
                        <h2 style="color:'.$cihwva_cr_title_color.'; font-size:'.$cihwva_cr_title_font_size.'px; font-style:'.$cihwva_cr_title_italic.';">'.$cihwva_cr_title.'</h2>
                        <p style="color:'.$cihwva_cr_desc_color.'; font-size:'.$cihwva_cr_desc_font_size.'px; font-style:'.$cihwva_cr_desc_italic.';">'.$content.'</p>
                       '.$cihwva_cr_social_links_html.'
              </figcaption>
            </figure>';
    }

    if ( $cihwva_cr_style =='style-twelve' ){

        $output .='

        <style>

               .style-twelve::after {background-color: '.$cihwva_cr_ovrlay_color.'!important;}
        </style>

                    <figure class="style-twelve">
                         <img src="'.$image[0].'" alt="'.$cihwva_cr_title.'" />
                        <figcaption>
                            <h3 style="color:'.$cihwva_cr_title_color.'; font-size:'.$cihwva_cr_title_font_size.'px; font-style:'.$cihwva_cr_title_italic.';">'.$cihwva_cr_title.'</h3>
                          
                        </figcaption>
                    </figure>';
    }

    if ( $cihwva_cr_style =='style-Thirteen' ){

        $output .='

        <style>
                .style-Thirteen {background-color: '.$cihwva_cr_ovrlay_color_1.'!important;;}
               .style-Thirteen::after {
                    background: rgba(0, 0, 0, 0) linear-gradient(to right, '.$cihwva_cr_ovrlay_color_1.', '.$cihwva_cr_ovrlay_grd_1.' , '.$cihwva_cr_ovrlay_grd_2.') repeat scroll 0 0!important;}
                </style>

                    <figure class="style-Thirteen">
                        <img src="'.$image[0].'" alt="'.$cihwva_cr_title.'" />
                        <figcaption>
                            <h3 style="color:'.$cihwva_cr_title_color.'; font-size:'.$cihwva_cr_title_font_size.'px; font-style:'.$cihwva_cr_title_italic.';">'.$cihwva_cr_title.'</h3>

                        </figcaption>
                    </figure>';
    }

    return $output;
    wp_reset_postdata();



}

add_shortcode('aheiw_adv_hvr_efc_wb_th', 'aheiw_adv_hvr_shortcode');
