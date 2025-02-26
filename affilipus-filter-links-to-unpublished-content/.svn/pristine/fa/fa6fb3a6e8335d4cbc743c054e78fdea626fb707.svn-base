<?php


/*
Plugin Name: Affilipus: Filter Broken Links
Description: Check internal links for unpublished content and remove them.
Version: 1.1.7
Author: imbaa Kreativagentur
License: GPL2+
Text Domain: imbaf-linkfilter
*/

define('AFFILIPUS_LINKFILTER_DIR',dirname( plugin_basename( __FILE__ ) ));
define('AFFILIPUS_LINKFILTER_VERSION','1.1.7');

require dirname( __FILE__ ) . '/src/Autoload/Psr_4.php';
$autoload_class_name = 'imbaa\AffilipusLinkfilter\Autoload\Psr_4';

$autoload = new $autoload_class_name();
$autoload->add( 'imbaa\AffilipusLinkfilter', dirname( __FILE__ ) . '/src' );

spl_autoload_register( array( $autoload, 'autoload' ) );

//register_activation_hook( __FILE__, array('imbaa\AffilipusLinkfilter\Routines\activation','activate') );

new imbaa\AffilipusLinkfilter\Routines\activation();
new imbaa\AffilipusLinkfilter\Routines\init();
new imbaa\AffilipusLinkfilter\Routines\cron();
