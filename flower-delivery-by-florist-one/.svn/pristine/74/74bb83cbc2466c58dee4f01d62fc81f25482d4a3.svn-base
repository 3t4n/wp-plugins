<?php
/**
 * @link       https://www.floristone.com
 * @since      1.0.0
 *
 * @package    Florist_One_Flower_Delivery
 * @subpackage Florist_One_Flower_Delivery/public/partials
 */
                      
  $getTrees_img = $api_response_body['productURL'];
  $getTrees_certificate = $api_response_body['productSeeCertificate'];
  $getTrees_certificate_thumbnail = $api_response_body['productSeeCertificateImg'];

?>

<div class="row mb-5" id="fws-trees-container">
  <h3 class=""><?php echo esc_html($api_response_body['itemName']) ?></h3>
  <div class="col">
    <div class="d-flex flex-wrap justify-content-center">
      <div class="f1fd-product-image text-center px-4 mb-4"><!--image-->
          <img width="300px"  class="img-fluid mb-3" src="<?php echo esc_url($getTrees_img) ?>" />
          <a target="_blank" href="<?php echo esc_url($getTrees_certificate_thumbnail) ?>">
            <img width="300px" class="img-fluid mb-3" src="<?php echo esc_url($getTrees_certificate_thumbnail) ?>" />
          </a>
          <p><?php echo wp_kses($getTrees_certificate, array('a' => array('href'  => true,))); ?></p>
      </div>
      <div class="f1fd-product-discription"><!--info-->
        <?php
          for ($copy=0;$copy < count((array)$api_response_body['productPrimaryCopy']);$copy++){
            echo '<p class="lh-sm fs-4">' . esc_html($api_response_body['productPrimaryCopy'][$copy]['heading']) . '</p>';
            echo '<p class="lh-base">';
            echo '<ul class="lh-base px-0 ms-3 mb-5 text-start">';
            for ($bullet=0;$bullet < count($api_response_body['productPrimaryCopy'][$copy]['rows']);$bullet++){
              echo '<li class="mb-2">' . wp_kses($api_response_body['productPrimaryCopy'][$copy]['rows'][$bullet]['text'], array('a' => array('href'  => true,))) . '</li>';
            }
            if($copy == 1 & !empty($api_response_body['productCountryPrimaryCopy'])){
              for ($bulletl=0;$bulletl < count((array)$api_response_body['productCountryPrimaryCopy'][0]['rows']);$bulletl++){
                echo '<li class="mb-2">' . esc_html($api_response_body['productCountryPrimaryCopy'][0]['rows'][$bulletl]['text']) . '</li>';
              }
            }
            echo  '</ul></p>';
          } 
          ?>
        <div class="fws-add-to-cart-tree">
            <p class="lh-sm fs-4 text-dark"><?php echo esc_html($api_response_body['productProductHeading']['text']); ?></p>
            <p class="fs-5">$<?php echo number_format( $api_response_body['price'], 2, '.', '')?></p>
           <button type="button" data-checkout="show" href="#" data-bs-toggle="modal" data-bs-target="#florist-one-flower-delivery-view-modal" class="fd_one_button_primary  florist-one-flower-delivery-add-to-cart btn mt-3" id="plant-a-tree-add-to-cart1" data-name="<?php echo esc_attr($api_response_body['productProductHeading']['text']); ?>" data-code="<?php echo str_replace(' ', '-', esc_attr($api_response_body['productProductHeading']['text'])); ?>" data-price="<?php echo esc_attr($api_response_body['price']) ?>" data-number="5"><?php echo esc_html_e( 'Add To Cart ', 'flower-delivery-by-florist-one' );?> 
            <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="currentColor" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
           </button>
            <p class="lh-sm fs-4 text-dark mt-5"><?php echo esc_html($api_response_body['productSecondaryCopy'][0]['heading']); ?></p>
            <?php for ($bulletl=0;$bulletl < count((array)$api_response_body['productSecondaryCopy'][0]['rows']);$bulletl++){
                echo '<p>' . esc_html($api_response_body['productSecondaryCopy'][0]['rows'][$bulletl]['text']) . '</p>';
              } ?>
            <div class="input-group mb-3">
              <div style="width:100px">
                <input type="number" id="florist-one-flower-delivery-plant-a-tree-select-your-own" name="florist-one-flower-delivery-plant-a-tree-select-your-own" class="form-control" min="<?php echo esc_attr($api_response_body['minimumNumberOfTrees']); ?>" step="5"  placeholder="Number" aria-label="Number of Trees" aria-describedby="button-addon2">
              </div>
                <button id="florist-one-flower-delivery-calcualte-price" class="fd_one_button_primary  florist-one-flower-delivery-plant-a-tree-select-your-own-calculate btn ms-3" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calculator" viewBox="0 0 16 16">
                   <path d="M12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h8zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z"/>' .
                   <path d="M4 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-2zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-4z"/>' .
                   </svg> <?php esc_html_e( 'Calculate Price', 'flower-delivery-by-florist-one' ) ?>
                </button>
            </div>
            <div id="fws-trees-calculate-msg"></div>  
        </div>
      </div>
    </div>
  </div>
</div>




