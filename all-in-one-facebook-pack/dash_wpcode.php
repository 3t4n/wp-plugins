<?php 
// Create the function to output the contents of our Dashboard Widget

function wpcode_widget() { 

require_once (ABSPATH . WPINC . '/rss-functions.php');
define('MAGPIE_CACHE_AGE', 1);
$rss = fetch_rss("http://feeds.feedburner.com/wpcode");
if ( $rss ) {
$i = 1;
foreach ($rss->items as $item) {
$titolo = $item['title'];
$contenuto = $item['content']['encoded'];
$autore = $item['author'];
$data = $item['pubDate'];
$href = $item['link'];
echo "<ul><li><a href=\"$href\" target=\"_blank\">$titolo</a></li></ul>";
if ($i == 5 ) break;
$i = $i + 1;
}}	
} 

// Create the function use in the action hook

function example_add_dashboard_widgets() {
	wp_add_dashboard_widget('example_dashboard_widget', 'Daily WP Code Snippet by WpCode.net', 'wpcode_widget');	
} 

// Hook into the 'wp_dashboard_setup' action to register our other functions

add_action('wp_dashboard_setup', 'example_add_dashboard_widgets' );

?>