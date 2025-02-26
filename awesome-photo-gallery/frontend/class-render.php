<?php

namespace APG\Frontend;

use APG\Admin\Settings;
use APG\Core\Helper;
use APG\Core\Viewer;

/**
 * Class Render
 * @package APG\Frontend
 */
class Render {

	/**
	 * @var
	 */
	private $template;

	/**
	 * @var
	 */
	private $post;

	/**
	 * @var
	 */
	private $settings;

	/**
	 * @var
	 */
	private $helper;

	/**
	 * Add listener for our frontend work
	 *
	 * @param $extensions
	 */
	public function __construct( $extensions ) {
		$this->settings = new Settings( $extensions );
		$this->helper   = new Helper();

		add_action( 'wp_enqueue_scripts', array( $this, 'apg_frontend_style' ) );

		add_filter( 'the_content', array( $this, 'apg_content_builder' ) );
	}

	/**
	 * Hook the frontend stylesheet (Could be disabled in the settings menu of your wp-admin)
	 */
	public function apg_frontend_style() {
		if ( (bool) $this->settings->get( 'disable_frontend_css' ) === false ) {
			wp_enqueue_style( 'apg-frontend', plugins_url( 'assets/frontend/apg.frontend.min.css', APG_ROOT_PATH ) );
			wp_enqueue_style( 'apg-fontawesome', '//netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css' );
		}

		if ( (bool) $this->settings->get( 'disable_frontend_js' ) === false ) {
			wp_enqueue_script(
				'apg-photo-viewer',
				plugins_url( '/assets/frontend/js/apg-photo-viewer.js', APG_ROOT_PATH ),
				array( 'jquery' )
			);
		}
	}

	/**
	 * Hook the Awesome Photo Gallery builder
	 *
	 * @param $content
	 *
	 * @return mixed
	 */
	public function apg_content_builder( $content ) {
		global $post;
		$this->post = $post;

		if ( $this->post->post_type !== 'apg_photo_albums' ) {
			return $content;
		}

		if ( $this->settings->get( 'enable_slideshow' ) === true ) {
			$this->apg_slideshow();
		}

		if ( is_archive() ) {
			$this->build_photo_preview();
		} else {
			$this->build_photo_album();
		}

		$album = apply_filters( 'apg_before_content', '' );
		$album .= apply_filters( 'apg_content', $content );
		$album .= apply_filters( 'apg_after_content', '' );

		if ( !is_archive() ) {
			$album .= $this->add_photo_viewer();
		}

		return $album;
	}

	/**
	 * Build up the photos
	 *
	 * @return string
	 */
	public function apg_build_photos() {
		$this->count_album_view( $this->post->ID );

		$viewer = new Viewer();
		$photos = $this->get_html_comment( 'start' );
		$photos .= $this->get_google_js();
		$photos .= '<div id="apg-gallery" class="apg-thumb apg-' . $this->template . '">';
		$photos .= apply_filters( 'apg_before_gallery', '' );

		$count = 0;
		foreach ( $viewer->get_photos( $this->post->ID ) as $photo ) {
			if ( empty( $photo['ID'] ) ) {
				continue;
			}
			$photos .= str_replace( '%%photo_url%%', wp_get_attachment_url( $photo['ID'] ), apply_filters( 'apg_before_image', '' ) );
			$photos .= wp_get_attachment_image( $photo['ID'], apply_filters( 'apg_photo_size', $this->apg_get_thumb_setting_name() ) );
			$photos .= apply_filters( 'apg_after_image', '' );

			if ( ( $this->template === 'col-4' && $count % 4 != 0 && $count >= 3 ) || ( $this->template === 'col-3' && $count % 3 != 0 && $count >= 2 ) || ( $this->template === 'col-2' && $count % 2 != 0 && $count >= 1 ) ) {
				$photos .= '<div class="apg-clear"></div>';
				$count = - 1;
			}
			$count ++;
		}

		$photos .= apply_filters( 'apg_after_gallery', '' );
		$photos .= '</div>';
		$photos .= $this->get_html_comment( 'end' );

		return $photos;
	}

	/**
	 * Build up the photos
	 *
	 * @return string
	 */
	public function apg_build_preview() {
		$viewer = new Viewer();
		$photos = $this->get_html_comment( 'start' );
		$photos .= '<div id="apg-preview" class="apg-thumb-preview">';
		$photos .= apply_filters( 'apg_before_preview', '' );

		$count = 1;
		foreach ( $viewer->get_photos( $this->post->ID ) as $photo ) {
			if ( empty( $photo['ID'] ) || $count > (int) $this->settings->get( 'archive_limit' ) ) {
				continue;
			}

			$photos .= str_replace( '%%photo_url%%', wp_get_attachment_url( $photo['ID'] ), apply_filters( 'apg_before_image', '' ) );
			$photos .= wp_get_attachment_image( $photo['ID'], apply_filters( 'apg_photo_size', $this->apg_get_thumb_setting_name() ) );
			$photos .= apply_filters( 'apg_after_image', '' );

			$count ++;
		}
		$photos .= apply_filters( 'apg_after_preview', '' );
		$photos .= '</div>';
		$photos .= $this->get_html_comment( 'end' );

		return $photos;
	}

	/**
	 * Hook the photo album in the correct time frame
	 */
	public function build_photo_album() {
		$this->template = $this->settings->get( 'gallery' );
		$position       = $this->settings->get( 'album_description' );

		if ( !in_array( $position, array( 'before', 'after' ) ) ) {
			$position = 'before';
		}

		if ( $position === 'before' ) {
			$position = 'after';
		} elseif ( $position === 'after' ) {
			$position = 'before';
		}

		switch ( $this->template ) {
			case 'col-4':
				add_filter( 'apg_' . $position . '_content', array( $this, 'apg_build_photos' ) );
				add_filter( 'apg_photo_size', array( $this, 'apg_get_thumb_size' ) );
				add_filter( 'apg_before_image', function () {
					return '<div class="col-4-block"><a href="%%photo_url%%" class="apg-photo-url">';
				} );
				add_filter( 'apg_after_image', function () {
					return '</a></div>';
				} );
				add_filter( 'apg_after_gallery', function () {
					return '<div class="apg-clear"></div>';
				} );
				break;
			case 'col-3':
			default:
				add_filter( 'apg_' . $position . '_content', array( $this, 'apg_build_photos' ) );
				add_filter( 'apg_photo_size', array( $this, 'apg_get_thumb_size' ) );
				add_filter( 'apg_before_image', function () {
					return '<div class="col-3-block"><a href="%%photo_url%%" class="apg-photo-url">';
				} );
				add_filter( 'apg_after_image', function () {
					return '</a></div>';
				} );
				add_filter( 'apg_after_gallery', function () {
					return '<div class="apg-clear"></div>';
				} );
				break;
			case 'col-2':
				add_filter( 'apg_' . $position . '_content', array( $this, 'apg_build_photos' ) );
				add_filter( 'apg_photo_size', array( $this, 'apg_get_thumb_size' ) );
				add_filter( 'apg_before_image', function () {
					return '<div class="col-2-block"><a href="%%photo_url%%" class="apg-photo-url">';
				} );
				add_filter( 'apg_after_image', function () {
					return '</a></div>';
				} );
				add_filter( 'apg_after_gallery', function () {
					return '<div class="apg-clear"></div>';
				} );
				break;
		}
	}

	/**
	 * Build the preview
	 */
	public function build_photo_preview() {
		$position = 'after';

		switch ( $this->template ) {
			default:
				add_filter( 'apg_' . $position . '_content', array( $this, 'apg_build_preview' ) );
				add_filter( 'apg_photo_size', array( $this, 'apg_get_archive_thumb_size' ) );
				add_filter( 'apg_before_image', function () {
					return '<div class="apg-preview-block">';
				} );
				add_filter( 'apg_after_image', function () {
					return '</div>';
				} );
				break;
		}
	}

	/**
	 * Get the setting thumbnail size
	 *
	 * @return array
	 */
	public function apg_get_thumb_size() {
		return array(
			$this->settings->get( 'thumb_size' ),
			$this->settings->get( 'thumb_size' ),
		);
	}

	/**
	 * Get the custom thumbnail settings name
	 *
	 * @return string
	 */
	public function apg_get_thumb_setting_name() {
		return 'apg-thumbnail-' . $this->settings->get( 'thumb_size' ) . '-' . $this->settings->get( 'thumb_size' );
	}

	/**
	 * Get the setting thumbnail archive size
	 *
	 * @return array
	 */
	public function apg_get_archive_thumb_size() {
		return array(
			$this->settings->get( 'archive_thumb_size' ),
			$this->settings->get( 'archive_thumb_size' ),
		);
	}

	/**
	 * Build the photo box overlay
	 *
	 * @return string
	 */
	public function add_photo_viewer() {
		$photo = $this->get_html_comment( 'start' );
		$photo .= '<div id="apg-photo-watcher" class="' . apply_filters( 'apg_photo_viewer_class', '' ) . '">';
		$photo .= '<div id="apg-photo-content">';
		$photo .= '<div id="apg-photo">';
		$photo .= '<p>' . __( 'Loading picture...', 'apg' ) . '</p>';
		$photo .= '</div>';

		$photo .= '<div id="apg-photo-overlay">';
		$photo .= '</div>';
		$photo .= '</div>';
		$photo .= '<div id="apg-photo-sidebar-right">';
		$photo .= '<a href="#" id="apg-photo-close" class="apg-button"><span class="apg-button-contents"><i class="fa fa-times apg-closebox"></i></span></a>';
		$photo .= '<a href="#" id="apg-photo-next" class="apg-button"><span class="apg-button-contents"><i class="fa fa-chevron-right apg-right"></i></span></a>';
		$photo .= '<a href="#" id="apg-photo-previous" class="apg-button"><span class="apg-button-contents"><i class="fa fa-chevron-left apg-left"></i></span></a>';
		$photo .= apply_filters( 'apg_below_lightbox_buttons', '' );
		$photo .= '</div>';
		$photo = apply_filters( 'apg_photo_viewer_inner', $photo );
		$photo .= '</div>';
		$photo .= $this->get_html_comment( 'end' );

		return $photo;
	}

	/**
	 * Hook the slideshow buttons
	 *
	 * @param $buttons
	 *
	 * @return mixed
	 */
	public function apg_add_slideshow( $buttons ) {
		$slide = '<a href="#" id="apg-slide-toggle" class="apg-button" title="' . __( 'Start Slideshow', 'apg' ) . '"><span class="apg-button-contents"><i class="fa fa-play apg-slideshow-play"></i></span></a>';

		if ( $this->settings->get( 'enable_slideshow' ) === true ) {
			if ( $this->settings->get( 'slideshow_autostart' ) === true ) {
				$slide_autostart = 'true';
			} else {
				$slide_autostart = 'false';
			}
			$slide .= '<script type="text/javascript">var slideshow_status = ' . $slide_autostart . '; var slideshow_autostart = ' . $slide_autostart . '; var slideshow_timeout = ' . (int) $this->settings->get( 'slideshow_timeout' ) . ';</script>';
		}

		return $slide . $buttons;
	}


	/**
	 * Add the Awesome Photo Gallery Slideshow
	 */
	private function apg_slideshow() {
		add_filter( 'apg_below_lightbox_buttons', array( $this, 'apg_add_slideshow' ), 15, 1 );
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

	/**
	 * Count a new view for a photo album
	 *
	 * @param $album_id
	 */
	private function count_album_view( $album_id ) {
		$result = get_option( 'apg_album_views', array() );
		if ( !is_array( $result ) ) {
			$stats = json_decode( $result, true );
		}
		$yearmonth = date( 'Y-m' );

		if ( isset( $stats[$album_id] ) ) {
			if ( !isset( $stats[$album_id][$yearmonth] ) ) {
				$stats[$album_id][$yearmonth] = 1;
			} else {
				$stats[$album_id][$yearmonth] ++;
			}
		} else {
			$stats[$album_id]             = array();
			$stats[$album_id][$yearmonth] = 1;
		}

		update_option( 'apg_album_views', json_encode( $stats ) );
	}

	/**
	 * Get the Google Analytics Javascript, only if enabled in the settings screen
	 *
	 * @return string
	 */
	private function get_google_js() {
		if ( $this->helper->get_aga_ua_code() === false ) {
			return;
		}

		$google_js = '<script type="text/javascript">';
		$google_js .= 'var apg_google_tracking = true;';
		$google_js .= 'var apg_google_ua_code = "' . esc_js( $this->helper->get_aga_ua_code() ) . '";';
		$google_js .= '</script>';

		return $google_js;
	}

}