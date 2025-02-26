<?php

/**************************************************************************

Plugin Name:  Eliteprospects Tooltips
Plugin URI:   http://menmo.github.io/eliteprospects-tooltips/
Description:  Informative tooltips for links to Eliteprospects.com profile pages
Version:      0.1
Author:       Carl Grundberg
Author URI:   https://github.com/carlgrundberg
**************************************************************************

*/

function ep_tooltips_script() {
    wp_enqueue_script( 'eptooltips', '//menmo.github.io/eliteprospects-tooltips/eptooltips.min.js', array(), null, true);
}

add_action( 'wp_enqueue_scripts', 'ep_tooltips_script' ); 

