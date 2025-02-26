<?php
namespace Admintosh\Inc;
 /**
  * 
  * @package    Admintosh
  * @version    1.0.0
  * @author     wpmobo
  * @Websites: http://wpmobo.com
  *
  */


function adtosh_settings_margin( $options, $key ) {

    $opt = $options;

    if( !empty( $opt[$key]['top'] ) || !empty( $opt[$key]['right'] ) || !empty( $opt[$key]['bottom'] ) || !empty( $opt[$key]['left'] ) ) {

    $top    = !empty( $opt[$key]['top'] ) ? $opt[$key]['top'].'px' : 0;
    $right  = !empty( $opt[$key]['right'] ) ? $opt[$key]['right'].'px' : 0;
    $bottom = !empty( $opt[$key]['bottom'] ) ? $opt[$key]['bottom'].'px' : 0;
    $left   = !empty( $opt[$key]['left'] ) ? $opt[$key]['left'].'px' : 0;

        return 'margin:'.esc_attr( $top.' '.$right.' '.$bottom.' '.$left ).';';

    }
}

function adtosh_topbar_color_preset( $color ) {

    switch ($color) {
        case 'preset_1':
            // code...
            break;
        case 'preset_2':
            // code...
            break;
        case 'preset_3':
            // code...
            break;
        
        default:
            // code...
            break;
    }

}

function adtosh_adminmenu_color_preset( $color ) {

    switch ($color) {
        case 'preset_1':
            // code...
            break;
        case 'preset_2':
            // code...
            break;
        case 'preset_3':
            // code...
            break;
        
        default:
            // code...
            break;
    }

}

function adtosh_login_color_preset( $color ) {

    switch ($color) {
        case 'preset_1':
            // code...
            
            #05134F bg

            #2D3A6B border
            

            https://prnt.sc/ipG2B-hycb-X

            break;
        case 'preset_2':
            // code...
            break;
        case 'preset_3':
            // code...
            break;
        
        default:
            // code...
            break;
    }

}