<div class="wrap">
    <?php if ($action == 'add'): ?>
        <div id="add-integration-config">

            <form action="options.php" method="post">
                <?php
                settings_fields(Attr4ce_Constants::OPTION_GROUP_INTEGRATION_CONFIGS);

                do_settings_sections(Attr4ce_Constants::PAGE_INTEGRATION_CONFIGS);
                ?>
                <div style="overflow: hidden;">
                    <div style="float: left; margin-right: 20px">
                        <p class="submit">
                            <button type="button" class="button media-button" onclick="window.location.href='<?php echo esc_url(admin_url(Attr4ce_IntegrationConfigs::PAGE_ATTRACE_INTEGRATION_CONFIGS)) ?>'"><?php _e('Cancel', 'attrace'); ?></button>
                        </p>
                    </div>
                    <?php
                    wp_nonce_field('acme-settings-save', 'acme-custom-message');
                    ?>
                    <div style="float: left;">
                        <?php
                        submit_button(__('Submit', 'attrace').' »');
                        ?>
                    </div>
                    <div style="clear: both"></div>
                </div>
            </form>

        </div>
    <?php else: ?>
        <div id="integration-config-overview">
            <h1 class="wp-heading-inline"> <?php _e('Integrations', 'attrace'); ?></h1>
            <a href="<?php echo esc_url(admin_url(Attr4ce_IntegrationConfigs::PAGE_ATTRACE_ADD_INTEGRATION_CONFIG)) ?>" class="page-title-action"><?php _e('Add New', 'attrace'); ?></a>
            <hr class="wp-header-end">
            <ul class="subsubsub">
            </ul>
            <?php
            $integrationconfigTable->prepare_items();
            $integrationconfigTable->display();
            ?>


        </div>
    <?php endif; ?>
</div>
