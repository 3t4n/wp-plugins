<?php
global $afterRead_sugestion;
//$afterRead_raw_posttags = get_the_tags();
$afterRead_raw_posttags =  get_the_terms($post->ID, 'post_tag');
//Oh this was a FUN bug to work out, get the tags gives an array with white space! I can only imagine that it tags all the takes and deletes any that do not apply, I should check hte wordpress docs to see if this is warned about
sort($afterRead_raw_posttags);
//$afterRead_posttags;


foreach ($afterRead_raw_posttags as $afterRead_raw_posttags_temp){
	$afterRead_posttags[]= $afterRead_raw_posttags_temp->term_id;
}
$afterRead_posts_by_tags = get_objects_in_term($afterRead_posttags,"post_tag");
$afterRead_posts_by_tags = array_unique($afterRead_posts_by_tags);
sort($afterRead_posts_by_tags);
for ($i = 0, $size = sizeof($afterRead_posts_by_tags); $i < $size; $i++) {
	$afterRead_posts[$i] -> post_id = $afterRead_posts_by_tags[$i];
	$afterRead_posts[$i] -> time =  strtotime(get_post($afterRead_posts[$i] ->post_id)->post_date_gmt);
}
global $post;
$afterRead_time_of_post = strtotime($post->post_date_gmt);

// foreach ($afterRead_posts as $afterRead_postsd) {
// echo $afterRead_postsd-> post_id.' : '.$afterRead_postsd-> time;
// echo '<br />';
// }

$afterRead_sorting_newer-> time = 99999999999999999;
for ( $i = sizeof($afterRead_posts) -1; $i >= 0; $i--){
	if ($afterRead_time_of_post < $afterRead_posts[$i]-> time) {
		if ($afterRead_sorting_newer-> time > $afterRead_posts[$i]-> time) {
		$afterRead_sorting_newer = $afterRead_posts[$i];
		}
		//$afterRead_next_post = $afterRead_posts[$i]-> post_id;
	}
}
$afterRead_next_post = $afterRead_sorting_newer-> post_id;

$afterRead_sorting_older-> time  = 0;
for ($i = 0, $size = sizeof($afterRead_posts); $i < $size; $i++){
	if ($afterRead_time_of_post > $afterRead_posts[$i]-> time) {
		if ($afterRead_sorting_older-> time < $afterRead_posts[$i]-> time) {
		$afterRead_sorting_older = $afterRead_posts[$i];
		}
		//$afterRead_next_post = $afterRead_posts[$i]-> post_id;
	}
}
$afterRead_previous_post = $afterRead_sorting_older-> post_id;


if ($afterRead_previous_post) {
	$afterRead_previous_post = get_post($afterRead_previous_post);
	if ($afterRead_previous_post->post_status !== publish) {
		$afterRead_previous_post="";
	}
}
if ($afterRead_next_post) {
	$afterRead_next_post = get_post($afterRead_next_post);
	if ($afterRead_next_post->post_status !== publish) {
			$afterRead_next_post="";
		}
}
// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * 
//Beyond this line is only styling, should this suggestion need updating all you need to do is copy the above and replace the similar code in the styled suggestions 
// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * 

if ($afterRead_previous_post) {
	$afterRead_previous_post_link = '<a href="'.$afterRead_previous_post->guid.'" rel="prev"><div>&laquo Previous Entry <br /> <div style="font-size:0.4em; float:right;">'.$afterRead_previous_post->post_title.'</div></div></a>';
}
if ($afterRead_next_post) {
	$afterRead_next_post_link = ' <a href="'.$afterRead_next_post->guid.'" rel="next"><div>Next Entry &raquo<br /> <div style="font-size:0.4em; float:left;">'.$afterRead_next_post->post_title.'</div></div></a>';
}
$afterRead_sugestion = '<div style="font-size:2em; display:block;"><p><div style="float:left;'.get_option('afterRead_option_inchi').'">'.$afterRead_previous_post_link.'</div>'.get_option('afterRead_option_ni').'<div style="float:right;'.get_option('afterRead_option_san').'">'.$afterRead_next_post_link.'</div></p></div><div style="clear:both"></div>';

?>