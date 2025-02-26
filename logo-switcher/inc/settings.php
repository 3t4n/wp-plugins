<?php

/**
 * Logo Switcher
 *
 * @author Iversen - Carpe Noctem
 * @link https://wordpress.org/plugins/logo-switcher/
 *
 */

namespace ICN\LogoSwitcher;

// Block direct access
if(!defined('ABSPATH'))exit;

class Settings {

	public function __construct() {
		add_action( 'admin_menu', [$this, 'add_admin_menu'] );
		add_action( 'admin_init', [$this, 'register_settings'] );
	}

	public function add_admin_menu() {
		add_options_page( 'Logo Switcher', 'Logo Switcher', 'manage_options', 'logo_switcher', [$this, 'page_render'] );
	}

	public function register_settings() { 

		register_setting( 'pluginPage', 'logo_switcher_settings' );

		add_settings_section(
			'logo_switcher_pluginPage_section', 
			__( 'Settings', 'logo-switcher' ), 
			[$this, 'section_render'], 
			'pluginPage'
		);

		add_settings_field( 
			'logo_switcher_state', 
			__( 'Show logo on the login screen?', 'logo-switcher' ), 
			[$this, 'option_render'], 
			'pluginPage', 
			'logo_switcher_pluginPage_section' 
		);
	}

	public function option_render() { 

		$options = get_option( 'logo_switcher_settings' );
		
		if(!isset($options['logo_switcher_state']) && empty($options['logo_switcher_state']) ) {
			
			// Set the default state to 1
			$options['logo_switcher_state'] = 1;
		}

		echo '<select name="logo_switcher_settings[logo_switcher_state]">';
		printf( '<option value="1" %1$s>%2$s</option>', selected( $options['logo_switcher_state'], 1 ), __( 'Yes', 'logo-switcher' ) );
		printf( '<option value="2" %1$s>%2$s</option>', selected( $options['logo_switcher_state'], 2 ), __( 'No', 'logo-switcher' ) );
		echo "</select>";

	}

	public function section_render() { 
		echo __( 'With this settings page, you have full control over your logo on the login screen. The default option is that your logo is shown, and by turning it off, the default WordPress logo will appear.', 'logo-switcher' );
	}

	public function page_render() { ?>
		<div class="wrap">
 			<h1><?php _e( 'Logo Switcher', 'logo-switcher' ); ?></h1>
			<form action='options.php' method='post'>
				<?php
				settings_fields( 'pluginPage' );
				do_settings_sections( 'pluginPage' );
				submit_button();
				$this->show_current_logo();
				?>
			</form>
		</div>
<?php }

	private function show_current_logo() {
		// Get the logo
		$logo = \ICN\LogoSwitcher\Plugin::get_logo_url();
		
		// Check if a logo is uploaded
		if($logo) {
			$text = __( 'Do you want to upload a different logo? Click <a href="%s">here</a> to do so.', 'logo-switcher' );
			printf( '<h2>%1$s</h2>', __( 'Currently uploaded logo:', 'logo-switcher' ) );
			printf( '<img src="%1$s" alt="%2$s" />', $logo, get_bloginfo('name') );
		} else {
			$text = __( 'You haven\'t uploaded a logo yet. Click <a href="%s">here</a> to upload your logo.', 'logo-switcher' );
		}

		$link = sprintf( wp_kses( $text, [ 'a' => [ 'href' => [] ] ] ), esc_url( admin_url( '/customize.php' ) ) );
		printf( '<p>%1$s</p>', $link );

	}

}