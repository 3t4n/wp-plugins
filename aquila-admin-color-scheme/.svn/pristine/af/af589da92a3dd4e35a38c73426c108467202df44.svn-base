<?php
function remove_admin_bar_links() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('updates');          // Remove the updates link
    $wp_admin_bar->remove_menu('comments');         // Remove the comments link
    $wp_admin_bar->remove_menu('new-content');      // Remove the content link 
}
add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );

// Admin bar "design by Mito" menu

function admin_mito_link() {
    global $wp_admin_bar, $wpdb;

    //if ( !is_super_admin() || !is_admin_bar_showing() )
        //return;

    /* Add the main siteadmin menu item */
    $wp_admin_bar->add_menu( array( 'id' => 'mito_menu', 'title' => __( 'design by Mito', 'textdomain' ), 'href' => FALSE ) );
    $wp_admin_bar->add_menu( array( 'parent' => 'mito_menu', 'title' => 'design by Mito', 'href' => 'http://designbymito.com/', 'meta' => array( 'target' => '_blank' ) ) );
    $wp_admin_bar->add_menu( array( 'parent' => 'mito_menu', 'title' => 'Contact', 'href' => 'http://designbymito.com/contact/', 'meta' => array( 'target' => '_blank' ) ) );
}
//add_action( 'admin_bar_menu', 'admin_mito_link', 1000 );

// Admin bar "Help" menu

function admin_help_link() {
    global $wp_admin_bar, $wpdb;

    //if ( !is_super_admin() || !is_admin_bar_showing() )
        //return;

    /* Add the main siteadmin menu item */
    $wp_admin_bar->add_menu( array( 'id' => 'help_menu', 'title' => __( 'Help', 'textdomain' ), 'href' => FALSE ) );
    //$wp_admin_bar->add_menu( array( 'parent' => 'help_menu', 'title' => 'Aquila User Guides', 'href' => '/help/', 'meta' => array( 'target' => '_blank' ) ) );
    $wp_admin_bar->add_menu( array( 'parent' => 'help_menu', 'title' => 'Aquila User Guides', 'href' => 'http://designbymito.com/support/', 'meta' => array( 'target' => '_blank' ) ) );
    $wp_admin_bar->add_menu( array( 'parent' => 'help_menu', 'title' => 'WordPress Help', 'href' => 'http://codex.wordpress.org/Getting_Started_with_WordPress', 'meta' => array( 'target' => '_blank' ) ) );
    $wp_admin_bar->add_menu( array( 'parent' => 'help_menu', 'title' => 'Email Support', 'href' => 'mailto:support@designbymito.com', 'meta' => array( 'target' => '_blank' ) ) );
}
//add_action( 'admin_bar_menu', 'admin_help_link', 1000 );

?>