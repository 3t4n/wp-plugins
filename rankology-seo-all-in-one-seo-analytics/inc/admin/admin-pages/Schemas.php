<?php
$this->options = get_option('rankology_fno_option_name');

if (function_exists('rankology_admin_header')) {
    echo rankology_admin_header();
}
?>
    <form method="post" action="<?php echo admin_url('options.php'); ?>"
          class="rankology-option rankology-form-heading">
        <?php
        echo $this->rankology_feature_title('rich-snippets');
        settings_fields('rankology_fno_option_group'); ?>
        <div class="rankology-sub-tabs">
            <?php
            // Define sub-tabs for the General Settings tab
            $plugin_settings_tabs = [
                'tab_rankology_rich_snippets' => __('Structured Data Types', 'wp-rankology'),
            ];
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
                                if ($activeState == 1) {
                                    do_settings_sections('rankology-settings-admin-rich-snippets');
                                    rkseo_submit_button(__('Save changes', 'wp-rankology'));
                                }

                                ?>
                            </div>
                            <?php $activeState++;
                        } ?>
                    </div>
                </div>
            </div>

        </div>
    </form>

<?php