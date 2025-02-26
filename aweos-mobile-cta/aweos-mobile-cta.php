<?php
/**
 * AWEOS Mobile CTA
 *
 * @wordpress-plugin
 * Plugin Name: AWEOS Mobile CTA
 * Description: Call to action banner for mobile devices in footer
 * Version:     1.1
 * Author:      AWEOS GmbH
 * Author URI:  https://aweos.de
 * Text Domain: aweos-mobile-cta-domain
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt

 Make it easier for visitors to call you on mobile devices. You can change the color of the phone number, and the background.

 */

if (!defined('ABSPATH')) exit;

function awap_activate() 
{
    add_option('awap-text-color', 'white');
    add_option('awap-background-color', 'black');
    add_option('awap-media-size', '800');
}

register_activation_hook( __FILE__, 'awap_activate' );
require_once 'admin-menu-cta.php';

function cta_css() {
        $background = esc_html( get_option('awap-background-color') );
        $media_size = esc_html( get_option('awap-media-size') ) . 'px';


        $custom_css = "<style>
        .mobile-phone-cta {
            display:none;
        }
        @media (max-width: $media_size) {
            .mobile-phone-cta {
                display: block;
                padding-bottom: 60px;
            }
            .mobile-phone-cta a
            {
                background: $background;
                position: fixed;
                bottom: 0;
                z-index: 9999;
                display: block;
                width: 100%;
                font-size: 21px;
                padding: 12px;
                text-align: center;
            }
            .mobile-phone-cta img {
                max-width: 100%;
                height: auto;
                vertical-align: middle;
                margin-right: 10px;
            }
        }
        </style>";
        echo $custom_css;

}
add_action( 'wp_head', 'cta_css' );

function ctahtml() {
$number = get_option('awap-phone-number');
$numberlink = get_option('awap-phone-number-link');
?>

<div class="mobile-phone-cta">
<a style="color:<?php echo esc_attr( get_option('awap-text-color') ); ?>;" href='tel:<?php print $numberlink ?>'> 
    <img width="40" alt="Werbeagentur AWEOS anrufen" src="<?php echo plugin_dir_url( __FILE__ ) . '/telefon-agentur-icon.png' ?>"
><?php echo $number ?></a>
</div>

<?php
}

add_action( 'wp_footer','ctahtml');
