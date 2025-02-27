<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'gdpol_response_edit_template' ) ) {
	function gdpol_response_edit_template( $seq_id, $response_id, $response ) {
		?>

        <input type="hidden" name="gdpol[poll][responses][<?php echo $seq_id; ?>][id]" value="<?php echo esc_attr( $response_id ); ?>"/>
        <span class="_label"
        ><input title="<?php _e( 'Response', 'gd-topic-polls' ); ?>" type="text" name="gdpol[poll][responses][<?php echo $seq_id; ?>][response]" value="<?php echo esc_attr( $response ); ?>"/></span>
        <span class="_minus _button"
        ><button type="button" title="<?php _e( 'Remove response', 'gd-topic-polls' ); ?>"><?php echo gdpol()->get_button_text( 'remove' ); ?></button></span>
        <span class="_down _button"
        ><button type="button" title="<?php _e( 'Move response down', 'gd-topic-polls' ); ?>"><?php echo gdpol()->get_button_text( 'down' ); ?></button></span>
        <span class="_up _button"
        ><button type="button" title="<?php _e( 'Move response up', 'gd-topic-polls' ); ?>"><?php echo gdpol()->get_button_text( 'up' ); ?></button></span>

		<?php
	}
}

if ( ! function_exists( 'gdpol_response_result_info_template' ) ) {
	function gdpol_response_result_info_template( $label, $votes, $percent, $color, $width ) {
		$show = gdpol_settings()->get( 'display_show_response_elements' );

		?>

        <div class="gdpol-response-info"><span class="gdpol-response-label"><?php echo $label; ?></span
            ><span class="gdpol-response-bar"
            ><span style="width: <?php echo $width; ?>%; background-color: <?php echo $color; ?>"></span></span
            ><?php if ( in_array( $show, array( 'full', 'percentage' ) ) ) { ?>
                <span class="gdpol-response-percent"><?php echo $percent; ?>%</span
                ><?php }
			if ( in_array( $show, array( 'full', 'vote' ) ) ) { ?>
                <span class="gdpol-response-votes"><?php echo $votes . ' ' . _n( 'vote', 'votes', $votes, 'gd-topic-polls' ); ?></span
                ><?php } ?></div>

		<?php
	}
}

if ( ! function_exists( 'gdpol_response_result_users_template' ) ) {
	function gdpol_response_result_users_template( $users, $avatar = 32, $limit = 8, $linked = false ) {
		$total = count( $users );

		if ( count( $users ) > $limit ) {
			$users = array_slice( $users, 0, $limit );
		}

		?>

        <div class="gdpol-response-users" style="line-height: <?php echo $avatar; ?>px">

			<?php

			foreach ( $users as $user_id ) {
				if ( $linked ) {
					echo '<a class="gdpol-user-avatar" href="' . bbp_get_user_profile_url( $user_id ) . '" title="' . get_the_author_meta( 'display_name', $user_id ) . '">';
				} else {
					echo '<span class="gdpol-user-avatar">';
				}

				echo get_avatar( $user_id, $avatar, '', get_the_author_meta( 'display_name', $user_id ) );

				if ( $linked ) {
					echo '</a>';
				} else {
					echo '</span>';
				}
			}

			if ( count( $users ) < $total ) {
				$more = $total - count( $users );

				echo '<span class="gdpol-more-users" style="line-height: ' . $avatar . 'px">+ ' . $more . ' ' . __( 'more', 'gd-topic-polls' ) . '</span>';
			}

			?>

        </div>

		<?php
	}
}
