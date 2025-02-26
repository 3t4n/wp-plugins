<?php
/*
Plugin Name: DQ Bandcamp Library
Plugin URI: http://www.disposablequalities.com/bandcamplibraryplugin
Description: Add Bandcamp URLs to a WordPress database for displaying on a custom page with an updatable embedded player, like a music library.
Version: 1.5
Author: Paul Johnson
Author URI: http://www.disposablequalities.com
Licence: GPL2
License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html

Copyright 2012  PAUL JOHNSON  (email : dispoablequalities@gmail.com)

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License, version 2, as 
	published by the Free Software Foundation.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

  class dq_bandcamplibrary {
	// table name used in the wpdb for this plugin
	const DQ_BANDCAMP_TABLE = "dq_bandcamplib";
	
	// default album variables to empty strings
	public $url = "";
	public $albumId = "";
	public $title = "";
	public $artist = "";
	public $albumType = "";
	public $thumbnail = "";
	
	// setup the plugin for use
	public function __construct() {
	  global $wpdb;
	  if($wpdb->get_var("show tables like '".self::DQ_BANDCAMP_TABLE."'") != self::DQ_BANDCAMP_TABLE) {
		self::dqbcl_createtable();
	  }
	  self::dqbcl_copytemplatefile();

	  add_action('admin_menu',array($this,'dqbcl_adminmenu'));
	}
	
	// Return the page slug option value, set it to a default if not set (implemented v1.1)
	function dqbcl_pageslug() {
	  $slug = get_option('dqbcl_slug');
	  
	  if($slug == false) {
	    update_option('dqbcl_slug', "bandcamplib");
	  }
	  
	  return $slug;
	}
	
	// Copies the template file to the active template directory to simplify installation (implemented v1.1)
	// Returns a string for the outcome of the function (file exists, file copied, file copy failed)
	function dqbcl_copytemplatefile() {
	  $pageslug = $this->dqbcl_pageslug();
	  $old = plugin_dir_path(__FILE__)."page-bandcamplib.php";
	  $new = get_template_directory()."/page-".$pageslug.".php";
	  
	  $return = "copied";
	  if(!file_exists($new)) {
	    if(!copy($old, $new)) {
		  $return = "failed";
		}
	  } else {
	    $return = "exists";
	  }
	  
	  return $return;
	}
	
	// Hook the plugin into the admin menu
	function dqbcl_adminmenu() {
	  add_menu_page('Bandcamp Library','Bandcamp Lib','read','dqbclmenu',array($this,'dqbcl_adminmenu_all'));
	}
	
	// Include an admin panel page
	function dqbcl_adminmenu_all() {
	  include('dqbandcamplibrary_all.php');
	}
	
	// Create necessary table in Wordpress DB
	function dqbcl_createtable() {
	  $sql = "CREATE TABLE ".self::DQ_BANDCAMP_TABLE." (
		AlbumID varchar(20) NOT NULL,
		URL varchar(500) NOT NULL,
		Title varchar(250) NOT NULL,
		Artist varchar(250) NULL,
		PageType varchar(1) NOT NULL,
		Thumbnail varchar(500) NULL,
		PRIMARY KEY(AlbumID)
		);";
		
	  require_once(ABSPATH.'wp-admin/includes/upgrade.php');
	  dbDelta($sql);
	}
	
	// SQL to insert an album to the table
	function dqbcl_insert() {
	  global $wpdb;
	  $wpdb->insert_id;
	  $wpdb->insert(self::DQ_BANDCAMP_TABLE,
		array(
		  'AlbumID'=>$this->albumId,
		  'URL'=>$this->url,
		  'Title'=>$this->title,
		  'Artist'=>$this->artist,
		  'PageType'=>$this->albumType,
		  'Thumbnail'=>$this->thumbnail
		)
	  );
	}
	
	// Loop through list of new items and add them to the table
	function dqbcl_NewItem() {
	  // Initialize an empty string as a return value
	  $results = "";
	  
	  // Create an array of urls based on textarea line breaks
	  $lines = explode("\n", strip_tags($_POST['dqbcl_url']));
	  
	  for($line=0;$line<=count($lines)-1;$line++) {
		// Ignore blank lines
		if(trim($lines[$line]) != "") {
		  $this->url = trim($lines[$line]);
		  
		  // I don't get regex notation, this tests a url begins with [www.]site.bandcamp.com
		  $parts=explode(".",$this->url);
		  if(($parts[0] == "bandcamp" && substr($parts[1],0,3) == "com") || ($parts[1] == "bandcamp" && substr($parts[2],0,3) == "com")) {
  			// Read url data to get album details
			$this->dqbcl_getalbumspecifics();
			
			// Save values to database
			self::dqbcl_insert();
		  } else {
			// Add the 'bad' url formatted as a list item to the return value
			$results .= "	<li>".urlencode($this->url)."</li>\n";
		  }	// url should start with [site].bandcamp.com
		}	// ignore blank lines
	  }		// loop lines
	  
	  return $results;
	}
	
	// Loop through a list of album IDs and delete them from the table 
	function dqbcl_delete($albumids) {
	  global $wpdb;
	  // Initialize the return value as an empty string
	  $urls = "";
	  // Create an array of IDs by splitting on a bar (|) delimiter
	  $ids = explode("|",$albumids);
	  
	  foreach($ids as $albumid) {
		if(trim($albumid) != "") {
		  // Get the url for the current ID
		  $sql = $wpdb->prepare("select url from ".self::DQ_BANDCAMP_TABLE." where albumid='%s' LIMIT 0,1;",$albumid);
		  $result = $wpdb->get_row($sql);
		  // Add the url to the return value as a list item
		  $urls .= "	<li><a href='".$result->url."'>".$result->url."</a></li>\n";
	  
		  // Perform the delete
		  $delete = $wpdb->prepare("delete from ".self::DQ_BANDCAMP_TABLE." where albumid='%s';",$albumid);
		  $wpdb->query($delete);
		}
	  }
	  
	  return $urls;
	}
	
	// Scrape the current url for meta tag contents
	// Needs refactoring
	function dqbcl_getalbumspecifics() {
	  // cURL code from http://stackoverflow.com/a/819195
	  $c = curl_init($this->url);
	  curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
	  $html = curl_exec($c);
	  if (curl_error($c))
		die(curl_error($c));
	  $status = curl_getinfo($c, CURLINFO_HTTP_CODE);
	  curl_close($c);
	  
	  // Initialize temporary variables as empty strings
	  $title = ""; 
	  $albumType = "";
	  $albumId = "";
	  $artist = "";
	  $thumb = "";
	  
	  // Create an array of meta tags (ish)
	  $tags = explode("<meta ",$html);
	  for($tag=0;$tag<=count($tags)-1;$tag++){
		// The relevant meta tags have property and content attributes
		if(substr($tags[$tag],0, 9) == "property=") {
		  $pair = explode("content=", $tags[$tag]);
		  if(count($pair) == 2) {
			// Strip the opening quote, closing tag from the content string
			$content = substr(trim($pair[1]),1,-4); 
			switch(trim($pair[0])) {
			  case "property=\"og:title\"":		// album title
				$title = $content;
				break;
			  case "property=\"og:type\"":		// page type: album or track
				if($content == "album") {
				  $albumType = 0;
				} else {
				  $albumType = 1;
				}
				break;
			  case "property=\"og:site_name\"":	// site name (usually artist name)
				$artist = $content;
				break;
			  case "property=\"og:video\"":		// the url for the embedded player to load, provides the album ID for our purposes
				// Again, I don't understand regex so this extracts the track= or album= value from a url
				$urlparts = explode("/",$content);
				for ($urlpart=0; $urlpart<=count($urlparts)-1; $urlpart++) {
				  $track = strpos($urlparts[$urlpart], "track=");
				  $album = strpos($urlparts[$urlpart], "album=");
				  if($track !== false || $album !== false) {
					$albumId = substr($urlparts[$urlpart], 6, strlen($urlparts[$urlpart]));
				  }
				}
				break;
			  case "property=\"og:image\"":		// the url for the thumbnail image
				$thumb = $content;
				break;
			  default:
				// Check if all values have been filled and exit the loop prematurely if so
				if($title!="" && $artist != "" && $albumType != "" && $albumId != "" && $thumb != "") {
				  $tag = count($tags) + 1;
				}
				break;
			} 	// switch property
		  }  	// pair of 2
		} 		// substr = property
	  } 		// for
	  
	  // Remove the "by Artist" text from the title
	  $parts = explode(", by ", $title);
	  if(count($parts)>=2) {
		$title = substr($title, 0, -(5+strlen($parts[count($parts)-1])));
	  }
	  
	  // Assign the class variables the temp variable values
	  $this->albumId = $albumId;
	  $this->artist = $artist;
	  $this->title = $title; 
	  $this->albumType = $albumType;
	  $this->thumbnail = $thumb;
	}
	
	// Select library items and return in an array
	// Allow custom order of results
	function dqbcl_libraryitems($order="title",$direction="asc") {
	  global $wpdb;
	  
	  // Prepare order parameters
	  $direction = ($direction == "asc" || $direction == "desc") ? $direction : "asc";
	  if(!in_array($order, array("title","artist","albumid","url","pagetype","thumbnail","albumid"))){
		$order = "title";
	  } 
	
	  // Select the results using the prepared order variables
	  $sql = "SELECT title, artist,albumid,url,pagetype,thumbnail,albumid FROM ".self::DQ_BANDCAMP_TABLE." ORDER BY ".$order." ".$direction.";";
	  $sqlResults = $wpdb->get_results($sql);
	  
	  // Create an array of the SQL results
	  $output = null;
	  foreach($sqlResults as $result) {
		$output[] = array($result->title,$result->artist,$result->albumid,$result->url,$result->pagetype,$result->thumbnail,$result->albumid);
	  }	  
	  
	  return $output;
	}
  }
  
  $dqBandcampLib = new dq_bandcamplibrary();
?>