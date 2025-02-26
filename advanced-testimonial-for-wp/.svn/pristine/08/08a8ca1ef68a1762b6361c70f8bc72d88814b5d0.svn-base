<?php
if ( ! defined( 'ABSPATH' ) ) exit;
if(!function_exists('itt_testimonial_custom_css')) {
    function itt_testimonial_custom_css( $style_arr, $rand_id = '' )
    {

        //
        $style = '';
        $imports = '';
        
        // text_box color mode
         $textBackgroundColor = 'background-color: ' . $style_arr[ 'text_box_color_1' ] . ' !important;';
        //
        // balloon color mode
        $balloonBackgroundColor = 'background-color: ' . $style_arr[ 'balloon_color_1' ] . ' !important;';
        //
        // image box color mode
         $imageBackgroundColor = 'background-color: ' . $style_arr[ 'image_box_color_1' ] . ' !important;';
        //
        
        //
        $style .= $imports;
        if ( $style_arr[ 'gutter' ] > 0 ) {
            $style .= '.tl-testimonial-cnt .tl-item-' . $rand_id . '{
                padding : 0 ' . ( round((int)$style_arr[ 'gutter' ] / 2 )) . 'px!important;
                margin-bottom : ' . $style_arr[ 'gutter' ]. 'px !important;
            }';
        }
        $style .= '
        .tl-testimonial-cnt .tl-item-' . $rand_id . ' .tl-desc.tl-balloon{
            ' . $balloonBackgroundColor . '
            border:' . $style_arr[ 'balloon_border_width' ] . 'px ' . $style_arr[ 'balloon_border_style' ] . ' ' . $style_arr[ 'balloon_border_color' ] . ' !important;
            border-radius: ' . $style_arr[ 'balloon_border_radius' ] . 'px !important;
            padding:' . $style_arr[ 'balloon_padding' ] . 'px !important;
        }
        .tl-testimonial-cnt .tl-item-' . $rand_id . ' .tl-desc.tl-balloon .svg-triangle{
            fill:' . $style_arr[ 'balloon_color_1' ] . ' !important;
        }
        .tl-testimonial-cnt .tl-item-' . $rand_id . ' .tl-image-box{
            ' . $imageBackgroundColor . '
            border:' . $style_arr[ 'image_box_border_width' ] . 'px ' . $style_arr[ 'image_box_border_style' ] . ' ' . $style_arr[ 'image_box_border_color' ] . ' !important;
            border-radius: ' . $style_arr[ 'image_box_border_radius' ] . 'px !important;
            padding:' . $style_arr[ 'image_box_padding' ] . 'px !important;
            
        }
		.tl-testimonial-cnt .tl-item-' . $rand_id . ' .tl-desc-wrap{
            ' . $textBackgroundColor . '
		    border:' . $style_arr[ 'text_box_border_width' ] . 'px ' . $style_arr[ 'text_box_border_style' ] . ' ' . $style_arr[ 'text_box_border_color' ] . ' !important;
            border-radius: ' . $style_arr[ 'text_box_border_radius' ] . 'px !important;
            padding:' . $style_arr[ 'text_box_padding' ] . 'px !important;
            
		}
		';
        //$style .= '</style>';
        //echo $style;
        if ( is_admin() ) {
            echo '<style>' . $style . '</style>';
        } else {
            wp_add_inline_style( ITT_TESTIMONIAL_FIELDS_PERFIX . 'custom-css', $style );
        }
    }
}