<?php

namespace APG\Admin;

use APG\Core\Viewer;

/**
 * Class Post_Metabox
 * @package APG\Admin
 */
class Post_Metabox {

	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'apg_add_metabox' ), 5 );
		add_action( 'save_post', array( $this, 'apg_save_metabox' ), 10, 2 );
	}

	/**
	 * Hook the metabox
	 */
	public function apg_add_metabox() {
		add_meta_box(
			'apg_metabox_photos',
			'Awesome Photo Gallery - ' . __( 'Photos in this album', 'apg' ),
			array( $this, 'add_metabox_content' ),
			'apg_photo_albums',
			'normal',
			'high'
		);

		add_meta_box(
			'apg_metabox_support',
			__( 'Questions and Support', 'apg' ),
			array( $this, 'add_metabox_support' ),
			'apg_photo_albums',
			'side',
			'high'
		);
	}

	/**
	 * Save the APG metabox photo order
	 *
	 * @param $post_id
	 * @param $post
	 *
	 * @return mixed
	 */
	public function apg_save_metabox( $post_id, $post ) {
		/* Verify the nonce before proceeding. */
		if ( isset( $_POST['apg_metabox_nonce'], $_POST['apg_photo_order'] ) && wp_verify_nonce( $_POST['apg_metabox_nonce'], 'apg_metabox_nonce' ) && current_user_can( 'manage_options' ) ) {
			$photo_order  = strip_tags( filter_input( INPUT_POST, 'apg_photo_order' ) );

			update_post_meta( $post_id, 'apg_photo_order', $photo_order );

			return $post_id;
		}

		return $post_id;
	}

	/**
	 * Callback: show the metabox content
	 *
	 * @param $post
	 */
	public function add_metabox_content( $post ) {
		wp_nonce_field( 'apg_metabox_nonce', 'apg_metabox_nonce' );
        $viewer = new Viewer();
        $photos = $viewer->get_photos( $post->ID );

        if( count( $photos ) >= 1 ) {
	        $photo_hidden = array();
	        echo '<div style="width: 95%; padding: 0;">';
            echo '<ul id="apg-sortable" class="apg-sortable">';
            foreach ( $photos as $photo) {
	            if( empty( $photo['ID'] ) ) {
		            continue;
	            }
                echo '<li id="apg-photo-' . esc_attr( $photo['ID'] ) . '" data-apgid="' . esc_attr( $photo['ID'] ) . '" style="float: left;width: 80px; height: 80px; display: block; position:relative; border: 1px solid #e5e5e5; background-color: #fff; cursor: move; padding: 0; margin-right: 10px; margin-bottom: 10px;">';
	            echo '<p style="padding: 3px; margin: 0; display: block;">';
	            echo wp_get_attachment_image($photo['ID'], 'apg-thumbnail-75-75' );
	            echo '</p>';
	            echo '<div class="apg-delete-photo" data-apgid="' . esc_attr( $photo['ID'] ) . '" style="cursor: pointer;display:block;position:absolute;top:-5px;margin-left: 67px;width: 16px;height:16px;border-radius:10px;padding:0;padding-top:-4px;border: 2px solid #ccc;font-size: 7px;background-color:#333;color:#fff;text-align:center;">X</div>';
                echo '</li>';
	            $photo_hidden[] = $photo['ID'];
            }
            echo '</ul></div><div style="clear: both;"></div>';

	        echo '<input type="hidden" name="apg_photo_order" id="apg_photo_order" value="' . implode( ',', $photo_hidden ) . '" />';

            echo '<p><i>' . __('If you want to upload new photos to this album, please use the "Upload photo(s)" menu item on the left.', 'apg' ) . '</i></p>';
        }
        else{
            echo '<p><strong>' . __('No photos where uploaded, yet. Please use the submenu item "Upload photo(s)" in the menu to upload new photos, or use the button below.', 'apg' ) . '</strong></p>';
        }
		echo '<p>' . __( 'You can add or upload new photo\'s into this album on the upload page.','apg' ) . ' <a href="' . admin_url('edit.php?post_type=apg_photo_albums&page=apg_upload') . '" class="button">' . __('Add new Photo\'s', 'apg') . '</a></p>';
	}

	/**
	 * Metabox support
	 *
	 * @param $post
	 */
	public function add_metabox_support( $post ) {
		echo '<p>' . __( 'Thank you for using Awesome Photo Gallery.', 'apg' ) . '</p>';
		echo '<p>' . sprintf( __('Do you have questions or feature requests? We have %1$sdocumentation about the plugin%5$s on our website, or contact us by using %2$sTwitter%5$s, %3$sPremium Support%5$s or the %4$sWordPress forums%5$s.', 'apg' ),
			'<a href="https://codebrothers.eu/documentation-categories/awesome-photo-gallery/?utm_source=WordPress&utm_medium=referral&utm_campaign=apg_post_sidebar" target="_blank">',
			'<a href="https://twitter.com/CodeBrothersHQ" target="_blank">',
			'<a href="https://codebrothers.eu/support/?utm_source=WordPress&utm_medium=referral&utm_campaign=apg_post_sidebar" target="_blank">',
			'<a href="https://wordpress.org/support/plugin/awesome-photo-gallery" target="_blank">',
			'</a>' ) . '</p>';
	}

}