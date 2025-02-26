<?php

namespace APG\Frontend;

use APG\Core\Helper;
use APG\Core\Viewer;

/**
 * Class Shortcodes
 * @package APG\Frontend
 */
class Shortcodes {

	/**
	 * @var
	 */
	private $helper;

	/**
	 * Construct the shortcodes
	 */
	public function __construct() {
		add_shortcode( 'apg_list_albums', array( $this, 'apg_list_albums' ) );
		add_shortcode( 'apg_album', array( $this, 'apg_albums_preview' ) );

		$this->helper = new Helper();
	}

	/**
	 * Show the newest albums with a link, title and 1 thumbnail.
	 *
	 * @param array $args
	 *
	 * @return null|string
	 */
	public function apg_list_albums( $args = array() ) {
		$widget = null;

		$album_args = array(
			'post_type'      => 'apg_photo_albums',
			'post_status'    => 'publish',
			'posts_per_page' => 5000,
		);

		/**
		 * Argument: order (valid values: date, title and random)
		 */
		if ( isset( $args['order'] ) ) {
			switch ( $args['order'] ) {
				case 'date':
					$album_args['orderby'] = 'date';
					break;
				case 'title':
					$album_args['orderby'] = 'title';
					break;
				case 'random':
					$album_args['orderby'] = 'rand';
					break;
			}
		}

		/**
		 * Argument: thumbsize (valid values between 50 and 150)
		 */
		$thumbsize = $this->helper->get_setting( 'thumb_size' );
		if ( isset( $args['thumbsize'] ) ) {
			if ( intval( $args['thumbsize'] ) >= 50 && intval( $args['thumbsize'] ) <= 150 ) {
				$thumbsize = intval( $args['thumbsize'] );
			}
		}

		/**
		 * Argument: category (set the album taxonmy ID and filter these albums, or use a comma separated string for multiple category ID's)
		 */
		if ( isset( $args['category'] ) ) {
			if( strpos( $args['category'], ',' ) !== false ) {
				$categories = explode( ',', $args['category'] );
			}
			else{
				$categories = array( $args['category'] );
			}

			$album_args['tax_query'] = array(
				array(
					'taxonomy' => 'apg_photo_albums_category',
					'field'    => 'term_id',
					'terms'    =>  $categories,
				),
			);
		}

		$albums = get_posts( $album_args );
		$viewer = new Viewer();

		$widget .= $this->get_html_comment( 'start' );
		$widget .= '<div id="apg-album-preview">';

		foreach ( $albums as $apg ) {
			$album_thumb = get_the_post_thumbnail( $apg->ID, array( $thumbsize, $thumbsize ) );

			$photos = $viewer->get_photos( $apg->ID );
			if ( count( $photos ) == 0 ) {
				continue;
			}

			$first_key = key( $photos );
			$widget .= '<div class="apg-album-block">';
			$widget .= '<a href="' . get_permalink( $apg->ID ) . '" class="apg-photo-short-thumb"><h3 class="apg-album-title">' . esc_attr( $apg->post_title ) . '</h3>';
			if ( isset( $photos[ $first_key ]['ID'] ) ) {
				if ( ! empty( $album_thumb ) ) {
					$widget .= $album_thumb;
				} else {
					$widget .= wp_get_attachment_image( $photos[ $first_key ]['ID'], array( $thumbsize, $thumbsize ) );
				}
			}
			$widget .= '</a></div>';
		}

		$widget .= '<div class="apg-clear"></div></div>';
		$widget .= $this->get_html_comment( 'end' );

		return $widget;
	}

	/**
	 * Show an album preview
	 *
	 * @param array $args
	 *
	 * @return null|string
	 */
	public function apg_albums_preview( $args = array() ) {
		$widget       = null;
		$full_gallery = false;

		if ( ! isset( $args['id'] ) ) {
			return '<p>Missing Album ID in shortcode apg_album</p>';
		}

		$album_args = array(
			'post_type'      => 'apg_photo_albums',
			'post_status'    => 'publish',
			'posts_per_page' => 5000,
		);
		$albums     = get_posts( $album_args );

		/**
		 * Argument: thumbsize (valid values between 50 and 150)
		 */
		$thumbsize  = $this->helper->get_setting( 'thumb_size' );
		$imagelimit = 4;
		if ( isset( $args['imagelimit'] ) ) {
			if ( intval( $args['imagelimit'] ) >= 1 && intval( $args['imagelimit'] ) <= 30 ) {
				$imagelimit = intval( $args['imagelimit'] ) - 1;
			}
		}
		if ( isset( $args['thumbsize'] ) ) {
			if ( intval( $args['thumbsize'] ) >= 50 && intval( $args['thumbsize'] ) <= 150 ) {
				$thumbsize = intval( $args['thumbsize'] );
			}
		}
		if ( isset( $args['preview'] ) ) {
			if ( $args['preview'] === 'false' ) {
				$imagelimit   = 9999;
				$full_gallery = true;
			}
		}

		foreach ( $albums as $album ) {
			if ( $album->ID != $args['id'] ) {
				continue;
			}

			$viewer = new Viewer();
			$photos = $viewer->get_photos( $album->ID );

			$widget .= $this->get_html_comment( 'start' );
			if ( $full_gallery === true ) {
				$widget .= '<div id="apg-gallery" class="apg-thumb apg-' . esc_attr( $this->helper->get_setting( 'gallery' ) ) . '">';
				$widget .= '<h3 class="apg-album-title">' . esc_attr( $album->post_title ) . '</h3>';
				$photo_class = 'apg-photo-url';
			} else {
				$widget .= '<div class="apg-album-shortcode">';
				$widget .= '<a href="' . get_permalink( $album->ID ) . '" class="apg-photo-short-thumb"><h3 class="apg-album-title">' . esc_attr( $album->post_title ) . '</h3></a>';
				$photo_class = 'apg-photo-url apg-goto-link';
			}

			$widget .= '<div class="apg-thumb apg-' . esc_attr( $this->helper->get_setting( 'gallery' ) ) . '">';
			$shown_images = 0;
			foreach ( $photos as $p ) {
				if ( $shown_images > $imagelimit ) {
					continue;
				}
				$widget .= '<div class="' . esc_attr( $this->helper->get_setting( 'gallery' ) ) . '-block">';
				if ( $full_gallery === true ) {
					$widget .= '<a href="' . wp_get_attachment_url( $p['ID'] ) . '" class="' . $photo_class . '">';
				} else {
					$widget .= '<a href="' . get_permalink( $album->ID ) . '" class="' . $photo_class . '">';
				}
				$widget .= wp_get_attachment_image( $p['ID'], array( $thumbsize, $thumbsize ) );
				$widget .= '</a></div>';

				$shown_images ++;
			}
			$widget .= '<div class="apg-clear"></div>';
			$widget .= '</div>';
			$widget .= '</div>';
			$widget .= $this->get_html_comment( 'end' );
		}

		/**
		 * Add the photo viewer for full screen images
		 */
		if ( $full_gallery === true ) {
			$render = new Render( array() );

			if ( $this->helper->get_setting( 'enable_slideshow' ) === true ) {
				add_filter( 'apg_below_lightbox_buttons', array( $render, 'apg_add_slideshow' ), 15, 1 );
			}

			$widget .= $render->add_photo_viewer();
		}

		return $widget;
	}

	/**
	 * Get the html comment
	 *
	 * @param $location
	 *
	 * @return string
	 */
	private function get_html_comment( $location ) {
		switch ( $location ) {
			case 'start':
				return '<!-- Awesome Photo Gallery (Version ' . APG_VERSION . ') - View plugin: https://wordpress.org/plugins/awesome-photo-gallery/ -->' . PHP_EOL;
				break;
			case 'end':
				return '<!-- End: Awesome Photo Gallery -->' . PHP_EOL;
				break;
		}
	}

}