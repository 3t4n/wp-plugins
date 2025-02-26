<?php
/*
Plugin Name: Author Admin View Archive Link
Plugin URI: 
Description: Creates a View Archive link in the list of authors on the Users admin page.
Version: 1.0
Author: Topher
Author URI: https://topher1kenobe.com
License: GPL version 2 or later
License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
Text Domain: author-admin-view-archive-link
Inspired by https://wordpress.org/support/topic/adding-custom-action-link-to-admin-user-list
*/
function t1k_frontend_archive_action_link($actions, $user_object) {
    $actions['view archive'] = "<a class='view_frontend_archive' href='" . esc_url( get_author_posts_url( absint( $user_object->ID ) ) ) . "'>" . __( 'View Archive', 'author-admin-view-archive-link.php' ) . "</a>";

    return $actions;

}
add_filter('user_row_actions', 't1k_frontend_archive_action_link', 10, 2);
