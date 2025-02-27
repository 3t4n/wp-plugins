<?php

namespace GS_BOOKS;

use function GS_BOOKS_PRO\is_pro_valid;

defined( 'ABSPATH' ) || exit;

class GS_Books_Asset_Generator extends GS_Asset_Generator_Base {

	private static $instance = null;

	public static function getInstance() {
		
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function get_assets_key() {
		return 'gs-books-showcase';
	}

	public function generateStyle( $selector, $selector_divi, $targets, $prop, $value ) {
		
		$selectors = [];
		if ( empty($targets) ) return;
		if ( gettype($targets) !== 'array' ) $targets = [$targets];

		if ( !empty($selector_divi) && ( is_divi_active() || is_divi_editor() ) ) {
			foreach ( $targets as $target ) $selectors[] = $selector_divi . $target;
		}

		foreach ( $targets as $target ) $selectors[] = $selector . $target;

		echo wp_strip_all_tags( sprintf( '%s{%s:%s}', join(',', $selectors), $prop, $value ) );
	}

	public function generateCustomCss( $settings, $shortCodeId ) {
		ob_start();

		$selector 	   = '#gs_book_area_' . $shortCodeId;
		$selector_divi = '#et-boc .et-l div ' . $selector;
		
		if ( !empty( $settings['gs_book_fz']) ) {
			$this->generateStyle( $selector, $selector_divi,  ' .gsb-title h3', '--gsb-title-font-size', $settings['gs_book_fz'] );
		}
		
		if ( !empty( $settings['gs_book_fntw']) ) {
			$this->generateStyle( $selector, $selector_divi,  ' .gsb-title h3', '--gsb-title-font-weight', $settings['gs_book_fntw'] );
		}		
		
		if ( !empty( $settings['gs_book_fnstyl']) ) {
			$this->generateStyle( $selector, $selector_divi,  ' .gsb-title h3', 'font-style', $settings['gs_book_fnstyl'] );
		}
		
		if ( !empty( $settings['gs_book_name_color']) ) {
			$this->generateStyle( $selector, $selector_divi,  ' .gsb-title h3', '--gsb-title-color', $settings['gs_book_name_color'] );
		}

		if( !empty( $settings['gs_book_rating_color'] ) ) {
			$this->generateStyle( $selector, $selector_divi,  ' .gs-star-rating', 'color', $settings['gs_book_rating_color'] );
		}
		
		if ( !empty( $settings['gs_book_label_fz']) ) {
			$this->generateStyle( $selector, $selector_divi,  ' .gsb-book-info p', '--gsb-info-font-size', $settings['gs_book_label_fz'] );
		}
		
		// if ( !empty( $settings['gs_book_label_color']) ) {
		// 	$this->generateStyle( $selector, $selector_divi,  ' .gsb-book-info p', '--gsb-info-color', $settings['gs_book_label_color'] );
		// }
		
		// if ( !empty( $settings['gs_books_btn_nav_cls_color']) ) {
		// 	$this->generateStyle( $selector, $selector_divi,  ' .gsb-book-info p', '--gsb-info-color', $settings['gs_books_btn_nav_cls_color'] );
		// }
		
		// if ( !empty( $settings['gs_filter_cat_pos']) ) {
		// 	$this->generateStyle( $selector, $selector_divi,  ' .gsb-desc p', 'text-align', $settings['gs_filter_cat_pos'] );
		// }
		
		if ( !empty( $settings['gs_sin_book_txt_align']) ) {
			$this->generateStyle( $selector, $selector_divi,  ' .gsb-desc p', 'text-align', $settings['gs_sin_book_txt_align'] );
		}


		return ob_get_clean();
	}

	public function generate_assets_data( Array $settings ) {

		if ( empty($settings) || !empty($settings['is_preview']) ) return;

		$this->add_item_in_asset_list( 'styles', 'gs-books-showcase-public', ['gs-font-awesome-5'] );
		$this->add_item_in_asset_list( 'scripts', 'gs-books-showcase-public', ['jquery'] );

		if( $settings['link_type']  === 'popup' ) {
			$this->add_item_in_asset_list( 'styles', 'gs-books-showcase-public', ['gs-magnific-popup'] );
			$this->add_item_in_asset_list( 'scripts', 'gs-books-showcase-public', ['gs-magnific-popup'] );
		}

		if ( 'slider' === $settings['view_type'] ) {
			$this->add_item_in_asset_list( 'styles', 'gs-books-showcase-public', ['gs-swiper'] );
			$this->add_item_in_asset_list( 'scripts', 'gs-books-showcase-public', ['gs-swiper'] );
		}

		if ( is_pro_active() && is_pro_valid() ) {
			if ( 'filter' === $settings['view_type'] ) {
				$this->add_item_in_asset_list( 'scripts', 'gs-books-showcase-public', ['gs-isotope'] );
			}
		}
		
		// if (  $settings['gs_l_tooltip'] ) {
		// 	$this->add_item_in_asset_list( 'styles', 'gs-books-showcase-public', ['gs-tippyjs'] );
		// 	$this->add_item_in_asset_list( 'scripts', 'gs-books-showcase-public', ['gs-tippyjs'] );
		// }

		$css = $this->get_shortcode_custom_css( $settings );

		if ( !empty($css) ) {
			$this->add_item_in_asset_list( 'styles', 'inline', minimize_css_simple($css) );
		}

		// Hooked for Pro
		do_action( 'gs_books_assets_data_generated', $settings );

	}

	public function enqueue_plugin_assets( $main_post_id, $assets = [] ) {

		if ( empty($assets) || empty($assets['styles']) || empty($assets['scripts']) ) return;

		foreach ( $assets['styles'] as $asset => $data ) {
			if ( $asset == 'inline' ) {
				if ( !empty($data) ) wp_add_inline_style( 'gs-books-showcase-public', $data );
			} else {
				Scripts::add_dependency_styles( $asset, $data );
			}
		}

		foreach ( $assets['scripts'] as $asset => $data ) {
			if ( $asset == 'inline' ) {
				if ( !empty($data) ) wp_add_inline_script( 'gs-books-showcase-public', $data );
			} else {
				Scripts::add_dependency_scripts( $asset, $data );
			}
		}

		wp_enqueue_style( 'gs-books-showcase-public' );
		wp_enqueue_script( 'gs-books-showcase-public' );

		if ( is_pro_active() && is_pro_valid() ) {
			wp_enqueue_script( 'gs-isotope' );
		}

		// if ( gs_logo_is_divi_active() ) {
		// 	wp_enqueue_style( 'gs-logo-divi-public' );
		// }

	}

	public function maybe_force_enqueue_assets( Array $settings ) {

		wp_enqueue_style( 'gs-books-showcase-public' );
		wp_enqueue_script( 'gs-books-showcase-public' );

		plugin()->scripts->wp_enqueue_style_all( 'public' );
		plugin()->scripts->wp_enqueue_script_all( 'public' );

		// Shortcode Generated CSS
		$css = $this->get_shortcode_custom_css( $settings );
		$this->wp_add_inline_style( $css );

		if ( !empty($css) ) {
			wp_add_inline_style( 'gs-books-showcase-public', minimize_css_simple($css) );
		}

	}

	public function get_shortcode_custom_css( $settings ) {
		return $this->generateCustomCss( $settings, $settings['id'] );
	}

	public function wp_add_inline_style( $css ) {
		if ( !empty($css) ) $css = minimize_css_simple($css);
		if ( !empty($css) ) wp_add_inline_style( 'gs-books-showcase-public', wp_strip_all_tags($css) );
	}

}

if ( ! function_exists( 'gsBooksAssetGenerator' ) ) {
	function gsBooksAssetGenerator() {
		return GS_Books_Asset_Generator::getInstance(); 
	}
}

// Must inilialized for the hooks
gsBooksAssetGenerator();
