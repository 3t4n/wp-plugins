<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hmlsImgRotate = ( $hmls_slide_height - (($hmls_slide_height * 80)/100) ) / 2;
?>
<style type="text/css">
.hmls-logo-main-wrapper {
    background-color: <?php esc_html_e( $hmls_grid_container_bg_color ); ?>;
    border: <?php esc_html_e( $hmls_grid_container_border_width ); ?>px solid <?php esc_html_e( $hmls_grid_container_border_color ); ?>;
    border-radius: <?php esc_html_e( $hmls_grid_container_radius ); ?>px;
    padding: <?php esc_html_e( $hmls_grid_container_padding_top ); ?>px <?php esc_html_e( $hmls_grid_container_padding_right ); ?>px <?php esc_html_e( $hmls_grid_container_padding_bottom ); ?>px <?php esc_html_e( $hmls_grid_container_padding_left ); ?>px;
    grid-gap: <?php esc_html_e( $hmls_grid_item_gap ); ?>px;
}
.hmls-logo-main-wrapper>.hmls-logo-item {
    border: <?php esc_html_e( $hmls_grid_item_border_width ); ?>px solid <?php esc_html_e( $hmls_grid_item_border_color ); ?>;
    border-radius: <?php esc_html_e( $hmls_grid_item_radius ); ?>px;
    background-color: <?php esc_html_e( $hmls_grid_item_bg_color ); ?>;
}
.hmls-logo-main-wrapper>.hmls-logo-item:hover {
    border: <?php esc_html_e( $hmls_grid_item_border_width ); ?>px solid <?php esc_html_e( $hmls_grid_item_brdr_clr_hvr ); ?>;
    background-color: <?php esc_html_e( $hmls_grid_item_bg_clr_hvr ); ?>;
}
<?php
if ( $hmls_grid_zoom_in ) {
    ?>
    .hmls-logo-main-wrapper>.hmls-logo-item.default:hover {
        -ms-transform: scale(1.2);
        -moz-transform: scale(1.2);
        -webkit-transform: scale(1.2);
        -o-transform: scale(1.2);
        transform: scale(1.2);
    }
    <?php
}
?>
</style>