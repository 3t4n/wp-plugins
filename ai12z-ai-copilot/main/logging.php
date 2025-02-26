<?php
// Custom logging function
function ai12z_log($message) {
    if (WP_DEBUG === true) {
        // phpcs:disable WordPress.PHP.DevelopmentFunctions
        error_log("[ai12z_log] " . $message);
        // phpcs:enable
    }
}
