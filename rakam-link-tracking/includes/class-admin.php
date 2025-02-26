<?php

class RakamLinkTrackingAdmin {	

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'rakam_link_tracking_add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'rakam_link_tracking_page_init' ) );
	}

	public function rakam_link_tracking_add_plugin_page() {
		add_options_page(
			'Rakam Link Tracking', // page_title
			'Rakam Link Tracking', // menu_title
			'manage_options', // capability
			'rakam-link-tracking', // menu_slug
			array( $this, 'rakam_link_tracking_create_admin_page' ) // function
		);
	}

	public function rakam_link_tracking_create_admin_page() {
		$this->rakam_link_tracking_options = get_option( 'rakam_link_tracking_option_name' ); ?>

		<div class="wrap">
			<h2><?php _e( 'Rakam Link Tracking', 'rakam' ); ?></h2>
			<p><?php _e( 'Allows optional URL parameters to be added to all links.', 'rakam' ); ?></p>			

			<form method="post" action="options.php">
				<?php
					settings_fields( 'rakam_link_tracking_option_group' );
					do_settings_sections( 'rakam-link-tracking-admin' );
					submit_button();
				?>
			</form>
		</div>
	<?php }

	public function rakam_link_tracking_page_init() {
		register_setting(
			'rakam_link_tracking_option_group', // option_group
			'rakam_link_tracking_option_name', // option_name
			array( $this, 'rakam_link_tracking_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'rakam_link_tracking_setting_section', // id
			__('Preferences', 'rakam'), // title
			array( $this, 'rakam_link_tracking_section_info' ), // callback
			'rakam-link-tracking-admin' // page
		);

		add_settings_field(
			'query_parameter_names_0', // id
			__('URL parameters names', 'rakam'), // title
			array( $this, 'query_parameter_names_0_callback' ), // callback
			'rakam-link-tracking-admin', // page
			'rakam_link_tracking_setting_section' // section
		);
	}

	public function rakam_link_tracking_sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['query_parameter_names_0'] ) ) {
			$sanitary_values['query_parameter_names_0'] = sanitize_text_field( $input['query_parameter_names_0'] );
		}

		return $sanitary_values;
	}

	public function rakam_link_tracking_section_info() {
		
	}

	public function query_parameter_names_0_callback() {
		printf(
			'<input class="regular-text" placeholder="gclid,utm_source,utm_campaign, ..." type="text" name="rakam_link_tracking_option_name[query_parameter_names_0]" id="query_parameter_names_0" value="%s">',
			isset( $this->rakam_link_tracking_options['query_parameter_names_0'] ) ? esc_attr( $this->rakam_link_tracking_options['query_parameter_names_0']) : ''
		);
		printf( '<p class="description" id="query_parameter_names_0-description">%s</p>', __('You may continue to add by separating them with a comma such as gclid, utm_source, utm_campaign.', 'rakam') );
	}

}