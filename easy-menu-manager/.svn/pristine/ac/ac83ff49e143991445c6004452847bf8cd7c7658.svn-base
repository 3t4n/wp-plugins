<?php
/**
 * Loads all the custom fields
 *
 * template-name :: nav-menu-fieldset
 *
 * @since 1.00.00
 */

defined( 'ABSPATH' ) || exit;

$nonce_id = MenuFields::NONCE_KEY . '_' . $item_id;
?>
<p class="field-custom description-wide">
	<label for="edit-menu-item-custom-<?php echo esc_attr( $item_id ); ?>">
		<?php esc_html_e('Only Visible to Roles:', 'easy-menu-manager' ); ?><br/>
		<select
      id="edit-menu-item-custom-<?php echo esc_attr( $item_id ); ?>"
      class="widefat code edit-menu-item-custom"
      name="menu-item-custom[<?php echo esc_attr( $item_id ); ?>][]"
      multiple="multiple"
    >
			<?php foreach ( $user_roles as $role_key => $role ) : ?>
				<option value="<?php echo esc_attr( $role_key ); ?>" <?php selected( in_array( $role_key, $selected_roles ) ); ?>>
					<?php echo esc_html( $role['name'] ); ?>
				</option>
			<?php endforeach; ?>
      <?php wp_nonce_field( $nonce_id, $nonce_id ); ?>
		</select>
	</label>
</p>
