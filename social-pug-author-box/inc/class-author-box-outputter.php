<?php

Class SPAB_Author_Box_Outputter {

	public $settings;


	/*
	 * Constructor
	 *
	 */
	public function __construct() {

		$this->settings = get_option( 'spab_settings' );

	}


	/*
	 * Filters the content to add the author box
	 *
	 */
	public function add_content_filter() {

		add_filter( 'the_content', array( $this, 'output_box' ), 20 );

	}


	/*
	 * Filters the content of the post and adds the output box at the end
	 *
	 */
	public function output_box( $content ) {

		if( !is_singular() )
			return $content;

		if( !isset( $this->settings[0]['post_type_display'] ) || !in_array( get_post_type(), $this->settings[0]['post_type_display'] ) )
			return $content;

		return $content . $this->get_box_output();

	}


	/*
	 * Returns the HTML of the author box
	 *
	 */
	public function get_box_output() {

		// Author box wrapper
		$output = '<div class="spab-author-box">';

			// Get the author info, like display name, description and social profiles buttons
			$output .= '<div class="spab-author-info">';

				// Get the author's avatar
				$avatar_class = array( 'spab-avatar' );

				if( !empty( $this->settings[0]['display']['author_avatar_shape'] ) )
					array_push( $avatar_class, 'spab-' . $this->settings[0]['display']['author_avatar_shape'] );
				else
					array_push( $avatar_class, 'spab-rectangular');

				$output .= get_avatar( get_the_author_meta('email'), 85, '', false, array( 'class' => $avatar_class ) );

				// The author name
				$output .= '<h4 class="spab-author-name"><a href="' . get_author_posts_url( get_the_author_meta('ID') ) . '">' . get_the_author() . '</a></h4>';

				// Output the author's description
				$output .= '<p class="spab-author-bio">' . get_the_author_meta('description') . '</p>';

				$output .= $this->get_box_output_social_profiles();

			$output .= '</div>';

		$output .= '</div>';

		return $output;

	}


	/*
	 * Returns the HTML for the social profiles of the author
	 *
	 */
	public function get_box_output_social_profiles() {

		if( !isset( $this->settings[0]['display']['show_social_buttons'] ) )
			return '';

		$social_profiles = new SPAB_User_Social_Profiles( get_the_author_meta('ID') );

		return $social_profiles->get_output();

	}

}

$spab_output = new SPAB_Author_Box_Outputter;
$spab_output->add_content_filter();