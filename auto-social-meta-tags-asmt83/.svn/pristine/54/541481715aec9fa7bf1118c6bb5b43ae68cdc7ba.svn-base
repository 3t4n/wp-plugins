<?php
   /*
   Plugin Name: Auto-Social Meta Tags ASMT83 
   Plugin URI: https://migue0583-dev.blogspot.com/2020/08/auto-social-meta-tags-asmt83.html
   description: Adds social meta tags automatically on posts, pages and other parts of a WordPress site by using existing characteristics, like the excerpt, tags and featured image.
   Version: 1.1
   Author: migue0583
   Author URI: https://migue0583-dev.blogspot.com
   License: GPLv2 or later
   */
   
    define( 'ASMT83__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
   
    require_once(ASMT83__PLUGIN_DIR . 'social_tags_asmt83-tags.php' );
    
    if (is_admin()) {
        require_once(ASMT83__PLUGIN_DIR . 'social_tags_asmt83-options.php' );
        require_once(ASMT83__PLUGIN_DIR . 'social_tags_asmt83-editor.php' );
	}
   
    add_action("wp_head", "asmt83_add_meta_tags");
	add_action('admin_init', 'asmt83_register_settings' );
	add_action('admin_menu', 'asmt83_options_page_menu');
	add_action('add_meta_boxes', 'asmt83_post_meta_fields');
	add_action('save_post', 'asmt83_save_postdata');
	
?>
