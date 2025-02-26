<?php

/**************************************************************************
/*Bootstrap file for getting the ABSPATH constant to wp-load.php
/*This is requried when a plugin requires access not via the admin screen.
**************************************************************************/
$path  = ''; 
if ( !defined('WP_LOAD_PATH') ) {
    $classic_root = dirname(dirname(dirname(dirname(__FILE__)))) . '/' ;
    if (file_exists( $classic_root . 'wp-load.php') ) {
    	define( 'WP_LOAD_PATH', $classic_root);
	} else if (file_exists( $path . 'wp-load.php') ) {
    	define( 'WP_LOAD_PATH', $path);
	} else {
    	exit("Could not find wp-load.php");
	}
}

require_once( WP_LOAD_PATH . 'wp-load.php');

/**************************************************************************
/*Write XML Output
**************************************************************************/
header("content-type:text/xml;charset=utf-8");
echo '<?xml version="1.0" encoding="utf-8"?>'."\n";
echo '<config>'."\n";
echo buildNodes();
echo '</config>'."\n";
exit();

/**************************************************************************
/*Process XML Data
**************************************************************************/
function buildNodes() {
	global $wpdb;
	
	$_vid    = (int) $_GET['vid'];
	$_pid    = (int) $_GET['pid'];
	$video   = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."allvideogallery_videos WHERE id=".$_vid);
	$profile = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."allvideogallery_profiles WHERE id=".$_pid);
	
	if($video->type == 'url') $video->type = 'video';
	
	$node  = '';
	$node .= '<loop>'.castAsBoolean( $profile->loop ).'</loop>'."\n";
	$node .= '<autoStart>'.castAsBoolean( $profile->autostart ).'</autoStart>'."\n";
	$node .= '<buffer>'.$profile->buffer.'</buffer>'."\n";
	$node .= '<volumeLevel>'.$profile->volumelevel.'</volumeLevel>'."\n";
	$node .= '<stretch>'.$profile->stretch.'</stretch>'."\n";
	$node .= '<controlBar>'.castAsBoolean( $profile->controlbar ).'</controlBar>'."\n";
	$node .= '<playList>'.castAsBoolean( $profile->playlist ).'</playList>'."\n";
	$node .= '<durationDock>'.castAsBoolean( $profile->durationdock ).'</durationDock>'."\n";
	$node .= '<timerDock>'.castAsBoolean( $profile->timerdock ).'</timerDock>'."\n";		
	$node .= '<fullScreenDock>'.castAsBoolean( $profile->fullscreendock ).'</fullScreenDock>'."\n";
	$node .= '<hdDock>'.castAsBoolean( $profile->hddock ).'</hdDock>'."\n";
	$node .= '<embedDock>'.castAsBoolean( $profile->embeddock ).'</embedDock>'."\n";
	$node .= '<facebookDock>'.castAsBoolean( $profile->facebookdock ).'</facebookDock>'."\n";
	$node .= '<twitterDock>'.castAsBoolean( $profile->twitterdock ).'</twitterDock>'."\n";
	$node .= '<controlBarOutlineColor>'.$profile->controlbaroutlinecolor.'</controlBarOutlineColor>'."\n";
	$node .= '<controlBarBgColor>'.$profile->controlbarbgcolor.'</controlBarBgColor>'."\n";
	$node .= '<controlBarOverlayColor>'.$profile->controlbaroverlaycolor.'</controlBarOverlayColor>'."\n";
	$node .= '<controlBarOverlayAlpha>'.$profile->controlbaroverlayalpha.'</controlBarOverlayAlpha>'."\n";
	$node .= '<iconColor>'.$profile->iconcolor.'</iconColor>'."\n";
	$node .= '<progressBarBgColor>'.$profile->progressbarbgcolor.'</progressBarBgColor>'."\n";
	$node .= '<progressBarBufferColor>'.$profile->progressbarbuffercolor.'</progressBarBufferColor>'."\n";
	$node .= '<progressBarSeekColor>'.$profile->progressbarseekcolor.'</progressBarSeekColor>'."\n";
	$node .= '<volumeBarBgColor>'.$profile->volumebarbgcolor.'</volumeBarBgColor>'."\n";
	$node .= '<volumeBarSeekColor>'.$profile->volumebarseekcolor.'</volumeBarSeekColor>'."\n";
	$node .= '<playListBgColor>'.$profile->playlistbgcolor.'</playListBgColor>'."\n";
	$node .= '<type>'.$video->type.'</type>'."\n";
	$node .= '<preview>'.$video->preview.'</preview>'."\n";
	$node .= '<streamer>'.$video->streamer.'</streamer>'."\n";
	$node .= '<token>'.$video->token.'</token>'."\n";
	$node .= '<video>'.$video->video.'</video>'."\n";
	if($video->hd) {
		$node .= '<hd>'.$video->hd.'</hd>'."\n";
	}
	$node .= '<dvr>'.castAsBoolean( $video->dvr ).'</dvr>'."\n";
	$node .= '<license>Enter your Commercial License here...</license>'."\n";
	$node .= '<displayLogo>false</displayLogo>'."\n";
	$node .= '<logo>null</logo>'."\n";
	$node .= '<logoAlpha>0</logoAlpha>'."\n";
	$node .= '<logoPosition>bottomleft</logoPosition>'."\n";
	$node .= '<logoTarget>http://allvideogallery.mrvinoth.com/</logoTarget>'."\n";
	
	return $node;
}

function castAsBoolean($val){
	if($val == 1) {
    	return 'true';
	} else {
		return 'false';
	}
}

?>