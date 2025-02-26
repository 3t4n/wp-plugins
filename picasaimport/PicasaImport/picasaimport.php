<?php
/*
Plugin Name: PicasaImport
Plugin URI: http://bueltge.de/wp-picasaimport-plugin/448/
Description: List a RSS-Feed from Picasa-Web-Albums in your WP-Blog.
Author: Frank Bueltge
Version: 0.4
License: GPL
Author URI: http://bueltge.de
*/ 

/************************************************************************************************************************* 
INSTRUCTIONS
1. copy the plugin in your plugin-folder (/wp-content/plugins/)
2. activate the plugin in the backend of WordPress
3. create a new page or post with php-code 
   (this only possiblity with php-plugin, example: Exec-PHP(http://bluesome.net/post/2005/08/18/50/))
   the code in the page/post is: 
   <?php picasaimport($display, $url); ?>
   $display = How any entry?
   $url = URL of the Picasa-Web-Album-Feed
   Example: 
   <?php picasaimport(2, "http://picasaweb.google.com/data/feed/base/user/example?kind=album") ?>
*************************************************************************************************************************/

function picasaimport($display=0,$feedurl) {

	//change vor the php-versions
	$phpversion = phpversion();
	
	if($phpversion >= '5.1.0'){

		if($feedurl) {
			$obj_xml = simplexml_load_file($feedurl);
			
			echo '<!-- PHP >=5.1.0 used, funktion simplexml_load_file, by bueltge.de -->';
			echo '<div class="picasaweb">';
			echo '<h3><a href="' . $obj_xml->author[0]->uri[0] . '" title="view Album" >' . $obj_xml->title[0] . '</a></h3>';
			echo 'Author: <a href="' . $obj_xml->author[0]->uri[0] . '" title="view Album" >' . $obj_xml->author[0]->name[0] . '</a>';
	
			foreach($obj_xml->entry as $entry ) {
				
				if($display == 0) {
					break;
				}
				
				echo '<h4><a href="' . $entry->id[0] . '" >' . $entry->title[0] . '</a></h4>';
				echo str_replace('<td>' , '<td valign="top">', $entry->summary[0]);
				//echo $entry->summary[0];
				$display--;
			}
			
			echo '</div>';
		} else {
			echo 'Feed-URL has a error.';
		}

	} else {

		// For function fetch_rss
		if(file_exists(ABSPATH . WPINC . '/rss-functions.php')) {
			@require_once (ABSPATH . WPINC . '/rss-functions.php');
			// It's Wordpress 1.5.2 or 2.x. since it has been loaded successfully
		} elseif (file_exists(ABSPATH . WPINC . '/rss.php')) {
			@require_once (ABSPATH . WPINC . '/rss.php');
			// In Wordpress 2.1, a new file name is being used
		} else {
			die (__('Error in file: ' . __FILE__ . ' on line: ' . __LINE__ . '.<br />The Wordpress file "rss-functions.php" or "rss.php" could not be included.'));
		}

		if($feedurl) {
			$rss = fetch_rss($feedurl);
			echo '<!-- import xml with Magpie and WordPress, by bueltge.de -->';
			echo '<div class="picasaweb">';
			echo '<h3>' . $rss->channel['title'] . '</h3>';
			
				foreach($rss->items as $item) {
					
					if($display == 0) {
						break;
					}
					
					$title = $item[title];
					$href  = $item[link];
					$desc  = $item[description];
					$summary = $item[summary];
	
					echo '<p>';
					//echo '<h4><a href="' . $href . '" title="view Album" >' . $title . '</a></h3>';
					echo $desc;					
					echo str_replace('<td>' , '<td valign="top">', $summary);
					//echo $summary;
					
					$display--;
					echo '</p>';
				}
			echo wptexturize('</div>');
		} else {
			echo 'Feed-URL has a error.';
		}

	} //end phpversion
} //end function
?>