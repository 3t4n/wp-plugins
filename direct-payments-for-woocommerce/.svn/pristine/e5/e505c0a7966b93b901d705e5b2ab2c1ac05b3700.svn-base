<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 
add_action('woocommerce_review_order_before_submit', 'digages_add_bank_transfer_modal_to_checkout');
function digages_add_bank_transfer_modal_to_checkout() {
$nonce = wp_create_nonce('digages_add_order_to_cart_nonce');

    ?> 
    
    <!-- Modal -->
 
<div id="exampleModal" class="digages_popup">
  <div class="digagesmaincontainer">
   
        <div class="digages_popup-contentw depopmet lsastum digagesmaincenter" style="background-color: transparent;border-color:transparent;border-radius: 0px !important;"> 
           
  
        <div class="digages-container"> 
        <div class="digages-item digages-desktop-span-11 digages-tab-span-11 digages-mobile-span-12">
          <div class="digages_popmodal3k"><?php digages_display_enabled_payment_methods();?> </div></div>
        <div class="digages-item digages-desktop-span-1 digages-tab-span-1 digages-mobile-span-1 d-none d-sm-block">    
            <i class="bi bi-x digage_stylecursor digages_add-order-to-cart-button digagesclosex" style="color: #fff;" data-nonce="<?php echo esc_attr($nonce); ?>"></i>
            </div> 
    </div> 


          </div>
          
        </div>
      </div> 
      </div> 

    <?php
}

?>