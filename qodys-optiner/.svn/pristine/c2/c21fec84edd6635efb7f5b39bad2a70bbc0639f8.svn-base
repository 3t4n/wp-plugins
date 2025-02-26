<?php
class qodyPage_OptinerHome extends QodyPage
{
	function __construct()
	{
		$this->SetOwner( func_get_args() );
		
		$this->m_raw_file = __FILE__;
		
		$this->SetPriority( 1, false );
		
		$this->m_icon_url = $this->GetIcon();
		
		$this->SetTitle( $this->Owner()->m_plugin_name );
		
		parent::__construct();
	}
	
	function LoadMetaboxes()
	{
		$fields = array();
		$fields['post_type'] = $this->GetClass('posttype_campaign')->m_type_slug;
		$fields['numberposts'] = -1;
		
		if( !get_posts( $fields ) )
			$this->AddMetabox( 'quickstart', 'Quickstart' );
			
		$this->AddMetabox( 'overview_chart', 'Graphical Overview of Optins' );
		$this->AddMetabox( 'announcements', 'Announcements', 'side' );
		
		$this->EnqueueScript( 'flot' );
	}
}
?>