<?php
   /*
   Plugin Name: Products Admin Notes Simple
   Description: Adds an admin text area into the general area of products for admin notes e.g. where you ordered the product for, or a note relating to the product.
   Version: 1.1
   Author: Jamie Hall
   License: GPL2
   */
?>
<?php

// Display Fields
add_action( 'woocommerce_product_options_general_product_data', 'pans_woo_add_custom_general_fields' );

// Save Fields
add_action( 'woocommerce_process_product_meta', 'pans_woo_add_custom_general_fields_save' );

function pans_woo_add_custom_general_fields() {
  global $woocommerce, $post;

  echo '<div class="pans_ta_options_group">';
  // Textarea
  woocommerce_wp_textarea_input(
  	array(
  		'id'          => '_pans_ta',
  		'label'       => __( 'Admin notes', 'woocommerce' ),
  		'placeholder' => 'These notes are visible to admins only.',
  	)
  );
  echo '</div>';
}

function pans_woo_add_custom_general_fields_save( $post_id ){
  // Textarea
  	$woocommerce_textarea = $_POST['_pans_ta'];
  	if( !empty( $woocommerce_textarea ) )
  		update_post_meta( $post_id, '_pans_ta', sanitize_textarea_field( $woocommerce_textarea ) );

}
?>
