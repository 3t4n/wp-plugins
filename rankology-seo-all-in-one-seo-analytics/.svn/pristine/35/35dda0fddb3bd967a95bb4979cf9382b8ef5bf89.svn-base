<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

/* Add Data, Redirects and Video tabs to Tools */
add_filter('rankology_tools_tabs', 'rankology_fno_tools_tabs');
function rankology_fno_tools_tabs($plugin_settings_tabs)
{
    unset($plugin_settings_tabs['tab_rankology_tool_settings']);
    unset($plugin_settings_tabs['tab_rankology_tool_plugins']);
    unset($plugin_settings_tabs['tab_rankology_tool_reset']);

    $plugin_settings_tabs['tab_rankology_tool_data'] = __('Data', 'wp-rankology');
    $plugin_settings_tabs['tab_rankology_tool_settings'] = __('Settings', 'wp-rankology');
    $plugin_settings_tabs['tab_rankology_tool_redirects'] = __('Redirections', 'wp-rankology');
    $plugin_settings_tabs['tab_rankology_tool_video'] = __('Video sitemap', 'wp-rankology');
    $plugin_settings_tabs['tab_rankology_tool_reset'] = __('Reset', 'wp-rankology');

    return $plugin_settings_tabs;
}

/* Add CSV export to Tools page */
add_action('rankology_tools_before', 'rankology_fno_tools_before', 10, 2);
function rankology_fno_tools_before($current_tab)
{
    //if (defined('SCRIPT_DEBUG') && SCRIPT_DEBUG === true) { ?>
    <div class="rankology-tab <?php if ('tab_rankology_tool_data' == $current_tab) {
        echo 'active';
    } ?>" id="tab_rankology_tool_data">
        <?php include_once RANKOLOGY_FNO_PLUGIN_DIR_PATH . '/inc/admin/import/tools.php'; ?>
    </div>
    <?php
    //}
}

/* Add Redirection / Video sitemap to Tools page */
add_action('rankology_tools_migration', 'rankology_fno_tools_migration');
function rankology_fno_tools_migration($current_tab)
{ ?>
    <div class="rankology-tab <?php if ('tab_rankology_tool_redirects' == $current_tab) {
        echo 'active';
    } ?>" id="tab_rankology_tool_redirects">
        <?php if ('1' == rankology_get_toggle_option('404') && function_exists('rankology_get_redirection_pro_html')) {
            rankology_get_redirection_pro_html();
        } else { ?>
            <div class="rankology-notice is-warning">
                <p><?php esc_html_e('Redirections feature is disabled. Please activate it from the <strong>General Settings page</strong>.', 'wp-rankology'); ?>
                </p>
                <p>
                    <a href="<?php echo admin_url('admin.php?page=rankology-fno-page'); ?>"
                       class="btn btnSecondary">
                        <?php esc_html_e('Activate Redirections', 'wp-rankology'); ?>
                    </a>
                </p>
            </div>
        <?php } ?>
    </div>
    <div class="rankology-tab <?php if ('tab_rankology_tool_video' == $current_tab) {
        echo 'active';
    } ?>" id="tab_rankology_tool_video">
        <?php if ('1' === rankology_get_toggle_option('xml-sitemap') && '1' === rankology_get_service('SitemapOption')->isEnabled() && method_exists(rankology_fno_get_service('SitemapOptionPro'), 'getSitemapVideoEnable') && '1' === rankology_fno_get_service('SitemapOptionPro')->getSitemapVideoEnable()) { ?>
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
    </div>
    <?php
}
