<div class="wrap about-wrap full-width-layout qlwrap">
	<form id="qltgm_contacts_form" method="post">
		<div class="submit">
		<?php submit_button( esc_html__( '+ Contact', 'quadlayers-telegram-chat' ), 'secondary', 'submit', false, array( 'id' => 'qltgm_contact_add' ) ); ?>
		<?php
		submit_button(
			esc_html__( 'Save reorder', 'quadlayers-telegram-chat' ),
			'primary',
			'submit',
			false,
			array(
				'id'       => 'qltgm_contact_order',
				'disabled' => 'disabled',
			)
		);
		?>
		<span class="settings-save-status">
			<span class="spinner"></span>
			<span class="saved"><?php esc_html_e( 'Saved successfully!' ); ?></span>
		</span>
		</div>

		<table id="qltgm_contacts_table" class="form-table widefat striped">
		<thead>
			<tr>
			<th style="text-align: center;"><?php esc_html_e( 'Order', 'quadlayers-telegram-chat' ); ?></th>
			<th><?php esc_html_e( 'Avatar', 'quadlayers-telegram-chat' ); ?></th>
			<th><?php esc_html_e( 'Username', 'quadlayers-telegram-chat' ); ?></th>
			<th><?php esc_html_e( 'Name', 'quadlayers-telegram-chat' ); ?></th>
			<th><?php esc_html_e( 'Label', 'quadlayers-telegram-chat' ); ?></th>
			<th><?php esc_html_e( 'Chat', 'quadlayers-telegram-chat' ); ?></th>
			<th><?php esc_html_e( 'Availability', 'quadlayers-telegram-chat' ); ?></th>
			<th><?php esc_html_e( 'Timezone', 'quadlayers-telegram-chat' ); ?></th>
			<th><?php esc_html_e( 'Actions', 'quadlayers-telegram-chat' ); ?></th>
			</tr>
		</thead>
		<tbody class="ui-sortable">
			<?php if ( count( $contacts ) ) : ?>
			<?php
			$position = 1;
				foreach ( $contacts as $id => $contact ) {
					?>
				<tr data-contact_id="<?php echo esc_attr( $id ); ?>" data-contact_position="<?php echo esc_attr( $position ); ?>">
				<td class="sort ui-sortable-handle">
					<div class="wc-item-reorder-nav">
					<button type="button" class="wc-move-up " tabindex="-1" aria-hidden="true" aria-label="
					<?php
					// echo ///esc_attr(sprintf(__('Move the "%s" payment method up', 'quadlayers-telegram-chat'), $contact['label']));
					?>
																											"><?php esc_html_e( 'Move up', 'quadlayers-telegram-chat' ); ?></button>
					<button type="button" class="wc-move-down" tabindex="0" aria-hidden="false" aria-label="
					<?php
					// echo esc_attr(sprintf(__('Move the "%s" payment method down', 'quadlayers-telegram-chat'), $field['label']));
					?>
																											"><?php esc_html_e( 'Move down', 'quadlayers-telegram-chat' ); ?></button>
					<input type="hidden" name="contact_id[]" value="<?php echo esc_attr( $id ); ?>">
					</div>
				</td>
				<td>
					<img class="qltgm-avatar" src="<?php echo esc_url( $contact['avatar'] ); ?>" alt="<?php echo esc_html( $contact['firstname'] . ', ' . $contact['lastname'] ); ?>" width="50" height="50" />
				</td>
				<td><?php echo esc_html( $contact['username'] ); ?></td>
				<td><?php echo esc_html( $contact['firstname'] . ', ' . $contact['lastname'] ); ?> </td>
				<td><?php echo esc_html( $contact['label'] ); ?></td>
				<td>
					<i class="dashicons dashicons-<?php echo ( $contact['chat'] ? 'yes' : 'no' ); ?>"></i>
				</td>
				<td><?php printf( '%s to %s', $contact['timefrom'], $contact['timeto'] ); ?></td>
				<td><?php echo esc_html( $contact['timezone'] ); ?></td>
				<td>
					<a class="qltgm_settings_edit button" aria-label="<?php esc_html_e( 'Edit checkout field', 'quadlayers-telegram-chat' ); ?>" href="javascript:;"><?php esc_html_e( 'Edit' ); ?></a>
					<a class="qltgm_settings_delete" aria-label="<?php esc_html_e( 'Edit checkout field', 'quadlayers-telegram-chat' ); ?>" href="javascript:;"><?php esc_html_e( 'Delete' ); ?></a>
				</td>
				</tr>
				<?php
				++$position;
				}
				?>
		</tbody>
		<?php endif; ?>
		</table>
		<?php wp_nonce_field( 'qltgm_delete_contact', 'qltgm_delete_contact_nonce' ); ?>
	</form>
	</div>

	<?php require_once 'modals/template-scripts.php'; ?>
