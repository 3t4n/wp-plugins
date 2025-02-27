<?php
/**
 * Plugin Name: Integrate Ecomail and Elementor Forms
 * Description: Rozšíření widgetu "Formulář" pro Elementor Pro o službu Ecomail
 * Plugin URI:  https://webypolopate.cz/propojeni-elementor-wordpress-ecomail/
 * Version:     1.3.1
 * Author:      Adam Kotala
 * Author URI:  https://webypolopate.cz
 * License:     GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: integrate-ecomail-elementor
 *
 * Elementor tested up to: 3.22.3
 * Elementor Pro tested up to: 3.22.1
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Add new Ecomail form action.
 *
 * @since 1.0.0
 * @param ElementorPro\Modules\Forms\Registrars\Form_Actions_Registrar $form_actions_registrar
 * @return void
 */
function ieef_add_new_ecomail_form_action( $form_actions_registrar ) {

	include_once( __DIR__ .  '/form-actions/ecomail.php' );
	
	$form_actions_registrar->register( new Ecomail_Action() );

}
add_action( 'elementor_pro/forms/actions/register', 'ieef_add_new_ecomail_form_action' );
