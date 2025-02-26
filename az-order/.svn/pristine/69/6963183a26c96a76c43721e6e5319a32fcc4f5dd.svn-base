<?php
/**
 * Plugin Name: A-Z Order
 * Plugin URI: http:/it.ivdimova.com/
 * Author: ivdimova
 * Description: Simple plugin to display posts in alplhabetical order according to specified post type
 * Author URI: http://it.ivdimova.com/
 * Version: 1.0
 * License: GPL2
*/

class az_Plugin_Settings {

	private $az_setting;

	public function __construct() {
		$this->az_setting = get_option( 'az_setting', '' );

		add_action('admin_init', array( $this, 'register_settings' ) );
	}


	 public function register_settings() {
		register_setting( 'az_setting', 'az_setting');

		add_settings_section(
			'az_settings_section',
			'AZ Order Settings',
			array($this, 'az_settings_callback'),
			'az-plugin-base'
		);


		add_settings_field(
			'az_post_type',
			__( 'Post Type: ', 'azbase' ),
			array( $this, 'az_type_text_callback' ),
			'az-plugin-base',
			'az_settings_section'
		);

		add_settings_field(
		'az_post_category',
		__( 'Category: ', 'azbase' ),
		array( $this, 'az_category_text_callback' ),
		'az-plugin-base',
		'az_settings_section'
				);


	}

	public function az_settings_callback() {
		echo _e( 'Add desired settings', 'azbase' );
	}



	public function az_type_text_callback() {
		$out = '';
		$val = '';

		if(! empty( $this->az_setting ) && isset ( $this->az_setting['az_post_type'] ) ) {
			$val = $this->az_setting['az_post_type'];
		}

		$out = '<input type="text" id="az_post_type" name="az_setting[az_post_type]" value="' . $val . '"  />';

		echo $out;
	}

	public function az_category_text_callback() {
		$out = '';
		$val = '';

		if(! empty( $this->az_setting ) && isset ( $this->az_setting['az_post_category'] ) ) {
			$val = $this->az_setting['az_post_category'];
		}

		$out = '<input type="text" id="az_post_category" name="az_setting[az_post_category]" value="' . $val . '"  />';

		echo $out;
	}

}




class az_Plugin_Base {

	function __construct() {


		add_action( 'admin_menu', array( $this, 'az_admin_pages_callback' ) );

		add_action( 'admin_init', array( $this, 'az_register_settings' ), 5 );

		add_action( 'init', array( $this, 'az_sample_shortcode' ) );
	}
	function az_admin_pages_callback() {
		add_menu_page('AZ Order Admin', 'AZ Order Admin', 'edit_themes', 'az-plugin-base', array( $this, 'az_plugin_base'));
	}

	function az_register_settings() {
		new az_Plugin_Settings();
	}
	function az_sample_shortcode() {
		add_shortcode( 'az-order', array( $this, 'az_sample_shortcode_body' ) );
	}
	function az_sample_shortcode_body( $attr, $content = null ) {
		include_once 'azpost.php';
	}
	function az_plugin_base() { ?>
		<div class="wrap">
			<div id="icon-edit" class="icon32 icon32-base-template"><br></div>
			<h2><?php _e( 'AZ Order Admin Page', 'azbase' ); ?></h2>

			<p><?php// _e(' AZ Order Admin Page', 'azbase' ); ?></p>

			<form id="az-plugin-base-form" action="options.php" method="POST">

					<?php settings_fields( 'az_setting' ) ?>
					<?php do_settings_sections( 'az-plugin-base' ) ?>

					<input type="submit" value="<?php _e( 'Save', 'azbase' ); ?>" />
			</form> <!-- end of #aztemplate-form -->
		</div>

	<?php 	}

	}

$az_plugin_base = new az_Plugin_Base();
