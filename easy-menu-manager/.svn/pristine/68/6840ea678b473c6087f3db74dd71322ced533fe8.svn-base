<?php
namespace WCPress\EasyMenuManager;

defined( 'ABSPATH' ) || exit;

/**
 * Filters menu field before rendering the menu
 *
 * @since 1.00.00
 */
class FilterMenuFields {

	/**
	 * Initializing the hooks
	 *
	 * @since 1.00.00
	 *
	 * @return void
	 */
	public function __construct() {
		add_filter( 'wp_nav_menu_objects', [ $this, 'filterMenuByRoles' ] );
	}

	/**
	 * If the current role user can see the menu
	 *
	 * @since 1.00.00
	 *
	 * @param array $items
	 *
	 * @return array
	 */
	public function filterMenuByRoles( $items ): array {
		foreach ( $items as $key => $item ) {
			// Get selected roles for the current menu item
			$selected_roles = get_post_meta( $item->ID, MenuFields::ALLOWED_ROLES_META_KEY, true );
			// If roles are selected and user doesn't have any of those roles, remove the menu item
			if ( ! empty( $selected_roles ) && ! $this->currentUserCanAny( $selected_roles ) ) {
				unset( $items[ $key ] );
			}
		}

		return $items;
	}

	/**
	 * Checks capability of the user
	 *
	 * @since 1.00.00
	 *
	 * @param array $roles
	 *
	 * @return bool
	 */
	protected function currentUserCanAny( $roles ): bool {
		$user = wp_get_current_user();
		foreach ($roles as $role) {
			if (in_array($role, $user->roles)) {
				return true;
			}
		}
		return false;
	}

}