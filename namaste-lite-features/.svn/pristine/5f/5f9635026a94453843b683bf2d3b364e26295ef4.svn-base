<?php if (!defined('FW')) die('Forbidden');

$class = fw_ext_builder_get_item_width('page-builder', $atts['width'] . '/frontend_class');
?>
<div class="<?php echo esc_attr($class); ?>" style="padding-left: <?php echo esc_attr($atts['left']); ?>px; padding-right: <?php echo esc_attr($atts['right']); ?>px;<?php if ($atts['align'] != '') { ?> text-align: <?php echo esc_attr($atts['align']); ?>;<?php } ?> <?php echo wp_kses_post($atts['customcss']); ?>">
	<?php echo do_shortcode($content); ?>
</div>