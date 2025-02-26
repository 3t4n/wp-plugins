<?php
class qodyPosttype_OptinerFormPreset extends QodyPostType
{
	 function __construct()
    {
        $this->SetOwner( func_get_args() );
		
		$this->m_raw_file = __FILE__;
		
		$this->SetPriority( 4 );
        
        $this->m_show_in_menu = $this->GetPre().'-home.php';
        
        //$this->m_supports[] = 'title';
        $this->m_supports[] = 'editor';
        //$this->m_supports[] = 'thumbnail';
        //$this->m_supports[] = 'excerpt';
        $this->m_supports[] = null;
		
		$this->m_rewrite = array( 'slug' => 'form-preset' );
        
        $this->SetMassVariables( 'preset', 'presets', true );
		$this->SetTypeSlug( 'form preset', true );
		
		$this->m_list_columns['cb'] = '<input type="checkbox" />';
        $this->m_list_columns['title'] = 'Name';
		$this->m_list_columns['form_id'] = 'Optin Form';
		$this->m_list_columns['list_id'] = 'Email Lists';		
        $this->m_list_columns['shortcode'] = 'Shortcode';
        $this->m_list_columns['embed_code'] = 'Embed Code';
        $this->m_list_columns['direct_link'] = 'Direct Link';
		$this->m_list_columns['raw_link'] = 'Raw Link';
		
		$this->CreateShortcode();
        
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
		
		$this->EnqueueStyle('chosen');
		$this->EnqueueScript('chosen');
	}

    function LoadMetaboxes()
    {
		$this->AddMetabox( 'general', 'Form Preset Settings' );
    }
    
	function GetLists()
	{
		$fields = array();
		$fields['post_type'] = $this->GetClass('posttype_list')->m_type_slug;
		$fields['numberposts'] = -1;
		
		$data = get_posts( $fields );
		
		return $data;
	}
	
	function GetForms()
	{
		$fields = array();
		$fields['post_type'] = $this->GetClass('posttype_form')->m_type_slug;
		$fields['numberposts'] = -1;
		
		$data = get_posts( $fields );
		
		return $data;
	}
	
	function CreateShortcode()
	{
		add_shortcode( 'optiner', array( $this, 'OptinerShortcode' ) );
	}
	
	function OptinerShortcode( $atts, $content = null )
	{
		if( $atts['p'] )
		{
			$preset_id 		= $atts['p'];
			$preset_data	= get_post( $preset_id );
			$preset_custom 	= $this->get_post_custom( $preset_id );
			$list_ids		= maybe_unserialize( $preset_custom['list_id'] );
			
			$form_id		= $preset_custom['form_id'];
			$form_data		= get_post( $form_id );
			$form_custom 	= $this->get_post_custom( $form_id );			
		}
		else if( $atts['f'] )
		{
			$form_id		= $atts['f'];
			$form_data		= get_post( $form_id );
			$form_custom 	= $this->get_post_custom( $form_id );	
		}
		
		$data = $this->GetEmbedCode( $preset_id, $form_id, $atts );
		
		return $data;
	}
	
	function GetShortcode( $preset_id = '', $form_id = '' )
    {
		$data = '[optiner';
		
		if( $preset_id )
			$data .= ' p="'.$preset_id.'"';
		
		if( $form_id )
			$data .= ' f="'.$form_id.'"';
		
		$data .= ']';
		
		return $data;
    }
	
	function GetEmbedCode( $preset_id = '', $form_id = '', $extras = array() )
    {
		$fields = array();
		$fields['p'] = $preset_id;
		$fields['f'] = $form_id;
		
		$fields = wp_parse_args( $fields, $extras );
		
        $data = '<script type="text/javascript" src="'.$this->GetAsset( 'js', 'embed_content', 'url' ).'?'.http_build_query( $fields ).'"></script>';
        
        return $data;
    }
	
    function DisplayListColumns( $column )
    {
		global $post;
		
		$post_id = $post->ID;
		
		$custom = $this->get_post_custom( $post_id );
        $the_meta = get_post_meta( $post_id, $column, true);
        
        switch( $column )
        {
			case "shortcode":
				
				echo '<input class="embed_input" type="text" onclick="this.select()" readonly="readonly" value=\''.$this->GetShortcode( $post_id ).'\'">';
					
				break;
			
			case "embed_code":
				
				echo '<input class="embed_input" type="text" onclick="this.select()" readonly="readonly" value=\''.$this->GetEmbedCode( $post_id ).'\'">';
					
				break;
			
			case "direct_link":
				
				echo '<input class="embed_input" type="text" onclick="this.select()" readonly="readonly" value=\''.get_permalink( $post_id ).'\'">';
					
				break;
			
			case "raw_link":
				
				$value = $this->GetClass('posttype_form')->GetAsset( 'includes', 'optin_iframe', 'url' ).'?p='.$post_id;
				echo '<input class="embed_input" type="text" onclick="this.select()" readonly="readonly" value=\''.$value.'\'">';
					
				break;
			
			case "list_id":
                
				if( !$the_meta )
					$the_meta = array();
				
				if( $the_meta )
				{
					$iter = 0;
					
					foreach( $the_meta as $key => $value )
					{
						$iter++;
						
						echo '<a href="'.admin_url('post.php?post='.$value ).'&action=edit">'.get_the_title( $value )."</a>";
						
						if( $iter < count( $the_meta ) )
							echo ", ";
					}
				}
                
                break;
			
			case "form_id":
				
				if( $the_meta )
				{
					echo '<a href="'.admin_url('post.php?post='.$the_meta ).'&action=edit">'.get_the_title( $the_meta ).'</a>';
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