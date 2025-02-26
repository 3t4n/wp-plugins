<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<form method="post" id="pisol-cdrw-new-method">
<div class="row py-3 border-bottom align-items-center">
    <div class="col-12 col-sm-5">
        <label for="pi_status" class="h6"><?php echo __('Status','conditional-discount-rule-woocommerce'); ?></label>
    </div>
    <div class="col-12 col-sm">
        <div class="custom-control custom-switch">
        <input type="checkbox" value="1" <?php echo esc_attr($data['pi_status']); ?> class="custom-control-input" name="pi_status" id="pi_status">
        <label class="custom-control-label" for="pi_status"></label>
        </div>
    </div>
</div>

<div class="row py-3 border-bottom align-items-center">
    <div class="col-12 col-sm-5">
        <label for="pi_title" class="h6"><?php echo __('Discount rule title','conditional-discount-rule-woocommerce'); ?> <span class="text-primary">*</span></label>
    </div>
    <div class="col-12 col-sm">
        <input type="text" required value="<?php echo esc_attr($data['pi_title']); ?>" class="form-control" name="pi_title" id="pi_title">
    </div>
</div>

<div class="row py-3 border-bottom align-items-center">
    <div class="col-12 col-sm-5">
        <label for="pi_is_taxable" class="h6"><?php echo __('Discount type','conditional-discount-rule-woocommerce'); ?></label>
    </div>
    <div class="col-12 col-sm">
        <select class="form-control" name="pi_discount_type" id="pi_discount_type">
            <option value="fixed" <?php selected( $data['pi_discount_type'], "fixed" ); ?>><?php echo __('Fixed','conditional-discount-rule-woocommerce'); ?></option>
            <option value="percentage" <?php selected( $data['pi_discount_type'], "percentage" ); ?>><?php echo __('Percentage','conditional-discount-rule-woocommerce'); ?></option>
            <option value="future_coupon" <?php selected( $data['pi_discount_type'], "future_coupon" ); ?>><?php echo __('Future coupon','conditional-discount-rule-woocommerce'); ?></option>
        </select>
    </div>
</div>

<div class="row py-3 border-bottom align-items-center" id="row_pi_coupon_template">
    <div class="col-12 col-sm-5">
        <label for="pi_coupon_template" class="h6"><?php echo __('Coupon template','conditional-discount-rule-woocommerce'); ?> </label>
    </div>
    <div class="col-12 col-sm">
        <?php
            $templates = pisol_cdrw_coupon_template::getAllTemplates();
            if(count($templates) === 0){
                echo 'There is no coupon template first add coupon template: <a class="btn btn-primary btn-sm mr-3" href="'. admin_url( 'admin.php?page=pisol-cdrw&tab=pi_cdrw_add_coupon_template' ).'"><span class="dashicons dashicons-plus"></span>Add Coupon template</a>';
            }else{
                ?>
                <select name="pi_coupon_template" id="pi_coupon_template" class="form-control">
                    <?php
                        if($templates){
                            echo '<option value="">Select template</option>';
                        foreach($templates as $template){
                            echo '<option value="'.esc_attr($template->ID).'" '.selected($template->ID, $data['pi_coupon_template'], false).'>'.$template->post_title.'</option>';
                        }
                        }
                    ?>
                </select>
                <?php
            }
        ?>
    </div>
</div>


<div class="row py-3 border-bottom align-items-center" id="row_pi_discount_amount">
    <div class="col-12 col-sm-5">
        <label for="pi_cost" class="h6"><?php echo __('Discount','conditional-discount-rule-woocommerce'); ?> <span class="text-primary">*</span></label>
    </div>
    <div class="col-12 col-sm">
        <input type="text" required value="<?php echo esc_attr($data['pi_discount']); ?>" class="form-control" name="pi_discount" id="pi_discount">
        <blockquote class="border p-2 mt-2">
            <a href="https://www.piwebsolution.com/conditiosnal-discount-plugin-faq/#Shortcodes" target="_blank">Know more about the available short code</a><br>
            <strong>[selected_product_qty]</strong> => use this to get quantity of product (selected by product rule) in cart
            <br>supported attributes max_qty and max_product_qty
            <br><br><strong>[selected_product_qty max_qty="2" max_product_qty="4" excluded_products="65,23"]</strong><br>
            <hr>
            <strong>[qty]</strong> => use this to get quantity of all the product in cart
            <br>supported attributes max_qty and max_product_qty
            <br><br><strong>[qty max_qty="2" max_product_qty="4" excluded_products="65,23"]</strong>
            <hr>
            <strong>(Pro rule)</strong><br>
            <strong>[selected_product_weight]</strong> => use this to get weight of product (selected by product rule) in cart
            <br>supported attributes max_weight and max_product_weight
            <br><br><strong>[selected_product_weight max_weight="2" max_product_weight="4" excluded_products="65,23"]</strong><br>
            <hr>
        </blockquote>
    </div>
</div>

<div class="row py-3 border-bottom align-items-center free-version" id="row_pi_percent_max_discount">
    <div class="col-12 col-sm-5">
        <label for="pi_percent_max_discount" class="h6"><?php echo __('Max discount','conditional-discount-rule-woocommerce'); ?></label>
    </div>
    <div class="col-12 col-sm">
        <input type="number" step="any" disabled class="form-control" name="pi_percent_max_discount" id="pi_percent_max_discount">
    </div>
</div>

<div class="row p-2 bg-primary text-light" id="row_description">
<div class="col-12">
<p class="text-light">
<?php _e('In free version discount percent is calculated on Cart total, Where as in pro version you can make it to calculate based on the total of the product that are selected based on the Product selection rule set in the discount rule','conditional-discount-rule-woocommerce'); ?>
</p>
</div>
</div>
<div class="row py-2 border-bottom align-items-center bg-secondary free-version" id="row_pi_percent_based_on">
<div class="col-12">
<div class="row py-2">
    <div class="col-12 col-sm-5">
        <label for="pi_percent_based_on" class="h6 text-light"><?php echo __('Calculate discount percent based on','conditional-discount-rule-woocommerce'); ?>
        </label><br>
        <p class="text-light"><?php _e('Cart total: Discount percent will be calculated based on cart total','conditional-discount-rule-woocommerce'); ?></p>
        <p class="text-light"><?php _e('Product total: Discount percent will be calculated based on the product total that matches the rules set by "Product Related" rules', 'conditional-discount-rule-woocommerce'); ?></p> 
    </div>
    <div class="col-12 col-sm">
        <select class="form-control" name="pi_percent_based_on" id="pi_percent_based_on">
            <option value="product" ><?php _e('Total of Products selected by this rule', 'conditional-discount-rule-woocommerce'); ?></option>
            <option value="cart" ><?php _e('Cart total', 'conditional-discount-rule-woocommerce'); ?></option>
        </select>
    </div>
    </div>
</div>
</div>

<div class="row py-3 border-bottom align-items-center">
    <div class="col-12 col-sm-5">
        <label for="pi_cost" class="h6"><?php echo __('Discount start Time','conditional-discount-rule-woocommerce'); ?> <span class="text-primary"></span></label>
    </div>
    <div class="col-12 col-sm d-flex align-items-center">
        <input type="text" readonly value="<?php echo esc_attr($data['pi_discount_start_time']); ?>" class="form-control" name="pi_discount_start_time" id="pi_discount_start_time" autocomplete="off"><a href="javascript:void(0)" class="pi-clear btn btn-md btn-danger text-nowrap"><?php _e('Clear date','conditional-discount-rule-woocommerce'); ?></a>
    </div>
</div>



<div class="row py-3 border-bottom align-items-center">
    <div class="col-12 col-sm-5">
        <label for="pi_cost" class="h6"><?php echo __('Discount end time','conditional-discount-rule-woocommerce'); ?> <span class="text-primary"></span></label>
    </div>
    <div class="col-12 col-sm d-flex align-items-center">
        <input type="text" readonly value="<?php echo esc_attr($data['pi_discount_end_time']); ?>" class="form-control" name="pi_discount_end_time" id="pi_discount_end_time" autocomplete="off"><a href="javascript:void(0)" class="pi-clear btn btn-md btn-danger text-nowrap"><?php _e('Clear date','conditional-discount-rule-woocommerce'); ?></a>
    </div>
</div>

<div class="row py-3 border-bottom align-items-center free-version" id="row_pi_usage_limit">
    <div class="col-12 col-sm-5">
        <label for="pi_usage_limit" class="h6"><?php echo __('Usage limit of this discount','conditional-discount-rule-woocommerce'); ?><br> <small class="text-primary">How many times this discount will be applied</small></label>
    </div>
    <div class="col-12 col-sm d-flex align-items-center">
        <input type="number" step="1" min="0" value="" class="form-control" name="pi_usage_limit" id="pi_usage_limit" autocomplete="off">
    </div>
</div>

<div class="row py-3 border-bottom align-items-center free-version" id="row_pi_user_limit">
    <div class="col-12 col-sm-5">
        <label for="pi_user_limit" class="h6"><?php echo __('Usage limit peruser','conditional-discount-rule-woocommerce'); ?><br> <small class="text-primary">How many times one user can get this discount, for logged in user user id & for guest customer email id is used to identify user</small></label>
    </div>
    <div class="col-12 col-sm d-flex align-items-center">
        <input type="number" step="1" min="0" value="" class="form-control" name="pi_user_limit" id="pi_user_limit" autocomplete="off">
    </div>
</div>

<div style="border-top:4px solid orange; border-bottom:4px solid orange">
<?php
$selection_rule_obj = new Pi_cdrw_selection_rule_main(
    __('Selection Rules','conditional-discount-rule-woocommerce'),
    $data['pi_metabox'], $data
);
wp_nonce_field( 'add_discount_rule', 'pisol_cdrw_nonce');
?>
</div>

<div class="row py-3 border-bottom align-items-center">
<div class="col-12 col-md-5">
        <label for="pi_what_to_do_to_other_discounts-pro" class="h6"><?php _e('What happen to other discount offer when this offer is active <span class="text-primary">(Pro)</span>','conditional-discount-rule-woocommerce'); ?></label> 
    </div>
<div class="col-12 col-md">
<select name="pi_what_to_do_to_other_discounts-pro" id="pi_what_to_do_to_other_discounts-pro" class="form-control">
    <option value="" selected="selected">Select an option</option>
    <option disabled value="remove-plugin-discount">Remove Other discounts (added by this plugin)</option>
</select>
</div>
</div>

<div class="row py-3 border-bottom align-items-center">
<div class="col-12 col-md-5">
        <label for="pi_what_to_do_to_wc_coupons-pro" class="h6"><?php _e('WooCommerce coupons <span class="text-primary">(Pro)</span>','conditional-discount-rule-woocommerce'); ?></label> 
    </div>
<div class="col-12 col-md">
<select name="pi_what_to_do_to_wc_coupons-pro" id="pi_what_to_do_to_wc_coupons-pro" class="form-control">
    <option value="" selected="selected">Select an option</option>
    <option disabled value="dont-allow-wc-coupon">Don't allow WC coupons when this discount applied</option>
</select>
</div>
</div>

<input type="hidden" name="post_type" value="pi_discount_rule">
<input type="hidden" name="post_id" value="<?php echo esc_attr($data['post_id']); ?>">
<input type="hidden" name="action" value="pisol_cdrw_save_method">
<input type="submit" value="Save Rule" name="submit" class="m-2 mt-5 btn btn-primary btn-lg">
</form>
