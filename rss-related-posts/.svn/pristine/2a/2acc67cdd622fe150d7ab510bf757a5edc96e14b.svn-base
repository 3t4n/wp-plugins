<?php
/*
Plugin Name: RSS Related Posts
Plugin URI: http://blog.121416.co.cc/wordpress/wp-plugin-rss-related-posts/
Description: If your articles are not enough for the related post option , with the help of this plugin you can show automatically links to other blogs, by adding a custom field
Version: 2.0
Author: Cristescu Bogdan
Author URI: http://blog.121416.co.cc
*/


function rss_related_posts($customfield) {
global $post;
if ($subjectrss = get_post_meta($post->ID, "$customfield", true)) {

$links = "http://blogsearch.google.com/blogsearch_feeds?hl=en&q=$subjectrss&ie=utf-8&num=10&output=atom";

$links = str_replace(" ", "%20", $links);
$feed = new SimplePie();
$feed->set_feed_url("$links");
$feed->enable_order_by_date(true);
$feed->set_cache_location($_SERVER['DOCUMENT_ROOT'] . '/wp-content/cache');
$feed->init();
$feed->handle_content_type();
$maxitems = $feed->get_item_quantity(); 
$rss_items = $feed->get_items(0, 10); 

if ($maxitems == 0) echo '<h2 style="text-align: center; color: #AF0017; padding: 10px">There is no posts!</h2>';
    else
        foreach ( $rss_items as $item ) : 
echo '<div class="rsscontent">';
        echo '<h2 class="rssheader">'. $item->get_title() .'</h2>';
        echo '<p>'. $item->get_description() .'<a href="'. $item->get_permalink() .'" title="'. $item->get_title() .'">read more</a></p>';
        echo '<small>Author: <b>';
    if ($author = $item->get_author()) {
        echo $author->get_name();
    } 
        echo '</b> | Posted on: '.$item->get_date('j F Y | g:i a').'</small>';
echo '</div>';
endforeach; 

}

elseif ($subjectrss == null) {
$title = get_the_title();
$links = "http://blogsearch.google.com/blogsearch_feeds?hl=en&q=$title&ie=utf-8&num=10&output=atom"; 
$links = str_replace(" ", "%20", $links);
$feed = new SimplePie();
$feed->set_feed_url("$links");
$feed->enable_order_by_date(true);
$feed->set_cache_location($_SERVER['DOCUMENT_ROOT'] . '/wp-content/cache');
$feed->init();
$feed->handle_content_type();
$maxitems = $feed->get_item_quantity(); 
$rss_items = $feed->get_items(0, 10); 

if ($maxitems == 0) echo '<h2 style="text-align: center; color: #AF0017; padding: 10px">There is no posts!</h2>';
    else
        foreach ( $rss_items as $item ) : 
echo '<div class="rsscontent">';
        echo '<h2 class="rssheader">'. $item->get_title() .'</h2>';
        echo '<p>'. $item->get_description() .'<a href="'. $item->get_permalink() .'" title="'. $item->get_title() .'">read more</a></p>';
        echo '<small>Author: <b>';
    if ($author = $item->get_author()) {
        echo $author->get_name();
    } 
        echo '</b> | Posted on: '.$item->get_date('j F Y | g:i a').'</small>';
echo '</div>';
endforeach; 


}
}
?>