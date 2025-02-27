<?php
/**
 * Plugin Name: Exclude Pages from Search Results
 * Plugin URI: https://wordpress.org/plugins/exclude-pages-from-search-results/
 * Description: Simply Exclude Pages from WordPress search results and display only post in search results.
 * Version: 1.1
 * Author: Sirius Pro
 * Author URI: https://siriuspro.pl
 * License: GNU General Public License v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

//Exclude pages from WordPress Search
if (!is_admin()) {
function sp_search_filter($query) {
if ($query->is_search) {
$query->set('post_type', 'post');
}
return $query;
}
add_filter('pre_get_posts','sp_search_filter');
}