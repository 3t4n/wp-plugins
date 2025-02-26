<?php
require_once( dirname(dirname(dirname(dirname(dirname(dirname(dirname(__FILE__))))))).'/wp-load.php' );

$preset_id = $_GET['p'];

if( $preset_id )
{
	$preset_data = get_post( $preset_id );
	$preset_custom = $qodys_optiner->GetClass('posttype_form-preset')->get_post_custom( $preset_id );
	$list_ids = maybe_unserialize( $preset_custom['list_id'] );
}

$form_id = $_GET['f'] ? $_GET['f'] : $preset_custom['form_id'];

if( $form_id )
{
	$form_data = get_post( $form_id );
	$form_custom = $qodys_optiner->GetClass('posttype_form')->get_post_custom( $form_id );
}

if( $_POST )
	$submission_data = $qodys_optiner->DecodeArrayKeys( $_POST );
else
	$submission_data = $qodys_optiner->DecodeArrayKeys( $_GET );

if( $submission_data['optiner_email'] )
{
	$next_name = $submission_data['optiner_name'];
	$next_email = $submission_data['optiner_email'];
}

$success_page = $preset_custom['success_url'];

if( !$success_page || $success_page == '' )
	$success_page = get_bloginfo('url');
?>
<html>
<head>
<title>Redirecting...</title>
</head>
<body>
	
	<?php
	if( !$list_ids )
	{
		$link = admin_url('post-new.php?post_type='.$qodys_optiner->GetClass('posttype_form-preset')->m_type_slug );
		echo "<h2>".$qodys_optiner->m_owl_name.": couldn't find any Email Lists associated with this submission; make sure you're using a <a href=\"".$link."\">Form Preset</a>.</h2>";
		echo '<img src="'.$qodys_optiner->m_owl_image.'" style="width:100px;" />';
		exit;
	}
	else if( !$success_page )
	{
		echo "<h2>".$qodys_optiner->m_owl_name.": you must enter a success page for that campaign to work</h2>";
		echo '<img src="'.$qodys_optiner->m_owl_image.'" style="width:100px;" />';
		exit;
	}
	
	if( $list_ids )
	{
		foreach( $list_ids as $key => $value )
		{
			$list_custom = $qodys_optiner->get_post_custom( $value );
			
			// fetch the name and email fields as specified in the list
			if( $submission_data[ $list_custom['name_select'] ] )
				$next_name = $submission_data[ $list_custom['name_select'] ];
			
			if( $submission_data[ $list_custom['email_select'] ] )
				$next_email = $submission_data[ $list_custom['email_select'] ];
			
			$fields = array();
			$fields['list_id'] = $value;
			$fields['form_id'] = $form_id;
			
			$fields = wp_parse_args( $fields, $submission_data );
			
			if( !$next_email )
			{
				$list_link = admin_url('post.php?post='.$value.'&action=edit' );
				$form_link = admin_url('post.php?post='.$form_id.'&action=edit' );
				?>
				<div style="width:500px; margin:50px auto;">
					<h2><?php echo $qodys_optiner->m_owl_name; ?>: error!</h2>
					
					<img src="<?php echo $qodys_optiner->m_owl_image; ?>" style="width:100px; float:left; padding:0px 20px 0px 0px;" />
					
					<p style="padding-top:25px;">No email was found; either no email was submitted, or the 
					<a href="<?php echo $list_link; ?>">Email List</a> and/or the 
					<a href="<?php echo $form_link; ?>">Optin Form</a> input fields weren't associated correctly.</p>
				</div>
				<?php
				exit;
			}
			?>
		<div style="display:none;">
			<iframe src="<?php echo $qodys_optiner->GetOverseer()->GetAsset( 'includes', 'optin_src', 'url' ); ?>?<?php echo http_build_query( $fields ); ?>" style="height:50px; width:400px; display:none;"></iframe>
		</div>
		<?php			
		}
		
		if( $next_email )
		{
			$qodys_optiner->StoreOptinRecord( $campaign_id, $next_name, $next_email );
		}
	} ?>
	
	<center>
		<h2>Please wait, your redirect is being processed.</h2>
	</center>

	<center>
		<br/><br/>If you are not automatically redirected within 5 seconds...<br/><br/>
		<a href="<?php echo $success_page; ?>"><button>click here</button></a>
	</center>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
	
	<script>
	$.noConflict();
	
	jQuery(document).ready( function()
	{
		setTimeout( function()
		{
			if( window.opener )
			{
				window.opener.top.location.href = '<?php echo $success_page; ?>';
				window.opener.location.href = '<?php echo $success_page; ?>';
				window.close();
			}
			else
			{
				top.location.href = '<?php echo $success_page; ?>';
			}	
		}, <?php echo count( $list_ids ) * 3000; ?> );
	});
	</script>

</body>
</html>


