<?php
$accordion_id = isset( $attributes['accordionId'] ) ? esc_html( $attributes['accordionId'] ) : '';
?>
<div <?php echo get_block_wrapper_attributes(); ?>>
	<?php
		echo do_shortcode( sprintf( '[soft_accordion id="%s"]', $accordion_id ) );
	?>
</div>
