<?php
class qodyPage_OptinerRemoteIntegration extends QodyPage
{
	function __construct()
	{
		$this->SetOwner( func_get_args() );
		
		$this->m_raw_file = __FILE__;
		
		$this->SetPriority( 10 );
		
		$this->SetParent( 'home' );
		//$this->m_icon_url = '';
		
		$this->SetTitle( 'Remote Integration' );
		
		parent::__construct();
	}
	
	function LoadMetaboxes()
	{
		$this->AddMetabox( 'general', 'General Settings' );
		$this->AddMetabox( 'instructions', 'Integration Instructions' );
		
		$this->AddMetabox( 'save', 'Save Settings', 'side' );	
		
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
}
?>