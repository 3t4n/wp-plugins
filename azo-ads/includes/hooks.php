<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// clear all caching provider when the ad modified (add/edit/update/delete)
add_action( 'azoads_admin_after_ad_updated', 'azoads_clear_all_cache_provider' );

// clear all caching provider when the settings saved
add_action( 'azoads_admin_after_settings_saved', 'azoads_clear_all_cache_provider' );