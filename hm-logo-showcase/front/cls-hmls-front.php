<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
*	Front Parent Class
*/
class HMLS_Front 
{
	use Hmls_Slide_Content_Settings, Hmls_Slide_Template_Settings, Hmls_Slide_Style_Settings, Hmls_Grid_Content_Settings, Hmls_Grid_Style_Settings, Hmls_Common;

	private $hmls_version;

	function __construct( $version ) {
		$this->hmls_version = $version;
		$this->hmls_assets_prefix = substr(HMLS_PRFX, 0, -1) . '-';
	}
	
	function hmls_front_assets() {

		$hmlsSlideContentSettings 	= $this->get_slide_content_settings();
		$hmlsSlideTemplate			= $this->get_slide_template_settings();

		foreach ( $hmlsSlideContentSettings as $option_name => $option_value ) {
			
			if ( isset( $hmlsSlideContentSettings[$option_name] ) ) {
				${"" . $option_name}  = $option_value;
			}
		}

		foreach ( $hmlsSlideTemplate as $template_name => $template_val ) {
			if ( isset( $hmlsSlideTemplate[$template_name] ) ) {
				${"" . $template_name}  = $template_val;
			}
		}

		wp_enqueue_style(
            $this->hmls_assets_prefix . 'font-awesome',
            HMLS_ASSETS . 'css/fontawesome/css/all.min.css',
            array(),
            $this->hmls_version,
            FALSE
        );
		
		wp_enqueue_style(
			'hmls-slick', 
			HMLS_ASSETS . 'css/slick.css',
			array(),
			$this->hmls_version,
			FALSE 
		);

		wp_enqueue_style(
			'hmls-slick-theme', 
			HMLS_ASSETS . 'css/slick-theme.css',
			array(),
			$this->hmls_version,
			FALSE 
		);
		
		wp_enqueue_style( 'hmls-front', 
			HMLS_ASSETS . 'css/' . $this->hmls_assets_prefix . 'front.css',
			array(),
			$this->hmls_version,
			FALSE 
		);
		
		if( ! wp_script_is( 'jquery' ) ) {
			wp_enqueue_script('jquery');
		}

		wp_enqueue_script(
			'hmls-slick',
			HMLS_ASSETS . 'js/slick.js',
			'',
			'2.4.20',
			TRUE
		);
		wp_enqueue_script(  'hmls-front',
							HMLS_ASSETS . 'js/' . $this->hmls_assets_prefix . 'front.js',
							array('jquery'),
							$this->hmls_version,
							TRUE );
		
		$hmlsSlideOptionArr = [
			'speed'			=> $hmls_slide_center_mode ? 2200 : 300,
			'centerMode'	=> $hmls_slide_center_mode ? true : false,
			'logos' 		=> $hmls_logo_per_slide,
			'autoplay' 		=> $hmls_slide_autoplay,
			'interval' 		=> $hmls_slide_interval,
			'displayRtl'	=> ( 'rtl' === $hmls_template ) ? true : false,
			'displayArrow'	=> ( 'on' == $hmls_slide_hide_arrow ) ? true : false,
		];
		
		wp_localize_script( 'hmls-front', 'hmlsSlideOption', $hmlsSlideOptionArr );
	}

	function hmls_load_shortcode() {

		add_shortcode( 'hm_logo_showcase', array( $this, 'hmls_load_shortcode_view' ) );
	}

	function hmls_load_shortcode_view( $hmlsAttr ) {

		$hmlsSlideContentSettings	= $this->get_slide_content_settings();
		$hmlsSlideTemplate			= $this->get_slide_template_settings();
		$hmlsSlideStylesSettings	= $this->get_slide_styles_settings();
		$gridSettingsContent		= $this->get_grid_content_settings();
		$hmlsGridStyleSettings   	= $this->get_grid_style_settings();

		foreach ( $hmlsSlideContentSettings as $option_name => $option_value ) {
			
			if ( isset( $hmlsSlideContentSettings[$option_name] ) ) {

				${"" . $option_name}  = $option_value;
			
			}
		}

		foreach ( $hmlsSlideStylesSettings as $style_key => $style_value ) {
    
			if ( isset( $hmlsSlideStylesSettings[$style_key] ) ) {
		
				${"" . $style_key}  = $style_value;
			
			}
		}

		foreach ( $hmlsSlideTemplate as $template_name => $template_val ) {
			if ( isset( $hmlsSlideTemplate[$template_name] ) ) {
				${"" . $template_name}  = $template_val;
			}
		}

		foreach ( $gridSettingsContent as $gc_key => $gc_value ) {
    
			if ( isset( $gridSettingsContent[$gc_key] ) ) {
		
				${"" . $gc_key}  = $gc_value;
			
			}
		}

		foreach ( $hmlsGridStyleSettings as $gs_key => $gs_value ) {
    
			if ( isset( $hmlsGridStyleSettings[$gs_key] ) ) {
		
				${"" . $gs_key}  = $gs_value;
			
			}
		}

		$output = '';
		ob_start();
		include HMLS_PATH . 'front/view/logo.php';
		$output .= ob_get_clean();
		return $output;
	}
}
?>