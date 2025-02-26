<?php
/*
  Plugin Name: MZ Post and Page Excerpts Widgets
  Plugin URI: http://maztch.es/
  Description: Creates widgets that display excerpts from posts or pages in the sidebar. You may use content or excerpt, 'more' links, show featured image, set excerpt length of the post or page.
  Version: 1.2
  Author: Maztch
  Author URI: http://maztch.es
  Tags: Wordpress Post Widget,Wordpress Page Widget, Sidebar widget, Widget, Wodgets, Post Widgets, Post Widget, Page Widgets, Page Widget, Wordpress Widget 
 */

/*
 * Add Stylesheet
 */


add_action('wp_enqueue_scripts', 'mz_posts_pages_style');
function mz_posts_pages_style() {
  wp_register_style('mz_posts_pages_style', plugins_url('/css/styles.css', __FILE__));
  wp_enqueue_style('mz_posts_pages_style');
}

/*
 * Add the Post Widget
 */
add_action( 'widgets_init', create_function( '', 'register_widget( "mz_post_widget" );' ) );
require_once 'mz-post-widget.php';

/*
 * Add the Page Widget
 */
add_action( 'widgets_init', create_function( '', 'register_widget( "mz_page_widget" );' ) );
require_once 'mz-page-widget.php';


add_action( 'edit_page_form', 'mz_add_box');
add_action('init', 'mz_init');

function mz_init() {
	if(function_exists("add_post_type_support")) //support 3.1 and greater
	{
		add_post_type_support( 'page', 'excerpt' );
	}
	load_plugin_textdomain( 'mzppew', false, 'mz-post-and-page-excerpts-widgets/languages' );
}

function mz_page_excerpt_meta_box($post) {
	?>
<label class="hidden" for="excerpt"><?php _e('Excerpt', 'mzppew') ?></label><textarea rows="1" cols="40" name="excerpt" tabindex="6" id="excerpt"><?php echo $post->post_excerpt ?></textarea>
<p><?php _e('Excerpts are optional hand-crafted summaries of your content. You can <a href="http://codex.wordpress.org/Template_Tags/the_excerpt" target="_blank">use them in your template</a>', 'mzppew'); ?></p>
<?php
}


function mz_add_box()
{
	if(!function_exists("add_post_type_support")) //legacy
	{		add_meta_box('postexcerpt', __('Page Excerpt', 'mzppew'), 'mz_page_excerpt_meta_box', 'page', 'advanced', 'core');
	}
}