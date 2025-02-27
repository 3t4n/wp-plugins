<h2><?php echo esc_html( get_the_title( $entry->post_id ) ); ?></h2>
<div class="sg-subscriber-data">
	<div class="postbox">
		<h2 class="hndle ui-sortable-handle"><span><?php esc_html_e( 'Entries', 'giveasap' ); ?></span>
		</h2>
		<div class="inside sg-subscriber-entries">
			<?php echo esc_html( $entry->entries ); ?>
		</div>
	</div>
	<div class="postbox">
		<h2 class="hndle ui-sortable-handle">
			<span><?php esc_html_e( 'Information', 'giveasap' ); ?></span></h2>
		<div class="inside">
			<?php
			$form             = giveasap_get_form_fields( $entry->post_id );
			$hidden_meta_keys = apply_filters(
				'sg_hidden_subscriber_meta',
				array(
					'_used_extra_actions',
					'winner',
					'_mailpoet_subscriber',
				)
			);
			foreach ( $meta as $key => $values ) {

				if ( in_array( $key, $hidden_meta_keys ) ) {
					continue;
				}

				if ( isset( $form[ substr( $key, 1 ) ] ) ) {
					$field = $form[ substr( $key, 1 ) ];
                    if ( 'image' === $field['type'] ) {
                        $value_html = wp_get_attachment_image( $values[0] );
                    } else {
                        $value_html = implode( ', ', $values );
                    }
					echo '<p><strong>' . esc_html( $field['label'] ) . ':</strong> ' . wp_kses_post( $value_html ) . '</p>';
					continue;
				}

				if ( 'user_id' === $key ) {
					echo '<p><strong>' . esc_html__( 'Connected User', 'giveasap' ) . ':</strong> <a href="' . esc_url_raw( admin_url( 'user-edit.php?user_id=' . absint( $values[0] ) ) ) . '">' . esc_html( $values[0] ) . '</a></p>';
					continue;
				}

				if ( '_name' === $key ) {
					$name = implode( ', ', $values );
					if ( ! $name ) {
						continue; }
					echo '<p><strong>' . esc_html__( 'Name', 'giveasap' ) . ':</strong> ' . wp_kses_post( implode( ', ', $values ) ) . '</p>';
					continue;
				}

				if ( '_referred_by' === $key ) {
					echo '<p><strong>' . esc_html__( 'Referred By', 'giveasap' ) . ':</strong> <a href="' . esc_url_raw( admin_url( 'edit.php?post_type=giveasap&page=giveasap-users&user=' . absint( $values[0] ) . '&action=view' ) ) . '">' . absint( $values[0] ) . '</a></p>';
					continue;
				}

                if ( '_http_referrer' === $key ) {
                    echo '<p><strong>' . esc_html__( 'Visited From', 'giveasap' ) . ':</strong> ' . $values[0] . '</p>';
                    continue;
                }

				if ( apply_filters( 'sg_show_custom_subscriber_meta_' . $key, true ) ) {
					echo '<p><strong>' . esc_html( ucfirst( trim( str_replace( '_', ' ', $key ) ) ) ) . ':</strong> ' . wp_kses_post( implode( ', ', $values ) ) . '</p>';
				}

				do_action( 'sg_custom_subscriber_meta', $key, $values, $entry->id );
			}
			?>
		</div>
	</div>
</div>
