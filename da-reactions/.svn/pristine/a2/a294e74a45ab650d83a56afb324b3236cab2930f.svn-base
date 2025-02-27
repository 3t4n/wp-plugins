<?php
/**
 * Widget API: ContentsByReactionWidget extends WP_Widget
 *
 * @package DaReactions
 * @subpackage Widgets
 * @since 1.0.0
 */
namespace DaReactions\Widgets;
use DaReactions\Data;
use WP_Widget;
/**
 * Class ContentsByReactionWidget
 * @package DaReactions\Widgets
 *
 * Defines a widget to display most voted contents
 *
 * @since 1.0.0
 */
class ContentsByReactionWidget extends WP_Widget {
	/**
	 * ContentsByReactionWidget constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		parent::__construct(
			'contents_by_reaction_widget',
			esc_html__( 'Contents by Reaction Widget', 'da-reactions' ),
			array( 'description' => esc_html__( 'Displays contents or comments filtered by a specific reaction.', 'da-reactions' ) )
		);
	}
	/**
	 * Render the widget on frontend
	 *
	 * @param array $args
	 * @param array $instance
	 *
	 * @since 1.0.0
	 */
	public function widget( $args, $instance ) {
		$title    = ! empty( $instance['title'] ) ? esc_html( $instance['title'] ) : esc_html__( 'Recent Posts', 'da-reactions' );
		$number   = ! empty( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$show_reaction = isset( $instance['show_reaction'] ) && $instance['show_reaction'];
		$reaction = isset( $instance['reaction'] ) ? absint( $instance['reaction'] ) : 0;
		$post_type     = isset( $instance['post_type'] ) ? esc_attr( $instance['post_type'] ) : 'post';
		// Fetch cached results if available
		$cache_key = 'da_reactions_widget_' . $this->id;
		$results   = wp_cache_get( $cache_key );
		if ( false === $results ) {
			// Fetch results based on post_type and reaction
			$results = ( $post_type === 'comments' )
				? Data::getCommentsByReaction( $reaction, $number )
				: Data::getContentsByReaction( $post_type, $reaction, $number );
			// Cache the results for an hour
			wp_cache_set( $cache_key, $results, '', 3600 );
		}
		echo wp_kses( $args['before_widget'], 'post' );
		if ( $title ) {
			echo wp_kses( $args['before_title'] . $title . $args['after_title'], 'post' );
		}
		echo '<ul>';
		if ( empty( $results ) ) {
			echo '<li>' . esc_html__( 'No reactions found.', 'da-reactions' ) . '</li>';
		} else {
			// Loop through results and render items
			foreach ( $results as $item ) {
				$this->render_item( $item, $show_reaction, $post_type );
		}
					}
		echo '</ul>';
		echo wp_kses( $args['after_widget'], 'post' );
		// Optional: Hook to execute after rendering posts
		do_action( 'da_reactions_widget_after_posts', $results );
	}
	/**
	 * Render individual items (post or comment) in the widget
	 *
	 * @param object $item - The post or comment object.
	 * @param bool $show_reaction - Whether to show the reaction count.
	 * @param string $post_type - Type of item (post or comments).
	 */
	private function render_item( $item, $show_reaction, $post_type ) {
		if ( $post_type === 'comments' ) {
			// Render comment
			echo '<li>';
			echo '<a href="' . esc_url( get_comment_link( $item->comment_ID ) ) . '">';
			echo esc_html( $item->comment_author ) . ': ' . esc_html( wp_trim_words( $item->comment_content, 10 ) );
			echo '</a>';
							if ( $show_reaction ) {
								echo ' (' . absint( $item->reaction_count ) . ' ' . esc_html__( 'reactions', 'da-reactions' ) . ')';
							}
			echo '</li>';
			} else {
			// Render post
			echo '<li>';
			echo '<a href="' . esc_url( get_permalink( $item->ID ) ) . '">';
			echo esc_html( get_the_title( $item->ID ) );
			echo '</a>';
						if ( $show_reaction ) {
							echo ' (' . absint( $item->reaction_count ) . ' ' . esc_html__( 'reactions', 'da-reactions' ) . ')';
				}
			echo '</li>';
			}
	}
	/**
	 * Back-end widget form.
	 */
	public function form( $instance ) {
		$title         = isset( $instance['title'] ) ? esc_html( $instance['title'] ) : '';
		$number                = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$show_reaction = isset( $instance['show_reaction'] ) ? (bool) $instance['show_reaction'] : false;
		$reaction              = isset( $instance['reaction'] ) ? absint( $instance['reaction'] ) : 0;
		$post_type             = isset( $instance['post_type'] ) ? esc_attr( $instance['post_type'] ) : 'post';
		?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'da-reactions' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text"
                   value="<?php echo esc_attr( $title ); ?>"/>
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of items:', 'da-reactions' ); ?></label>
            <input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number"
                   step="1" min="1" value="<?php echo absint( $number ); ?>" size="3"/>
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'reaction' ) ); ?>"><?php esc_html_e( 'Reaction ID:', 'da-reactions' ); ?></label>
            <input class="tiny-text"
                   id="<?php echo esc_attr( $this->get_field_id( 'reaction' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'reaction' ) ); ?>"
                   type="number" step="1" min="0" value="<?php echo absint( $reaction ); ?>"
                   size="3"/>
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'post_type' ) ); ?>"><?php esc_html_e( 'Content Type:', 'da-reactions' ); ?></label>
            <select id="<?php echo esc_attr( $this->get_field_id( 'post_type' ) ); ?>"
                    name="<?php echo esc_attr( $this->get_field_name( 'post_type' ) ); ?>"
                    class="widefat">
                <option value="post"<?php selected( $post_type, 'post' ); ?>><?php esc_html_e( 'Posts', 'da-reactions' ); ?></option>
                <option value="comments"<?php selected( $post_type, 'comments' ); ?>><?php esc_html_e( 'Comments', 'da-reactions' ); ?></option>
            </select>
        </p>
        <p>
            <input class="checkbox" type="checkbox"<?php checked( $show_reaction ); ?>
                   id="<?php echo esc_attr( $this->get_field_id( 'show_reaction' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'show_reaction' ) ); ?>"/>
            <label for="<?php echo esc_attr( $this->get_field_id( 'show_reaction' ) ); ?>"><?php esc_html_e( 'Display reaction count?', 'da-reactions' ); ?></label>
        </p>
		<?php
	}
	/**
	 * Sanitize widget form values as they are saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance                  = array();
		$instance['title']         = sanitize_text_field( $new_instance['title'] );
		$instance['number']        = absint( $new_instance['number'] );
		$instance['reaction']      = absint( $new_instance['reaction'] );
		$instance['post_type']     = sanitize_text_field( $new_instance['post_type'] );
		$instance['show_reaction'] = ! empty( $new_instance['show_reaction'] );
		return $instance;
	}
}
