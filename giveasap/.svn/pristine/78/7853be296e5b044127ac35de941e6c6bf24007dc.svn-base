<?php

use Simple_Giveaways\Helpers;

if ( ! defined( 'ABSPATH' ) ) {
	return;
}

/**
 * Add Metabox to display user information
 *
 * @return void
 */
function giveasap_add_metabox_for_users() {
	add_meta_box( 'giveasap_users', __( 'Users', 'giveasap' ), 'giveasap_metabox_users', array( 'giveasap' ), 'side', 'high' );
	add_meta_box( 'giveasap_ideas', __( 'Have an Idea?', 'giveasap' ), 'giveasap_metabox_ideas', array( 'giveasap' ), 'side', 'low' );
}
add_action( 'add_meta_boxes', 'giveasap_add_metabox_for_users' );



/**
 * Rendering users and user actions in metabox
 *
 * @param  \WP_Post $post Post object
 * @return void
 */
function giveasap_metabox_users( $post ) {
	$post_id          = $post->ID;
	$giveaway         = giveasap_get_giveaway( $post );
	$registered_users = giveasap_get_entries_for( $post_id );
	$count_users      = 0;
	if ( $registered_users && is_array( $registered_users ) ) {
		$count_users = count( $registered_users );
	}

	?>
	<p>
		<?php esc_html_e( 'Registered users:', 'giveasap' ); ?> <strong><?php echo esc_html( $count_users ); ?></strong>
		<?php if ( $count_users > 0) { ?>
			 <a href="<?php echo esc_url_raw( admin_url( 'admin.php?page=giveasap-users&id=' . absint( $post->ID ) ) ); ?>"  class="button  button-small right"><?php esc_html_e( 'List Users', 'giveasap' ); ?></a>
		<?php } ?>
	</p>
	<?php if ( 'user_picker' === $giveaway->get_type() ) { ?>
		<p><em><?php esc_html_e( 'All registered users on this site can participate in this giveaway.', 'giveasap' ); ?></em></p>
		<?php
		$total_users = count_users();
		if ( count( $registered_users ) < absint( $total_users['total_users'] ) )
			?>
			<div>
				<button id="sgImportSiteUsers" data-giveaway="<?php echo esc_attr( absint( $post_id ) ); ?>" type="button" class="button button-primary">
					<?php esc_html_e( 'Import Site Users', 'giveasap' ); ?>
					<?php
					echo ' <span>(' . count( $registered_users ) . '/' . absint( $total_users['total_users'] ) . ')</span>';
					?>
				</button>

				<span id="sgImportSiteUsersSpinner" class="spinner"></span>
			</div>
			<?php
		?>
	<?php } ?>
	<?php
	do_action( 'sg_admin_metabox_users', $post );

	$winners              = giveasap_get_winners( $post_id );
	$all_winners_notified = true;
	if ( $winners ) {
		$prizes_settings = get_post_meta( $post_id, 'giveasap_prize', true );
		$prizes          = $prizes_settings && isset( $prizes_settings['prizes'] ) ? $prizes_settings['prizes'] : array();

		?>
		<div class="giveasap_winners">
			<strong><?php esc_html_e( 'Winners', 'giveasap' ); ?></strong>
			<table class="wp-list-table widefat fixed striped">
				<thead>
					<tr>
						<th><?php esc_html_e( 'Email', 'giveasap' ); ?></th>
						<th style="width: 60px;"><?php esc_html_e( 'Notified', 'giveasap' ); ?></th>
					</tr>
				</thead>
				<tbody>
				<?php
				foreach ( $winners as $index => $winner ) {
					if ( 'no' === $winner['emailed'] ) {
						$all_winners_notified = false;
					}

					$subscriber_id = isset( $winner['id'] ) ? absint( $winner['id'] ) : 0;
					if ( ! $subscriber_id ) {
						$user          = giveasap_get_user_by_email( $winner['email'], $post_id );
						$subscriber_id = $user->id;
					}
					?>
						<tr>
							<td>
								<a href="<?php echo esc_url_raw( admin_url( 'edit.php?post_type=giveasap&page=giveasap-users&user=' . absint( $subscriber_id ) . '&action=view' ) ); ?>"><?php echo esc_html( $winner['email'] ); ?></a>
							<?php
							if ( ! empty( $winner['prizes'] ) ) {
								?>
										<strong><?php esc_html_e( 'Prizes won:', 'giveasap' ); ?></strong>
										<ul style="margin:0;padding:0;list-style-type: none;">
									<?php
									foreach ( $winner['prizes'] as $winner_prize ) {
										?>
												<li><em><?php echo esc_html( $winner_prize['title'] ); ?></em></li>
											<?php
									}
									?>
										</ul>
									<?php
							}
							?>
							</td>
							<td><?php echo strtoupper( $winner['emailed'] ); ?></td>
						</tr>
                        <?php if ( ! $prizes ) { continue; } ?>

						<tr class="hidden sg-select-prizes-manual">
							<td colspan="2">
								<strong><?php echo esc_html( $winner['email'] ); ?></strong><br/>
								<select multiple class="widefat" name="sg_manual_prizes[<?php echo esc_attr( $index ); ?>][]">
								<?php
								foreach ( $prizes as $prize_index => $prize ) {
									$selected = false;
									if ( isset( $winner['prizes'] ) && $winner['prizes'] ) {
										foreach ( $winner['prizes'] as $winner_prize ) {
											if ( sanitize_title( $winner_prize['title'] ) === sanitize_title( $prize['title'] ) ) {
												$selected = true;
												break;
											}
										}
									}
									?>
										<option <?php selected( $selected, true, true ); ?> value="<?php echo esc_attr( $prize_index ); ?>"><?php echo esc_html( $prize['title'] ); ?></option>
										<?php
								}
								?>
								</select>
							</td>
						</tr>
						<?php
				}
				?>
				</tbody>
			</table>
            <?php if ( $prizes ) { ?>
                <input type="checkbox" class="sg-hidden" id="sg_awarding_prizes_manually" name="sg_awarding_prizes_manually" value="1" style="display:none !important;"/>
                <button type="button" class="button button-link" data-target=".sg-select-prizes-manual" data-class="hidden" id="sgToggleAwardPrizes"><?php esc_html_e( 'Award Prizes Manually', 'giveasap' ); ?></button>
			<?php } ?>
            <button type="submit" name="giveasap_export_winners" id="export_winners" class="button"><?php esc_html_e( 'Export Winner(s) CSV', 'giveasap' ); ?></button>
		</div>
		<script>

		</script>
		<br/>
		<?php
	}

	if ( 'giveasap_ended' === $post->post_status && $count_users > 0 ) {
		$prizes_settings   = get_post_meta( $post_id, 'giveasap_prize', true );
		$number_of_winners = ! empty( $prizes_settings['winners'] ) ? $prizes_settings['winners'] : 1;
		$winner_ids        = ! empty( $winners ) ? wp_list_pluck( $winners, 'id' ) : array();
		?>
		<div class="giveasap-winner-picker">
			<button type="button" name="giveasap_select" value="<?php echo esc_attr( $post_id ); ?>" id="pick_winners" data-class="hidden" data-target=".giveasap-winner-picker-options" class="button button-primary button-large sg-toggle"><?php esc_html_e( 'Pick Winner(s)', 'giveasap' ); ?></button>
			<div class="giveasap-winner-picker-options hidden">
				<p><?php esc_html_e( 'Once picked, save the giveaway to make the changes', 'giveasap' ); ?></p>
				<?php
				$found_winners = array();
				for ( $i = 0; $i < $number_of_winners; $i++ ) {
					?>
					<select name="giveasap_picked_winners[]">
						<?php
						foreach ( $registered_users as $subscriber ) {

							$selected = ! in_array( $subscriber->id, $found_winners, true ) && in_array( $subscriber->id, $winner_ids, true );
							if ( $selected ) {
								$found_winners[] = $subscriber->id;
							}
							?>
							<option <?php selected( true, $selected, true ); ?> value="<?php echo esc_attr( $subscriber->id ); ?>"><?php echo esc_html( $subscriber->email ); ?> - <?php echo esc_html( $subscriber->entries ); ?></option>
							<?php
						}
						?>
					</select>
					<?php
				}
				?>
			</div>
		</div>
		<button type="submit" name="giveasap_select" value="<?php echo esc_attr( $post_id ); ?>" class="button button-primary button-large"><?php esc_html_e( 'Select Winner(s)', 'giveasap' ); ?></button>
		<?php
	}

	if ( 'giveasap_winners' === $post->post_status && $count_users > 0 ) {
		$prizes_settings   = get_post_meta( $post_id, 'giveasap_prize', true );
		$number_of_winners = ! empty( $prizes_settings['winners'] ) ? $prizes_settings['winners'] : 1;
		$winner_ids        = ! empty( $winners ) ? array_map( 'absint', wp_list_pluck( $winners, 'id' ) ) : array();
		?>
		<p><button type="submit" name="giveasap_select" value="<?php echo esc_attr( $post_id ); ?>" id="sg-reselect-winners" class="button button-primary button-large"><?php esc_html_e( 'Reselect Winner(s)', 'giveasap' ); ?></button></p>
		<div class="giveasap-winner-picker">
			<button type="button" id="pick_winners" data-class="hidden" data-target=".giveasap-winner-picker-options" class="button button-primary button-large sg-toggle"><?php esc_html_e( 'Pick Winner(s)', 'giveasap' ); ?></button>
			<div class="giveasap-winner-picker-options hidden">
				<?php
				$found_winners = array();
				for ( $i = 0; $i < $number_of_winners; $i++ ) {
					?>
						<select name="giveasap_picked_winners[]">
						<?php
						foreach ( $registered_users as $subscriber ) {

							$selected = ! in_array( absint( $subscriber->id ), $found_winners, true ) && in_array( absint( $subscriber->id ), $winner_ids, true );
							if ( $selected ) {
								$found_winners[] = $subscriber->id;
							}
							?>
									<option <?php selected( true, $selected, true ); ?> value="<?php echo esc_attr( $subscriber->id ); ?>"><?php echo esc_html( $subscriber->email ); ?> - <?php echo esc_html( $subscriber->entries ); ?></option>
								<?php
						}
						?>
						</select>
						<?php
				}
				?>
				<p>
					<button type="submit" name="giveasap_pick_winners" value="<?php echo esc_attr( $post_id ); ?>"  class="button button-primary button-large"><?php esc_html_e( 'Submit Picked Winner(s)', 'giveasap' ); ?></button>
				</p>
			</div>
		</div>
		<button type="submit" name="giveasap_notify" id="notify" class="button button-primary button-large"><?php esc_html_e( 'Notify Winner(s)', 'giveasap' ); ?></button>
		<?php
	}

	if ( 'giveasap_notified' === $post->post_status && ! $all_winners_notified ) {
		?>
		<button type="submit" name="giveasap_notify" id="notify" class="button button-primary button-large"><?php esc_html_e( 'Notify Winner(s)', 'giveasap' ); ?></button>
		<?php
	}
	?>

	<?php if ( $count_users > 0 ) { ?>
		<button type="submit" name="giveasap_export" id="export" class="button  button-large"><?php esc_html_e( 'Export CSV', 'giveasap' ); ?></button>
		<?php
	}

	?>
	<hr/>
	<p><strong><?php esc_html_e( 'Have you checked out our integrations section? You can enhance your experience on new giveaways!', 'giveasap' ); ?></strong></p>
	<a target="_blank" href="<?php echo admin_url( 'edit.php?post_type=giveasap&page=giveasap_integrations' ); ?>" class="button button-default"><?php esc_html_e( 'Go to Integrations', 'giveasap' ); ?></a>
	<?php
}

add_action( 'admin_init', 'giveasap_admin_end_giveaway', 99 );

/**
 * End Giveaway on Request
 *
 * @since  2.6.2
 *
 * @return void
 */
function giveasap_admin_end_giveaway() {

	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	if ( isset( $_REQUEST['giveasap_end'] ) ) {

		$post_id = isset( $_REQUEST['post_ID'] ) ? absint( $_REQUEST['post_ID'] ) : absint( $_REQUEST['giveasap_end'] );

		if ( ! $post_id ) {
			return;
		}

		if ( isset( $_GET['action'] ) ) {
			unset( $_GET['action'] );
		}
		if ( isset( $_GET['message'] ) ) {
			unset( $_GET['message'] );
		}

		$set_status = giveasap_set_status( $post_id, 'giveasap', 'giveasap_ended' );

		wp_safe_redirect( admin_url( 'post.php?post=' . absint( $post_id ) . '&action=edit&message=20' ), '301' );
		exit();
	}
}

add_action( 'admin_init', 'giveasap_metabox_users_select_winner', 99 );

/**
 * Select winners
 *
 * @return void
 */
function giveasap_metabox_users_select_winner() {

	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	if ( isset( $_REQUEST['giveasap_select'] ) ) {

		$post_id = isset( $_REQUEST['post_ID'] ) ? absint( $_REQUEST['post_ID'] ) : absint( $_REQUEST['giveasap_select'] );

		if ( ! $post_id ) {
			return false;
		}

		if ( isset( $_GET['action'] ) ) {
			unset( $_GET['action'] );
		}
		if ( isset( $_GET['message'] ) ) {
			unset( $_GET['message'] );
		}

		$selected = giveasap_select_winner( $post_id );

		if ( $selected ) {

			$set_status = giveasap_set_status( $post_id, 'giveasap', 'giveasap_winners', 'giveasap_ended' );

			wp_safe_redirect( admin_url( 'post.php?post=' . absint( $post_id ) . '&action=edit&message=21' ), '301' );
			exit();
		}
	}
}

add_action( 'admin_init', 'giveasap_metabox_users_pick_winner', 99 );

/**
 * Select winners
 *
 * @return void
 */
function giveasap_metabox_users_pick_winner() {

	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	if ( isset( $_REQUEST['giveasap_pick_winners'] ) ) {

		$post_id = isset( $_REQUEST['post_ID'] ) ? absint( $_REQUEST['post_ID'] ) : absint( $_REQUEST['giveasap_pick_winners'] );

		if ( ! $post_id ) {
			return false;
		}

		if ( isset( $_GET['action'] ) ) {
			unset( $_GET['action'] );
		}

		if ( isset( $_GET['message'] ) ) {
			unset( $_GET['message'] );
		}

		$picked_winners = isset( $_REQUEST['giveasap_picked_winners'] ) ? Helpers::unslash_and_clean( $_REQUEST['giveasap_picked_winners'] ) : false;
		$winners        = giveasap_get_winners( $post_id );
		if ( $picked_winners ) {
			$picked_winners  = array_map( 'absint', $picked_winners );
			$winners_default = array(
				'id'      => '',
				'email'   => '',
				'emailed' => 'no',
				'prizes'  => array(),
			);

			$new_winners = array();
			$winner_ids  = array();
			foreach ( $winners as $winner ) {
				$winner_id = absint( $winner['id'] );
				if ( ! in_array( $winner_id, $picked_winners ) ) {
					giveasap_delete_meta( $winner['id'], 'winner' );
					continue;
				}

				$new_winners[] = $winner;
			}

			if ( $new_winners ) {
				$winner_ids = array_map( 'absint', wp_list_pluck( $new_winners, 'id' ) );
			}

			foreach ( $picked_winners as $picked_id ) {
				if ( in_array( absint( $picked_id ), $winner_ids, true ) ) {
					continue;
				}

				$subscriber = giveasap_get_subscriber( $picked_id );
				$email      = $subscriber->get_email();
				if ( $email ) {
					$new_winners[] = wp_parse_args(
						array(
							'id'    => $picked_id,
							'email' => $email,
						),
						$winners_default
					);
				}
			}
		}

		if ( $new_winners ) {
			giveasap_update_winners( $new_winners, $post_id );
			$set_status = giveasap_set_status( $post_id, 'giveasap', 'giveasap_winners', 'giveasap_ended' );

			wp_safe_redirect( admin_url( 'post.php?post=' . absint( $post_id ) . '&action=edit&message=21' ), '301' );
			exit();
		}
	}
}

add_action( 'admin_init', 'giveasap_metabox_users_notify_winners', 99 );

function giveasap_metabox_users_notify_winners() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	if ( isset( $_REQUEST['giveasap_notify'] ) ) {

		$post_id = isset( $_REQUEST['post_ID'] ) ? absint( $_REQUEST['post_ID'] ) : absint( $_REQUEST['giveasap_notify'] );

		if ( ! $post_id ) {
			return false;
		}
		if ( isset( $_GET['action'] ) ) {
			unset( $_GET['action'] );
		}
		if ( isset( $_GET['message'] ) ) {
			unset( $_GET['message'] );
		}

		$winners = giveasap_get_winners( $post_id );

		giveasap_notify_winners( $winners, $post_id );

		giveasap_set_status( $post_id, 'giveasap', 'giveasap_notified', 'giveasap_winners' );
		wp_safe_redirect( admin_url( 'post.php?post=' . absint( $post_id ) . '&action=edit&message=22' ), '301' );
		exit();
	}
}

add_action( 'admin_init', 'giveasap_metabox_users_remind', 99 );
function giveasap_metabox_users_remind() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	if ( isset( $_REQUEST['giveasap_remind'] ) ) {

		$post_id = isset( $_REQUEST['post_ID'] ) ? absint( $_REQUEST['post_ID'] ) : absint( $_REQUEST['giveasap_remind'] );

		if ( ! $post_id ) {
			return false;
		}

		if ( isset( $_GET['action'] ) ) {
			unset( $_GET['action'] );
		}
		if ( isset( $_GET['message'] ) ) {
			unset( $_GET['message'] );
		}

		giveasap_remind_subscribers( $post_id );

		wp_safe_redirect( admin_url( 'post.php?post=' . $post_id . '&action=edit&message=24' ), '301' );
		exit();
	}
}

add_action( 'admin_init', 'giveasap_metabox_users_export', 99 );
function giveasap_metabox_users_export() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	if ( isset( $_REQUEST['giveasap_export'] ) ) {
		$post_id = isset( $_REQUEST['post_ID'] ) ? absint( $_REQUEST['post_ID'] ) : absint( $_REQUEST['giveasap_export'] );

		if ( ! $post_id ) {
			return false;
		}

		if ( isset( $_GET['action'] ) ) {
			unset( $_GET['action'] );
		}
		if ( isset( $_GET['message'] ) ) {
			unset( $_GET['message'] );
		}

		$users = giveasap_get_entries_for( $post_id );

		if ( is_array( $users ) && count( $users ) > 0 ) {
			$post = get_post( $post_id );
			header( 'Content-Type: text/csv; charset=utf-8' );
			header( 'Content-Disposition: attachment; filename=giveasap_' . sanitize_text_field( $post->post_name ) . '_users.csv' );

			// create a file pointer connected to the output stream
			$output  = fopen( 'php://output', 'w' );
			$fields  = giveasap_get_form_fields( $post_id );
			$headers = array( __( 'Email Address', 'giveasap' ), __( 'Entries', 'giveasap' ) );
			foreach ( $fields as $field_slug => $field ) {
				if ( 'user_email' === $field_slug ) {
					continue;
				}
				if ( ! $field['label'] ) {
					continue; }
				$headers[] = $field['label'];
			}
			$headers[] = __( 'Date', 'giveasap' );

			if ( giveasap_is_ip_enabled() ) {
				$headers[] = __( 'IP Address', 'giveasap' );
			}

            if ( giveasap_show_visited_from() ) {
                $headers[] = __( 'From', 'giveasap' );
            }

			// output the column headings
			fputcsv( $output, $headers );
			foreach ( $users as $user ) {
				if ( $user->email == '' ) {
					continue;
				}

				$meta = giveasap_get_meta( $user->id );
				$row  = array( $user->email, $user->entries );

				foreach ( $fields as $field_slug => $field ) {
					if ( ! $field['label'] ) {
						continue;
					}

					if ( 'user_email' === $field_slug ) {
						continue;
					}
					$headers[] = $field['label'];

					if ( 'user_name' === $field_slug ) {
						$value = isset( $meta[ '_' . $field_slug ] ) ? $meta[ '_' . $field_slug ] : '';

						if ( ! $value ) {
							$value = isset( $meta['_name'] ) ? $meta['_name'] : '';
						}
					} else {
						$value = isset( $meta[ '_' . $field_slug ] ) ? $meta[ '_' . $field_slug ] : '';
					}

					if ( $value && is_array( $value ) ) {
						$field_value = implode( ', ', $value );
					} else {
						$field_value = $value;
					}

					$row[] = $field_value;
				}

				$row[] = $user->date;

				if ( giveasap_is_ip_enabled() ) {
					$ip    = isset( $meta['_ip'] ) ? $meta['_ip'] : '';
					$row[] = is_array( $ip ) ? implode( ', ', $ip ) : $ip;
				}

                if ( giveasap_show_visited_from() ) {
                    $visited = isset( $meta['_http_referrer'] ) ? $meta['_http_referrer'] : '';
                    $row[]   = esc_html( is_array( $visited ) ? implode( ', ', $visited ) : $visited );
                }

				fputcsv( $output, $row );
			}
			exit();
		}
	}
}


add_action( 'admin_init', 'giveasap_metabox_users_export_winners', 99 );
function giveasap_metabox_users_export_winners() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	if ( isset( $_REQUEST['giveasap_export_winners'] ) ) {
		$post_id = isset( $_REQUEST['post_ID'] ) ? absint( $_REQUEST['post_ID'] ) : absint( $_REQUEST['giveasap_export_winners'] );

		if ( ! $post_id ) {
			$post_id = 0; }

		if ( $post_id == 0 ) {
			return false;
		}

		if ( isset( $_GET['action'] ) ) {
			unset( $_GET['action'] );
		}
		if ( isset( $_GET['message'] ) ) {
			unset( $_GET['message'] );
		}

		$users = giveasap_get_winners( $post_id );

		if ( is_array( $users ) && count( $users ) > 0 ) {
			$post = get_post( $post_id );
			header( 'Content-Type: text/csv; charset=utf-8' );
			header( 'Content-Disposition: attachment; filename=giveasap_' . sanitize_text_field( $post->post_name ) . '_winners.csv' );

			// create a file pointer connected to the output stream
			$output  = fopen( 'php://output', 'w' );
			$fields  = giveasap_get_form_fields( $post_id );
			$headers = array( __( 'Email Address', 'giveasap' ), __( 'Entries', 'giveasap' ) );
			foreach ( $fields as $field_slug => $field ) {
				if ( 'user_email' === $field_slug ) {
					continue;
				}
				if ( ! $field['label'] ) {
					continue; }
				$headers[] = $field['label'];
			}

			// output the column headings
			fputcsv( $output, $headers );
			foreach ( $users as $winner ) {
				$subscriber_id = isset( $winner['id'] ) ? absint( $winner['id'] ) : 0;
				$user          = giveasap_get_user_by_email( $winner['email'], $post_id );

				if ( $user->email == '' ) {
					continue;
				}

				$meta = giveasap_get_meta( $user->id );
				$row  = array( $user->email, $user->entries );

				foreach ( $fields as $field_slug => $field ) {
					if ( ! $field['label'] ) {
						continue;
					}

					if ( 'user_email' === $field_slug ) {
						continue;
					}
					$headers[] = $field['label'];

					if ( 'user_name' === $field_slug ) {
						$value = isset( $meta[ '_' . $field_slug ] ) ? $meta[ '_' . $field_slug ] : '';

						if ( ! $value ) {
							$value = isset( $meta['_name'] ) ? $meta['_name'] : '';
						}
					} else {
						$value = isset( $meta[ '_' . $field_slug ] ) ? $meta[ '_' . $field_slug ] : '';
					}

					if ( $value && is_array( $value ) ) {
						$field_value = implode( ', ', $value );
					} else {
						$field_value = $value;
					}

					$row[] = $field_value;
				}
				fputcsv( $output, $row );
			}
			exit();
		}
	}
}

add_action( 'admin_init', 'giveasap_export_entries', 99 );
function giveasap_export_entries() {
	global $wpdb;

	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	if ( isset( $_REQUEST['sg_export_entries'] ) ) {
		$payload = json_decode( wp_unslash( $_REQUEST['sg_export_entries'] ), true );

		if ( ! $payload ) {
			return false;
		}

		if ( isset( $_GET['action'] ) ) {
			unset( $_GET['action'] );
		}
		if ( isset( $_GET['message'] ) ) {
			unset( $_GET['message'] );
		}

		$sql  = 'SELECT sg_entries.*, subscribers.email, giveaways.post_title as giveaway_title FROM ' . $wpdb->giveasap_actions . ' as sg_entries';
		$sql .= ' LEFT JOIN ' . $wpdb->giveasap_entries . ' as subscribers on subscribers.id=sg_entries.subscriber_id';
		$sql .= ' LEFT JOIN ' . $wpdb->posts . ' as giveaways on giveaways.ID=sg_entries.giveaway_id';

		$sql .= ' WHERE 1=1';

		if ( ! empty( $payload['subscriber'] ) && $payload['subscriber'] ) {
			$sql .= $wpdb->prepare( ' AND sg_entries.subscriber_id = %d', $payload['subscriber'] );
		}

		if ( ! empty( $payload['giveaway'] ) && $payload['giveaway'] ) {
			$sql .= $wpdb->prepare( ' AND sg_entries.giveaway_id = %d', $payload['giveaway'] );
		}

		if ( ! empty( $payload['action'] ) && $payload['action'] ) {
			$sql .= $wpdb->prepare( ' AND sg_entries.action = %s', $payload['action'] );
		}

		$result = $wpdb->get_results( $sql, 'ARRAY_A' );

		if ( ! $result ) {
			return;
		}

		if ( is_array( $result ) && count( $result ) > 0 ) {
			header( 'Content-Type: text/csv; charset=utf-8' );
			header( 'Content-Disposition: attachment; filename=giveasap_entries.csv' );

			// create a file pointer connected to the output stream
			$output  = fopen( 'php://output', 'w' );
			$headers = array(
				__( 'Email Address', 'giveasap' ),
				__( 'Type', 'giveasap' ),
				__( 'Title', 'giveasap' ),
				__( 'Value', 'giveasap' ),
				__( 'Entries', 'giveasap' ),
				__( 'Status', 'giveasap' ),
				__( 'Giveaway', 'giveasap' ),
			);

			// output the column headings
			fputcsv( $output, $headers );
			foreach ( $result as $entry ) {
				$row   = array();
				$row[] = $entry['email'];
				$row[] = $entry['action'];

				$data = maybe_unserialize( $entry['data'] );

				if ( isset( $data['title'] ) ) {
					$row[] = $data['title'];
				} else {
					$row[] = '-';
				}

				$action_value       = '-';
				$registered_actions = giveasap_get_registered_actions();
				if ( isset( $registered_actions[ $entry['action'] ] ) && class_exists( $registered_actions[ $entry['action'] ] ) ) {
					$action        = $registered_actions[ $entry['action'] ];
					$action_object = new $action();
					$action_object->prepare_value_for_entries_table( $entry );
					// Value
					$action_value = $action_object->get_value_for_entries_table( maybe_unserialize( $entry['data'] ) );
				}

				// Value
				$row[] = $action_value;

				$row[] = $entry['entries'];
				$row[] = $entry['status'];
				$row[] = $entry['giveaway_title'] ? $entry['giveaway_title'] : get_the_title( $entry['giveaway_id'] );

				fputcsv( $output, $row );
			}
			exit();
		}
	}
}

/**
 * Display The Giveaway Idea metabox
 *
 * @param  WP_Post $post
 * @return void
 */
function giveasap_metabox_ideas( $post ) {
	?>
	<p>If you have an idea on a feature you would like to see, feel free to write that idea down on our site.</p>
	<a href="http://www.wpsimplegiveaways.com/ideas" target="_blank" class="button button-secondary"><strong>Share your Idea</strong></a>
	<?php
}

add_action( 'admin_init', 'giveasap_process_action_clone' );

/**
 * Processing the Clone Giveaway action.
 *
 * @since 2.17.0
 */
function giveasap_process_action_clone() {
	global $wpdb;

	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	$giveaway_id = isset( $_GET['sg_clone_giveaway'] ) ? absint( $_GET['sg_clone_giveaway'] ) : 0;

	if ( ! $giveaway_id ) {
		return;
	}

	$giveaway = giveasap_get_giveaway( $giveaway_id );
	$post     = (array) $giveaway->get_post();

	if ( ! $post ) {
		return;
	}

	$new_giveaway = array(
		'post_title'   => $post['post_title'],
		'post_content' => $post['post_content'],
		'post_type'    => 'giveasap',
		'post_status'  => 'draft',
	);
	$new_id       = wp_insert_post( wp_slash( $new_giveaway ) );

	if ( ! $new_id || is_wp_error( $new_id ) ) {
		return;
	}

	$post_meta = get_post_meta( $giveaway_id );

	$ignored_meta = apply_filters(
		'sg_clone_giveaway_ignored_meta',
		array(
			'giveasap_winners',
			'end_time',
			'_edit_last',
			'_edit_lock',
		)
	);

	foreach ( $post_meta as $meta_key => $meta_value ) {
		if ( in_array( $meta_key, $ignored_meta, true ) ) {
			continue;
		}
		foreach ( $meta_value as $value ) {
			add_post_meta( $new_id, $meta_key, maybe_unserialize( $value ) );
		}
	}

	if ( giveasap_is_cloning_subscribers_enabled() ) {
		$ignored_sub_meta = apply_filters(
			'sg_clone_subscriber_ignored_meta',
			array(
				'winner',
			)
		);

		$entries = giveasap_get_active_entries_for( $giveaway_id );
		foreach ( $entries as $entry ) {
			$subscriber_id = $wpdb->insert(
				$wpdb->giveasap_entries,
				array(
					'post_id' => $new_id,
					'email'   => $entry->email,
					'entries' => 1,
					'ref_id'  => $ref_id = md5( time() . $entry->email ),
					'date'    => current_time( 'mysql' ),
					'status'  => 'active',
				),
				array(
					'%d',
					'%s',
					'%d',
					'%s',
					'%s',
					'%s',
				)
			);

			$entry_meta = giveasap_get_meta( $entry->id );

			foreach ( $entry_meta as $meta_key => $meta_value ) {
				if ( in_array( $meta_key, $ignored_sub_meta, true ) ) {
					continue;
				}
				foreach ( $meta_value as $value ) {
					giveasap_add_meta( $subscriber_id, $meta_key, maybe_unserialize( $value ) );
				}
			}
		}
	}

	wp_redirect( admin_url( 'edit.php?post_type=giveasap&message=23' ), '301' );
	exit();
}

add_action( 'save_post_giveasap', 'giveasap_save_manually_awarded_prizes', 100, 2 );

/**
 * Save Manually Awarded Prizes
 *
 * @param $post_id
 * @param $post
 */
function giveasap_save_manually_awarded_prizes( $post_id, $post ) {
	if ( ! isset( $_POST['sg_awarding_prizes_manually'] ) ) {
		return;
	}

	$awarded_prizes = isset( $_POST['sg_manual_prizes'] ) ? Helpers::unslash_and_clean( $_POST['sg_manual_prizes'] ) : false;

	if ( ! $awarded_prizes ) {
		return;
	}

	$prizes_settings = get_post_meta( $post_id, 'giveasap_prize', true );
	$prizes          = $prizes_settings && isset( $prizes_settings['prizes'] ) ? $prizes_settings['prizes'] : array();

	if ( ! $prizes ) {
		return;
	}

	$winners = giveasap_get_winners( $post_id );

	if ( ! $winners ) {
		return;
	}

	foreach ( $winners as $winner_index => $winner ) {
		$winner_index          = absint( $winner_index );
		$winner_awarded_prizes = isset( $awarded_prizes[ $winner_index ] ) ? $awarded_prizes[ $winner_index ] : false;
		if ( ! $winner_awarded_prizes ) {
			continue;
		}

		$winner['prizes'] = array();

		foreach ( $winner_awarded_prizes as $awarded_prize_index ) {
			$awarded_prize_index = absint( $awarded_prize_index );
			$prize               = isset( $prizes[ $awarded_prize_index ] ) ? $prizes[ $awarded_prize_index ] : false;
			if ( ! $prize ) {
				continue;
			}

			$winner['prizes'][] = $prize;
		}

		$winners[ $winner_index ] = $winner;
	}

	giveasap_update_winners( $winners, $post_id );
}
