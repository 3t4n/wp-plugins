<?php
class qodyPosttype_OptinerList extends QodyPostType
{
	var $m_extra_image = null;//array();
	
    function __construct()
    {
        $this->SetOwner( func_get_args() );
		
		$this->m_raw_file = __FILE__;
		
		$this->SetPriority( 2 );
        
        $this->m_show_in_menu = $this->GetPre().'-home.php';
        
        //$this->m_supports[] = 'title';
        $this->m_supports[] = 'editor';
        //$this->m_supports[] = 'thumbnail';
        //$this->m_supports[] = 'excerpt';
        $this->m_supports[] = null;
        
        $this->SetMassVariables( 'email list', 'email lists', true );
		
		$this->m_list_columns['cb'] = '<input type="checkbox" />';
        $this->m_list_columns['title'] = 'Name';
        $this->m_list_columns['optins_today'] = 'Optins Today';
        $this->m_list_columns['optins_yesterday'] = 'Optins Yesterday';
        $this->m_list_columns['optins_total'] = 'Grand Total';
        
        parent::__construct();
    }
	
    function WhenViewingPostList()
    {
		if( !parent::WhenViewingPostList() )
			return;
		
		$this->EnqueueStyle( 'nicer-tables' );
    }
	
	function WhenEditing()
	{
		if( !parent::WhenEditing() )
			return;
		
		$exceptions = array();
		$exceptions[] = 'submitdiv';
		
		$this->RemoveAllMetaboxesButMine( $exceptions );
	}

    function LoadMetaboxes()
    {
		$this->AddMetabox( 'email_list', 'Email List' );
    }
    
	function TrackSubmission( $list_id )
	{
		// track the submission
		$submissions = get_post_meta( $list_id, 'submissions', true );
		
		if( !$submissions )
			$submissions = array();
		
		$submissions[ $this->GetToday() ]++;
		
		update_post_meta( $list_id, 'submissions', $submissions );
	}
	
	function DoFieldUngrouping( $fields = array(), $next_item = '' )
	{
		if( !$fields )
			return $fields;
		
		$data = array();
		
		foreach( $fields as $key => $value )
		{
			if( is_array( $value ) )
			{
				foreach( $value as $key2 => $value2 )
				{
					$data[ $key.'['.$key2.']' ] = $value2;
				}
				
				unset( $data[ $key ] );
			}
			else
			{
				$data[ $key ] = $value;
			}
		}
		
		return $data;
	}
	
	function ParseFormCode( $list_custom, $args = array() )
	{
		$form_code = $list_custom['form_code'];
		
		$fields = array();
		
		if( $args )
		{
			$args = $this->DecodeArrayKeys( $args );
			$args = $this->DoFieldUngrouping( $args );
			
			foreach( $args as $key => $value )
			{
				$bits = explode( ',', urldecode($key) );
				
				foreach( $bits as $key2 => $value2 )
				{
					switch( $value2 )
					{
						// we don't want these values in the form submit
						case 'list_id':
						case 'form_id':
						case 'p':
							
							break;
						
						// switch out the generic name slug with the form's version
						case 'optiner_name':
							$fields[ $list_custom['name_select'] ] = $value;
							
							break;
							
						// switch out the generic email slug with the form's version
						case 'optiner_email':
							$fields[ $list_custom['email_select'] ] = $value;
							
							break;
						
						default:
							$fields[ $value2 ] = $value;
							
							break;
					}
				}
			}
		}
		
		$new_code = '';
		
		foreach( $fields as $key => $value )
		{
			if( !$value )
				continue;
			
			$form_code = str_replace( '"'.$key.'"', "' '", $form_code ); // this removes duplicates of the inputs
			$form_code = str_replace( "'".$key."'", "' '", $form_code ); // this removes duplicates of the inputs
				
			$new_code .= '<input type="hidden" name="'.$key.'" value="'.$value.'">';
		}
		
		$form_code = str_replace( '</form>', $new_code.'</form>', $form_code );
		$form_code = str_replace( '</FORM>', $new_code.'</FORM>', $form_code );
		$form_code = str_replace( '</ form>', $new_code.'</ form>', $form_code );
		$form_code = str_replace( '</ FORM>', $new_code.'</ FORM>', $form_code );
		$form_code = str_replace( '</Form>', $new_code.'</Form>', $form_code );
		$form_code = str_replace( '</ Form>', $new_code.'</ Form>', $form_code );
		
		return $form_code;
	}
	
    function DisplayListColumns( $column )
    {
		global $post;
		
		$post_id = $post->ID;
		
		$custom = get_post_custom( $post_id );
        $the_meta = get_post_meta( $post_id, $column, true);
        
        switch( $column )
        {
			case "optins_today":
				
				$submissions = maybe_unserialize( $custom['submissions'][0] );
				$total = 0;
				
				$total += $submissions[ $this->GetToday() ];
				
				echo $total;
					
				break;
				
			case "optins_yesterday":
				
				$submissions = maybe_unserialize( $custom['submissions'][0] );
				$total = 0;
				
				$total += $submissions[ $this->GetYesterday() ];
				
				echo $total;
					
				break;
				
			case "optins_total":
				
				$submissions = maybe_unserialize( $custom['submissions'][0] );
				$total = 0;
				
				if( is_array( $submissions ) )
					$total += array_sum( $submissions );
				
				echo $total;

				break;
				
            case "email_count":
                
				$records = $this->Owner()->GetOptinRecords( $post_id );
				$record_count = count( $records );
				
				$last_record = $this->NumberTimeToStringTime( time() - strtotime($records[0]->post_date) );
				
                switch( $custom['campaign_type'][0] )
                {
                    case 'import':
                        
                        $imported_emails = maybe_unserialize( $custom['imported_emails'][0] );
                        $total = count( $imported_emails );
                        
                        $completed = 0;
                        $latest_date = 0;
                        
                        if( $imported_emails )
                        {
                            foreach( $imported_emails as $key => $value )
                            {
                                if( $value['status'] == 1 )
                                {
                                    $completed += 1;
                                    
                                    if( $latest_date < $value['date'] )
                                        $latest_date = $value['date'];
                                }
                            }
                        }
                        
                        echo '<strong>'.$completed.'</strong> of <strong>'.$total.'</strong> emails completed';
                        
                        if( $completed > 0 )
                            echo "<br>last was ".$this->NumberTimeToStringTime( time() - $latest_date )." ago";
                            
                        break;
						
					default:
						
						echo '<strong>'.$record_count.'</strong> optins processed';
                        
                        if( $record_count > 0 )
                            echo "<br>last was ".$last_record." ago";
						
						break;
                }
                
                break;
            
            case "date":
            
                $productData = get_post( $the_meta );
                
                echo $productData->post_title;
                
                break;
        }
    }
    
    
}
?>