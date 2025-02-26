<?php
/**
 * Creates the menu for the plugin.
 *
 * @package assb_sharebuttonMainpage
 */
class assb_sharebuttonMainpage {
    /**
     * A reference the class responsible for rendering the menu page.
     *
     * @var    assb_sharebuttonvar
     * @access private
     */
    private $assb_sharebuttonvar;
    public function __construct( $assb_sharebuttonvar ) {
        $this->assb_sharebuttonvar = $assb_sharebuttonvar;
    }
    public function assb_init() {
         add_action( 'admin_menu', array( $this, 'assb_addnewPage' ) );
    }
    public function assb_addnewPage() {
        add_menu_page(
            'All social share button',
            'All social share button',
            'manage_options',
            'all-social-share-button',
            array( $this->assb_sharebuttonvar, 'assb_rendersharebuttonPage' )
        );
        add_action( 'admin_init', 'assb_registerSetting' );
        function assb_registerSetting() {
            register_setting( 'all-social-share-button-group', 'social_share_title' );
            register_setting( 'all-social-share-button-group', 'socialcheckbox' );
        }
    }
}