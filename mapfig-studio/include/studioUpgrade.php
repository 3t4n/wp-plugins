<?PHP
function mapfig_studio_upgrade_plugin() 
{
    $v = 'mapfig_studio_db_version';
    $update_option = null;
    // Upgrade to version 1
	if ( 1 !== (int)get_option( $v ) ) 
    {
        if ( 1 > (int)get_option( $v ) )
        {
            // Callback function must return true on success
            $update_option = mapfig_studio_upgrade_plugin_v1();
 
            // Only update option if it was an success
            if ( $update_option )
                update_option( $v, 1 );
        }
    }
    
    // Return the result from the custom update, so we can test for success/fail/error
    if ( $update_option )
        return $update_option;
 
	return false;
}
add_action('admin_init', 'mapfig_studio_upgrade_plugin' );




function mapfig_studio_upgrade_plugin_v1() {
	global $wpdb;
	
	$wpdb->query("ALTER TABLE ".STUDIO_MAP_TABLE." ADD  `width_parameter` ENUM(  'px',  '%' ) NOT NULL DEFAULT  'px';");
	$wpdb->query("ALTER TABLE ".STUDIO_MAP_TABLE." ADD  `height_parameter` ENUM(  'px',  '%' ) NOT NULL DEFAULT  'px';");
	
	return true;
}
?>