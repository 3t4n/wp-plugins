<?php
/**
 * Created by PhpStorm.
 * User: sebastien
 * Date: 01/08/17
 * Time: 12:06
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

add_action( 'admin_menu', 'p2p5_vc_openagenda_add_menu' );
function p2p5_vc_openagenda_add_menu() {
	add_options_page( __( 'OpenAgenda Settings', 'p2p5-openagenda' ), __( 'OpenAgenda Settings', 'p2p5-openagenda' ), 'manage_option', 'openagenda-settings', 'p2p5_vc_openagenda_options_page' );
}

function p2p5_vc_openagenda_options_page() {
	echo '<h3>' . __( 'Settings', 'p2p5-openagenda' ) . '</h3>'; ?>
    <form method="post" action="options.php">
		<?php settings_fields( 'p2p5_openagenda_options' ) ?>
		<?php do_settings_sections( 'p2p5_openagenda_options' ) ?>
		<?php submit_button( __( 'Save' ) ); ?>
    </form>

	<?php
}

add_action('admin_init', 'p2p5_vc_openagenda_register_settings');
function p2p5_vc_openagenda_register_settings(){
	add_settings_section('p2p5_vc_openagenda_section', '', '', 'p2p5_openagenda_options');
	register_setting('p2p5_openagenda_options', 'openagenda_api');
	add_settings_field('openagenda_api', __('API Openagenda','p2p5-openagenda'), 'p2p5_vc_openagenda_api', 'p2p5_openagenda_options', 'p2p5_vc_openagenda_section');

}


function p2p5_vc_openagenda_api(){
	?>
    <input type="text" name="openagenda_api" value="<?php echo get_option('openagenda_api')?>"/>
    <p><?php _e('Create an account on OpenAgenda, and go to your setting page to get your API key.','p2p5-openagenda') ?></p>
	<?php
}