<?php

/* Only load code that needs BuddyPress to run once BP is loaded and initialized. */
function bpwp_navbar_init() {
    require( WP_PLUGIN_DIR . '/add-all-nav-links-to-bp-adminbar/bp-wp-navbar.php' );
}
add_action( 'bp_init', 'bpwp_navbar_init' );
?>