<?php
/*
Plugin Name: d4rss
Plugin URI: http://www.goddamm.it/~dalamar/projects/d4rss/index.html
Description: Use this Plugin to display entries from external rss sources of your choice.
Version: 0.1.1
Author: d4lamar
Author URI: http://www.goddamm.it/~dalamar
*/

/*  Copyright 2007 d4lamar (email : d4lamar@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

//d4rss  Plugin
$tablesources = $wpdb->prefix . "d4rss_sources";
$tableentries = $wpdb->prefix . "d4rss_entries";
$admin_url = "options-general.php?page=d4rss";
$limit = get_option('d4rss_limit');

function d4rss_view() {
	echo get_option('d4rss_output');
}

function d4rss_update() {
	global $wpdb,$tablesources,$tableentries,$limit;

	require_once(ABSPATH . WPINC . "/rss-functions.php");
	
	$sources = $wpdb->get_results("SELECT id, url, name, rss, date_field FROM $tablesources");

	//A counter to use for order those feeds that doesn't have a time reference
	$counter = 0;

	foreach ($sources as $i => $source) {
		$feedRSS = @fetch_rss($source->rss);
		$last_url = $wpdb->get_var("SELECT url FROM $tableentries WHERE source_id=".$source->id." ORDER BY time DESC");
		
		/*
		//Fill missed rows
		if ($numrows <= $limit)
			for ($a=$numrows;$a<$limit;$a++)
				$wpdb->query("INSERT INTO $tableentries (source_id,title,time,url) VALUES ('".$source->id."','".($a+1)."','',0,'')");
		
		//Delete exceeding rows
		if ($numrows > $limit)
			for ($a=$numrows;$a>$limit;$a--)
				$wpdb->query("DELETE FROM $tableentries WHERE source_id=".$source->id." AND num=".$a);
		*/		
		$changed=0;
		
		if(isset($feedRSS->items) && 0 != count($feedRSS->items)){
			
			foreach($feedRSS->items as $k => $tag){
				// Limits the number of items to show to $limit.
				if($k==$limit) 
					break;
				
				if ($last_url === $tag[link])
					break;
				else
				{	
					$title=$wpdb->escape(html_entity_decode($tag[title]));
					$url=$wpdb->escape($tag[link]);
					$time=d4rss_getdatefield($source->date_field,$tag);
					$matches="";
					
					/*
					if (isset($tag[$source->date_field]))
						$time=$tag[$source->date_field];
					else
						$time=date("Y-m-d H:i:s");
					*/
	
					//Date Field reformat
					//Blogger,Splinder
					if (preg_match('/^(\d{4})-(\d{2})-(\d{2})T(\d{2}):(\d{2}):(\d{2})/',$time))
					{
						$time=str_replace("T"," ",$time);
						$time=date('Y-m-d H:i:s',strtotime($time));
					}
					//if (preg_match('/^\w{3},\s+(\d+)\s+(\w{3})\s+(\d+)\s+(\d+):(\d+):(\d+)/',$time))	
					//{
					//	$time=date('Y-m-d H:i:s',strtotime($time));
					//}
					else if (preg_match('/^(\d{4})-(\d{2})-(\d{2})/',$time))
					{
						$tmp=preg_replace('/^(\d{4})-(\d{2})-(\d{2})/','$1-$2-$3',$time);
						$tmp.=" ".date("H:i:s");
						$counter=$counter+60;
						$time=date('Y-m-d H:i:s',(strtotime($tmp)-$counter));
					}
					else if (strtotime($time))	
					{
						$time=date('Y-m-d H:i:s',strtotime($time));
					}
					else if (preg_match('/^(\d{2})-(\w{3})-(\d{2})/',$time,$matches))
					{
						if ($macthes[3] < 70)
							$tmp=$matches[1]." ".$matches[2]." 20".$matches[3]." ".date("H:i:s");
						else
							$tmp=$matches[1]." ".$matches[2]." 19".$matches[3]." ".date("H:i:s");
						
						$counter=$counter+60;
						$time=date('Y-m-d H:i:s',(strtotime($tmp)-$counter));
					}

					$wpdb->query("INSERT INTO $tableentries (source_id,title,time,url) VALUES ('".$source->id."','".$title."','".$time."','".$url."')");
				}
			}
			$numrows = $wpdb->get_var("SELECT COUNT(*) FROM $tableentries WHERE source_id=".$source->id);
			$del_limit=max(0,($numrows-$limit));
			
			if ($del_limit)
				$wpdb->query("DELETE FROM $tableentries WHERE source_id=".$source->id." ORDER by time ASC LIMIT ".$del_limit);

		}
		
	}

	//Update LastUpdate Value
	//$now=$wpdb->get_var("SELECT NOW()");
	//update_option('d4rss_lastupdate', $now);
	
	d4rss_update_output();
}

function d4rss_update_output() {
	global $wpdb,$tableentries,$tablesources,$limit;
		
	$output="<div class=\"d4rss_view\">\n";
	
	$entries = $wpdb->get_results("SELECT s.name AS site, s.url AS site_url, e.title AS news, e.url AS news_url FROM $tableentries e LEFT JOIN $tablesources s ON s.id=e.source_id ORDER BY e.time DESC");
	
	$d4rss_string=stripslashes(get_option('d4rss_string'));
	$max=get_option('d4rss_textlength');
		
	foreach ($entries as $i => $entry) {
		
		if ($i == $limit)
			break;
		
		$news=stripslashes($entry->news);	
		if (strlen($news)> $max)
			$news=substr($news,0,$max-3)."...";

		$string=str_replace("%site%",stripslashes($entry->site),$d4rss_string);
		$string=str_replace("%site_url%",stripslashes($entry->site_url),$string);	
		$string=str_replace("%news%",$news,$string);	
		$string=str_replace("%news_url%",stripslashes($entry->news_url),$string);
		$output.=$string."<br/>\n";	
	}	
	$output.="</div>\n";
	
	update_option('d4rss_output', $output);
}

/*
function d4rss_check_lastupdate() {
	
	global $wpdb;
	
	if (($wpdb->get_var("SELECT TIME_TO_SEC(TIMEDIFF(NOW(),'".get_option('d4rss_lastupdate')."')) AS DELAY")) > 3600 )
		return TRUE;
	else
		return FALSE; 
}
*/


//Admin pages

// d4rss_add_pages is the sink function for the 'admin_menu' hook
function d4rss_add_pages() {
    // Add a new menu under Options:
    add_options_page('d4rss Plugin', 'd4rss', 8, 'd4rss', 'd4rss_options_page');

}

function d4rss_finddatefields($parent,$array_feed,&$date_fields)
{
	while (list($key, $value) = each($array_feed)) {
		if (is_string($value))
		{
			//Blogger,Splinder
			$is_date_field = preg_match('/^(\d{4})-(\d{2})-(\d{2})T(\d{2}):(\d{2}):(\d{2})/',$value);
			//Google News
			//$is_date_field = ($is_date_field || preg_match('/^\w{3},\s+(\d+)\s+(\w{3})\s+(\d+)\s+(\d+):(\d+):(\d+)/',$value));
			//Other
			$is_date_field = ($is_date_field || strtotime($value));
			$is_date_field = ($is_date_field || preg_match('/^(\d{4})-(\d{2})-(\d{2})/',$value));
			$is_date_field = ($is_date_field || preg_match('/^(\d{2})-(\w{3})-(\d{2})/',$value));

			if ($is_date_field)
			{
				if ($parent == "")
					$date_fields[]=$key;
				else
					$date_fields[]=$parent.$key;
			}	
		}
		else if (is_array($value))
		{
			d4rss_finddatefields($key.":",$value,&$date_fields);
		}
	}
			
}

function d4rss_getdatefield($key,$feed)
{
	$keys=split(":", $key);
	$tag=$feed;
	foreach($keys as $i => $value)
		$tag=$tag[$value];

	return $tag;
}

// d4rss_options_page() displays the page content for the d4rss Options submenu
function d4rss_options_page() {
	global $wpdb, $tablesources, $admin_url,$limit;
	
	echo '<div class="wrap">'."\n";
	echo "<h2>d4rss</h2>\n";
	echo "<div style=\"text-align:center;margin-bottom:4em;\">\n";
	
	//Update Settings
	if ( isset($_POST[limit]) && isset($_POST[max]) && isset($_POST[string]) ) {
		
		$limit=$_POST[limit];
		$max=max($_POST[max],10);
		$string=stripslashes($_POST[string]);
				
		update_option('d4rss_limit',$limit);
		update_option('d4rss_textlength',$max);
		update_option('d4rss_string',$string);
	}
	
	//Update DB
	if ( $_POST[update] == "yes" ) {
		d4rss_update();
	}	
	
	switch ($_GET["do"]) {
		
		case "mod":
			if (!($_GET["next"] == 2)) {
				
				if ($_GET["id"] === "new") {
					$url="http://";
					$name="";
					$rss="http://";
					$date_field="";
					$submit="Next Step";
				}
				else {
					$source = $wpdb->get_row("SELECT url, name, rss, date_field FROM $tablesources WHERE id=".$_GET["id"]);
					$url=stripslashes($source->url);
					$name=stripslashes($source->name);
					$rss=stripslashes($source->rss);
					$date_field=stripslashes($source->date_field);
					$submit="Next Step";
				}
				//Title
				echo "<h3>Step 1 - Set Up RSS Source:</h3>\n";
				
				echo "<form id=\"d4rss_mod2\" method=\"POST\" action=\"".$admin_url."&id=".$_GET["id"]."&do=mod&next=2\">\n";
				echo "<input type=\"hidden\" name=\"date_field\" id=\"date_field\" value=\"".$date_field."\" />\n";
				echo "<table style=\"margin-left:auto;margin-right:auto\">\n";
					echo "\t<tr>\n";
					echo "\t\t<td style=\"text-align:right;\">Source Site Name</td>\n";
					echo "\t\t<td style=\"text-align:left;\"><input name=\"name\" id=\"name\" type=\"text\" value=\"$name\" size=\"15\" /></td>\n";
					echo "\t</tr>\n";
					echo "\t<tr>\n";
					echo "\t\t<td style=\"text-align:right;\">Source Site Homepage URL</td>\n";
					echo "\t\t<td style=\"text-align:left;\"><input  name=\"url\" id=\"url\" type=\"text\" value=\"$url\" size=\"40\" /></td>\n";
					echo "\t</tr>\n";
					echo "\t<tr>\n";
					echo "\t\t<td style=\"text-align:right;\">Source RSS URL</td>\n";
					echo "\t\t<td style=\"text-align:left;\"><input name=\"rss\" id=\"rss\" type=\"text\" value=\"$rss\" size=\"40\" /></td>\n";
					echo "\t</tr>\n";
					echo "\t<tr>\n";
					echo "\t\t<td></td>\n";
					echo "\t\t<td><input id=\"submit\" name=\"submit\" type=\"submit\" value=\"$submit\" /></td>\n";
					echo "\t</tr>\n";
				echo "</table>\n";
				echo "</form>\n";
			}
			else {
				if ($_GET["id"] === "new") {
					$submit="Add New RSS Source";
				}
				else {
					$submit="Update RSS Source";
				}
				require_once(ABSPATH . WPINC . "/rss-functions.php");
				
				$feedRSS = @fetch_rss($_POST[rss]);
				$date_fields=array();

				if(isset($feedRSS->items) && 0 != count($feedRSS->items)){
					$feed=$feedRSS->items[0];
					
					/*while (list($key, $value) = each($feed)) {
						if (is_string($value))
						{
							//Blogger,Splinder
							$is_date_field = preg_match('/^(\d{4})-(\d{2})-(\d{2})T(\d{2}):(\d{2}):(\d{2})/',$value);
							//Google News
							//$is_date_field = ($is_date_field || preg_match('/^\w{3},\s+(\d+)\s+(\w{3})\s+(\d+)\s+(\d+):(\d+):(\d+)/',$value));
							//Other
							$is_date_field = ($is_date_field || strtotime($value));
							$is_date_field = ($is_date_field || preg_match('/^(\d{4})-(\d{2})-(\d{2})/',$value));
							$is_date_field = ($is_date_field || preg_match('/^(\d{2})-(\w{3})-(\d{2})/',$value));

							if ($is_date_field)
							{
								$date_fields[]=$key;
							}	
    						}
						else if (is_array($value))
						{
							echo "Stikazzi";
						}
					}*/
					
					d4rss_finddatefields("",$feed,&$date_fields);
				}
	
				
				//Title
				echo "<h3>Step 2 - Choose Date Field:</h3>\n";
				
				
				echo "<form id=\"d4rss_mod4\" method=\"POST\" action=\"".$admin_url."&id=".$_GET["id"]."\">\n";
				echo "<input type=\"hidden\" name=\"name\" id=\"name\" value=\"".stripslashes($_POST[name])."\" />\n";
				echo "<input type=\"hidden\" name=\"url\" id=\"url\" value=\"".$_POST[url]."\" />\n";
				echo "<input type=\"hidden\" name=\"rss\" id=\"rss\" value=\"".$_POST[rss]."\" />\n";
				echo "<table style=\"margin-left:auto;margin-right:auto\">\n";
/*
					echo "\t<tr>\n";
					echo "\t\t<td style=\"text-align:right;\">Source Site Name:</td>\n";
					echo "\t\t<td style=\"text-align:left;\">".$_POST[name]."</td>\n";
					echo "\t</tr>\n";
					echo "\t<tr>\n";
					echo "\t\t<td style=\"text-align:right;\">Source Site Homepage URL:</td>\n";
					echo "\t\t<td style=\"text-align:left;\">".$_POST[url]."</td>\n";
					echo "\t</tr>\n";
					echo "\t<tr>\n";
					echo "\t\t<td style=\"text-align:right;\">Source RSS URL:</td>\n";
					echo "\t\t<td style=\"text-align:left;\">".$_POST[rss]."</td>\n";
					echo "\t</tr>\n";
					echo "\t<tr>\n";
*/
					echo "\t\t<td style=\"text-align:right;\">Date Field:</td>\n";
					echo "\t\t<td style=\"text-align:left;\">\n";
					echo "\t\t\t<select name=\"date_field\" id=\"date_field\">\n";
						foreach($date_fields as $value)
						{
							if ($value == $_POST[date_field])
								echo "\t\t\t<option value=\"$value\" selected=\"selected\">".$value."</option>\n";
							else
								echo "\t\t\t<option value=\"$value\">".$value."</option>\n";
						}
					echo "\t\t\t</select>\n";
					echo "\t\t</td>\n";
					echo "\t</tr>\n";
					echo "\t<tr>\n";
					echo "\t\t<td></td>\n";
					echo "\t\t<td><input id=\"submit\" name=\"submit\" type=\"submit\" value=\"$submit\" /></td>\n";
					echo "\t</tr>\n";
				echo "</table>\n";
				echo "</form>\n";
			}			
			break;
		case "del":
			$wpdb->query("DELETE FROM $tablesources WHERE id=".$_GET["id"]);
		default:	
			
			//Update or ADD Sources
			if ( isset($_POST[name]) && isset($_POST[url]) && isset($_POST[rss]) && isset($_GET[id]) && isset($_POST[date_field]) ) {
				
				$name=$wpdb->escape($_POST[name]);
				$url=$wpdb->escape($_POST[url]);
				$rss=$wpdb->escape($_POST[rss]);
				$date_field=$wpdb->escape($_POST[date_field]);
				
				if ($_GET["id"] == "new") {
					$wpdb->query("INSERT INTO $tablesources (name,url,rss,date_field) VALUES ('".$name."','".$url."','".$rss."','".$date_field."')");
				}
				else {
					$wpdb->query("UPDATE $tablesources SET name='".$name."', url='".$url."', rss='".$rss."', date_field='".$date_field."' WHERE id=".$_GET[id]);
				}
			}
			
			$string=get_option('d4rss_string');
			$max=get_option('d4rss_textlength');
			$submit="Update Settings";
			$sources = $wpdb->get_results("SELECT id, url, name, rss FROM $tablesources ");
			echo "<table class=\"widefat\" style=\"margin-left:auto;margin-right:auto;margin-bottom:3em\">\n";
			echo "\t<thead>\n";
			echo "\t\t<tr>\n";
			echo "\t\t\t<th style=\"text-align: center\">Source Site</th>\n";
			echo "\t\t\t<th colspan=\"2\" style=\"text-align: center\">Actions</th>\n";
			echo "\t\t</tr>\n";
			echo "\t</thead>\n";
			
			if (!count($sources)) {
				echo "\t<tr><td>No Rss Sources Configured</td></tr>\n";
			}
			else	{
				foreach ($sources as $i => $source)
				{
					if (($i % 2) == 1)
						echo "\t<tr class=\"alternate\">\n";
					else
						echo "\t<tr>\n";
		
					echo "\t\t<td>".stripslashes($source->name)."</td>\n";
					echo "\t\t<td><a href=\"$admin_url&do=mod&id=$source->id\">Modify</a></td>\n";
					echo "\t\t<td><a href=\"$admin_url&do=del&id=$source->id\">Delete</a></td>\n";
					echo "\t</tr>\n";
				}
			}
			echo "</table>\n";
			echo "<a href=\"$admin_url&do=mod&id=new\">Add New RSS Source</a>\n";
			
			echo "<form id=\"d4rss_mod1\" method=\"POST\" action=\"".$admin_url."\">\n";
			echo "<table style=\"margin-left:auto;margin-right:auto;margin-top:3em\">\n";
				echo "\t<tr>\n";
				echo "\t\t<th width=\"33%\" scope=\"row\" style=\"text-align:right;\">Number of Feeds to Display</th>\n";
				echo "\t\t<td style=\"text-align:left;\"><input name=\"limit\" id=\"limit\" type=\"text\" value=\"$limit\" size=\"2\" /></td>\n";
				echo "\t</tr>\n";
				echo "\t<tr>\n";
				echo "\t\t<th width=\"33%\" scope=\"row\" style=\"text-align:right;\">Max Length of Feed Title<br />(Minimum is 10)</th>\n";
				echo "\t\t<td style=\"text-align:left;\"><input  name=\"max\" id=\"max\" type=\"text\" value=\"$max\" size=\"2\" /></td>\n";
				echo "\t</tr>\n";
				echo "\t<tr>\n";
				echo "\t\t<th width=\"33%\" scope=\"row\" style=\"text-align:right;\">String Format for Feed Display:<br /><span style=\"font-size:0.9em;font-weight:normal;\"><b>%site%</b> for Site Name<br /><b>%site_url%</b> for Site Homepage URL<br /><b>%news%</b> for Feed Title<br /><b>%news_url%</b> for News Link URL<br /></span></th>\n";
				echo "\t\t<td style=\"text-align:left;\"><textarea name=\"string\" id=\"string\" rows=\"3\" cols=\"80\">$string</textarea></td>\n";
				echo "\t</tr>\n";
				echo "\t<tr>\n";
				echo "\t\t<td></td>\n";
				echo "\t\t<td style=\"text-align:right;\"><input id=\"submit\" name=\"submit\" type=\"submit\" value=\"$submit\" /></td>\n";
				echo "\t</tr>\n";
			echo "</table>\n";
			echo "</form>\n";
			
			echo "<form id=\"d4rss_mod3\" method=\"POST\" action=\"".$admin_url."\">\n";
			echo "<input  name=\"update\" id=\"update\" type=\"hidden\" value=\"yes\" />";
			echo "<table style=\"margin-left:auto;margin-right:auto;margin-top:3em\">\n";
				echo "\t<tr>\n";
				echo "\t\t<td style=\"text-align:right;\"><input id=\"submit\" name=\"submit\" type=\"submit\" value=\"Update Feeds\" /></td>\n";
				echo "\t</tr>\n";
			echo "</table>\n";
			echo "</form>\n";
			
			break;
	}	
	echo "</div>\n";
	echo "</div>\n";
	
    
}

//DB Setup

function d4rss_install() {
	
	global $wpdb;
	
	$table_sources_name = $wpdb->prefix . "d4rss_sources";
	
	if($wpdb->get_var("SHOW TABLES LIKE '$table_sources_name'") != $table_sources_name) {
		
		$sql = "CREATE TABLE " . $table_sources_name . " (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			name tinytext NOT NULL,
			url VARCHAR(256) NOT NULL,
			rss VARCHAR(256) NOT NULL,
			date_field VARCHAR(256) NOT NULL,
			UNIQUE KEY id (id)
			);";
		
		require_once(ABSPATH . 'wp-admin/upgrade-functions.php');
		dbDelta($sql);	
	}
	
	$table_entries_name = $wpdb->prefix . "d4rss_entries";
	
	if($wpdb->get_var("SHOW TABLES LIKE '$table_entries_name'") != $table_entries_name) {
		
		$sql = "CREATE TABLE " . $table_entries_name . " (
			source_id mediumint(9) NOT NULL,
			title tinytext NOT NULL,
			url VARCHAR(256) NOT NULL,
			time TIMESTAMP NOT NULL
			);";
		
		require_once(ABSPATH . 'wp-admin/upgrade-functions.php');
		dbDelta($sql);	
	
	}
	
	//Options Values
	$db_version="0.1";
//	$init_time="1990-01-01 00:00:00";
	$string="<a class=\"d4rss_site\" href=\"%site_url%\">%site%</a> - <a class=\"d4rss_news\" href=\"%news_url%\">%news%</a>";
	$textlength=50;
	$limit=5;
	$output="<br />";
	
	//Options
	add_option("d4rss_db_version", $db_version);
//	add_option("d4rss_lastupdate", $init_time);
	add_option("d4rss_string", $string);
	add_option("d4rss_textlength", $textlength);
	add_option("d4rss_limit", $limit);
	add_option("d4rss_output", $output);
	
	if (!wp_next_scheduled('d4rss_schedule_hook')) {
		wp_schedule_event( time(), 'daily', 'd4rss_schedule_hook' );
	}
	
	//d4rss_update();
}
//Add action to scheduled event hook
add_action( 'd4rss_schedule_hook', 'd4rss_update' );

// Insert the d4rss_add_pages() sink into the plugin hook list for 'admin_menu'
add_action('admin_menu', 'd4rss_add_pages');

// DB Install
add_action('activate_d4rss.php', 'd4rss_install');


?>
