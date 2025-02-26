<?php

/**
 * Credly Login sidebar widget.
 *
 * @package CredlyLogin
 */
class CredlyLoginSidebar extends WP_Widget
{
	public function __construct() {
		// widget actual processes
		parent::__construct(
			'CredlyLoginSidebar', // Base ID
			'Credly Login', // Name
			array( 'description' => __( 'Log in/out with Credly', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array 	Widget arguments.
	 * @param array 	Saved values from database.
	 */
	public function widget( $args, $instance )
	{
		add_action( 'wp_ajax_nopriv_credly-login-callback', 'credly_login_callback' );
		add_action( 'wp_ajax_credly-login-callback', 'credly_login_callback' );

		extract( $args );

		$title = apply_filters( 'Log In with Credly', $instance['title'] );

		echo $before_widget;

		if ( $title ) {
			echo $before_title . $title . $after_title;
		}

		// Display login form if not logged in already.
		if ( !is_user_logged_in() ) {
			wp_login_form();
			credly_login_render_form();
			credly_login_render_modal();
		} else {
			$user = wp_get_current_user();
			?>
			<p>You are logged in as <?php echo $user->display_name ?>.</p>
			<a href="<?php echo wp_logout_url( home_url() ); ?>" title="Logout">Logout</a>
			<?php
		}

		echo $after_widget;
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array 	Previously saved values from database.
	 */
	public function form( $instance )
	{
		$title = esc_attr( $instance['title'] );

		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array 	Values just sent to be saved.
	 * @param array 	Previously saved values from database.
	 *
	 * @return array 	Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		return $instance;
	}

}

