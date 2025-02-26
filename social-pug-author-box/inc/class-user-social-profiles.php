<?php

Class SPAB_User_Social_Profiles {

	/*
	 * The user id
	 */
	public $user_id;

	/*
	 * The saved user profiles of the user
	 */
	public $user_profiles;


	/*
	 * Constructor
	 * 
	 * @param int $user_id
	 *
	 */
	public function __construct( $user_id ) {

		$author_profiles = get_the_author_meta( 'spab_social_profiles' );

		$this->user_id 		 = $user_id;
		$this->user_profiles = ( !empty( $author_profiles ) ? $author_profiles : array() );

	}


	/*
	 * Return the URL for the a social profile icon button
	 *
	 * @param string $network_slug
	 *
	 * @return string
	 *
	 */
	public function get_profile_url( $network_slug ) {

		// If we find this is a URL
		if( strpos( $this->user_profiles[ $network_slug ], 'http' ) !== false )
			
			$url = $this->user_profiles[ $network_slug ];

		else {

			$network_handle = $this->user_profiles[ $network_slug ];

			switch( $network_slug ) {

				case 'facebook':
					$url = sprintf('https://www.facebook.com/%1$s', $network_handle );
					break;

				case 'twitter':
					$url = sprintf('https://twitter.com/%1$s', $network_handle );
					break;

				case 'google-plus':
					$url = sprintf('https://plus.google.com/%1$s', $network_handle );
					break;

				case 'pinterest':
					$url = sprintf('https://pinterest.com/%1$s', $network_handle );
					break;

				case 'linkedin':
					$url = sprintf('https://www.linkedin.com/in/%1$s', $network_handle );
					break;

				case 'instagram':
					$url = sprintf('https://www.instagram.com/%1$s', $network_handle );
					break;

				case 'youtube':
					$url = sprintf('https://www.youtube.com/user/%1$s', $network_handle );
					break;

				case 'vimeo':
					$url = sprintf('https://vimeo.com/%1$s', $network_handle );
					break;

				case 'soundcloud':
					$url = sprintf('https://soundcloud.com/%1$s', $network_handle );
					break;

				case 'twitch':
					$url = sprintf('https://www.twitch.tv/%1$s/profile', $network_handle );
					break;

				case 'behance':
					$url = sprintf('https://www.behance.net/%1$s', $network_handle );
					break;

				default:
					$url = '';
					break;

			}


		}

		return apply_filters( 'spab_user_get_profile_url', $url, $this->user_id );

	}


	/*
	 * Returns the HTML output for one button
	 *
	 * @param string $network_slug
	 *
	 * @return string
	 *
	 */
	public function get_button_output( $network_slug ) {

		if( empty( $network_slug ) )
			return '';

		$settings 	  = get_option( 'spab_settings' );
		$target_blank = ( !empty( $settings[0]['display']['social_new_tab'] ) ? 'target="_blank"' : '' );

		$output = '<a ' . $target_blank . ' class="spab-network-btn spab-' . $network_slug . '" href="' . $this->get_profile_url( $network_slug ) . '"><span class="spab-network-icon"></span></a>';

		return $output;

	}


	/*
	 * Return the HTML outout of the social profiles icon buttons
	 *
	 */
	public function get_output() {

		$settings 	 = get_option( 'spab_settings' );
		$class_shape = ( !empty( $settings[0]['display']['social_buttons_shape'] ) ? 'spab-' . $settings[0]['display']['social_buttons_shape'] : 'spab-rectangular' );

		$output = '<div class="spab-user-social-profiles spab-networks-btns-wrapper ' . $class_shape . '">';

			foreach( array_keys( $this->user_profiles ) as $network_slug )
				$output .= $this->get_button_output( $network_slug );

		$output .= '</div>';

		return $output;

	}

}