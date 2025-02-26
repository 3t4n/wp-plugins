<?php

namespace GSBEH;

class Shortcode {

	public function __construct() {
		// add_shortcode( 'gs_behance_widget', [ $this, 'render' ] );
		add_shortcode( 'gs_behance', [ $this, 'shortcode' ] );
	}

	/**
	 * Renders the shortcode.
	 *
	 * @return HTML $output The shortcode output html.
	 * @since  2.0.12
	 */
	public function render( $atts ) {

		$gs_beh_user         = plugin()->helpers->getOption( 'gs_beh_user', 'gs_behance_settings', '' );
		$gs_beh_tot_projects = plugin()->helpers->getOption( 'gs_beh_tot_projects', 'gs_behance_settings', '' );
		$linkTarget          = plugin()->helpers->getOption( 'gs_beh_link_tar', 'gs_behance_settings', '_blank' );

		$atts = shortcode_atts( array(
			'userid' => $gs_beh_user,
			'count'  => $gs_beh_tot_projects,
		), $atts );

		global $wpdb;
		$gs_behance_shots = plugin()->data->get_shots( $atts['userid'], $atts['count'], 'id', 'asc' );

		$output = '';
		$output .= '<div class="beh-widget-area">';

		if ( is_array( $gs_behance_shots ) ) {
			foreach ( $gs_behance_shots as $gs_beh_single_shot ) {
				$output .= '<div class="beh-widget-projects">';
				$output .= '<div class="beh-img-tit-cat">';
				$output .= '<img src="' . $gs_beh_single_shot['thum_image'] . '"/>';

				$output .= '<div class="beh-tit-cat">';
				$output .= '<span class="beh-proj-tit">' . $gs_beh_single_shot['name'] . '</span>';
				$output .= '<a class="beh_hover" href="' . $gs_beh_single_shot['url'] . '" target="' . $linkTarget . '">';
				$output .= '<i class="fa fa-paper-plane-o"></i>';
				$output .= '</a>';
				$output .= '</div>'; // end beh-tit-cat
				$output .= '</div>'; // end beh-img-tit-cat

				$output .= '<ul class="beh-stat">';
				$output .= '<li class="beh-app"><i class="fa fa-thumbs-o-up"></i><span class="number">' . number_format_i18n( $gs_beh_single_shot['views'] ) . '</span></li>';
				$output .= '<li class="beh-views"><i class="fa fa-eye"></i><span class="number ">' . number_format_i18n( $gs_beh_single_shot['likes'] ) . '</span></li>';
				$output .= '<li class="beh-comments"><i class="fa fa-comment-o"></i><span class="number">' . number_format_i18n( $gs_beh_single_shot['comments'] ) . '</span></li>';
				$output .= '</ul>';

				$output .= '</div>'; // end beh-widget-projects

			}
		}

		do_action( 'gs_behance_custom_css' );

		$output .= '</div>';

		return $output;

	}

	/**
	 * Renders the shortcode.
	 *
	 * @return HTML $output The shortcode output html.
	 * @since  2.0.12
	 */
	public function shortcode( $atts ) {

		if ( ! is_array( $atts ) ) {
			$atts = [];
		}

		if ( empty( $atts['id'] ) ) {
			return __( 'No shortcode ID found', 'gs-behance' );
		}

		$is_preview         = ! empty( $atts['preview'] );
		$shortcode_settings = plugin()->builder->get_shortcode_settings( $atts['id'], $is_preview );

		// Check for missing information
		if ( empty( $shortcode_settings['userid'] ) ) {
			return '<div class="gs_beh_error">User ID is required.</div>';
		}

		// By default force mode
		$force_asset_load = true;

		if ( ! $is_preview ) {

			// For Asset Generator
			$main_post_id = gsBehanceAssetGenerator()->get_current_page_id();

			$asset_data = gsBehanceAssetGenerator()->get_assets_data( $main_post_id );

			if ( empty( $asset_data ) ) {

				// Saved assets not found
				// Force load the assets for first time load
				// Generate the assets for later use
				gsBehanceAssetGenerator()->generate( $main_post_id, $shortcode_settings );

			} else {

				// Saved assets found
				// Stop force loading the assets
				// Leave the job for Asset Loader
				$force_asset_load = false;
			}
		}

		$username      = $shortcode_settings['userid'];
		$count         = (int) $shortcode_settings['count'];
		$order         = $shortcode_settings['order'];
		$order_by      = $shortcode_settings['order_by'];
		$is_pagination = $shortcode_settings['pagination'];
		$pagination    = (int) $shortcode_settings['number_of_paginate_items'];
		$categories    = $shortcode_settings['categories'];

		$projects_count = plugin()->data->has_projects( $username );
		$gs_behance_shots = [];

		if ( ! gsbeh_fs()->is_paying_or_trial() && ( $count > 12 ) ) $count = 12;
		if ( ! gsbeh_fs()->is_paying_or_trial() && ( $pagination > 12 ) ) $pagination = 12;
		
		if ( ! $projects_count || $projects_count < $count ) {
			plugin()->data->save_api_data( $username, $count, 0, true );
		}
		
		$gs_behance_projects = plugin()->data->get_shots( $username, [
			'limit'   => $is_pagination ? $pagination : $count,
			'orderby' => $order_by,
			'order'   => $order,
			// 'fields'  => (array) $categories ?? [],
			'is_pagination' => $is_pagination,
		]);

		$gs_behance_shots = $gs_behance_projects['projects'];
		$columnClasses = plugin()->helpers->get_column_classes( $shortcode_settings['columns'], $shortcode_settings['columns_tablet'], $shortcode_settings['columns_mobile_portrait'], $shortcode_settings['columns_mobile'] );

		$output = '';
		$output .= sprintf( "<div class='gs_beh_area %s gs-behance-wrap-%d' data-carousel-settings='%s'>", $shortcode_settings['theme'], $shortcode_settings['id'], json_encode( $shortcode_settings ) );
		ob_start();

		if ( 'gs_beh_theme1' === $shortcode_settings['theme'] ) {
			$template = 'gs_behance_structure_one.php';
		}

		if ( gsbeh_fs()->is_paying_or_trial() ) {

			if ( 'gs_beh_theme2' === $shortcode_settings['theme'] ) {
				$template = 'pro/gs_behance_stats_style_1.php';
			}

			if ( 'gs_beh_theme2_hover' === $shortcode_settings['theme'] ) {
				$template = 'pro/gs_behance_stats_style_2.php';
			}

			if ( 'gs_beh_theme3' === $shortcode_settings['theme'] ) {
				$template = 'pro/gs_behance_hover_style_1.php';
			}

			if ( 'gs_beh_theme3_style2' === $shortcode_settings['theme'] ) {
				$template = 'pro/gs_behance_hover_style_2.php';
			}

			if ( 'gs_beh_theme3_style3' === $shortcode_settings['theme'] ) {
				$template = 'pro/gs_behance_hover_style_3.php';
			}

			if ( 'gs_beh_theme3_style4' === $shortcode_settings['theme'] ) {
				$template = 'pro/gs_behance_hover_style_4.php';
			}

			if ( 'gs_popup_style_1' === $shortcode_settings['theme'] ) {
				$template = 'pro/gs_behance_popup_style_1_and_2.php';
			}

			if ( 'gs_popup_style_2' === $shortcode_settings['theme'] ) {
				$template = 'pro/gs_behance_popup_style_1_and_2.php';
			}

			if ( 'gs_beh_theme5' === $shortcode_settings['theme'] ) {
				$template = 'pro/gs_behance_structure_slider_1.php';
			}

			if ( 'gs_beh_theme6' === $shortcode_settings['theme'] ) {
				$template = 'pro/gs_behance_structure_six_profile.php';
			}

			if ( 'gs_beh_theme7' === $shortcode_settings['theme'] ) {
				$template = 'pro/gs_behance_structure_seven_filter.php';
			}

		} else {
			$template = 'gs_behance_structure_one.php';
		}

		include TemplateLoader::locate_template( $template );
		$output .= ob_get_clean();

		// Fire force asset load when needed
		if ( plugin()->integrations->is_builder_preview() || $force_asset_load ) {

			gsBehanceAssetGenerator()->force_enqueue_assets( $shortcode_settings );
			wp_add_inline_script( 'gs-behance-public', "jQuery(document).trigger( 'gsbeh:scripts:reprocess' );jQuery(function() { jQuery(document).trigger( 'gsbeh:scripts:reprocess' ) })" );

			// Shortcode Custom CSS
			$css = gsBehanceAssetGenerator()->get_shortcode_custom_css( $shortcode_settings );
			if ( ! empty( $css ) ) {
				printf( "<style>%s</style>", minimize_css_simple( $css ) );
			}

			// Prefs Custom CSS
			$css = gsBehanceAssetGenerator()->get_prefs_custom_css();
			if ( ! empty( $css ) ) {
				printf( "<style>%s</style>", minimize_css_simple( $css ) );
			}

		}

		if ( ! empty( $gs_behance_projects['html'] ) ) {
			$output .= $gs_behance_projects['html'];
			$output .= '</div>';
		}

		return $output;
	}
}
