<?php
/**
 * Plugin Name: Nepali Media
 * Plugin URI: #
 * Description: List of popular/registered Nepali media websites. Important: You will need SQLite3 database extension.
 * Author: Bimal Poudel
 * Version: 1.0.0
 * Author URI: http://bimal.org.np/
 */

if(!defined("ABSPATH")) die();
defined("NEPALI_MEDIA_DIRECTORY")||define("NEPALI_MEDIA_DIRECTORY", dirname(__FILE__));

class nepali_media
{
	public function display_media_websites()
	{
		require_once "media_websites.php";
	}

	public function admin_menu()
	{
		$icon = "dashicons-playlist-video";
		add_menu_page("Nepali Media", "Nepali Media", "read", "nepali-media/nepali-media.php", array($this, "display_media_websites"), $icon, 81 );
	}

	public function media_name($name="", $url="https://")
	{
		if(!$name)
		{
			$name = $url;
			$name = preg_replace("/^https?\:\/\//is", "", $name);
			$name = preg_replace("/\/$/is", "", $name);
			$name = preg_replace("/\.np$/is", "", $name);
			$name = preg_replace("/\.com$/is", "", $name);
			$name = preg_replace("/^www\./is", "", $name);
			$name = ucfirst($name);
		}

		return $name;
	}
}

$nm = new nepali_media();
add_action("admin_menu", array($nm, "admin_menu"));
