<?php

if (defined('WP_UNINSTALL_PLUGIN')) {
    // Can't use our class constants here because we can't count on the other
    // plugin files being available at this point
    delete_option('pingfm_options');
}

?>
