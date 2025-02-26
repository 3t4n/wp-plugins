<?php
/*
Plugin Name: AMS Page Scroll Back To Top
Description: Adds 'Scroll Back to Top' button feature to your wordpress site.
Author: Manoj Sathyavrathan
Version: 1.1
Text Domain: msv-amspstt-page-scroll-to-top
*/

namespace MSV_AMSPSBTT_MAIN\PAGE_SCROLL_BACK_TO_TOP;

if( ! defined( 'ABSPATH' ) ) exit();

// initialize plugin
if ( function_exists( 'add_action' ) && function_exists( 'register_activation_hook' ) ) {
	add_action( 'plugins_loaded', array( '\MSV_AMSPSBTT_MAIN\PAGE_SCROLL_BACK_TO_TOP\MSV_AMSPSTT_Page_Scroll_Back_To_Top', 'get_msv_amspsbtt_page_scroll' ) );
}

/**
 * main class for the plugin
 */
class MSV_AMSPSTT_Page_Scroll_Back_To_Top {

    // singleton class variable
	static private $msv_amspsbtt_page_scroll = NULL;
	
	// singleton method
	public static function get_msv_amspsbtt_page_scroll() {
		if ( NULL === self::$msv_amspsbtt_page_scroll ) {
			self::$msv_amspsbtt_page_scroll = new self;
		}
		return self::$msv_amspsbtt_page_scroll;
	}

    public function __construct() {
        $this->define();
        $this->inc();
        $this->hooks();
    }

    public function define() {
        define( 'MSV_AMSPSBTT_PAGE_SCROLL_BACK_TO_TOP', __FILE__ );
    }

    public function inc() {
        include_once dirname( MSV_AMSPSBTT_PAGE_SCROLL_BACK_TO_TOP ) . '/includes/ams-page-scroll-back-settings.php';
    }

    public function hooks() {
        add_action( 'admin_enqueue_scripts', array( $this, 'msv_admin_enqueue_scripts' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'msv_wp_enqueue_scripts' ) );
		add_action( 'wp_footer', array( $this, 'show_icon' ) );
    }

    public function msv_wp_enqueue_scripts() {
        include_once dirname( MSV_AMSPSBTT_PAGE_SCROLL_BACK_TO_TOP ) . '/includes/ams-page-scroll-back-inline-style.php';
    }

    public function msv_admin_enqueue_scripts() {
        if( isset( $_GET['page'] ) && $_GET['page'] == 'msv-amspsbtt-page-scroll-back-to-top-settings' ) :
			wp_enqueue_style( 'msv-amspsbtt-page-scroll-admin-style', plugins_url( '/assets/css/admin.css', MSV_AMSPSBTT_PAGE_SCROLL_BACK_TO_TOP ) );
			wp_enqueue_script( 'msv-amspsbtt-page-scroll-admin-script', plugins_url( '/assets/js/admin.js', MSV_AMSPSBTT_PAGE_SCROLL_BACK_TO_TOP ), array(), '1.0', true );
			wp_enqueue_script( 'msv-amspsbtt-page-scroll-admin-display', plugins_url( '/assets/js/admin-display.js', MSV_AMSPSBTT_PAGE_SCROLL_BACK_TO_TOP ), array(), '1.0', true );
			wp_enqueue_script( 'msv-amspsbtt-page-scroll-admin-action', plugins_url( '/assets/js/admin-action.js', MSV_AMSPSBTT_PAGE_SCROLL_BACK_TO_TOP ), array(), '1.0', true );
			wp_register_style(
				'msv-amspsbtt-page-scroll-font-awesome', plugins_url( '/assets/css/font-awesome.min.css', MSV_AMSPSBTT_PAGE_SCROLL_BACK_TO_TOP ), array(), '4.6.3.1');
					wp_enqueue_style( 'msv-amspsbtt-page-scroll-font-awesome' );
		endif;
		$query_args = array(
			'family' => 'Open+Sans:400,700|Oswald:400,700|Roboto:400,700|Shrikhand|Teko:400,700|Cabin:400,700|Anton|Poiret+One|Courgette|Permanent+Marker',
			'subset' => 'latin,latin-ext',
		);
            
		wp_register_style( 'ams_psbtt_google_fonts', add_query_arg( $query_args, "http://fonts.googleapis.com/css" ), array(), null );
		wp_enqueue_style( 'ams_psbtt_google_fonts' );
	   
    }

    public function show_icon() {
		$html = '<div class="ams-page-scroll-back-to-top-wrapper">';
        $icon_type = ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_icon', 'icon_type', 'preset' );
		if ( 'preset' == $icon_type ) :
			$html .= '<img title="Scroll to Top" class="page-scroll-back-to-top-img-preset" src="' . ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_icon', 'image_preset', plugins_url( 'assets/icons/arrow23.png', MSV_AMSPSBTT_PAGE_SCROLL_BACK_TO_TOP ) ) . '" />';
		elseif ( 'upload' == $icon_type ) :
			$html .= '<img title="Scroll to Top" class="page-scroll-back-to-top-img-preset" src="' . ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_icon', 'image_upload', plugins_url( 'assets/icons/arrow23.png', MSV_AMSPSBTT_PAGE_SCROLL_BACK_TO_TOP ) ) . '" />';
		elseif ( 'icon' == $icon_type ) :
			$html .= '<i class="fa ' . ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_icon', 'icon_preset', 'fa-angle-double-up') . ' ' . ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_icon', 'icon_size', 'fa-lg') .  '"></i>';
		elseif ( 'text' == $icon_type ) :
			$html .= '<p class="page-scroll-back-to-top-text-button">' . ams_get_option( 'msv_amspsbtt_page_scroll_back_to_top_icon', 'text_button', 'Scroll Back To Top') . '</p>';
		endif;
		
		$html .= '</div>';
        echo $html;
    }
}
?>