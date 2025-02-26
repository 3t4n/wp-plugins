<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');
$this->options = get_option('rankology_fno_option_name');


if (function_exists('rankology_admin_header')) {
    echo rankology_admin_header();
}
?>
<form method="post"
    action="<?php echo admin_url('options.php'); ?>"
    class="rankology-option">
    <?php
        $current_tab = '';

        echo $this->rankology_feature_title('instant-indexing');
        settings_fields('rankology_instant_indexing_option_group');
    ?>

    <div id="rankology-tabs" class="wrap">
        <?php
        $plugin_settings_tabs = [
            'tab_rankology_instant_indexing_general' => __('URLs Indexing', 'wp-rankology'),
            'tab_rankology_instant_indexing_settings'    => __('Settings', 'wp-rankology')
        ];

    echo '<div class="nav-tab-wrapper">';
    foreach ($plugin_settings_tabs as $tab_key => $tab_caption) {
        echo '<a id="' . $tab_key . '-tab" class="nav-tab" href="?page=rankology-instant-indexing-page#tab=' . $tab_key . '">' . $tab_caption . '</a>';
    }
    echo '</div>'; ?>

    <!-- General -->
    <div class="rankology-tab <?php if ('tab_rankology_instant_indexing_general' == $current_tab) {
    echo 'active';
    } ?>" id="tab_rankology_instant_indexing_general">
        <?php do_settings_sections('rankology-settings-admin-instant-indexing'); ?>
    </div>

    <!-- Settings -->
    <div class="rankology-tab <?php if ('tab_rankology_instant_indexing_settings' == $current_tab) {
        echo 'active';
    } ?>" id="tab_rankology_instant_indexing_settings">
        <?php do_settings_sections('rankology-settings-admin-instant-indexing-settings'); ?>
    </div>

    </div>
    <!--rankology-tabs-->
    <?php echo $this->rankology_feature_save(); ?>
    <?php rkseo_submit_button(__('Save changes', 'wp-rankology')); ?>
</form>
<?php
