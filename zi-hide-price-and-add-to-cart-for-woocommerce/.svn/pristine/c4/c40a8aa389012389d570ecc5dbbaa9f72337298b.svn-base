<?php

add_action('product_cat_add_form_fields', 'zinv_taxonomy_add_new_meta_field', 10, 1);

add_action('product_cat_edit_form_fields', 'zinv_taxonomy_edit_meta_field', 10, 1);

//Product Cat Create page
function zinv_taxonomy_add_new_meta_field()
{ ?>

    <div class="form-field">
        <input name="zinv_hide_price_cart" type="checkbox" id="zinv_hide_price_cart" value="Yes" <?php if (isset($zinv_hide_price_cart)) {
                                                                                                        echo "checked='checked'";
                                                                                                    }; ?>> <?php _e('Hide Price and Add to Cart button for this category', 'zinv'); ?>
    </div>

<?php

}

//Product Cat Edit page
function zinv_taxonomy_edit_meta_field($term)
{

    //getting term ID
    $term_id = $term->term_id;

    // retrieve the existing value(s) for this meta field.
    $zinv_hide_price_cart = get_term_meta($term_id, 'zinv_hide_price_cart', true); ?>

    <tr class="form-field">
        <th scope="row" valign="top"><label for="zinv_hide_price_cart"><?php _e('Hide Price and Add to Cart button for this category', 'zinv'); ?></label></th>
        <td>
            <input name="zinv_hide_price_cart" type="checkbox" id="zinv_hide_price_cart" value="Yes" <?php if ($zinv_hide_price_cart == "Yes") {
                                                                                                            echo "checked='checked'";
                                                                                                        }; ?>>
        </td>
    </tr>
<?php

}

add_action('edited_product_cat', 'zinv_save_taxonomy_custom_meta', 10, 1);

add_action('create_product_cat', 'zinv_save_taxonomy_custom_meta', 10, 1);

// Save extra taxonomy fields callback function.
function zinv_save_taxonomy_custom_meta($term_id)
{

    $zinv_hide_price_cart = filter_input(INPUT_POST, 'zinv_hide_price_cart');

    update_term_meta($term_id, 'zinv_hide_price_cart', $zinv_hide_price_cart);
}

add_filter('woocommerce_get_price_html', function ($price, $product) {

    if (is_admin()) return $price;

    $product_cats_ids = wc_get_product_term_ids($product->get_id(), 'product_cat');

    foreach ($product_cats_ids as $cat_id) {

        $zinv_hide_price_cartx = get_term_meta($cat_id, 'zinv_hide_price_cart', true);
        if ($zinv_hide_price_cartx == "Yes") {
            $zinv_hide_price_cart_exists = "Yes";
        }
    }

    if ($zinv_hide_price_cart_exists == "Yes") {
        return '';
    }

    return $price; // Return original price
}, 10, 2);


remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);

add_filter('woocommerce_single_product_summary', function () {

    global $product;

    $product_cats_ids = wc_get_product_term_ids($product->get_id(), 'product_cat');

    foreach ($product_cats_ids as $cat_id) {

        $zinv_hide_price_cartx = get_term_meta($cat_id, 'zinv_hide_price_cart', true);

        if ($zinv_hide_price_cartx == "Yes") {
            $zinv_hide_price_cart_exists = "Yes";
        }
    }

    if ($zinv_hide_price_cart_exists == "Yes") {

        echo ' ';
    } else {
        do_action('woocommerce_' . $product->get_type() . '_add_to_cart');
    }
}, 10, 2);

//for products category page
function zinv_add_custom_column($columns)
{
    $columns['hide_price'] = 'Hide price and button';

    return $columns;
}
add_filter('manage_edit-product_cat_columns', 'zinv_add_custom_column');

function zinv_category_custom_column_value($columns, $column, $term_id)
{
    if ($column == 'hide_price') {
        $hide_price = get_term_meta($term_id, 'zinv_hide_price_cart', true);
        $hide_price_final = ($hide_price == "Yes" ? "Yes" : "-");
        return $hide_price_final;
    }
}
add_filter('manage_product_cat_custom_column', 'zinv_category_custom_column_value', 10, 3);


// frontend archive pages, remove add to cart

add_action( 'woocommerce_after_shop_loop_item', 'zinv_remove_add_to_cart_buttons', 1 );

    function zinv_remove_add_to_cart_buttons() {

        global $product;

        $product_cats_ids = wc_get_product_term_ids($product->get_id(), 'product_cat');
    
        foreach ($product_cats_ids as $cat_id) {
    
            $zinv_hide_price_cartx = get_term_meta($cat_id, 'zinv_hide_price_cart', true);
    

            if ($zinv_hide_price_cartx == "Yes") {
                $zinv_hide_price_cart_exists = "Yes";
            }
        }
    
        if ($zinv_hide_price_cart_exists == "Yes") {
    
            if( is_product_category() || is_shop()) { 
                remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
              }
        } else {

            add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
        }



    }
