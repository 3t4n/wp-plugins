<?php
/**
 * Plugin Name: WP Remove Category from Archive Title
 * Plugin URI:  https://wordpress.org/plugins/wp-remove-category-from-archive-title/
 * Description: WP Remove Category from Archive Title helps you hide and remove the in-built Category: keyword from the archive.php and categories
 * Version:     1.2
 * Author:      PrajnaBytes
 * Author URI:  https://www.prajnabytes.com/
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: wp-remove-category-from-archive-title
 * Tested up to: 6.6
 */

class WP_Remove_Category_Title {

    public function __construct() {
        add_filter('get_the_archive_title', array($this, 'remove_category_title'));
    }

    public function remove_category_title($title) {
        if (is_category()) {
            $title = single_cat_title('', false);
            // Remove "Category:" from title
            $title = str_replace('Category: ', '', $title);
        } elseif (is_tag()) {
            $title = single_tag_title('', false);
        } elseif (is_author()) {
            $title = '<span class="vcard">' . get_the_author() . '</span>';
        } elseif (is_tax()) { 
            $title = sprintf(__('%1$s'), single_term_title('', false));
        } elseif (is_post_type_archive()) {
            $title = post_type_archive_title('', false);
        }

        return $title;
    }
}

// Instantiate the class
$wp_remove_category_title = new WP_Remove_Category_Title();
