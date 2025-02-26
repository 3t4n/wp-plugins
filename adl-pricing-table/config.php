<?php
if ( !defined('ABSPATH') ) { die('You do not have right to access this file directly'); }
if ( !defined('PT_VERSION') ) { define('PT_VERSION', '1.0.0'); }
if ( !defined('PT_DIR') ) { define('PT_DIR', plugin_dir_path(__FILE__)); }
if ( !defined('PT_URL') ) { define('PT_URL', plugin_dir_url(__FILE__)); }
if ( !defined('PT_ADMIN_ASSETS') ) { define('PT_ADMIN_ASSETS', PT_URL.'assets/admin/'); }
if ( !defined('PT_PUBLIC_ASSETS') ) { define('PT_PUBLIC_ASSETS', PT_URL.'assets/'); }
if ( !defined('PT_TEXTDOMAIN') ) { define('PT_TEXTDOMAIN', 'adl-pricing-table'); }
if ( !defined('PT_POST_TYPE') ) { define('PT_POST_TYPE', 'adl-pricing-table'); }