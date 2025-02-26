<?php
class qodyPage_OptinerSocialPopup extends QodyPage
{
	function __construct()
	{
		$this->SetOwner( func_get_args() );
		
		$this->m_raw_file = __FILE__;
		
		$this->SetPriority( 9 );
		
		$this->SetParent( 'home' );
		//$this->m_icon_url = '';
		
		$this->SetTitle( 'Social Popup' );
		
		add_action( 'wp_footer', array( $this, 'CodeInsertion' ) );
		
		parent::__construct();
	}
	
	function LoadMetaboxes()
	{
		$this->AddMetabox( 'general', 'General Settings' );
		$this->AddMetabox( 'plugins', 'Social Triggers' );
		
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
	
	function GetSocialTriggers()
    {
        $fields = array();
        $fields['like']         = 'Like Button';
        $fields['send']         = 'Send Button';
        $fields['subscribe']     = 'Subscribe Button';
        $fields['comments']     = 'Comments';
        //$fields['share']     = 'Share button';
        
        return $fields;
    }
	
	function CodeInsertion()
	{
		global $post;
		
		// if we disabled it, bail
		if( $this->get_option( 'running_popup' ) != 1 )
			return;
		
		// don't do it in the admin area
		if( is_admin() )
			return;
		
		// fix any custom query mods
		wp_reset_query(); 
		wp_reset_postdata();
		
		// only do it when we're on a real page
		if( !$post )
			return;
		
		// don't do it for bots
		if( $this->GetClass('bot_detector')->IsBot() )
			return;
		
		// get visitor ip
		$my_ip = $this->getRealIP();
		
		// bail if they already got opted in
		//if( $this->IsUsedIP( $my_ip ) )
		//	return;
	
		if( $this->get_option( 'set_popup_global' ) != 1 )
		{
			if( $post->ID != $this->get_option( 'popup_pages' ) ) // change to array search for multiple pages
				return;
		}
		
		$preset_id 		= $this->get_option('popup_preset_id');
		$preset_data	= get_post( $preset_id );
		$preset_custom 	= $this->get_post_custom( $preset_id );
		$list_ids		= maybe_unserialize( $preset_custom['list_id'] );
		$form_id		= $preset_custom['form_id'];
		
		// preset doesn't have email lists in it; bail
		if( !$list_ids )
			return;
		
		echo $this->GetPopupCode( $preset_id );
	}
	
	function GetPopupCode( $preset_id )
    {
		global $already_included_facebook_features;
		//if( $this->Owner()->IsUsedIP() )
		//	return;
		
		if( $already_included_facebook_features )
			return;
		
		$already_included_facebook_features = true;
			
		$embed_content = $this->GetAsset( 'js', 'facebook_features' );
			
        $data = '<script type="text/javascript" src="'.$this->GetAsset( 'js', 'facebook_features', 'url' ).'?p='.$preset_id.'"></script>';
        
        return $data;
    }
}
?>