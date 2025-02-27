<?php

if ( !defined( 'ABSPATH' ) ) {
    exit;
}
$hmls_grid_template = get_option( 'hmls_grid_temp_settings', 'default' );
$hmls_grid_item_border_width = ( isset( $hmlsAttr['border_width'] ) ? $hmlsAttr['border_width'] : $hmls_grid_item_border_width );
$hmls_grid_item_gap = ( isset( $hmlsAttr['grid_gap'] ) ? $hmlsAttr['grid_gap'] : $hmls_grid_item_gap );
include HMLS_PATH . 'assets/css/grid.php';
?>
<div class="hmls-logo-main-wrapper <?php 
echo esc_attr( 'hmls-cols-desktop-' . $hmls_cols_desktop );
?>" style="grid-gap: <?php 
esc_attr_e( $hmls_grid_item_gap );
?>px;">
    <?php 
while ( $hmls_logos->have_posts() ) {
    $hmls_logos->the_post();
    $hmls_logo_url = get_post_meta( $post->ID, 'hmls_logo_url', true );
    $hmls_img_url = get_post_meta( $post->ID, 'hmls_img_url', true );
    $img_url = HMLS_ASSETS . 'img/noimage.jpg';
    if ( $hmls_img_url ) {
        $img_url = $hmls_img_url;
    } else {
        if ( get_the_post_thumbnail( get_the_ID() ) ) {
            $img_url = get_the_post_thumbnail_url( $post->ID, 'full' );
        }
    }
    if ( 'default' === $hmls_grid_template ) {
        include HMLS_PATH . 'front/view/layout/temp/grid-default.php';
    }
    if ( 'inner-link' === $hmls_grid_template ) {
        include HMLS_PATH . 'front/view/layout/temp/grid-inner-link.php';
    }
    if ( 'only-logo' === $hmls_grid_template ) {
        include HMLS_PATH . 'front/view/layout/temp/grid-only-logo.php';
    }
    if ( 'only-grayscale' === $hmls_grid_template || 'gray-color' === $hmls_grid_template || 'color-gray' === $hmls_grid_template ) {
        include HMLS_PATH . 'front/view/layout/temp/grid-only-grayscale.php';
    }
    if ( 'category' === $hmls_grid_template ) {
        include HMLS_PATH . 'front/view/layout/temp/grid-category.php';
    }
    if ( 'title' === $hmls_grid_template ) {
        include HMLS_PATH . 'front/view/layout/temp/grid-title.php';
    }
    if ( 'title_desc' === $hmls_grid_template ) {
        include HMLS_PATH . 'front/view/layout/temp/grid-title-desc.php';
    }
}
?>
</div>