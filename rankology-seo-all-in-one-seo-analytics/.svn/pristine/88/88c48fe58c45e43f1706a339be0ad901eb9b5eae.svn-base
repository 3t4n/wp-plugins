<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

$this->options = get_option('rankology_advanced_option_name');
if (function_exists('rankology_admin_header')) {
    echo rankology_admin_header();
} ?>
<form method="post"
    action="<?php echo admin_url('options.php'); ?>"
    class="rankology-option">
    <?php
        echo $this->rankology_feature_title('advanced');
settings_fields('rankology_advanced_option_group'); ?>

    <div id="rankology-tabs" class="wrap">
        <div class="rankology-tab active" id="tab_rankology_imageseo">
            <?php do_settings_sections('rankology-settings-admin-advanced-image'); ?>
        </div>
    </div>

    <?php rkseo_submit_button(__('Save changes', 'wp-rankology')); ?>
</form>
<?php
