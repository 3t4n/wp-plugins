<?php

namespace APG\Admin;

use APG\Core\Addonmanager;

/**
 * Class Addons
 * @package APG\Admin
 */
class Addons extends Page {

    /**
     * @var
     */
    public $template;

    /**
     * @var
     */
    private $extensions;

    /**
     * @param $extensions
     */
    public function __construct( $extensions ) {
        $apg_addon_manager = new Addonmanager( $extensions );
        $this->extensions  = $extensions;
        $this->addons      = $apg_addon_manager->get_addons();

	    if( ( $page = filter_input( INPUT_GET, 'createpage' ) ) && $page !== '' ) {
		    $nonce = filter_input( INPUT_GET, 'apg_nonce' );

		    if( current_user_can( 'edit_posts' ) && wp_verify_nonce( $nonce, 'apg-create-page-nonce' ) ) {
			    $this->create_apg_page();
		    }
	    }
    }


	/**
	 * Render the settings page
	 */
	public function render() {
        $this->template['addons'] = $this->addons;

        $this->render_view('backend/addons', $this->addons );
	}

	/**
	 * Create the default APG page to list the photo albums
	 */
	private function create_apg_page() {
		$my_post = array(
			'post_type'     => 'page',
			'post_title'    => __( 'Photo albums', 'apg' ),
			'post_content'  => '[apg_list_albums]',
			'post_status'   => 'publish',
			'post_author'   => get_current_user_id(),
		);

		update_option( 'apg_create_page', true );

		$id = wp_insert_post( $my_post );
		wp_redirect( admin_url( 'post.php?post=' . esc_attr( $id ) . '&action=edit' ), 301 );
		exit;
	}
}