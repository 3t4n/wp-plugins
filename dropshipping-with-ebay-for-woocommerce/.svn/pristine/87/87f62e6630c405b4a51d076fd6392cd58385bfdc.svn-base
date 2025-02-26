<form method="post">
    <input type="hidden" name="setting_form" value="1"/>
    <div class="account_options<?php if ($account->custom_account): ?> custom_account<?php endif;?> account_type_<?php echo esc_attr($account->account_type); ?>">
        <div class="panel panel-primary mt20">
            <div class="panel-heading">
                <h3 class="display-inline"><?php _ex('Account settings', 'Setting title', 'dropshipping-with-ebay-for-woocommerce');?></h3>
            </div>
            <div class="panel-body">
                <div class="row" style="display:none">
                    <div class="col-xs-12 col-sm-4">
                        <label>
                            <strong><?php _ex('Use custom account', 'dropshipping-with-ebay-for-woocommerce');?></strong>
                        </label>
                        <div class="info-box" data-toggle="tooltip" title="<?php _ex('You can use your own Ebay API Keys if needed', 'setting description', 'dropshipping-with-ebay-for-woocommerce');?>"></div>
                    </div>
                    <div class="col-xs-12 col-sm-8">
                        <div class="form-group input-block no-margin clearfix">
                            <input type="checkbox" class="form-control float-left mr20" id="e2wl_use_custom_account" name="e2wl_use_custom_account" value="yes" <?php if ($account->custom_account): ?>checked<?php endif;?>/>
                            <div class="default_account">
                                <?php _ex('You are using default account', 'dropshipping-with-ebay-for-woocommerce');?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row account_fields">
                    <div class="col-sm-4">
                        <label for="e2wl_app_id">
                            <strong><?php _ex('Client ID', 'dropshipping-with-ebay-for-woocommerce');?></strong>
                        </label>
                        <div class="info-box" data-toggle="tooltip" title="<?php _ex('When you create the App, the Ebay open platform will generate an Client ID and Client Secret', 'setting description', 'dropshipping-with-ebay-for-woocommerce');?>"></div>
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group input-block no-margin">
                            <input type="text" class="form-control small-input" id="e2wl_app_id" name="e2wl_app_id" value="<?php echo esc_attr($account->account_data['app_id']) ?>"/>
                        </div>
                    </div>
                </div>
                <div class="row account_fields">
                    <div class="col-sm-4">
                        <label for="e2wl_cert_id">
                            <strong><?php _ex('Client Secret', 'dropshipping-with-ebay-for-woocommerce');?></strong>
                        </label>
                        <div class="info-box" data-toggle="tooltip" title="<?php _ex('When you create the App, the Ebay open platform will generate an Client ID and Client Secret', 'setting description', 'dropshipping-with-ebay-for-woocommerce');?>"></div>
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group input-block no-margin">
                            <input type="text" class="form-control small-input" id="e2wl_cert_id" name="e2wl_cert_id" value="<?php echo esc_attr($account->account_data['cert_id']) ?>"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-primary account_fields">
            <div class="panel-heading">
                <h3 class="display-inline"><?php _ex('Affiliate settings', 'Setting title', 'dropshipping-with-ebay-for-woocommerce');?></h3>
            </div>
            <div class="panel-body">
                <div class="row account_fields">
                    <div class="col-md-12">
                        <div class="row-comments">
                        <b>Tracking ID</b> can be any string. Please input it if you want to generate your affiliate links and earn the commission.
                        </div>
                    </div>
                </div>
                <div class="row account_fields">
                    <div class="col-sm-4">
                        <label for="e2wl_tracking_id">
                            <strong><?php _ex('Tracking Id', 'dropshipping-with-ebay-for-woocommerce');?></strong>
                        </label>
                        <div class="info-box" data-toggle="tooltip" title="<?php _ex('Specify the affiliate value obtained from your tracking partner.', 'setting description', 'dropshipping-with-ebay-for-woocommerce');?>"></div>
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group input-block no-margin">
                            <input type="text" class="form-control small-input" id="e2wl_tracking_id" name="e2wl_tracking_id" value="<?php echo esc_attr($account->account_data['tracking_id']) ?>"/>
                        </div>
                    </div>
                </div>
                <div class="row account_fields">
                    <div class="col-sm-4">
                        <label for="e2wl_network_id">
                            <strong><?php _ex('Network Id', 'dropshipping-with-ebay-for-woocommerce');?></strong>
                        </label>
                        <div class="info-box" data-toggle="tooltip" title="<?php _ex('Specifies your tracking partner for affiliate commissions.', 'setting description', 'dropshipping-with-ebay-for-woocommerce');?>"></div>
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group input-block no-margin">
                            <select class="form-control small-input" id="e2wl_network_id" name="e2wl_network_id">
                                <option value="2" <?php if ($account->account_data['network_id'] == "2"): ?>selected="selected"<?php endif;?>><?php _ex('Be Free', 'Setting option', 'dropshipping-with-ebay-for-woocommerce');?></option>
                                <option value="3" <?php if ($account->account_data['network_id'] == "3"): ?>selected="selected"<?php endif;?>><?php _ex('Affilinet', 'Setting option', 'dropshipping-with-ebay-for-woocommerce');?></option>
                                <option value="4" <?php if ($account->account_data['network_id'] == "4"): ?>selected="selected"<?php endif;?>><?php _ex('TradeDoubler', 'Setting option', 'dropshipping-with-ebay-for-woocommerce');?></option>
                                <option value="5" <?php if ($account->account_data['network_id'] == "5"): ?>selected="selected"<?php endif;?>><?php _ex('Mediaplex', 'Setting option', 'dropshipping-with-ebay-for-woocommerce');?></option>
                                <option value="6" <?php if ($account->account_data['network_id'] == "6"): ?>selected="selected"<?php endif;?>><?php _ex('DoubleClick', 'Setting option', 'dropshipping-with-ebay-for-woocommerce');?></option>
                                <option value="7" <?php if ($account->account_data['network_id'] == "7"): ?>selected="selected"<?php endif;?>><?php _ex('Allyes', 'Setting option', 'dropshipping-with-ebay-for-woocommerce');?></option>
                                <option value="8" <?php if ($account->account_data['network_id'] == "8"): ?>selected="selected"<?php endif;?>><?php _ex('BJMT', 'Setting option', 'dropshipping-with-ebay-for-woocommerce');?></option>
                                <option value="9" <?php if ($account->account_data['network_id'] == "9"): ?>selected="selected"<?php endif;?>><?php _ex('eBay Partner Network', 'Setting option', 'dropshipping-with-ebay-for-woocommerce');?></option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row account_fields">
                    <div class="col-sm-4">
                        <label for="e2wl_custom_id">
                            <strong><?php _ex('Custom Id', 'dropshipping-with-ebay-for-woocommerce');?></strong>
                        </label>
                        <div class="info-box" data-toggle="tooltip" title="<?php _ex('You can define an affiliate customId if you want an ID to monitor your marketing efforts.', 'setting description', 'dropshipping-with-ebay-for-woocommerce');?>"></div>
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group input-block no-margin">
                            <input type="text" class="form-control small-input" id="e2wl_custom_id" name="e2wl_custom_id" value="<?php echo esc_attr($account->account_data['custom_id']) ?>"/>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div class="row pt20 border-top">
        <div class="col-sm-12">
            <input class="btn btn-success js-main-submit" type="submit" value="<?php _e('Save settings', 'dropshipping-with-ebay-for-woocommerce');?>"/>
        </div>
    </div>

</form>

<script>
    (function ($) {
        $('[data-toggle="tooltip"]').tooltip({"placement": "top"});

        $("#e2wl_use_custom_account").change(function () {
            if ($(this).is(':checked')) {
                $(this).parents('.account_options').addClass('custom_account');
            } else {
                $(this).parents('.account_options').removeClass('custom_account');
            }
            return true;
        });
    })(jQuery);
</script>
