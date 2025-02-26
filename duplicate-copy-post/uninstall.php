<?php

if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

// Remove plugin settings
delete_option('DCPDUP_duplicate_content');
delete_option('DCPDUP_duplicate_meta');
delete_option('DCPDUP_duplicate_custom_fields');
delete_option('DCPDUP_profile_name');
delete_option('DCPDUP_profile_fields');

// Optional: You could also delete any custom database tables or other related data here.
