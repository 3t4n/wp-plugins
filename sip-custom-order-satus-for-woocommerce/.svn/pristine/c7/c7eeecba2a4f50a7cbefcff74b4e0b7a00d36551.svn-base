<?php
// // Check whether the button has been pressed AND also check the nonce
if ( ( isset($_POST['mautic_connection_connect']) && check_admin_referer('Mautic_Connection_Connect_Nonce') ) || ( isset($_GET['oauth_token']) ) )  {
	// the button has been pressed AND we've passed the security check
	sip_miwc_mautic_connection_connect();
}

// // Check whether the button has been pressed AND also check the nonce
if ( isset($_POST['mautic_connection_dis_connect']) && check_admin_referer('Mautic_Connection_DisConnect_Nonce') )  {
	// the button has been pressed AND we've passed the security check
	delete_option('sip_miwc_mautic_auth_info');
	update_option('sip_miwc_mautic_auth_connect', false);
	echo '<div class="updated notice">
		<p><b>Mautic disconnect successfully</b></p>
	</div>';
}


// // Check whether the button has been pressed AND also check the nonce
if ( isset($_POST['mautic_old_order_sync']) && check_admin_referer('Mautic_old_order_sync_Nonce') )  {
	// the button has been pressed AND we've passed the security check
	sip_miwc_mautic_order_sync( "old" );
}

function sip_miwc_mautic_connection_connect( ) {

	session_start();

	require_once SIP_MIWC_DIR . 'admin/mautic/Psr/Log/LoggerAwareInterface.php';
	require_once SIP_MIWC_DIR . 'admin/mautic/Psr/Log/LoggerInterface.php';
	require_once SIP_MIWC_DIR . 'admin/mautic/Psr/Log/LogLevel.php';

	require_once SIP_MIWC_DIR . 'admin/mautic/Psr/Log/AbstractLogger.php';
	require_once SIP_MIWC_DIR . 'admin/mautic/Psr/Log/NullLogger.php';

	require_once SIP_MIWC_DIR . 'admin/mautic/QueryBuilder/QueryBuilder.php';

	require_once SIP_MIWC_DIR . 'admin/mautic/Auth/AuthInterface.php';    
	require_once SIP_MIWC_DIR . 'admin/mautic/Auth/ApiAuth.php';
	require_once SIP_MIWC_DIR . 'admin/mautic/Auth/AbstractAuth.php';
	require_once SIP_MIWC_DIR . 'admin/mautic/Auth/OAuth.php';

	require_once SIP_MIWC_DIR . 'admin/mautic/Api/Api.php';
	require_once SIP_MIWC_DIR . 'admin/mautic/Api/Contacts.php';
	require_once SIP_MIWC_DIR . 'admin/mautic/Api/Stages.php';
	require_once SIP_MIWC_DIR . 'admin/mautic/Api/Segments.php';
	require_once SIP_MIWC_DIR . 'admin/mautic/MauticApi.php';

	$uri = get_option('url_of_mautic_server');
    $public = get_option('public_key_of_mautic_server');
    $secret = get_option('secret_key_of_mautic_server');

    $settings = array(
        'baseUrl'           => $uri,
        'clientKey'         => $public,
        'clientSecret'      => $secret,
        'callback'          => admin_url('admin.php?page=sip-mautic-integration-settings'),
        'version'           => 'OAuth1a'
    );

	if (($info = get_option('sip_miwc_mautic_auth_info'))) {
		$settings['accessToken']        = $info['accessToken'] ;
		$settings['accessTokenSecret']  = $info['accessTokenSecret'];
		$settings['accessTokenExpires'] = $info['accessTokenExpires'];
	}


	$auth = \Mautic\Auth\ApiAuth::initiate($settings);
	
	try {
	    if ($auth->validateAccessToken()) {

	        if ($auth->accessTokenUpdated()) {
	            $accessTokenData = $auth->getAccessTokenData();
	            // //store access token data however you want
	

				$auth = array(
					'accessToken' 		 => $accessTokenData['access_token'],
					'accessTokenSecret'  => $accessTokenData['access_token_secret'],
					'accessTokenExpires' => $accessTokenData['expires']
				);

				update_option('sip_miwc_mautic_auth_info', $auth);
				update_option('sip_miwc_mautic_auth_connect', true);

				echo '<div class="updated notice">
					<p><b>Mautic connect successfully</b></p>
				</div>';
	        }
	    }
	} catch (Exception $e) {
	    // Do Error handling
	    echo "Error : " . $e->message( );
	}

	session_destroy();
}
?>


<div class="settings-warp sip-tab-content" style="margin-top:10px;">
	<form method="post" action="options.php">
		<?php settings_fields( 'sip-miwc-register-settings' ); ?>
		<?php do_settings_sections( 'sip-miwc-register-settings' ); ?>
		<table class="sip-miwc-100">
			<tr>
				<td>
					<label for="url_of_mautic_server"><b><?php _e('URL of Mautic server : ' , 'sip-mautic-integration');?></label></b><br>
					<input class="sip-miwc-100" placeholder="http://example.com" id="url_of_mautic_server" type="text" name="url_of_mautic_server" value="<?php echo get_option('url_of_mautic_server'); ?>" />
				</td>
			</tr>
			<tr>
				<td>
					<label for="public_key_of_mautic_server"><b><?php _e('Public Key : ' , 'sip-mautic-integration');?></label></b><br>
					<input class="sip-miwc-100" placeholder="3xid67ltj82sscsc408c08o0kkg4w40kwkg88gkk4ggco4okkc" id="public_key_of_mautic_server" type="text" name="public_key_of_mautic_server" value="<?php echo get_option('public_key_of_mautic_server'); ?>" />
				</td>
			</tr>
			<tr>
				<td>
					<label for="secret_key_of_mautic_server"><b><?php _e('Secret Key : ' , 'sip-mautic-integration');?></label></b><br>
					<input class="sip-miwc-100" placeholder="23ecfhgt13xcg0cgosogck80gogs4cgcsco4gw40w0gg4co4oo" id="secret_key_of_mautic_server" type="text" name="secret_key_of_mautic_server" value="<?php echo get_option('secret_key_of_mautic_server'); ?>" />
				</td>
			</tr>
			<tr>
				<td>
					<br>
					<label for="product_name_as_tag"><b><?php _e('Add product name as contact tag : ' , 'sip-mautic-integration');?></b></label>
					<input class="sip-miwc-100" placeholder="" id="product_name_as_tag" type="checkbox" <?php echo ( (get_option('product_name_as_tag') == true) ? 'checked' : '' )?> name="product_name_as_tag" value="true" />
				</td>
			</tr>
			<tr>
				<td>
					<br>
					<label for="sku_as_tag"><b><?php _e('Add product SKU as contact tag : ' , 'sip-mautic-integration');?></label></b> 
					<input class="sip-miwc-100" placeholder="" id="sku_as_tag" type="checkbox" <?php echo ( (get_option('sku_as_tag') == true) ? 'checked' : '' )?> name="sku_as_tag" value="true" />
				</td>
			</tr>
			<tr>
				<td>
					<br>
					<label for="additional_tags_to_add"><b><?php _e('Additional tags to add : ' , 'sip-mautic-integration');?></label></b><br>
					<input class="sip-miwc-100" placeholder="WordPress, WooCommerce" id="additional_tags_to_add" type="text" name="additional_tags_to_add" value="<?php echo get_option('additional_tags_to_add'); ?>" />
				</td>
			</tr>
			<tr>
				<td>
					<br>
					<label for="mautic_owner_id"><b><?php _e('Owner : ' , 'sip-mautic-integration');?></label></b><br>
					<input class="sip-miwc-100" placeholder="1" id="mautic_owner_id" type="number" name="mautic_owner_id" value="<?php echo get_option('mautic_owner_id'); ?>" />
				</td>
			</tr>
		</table>

		<?php submit_button(); ?>
	</form>
	
	<?php $mautic_auth_connect_disconnect = get_option('sip_miwc_mautic_auth_connect'); ?>

	<hr>
	<table>
		<tr>
			<td><b><?php _e('Mautic Connection : ' , 'sip-mautic-integration'); ?></b></td>
			<?php if ( $mautic_auth_connect_disconnect == false ) { ?>
			<td>
				<?php
					echo "<form action='admin.php?page=sip-mautic-integration-settings' method='post'>";
						// this is a WordPress security feature - see: https://codex.wordpress.org/WordPress_Nonces
						wp_nonce_field('Mautic_Connection_Connect_Nonce');
						echo '<input type="hidden" value="true" name="mautic_connection_connect" />';
						submit_button('Connect');
					echo '</form>';
				?>
			</td>
			<?php } else { ?>
			<td>
				<?php
					echo "<form action='admin.php?page=sip-mautic-integration-settings' method='post'>";

						// this is a WordPress security feature - see: https://codex.wordpress.org/WordPress_Nonces
						wp_nonce_field('Mautic_Connection_DisConnect_Nonce');
						echo '<input type="hidden" value="true" name="mautic_connection_dis_connect" />';
						submit_button('Disconnect');
					echo '</form>';
				?>
			</td>
			<?php } ?>
		</tr>
	</table>
	<hr>
	<?php if ( $mautic_auth_connect_disconnect == true ) { ?>
	<table>
		<tr>
			<td><b><?php _e('Mautic Sync : ' , 'sip-mautic-integration'); ?></b></td>
			<td>
				<?php
					echo "<form action='admin.php?page=sip-mautic-integration-settings' method='post'>";

						// this is a WordPress security feature - see: https://codex.wordpress.org/WordPress_Nonces
						wp_nonce_field('Mautic_old_order_sync_Nonce');
						echo '<input type="hidden" value="true" name="mautic_old_order_sync" />';
						submit_button('Sync old order');
					echo '</form>';
				?>
			</td>
		</tr>
	</table>
	<hr>
	<?php } ?>
</div>