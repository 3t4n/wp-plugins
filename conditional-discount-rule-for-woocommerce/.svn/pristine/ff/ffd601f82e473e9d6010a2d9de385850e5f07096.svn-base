<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="row py-3 bg-primary text-light align-items-center">
    <div class="col-9">
        <?php if( isset($_GET['action']) && $_GET['action']=== 'edit'){ ?>
        <label class="h4 mb-0" for="pi_cdrw_enable_offer_message"><?php _e('Edit Coupon Template','conditional-discount-rule-woocommerce'); ?></label>
        <?php }else{ ?>
        <label class="h4 mb-0" for="pi_cdrw_enable_offer_message"><?php _e('Add Coupon Template','conditional-discount-rule-woocommerce'); ?></label>
        <?php } ?>
    </div>
</div>
<form method="post" id="pisol-cdrw-new-method">
<div class="row py-3 bg-dark text-light align-items-center">
    <div class="col-9">
        <label class="h4 mb-0" for="pi_cdrw_enable_offer_message">General setting</label>
    </div>
</div>

<div class="row py-3 border-bottom align-items-center">
    <div class="col-12 col-sm-5">
        <label for="name" class="h6 mb-0"><?php echo __('Coupon template title','conditional-discount-rule-woocommerce'); ?> <span class="text-primary">*</span></label>
    </div>
    <div class="col-12 col-sm">
        <input type="text" required value="<?php echo esc_attr($data['name']); ?>" class="form-control" name="name" id="name">
    </div>
</div>


<div class="row py-3 border-bottom align-items-center ">
    <div class="col-12">
    <div class="row py-2">
    <div class="col-12 col-sm-5">
        <label for="discount_type" class="h6 mb-0"><?php echo __('Discount type','conditional-discount-rule-woocommerce'); ?></label>
    </div>
    <div class="col-12 col-sm">
        <select class="form-control" name="discount_type" id="discount_type">
            <option value="fixed_cart" <?php selected( $data['discount_type'], "fixed_cart" ); ?>>Fixed cart discount</option>
            <option value="percent" <?php selected( $data['discount_type'], "percent" ); ?>>Percent discount</option>
            <option value="fixed_product" <?php selected( $data['discount_type'], "fixed_product" ); ?>>Fixed product discount</option>
        </select>
    </div>
    </div>
    
    </div>
</div>

<div class="row py-3 border-bottom align-items-center">
    <div class="col-12 col-sm-5">
        <label for="coupon_amount" class="h6 mb-0"><?php echo __('Coupon amount','conditional-discount-rule-woocommerce'); ?> <span class="text-primary">*</span></label>
    </div>
    <div class="col-12 col-sm">
        <input type="number" required value="<?php echo esc_attr($data['coupon_amount']); ?>" class="form-control" name="coupon_amount" id="coupon_amount" min="0" step="0.0001">
    </div>
</div>

<div class="row py-3 border-bottom align-items-center">
    <div class="col-12 col-sm-5">
        <label for="free_shipping" class="h6 mb-0"><?php echo __('Allow free shipping','conditional-discount-rule-woocommerce'); ?></label>
    </div>
    <div class="col-12 col-sm">
        <input type="checkbox" value="yes" <?php checked( 'yes', $data['free_shipping'], true ); ?>  name="free_shipping" id="free_shipping">
    </div>
</div>

<div class="row py-3 border-bottom align-items-center">
    <div class="col-12 col-sm-5">
        <label for="expiry_date" class="h6 mb-0"><?php echo __('Coupon expiry date','conditional-discount-rule-woocommerce'); ?></label>
    </div>
    <div class="col-12 col-sm d-flex align-items-center">
        <input type="text" readonly value="<?php echo esc_attr($data['expiry_date']); ?>" class="form-control" name="expiry_date" id="expiry_date"><a href="javascript:void(0)" class="pi-clear btn btn-md btn-danger text-nowrap">Clear date</a>
    </div>
</div>


<div class="row py-3 border-bottom align-items-center  free-version">
    <div class="col-12 col-sm-5">
        <label for="expiry_after_days" class="h6 mb-0"><?php echo __('Coupon expiry after x days','conditional-discount-rule-woocommerce'); ?><p><?php echo __('Coupon will set a expiry date x days ahead from the creation date','conditional-discount-rule-woocommerce'); ?></p></label>
    </div>
    <div class="col-12 col-sm d-flex align-items-center">
        <input type="number" value="<?php echo esc_attr($data['expiry_after_days']); ?>" class="form-control" name="expiry_after_days" id="expiry_after_days" min="0" step="1">
    </div>
</div>

<div class="row py-3 bg-dark text-light align-items-center">
    <div class="col-9">
        <label class="h4 mb-0" for="pi_cdrw_enable_offer_message">Usage restriction</label>
    </div>
</div>

<div class="row py-3 border-bottom align-items-center">
    <div class="col-12 col-sm-5">
        <label for="minimum_amount" class="h6 mb-0"><?php echo __('Minimum spend','conditional-discount-rule-woocommerce'); ?></label>
    </div>
    <div class="col-12 col-sm d-flex align-items-center">
        <input type="number" value="<?php echo esc_attr($data['minimum_amount']); ?>" class="form-control" name="minimum_amount" id="minimum_amount" min="0" step="0.01">
    </div>
</div>

<div class="row py-3 border-bottom align-items-center">
    <div class="col-12 col-sm-5">
        <label for="maximum_amount" class="h6 mb-0"><?php echo __('Maximum spend','conditional-discount-rule-woocommerce'); ?></label>
    </div>
    <div class="col-12 col-sm d-flex align-items-center">
        <input type="number" value="<?php echo esc_attr($data['maximum_amount']); ?>" class="form-control" name="maximum_amount" id="maximum_amount" min="0" step="0.01">
    </div>
</div>

<div class="row py-3 border-bottom align-items-center">
    <div class="col-12 col-sm-5">
        <label for="individual_use" class="h6 mb-0"><?php echo __('Individual use only','conditional-discount-rule-woocommerce'); ?></label>
    </div>
    <div class="col-12 col-sm">
        <input type="checkbox" value="yes" <?php checked( 'yes', $data['individual_use'], true ); ?>  name="individual_use" id="individual_use">
    </div>
</div>

<div class="row py-3 border-bottom align-items-center">
    <div class="col-12 col-sm-5">
        <label for="exclude_sale_items" class="h6 mb-0"><?php echo __('Exclude sale items','conditional-discount-rule-woocommerce'); ?></label>
    </div>
    <div class="col-12 col-sm">
        <input type="checkbox" value="yes" <?php checked( 'yes', $data['exclude_sale_items'], true ); ?>  name="exclude_sale_items" id="exclude_sale_items">
    </div>
</div>

<div class="row py-3 border-bottom align-items-center">
    <div class="col-12 col-sm-5">
        <label for="product_ids" class="h6 mb-0"><?php echo __('Products','conditional-discount-rule-woocommerce'); ?></label>
    </div>
    <div class="col-12 col-sm">
        <select id="product_ids" class="wc-product-search" multiple="multiple" style="width: 50%;" name="product_ids[]" data-placeholder="<?php esc_attr_e( 'Search for a product&hellip;', 'add-coupon-by-link-woocommerce' ); ?>" data-action="woocommerce_json_search_products_and_variations">
						<?php
						$product_ids = $data['product_ids'];
                        if(is_array($product_ids)){
                            foreach ( $product_ids as $product_id ) {
                                $product = wc_get_product( $product_id );
                                if ( is_object( $product ) ) {
                                    echo '<option value="' . esc_attr( $product_id ) . '"' . selected( true, true, false ) . '>' . esc_html( wp_strip_all_tags( $product->get_formatted_name() ) ) . '</option>';
                                }
                            }
                        }
						?>
		</select>
    </div>
</div>

<div class="row py-3 border-bottom align-items-center">
    <div class="col-12 col-sm-5">
        <label for="exclude_product_ids" class="h6 mb-0"><?php echo __('Exclude products','conditional-discount-rule-woocommerce'); ?></label>
    </div>
    <div class="col-12 col-sm">
        <select id="exclude_product_ids" class="wc-product-search" multiple="multiple" style="width: 50%;" name="exclude_product_ids[]" data-placeholder="<?php esc_attr_e( 'Search for a product&hellip;', 'add-coupon-by-link-woocommerce' ); ?>" data-action="woocommerce_json_search_products_and_variations">
						<?php
						$exclude_product_ids = $data['exclude_product_ids'];
                        if(is_array($exclude_product_ids)){
                            foreach ( $exclude_product_ids as $product_id ) {
                                $product = wc_get_product( $product_id );
                                if ( is_object( $product ) ) {
                                    echo '<option value="' . esc_attr( $product_id ) . '"' . selected( true, true, false ) . '>' . esc_html( wp_strip_all_tags( $product->get_formatted_name() ) ) . '</option>';
                                }
                            }
                        }
						?>
		</select>
    </div>
</div>

<div class="row py-3 border-bottom align-items-center">
    <div class="col-12 col-sm-5">
        <label for="product_categories" class="h6 mb-0"><?php echo __('Product categories','conditional-discount-rule-woocommerce'); ?></label>
    </div>
    <div class="col-12 col-sm">
        <select id="product_categories" class="wc-enhanced-select" multiple="multiple" style="width: 50%;" name="product_categories[]" data-placeholder="<?php esc_attr_e( 'Category..', 'conditional-discount-rule-woocommerce' ); ?>">
                <?php
						$category_ids = $data['product_categories'];
						$categories   = get_terms( 'product_cat', 'orderby=name&hide_empty=0' );

						if ( $categories ) {
							foreach ( $categories as $cat ) {
								echo '<option value="' . esc_attr( $cat->term_id ) . '"' . wc_selected( $cat->term_id, $category_ids ) . '>' . esc_html( $cat->name ) . '</option>';
							}
						}
						?>
		</select>
    </div>
</div>

<div class="row py-3 border-bottom align-items-center">
    <div class="col-12 col-sm-5">
        <label for="exclude_product_categories" class="h6 mb-0"><?php echo __('Exclude categories','conditional-discount-rule-woocommerce'); ?></label>
    </div>
    <div class="col-12 col-sm">
        <select id="exclude_product_categories" class="wc-enhanced-select" multiple="multiple" style="width: 50%;" name="exclude_product_categories[]" data-placeholder="<?php esc_attr_e( 'Category..', 'conditional-discount-rule-woocommerce' ); ?>">
                <?php
						$exc_category_ids = $data['exclude_product_categories'];

						if ( $categories ) {
							foreach ( $categories as $cat ) {
								echo '<option value="' . esc_attr( $cat->term_id ) . '"' . wc_selected( $cat->term_id, $exc_category_ids ) . '>' . esc_html( $cat->name ) . '</option>';
							}
						}
						?>
		</select>
    </div>
</div>

<div class="row py-3 border-bottom align-items-center">
    <div class="col-12 col-sm-5">
        <label for="restrict_to_purchaser_email" class="h6 mb-0"><?php echo __('Restrict coupon to the purchaser email id','conditional-discount-rule-woocommerce'); ?></label>
    </div>
    <div class="col-12 col-sm">
        <input type="checkbox" value="yes" <?php checked( 'yes', $data['restrict_to_purchaser_email'], true ); ?>  name="restrict_to_purchaser_email" id="restrict_to_purchaser_email">
    </div>
</div>

<div class="row py-3 bg-dark text-light align-items-center">
    <div class="col-9">
        <label class="h4 mb-0" for="pi_cdrw_enable_offer_message">Usage limit</label>
    </div>
</div>

<div class="row py-3 border-bottom align-items-center">
    <div class="col-12 col-sm-5">
        <label for="usage_limit" class="h6 mb-0"><?php echo __('Usage limit per coupon','conditional-discount-rule-woocommerce'); ?></label>
    </div>
    <div class="col-12 col-sm d-flex align-items-center">
        <input type="number" value="<?php echo esc_attr($data['usage_limit']); ?>" class="form-control" name="usage_limit" id="usage_limit" min="0" step="1">
    </div>
</div>

<div class="row py-3 border-bottom align-items-center">
    <div class="col-12 col-sm-5">
        <label for="usage_limit_per_user" class="h6 mb-0"><?php echo __('Usage limit per user','conditional-discount-rule-woocommerce'); ?></label>
    </div>
    <div class="col-12 col-sm d-flex align-items-center">
        <input type="number" value="<?php echo esc_attr($data['usage_limit_per_user']); ?>" class="form-control" name="usage_limit_per_user" id="usage_limit_per_user" min="0" step="1">
    </div>
</div>

<div class="row py-3 border-bottom align-items-center">
    <div class="col-12 col-sm-5">
        <label for="limit_usage_to_x_items" class="h6 mb-0"><?php echo __('Limit usage to X items','conditional-discount-rule-woocommerce'); ?></label>
    </div>
    <div class="col-12 col-sm d-flex align-items-center">
        <input type="number" value="<?php echo esc_attr($data['limit_usage_to_x_items']); ?>" class="form-control" name="limit_usage_to_x_items" id="limit_usage_to_x_items" min="0" step="1" title="The maximum number of individual items this coupon can apply to when using product discounts. Leave blank to apply to all qualifying items in cart.">
    </div>
</div>


<div class="row py-3 bg-dark text-light align-items-center">
    <div class="col-9">
        <label class="h4 mb-0" for="pi_cdrw_enable_offer_message">Coupon Design</label>
    </div>
</div>


<div class="row py-3 border-bottom align-items-center">
    <div class="col-12 col-sm-5">
        <label for="pi_title" class="h6 mb-0"><?php echo __('Title','conditional-discount-rule-woocommerce'); ?></label>
        <br><small>This will be shown to the user in the coupon</small>
    </div>
    <div class="col-12 col-sm d-flex align-items-center">
        <input type="text" required value="<?php echo esc_attr($data['pi_title']); ?>" class="form-control" name="pi_title" id="pi_title">
    </div>
</div>


<div class="row py-3 border-bottom align-items-center">
    <div class="col-12 col-sm-5">
        <label for="pi_desc" class="h6 mb-0"><?php echo __('Description','conditional-discount-rule-woocommerce'); ?></label>
        <br><small>This will be shown to the user as coupon description</small>
    </div>
    <div class="col-12 col-sm d-flex align-items-center">
        <textarea required type="text" class="form-control" name="pi_desc" id="pi_desc"><?php echo esc_attr($data['pi_desc']); ?></textarea>
    </div>
</div>

<?php wp_nonce_field( 'add_coupon_template', 'pisol_cdrw_nonce'); ?>
<input type="hidden" name="post_type" value="pi_coupon_template">
<input type="hidden" name="post_id" value="<?php echo esc_attr($data['post_id']); ?>">
<input type="hidden" name="action" value="pisol_cdrw_save_template">
<input type="submit" value="Save Rule" name="submit" class="m-2 mt-5 btn btn-primary btn-lg">
</form>