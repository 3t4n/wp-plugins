<? /************************************************************
Plugin Name: Autotask Ticket Lookup
Plugin URI: https://wordpress.org/plugins/autotask-ticket-lookup/
Description: 
Version: 1.1.0
Author: C-Net Systems, Inc.
Author URI: http://www.cnetsys.com/store/autotask-ticket-lookup-plugin-for-wordpress
***************************************************************/




require_once( 'wpat-autotask.php' );
function wpat_admin( ) {
	include( 'wpat-settings.php' );
}


//Add admin page
function wpat_actions( ) {
	$wpat_options_page = add_options_page( 'AT Ticket Lookup', 'AT Ticket Lookup', 1, 'wpat-settings', 'wpat_admin' );
}

add_action( 'admin_menu', 'wpat_actions' );

//Shortcodes for all or specific parts
add_shortcode( 'wpat-search-results', 'wpat_output' );
add_shortcode( 'wpat-search-ticket-form', 'wpat_output_ticket_search_form' );

function wpat_output_ticket_search_form( $atts, $content = null, $tag ) {
	if( $atts['label'] != '' ) {
		$wpat_output_label = '<label for="ticketno">' . $atts['label'] . '</label>';
	}
	$wpat_output .= '<form class="wpat-form" name="wpat_ticket_search_form" method="post" action="' . str_replace( '%7E', '~', $_SERVER['REQUEST_URI']) . '"><input type="hidden" name="checkticket" value="true" />' . $wpat_output_label . '<input class="wpat-ticket-field" type="text" id="ticketno" name="ticketno" value="' . $_POST['ticketno'] . '" /><input class="wpat-submit-button" type="submit" name="submit" /><div style="display: none;"><input class="wpat-hidden-field" type="text" name="wpat_check" /></div></form>';
	return $wpat_output;
}
function wpat_output( $atts, $content = null, $tag ) {
	if ( isset( $_POST['wpat_check'] ) && $_POST['wpat_check'] != '' ) {
		return "<div style='background:#EEEEEE;border: 1px solid #FF0000;margin: 5px;padding:20px;'>" . __( 'Bot detected.', 'wpat_loc' ) . "</div>";
	}
	if ( $_POST['checkticket'] == "true" ) {
		
		$wpat_queryXML ='	<queryxml>
			<entity>Ticket</entity>
			<query>';
		$wpat_queryXML .= '
				<condition operator="AND">';
		$wpat_queryXML .= '
					<field>TicketNumber
						<expression op="equals">' . $_POST['ticketno'] . '</expression>
					</field>';
		$wpat_queryXML .= '
				</condition>';	
		$wpat_queryXML .= '
			</query>
		</queryxml>';
		$wpat_queryXMLArray = array( 
			'sXML' => $wpat_queryXML
		);
		$wpat_result = wpat_buildOutput( wpat_tryAutotaskQuery( $wpat_queryXMLArray ) );	
	}
	
	return $wpat_result;
}

function wpat_action_links( $links, $file ) {
    static $this_plugin;
 
    if ( !$this_plugin ) {
        $this_plugin = plugin_basename( __FILE__ );
    }
    if ( $file == $this_plugin ) {
 
        $link = '<a href="' . get_bloginfo( 'wpurl' ) . '/wp-admin/options-general.php?page=wpat-settings.php">' . __( 'Enter your Autotask API details', 'wpat_loc' ) . '</a>';
 		array_unshift( $links, $link );
    }
 
    return $links;
}
add_filter( 'plugin_action_links', 'wpat_action_links', 10, 2);

function wpat_plugin_row_meta( $input, $file ) {
    static $this_plugin;
 
    if ( !$this_plugin ) {
        $this_plugin = plugin_basename( __FILE__ );
    }
    if ( $file == $this_plugin ) {
	
		$links = array(
			'<a href="http://www.cnetsys.com/downloads/autotask-ticket-lookup-plugin-for-wordpress" target="_blank">' . __( 'Upgrade to premium', 'wpat_loc' ) . '</a>',
		);
		$input = array_merge( $input, $links );
	}
	
	return $input;
}
add_filter( 'plugin_row_meta', 'wpat_plugin_row_meta', 10, 2 );
?>
