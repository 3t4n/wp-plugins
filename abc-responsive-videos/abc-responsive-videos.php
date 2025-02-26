<?php
/*
Plugin Name: ABC Responsive Videos
Plugin URI: https://alphabetthemes.com/downloads/abc-responsive-videos-wordpress-plugin/
Description: Automatically makes all videos responsive on handheld and mobile devices.
Author: Alphabet Themes
Author URI: https://alphabetthemes.com
Version: 1.0.0
Text Domain: abc-responsive-videos
Domain Path: /languages/
License: GPL2
*/

// Make sure we don't expose any info if called directly
if ( ! function_exists( 'add_action' ) ) {
	echo 'Hi there! I&rsquo;m just a plugin, not much I can do when called directly.';
	exit;
}

class ABC_Responsive_Videos {
    /**
     * Construct the plugin object
     */
    public function __construct() {
		add_action( 'init', array( $this, 'load_plugin_textdomain') );
		add_action( 'wp_head', array( $this, 'wp_head') );
		add_action( 'wp_enqueue_scripts', array( $this, 'wp_enqueue_scripts' ) );

		foreach ( glob( plugin_dir_path( __FILE__ ) . 'inc/*' ) as $filename ) {
			include $filename;
		}
    }

	// Internationalization
	public function load_plugin_textdomain () {
		load_plugin_textdomain( 'abc-responsive-videos', FALSE, plugin_basename( dirname( __FILE__ ) ) . '/languages/' );
	}

	public function wp_head() {
		echo '
<style>
.responsive-video-wrapper{width:100%;position:relative;padding:0}
.responsive-video-wrapper iframe,.responsive-video-wrapper object,.responsive-video-wrapper embed{position:absolute;top:0;left:0;width:100%;height:100%}
</style>';
	}

	public function wp_enqueue_scripts() {
		wp_enqueue_script( 'abc-responsive-videos', esc_url( plugin_dir_url( __FILE__ ) . 'js/responsive-videos.min.js' ), array( 'jquery' ), '1.1', true );
		wp_localize_script( 'abc-responsive-videos', 'abc_responsive_video', array(
			'selector' => get_theme_mod( 'abc_responsive_videos_selector', '#page' ),
		) );
	}
}
$abc_responsive_videos = new ABC_Responsive_Videos();