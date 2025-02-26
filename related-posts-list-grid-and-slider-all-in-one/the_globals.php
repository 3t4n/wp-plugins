<?php
$option_name = 'Aio_Related_Posts_Type';
$ver_type = 'free';
//Get The Plugins URL as http://www.yrsite.com/dir/subdir
	$pluginsurl = plugins_url( '', __FILE__ );
	$aiopluginsurl = plugins_url( '', __FILE__ );
//get the tag id's as al list
global $post;
$tags = wp_get_post_tags($post->ID);
$tagcount = count($tags);
$result = $tags;
if ($tagcount > 1) {
for ($i = 0; $i < $tagcount; $i++)
   {
	$mytags[$i]['term_id'] = $tags[$i]->term_id;
	$mytags[$i]['count'] = $tags[$i]->count;
   }
$result = sortTwoDimensionArrayByKey($mytags,'count');
}
$taglist_full = "'" . $result[0]->term_id. "'";
$taglist = "'" . $result[0]->term_id. "'";
$countlist = "'" . $result[0]->count. "'";
$mysum = 0;
$myavg = 0;
for ($i = 1; $i < $tagcount; $i++) {
	$mysum = $mysum + $result[$i]['count'];
}
if($tagcount != 0) $myavg = $mysum / $tagcount;
if ($myavg < 4 || $tagcount < 5) $myoperator = 20;
else
$myoperator = $myavg + 3;
if ($tagcount > 1) {
	for ($i = 1; $i < $tagcount; $i++) {
		$taglist_full = $taglist_full . ", '" . $result[$i]['term_id'] . "'";
		if ($result[$i]['count'] < $myoperator) {
		   $taglist = $taglist . ", '" . $result[$i]['term_id'] . "'";
		   $countlist = $countlist . ", '" . $result[$i]['count'] . "'";}
	}
}
$reg_exp = '|<img.*?src=[\'"](.*?)[\'"].*?>|';
$new_reg_exp = '@<img.+src="(.*)".*>@Uims';

//echo $myoperator;
?>