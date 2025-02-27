<?php

/**
 * @link       https://www.floristone.com
 * @since      1.0.0
 *
 * @package    Florist_One_Flower_Delivery
 * @subpackage Florist_One_Flower_Delivery/public/partials
 */
?>

<ul class="list-group list-group-lg mb-4 ms-0">

  <?php for($i=0;$i<count((array)$products_for_display);$i++){ 
  
  $checkout_code =  $products_for_display[$i]["CODE"];
  $checkout_name = $products_for_display[$i]["NAME"];
  $checkout_price = $products_for_display[$i]["PRICE"];
  $bs_toggle = (isset($product_modal)) ? ($product_modal == 1) ? 'modal' : "" : "";
  $bs_target = (isset($product_modal)) ? ($product_modal == 1) ? '#florist-one-flower-delivery-view-modal' : "" : "";
  
  ?>
  
    <li class="list-group-item border-start-0 border-end-0">
      <div class="row align-items-center">
        <div class="col-4 py-2">
          <!-- Image -->
          <a href="#" data-code="<?php echo esc_attr($checkout_code);?>" class="florist-one-flower-delivery-many-products-single-product" data-bs-toggle="<?php echo esc_attr($bs_toggle); ?>" data-bs-target="<?php echo esc_attr($bs_target); ?>">
            <img src="<?php echo esc_url($products_for_display[$i]["IMG"])?>" alt="<?php echo esc_attr($checkout_name);?>" class="img-fluid">
          </a>
        </div>
        <div class="col ms-3 ">
          <!-- Title -->
          <div class="d-flex mb-2 mt-2 fw-bold lh-sm">
            <a href="#" data-code="<?php echo esc_attr($checkout_code);?>" class="text-decoration-none text-body florist-one-flower-delivery-many-products-single-product" data-bs-toggle="<?php echo esc_attr($bs_toggle); ?>" data-bs-target="<?php echo esc_attr($bs_target); ?>"><?php echo esc_html($checkout_name);?></a>
            <span class="ms-auto">$<?php echo esc_html($checkout_price)?></span>
          </div>
          <!-- Text -->
          <p class="mb-4 font-size-sm text-muted"><?php echo esc_html_e( 'Item: ', 'flower-delivery-by-florist-one' ) . esc_html($checkout_code);?></p>
          <?php if ($dont_show_remove_button != 1) { ?>
          <!--Footer -->
            <div class="d-flex align-items-center">
              <!-- Remove -->
                <a href="#" style="color:#909090!important;"  class="florist-one-flower-delivery-cart-remove-item font-size-xs text-dark text-decoration-none w-lighter ms-auto" id="florist-one-flower-delivery-cart-remove-item-<?php echo esc_attr($checkout_code);?>" data-code="<?php echo esc_attr($checkout_code);?>"> <small><?php esc_html_e( 'x Remove', 'flower-delivery-by-florist-one' ); ?></small></a>
            </div>
          <?php } ?>
        </div>
      </div>
    </li>
  <?php } ?>
</ul>
  
