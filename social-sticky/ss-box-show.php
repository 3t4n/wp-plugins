<?php

// Define plugin url
define( 'WPSIW_PLUGIN_URL' , plugins_url( '/', __FILE__ ) );
$plugin_url = WPSIW_PLUGIN_URL ;

// Get correct image following Left or Right social.
if ( $effect_social == 'FaceBook' )
	$img_url = vsprintf( "%s%s", array ( $plugin_url, "img/fb.png" ) );
else if ( $effect_social == 'Google+' )	
	$img_url = vsprintf( "%s%s", array ( $plugin_url, "img/gg.png" ) );
else if ( $effect_social == 'Twitter' )	
	$img_url = vsprintf( "%s%s", array ( $plugin_url, "img/tw.png" ) );

// Show Effect following Left or Right effect type.
if ( $effect_type == 'ArcOut' )
{
	include 'ss-box-show-effect-arc-out.php' ;
}
else if ( $effect_type == 'ArcIn' )
{
	include 'ss-box-show-effect-arc-in.php' ;
}
else if ( $effect_type == 'TriangleCorner' )
{
	include 'ss-box-show-effect-triangle-corner.php' ;
}

// Show social box following Left or Right Social type.	
if ( $effect_social == 'FaceBook' )
	include 'ss-box-show-FBLikeBox-corner.php' ;
else if ( $effect_social == 'Google+' )
	include 'ss-box-show-GGLikeBox-corner.php' ;
else if ( $effect_social == 'Twitter' )
	include 'ss-box-show-TWLikeBox-corner.php' ;
?>