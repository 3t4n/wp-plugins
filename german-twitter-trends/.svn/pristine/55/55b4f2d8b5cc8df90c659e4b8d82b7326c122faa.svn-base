<?php
/*
Plugin Name: German Twitter-Trends
Plugin URI: http://www.twitter-trends.de/wordpress-plugin/
Description: German Twitter-Trends
Author: Marco Verch - @wuestenigel
Version: 1.0
Author URI: http://www.wuestenigel.com
*/
function printTwitterTrends($maxTrends=8) {
	
$filename = WP_CONTENT_DIR."/cache/trends.xml";
$url = "http://www.twitter-trends.de/trends.xml";
$cacheTime = 7200; // seconds
if (!cachecheck($filename, $cacheTime)) {
	            $data = file_get_contents($url);
	            $fp = fopen($filename, "w");
	            fputs($fp, $data);
	            fclose($fp	);
	      }
	
	if (!($xml = simplexml_load_file($filename)))  $trends  = array ();
	else $trends = $xml->xpath('/deutsche_twitter_trends/latest_trends/trend');
	$r = rand(1,$maxTrends);
	if (count($trends)>0) {
		$i = 0;
		echo "<ul>";
		foreach ($trends as $trend) 
		{
			if (($i++)>=$maxTrends) break;
			echo "<li><a title=\"Twitter ".$trend["label"]."\" href=\"http://www.twitter-trends.de/trend/".$trend["label"].".html\" target=\"_blank\">#".$trend["label"]."</a></li>";
			//echo "<li><a title=\"Twitter ".$trend["label"]."\" rel=\"nofollow\" href=\"http://search.twitter.com/search?q=".$trend["label"]."&lang=de\" target=\"_blank\">#".$trend["label"]."</a></li>";		
		}
		echo "</ul>";
	}
}     
function widget_twitterTrends($args) {
	extract($args);
	$options = get_option('widget_twitterTrends');
	$title = $options['title'];  
	$maxtTrends = $options['max']; 
	echo $before_widget . $before_title . $title . $after_title;
	printTwitterTrends($maxtTrends); 	
	echo $after_widget;
	
}

function twitterTrends_init()
{
  	if (function_exists('register_sidebar_widget') )
		register_sidebar_widget(__('Twitter Trends'), 'widget_twitterTrends');    
	if (function_exists('register_widget_control') )
		register_widget_control(array('Twitter Trends', 'widgets'), 'widget_twitterTrends_control', 300, 200);
}


function widget_twitterTrends_control() {
 
		// Get options
		$options = get_option('widget_twitterTrends');
		// options exist? if not set defaults
		if ( !is_array($options) )
			$options = array('title'=>'Twitter Trends', 'max'=>'8');
    	// form posted?
		if ( $_POST['twitterTrends-submit'] ) {
			// Remember to sanitize and format use input appropriately.
			$options['title'] = strip_tags(stripslashes($_POST['twitterTrends-title']));
			$options['max'] = strip_tags(stripslashes($_POST['twitterTrends-max']));			
			update_option('widget_twitterTrends', $options);
		}		
		// Get options for form fields to show
		$title = htmlspecialchars($options['title'], ENT_QUOTES);
		$max = htmlspecialchars($options['max'], ENT_QUOTES);
		// The form fields
		echo '<p style="text-align:right;">
				<label for="twitterTrends-title">' . __('Title:') . '
				<input style="width: 200px;" id="twitterTrends-title" name="twitterTrends-title" type="text" value="'.$title.'" />
				</label></p>';
		echo '<p style="text-align:right;">
				<label for="twitterTrends-max">' . __('Number of trends:') . '
				<input style="width: 200px;" id="twitterTrends-max" name="twitterTrends-max" type="text" value="'.$max.'" />
				</label></p>';	
		echo '<input type="hidden" id="twitterTrends-submit" name="twitterTrends-submit" value="1" />';
	}

	
add_action("plugins_loaded", "twitterTrends_init");
add_action("widgets_init", "twitterTrends_init");


function cachecheck($filename_cache, $timeout = 3600)
{        
        if (file_exists($filename_cache)) return (mktime() - filemtime($filename_cache) < $timeout)? true : false;
        else return false;
}


?>
