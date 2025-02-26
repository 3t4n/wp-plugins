<?php
if ( ! defined( 'ABSPATH' ) ) exit;
if(!function_exists('itls_logo_showcase_custom_css')) {
    function itls_logo_showcase_custom_css($style_arr, $rand_id = '')
    {
        //$style = '<style>';
        $r = (int)$style_arr['margin-right'];
        $l = (int)$style_arr['margin-left'];
        $style = '
        .ls-item-wrap-' . $rand_id . '{
            padding-right:' . $r . 'px !important;
            padding-left :' . $l . 'px !important;
        }
		.ls-gred-item-' . $rand_id . '{
            background-color: ' . $style_arr['background-color'] . ' !important;
		    padding:' . $style_arr['padding-top'] . 'px ' . $style_arr['padding-right'] . 'px ' . $style_arr['padding-bottom'] . 'px ' . $style_arr['padding-left'] . 'px !important;
		    margin:' . $style_arr['margin-top'] . 'px 0 ' . $style_arr['margin-bottom'] . 'px 0 !important;
			border-style :' . $style_arr['border-style'] . ' !important;
			border-color :' . $style_arr['border-color'] . ' !important;
			border-width :' . $style_arr['border-width-top'] . 'px ' . $style_arr['border-width-right'] . 'px ' . $style_arr['border-width-bottom'] . 'px ' . $style_arr['border-width-left'] . 'px !important;
			-webkit-border-radius: ' . $style_arr['border-radius-top-left'] . 'px ' . $style_arr['border-radius-top-right'] . 'px ' . $style_arr['border-radius-bottom-right'] . 'px ' . $style_arr['border-radius-bottom-left'] . 'px !important;
			-moz-border-radius: ' . $style_arr['border-radius-top-left'] . 'px ' . $style_arr['border-radius-top-right'] . 'px ' . $style_arr['border-radius-bottom-right'] . 'px ' . $style_arr['border-radius-bottom-left'] . 'px !important;
			border-radius: ' . $style_arr['border-radius-top-left'] . 'px ' . $style_arr['border-radius-top-right'] . 'px ' . $style_arr['border-radius-bottom-right'] . 'px ' . $style_arr['border-radius-bottom-left'] . 'px !important;';
        if ($style_arr['shadow'] == 'inset')
            $style .= 'box-shadow: ' . $style_arr['shadow-h'] . 'px ' . $style_arr['shadow-v'] . 'px ' . $style_arr['shadow-blur'] . 'px ' . $style_arr['shadow-spread'] . 'px ' . $style_arr['shadow-color'] . ' ' . $style_arr['shadow'] . ' !important;';
        else if ($style_arr['shadow'] == 'outset')
            $style .= 'box-shadow: ' . $style_arr['shadow-h'] . 'px ' . $style_arr['shadow-v'] . 'px ' . $style_arr['shadow-blur'] . 'px ' . $style_arr['shadow-spread'] . 'px ' . $style_arr['shadow-color'] . ' !important;';
        
        $style .= '
		}';
        //$style .= '</style>';
        //echo $style;
        if (is_admin()) {
            echo '<style>' . $style . '</style>';
        } else {
            wp_add_inline_style(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'custom-css', $style);
        }
    }
}