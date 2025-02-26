<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

function rankology_print_pre_section($key)
{

    $breadcrumbs_desc = __('Configure your breadcrumbs, using schema.org markup, helps to appear in Google\'s search results.', 'wp-rankology') . '
    <a class="rankology-help" href="https://developers.google.com/search/docs/data-types/breadcrumb" target="_blank" title="' . __('Google developers website (new window)', 'wp-rankology') . '">
    ' . __('Lean more on Google developers website', 'wp-rankology') . '
    </a>
    <span class="rankology-help dashicons dashicons-redo"></span>';

    $sections = [
        'rich-snippets'=> [
            'toggle' => 1,
            'title'  => __('Structured Data Types (schema.org)', 'wp-rankology'),
            'desc'   => __('Add Structured Data Types support, and get better Google Search Results.'),
        ],
        'page-speed'=> [
            'title' => __('PageSpeed Insights', 'wp-rankology'),
            'desc'  => __('Check your site performance with Google PageSpeed Insights.', 'wp-rankology'),
        ],
        'inspect-url'=> [
            'toggle' => 1,
            'title' => __('Google Search Console', 'wp-rankology'),
            'desc'  => __('Get insights from your post / page / post type list with clicks, positions, CTR and impressions.', 'wp-rankology'),
        ],
        'robots'=> [
            'toggle' => 1,
            'title'  => __('robots.txt', 'wp-rankology'),
            'desc'   => __('Configure your virtual robots.txt file.', 'wp-rankology'),
        ],
        'news'=> [
            'toggle' => 1,
            'title'  => __('Google News', 'wp-rankology'),
            'desc'   => __('Enable your Google News Sitemap.', 'wp-rankology'),
        ],
        'woocommerce'=> [
            'toggle' => 1,
            'title'  => __('Woocommerce', 'wp-rankology'),
            'desc'   => __('Enable woocommerce product settings.', 'wp-rankology'),
        ],
        '404'=> [
            'toggle' => 1,
            'title'  => __('404 monitoring / Redirections', 'wp-rankology'),
            'desc'   => __('Monitor 404 urls in your Dashboard. Crawlers like robots OR spiders will be automatically exclude (e.g. Google Bot, Yahoo, Bing).', 'wp-rankology'),
        ],
        'htaccess'=> [
            'title' => __('.htaccess', 'wp-rankology'),
            'desc'  => __('Edit your htaccess file.', 'wp-rankology'),
        ],
        'rss'=> [
            'title' => __('RSS feeds', 'wp-rankology'),
            'desc'  => sprintf(__('Configure WordPress default feeds. <br><br><a href="%s" class="btn btnTertiary" target="_blank">View my RSS feed</a>', 'wp-rankology'), get_home_url() . '/feed'),
        ],
        'rewrite'=> [
            'toggle' => 1,
            'title'  => __('Rewrite', 'wp-rankology'),
            'desc'   => sprintf(__('Change the URL rewriting. To remove the <strong>/category/</strong> or <strong>/product-category/</strong> in URL, <a href="%s">click here</a>.', 'wp-rankology'), admin_url('admin.php?page=rankology-advanced')),
        ],
        'white-label'=> [
            'toggle' => 1,
            'title'  => __('White Label', 'wp-rankology'),
            'desc'   => __('Enable White Label.', 'wp-rankology'),
        ],
        'breadcrumbs'=> [
            'toggle' => 1,
            'title'  => __('Breadcrumbs', 'wp-rankology'),
            'desc'   => $breadcrumbs_desc,
        ],
        'ai'=> [
            'toggle' => 1,
            'title'  => __('AI Content', 'wp-rankology'),
            'desc'   => __('Use the power of <strong>OpenAI</strong> to improve your content.', 'wp-rankology'),
        ],
    ];

    if (! empty($sections)) {
        if ('1' == rankology_get_toggle_option($key)) {
            $rankology_get_toggle_option = '1';
        } else {
            $rankology_get_toggle_option = '0';
        } ?>
<div class="rkseo-section-header">
    <h2><?php echo $sections[$key]['title']; ?>
    </h2>
    <?php if (! empty($sections[$key]['toggle']) && 1 == $sections[$key]['toggle']) { ?>
    <div class="wrap-toggle-checkboxes">
        <input type="checkbox" name="toggle-<?php echo $key; ?>"
            id="toggle-<?php echo $key; ?>" class="toggle"
            data-toggle="<?php echo $rankology_get_toggle_option; ?>">
        <label for="toggle-<?php echo $key; ?>"></label>

        <?php
        if ('1' == $rankology_get_toggle_option) { ?>
            <span id="<?php echo $key; ?>-state-default"
                class="feature-state">
                <?php esc_html_e('Click to disable this feature', 'wp-rankology'); ?>
            </span>
            <span id="<?php echo $key; ?>-state"
                class="feature-state feature-state-off">
                <?php esc_html_e('Click to enable this feature', 'wp-rankology'); ?>
            </span>
            <?php } else { ?>
            <span id="<?php echo $key; ?>-state-default"
                class="feature-state">
                <?php esc_html_e('Click to enable this feature', 'wp-rankology'); ?>
            </span>
            <span id="<?php echo $key; ?>-state"
                class="feature-state feature-state-off">
                <?php esc_html_e('Click to disable this feature', 'wp-rankology'); ?>
            </span>
        <?php }
        ?>
    </div>
    <?php } ?>
</div>

<p><?php echo $sections[$key]['desc']; ?></p>

<p><?php if (isset($sections[$key]['alert'])) {
    echo '<div class="rankology-notice"><p>' . $sections[$key]['alert'] . '</p></div>';
    } ?>
</p>
<?php
    }
}
