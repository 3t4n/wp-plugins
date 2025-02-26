<?php
require_once( dirname(dirname(dirname(dirname(dirname(dirname(dirname(__FILE__))))))).'/wp-load.php' );

//$name = $_GET['name'];
//$email = $_GET['email'];
$list_id = $_GET['list_id'];
$form_id = $_GET['form_id'];

$list_custom = $qodys_optiner->get_post_custom( $list_id );

if( !$list_id || !$list_custom )
	exit;

$qodys_optiner->GetClass('posttype_list')->TrackSubmission( $list_id );

if( $form_id )
{
	$qodys_optiner->GetClass('posttype_form')->TrackSubmission( $form_id );
}

$form_code = $qodys_optiner->GetClass('posttype_list')->ParseFormCode( $list_custom, $_GET );
?>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
</head>
<body>

	<div style="display:none;">
		<?php echo $form_code; ?>
	</div>
	
	<script language="javascript" type="text/javascript">
	$(document).ready(function()
	{
		//$("input[name='<?php echo $list_custom['name_select']; ?>']").val("<?php echo $name; ?>");
		//$("input[name='<?php echo $list_custom['email_select']; ?>']").val("<?php echo $email; ?>");
		
		// Aweber field cleanup to avoid complications & popups
		$("input[name='meta_required']").val("email");
		$("form").attr("target", '_self');
		$("form").attr("onSubmit", '');
		
		// if the redirect value isn't in the form, add it
		if( !$("input[name='redirect']") )
			$('form').append( $("<input />").attr( 'name', 'redirect' ) );
		
		$("input[name='redirect']").val("http://google.com");
			
		// if the redirect onlist value isn't in the form, add it
		if( !$("input[name='meta_redirect_onlist']") )
			$('form').append( $("<input />").attr( 'name', 'meta_redirect_onlist' ) );
		
		$("input[name='meta_redirect_onlist']").val("http://google.com");
		
		// This removes an issue where a submit button is named "submit" and breaks the submission
		$("input[name='submit']").attr( 'name', 'custom_submit' );
		
		$('form').submit();
	});
	</script>
	
</body>
</html>