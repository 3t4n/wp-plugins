<?php
/**
* Plugin Name:	add .html in URL
* Description:	The plugin is used to add .html (extension) in all page URL
* Author:		bgweddingphotographymelbourne
* Author URI:	http://www.bgweddingphotographymelbourne.com.au/
* License:		GNU General Public License v3 or later
* License URI:	http://www.gnu.org/licenses/gpl-3.0.html
* Text Domain:	add-html-in-URL
* Version: 		1.0
*/

define('BGWEDDING_VERSION', '1.0');
define('BGWEDDING_PLUGIN_URL', plugin_dir_url(__FILE__));
define('BGWEDDING_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('BGWEDDING_DELETE_LIMIT', 100000);

add_action('init', 'BGWEDDING_rewrite_page_permalink', -1);
register_activation_hook(__FILE__, 'BGWEDDING_activate');
register_deactivation_hook(__FILE__, 'BGWEDDING_deactivate');

function BGWEDDING_rewrite_page_permalink() {
    global $wp_rewrite;
    if (!strpos($wp_rewrite->get_page_permastruct(), '.html')) {
        $wp_rewrite->page_structure = $wp_rewrite->page_structure . '.html';
    }
}

add_filter('user_trailingslashit', 'BGWEDDING_remove_slash', 66, 2);

function BGWEDDING_remove_slash($string, $type) {
    global $wp_rewrite;
    if ($wp_rewrite->using_permalinks() && $wp_rewrite->use_trailing_slashes == true && $type == 'page') {
        return untrailingslashit($string);
    } else {
        return $string;
    }
}

function BGWEDDING_activate() {
    global $wp_rewrite;
    if (!strpos($wp_rewrite->get_page_permastruct(), '.html')) {
        $wp_rewrite->page_structure = $wp_rewrite->page_structure . '.html';
    }
    $wp_rewrite->flush_rules();
}

function BGWEDDING_deactivate() {
    global $wp_rewrite;
    $wp_rewrite->page_structure = str_replace(".html", "", $wp_rewrite->page_structure);
    $wp_rewrite->flush_rules();
}
?>