<div class="panel panel-primary mt20">
    <?php if (isset($api_key)): ?>
        <form method="post">
            <input type="hidden" name="e2wl_api_key" value="<?php echo esc_attr($api_key["id"]); ?>"/>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 mb20">
                        <a class="btn" href="<?php echo esc_url(admin_url('admin.php?page=e2wl_setting&subpage=chrome_api')); ?>"><span class="dashicons dashicons-arrow-left-alt2"></span><?php _e('Back to list', 'dropshipping-with-ebay-for-woocommerce');?></a>
                    </div>
                    <div class="col-xs-12 form-group input-block no-margin clearfix" style="display: flex;align-items: center;">
                        <div style="width:100px">
                            <label for="e2wl_api_key_name">
                                <strong><?php _e('Name', 'dropshipping-with-ebay-for-woocommerce');?></strong>
                            </label>
                            <div class="info-box" data-toggle="tooltip" title="<?php _ex('Friendly name for identifying this key.', 'setting description', 'dropshipping-with-ebay-for-woocommerce');?>"></div>
                        </div>
                        <div style="flex:1">
                            <input type="text" class="form-control medium-input" id="e2wl_api_key_name" name="e2wl_api_key_name" value="<?php echo esc_attr($api_key["name"]); ?>"/>
                        </div>
                    </div>

                    <div class="col-xs-12 form-group input-block no-margin clearfix" style="display: flex;align-items: center;"">
                        <div style="width:100px">
                            <label>
                                <strong><?php _e('URL', 'dropshipping-with-ebay-for-woocommerce');?></strong>
                            </label>
                            <div class="info-box" data-toggle="tooltip" title="<?php _ex('Use this URL in your eBay2woo chrome extension settings.', 'setting description', 'dropshipping-with-ebay-for-woocommerce');?>"></div>
                        </div>
                        <div id="<?php echo esc_attr($api_key["id"]); ?>" style="flex:1">
                            <input type="text" readonly class="form-control medium-input" id="e2wl_api_key_url_<?php echo esc_attr($api_key["id"]); ?>" name="e2wl_api_key_url" value="<?php echo esc_url(site_url("?e2w-key=" . $api_key["id"])); ?>"/>
                            <a class="btn e2wl_api_key_url_copy" href="#"><span class="dashicons dashicons-admin-page"></span><?php _e('Copy to clipboard', 'dropshipping-with-ebay-for-woocommerce');?></a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="container-fluid">
                <div class="row pt20 border-top">
                    <div class="col-sm-12">
                        <input class="btn btn-success js-key-submit" type="submit" value="<?php _e('Save changes', 'dropshipping-with-ebay-for-woocommerce');?>"/>
                        <?php if (!$is_new_api_key): ?><a href="<?php echo esc_url(admin_url('admin.php?page=e2wl_setting&subpage=chrome_api&delete-key=' . $api_key["id"])); ?>" class="btn btn-remove e2wl-api-key-delete"/><?php _e('Revoke key', 'dropshipping-with-ebay-for-woocommerce');?></a><?php endif;?>
                    </div>
                </div>
            </div>
        </form>
    <?php else: ?>
        <div class="panel-heading">
            <div class="row">
                <div class="col-sm-12 vertical-center">
                    <h3 class="display-inline"><?php _ex('API keys', 'Setting title', 'dropshipping-with-ebay-for-woocommerce');?></h3>
                    <a class="btn btn-primary ml20" href="<?php echo esc_url(admin_url('admin.php?page=e2wl_setting&subpage=chrome_api&edit-key')); ?>"><?php _e('Add key', 'dropshipping-with-ebay-for-woocommerce');?></a>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <?php foreach ($api_keys as $api_key): ?>
                <div class="row pt20 border-bottom">
                    <div class="col-sm-12 e2wl-row-with-actions">
                        <div class="input-block no-margin clearfix vertical-center">
                            <b><?php echo esc_html($api_key['name']); ?></b>
                            <div id="<?php echo esc_attr($api_key["id"]); ?>" class="ml20 vertical-center" style="min-width:520px;">
                                <input type="text" readonly class="form-control medium-input" id="e2wl_api_key_url_<?php echo esc_attr($api_key["id"]); ?>" name="e2wl_api_key_url" value="<?php echo esc_url(site_url("?e2w-key=" . $api_key["id"])); ?>"/>
                                <a class="btn e2wl_api_key_url_copy" href="#"><span class="dashicons dashicons-admin-page"></span><?php _e('Copy to clipboard', 'dropshipping-with-ebay-for-woocommerce');?></a>
                            </div>
                        </div>
                        <div class="e2wl-row-actions">
                            <span>KEY: <?php echo esc_html($api_key['id']); ?></span> |
                            <a class="" href="<?php echo esc_url(admin_url('admin.php?page=e2wl_setting&subpage=chrome_api&edit-key=' . $api_key["id"])); ?>"><?php _e('View/Edit', 'dropshipping-with-ebay-for-woocommerce');?></a> |
                            <a class="btn-remove e2wl-api-key-delete" href="<?php echo esc_url(admin_url('admin.php?page=e2wl_setting&subpage=chrome_api&delete-key=' . $api_key["id"])); ?>"><?php _e('Revoke key', 'dropshipping-with-ebay-for-woocommerce');?></a>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>

    <?php endif;?>

</div>


<script>
    (function ($) {
        $(".e2wl_api_key_url_copy").click(function () {
            var copyText = document.getElementById("e2wl_api_key_url_"+$(this).parent().attr('id'));
            copyText.select();
            document.execCommand("copy");
            return false;
        });

        $(".e2wl-api-key-delete").click(function () {
            return confirm('Are you sure you want to Revoke the key');
        });
    })(jQuery);
</script>
