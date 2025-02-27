<!-- templates/template-exposed.php -->
<?php
/**
 * @var string $alignment
 * @var string $has_current
 * @var string $toggle_button
 * @var string $button_html
 */
$className = sprintf( 'da-reactions-container %1$s %2$s', $alignment, $has_current );
?>
<div class="<?php echo esc_attr( $className ) ?>">
	<?php echo wp_kses( $toggle_button, 'da-r-post-with-svg' ) ?>
    <div class="reactions responsive">
	    <?php echo wp_kses( $button_html, 'da-r-post-with-svg' ) ?>
    </div>
</div>
