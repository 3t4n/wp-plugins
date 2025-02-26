<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$post_id = get_the_ID();  
if ( function_exists( 'fw_get_db_post_option') ) {
	$basic_post_layer_select = fw_get_db_post_option( $post_id, 'basic_post_layer_select' ) ;
}
if ( function_exists( 'fw_get_db_customizer_option') ) {
	$basic_layer_select = fw_get_db_customizer_option( 'basic_layer_select');
}
if ($basic_post_layer_select == '2-col-l' || $basic_post_layer_select == '2-col-r') {
	$atts['fullwidth'] = 'no';
} elseif ($basic_layer_select == '2-col-l' || $basic_layer_select == '2-col-r') {
	$atts['fullwidth'] = 'no';
}

$random_section_number = rand(1000,9999);
?>
<div id="namaste-section-<?php echo esc_attr($random_section_number); ?>" class="shortcode-section<?php if ( $atts['fullwidth'] == 'yes' ) { ?> namaste-fullwidth-section<?php } ?>" style="background-color: <?php echo esc_attr($atts['background_color']); ?>; color: <?php echo esc_attr($atts['color']); ?>; border-top: <?php echo esc_attr($atts['border_top']); ?>; border-bottom: <?php echo esc_attr($atts['border_bottom']); ?>; <?php echo esc_attr($atts['customcss']); ?>">
	<div class="section-layer-holder<?php if ( $atts['parallax'] == 'yes' ) { ?> parallax-section<?php } ?><?php if ( $atts['image_position'] == 'right' || $atts['image_position'] == 'left') { ?> section-dynamic-width<?php } ?>"<?php if ( isset($atts['image']['url']) && $atts['image_position'] != 'left' && $atts['image_position'] != 'right' ) { ?> style="background-image: url(<?php echo esc_url($atts['image']['url']); ?>);<?php if ( $atts['image_position'] == 'pattern' ) { ?> background-size: inherit;<?php } ?>"<?php } ?>>
		<?php if ( $atts['image_position'] != 'right' && $atts['image_position'] != 'left') { ?><div class="section-layer-<?php echo esc_attr($random_section_number); ?> section-layer" style="background: <?php echo esc_attr($atts['layer_color']); ?>; opacity: .<?php echo esc_attr($atts['layer']); ?>;"></div><?php } ?>
        <?php if ( $atts['image_position'] == 'right' ) { ?>
		<div class="section-image-right"<?php if ( isset($atts['image']['url'])) { ?> style="background-image: url(<?php echo esc_url($atts['image']['url']); ?>);"<?php } ?>>
        	<div class="section-layer" style="background: <?php echo esc_attr($atts['layer_color']); ?>; opacity: .<?php echo esc_attr($atts['layer']); ?>;"></div>
        </div>
        <?php } elseif ( $atts['image_position'] == 'left' ) { ?>
		<div class="section-image-left"<?php if ( isset($atts['image']['url'])) { ?> style="background-image: url(<?php echo esc_url($atts['image']['url']); ?>);"<?php } ?>>
        	<div class="section-layer" style="background: <?php echo esc_attr($atts['layer_color']); ?>; opacity: .<?php echo esc_attr($atts['layer']); ?>;"></div>
        </div>
        <?php } ?>
		<div class="section-content<?php if ( $atts['image_position'] == 'right' ) { ?> section-content-left<?php } elseif ( $atts['image_position'] == 'left' ) { ?> section-content-right<?php } ?>" style="padding: <?php echo esc_attr($atts['padding']); ?>px 0; text-align: <?php echo esc_attr($atts['align']); ?>;">
        	<div class="container"><?php echo do_shortcode( $content ); ?></div>
            <div class="clearfix"></div>
        </div>
	</div>
</div>