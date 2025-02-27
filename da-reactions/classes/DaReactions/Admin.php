<?php

/**
 * Manages the admin features for this plugin
 *
 * Class Admin
 * @package DaReactions
 */
namespace DaReactions;

use DaReactions\Pages\AdminPageAnalytics;
use DaReactions\Pages\AdminPageImportVotes;
use DaReactions\Pages\AdminPageVotesList;
use DaReactions\Pages\ButtonsSettings;
use DaReactions\Pages\GeneralSettings;
use DaReactions\Pages\GraphicSettings;
use DaReactions\Pages\HelpPage;
use DaReactions\Widgets\ContentsByReactionWidget;
/**
 * Manages the admin features for this plugin
 *
 * Class Admin
 * @package DaReactions
 */
class Admin {
    /**
     * @var ButtonsSettings Instance of settings page
     * @since 1.0.0
     */
    private $buttons_settings_page;

    /**
     * @var GeneralSettings Instance of settings page
     * @since 1.0.0
     */
    private $general_settings_page;

    /**
     * @var GraphicSettings Instance of settings page
     * @since 1.0.0
     */
    private $graphic_settings_page;

    /**
     * @var AdminPageVotesList Instance of votes list page
     */
    private $votes_list_page;

    /**
     * @var AdminPageImportVotes Instance of votes list page
     */
    private $import_votes_page;

    /**
     * @var AdminPageAnalytics Instance of analytics page
     */
    private $analytics_page;

    /**
     * @var HelpPage Instance of help page
     */
    private $help_page;

    /**
     * @var string $plugin_name
     * The name of the plugin
     *
     * @since 1.0.0
     */
    private $plugin_name;

    /**
     * Admin constructor.
     *
     * @param Main $main
     *
     * @since 1.0.0
     */
    public function __construct( $main ) {
        $this->plugin_name = $main->getPluginName();
        if ( is_multisite() ) {
            $sites = get_sites();
            foreach ( $sites as $site ) {
                Options::createInstance( $this->plugin_name . '_buttons', 'buttons', $site->blog_id );
                Options::createInstance( $this->plugin_name . '_general', 'general', $site->blog_id );
                Options::createInstance( $this->plugin_name . '_graphic', 'graphic', $site->blog_id );
                Options::createInstance( $this->plugin_name . '_notices', 'notices', $site->blog_id );
            }
        } else {
            Options::createInstance( $this->plugin_name . '_buttons', 'buttons' );
            Options::createInstance( $this->plugin_name . '_general', 'general' );
            Options::createInstance( $this->plugin_name . '_graphic', 'graphic' );
            Options::createInstance( $this->plugin_name . '_notices', 'notices' );
        }
        $this->buttons_settings_page = new ButtonsSettings($this->plugin_name, 'buttons');
        $this->general_settings_page = new GeneralSettings($this->plugin_name, 'general', $main);
        $this->graphic_settings_page = new GraphicSettings($this->plugin_name, 'graphic');
        $this->votes_list_page = AdminPageVotesList::getInstance();
        $this->import_votes_page = AdminPageImportVotes::getInstance();
        $this->analytics_page = AdminPageAnalytics::getInstance();
        $this->help_page = new HelpPage();
    }

    /**
     * Adds links to plugin row in main plugins page
     *
     * @param array $links
     *
     * @return array
     *
     * @since 1.0.0
     */
    public function addPluginActionLinks( $links ) {
        if ( isset( $links['edit'] ) ) {
            // We shouldn't encourage editing our plugin directly.
            unset($links['edit']);
        }
        $links['settings'] = '
        <a 
        href="' . admin_url( 'admin.php?page=da-reactions' ) . '"
        class="dashicons-before dashicons-admin-customizer"
        title="' . __( 'Settings', 'da-reactions' ) . '">
            <span class="screen-reader-text">' . admin_url( 'admin.php?page=da-reactions' ) . '</span>
        </a>';
        $links['newsletter'] = '
        <a
        href="https://eepurl.com/dvA2nD"
        target="_blank"
        class="dashicons-before dashicons-email"
        title="' . __( 'Newsletter', 'da-reactions' ) . '">
            <span class="screen-reader-text">' . admin_url( 'admin.php?page=da-reactions' ) . '</span>
        </a>';
        $links['help'] = '
        <a
        href="https://www.da-reactions-plugin.com/knowledge-base/"
        target="_blank"
        class="dashicons-before dashicons-sos"
        title="' . __( 'Help', 'da-reactions' ) . '">
            <span class="screen-reader-text">' . __( 'Help', 'da-reactions' ) . '</span>
        </a>';
        return $links;
    }

    /**
     * Registers admin menu pages
     *
     * @since 1.0.0
     */
    public function addSettingsPage() {
        global $submenu;
        $image_string = Logo::getAsData( 'rgba(240,246,252,.6)' );
        $menu_main_slug = $this->plugin_name;
        add_menu_page(
            __( 'Reactions', 'da-reactions' ),
            // Page title
            __( 'Reactions', 'da-reactions' ),
            // Menu title
            'manage_options',
            // Capability
            $menu_main_slug,
            null,
            $image_string,
            35
        );
        add_submenu_page(
            $menu_main_slug,
            __( 'Reactions manager', 'da-reactions' ),
            // Page title
            __( 'Reactions manager', 'da-reactions' ),
            // Menu title
            'manage_options',
            $menu_main_slug,
            array($this->buttons_settings_page, 'displayPage')
        );
        add_submenu_page(
            $menu_main_slug,
            __( 'General settings', 'da-reactions' ),
            // Page title
            __( 'General settings', 'da-reactions' ),
            // Menu title
            'manage_options',
            $menu_main_slug . '_general_settings',
            array($this->general_settings_page, 'displayPage')
        );
        add_submenu_page(
            $menu_main_slug,
            __( 'Graphic settings', 'da-reactions' ),
            // Page title
            __( 'Graphic settings', 'da-reactions' ),
            // Menu title
            'manage_options',
            $menu_main_slug . '_graphic_settings',
            array($this->graphic_settings_page, 'displayPage')
        );
        $votes_list_page_hook = add_submenu_page(
            $menu_main_slug,
            _x( 'Votes list', 'Page title', 'da-reactions' ),
            // Page title
            _x( 'Votes list', 'Menu title', 'da-reactions' ),
            // Menu title
            'manage_options',
            $menu_main_slug . '_votes_list',
            array($this->votes_list_page, 'displayPage')
        );
        add_submenu_page(
            $menu_main_slug,
            __( 'Help', 'da-reactions' ),
            __( 'Help', 'da-reactions' ),
            'manage_options',
            $menu_main_slug . '_help',
            array($this->help_page, 'displayPage')
        );
        /*
        if ( current_user_can( 'manage_options' ) ) {
            $submenu['da-reactions'][30] = array(
                '<span style="color: #f18500;"> ' . __( 'Help', 'da-reactions' ) . '</span>',
                'manage_options',
                'https://www.da-reactions-plugin.com/knowledge-base/',
                array( 'target' => '_blank' )
            );
        }
        */
        /**
         * Loader::run already executed, so we cannot use Loader::addFilter
         */
        add_filter( "load-{$votes_list_page_hook}", array($this->votes_list_page, 'addScreenOptions') );
    }

    /**
     * Deletes all reactions for deleted comments
     *
     * @param integer $comment_id The comment id
     *
     * @since 1.0.0
     */
    public function deleteAllReactionsForComment( $comment_id ) {
        Data::deleteAllContentReactions( $comment_id, 'comment' );
    }

    /**
     * Deletes all reactions for deleted posts
     *
     * @param integer $postid The post id
     *
     * @since 1.0.0
     */
    public function deleteAllReactionsForContent( $postid ) {
        $post = get_post( $postid );
        Data::deleteAllContentReactions( $post->ID, $post->post_type );
    }

    /**
     * Enqueues styles for admin
     *
     * @since 1.0.0
     */
    public function enqueueStyles() {
        wp_enqueue_style(
            $this->plugin_name,
            DA_REACTIONS_URL . 'assets/dist/admin-style.css',
            array(),
            DA_REACTIONS_VERSION
        );
        wp_enqueue_style(
            $this->plugin_name . '_public',
            DA_REACTIONS_URL . 'assets/dist/public-style.css',
            array(),
            DA_REACTIONS_VERSION
        );
    }

    /**
     * Enqueues scripts for admin
     *
     * @since 1.0.0
     */
    public function enqueueScripts() {
        global $pagenow;
        $pages = array(
            'admin.php',
            'edit.php',
            'index.php',
            'plugins.php',
            'post.php',
            'post-new.php',
            'nav-menus.php'
        );
        if ( in_array( $pagenow, $pages, true ) ) {
            $options = $this->general_settings_page->getOptions();
            /// Enqueue jQuery UI Dialog that is used to dusplay confirmation messages
            wp_enqueue_script( 'jquery-ui-dialog' );
            wp_enqueue_style( 'wp-jquery-ui-dialog' );
            wp_enqueue_script(
                $this->plugin_name,
                DA_REACTIONS_URL . 'assets/dist/admin.js',
                array('jquery', 'jquery-ui-sortable', 'wp-color-picker'),
                DA_REACTIONS_VERSION,
                false
            );
            wp_enqueue_script(
                $this->plugin_name . '-menu',
                DA_REACTIONS_URL . 'assets/dist/admin-menu.js',
                array('jquery'),
                DA_REACTIONS_VERSION,
                false
            );
            $current_user = wp_get_current_user();
            $display_name = '';
            $user_email = '';
            if ( isset( $current_user ) ) {
                $display_name = $current_user->display_name;
                $user_email = $current_user->user_email;
            }
            if ( isset( $_GET['page'] ) ) {
                $screen_name = filter_var( $_GET["page"], FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_HIGH );
            } else {
                $current_screen = get_current_screen();
                $screen_name = filter_var( $current_screen->base, FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_HIGH );
            }
            wp_localize_script( $this->plugin_name, 'DaReactionsAdmin', array(
                'ajax_url'               => admin_url( 'admin-ajax.php' ),
                'remove_data_on_disable' => $options->getOption( 'remove_data_on_disable' ),
                'plugin_home_url'        => admin_url( 'admin.php?page=da-reactions' ),
                'plugin_name'            => $this->plugin_name,
                'screen_name'            => $screen_name,
                'nonce'                  => wp_create_nonce( 'nonce' ),
                'non_sensitive_data'     => array(
                    'version'   => get_bloginfo( 'version' ),
                    'php'       => PHP_VERSION,
                    'multisite' => is_multisite(),
                ),
                'sensitive_data'         => array(
                    'user_name'  => $display_name,
                    'user_email' => $user_email,
                    'site_url'   => get_site_url(),
                ),
                'strings'                => array(
                    'DELETE_ON_DISABLE_CONFIRM'   => __( 'This action will delete all saved data, continue?', 'da-reactions' ),
                    'DELETE_REACTION_ROW_CONFIRM' => __( 'Are you sure to delete this row?', 'da-reactions' ),
                    'DRAG_OR_CLICK_TO_UPLOAD'     => __( 'Drag your file here or click in this area.', 'da-reactions' ),
                    'EXIT_WITHOUT_SAVING'         => __( 'Do you want to leave this page before saving?', 'da-reactions' ),
                    'UNSUPPORTED_MIME_TYPE'       => __( 'Unsupported file format', 'da-reactions' ),
                    'CONFIRM_BUTTON_LABEL'        => __( 'Confirm', 'da-reactions' ),
                    'CANCEL_BUTTON_LABEL'         => __( 'Cancel', 'da-reactions' ),
                ),
            ) );
            if ( $pagenow === 'admin.php' && isset( $_GET['page'] ) && $_GET["page"] === "da-reactions_graphic_settings" ) {
                wp_enqueue_script(
                    $this->plugin_name . '-frontend',
                    DA_REACTIONS_URL . 'assets/dist/public-script.js',
                    array('jquery'),
                    DA_REACTIONS_VERSION,
                    false
                );
                $general_options = Options::getInstance( 'general' );
                $graphic_options = Options::getInstance( 'graphic' );
                $show_count = $graphic_options->getOption( 'show_count', 'always' );
                if ( wp_is_mobile() && $graphic_options->getOption( 'da_r_mobile_enabled', 'off' ) === 'on' ) {
                    $show_count = $graphic_options->getOption( 'show_count_mobile', 'always' );
                }
                wp_localize_script( $this->plugin_name . '-frontend', 'DaReactions', array(
                    'ajax_url'                     => admin_url( 'admin-ajax.php' ),
                    'display_detail_modal'         => $general_options->getOption( 'display_detail_modal', 'off' ),
                    'display_detail_modal_toolbar' => $general_options->getOption( 'display_detail_modal_toolbar', 'off' ),
                    'display_detail_tooltip'       => $general_options->getOption( 'display_detail_tooltip', 'off' ),
                    'modal_result_limit'           => absint( $general_options->getOption( 'modal_result_limit', 100 ) ),
                    'tooltip_result_limit'         => absint( $general_options->getOption( 'tooltip_result_limit', 5 ) ),
                    'show_count'                   => $show_count,
                    'loader_url'                   => DA_REACTIONS_URL . 'assets/dist/loading.svg',
                    'nonce'                        => wp_create_nonce( 'da-reactions-preview' ),
                ) );
            }
        }
    }

    /**
     * Init all pages settings
     *
     * @since 1.0.0
     */
    public function initSettings() {
        $this->buttons_settings_page->initSettings();
        $this->general_settings_page->initSettings();
        $this->graphic_settings_page->initSettings();
    }

    /**
     * Register plugin widget
     *
     * @since 1.0.0
     */
    public function registerWidgets() {
        register_widget( ContentsByReactionWidget::class );
    }

    /**
     * Render HTML for confirmation modal
     *
     * @since 3.3.0
     */
    public function renderModalHtml() {
        ?>
        <div style="display: none">
        <div id="da-reactions-dialog-confirm" class="warning"
             title="<?php 
        echo esc_attr_x( 'Confirm?', 'Modal title', 'da-reactions' );
        ?>">
            <h3><?php 
        esc_html_e( 'Warning!', 'da-reactions' );
        ?></h3>
            <p class="message">
	            <?php 
        echo esc_html_x( 'Are you sure?', 'Modal default message', 'da-reactions' );
        ?>
            </p>
        </div>
        <hr>
        </div><?php 
    }

}
