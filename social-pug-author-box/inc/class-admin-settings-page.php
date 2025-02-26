<?php

CLass SPAB_Settings_Page {

	/*
	 * Constructor
	 *
	 */
	public function __construct() {

		add_action( 'admin_menu', array( $this, 'add_options_page' ) );
		add_action( 'admin_init', array( $this, 'register_setting' ) );

	}


	/*
	 * Adds the options page
	 *
	 */
	public function add_options_page() {

		add_options_page( __( 'Social Pug Author Box', 'social-pug-author-box' ), __( 'Social Pug Author Box', 'social-pug-author-box' ), 'manage_options', 'social_pug_author_box', array( $this, 'options_page_content' ) );

	}


	/*
	 * Register settings within WordPress
	 *
	 */
	public function register_setting() {

		register_setting( 'spab_settings', 'spab_settings', array( $this, 'sanitize_settings' ) );

	}


	/*
	 * Sanitisez the settings
	 *
	 */
	public function sanitize_settings( $new_settings ) {

		return $new_settings;

	}


	/*
	 * Callback that outputs the content into the options/settings page
	 *
	 */
	public function options_page_content() {

		// The page header
		echo '<div class="spab-page-header">';
			echo '<span class="spab-logo">Social Pug : <span>Author Box</span></span> ';
			echo '<small>v.' . SPAB_VERSION . '</small>';

			echo '<nav>';
				echo '<a href="http://docs.devpups.com/social-pug/author-box/" target="_blank"><i class="dashicons dashicons-book"></i>Documentation</a>';
			echo '</nav>';
		echo '</div>';

		// Page Content
		echo '<form id="spab-settings-form" method="post" action="options.php">';

		// Get settings
		$settings = get_option( 'spab_settings', 'not_set' );
		settings_fields( 'spab_settings' );

			// Page wrapper	
			echo '<div class="spab-page-wrapper spab-page-content wrap">';

				// Page title
				echo '<h1 class="spab-page-title">' . __('Configure Author Box', 'social-pug') . '</h1>';


				// Social Networks Profiles settings
				echo '<div class="dpsp-section">';
					echo '<h3 class="dpsp-section-title">' . __( 'Display Settings', 'social-pug' ) . '</h3>';

					echo spab_settings_field( 'radio', 'spab_settings[0][display][author_avatar_shape]', ( isset( $settings[0]['display']['author_avatar_shape'] ) ? $settings[0]['display']['author_avatar_shape'] : 'rectangular' ), __( 'Author avatar shape', 'social-pug-author-box' ), array( 'rectangular' => __( 'Rectangular', 'social-pug-author-box' ), 'rounded' => __( 'Rounded', 'social-pug-author-box' ), 'circle' => __( 'Circle', 'social-pug-author-box' ) ) );

					echo spab_settings_field( 'checkbox', 'spab_settings[0][display][show_social_buttons]', ( isset( $settings[0]['display']['show_social_buttons']) ? $settings[0]['display']['show_social_buttons'] : '' ), __( 'Show social icons', 'social-pug-author-box' ), array( 'yes' ) );
					echo spab_settings_field( 'radio', 'spab_settings[0][display][social_buttons_shape]', ( isset( $settings[0]['display']['social_buttons_shape'] ) ? $settings[0]['display']['social_buttons_shape'] : 'rectangular' ), __( 'Social icon shape', 'social-pug-author-box' ), array( 'rectangular' => __( 'Rectangular', 'social-pug-author-box' ), 'rounded' => __( 'Rounded', 'social-pug-author-box' ), 'circle' => __( 'Circle', 'social-pug-author-box' ) ) );
					echo spab_settings_field( 'checkbox', 'spab_settings[0][display][social_new_tab]', ( isset( $settings[0]['display']['social_new_tab']) ? $settings[0]['display']['social_new_tab'] : '' ), __( 'Open social links in new tab', 'social-pug-author-box' ), array( 'yes' ) );
				echo '</div>';


				// Post type display settings
				echo '<div class="dpsp-section">';
					echo '<h3 class="dpsp-section-title">' . __( 'Post Type Display Settings', 'social-pug' ) . '</h3>';

					echo spab_settings_field( 'checkbox', 'spab_settings[0][post_type_display][]', ( isset( $settings[0]['post_type_display']) ? $settings[0]['post_type_display'] : array() ), '', array( 'post' => 'Post', 'page' => 'Page' ) );
				echo '</div>';


				// Save Changes button
				echo '<input type="hidden" name="action" value="update" />';
				echo '<p class="submit"><input type="submit" class="button-primary" value="' . __( 'Save Changes' ) . '" /></p>';

			echo '</div>';

			// The Settings Sidebar
			echo '<div class="spab-settings-sidebar">';

				echo '<h3>' . __( 'Support the Plugin', 'social-pug-author-box' ) . '</h3>';

				echo '<p>' . __( 'Thank your for using Social Pug Author Box. If you like this plugin, consider supporting it by:', 'social-pug-author-box' ) . '</p>';

				echo '<ul class="ul-square">';
					echo '<li><a href="https://wordpress.org/support/view/plugin-reviews/social-pug-author-box?filter=5">Leaving a ★★★★★ review on WordPress.org</a></li>';
					echo '<li><a target="_blank" href="' . sprintf( 'https://twitter.com/intent/tweet?text=%2$s&url=%1$s', urlencode('https://wordpress.org/plugins/social-pug-author-box/'), urlencode( 'Social Pug Author Box is a simple WordPress plugin to display the author\'s bio on posts and pages. It\'s awesome!' ) ) . '">Tweeting about it</a></li>';
				echo '</ul>';

				echo '<br /><h3>' . __( 'Useful Plugins', 'social-pug-author-box' ) . '</h3>';

				echo '<p>' . __( 'With <a href="https://wordpress.org/plugins/social-pug/">Social Pug: Easy Social Share Buttons</a> you can place elegant social share buttons on your posts and pages.', 'social-pug-author-box' ) . '</p>';

				echo '<a href="https://wordpress.org/plugins/social-pug/" class="button button-primary">Get Social Pug Share Buttons</a>';

			echo '</div>';

		echo '</form>';


	}

}

new SPAB_Settings_Page;