<?php
namespace Farsi_Font_For_Elementor;
defined( 'ABSPATH' ) || die;

final class Compatibility_Checks
{

	public function is_compatible() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'missing_elementor_plugin' ] );
			return false;
		}
	
		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, FARSI_FONT_FOR_ELEMENTOR['ELE_MIN_V'], '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'minimum_elementor_version' ] );
			return false;
		}
	
		// Check for required PHP version
		if ( version_compare( PHP_VERSION, FARSI_FONT_FOR_ELEMENTOR['PHP_MIN_V'], '<' ) ) {
			add_action( 'admin_notices', [ $this, 'minimum_php_version' ] );
			return false;
		}
	
		return true;

	}

	public function missing_elementor_plugin() {
		// 1: Plugin name / 2: Elementor / 3: Required Elementor version
		$this->create_notice(sprintf(
			esc_html__( '%1$s requires %2$s to be installed and activated.', 'farsi-font-for-elementor' ),
			'<strong>'. esc_html__( FARSI_FONT_FOR_ELEMENTOR['NAME'], 'farsi-font-for-elementor' ) .'</strong>',
			'<strong>'. esc_html__( 'Elementor', 'farsi-font-for-elementor' ) .'</strong>'
		));
	}

	public function minimum_elementor_version() {
		// 1: Plugin name / 2: Elementor / 3: Required Elementor version
		$this->create_notice(sprintf(
			esc_html__( '%1$s requires %2$s version %3$s or higher.', 'farsi-font-for-elementor' ),
			'<strong>'. esc_html__( FARSI_FONT_FOR_ELEMENTOR['NAME'], 'farsi-font-for-elementor' ) .'</strong>',
			'<strong>'. esc_html__( 'Elementor', 'farsi-font-for-elementor' ) .'</strong>',
			'<strong>'. FARSI_FONT_FOR_ELEMENTOR['ELE_MIN_V'] .'</strong>'
		));
	}

	public function minimum_php_version() {
		// 1: Plugin name / 2: PHP / 3: Required PHP version
		$this->create_notice(sprintf(
			esc_html__( '%1$s requires %2$s version %3$s or higher.', 'farsi-font-for-elementor' ),
			'<strong>'. esc_html__( FARSI_FONT_FOR_ELEMENTOR['NAME'], 'farsi-font-for-elementor' ) .'</strong>',
			'<strong>PHP</strong>',
			'<strong>'. FARSI_FONT_FOR_ELEMENTOR['PHP_MIN_V'] .'</strong>'
		));
	}

	public function create_notice( $message ) {
		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );
		printf( '<div class="notice notice-error"><p>%1$s</p></div>', $message );
	}

}
