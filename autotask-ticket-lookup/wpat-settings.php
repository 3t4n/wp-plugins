<?php

if( $_POST['wpat_submitted'] == 'true' && $_POST['wpat_settings_submit'] == "Save Changes" ) { 
	$wpat_wsdl_username = $_POST['wpat_wsdl_username']; 
	update_option( 'wpat_wsdl_username', $wpat_wsdl_username ); 
	$wpat_wsdl_password = $_POST['wpat_wsdl_password']; 
	update_option( 'wpat_wsdl_password', $wpat_wsdl_password ); 
	$wpat_wsdl_url = $_POST['wpat_wsdl_url']; 
	update_option( 'wpat_wsdl_url', $wpat_wsdl_url ); 
	$wpat_errors .= '<div style="width:99%; padding: 5px;" class="updated below-h2">' . __( 'Autotask API User settings saved.', 'wpat_loc' ) . '</div>';
} else {
	$wpat_wsdl_username = get_option( 'wpat_wsdl_username' );
	$wpat_wsdl_password = get_option( 'wpat_wsdl_password' );
	$wpat_wsdl_url = get_option( 'wpat_wsdl_url' );
}


if( $_POST['wpat_run_test'] == 'true' && $_POST['wpat_run_test_submit'] == "Run Test" ) { 
	$wpat_autotask = wpat_getAutotask();
	$wpat_getzoneinfo_results = $wpat_autotask->getZoneInfo( array( 'UserName' => $wpat_wsdl_username ) );
	$wpat_run_test_results_row = '
						<tr class="alternate">
							<td valign="top">' .  __( 'getZoneInfo() results: ', 'wpat-loc') . '<br /><textarea rows="15" cols="80">' . print_r( $wpat_getzoneinfo_results, true ) . '</textarea></td>
						</tr>';
	$wpat_errors .= '<div style="width:99%; padding: 5px;" class="updated below-h2">' . __( 'Test complete, see results <a href="#run_test">below</a>', 'wpat_loc' ) . '</div>';
}

if( $_POST['wpat_account_select_manual'] == 'true' ) { 
	$wpat_account_select_manual_id = $_POST['wpat_account_select_manual_id']; 
	update_option( 'wpat_account_select_manual_id', $wpat_account_select_manual_id ); 
} else {
	
	$wpat_account_select_manual_id = get_option( 'wpat_account_select_manual_id' );
}


if( isset( $_GET[ 'tab' ] ) ) {  
	$active_tab = $_GET[ 'tab' ];  
} else {
	$active_tab = 'api';
}

?>

<link rel="stylesheet" href="css/dashicons.css">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
<div class="wrap">
	<h2<?php _e('>Autotask Ticket Lookup Settings', 'wpat-loc'); ?></h2>	
	<h2 class="nav-tab-wrapper">  
		<a href="?page=wpat-settings&tab=api" class="nav-tab <?php echo $active_tab == 'api' ? 'nav-tab-active' : ''; ?>">API Settings</a>  
		<a href="?page=wpat-settings&tab=test" class="nav-tab <?php echo $active_tab == 'test' ? 'nav-tab-active' : ''; ?>">Test API</a>  
	</h2>  
	<p><?php echo $wpat_errors; ?>	
	<div class="metabox-holder has-right-sidebar">		
		<div class="inner-sidebar"> 	
			<div class="postbox">
				<h3 style="background: #d54e21;border: 1px #3B9B21;color: #fff;text-align:center;"><span><i alt="f202" class="genericond genericon genericon-twitter"></i><?php _e( 'Go Premium! ', 'wpat-loc'); ?></span></h3>
				<div class="inside">
				<table class="widefat"><thead>
					<tr><th class="row-title" colspan="2"><div style="text-align:center;"><?php _e( 'Premium Features', 'wpat-loc') ?></div></th></tr></thead><tbody>
					<tr class="alternate"><td><span style="font-size:2em;">&bull;&nbsp;</span></td><td><?php _e( 'Filter tickets to a single Account only.', 'wpat-loc') ?></td></tr>
					<tr><td><span style="font-size:2em;">&bull;&nbsp;</span></td><td><?php _e( 'Allow ticket lookup by Account Contact.', 'wpat-loc') ?></td></tr>
					<tr class="alternate"><td><span style="font-size:2em;">&bull;&nbsp;</span></td><td><?php _e( 'Create custom styled formatting blocks for tickets, times, and notes.', 'wpat-loc') ?></td></tr>
					<tr><td><span style="font-size:2em;">&bull;&nbsp;</span></td><td><?php _e( 'Get support for installation and use.', 'wpat-loc') ?></td></tr>
					<tr class="alternate"><td colspan="2"><div style="text-align:center;"><p><a href="http://www.cnetsys.com/downloads/autotask-ticket-lookup-plugin-for-wordpress" target="_blank" style="background: #d54e21;border: 1px #9E3A18;color: #fff;text-decoration: none;font-size: 22px;line-height: 32px;height: 36px;margin: 0;padding: 0 10px 3px;-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px">Get the Upgrade!</a></p></div></td></tr></tbody>
				</table>
				
				</div>
			</div> 
			<div class="postbox">
				<h3 style="text-align:center;"><span><?php _e( 'Shortcodes', 'wpat-loc'); ?></span></h3>
				<div class="inside">
					<table class="widefat"><thead>
					<tr><th class="row-title"><?php _e( 'Copy and paste the following shortcodes to use on your page:', 'wpat-loc') ?></th></tr></thead><tbody>
					<tr class="alternate">
						<td valign="top"><strong>[wpat-search-ticket-form label=""]</strong><br /><?php _e( 'where "label" is the ticket field label.', 'wpat-loc') ?></td></tr>
					<tr class="">
						<td valign="top"><strong>[wpat-search-results]</strong><br /></td>
					</tr></tbody>
					</table>
				</div>
			</div> 
			<div class="postbox">
				<h3 style="text-align:center;"><span><?php _e( 'Share! ', 'wpat-loc'); ?></span></h3>
				<div class="inside">
					<table class="widefat"><thead>
					<tr><th class="row-title"><?php _e( 'Follow us on Facebook', 'wpat-loc') ?></th></tr></thead><tbody>
					<tr class="alternate"><td><div class="fb-like" data-href="http://www.cnetsys.com/" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div></td></tr></tbody></table><br />
					
					<table class="widefat"><thead>
					<tr><th class="row-title"><?php _e( 'Follow us on LinkedIn', 'wpat-loc') ?></th></tr></thead><tbody>
					<tr class="alternate"><td><script type="IN/FollowCompany" data-id="353174" data-counter="right"></script></td></tr></tbody></table><br />
					
					<table class="widefat"><thead>
					<tr><th class="row-title"><?php _e( 'Share this plugin on Facebook', 'wpat-loc') ?></th></tr></thead><tbody>
					<tr class="alternate"><td><div class="fb-share-button" data-href="https://wordpress.org/plugins/autotask-ticket-lookup/"></div></td></tr></tbody></table><br />
					</table>
					
					<table class="widefat"><thead>
					<tr><th class="row-title"><?php _e( 'Share this plugin on LinkedIn', 'wpat-loc') ?></th></tr></thead><tbody>
					<tr class="alternate"><td><script type="IN/Share" data-url="https://wordpress.org/plugins/autotask-ticket-lookup/" data-counter="right"></script></td></tr></tbody></table>
					</table>
				</div>
			</div> 
			<div class="postbox">
				<h3 style="text-align:center;"><span><?php _e( 'Check out these other plugins', 'wpat-loc'); ?></span></h3>
				<div class="inside">
					<table class="widefat"><thead>
					<tr><th class="row-title"><?php _e( 'Local Search SEO Contact Page', 'wpat-loc') ?></th></tr></thead><tbody>
					<tr class="alternate"><td><div style="text-align:center;"><img src="<?php echo plugins_url( 'images/seo-screen.png', __FILE__)?>"></div><p><?php _e( 'Effortlessly integrate Schema.org microdata in your page and drive local customers directly to your front door!', 'wpat-loc') ?></p></td></tr>
					<tr><td><div style="text-align:center;"><p><form action="https://wordpress.org/plugins/local-search-seo-contact-page/" method="get"><input class="button-primary" type="submit" value="Get The Free Version" /></form></p>
					<p><form action="http://www.expertbusinesssearch.com/downloads/premium-local-search-seo-contact-page/" method="get"><input class="button-primary" type="submit" value="Premium Version - Learn More" /></form></div></td></tr></tbody></table>
					</table>
				</div>
			</div> 
		</div>
 
 
		<div id="post-body">
			<div id="post-body-content">
			
 <?php if ( $active_tab == 'api' ) { ?>
				<div class="postbox">
					<h3><span><?php _e( 'Enter your Autotask API user information', 'wpat-loc'); ?></span></h3>
					<div class="inside">
					<p><?php _e( 'Your user information is required for access to your Autotask data. You also must enable API access on your account, which can be done by contacting Autotask customer support.', 'wpat-loc') ?>
					<form name="wpat_settings_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>"><input type="hidden" name="wpat_submitted" value="true"> 
					
					<table class="widefat">
						<tr class="alternate">
							<td valign="top" width="200"><label for="wpat_wsdl_username"><?php _e( 'Autotask API Username: ', 'wpat-loc') ?></label></td><td valign="top"><input type="text" id="wpat_wsdl_username" name="wpat_wsdl_username" value="<?php echo $wpat_wsdl_username;?>"></td>
						</tr>
						<tr>
							<td valign="top"><label for="wpat_wsdl_password"><?php _e( 'Autotask API Password: ', 'wpat-loc') ?></label></td><td valign="top"><input type="password" id="wpat_wsdl_password" name="wpat_wsdl_password" value="<?php echo $wpat_wsdl_password;?>"></td>
						</tr>
					</table><br /><input class="button-primary" type="submit" name="wpat_settings_submit" value="<?php _e( 'Save Changes', 'wpat-loc'); ?>">
					</div>
				</div> 
				
				<div class="postbox">
					<h3><span><?php _e( 'Select your Autotask region', 'wpat-loc'); ?></span></h3>
					<div class="inside">
					<p><?php _e( 'Select the Autotask region/server that you use. To find your location, go to your main Autotask dashboard and look at the URL. You will see a "ww" followed by a number. Match that number to one of the URLs below.', 'wpat-loc') ?>
					
					
					
					<table class="widefat">
						<tr class="alternate">
							<td valign="top" width="50"><input type="radio" name="wpat_wsdl_url" id="3" value="3"<?php echo ( $wpat_wsdl_url == "3" ? ' checked="true"' : '' )?>></td><td align="top"><label for="3"><?php _e( 'America East ( ww3.autotask.net - webservices3.autotask.net/ATServices/1.5/atws.asmx )', 'wpat-loc') ?></label></td>
						</tr>
						<tr class="">
							<td valign="top"><input type="radio" name="wpat_wsdl_url" id="5" value="5"<?php echo ( $wpat_wsdl_url == "5" ? ' checked="true"' : '' )?>></td><td valign="top"><label for="5"><?php _e( 'America West ( ww5.autotask.net - webservices5.autotask.net/ATServices/1.5/atws.asmx )', 'wpat-loc'); ?></label></td>
						</tr>
						<tr class="alternate">
							<td valign="top"><input type="radio" name="wpat_wsdl_url" id="4" value="4"<?php echo ( $wpat_wsdl_url == "4" ? ' checked="true"' : '' )?>></td><td valign="top"><label for="4"><?php _e( 'London ( ww4.autotask.net - webservices4.autotask.net/ATServices/1.5/atws.asmx )', 'wpat-loc'); ?></label></td>
						</tr>
						<tr class="">
							<td valign="top"><input type="radio" name="wpat_wsdl_url" id="6" value="6"<?php echo ( $wpat_wsdl_url == "6" ? ' checked="true"' : '' )?>></td><td valign="top"><label for="6"><?php _e( 'Australia ( ww6.autotask.net - webservices6.autotask.net/ATServices/1.5/atws.asmx )', 'wpat-loc'); ?></label></td>
						</tr>
						<tr class="alternate">
							<td valign="top"><input type="radio" name="wpat_wsdl_url" id="7" value="7"<?php echo ( $wpat_wsdl_url == "7" ? ' checked="true"' : '' )?>></td><td valign="top"><label for="7"><?php _e( 'Germany ( ww7.autotask.net - webservices7.autotask.net/ATServices/1.5/atws.asmx )', 'wpat-loc'); ?></label></td>
						</tr>
						<tr class="">
							<td valign="top"><input type="radio" name="wpat_wsdl_url" id="8" value="8"<?php echo ( $wpat_wsdl_url == "8" ? ' checked="true"' : '' )?>></td><td valign="top"><label for="8"><?php _e( 'China ( ww8.autotask.net - webservices8.autotask.net/ATServices/1.5/atws.asmx )', 'wpat-loc'); ?></label></td>
						</tr>
						<tr class="alternate">
							<td valign="top"><input type="radio" name="wpat_wsdl_url" id="9" value="9"<?php echo ( $wpat_wsdl_url == "9" ? ' checked="true"' : '' )?>></td><td valign="top"><label for="9"><?php _e( 'Italy ( ww9.autotask.net - webservices9.autotask.net/ATServices/1.5/atws.asmx )', 'wpat-loc'); ?></label></td>
						</tr>
						<tr class="">
							<td valign="top"><input type="radio" name="wpat_wsdl_url" id="10" value="10"<?php echo ( $wpat_wsdl_url == "10" ? ' checked="true"' : '' )?>></td><td valign="top"><label for="10"><?php _e( 'France ( ww10.autotask.net - webservices10.autotask.net/ATServices/1.5/atws.asmx )', 'wpat-loc'); ?></label></td>
						</tr>
						<tr class="alternate">
							<td valign="top"><input type="radio" name="wpat_wsdl_url" id="11" value="11"<?php echo ( $wpat_wsdl_url == "11" ? ' checked="true"' : '' )?>></td><td valign="top"><label for="11"><?php _e( 'Japan ( ww11.autotask.net - webservices11.autotask.net/ATServices/1.5/atws.asmx )', 'wpat-loc'); ?></label></td>
						</tr>
						<tr class="">
							<td valign="top"><input type="radio" name="wpat_wsdl_url" id="12" value="12"<?php echo ( $wpat_wsdl_url == "12" ? ' checked="true"' : '' )?>></td><td valign="top"><label for="12"><?php _e( 'Spain & Latin America ( ww12.autotask.net - webservices12.autotask.net/ATServices/1.5/atws.asmx )', 'wpat-loc'); ?></label></td>
						</tr>
						<tr class="alternate">
							<td valign="top"><input type="radio" name="wpat_wsdl_url" id="1" value="1"<?php echo ( $wpat_wsdl_url == "1" ? ' checked="true"' : '' )?>> </td><td valign="top"><label for="1"><?php _e( 'Limited Release ( ww1.autotask.net - webservices1.autotask.net/ATServices/1.5/atws.asmx )', 'wpat-loc'); ?></label></td>
						</tr>
						<tr class="">
							<td valign="top"><input type="radio" name="wpat_wsdl_url" id="2" value="2"<?php echo ( $wpat_wsdl_url == "2" ? ' checked="true"' : '' )?>></td><td valign="top"><label for="2"><?php _e( 'Pre-Release ( ww2.autotask.net - webservices2.autotask.net/ATServices/1.5/atws.asmx )', 'wpat-loc'); ?></label></td>
						</tr>
					</table>					
					<br /><input class="button-primary" type="submit" name="wpat_settings_submit" value="<?php _e( 'Save Changes', 'wpat-loc'); ?>"></form>
					</div>
				</div> 
<?php 
} else if( $active_tab == 'test' ) {
?>

				<div class="postbox">
					<h3><span><?php _e( 'Test your Autotask API connection', 'wpat-loc'); ?></span></h3>
					<div class="inside">
					<p><?php _e( 'This test will attempt to connect to the Autotask API with your supplied information and fire the getZoneInfo() function. The getZoneInfo() function will query your account and return your Autotask API region URL (which you set manually on the "API Settings" tab). Note that if the getZoneInfo() function returns a URL that you did not select in the above table, you should change it accordingly.', 'wpat-loc') ?>
					<form name="wpat_run_test_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">	
					
					<input type="hidden" name="wpat_run_test" value="true"> 
					<table class="widefat">
						<tr>
							<td valign="top"><input class="button-primary" type="submit" name="wpat_run_test_submit" value="<?php _e( 'Run Test', 'wpat-loc'); ?>"><a name="run_test"></a></td>
						</tr><?php echo $wpat_run_test_results_row; ?>
					</table>
					</form>
					</div>
				</div> 
<?php 
} else {

}
?>
				
				
			</div>
		</div>
	</div>
</div>
 
