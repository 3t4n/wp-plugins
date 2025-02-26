<?php
ob_get_contents();
require_once( dirname(dirname(dirname(dirname(dirname(dirname(dirname(__FILE__))))))).'/wp-load.php' );
ob_end_clean();

$campaign_id = $_GET['p'];

$preset_id 		= $_GET['p'];
$preset_data	= get_post( $preset_id );
$preset_custom 	= $qodys_optiner->get_post_custom( $preset_id );
$list_ids		= maybe_unserialize( $preset_custom['list_id'] );

$form_id		= $preset_custom['form_id'];
$form_data		= get_post( $form_id );
$form_custom	= $qodys_optiner->get_post_custom( $form_id );

$social_triggers = maybe_unserialize( $qodys_optiner->get_option( 'social_triggers' ) );

if( $social_triggers )
{
	$fb_events = array();
	
	foreach( $social_triggers as $key => $value )
	{
		switch( $value )
		{
			case 'like': $fb_events[] = 'edge.create'; break;
			case 'send': $fb_events[] = 'message.send'; break;
			//case 'subscribe': $fb_events[] = 'edge.subscribe'; break;
			case 'comments': $fb_events[] = 'comment.create'; break;
		}
	}
}

$fields = array();
$fields['id'] = 'optiner-optin';
$fields['width'] = $form_custom['frame_width'] + 25;
$fields['height'] = $form_custom['frame_height'] + 25;
$fields['style'] = 'overflow:hidden;border:none;';
$fields['scrolling'] = 'no';
$fields['src'] = $qodys_optiner->GetClass('posttype_form')->GetAsset( 'includes', 'optin_iframe', 'url' ).'?p='.$preset_id;

$frame_embed .= '<iframe';

foreach( $fields as $key => $value )
{
	$frame_embed .= ' '.$key.'="'.$value.'"';
}

$frame_embed .= '></iframe>';
$assets = $qodys_optiner->GetOverseer()->GetAssets();
//$qodys_optiner->ItemDebug( $assets );
?>
<?php //ob_start( array( $qodys_framework, "JavascriptCompress" ) ); ?>
<?php header("Content-type:text/javascript"); ?>
<?php include( $assets['includes']['tinybox']['tinybox']['container_dir'].'/'.$assets['includes']['tinybox']['tinybox']['file_name'] ); ?>

function CustomIncludeStylesheet(p_file) {
	var v_css  = document.createElement('link');
	v_css.rel = 'stylesheet'
	v_css.type = 'text/css';
	v_css.href = p_file;
	document.getElementsByTagName('head')[0].appendChild(v_css);
}

CustomIncludeStylesheet( '<?php echo $assets['includes']['tinybox']['style']['container_link'].'/'.$assets['includes']['tinybox']['style']['file_name']; ?>' );

function PopupOptinerStuff()
{
	var the_content = '<?php echo $frame_embed; ?>';
	
	var ajax_content = 0;
	var the_width = <?php echo $form_custom['frame_width'] + 25; ?>;
	var the_height = <?php echo $form_custom['frame_height'] + 25; ?>;
	var autoclose_duration = 1;
	
	TINY.box.show( the_content, ajax_content, the_width, the_height, autoclose_duration )

}

document.write( '<div id="fb-root"></div>' );

// Load the SDK Asynchronously
(function(d){
	var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
	js = d.createElement('script'); js.id = id; js.async = true;
	js.src = "//connect.facebook.net/en_US/all.js";
	d.getElementsByTagName('head')[0].appendChild(js);
}(document));

window.fbAsyncInit = function()
{
	if( document.getElementById('fb-root') )
	{
		FB.init({
		  appId  : '<?php echo $qodys_optiner->get_option( 'fb_app_id' ); ?>',
		  status : true, // check login status
		  cookie : true, // enable cookies to allow the server to access the session
		  xfbml  : true  // parse XFBML
		});
	}
	
	/* All the events registered */
	<?php
	if( $fb_events )
	{
		foreach( $fb_events as $key => $value )
		{ ?>
    FB.Event.subscribe('<?php echo $value; ?>', function(response)
	{
		PopupOptinerStuff();
	}
);
		<?php
		}
	} ?>
};


