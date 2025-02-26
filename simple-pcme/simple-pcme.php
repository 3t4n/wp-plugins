<?php
/*
 * Plugin Name: Simple Product Category Meta Editor
 * Plugin URI: https://en-ca.wordpress.org/plugins/simple-pcme/
 * Description: Add and edit two meta tags for WooCommerce Product Category pages. Meta tags "title" and "description" for SEO purposes.
 * Version: 1.0.2
 * Author: Michael Zbeetnoff
 * Author URI: michael@ninjatuner.com
*/
require(dirname(__FILE__) . '/admin.php');
require(dirname(__FILE__) . '/meta-tags.php');

add_action('product_cat_edit_form_fields', 'pcme_title_desc_taxonomy_custom_fields', 20, 2);
add_action('edited_product_cat', 'pcme_save_taxonomy_custom_fields', 20, 2);
add_action('wp_head', 'pcme_add_meta_tags', 1);
