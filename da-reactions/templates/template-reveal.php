<?php
/**
 * @var array $settings
 * @var string $current
 * @var string $button_html
 * @var string $image
 * @var string $count_badge
 */
$outerClassName = sprintf("da-reactions-reveal %s", $settings['alignment']);
$innerClassName = sprintf("after-reveal da-reactions-container %s", $current);
?>
<div class="<?php echo esc_attr( $outerClassName ); ?>">
    <div class="before-reveal">
		<?php echo wp_kses( $image, 'da-r-img' ); ?>
		<?php echo wp_kses( $count_badge, 'post' ); ?>
    </div>
    <div class="<?php echo esc_attr( $innerClassName ); ?>">
		<?php echo wp_kses( $button_html, 'da-r-post-with-svg' ); ?>
    </div>
</div>
