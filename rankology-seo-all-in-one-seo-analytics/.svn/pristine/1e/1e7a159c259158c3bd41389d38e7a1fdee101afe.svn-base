<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

function rankology_robots_enable_callback() {
    if (is_network_admin() && is_multisite()) {
        $options = get_option('rankology_fno_mu_option_name');

        $check = isset($options['rankology_mu_robots_enable']); ?>

<label for="rankology_mu_robots_enable">
    <input id="rankology_mu_robots_enable" name="rankology_fno_mu_option_name[rankology_mu_robots_enable]" type="checkbox"
        <?php if ('1' == $check) { ?>
    checked="yes"
    <?php } ?>
    value="1"/>

    <?php esc_html_e('Enable robots.txt virtual file', 'wp-rankology'); ?>
</label>

<?php if (isset($options['rankology_mu_robots_enable'])) {
            esc_attr($options['rankology_mu_robots_enable']);
        }
    } else {
        $options = get_option('rankology_instant_indexing_option_namerobot');

        $check = isset($options['rankology_robots_enable']); ?>

<label for="rankology_robots_enable">
    <input id="rankology_robots_enable" name="rankology_instant_indexing_option_namerobot[rankology_robots_enable]" type="checkbox" <?php if ('1' == $check) { ?>
    checked="yes"
    <?php } ?>
    value="1"/>

    <?php esc_html_e('Enable robots.txt virtual file', 'wp-rankology'); ?>
</label>

<?php if (isset($options['rankology_robots_enable'])) {
            esc_attr($options['rankology_robots_enable']);
        }
    }
}

function rankology_robots_file_callback() {

    if (defined('RANKOLOGY_BLOCK_ROBOTS') && RANKOLOGY_BLOCK_ROBOTS == true) { ?>
<div class="rankology-notice is-error">
    <p>
        <?php esc_html_e('Access not allowed by the PHP define.', 'wp-rankology'); ?>
    </p>
</div>
<?php } else {
        if (is_network_admin() && is_multisite()) {
            $options = get_option('rankology_fno_mu_option_name');
            $check   = isset($options['rankology_mu_robots_file']) ? $options['rankology_mu_robots_file'] : null;

            printf(
            '<textarea id="rankology_mu_robots_file" class="rankology_robots_file" name="rankology_fno_mu_option_name[rankology_mu_robots_file]" rows="15" aria-label="' . __('Virtual Robots.txt file', 'wp-rankology') . '" placeholder="' . esc_html__('This is your robots.txt file!', 'wp-rankology') . '">%s</textarea>',
            esc_html($check)
            );
        } else {
            $options = get_option('rankology_instant_indexing_option_namerobot');
            $check   = isset($options['rankology_robots_file']) ? $options['rankology_robots_file'] : null;

            printf(
            '<textarea id="rankology_robots_file" class="rankology_robots_file" name="rankology_instant_indexing_option_namerobot[rankology_robots_file]" rows="15" aria-label="' . __('Virtual Robots.txt file', 'wp-rankology') . '" placeholder="' . esc_html__('This is your robots.txt file!', 'wp-rankology') . '">%s</textarea>',
            esc_html($check)
            );
        } ?>
<div class="wrap-tags">
    <button type="button" class="btn btnSecondary tag-title" id="rankology-tag-robots-9" data-tag="User-agent: *
Disallow: /*add-to-cart=*"><span class="dashicons dashicons-tag"></span><?php esc_html_e('Block add-to-cart links (WooCommerce)', 'wp-rankology'); ?></button>

    <button type="button" class="btn btnSecondary tag-title" id="rankology-tag-robots-8" data-tag="​User-agent: *
Disallow: /feed/
Disallow: */feed
Disallow: */feed$
Disallow: /feed/$
Disallow: /comments/feed
Disallow: /?feed=
Disallow: /wp-feed"><span class="dashicons dashicons-tag"></span><?php esc_html_e('Block RSS feeds', 'wp-rankology'); ?></button>

    <button type="button" class="btn btnSecondary tag-title" id="rankology-tag-robots-10" data-tag="User-agent: CCBot
Disallow: /"><span class="dashicons dashicons-tag"></span><?php esc_html_e('Block ChatGPT bot', 'wp-rankology'); ?></button>

    <button type="button" class="btn btnSecondary tag-title" id="rankology-tag-robots-11" data-tag="User-agent: PetalBot
Disallow: /"><span class="dashicons dashicons-tag"></span><?php esc_html_e('Block Petal bot', 'wp-rankology'); ?></button>

    <button type="button" class="btn btnSecondary tag-title" id="rankology-tag-robots-1" data-tag="User-agent: SemrushBot
Disallow: /
User-agent: SemrushBot-SA
Disallow: /"><span class="dashicons dashicons-tag"></span><?php esc_html_e('Block SemrushBot', 'wp-rankology'); ?></button>

    <button type="button" class="btn btnSecondary tag-title" id="rankology-tag-robots-2" data-tag="User-agent: MJ12bot
Disallow: /"><span class="dashicons dashicons-tag"></span><?php esc_html_e('Block MajesticSEOBot', 'wp-rankology'); ?></button>

    <button type="button" class="btn btnSecondary tag-title" id="rankology-tag-robots-7" data-tag="User-agent: AhrefsBot
Disallow: /"><span class="dashicons dashicons-tag"></span><?php esc_html_e('Block AhrefsBot', 'wp-rankology'); ?></button>

    <button type="button" class="btn btnSecondary tag-title" id="rankology-tag-robots-3" data-tag="Sitemap: <?php echo get_home_url(); ?>/sitemaps.xml"><span
            class="dashicons dashicons-tag"></span><?php esc_html_e('Link to your sitemap', 'wp-rankology'); ?></button>

    <button type="button" class="btn btnSecondary tag-title" id="rankology-tag-robots-4" data-tag="User-agent: Mediapartners-Google
Disallow: "><span class="dashicons dashicons-tag"></span><?php esc_html_e('Allow Google AdSense bot', 'wp-rankology'); ?></button>

    <button type="button" class="btn btnSecondary tag-title" id="rankology-tag-robots-5" data-tag="User-agent: Googlebot-Image
Disallow: "><span class="dashicons dashicons-tag"></span><?php esc_html_e('Allow Google Image bot', 'wp-rankology'); ?></button>

    <button type="button" class="btn btnSecondary tag-title" id="rankology-tag-robots-6" data-tag="User-agent: *
Disallow: /wp-admin/
Allow: /wp-admin/admin-ajax.php"><span class="dashicons dashicons-tag"></span><?php esc_html_e('Default WP rules', 'wp-rankology'); ?></button>

</div>
<?php
    }
}
