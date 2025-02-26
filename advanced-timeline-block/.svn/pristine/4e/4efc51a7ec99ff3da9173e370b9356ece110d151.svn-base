<?php

// class to add admin submenu page

class ATLB_Admin_Page {

    /**
     * Constructor
     */
    public function __construct() {
        add_action( 'admin_menu', [ $this, 'atlb_admin_menu' ] );

        // enqueue admin assets
        add_action( 'admin_enqueue_scripts', [ $this, 'atlb_admin_assets' ] );
    }

    /**
     * Enqueue admin scripts
     */
    public function atlb_admin_assets($screen) {
        if( $screen === 'settings_page_atlb-block' ){
            wp_enqueue_style( 'atlb-admin-style', ATLB_URL . 'admin/admin.css', [], ATLB_VERSION );
            // JS
            wp_enqueue_script( 'atlb-admin-script', ATLB_URL . 'admin/admin.js', [ 'jquery' ], ATLB_VERSION, true );
        }
    }

    /**
     * Add admin menu
     */
    public function atlb_admin_menu() {
        add_submenu_page(
            'options-general.php',
            __( 'Timeline Block', 'advanced-timeline-block' ),
            __( 'Timeline Block', 'advanced-timeline-block' ),
            'manage_options',
            'atlb-block',
            [ $this, 'atlb_admin_page' ]
        );
    }

    /**
     * Admin page
     */
    public function atlb_admin_page() {
        ?>
        <div class="atlb__wrap">
            <div class="plugin_max_container">
                <div class="plugin__head_container">
                    <div class="plugin_head">
                        <h1 class="plugin_title">
                            <?php _e( 'Advanced Timeline Blocks', 'advanced-timeline-block' ); ?>
                        </h1>
                        <p class="plugin_description">
                            <?php _e( 'Advanced Timeline Block is a Custom Gutenberg blocks that allows you to create different timeline styles with ease in Gutenberg Editor without any coding knowledge', 'advanced-timeline-block' ); ?>
                        </p>
                    </div>
                </div>
                <div class="plugin__body_container">
                    <div class="plugin_body">
                        <div class="tabs__panel_container">
                            <div class="tabs__titles">
                                <p class="tab__title active" data-tab="tab1">
                                    <?php _e( 'Help and Support', 'advanced-timeline-block' ); ?>
                                </p>
                                <p class="tab__title" data-tab="tab2">
                                    <?php _e( 'Changelog', 'advanced-timeline-block' ); ?>
                                </p>
                            </div>
                            <div class="tabs__container">
                                <div class="tabs__panels">
                                    <div class="tab__panel active" id="tab1">
                                        <div class="tab__panel_flex">
                                            <div class="tab__panel_left">
                                                <h3 class="video__title">
                                                    <?php _e( 'Video Tutorial', 'advanced-timeline-block' ); ?>
                                                </h3>
                                                <p class="video__description">
                                                    <?php _e( 'Watch the video tutorial to learn how to use the plugin. It will help you start your own design quickly.', 'advanced-timeline-block' ); ?>
                                                </p>
                                                <div class="video__container">
                                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/qQLSBQHyIuA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                </div>
                                            </div>
                                            <div class="tab__panel_right">
                                                <div class="single__support_panel">
                                                    <h3 class="support__title">
                                                        <?php _e( 'Get Support', 'advanced-timeline-block' ); ?>
                                                    </h3>
                                                    <p class="support__description">
                                                        <?php _e( 'If you find any issue or have any suggestion, please let me know.', 'advanced-timeline-block' ); ?>
                                                    </p>
                                                    <a href="https://wordpress.org/support/plugin/advanced-timeline-block/" class="support__link" target="_blank">
                                                        <?php _e( 'Support', 'advanced-timeline-block' ); ?>
                                                    </a>
                                                </div>
                                                <div class="single__support_panel">
                                                    <h3 class="support__title">
                                                        <?php _e( 'Spread Your Love', 'advanced-timeline-block' ); ?>
                                                    </h3>
                                                    <p class="support__description">
                                                        <?php _e( 'If you like this plugin, please share your opinion', 'advanced-timeline-block' ); ?>
                                                    </p>
                                                    <a href="https://wordpress.org/support/plugin/advanced-timeline-block/reviews/" class="support__link" target="_blank">
                                                        <?php _e( 'Rate the Plugin', 'advanced-timeline-block' ); ?>
                                                    </a>
                                                </div>
                                                <div class="single__support_panel">
                                                    <h3 class="support__title">
                                                        <?php _e( 'Similar Blocks', 'advanced-timeline-block' ); ?>
                                                    </h3>
                                                    <p class="support__description">
                                                        <?php _e( 'Want to get more similar blocks, please visit my website', 'advanced-timeline-block' ); ?>
                                                    </p>
                                                    <a href="https://makegutenblock.com" class="support__link" target="_blank">
                                                        <?php _e( 'Visit my Website', 'advanced-timeline-block' ); ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="custom__block_request">
                                            <h3 class="custom__block_request_title">
                                                <?php _e( 'Need to Hire Me?', 'advanced-timeline-block' ); ?>
                                            </h3>
                                            <p class="custom__block_request_description">
                                                <?php _e( 'I am available for any freelance projects. Please feel free to share your project detail with me.', 'advanced-timeline-block' ); ?>
                                            </p>
                                            <div class="available__links">
                                                <a href="mailto:zbinsaifullah@gmail.com" class="available__link mail" target="_blank">
                                                    <?php _e( 'Send Email', 'advanced-timeline-block' ); ?>
                                                </a>
                                                <a href="https://makegutenblock.com/contact" class="available__link web" target="_blank">
                                                    <?php _e( 'Send Message', 'advanced-timeline-block' ); ?>
                                                </a>
                                                <a href="https://www.fiverr.com/devs_zak" class="available__link fiverr" target="_blank">
                                                    <?php _e( 'Fiverr', 'advanced-timeline-block' ); ?>
                                                </a>
                                                <a href="https://www.upwork.com/freelancers/~010af183b3205dc627" class="available__link upwork" target="_blank">
                                                    <?php _e( 'UpWork', 'advanced-timeline-block' ); ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab__panel" id="tab2">
                                        <div class="change__log_head">
                                            <h3 class="change__log_title">
                                                <?php _e( 'Changelog', 'advanced-timeline-block' ); ?>
                                            </h3>
                                            <p class="change__log_description">
                                                <?php _e( 'This is the changelog of the plugin. You can see the changes in each version.', 'advanced-timeline-block' ); ?>
                                            </p>
                                            <div class="change__notes">
                                                <div class="single__note">
                                                    <span class="info change__note"><?php _e( 'i', 'advanced-timeline-block' ); ?></span>
                                                    <span class="note__description"><?php _e( 'Info', 'advanced-timeline-block' ); ?></span>
                                                </div>
                                                <div class="single__note">
                                                    <span class="feature change__note"><?php _e( 'N', 'advanced-timeline-block' ); ?></span>
                                                    <span class="note__description"><?php _e( 'New Feature', 'advanced-timeline-block' ); ?></span>
                                                </div>
                                                <div class="single__note">
                                                    <span class="update change__note"><?php _e( 'U', 'advanced-timeline-block' ); ?></span>
                                                    <span class="note__description"><?php _e( 'Update', 'advanced-timeline-block' ); ?></span>
                                                </div>
                                                <div class="single__note">
                                                    <span class="fixing change__note"><?php _e( 'F', 'advanced-timeline-block' ); ?></span>
                                                    <span class="note__description"><?php _e( 'Issue Fixing', 'advanced-timeline-block' ); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="change__log_body">
                                            <div class="single__log">
                                                <div class="plugin__info">
                                                    <span class="log__version">2.1.0</span>
                                                    <span class="log__date">2022-11-05</span>
                                                </div>
                                                <div class="log__description">
                                                    <span class="change__note feature">U</span>
                                                    <span class="description__text"><?php _e( 'A great updates with completely different looks and feel.', 'advanced-timeline-block' ); ?></span>
                                                </div>
                                            </div>
                                            <div class="single__log">
                                                <div class="plugin__info">
                                                    <span class="log__version">1.0.0</span>
                                                    <span class="log__date">2021-11-29</span>
                                                </div>
                                                <div class="log__description">
                                                    <span class="change__note info">i</span>
                                                    <span class="description__text"><?php _e( 'Initial Release', 'advanced-timeline-block' ); ?></span>
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

new ATLB_Admin_Page();