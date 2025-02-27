<?php

$client_id = ! empty( $attributes['clientId'] ) ? $attributes['clientId'] : '';
$block_id  = 'walkerCore_' . str_replace( '-', '_', $client_id );

wp_localize_script( 'walker-core--block-scripts', $block_id, $attributes );
wp_add_inline_script( 'walker-core--block-scripts', 'document.addEventListener("DOMContentLoaded", function(event) { window.walkerCorePostBlock( "' . $client_id . '" ) }) ' );

$nav_color_hover     = isset( $attributes['navigation']['colorHover'] ) ? $attributes['navigation']['colorHover'] : '';
$nav_box_color       = isset( $attributes['navigation']['boxColor'] ) ? $attributes['navigation']['boxColor'] : '';
$nav_box_color_hover = isset( $attributes['navigation']['boxColorHover'] ) ? $attributes['navigation']['boxColorHover'] : '';

$column1 = $attributes['gridOptions']['columnCount'] <= 3 ? $attributes['gridOptions']['columnCount'] : 3;
$column2 = $attributes['gridOptions']['columnCount'] <= 2 ? $attributes['gridOptions']['columnCount'] : 2;

$block_styles = <<<BLOCK_STYLES
#{$block_id}.layout-grid:not(.has-masonry) .walker-core__grid-wrapper {
    display: grid;
    grid-template-columns: repeat({$attributes['gridOptions']['columnCount']}, 1fr);
    gap: {$attributes['gridOptions']['gap']}px;
}
#{$block_id}.layout-grid.has-masonry .walker-core__grid-wrapper {
    column-count: {$attributes['gridOptions']['columnCount']};
    column-gap: {$attributes['gridOptions']['gap']}px;
    break-inside: avoid-column;
    display: block;
}
#{$block_id}.layout-grid.has-masonry .walker-core__grid-wrapper .wp-block-post {
    margin-bottom: {$attributes['gridOptions']['gap']}px;
}
@media screen and (max-width: 1024px) {
    #$block_id.layout-grid:not(.has-masonry) .walker-core__grid-wrapper {
        grid-template-columns: repeat(
            $column1,
            1fr
        ) !important;
    }
    #$block_id.layout-grid.has-masonry .walker-core__grid-wrapper {
        column-count: $column1 !important;
    }
}

@media screen and (max-width: 767px) {
    #$block_id.layout-grid:not(.has-masonry) .walker-core__grid-wrapper {
        grid-template-columns: repeat(
            $column2,
            1fr
        ) !important;
    }
    #$block_id.layout-grid.has-masonry .walker-core__grid-wrapper {
        column-count: $column2 !important;
    }
}

@media screen and (max-width: 400px) {
    #$block_id.layout-grid:not(.has-masonry) .walker-core__grid-wrapper {
        grid-template-columns: repeat(
            1,
            1fr
        ) !important;
    }
    #$block_id.layout-grid.has-masonry .walker-core__grid-wrapper {
        column-count: 1 !important;
    }
}

#{$block_id}.layout-carousel.carousel-direction-vertical .swiper-wrapper {
    max-height: {$attributes['height']}px; 
    height: 100%;
}

#{$block_id} .swiper-button-prev::after,
#{$block_id} .swiper-button-next::after {
    font-size: {$attributes['navigation']['size']}px;
}
#{$block_id} .swiper-button-prev,
#{$block_id} .swiper-button-next {
    width: {$attributes['navigation']['boxWidth']}px;
    height: {$attributes['navigation']['boxHeight']}px;
    border-radius: {$attributes['navigation']['borderRadius']}px;
    border: {$attributes['navigation']['border']['width']} {$attributes['navigation']['border']['style']} {$attributes['navigation']['border']['color']};
    color: {$attributes['navigation']['color']};
    background-color: {$nav_box_color};
}
#{$block_id} .swiper-button-prev:hover,
#{$block_id} .swiper-button-next:hover {
    color: {$nav_color_hover};
    background-color: {$nav_box_color_hover};
    border-color: {$attributes['navigation']['borderColorHover']};
}

#{$block_id} .swiper-pagination {
    bottom: {$attributes['pagination']['verticalPosition']}px;
}
#{$block_id} .swiper-pagination .swiper-pagination-bullet {
    width: {$attributes['pagination']['default']['width']}px;
    height: {$attributes['pagination']['default']['height']}px;
    border-radius: {$attributes['pagination']['default']['borderRadius']}px;
    background-color: {$attributes['pagination']['default']['color']};
}
#{$block_id}.carousel-direction-horizontal .swiper-pagination-bullets .swiper-pagination-bullet {
    margin: 0 var(--swiper-pagination-bullet-horizontal-gap, {$attributes['pagination']['gap']}px);
}
#{$block_id}.carousel-direction-vertical .swiper-pagination-bullets .swiper-pagination-bullet {
    margin: var(--swiper-pagination-bullet-vertical-gap, {$attributes['pagination']['gap']}px) 0;
}
#{$block_id} .swiper-pagination .swiper-pagination-bullet-active {
    width: {$attributes['pagination']['active']['width']}px;
    height: {$attributes['pagination']['active']['height']}px;
    outline: {$attributes['pagination']['active']['border']['width']} {$attributes['pagination']['active']['border']['style']} {$attributes['pagination']['active']['border']['color']};
    outline-offset: {$attributes['pagination']['active']['offset']}px;
    border-radius: {$attributes['pagination']['active']['borderRadius']}px;
    background-color: {$attributes['pagination']['active']['color']};
}
#{$block_id} .swiper-pagination .swiper-pagination-bullet:hover {
    background-color: {$attributes['pagination']['default']['colorHover']};
}
#{$block_id} .swiper-pagination .swiper-pagination-bullet-active:hover {
    background-color: {$attributes['pagination']['active']['colorHover']};
    border-color: {$attributes['pagination']['active']['borderColorHover']};
}
BLOCK_STYLES;

$output  = '<div class="walker-core-block__post-wrapper">';
$output .= '<style>' . $block_styles . '</style>';
$output .= $content;
$output .= '</div>';

echo $output;
