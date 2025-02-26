<?php

namespace APG\Admin;

use APG\Admin\Post_Metabox;
use APG\Admin\Upload;
use APG\Admin\Settings;
use APG\Core\Helper;
use APG\Core\Licenses;

/**
 * Class Init
 * @package APG\Admin
 */
class Init {

    /**
     * @var Upload
     */
	private $upload;

    /**
     * @var Settings
     */
	private $settings;

    /**
     * @var
     */
    private $extensions;

    /**
     * Construct the APG Admin
     *
     * @param $extensions
     */
	public function __construct( $extensions ) {
		add_action( 'admin_notices', array( $this, 'apg_check_photo_page' ) );
        add_action( 'admin_enqueue_scripts', array( $this, 'hook_admin_style' ) );

		add_action( 'admin_menu', array( $this, 'hook_submenu_items' ) );
        add_filter( 'plugin_action_links_' . plugin_basename( APG_ROOT_PATH ), array( $this, 'apg_plugin_actions' ) );

        $this->extensions = $extensions;
		$this->settings   = new Settings( $this->extensions );
		$this->upload     = new Upload( $this->extensions );
		$this->addons     = new Addons( $this->extensions );
		$this->licenses   = new Licenses( $this->extensions );

		new Post_Metabox();
	}

    /**
     * Hook the admin style
     */
    public function hook_admin_style() {
        wp_enqueue_style( 'apg-backend', plugins_url( 'assets/backend/apg.backend.min.css', APG_ROOT_PATH ) );

        wp_enqueue_script( 'jquery-ui-tabs' );
	    wp_enqueue_script( 'jquery-ui-sortable' );
	    wp_enqueue_style( 'wp-color-picker' );
	    wp_enqueue_script( 'apg-photo-admin', plugins_url( 'assets/backend/js/apg-photo-admin.js', APG_ROOT_PATH ), array('jquery', 'jquery-ui-tabs','wp-color-picker') );
    }

	/**
	 * Hook the sub menu items
	 */
	public function hook_submenu_items() {
        $pages = array();
        $pages['upload'] = array(
            'label'      => __( 'Upload photo(s)', 'apg' ),
            'capability' => 'publish_posts',
            'action'     => 'apg_upload',
            'callback'   => array( $this, 'show_page' ),
        );
        $pages['settings'] = array(
            'label'      => __( 'Settings', 'apg' ),
            'capability' => 'manage_options',
            'action'     => 'apg_settings',
            'callback'   => array( $this, 'show_page' ),
        );
		if( Helper::is_premium() === false ) {
			$pages['addons'] = array(
				'label'      => '<span style="color:#d15b28 !important;font-weight: 600;">' . __( 'Get Premium', 'apg' ) . '</span>',
				'capability' => 'manage_options',
				'action'     => 'apg_addons',
				'callback'   => array( $this, 'show_page' ),
			);
		}

        array_merge( $pages, apply_filters( 'apg_submenu_items', array() ) );

        /**
         * Loop through the pages and add them as a submenu item
         */
		foreach( $pages as $key => $item ) {
            add_submenu_page('edit.php?post_type=apg_photo_albums', $item['label'], $item['label'], $item['capability'], $item['action'], $item['callback'] );
        }
	}

	/**
	 * Render the requested page
	 */
	public function show_page() {
		switch( filter_input (INPUT_GET, 'page', FILTER_SANITIZE_STRING) ){
			case 'apg_upload':
				$this->upload->render();
				break;
			case 'apg_settings':
				$this->settings->render();
				break;
			case 'apg_addons':
				$this->addons->render();
				break;
			case 'apg_licenses':
				$this->licenses->render();
				break;
		}
	}

    /**
     * Add some action links at the plugin page
     *
     * @param $links
     *
     * @return array
     */
    public function apg_plugin_actions( $links ) {
        $apg = array(
            '<a href="' . admin_url( 'edit.php?post_type=apg_photo_albums&page=apg_settings' ) . '">' . __('Settings', 'apg') . '</a>',
            '<span style="font-weight: 600;"><a href="https://codebrothers.eu/awesome-photo-gallery-premium/?utm_source=WordPress&utm_medium=referral&utm_campaign=apg_plugin_overview" target="_blank">' . __('Get Premium', 'apg') . '</a></span>',
        );

        return array_merge( $apg, $links );
    }

	/**
	 * Check if we need to show a warning to create the APG page
	 */
	public function apg_check_photo_page() {
		if( current_user_can( 'edit_posts' ) && get_option( 'apg_create_page', false ) === false ) {
			echo '<div class="update-nag notice"><p>' . __( 'Awesome Photo Gallery needs one page to list all your photo albums for your visitors. Do you allow us to create that page for you?', 'apg' ) . ' ';
			echo '<a href="' . admin_url( 'edit.php?post_type=apg_photo_albums&page=apg_addons&createpage=1&apg_nonce=' . wp_create_nonce( 'apg-create-page-nonce' ) ) . '" class="button">' . __( 'Yes! Create photo album page', 'apg' ) . '</a>';
			echo '</p></div>';
		}

		$this->licenses->apg_show_license_error();
	}

}