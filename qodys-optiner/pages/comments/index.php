<?php
class qodyPage_OptinerBlogComments extends QodyPage
{
	function __construct()
	{
		$this->SetOwner( func_get_args() );
		
		$this->m_raw_file = __FILE__;
		
		$this->SetPriority( 5 );
		
		$this->SetParent( 'home' );
		//$this->m_icon_url = '';
		
		$this->SetTitle( 'Blog Comments' );
		
		add_action( 'wp_footer', array( $this, 'CodeInsertion' ) );
		
		parent::__construct();
	}
	
	function LoadMetaboxes()
	{
		$this->AddMetabox( 'general', 'General Settings' );
		$this->AddMetabox( 'types', 'Comment Types' );
		
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
		
		if( $this->get_option( 'running_comments' ) != 1 )
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
		
		$preset_id 		= $this->get_option('comment_preset_id');
		$preset_data	= get_post( $preset_id );
		$preset_custom 	= $this->get_post_custom( $preset_id );
		$list_ids		= maybe_unserialize( $preset_custom['list_id'] );
		$form_id		= $preset_custom['form_id'];
		
		// preset doesn't have email lists in it; bail
		if( !$list_ids )
			return;
		
		$comment_types 			= maybe_unserialize( $this->get_option( 'comment_types' ) );		
		$completed_comments 	= maybe_unserialize( $this->get_option( 'completed_comments' ) );
		
		$next_comment 			= $this->GetNextUnprocessedComment( $completed_comments, $comment_types );
		
		// if no next comment was found, bail
		if( !$next_comment )
			return;
			
		$next_email = $next_comment->comment_author_email;
		$next_name = $next_comment->comment_author;
		
		$fields = array();
		$fields['ID'] = $next_comment->comment_ID;
		$fields['date'] = time();
		$fields['name'] = $next_name;
		$fields['email'] = $next_email;
		
		$completed_comments[] = $fields;
		
		$this->update_option( 'completed_comments', $completed_comments );
		
		// if no email was found for that comment, bail
		if( !$next_email )
			return;
			
		$this->StoreOptinRecord( $value->ID, $next_name, $next_email );
		
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
}
?>