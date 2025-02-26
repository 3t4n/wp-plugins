<?php
// check for required php version and deactivate the plugin if php version is less.
if ( version_compare( PHP_VERSION, '5.4', '<' )) {
    add_action( 'admin_notices', 'apt_notice', 100 );
    function apt_notice() { ?>
        <div class="error"> <p>
                <?php
                echo 'Pricing Table Plugin requires minimum PHP 5.4 to function properly. Please upgrade PHP version. The Plugin has been auto-deactivated.. You have PHP version '.PHP_VERSION;
                ?>
            </p></div>
        <?php
        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }
    }

    // deactivate the plugin because required php version is less.
    add_action( 'admin_init', 'pricingTable_deactivate_self' );
    function pricingTable_deactivate_self() {
        deactivate_plugins( PT_BASE );
    }
    return;
}


/**
 * Darken or lighten a given hex color and return it.
 * @param string $hex Hex color code to be darken or lighten
 * @param int $percent The number of percent of darkness or brightness
 * @param bool|true $darken Lighten the color if set to false, otherwise, darken it. Default is true.
 *
 * @return string
 */
function pt_adj_brightness($hex, $percent, $darken = true) {
    // determine if we want to lighten or draken the color. Negative -255 means darken, positive integer means lighten
    $brightness = $darken ? -255 : 255;
    $steps = $percent*$brightness/100;

    // Normalize into a six character long hex string
    $hex = str_replace('#', '', $hex);
    if (strlen($hex) == 3) {
        $hex = str_repeat(substr($hex,0,1), 2).str_repeat(substr($hex,1,1), 2).str_repeat(substr($hex,2,1), 2);
    }

    // Split into three parts: R, G and B
    $color_parts = str_split($hex, 2);
    $return = '#';

    foreach ($color_parts as $color) {
        $color   = hexdec($color); // Convert to decimal
        $color   = max(0,min(255,$color + $steps)); // Adjust color
        $return .= str_pad(dechex($color), 2, '0', STR_PAD_LEFT); // Make two char hex code
    }

    return $return;
}


