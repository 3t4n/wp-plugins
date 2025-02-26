<?php
/**
 * Advance Pricing Table by WPBean
 */

/* ==========================================================================
   pricing tabel shortcode
   ========================================================================== */


function plain_pricing_pricing_table_shortcode_function($atts){
	extract(shortcode_atts( array(
		'theme' 		=> 'theme-1', // theme-1, theme-2, theme-3
		'plan_name' 	=> 'Plan Name', // For theme 1 & 3
		'price' 		=> '4',
		'currency' 		=> '$',
		'period'		=> 'Per Month', 
		'btn_text'		=> 'Buy Now',
		'btn_url'		=> 'http://wpbean.com/plugins/',
		'features'		=> 'Responsive design, Free update & support, Three different theme, Advance settings', // comma seperated different features
		'highlight'		=> '', // yes or empty
		'color'			=> '',
	), $atts));

	if( isset($features) && !empty($features) ){
		$features = explode(',', $features);
	}
	if( isset($highlight) && !empty($highlight) ){
		$highlight = 'wpb-highlighted-plan';
	}

	ob_start();
	?>

	<?php if( $theme == 'theme-1' ):?>

	<div class="wpb-pricing-table pricing-table-1 text-center <?php echo $highlight; ?>" <?php echo ( $color ? 'style="color: '.$color.'"' : '' ); ?>>
	<div class="table-header"><h3><?php echo $plan_name; ?></h3></div>
	<div class="plan">
	<?php echo ( isset($price) ? '<h3 class="wpb-price">'.$currency.$price.'</h3>' : '' );?>
	<?php echo ( $period ? '<p class="period">'.$period.'</p>' : '' );?>
	</div>
	<div class="plan-info">
	<?php 
	if( isset($features) && is_array($features) ){
		foreach ($features as $feature) {
			echo '<p>'.$feature.'</p>';
		}
	}
	?>
	<?php echo ( $btn_text ? '<p class="button-area"><a href="'.$btn_url.'" class="wpb-btn wpb-btn-common">'.$btn_text.'</a></p>' : '' ); ?>
	</div>
	</div>

	<?php elseif ( $theme == 'theme-2' ):?>

	<div class="wpb-pricing-table pricing-table-2 text-center <?php echo $highlight; ?>" <?php echo ( $color ? 'style="color: '.$color.'"' : '' ); ?>>
	<div class="head">
	<?php echo ( $period ? '<h3 class="period">'.$period.'</h3>' : '' );?>
	<?php echo ( isset($price) ? '<h3 class="wpb-price"><span>'.$currency.'</span>'.$price.'</h3>' : '' );?>
	<?php 
	if( isset($features) && is_array($features) ){
		foreach ($features as $feature) {
			echo '<p>'.$feature.'</p>';
		}
	}
	?>
	</div>
	<?php echo ( $btn_text ? '<p class="button-area"><a href="'.$btn_url.'" class="wpb-btn wpb-btn-border">'.$btn_text.'</a></p>' : '' ); ?>
	</div>
	<style type="text/css">
		.pricing-table-2 .period,
		.pricing-table-2 .wpb-price{
			color: <?php echo ( $color ? $color : '#ffffff' ); ?>;
		}
	</style>

	<?php elseif ( $theme == 'theme-3' ):?>	

	<div class="wpb-pricing-table pricing-table-x text-center <?php echo $highlight; ?>" <?php echo ( $color ? 'style="color: '.$color.'"' : '' ); ?>>
	<div class="table-header"><div class="table-header-inner"><h3><?php echo $plan_name; ?></h3></div></div>
	<div class="plan">
	<?php echo ( isset($price) ? '<div class="wpb-price">'.$price.'<span class="currency-symbol">'.$currency.'</span></div>' : '' );?>
	<?php echo ( $period ? '<p class="period">'.$period.'</p>' : '' );?>
	</div>
	<div class="plan-info">
	<?php 
	if( isset($features) && is_array($features) ){
	foreach ($features as $feature) {
		echo '<p>'.$feature.'</p>';
	}
	}
	?>
	<?php echo ( $btn_text ? '<p class="button-area"><a href="'.$btn_url.'" class="wpb-btn wpb-btn-common">'.$btn_text.'</a></p>' : '' ); ?>
	</div>
	</div>

	<?php endif;?>	

	<?php
	return ob_get_clean();
}
add_shortcode( 'wpb-pricing-table', 'plain_pricing_pricing_table_shortcode_function' );




/* ==========================================================================
   Row shortcode function
   ========================================================================== */

function wpb_apt_row_function($atts,  $content = null){
	extract(shortcode_atts( array(
		'bg' 			=> '', // color code
		'primary_color' => '#e74c3c', // Primary color code
	), $atts));
	$output = '<div class="wpb-row">';
	if( $bg && !empty($bg) ){
		$output .= '<div class="wpb-row-inner" style="background-color: '.$bg.'" >';
	}
	$output .= wpb_apt_remove_wpautop($content);
	if( $bg && !empty($bg) ){
		$output .='</div>';
	}
	$output .='<style>.pricing-table-1 .table-header, .pricing-table-x .plan, .wpb-btn-common, .pricing-table-x .table-header { background: '.$primary_color.'; }</style>';
	$output .='</div>';
	return $output;
}
add_shortcode('wpb-row','wpb_apt_row_function');



/* ==========================================================================
   Column shortcode function
   ========================================================================== */


function wpb_apt_col_function($atts,  $content = null){
	extract(shortcode_atts(array(
      'col'		=> '4',
	), $atts));

	$output = '<div class="wpb-col-md-'.$col.'">'.wpb_apt_remove_wpautop($content).'</div>';
	return $output;
}
add_shortcode('wpb-column','wpb_apt_col_function');



/* ==========================================================================
   remove auto P tag
   ========================================================================== */


function wpb_apt_remove_wpautop( $content, $autop = false ) {

	if ( $autop ) { // Possible to use !preg_match('('.WPBMap::getTagsRegexp().')', $content)
		$content = wpautop( preg_replace( '/<\/?p\>/', "\n", $content ) . "\n" );
	}
	return do_shortcode( shortcode_unautop( $content) );
}

/* ==========================================================================
   remove br tags form shortcode
   ========================================================================== */


function wpb_the_content_unautop($content) {
    $block = join("|",array("wpb-row", "wpb-column"));
    $rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);
    $rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);
return $rep;
}
add_filter("the_content", "wpb_the_content_unautop");