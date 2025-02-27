<?php

/**
 * Main class for plugin
 *
 * @package DaReactions
 *
 * @since 1.0.0
 */
namespace DaReactions;

use DaReactions\Pages\AdminPageVotesList;
use DaReactions\Plugins\BBPress;
use DaReactions\Plugins\BuddyPress;
use DaReactions\Plugins\Gutenberg;
use DaReactions\Plugins\Network;
use DaReactions\Plugins\WpForo;
use DaReactions\Widgets\DashboardWidget;
/**
 * Class Main
 * @package DaReactions
 *
 * Main class for plugin
 *
 * @since 1.0.0
 */
class Main {
    /**
     * The loader that's responsible for maintaining and registering all hooks that power
     * the plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      Loader $loader Maintains and registers all hooks for the plugin.
     */
    protected $loader;

    /**
     * The unique identifier of this plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      string $plugin_name The string used to uniquely identify this plugin.
     */
    protected $plugin_name;

    protected $shortcodes;

    /**
     * Flag to check if BuddyPress is installed
     *
     * @since   1.1.0
     * @access  private
     * @var     bool $buddy_press_installed
     */
    protected $buddy_press_installed;

    /**
     * Flag to check if Gutenberg Editor is installed
     *
     * @since   1.2.0
     * @access  private
     * @var     bool $gutenberg_installed ;
     */
    protected $gutenberg_installed;

    /**
     * Define the core functionality of the plugin.
     *
     * Set the plugin name and the plugin version that can be used throughout the plugin.
     * Load the dependencies, define the locale, and set the hooks for the admin area and
     * the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function __construct() {
        $this->plugin_name = 'da-reactions';
        $this->buddy_press_installed = false;
        $this->gutenberg_installed = function_exists( 'register_block_type' );
        $this->loader = new Loader();
        $this->shortcodes = new Shortcodes();
        $this->shortcodes->init();
        $this->setLocale();
        $this->defineAdminHooks();
        $this->definePublicHooks();
        $installed_database_version = (float) get_option( 'da_reactions_db_version', 0 );
        if ( $installed_database_version < Activator::$current_database_version ) {
            Activator::activate();
        }
    }

    /**
     * Mark BuddyPress as installed
     *
     * @since 3.0.0
     */
    public function enableBuddyPress() {
        $this->buddy_press_installed = true;
    }

    /**
     * Define the locale for this plugin for internationalization.
     *
     * Uses the \DaReactions\I18n class in order to set the domain and to register the hook
     * with WordPress.
     *
     * @since    1.0.0
     * @access   private
     */
    private function setLocale() {
        $plugin_i18n = new I18n();
        $this->loader->addAction( 'plugins_loaded', $plugin_i18n, 'loadPluginTextdomain' );
    }

    /**
     * Register all of the hooks related to the admin area functionality
     * of the plugin.
     *
     * @since    1.0.0
     * @access   private
     */
    private function defineAdminHooks() {
        $admin = new Admin($this);
        $ajax = new Ajax($this);
        $file = new File($this);
        $meta_box = new MetaBox($this->getPluginName(), $this->loader);
        $custom_column = new CustomColumn($this->getPluginName());
        $dashboard_widget = new DashboardWidget();
        $privacy = new Privacy();
        $notices = new AdminNotices();
        $list_page = AdminPageVotesList::getInstance();
        // Enqueue styles
        $this->loader->addAction( 'admin_enqueue_scripts', $admin, 'enqueueStyles' );
        // Enqueue scripts
        $this->loader->addAction( 'admin_enqueue_scripts', $admin, 'enqueueScripts' );
        // Register admin pages
        $this->loader->addAction( 'admin_menu', $admin, 'addSettingsPage' );
        $this->loader->addAction( 'admin_init', $admin, 'initSettings' );
        if ( isset( $list_page ) ) {
            $this->loader->addFilter(
                'set-screen-option',
                $list_page,
                'setScreenOptions',
                10,
                3
            );
        }
        $this->loader->addAction( 'wp_ajax_da_reactions_load_buttons_preview', $ajax, 'loadButtonsPreview' );
        $this->loader->addAction( 'wp_ajax_da_reactions_reset_all', $ajax, 'resetAll' );
        $this->loader->addAction( 'wp_ajax_da_reactions_reset_cache', $ajax, 'resetCache' );
        $this->loader->addAction( 'wp_ajax_da_reactions_delete_vote', $ajax, 'deleteVote' );
        $this->loader->addAction( 'wp_ajax_da_reactions_dismiss_review_notice', $ajax, 'dismissReviewNotice' );
        // Register Widget
        $this->loader->addAction( 'widgets_init', $admin, 'registerWidgets' );
        // Add Links on Installed plugins list
        $this->loader->addFilter( 'plugin_action_links_' . DA_REACTIONS_NAME, $admin, 'addPluginActionLinks' );
        // Register meta box for edit pages and saves values
        $this->loader->addAction( "add_meta_boxes", $meta_box, 'addReactionsMetaBox' );
        $this->loader->addAction( "save_post", $meta_box, 'saveReactionsData' );
        // Add custom column to lists
        $this->loader->addAction( 'manage_posts_custom_column', $custom_column, 'displayPostsReactions' );
        $this->loader->addAction( 'manage_pages_custom_column', $custom_column, 'displayPostsReactions' );
        $this->loader->addFilter( 'manage_posts_columns', $custom_column, 'addReactionColumn' );
        $this->loader->addFilter( 'manage_pages_columns', $custom_column, 'addReactionColumn' );
        // Admin notices
        $this->loader->addAction( 'admin_notices', $notices, 'showNotices' );
        $this->loader->addAction( 'wp_ajax_dismiss_admin_notice', $notices, 'dismissNotice' );
        // Add Dashboard Widget
        $this->loader->addAction( 'wp_dashboard_setup', $dashboard_widget, 'addDashboardWidgets' );
        // Delete all related entry on content deletion
        $this->loader->addAction( "before_delete_post", $admin, 'deleteAllReactionsForContent' );
        $this->loader->addAction( "delete_comment", $admin, 'deleteAllReactionsForComment' );
        // Register BuddyPress specific hooks
        $this->loader->addAction( 'bp_include', $this, 'enableBuddyPress' );
        // Register modal for deactivation
        $this->loader->addAction( 'admin_footer', $admin, 'renderModalHtml' );
        $this->loader->addFilter( 'wp_privacy_personal_data_exporters', $privacy, 'registerVotesExporters' );
        $this->loader->addFilter( 'wp_privacy_personal_data_erasers', $privacy, 'registerVotesErasers' );
        $this->loader->addFilter( 'admin_init', $privacy, 'addPrivacyPolicyContent' );
    }

    /**
     * Register all of the hooks related to the public-facing functionality
     * of the plugin.
     *
     * @since    1.0.0
     * @access   private
     */
    private function definePublicHooks() {
        $frontend = new Frontend($this);
        $ajax = new Ajax($this);
        $api = new Api();
        $user = new User();
        $archive = new Archive($this);
        // Enqueue styles
        $this->loader->addAction( 'wp_enqueue_scripts', $frontend, 'enqueueStyles' );
        $this->loader->addAction( 'wp_enqueue_scripts', $frontend, 'enqueueScripts' );
        // Register Public AJAX actions
        $this->loader->addAction( 'wp_ajax_da_reactions_add_reaction', $ajax, 'addReaction' );
        $this->loader->addAction( 'wp_ajax_nopriv_da_reactions_add_reaction', $ajax, 'addReaction' );
        $this->loader->addAction( 'wp_ajax_da_reactions_load_buttons', $ajax, 'loadButtons' );
        $this->loader->addAction( 'wp_ajax_nopriv_da_reactions_load_buttons', $ajax, 'loadButtons' );
        $this->loader->addAction( 'wp_ajax_da_reactions_get_users_reactions', $ajax, 'getUsersReactions' );
        $this->loader->addAction( 'wp_ajax_nopriv_da_reactions_get_users_reactions', $ajax, 'getUsersReactions' );
        // Register HTML injection on singles, archives and comments
        $this->loader->addFilter(
            'the_content',
            $frontend,
            'addButtonsToContent',
            1000
        );
        $this->loader->addFilter(
            'the_excerpt',
            $frontend,
            'addButtonsToExcerpt',
            1000
        );
        $this->loader->addFilter(
            'comment_text',
            $frontend,
            'addButtonsToComment',
            1000,
            2
        );
        // Register init actions
        $this->loader->addAction( 'init', $user, 'setCookie' );
        // Register router actions
        $this->loader->addAction( 'init', $archive, 'rewritesInit' );
        $this->loader->addAction( 'init', $archive, 'queryVars' );
        $this->loader->addAction( 'posts_selection', $archive, 'setReactionsArchive' );
        $this->loader->addAction( 'admin_head-nav-menus.php', $archive, 'setReactionsArchiveMenuItems' );
        $this->loader->addFilter( 'get_the_archive_title', $archive, 'setReactionsArchiveTitle' );
        $this->loader->addFilter( 'posts_fields_request', $archive, 'filterFields' );
        $this->loader->addFilter( 'posts_join_request', $archive, 'filterJoin' );
        $this->loader->addFilter( 'posts_where_request', $archive, 'filterWhere' );
        $this->loader->addFilter( 'posts_groupby_request', $archive, 'filterGroupBy' );
        $this->loader->addFilter( 'posts_orderby', $archive, 'filterOrderBy' );
        // Register BBPress specific hooks
        $bb_press = new BBPress();
        // Register BBPress specific hooks
        $this->loader->addFilter(
            'bbp_get_forum_content',
            $bb_press,
            'addButtonsToForumTopicOrReply',
            10000,
            2
        );
        $this->loader->addFilter(
            'bbp_get_topic_content',
            $bb_press,
            'addButtonsToForumTopicOrReply',
            10000,
            2
        );
        $this->loader->addFilter(
            'bbp_get_reply_content',
            $bb_press,
            'addButtonsToForumTopicOrReply',
            10000,
            2
        );
        // Register WpForo specific hooks
        $wp_foro = new WpForo();
        // Register WpForo specific hooks
        $this->loader->addFilter(
            'wpforo_content_before',
            $wp_foro,
            'addButtonsToContent',
            10000,
            2
        );
        $this->loader->addFilter(
            'wpforo_content_after',
            $wp_foro,
            'addButtonsToContent',
            10000,
            2
        );
        $this->loader->addFilter(
            'wpforo_template_buttons',
            $wp_foro,
            'addButtonsToToolbar',
            10000,
            5
        );
        // Register output sanitization hooks
        $this->loader->addFilter(
            'wp_kses_allowed_html',
            $frontend,
            'wpKsesAllowedHtml',
            10,
            2
        );
    }

    /**
     * Run the loader to execute all the hooks with WordPress.
     *
     * @since    1.0.0
     */
    public function run() {
        $this->loader->run();
    }

    /**
     * The name of the plugin used to uniquely identify it within the context of
     * WordPress and to define internationalization functionality.
     *
     * @return    string    The name of the plugin.
     * @since     1.0.0
     */
    public function getPluginName() {
        return $this->plugin_name;
    }

    /**
     * The reference to the class that orchestrates the hooks with the plugin.
     *
     * @return    Loader    Orchestrates the hooks of the plugin.
     * @since     1.0.0
     */
    public function getLoader() {
        return $this->loader;
    }

    /**
     * Tell if BBPress plugin is installed
     *
     * @return bool
     *
     * @since 3.7.0
     */
    public function isBBPressInstalled() {
        return class_exists( 'bbPress' );
    }

    /**
     * Tell if WpForo plugin is installed
     *
     * @return bool
     *
     * @since 3.23.0
     */
    public function isWpForoInstalled() {
        return defined( 'WPFORO_VERSION' );
    }

}
