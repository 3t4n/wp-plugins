<?php
require_once( "../../../../../../wp-load.php" );

if(!isset($_GET["error"]))
{
	$code = $_GET["code"];
	$signed_request = $_POST['signed_request'];
	
	$preset_id = $_GET['p'];

	if( $preset_id )
	{
		$preset_data = get_post( $preset_id );
		$preset_custom = $qodys_optiner->GetClass('posttype_form-preset')->get_post_custom( $preset_id );
		$list_ids = maybe_unserialize( $preset_custom['list_id'] );
	}
	
	$form_id = $_GET['f'] ? $_GET['f'] : $preset_custom['form_id'];
	
	if( $form_id )
	{
		$form_data = get_post( $form_id );
		$form_custom = $qodys_optiner->GetClass('posttype_form')->get_post_custom( $form_id );
	}
	
	if( $signed_request ) // This is for form submissions
	{
		$submission_data = $qodys_optiner->ReadSignedRequest( $signed_request, $qodys_optiner->get_option( 'fb_app_secret' ) );
		
		if( $submission_data['registration'] )
		{
			$next_name = $submission_data['registration']['name'];
			$next_email = $submission_data['registration']['email'];
		}
	}
	else if( isset($code) ) // this is for connect button allowances
	{
		$fields = array();
		$fields['client_id'] = $qodys_optiner->get_option( 'fb_app_id' );
		$fields['redirect_uri'] = $qodys_optiner->GetOverseer()->GetAsset( 'forms', 'fb_oauth_return', 'url' ).'?p='.$preset_id;
		$fields['client_secret'] = $qodys_optiner->get_option( 'fb_app_secret' );
		$fields['code'] = $code;
		
		$url = 'https://graph.facebook.com/oauth/access_token?'.http_build_query( $fields );
		
		$data = wp_remote_get( $url );
		
		if( !is_wp_error( $data ) && $data['response']['code'] != 400 )
		{
			if( strpos( $data['body'], 'access_token=' ) === 0 )
			{
				//if you requested offline acces save this token to db 
				//for use later 
				$token = str_replace( 'access_token=', '', $data['body'] );
				
				//this is just to demo how to use the token and 
				//retrieves the users facebook_id
				$url = 'https://graph.facebook.com/me/?access_token='.$token;
				
				$result = wp_remote_get( $url );
				
				if( !is_wp_error( $result ) )
				{
					$fb = json_decode( $result['body'] );
					
					$next_name = $fb->name;
					$next_email = $fb->email;
				}
				else
				{
					$error = json_decode( $result['body'] );
			
					if( is_object( $error ) )
					{
						echo $error->error->message;
						exit;
					}
				}
			}
		}
		else
		{
			$error = json_decode( $data['body'] );
			
			if( is_object( $error ) )
			{
				echo $error->error->message;
				exit;
			}
		}
	}
	
	if( $next_email )
	{
		//$qodys_optiner->StoreOptinRecord( $campaign_id, $next_name, $next_email );
		
		$fields = array();
		$fields['p'] = $preset_id;
		$fields['optiner_name'] = $next_name;
		$fields['optiner_email'] = $next_email;
		
		header( "Location: ".$qodys_optiner->GetOverseer()->GetAsset( 'includes', 'share', 'url' ).'?'.http_build_query( $fields ) );
		exit;
	}
	else
	{
		if( !$preset_custom['success_url'] )
			$preset_custom['success_url'] = get_bloginfo('url');
			
		header( "Location: ".$preset_custom['success_url'] );
		exit;
	}
}
else
{
	echo $_GET["error"];
}
?>