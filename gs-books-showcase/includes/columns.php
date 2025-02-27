<?php

namespace GS_BOOKS;

defined( 'ABSPATH' ) || exit;

/**
 * Responsible for handling columns in the post visual table.
 *
 * @since 1.2.11
 */
class Columns {

	/**
	 * Class constructor.
	 *
	 * @since 1.2.11
	 */
	public function __construct() {
		add_filter( 'manage_edit-gs_bookshowcase_columns', array( $this, 'screen_columns' ) );
		add_action( 'manage_posts_custom_column', array( $this, 'columns_content' ), 10, 2 );
	}

	/**
	 * Handles plugins screen columns.
	 *
	 * @since 1.2.11
	 *
	 * @param  array $columns Plugins posts table columns.
	 * @return array          New columns.
	 */
	public function screen_columns( $columns ) {

		$date        = $columns['date'] ?? '';
		$tags        = $columns['taxonomy-gsb_tag'] ?? '';
		$categories  = $columns['taxonomy-bookshowcase_group'] ?? '';

		unset( $columns['date'] );
		unset( $columns['taxonomy-gsb_tag'] );
		unset( $columns['comments'] );
		unset( $columns['taxonomy-bookshowcase_group'] );
		unset( $columns['taxonomy-gsb_author'] );

		$columns['title']                            = __( 'Book Name', 'gsbookshowcase' );
		$columns['gsbookshowcase_featured_image']    = __( 'Book Image', 'gsbookshowcase' );
		$columns['taxonomy-gsb_tag']                 = $tags;
		$columns['taxonomy-bookshowcase_group']      = $categories;
		// $columns['gsbks_copublisher']                = __( 'CO Publisher', 'gsbookshowcase' );
		$columns['date']                          = $date;

		return $columns;

	}

	/**
	 * Retrieves post featured image.
	 *
	 * @since 1.2.11
	 *
	 * @param  integer $post_id Post id to retrieve featured image.
	 * @return string          Featured image url.
	 */
	public function get_featured_image( $post_id ) {
		$thumbnail_id = get_post_thumbnail_id( $post_id );

		if ( $thumbnail_id ) {
			$image = wp_get_attachment_image_src( $thumbnail_id );			
			return $image[0];
		}
	}

	/**
	 * Display featured image in the post column.
	 *
	 * @since 1.2.11
	 *
	 * @param string  $column_name The column name.
	 * @param integer $post_id     The post Id.
	 */
	public function columns_content( $column_name, $post_id ) {
		if ( 'gsbookshowcase_featured_image' === $column_name ) {
			$image = $this->get_featured_image( $post_id );

			if ( $image ) {
				printf( '<img src="%s" width="34"/>', esc_url( $image ) );
			}
		}

		// if ( 'gsbks_copublisher' === $column_name ) {
		// 	$gs_publisher = get_post_meta( get_the_ID(), '_gsbks_copublisher', true );
		// 	echo $gs_publisher;
		// }

	}
}
