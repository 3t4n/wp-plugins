<?php

/**
 * Plugin Name:       Liquid Edge Editor Customisations
 * Description:       A very simple plugin with some customizations to the editor
 * Version:           1.0
 * Requires at least: 4.7
 * Requires PHP:      5.6
 * Author:            Brad Tipper
 * Author URI:        https://liquidedge.co.nz/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       liquid-edge-editor-customisations
 */

defined( 'ABSPATH' ) or die( 'Yikes...' );

function led_editor_admin_styles() {

    $width = get_option( 'x_layout_site_max_width');

    echo '
        <style>
            /* Main column width */
            .wp-block {
                max-width:'.$width.';
            }
 
            /* Width of "wide" blocks */
            .wp-block[data-align="wide"] {
                max-width: 1920px;
            }
 
            /* Width of "full-wide" blocks */
            .wp-block[data-align="full"] {
                max-width: none;
            }	
        </style>
    ';
}

add_action('admin_head', 'led_editor_admin_styles');