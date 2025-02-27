<?php

namespace Codemanas\CmBlocks\Enhancement\BlockVisibility;

use WP_User;

class UserRoles {
	private static ?UserRoles $_instance = null;

	public static function get_instance(): ?UserRoles {
		return ( self::$_instance == null ) ? self::$_instance = new self() : self::$_instance;
	}

	private function __construct() {
		add_filter( 'cmblocks_visibility_render_block_content', [ $this, 'maybe_render_block_content' ], 20, 2 );
	}

	/**
	 * Conditionally renders block content based on user role visibility rules.
	 *
	 * @param  string  $block_content  The content of the block to potentially render.
	 * @param  array  $cmblocksVisibility  An array defining visibility rules and conditions.
	 *
	 * @return string The block content if conditions are met, or an empty string otherwise.
	 */
	public function maybe_render_block_content( string $block_content, array $cmblocksVisibility ): string {
		if ( ! isset( $cmblocksVisibility['userRoles'] ) ) {
			return $block_content;
		}
		$rule = $cmblocksVisibility['userRoles']['rule'] ?? null;
		switch ( $rule ) {
			case 'logged-in':
				return is_user_logged_in() ? $block_content : '';
			case 'logged-out':
				return ! is_user_logged_in() ? $block_content : '';
			case 'user-roles':
				$selectedRoles = $cmblocksVisibility['userRoles']['selectedRoles'] ?? [];
				$show = $cmblocksVisibility['userRoles']['display'] ?? true;
				if ( ! is_array( $selectedRoles ) || empty( $selectedRoles ) ) {
					return $block_content;
				}
				//show if display condition is true and user has the selected role
				return $this->current_user_has_role( $selectedRoles ) && $show? $block_content : '';
			default:
				return $block_content;
		}
	}

	/**
	 * Check if the current user has a specific role or array of roles.
	 *
	 * @param  string|array  $roles  Role or roles to check.
	 *
	 * @return bool True if the current user has any of the specified roles, false otherwise.
	 */
	private function current_user_has_role( $roles ): bool {
		// Get the current user's data
		$user = wp_get_current_user();

		// If no user is logged in, return false
		if ( ! ( $user instanceof WP_User ) ) {
			return false;
		}

		// Convert single role to an array
		if ( is_string( $roles ) ) {
			$roles = array( $roles );
		}

		// Check if user has any of the roles
		foreach ( $roles as $role ) {
			if ( in_array( $role, $user->roles ) ) {
				return true;
			}
		}

		return false;
	}
}