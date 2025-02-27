<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$_widget_polls_list_instance = gdpol()->widget_instance();

?>

<div class="gdpol-widget-poll-item">
    <h5><a href="<?php echo esc_attr( gdpol_get_poll()->url() ); ?>"><?php echo gdpol_get_poll()->question; ?></a></h5>

	<?php if ( $_widget_polls_list_instance['show_topic'] || $_widget_polls_list_instance['show_forum'] ) { ?>
        <div class="_gdpol_linked">
			<?php

			echo __( 'Posted', 'gd-topic-polls' );

			if ( $_widget_polls_list_instance['show_topic'] ) {
				echo sprintf( __( ' with %s topic', 'gd-topic-polls' ), '<a href="' . gdpol_get_poll()->url() . '">' . bbp_get_topic_title( gdpol_get_poll()->get_topic_id() ) . '</a>' );
			}

			if ( $_widget_polls_list_instance['show_forum'] ) {
				echo sprintf( __( ' in %s forum', 'gd-topic-polls' ), '<a href="' . get_permalink( gdpol_get_poll()->get_forum_id() ) . '">' . bbp_get_forum_title( gdpol_get_poll()->get_forum_id() ) . '</a>' );
			}

			echo '.';

			?>
        </div>
	<?php } ?>

	<?php if ( $_widget_polls_list_instance['show_poll_status'] ) { ?>
        <div class="_gdpol_status">
			<?php

			if ( gdpol_get_poll()->is_open() ) {
				_e( 'This poll is currently open.', 'gd-topic-polls' );
			} else {
				_e( 'This poll is closed.', 'gd-topic-polls' );
			}

			?>
        </div>
	<?php } ?>

	<?php if ( $_widget_polls_list_instance['show_count_answers'] ) { ?>
        <div class="_gdpol_answers">
			<?php

			$_count_responses = gdpol_get_poll()->count_responses();
			echo sprintf( _n( 'Poll has one answer.', 'Poll has %s answers.', $_count_responses, 'gd-topic-polls' ), $_count_responses );

			?>
        </div>
	<?php } ?>

	<?php if ( $_widget_polls_list_instance['show_count_votes'] ) { ?>
        <div class="_gdpol_votes">
			<?php

			if ( gdpol_get_poll()->count_voters() > 0 ) {
				$_count_responses = gdpol_get_poll()->count_voters();

				if ( gdpol_get_poll()->is_open() ) {
					echo sprintf( _n( 'So far, one user voted.', 'So far, %s users voted.', $_count_responses, 'gd-topic-polls' ), $_count_responses );
				} else {
					echo sprintf( _n( 'In total, one user voted.', 'In total, %s users voted.', $_count_responses, 'gd-topic-polls' ), $_count_responses );
				}
			} else {
				echo __( 'No one has voted yet.', 'gd-topic-polls' );
			}

			?>
        </div>
	<?php } ?>
</div>
