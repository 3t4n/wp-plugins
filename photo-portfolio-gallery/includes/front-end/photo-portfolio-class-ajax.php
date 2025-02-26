<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
class Photo_Gallery_Ajax {

	public function __construct() {
		add_action( 'wp_ajax_photo_gallery_action', array( $this, 'callback' ) );
		add_action( 'wp_ajax_nopriv_photo_gallery_action', array( $this, 'callback' ) );
	}

	public function callback() {
		global $wpdb;
		if ( $_POST['post'] == 'portfolioChangeOptions' ) {
			if ( isset( $_POST['id'] ) ) {

			    if( !isset( $_REQUEST['nonce'] ) || !wp_verify_nonce( $_REQUEST['nonce'], 'photo_gallery_change_options' ) ){
                    die( __( 'Authentication failed', 'photo-portfolio' ) );
                }

				$id = intval($_POST['id']);

                if( !$id ){
                    wp_die( __( 'Not numeric id', 'photo-portfolio' ) );
                }

				$query    = $wpdb->prepare( "SELECT * FROM " . $wpdb->prefix . "web_paceportfolio_portfolios WHERE id = %d", $id );
				$row      = $wpdb->get_row( $query );
				$response = array(
					'portfolio_effects_list' => $row->portfolio_list_effects_s,
					'ht_show_sorting'        => $row->ht_show_sorting,
					'ht_show_filtering'      => $row->ht_show_filtering,
					'sl_pausetime'           => $row->description,
					'sl_changespeed'         => $row->param,
					'pause_on_hover'         => $row->pause_on_hover
				);
				echo json_encode( $response );
				wp_die();
			}
		}
		if ( $_POST['post'] == 'portfolioSaveOptions' ) {
			if ( isset( $_POST["htportfolio_id"] ) ) {
				$id = absint($_POST["htportfolio_id"]);
				$wpdb->update(
					$wpdb->prefix . "web_paceportfolio_portfolios",
					array(
						'ht_show_sorting' => sanitize_text_field( $_POST["ht_show_sorting"] ),
						'ht_show_filtering' => sanitize_text_field( $_POST["ht_show_filtering"] ),
						'description' => sanitize_text_field( $_POST["sl_pausetime"] ),
						'param' => sanitize_text_field( $_POST["sl_changespeed"] ),
						'pause_on_hover' => sanitize_text_field( $_POST["pause_on_hover"] ),
						'portfolio_list_effects_s' => sanitize_text_field( $_POST["portfolio_effects_list"] ),
					),
					array('id' => $id),
					array('%s', '%s', '%s', '%s', '%s', '%s')
				);
			}
		}
		if (  $_POST['post'] == 'see_new_video' ) {
			if ( ! isset( $_REQUEST['videoEditNonce'] ) || ! wp_verify_nonce( $_REQUEST['videoEditNonce'], 'see_new_video_nonce' ) ) {
				die( __( 'Authentication failed', 'photo-portfolio' ) );
			}
			$video_url = sanitize_text_field( $_POST['videoUrl'] );
			$video_id = photo_gallery_get_video_id_from_url( $video_url );
			$video_id = $video_id[0];
			$video_type = photo_gallery_youtube_or_vimeo_portfolio( $video_url );
			if ( $video_type == 'youtube' ) {
				$iframe_video_src = "//www.youtube.com/embed/" . $video_id . "?modestbranding=1&showinfo=0&controls=0";
			} else {
				$iframe_video_src = "//player.vimeo.com/video/" . $video_id . "?title=0&amp;byline=0&amp;portrait=0";
			}
			echo json_encode( $iframe_video_src );
			wp_die();
		}
		if (  $_POST['post'] == 'add_thumb_video' ) {
			if ( !isset( $_POST["portfolioItemId"] ) || !absint($_POST['portfolioItemId']) || absint( $_POST['portfolioItemId'] ) != $_POST['portfolioItemId'] ) {
				wp_die('"portfolioItemId" parameter is required to be not negative integer');
			}
			$portfolioItemId = absint( $_POST["portfolioItemId"] );
			if (!isset($_REQUEST['addThumbVideoNonce']) || !wp_verify_nonce($_REQUEST['addThumbVideoNonce'], 'add_thumb_video_nonce' . $portfolioItemId)) {
				die(__('Authentication failed', 'photo-portfolio'));
			}
			$video_url = sanitize_text_field( $_POST['videoUrl'] );
			$video_id = photo_gallery_get_video_id_from_url( $video_url );
			$video_type = $video_id[1];
			$video_id = $video_id[0];
			$video_type = photo_gallery_youtube_or_vimeo_portfolio( $video_url );
			if ( $video_type == 'youtube' ) {
				$iframe_video_src = "//www.youtube.com/embed/" . $video_id . "?modestbranding=1&showinfo=0&controls=0";
			} else {
				$iframe_video_src = "//player.vimeo.com/video/" . $video_id . "?title=0&amp;byline=0&amp;portrait=0";
			}
			$image_url = photo_gallery_get_image_from_video($video_url);
			echo json_encode( array ( 'iframe_video_src' => $iframe_video_src,'image_url' => $image_url, 'video_type' => $video_type ) );
			wp_die();
		}
	}
}