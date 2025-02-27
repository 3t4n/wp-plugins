<?php
defined( 'WP_UNINSTALL_PLUGIN' ) or exit;
if ( function_exists('is_multisite') and is_multisite() )
{
	foreach ( molongui_get_sites() as $site_id )
	{
		switch_to_blog( $site_id );
		molongui_bump_offer_uninstall_single_site();
		restore_current_blog();
	}
}
else
{
	molongui_bump_offer_uninstall_single_site();
}
function molongui_bump_offer_uninstall_single_site()
{
	global $wpdb;

	$plugin_name   = 'molongui-bump-offer';
	$plugin_prefix = 'molongui_bump_offer';
    $db_main_key   = $plugin_prefix.'_main';
	$settings      = get_option( $db_main_key );
	if ( isset( $settings['keep_config'] ) and $settings['keep_config'] == 0 )
	{
		$like = $plugin_prefix.'_%';
		$wpdb->query( "DELETE FROM {$wpdb->prefix}options WHERE option_name LIKE '{$like}';" );
	}
	if ( isset( $settings['keep_data'] ) and $settings['keep_data'] == 0 )
	{
        $ids = $wpdb->get_results
        (
            "SELECT ID
                FROM {$wpdb->prefix}posts
                WHERE post_type LIKE 'molongui_bump'
                ",
            ARRAY_A
        );
        if ( !empty( $ids ) )
        {
            $postids = '';
            foreach ( $ids as $key => $id )
            {
                if ( $key == 0 ) $postids = $id['ID'];
                else $postids = $postids . ', ' . $id['ID'];
            }
            $wpdb->query( "DELETE FROM {$wpdb->prefix}postmeta WHERE post_id IN ( $postids );" );
            $wpdb->query( "DELETE FROM {$wpdb->prefix}posts WHERE ID IN ( $postids );" );
        }
	}
	$like = '_transient_'.$plugin_name.'%';
	$wpdb->query( "DELETE FROM {$wpdb->prefix}options WHERE option_name LIKE '{$like}';" );
}