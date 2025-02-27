<?php

namespace GS_BOOKS;

defined( 'ABSPATH' ) || exit;

/**
 * Responsible for containing helper methods.
 *
 * @since 1.2.11
 */
class Helpers {

	static function get_option( $option, $default = '' ) {
		$options = get_option( 'gs_team_shortcode_prefs' );
		if ( isset( $options[ $option ] ) ) {
			return $options[ $option ];
		}
		return $default;
	}

	static function get_label_option( $option, $default = '' ) {
		$options = get_option( 'gs_bookshowcase_level_settings' );
		if ( isset( $options[ $option ] ) ) {
			return $options[ $option ];
		}
		return $default;
	}

	static function get_translation( $translation_name ) {

		$translations = array(
			'gsb_more_text_modify'             => __( 'More', 'gsbookshowcase' ),
			'gsb_author_text_modify'           => __( 'Author', 'gsbookshowcase' ),
			'gsb_publish_text_modify'          => __( 'Publish', 'gsbookshowcase' ),
			'gsb_publisher_text_modify'        => __( 'CO Publisher', 'gsbookshowcase' ),
			'gsb_translator_text_modify'       => __( 'Translator', 'gsbookshowcase' ),
			'gsb_format_text_modify'           => __( 'Format', 'gsbookshowcase' ),
			'gsb_isbn_text_modify'             => __( 'ISBN', 'gsbookshowcase' ),
			'gsb_asin_text_modify'             => __( 'ASIN', 'gsbookshowcase' ),
			'gsb_pages_text_modify'            => __( 'Pages', 'gsbookshowcase' ),
			'gsb_country_text_modify'          => __( 'Country', 'gsbookshowcase' ),
			'gsb_language_text_modify'         => __( 'Language', 'gsbookshowcase' ),
			'gsb_dimension_text_modify'        => __( 'Dimension', 'gsbookshowcase' ),
			'gsb_filesize_text_modify'         => __( 'File size(e-book)', 'gsbookshowcase' ),
			'gsb_readers_text_modify'          => __( "Reader's Review", 'gsbookshowcase' ),
			'gsb_rating_text_modify'           => __( 'Rating', 'gsbookshowcase' ),
			'gsb_bookURL_text_modify'          => __( 'Book URL', 'gsbookshowcase' ),
			'gsb_store_text_modify'            => __( 'Store', 'gsbookshowcase' ),
			'gsb_description_text_modify'      => __( 'Description', 'gsbookshowcase' ),
			'gsb_authordetails_text_modify'    => __( 'Author Details', 'gsbookshowcase' ),
			'gsb_bookdetailsflip_text_modify'  => __( 'Book Details', 'gsbookshowcase' ),
			'gsb_download_text_modify'         => __( 'Download', 'gsbookshowcase' ),
			'gsb_showallpublisher_text_modify' => __( 'Show All Publishe', 'gsbookshowcase' ),
			'gsb_searchby_text_modify'         => __( 'Search By Book Name', 'gsbookshowcase' ),
			'gsb_bookname_text_modify'         => __( 'Select Book Name', 'gsbookshowcase' ),
		);

		if ( ! array_key_exists( $translation_name, $translations ) ) {
			return '';
		}

		if ( get_option( 'gs_member_enable_multilingual', false ) ) {
			return $translations[ $translation_name ];
		}

		return get_option( $translation_name, $translations[ $translation_name ] );
	}

	static function isPreview() {
		return isset( $_REQUEST['gs_books_shortcode_preview'] ) && ! empty( $_REQUEST['gs_books_shortcode_preview'] );
	}

	static function gs_books_getoption( $option, $default = '' ) {
		$options = get_option( 'gs_books_slider_shortcode_prefs' );

		if ( isset( $options[ $option ] ) ) {
			return $options[ $option ];
		}

		return $default;
	}

	static function gs_books_echo_return( $content, $echo = false ) {
		if ( $echo ) {
			echo $content;
		} else {
			return $content;
		}
	}

	static function gs_book_thumbnail( $echo = false, $size = 'full' ) {
		$book_id = get_the_ID();

		if ( has_post_thumbnail() ) {

			$size = apply_filters( 'gs_book_thumbnail_size', $size, $book_id );
			if ( empty( $size ) ) {
				$size = 'full';
			}

			$thumbnail = get_the_post_thumbnail(
				$book_id,
				$size,
				array(
					'alt'      => get_the_title(),
					'itemprop' => 'image',
				)
			);

		} else {

			$thumbnail = sprintf( '<img src="%s" alt="%s" itemprop="image"/>', GS_BOOKS_PLUGIN_URI . '/assets/img/no_img.png', get_the_title() );
		}

		$thumbnail = apply_filters( 'gs_book_thumbnail_html', $thumbnail, $book_id );

		return self::gs_books_echo_return( $thumbnail, $echo );
	}

	static function isFromShortcodeBuilder( $atts ) {
		return ! empty( $atts['id'] );
	}

	static function wp_kses( $content ) {

		$allowed_tags = wp_kses_allowed_html( 'post' );

		$input_common_atts = array(
			'class'       => true,
			'id'          => true,
			'style'       => true,
			'novalidate'  => true,
			'name'        => true,
			'width'       => true,
			'height'      => true,
			'data'        => true,
			'title'       => true,
			'placeholder' => true,
			'value'       => true,
		);

		$allowed_tags = array_merge_recursive(
			$allowed_tags,
			array(
				'select' => $input_common_atts,
				'input'  => array_merge(
					$input_common_atts,
					array(
						'type'    => true,
						'checked' => true,
					)
				),
				'option' => array(
					'class'    => true,
					'id'       => true,
					'selected' => true,
					'data'     => true,
					'value'    => true,
				),
			)
		);

		return wp_kses( stripslashes_deep( $content ), $allowed_tags );
	}

	static function echo_return( $content, $echo = false ) {
		if ( $echo ) {
			echo self::wp_kses( $content );
		} else {
			return $content;
		}
	}

	static function showUpgradeToProMessage() {
		printf(
			'<h4 style="text-align: center;">%s <a href="%s" target="_blank">%s</a> %s<br><a href="%s" target="_blank">%s</a></h4>',
			__( 'Select correct Theme or Upgrade to', 'gsbookshowcase' ),
			esc_url( 'https://www.gsplugins.com/product/wordpress-books-showcase-plugin' ),
			__( 'Pro version', 'gsbookshowcase' ),
			__( 'for more Options', 'gsbookshowcase' ),
			esc_url( 'http://bookshowcase.gsplugins.com' ),
			__( 'Chcek available demos', 'gsbookshowcase' )
		);
	}

	static function checkUserCanEditPost( $postId ) {
		return current_user_can( 'edit_post', $postId );
	}

	static function gs_book_getoption( $option, $default = '' ) {

		$options = get_option( 'gs_bookshowcase_settings' );

		if ( isset( $options[ $option ] ) ) {
			return $options[ $option ];
		}

		return $default;
	}

	static function get_post_meta( $meta_key, $post_id = null, $single_mode = true ) {
		if ( empty( $post_id ) || ! is_numeric( $post_id ) ) {
			$post_id = get_the_ID();
		}
		if ( empty( $post_id ) ) return;
		return get_post_meta( $post_id, $meta_key, $single_mode );
	}

	// has post meta
	static function has_post_meta( $meta_key, $post_id = null ) {
		if ( empty( $post_id ) || ! is_numeric( $post_id ) ) {
			$post_id = get_the_ID();
		}
		if ( empty( $post_id ) ) return false;
		return metadata_exists( 'post', $post_id, $meta_key );
	}

	// has author taxonomy or author meta
	static function has_author_info( $post_id = null ) {
		if ( empty( $post_id ) || ! is_numeric( $post_id ) ) {
			$post_id = get_the_ID();
		}
		if ( empty( $post_id ) ) return false;

		// Checked for author taxonomy
		$author_term  = wp_get_post_terms( get_the_id(), 'gsb_author' );
		if ( ! is_wp_error( $author_term ) && ! empty( $author_term ) ) return true;

		// Checked for author meta
		return self::has_post_meta( '_gsbks_author_image_id', $post_id );
	}

	// Get related books query
	static function get_related_books_query( $post_id = null ) {
		
		if ( empty( $post_id ) || ! is_numeric( $post_id ) ) {
			$post_id = get_the_ID();
		}
		if ( empty( $post_id ) ) return false;

		$terms    = get_the_terms( $post_id, 'bookshowcase_group' );
		$term_ids = wp_list_pluck( $terms, 'term_id' );
		
		$args = array(
			'posts_per_page' => -1,
			'post_type'      => 'gs_bookshowcase',
			'post__not_in'   => array( $post_id ),
			'tax_query'      => array(
				array(
					'taxonomy' => 'bookshowcase_group',
					'field'    => 'term_id',
					'terms'    => $term_ids,
				),
			),
		);
		
		return new \WP_Query( $args );
	}

	static function post_thumbnail( $echo = false, $size = 'large' ) {

		$disable_lazy_load = self::get_option( 'disable_lazy_load', 'off' );
		$lazy_load_class   = self::get_option( 'lazy_load_class', 'skip-lazy' );

		$book_id = get_the_ID();

		if ( has_post_thumbnail() ) {

			$size = apply_filters( 'gs_book_thumbnail_size', $size, $book_id );
			if ( empty( $size ) ) {
				$size = 'large';
			}

			$classes = array( 'gs_book--image' );

			if ( $disable_lazy_load && ! empty( $lazy_load_class ) ) {
				$classes[] = $lazy_load_class;
			}

			$classes = (array) apply_filters( 'gs_book_thumbnail_classes', $classes );

			$thumbnail = get_the_post_thumbnail(
				$book_id,
				$size,
				array(
					'class'    => implode( ' ', $classes ),
					'alt'      => get_the_title(),
					'itemprop' => 'image',
				)
			);

		} else {
			$thumbnail = sprintf( '<img src="%s" alt="%s" itemprop="image"/>', GS_BOOKS_PLUGIN_URI . '/assets/img/no_img.png', get_the_title() );
		}

		$thumbnail = '<div class="gsbooks--book-thumb">' . $thumbnail . '</div>';

		$thumbnail = apply_filters( 'gs_book_thumbnail_html', $thumbnail, $book_id );

		return self::echo_return( $thumbnail, $echo );
	}

	static function gs_book_thumbnail_with_link( $size = 'large', $link_type = 'single_page', $extra_link_class = '', $popup_style = 'style_one' ) {

		$image_html = self::post_thumbnail( false, $size );

		$before = $after = '';

		if ( $link_type == 'single_page' ) {

			$before = sprintf( '<a class="%s" href="%s">', esc_attr( $extra_link_class ), get_the_permalink() );

		} elseif ( $link_type == 'popup' ) {

			$before = sprintf( '<a class="gs_book_pop open-popup-link %s" data-mfp-src="#gs_book_popup_%s" data-theme="%s" href="#">', esc_attr( $extra_link_class ), get_the_ID(), 'gs-book-popup--' . esc_attr( $popup_style ) );

		}

		$after = '</a>';

		return $before . $image_html . $after;
	}

	static function post_title( $link_type = 'single_page', $popup_style = 'style_one' ) {

		$title = get_the_title();

		if ( $link_type == 'single_page' ) {

			$title = sprintf( '<a href="%s">%s</a>', get_the_permalink(), esc_html( $title ) );

		} elseif ( $link_type == 'popup' ) {

			$title = sprintf( '<a class="gs_book_pop open-popup-link" data-mfp-src="#gs_book_popup_%s" href="#" data-theme="%s">%s</a>', get_the_ID(), 'gs-book-popup--' . esc_attr( $popup_style ), esc_html( $title ) );

		}

		echo wp_kses_post( $title );
	}

	static function post_content( $max_length = 100, $is_excerpt = true, $echo = true, $link_type = 'single_page', $popup_style = 'style_one' ) {		

		$description = $is_excerpt ? get_the_excerpt() : get_the_content();

		$more_text = self::get_translation( 'gsb_more_text_modify' );

		$more_link = '';

		if ( $link_type == 'single_page' ) {

			$more_link = sprintf( '...<a href="%s">%s</a>', get_the_permalink(), $more_text );

		} elseif ( $link_type == 'popup' ) {

			$more_link = sprintf( '...<a class="gs_book_pop open-popup-link" data-mfp-src="#gs_book_popup_%s" href="#" data-theme="%s">%s</a>', get_the_ID(), 'gs-book-popup--' . esc_attr( $popup_style ), esc_html( $more_text ) );

		}

		// Reduce the description length
		if ( $max_length > 0 && strlen( $description ) > $max_length ) {
			$description = substr( $description, 0, $max_length ) . $more_link;
		}

		return self::echo_return( $description, $echo );
	}

	static function post_authors( $is_link = false, $separator = ', ' ) {

		$term_mode = true;
		$authors   = get_the_terms( get_the_ID(), 'gsb_author' );

		if ( is_wp_error( $authors ) || empty( $authors ) ) {
			return '';
		}

		if ( ! $term_mode ) {
			return $authors;
		}

		if ( ! $is_link ) {
			$authors = array_map(
				function ( $author ) {
					return sprintf( '<span>%s</span>', $author->name );
				},
				$authors
			);
		} else {
			$authors = array_map(
				function ( $author ) {
					return sprintf( '<a href="%s">%s</a>', get_term_link( $author, 'gsb_author' ), $author->name );
				},
				$authors
			);
		}

		return implode( $separator, $authors );
	}

	static function book_publisher( $echo = false ) {
		$publisher = self::get_post_meta( '_gsbks_copublisher' );
		return self::echo_return( $publisher, $echo );
	}

	static function get_book_groups( $post_id, $term_name = 'bookshowcase_group' ) {

		$groups = get_the_terms( $post_id, $term_name );

		if ( is_wp_error( $groups ) || empty( $groups ) ) {
			return;
		}

		$groups = array_map(
			function ( $group ) {
				return $group->slug;
			},
			$groups
		);

		return implode( ' ', $groups );
	}

	static function get_store_links( $args ) {

		$args = shortcode_atts(
			array(
				'show_url_field' => true,
				'link_target'    => '_blank',
				'link_rel'       => 'noreferrer noopener',
				'separator'      => ', ',
				'echo'           => false,
			),
			$args
		);

		$_urls = array();

		// if ( $args['show_url_field'] ) {
		// 	$url = self::get_post_meta( '_gsbks_url' );
		// 	if ( ! empty( $url ) ) {
		// 		$_urls[] = array(
		// 			'name' => 'Buy',
		// 			'url'  => $url,
		// 		);
		// 	}
		// }

		$store = self::get_post_meta( 'gs_repeatable_fields' );

		if ( ! empty( $store ) ) {
			$_urls = array_merge( $_urls, $store );
		}

		if ( empty( $_urls ) ) {
			return;
		}

		$urls = array_map(
			function ( $_url ) use ( $args ) {
				return sprintf(
					'<span class="%s"><a href="%s" target="%s" rel="%s">%s</a></span>',
					'gs-book--store-' . sanitize_title( $_url['name'] ),					
					esc_url( $_url['url'] ),
					esc_attr( $args['link_target'] ),
					esc_attr( $args['link_rel'] ),
					esc_html( $_url['name'] )
				);
			},
			$_urls
		);

		if ( empty( $args['separator'] ) ) {
			$separator = '';
		} else {
			$separator = sprintf( '<span class="gs-book--sitem_sep">%s</span>', esc_html( $args['separator'] ) );
		}

		$links = sprintf( '<span class="gs-book--store_urls">%s</span>', implode( $separator, $urls ) );

		return self::echo_return( $links, $args['echo'] );
	}

	static function get_col_classes( $desktop = '3', $tablet = '4', $mobile_portrait = '6', $mobile = '12' ) {
		return sprintf( 'gs-col-lg-%s gs-col-md-%s gs-col-sm-%s gs-col-xs-%s', $desktop, $tablet, $mobile_portrait, $mobile );
	}

	static function get_all_terms( $post_id ) {

		$post_type  = get_post_type( $post_id );
		$taxonomies = get_object_taxonomies( $post_type );
		$all_tax    = [];

		if ( ! empty( $taxonomies ) ) {
			
			foreach ( $taxonomies as $taxonomy ) {
				$terms 		= get_the_terms( $post_id, $taxonomy );
				$terms_slug = wp_list_pluck( $terms, 'slug' );
				array_push( $all_tax, implode( ' ', $terms_slug ) );
			}
		}

		return implode( ' ', $all_tax );
	}
}