<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
} ?>

<div class="subtext" style="text-align: <?php echo esc_attr($atts['align']); ?>;<?php if ($atts['color'] != '') { ?> color: <?php echo esc_attr($atts['color']); ?>;<?php } ?>">
	<p><?php echo wp_kses_post($atts['content']); ?></p>
</div>