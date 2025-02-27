<?php

namespace GS_BOOKS;

defined( 'ABSPATH' ) || exit;

/**
 * Responsible for integrate various pagebuilders addon.
 *
 * @since 1.2.11
 */
class Integrations {
    /**
     * Class constructor.
     *
     * @since 1.2.11
     */
    public function __construct() {
        // Elementor
        if ( apply_filters( 'gs_books_integration_elementor', true ) ) $this->integration_with_elementor();

        // WP Bakery Visual Composer
        if ( apply_filters( 'gs_books_integration_wpb_vc', true ) ) $this->integration_with_wpbakery_vc();

        // Gutenberg
        if ( apply_filters( 'gs_books_integration_gutenberg', true ) ) $this->integration_with_gutenberg();

        // Divi
        if ( apply_filters( 'gs_books_integration_divi', true ) ) $this->integration_with_divi();

        // Beaver
        if ( apply_filters( 'gs_books_integration_beaver', true ) ) $this->integration_with_beaver();

        // Oxygen
        if ( apply_filters( 'gs_books_integration_oxygen', true ) ) $this->integration_with_oxygen();

        // Tagdiv
        if ( apply_filters( 'gs_books_integration_tagdiv', true ) ) $this->integration_with_tagdiv();
    }

    public function integration_with_elementor() {
        require_once GS_BOOKS_PLUGIN_DIR . 'includes/integrations/integration-elementor.php';
        Integration_Elementor::get_instance();
    } 

    public function integration_with_wpbakery_vc() {
        require_once GS_BOOKS_PLUGIN_DIR . 'includes/integrations/integration-wpb-vc.php';
        Integration_WPB_VC::get_instance();
    } 

    public function integration_with_gutenberg() {
        require_once GS_BOOKS_PLUGIN_DIR . 'includes/integrations/integration-gutenberg.php';
        Integration_Gutenberg::get_instance();
    } 

    public function integration_with_divi() {
        require_once GS_BOOKS_PLUGIN_DIR . 'includes/integrations/integration-divi.php';
        Integration_Divi::get_instance();
    } 

    public function integration_with_beaver() {
        require_once GS_BOOKS_PLUGIN_DIR . 'includes/integrations/integration-beaver.php';
        Integration_Beaver::get_instance();
    } 

    public function integration_with_oxygen() {
        require_once GS_BOOKS_PLUGIN_DIR . 'includes/integrations/integration-oxygen.php';
        Integration_Oxygen::get_instance();
    } 

    public function integration_with_tagdiv() {
        require_once GS_BOOKS_PLUGIN_DIR . 'includes/integrations/integration-tagdiv.php';
        Integration_TagDiv::get_instance();
    } 

}
