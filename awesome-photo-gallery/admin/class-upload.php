<?php

namespace APG\Admin;

use APG\Core\Uploader;
use APG\Core\Addonmanager;

/**
 * Class Upload
 * @package APG\Admin
 */
class Upload extends Page {

    /**
     * @var
     */
    protected $error;

    /**
     * @var
     */
    public $template;

    /**
     * @var
     */
    private $extensions;

    /**
     *
     *
     * @param $extensions
     */
    public function __construct( $extensions ) {
        $this->options    = get_option( 'apg_settings' );
        $this->extensions = $extensions;
    }

    /**
     * Render the upload page for new photos (and handle the initial post request to upload new photos)
     */
	public function render() {
        wp_enqueue_media();

        if ( isset( $_POST['apg_photo_uploader_nonce'], $_POST['photoalbum'] ) && wp_verify_nonce( $_POST['apg_photo_uploader_nonce'], 'apg_photo_uploader_nonce' ) && current_user_can( 'edit_post', $_POST['photoalbum'] ) ) {
            $results = $this->handle_upload_post();

            if( $results['success'] >= 1 && $results['failures'] === 0 ) {
                // Succes!

                $this->apg_success( __('Your photo(s) are uploaded successfully to the album!','apg') . ' <a href="' . admin_url('post.php?post=' . esc_attr( $_POST['photoalbum'] ) . '&action=edit') . '" class="button">' . __('View album','apg') . '</a>' );
            }
            else{
                // Failure
                $this->error = $results['error'];

                $this->apg_error();
            }
        }

        $this->template['photoalbums'] = $this->get_all_photo_albums();

        $addons = new Addonmanager( $this->extensions );
        $this->render_view('backend/upload', $addons->get_addons());
	}

    /**
     * Get all drafted and published photo albums.
     *
     * @return array
     */
    private function get_all_photo_albums() {
	    return get_posts( array(
		    'post_type'      => 'apg_photo_albums',
		    'post_status'    => 'draft, publish',
		    'posts_per_page' => 5000,
	    ) );
    }

    /**
     * Handle the file upload
     */
    private function handle_upload_post() {
        $post_id  = filter_input( INPUT_POST, 'photoalbum' );
        $results  = array(
            'success'  => 0,
            'failures' => 0,
        );

        $files  = json_decode( filter_input( INPUT_POST, 'apg_photos' ) );
        $number = 0;

        if( ( $saved = get_post_meta( $post_id, '_apg_album_items', true ) ) && $saved === false )  {
            $saved  = array(
                'photos'      => array(),
                'last_change' => date('Y-m-d H:i:s'),
            );
        }

	    if( count($files) >= 1 ) {
	        foreach ($files as $key => $value) {
	            $saved['photos'][] = array(
	                'id'    => $value->id,
	                'url'   => $value->url,
	                'order' => 0,
	            );

	            $results['success']++;
	        }
	        update_post_meta($post_id, '_apg_album_items', $saved);
	    }

	    $this->check_album_metadata( $post_id, $saved['photos'] );

        if( $number === 0 ) {
            $results['error'] = __('Please upload at least 1 photo!', 'apg');
        }

        return $results;
    }

	/**
	 * Update the photo order after an upload
	 *
	 * @param $post_id
	 * @param $photos
	 */
	private function check_album_metadata( $post_id, $photos ) {
		$photo_order = get_post_meta( $post_id, 'apg_photo_order' );

		if( isset( $photo_order[0] ) ) {
			$photo_order = explode( ',', $photo_order[0] );
		}

		if( is_array( $photo_order ) && count( $photo_order ) >= 1 ) {
			$add = array();

			foreach( $photos as $new_photo ) {
				if( ! in_array( $new_photo['id'], $photo_order ) ) {
					$photo_order[] = $new_photo['id'];
				}
			}

			update_post_meta( $post_id, 'apg_photo_order', implode( ',', $photo_order ) );
		}
	}
}