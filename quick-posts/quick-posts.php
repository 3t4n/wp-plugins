<?php
/*
Plugin Name: Quick Posts
Plugin URI: http://geekoutwith.me/quick-posts
Description: Add multiple pages or posts quickly and easily, apply page templates and parents to pages and categories and tags to posts. You can also set post status and author.
Version: 1.3
Author: Joseph Hinson
Author URI: http://geekoutwith.me/
License: GPL2
*/

if (!class_exists('QuickPosts'))
{
	class QuickPosts
	{
		public $plugin_url;
		
		public function __construct()
		{
			$this->plugin_url = trailingslashit(WP_PLUGIN_URL . '/' . plugin_basename(dirname(__FILE__)));
			
			add_action('admin_menu', array(&$this, 'admin_menu'));
			add_action('admin_print_scripts', array(&$this, 'print_scripts'));
		}
		
		public function install()
		{
			
		}
		
		public function admin_menu()
		{
			add_menu_page('Add quick Post(s) or Page(s)', 'Quick Posts', 'administrator', 'add-quick-post', array(&$this, 'display_form'), plugin_dir_url( __FILE__ ).'/img/icon.png');

		}
		
		public function display_form()
		{
			global $wpdb;
			
			$current_page = $_GET['page'];
			$publish_quick_posts = isset($_POST['publish_quick_posts']) ? true : false; 
			
			if ($publish_quick_posts)
			{
				check_admin_referer('add-quick-post');	
			}
			
			switch ($current_page)
			{
				case 'add-quick-post':
					
					if ($publish_quick_posts)
					{
						$post_type = $_POST['post_type'];
						$post_status = $_POST['post_status'];
						$post_author = $_POST['user'];
						$post_parent = $_POST['page_id'];
						$page_template = $_POST['page_template'];
						$post_category = $_POST['cat'];
						
						$title_arr = $_POST['title'];
						$tags_arr = $_POST['tags'];
						$content_arr = $_POST['content'];
						
						$data = array();
						$data['post_status'] = $post_status;
						$data['post_parent'] = $post_parent;
						$data['post_type'] = $post_type;
						$data['post_author'] = $post_author;
						$data['post_category'] = array($post_category);
						
						for ($i = 0; $i < count($title_arr); $i++)
						{
							$post_title = $title_arr[$i];
							$post_content = $content_arr[$i];
							$post_tags = $tags_arr[$i];							
							$data['post_title'] = $post_title;
							$data['post_content'] = $post_content;
							$data['tags_input'] = $post_tags;						
							if($eID = wp_insert_post( $data )) {
								if ($page_template !='default') {
									update_post_meta($eID, '_wp_page_template', $page_template);
								}
							}												
						}
					}
					
					include 'templates/add-quick-post.php';
					break;
			}
		}
		
		public function print_scripts()
		{
			wp_enqueue_script('jquery');
			wp_enqueue_script('quick-post', $this->plugin_url . 'js/quick-posts.js', array('jquery'));
		}
	}
}

if (class_exists('QuickPosts'))
{
	$quickposts = new QuickPosts();
	register_activation_hook(__FILE__, array(&$quickposts, 'install'));
}


?>