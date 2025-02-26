<?php
/**
 * @package Amitabh Bachchan Songs
 * @version 1.1
 */
/*
/*
Plugin Name: Amitabh Bachchan Songs
Plugin URI: http://www.wordpress.org/plugins/amitabh-bachchan-songs/
Version: 1.1
Description: This plugin shows random songs of Mr. Amitabh Bachchan in WP admin panel. Mr. Bachchan is an Indian film actor, film producer, television host, occasional playback singer and former politician. He first gained popularity in the early 1970s for films such as Zanjeer, Deewaar and Sholay, and was dubbed India's "angry young man" for his on-screen roles in Bollywood.
License: GPLv2 or later
Author: Rajesh Vyas
Author URI: https://www.linkedin.com/in/rajeshkvyas/
*/

if(!function_exists('plugin_amitabhbachchansongs_song'))
{
	function plugin_amitabhbachchansongs_song()
	{

		$arrSongs[] = 'O Saathi Re... / Muqaddar Ka Sikandar / 1978';
		$arrSongs[] = 'Say "shava Shava"... / Kabhi Khushi Kabhie Gham /  2001';
		$arrSongs[] = 'Khaike Paan Banaras Wala... / Don / 1978';
		$arrSongs[] = 'Neela Aasman So Gaya... / Silsila / 1981';
		$arrSongs[] = 'Main Yahan Tu Wahan... / Baghban / 2003';
		$arrSongs[] = 'Holi Khele Raghuveera... / Baghban / 2003';
		$arrSongs[] = 'Apni To Jaise Taise... / Laawaris / 1981';
		$arrSongs[] = 'Jahan Teri Ye Nazar Hai... / Kaalia / 1981';
		$arrSongs[] = 'Mach Gaya Shor... / Khud-daar / 1982';
		$arrSongs[] = 'Aaj Rapat Jaayen To... / Namak Halaal / 1982';
		$arrSongs[] = 'Yeh Mera Dil Yaar Ka Diwana... / Don / 1978';
		$arrSongs[] = 'My Name Is Anthony Gonsalves... / Amar Akbar Anthony / 1977';
		$arrSongs[] = 'Ye Dosti Hum Nahi Chhodenge... / Sholay / 1975';
		$arrSongs[] = 'Choo Kar Mere Man Ko Kiya Tune Kya Ishara... / Yaarana / 1981';
		$arrSongs[] = 'Tere Jaisa Yaar Kahan Kahan Aisa Yaarana...  / Yaarana / 1981';
		$arrSongs[] = 'Sara Zamana Hasino Ka Deewana... / Yaarana / 1981';

		$picked_song = $arrSongs[rand(0,count($arrSongs)-1)];

		echo "<p id='ab_songs'>".$picked_song."</p>";

	}
}

if(!function_exists('plugin_amitabhbachchansongs_css'))
{
	function plugin_amitabhbachchansongs_css()
	{
		echo "
		<style type='text/css'>
			#ab_songs
			{
				float: right;
				background-color:orange;
				border-radius:5px;
				margin: 1px;
				padding: 4px;
			}
		</style>
		";
	}
}

if(function_exists('plugin_amitabhbachchansongs_css'))
	add_action('admin_head','plugin_amitabhbachchansongs_css');
if(function_exists('plugin_amitabhbachchansongs_song'))
	add_action('admin_notices','plugin_amitabhbachchansongs_song');
