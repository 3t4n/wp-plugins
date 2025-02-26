<?php
function fqv_options_scripts(){


    wp_enqueue_style('finest-quick-view', FINEST_QUICKVIEW_ASSETS_CSS . 'quick-view.css',array(), FINEST_QUICKVIEW_VERSION );

    $btn_text_color = get_theme_mod( 'btn_text_color', '#ffffff' );
    $btn_text_color_hover = get_theme_mod( 'btn_text_color_hover', '#ffffff' );
    $btn_bg_color = get_theme_mod( 'btn_bg_color', '#0170B9' );
    $hover_btn_bg_color = get_theme_mod( 'hover_btn_bg_color', '#0170B9' );
    $btn_border = get_theme_mod( 'btn_border');
    $btn_border_style = get_theme_mod( 'btn_border_style','solid');
    $btn_border_color = get_theme_mod( 'btn_border_color','#0170B9');
    $hover_btn_border = get_theme_mod( 'hover_btn_border');
    $btn_hover_border_style = get_theme_mod( 'btn_hover_border_style');
    $btn_hover_border_color = get_theme_mod( 'btn_hover_border_color');

    $btn_border_radius = get_theme_mod( 'btn_border_radius' );
    $hover_btn_border_radius = get_theme_mod( 'hover_btn_border_radius' );

    // padding
    $btn_paddign = get_theme_mod( 'btn_padding' ) != false ? get_theme_mod( 'btn_padding' ) : '' ;
    $paddimpld = is_array($btn_paddign ) ?  implode(' ', $btn_paddign) : '';

    // margin
    $btn_margin = get_theme_mod( 'btn_margin' ) != false ? get_theme_mod( 'btn_margin' ) : '';
    $marimpld = is_array( $btn_margin ) ? implode(' ',$btn_margin) : '';

    // modal
    $mbgcolor = get_theme_mod( 'modal_background_color','#ffffff' );
    $modal_margin = get_theme_mod( 'modal_margin' ) != false ? get_theme_mod( 'modal_margin' ) : '';
    $immodal_margin =  is_array( $modal_margin ) ?  implode(' ',$modal_margin) : '';
    $css = get_theme_mod('code_setting');

    $fqv_dynamic_css  = '';

    if($css){
        $fqv_dynamic_css .= '.finest-quickview-button .storquickview { ' . esc_attr( $css ) .' } ';
        $fqv_dynamic_css .= "\n";
    }

    if($btn_text_color){
        $fqv_dynamic_css .= '.finest-quickview-button .storquickview { color: ' . esc_attr( $btn_text_color ) . ' } ';
        $fqv_dynamic_css .= "\n";
    }
    // hover color
    if($btn_text_color_hover){
        $fqv_dynamic_css .= '.storquickview:hover { color: ' . esc_attr( $btn_text_color_hover ) . ' } ';
        $fqv_dynamic_css .= "\n";
    }

    if($btn_bg_color){
        $fqv_dynamic_css .= '.finest-quickview-button .storquickview { background-color: ' . esc_attr( $btn_bg_color ) . ' } ';
        $fqv_dynamic_css .= "\n";
    }
    // hover background

    if($hover_btn_bg_color){
        $fqv_dynamic_css .= '.finest-quickview-button .storquickview:hover { background-color: ' . esc_attr( $hover_btn_bg_color ) . ' } ';
        $fqv_dynamic_css .= "\n";
    }
    if($hover_btn_border){
        $fqv_dynamic_css .= '.finest-quickview-button .storquickview:hover { border: ' . esc_attr( $hover_btn_border ) . ' } ';
        $fqv_dynamic_css .= "\n";
    }
    if($btn_hover_border_style){
        $fqv_dynamic_css .= '.finest-quickview-button .storquickview:hover { border-style: ' . esc_attr( $btn_hover_border_style ) . ' } ';
        $fqv_dynamic_css .= "\n";
    }
    if($btn_hover_border_color){
        $fqv_dynamic_css .= '.finest-quickview-button .storquickview:hover { border-color: ' . esc_attr( $btn_hover_border_color ) . ' } ';
        $fqv_dynamic_css .= "\n";
    }
    if($btn_border){
        $fqv_dynamic_css .= '.finest-quickview-button .storquickview { border: ' . esc_attr( $btn_border ) . ' } ';
        $fqv_dynamic_css .= "\n";
    }
    if($btn_border_style){
        $fqv_dynamic_css .= '.finest-quickview-button .storquickview { border-style: ' . esc_attr( $btn_border_style ) . ' } ';
        $fqv_dynamic_css .= "\n";
    }
    if($btn_border_color){
        $fqv_dynamic_css .= '.finest-quickview-button .storquickview { border-color: ' . esc_attr( $btn_border_color ) . ' } ';
        $fqv_dynamic_css .= "\n";
    }
    if($marimpld){
        $fqv_dynamic_css .= '.finest-quickview-button .storquickview { margin: ' . esc_attr( $marimpld ) . ' } ';
        $fqv_dynamic_css .= "\n";
    }
    if($paddimpld){
        $fqv_dynamic_css .= '.finest-quickview-button .storquickview { padding: ' . esc_attr( $paddimpld ) . ' } ';
        $fqv_dynamic_css .= "\n";
    }
    if($btn_border_radius){
        $fqv_dynamic_css .= '.finest-quickview-button .storquickview {  border-radius: ' . esc_attr( $btn_border_radius ) . ' } ';
        $fqv_dynamic_css .= "\n";
    }
    if($hover_btn_border_radius){
        $fqv_dynamic_css .= '.finest-quickview-button .storquickview:hover {  border-radius: ' . esc_attr( $hover_btn_border_radius ) . ' } ';
        $fqv_dynamic_css .= "\n";
    }

    // Modal

    if($mbgcolor){
         $fqv_dynamic_css .= '.modal-style{  background-color: ' . esc_attr( $mbgcolor ) . '} ';
         $fqv_dynamic_css .= "\n";
     }
    if($immodal_margin){
        $fqv_dynamic_css .= '#fdquick-viewmodal .fdqv-modal-dialog{  padding: ' . esc_attr( $immodal_margin ) . '} ';
        $fqv_dynamic_css .= "\n";
    }


    $fqv_dynamic_css = fqv_css_strip_whitespace( $fqv_dynamic_css );
	wp_add_inline_style( 'finest-quick-view', $fqv_dynamic_css );

}
add_action( 'wp_enqueue_scripts', 'fqv_options_scripts', 5 );