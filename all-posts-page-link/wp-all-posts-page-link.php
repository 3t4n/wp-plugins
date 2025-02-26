<?php
/*
Plugin Name: All Posts Page Link
Plugin URI: http://www.j2trip.com/html/y2009/08/wp-all-posts-page-link.html
Description: Outputs all posts page link. This plugin is to show all posts page link not all pages link for a special post which has long text.
Version: 1.1
Author: sandapao
Author URI: http://www.j2trip.com/
*/


/**
 * Return all posts posts pages link.
 *
 * @since 2.8.2
 * @author: sandapao
 * @param string $label Content for link text.
 * @param int $max_page Optional. Max pages.
 * @return string|null
 */
function get_all_posts_page_link( $labelP = 'Prevrous Page &raquo;', 
								  $labelN = 'Next Page &raquo;', 
								  $lableEveryPage = '', 
								  $max_page = 0, 
								  $needReverse = false ) {
	global $paged, $wp_query;

	if ( !$max_page ) {
		$max_page = $wp_query->max_num_pages;
	}

	if ( !$paged )
		$paged = 1;
	
	if ( !is_single() && $max_page > 1) {
		
		$returnVal = "<ul>\n";
		$previousPosts = get_previous_posts_link();
		$nextPosts = get_next_posts_link();
		$returnVal .= "<li>\n";
		if ($previousPosts) {  $returnVal .= get_previous_posts_link($labelP);  }else{ $returnVal .=  $labelP; }
		$returnVal .= "</li>\n";

		$pageNumDsp = 0;
		if ($needReverse == true){
			$pageNumDsp = $max_page;
		}else{
			$pageNumDsp = 1;
		}
		for ($pageItem = 1; $pageItem <= $max_page; $pageItem++){
			$returnVal .= '<li>';
			if ($pageItem == $paged){
				$returnVal .= $lableEveryPage.preg_replace('/&([^#])(?![a-z]{1,8};)/', '&#038;$1', $label) .$pageNumDsp;
			}else{
				$returnVal .= '<a href="' . esc_url( get_pagenum_link($pageItem) ) . "\">". 
						  	  $lableEveryPage.preg_replace('/&([^#])(?![a-z]{1,8};)/', '&#038;$1', $label) .
						  	  $pageNumDsp.'</a>';
			}
			$returnVal .= '</li>';
			
			if ($needReverse == true){
				$pageNumDsp--;
			}else{
				$pageNumDsp++;
			}
		}
		
		$returnVal .= "<li>\n";
		if ($nextPosts) {  $returnVal .= get_next_posts_link($labelN);  }else{ $returnVal .= $labelN; }
		$returnVal .= "</li>\n";
		$returnVal .= "</ul>\n";
		
		return $returnVal;
	}
	return "";
}
/**
 * Display all posts posts pages link.
 *
 * @since 2.8.2
 * @author: sandapao
 * @uses get_all_posts_link()
 *
 * @param string $labelPre Content for previous page link text.
 * @param string $labelNext Content for next page link text. 
 * @param int $max_page Optional. Max pages.
 */
function all_posts_page_link( $labelPre = '&laquo;&nbsp;Previous Page ', 
							  $labelNext = 'Next Page&nbsp;&raquo;', 
							  $lableEveryPage = '', 
							  $max_page = 0, 
							  $needReverse = false  ) {
	if ($max_page == ''){
		$max_page = 0;
	}
	echo get_all_posts_page_link( $labelPre, $labelNext, $lableEveryPage, $max_page, $needReverse);
	
}
?>