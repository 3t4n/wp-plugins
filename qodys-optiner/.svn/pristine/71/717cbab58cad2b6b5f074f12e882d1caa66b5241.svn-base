<?php
class qodyPosttype_OptinRecord extends QodyPostType
{
	function __construct()
	{
		$this->SetOwner( func_get_args() );
		
		$this->m_raw_file = __FILE__;
		
		$this->SetPriority( 1 );
		
		$this->m_show_in_menu = $this->GetPre().'-home.php';
		
		//$this->m_supports[] = 'title';
		//$this->m_supports[] = 'editor';
		//$this->m_supports[] = 'thumbnail';
		//$this->m_supports[] = 'excerpt';
		$this->m_supports[] = null;

		$this->SetMassVariables( 'optin record', 'optin records', true );
		
		$this->m_list_columns['cb'] = '<input type="checkbox" />';
        $this->m_list_columns['ip_address'] = 'IP';
        $this->m_list_columns['optin_name'] = 'Optin Name';
        $this->m_list_columns['optin_email'] = 'Optin Email';
        $this->m_list_columns['campaign_id'] = 'Campaign';
		$this->m_list_columns['log_date'] = 'Date';
		
		parent::__construct();
	}
	
	function WhenViewingPostList()
    {
		if( !parent::WhenViewingPostList() )
			return;
		
		$this->EnqueueStyle( 'nicer-tables' );
    }
	
	function DisplayListColumns( $column )
	{
		global $post;
		
		$post_id = $post->ID;
		
		$custom = get_post_custom( $post_id );
		$the_meta = get_post_meta( $post_id, $column, true);
		
		switch( $column )
		{
			case "redirect_url":
				
				echo '<a target="_blank" href="'.$the_meta.'">'.$the_meta.'</a>';
				//echo '<a href="">'.$toDisplay.'</a>';
				
				break;
			
			case "ip_address":
				
				echo '<a target="_blank" href="http://whois.domaintools.com/'.$the_meta.'">'.$the_meta.'</a>';
				//echo '<a href="">'.$toDisplay.'</a>';
				
				break;
			
			case "campaign_id":
				
				echo '<a target="_blank" href="'.admin_url('post.php?post='.$the_meta.'&action=edit' ).'">'.get_the_title( $the_meta ).'</a>';
				//echo '<a href="">'.$toDisplay.'</a>';
				
				break;
			
			case "log_date":
				
				$the_post = get_post( $post_id );
				
				echo $this->NumberTimeToStringTime( time() - strtotime($the_post->post_date) ).' ago';
				
				break;
				
			default: echo $the_meta; break;
		}
	}
	
}
?>