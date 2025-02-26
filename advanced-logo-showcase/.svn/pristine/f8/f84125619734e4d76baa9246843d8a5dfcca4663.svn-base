<?php
if ( ! defined( 'ABSPATH' ) ) exit;
// grid class number
$desk_num = intval(12 / $col_desktop);
$tablet_num = intval(12 / $col_tablet);
$mobile_num = intval(12 / $col_mobile);

// get logos query
include ("it_build_query.php");
global $script_outputs;
$script_outputs='<script type="text/javascript">';
// output
$css_classes = '';
$modal ='';
$tooltip_class = '';
$html='';
$show_class ='';
if ($query->have_posts()) {
    // assign value to variables
    if($layout != 'list')
        $css_classes .= 'ls-item-wrap-'.$rand_id.' ls-grid-d-' . $desk_num . ' ls-grid-tl-' . $desk_num . ' ls-grid-m-' . $mobile_num . ' ls-grid-t-' . $tablet_num . ' ls-grid-' . $tablet_num . ' ';

    // begin html tags
    $html ='<div class="ls-logo-cnt ls-gred-layout '.$custom_class.'" data-rand-id="'.$rand_id.'" data-desktop="'.$col_desktop.'" data-tablet="'.$col_tablet.'" data-mobile="'.$col_mobile.'">
            <div class="ls-ajax-loading" style="display:none;">
                <div class="ls-ajax-loading-back"></div>
                <img src="'.ITLS_LOGO_SHOWCASE_CSS_URL.'ajax-loader.gif" />
            </div>';

    switch ($layout) {
        case 'grid':
            if ($quick_view_type == 'full' && $view_type == 'inline') {
                $css_classes .= 'show-inline ';
            }
            break;
        case 'list':
            $html ='<div class="ls-logo-cnt ls-list-layout  '.$custom_class.'" data-rand-id="'.$rand_id.'" data-desktop="1" data-tablet="1" data-mobile="1" >';
            if ($quick_view_type == 'full' && $view_type == 'inline') {
                $show_class = 'show-inline';
            }
            break;
        default:
            break;
    }
    
    if($tooltip == 'true') {
        $tooltip_class = 'tooltip ';
    }
    // logo loop
    $i=0;
    while ($query->have_posts()) {
        $i++;
        $query->the_post();
        $post_id = $query->post->ID;
        if (has_post_thumbnail($post_id)) {
            $image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'full');
            $image_url = $image_url[0];
        }
        $shortDesc = get_post_meta($post_id, ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shortDesc', true);
        $link_url = get_post_meta($post_id, ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'link_url', true);
        $link_target = get_post_meta($post_id, ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'link_target', true);
        $tooltip_str='';
		if($tooltip == 'true') {
            $tooltip_str = 'title = "'.get_the_title().'"';
        }
        // link event
        $link_detail = '';
        $more_btn ='';
        if ($quick_view_type == 'none' && $link_url!='') {
            $link_detail = '<a href="' . $link_url . '" target="' . $link_target . '" >
                                <img  src="' . $image_url . '" class="' . $effect . '" >
                            </a>';
        }
        else{
            if ($quick_view_type != 'none' ) {
                $more_btn = '<div class="ls-more-btn">'.__('More Details','itls_logo_showcase_textdomain').'</div>';
            }
            $link_detail = '<img  src="' . $image_url . '" class="' . $effect . '" >';
        }
        //
        switch ($layout) {
            case 'grid':
                $html .= '<div class="' . $css_classes . ' " data-item-number="'.$i.'" '.$modal.' data-id="' . $post_id . '">
                            <div class="ls-gred-item ls-gred-item-'.$rand_id.' '.$tooltip_class.'" ' . $tooltip_str . ' >
                                '.$link_detail.'
                            </div>
                          </div>';
                break;
            case 'list':
                    $html .= '<div class="it-modal ls-item-wrap-'.$rand_id.' ls-grid-m-12 ls-grid-t-12 ls-grid-d-12 '.$show_class.'" data-item-number="'.$i.'" data-id="' . $post_id . '" '.$modal.'>
                                <div class="ls-list-item ls-gred-item-'.$rand_id.'">
                                    <div class="ls-grid-m-12 ls-grid-t-4 ls-grid-m-3 ls-list-img">
                                        '.$link_detail.'
                                    </div>
                                    <div class="ls-grid-m-12 ls-grid-t-8 ls-grid-m-9">
                                        <div class="ls-list-title">'.get_the_title().'</div>
                                        <div class="ls-list-desc">'.$shortDesc.'</div>
                                        '.$more_btn.'
                                    </div>
                                </div>
                            </div>';
                break;
            default:
                break;
        }
    }
// end html tags
    
  	if($tooltip == 'true') {
        $script_outputs .= '
                jQuery(function($){
                    $(".tooltip").tipsy({
                        gravity : $.fn.tipsy.autoNS ,
                        fade : true
                    });
                });';
    }
    $script_outputs .= '</script>';
    $html .= '</div>';
}
?>