<?php
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/*
Plugin Name: Gone Response
Description: A plugin to return a 410 Gone status for all 404 errors while showing the 404 content.
Version: 1.0
Author: Kurban Ali
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Requires at least: 5.0
Tested up to: 6.6
Requires PHP: 7.1
Author URI: https://www.kurbanali.com
Text Domain: gone-response
Domain Path: /languages
*/

class Gone_Response {
    public function __construct() {
        add_action('template_redirect', array($this, 'return_410_for_all_404s'));
    }

    public function return_410_for_all_404s() {
        if (is_404()) {
            status_header(410);
            // Allow WordPress to load the normal 404 template
        }
    }
}

$gone_response = new Gone_Response();