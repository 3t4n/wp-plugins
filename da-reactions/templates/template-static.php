<?php
/**
 * @var array $settings
 * @var string $current
 * @var string $button_html
 */
$className = sprintf( 'da-reactions-container %1$s %2$s', $settings['alignment'], $current );
?>
<div class="<?php echo esc_attr( $className ); ?>">
    <div class="reactions">
		<?php echo wp_kses( $button_html, 'da-r-post-with-svg' ); ?>
    </div>
</div>
