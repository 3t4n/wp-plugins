<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
} ?>
<div class="heading-2" style="text-align: <?php echo esc_attr($atts['align']); ?>;<?php if ($atts['color'] != '') { ?> color:<?php echo esc_attr($atts['color']); ?>;<?php } ?>">
	<<?php echo esc_attr($atts['h']); ?> class="h"><i class="heading-icon heading-icon-left <?php echo esc_attr($atts['icon']); ?>"></i><?php echo esc_html($atts['content']); ?><i class="heading-icon heading-icon-right <?php echo esc_attr($atts['icon']); ?>"></i></<?php echo esc_attr($atts['h']); ?>>
</div>