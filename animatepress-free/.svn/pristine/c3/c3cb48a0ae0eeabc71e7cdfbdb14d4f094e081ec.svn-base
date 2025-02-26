<?php // exit if uninstall constant is not defined
if (!defined('WP_UNINSTALL_PLUGIN')) exit;

// remove plugin options
foreach (wp_load_alloptions() as $option => $value) {
  if (strpos($option, 'animatepress_free_') === 0) {
    delete_option($option);
  }
}
