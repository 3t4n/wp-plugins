<?php
defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

$this->options = get_option('rankology_instant_indexing_option_namewoo');
if (function_exists('rankology_admin_header')) {
    echo rankology_admin_header();
} ?>
    <form method="post"
          action="<?php echo admin_url('options.php'); ?>"
          class="rankology-option rankology-form-heading">
        <?php
        echo $this->rankology_feature_title('woocommerce');
        settings_fields('rankology_instant_indexing_option_groupwoo'); ?>
        <div class="rankology-sub-tabs">
            <?php $current_tab = 'tab_rankology_metaboxes_appearance';
            $plugin_settings_tabs = [
                'tab_rankology_woocommerce' => __('Woocommerce', 'wp-rankology'),
            ]; ?>

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
                                if ($activeState == 1) { ?>

                                    <?php //if (is_plugin_active('woocommerce/woocommerce.php')) { ?>
                                    <?php do_settings_sections('rankology-settings-admin-woocommerce');
                                    rkseo_submit_button(__('Save changes', 'wp-rankology'));
                                    ?>
                                    <?php // } else {
                                  //  echo '<h4>';
                                   // esc_html_e('WooCommerce Not Activate.', 'wp-rankology');
                                    //echo '</h4>';
                                 //     }
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
