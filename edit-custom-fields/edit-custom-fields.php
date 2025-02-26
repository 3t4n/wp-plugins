<?php
/*
Plugin Name: Edit Custom Fields
Plugin URI:
Description: A simple interface to edit or delete Custom Fields.
Version: 0.1.10
Author: Jay Sitter
Author URI: http://www.jaysitter.com/
Text Domain: edit-custom-fields
License: GPL2
*/

add_action( 'admin_menu', 'ecf_menu' );

// Add link to the Tools menu
function ecf_menu() {
	add_submenu_page( 'tools.php', 'Edit Custom Fields', 'Edit Custom Fields', 'delete_others_posts', 'ecf-options', 'ecf_options' );
}

// Render the options page
function ecf_options() {
	global $wpdb;
	?>

	<div class="wrap">

		<?php

		$nonce = isset( $_REQUEST['_wpnonce'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['_wpnonce'] ) ) : '';
		if ( isset( $_POST['delete'] ) ) { // If the user has confirmed a delete action
			if ( 'confirm' === $_POST['delete'] ) {

				if ( ! wp_verify_nonce( $nonce, 'ecf_delete' ) ) {
					die( wp_kses_post( __( 'Nonce doesn&rsquo;t match', 'edit-custom-fields' ) ) );
				}

				if ( isset( $_POST['checkbox'] ) ) {
					$checkboxes = array_map( 'sanitize_text_field', wp_unslash( $_POST['checkbox'] ) );

					foreach ( $checkboxes as $key => $value ) {
						$wpdb->delete( $wpdb->postmeta, array( 'meta_key' => sanitize_text_field( $value ) ) );
					}
				}
				echo '<h2>', wp_kses_post( __( 'Success! The custom fields have been deleted.', 'edit-custom-fields' ) ), '</h2>';
			} else {
				echo '<h2>', wp_kses_post( __( 'Something went wrong.', 'edit-custom-fields' ) ), '</h2>';
			}
		} elseif ( isset( $_POST['rename'] ) ) {

			if ( 'confirm' === $_POST['rename'] || 'undo' === $_POST['rename'] ) {
				if ( ! wp_verify_nonce( $nonce, 'ecf_rename' ) ) {
					die( wp_kses_post( __( 'Nonce doesn&rsquo;t match', 'edit-custom-fields' ) ) );
				}

				if ( 'confirm' === $_POST['rename'] ) {
					echo '<h2>', wp_kses_post( __( 'Custom Field renaming complete.', 'edit-custom-fields' ) ), '</h2>';
				} else {
					echo '<h2>', wp_kses_post( __( 'Renaming has been undone.', 'edit-custom-fields' ) ), '</h2>';
				}

				$success = false;

				if ( isset( $_POST['old_values'] ) ) {
					$old_values = array_map( 'sanitize_text_field', wp_unslash( $_POST['old_values'] ) );
					foreach ( $old_values as $key => $value ) {
						$existing = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $wpdb->postmeta WHERE meta_key = %s", sanitize_text_field( $value ) ) );
						if ( count( $existing ) > 0 ) {
							// translators: Custom field could not be renamed message
							echo '<p style="color:red;">', sprintf( wp_kses_post( __( 'The Custom Field "%1$s" could not be renamed to "%2$s" because a Custom Field with that key already exists.', 'edit-custom-fields' ) ), esc_html( $key ), esc_html( $value ) ), '</p>';
						} else {
							$wpdb->update( $wpdb->postmeta, array( 'meta_key' => sanitize_text_field( $value ) ), array( 'meta_key' => sanitize_text_field( $key ) ) );
								// translators: Custom field was renamed message
							echo '<p>', sprintf( wp_kses_post( __( 'The Custom Field "%1$s" was renamed to "%2$s".', 'edit-custom-fields' ) ), esc_html( $key ), esc_html( $value ) ), '</p>';
							$success = true;
						}
					}
				}

				if ( $success && 'confirm' === $_POST['rename'] ) {
					?>

					<form method="post" action="">

						<input type="hidden" name="rename" value="undo">

						<?php
						if ( isset( $_POST['old_values'] ) ) {
							$old_values = array_map( 'sanitize_text_field', wp_unslash( $_POST['old_values'] ) );
							foreach ( $old_values as $key => $value ) {
								$existing = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $wpdb->postmeta WHERE meta_id = %s", sanitize_text_field( $value ) ) );
								if ( ! count( $existing ) > 0 ) {
									echo '<input type="hidden" name="old_values[', esc_attr( $value ), ']" value="' . esc_attr( $key ) . '">';
									wp_nonce_field( 'ecf_rename' );
								}
							}
						}

						submit_button( __( 'Undo', 'edit-custom-fields' ), 'update' );
						?>
					</form>
					<?php
				}
			} else {
				?>

				<h2>Enter new Custom Field names</h2>

				<form method="post" action="">

					<table>

					<?php
					$checkboxes = array_map( 'sanitize_text_field', wp_unslash( $_POST['checkbox'] ) );
					foreach ( $checkboxes as $key => $value ) {
						?>

						<tr>
							<td><label><?php echo esc_html( $value ); ?></label></td>
							<td><input name="old_values[<?php echo esc_attr( $value ); ?>]" value="<?php echo esc_attr( $value ); ?>"></td>
						</tr>

					<?php } ?>

					</table>

					<input type="hidden" value="confirm" name="rename">
					<?php wp_nonce_field( 'ecf_rename' ); ?>
					<?php submit_button( __( 'Rename', 'edit-custom-fields' ), 'update' ); ?>

				</form>

			<?php } ?>

		<?php } elseif ( isset( $_POST['submit'] ) ) { // If the user has confirmed a delete action ?>

			<h2><?php echo wp_kses_post( __( 'Confirm Custom Field Deletion', 'edit-custom-fields' ) ); ?></h2>

			<p><?php echo wp_kses_post( __( 'The following custom fields will be <em><strong>IRREVOCABLY DELETED:</strong></em>', 'edit-custom-fields' ) ); ?></p>

			<ul>
			<?php
			$checkboxes = array_map( 'sanitize_text_field', wp_unslash( $_POST['checkbox'] ) );
			foreach ( $checkboxes as $key => $value ) {
					echo '<li>', esc_html( $value ), '</li>';
			}
			?>
			</ul>

			<hr>

			<p><?php echo wp_kses_post( __( 'The following corresponding content will <em>also</em> be <em><strong>IRREVOCABLY DELETED:</strong></em>', 'edit-custom-fields' ) ); ?></p>

			<form method="post" action="">

				<style>
				<!--
					table.ecf { border-collapse: collapse; }
					table.ecf td, table.ecf th { padding: 0.5em; border: 1px solid #000; }
				-->
				</style>

				<table class="ecf">

					<thead>
						<tr>
							<th><?php echo wp_kses_post( __( 'Post Title', 'edit-custom-fields' ) ); ?></th>
							<th><?php echo wp_kses_post( __( 'Custom Field Value', 'edit-custom-fields' ) ); ?></th>
						</tr>
					</thead>

					<tbody>
						<?php
						$checkboxes = array_map( 'sanitize_text_field', wp_unslash( $_POST['checkbox'] ) );
						foreach ( $checkboxes as $key => $value ) {
							echo '<input type="hidden" name="checkbox[]" value="' . esc_attr( $value ) . '">';
							echo '<tr><td colspan="2"><h3>', esc_html( $value ), '</h3></td></tr>';

							$rows = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $wpdb->postmeta WHERE meta_key = %s", sanitize_text_field( $value ) ) );

							foreach ( $rows as $row ) {
								echo '<tr>';
									echo '<td><a target="_blank" href="' . esc_attr( get_permalink( $row->post_id ) ) . '">', esc_html( get_the_title( $row->post_id ) ),'</a></td>';
									echo '<td>', esc_html( $row->meta_value ), '</td>';
								echo '</tr>';
							}
						}
						?>
					</tbody>

				</table>
				<?php submit_button( __( 'Yes, DEFINITELY delete these custom fields', 'edit-custom-fields' ), 'delete' ); ?>
				<?php wp_nonce_field( 'ecf_delete' ); ?>
				<input type="hidden" value="confirm" name="delete">
			</form>

		<?php } else { // User hasn't submitted anything yet; show the list of checkboxes ?>

			<h2><?php echo wp_kses_post( __( 'Edit custom fields', 'edit-custom-fields' ) ); ?></h2>

			<?php
			$custom_fields = $wpdb->get_results( "SELECT distinct(`meta_key`) FROM $wpdb->postmeta HAVING meta_key NOT LIKE '\_%'" );
			$custom_fields = $wpdb->get_results( $wpdb->prepare( 'SELECT distinct(`meta_key`) FROM ' . $wpdb->postmeta . ' HAVING meta_key NOT LIKE %s', '\_%' ) );

			if ( $custom_fields ) {
				?>

			<div>
				<form method="post" action="">

					<ul>
						<?php

						foreach ( $custom_fields as $custom_field ) {
							$cf_instances = $wpdb->get_results( $wpdb->prepare( 'SELECT * FROM ' . $wpdb->prefix . 'postmeta WHERE meta_key = %s', $custom_field->meta_key ) );
							echo '<li>';
							echo '<input type="checkbox" id="cf_' . esc_attr( $custom_field->meta_key ) . '" name="checkbox[]" value="' . esc_attr( $custom_field->meta_key ) . '">';
							echo ' <label for="cf_' . esc_attr( $custom_field->meta_key ) . '">', esc_attr( $custom_field->meta_key ), ' (Used by ' . count( $cf_instances ) . ' posts )</label></li>';
						}

						echo '</ul>';

						?>
					</ul>
					<?php submit_button( __( 'Delete Checked Custom Fields', 'edit-custom-fields' ), 'delete' ); ?>
					<?php submit_button( __( 'Rename Checked Custom Fields', 'edit-custom-fields' ), 'update', 'rename' ); ?>
				</form>
			</div>

			<?php } else { ?>

				<h2><?php echo wp_kses_post( __( 'There are no custom fields to edit.', 'edit-custom-fields' ) ); ?></h2>

			<?php } ?>

		<?php } ?>

	</div>

	<?php
}
?>
