<!-- templates/buttons-placeholder.php -->
<?php
/**
 * @var string $item_type
 * @var string $item_id_value
 * @var string $element_id
 * @var string $alignment
 * @var string $template
 * @var string $single_reaction_image
 * @var string $before_reactions
 */
$outerClassName = sprintf("da-reactions-outer T%sID%s", $item_type, $item_id_value);
$innerClassName = sprintf("da-reactions-data da-reactions-container-async %s", $alignment);
?>
<div class="<?php echo esc_attr( $outerClassName ); ?>">
	<?php echo wp_kses( $before_reactions, 'post' ); ?>
    <div class="<?php echo esc_attr( $innerClassName ); ?>"
         data-type="<?php echo esc_attr( $item_type ); ?>"
         data-id="<?php echo esc_attr( $item_id_value ); ?>"
         id="<?php echo esc_attr( $element_id ); ?>">
        <div class="da-reactions-<?php echo esc_attr( $template ); ?>">
			<?php echo wp_kses( $single_reaction_image, 'da-r-img' ); ?>
        </div>
    </div>
</div>
