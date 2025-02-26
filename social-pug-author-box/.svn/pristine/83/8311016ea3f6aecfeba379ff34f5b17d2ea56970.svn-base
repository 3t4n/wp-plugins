<?php

Class SPAB_User_Fields {

	public $user_profiles;


	/*
	 * The Constructor
	 *
	 */
	public function __construct() {

		add_action( 'show_user_profile', array( $this, 'output_user_meta_fields' ) );
		add_action( 'edit_user_profile', array( $this, 'output_user_meta_fields' ) );

		add_action( 'personal_options_update', array( $this, 'save_user_meta_fields' ) );
		add_action( 'edit_user_profile_update', array( $this, 'save_user_meta_fields' ) );

		add_action( 'admin_init', array( $this, 'set_user_profiles' ));

	}


	/*
	 * Load the saved user profiles of the user
	 *
	 */
	public function set_user_profiles() {

		if( !empty( $_GET['user_id'] ) )
			$user_id = (int)$_GET['user_id'];
		else
			$user_id = get_current_user_id();

		$this->user_profiles = get_user_meta( $user_id, 'spab_social_profiles', true );
		$this->user_profiles = ( !empty( $this->user_profiles ) ? $this->user_profiles : array() );

	}


	/*
	 * Output the user fields in the user edit profile page
	 *
	 */
	public function output_user_meta_fields() {

		// Echo the heading
		echo '<h2 id="spab-user-fields-heading">';
			echo '<span>' . __( 'Social Pug Author Box', 'social-pug-author-box' ) . '</span>';
			echo '<a id="spab-user-fields-select-networks" href="#" class="button">' . __( 'Select Networks', 'social-pug-author-box' ) . '</a>';
			echo '<a id="spab-user-fields-sort-networks" href="#" class="button">' . __( 'Sort Networks', 'social-pug-author-box' ) . '</a>';
		echo '</h2>';

		echo $this->get_output_networks_selector();

		// Echo table with user fields
		echo '<table id="spab-user-fields" class="form-table">';
			echo '<tbody>';

			foreach( $this->user_profiles as $network_slug => $saved_value )
				echo $this->get_output_user_meta_field( $network_slug );
			echo '</tbody>';

		echo '</table>';

	}


	/*
	 * Returns the output of the section where a user can select which networks
	 * should appear in the box
	 *
	 */
	public function get_output_networks_selector() {

		// Get networks
		$networks = spab_get_social_networks();

		$output = '<div id="spab-networks-selector-wrapper">';

			// Body of the network selector
			$output .= '<ul id="spab-networks-selector">';

				foreach( $networks as $network_slug => $network ) {
					$output .= '<li class="spab-network" data-network="' . esc_attr( $network_slug ) . '" data-network-name="' . ( !empty( $network['name'] ) ? esc_attr( $network['name'] ) : '' ) . '" data-network-description="' . ( !empty( $network['admin_description'] ) ? esc_attr( $network['admin_description'] ) : '' ) . '" ' . ( in_array( $network_slug, array_keys($this->user_profiles) ) ? 'data-checked="true"' : '' ) . '>';
						$output .= '<div class="spab-network-checkbox spab-icon-ok"></div>';
						$output .= '<div class="spab-network-name spab-network-' . $network_slug . '">';
							$output .= '<span class="spab-network-icon spab-icon-' . $network_slug . '"></span>';
							$output .= '<span>' . $network['name'] . '</span>';
						$output .= '</div>';
					$output .= '</li>';
				}

			$output .= '</ul>';

			// Footer of the networks selector with the Apply Changes button
			$output .= '<div id="spab-networks-selector-footer"><a href="#" class="button button-primary">' . __( 'Apply Selection', 'social-pug-author-box' ) . '</a></div>';

		$output .= '</div>';

		return $output;

	}


	/*
	 * Returns the output of an individual user meta field
	 *
	 */
	public function get_output_user_meta_field( $network_slug ) {

		// Get networks
		$networks = spab_get_social_networks();

		// Output of the field
		$output = '<tr class="spab-social-profile-field-wrapper spab-social-profile-' . $network_slug . '">';
			$output .= '<th>';
				$output .= '<span class="spab-sort-handle"></span>';
				$output .= '<label for="spab_profile_' . $network_slug . '">' . $networks[$network_slug]['name'] . '</label>';
			$output .= '</th>';
		
			$output .= '<td>';
				$output .= '<input type="text" name="spab_social_profiles[' . $network_slug . ']" id="spab_profile_' . $network_slug . '" value="' . esc_attr( $this->user_profiles[$network_slug] ) . '" class="regular-text" />';
			
				if( !empty( $networks[$network_slug]['admin_description'] ) )
					$output .= '<br /><span class="description">' . $networks[$network_slug]['admin_description'] . '</span>';

			$output .= '</td>';
		$output .= '</tr>';

		return $output;

	}


	/*
	 * Updates the user's meta data
	 *
	 * @param int $user_id
	 *
	 */
	public function save_user_meta_fields( $user_id ) {

		if( !current_user_can( 'edit_users' ) )
			return false;

		$social_profiles = ( !empty( $_POST['spab_social_profiles'] ) ? $_POST['spab_social_profiles'] : array() );

		foreach( $social_profiles as $key => $social_profile ) {
			if( empty( $social_profile ) )
				unset( $social_profiles[$key] );
		}
			
		
		update_user_meta( $user_id, 'spab_social_profiles', $social_profiles );

	}

}

new SPAB_User_Fields;