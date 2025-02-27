<?php
/**
 * @link       https://www.floristone.com
 * @since      1.0.0
 *
 * @package    Florist_One_Flower_Delivery
 * @subpackage Florist_One_Flower_Delivery/public/partials
 */
?>

<div class="d-flex flex-wrap center fws-add-to-cart mt-3">
  <div style="flex:1 0 300px"><!--image-->
      <img class="img-fluid p-4 mb-3" src="<?php echo esc_url($api_response_body['PRODUCTS'][0]['LARGE']); ?>" />
  </div>
  <div class="align-left" style="flex:1 0 300px"><!--info-->
    <div class="pt-3">
      <h3><?php echo esc_html($api_response_body["PRODUCTS"][0]["NAME"]);?></h3>  
    </div>
    <p class="lh-base text-muted"><?php echo esc_html($api_response_body["PRODUCTS"][0]["DESCRIPTION"]); ?></p>
    <p class="text-muted">$<?php echo  esc_html($api_response_body["PRODUCTS"][0]["PRICE"]); ?></p>
    <div class="mb-5 d-flex">
      <select class="form-select w-25 d-inline" id="fws-add-to-cart-amount">
        <option value="1" selected="">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select>
      <button type="button" href="#" data-checkout="show" class="fd_one_button_primary florist-one-flower-delivery-add-to-cart btn btn-md florist-one-flower-delivery-button" id="florist-one-flower-delivery-add-to-cart-<?php echo esc_attr($api_response_body["PRODUCTS"][0]["CODE"]);?>" data-code="<?php echo esc_attr($api_response_body["PRODUCTS"][0]["CODE"]);?>"><?php esc_html_e( 'Add To Cart' , 'flower-delivery-by-florist-one' );?>
        <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="#000000" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle>
          <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
        </svg>
      </button>
    </div>
  </div> 
</div>
