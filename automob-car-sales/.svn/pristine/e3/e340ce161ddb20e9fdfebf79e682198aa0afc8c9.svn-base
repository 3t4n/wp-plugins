<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class AutomobPageTable
{

	public function getAll()
	{
 		$args=array(
		  'order'=>"asc",
		  'post_type' => "page",
		  'post_status' => 'publish',
		  'posts_per_page' => -1,
		  'ignore_sticky_posts'=> 1);

		$my_query = null;
		$my_query = new WP_Query($args);
		$posts = $my_query->get_posts();
		wp_reset_query();
		return $posts;
	}

	public function getByID($id)
	{
		///TODO replace with correct filter args
		$pages = $this->getAll();

		foreach ($pages as $page) {
			if ($page->ID==$id) {
				return $page;
			}	
		}
		
		return false;
	}
}