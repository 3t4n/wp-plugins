<?php

/**
 * resive post data
 */
	$cat = sanitize_text_field($_POST['cat']);
	$tag = sanitize_text_field($_POST['tag']);
	$author = sanitize_text_field($_POST['author']);
	$year = sanitize_text_field($_POST['year']);
	$monthnum = sanitize_text_field($_POST['monthnum']);
	$day = sanitize_text_field($_POST['day']);
	$year = intval($year);
	$monthnum = intval($monthnum);
	$day = intval($day);
	$keyword = sanitize_text_field($_POST['s']);
	$s_posts_p = intval(get_option('s_posts_per_page'));

	if(empty($cat)){
		$cat = null;
		} elseif (empty($tag)){
		$tag = null;
	
		} elseif (empty($author)){
		$author = null;
	
		} elseif (empty($year)){
		$year = null;

		} elseif (empty($monthnum)){
		$monthnum = null;
	
		} elseif (empty($day)){
		$day = null;
		}	
		elseif (empty($keyword)){
		$keyword = null;
		}
		
	

/**
 * Query Settings
 *
 * @return mixed
 */

$args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'category_name' => $cat,
    'author_name' => $author,
    'tag' => $tag,
    'year' => $year,
    'monthnum' => $monthnum,
    'day' => $day,
    's' => $keyword,
    'posts_per_page' => $s_posts_p,
    'order' => 'DESC', // 'ASC'
    'orderby' => 'date' // modified | title | name | ID | rand
);