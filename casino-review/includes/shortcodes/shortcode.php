<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Adds featured Casino Shortcode

function casino_review_shortcode($atts) {

	extract(shortcode_atts(array(

		'site1' => '',		

		'site2' => '',		

		'site3' => '',		

		'site4' => '',		

		'site5' => '',		

		'site6' => '',		

		'site7' => '',		

		'site8' => '',		

		'site9' => '',		

		'site10' => '',

	), $atts));

	$sites = array ($site1,$site2,$site3,$site4,$site5,$site6,$site7,$site8,$site9,$site10);

	$html = '';

	global $post;

	$html .='<div class="fcrp-toptab">';


	foreach ($sites as $casino) {
		
		if ($casino !='') {
			
			$html .='<div class="fcrp-toptab-row"><div class="fcrp-toptab-col fcrp-site_list">';
				 
		    $html .= '	<a title="'.esc_attr(get_the_title($casino)).'" href="'.esc_url(get_post_meta($casino,'casinoReviewPageUrl',true)).'">';
				   
			if(has_post_thumbnail( $casino )){
				
				$html .= '<img src="'.esc_url(wp_get_attachment_image_src( get_post_thumbnail_id($casino), 'casino-logo', true )[0]).'" class="scfeat_logo fcrpimg-res" />';
				
				
			}else{
				
				$html .= '<img class="scfeat_logo fcrpimg-res" src="'.esc_url(WP_PLUGIN_URL).'/casino-review/assets/images/casino.png" >';
				
			}
				
			$html .= '</a><span><a title="'.esc_attr(get_the_title($casino)).'" href="'.esc_url(get_post_meta($casino,'casinoReviewPageUrl',true)).'">'.esc_attr(get_the_title($casino)).'</a></span>';
			 
					 
			$html .='</div><div class="fcrp-toptab-col fcrp-feat_list">';
	
			$html .= '<ul>';
			
			if(!empty(get_post_meta($casino, 'casinoFeatures', true))){
			
				$features = explode("|", esc_attr(get_post_meta($casino, 'casinoFeatures', true)));
				
				for($i = 0; $i < count($features); $i++){
					
					$html .= '<li><span></span>'. $features[$i] .'</li>';
				
				}
	
			}

			$html .= '</ul>';

			$html .='</div><div class="fcrp-toptab-col fcrp-bonus_list"><span class="fcrp-rate rmbottom"><span class="fcrp-rate-total">';
			
			if(!empty(get_post_meta($casino,'casinoEditorRating',true))){
				
				if(get_post_meta($casino,'casinoEditorRating',true)==1){
					
					$html .='<div><span class="stars-container stars-10">★★★★★</span></div>';
					
				}else if(get_post_meta($casino,'casinoEditorRating',true)==2){
					
					$html .='<div><span class="stars-container stars-20">★★★★★</span></div>';
					
				}else if(get_post_meta($casino,'casinoEditorRating',true)==3){
					
					$html .='<div><span class="stars-container stars-30">★★★★★</span></div>';
					
				}else if(get_post_meta($casino,'casinoEditorRating',true)==4){
					
					$html .='<div><span class="stars-container stars-40">★★★★★</span></div>';
					
				}else if(get_post_meta($casino,'casinoEditorRating',true)==5){
					
					$html .='<div><span class="stars-container stars-50">★★★★★</span></div>';
					
				}
				
			}
			
			$html .='</span></span>';
			
			if(!empty(get_post_meta($casino,'casinoBonusDisplayText',true))){
			
				$html .='<span class="fcrpbonus_text">'.esc_attr(get_post_meta($casino,'casinoBonusDisplayText',true)).'</span>';
			
			}
			
			$html .='</div><div class="fcrp-toptab-col fcrp-vis_list"><a href="';								
			
			if(!empty(get_post_meta($casino, 'casinoAffiliatUrl', true))){

				$html .= esc_url(get_post_meta($casino, 'casinoAffiliatUrl', true));

			}else{

				$html .='';

			}		
			
			$html .= '" class="fcrp-button playb">'.__('Play Now', 'casino-review').'</a>';
		
			if 	(!empty(get_post_meta($casino,'casinoReviewPageUrl',true))) {
			
				$html .= '<span class="fcrp_revlink"><a title="'.esc_attr(get_the_title($casino)).'" href="'.esc_url(get_post_meta($casino,'casinoReviewPageUrl',true)).'" >'.__('Review', 'casino-review').'</a></span>';
			
			}
	
			$html .= '</div></div>';
			 
		} 
		
	}

	$html .= '</div>';

	return $html;

}

add_shortcode('crshortcode', 'casino_review_shortcode');

?>