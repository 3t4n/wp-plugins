<form method="post">

    <input type="hidden" name="setting_form" value="1"/>
    

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="display-inline"><?php _ex('Import Settings', 'Setting title', 'dropshipping-with-ebay-for-woocommerce');?></h3>
        </div>
        <div class="panel-body">

            <div class="row">
                <div class="col-md-4">
                    <label>
                        <strong><?php _ex('Products per page', 'Setting title', 'dropshipping-with-ebay-for-woocommerce');?></strong>
                    </label>
                    <div class="info-box" data-toggle="tooltip" title="<?php _ex("Products per page, minimum 12, maximum 100", 'setting description', 'dropshipping-with-ebay-for-woocommerce');?>"></div>
                </div>
                <div class="col-md-6">
                    <div class="form-group input-block no-margin">
                        <input type="text" class="form-control small-input" id="e2wl_products_per_page" name="e2wl_products_per_page" value="<?php echo esc_attr(e2wl_get_setting('products_per_page')); ?>"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <label>
                        <strong><?php _ex('Default Site', 'Setting title', 'dropshipping-with-ebay-for-woocommerce');?></strong>
                    </label>
                    <div class="info-box" data-toggle="tooltip" title="<?php _ex("Default ebay site", 'setting description', 'dropshipping-with-ebay-for-woocommerce');?>"></div>
                </div>
                <div class="col-md-6">
                    <div class="form-group input-block no-margin">
                        <?php $default_sitecode = e2wl_get_setting('default_sitecode');?>
                        <select name="e2wl_default_sitecode" id="e2wl_default_sitecode" class="form-control small-input" style="display: inline-block;">
                            <?php foreach (E2WL_EbaySite::get_sites() as $site): ?>
                                <option value="<?php echo esc_attr($site->sitecode); ?>" <?php if ($default_sitecode == $site->sitecode): ?>selected="selected"<?php endif;?>><?php echo esc_html($site->sitename); ?></option>
                            <?php endforeach;?>
                        </select>
                        <input class="btn btn-default e2wl_update_categories" type="button" value="Update categories"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <label for="e2wl_default_product_type">
                        <strong><?php _ex('Default product type', 'Setting title', 'dropshipping-with-ebay-for-woocommerce');?></strong>
                    </label>
                    <div class="info-box" data-toggle="tooltip" title="<?php _ex("Default product type", 'setting description', 'dropshipping-with-ebay-for-woocommerce');?>"></div>
                </div>
                <div class="col-md-6">
                    <div class="form-group input-block no-margin">
                        <?php $default_product_type = e2wl_get_setting('default_product_type');?>
                        <select name="e2wl_default_product_type" id="e2wl_default_product_type" class="form-control small-input">
                            <option value="simple" <?php if ($default_product_type == "simple"): ?>selected="selected"<?php endif;?>><?php _ex('Simple/Variable Product', 'Setting option', 'dropshipping-with-ebay-for-woocommerce');?></option>
                            <option value="external" <?php if ($default_product_type == "external"): ?>selected="selected"<?php endif;?>><?php _ex('External/Affiliate Product', 'Setting option', 'dropshipping-with-ebay-for-woocommerce');?></option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <label for="e2wl_default_product_status">
                        <strong><?php _ex('Default product status', 'Setting title', 'dropshipping-with-ebay-for-woocommerce');?></strong>
                    </label>
                    <div class="info-box" data-toggle="tooltip" title="<?php _ex("Default product type", 'setting description', 'dropshipping-with-ebay-for-woocommerce');?>"></div>
                </div>
                <div class="col-md-6">
                    <div class="form-group input-block no-margin">
                        <?php $default_product_status = e2wl_get_setting('default_product_status');?>
                        <select name="e2wl_default_product_status" id="e2wl_default_product_status" class="form-control small-input">
                            <option value="publish" <?php if ($default_product_status == "publish"): ?>selected="selected"<?php endif;?>><?php _ex('Publish', 'Setting option', 'dropshipping-with-ebay-for-woocommerce');?></option>
                            <option value="draft" <?php if ($default_product_status == "draft"): ?>selected="selected"<?php endif;?>><?php _ex('Draft', 'Setting option', 'dropshipping-with-ebay-for-woocommerce');?></option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <label for="e2wl_not_import_attributes">
                        <strong><?php _ex('Not import attributes', 'dropshipping-with-ebay-for-woocommerce');?></strong>
                    </label>
                    <div class="info-box" data-toggle="tooltip" title="<?php _ex('Not import attributes', 'dropshipping-with-ebay-for-woocommerce');?>"></div>
                </div>
                <div class="col-md-6">
                    <div class="form-group input-block no-margin">
                        <input type="checkbox" class="form-control" id="e2wl_not_import_attributes" name="e2wl_not_import_attributes" value="yes" <?php if (e2wl_get_setting('not_import_attributes')): ?>checked<?php endif;?>/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <label for="e2wl_not_import_description">
                        <strong><?php _ex('Not import description', 'dropshipping-with-ebay-for-woocommerce');?></strong>
                    </label>
                    <div class="info-box" data-toggle="tooltip" title="<?php _ex('Not import description', 'dropshipping-with-ebay-for-woocommerce');?>"></div>
                </div>
                <div class="col-md-6">
                    <div class="form-group input-block no-margin">
                        <input type="checkbox" class="form-control" id="e2wl_not_import_description" name="e2wl_not_import_description" value="yes" <?php if (e2wl_get_setting('not_import_description')): ?>checked<?php endif;?>/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <label for="e2wl_not_import_description_images">
                        <strong><?php _ex("Don't import images from the description", 'dropshipping-with-ebay-for-woocommerce');?></strong>
                    </label>
                    <div class="info-box" data-toggle="tooltip" title="<?php _ex("Don't import images from the description", 'dropshipping-with-ebay-for-woocommerce');?>"></div>
                </div>
                <div class="col-md-6">
                    <div class="form-group input-block no-margin">
                        <input type="checkbox" class="form-control" id="e2wl_not_import_description_images" name="e2wl_not_import_description_images" value="yes" <?php if (e2wl_get_setting('not_import_description_images')): ?>checked<?php endif;?>/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="e2wl_сonvert_images_to_large">
                        <strong><?php _ex('Convert images to large', 'Setting title', 'dropshipping-with-ebay-for-woocommerce');?></strong>
                    </label>
                    <div class="info-box" data-toggle="tooltip" title="<?php _ex('Attempt to import images in higher resolution.', 'setting description', 'dropshipping-with-ebay-for-woocommerce');?>"></div>
                </div>
                <div class="col-md-6">
                    <div class="form-group input-block no-margin">
                        <input type="checkbox" class="form-control" id="e2wl_сonvert_images_to_large" name="e2wl_сonvert_images_to_large" value="yes" <?php if (e2wl_get_setting('сonvert_images_to_large')): ?>checked<?php endif;?>/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="e2wl_use_external_image_urls">
                        <strong><?php _ex('Use external image urls', 'Setting title', 'dropshipping-with-ebay-for-woocommerce');?></strong>
                    </label>
                    <div class="info-box" data-toggle="tooltip" title="<?php _ex('Use external image urls', 'setting description', 'dropshipping-with-ebay-for-woocommerce');?>"></div>
                </div>
                <div class="col-md-6">
                    <div class="form-group input-block no-margin">
                        <input type="checkbox" class="form-control" id="e2wl_use_external_image_urls" name="e2wl_use_external_image_urls" value="yes" <?php if (e2wl_get_setting('use_external_image_urls')): ?>checked<?php endif;?>/>
                    </div>
                    <div id="e2wl_load_external_image_block" class="form-group input-block no-margin" <?php if (e2wl_get_setting('use_external_image_urls')): ?>style="display: none;"<?php endif;?>>
                        <input class="btn btn-default load-images" disabled="disabled" type="button" value="<?php _e('Load images', 'dropshipping-with-ebay-for-woocommerce');?>"/>
                        <div id="e2wl_load_external_image_progress"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <label for="e2wl_use_random_stock">
                        <strong><?php _ex('Use random stock value', 'Setting title', 'dropshipping-with-ebay-for-woocommerce');?></strong>
                    </label>
                    <div class="info-box" data-toggle="tooltip" title="<?php _ex('Use random stock value', 'setting description', 'dropshipping-with-ebay-for-woocommerce');?>"></div>
                </div>
                <div class="col-md-6">
                    <div class="form-group input-block no-margin">
                        <input type="checkbox" class="form-control" id="e2wl_use_random_stock" name="e2wl_use_random_stock" value="yes" <?php if (e2wl_get_setting('use_random_stock')): ?>checked<?php endif;?>/>
                    </div>
                    <div id="e2wl_use_random_stock_block" class="form-group input-block no-margin" <?php if (!e2wl_get_setting('use_random_stock')): ?>style="display: none;"<?php endif;?>>
                        <?php _ex('From', 'dropshipping-with-ebay-for-woocommerce');?> <input type="text" style="max-width: 60px;" class="form-control" id="e2wl_use_random_stock_min" name="e2wl_use_random_stock_min" value="<?php echo esc_attr(e2wl_get_setting('use_random_stock_min')); ?>">
                        <?php _ex('To', 'dropshipping-with-ebay-for-woocommerce');?> <input type="text" style="max-width: 60px;" class="form-control" id="e2wl_use_random_stock_max" name="e2wl_use_random_stock_max" value="<?php echo esc_attr(e2wl_get_setting('use_random_stock_max')); ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <label for="e2wl_import_extended_variation_attribute">
                        <strong><?php _ex('Extended variation attributes', 'Setting title', 'dropshipping-with-ebay-for-woocommerce');?></strong>
                    </label>
                    <div class="info-box" data-toggle="tooltip" title="<?php _ex('Import variation attributes as product attributes', 'setting description', 'dropshipping-with-ebay-for-woocommerce');?>"></div>
                </div>
                <div class="col-md-6">
                    <div class="form-group input-block no-margin">
                        <input type="checkbox" class="form-control" id="e2wl_import_extended_variation_attribute" name="e2wl_import_extended_variation_attribute" value="yes" <?php if (e2wl_get_setting('import_extended_variation_attribute')): ?>checked<?php endif;?>/>
                    </div>
                </div>
            </div>

        </div>
    </div>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="display-inline"><?php _ex('Order Fulfillment settings', 'Setting title', 'dropshipping-with-ebay-for-woocommerce');?></h3>
		</div>
		<div class="panel-body">

			<div class="row">
				<div class="col-md-4">
					<label for="e2wl_placed_order_status">
						<strong><?php _ex('Placed Order Status', 'Setting title', 'dropshipping-with-ebay-for-woocommerce');?></strong>
					</label>
					<div class="info-box" data-toggle="tooltip" title="<?php _ex("Change the order status when the order has been placed", 'setting description', 'dropshipping-with-ebay-for-woocommerce');?>"></div>
				</div>
				<div class="col-md-6">
					<div class="form-group input-block no-margin">
						<?php $placed_order_status = e2wl_get_setting('placed_order_status');?>
						<select name="e2wl_placed_order_status" id="e2wl_placed_order_status" class="form-control small-input">
							<option value=""><?php _ex('Do nothing', 'Setting option', 'dropshipping-with-ebay-for-woocommerce');?></option>
							<?php foreach ($order_statuses as $os_key => $os_value): ?>
								<option value="<?php echo esc_attr($os_key); ?>" <?php if ($placed_order_status == $os_key): ?>selected="selected"<?php endif;?>><?php echo esc_html($os_value); ?></option>
							<?php endforeach;?>
						</select>
					</div>
				</div>
			</div>

		</div>
	</div>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="display-inline"><?php _ex('Schedule settings', 'Setting title', 'dropshipping-with-ebay-for-woocommerce');?></h3>
        </div>
        <div class="_e2wfo e2wl-info"><div>This feature is available in full version of eBay2Woo.</div><a href="https://ali2woo.com/dropshipping-plugin-ebay/" target="_blank" class="btn">GET FULL VERSOIN</a></div>
        <div class="panel-body _e2wfv">
            <?php $e2wl_auto_update = e2wl_get_setting('auto_update');?>
            <div class="row">
                <div class="col-md-4">
                    <label>
                        <strong><?php _ex('Ebay Sync', 'Setting title', 'dropshipping-with-ebay-for-woocommerce');?></strong>
                    </label>
                    <div class="info-box" data-toggle="tooltip" title="<?php _ex('Enable auto-update features', 'setting description', 'dropshipping-with-ebay-for-woocommerce');?>"></div>
                </div>
                <div class="col-md-6">
                    <div class="form-group input-block no-margin">
                        <input type="checkbox" class="form-control" id="e2wl_auto_update" name="e2wl_auto_update" value="yes" <?php if ($e2wl_auto_update): ?>checked<?php endif;?>/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <label>
                        <strong><?php _ex('Not available product status', 'Setting title', 'dropshipping-with-ebay-for-woocommerce');?></strong>
                    </label>
                    <div class="info-box" data-toggle="tooltip" title="<?php _ex('Change Product Status when the it becomes unavailable at Ebay', 'setting description', 'dropshipping-with-ebay-for-woocommerce');?>"></div>
                </div>
                <div class="col-md-6">
                    <div class="form-group input-block no-margin">
                        <?php $cur_e2wl_not_available_product_status = e2wl_get_setting('not_available_product_status');?>
                        <select class="form-control small-input" name="e2wl_not_available_product_status" id="e2wl_not_available_product_status" <?php if (!$e2wl_auto_update): ?>disabled<?php endif;?>>
                            <option value="trash" <?php if ($cur_e2wl_not_available_product_status == "trash"): ?>selected="selected"<?php endif;?>><?php _ex('Trash', 'dropshipping-with-ebay-for-woocommerce');?></option>
                            <option value="outofstock" <?php if ($cur_e2wl_not_available_product_status == "outofstock"): ?>selected="selected"<?php endif;?>><?php _ex('Out of stock', 'dropshipping-with-ebay-for-woocommerce');?></option>
                            <option value="instock" <?php if ($cur_e2wl_not_available_product_status == "instock"): ?>selected="selected"<?php endif;?>><?php _ex('In stock', 'dropshipping-with-ebay-for-woocommerce');?></option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <label>
                        <strong><?php _e('Synchronization type', 'dropshipping-with-ebay-for-woocommerce');?></strong>
                    </label>
                    <div class="info-box" data-toggle="tooltip" title="<?php _e('Synchronization type', 'dropshipping-with-ebay-for-woocommerce');?>"></div>
                </div>
                <div class="col-md-6">
                    <div class="form-group input-block no-margin">
                        <?php $cur_e2wl_sync_type = e2wl_get_setting('sync_type');?>
                        <select class="form-control small-input" name="e2wl_sync_type" id="e2wl_sync_type" <?php if (!$e2wl_auto_update): ?>disabled<?php endif;?>>
                            <option value="price_and_stock" <?php if ($cur_e2wl_sync_type == "price_and_stock"): ?>selected="selected"<?php endif;?>><?php _e('Sync price and stock', 'dropshipping-with-ebay-for-woocommerce');?></option>
                            <option value="price" <?php if ($cur_e2wl_sync_type == "price"): ?>selected="selected"<?php endif;?>><?php _e('Sync only price', 'dropshipping-with-ebay-for-woocommerce');?></option>
                            <option value="stock" <?php if ($cur_e2wl_sync_type == "stock"): ?>selected="selected"<?php endif;?>><?php _e('Sync only stock', 'dropshipping-with-ebay-for-woocommerce');?></option>
                            <option value="no" <?php if ($cur_e2wl_sync_type == "no"): ?>selected="selected"<?php endif;?>><?php _e("Don't sync prices and stock", 'dropshipping-with-ebay-for-woocommerce');?></option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="display-inline"><?php _ex('Chrome Extension settings', 'Setting title', 'dropshipping-with-ebay-for-woocommerce');?></h3>
		</div>
		<div class="panel-body">

			<div class="row">
				<div class="col-md-4">
					<label>
						<strong><?php _ex('Default shipping method', 'Setting title', 'dropshipping-with-ebay-for-woocommerce');?></strong>
					</label>
					<div class="info-box" data-toggle="tooltip" title="<?php _ex('If possible, we will auto-select this shipping method during the checkout on eBay.', 'setting description', 'dropshipping-with-ebay-for-woocommerce');?>"></div>
				</div>
				<div class="col-md-6">
					<div class="form-group input-block no-margin">
						<?php $cur_e2w_fulfillment_prefship = e2wl_get_setting('fulfillment_prefship', '');?>
						<select name="e2w_fulfillment_prefship" id="e2w_fulfillment_prefship" class="form-control small-input" >
							<option value="" <?php if ($cur_e2w_fulfillment_prefship === ""): ?>selected="selected"<?php endif;?>>Default (not override)</option>
							<option value="usps-first-class" <?php if ($cur_e2w_fulfillment_prefship == "usps-first-class"): ?>selected="selected"<?php endif;?>>USPS First Class</option>
							<option value="usps-retail-ground" <?php if ($cur_e2w_fulfillment_prefship == "usps-retail-ground"): ?>selected="selected"<?php endif;?>>USPS Retail Ground</option>
							<option value="standard-international-shipping" <?php if ($cur_e2w_fulfillment_prefship == "standard-international-shipping"): ?>selected="selected"<?php endif;?>>Standard International Shipping</option>
							<option value="economy-international-shipping" <?php if ($cur_e2w_fulfillment_prefship == "economy-international-shipping"): ?>selected="selected"<?php endif;?>>Economy International Shipping</option>
						</select>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4">
					<label>
						<strong><?php _ex('Override phone number', 'Setting title', 'dropshipping-with-ebay-for-woocommerce');?></strong>
					</label>
					<div class="info-box" data-toggle="tooltip" title="<?php _ex('This will be used instead of a customer phone number.', 'setting description', 'dropshipping-with-ebay-for-woocommerce');?>"></div>
				</div>
				<div class="col-md-6">
					<div class="form-group input-block no-margin">
						<input type="text" placeholder="code" style="max-width: 60px;" class="form-control" id="e2wl_fulfillment_phone_code" maxlength="5" name="e2wl_fulfillment_phone_code" value="<?php echo esc_attr(e2wl_get_setting('fulfillment_phone_code')); ?>" />
						<input type="text" placeholder="phone" class="form-control small-input" id="e2wl_fulfillment_phone_number" maxlength="16" name="e2wl_fulfillment_phone_number" value="<?php echo esc_attr(e2wl_get_setting('fulfillment_phone_number')); ?>" />
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4">
					<label>
						<strong><?php _ex('Custom note', 'Setting title', 'dropshipping-with-ebay-for-woocommerce');?></strong>
					</label>
					<div class="info-box" data-toggle="tooltip" title="<?php _ex('A note to the supplier on the eBay checkout page.', 'setting description', 'dropshipping-with-ebay-for-woocommerce');?>"></div>
				</div>
				<div class="col-md-6">
					<div class="form-group input-block no-margin">
						<textarea placeholder="note for eBay order" maxlength="1000" rows="5" class="form-control" id="e2wl_fulfillment_custom_note" name="e2wl_fulfillment_custom_note" cols="50"><?php echo esc_attr(e2wl_get_setting('fulfillment_custom_note')); ?></textarea>
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

    function e2wl_isInt(value) {
        return !isNaN(value) &&
                parseInt(Number(value)) == value &&
                !isNaN(parseInt(value, 10));
    }


    (function ($) {
        $('[data-toggle="tooltip"]').tooltip({"placement": "top"});

        jQuery("#e2wl_auto_update").change(function () {
            jQuery("#e2wl_not_available_product_status").prop('disabled', !jQuery(this).is(':checked'));
            jQuery("#e2wl_sync_type").prop('disabled', !jQuery(this).is(':checked'));
            return true;
        });

        jQuery("#e2wl_use_random_stock").change(function () {
            jQuery("#e2wl_use_random_stock_block").toggle();
            return true;
        });

        var e2wl_import_product_images_limit_keyup_timer = false;

        $('#e2wl_import_product_images_limit').on('keyup', function () {
            if (e2wl_import_product_images_limit_keyup_timer) {
                clearTimeout(e2wl_import_product_images_limit_keyup_timer);
            }

            var this_el = $(this);

            this_el.parents('.form-group').removeClass('has-error');
            if (this_el.parents('.form-group').children('span').length > 0)
                this_el.parents('.form-group').children('span').remove();

            e2wl_import_product_images_limit_keyup_timer = setTimeout(function () {
                if (!e2wl_isInt(this_el.val()) || this_el.val() < 0) {
                    this_el.after("<span class='help-block'>Please enter a integer greater than or equal to 0</span>");
                    this_el.parents('.form-group').addClass('has-error');
                }

            }, 1000);
        });

        var e2wl_fulfillment_phone_code_keyup_timer = false;

        $('#e2wl_fulfillment_phone_code').on('keyup', function () {

            if (e2wl_fulfillment_phone_code_keyup_timer) {
                clearTimeout(e2wl_fulfillment_phone_code_keyup_timer);
            }

            var this_el = $(this);

            this_el.removeClass('has-error');
            this_el.parents('.form-group').removeClass('has-error');
            if (this_el.parents('.form-group').children('span').length > 0)
                this_el.parents('.form-group').children('span').remove();

            e2wl_fulfillment_phone_code_keyup_timer = setTimeout(function () {
                if (this_el.val() != '' && (!e2wl_isInt(this_el.val()) || this_el.val().length < 1 || this_el.val().length > 5)) {
                    this_el.parents('.form-group').append("<span class='help-block'>Please enter Numbers. Between 1 - 5 characters.</span>");
                    this_el.addClass('has-error');
                    this_el.parents('.form-group').addClass('has-error');
                }

            }, 1000);

            //$(this).removeClass('error_input');
        });

        var e2wl_fulfillment_phone_number_keyup_timer = false;

        $('#e2wl_fulfillment_phone_number').on('keyup', function () {

            if (e2wl_fulfillment_phone_number_keyup_timer) {
                clearTimeout(e2wl_fulfillment_phone_number_keyup_timer);
            }

            var this_el = $(this);

            this_el.removeClass('has-error');
            this_el.parents('.form-group').removeClass('has-error');
            if (this_el.parents('.form-group').children('span').length > 0)
                this_el.parents('.form-group').children('span').remove();

            e2wl_fulfillment_phone_number_keyup_timer = setTimeout(function () {
                if (this_el.val() != '' && (!e2wl_isInt(this_el.val()) || this_el.val().length < 5 || this_el.val().length > 16)) {
                    this_el.parents('.form-group').append("<span class='help-block'>Please enter Numbers. Between 5 - 16 characters.</span>");
                    this_el.addClass('has-error');
                    this_el.parents('.form-group').addClass('has-error');
                }

            }, 1000);

            //$(this).removeClass('error_input');
        });

        //form submit
        $('.e2wl-content form').on('submit', function () {
            if ($(this).find('.has-error').length > 0)
                return false;
        });

        $(".e2wl_update_categories").click(function () {
            var this_btn = this;
            $(this_btn).attr('disabled','disabled');
            var data = {'action': 'e2wl_update_categories', 'sitecode': $('#e2wl_default_sitecode').val()};
            jQuery.post(ajaxurl, data).done(function (response) {
                var json = jQuery.parseJSON(response);
                if (json.state !== 'ok') {
                    console.log(json);
                }
                $(this_btn).removeAttr('disabled');
            }).fail(function (xhr, status, error) {
                console.log(error);
                $(this_btn).removeAttr('disabled');
            });

            return false;
        });
    })(jQuery);


</script>
