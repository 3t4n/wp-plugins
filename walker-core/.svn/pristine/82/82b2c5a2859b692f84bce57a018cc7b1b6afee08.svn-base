<?php

$client_id = ! empty( $attributes['clientId'] ) ? $attributes['clientId'] : '';
$block_id  = 'walkerCore_' . str_replace( '-', '_', $client_id );

wp_localize_script( 'walker-core--block-scripts', $block_id, $attributes );
wp_add_inline_script( 'walker-core--block-scripts', 'document.addEventListener("DOMContentLoaded", function(event) { window.walkerCoreAccordionBlock( "' . $client_id . '" ) }) ' );

$block_styles = <<<BLOCK_STYLES
#{$block_id} .walker-core-accordion-item-block {
    margin-bottom: {$attributes['gap']}px;
}

#{$block_id} .walker-core-accordion__title-wrapper .walker-core-accordion__title {
    font-size: {$attributes['accordionStyles']['fontSize']}px;
    font-weight: {$attributes['accordionStyles']['fontWeight']};
    color: {$attributes['accordionStyles']['default']['color']};
}
#{$block_id} .walker-core-accordion__title-wrapper.active .walker-core-accordion__title {
    color: {$attributes['accordionStyles']['active']['color']};
}

#{$block_id} .walker-core-accordion__title-wrapper .walker-core-icon {
    width: {$attributes['accordionStyles']['iconSize']}px;
    height: {$attributes['accordionStyles']['iconSize']}px;
    fill: {$attributes['accordionStyles']['default']['iconColor']};
}
#{$block_id} .walker-core-accordion__title-wrapper.active .walker-core-icon {
    fill: {$attributes['accordionStyles']['active']['iconColor']};
}

BLOCK_STYLES;

$output  = '<div class="walker-core-block__accordion-wrapper">';
$output .= '<style>' . $block_styles . '</style>';
$output .= $content;
$output .= '</div>';

echo $output;
