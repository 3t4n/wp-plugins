<?php
// To prevent calling the plugin directly
if (!function_exists('add_action')) {
    echo 'Please don&rsquo;t call the plugin directly. Thanks :)';
    exit;
}
?>

<?php

// function plugin_settings_pages()
//     {
?>
    <div class="rankology-plugin-wrapper">
<!--        <h1>--><?php //esc_html_e('SEO Settings', 'wp-rankology'); ?><!--</h1>-->
        <div class="rankology-main-page">


            <?php
            // Get features list with filter
            $features = apply_filters('rankology_all_features_list_callback', []);

            //$features = apply_filters('rankology_features_list_before_tools', []);

            ?>
            <!-- Main Tabs -->

            <div class="rankology-main-tabs rankology-tabs">
                <ul class="list-rankology-title">
                    <li class=""><?php esc_html_e('Rankology', 'wp-rankology'); ?>
                    </li>
                </ul>
                <ul>

                    <?php
                    $activeTab = 0; // Initialize active tab counter
                    foreach ($features as $key => $value) {
                        if ($key != 'bot' && $key != 'tools') :

                            ?>
                            <li class="rankology-parent-tabs <?php echo ($activeTab === 0) ? 'active' : ''; ?>"
                                data-tab="<?php echo esc_attr($key); ?>"
                                data-title="<?php echo esc_attr($value['title']); ?>">
                                <?php echo esc_html($value['title']); ?>
                            </li>

                        <?php

                        endif; ?>

                        <?php $activeTab++; // Increment to switch active tab
                        ?>

                        <?php

                    } ?>
                </ul>
            </div>

            <?php
            // Reset active tab for content display
            $activeTab = 0;

            foreach ($features as $key => $value) {

                ?>
                <!-- Tab Content -->
                <div id="<?php echo esc_attr($key); ?>"
                     class="rankology-tabs-content rankology-contents <?php echo ($activeTab === 0) ? 'active' : ''; ?>"
                     data-titles="<?php echo esc_attr($value['title']); ?>">
                    <?php
                    // Include tab content dynamically
                    render_tab_content($key);
                    ?>
                </div>
                <?php $activeTab++; // Increment to switch active tab ?>
            <?php } ?>

        </div>
    </div>

<?php
// Helper function to render content for each tab
function render_tab_content($features)
{

    // Use conditional logic to load specific content for each tab.
    switch ($features) {
        case 'titles':
            (new rankology_options())->rankology_titles_page();
            break;
        case 'social':
            (new rankology_options())->rankology_social_page();

            break;
        case 'xml-sitemap':
            (new rankology_options())->rankology_xml_sitemap_page();
            break;
        case 'google-analytics':
            (new rankology_options())->rankology_google_analytics_page();
            break;
        case 'instant-indexing':
            (new rankology_options())->rankology_instant_indexing_page();
            break;
        case 'metaboxes':
            (new rankology_options())->rankology_advanced_page();
            break;
        case 'advanced':
            (new rankology_options())->rankology_imageseo_page();
            break;
        case 'import-export':

            (new rankology_options())->rankology_import_export_page();
            break;

        case 'rich-snippets':
            (new rankology_options())->rankology_schemas_page();
            break;
        case '404':

            (new rankology_options())->rankology_redirections_page();
            break;
        case 'stats-settings':

            (new rankology_options())->rankology_stats_settings_page();
            break;
        case 'breadcrumbs':
            (new rankology_options())->rankology_breadcrums_page();
            break;
        case 'inspect-url':
            (new rankology_options())->rankology_inspecturl();
            break;
        case 'news':
            (new rankology_options())->rankology_googlenews();
            break;
        case 'woocommerce':
            (new rankology_options())->rankology_woocommerce();
            break;
        case 'ai':
            (new rankology_options())->rankology_ai();
            break;
        case 'rss':

            (new rankology_options())->rankology_rss();
            break;
        case 'robots':

            (new rankology_options())->rankology_robots();
            break;
        case 'htaccess':

            (new rankology_options())->rankology_htaccess();
            break;
        case 'page-speed':

            (new rankology_options())->rankology_pagespeed();
            break;


        // Add more cases for each tab
        // default:
        // Default content for other tabs
        //include_once plugin_dir_path(__FILE__) . 'admin-pages/DefaultTab.php';
        //   break;
    }
}

?>

<?php
// }
