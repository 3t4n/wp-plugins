<?php

if ( ! defined( 'ABSPATH' ) ) {
    die( 'Please do not load this file directly!' );
}

/*-------------------------------------------------------------------------------*/
/*  POST/PAGE SHORTCODE
/*-------------------------------------------------------------------------------*/
function icon_shortcode( $attr )
{

    extract( shortcode_atts( [
        'lib'   => '',
        'color' => '',
        'size'  => '',
        'align' => '',
        'type'  => '',
    ], $attr ) );

    ob_start();

    if ( $lib && $type ) {

        $ntitle = $prefix = '';

        if ( $lib == 'fa' ) {$prefix = 'fa ';} else
        if ( $lib == 'di' ) {$prefix = 'dashicons ';} else
        if ( $lib == 'oi' ) {$prefix = 'oi ';} else
        if ( $lib == 'gmi' && strpos( $type, 'material-icons' ) === false ) {$prefix = 'material-icons ';} else
        if ( $lib == 'pf' ) {$prefix = 'pf ';} else { $prefix = '';}

        if ( $lib == 'gmi' ) {

            if ( strpos( $type, 'material-icons' ) !== false ) {
                $ntitle = trim( str_replace( 'material-icons', '', $type ) );
            }

        }

        $color = ( $color ? ' style="color:'.esc_attr( $color ).' !important;" ' : '' );
        $size  = ( $size == '' ? 'nm' : $size );
        $align = ( $align == '' ? 'alignleft' : $align );

        wp_enqueue_style( 'icon-frontend' );
        wp_enqueue_style( 'icon-'.$lib.'' );

        echo '<div class="icon_element_outer_'.esc_attr( $align ).' '.esc_attr( $align ).'"><div class="icon_element_inner icon_lib_'.esc_attr( $lib ).'" ><span class="icon_element_icon_size_'.esc_attr( $size ).' icon_element_icon '.esc_attr( $prefix.$type ).'"'.$color.'>'.esc_html( $ntitle ).'</span></div></div>';

    }

    $content = ob_get_clean();

    return $content;

}

add_shortcode( 'wpicon', 'icon_shortcode' );
