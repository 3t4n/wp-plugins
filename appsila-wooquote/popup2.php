<!--MODAL CART Page: NAME Cart->Request a Qoute Button click -> At that point this custom MODAL show  -->
<head>
    
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<?php
          global $current_user;
          get_currentuserinfo();
          $customer_id=$current_user->ID;
          $sp_or_cart=0;
 ?>
</head>
        <?PHP
          $ticaretCRMoptions_message=get_option('ticaretCRMoptions_message');
        ?>
<input type="button" id="insert_empty_cart_button" name="request_button" onclick="appsila_wqt_request_quote_on_cart_page_modal();" value="<?php echo $ticaretCRMoptions_message['requestbutton'];  ?>"/>
<div id="modal-form-movement-holder-appsila-on-cart-page-only">
<!-- The Modal -->
  <div id="appsila-wqt-request-quote-on-cart-page-modal-container-id" name="onchangeListen" class="modal" role="dialog"  tabindex="-1">
          <form action ="#" id="request-quote-cart-form-id" onsubmit="return appsila_wqt_handle_form_submission()" method = "POST">
          <div id="loader"> </div>
        
            <div class="modal-dialog">
               <!-- Modal content-->
               <div class="modal-content">
                         <div class="modal-header request-quote-form-top-margin">
                           <div class="display-block">
                             <h4 class="modal-title pull-left">Request a Quote</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                         </div>
                         <div class="modal-body">
                           <div class="woocommerce-billing-fields">
                             <div class="woocommerce-billing-fields__field-wrapper">
                                  <div class="row">
                                         <div class="col-md-6 col-xs-12 form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field" id="billing_first_name_field" data-priority="10">
                                           <label for="billing_first_name" id="Name1">
                                             <?php echo $ticaretCRMoptions_message['name'];  ?>
                                             <abbr class="required" title="gerekli">*</abbr>
                                           </label>
                                           <input type="text" class="input-text billing-first-name-cart-modal form-control" name="billing_first_name" id="billing_first_name"  value="<?php echo $current_user->user_firstname; ?>"  autocomplete="given-name" autofocus="autofocus" min="2" max="100" required>
                                         </div>
                                         <div class="col-md-6 col-xs-12 form-row form-row-last validate-required woocommerce-invalid woocommerce-invalid-required-field" id="billing_last_name_field" data-priority="20">
                                           <label for="billing_last_name" class="">
                                             <?php echo $ticaretCRMoptions_message['surname'];  ?>
                                             <abbr class="required" title="gerekli">*</abbr>
                                           </label>
                                           <input type="text" class="input-text billing-last-name-cart-modal form-control" name="billing_last_name" id="billing_last_name"  value="<?php echo $current_user->user_lastname;?>" autocomplete="family-name" min="2" max="100" required>
                                         </div>
                                  </div>
                                  <div class="row">
                                         <div class="col-md-6 col-xs-12 form-row form-row-first validate-required validated company-name" id="billing_company_field" data-priority="30">
                                           <label for="billing_company" class="">
                                             <?php echo $ticaretCRMoptions_message['company_name']; ?>
                                           </label>
                                           <input type="text" class="form-control input-text form-control"  name="billing_company" id="billing_company"  value="<?php echo get_user_meta( $customer_id, 'billing_company', true );?>" autocomplete="organization" min="2" max="100" />
                                         </div>
                                         <div class="col-md-6 col-xs-12 form-row form-row-last validate-required" id="billing_address_1_field" data-priority="50">
                                           <label for="billing_address_1" class="">
                                             <?php echo $ticaretCRMoptions_message['address']; ?>
                                           </label>
                                           <input type="text" class="form-control input-text form-control"  name="billing_address_1" id="billing_address_1"  value="<?php echo get_user_meta( $customer_id, 'shipping_address_1', true );echo get_user_meta( $customer_id, 'shipping_address_2', true );echo get_user_meta( $customer_id, 'shipping_city', true );?> " autocomplete="address-line1" maxlength="60" min="2" max="100" />
                                         </div>
                                 </div>
                                 <div class="row">
                                         <div class="col-md-6 col-xs-12 form-row form-row-first validate-required" id="billing_phone_field" data-priority="100">
                                           <label for="billing_phone" class="">
                                             <?php echo $ticaretCRMoptions_message['phone']; ?>
                                           </label>
                                           <input type="tel" class="form-control input-text form-control"  name="billing_phone" id="billing_phone"  value="<?php echo get_user_meta( $customer_id, 'billing_phone', true );?>" autocomplete="tel" />
                                         </div>
                                         <div class="col-md-6 col-xs-12 form-row form-row-last validate-required woocommerce-invalid woocommerce-invalid-required-field" id="billing_email_field" data-priority="110">
                                           <label for="billing_email" class="">
                                             <?php echo $ticaretCRMoptions_message['email_address']; ?>
                                             <abbr class="required" title="gerekli">*</abbr>
                                           </label>
                                           <input type="email" class="form-control input-text "  name="billing_email" id="billing_email"  autocomplete="email username" min="6" max="100" value="<?php  echo $current_user->user_email;?>" />
                                         </div>
                                </div>
                                <div class="row">
                                         <div class="col-md-12 col-xs-12 form-row notes" id="order_comments_field" data-priority="130">
                                           <label for="order_comments" class="col-md-12 col-xs-12 form-row-first" ><?php echo $ticaretCRMoptions_message['comments']; ?></label>
                                           <textarea class="col-md-12, col-xs-12 form-control" name="order_comments" id="order_comments" style="width:100%;"></textarea>
                                         </div>
                               </div>
                             </div>
                           </div>
                         </div>
                         <div class="clear-fix"></div>
                       </br>
                         <div class="modal-footer request-quote-form-bottom-margin">
                                <div class="col-md-12 col-xs-12 form-row form-row-wide woocommerce-validated modal-submit-input-div-class-margin" id="submit_request_button">
                                    <input type="submit"  id="modal-submit-button-id" name="submit_request_button"  value="<?php echo $ticaretCRMoptions_message['submit'];  ?>">
                                </div>
                         </div>
               </div>
             </div>
        
          <div class="form-row form-row-wide woocommerce-validated display-none" id="submit_request_button">
            <?php
              echo '<input type="hidden" class="form-control" name="pnamestr" value="'. $pnamestr. '">';
              echo '<input type="hidden" class="form-control" name="pimagestr" value="'. $pimagestr. '">';
              echo '<input type="hidden" class="form-control" name="pskustr" value="'. $pskustr. '">';
              echo '<input type="hidden" class="form-control" name="psku_quantitystr" value="'. $psku_quantitystr. '">';
              echo '<input type="hidden" class="form-control" name="pimage_linkstr" value="'. $pimage_linkstr. '">';
              echo '<input type="hidden" class="form-control" name="pshort_descriptionstr" value="'. $pshort_descriptionstr. '">';
              echo '<input type="hidden" class="form-control" name="pdescriptionstr" value="'. $pdescriptionstr. '">';
              echo '<input type="hidden" class="form-control" name="pline_totalstr" value="'. $pline_totalstr. '">';
              echo '<input type="hidden" class="form-control" name="currency" value="'. $currency. '">';
              echo '<input type="hidden" class="form-control" name="currency_symbol" value="'. $currency_symbol. '">';
              echo '<input type="hidden" class="form-control" name="ppricestr" value="'. $ppricestr. '">';
              echo '<input type="hidden" class="form-control" name="pquantitystr" value="'. $pquantitystr. '">';
              echo '<input type="hidden" class="form-control" name="ptaxstr" value="'. $ptaxstr. '">';
              echo '<input type="hidden" class="form-control" name="ptax_statusstr" value="'. $ptax_statusstr. '">';
              echo '<input type="hidden" class="form-control" name="ptax_classstr" value="'. $ptax_classstr. '">';
              echo '<input type="hidden" class="form-control" name="psale_pricestr" value="'. $psale_pricestr. '">' . '<br>';
              echo '<input type="hidden" class="form-control" name="total" value="' . str_replace(';','-',$total_cart) . '" >' . '<br>';
              echo '<input type="hidden" class="form-control" name="total_tax" value="' . $total_tax . '" >' . '<br>';
              echo '<input type="hidden" class="form-control" name="total_shipping" value="' . $total_shipping . '" >';
              echo '<input type="hidden" class="form-control" name="coupon" value="'. $coupon. '">';
              echo '<input type="hidden" class="form-control" name="sp_or_cart" value="' . $sp_or_cart . '" >';
              echo '<input type="hidden" class="form-control" name="pregular_pricestr" value="'. $pregular_pricestr. '">' . '<br>';
              ?>
          </div>
          </form>
  </div>  
</div>
