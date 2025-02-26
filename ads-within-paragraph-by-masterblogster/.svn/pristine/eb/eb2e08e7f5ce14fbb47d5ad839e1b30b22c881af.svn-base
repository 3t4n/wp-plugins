<?php

/*
Plugin Name: Ads Within Paragraph by MasterBlogster
Plugin URI: http://masterblogster.com/plugins/ads-within-paragraph/
Description: Ads within paragraph plugin helps you add your advertisement inside wordpress article, you can add your advertisement left to, right to, above or below any paragraph.
Author: <a href="http://www.masterblogster.com">Shrinivas Naik </a>, <a href="http://www.techgyo.com"> Sreejesh Suresh
Version: 1.0
Author URI: http://www.masterblogster.com
*/

// Hook will fire upon activation - we are using it to set default option values
register_activation_hook( __FILE__, 'mb_ads_within_paragraph_activate_plugin' );

// Add options and populate default values on first run
function mb_ads_within_paragraph_activate_plugin() {

	// populate plugin options array
	$ads_within_paragraph_settings = array(
		'firstadcode_position'=> 'To Left',
		'firstadcode_paragraph'=> 1
		);

	// create field in WP_options to store all plugin data in one field
	add_option( 'ads_within_paragraph_settings', $ads_within_paragraph_settings );
}


//Retrieve plugin settings from the options table
$mb_ads_within_paragraph_options=get_option('ads_within_paragraph_settings');

// Add plugin options page
include(plugin_dir_path( __FILE__ ) . 'mb_ads_within_paragraph_options.php');

/* --------------------------------------------------------------------------------------------------------------------*/
/*  Main plugin code */
/* --------------------------------------------------------------------------------------------------------------------*/
function mb_ads_within_paragraph_div_code($content){

	global $mb_ads_within_paragraph_options;
	$adposition=$mb_ads_within_paragraph_options['firstadcode_position'];
	$adparagraph=$mb_ads_within_paragraph_options['firstadcode_paragraph'];
	$adsensecode=$mb_ads_within_paragraph_options['firstadcode_adcode'];
	
	if($adsensecode!=""){
	?>
		<style>
		.mb_first_ad_div{
			width:auto;
			height:auto;
			<?php if($adposition=="To Left"){?>
			float:left;
			<?php } ?>
			<?php if($adposition=="To Right"){?>
			float:right;
			<?php } ?>
			text-align:center;
			margin:15px;
		}
		</style>
		
		<?php if($adposition=="To Left" || $adposition=="To Right"){
        $adcontent='<div class="mb_first_ad_div">' .$adsensecode. '</div>';
		}
		
		if($adposition=="Before" ){
		$adcontent='<div class="mb_first_ad_div" style="float:none">' .$adsensecode. '</div>';
		}
		
		if($adposition=="After" ){
		$adcontent='<div class="mb_first_ad_div" style="float:none">' .$adsensecode. '</div>';
		}
		
		if ( is_single() && ! is_admin() ) {
			return prefix_insert_after_paragraph($adcontent, $adparagraph, $content );
		}
		
		if( $mb_ads_within_paragraph_options['showonpages']=="1"){
			if(is_page()){
				return prefix_insert_after_paragraph($adcontent, $adparagraph, $content );
			}
		}

		return $content;
		
	} else {?>

			<style>
			.default_ad_div_style{
				height:250px;
				width:300px;
				border:thick #CCC solid;
				line-height:240px;
				text-align:center;
				font-family:Verdana, Geneva, sans-serif;
				<?php if($adposition=="To Left"){?>
				float:left;
				<?php } ?>
				<?php if($adposition=="To Right"){?>
				float:right;
				<?php } ?>
				margin:15px;	
			}
			</style>
			<?php
			$mb_default_ad_div='<div class="default_ad_div_style"> Your Advertisement Goes Here!.. </div>';
			
			if (is_single($post)) {
				return prefix_insert_after_paragraph( $mb_default_ad_div, $adparagraph, $content);
			} else {
				return prefix_insert_after_paragraph( "", $adparagraph, $content);
			}// if ended
	}// if ended
	
} //function ended

function prefix_insert_after_paragraph( $insertion, $paragraph_id, $content ) {

	global $mb_ads_within_paragraph_options;
	$adposition=$mb_ads_within_paragraph_options['firstadcode_position'];
	$adparagraph=$mb_ads_within_paragraph_options['firstadcode_paragraph'];
	
    $closing_p = '</p>';
    $paragraphs = explode( $closing_p, $content );
    foreach ($paragraphs as $index => $paragraph) {
        if ( trim( $paragraph ) ) {
            $paragraphs[$index] .= $closing_p;
        }
        if ( $paragraph_id == $index+1 ) {
			if($adposition=="Before"){
            $paragraphs[$index] = $insertion . $paragraphs[$index];
			}
			if($adposition=="After"){
            $paragraphs[$index] .= $insertion;
			}
			if($adposition=="To Left" || $adposition=="To Right" ){
            $paragraphs[$index] = $insertion . $paragraphs[$index];
			}
        }
    }
    return implode( '', $paragraphs );
}

add_filter('the_content','mb_ads_within_paragraph_div_code');

//Delete saved option after uninstalling the plugin
register_uninstall_hook(__FILE__, 'uninstall_ads_within_paragraph_hook');
function uninstall_ads_within_paragraph_hook() { 
delete_option('ads_within_paragraph_settings');
} 
?>