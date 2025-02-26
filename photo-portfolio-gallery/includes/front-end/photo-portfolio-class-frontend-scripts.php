<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Class Photo_Gallery
 */
class Photo_Gallery_Frontend_Scripts {

	/**
	 * Photo_Gallery_Frontend_Scripts constructor.
	 */
	public function __construct() {
		add_action( 'photo_gallery_shortcode_scripts', array( $this, 'frontend_scripts' ), 10, 2 );
		add_action( 'photo_gallery_shortcode_scripts', array( $this, 'frontend_styles' ), 10, 2 );
		add_action( 'photo_gallery_localize_scripts', array( $this, 'localize_scripts' ), 10, 1 );
	}

	/**
	 * Enqueue styles
	 */
	public function frontend_styles( $id, $portfolio_view ) {
		$general_options = photo_gallery_get_default_general_options();

		wp_register_style( 'pluginfiles-css', plugins_url( '../../assets/style/pluginfiles.css', __FILE__ ) );
		wp_enqueue_style( 'pluginfiles-css' );

		wp_register_style( 'portfolio-style-os-css', plugins_url( '../../assets/style/portfolio-style-os.css', __FILE__ ) );
		wp_enqueue_style( 'portfolio-style-os-css' );



			wp_register_style( 'photo_gallery_resp_lightbox_css', untrailingslashit( Photo_Gallery()->plugin_url() ) . '/assets/style/res_popup.css' );
			wp_enqueue_style( 'photo_gallery_resp_lightbox_css' );


		if ( $portfolio_view == '5' ) {
			wp_register_style( 'animate-css', plugins_url( '../../assets/style/animate.min.css', __FILE__ ) );
			wp_enqueue_style( 'animate-css' );
			wp_register_style( 'liquid-slider-css', plugins_url( '../../assets/style/liquid-slider.css', __FILE__ ) );
			wp_enqueue_style( 'liquid-slider-css' );
		}
		if ( $portfolio_view == '7' ) {
			wp_register_style( 'elastic-grid-css', plugins_url( '../../assets/style/elastic_grid.css', __FILE__ ) );
			wp_enqueue_style( 'elastic-grid-css' );
		}
        if ( $portfolio_view == '8' ) {
            wp_register_style( 'photo-portfolio-store-view-zoom-css', plugins_url( '../../assets/style/zoom-store.css', __FILE__ ) );
            wp_enqueue_style( 'photo-portfolio-store-view-zoom-css' );
        }
	}

	/**
	 * Enqueue scripts
	 */
	public function frontend_scripts( $id, $portfolio_view ) {
		$view_slug       = photo_gallery_get_view_slag_by_id( $id );
		$general_options = photo_gallery_get_default_general_options();

		if ( ! wp_script_is( 'jquery' ) ) {
			wp_enqueue_script( 'jquery' );
		}

        wp_register_script( 'webpacemicro-min-js', plugins_url( '../../assets/js/jquery.webpacemicro.min.js', __FILE__ ), array( 'jquery' ), '1.0.0', true );
        wp_enqueue_script( 'webpacemicro-min-js');


            if ($view_slug !== 'faq' &&   $view_slug !== 'store') {
			wp_register_script( 'portfolio-resp-lightbox-js', plugins_url( '../../assets/js/resp-popup.js', __FILE__ ), array( 'jquery' ), '1.0.0', true );
			wp_enqueue_script( 'portfolio-resp-lightbox-js' );

			wp_register_script( 'mousewheel-min-js', plugins_url( '../../assets/js/mousewheel.min.js', __FILE__ ), array( 'jquery' ), '1.0.0', true );
			wp_enqueue_script( 'mousewheel-min-js' );

			wp_register_script( 'vimeo-froogaloop-min-js', plugins_url( '../../assets/js/vimeo-froogaloop.min.js', __FILE__ ), array( 'jquery' ), '1.0.0', true );
			wp_enqueue_script( 'vimeo-froogaloop-min-js' );
		}



		wp_register_script( 'front-end-js-' . $view_slug, plugins_url( '../../assets/js/view-' . $view_slug . '.js', __FILE__ ), array( 'jquery' ,'webpacemicro-min-js'), '1.0.0', true );
		wp_enqueue_script( 'front-end-js-' . $view_slug );

		wp_register_script( 'portfolio-custom-js', plugins_url( '../../assets/js/portfolio-custom.js', __FILE__ ), array( 'jquery' ), '1.0.0', true );
		wp_enqueue_script( 'portfolio-custom-js' );

		if ( $portfolio_view == '5' ) {
			wp_register_script( 'easing-js', plugins_url( '../../assets/js/jquery.easing.min.js', __FILE__ ), array( 'jquery' ), '1.3.0', true );
			wp_enqueue_script( 'easing-js' );
			wp_register_script( 'touch_swipe-js', plugins_url( '../../assets/js/jquery.touchSwipe.min.js', __FILE__ ), array( 'jquery' ), '1.0.0', true );
			wp_enqueue_script( 'touch_swipe-js' );
			wp_register_script( 'liquid-slider-js', plugins_url( '../../assets/js/jquery.liquid-slider.min.js', __FILE__ ), array( 'jquery' ), '1.0.0', true );
			wp_enqueue_script( 'liquid-slider-js' );
		}

		if ( $portfolio_view == '7' ) {
			wp_register_script( 'modernizr.custom-js', plugins_url( '../../assets/js/modernizr.custom.js', __FILE__ ), array( 'jquery' ), '1.0.0', false );
			wp_enqueue_script( 'modernizr.custom-js' );
			wp_register_script( 'classie-js', plugins_url( '../../assets/js/classie.js', __FILE__ ), array( 'jquery' ), '1.3.0', false );
			wp_enqueue_script( 'classie-js' );
			wp_register_script( 'jquery.elastislide-js', plugins_url( '../../assets/js/jquery.elastislide.js', __FILE__ ), array( 'jquery' ), '1.0.0', false );
			wp_enqueue_script( 'jquery.elastislide-js' );
			wp_register_script( 'hoverdir.js', plugins_url( '../../assets/js/jquery.hoverdir.js', __FILE__ ), array( 'jquery' ), '1.0.0', false );
			wp_enqueue_script( 'hoverdir.js' );
			wp_register_script( 'photo-portfolio-elastic_grid-js', plugins_url( '../../assets/js/elastic_grid.js', __FILE__ ), array( 'jquery' ), '1.3.0', false );
			wp_enqueue_script( 'photo-portfolio-elastic_grid-js' );
		}
        if ( $portfolio_view == '8' ) {
            wp_register_script( 'store-zoom-js', plugins_url( '../../assets/js/zoom-store.js', __FILE__ ), array( 'jquery' ), '1.0.0', false );
            wp_enqueue_script( 'store-zoom-js' );

            wp_register_script('mousewheel-min-js', plugins_url('../../assets/js/mousewheel.min.js', __FILE__), array('jquery'), '1.0.0', true);
            wp_enqueue_script('mousewheel-min-js');

            wp_register_script('froogaloop2-min-js', plugins_url('../../assets/js/vimeo-froogaloop.min.js', __FILE__), array('jquery'), '1.0.0', true);
            wp_enqueue_script('froogaloop2-min-js');
        }
	}

	public function localize_scripts( $id ) {
		$portfolio_param = photo_gallery_get_default_general_options();
		$view_slug       = photo_gallery_get_view_slag_by_id( $id );
		global $wpdb;
		$query         = $wpdb->prepare( "SELECT * FROM " . $wpdb->prefix . "web_paceportfolio_images  WHERE portfolio_id = '%d' ORDER BY ordering ASC", $id );
		$images[ $id ] = $wpdb->get_results( $query );
		

		$images_obj = array();

		foreach ( $images[ $id ] as $image ) {
			$thumbnails  = $image->image_url;
			$thumbnails  = substr( $thumbnails, 0, - 1 );
			$thumbnails  = explode( ';', $thumbnails );
			$thumbs      = array();
			$larg_images = array();
			foreach ( $thumbnails as $key => $thumbnail ) {
				if ( photo_gallery_youtube_or_vimeo_portfolio( $thumbnail ) == 'image' ) {
					if ( $key == 0 ) {
						$smal_img = esc_url( photo_gallery_get_image_by_sizes_and_src( $thumbnail, 'medium', false ) );
					} else {
						$smal_img = esc_url( photo_gallery_get_image_by_sizes_and_src( $thumbnail, array(), true ) );
					}
					$big_img = $thumbnail;
				} elseif ( photo_gallery_youtube_or_vimeo_portfolio( $thumbnail ) == 'youtube' ) {
					$videourl = photo_gallery_get_video_id_from_url( $thumbnail );
					$smal_img = esc_url( "//img.youtube.com/vi/" . $videourl[0] . "/mqdefault.jpg" );
					$videourl = photo_gallery_get_video_id_from_url( $thumbnail );
					$big_img  = "https://www.youtube.com/embed/" . $videourl[0];
				} elseif ( photo_gallery_youtube_or_vimeo_portfolio( $thumbnail ) == 'vimeo' ) {
					$videourl = photo_gallery_get_video_id_from_url( $thumbnail );
					$hash     = unserialize( wp_remote_fopen( "https://vimeo.com/api/v2/video/" . $videourl[0] . ".php" ) );
					$smal_img = esc_url( $hash[0]['thumbnail_large'] );
					$videourl = photo_gallery_get_video_id_from_url( $thumbnail );
					$big_img  = "https://player.vimeo.com/video/" . $videourl[0];
				}
				array_push( $thumbs, $smal_img );
				array_push( $larg_images, $big_img );
			}
			$categories = str_replace( " ", "_", $image->category );
			$categories = explode( ',', $categories );
			if ( $image->link_target == 'on' ) {
				$target = '_blank';
			} else {
				$target = '';
			}
			$images_parent_obj = array(
				'title'       => $image->name,
				'description' => $image->description,
				'thumbnail'   => $thumbs,
				'large'       => $larg_images,
				'button_list' => array(
					array(
						'title'      => $portfolio_param['photo_gallery_ht_view7_expand_block_button_text'],
						'url'        => $image->sl_url,
						'new_window' => $target
					),
				),
				'tags'        => $categories
			);
			array_push( $images_obj, $images_parent_obj );
		}

		$lightbox_options = array(
			'photo_gallery_lightbox_slideAnimationType'            => $portfolio_param['photo_gallery_lightbox_slideAnimationType'],
			'photo_gallery_lightbox_lightboxView'                  => get_option('photo_gallery_lightbox_lightboxView'),
			'photo_gallery_lightbox_speed_new'                     => get_option('photo_gallery_lightbox_speed_new'),
			'photo_gallery_lightbox_width_new'                     => $portfolio_param['photo_gallery_lightbox_width_new'],
			'photo_gallery_lightbox_height_new'                    => $portfolio_param['photo_gallery_lightbox_height_new'],
			'photo_gallery_lightbox_videoMaxWidth'                 => $portfolio_param['photo_gallery_lightbox_videoMaxWidth'],
			'photo_gallery_lightbox_overlayDuration'               => $portfolio_param['photo_gallery_lightbox_overlayDuration'],
			'photo_gallery_lightbox_overlayClose_new'              => get_option('photo_gallery_lightbox_overlayClose_new'),
			'photo_gallery_lightbox_loop_new'                      => get_option('photo_gallery_lightbox_loop_new'),
			'photo_gallery_lightbox_escKey_new'                    => $portfolio_param['photo_gallery_lightbox_escKey_new'],
			'photo_gallery_lightbox_keyPress_new'                  => $portfolio_param['photo_gallery_lightbox_keyPress_new'],
			'photo_gallery_lightbox_arrows'                        => $portfolio_param['photo_gallery_lightbox_arrows'],
			'photo_gallery_lightbox_mouseWheel'                    => $portfolio_param['photo_gallery_lightbox_mouseWheel'],
			'photo_gallery_lightbox_download'                      => $portfolio_param['photo_gallery_lightbox_download'],
			'photo_gallery_lightbox_showCounter'                   => $portfolio_param['photo_gallery_lightbox_showCounter'],
			'photo_gallery_lightbox_nextHtml'                      => $portfolio_param['photo_gallery_lightbox_nextHtml'],
			'photo_gallery_lightbox_prevHtml'                      => $portfolio_param['photo_gallery_lightbox_prevHtml'],
			'photo_gallery_lightbox_sequence_info'                 => $portfolio_param['photo_gallery_lightbox_sequence_info'],
			'photo_gallery_lightbox_sequenceInfo'                  => $portfolio_param['photo_gallery_lightbox_sequenceInfo'],
			'photo_gallery_lightbox_slideshow_new'                 => $portfolio_param['photo_gallery_lightbox_slideshow_new'],
			'photo_gallery_lightbox_slideshow_auto_new'            => $portfolio_param['photo_gallery_lightbox_slideshow_auto_new'],
			'photo_gallery_lightbox_slideshow_speed_new'           => $portfolio_param['photo_gallery_lightbox_slideshow_speed_new'],
			'photo_gallery_lightbox_slideshow_start_new'           => $portfolio_param['photo_gallery_lightbox_slideshow_start_new'],
			'photo_gallery_lightbox_slideshow_stop_new'            => $portfolio_param['photo_gallery_lightbox_slideshow_stop_new'],
			'photo_gallery_lightbox_watermark'                     => $portfolio_param['photo_gallery_lightbox_watermark'],
			'photo_gallery_lightbox_socialSharing'                 => $portfolio_param['photo_gallery_lightbox_socialSharing'],
			'photo_gallery_lightbox_facebookButton'                => $portfolio_param['photo_gallery_lightbox_facebookButton'],
			'photo_gallery_lightbox_twitterButton'                 => $portfolio_param['photo_gallery_lightbox_twitterButton'],
			'photo_gallery_lightbox_googleplusButton'              => $portfolio_param['photo_gallery_lightbox_googleplusButton'],
			'photo_gallery_lightbox_pinterestButton'               => $portfolio_param['photo_gallery_lightbox_pinterestButton'],
			'photo_gallery_lightbox_linkedinButton'                => $portfolio_param['photo_gallery_lightbox_linkedinButton'],
			'photo_gallery_lightbox_tumblrButton'                  => $portfolio_param['photo_gallery_lightbox_tumblrButton'],
			'photo_gallery_lightbox_redditButton'                  => $portfolio_param['photo_gallery_lightbox_redditButton'],
			'photo_gallery_lightbox_bufferButton'                  => $portfolio_param['photo_gallery_lightbox_bufferButton'],
			'photo_gallery_lightbox_diggButton'                    => $portfolio_param['photo_gallery_lightbox_diggButton'],
			'photo_gallery_lightbox_vkButton'                      => $portfolio_param['photo_gallery_lightbox_vkButton'],
			'photo_gallery_lightbox_yummlyButton'                  => $portfolio_param['photo_gallery_lightbox_yummlyButton'],
			'photo_gallery_lightbox_watermark_text'                => $portfolio_param['photo_gallery_lightbox_watermark_text'],
			'photo_gallery_lightbox_watermark_textColor'           => $portfolio_param['photo_gallery_lightbox_watermark_textColor'],
			'photo_gallery_lightbox_watermark_textFontSize'        => $portfolio_param['photo_gallery_lightbox_watermark_textFontSize'],
			'photo_gallery_lightbox_watermark_containerBackground' => $portfolio_param['photo_gallery_lightbox_watermark_containerBackground'],
			'photo_gallery_lightbox_watermark_containerOpacity'    => $portfolio_param['photo_gallery_lightbox_watermark_containerOpacity'],
			'photo_gallery_lightbox_watermark_containerWidth'      => $portfolio_param['photo_gallery_lightbox_watermark_containerWidth'],
			'photo_gallery_lightbox_watermark_position_new'        => $portfolio_param['photo_gallery_lightbox_watermark_position_new'],
			'photo_gallery_lightbox_watermark_opacity'             => $portfolio_param['photo_gallery_lightbox_watermark_opacity'],
			'photo_gallery_lightbox_watermark_margin'              => $portfolio_param['photo_gallery_lightbox_watermark_margin'],
			'photo_gallery_lightbox_watermark_img_src_new'         => $portfolio_param['photo_gallery_lightbox_watermark_img_src_new'],
		);

		
			list( $r, $g, $b ) = array_map( 'hexdec', str_split( $portfolio_param['photo_gallery_lightbox_watermark_containerBackground'], 2 ) );
			$titleopacity                                                       = $portfolio_param["photo_gallery_lightbox_watermark_containerOpacity"] / 100;
			$lightbox_options['photo_gallery_watermark_container_bg_color'] = 'rgba(' . $r . ',' . $g . ',' . $b . ',' . $titleopacity . ')';
			wp_localize_script( 'portfolio-resp-lightbox-js', 'portfolio_resp_lightbox_obj', $lightbox_options );
			wp_localize_script( 'portfolio-custom-js', 'is_watermark', $portfolio_param['photo_gallery_lightbox_watermark'] );
			wp_localize_script( 'portfolio-resp-lightbox-js', 'portfolioGalleryDisableRightClickLightbox', get_option( 'photo_gallery_disable_right_click' ) );


		wp_localize_script( 'portfolio-custom-js', 'portfolio_lightbox_type', get_option('photo_gallery_lightbox_type') );
		wp_localize_script( 'front-end-js-' . $view_slug, 'portfolio_param_obj', $portfolio_param );
		wp_localize_script( 'front-end-js-' . $view_slug, 'images_obj_' . $id, $images_obj );
		wp_localize_script( 'photo-portfolio-elastic_grid-js', 'show_filter_all_text', $portfolio_param['photo_gallery_ht_view7_show_all_filter_button'] );
		wp_localize_script( 'photo-portfolio-elastic_grid-js', 'elements_margin', $portfolio_param['photo_gallery_ht_view7_element_margin'] );
		wp_localize_script( 'portfolio-custom-js', 'portfolioGalleryDisableRightClick', get_option( 'photo_gallery_disable_right_click' ) );
		wp_localize_script( 'photo-portfolio-elastic_grid-js', 'portfolioGalleryDisableRightClickElastic', get_option( 'photo_gallery_disable_right_click' ) );
        if ( $view_slug == 'store' )
        {
            wp_localize_script( 'store-zoom-js', 'portfolio_store_zoom_obj', $lightbox_options );
        }
	}
}