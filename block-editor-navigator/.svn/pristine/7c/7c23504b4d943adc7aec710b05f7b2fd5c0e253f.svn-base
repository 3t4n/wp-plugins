<?php

namespace BEN\Block_Editor_Navigator;

! defined( ABSPATH ) || exit;

if ( ! class_exists( 'BEN_Search_Autocomplete' ) ) {

	class BEN_Search_Autocomplete extends Block_Editor_Navigator {

		public function __construct() {
			parent::__construct();
		}

		public function init() {
			add_action( 'wp_loaded', array( $this, 'on_loaded' ) );
		}

		public function on_loaded() {
			add_action( 'wp_ajax_navigation_search', array( $this, 'navigation_search' ) );
		}

		public function navigation_search() {
			$search_input_text = isset( $_REQUEST['search_input_text'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['search_input_text'] ) ) : '';
			$current_post_type = isset( $_REQUEST['current_post_type'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['current_post_type'] ) ) : '';
			$is_classic_editor = isset( $_REQUEST['is_classic_editor'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['is_classic_editor'] ) ) : '';

			$search_results = array();

			// Set minimum 3 characters before we start the search
			if ( strlen( $search_input_text ) < 3 ) {
				echo wp_json_encode(
					array(
						array(
							'guid'  => 0,
							'title' => 'No results found!',
						),
					),
				);
				exit;
			}

			add_filter( 'posts_where', array( $this, 'search_by_title_only' ), 10, 2 );

			$query = new \WP_Query(
				array(
					'posts_per_page' => -1,
					'post_type'      => $current_post_type,
					's'              => $search_input_text,
					'orderby'        => 'title menu_order',
					'order'          => 'ASC',
				)
			);

			remove_filter( 'posts_where', array( $this, 'search_by_title_only' ), 10 );

			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();

					if ( $is_classic_editor ) {
						$search_results[] = array(
							'guid'  => admin_url( 'post.php?post=' . get_the_ID() . '&action=edit&classic-editor&classic-editor__forget' ),
							'title' => get_the_title(),
						);
					} else {
						$search_results[] = array(
							'guid'  => admin_url( 'post.php?post=' . get_the_ID() . '&action=edit&classic-editor__forget' ),
							'title' => get_the_title(),
						);
					}
				}

				echo wp_json_encode( $search_results );
				exit;
			}

			echo wp_json_encode(
				array(
					array(
						'guid'  => 0,
						'title' => 'No results found!',
					),
				),
			);
			exit;
		}

		function search_by_title_only( $where, $query ) {
			global $wpdb;

			// Check if it's the intended query
			if ( $query->is_search() && ! empty( $query->query['s'] ) ) {
					$search_term = esc_sql( $query->query['s'] );
					$where       = str_replace(
						"{$wpdb->posts}.post_content LIKE",
						"{$wpdb->posts}.post_title LIKE",
						$where
					);
			}

			return $where;
		}
	}

	$ben = new BEN_Search_Autocomplete();
	$ben->init();
}
