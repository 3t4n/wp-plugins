<?php
/**
 * Admin Page Class
 * @package AdvancedTabBlocks
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if( ! class_exists( 'ATBS_Admin' ) ) {

    class ATBS_Admin {
        /**
         * Constructor
         * @return void
         */
        public function __construct() {
            add_action( 'admin_menu', [ $this, 'atbs_admin_menu' ] );
            add_action( 'admin_enqueue_scripts', [ $this, 'atbs_admin_assets' ] );
        }
    
        /**
         * Enqueue admin scripts
         * @param string $screen
         * @return void
         * @access public
         */
        public function atbs_admin_assets($screen) {
            if( $screen === 'settings_page_atbs-block' ){
                wp_enqueue_style( 'atbs-admin-style', ATBS_URL . '/assets/css/admin.css', [], ATBS_VERSION, 'all' );
                // JS
                wp_enqueue_script( 'atbs-admin-script', ATBS_URL . '/assets/js/admin.js', [ 'jquery' ], ATBS_VERSION, true );
            }
        }
    
        /**
         * Add admin menu
         * @return void
         */
        public function atbs_admin_menu() {
            add_submenu_page(
                'options-general.php',
                __( 'Tabs Block', 'advanced-tabs-block' ),
                __( 'Tabs Block', 'advanced-tabs-block' ),
                'manage_options',
                'atbs-block',
                [ $this, 'atbs_admin_page' ]
            );
        }
    
        /**
         * Admin page
         * @return void
         */
        public function atbs_admin_page() {
            ?>
            <div class="atbs__wrap">
                <div class="plugin_max_container">
                    <div class="plugin__head_container">
                        <div class="plugin_head">
                            <h1 class="plugin_title">
                                <?php _e( 'Advanced Tabs Block', 'advanced-tabs-block' ); ?>
                            </h1>
                            <p class="plugin_description">
                                <?php _e( 'Advanced Tabs Block is a Gutenberg block plugin that allows you to showcase your content in tab style in Gutenberg Editor without any coding knowledge', 'advanced-tabs-block' ); ?>
                            </p>
                        </div>
                    </div>
                    <div class="plugin__body_container">
                        <div class="plugin_body">
                            <div class="tabs__panel_container">
                                <div class="tabs__titles">
                                    <p class="tab__title active" data-tab="tab1">
                                        <?php _e( 'Help and Support', 'advanced-tabs-block' ); ?>
                                    </p>
                                    <p class="tab__title" data-tab="tab2">
                                        <?php _e( 'Changelog', 'advanced-tabs-block' ); ?>
                                    </p>
                                </div>
                                <div class="tabs__container">
                                    <div class="tabs__panels">
                                        <div class="tab__panel active" id="tab1">
                                            <div class="tab__panel_flex">
                                                <div class="tab__panel_left">
                                                    <h3 class="video__title">
                                                        <?php _e( 'Video Tutorial', 'advanced-tabs-block' ); ?>
                                                    </h3>
                                                    <p class="video__description">
                                                        <?php _e( 'Watch the video tutorial to learn how to use the plugin. It will help you start your own design quickly.', 'advanced-tabs-block' ); ?>
                                                    </p>
                                                    <div class="video__container">
                                                        <iframe width="560" height="315" src="https://www.youtube.com/embed/ZqCh5G-FMSU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                    </div>
                                                </div>
                                                <div class="tab__panel_right">
                                                    <div class="single__support_panel">
                                                        <h3 class="support__title">
                                                            <?php _e( 'Get Support', 'advanced-tabs-block' ); ?>
                                                        </h3>
                                                        <p class="support__description">
                                                            <?php _e( 'If you find any issue or have any suggestion, please let me know.', 'advanced-tabs-block' ); ?>
                                                        </p>
                                                        <a href="https://wordpress.org/support/plugin/advanced-tabs-block/" class="support__link" target="_blank">
                                                            <?php _e( 'Support', 'advanced-tabs-block' ); ?>
                                                        </a>
                                                    </div>
                                                    <div class="single__support_panel">
                                                        <h3 class="support__title">
                                                            <?php _e( 'Spread Your Love', 'advanced-tabs-block' ); ?>
                                                        </h3>
                                                        <p class="support__description">
                                                            <?php _e( 'If you like this plugin, please share your opinion', 'advanced-tabs-block' ); ?>
                                                        </p>
                                                        <a href="https://wordpress.org/support/plugin/advanced-tabs-block/reviews/" class="support__link" target="_blank">
                                                            <?php _e( 'Rate the Plugin', 'advanced-tabs-block' ); ?>
                                                        </a>
                                                    </div>
                                                    <div class="single__support_panel">
                                                        <h3 class="support__title">
                                                            <?php _e( 'Similar Blocks', 'advanced-tabs-block' ); ?>
                                                        </h3>
                                                        <p class="support__description">
                                                            <?php _e( 'Want to get more similar blocks, please visit my website', 'advanced-tabs-block' ); ?>
                                                        </p>
                                                        <a href="https://makegutenblock.com" class="support__link" target="_blank">
                                                            <?php _e( 'Visit my Website', 'advanced-tabs-block' ); ?>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="custom__block_request">
                                                <h3 class="custom__block_request_title">
                                                    <?php _e( 'Need to Hire Me?', 'advanced-tabs-block' ); ?>
                                                </h3>
                                                <p class="custom__block_request_description">
                                                    <?php _e( 'I am available for any freelance projects. Please feel free to share your project detail with me.', 'advanced-tabs-block' ); ?>
                                                </p>
                                                <div class="available__links">
                                                    <a href="mailto:zbinsaifullah@gmail.com" class="available__link mail" target="_blank">
                                                        <?php _e( 'Send Email', 'advanced-tabs-block' ); ?>
                                                    </a>
                                                    <a href="https://makegutenblock.com/contact" class="available__link web" target="_blank">
                                                        <?php _e( 'Send Message', 'advanced-tabs-block' ); ?>
                                                    </a>
                                                    <a href="https://www.fiverr.com/devs_zak" class="available__link fiverr" target="_blank">
                                                        <?php _e( 'Fiverr', 'advanced-tabs-block' ); ?>
                                                    </a>
                                                    <a href="https://www.upwork.com/freelancers/~010af183b3205dc627" class="available__link upwork" target="_blank">
                                                        <?php _e( 'UpWork', 'advanced-tabs-block' ); ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab__panel" id="tab2">
                                            <div class="change__log_head">
                                                <h3 class="change__log_title">
                                                    <?php _e( 'Changelog', 'advanced-tabs-block' ); ?>
                                                </h3>
                                                <p class="change__log_description">
                                                    <?php _e( 'This is the changelog of the plugin. You can see the changes in each version.', 'advanced-tabs-block' ); ?>
                                                </p>
                                                <div class="change__notes">
                                                    <div class="single__note">
                                                        <span class="info change__note"><?php _e( 'i', 'advanced-tabs-block' ); ?></span>
                                                        <span class="note__description"><?php _e( 'Info', 'advanced-tabs-block' ); ?></span>
                                                    </div>
                                                    <div class="single__note">
                                                        <span class="feature change__note"><?php _e( 'N', 'advanced-tabs-block' ); ?></span>
                                                        <span class="note__description"><?php _e( 'New Feature', 'advanced-tabs-block' ); ?></span>
                                                    </div>
                                                    <div class="single__note">
                                                        <span class="update change__note"><?php _e( 'U', 'advanced-tabs-block' ); ?></span>
                                                        <span class="note__description"><?php _e( 'Update', 'advanced-tabs-block' ); ?></span>
                                                    </div>
                                                    <div class="single__note">
                                                        <span class="fixing change__note"><?php _e( 'F', 'advanced-tabs-block' ); ?></span>
                                                        <span class="note__description"><?php _e( 'Issue Fixing', 'advanced-tabs-block' ); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="change__log_body">
                                                <div class="single__log">
                                                    <div class="plugin__info">
                                                    <span class="log__version">1.2.0</span>
                                                        <span class="log__date">2023-08-31</span>
                                                    </div>
                                                    <div class="log__description">
                                                        <span class="change__note info">i</span>
                                                        <span class="description__text"><?php _e( 'A major update', 'advanced-tabs-block' ); ?></span>
                                                    </div>
                                                    <div class="log__description">
                                                        <span class="feature change__note"><?php _e( 'N', 'advanced-tabs-block' ); ?></span>
                                                        <span class="description__text"><?php _e( 'Tab Style is available in Editor also.', 'advanced-tabs-block' ); ?></span>
                                                    </div>
                                                    <div class="log__description">
                                                        <span class="feature change__note"><?php _e( 'N', 'advanced-tabs-block' ); ?></span>
                                                        <span class="description__text"><?php _e( 'Adding Icons for Tab title.', 'advanced-tabs-block' ); ?></span>
                                                    </div>
                                                    <div class="log__description">
                                                        <span class="feature change__note"><?php _e( 'N', 'advanced-tabs-block' ); ?></span>
                                                        <span class="description__text"><?php _e( 'More Customization options.', 'advanced-tabs-block' ); ?></span>
                                                    </div>
                                                    <div class="log__description">
                                                        <span class="feature change__note"><?php _e( 'N', 'advanced-tabs-block' ); ?></span>
                                                        <span class="description__text"><?php _e( 'Block Patterns are added.', 'advanced-tabs-block' ); ?></span>
                                                    </div>
                                                    <div class="log__description">
                                                        <span class="change__note fixing">F</span>
                                                        <span class="description__text"><?php _e( 'Fixing PHP errors', 'advanced-tabs-block' ); ?></span>
                                                    </div>
                                                    <div class="log__description">
                                                        <span class="change__note update">U</span>
                                                        <span class="description__text"><?php _e( 'Removing jquery and added only pure javascript', 'advanced-tabs-block' ); ?></span>
                                                    </div>
                                                </div>
                                                <div class="single__log">
                                                    <div class="plugin__info">
                                                    <span class="log__version">1.0.0</span>
                                                        <span class="log__date">2022-08-11</span>
                                                    </div>
                                                    <div class="log__description">
                                                        <span class="change__note info">i</span>
                                                        <span class="description__text"><?php _e( 'Initial Release', 'advanced-tabs-block' ); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }

}

new ATBS_Admin(); // initialize the class


