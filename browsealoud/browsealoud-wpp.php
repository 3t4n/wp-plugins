<?php

/*
Plugin Name: ReachDeck Toolbar
Plugin URI:  https://www.texthelp.com
Description: Websites made more accessible with easy speech, reading and translation tools. This plugin takes care of the ReachDeck Toolbar installation process for all Wordpress blogs and websites. If you hold a licence for ReachDeck simply activate this plugin and you will see that the ReachDeck Toolbar automatically appears. If you don't have a licence you might be interested in a 30 day free trial. <a href="https://www.texthelp.com/products/reachdeck/browsealoud-is-now-the-reachdeck-toolbar/">Visit the texthelp website to learn more.</a>
Version:     1.11.6
Author:      Texthelp
Author URI:  https://www.texthelp.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

function browsealoudScript() {

    wp_print_script_tag(array(
        'integrity' => 'sha256-VCrJcQdV3IbbIVjmUyF7DnCqBbWD1BcZ/1sda2KWeFc= sha384-k2OQFn+wNFrKjU9HiaHAcHlEvLbfsVfvOnpmKBGWVBrpmGaIleDNHnnCJO4z2Y2H sha512-gxDfysgvGhVPSHDTieJ/8AlcIEjFbF3MdUgZZL2M5GXXDdIXCcX0CpH7Dh6jsHLOLOjRzTFdXASWZtxO+eMgyQ==',
        'crossorigin' => 'anonymous',
        'src' => esc_url('https://www.browsealoud.com/plus/scripts/3.1.0/ba.js')
    ));
}

add_action('wp_footer', 'browsealoudScript');