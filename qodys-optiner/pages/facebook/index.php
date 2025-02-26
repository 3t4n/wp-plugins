<?php
class qodyPage_OptinerFacebookApp extends QodyPage
{
	function __construct()
	{
		$this->SetOwner( func_get_args() );
		
		$this->m_raw_file = __FILE__;
		
		$this->SetPriority( 8 );
		
		$this->SetParent( 'home' );
		//$this->m_icon_url = '';
		
		$this->SetTitle( 'Facebook App' );
		
		parent::__construct();
	}
	
	function LoadMetaboxes()
	{
		$this->AddMetabox( 'general', 'General Settings' );
		
		$this->AddMetabox( 'save', 'Save Settings', 'side' );
	}
	
	function WhenOnPage()
	{
		if( !parent::WhenOnPage() )
			return;
	}
}
?>