<?php
/*
Plugin Name: Sort SearchResult By Title
Plugin URI: http://www.php-developer.org/wordpress-sort-search-result-by-title-plug-in/
Description: Easy sorting of Wordpress Search Result by Title.
Version: 11.0
Author: Codex-m
Author URI: http://www.php-developer.org/
*/
if(!class_exists('Class_Sortsearchresults'))
{
	require_once('Class_Sortsearchresults.php');
}
if(!isset($Class_Sortsearchresults))
{
	$Class_Sortsearchresults = new Class_Sortsearchresults;
}
// Register deactivation hook
register_deactivation_hook(__FILE__, array( $Class_Sortsearchresults, 'sortresult_uninstall'));