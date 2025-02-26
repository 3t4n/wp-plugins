<?php
namespace Altoviz;

class AOZ4WC_Options_Page {

	public $slug = 'altoviz';
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		$this->register_settings();
	}
	private function register_settings() {
		// register_setting('aoz4wc-settings', $option_name, $args);
		// add_settings_section($id, __($title, 'hello-alto'), 'aoz4wc_settings_section_render', 'aoz4wc-settings', $args);
		// add_settings_field($id, __($title, 'hello-alto'), 'aoz4wc_settings_render', 'aoz4wc-settings', $section, $args);
	}
	public function admin_menu() {
		add_options_page( 'Altoviz 🚀', 'Altoviz 🚀', 'manage_options', 'altoviz', array( $this, 'options_page' ) );
	}
	public function options_page() {
		?>
		<form action='options.php' method='post'>
			<div class="wrap" style="display:flex;flex-direction:column">
				<a href="https://altoviz.com/"><img src="<?php echo esc_url( AOZ4WC()->get_logo_url() ); ?>" height="32" style="padding:9px 0px 4px;"/></a>
		<?php if ( AOZ4WC()->check_woocommerce() ) { ?>
				<p></p>
				<p><?php echo esc_html__( 'Access to all Altoviz for Woocommerce plugin settings in the Woocommerce settings section.', 'altoviz' ); ?></p>
				<a href="<?php echo esc_url( AOZ4WC()->wc_admin()->get_settings_url() ); ?>"><?php echo esc_html__( 'Altoviz for Woocommerce settings', 'altoviz' ); ?></a>
		<?php } else { ?>
				<p></p>
				<p><?php echo esc_html__( 'The Woocommerce plugin has to be active to get access to the settings.', 'altoviz' ); ?></p>
		<?php } ?>
		<?php
		// settings_fields('aoz-settings');
		// do_settings_sections('aoz-settings');
		// submit_button();
		?>
			</div>
		</form>
		<?php
	}
	public function aozi_register_setting( string $option_name, array $args = array() ) {
		$args = wp_parse_args( $args, array( 'type' => 'integer' ) );
		register_setting( 'aoz4wc-settings', $option_name, $args );
	}
}
