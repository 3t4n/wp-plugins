<?php if (!defined('FW')) die( 'Forbidden' ); 

$button_class = '';	

if ( $atts['color'] != 'inverse' && $atts['color'] != 'custom' && $atts['color'] != 'bw' ) $atts['color'] = 'basic';

$atts['size'] = trim($atts['size']);
if ( $atts['size'] == '' ) $atts['size'] = 'normal';	

	/* icon */
$atts['icon_position'] = trim($atts['icon_position']);
if ( $atts['icon_position'] != 'left' && $atts['icon_position'] != 'right') $atts['icon_position'] = 'none';		
$atts['icon'] = trim($atts['icon']);
if ( $atts['icon'] != '' && $atts['icon'] != 'fa fa-1-no-icon') {
	$ic = '<i class="'.$atts['icon'].' '.$atts['icon_position'].'-icon"></i>';
	$button_class .= ' has_icon';
} else $ic = '';


	/* link */
$atts['link'] = trim($atts['link']);
if ( $atts['link'] ) {
	if ( trim($atts['target']) == '_blank' ) $atts['target'] = '_blank'; else $atts['target'] = '_self';
	$atts['target'] = ' target="'.$atts['target'].'"';
	$href = ' href='.esc_url($atts['link']).'';
} else {
	$atts['target'] = '';
	$href = '';
}

	/* content */
if ( !trim($atts['content']) ) $button_class .= ' no-content';
?>	
<div class="button button-<?php echo esc_attr($atts['color']) ?>"<?php if ( $atts['color'] == 'custom' ) { ?> style="border-color: <?php echo esc_attr($atts['custom_color']) ?>;"<?php } ?>>
	<a class="btn <?php echo esc_attr($button_class) ?> button-<?php echo esc_attr($atts['size']) ?>" <?php echo esc_attr($href) ?> <?php echo $atts['target'] ?><?php if ( $atts['color'] == 'custom' ) { ?> style="background-color: <?php echo esc_attr($atts['custom_color']) ?>;"<?php } ?>>
    <?php if ( $atts['icon_position'] == 'left') { echo $ic; ?><span><?php echo esc_html($atts['content']) ?></span><?php }
	elseif ( $atts['icon_position'] == 'right') { ?><span><?php echo esc_html($atts['content']) ?></span> <?php echo $ic ; } else {?><span><?php echo esc_html($atts['content']) ?></span><?php } ?>
    </a>
</div>