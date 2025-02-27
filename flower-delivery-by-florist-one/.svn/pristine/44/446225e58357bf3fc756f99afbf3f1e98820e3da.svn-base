<?php

/**
 * @link       https://www.floristone.com
 * @since      1.0.0
 *
 * @package    Florist_One_Flower_Delivery
 * @subpackage Florist_One_Flower_Delivery/public/partials
 */
?>

<h3 class="florist-one-flower-delivery-checkout-heading"><?php esc_html_e( 'Shopping Cart', 'text_domain' ); ?> (<span id="shopping_cart_count"><?php echo ($products_for_display == 0) ? 0 : esc_html(count($products_for_display)) ; ?></span>)</h3>

<?php

  $config_options = get_option('fhw-solutions-obituaries_1');

  if ($products_for_display == 0){
    echo '<p>' . __( 'Your shopping cart is empty', 'flower-delivery-by-florist-one' ) .'</p>';
  }
  else {
    if (isset($display_tree_message_seperate)){
      echo '<div class="alert alert-info mt-3 text-center" role="alert">' . esc_html($display_tree_message_seperate) . '</div>';
    } ?>
    <div class="d-inline-flex flex-wrap my-4 fhws-gap" style="">
      <div class="" style="flex: 1 1 350px">
        <?php include 'florist-one-flower-delivery-cart-body.php'; ?>
      </div>
    
      <div class="" style="flex: 1 0 250px">
        <!-- Total -->
        <?php include 'florist-one-flower-delivery-cart-body-price.php'; ?>
          <a href="#" class="florist-one-flower-delivery-checkout f1fd_primary btn btn-lg m-1 w-100 mb-3" data-page="4" data-code=""><?php esc_html_e( 'Checkout', 'flower-delivery-by-florist-one' ); ?><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline></svg></a>
          <a class="text-decoration-none btn-link text-body fw-bold florist-one-flower-delivery-menu-cart-button" data-bs-dismiss="modal" id="florist-one-continue-shopping-arrow" href="#">← Continue Shopping</a>
      </div>
    </div>
<?php } ?>
