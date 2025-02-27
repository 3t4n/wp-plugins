<?php
/*
 Plugin Name: CSS
 Plugin URI: http://wordpress.org/extend/plugins/css/
 Description: A simple custom CSS plugin for themes that integrates with the new theme customizer.
 Author: koopersmith
 Version: 0.3
 Author URI: http://darylkoop.com/
 */

class Motif {
	public function __construct() {
		add_action( 'wp_head', array( $this, 'wp_head' ) );
		add_action( 'customize_register', array( $this, 'customize_register' ) );
		add_action( 'customize_preview_init', array( $this, 'customize_preview_init' ) );
	}

	public function css() {
		return get_theme_mod( 'motif_css' );
	}

	public function wp_head() {
		if ( ! $this->css() )
			return;

		?><style type="text/css" id="motif-css">
		<?php echo $this->css(); ?>
		</style><?php
	}

	public function customize_register( $wp_customize ) {
		include( 'class-motif-css-control.php' );

		$wp_customize->add_setting( 'motif_css', array(
			'transport' => 'postMessage',
		) );

		$wp_customize->add_section( 'motif', array(
			'title' => __( 'CSS' ),
		) );

		$wp_customize->add_control( new Motif_CSS_Control( $wp_customize, 'motif_css', array(
			'label'     => __( 'CSS' ),
			'section'   => 'motif',
		) ) );
	}

	public function customize_preview_init() {
		wp_enqueue_script( 'motif-preview', plugins_url( "motif.preview.js", __FILE__ ), array( 'customize-preview' ), '20120607', true );
	}
}

new Motif;