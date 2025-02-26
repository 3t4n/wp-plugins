<?php

defined( 'ABSPATH' ) || exit;

/**
 * Show the help panel in the plugin section
 */

class Aidm_Help_Panel {
    public function __construct()
    {
        add_action( 
            'admin_enqueue_scripts', 
            array( $this, 'enqueue_scripts' ) 
        );

        add_action( 
            'wp_ajax_'.AIDM_AJAX_ID, 
            array( $this, 'load_help_panel' )
        );
        add_action(
            'wp_ajax_nopriv_'.AIDM_AJAX_ID, 
            array( $this, 'load_help_panel' )
        );

        add_filter( 
            'plugin_action_links_'.AIDM_PLUGIN_FILE_PATH, 
            array( $this, 'aidm_how_to_use_link' )
        );
    }

    /**
     * Add Aidm how to use panel
     */
    function aidm_how_to_use_link( $links ) {
        array_unshift( 
            $links, 
            '<a id="aidm-how-to-use" href="#">'.__( 'How to use', aidm_get_text_domain() ) . '</a>');

        return $links;
    }

    /**
     * enqueue scripts, additional jQuery data and styles
     */
    public function enqueue_scripts() {
        $ajax_error_message = __(
            'We apologize for the inconvenience, but we are currently unable to display the "How to Use" panel due to an error. Please try again later. Rest assured, we are actively working on resolving this issue and will address it in an upcoming update.',
            aidm_get_text_domain() 
        );

        wp_enqueue_script( 
            'aidmHelpPanel', 
            AIDM_JS_URL.'aidmHelpPanel.js',
        );

        wp_localize_script( 
            'aidmHelpPanel', 
            'aidmHelpPanelData', 
            array( 
                'ajaxUrl' => admin_url( 'admin-ajax.php' ),
                'errorMessage' => $ajax_error_message
            ) 
        );

        wp_enqueue_style(
            'aidm-help-panel', 
            AIDM_CSS_URL.'aidm-help-panel.css',
        );
    }

    /**
     * Get help panel template
     */
    public function load_help_panel() {
        include( AIDM_VIEWS_DIR.'aidm-help-panel.php' );

        wp_die();
    }
}
