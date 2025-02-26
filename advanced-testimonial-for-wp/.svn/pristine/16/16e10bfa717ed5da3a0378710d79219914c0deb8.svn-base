<?php
if ( ! defined( 'ABSPATH' ) ) exit;
$containerId ='';
// grid class number
$desk_num = intval(12 / $col_desktop);
$tablet_num = intval(12 / $col_tablet);
$mobile_num = intval(12 / $col_mobile);
// get testimonials query
include ("it_build_query.php");
// Script
global $script_outputs;
$script_outputs='<script type="text/javascript">';
//style
$css_classes = '';
if($layout != 'list')
    $css_classes .= '';
$descClass = 'tl-desc';
$imgClass = 'tl-image';
$posClass = 'tl-position';
$nameClass = 'tl-name';
$rate_size='sm';
$starClass = 'tl-rating tl-'.$rate_size.'-star';
// Container
$containerClass = 'tl-testimonial-cnt '.$custom_class .' ';
$testo_effect = 'pl-animate'.$rand_id.' '.$item_effect;
switch($layout)
{
    case 'grid':
        $css_classes .= ' tl-col-d-' . $desk_num . ' tl-col-tl-' . $desk_num . ' tl-col-m-' . $mobile_num . ' tl-col-t-' . $tablet_num . ' tl-col-' . $tablet_num .' ';
        $colNumbers = 'data-desktop="'.$col_desktop.'" data-tablet="'.$col_tablet.'" data-mobile="'.$col_mobile.'"';
        $layoutClass = 'tl-grid-layout ';
        $itemClass = 'tl-grid-item ';
        break;
   
}
$itemClass .= $css_classes;
$imageRadiusClass = ' tl-'.$image_radius.'-radius';
$imageSize = ' tl-'.$image_size.'-image';
$effect = ' tl-'.$effect;
$btnStyle = '';
$layoutStyle = 'tl-'.$layoutStyle.' ';
$Classes = $containerClass.$layoutClass.$layoutStyle.$btnStyle.$imageSize;
$html ='<div class="'.$Classes.'" data-rand-id="'.$rand_id.'" '.$colNumbers.'>
            <svg style="display: none">
                <symbol id="triangle" xml:space="preserve" enable-background="new 0 0 20 11" viewBox="0 0 20 11" height="11px" width="20px" y="0px" x="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" version="1.1">
                    <polygon points="10,10.05 2,0 10.002,0 18.005,0 "></polygon>
                    <polyline points="20,0.5 18,0.5 10,10.05 2,0.5 0,0.5 " fill="none"></polyline>
                </symbol>
            </svg>';
if(isset($term_list))
    $html .= $term_list;
// output
$ul = '<ul id="' .$containerId.'" class="it-container">';
if ($query->have_posts()) {
    // testimonial loop
    $i = 0;
    
    while ( $query->have_posts() ) {
        $query->the_post();
        $post_id = $query->post->ID;
        $image_url = '';
        if ( has_post_thumbnail( $post_id ) ) {
            $image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'thumbnail' );
            $image_url = $image_url[ 0 ];
        }
        $nameMate = get_post_meta( $post_id, ITT_TESTIMONIAL_FIELDS_PERFIX . 'name', true );
        $positionMate = get_post_meta( $post_id, ITT_TESTIMONIAL_FIELDS_PERFIX . 'position', true );
        $companyName = get_post_meta( $post_id, ITT_TESTIMONIAL_FIELDS_PERFIX . 'company_name', true );
        $link_url = get_post_meta( $post_id, ITT_TESTIMONIAL_FIELDS_PERFIX . 'company_url', true );
        $email = get_post_meta( $post_id, ITT_TESTIMONIAL_FIELDS_PERFIX . 'email', true );
        $star = get_post_meta( $post_id, ITT_TESTIMONIAL_FIELDS_PERFIX . 'rating', true );
        $desc = get_post_meta( $post_id, ITT_TESTIMONIAL_FIELDS_PERFIX . 'desc', true );

        // get category of post for isotope filter
        $terms = wp_get_post_terms( $post_id, ITT_Testimonial_Post_Taxonomy, array( "fields" => "all" ) );
        $term_classes = '';
        foreach ( $terms as $term ) {
            $term_classes .= $term->slug . ' ';
        }
        //
		
        $starClass = 'tl-rating tl-'.$rate_size.'-star';
        $starClass .= ' tl-' . $star . '-stars ' . $star_size;
        $imgClass .= $imageRadiusClass . ' ' . $effect;
        // link event
        $link_detail = '';
        if ( $link_url != '' ) {
            $link_detail = '<a href="' . $link_url . '" >
                                ' . $companyName . '
                            </a>';
        } else
            $link_detail = $companyName;
        //
        $imageWrapDivStart = '<div class="tl-image-box">';
        $imageWrapDivEnd = '</div>';
        $imageDiv = ($image=='true')?'<div class="' . $imgClass . '" style="background-image: url(\'' . $image_url . '\')" ></div>':'';
        $descWrapDivStart = '<div class="tl-desc-wrap">';
        $descWrapDivEnd = '</div>';
        $descDiv = ($description=='true')?'<div class="' . $descClass . '">' . $desc . '</div>':'';
        $descBalloonDiv = ($description=='true')?'<div class="' . $descClass . ' tl-balloon">' . $desc . '<span class="tl-triangle"><svg class="svg-triangle"><use xlink:href="#triangle"></use></svg></span></div>':'';
        $descBalloonNoSpanDiv = ($description=='true')?'<div class="' . $descClass . ' tl-balloon">' . $desc . '<span class="tl-triangle"></div>':'';
        $nameDiv = ($name=='true')?'<div class="' . $nameClass . '">' . get_the_title() . '</div>':'';
        $posDiv = ($position=='true')?'<div class="' . $posClass . '">' . $positionMate . ' / ' . $link_detail . '</div>':'';
        $rateDiv = ($rate=='true')?'<div class="' . $starClass . '"></div>':'';
        $itemLiStart = '<li class="' . $itemClass . $term_classes . ' '.$testo_effect.' tl-item-' . $rand_id . ' " data-item-number="' . $i . '" data-id="' . $post_id . '">';
        $itemLiEnd = '</li>';

       

        switch ( trim( $layoutStyle ) ) {
            case 'tl-style1':
                $ul .= $itemLiStart . $imageWrapDivStart . $imageDiv . $imageWrapDivEnd . $descWrapDivStart . $descDiv . $nameDiv . $posDiv . $rateDiv . $descWrapDivEnd . $itemLiEnd;
                break;
            case 'tl-style2':
                $ul .= $itemLiStart . $imageWrapDivStart . $imageDiv . $imageWrapDivEnd . $descWrapDivStart . $descDiv . $nameDiv . $posDiv . $rateDiv . $descWrapDivEnd . $itemLiEnd;
                break;
            default:
                break;
        }
    }

   $ul .= '</ul>';
   $html .= $ul;
	
	if ($testo_effect!= 'it-no-animation')	{
		$script_outputs .='
			jQuery(document).ready(function() {
				wow'.$rand_id.' = new WOW(
				  {
					boxClass:     "pl-animate'.$rand_id.'",
					animateClass: "visible animated",
					offset:       100,
				  }
				);
				wow'.$rand_id.'.init();
			});';
	}
    $script_outputs .= "</script>";
    $html .= '</div>';
}
?>