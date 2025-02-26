<?php

/**************************************************************************
/*Bootstrap file for getting the ABSPATH constant to wp-load.php
/*This is requried when a plugin requires access not via the admin screen.
**************************************************************************/
$path  = ''; 
if ( !defined('WP_LOAD_PATH') ) {
    $classic_root = dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/' ;
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
echo '<playlist>'."\n";
echo buildNodes();
echo '</playlist>'."\n";
exit();

/**************************************************************************
/*Process XML Data
**************************************************************************/
function buildNodes() {
	global $wpdb;
	
	$_vid  = (int) $_GET['vid'];
	$video = $wpdb->get_row("SELECT * FROM " . $wpdb->prefix . "allvideogallery_videos WHERE id=" . $_vid);
	$items = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "allvideogallery_videos WHERE published=1 AND category='" . $video->category . "' AND id!=" . $_vid);
	$node  = '';
	
	$page  = urldecode( $_GET['page'] );
	$page  = str_replace('&amp;', '&', $page);
	
	for ($i = 0, $n = count($items); $i < $n; $i++) {
		$item = $items[$i];
		
		$node .= '<item>'."\n";
		$node .= '<thumb>'.$item->thumb.'</thumb>'."\n";
		$node .= '<title>'.$item->title.'</title>'."\n";
		$node .= '<link>'.@add_query_arg( "slg", $item->slug, $page ).'</link>'."\n";
		$node .= '</item>'."\n";
	}
	
	return $node;
}

?>