<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

function rkseo_print_section_info_breadcrumbs() {
    rankology_print_pre_section('breadcrumbs'); ?>

    <div class="rankology-notice">
        <h3><?php esc_html_e('How to install the Breadcrumbs?', 'wp-rankology'); ?></h3>

        <div id="rankology-breadcrumbs-notice">

            <div>
                <h4><?php esc_html_e('Add Shortcode', 'wp-rankology'); ?></h4>
                <p><?php esc_html_e('You can use this shortcode in your content (post, page, custom post type):', 'wp-rankology'); ?></p>

                <pre>[rankology_breadcrumbs]</pre>
            </div>

            <div>
                <h4><?php esc_html_e('PHP template', 'wp-rankology'); ?></h4>
                <p><?php esc_html_e('Copy and paste this function into your theme (e.g. header.php) to enable your breadcrumbs:', 'wp-rankology'); ?></p>

                <pre>&lt;?php if(function_exists('rankology_display_breadcrumbs')) { rankology_display_breadcrumbs(); } ?&gt;</pre>
            </div>
        </div>
    </div>

    <?php
    //Elementor
    if (did_action('elementor/loaded')) {
        ?>

        <div class="rankology-notice">
            <h3><?php esc_html_e('Elementor user?', 'wp-rankology'); ?></h3>
            <p><?php esc_html_e('We also provide a widget for <strong>Elementor users</strong> (Elementor Builder > Elements tab > Site section > Breadcrumbs widget).', 'wp-rankology'); ?></p>
        </div>

        <?php
    } ?>


    <?php
}

function rkseo_print_section_info_breadcrumbs_i18n() {
    ?>
    <hr>

    <h3><?php esc_html_e('Translations', 'wp-rankology'); ?></h3>

<?php
}

function rkseo_print_section_info_breadcrumbs_misc() {
    ?>
    <hr>

    <h3><?php esc_html_e('Misc', 'wp-rankology'); ?></h3>
<?php
}
