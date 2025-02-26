<?php

namespace Level_Wp\Affiliate_Advantage\Controllers;

use Level_Wp\Affiliate_Advantage\Helpers\View;
use Level_Wp\Affiliate_Advantage\Plugin;

class Meta_Boxes_Controller extends Base_Controller {
	private $prefix;

	public function __construct() {
		$this->prefix = Plugin::get_instance()->prefix;
	}

	public function display_submit_meta_box() {
		global $action, $post;
		$post_type = $post->post_type;
		// get current post_type
		$post_type_object = get_post_type_object( $post_type );
		$can_publish      = current_user_can( $post_type_object->cap->publish_posts );
		View::render( 'metaboxes.submitdiv', compact(
			'action',
			'post',
			'post_type',
			'post_type_object',
			'can_publish'
		) );
	}

	public function display_meta_box( $post, $args ) {
		$view   = 'metaboxes.' . $args['args']['metabox'];
		$prefix = Plugin::get_instance()->prefix;
		View::render( $view, compact( 'prefix', 'post' ) );
	}

	public function save( $post_id, $post ) {
		if ( $post->post_type == Plugin::get_instance()->cpt && isset( $_POST[ 'save_' . Plugin::get_instance()->cpt . 'meta' ] ) ) {
			$this->save_affiliate_link_meta( $post_id );
		}
//		if ( Plugin::get_instance()->has_valid_licence() ) {
//			if ( $post->post_type == 'post' && isset( $_POST[ 'save_' . Plugin::get_instance()->cpt . 'meta' ] ) ) {
//				$this->save_post_meta( $post_id );
//			}
//		}
	}

	private function save_affiliate_link_meta( $post_id ) {
		$link               = esc_url_raw( $_POST[ $this->prefix . 'link_url' ] );
		$add_no_follow      = sanitize_text_field( $_POST[ $this->prefix . 'add_no_follow' ] );
		$uncloak            = sanitize_text_field( $_POST[ $this->prefix . 'uncloak' ] );
		$forward_parameters = sanitize_text_field( $_POST[ $this->prefix . 'forward_parameters' ] );
		$open_in_new_tab    = sanitize_text_field( $_POST[ $this->prefix . 'open_in_new_tab' ] );
		$redirection_type   = sanitize_text_field( $_POST[ $this->prefix . 'redirection_type' ] );
		$banner             = sanitize_text_field( $_POST[ $this->prefix . 'link_banner' ] );
		$keywords           = sanitize_text_field( $_POST[ $this->prefix . 'link_keywords' ] );
//		$expiration_date    = sanitize_text_field( $_POST[ $this->prefix . 'link_expiration' ] );
		$password           = sanitize_text_field( $_POST[ $this->prefix . 'link_password' ] );

		update_post_meta( $post_id, 'link_url', $link );
		update_post_meta( $post_id, 'add_no_follow', $add_no_follow );
		update_post_meta( $post_id, 'open_in_new_tab', $open_in_new_tab );
		update_post_meta( $post_id, 'redirection_type', $redirection_type );
		update_post_meta( $post_id, 'link_banner', $banner );
		update_post_meta( $post_id, 'link_keywords', $keywords );
		update_post_meta( $post_id, 'uncloak', $uncloak );
		update_post_meta( $post_id, 'forward_parameters', $forward_parameters );
//		update_post_meta( $post_id, 'expiration_date', $expiration_date );
		update_post_meta( $post_id, 'password', $password );

//		wp_update_post( [
//		    'ID' => $post_id,
//            'post_name' => sanitize_text_field( $_POST[ $this->prefix . 'link_short' ] )
//        ], true, true );
		
//		wp_redirect( admin_url( 'edit.php?post_type=' . Plugin::get_instance()->cpt ) );
	}

}