<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

function rkseo_print_section_info_news() {
   // rankology_print_pre_section('news');

    if ('1' !== rankology_get_service('SitemapOption')->isEnabled() || '1' !== rankology_get_toggle_option('xml-sitemap')) { ?>
        <div class="rankology-notice is-error">
            <p>
                <?php esc_html_e('You need to enable XML Sitemap feature, in order to use Google News Sitemap.', 'wp-rankology'); ?>
                <a href="<?php echo admin_url('admin.php?page=rankology-xml-sitemap'); ?>">
                    <?php esc_html_e('Change this settings', 'wp-rankology'); ?>
                </a>
            </p>
        </div>
    <?php
    } ?>

    <p>
        <pre><span class="dashicons dashicons-redo"></span><a href="<?php echo get_option('home'); ?>/news.xml" target="_blank"><?php echo get_option('home'); ?>/news.xml</a></pre>
    </p>

    <div class="rankology-notice">
        <p>
            <?php esc_html_e('<strong>Noindex content will not be displayed in Sitemaps. Same for custom canonical URLs</strong>.', 'wp-rankology'); ?>
        </p>
    </div>

<?php
}
