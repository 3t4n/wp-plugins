<?php
/*
Plugin Name: Collapsable Menu
Plugin URI: http://smallwebsitehost.com
Description: Create a  Collapsable Menu for your categories. Very usefull if you have menus with parent. 
Version: 1.0
Autdor: Ian Sani
Autdor URI: http://www.smallwebsitehost.com/

    Copyright 2008  Ian sani (email : yulianto@solusiwebindo.com)

    tdis program is free software; you can redistribute it and/or modify
    it under tde terms of tde GNU General Public License as published by
    tde Free Software Foundation; eitder version 2 of tde License, or
    (at your option) any later version.

    tdis program is distributed in tde hope tdat it will be useful,
    but WItdOUT ANY WARRANTY; witdout even tde implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See tde
    GNU General Public License for more details.

    You should have received a copy of tde GNU General Public License
    along witd tdis program; if not, write to tde Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

function uppercase($str)
{
	return strtoupper($str[0]).substr($str, 1, strlen($str)-1);
}

function wp_list_categoriesex( $args = '' ) {
     require_once('js/collapse.js'); ?>
	 <style>
	 #catmenu li {
	list-style:none;
	}

#catmenu li a:link, #catmenu li a:visited {

	display:block;
	padding:4px 4px 4px 15px;
	height:15px;
	line-height:10px;
	border-bottom: 1px solid #999;
	font-weight: bold;
	}
		
#catmenu #child a:link, #child a:visited {
	background: #F4F4EC;
	display:block;
	padding:4px 4px 4px 30px;
	border-bottom: 1px solid #999;
	font-weight: bold;
	}
#catmenu #child  a:hover, #child  a:active {
	background: #F4F4EC;
	text-decoration:none;
	}	
	 </style>
<?php
		global $post, $wpdb;//create query
		$prefix = "wp_";//
		$result = $wpdb->get_results("SELECT *
FROM `".$prefix."term_taxonomy`
inner join ".$prefix."terms on `".$prefix."term_taxonomy`.term_taxonomy_id = ".$prefix."terms.term_id 

LEFT OUTER JOIN (

SELECT ta.parent, te.term_id  as childid, te.name as namechild
FROM ".$prefix."term_taxonomy ta
inner join  ".$prefix."terms te on ta.term_id = te.term_id 
 where ta.parent >0
) AS wpt ON `".$prefix."term_taxonomy`.term_id = wpt.parent
WHERE `".$prefix."term_taxonomy`.parent =0
AND taxonomy = 'category'");

		$categoryid=0;
		if($_GET["catid"]=='') 
			$prev = 0;
		else
			$prev = $_GET["catid"];
		
		echo("<div id='LeftSide' onclick='SwitchMessage(event, $prev);'>");

		echo("<table border=0 width='180' cellpadding=0 cellspacing=0>");
		for($i=0;$i<count($result);$i++)
		{
			if($categoryid!=$result[$i]->term_id)
			{
				if($result[$i]->namechild == null)
				{
					echo("<tr id=".$result[$i]->term_id."_h0");
					//print category
					echo("><td><li><a href='". get_category_link($result[$i]->name) ."' title='".uppercase($result[$i]->name)."'>".uppercase($result[$i]->name)."</a></td></tr>");
					continue;
				}
				else
				{
					echo("<tr id=".$result[$i]->term_id."_h0");
					//print category
					echo("><td><li><a name='xx".$result[$i]->term_id."xx'></a><a id=DLink name=".$result[$i]->term_id . " href='#xx".$result[$i]->term_id."xx' title='".uppercase($result[$i]->name)."'>".uppercase($result[$i]->name)."</a></td></tr>");

				}
				
				echo("<tr id=".$result[$i]->term_id."_h1 ");
				if($catid!=$result[$i]->term_id)
				{
					echo(" style='display:none'");
				}
				//print subcategory
				echo(" ><td><li id=child><a href='". get_category_link($result[$i]->namechild) ."' title='".uppercase($result[$i]->namechild)."'>".uppercase($result[$i]->namechild)."</a>");
			}
			else
			{
				echo("<li id=child><a href='". get_category_link($result[$i]->namechild) ."' title='".uppercase($result[$i]->namechild)."'>".uppercase($result[$i]->namechild)."</a>");
			}

			$z=$i+1;
			$categoryid=$result[$i]->term_id;
			if($categoryid!=$result[$z]->term_id)
			{
				echo("</td></tr>");
			}
		}
		echo("</table>");
		echo("</div>");
}

?>