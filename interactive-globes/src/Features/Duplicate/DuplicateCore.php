<?php
namespace Saltus\WP\Plugin\Saltus\InteractiveGlobes\Features\Duplicate;

use Saltus\WP\Framework\Infrastructure\Plugin\Registerable;

/**
 * The Shortcode class
 */
class DuplicateCore implements Registerable {

	public function __construct( ...$dependencies ) {}
	/**
	 * Register Shortcode
	 */
	public function register() {
		// Hook the function to admin_footer
		add_action( 'saltus/duplicate_post/after', [ $this, 'extend_globe_duplicate' ], 10, 3 );
	}

	/**
	 * Extend the duplicate functionality for the globe post type
	 *
	 * @return void
	 */
	function extend_globe_duplicate($post_type, $post_id, $new_post_id) {
		// Check if the post type is 'iglobe'
		if ($post_type !== 'iglobe') {
			return;
		}
	
		// Query for all posts that have the meta field 'globe_id' equal to $post_id
		$args = [
			'posts_per_page' => -1,
			'post_status'    => 'any',
			'post_type'      => get_post_types(), // when using 'any' it didn't work
			'meta_query'     => array(
				array(
					'key'     => 'globe_id',
					'value'   => $post_id,
					'compare' => '=',
					'type'    => 'NUMERIC',
				),
			),
		];
		
		$posts = get_posts($args);
	
		// Loop through the results
		foreach ($posts as $post) {
			// Create a copy of the post
			$new_post = array(
				'post_title'    => $post->post_title,
				'post_content'  => $post->post_content,
				'post_status'   => $post->post_status,
				'post_type'     => $post->post_type,
				'post_author'   => $post->post_author,
				'post_excerpt'  => $post->post_excerpt,
				'post_name'     => $post->post_name,
				'post_date'     => $post->post_date,
				'post_date_gmt' => $post->post_date_gmt,
			);
	
			$new_clone_id = wp_insert_post($new_post);
	
			// Clone all meta data
			$meta_data = get_post_meta($post->ID);
			foreach ($meta_data as $key => $values) {
				foreach ($values as $value) {
					update_post_meta($new_clone_id, $key, maybe_unserialize($value));
				}
			}
	
			// Change the globe_id meta field of the new post
			update_post_meta($new_clone_id, 'globe_id', $new_post_id);
		}
	}
}
