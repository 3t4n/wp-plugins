<?php

namespace GS_BOOKS;

use function GS_BOOKS_PRO\is_pro_valid;

defined( 'ABSPATH' ) || exit;

/**
 * Plugin main shortcode.
 *
 * @since 1.2.11
 */
class Shortcode {

	/**
	 * Class constructor.
	 *
	 * @since 1.2.11
	 */
	public function __construct() {
		add_shortcode( 'gs_bookshowcase', array( $this, 'shortcode' ) );
	}

	/**
	 * The main shortcode function.
	 *
	 * @since 1.2.11
	 *
	 * @param  array $atts The shortcode attributes.
	 * @return string
	 */
	public function shortcode( $atts ) {

		if ( empty( $atts['id'] ) ) {
			return __( 'No shortcode ID found', 'gsbookshowcase' );
		}

		$is_preview = ! empty( $atts['preview'] );
		$settings   = (array) $this->get_shortcode_settings( $atts['id'], $is_preview );

		// By default force mode
		$force_asset_load = true;

		if ( ! $is_preview ) {

			// For Asset Generator
			$main_post_id = gsBooksAssetGenerator()->get_current_page_id();
			$asset_data   = gsBooksAssetGenerator()->get_assets_data( $main_post_id );

			if ( empty( $asset_data ) ) {

				// Saved assets not found
				// Force load the assets for first time load
				// Generate the assets for later use
				gsBooksAssetGenerator()->generate( $main_post_id, $settings );
			} else {
				// Saved assets found
				// Stop force loading the assets
				// Leave the job for Asset Loader
				$force_asset_load = false;
			}
		}

		extract( $settings );

		$_popup_enabled = false;
		if ( $link_type == 'popup' ) {
			$_popup_enabled = true;
		}

		$group         = ( isset( $group ) && ! empty( $group ) ) ? $group : array();
		$exclude_group = ( isset( $exclude_group ) && ! empty( $exclude_group ) ) ? $exclude_group : array();
		$include_tags  = ( isset( $include_tags ) && ! empty( $include_tags ) ) ? $include_tags : array();
		$exclude_tags  = ( isset( $exclude_tags ) && ! empty( $exclude_tags ) ) ? $exclude_tags : array();

		$queryArgs = array(
			'post_type'      => 'gs_bookshowcase',
			'order'          => $order,
			'orderby'        => $orderby,
			'posts_per_page' => $num,
			'no_found_rows'  => true,
			'tax_query'      => array(),
		);

		if ( isset( $settings['gsb_filter_by'] ) ) {
			if ( $settings['gsb_filter_by'] === 'category' ) {
				add_tax_query( $queryArgs, 'bookshowcase_group', $group );
				add_tax_query( $queryArgs, 'bookshowcase_group', $exclude_group, 'NOT IN' );
			} elseif ( $settings['gsb_filter_by'] === 'tag' ) {
				add_tax_query( $queryArgs, 'gsb_tag', $include_tags );
				add_tax_query( $queryArgs, 'gsb_tag', $exclude_tags, 'NOT IN' );
			} elseif( $settings['gsb_filter_by'] === 'author' ) {
				add_tax_query( $queryArgs, 'gsb_author', $include_authors );
				add_tax_query( $queryArgs, 'gsb_author', $exclude_authors, 'NOT IN' );
			} elseif( $settings['gsb_filter_by'] === 'genre' ) {
				add_tax_query( $queryArgs, 'gsb_author', $include_genres );
				add_tax_query( $queryArgs, 'gsb_author', $exclude_genres, 'NOT IN' );
			} elseif( $settings['gsb_filter_by'] === 'series' ) {
				add_tax_query( $queryArgs, 'gsb_author', $include_series );
				add_tax_query( $queryArgs, 'gsb_author', $exclude_series, 'NOT IN' );
			} elseif( $settings['gsb_filter_by'] === 'languages' ) {
				add_tax_query( $queryArgs, 'gsb_author', $include_languages );
				add_tax_query( $queryArgs, 'gsb_author', $exclude_languages, 'NOT IN' );
			} elseif( $settings['gsb_filter_by'] === 'publisher' ) {
				add_tax_query( $queryArgs, 'gsb_author', $include_publishers );
				add_tax_query( $queryArgs, 'gsb_author', $exclude_publishers, 'NOT IN' );
			} elseif( $settings['gsb_filter_by'] === 'country' ) {
				add_tax_query( $queryArgs, 'gsb_author', $include_countries );
				add_tax_query( $queryArgs, 'gsb_author', $exclude_countries, 'NOT IN' );
			} 
		}

		$paged = !empty($_GET['gs_book']) ? $_GET['gs_book'] : 1;
		if( $settings['gs_book_pagination'] ) {
			$queryArgs['paged']          = $paged;
			$queryArgs['posts_per_page'] = $settings['posts_per_page'];
			$queryArgs['no_found_rows']  = false;			
		}

		$query = new \WP_Query( $queryArgs );

		$slider_settings = '';
		if ( $settings['view_type'] === 'slider' ) {
			$slider_settings = get_carousel_settings( $settings );
		}

		$classes = array(
			'wrap',
			'gs_bookshowcase_area',
			'view_type_' . $view_type,
			'gs-book--img-efect_' . $image_filter,
			'gs-book--img-hover-efect_' . $hover_image_filter,
			$theme,
		);

		if ( $gsb_slider_dots && $view_type === 'slider' ) {
			$classes[] = 'carousel--has-dots';
			$classes[] = $gsb_dots_style;
		}

		if ( $gsb_slider_navs && $view_type === 'slider' ) {
			$classes[] = 'carousel--has-navs';
			$classes[] = $gsb_navs_style;
			if( $gsb_navs_style !== 'nav--style-08' ) {
				$classes[] = $gsb_navs_pos;
			}
		}

		if ( $settings['view_type'] === 'filter' ) {
			$classes[] = $filter_style ?? 'filter--default';
		}

		if ( substr( $theme, 0, 13 ) === 'author-style-' ) {
			$classes[] = 'authors-style';
		}

		// Get the groups
		$term_name = ( isset( $settings['gsb_filter_by'] ) && $settings['gsb_filter_by'] === 'category' ) ? 'bookshowcase_group' : 'gsb_tag';

		if ( ! empty( $group ) && isset( $settings['gsb_filter_by'] ) && $settings['gsb_filter_by'] === 'category' ) {
			$final_items = array_diff( $group, $exclude_group );
		} elseif ( ! empty( $include_tags ) && isset( $settings['gsb_filter_by'] ) && $settings['gsb_filter_by'] === 'tag' ) {
			$final_items = array_diff( $include_tags, $exclude_tags );
		} elseif ( $term_name === 'bookshowcase_group' ) {
			$final_items = get_all_groups( $exclude_group, $settings );
		} else {
			$final_items = get_all_tags( $term_name, $exclude_tags );
		}

		$gs_book_search_all_fields 	= getoption( 'gs_book_search_all_fields', false );

		$data_options = '';
		if( $view_type === 'filter' ) {
			$data_options = [
				'search_through_all_fields' => $gs_book_search_all_fields,
				'enable_clear_filters'      => $gs_book_enable_clear_filters,
				'enable_multi_select'       => $gs_book_enable_multi_select,
				'multi_select_ellipsis'     => $gs_book_multi_select_ellipsis,
				'reset_filters_text'        => 'Reset Filters',
			];
		}

		
		
		ob_start();

		?>

		<div id="gs_book_area_<?php echo esc_attr( $atts['id'] ); ?>" class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>" data-slider-settings='<?php echo json_encode( $slider_settings ); ?>' data-options='<?php echo json_encode($data_options); ?>'>
			<div class="gs-containeer">
				<?php if ( is_pro_active() && is_pro_valid() && isset( $settings['view_type'] ) && $settings['view_type'] === 'filter' ) {
					TemplateLoader::load_template( 'partials/gs-book-layout-taxonomy.php', [ 'final_items' => $final_items, 'settings' => $settings, 'term_name' => $term_name ] );
					TemplateLoader::load_template( 'partials/gs-book-layout-filters.php', $settings );
				} ?>
				<div class="gs-roow clearfix gs_bookshowcase">				
					<?php do_action( 'gs_books_template_before__loaded', $theme ); ?>

					<?php

						if ( 'gs_book_theme1' === $theme ) {
							include TemplateLoader::locate_template( 'gsb-square.php' );
						} else if ( 'style-01' === $theme ) {
							include TemplateLoader::locate_template( 'gsb-style-01.php' );
						} else if ( 'horizontal-03' === $theme ) {
							include TemplateLoader::locate_template( 'gsb-horizontal-03.php' );
						} else {

							if ( is_pro_active() && is_pro_valid() ) {
	
								if ( substr( $theme, 0, 6 ) === 'style-' ) {
									include TemplateLoader::locate_template( "gsb-{$theme}.php" );
								}
								if ( substr( $theme, 0, 11 ) === 'horizontal-' ) {
									include TemplateLoader::locate_template( "gsb-{$theme}.php" );
								}
								if ( substr( $theme, 0, 5 ) === 'flip-' ) {
									include TemplateLoader::locate_template( "gsb-{$theme}.php" );
								}
								if ( substr( $theme, 0, 14 ) === 'three-d-style-' ) {
									include TemplateLoader::locate_template( "gsb-{$theme}.php" );
								}
								if ( substr( $theme, 0, 13 ) === 'author-style-' ) {
									include TemplateLoader::locate_template( "gsb-{$theme}.php" );
								}
								if ( substr( $theme, 0, 7 ) === 'widget-' ) {
									include TemplateLoader::locate_template( "gsb-{$theme}.php" );
								}
	
							} else {
								include TemplateLoader::locate_template( 'gsb-style-01.php' );
							}

						}

						do_action( 'gs_books_template_after__loaded', $theme );

					?>
				</div>
			</div>
		</div>
		<?php

		if ( $this->should_custom_script_render() || $force_asset_load ) {

			gsBooksAssetGenerator()->force_enqueue_assets( $settings );

			wp_add_inline_script( 'gs-books-showcase-public', "jQuery(document).trigger( 'gsbook:scripts:reprocess' );jQuery(function() { jQuery(document).trigger( 'gsbook:scripts:reprocess' ) })" );

			$css = gsBooksAssetGenerator()->generateCustomCss( $settings, $settings['id'] );

			if ( ! empty( $css ) ) {
				minimize_css_simple( $css );
				echo '<style>' . $css . '</style>';
			}
		}

		$settings = null; // Free up the memory
		return ob_get_clean();
	}

	public function get_shortcode_settings( $id, $is_preview = false ) {

		$default_settings = array_merge(
			array(
				'id'         => $id,
				'is_preview' => $is_preview,
			),
			plugin()->builder->get_shortcode_default_settings()
		);

		if ( $is_preview ) {
			$preview_settings = plugin()->builder->validate_shortcode_settings( get_transient( $id ) );
			return shortcode_atts( $default_settings, $preview_settings );
		}

		$shortcode = plugin()->builder->_get_shortcode( $id );

		return shortcode_atts( $default_settings, (array) $shortcode['shortcode_settings'] );
	}

	public function should_custom_script_render() {

		$render = false;

		// For VC
		if ( ! empty( $_GET['vc_editable'] ) ) {
			return true;
		}

		// For Elementor
		if ( ( ! empty( $_GET['action'] ) && $_GET['action'] == 'elementor' ) || ( ! empty( $_POST['action'] ) && $_POST['action'] == 'elementor_ajax' ) ) {
			return true;
		}

		// For gutenberg
		if ( ! empty( $_GET['context'] ) && $_GET['context'] == 'edit' ) {
			return true;
		}

		// Beaver Builder
		if ( isset( $_GET['fl_builder_ui_iframe'] ) || ! empty( $_POST['fl_builder_data'] ) ) {
			return true;
		}

		// Oxygen Builder
		if ( ! empty( $_GET['action'] ) && $_GET['action'] == 'oxy_render_oxy-solid-testimonial' ) {
			return true;
		}

		return $render;
	}
}
