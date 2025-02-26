<?php
require_once( dirname(dirname(dirname(dirname(dirname(dirname(dirname(__FILE__))))))).'/wp-load.php' );

$demo 			= $_GET['d'];

$preset_id 		= $_GET['p'];

if( $preset_id )
{
	$preset_data	= get_post( $preset_id );
	$preset_custom 	= $qodys_optiner->GetClass('posttype_form-preset')->get_post_custom( $preset_id );
	$list_ids		= maybe_unserialize( $preset_custom['list_id'] );
}

$form_id		= $_GET['f'] ? $_GET['f'] : $preset_custom['form_id'];
$form_data		= get_post( $form_id );
$custom			= $qodys_optiner->GetClass('posttype_form')->get_post_custom( $form_id );

$fields = array();
$fields['client_id'] = $qodys_optiner->get_option( 'fb_app_id' );
$fields['redirect_uri'] = $redirect_uri = $qodys_optiner->GetOverseer()->GetAsset( 'forms', 'fb_oauth_return', 'url' ).'?p='.$preset_id;
$fields['scope'] = 'email';
$fields['display'] = 'popup';

$fb_url = 'https://www.facebook.com/dialog/oauth?'.http_build_query( $fields );

$container_width = 320;
$register_width = $container_width - 30;

if( !$custom['facebook_connect_image'] )
	$custom['facebook_connect_image'] = $qodys_optiner->GetClass('posttype_form')->GetAsset( 'images', 'fb-button', 'url' );

if( $custom['qody_post_2_thumbnail_id'] )
{
	$imageData = wp_get_attachment_image_src( $custom['qody_post_2_thumbnail_id'], $qodys_optiner->GetPre().'product_image' );
	
	if( $imageData )
		$product_image = $imageData[0];
}

if( $custom['qody_post_3_thumbnail_id'] )
{
	$imageData = wp_get_attachment_image_src( $custom['qody_post_3_thumbnail_id'], $qodys_optiner->GetPre().'product_image' );
	
	if( $imageData )
		$submit_button_image = $imageData[0];
}

//$qodys_optiner->ItemDebug( $custom );
if( !$demo )
{
	$qodys_optiner->GetClass('posttype_form')->TrackImpression( $form_id );
}
$inputs = maybe_unserialize( $custom['inputs'] );

if( $inputs && is_array( $inputs ) )
	$inputs = array_values( $inputs );

$form_action = $qodys_optiner->GetOverseer()->GetAsset( 'includes', 'share', 'url' ).'?p='.$preset_id;

$name_input = 'optiner_name';
$email_input = 'optiner_email';
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php wp_title(''); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/overcast/jquery-ui.css" media="screen" rel="stylesheet" type="text/css">
	
	<link rel="stylesheet" href="<?php echo $qodys_optiner->GetRegisteredSrc('bootstrap'); ?>">
	
	<?php $qodys_optiner->GetClass('posttype_form')->PrintPopupStyles(); ?>
	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js"></script>
	<script type="text/javascript">
	
	var the_radio_set = '#the_radio_buttons';

	function ResetContentViews()
	{
		$('.item').hide();
			
		var selected_slug = $(the_radio_set).find( 'input[name=fancy_radio_item]:checked' ).val();
		
		$( '#' + selected_slug + '_container' ).show();
	}
	
	$(document).ready( function(e)
	{
		$(the_radio_set).buttonset();
	
		ResetContentViews();
	
		$(the_radio_set).change( function()
		{
			ResetContentViews();
		})
		
		if(!$.support.placeholder) { 
			//var active = document.activeElement;
			$(':text').focus(function () {
				if ($(this).attr('placeholder') != '' && $(this).val() == $(this).attr('placeholder')) {
					$(this).val('').removeClass('hasPlaceholder');
				}
			}).blur(function () {
				if ($(this).attr('placeholder') != '' && ($(this).val() == '' || $(this).val() == $(this).attr('placeholder'))) {
					$(this).val($(this).attr('placeholder')).addClass('hasPlaceholder');
				}
			});
			$(':text').blur();
			//$(active).focus();
			$('form').submit(function () {
				$(this).find('.hasPlaceholder').each(function() { $(this).val(''); });
			});
		}
		
	});
	</script>

</head>
<body>
	
	<div id="fb-root"></div>
	
	<script>
	window.fbAsyncInit = function() {
		FB.init({
		  appId  : '<?php echo $qodys_optiner->get_option( 'fb_app_id' ); ?>',
		  status : true, // check login status
		  cookie : true, // enable cookies to allow the server to access the session
		  xfbml  : true  // parse XFBML
		});
	};
	
	// Load the SDK Asynchronously
	(function(d){
		var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
		js = d.createElement('script'); js.id = id; js.async = true;
		js.src = "//connect.facebook.net/en_US/all.js";
		d.getElementsByTagName('head')[0].appendChild(js);
	}(document));
	
	function DoFacebookLogin()
	{
		var newWindow = NewPopupWindow( '<?php echo $fb_url; ?>', 'Login_by_facebook' );
		
		if( window.focus )
		{
			newWindow.focus()
		}
		
		return false;
	}
	
	var newwindow;

	function NewPopupWindow( url, name )
	{
		var  screenX    = typeof window.screenX != 'undefined' ? window.screenX : window.screenLeft,
			 screenY    = typeof window.screenY != 'undefined' ? window.screenY : window.screenTop,
			 outerWidth = typeof window.outerWidth != 'undefined' ? window.outerWidth : document.body.clientWidth,
			 outerHeight = typeof window.outerHeight != 'undefined' ? window.outerHeight : (document.body.clientHeight - 22),
			 width    = 500,
			 height   = 270,
			 left     = parseInt(screenX + ((outerWidth - width) / 2), 10),
			 top      = parseInt(screenY + ((outerHeight - height) / 2.5), 10),
			 features = (
				'width=' + width +
				',height=' + height +
				',left=' + left +
				',top=' + top
			  );
	
		newWindow = window.open( url, name, features );
		
		return newWindow;
	}
	
	function CalculateColorLuminance(hex, lum) {
		// validate hex string
		hex = String(hex).replace(/[^0-9a-f]/gi, '');
		if (hex.length < 6) {
			hex = hex[0]+hex[0]+hex[1]+hex[1]+hex[2]+hex[2];
		}
		lum = lum || 0;
		// convert to decimal and change luminosity
		var rgb = "#", c, i;
		for (i = 0; i < 3; i++) {
			c = parseInt(hex.substr(i*2,2), 16);
			c = Math.round(Math.min(Math.max(0, c + (c * lum)), 255)).toString(16);
			rgb += ("00"+c).substr(c.length);
		}
		return rgb;
	}
	
	function ChangeSubmitButtonGradient( to_color )
	{
		var from_color = CalculateColorLuminance( to_color, 0.2 );
		
		jQuery('#odin_submit_button').css( 'background-color', to_color );
		jQuery('#odin_submit_button').css( 'background-repeat', 'repeat-x' );
		
		jQuery('#odin_submit_button').css( 'background-image', '-khtml-gradient(linear, left top, left bottom, from(' + from_color + '), to(' + to_color + '))' );
		jQuery('#odin_submit_button').css( 'background-image', '-ms-linear-gradient(top,' + from_color + ', ' + to_color + ')' );
		jQuery('#odin_submit_button').css( 'background-image', '-moz-linear-gradient(top,' + from_color + ', ' + to_color + ')' );
		jQuery('#odin_submit_button').css( 'background-image', '-o-linear-gradient(top,' + from_color + ', ' + to_color + ')' );
		jQuery('#odin_submit_button').css( 'background-image', '-webkit-gradient(-webkit-gradient(linear, left top, left bottom, color-stop(0%, ' + from_color + '), color-stop(100%, ' + to_color + ')' );
		jQuery('#odin_submit_button').css( 'background-image', '-webkit-linear-gradient(top,' + from_color + ', ' + to_color + ')' );
		jQuery('#odin_submit_button').css( 'background-image', 'linear-gradient(top,' + from_color + ', ' + to_color + ')' );
		
		jQuery('#odin_submit_button').css( 'border-color', to_color + ' ' + to_color + ' ' + from_color );
		jQuery('#odin_submit_button').css( 'border-color', 'rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25)' );
	}
	
	jQuery(document).ready( function()
	{
		/*jQuery( '.defaultText' ).live( "focus", function(e)
		{		
			if( jQuery(this).val() == jQuery(this)[0].title)
			{
				jQuery(this).removeClass("defaultTextActive");
				jQuery(this).val("");
			}
		} );
		
		jQuery( '.defaultText' ).live( "blur", function(e)
		{		
			if( jQuery(this).val() == "")
			{
				jQuery(this).addClass("defaultTextActive");
				jQuery(this).val(jQuery(this)[0].title);
			}
		} );*/
		
		ChangeSubmitButtonGradient( '<?php echo $custom['submit_button_background_color']; ?>' );
		
		<?php
		if( $demo == 1 )
		{ ?>
		jQuery('form').submit( function(e) {
			return false;
		} );
		<?php			
		} ?>
		
		//jQuery( '.defaultText' ).blur();
	} );
	</script>
	
	<style>
	<?php echo $custom['custom_style']; ?>
	</style>
	
	<div class="optiner-popup <?php echo $custom['optin_theme']; ?>">
		
		<div class="header_text">
			<?php echo $custom['header_text']; ?>
		</div>
		
		<div class="product_image">
			<img src="<?php echo $product_image; ?>">
		</div>
					
		<div id="main_container">
			
			<div class="secondary_text">
				<?php echo $custom['secondary_text']; ?>
			</div>
			
			<div id="traditional_form">
				<form id="the_traditional_form" method="get" action="<?php echo $form_action; ?>" class="form-stacked" target="_top">
					
					<input type="hidden" name="p" value="<?php echo $preset_id; ?>">
					
					<?php
					foreach( $_GET as $key => $value )
					{
						switch( $key )
						{
							case 'f':
							case 'p':
								
								break;
							
							default:
								
								echo '<input type="hidden" name="'.$key.'" value="'.$value.'">';
								
								break;
						}
					} ?>
					
					<div id="input_container">
					<?php
					if( $inputs && is_array( $inputs ) )
					{
						foreach( $inputs as $key => $value )
						{
							if( !is_array( $value['fields'] ) )
								$value['fields'] = array( $value['fields'] ); ?>
						<div class="clearfix input_container">
							
							<!--<label id="label-for-input-<?php echo $key; ?>" for="input-<?php echo $key; ?>"><?php echo $value['label']; ?></label>-->
							
							<div class="input">
								<input id="input-<?php echo $key; ?>" name="<?php echo urlencode( implode( ',', $value['fields'] ) ); ?>" placeholder="<?php echo $value['label']; ?>" size="30" type="text">
								<div style="clear:both;"></div>
							</div>
						</div>
						<?php
						}
					} ?>
					</div>
					
					<table class="button_center_clutch" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<input id="custom_submit_button" type="image" src="<?php echo $submit_button_image; ?>">
								<button id="odin_submit_button" type="submit" class="btn massive custom"><?php echo $custom['submit_button_text']; ?></button>
							</td>
						</tr>
					</table>
					
					<div style="clear:both;"></div>
					
				</form>
			</div>
			<div id="odin_form">
				<div id="the_radio_buttons">
					
				<?php
				$iter = 0;
				
				$fields = array();
				$fields['fb_connect'] = 'Connect';
				$fields['fb_register'] = 'Submit';
				//$fields['google'] = 'Google';
				//$fields['manual'] = 'Manual';
				
				foreach( $fields as $key => $value )
				{
					$iter++;
					
					if( $iter == 1 )
						$checked = 'checked="checked"';
					else
						$checked = ''; ?>
					<label for="<?php echo $key; ?>_radio"><?php echo $value; ?></label>
					<input type="radio" <?php echo $checked; ?> id="<?php echo $key; ?>_radio" name="fancy_radio_item" value="<?php echo $key; ?>" />
				<?php
				} ?>
			
				</div>
				
				<div id="content_containers">
					
				<?php
				foreach( $fields as $key => $value )
				{ ?>
					<div id="<?php echo $key; ?>_container" class="item">
					<?php
					switch( $key )
					{
						case 'fb_connect': ?>
						
						<!-- start -->
						<div style="margin-bottom:10px;">
							<a onClick="<?php if( $demo ) echo ''; else echo 'DoFacebookLogin();'; ?>" href="#">
								<img class="facebook_connect_image" src="<?php echo $custom['facebook_connect_image']; ?>">
							</a>
						</div>
						
						<div class="connect_extra"><?php echo $custom['connect_extra']; ?></div>
						<!-- end -->
						
							<?php
							break;
							
						case 'fb_register':
							
							if( $demo )
							{ ?>
							<img src="<?php echo $qodys_optiner->GetOverseer()->GetAsset( 'images', 'fb-register-preview', 'url' ); ?>">
							<?php
							}
							else if( !$qodys_optiner->get_option( 'fb_app_id' ) )
							{
								echo 'You must <a href="'.admin_url( 'admin.php?page='.$qodys_optiner->GetPre().'-facebook.php' ).'">specify a Facebook Application ID</a> for this tab to work';
							}
							else
							{ ?>
						<!-- start -->
						<fb:registration 
						  fields="name,email" 
						  redirect-uri="<?php echo $redirect_uri; ?>"
						  width="<?php echo $register_width; ?>">
						</fb:registration>
						<!-- end -->
							
							<?php
							}
							break;
							
						case 'manual':
							
							echo $value;
							
							break;
					} ?>
					</div>
				<?php
				} ?>
					
				</div>
				
			<!-- end odin_form -->
			</div>
		
			<div style="clear:both;"></div>
			
			<div class="privacy_text"><?php echo $custom['privacy_text']; ?></div>
		
		</div>
	
		<div style="clear:both;"></div>
		
	</div>
	
	
	<?php //ItemDebug( $custom ); ?>
	
	
	
	
	
</body>
</html>