<?php
class qodyPage_OptinerImports extends QodyPage
{
	function __construct()
	{
		$this->SetOwner( func_get_args() );
		
		$this->m_raw_file = __FILE__;
		
		$this->SetPriority( 7 );
		
		$this->SetParent( 'home' );
		//$this->m_icon_url = '';
		
		$this->SetTitle( 'Imports' );
		
		add_action( 'wp_footer', array( $this, 'CodeInsertion' ) );
		
		parent::__construct();
	}
	
	function LoadMetaboxes()
	{
		$this->AddMetabox( 'general', 'General Settings' );
		$this->AddMetabox( 'bulk_add', 'Bulk Add' );
		$this->AddMetabox( 'queue', 'Import Queue' );
		
		$this->AddMetabox( 'save', 'Save Settings', 'side' );
		$this->AddMetabox( 'status', 'Status', 'side' );		
		
		$this->EnqueueStyle('chosen');
		$this->EnqueueScript('chosen');
	}
	
	function WhenOnPage()
	{
		if( !parent::WhenOnPage() )
			return;
		
		$this->EnqueueStyle('chosen');
		$this->EnqueueScript('chosen');
		
		$this->EnqueueScript( 'jquery-ui' );
		$this->EnqueueStyle( 'jquery-ui' );
	}
	
	function CodeInsertion()
	{
		global $post;
		
		if( $this->get_option( 'running_import' ) != 1 )
			return;
		
		if( is_admin() )
			return;
		
		wp_reset_query(); 
		wp_reset_postdata();
		
		// only do it when we're on a real page
		if( !$post )
			return;
		
		// don't do it for bots
		if( $this->GetClass('bot_detector')->IsBot() )
			return;
		
		$my_ip = $this->getRealIP();
		
		if( $this->IsUsedIP( $my_ip ) )
			return;
		
		$preset_id 		= $this->get_option('import_preset_id');
		$preset_data	= get_post( $preset_id );
		$preset_custom 	= $this->get_post_custom( $preset_id );
		$list_ids		= maybe_unserialize( $preset_custom['list_id'] );
		$form_id		= $preset_custom['form_id'];
		
		// preset doesn't have email lists in it; bail
		if( !$list_ids )
			return;
		
		$email_data = $this->GetNextEmail();
		
		// if no next email that hasn't been processed was found, bail
		if( !$email_data || $email_data['status'] != -1 )
			return;
					
		if( $email_data['status'] == -1 )
		{
			$next_email = $email_data['email'];
			$this->MarkEmailAsComplete( $next_email );
		}
				
		// if no email was found for that import, bail
		if( !$next_email )
			return;
			
		$this->StoreOptinRecord( $preset_id, $next_name, $next_email );
		
		foreach( $list_ids as $key => $value )
		{
			$fields = array();
			$fields['name'] = $next_name;
			$fields['email'] = $next_email;
			$fields['preset_id'] = $preset_id;
			$fields['list_id'] = $value;
			
			// temporary stop
			//continue;
			?>
		<div style="display:none;">
			<iframe src="<?php echo $this->GetOverseer()->GetAsset( 'includes', 'optin_src', 'url' ); ?>?<?php echo http_build_query( $fields ); ?>" style="height:50px; width:400px; display:none;"></iframe>
		</div>
		<?php
		}
	}
	
	function GetNextEmail()
	{
		$imported_emails = maybe_unserialize( $this->get_option( 'imported_emails' ) );
		
		if( count($imported_emails) == 0 || !is_array($imported_emails) )
			return;
		
		shuffle( $imported_emails );
		
		foreach( $imported_emails as $key => $value )
		{
			if( $value['status'] == -1 )
				return $value;
		}
		
		return;
	}
	
	function MarkEmailAsComplete( $email )
	{
		$imported_emails = maybe_unserialize( $this->get_option( 'imported_emails' ) );
		
		if( count($imported_emails) == 0 )
			return;
		
		foreach( $imported_emails as $key => $value )
		{
			if( $value['email'] == $email )
			{
				$imported_emails[ $key ]['status'] = 1;
				$imported_emails[ $key ]['date'] = time();
			}
		}
		
		$this->update_option( 'imported_emails', $imported_emails );
	}
}
?>