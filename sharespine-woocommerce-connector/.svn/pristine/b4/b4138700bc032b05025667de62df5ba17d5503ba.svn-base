<?php

if ( ! defined( 'ABSPATH' ) ) {
    die;
}

function sharespine_update_modified_date($product_id)
{
    /* Check cache for this product for loop avoidance. */
    $cachegroup = 'sharespine';
    $cachekey = 'recently_updated_'.$product_id;
    $recently_updated = wp_cache_get($cachekey, $cachegroup);

	error_log("SHARESPINE: pid=".$product_id
              ." - cache ".$cachekey." -> ".$recently_updated);

	if (false === $recently_updated) {
        error_log("SHARESPINE: pid=".$product_id." - updating timestamp");

        /* Mark as handled for now */
        wp_cache_set($cachekey, true, $cachegroup, 30);

        try {
            wp_update_post(
                array(
                    'ID' => $product_id,
                    'post_modified' => current_time( 'mysql' ),
                    'post_modified_gmt' => current_time( 'mysql', 1 )
                ),
                $fire_after_hooks = false
            );

            error_log("SHARESPINE: pid=".$product_id." - timestamp set to 'now'");

        } catch (Exception $e) {
            error_log("SHARESPINE: pid=".$product_id.
                      " - FAILED setting timestamp".$e->getMessage());
        }

	} else {
        error_log("SHARESPINE: pid=".$product_id." - NOT updating timestamp");
    }
}

function sharespine_update_product_date_on_meta( $meta_id, $object_id, $meta_key, $meta_value )
{
	$post = get_post( $object_id );
	$post_types = array( 'product', 'product_variation' );
	$excluded_keys = array(
        '_edit_lock',
        'wcml_sync_hash',
        '_wpml_word_count',
        '_wcml_custom_prices_status'
	);

	error_log("SHARESPINE: oid=".$object_id." - METAKEY: ".$meta_key);

	if ( $post && ! in_array( $meta_key, $excluded_keys ) && in_array( $post->post_type, $post_types ) ) {
		sharespine_update_modified_date( $post->ID );
	}
}
add_action( 'updated_postmeta', 'sharespine_update_product_date_on_meta', 10, 4 );

function sharespine_update_product_date_on_stock( $wc_product )
{
    $product_id = $wc_product->get_id();

    error_log("SHARESPINE: pid=".$product_id." - Stock update");
    sharespine_update_modified_date($product_id);
}
add_action( 'woocommerce_product_set_stock', 'sharespine_update_product_date_on_stock' );
add_action( 'woocommerce_variation_set_stock', 'sharespine_update_product_date_on_stock' );
