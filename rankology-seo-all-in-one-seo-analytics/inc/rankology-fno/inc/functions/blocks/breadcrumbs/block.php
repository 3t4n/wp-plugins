<?php
/**
 * Breadcrumbs Block display callback
 *
 * @param   array     $attributes  Block attributes
 * @param   string    $content     Inner block content
 * @param   WP_Block  $block       Actual block
 * @return  string    $html
 */
function rankology_fno_breadcrumb_block( $attributes, $content, $block ){
    $html = '';
    if ( '1' == rankology_get_toggle_option( 'breadcrumbs' ) ) {
        if ( '1' === rankology_fno_get_service('OptionPro')->getBreadcrumbsEnable() || '1' === rankology_fno_get_service('OptionPro')->getBreadcrumbsJsonEnable() ) {
            $attr   = get_block_wrapper_attributes();
            $html   = sprintf( '<div %s>%s</div>', $attr, rankology_display_breadcrumbs( false ) );
        }
    }
    return apply_filters( 'rankology_fno_breadcrumb_block_html', $html, $attributes, $content, $block );
}
