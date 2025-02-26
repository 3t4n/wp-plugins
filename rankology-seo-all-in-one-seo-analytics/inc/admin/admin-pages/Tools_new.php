<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

$this->options = get_option('rankology_import_export_option_name');

if (function_exists('rankology_admin_header')) {
    echo rankology_admin_header();
} ?>
    <div class="rankology-option">
        <?php
        echo $this->rankology_feature_title(null);
        $current_tab = '';
        ?>
        <div class="rankology-sub-tabs">
            <?php
            $current_tab = '';
            $plugin_settings_tabs = [
                'tab_rankology_tool_settings'       => __('Settings', 'wp-rankology'),
                'tab_rankology_tool_reset'          => __('Reset', 'wp-rankology'),
            ];

            $plugin_settings_tabs = apply_filters('rankology_tools_tabs', $plugin_settings_tabs);
            ?>

            <!-- Sub-Tabs Navigation -->
            <ul>
                <?php
                $activeState = 1;
                foreach ($plugin_settings_tabs as $tab_key => $tab_caption) {
                    ?>
                    <li class="rankology-sub-tab <?php if ($activeState == 1) {
                        echo ' active ';
                    } ?> " data-sub-tab="<?php echo $tab_key ?>"><?php echo $tab_caption ?></li>
                    <?php $activeState++;
                } ?>
            </ul>
        </div>
        <!-- Sub-Tabs Content -->
        <div class="sub-tab-content">


            <div id="rankology-tabs" class="wrap">
                <div class="rankology-tab" style="display:block;">
                    <div class="nav-tab-wrapper">


                        <?php
                        $activeState = 1;
                        foreach ($plugin_settings_tabs as $tab_key => $tab_caption) {
                            ?>
                            <div id="<?php echo $tab_key ?>" class="rankology-sub-content <?php if ($activeState == 1) {
                                echo ' active ';
                            } ?> ">
                                <?php
                                // Display settings sections based on the active sub-tab
                               // do_action('rankology_tools_before', $current_tab, '');
                                if ($activeState == 1) { ?>

                                    <div class="postbox section-tool">
                                        <div class="rkseo-section-header">
                                            <h2>
                                                <?php esc_html_e('Data', 'wp-rankology'); ?>
                                            </h2>
                                        </div>
                                        <div class="inside">
                                            <h3>
                                                <?php esc_html_e('Import data from a CSV', 'wp-rankology'); ?>
                                            </h3>
                                            <p>
                                                <?php esc_html_e('Upload a CSV file to quickly import post (post, page, single post type) and term metadata.', 'wp-rankology'); ?>
                                            </p>
                                            <ul>
                                                <li>
                                                    <?php esc_html_e('Slug', 'wp-rankology'); ?>
                                                </li>
                                                <li>
                                                    <?php esc_html_e('Meta title', 'wp-rankology'); ?>
                                                </li>
                                                <li>
                                                    <?php esc_html_e('Meta description', 'wp-rankology'); ?>
                                                </li>
                                                <li>
                                                    <?php esc_html_e('Meta robots (noindex, nofollow...)', 'wp-rankology'); ?>
                                                </li>
                                                <li>
                                                    <?php esc_html_e('Facebook Open Graph tags (title, description, image)', 'wp-rankology'); ?>
                                                </li>
                                                <li>
                                                    <?php esc_html_e('Twitter cards tags (title, description, image)', 'wp-rankology'); ?>
                                                </li>
                                                <li>
                                                    <?php esc_html_e('Redirection (enable, login status, type, URL)', 'wp-rankology'); ?>
                                                </li>
                                                <li>
                                                    <?php esc_html_e('Primary category', 'wp-rankology'); ?>
                                                </li>
                                                <li>
                                                    <?php esc_html_e('Canonical URL', 'wp-rankology'); ?>
                                                </li>
                                                <li>
                                                    <?php esc_html_e('Target keywords', 'wp-rankology'); ?>
                                                </li>
                                            </ul>
                                            <p>
                                                <a class="btn btnTertiary"
                                                   href="<?php echo admin_url('admin.php?page=rankology_csv_importer'); ?>">
                                                    <?php esc_html_e('Run the importer', 'wp-rankology'); ?>
                                                </a>
                                            </p>
                                        </div><!-- .inside -->
                                    </div><!-- .postbox -->
                                    <div id="metadata-migration-tool" class="postbox section-tool">
                                        <div class="inside">
                                            <h3>
                                                <?php esc_html_e('Export metadata to a CSV', 'wp-rankology'); ?>
                                            </h3>
                                            <p>
                                                <?php esc_html_e('Export your post (post, page, single post type) and term metadata for this site as a .csv file.', 'wp-rankology'); ?>
                                            </p>
                                            <ul>
                                                <li>
                                                    <?php esc_html_e('ID', 'wp-rankology'); ?>
                                                </li>
                                                <li>
                                                    <?php esc_html_e('Permalink', 'wp-rankology'); ?>
                                                </li>
                                                <li>
                                                    <?php esc_html_e('Slug', 'wp-rankology'); ?>
                                                </li>
                                                <li>
                                                    <?php esc_html_e('Meta title', 'wp-rankology'); ?>
                                                </li>
                                                <li>
                                                    <?php esc_html_e('Meta description', 'wp-rankology'); ?>
                                                </li>
                                                <li>
                                                    <?php esc_html_e('Meta robots (noindex, nofollow...)', 'wp-rankology'); ?>
                                                </li>
                                                <li>
                                                    <?php esc_html_e('Facebook Open Graph tags (title, description, image)', 'wp-rankology'); ?>
                                                </li>
                                                <li>
                                                    <?php esc_html_e('Twitter cards tags (title, description, image)', 'wp-rankology'); ?>
                                                </li>
                                                <li>
                                                    <?php esc_html_e('Redirection (enable, login status, type, URL)', 'wp-rankology'); ?>
                                                </li>
                                                <li>
                                                    <?php esc_html_e('Primary category', 'wp-rankology'); ?>
                                                </li>
                                                <li>
                                                    <?php esc_html_e('Canonical URL', 'wp-rankology'); ?>
                                                </li>
                                                <li>
                                                    <?php esc_html_e('Target keywords', 'wp-rankology'); ?>
                                                </li>
                                            </ul>
                                            <form method="post">
                                                <input type="hidden" name="rankology_action" value="export_csv_metadata"/>
                                                <?php wp_nonce_field('rankology_export_csv_metadata_nonce', 'rankology_export_csv_metadata_nonce'); ?>

                                                <button id="rankology-metadata-migrate" type="button"
                                                        class="btn btnTertiary">
                                                    <?php esc_html_e('Export', 'wp-rankology'); ?>
                                                </button>

                                                <span class="spinner"></span>

                                                <div class="log"></div>
                                            </form>
                                        </div><!-- .inside -->
                                    </div><!-- .postbox -->
                                    <?php

                                    rkseo_submit_button(__('Save changes', 'wp-rankology'));
                                }
                                if ($activeState == 2) { ?>
                                    <div class="postbox section-tool">
                                        <div class="rkseo-section-header">
                                            <h2>
                                                <?php esc_html_e('Settings', 'wp-rankology'); ?>
                                            </h2>
                                        </div>
                                        <div class="inside">
                                            <h3><span><?php esc_html_e('Export plugin settings', 'wp-rankology'); ?></span>
                                            </h3>

                                            <p><?php esc_html_e('Export the plugin settings for this site as a .json file. This allows you to easily import the configuration into another site.', 'wp-rankology'); ?>
                                            </p>

                                            <form method="post">
                                                <input type="hidden" name="rankology_action" value="export_settings" />
                                                <?php wp_nonce_field('rankology_export_nonce', 'rankology_export_nonce'); ?>

                                                <button id="rankology-export" type="submit" class="btn btnTertiary">
                                                    <?php esc_html_e('Export', 'wp-rankology'); ?>
                                                </button>
                                            </form>
                                        </div><!-- .inside -->
                                    </div><!-- .postbox -->

                                    <div class="postbox section-tool">
                                        <div class="inside">
                                            <h3><span><?php esc_html_e('Import plugin settings', 'wp-rankology'); ?></span>
                                            </h3>

                                            <p><?php esc_html_e('Import the plugin settings from a .json file. This file can be obtained by exporting the settings on another site using the form above.', 'wp-rankology'); ?>
                                            </p>

                                            <form method="post" enctype="multipart/form-data">
                                                <p>
                                                    <input type="file" name="import_file" />
                                                </p>
                                                <input type="hidden" name="rankology_action" value="import_settings" />

                                                <?php wp_nonce_field('rankology_import_nonce', 'rankology_import_nonce'); ?>

                                                <button id="rankology-import-settings" type="submit" class="btn btnTertiary">
                                                    <?php esc_html_e('Import', 'wp-rankology'); ?>
                                                </button>

                                                <?php if (! empty($_GET['success']) && 'true' == htmlspecialchars($_GET['success'])) {
                                                    echo '<div class="log" style="display:block"><div class="rankology-notice is-success"><p>' . __('Import completed!', 'wp-rankology') . '</p></div></div>';
                                                } ?>
                                            </form>
                                        </div><!-- .inside -->
                                    </div><!-- .postbox -->
                                    <div class="postbox section-tool" style="display: none;">
                                        <div class="inside">
                                            <h3>
                                                <span><?php esc_html_e('Import Settings', 'wp-rankology'); ?></span>
                                            </h3>

                                            <?php
                                            $plugins = [
                                                'yoast'            => 'Yoast SEO',
                                                'aio'              => 'All In One SEO',
                                                'seo-framework'    => 'The SEO Framework',
                                                'rk'               => 'Rank Math',
                                                'squirrly'         => 'Squirrly SEO',
                                                'seo-ultimate'     => 'SEO Ultimate',
                                                'wp-meta-seo'      => 'WP Meta SEO',
                                                'premium-seo-pack' => 'Premium SEO Pack',
                                                'wpseo'            => 'wpSEO',
                                                'platinum-seo'     => 'Platinum SEO Pack',
                                                'smart-crawl'      => 'SmartCrawl',
                                                'rankologyor'       => 'Rankologyor',
                                                'slim-seo'         => 'Slim SEO'
                                            ];

                                            echo '<p>
                    <select id="select-wizard-import" name="select-wizard-import">
                        <option value="none">' . __('Select an option', 'wp-rankology') . '</option>';

                                            foreach ($plugins as $plugin => $name) {
                                                echo '<option value="' . $plugin . '-migration-tool">' . $name . '</option>';
                                            }
                                            echo '</select>
                        </p>

                    <p class="description">' . __('You don\'t have to enable the selected SEO plugin to run the import.', 'wp-rankology') . '</p>';

                                            foreach ($plugins as $plugin => $name) {
                                                echo rankology_migration_tool($plugin, $name);
                                            } ?>
                                        </div>
                                    </div>
                                <?php }
                                if ($activeState == 3) {
                                    include_once 'imp_exp_redirections.php';
                                    do_action('rankology_redirections_sections');

                                    //do_settings_sections('rankology-settings-admin-advanced-advanced');
                                    //rkseo_submit_button(__('Save changes', 'wp-rankology'));
                                }
                                if ($activeState == 4) {
                                     if ('1' === rankology_get_toggle_option('xml-sitemap') && '1' === rankology_get_service('SitemapOption')->isEnabled() && method_exists(rankology_fno_get_service('SitemapOptionPro'), 'getSitemapVideoEnable') && '1' === rankology_fno_get_service('SitemapOptionPro')->getSitemapVideoEnable()) { ?>
                                        <div class="postbox section-tool">
                                            <div class="rkseo-section-header">
                                                <h2>
                                                    <?php esc_html_e('Video XML sitemap', 'wp-rankology'); ?>
                                                </h2>
                                            </div>
                                            <div class="inside">
                                                <h3>
                                                    <?php esc_html_e('Add YouTube videos to the XML Video sitemap', 'wp-rankology'); ?>
                                                </h3>
                                                <p><?php esc_html_e('Click the button below to automatically scan all your content for YouTube URL and add them to the video XML sitemap. We automatically add YouTube videos each time you save a post.', 'wp-rankology'); ?></p>

                                                <p>
                                                    <a href="<?php echo get_option('home'); ?>/video1.xml" target="_blank">
                                                        <?php esc_html_e('Open Video Sitemap', 'wp-rankology'); ?>
                                                    </a>
                                                    <span class="dashicons dashicons-redo"></span>
                                                </p>

                                                <p>
                                                    <button id="rankology-video-regenerate" type="button"
                                                            class="btn btnTertiary"><?php esc_html_e('Regenerate', 'wp-rankology'); ?></button>
                                                    <span class="spinner"></span>
                                                <div class="log"></div>
                                                </p>
                                            </div>
                                        </div>
                                    <?php } else { ?>
                                        <div class="rankology-notice is-warning">
                                            <p><?php esc_html_e('XML Video sitemap feature is disabled. Please activate it from the <strong>XML sitemaps settings page</strong>.', 'wp-rankology'); ?>
                                            </p>
                                            <p>
                                                <a href="<?php echo admin_url('admin.php?page=rankology-xml-sitemap'); ?>"
                                                   class="btn btnTertiary">
                                                    <?php esc_html_e('Activate XML Video sitemap', 'wp-rankology'); ?>
                                                </a>
                                            </p>
                                        </div>
                                    <?php } ?>

                                <?php

                                }
                                if ($activeState == 5) { ?>
                                    <div class="postbox section-tool">
                                        <div class="rkseo-section-header">
                                            <h2>
                                                <?php esc_html_e('Cleaning', 'wp-rankology'); ?>
                                            </h2>
                                        </div>
                                        <div class="inside">
                                            <h3>
                                                <span><?php esc_html_e('Clean content scans', 'wp-rankology'); ?></span>
                                            </h3>

                                            <p><?php esc_html_e('By clicking Delete content scans, all content analysis will be deleted from your database.', 'wp-rankology'); ?></p>

                                            <form method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="rankology_action" value="clean_content_scans" />
                                                <?php wp_nonce_field('rankology_clean_content_scans_nonce', 'rankology_clean_content_scans_nonce'); ?>
                                                <?php rkseo_submit_button(__('Delete content scans', 'wp-rankology'), 'btn btnTertiary'); ?>
                                            </form>
                                        </div><!-- .inside -->
                                    </div><!-- .postbox -->

                                    <div class="postbox section-tool">
                                        <div class="rkseo-section-header">
                                            <h2>
                                                <?php esc_html_e('Reset', 'wp-rankology'); ?>
                                            </h2>
                                        </div>
                                        <div class="inside">
                                            <h3>
                                                <span><?php esc_html_e('Reset All Notices From Notifications Center', 'wp-rankology'); ?></span>
                                            </h3>

                                            <p><?php esc_html_e('By clicking Reset Notices, all notices in the notifications center will be set to their initial status.', 'wp-rankology'); ?></p>

                                            <form method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="rankology_action" value="reset_notices_settings" />
                                                <?php wp_nonce_field('rankology_reset_notices_nonce', 'rankology_reset_notices_nonce'); ?>
                                                <?php rkseo_submit_button(__('Reset notices', 'wp-rankology'), 'btn btnTertiary'); ?>
                                            </form>
                                        </div><!-- .inside -->
                                    </div><!-- .postbox -->

                                    <div class="postbox section-tool">
                                        <div class="inside">
                                            <h3><?php esc_html_e('Reset All Settings', 'wp-rankology'); ?></h3>

                                            <div class="rankology-notice is-warning">
                                                <p><?php esc_html_e('<strong>WARNING:</strong> Delete all options related to this plugin in your database.', 'wp-rankology'); ?></p>
                                            </div>

                                            <form method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="rankology_action" value="reset_settings" />
                                                <?php wp_nonce_field('rankology_reset_nonce', 'rankology_reset_nonce'); ?>
                                                <?php rkseo_submit_button(__('Reset settings', 'wp-rankology'), 'btn btnTertiary is-deletable'); ?>
                                            </form>
                                        </div><!-- .inside -->
                                    </div><!-- .postbox -->
                               <?php }

                                ?>
                            </div>
                            <?php $activeState++;
                        } ?>
                    </div>
                </div>
            </div>

        </div>

    </div>
<?php
