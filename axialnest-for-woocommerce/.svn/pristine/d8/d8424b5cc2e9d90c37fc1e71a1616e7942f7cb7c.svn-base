<?php

// Add a field on the product edit page
add_action( 'woocommerce_product_options_general_product_data', 'axialnest_woo_add_axial_id_field' );
function axialnest_woo_add_axial_id_field() {
  woocommerce_wp_text_input( array(
    'id'          => 'axial-nest-id',
    'label'       => __( 'AxialNest ID', 'axialnest-for-woocommerce' ),
    'placeholder' => __( 'Enter your AxialNest product ID', 'axialnest-for-woocommerce' ),
    'desc_tip'    => true,
    'description' => __( 'Retrieve this ID from the AxialNest admin panel to link which 3D model should appear within the customizer.', 'axialnest-for-woocommerce' )
  ) );
}

// Save this field when saving the product
add_action( 'woocommerce_process_product_meta', 'axialnest_woo_save_custom_product_field' );
function axialnest_woo_save_custom_product_field( $post_id ) {
	if (isset($_POST['axial-nest-id'])) {
		$custom_field_value = sanitize_text_field(wp_unslash($_POST['axial-nest-id']));
		update_post_meta( $post_id, 'axial-nest-id', esc_attr( $custom_field_value ) );
	}
}

// Show order metadata on orders page
add_action('woocommerce_before_order_itemmeta','axialnest_woo_woocommerce_before_order_itemmeta',10,3);
function axialnest_woo_woocommerce_before_order_itemmeta($item_id, $item, $product) {
	if (!empty($item->get_meta('AxialNest ID'))) {
		axialnest_woo_customOrderPageHTML($item_id, $item, $product);
	}
}

function axialnest_woo_customOrderPageHTML($item_id, $item, $product) {
	$screenshots = json_decode($item->get_meta('__customization_screenshots'));
	$customizationText = str_replace(',', '<br>', $item->get_meta('Customization'));
	$customizationJSON = json_decode($item->get_meta('__customization_json'));
	$imageTextParts = array_filter($customizationJSON->body->parts, function($var) {
		return ($var->type == 'IMAGE' || $var->type == 'TEXT') && property_exists($var, 'image');
	});
	wp_enqueue_style('axialnestOrderPageStyle', plugins_url('css/axialnestOrderPageStyle.css', __FILE__ ), array(), '1');
	?>
		<div id="axial-order-screenshots">
			<img class="axial-order-screenshot-image" src=<?php echo esc_attr($screenshots->left)?> />
			<img class="axial-order-screenshot-image" src=<?php echo esc_attr($screenshots->right)?> />
			<img class="axial-order-screenshot-image" src=<?php echo esc_attr($screenshots->top)?> />
			<img class="axial-order-screenshot-image" src=<?php echo esc_attr($screenshots->bottom)?> />
			<img class="axial-order-screenshot-image" src=<?php echo esc_attr($screenshots->front)?> />
			<img class="axial-order-screenshot-image" src=<?php echo esc_attr($screenshots->back)?> />
		</div>
		<p id="axial-customization-note">
			<?php echo wp_kses_post($customizationText)?>
		</p>
	<?php

	foreach ( $imageTextParts as $imageTextPart ) {
		$text = '';
		if (property_exists($imageTextPart, 'text'))
			$text = "<br><span>{$imageTextPart->text}, {$imageTextPart->color}, {$imageTextPart->typography}</span><br>";
		?>
			<h4 class="axial-logo-image-title"><?php echo esc_attr($imageTextPart->variant)?>, x<?php echo esc_attr($imageTextPart->scale)?>, <?php echo esc_attr($imageTextPart->rotationDegrees)?>º</h4>
			<?php echo wp_kses_post($text)?>
			<img class="axial-order-screenshot-image" src=<?php echo esc_attr($imageTextPart->image)?> />
			<hr>
		<?php
	}
}
