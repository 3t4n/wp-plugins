<?php

/**
* Views: Floating Links
*/
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
$type = 'bar';
if ( isset( $settings['type'] ) && !empty( $settings['type'] ) ) {
    $type = $settings['type'];
}
$position = 'right';
if ( isset( $settings['fl_position'] ) && !empty( $settings['fl_position'] ) ) {
    $position = $settings['fl_position'];
}
$scroll_class = null;
// Check if template file exists in theme folder, if not then load from plugin folder
$template_url = locate_template( array('floating-links/views/templates/template-' . $type . '.php') );
if ( !$template_url ) {
    $template_url = FLOATING_LINKS_DIR . 'frontend/views/templates/template-' . $type . '.php';
}
require $template_url;