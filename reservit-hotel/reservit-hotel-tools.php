<?php
/*
 *      Reservit Hotel Best Price Widget
 *      Version: 1.9
 *      By Reservit
 *
 *      Contact: http://www.reservit.com/hebergement
 *      Created: 2017
 *      Modified: 15/05/2019
 *
 *      Copyright (c) 2017, Reservit. All rights reserved.
 *
 *      Licensed under the GPLv2 license - https://www.gnu.org/licenses/gpl-2.0.html
 *
 */
include_once plugin_dir_path(__FILE__) . '/reservit-hotel-language.php';

class Reservit_Hotel_Bestprice_Tools
{
    protected static $instance;

    public static function instance()
    {
        if (!self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public static function add_rsvit_hotel_widget_css() {
        //Load fontawsome css.min cdn
        wp_enqueue_style('rsvit_front_fontawsome', plugins_url('assets/font-awesome/css/font-awesome.min.css', __FILE__),[],'3.0');

        //Reservit hotel bestprice widget static CSS
        wp_enqueue_style('rsvit_hotel_style', plugins_url('reservit-hotel-bestprice-widget.css', __FILE__),[],'3.0');
        //Inline CSS generated from the options
        //display icon
        $rsvit_btn_ico = sanitize_text_field(get_option('rsvit_btn_ico'));
        //button style
        $rsvit_btn_bgcolor = sanitize_text_field(get_option('rsvit_btn_bgcolor'));
        $rsvit_btn_color = sanitize_text_field(get_option('rsvit_btn_color'));
        $rsvit_btn_fontsize = sanitize_text_field(get_option('rsvit_btn_fontsize') . get_option('rsvit_btn_fontunit'));
        $rsvit_btn_fontweight = sanitize_text_field(get_option('rsvit_btn_fontweight'));
        $rsvit_btn_radius = sanitize_text_field(get_option('rsvit_btn_radius') . get_option('rsvit_btn_radiusunit'));
        $rsvit_btn_bordercolor = sanitize_text_field(get_option('rsvit_btn_bordercolor'));
        $rsvit_btn_borderwidth = sanitize_text_field(get_option('rsvit_btn_borderwidth') . get_option('rsvit_btn_borderunit'));
        $rsvit_btn_borderwidth_get_option = get_option('rsvit_btn_borderwidth');
        if (!empty($rsvit_btn_borderwidth_get_option)) {
            $rsvit_btn_border_style = 'solid';
        } else {
            $rsvit_btn_border_style = 'initial';
        }
        //mobile button style
        $rsvit_btn_mobilebgcolor = sanitize_text_field(get_option('rsvit_btn_mobilebgcolor'));
        $rsvit_btn_mobilecolor = sanitize_text_field(get_option('rsvit_btn_mobilecolor'));
        $rsvit_btn_mobilebordercolor = sanitize_text_field(get_option('rsvit_btn_mobilebordercolor'));
        //button hover
        $rsvit_btn_hoverbgcolor = sanitize_text_field(get_option('rsvit_btn_hoverbgcolor'));
        $rsvit_btn_hovercolor = sanitize_text_field(get_option('rsvit_btn_hovercolor'));
        $rsvit_btn_hoverbordercolor = sanitize_text_field(get_option('rsvit_btn_hoverbordercolor'));
        //mobile button hover
        $rsvit_btn_mobilehoverbgcolor = sanitize_text_field(get_option('rsvit_btn_mobilehoverbgcolor'));
        $rsvit_btn_mobilehovercolor = sanitize_text_field(get_option('rsvit_btn_mobilehovercolor'));
        $rsvit_btn_mobilehoverbordercolor = sanitize_text_field(get_option('rsvit_btn_mobilehoverbordercolor'));
        //box style
        $rsvit_box_btn_color = sanitize_text_field(get_option('rsvit_box_btn_color'));
        $rsvit_box_btn_textcolor = sanitize_text_field(get_option('rsvit_box_btn_textcolor'));

        //generate css
        $hotel_from_options_css = "
        	#box_btn {
        		background-color: {$rsvit_box_btn_color};	
        	}
        	
        	#box_btn_close {
        		color: {$rsvit_box_btn_textcolor};
        	}
        	
        	#btn_bed_ico {
        	display: {$rsvit_btn_ico};
        	}
        	
        	#rsvit_btn {
        		background-color: {$rsvit_btn_bgcolor};
        		color: {$rsvit_btn_color};
        		font-size: {$rsvit_btn_fontsize};
        		font-weight: {$rsvit_btn_fontweight};
        		border-top-left-radius: {$rsvit_btn_radius};
        	    border-top-right-radius: 0;
        	    border-bottom-left-radius: {$rsvit_btn_radius};
        	    border-bottom-right-radius: 0;
        	    border-color: {$rsvit_btn_bordercolor};
        	    border-width: {$rsvit_btn_borderwidth};
        	    border-style: {$rsvit_btn_border_style};
        	}
        	
        	#rsvit_btn:hover {
        		background-color: {$rsvit_btn_hoverbgcolor};
        		color: {$rsvit_btn_hovercolor};
        		border-color: {$rsvit_btn_hoverbordercolor};
        	}
        	
        	@media (max-width: 768px) {
			    #rsvit_btn {
			        background-color: {$rsvit_btn_mobilebgcolor};
	        		color: {$rsvit_btn_mobilecolor};
	        		border-top-left-radius: {$rsvit_btn_radius};
	        	    border-top-right-radius: {$rsvit_btn_radius};
	        	    border-bottom-left-radius: 0;
	        	    border-bottom-right-radius: 0;
	        	    border-color: {$rsvit_btn_mobilebordercolor};
			    }
			    #rsvit_btn:hover {
	        		background-color: {$rsvit_btn_mobilehoverbgcolor};
	        		color: {$rsvit_btn_mobilehovercolor};
	        		border-color: {$rsvit_btn_mobilehoverbordercolor};
	        	}
        	}
        							";
        wp_add_inline_style('rsvit_hotel_style', $hotel_from_options_css);
        //Inline Custom CSS generated from the option Custom CSS
        $hotel_custom_css = esc_textarea(get_option('rsvit_hotel_custom_css'));
        wp_add_inline_style('rsvit_hotel_style', $hotel_custom_css);
    }
}