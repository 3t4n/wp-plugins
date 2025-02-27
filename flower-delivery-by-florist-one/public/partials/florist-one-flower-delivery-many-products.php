<?php
/**
 * @link       https://www.floristone.com
 * @since      1.0.0
 *
 * @package    Florist_One_Flower_Delivery
 * @subpackage Florist_One_Flower_Delivery/public/partials
 */
?>

<?php 
  $config_options = get_option('florist-one-flower-delivery');
  $total_products = $api_response_body["TOTAL"];
  $pages = ceil($total_products / $count);
  foreach($api_response_body['PRODUCTS'][0]['CATEGORIES'] as $x => $val) {
    if ($category == $val['CATEGORY']){
      $category_title = $val['DISPLAY'];
    }
  }
  if (!esc_html($loadmore)){ ?>
    <div class="d-flex flex-wrap justify-content-start">
      <h3 class="florist-one-flower-delivery-many-products-category"><?php echo esc_html($category_title);?></h3>
    </div>      
    <!-- start container -->
    <div class="d-flex flex-wrap align-content-center fhws-gap align-content-between" id="florist-one-flower-delivery-many-products-display">
    <?php }
    for ($i=0;$i<count((array)$api_response_body["PRODUCTS"]);$i++) { ?>
      <div class=" d-flex flex-column position-relative justify-content-between florist-one-flower-delivery-many-products-display align-center ">
        <a class="florist-one-flower-delivery-many-products-single-product p-3 text-decoration-none"  data-bs-toggle="modal" data-bs-target="#florist-one-flower-delivery-view-modal" href="#" id="<?php echo esc_attr($api_response_body["PRODUCTS"][$i]["CODE"]);?>-1" class="florist-one-flower-delivery-many-products-single-product"  data-url="<?php echo esc_url($api_response_body["PRODUCTS"][$i]["SMALL"])?>" data-code="<?php echo esc_attr($api_response_body["PRODUCTS"][$i]["CODE"]);?>">
          <img src="<?php echo esc_url($api_response_body["PRODUCTS"][$i]["SMALL"]);?>" width="180" alt="<?php echo esc_attr($api_response_body["PRODUCTS"][$i]["NAME"]);?>"/>
        </a>
        <a class="florist-one-flower-delivery-many-products-single-product p-3 text-decoration-none"  data-bs-toggle="modal" data-bs-target="#florist-one-flower-delivery-view-modal" href="#" id="<?php echo esc_attr($api_response_body["PRODUCTS"][$i]["CODE"]);?>-1" class="florist-one-flower-delivery-many-products-single-product"  data-url="<?php echo esc_url($api_response_body["PRODUCTS"][$i]["SMALL"])?>" data-code="<?php echo esc_attr($api_response_body["PRODUCTS"][$i]["CODE"]);?>">
          <p class="pt-2 text-center"><?php echo esc_html($api_response_body["PRODUCTS"][$i]["NAME"]);?></p>
        </a>  
      <div>
        <p class="text-muted text-center">$<?php echo esc_html($api_response_body["PRODUCTS"][$i]["PRICE"]); ?></p>
          <div class="d-flex mb-5 mx-auto justify-content-center" style="width:200px">
            <button type="button" href="#" data-bs-toggle="modal" data-bs-target="#florist-one-flower-delivery-view-modal" class="w-100 fd_one_button_secondary florist-one-flower-delivery-many-products-single-product ms-1 me-1 border" data-url="<?php echo esc_url($api_response_body["PRODUCTS"][$i]["SMALL"]);?>" data-code="<?php echo esc_attr($api_response_body["PRODUCTS"][$i]["CODE"]) ?>">
              <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>        
            </button>
            <button type="button" href="#" data-bs-toggle="modal" data-bs-target="#florist-one-flower-delivery-view-modal" class="w-100 florist-one-flower-delivery-add-to-cart ms-1 me-1 border fd_one_button_secondary" data-code="<?php echo esc_attr($api_response_body["PRODUCTS"][$i]["CODE"])?>">
              <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>        
            </button>
          </div>
        </div>
      </div>
    <?php } ?>
  </div><!--end container -->
<?php 
  $button_view = (!esc_html($loadmore) && esc_html($api_response_body["TOTAL"])  > esc_html($count) ) ? '' : 'd-none';
?>

<div class="d-flex">
  <button class="mx-auto px-3 florist-one-flower-delivery-menu-link-more btn fd_one_button_secondary <?php echo esc_attr($button_view);?>" data-items-count="<?php echo esc_attr($total_products);?>" data-pages="<?php echo esc_attr($pages);?>" data-current-page="2" data-count="<?php echo esc_attr($count);?>" data-category="<?php echo esc_attr($category);?>"><?php esc_html_e( 'See More ', 'flower-delivery-by-florist-one' ); echo esc_html($category_title); ?>
  </button>
</div>

          
  

    




