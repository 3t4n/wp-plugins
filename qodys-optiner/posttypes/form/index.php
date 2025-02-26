<?php
class qodyPosttype_OptinerForm extends QodyPostType
{
	var $m_extra_image = null;//array();
	var $m_button_image = null;
	
    function __construct()
    {
        $this->SetOwner( func_get_args() );
		
		$this->m_raw_file = __FILE__;
		
		$this->SetPriority( 3 );
        
        $this->m_show_in_menu = $this->GetPre().'-home.php';
        
        $this->m_supports[] = 'title';
        $this->m_supports[] = 'editor';
        //$this->m_supports[] = 'thumbnail';
        //$this->m_supports[] = 'excerpt';
        $this->m_supports[] = null;
		
		$this->m_rewrite = array( 'slug' => 'form' );
		
        $this->SetMassVariables( 'form', 'forms', true );
		$this->SetTypeSlug( 'optin form', true );
		
		$this->m_list_columns['cb'] = '<input type="checkbox" />';
        $this->m_list_columns['title'] = 'Name';
        $this->m_list_columns['display_count'] = 'Displays';
        $this->m_list_columns['submission_count'] = 'Submissions';
        $this->m_list_columns['conversion_rate'] = 'Conv. Rate';
        $this->m_list_columns['display_ips'] = 'Unique Displays';
		$this->m_list_columns['unique_conversion_rate'] = 'Unique Conv. Rate';
		$this->m_list_columns['export_string'] = 'Export';
		
		$fields = array();
		$fields['id'] = 2;
		$fields['label'] = 'Product image';
		$fields['set_text'] = 'Set custom product image';
		$fields['whitelisted_post_types'] = array( $this->m_type_slug );
		
		$this->m_extra_image = new QodyExtraFeaturedImage( $fields );
		
		$fields = array();
		$fields['id'] = 3;
		$fields['label'] = 'Button image';
		$fields['set_text'] = 'Set custom button image';
		$fields['whitelisted_post_types'] = array( $this->m_type_slug );
		
		$this->m_button_image = new QodyExtraFeaturedImage( $fields );
		
		// add support for custom images
		add_image_size( $this->GetPre().'product_image', 300, 300 );
        
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
		
		global $wp_scripts;
		
		$exceptions = array();
		$exceptions[] = 'submitdiv';
		
		$this->RemoveAllMetaboxesButMine( $exceptions );
		
		$exceptions[] = $this->GetPre().'-optin_preview';
		$this->StartMetaboxesClosed( $exceptions );
		
		//$this->DeRegisterScript('jquery-ui-core'); // fixes conflict with jquery ui being loaded twice
		
        $this->EnqueueScript( 'jquery-ui' );
		$this->EnqueueScript( 'miniColors' );
		$this->EnqueueScript( 'extra-featured-image' );
		$this->EnqueueScript( 'thickbox' );
		$this->EnqueueScript( 'chosen' );
		//$this->EnqueueScript( 'media-upload' );
		
		$this->EnqueueStyle( 'jquery-ui' );
		$this->EnqueueStyle( 'miniColors' );
		$this->EnqueueStyle( 'thickbox' );
		$this->EnqueueStyle( 'chosen' );
	}
	
	function PostSaveInsert( $post_id, $post )
    {
        if( !$post->post_title )
        {
            update_post_meta( $post->ID, 'post_title', 'New form' );
        }
		
        // This lets 0 items be selected
        if( !$_POST['field_inputs'] )
            $_POST['field_inputs'] = array();
    }
	
	function AfterPostSaveInsert( $post_id, $post )
	{
		// handle an import if so desired
		$import_code = $_POST['field_import_code'] ? unserialize( base64_decode($_POST['field_import_code']) ) : '';
		
		if( $import_code && is_array( $import_code ) )
		{
			$custom = $this->get_post_custom( $post_id );
			
			if( $custom )
			{
				foreach( $custom as $key => $value )
				{
					delete_post_meta( $post_id, $key );
				}
			}
			
			foreach( $import_code as $key => $value )
			{
				if( $key == 'inputs' )
					$value = maybe_unserialize( $value );
					
				switch( $key )
				{
					case 'display_ips':
					case 'display_count':
						
						continue;
					
					default:
						
						update_post_meta( $post_id, $key, $value );
						
						break;
				}
			}
		}
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
	
	function HasThemeAccess()
	{
		$access = $this->get_option( 'has_theme_access' );
		
		if( $access != 1 )
		{
			$access = $this->VerifyOwnershipByAssociation( $this->Owner(), 6883 );
			
			$this->update_option( 'has_theme_access', $access );
		}
		
		if( $access == 1 )
			return true;
		
		return false;
	}
	
	function CustomDefaults()
	{
		$fields = array();
		$fields['frame_width'] 	= $this->GetDefaultOptinDimensions( 'width' );
		$fields['frame_height'] = $this->GetDefaultOptinDimensions( 'height' );
		$fields['form_type'] = 'traditional';
		
		$fields['use_header_text'] = 1;
		$fields['header_text'] = "<u>Optin</u> to receive your <em>FREE</em> <strong>gift</strong>!";
		$fields['header_text_size'] = '22';
		$fields['header_text_color'] = '#CC0000';
		$fields['header_text_top_padding'] = '8';
		$fields['header_text_bottom_padding'] = '10';
		
		$fields['use_secondary_text'] = -1;
		$fields['secondary_text'] = 'CHOOSE AN OPTIN METHOD';
		$fields['secondary_text_size'] = '10';
		$fields['secondary_text_color'] = '#969696';
		
		$fields['use_privacy_text'] = -1;
		$fields['privacy_text'] = 'Your information will never be shared with any third party';
		$fields['privacy_text_size'] = '9';
		$fields['privacy_text_color'] = '#000000';
		
		$fields['use_background'] = 1;
		$fields['background_color_from'] = '#f5f8f5';
		$fields['background_color_to'] = '#eef4f0';
		
		$fields['use_extra_image'] = '-1';
		$fields['extra_image_top_padding'] = '20';
		$fields['product_image_position'] = 'top';
		$fields['facebook_connect_image'] = $this->m_asset_url.'/images/fb-button.png';
		
		$fields['use_outer_border'] = 1;
		$fields['outer_border_color'] = '#DFDFDF';
		$fields['outer_border_width'] = '1';
		$fields['outer_border_style'] = 'solid';
		
		$fields['submit_button_text'] = 'Get <strong>Instant</strong> <em>Access</em>';
		$fields['submit_button_background_color'] = '#feaf2d';
		$fields['submit_button_text_color'] = '#000000';
		$fields['submit_button_size'] = '9';
		$fields['submit_button_text_size'] = '22';
		$fields['button_style'] = 'odin';
		
		$fields['inputs'] = array( array('name' => '', 'label' => 'Name:'), array('name' => '', 'label' => 'Email:') );	
		
		return $fields;
	}
	
    function LoadMetaboxes()
    {
		$this->AddMetabox( 'optin_preview', 'Preview the Optin Form' );
		$this->AddMetabox( 'traditional_form', 'Input Fields' );
		$this->AddMetabox( 'submit_button', 'Submit Button' );
		$this->AddMetabox( 'odin_form', "Odin's Pride Settings" );
		//$this->AddMetabox( 'facebook_app', 'Facebook Application Settings' );
		
		if( $this->HasThemeAccess() )
		{
			$this->AddMetabox( 'themes1', 'Themes for no product image - 300px by 400px' );
			$this->AddMetabox( 'themes2', 'Themes for left/right product image - 660px by 400px' );
			$this->AddMetabox( 'themes3', 'Themes for top product image - 300px by 640px' );
			$this->AddMetabox( 'themes4', 'Themes for bigger forms - 400px by 660px' );
		}
		
		$this->AddMetabox( 'import', 'Preset Import', 'side' );
		$this->AddMetabox( 'form_type', 'Form Type', 'side' );
		$this->AddMetabox( 'container_dimensions', 'Container Dimensions', 'side' );
		$this->AddMetabox( 'header_text', 'Header Text', 'side' );
		$this->AddMetabox( 'secondary_text', 'Secondary Text', 'side' );
		$this->AddMetabox( 'privacy_text', 'Privacy Text', 'side' );
		$this->AddMetabox( 'product_image', 'Product Image', 'side' );
		$this->AddMetabox( 'background', 'Background Fill', 'side' );
		$this->AddMetabox( 'border', 'Outer Border', 'side' );
		$this->AddMetabox( 'custom_style', 'Custom CSS Styling', 'side' );		
    }
    
    function DisplayListColumns( $column )
    {
		global $post;
		
		$post_id = $post->ID;
		
		$custom = $this->get_post_custom( $post_id );
        $the_meta = get_post_meta( $post_id, $column, true);
        
        switch( $column )
        {
			case "display_count":
				
				echo $the_meta;
				
				break;
			
			case "submission_count":
				
				echo $the_meta;
				
				break;
			
			case "conversion_rate":
				
				$submissions = $custom['submission_count'];
				$displays = $custom['display_count'];
				
				if( $displays > 0 )
					$rate = number_format( $submissions / $displays * 100, 2 );
				
				if( $rate > 0 )
					echo '<span style="color:#090;"><strong>'.$rate.'%</strong></span>';
				
				break;
			
			case "unique_conversion_rate":
				
				$submissions = $custom['submission_count'];
				$displays = count( maybe_unserialize( $custom['display_ips'] ) );
				
				if( $displays > 0 )
					$rate = number_format( $submissions / $displays * 100, 2 );
				
				if( $rate > 0 )
					echo '<span style="color:#090;"><strong>'.$rate.'%</strong></span>';
					
				break;
				
			case "export_string":
				
				echo '<input type="text" style="width:75px;" onclick="this.select()" value="'.base64_encode(serialize($custom)).'">';
				
				break;		
		}
    }
	
	function TrackSubmission( $form_id )
	{
		// track the submission
		$submission_count = get_post_meta( $form_id, 'submission_count', true );
		
		if( !$submission_count )
			$submission_count = 0;
			
		$submission_count++;
		
		update_post_meta( $form_id, 'submission_count', $submission_count );
	}
	
	function TrackImpression( $form_id )
	{
		// fetch my ip
		$my_ip = $this->getRealIP();
		
		// track the general impressions
		$display_count = get_post_meta( $form_id, 'display_count', true );
		
		if( !$display_count )
			$display_count = 0;
			
		$display_count++;
		
		update_post_meta( $form_id, 'display_count', $display_count );
		
		// record this ip for the unique impression figure
		$display_ips = maybe_unserialize( get_post_meta( $form_id, 'display_ips', true ) );
		
		if( !$display_ips )
			$display_ips = array();
		
		if( !in_array( $my_ip, $display_ips ) )
		{
			$display_ips[] = $my_ip;
			
			update_post_meta( $form_id, 'display_ips', $display_ips );
		}
	}
	
	function PrintPopupStyles()
	{
		global $custom, $post;
		
		$button_gradient_from = $this->CalculateColorLuminance( $custom['submit_button_background_color'], 0.2 );
		?>
		<style>
		body {
			background-color:transparent;
			padding-left: 0px !important;
			padding-right: 0px !important;
		}
		body,
		#main_container {
			height:100%;
			max-width:320px;
		}
		#main_container {			
			<?php
			if( $custom['use_extra_image'] == 1 )
			{
				switch( $custom['product_image_position'] )
				{
					case 'left':
						echo 'float:right;';
						break;
					case 'right':
						echo 'float:left;';
				}
			} ?>
		}
		.optiner-popup {
			<?php
			if( $custom['use_background'] == 1 )
			{ ?>
			background-color: <?php echo $custom['background_color_to']; ?>;
			background-image: -ms-linear-gradient(top,<?php echo $custom['background_color_from']; ?>,<?php echo $custom['background_color_to']; ?>);
			background-image: -moz-linear-gradient(top,<?php echo $custom['background_color_from']; ?>,<?php echo $custom['background_color_to']; ?>);
			background-image: -o-linear-gradient(top,<?php echo $custom['background_color_from']; ?>,<?php echo $custom['background_color_to']; ?>);
			background-image: -webkit-gradient(linear,left top,left bottom,from(<?php echo $custom['background_color_from']; ?>),to(<?php echo $custom['background_color_to']; ?>));
			background-image: -webkit-linear-gradient(top,<?php echo $custom['background_color_from']; ?>,<?php echo $custom['background_color_to']; ?>);
			background-image: linear-gradient(top,<?php echo $custom['background_color_from']; ?>,<?php echo $custom['background_color_to']; ?>);
			
			<?php
			} ?>
			
			<?php
			if( $custom['use_outer_border'] == 1 )
			{ ?>
			border-color: <?php echo $custom['outer_border_color']; ?>;
			border-width: <?php echo $custom['outer_border_width']; ?>px;
			border-style: <?php echo $custom['outer_border_style']; ?>;
			-moz-box-shadow: inset 0 1px 0 #aaa;
			-webkit-box-shadow: inset 0 1px 0 #aaa;
			box-shadow: inset 0 1px 0 #aaa;
			<?php
			}
			else
			{ ?>
			border-width: 0px;
			-webkit-box-shadow: none;
			-moz-box-shadow: none;
			box-shadow: none;
			<?php
			}?>
			
			-webkit-border-radius: 10px;
			border-radius: 10px;
			margin: 0px;
			padding:10px;
			float:left;
			height: <?php echo $custom['frame_height']; ?>px;
			width: <?php echo $custom['frame_width']; ?>px;
		}
		
		.the_table {
			/*width:100%;*/
			height:100%;
		}
			.the_table td {
				text-align:center;
				/*height:100%;*/
				vertical-align:middle;
				margin:0px;
				padding:0px;
			}
		
		.product_image {
			<?php
			if( $custom['use_extra_image'] != 1 )
			{ ?>
			display:none;
			<?php
			} ?>
			
			text-align:center;
			
			<?php
			switch( $custom['product_image_position'] )
			{
				case 'left':
					echo 'float:left;';
					break;
				case 'right':
					echo 'float:right;';
			} ?>
		}
			.product_image img {
				max-width:<?php echo $this->GetDefaultOptinDimensions( 'product_image_width' ); ?>px;
				padding:<?php echo $custom['extra_image_top_padding']; ?>px 10px 10px 10px;
				margin:0px auto;
				text-align:center;
				
				<?php
				if( $custom['extra_image_width'] != '' )
				{ ?>
				width:<?php echo $custom['extra_image_width']; ?>px;
				<?php
				} ?>
			}
		
		.header_text {
			margin:0px;
			padding:<?php echo $custom['header_text_top_padding']; ?>px 0px <?php echo $custom['header_text_bottom_padding']; ?>px 0px;
			font-size:<?php echo $custom['header_text_size']; ?>px;
			color:<?php echo $custom['header_text_color']; ?>;
			line-height:normal;
			text-align:center;
			
			<?php
			if( $custom['use_header_text'] != 1 )
			{ ?>
			display:none;
			<?php
			} ?>
		}
		.secondary_text {
			margin:0px 0px 3px 0px;
			padding:0px;
			font-size:<?php echo $custom['secondary_text_size']; ?>px;
			color:<?php echo $custom['secondary_text_color']; ?>;
			line-height:normal;
			text-align:center;
			
			<?php
			if( $custom['use_secondary_text'] != 1 )
			{ ?>
			display:none;
			<?php
			} ?>
		}
		.privacy_text {
			margin:0px auto 3px auto;
			padding:5px 0px 0px 35px;
			font-size:<?php echo $custom['privacy_text_size']; ?>px;
			color:<?php echo $custom['privacy_text_color']; ?>;
			line-height:normal;
			text-align:left;
			
			<?php
			if( $custom['use_privacy_text'] != 1 )
			{ ?>
			display:none;
			<?php
			} ?>
			
			height: 32px;
			width:60%;
			background-image: url('<?php echo $this->m_asset_url; ?>/images/privacy-lock.png' );
			background-repeat:no-repeat;
		}
		
		.btn.massive {
			line-height: normal;
			padding: 9px 14px 9px;
			-webkit-border-radius: 6px;
			-moz-border-radius: 6px;
			border-radius: 6px;
			margin-top: 8px;
			
			color:<?php echo $custom['submit_button_text_color']; ?>;
			font-size:<?php echo $custom['submit_button_text_size']; ?>px;
			padding:<?php echo $custom['submit_button_size']; ?>px <?php echo $custom['submit_button_size'] + 5; ?>px <?php echo $custom['submit_button_size']; ?>px <?php echo $custom['submit_button_size'] + 5; ?>px;
		}
		
		.btn.custom {
			display: inline-block;
			*display: inline;
			/* IE7 inline-block hack */
			
			*zoom: 1;
			background-color: <?php echo $custom['submit_button_background_color']; ?>;
			background-repeat: repeat-x;
			background-image: -khtml-gradient(linear, left top, left bottom, from(<?php echo $custom['submit_button_background_color']; ?>), to(<?php echo $custom['button_gradient_from']; ?>));
			background-image: -moz-linear-gradient(top, <?php echo $custom['submit_button_background_color']; ?>, <?php echo $custom['button_gradient_from']; ?>);
			background-image: -ms-linear-gradient(top, <?php echo $custom['submit_button_background_color']; ?>, <?php echo $custom['button_gradient_from']; ?>);
			background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, <?php echo $custom['submit_button_background_color']; ?>), color-stop(100%, <?php echo $custom['button_gradient_from']; ?>));
			background-image: -webkit-linear-gradient(top,<?php echo $custom['submit_button_background_color']; ?>, <?php echo $custom['button_gradient_from']; ?>);
			background-image: -o-linear-gradient(top, <?php echo $custom['submit_button_background_color']; ?>, <?php echo $custom['button_gradient_from']; ?>);
			background-image: linear-gradient(top, <?php echo $custom['submit_button_background_color']; ?>, <?php echo $custom['button_gradient_from']; ?>);
			filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='<?php echo $custom['submit_button_background_color']; ?>', endColorstr='<?php echo $custom['button_gradient_from']; ?>', GradientType=0);
			filter: progid:dximagetransform.microsoft.gradient(enabled=false);
			text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
			border-color: <?php echo $custom['button_gradient_from']; ?> <?php echo $custom['button_gradient_from']; ?> <?php echo $custom['submit_button_background_color']; ?>;
			border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
			
		}
		
		.button_center_clutch,
		.button_center_clutch td {
			border:none;
			width:100%; 
			padding:0px; 
			margin:0px;
			text-align:center;
		}
		#traditional_form {
			display: <?php if( $custom['form_type'] == 'odin' ) echo 'none'; else echo 'block'; ?>;
		}
		
		#traditional_form #input_container {
			padding-left:20px;
			padding-right:30px; /* in a perfect world, this would match the left padding, but for some reason it's not playing nice for it's container's width */
		}
		#traditional_form .form-stacked {
			padding-left:0px;
			padding-right:0px;
		}
		#traditional_form .input_container input {
			width:100%;
			height:30px;
			font-size:20px;
			line-height:normal;
		}
		#traditional_form .input_container {
			width:100%;
		}
		
		#custom_submit_button {
			display:<?php if( $custom['button_style'] != 'odin' ) echo 'inline-block'; else echo 'none'; ?>;
			border:none;
			background:none;
			height:auto;
			/*width:100%;*/
			box-shadow:none;
		}
		#odin_submit_button {
			display:<?php if( $custom['button_style'] == 'odin' ) echo 'inline-block'; else echo 'none'; ?>;
		}
		
		#odin_form {
			display: <?php if( $custom['form_type'] == 'odin' ) echo 'block'; else echo 'none'; ?>;
		}
		
		.item {
			display:none;
			/*border:2px #F5F5F5 dashed;*/
			margin: 10px 0px 0px 0px;
			padding:0px;
			text-align:center;
		}
		#the_radio_buttons {
			text-align:center;
		}
		#the_radio_buttons label {
			width:inherit;
			float:none;
		}
		#main_container {
			/*width:100%;*/
			margin:0px auto;
		}
		#main_container .ui-button-text-only .ui-button-text {
			padding: 4px 10px 5px 10px;
		}
		#main_container .ui-widget {
			font-size: 14px;
		}
		
		/* theme styles */
		<?php
		//$data = $this->GetAssets('themes');
		
		$data = $this->GetThemes();
		if( $data )
		{
			foreach( $data as $key => $value )
			{
				if( !$value ) continue;
				foreach( $value as $key2 => $value2 )
				{
					if( !$_GET['d'] && $key2 != $custom['optin_theme'] )
						continue; ?>		
		.optiner-popup.<?php echo $key2; ?> {
			background-image: url('<?php echo $value2; ?>');
			background-repeat:no-repeat;
		}
				<?php
				}
			}
		} ?>
		</style>
	<?php		
	}
	
	function GetThemes()
	{
		$counts = array();
		$counts['a'] = 142;
		$counts['b'] = 31;
		$counts['c'] = 10;
		$counts['d'] = 47;
		
		$fields = array();
		
		foreach( $counts as $key => $value )
		{
			for( $i = 1; $i <= $value; $i++ )
			{
				$slug = 'theme-'.$i.$key;
				
				$url = 'https://s3.amazonaws.com/qody/qodys-optiner/form-themes/'.$slug.'/bg.png';
				
				switch( $i )
				{
					// these are currently broken themes / not .png
					case 1:
					case 41:
					case 42:
					case 43:
					case 44:
					case 45:
					case 46:
					case 47:
					case 48:
					case 49:
					case 138:
						
						if( $key == 'a' )
							$url = '';
						
						break;
						
					default:
						
						break;
				}
				
				if( $url )
				{
					$fields[$key][$slug] = $url;
				}
			}
		}
		
		return $fields;		
	}
	
	
	
	
	
	
	
}
?>