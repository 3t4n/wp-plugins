<?php

/**
 * Plugin Name: Advanced Accordion Block
 * Description: <strong>Advanced Accordion Block</strong> is a custom Gutenberg Block that allows to showcase the content in accordion mode. It also helps to build FAQ sections easily.
 * Requires at least: 5.7
 * Requires PHP: 7.4
 * Version: 4.8.2
 * Plugin URI: https://spider-themes.net/advanced-accordion-block
 * Author: spider-themes
 * Author URI: https://spider-themes.net/advanced-accordion-block
 * License: GPLv3 or later
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain: advanced-accordion-block
 *
 *
 * @package         @wordpress/create-block
 */
// Stop Direct Access
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
if ( function_exists( 'aab_fs' ) ) {
    aab_fs()->set_basename( false, __FILE__ );
} else {
    // DO NOT REMOVE THIS IF, IT IS ESSENTIAL FOR THE `function_exists` CALL ABOVE TO PROPERLY WORK.
    if ( !function_exists( 'aab_fs' ) ) {
        function aab_fs() {
            global $aab_fs;
            if ( !isset( $aab_fs ) ) {
                // Activate multisite network integration.
                if ( !defined( 'WP_FS__PRODUCT_11041_MULTISITE' ) ) {
                    define( 'WP_FS__PRODUCT_11041_MULTISITE', true );
                }
                // Include Freemius SDK.
                require_once dirname( __FILE__ ) . '/includes/fs/start.php';
                $aab_fs = fs_dynamic_init( array(
                    'id'               => '11041',
                    'slug'             => 'advanced-accordion-block',
                    'premium_slug'     => 'advanced-accordion-block-pro',
                    'type'             => 'plugin',
                    'public_key'       => 'pk_7347c71192131d87905aefe5e928f',
                    'premium_suffix'   => 'pro',
                    'is_premium'       => false,
                    'is_premium_only'  => false,
                    'has_addons'       => false,
                    'has_paid_plans'   => true,
                    'is_org_compliant' => true,
                    'trial'            => array(
                        'days'               => 14,
                        'is_require_payment' => true,
                    ),
                    'menu'             => array(
                        'slug'       => 'advanced-accordion-block',
                        'first-path' => 'plugins.php',
                        'contact'    => false,
                        'support'    => false,
                    ),
                    'is_live'          => true,
                ) );
            }
            return $aab_fs;
        }

        // Init Freemius.
        aab_fs()->add_filter( 'hide_freemius_powered_by', '__return_true' );
        // Signal that SDK was initiated.
        do_action( 'aab_fs_loaded' );
    }
    // ... Your plugin's main file logic ...
    /**
     * Blocks Final Class
     */
    final class AAGB_BLOCKS_CLASS {
        public function __construct() {
            // define constants
            $this->define_constants();
            $this->core_includes();
            // block initialization
            add_action( 'init', [$this, 'blocks_init'] );
            // blocks category
            if ( version_compare( $GLOBALS['wp_version'], '5.7', '<' ) ) {
                add_filter(
                    'block_categories',
                    [$this, 'register_block_category'],
                    10,
                    2
                );
            } else {
                add_filter(
                    'block_categories_all',
                    [$this, 'register_block_category'],
                    10,
                    2
                );
            }
            // redirecting
            add_action( 'activated_plugin', [$this, 'user_redirecting'] );
            // enqueue block assets
            add_action( 'enqueue_block_assets', [$this, 'external_libraries'] );
            add_action( 'enqueue_block_editor_assets', [$this, 'block_editor_assets'] );
        }

        /**
         * Initialize the plugin
         */
        public static function init() {
            static $instance = false;
            if ( !$instance ) {
                $instance = new self();
            }
            return $instance;
        }

        /**
         * Define the plugin constants
         */
        private function define_constants() {
            define( 'AAGB_VERSION', '4.8.2' );
            define( 'AAGB_URL', plugin_dir_url( __FILE__ ) );
            define( 'AAGB_LIB_URL', AAGB_URL . 'lib/' );
        }

        /**
         * Include Files
         *
         * Load core files required to run the plugin.
         *
         * @access public
         */
        public function core_includes() {
            require_once __DIR__ . '/includes/functions.php';
        }

        /**
         * Blocks Registration
         */
        public function register_block( $name, $options = array() ) {
            register_block_type( __DIR__ . '/build/' . $name, $options );
        }

        // render inline css
        public function render_inline_css( $handle, $css ) {
            wp_register_style( $handle, false );
            wp_enqueue_style( $handle );
            wp_add_inline_style( $handle, $css );
        }

        /**
         * Blocks Initialization
         */
        public function blocks_init() {
            // register single block
            $this->register_block( 'accordion', array(
                'render_callback' => [$this, 'render_separate_accordion'],
            ) );
            $this->register_block( 'group-accordion', array(
                'render_callback' => [$this, 'render_group_accordion'],
            ) );
            $this->register_block( 'accordion-item', array(
                'render_callback' => [$this, 'render_separate_accordion_item'],
            ) );
            $this->register_block( 'accordion-toolbar', array(
                'render_callback' => [$this, 'render_accordion_toolbar'],
            ) );
        }

        // Separate accordion render callback
        public function render_separate_accordion( $attributes, $content ) {
            wp_register_style(
                'aagb-separate-accordion',
                plugins_url( '/', __FILE__ ) . 'build/accordion/style-index.css',
                array(),
                'initial'
            );
            return $content;
        }

        // Separate accordion-item render callback
        public function render_separate_accordion_item( $attributes, $content ) {
            wp_register_style( 'aagb-separate-accordion-item', plugins_url( '/', __FILE__ ) . 'build/accordion-item/style-index.css' );
            return $content;
        }

        // Separate accordion-item render callback
        public function render_accordion_toolbar( $attributes, $content ) {
            wp_register_style( 'aagb-accordion-toolbar', plugins_url( '/', __FILE__ ) . 'build/accordion-toolbar/index.css' );
            return $content;
        }

        public function block_editor_assets() {
            wp_register_style(
                'aagb-separate-accordion',
                plugins_url( '/', __FILE__ ) . 'build/accordion/style-index.css',
                array(),
                'initial'
            );
            wp_register_style(
                'aagb-separate-accordion-item',
                plugins_url( '/', __FILE__ ) . 'build/accordion-item/style-index.css',
                array(),
                'initial'
            );
            wp_register_style(
                'aagb-toolbar',
                plugins_url( '/', __FILE__ ) . 'build/accordion-toolbar/index.css',
                array(),
                'initial'
            );
        }

        // Group accordion render callback
        public function render_group_accordion( $attributes, $content ) {
            $container_border_style = ( isset( $attributes['activeAccordionBorder']['style'] ) ? 'border-style: ' . $attributes['activeAccordionBorder']['style'] . ' !important;' : '' );
            $container_border_color = ( isset( $attributes['activeAccordionBorder']['color'] ) ? 'border-color: ' . $attributes['activeAccordionBorder']['color'] . ' !important;' : '' );
            $container_background_color = ( isset( $attributes['activeBackground'] ) ? 'background: ' . $attributes['activeBackground'] . ' !important;' : '' );
            $body_border_style = ( isset( $attributes['activeAccordionBorder']['style'] ) ? 'border-top-style: ' . $attributes['activeAccordionBorder']['style'] . ' !important;' : '' );
            $body_border_color = ( isset( $attributes['activeAccordionBorder']['color'] ) ? 'border-top-color: ' . $attributes['activeAccordionBorder']['color'] . ' !important;' : '' );
            if ( !is_admin() ) {
                $handle = 'aagb-' . $attributes['uniqueId'];
                $custom_css = '';
                // container
                $custom_css .= '.aagb_accordion_' . $attributes['uniqueId'] . ' > .aagb__accordion_container.aagb__accordion_active{ ' . $container_border_color . ' border-width: ' . $attributes['activeAccordionBorder']['width'] . '!important; ' . $container_border_style . $container_background_color . ' }';
                // body
                $custom_css .= '.aagb_accordion_' . $attributes['uniqueId'] . ' > .aagb__accordion_body--show{ ' . $body_border_color . ' border-top-width: ' . $attributes['activeAccordionBorder']['width'] . '!important; ' . $body_border_style . ' }';
                $this->render_inline_css( $handle, $custom_css );
            }
            //wp_register_style( 'aagb-group-accordion', plugins_url( '/', __FILE__ ) . 'build/group-accordion/style-index.css' );
            return $content;
        }

        /**
         * Register Block Category
         */
        public function register_block_category( $categories, $post ) {
            return array_merge( array(array(
                'slug'  => 'accordion-block',
                'title' => esc_html__( 'Accordion Blocks', 'advanced-accordion-block' ),
            )), $categories );
        }

        /**
         * Redirecting on activating the plugin
         *
         * @param $plugin
         *
         * @return void
         */
        function user_redirecting( $plugin ) {
            if ( plugin_basename( __FILE__ ) == $plugin ) {
                wp_redirect( admin_url( 'admin.php?page=aab-settings' ) );
                die;
            }
        }

        /**
         * Enqueue Block Assets
         */
        public function external_libraries() {
            if ( !is_admin() ) {
                wp_enqueue_style( 'dashicons' );
            }
            // enqueue JS
            //			wp_enqueue_script( 'aagb-anchor-js', AAGB_LIB_URL . 'js/anchor.js', array( 'jquery' ), '', true );
            //			wp_enqueue_script( 'aagb-separate-accordion', AAGB_LIB_URL . 'js/separate-accordion.js', array( 'jquery' ), AAGB_VERSION, true );
            //			wp_enqueue_script( 'aagb-accordion-group', AAGB_LIB_URL . 'js/group-accordion.js', array( 'jquery' ), AAGB_VERSION, true );
            wp_register_script(
                'aagb-anchor',
                plugins_url( '/', __FILE__ ) . 'lib/js/anchor.js',
                array('jquery'),
                '',
                true
            );
            wp_register_script(
                'aagb-separate-accordion',
                plugins_url( '/', __FILE__ ) . 'lib/js/separate-accordion.js',
                array('jquery'),
                AAGB_VERSION,
                true
            );
            wp_localize_script( 'aagb-separate-accordion', 'feedbackAjax', array(
                'ajaxurl' => admin_url( 'admin-ajax.php' ),
                'nonce'   => wp_create_nonce( 'my_ajax_nonce' ),
            ) );
            wp_enqueue_script(
                'aagb-separate-accordion',
                AAGB_LIB_URL . 'js/separate-accordion.js',
                array('jquery'),
                AAGB_VERSION,
                true
            );
            wp_register_script(
                'aagb-accordion-group',
                plugins_url( '/', __FILE__ ) . 'lib/js/group-accordion.js',
                array('jquery'),
                AAGB_VERSION,
                true
            );
            wp_register_script(
                'aagb-group-accordion-frontend',
                plugins_url( '/', __FILE__ ) . 'lib/js/group-accordion-frontend.js',
                array('jquery'),
                AAGB_VERSION,
                true
            );
            wp_register_script(
                'jQuery-mark-highlighter',
                'https://cdn.jsdelivr.net/npm/mark.js@8.11.1/dist/jquery.mark.min.js',
                array('jquery'),
                AAGB_VERSION,
                true
            );
            wp_enqueue_script( 'jQuery-mark-highlighter' );
            wp_register_script(
                'jQuery-isotope-layout',
                'https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js',
                array('jquery'),
                AAGB_VERSION,
                true
            );
            wp_enqueue_script( 'jQuery-isotope-layout' );
            $licensing = array(
                'can_use_premium_code' => aab_fs()->can_use_premium_code(),
            );
            wp_localize_script( 'jquery', 'aagb_local_object', array(
                'ajax_url'  => admin_url( 'admin-ajax.php' ),
                'nonce'     => wp_create_nonce( 'aagb_accordion_nonce' ),
                'licensing' => $licensing['can_use_premium_code'],
            ) );
        }

    }

    /**
     * Kickoff
     */
    AAGB_BLOCKS_CLASS::init();
    // external admin support file
    require_once plugin_dir_path( __FILE__ ) . 'admin/admin.php';
}
add_action( 'init', function () {
    $patterns = glob( plugin_dir_path( __FILE__ ) . 'block-patterns/*.php' );
    foreach ( $patterns as $pattern ) {
        include $pattern;
    }
} );
if ( !function_exists( 'my_custom_block_enqueue_scripts' ) ) {
    function my_custom_block_enqueue_scripts() : void {
        // Enqueue your custom block deletion tracker script
        wp_enqueue_script(
            'block-deletion-tracker',
            plugin_dir_url( __FILE__ ) . 'lib/js/block-deletion-tracker.js',
            ['wp-blocks', 'wp-editor', 'wp-data'],
            // Dependencies
            '',
            true
        );
    }

}
add_action( 'enqueue_block_editor_assets', 'my_custom_block_enqueue_scripts' );
if ( !function_exists( 'custom_svg_uploads' ) ) {
    function custom_svg_uploads(  $mimes  ) {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }

}
add_filter( 'upload_mimes', 'custom_svg_uploads' );
if ( !function_exists( 'enqueue_recovery_button_script' ) ) {
    function enqueue_recovery_button_script() : void {
        wp_enqueue_script(
            'attempt-recovery-all',
            plugin_dir_url( __FILE__ ) . 'lib/js/attempt-recovery-all.js',
            // Path to your JS file
            array(
                'wp-blocks',
                'wp-element',
                'wp-editor',
                'wp-components',
                'wp-data'
            ),
            '',
            true
        );
    }

}
add_action( 'enqueue_block_editor_assets', 'enqueue_recovery_button_script' );
// Create database table on plugin activation
if ( !function_exists( 'create_feedback_votes_table' ) ) {
    function create_feedback_votes_table() : void {
        global $wpdb;
        $table_name = $wpdb->prefix . 'feedback_votes';
        $charset_collate = $wpdb->get_charset_collate();
        $sql = "CREATE TABLE {$table_name} (\r\n\t\tid BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,\r\n\t\tfeedback_id VARCHAR(255) NOT NULL,\r\n\t\tuser_id BIGINT UNSIGNED DEFAULT NULL,\r\n\t\tip_hash VARCHAR(255) NOT NULL,\r\n\t\tvote_value ENUM('yes', 'no') NOT NULL,\r\n\t\tcreated_at DATETIME DEFAULT CURRENT_TIMESTAMP,\r\n\t\tPRIMARY KEY (id),\r\n\t\tUNIQUE KEY unique_vote (feedback_id, ip_hash)\r\n\t) {$charset_collate};";
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta( $sql );
    }

}
register_activation_hook( __FILE__, function () {
    create_feedback_votes_table();
} );
if ( !function_exists( 'get_votes_callback' ) ) {
    // Get votes for a specific feedback ID
    function get_votes_callback() {
        check_ajax_referer( 'my_ajax_nonce', 'nonce' );
        global $wpdb;
        $table_name = $wpdb->prefix . 'feedback_votes';
        $feedback_id = sanitize_text_field( $_POST['feedbackId'] );
        // Get vote counts
        $yes_votes = $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM {$table_name} WHERE feedback_id = %s AND vote_value = 'yes'", $feedback_id ) );
        $no_votes = $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM {$table_name} WHERE feedback_id = %s AND vote_value = 'no'", $feedback_id ) );
        // Check if the user is logged in
        $user_id = get_current_user_id();
        // Get logged-in user ID
        // If user is logged in, use the user ID, otherwise use IP hash
        $user_identifier = ( $user_id ? $user_id : hash( 'sha256', $_SERVER['REMOTE_ADDR'] ) );
        $user_vote = $wpdb->get_row( $wpdb->prepare( "SELECT vote_value FROM {$table_name} WHERE feedback_id = %s AND ip_hash = %s", $feedback_id, $user_identifier ) );
        wp_send_json_success( [
            'yes'      => (int) $yes_votes,
            'no'       => (int) $no_votes,
            'hasVoted' => $user_vote !== null,
            'userVote' => ( $user_vote ? $user_vote->vote_value : null ),
        ] );
    }

}
add_action( 'wp_ajax_get_votes', 'get_votes_callback' );
add_action( 'wp_ajax_nopriv_get_votes', 'get_votes_callback' );
// Handle vote submission
if ( !function_exists( 'handle_vote_callback' ) ) {
    function handle_vote_callback() {
        // Check nonce
        check_ajax_referer( 'my_ajax_nonce', 'nonce' );
        global $wpdb;
        $table_name = $wpdb->prefix . 'feedback_votes';
        // Sanitize and get feedbackId and voteValue
        $feedback_id = sanitize_text_field( $_POST['feedbackId'] );
        $vote_value = sanitize_text_field( $_POST['voteValue'] );
        // Ensure valid vote value
        if ( !in_array( $vote_value, ['yes', 'no'] ) ) {
            wp_send_json_error( [
                'message' => 'Invalid vote value',
            ] );
            return;
        }
        //		// Check if the user is logged in
        //		$user_id = get_current_user_id(); // Get logged-in user ID
        //
        //		// If user is logged in, use the user ID, otherwise use IP hash
        //		$user_identifier = $user_id ? $user_id : hash( 'sha256', $_SERVER['REMOTE_ADDR'] );
        // Check if the user is logged in
        if ( is_user_logged_in() ) {
            // If the user is logged in, use their user ID
            $user_id = get_current_user_id();
            $user_identifier = $user_id;
            // Store the user ID for logged-in users
        } else {
            // If the user is not logged in, use a cookie to track the vote
            if ( isset( $_COOKIE['aab_vote_identifier'] ) ) {
                $user_identifier = $_COOKIE['aab_vote_identifier'];
                // Use existing cookie
            } else {
                // Create a new cookie with a unique identifier
                $user_identifier = uniqid( 'vote_', true );
                setcookie(
                    'aab_vote_identifier',
                    $user_identifier,
                    time() + 86400 * 30,
                    "/"
                );
                // Cookie expires in 30 days
            }
        }
        // Check if user already voted
        $existing_vote = $wpdb->get_var( $wpdb->prepare( "SELECT id FROM {$table_name} WHERE feedback_id = %s AND ip_hash = %s", $feedback_id, $user_identifier ) );
        if ( $existing_vote ) {
            wp_send_json_error( [
                'message' => 'You have already voted',
            ] );
            return;
        }
        // Insert vote into database
        $result = $wpdb->insert( $table_name, [
            'feedback_id' => $feedback_id,
            'user_id'     => ( get_current_user_id() ?: null ),
            'ip_hash'     => $user_identifier,
            'vote_value'  => $vote_value,
        ], [
            '%s',
            '%d',
            '%s',
            '%s'
        ] );
        if ( !$result ) {
            wp_send_json_error( [
                'message' => 'Failed to record vote',
            ] );
            return;
        }
        // Get updated vote counts
        $yes_votes = $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM {$table_name} WHERE feedback_id = %s AND vote_value = 'yes'", $feedback_id ) );
        $no_votes = $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM {$table_name} WHERE feedback_id = %s AND vote_value = 'no'", $feedback_id ) );
        // Send success response with updated vote counts
        wp_send_json_success( [
            'message' => 'Vote recorded successfully',
            'counts'  => [
                'yes' => (int) $yes_votes,
                'no'  => (int) $no_votes,
            ],
        ] );
    }

}
if ( !function_exists( 'enqueue_feedback_vote_script' ) ) {
    function enqueue_feedback_vote_script() {
        wp_register_script(
            'aagb-separate-accordion',
            plugins_url( '/', __FILE__ ) . 'lib/js/separate-accordion.js',
            array('jquery'),
            AAGB_VERSION,
            true
        );
        wp_localize_script( 'aagb-separate-accordion', 'feedbackAjax', array(
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
            'nonce'   => wp_create_nonce( 'my_ajax_nonce' ),
            'user_id' => get_current_user_id(),
        ) );
        wp_enqueue_script( 'aagb-separate-accordion' );
    }

}
add_action( 'wp_enqueue_scripts', 'enqueue_feedback_vote_script' );
add_action( 'wp_ajax_handle_vote', 'handle_vote_callback' );
add_action( 'wp_ajax_nopriv_handle_vote', 'handle_vote_callback' );