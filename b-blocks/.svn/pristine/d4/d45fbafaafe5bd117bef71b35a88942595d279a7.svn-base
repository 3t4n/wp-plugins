<?php
$prefix = 'bBlocksNavigation';
$id = wp_unique_id( "$prefix-" );

extract( $attributes );

$orientation = $layout['orientation'];
$wrapMultipleLine = $layout['wrapMultipleLine'];
$displayMenu = $hamburger['displayMenu'];

$align = ($orientation === 'is-vertical') ? 'vertical-align-' . $layout['verticalAlignment'] : 'horizontal-align-' . $layout['alignment'];

$className = "$prefix $orientation $displayMenu ". ( $wrapMultipleLine ? '' : 'no-wrap' ) ." $align";
?>
<div <?php echo get_block_wrapper_attributes(); ?> id='<?php echo esc_attr( $id ); ?>' data-attributes='<?php echo esc_attr( wp_json_encode( $attributes ) ); ?>'>
	<div class='<?php echo esc_attr( $className ) ?>'>
		<?php echo wp_kses( $content, BBlocks\Inc\Utils::allowedInnerHTML() ); ?>
	</div>
</div>


