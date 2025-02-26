<?php
/**
 * Abstract Post_Actions_Addon
 *
 * @version           1.0.0
 */

namespace AWSA_Core\Post_Actions;

/**
 * Abstract Post_Actions_Addon
 *
 * @since   1.0.0
 * @version 1.0.0
 */
abstract class Post_Actions_Addon {

	/**
	 * Get Actions
	 *
	 * @param array $action_groups
	 * @param int   $post_id
	 *
	 * @return array
	 */
	abstract public static function get_actions( array $action_groups, int $post_id ): array;

	/**
	 * Can Run Action
	 *
	 * @param bool   $can
	 * @param string $action_key
	 * @param int    $post_id
	 *
	 * @return boolean
	 */
	abstract public static function can_run_action( bool $can, string $action_key, int $post_id ): bool;

	/**
	 * Display Actions Properties
	 *
	 * @param string $action
	 * @param string $name
	 * @param int    $post_id
	 *
	 * @return void
	 */
	abstract public static function actions_properties( string $action, string $name, int $post_id ): void;

	/**
	 * Ajax Process
	 *
	 * @param array  $r
	 * @param string $action
	 * @param array  $data
	 * @param int    $post_id
	 *
	 * @return array
	 */
	abstract public static function ajax_process( array $r, string $action, array $data, int $post_id ): array;

	/**
	 * Display Info in Meta Box Report
	 *
	 * @param \WP_POST|int $post
	 *
	 * @return void
	 */
	abstract public static function info_meta_box( $post ): void;

}
