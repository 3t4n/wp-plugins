<?php
namespace WCPress\EasyMenuManager;

defined( 'ABSPATH' ) || exit;

/**
 * Manages menu field
 *
 * @since 1.00.00
 */
class MenuFields {

	/**
	 * Menu meta key for saving data
	 *
	 * @since 1.00.00
	 */
	const ALLOWED_ROLES_META_KEY = Constants::PREFIX . 'allowed_roles_meta_key';

	/**
	 * Nonce key
	 *
	 * @since 1.00.00
	 */
	const NONCE_KEY = Constants::PREFIX . 'menu_nonce_key';

//	const ROLE_KEY

	/**
	 * Initializing the hooks
	 *
	 * @since 1.00.00
	 *
	 * @return void
	 */
	public function __construct() {
		add_action( 'wp_nav_menu_item_custom_fields', [ $this, 'addFields' ] );
		add_action( 'wp_update_nav_menu_item', [ $this, 'saveFields' ], 10, 2 );
	}

	/**
	 * Adds menu field on menu panel
	 *
	 * @since 1.00.00
	 *
	 * @param $item_id
	 *
	 * @return void
	 */
	public function addFields( $item_id ) {
		$user_roles = get_editable_roles();
		$selected_roles = get_post_meta( $item_id, MenuFields::ALLOWED_ROLES_META_KEY, true );
		$selected_roles = is_array( $selected_roles ) ? $selected_roles : array();
		$template_loader = TemplateLoader::init();
		$template_loader->loadTemplate( 'nav-menu-fieldset.php', 'nav-menu-fieldset', [
			'item_id' => $item_id,
			'user_roles' => $user_roles,
			'selected_roles' => $selected_roles,
		] );
	}

	/**
	 * Saves menu field in DB
	 *
	 * @since 1.00.00
	 *
	 * @param $menu_id
	 * @param $menu_item_db_id
	 *
	 * @return void
	 */
	public function saveFields( $menu_id, $menu_item_db_id ) {
		$nonce_key = self::NONCE_KEY . '_' . $menu_item_db_id;
		// Nonce check
		if(
			! isset( $_POST[ $nonce_key ] )
			|| ! wp_verify_nonce(
				sanitize_text_field( wp_unslash( $_POST[ $nonce_key ] ) ),
				$nonce_key
			)
		) {
			return;
		}

		if ( isset( $_REQUEST['menu-item-custom'][ $menu_item_db_id ] ) ) {
			update_post_meta(
				$menu_item_db_id,
				MenuFields::ALLOWED_ROLES_META_KEY,
				array_map(
					'sanitize_text_field',
					$_REQUEST['menu-item-custom'][ $menu_item_db_id ]
				)
			);
		} else {
			update_post_meta( $menu_item_db_id, MenuFields::ALLOWED_ROLES_META_KEY, [] );
		}
	}
}