<?php

// For old versions --
if ( !defined('WP_UNINSTALL_PLUGIN')) {
  exit();
}

// Delete the option data --
delete_option('oembed_format');
delete_option('oembed_provider');
delete_option('oembed_example');

?>
