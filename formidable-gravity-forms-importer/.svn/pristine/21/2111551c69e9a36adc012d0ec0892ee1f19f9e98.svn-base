<?php
/*
Plugin Name: Formidable Gravity Forms Importer
Description: Import forms from Gravity Forms to Formidable Forms
Version: 1.02
Plugin URI: https://formidableforms.com/
Author: Strategy11
Text Domain: formidable-gravity-forms-importer
*/

if ( ! function_exists( 'load_frm_gravity_importer' ) ) {

	add_action( 'plugins_loaded', 'load_frm_gravity_importer', 1 );
	function load_frm_gravity_importer() {
		if ( ! is_admin() ) {
			return;
		}

		// Is free installed?
		if ( function_exists( 'load_formidable_forms' ) ) {
			// Add the autoloader
			spl_autoload_register( 'frm_gravity_forms_autoloader' );

			new FrmGravityImporter();
		} else {
			add_action( 'admin_notices', 'frm_gravity_formidable_lite_missing' );
		}
	}

	function frm_gravity_forms_autoloader( $class_name ) {
		// Only load FrmGravity classes here
		if ( ! preg_match( '/^FrmGravity.+$/', $class_name ) ) {
			return;
		}

		$filepath = dirname( __FILE__ ) . '/classes/' . $class_name . '.php';
		if ( file_exists( $filepath ) ) {
			require( $filepath );
		}
	}

	/**
	 * If the site is not running Formidable Lite, this plugin will not work.
	 * Show a notification.
	 */
	function frm_gravity_formidable_lite_missing() {
		?>
		<div class="error">
			<p><?php esc_html_e( 'Formidable Gravity Forms Importer requires Formidable Forms to be installed.', 'formidable-gravity-forms-importer' ); ?></p>
			<a href="<?php echo esc_url( admin_url( 'plugin-install.php?s=formidable+forms&tab=search&type=term' ) ); ?>" class="button button-primary">
				<?php esc_html_e( 'Install Formidable Forms', 'formidable-gravity-forms-importer' ); ?>
			</a>
		</div>
		<?php
	}
}

if ( ! function_exists( 'array_key_first' ) ) {
	function array_key_first( array $arr ) {
		foreach ( $arr as $key => $unused ) {
			return $key;
		}
		return null;
	}
}
