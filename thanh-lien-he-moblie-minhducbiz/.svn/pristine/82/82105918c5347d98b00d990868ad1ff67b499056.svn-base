<?php
/*
* Plugin Name: Thanh liên hệ moblie - MinhducBiz
* Version: 1.0.0
* Description: Tạo thanh liên hệ trên bản moblie 
* Author: PHAM MINH DUC
* Author URI: http://minhduc.biz
* Plugin URI: http://Thietkewebgiare.biz/plugin-lien-he-mobile
* Text Domain: dwebtech
* Domain Path: /languages
* WC tested up to: 3.4.2
*/
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
/* Liên hệ mobile Settings Page */
class linhmobile_Settings_Page {
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'vnfaster_create_settings' ) );
		add_action( 'admin_init', array( $this, 'vnfaster_setup_sections' ) );
		add_action( 'admin_init', array( $this, 'vnfaster_setup_fields' ) );
		add_action( 'wp_footer', array( $this, 'display_hienthi_duc96' ));
		add_action( 'wp_enqueue_scripts',array( $this, 'hienthi_static_duc96') );
	}
	public function display_hienthi_duc96(){
		include 'lien-he.php';
	}
	public function hienthi_static_duc96(){
			wp_register_style( 'lien-he-mb', plugins_url( '/static/duc.css', __FILE__ ));
			wp_enqueue_style( 'lien-he-mb' );
		}

	public function vnfaster_create_settings() {
		$page_title = 'Liên hệ mobile';
		$menu_title = 'Liên hệ mobile';
		$capability = 'manage_options';
		$slug = 'linhmobile';
		$callback = array($this, 'vnfaster_settings_content');
		add_options_page($page_title, $menu_title, $capability, $slug, $callback);
	}
	public function vnfaster_settings_content() { ?>
		<div class="wrap">
			<h1>Liên hệ mobile</h1>
			<?php settings_errors(); ?>
			<form method="POST" action="options.php">
				<?php
					settings_fields( 'linhmobile' );
					do_settings_sections( 'linhmobile' );
					submit_button();
				?>
			</form>
		</div> 
		<?php
	}
	public function vnfaster_setup_sections() {
		add_settings_section( 'linhmobile_section', 'Nhập thông tin vào đây', array(), 'linhmobile' );
	}
	public function vnfaster_setup_fields() {
		$fields = array(
			array(
				'label' => 'Số điện thoại',
				'id' => 'sdt_lab',
				'type' => 'tel',
				'section' => 'linhmobile_section',
			),
			array(
				'label' => 'Link  facebook',
				'id' => 'fb_lab',
				'type' => 'text',
				'section' => 'linhmobile_section',
				'desc' => 'Nhập id user facebook ,ví dụ https://www.messenger.com/t/pmduc96 thì nhp : "pmduc96" ',
				'placeholder' => 'https://www.messenger.com/t/pmduc96',
			),
			array(
				'label' => 'Zalo',
				'id' => 'zalo_lab',
				'type' => 'tel',
				'section' => 'linhmobile_section',
			),
		);
		foreach( $fields as $field ){
			add_settings_field( $field['id'], $field['label'], array( $this, 'vnfaster_field_callback' ), 'linhmobile', $field['section'], $field );
			register_setting( 'linhmobile', $field['id'] );
		}
	}
	public function vnfaster_field_callback( $field ) {
		$value = get_option( $field['id'] );
		switch ( $field['type'] ) {
			default:
				printf( '<input name="%1$s" id="%1$s" type="%2$s" placeholder="%3$s" value="%4$s" />',
					$field['id'],
					$field['type'],
					$field['placeholder'],
					$value
				);
		}
		if( $desc = $field['desc'] ) {
			printf( '<p class="description">%s </p>', $desc );
		}
	}
}
new linhmobile_Settings_Page();
?>
