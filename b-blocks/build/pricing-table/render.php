<?php
$id = wp_unique_id( 'bBlocksPricingTable-' );
$planClass = BBlocks\Inc\Utils::isPro() ? 'pro' : 'free';

extract( $attributes );
$className = $className ?? 'is-style-basic';
$isStandard = false !== strpos($className, 'standard');
$isUltimate = false !== strpos($className, 'ultimate');
$basicClass = !$isStandard && !$isUltimate ? 'is-style-basic': '';
?>
<div <?php echo get_block_wrapper_attributes( [ 'class' => "$planClass $basicClass" ] ); ?> id='<?php echo esc_attr( $id ); ?>' data-attributes='<?php echo esc_attr( wp_json_encode( $attributes ) ); ?>'></div>