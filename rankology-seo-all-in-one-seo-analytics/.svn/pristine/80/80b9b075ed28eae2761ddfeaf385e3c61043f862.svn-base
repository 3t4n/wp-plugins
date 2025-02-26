<?php
$this->options = get_option('rankology_fno_option_namer');
if (function_exists('rankology_admin_header')) {
    echo rankology_admin_header();
}
?>

    <form method="post" action="<?php echo admin_url('options.php'); ?>"
          class="rankology-option rankology-form-heading">
        <?php
        $current_tab = ' ';
        echo $this->rankology_feature_title('404');
        settings_fields('rankology_fno_option_groupr');
        ?>

        <div class="rankology-sub-tabs">
            <?php
            $plugin_settings_tabs = [
                'tab_rankology_404' => __('Redirections / 404', 'wp-rankology'),
                'tab_rankology_brokenlinks' => __('Broken links', 'wp-rankology'),

            ];
            ?>
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
                                    do_settings_sections('rankology-settings-admin-monitor-404');
                                    rkseo_submit_button(__('Save changes', 'wp-rankology'));
                                }
                                if ($activeState == 2) {
                                    ?>
                                    <a href="<?php echo home_url() ?>/wp-admin/edit.php?post_type=rankology_bot"
                                       class="btn btnPrimary">
                                        View your Broken Links </a>
                                    <?php

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