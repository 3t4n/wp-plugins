<?php
/**
 * Constants used by this plugin
 */

/* The current version of this plugin */
if( !defined( 'COOKIES_VERSION' ) ) define( 'COOKIES_VERSION', '1.5' );

/* The directory name of the plugin */
if( !defined( 'COOKIES_PATH' ) ) define( 'COOKIES_PATH', dirname ( dirname( __FILE__ ) ) );

/* The directory name of the plugin */
if( !defined( 'COOKIES_DIRNAME' ) ) define( 'COOKIES_DIRNAME', basename(COOKIES_PATH) );

/* The URL path of this plugin */
if( !defined( 'COOKIES_URLPATH' ) ) define( 'COOKIES_URLPATH', plugins_url() .'/'. COOKIES_DIRNAME );

/* The text-domian of this plugin */
if( !defined( 'COOKIES_TEXT_DOMAIN' ) ) define( 'COOKIES_TEXT_DOMAIN', 'aws-cookie-popup' );

if( !defined( 'IS_AJAX_REQUEST' ) ) define( 'IS_AJAX_REQUEST', ( !empty( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && strtolower( $_SERVER['HTTP_X_REQUESTED_WITH'] ) == 'xmlhttprequest' ) );
