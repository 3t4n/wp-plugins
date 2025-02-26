<div class="container">
    <hr>
    <div class="panel-group">
        <div class="panel panel-primary no-border">
          <div class="panel-heading">
            <div class="">WooCommerce Coupon Integration</div>
          </div>
            
          <div class="panel-body">
              <?php
                  //Getting the users inputs to show in the input text place.
                  $ticaretCRMoptions = get_option('ticaretCRMoptions');
                  $lastCRMoptions = get_option('lastCRMoptions');
                  $ticaretCRMoptions_message=get_option('ticaretCRMoptions_message');
              ?>
              <a class="btn btn-info pull-right leave-space-above" data-toggle="popover" data-html="true" data-content="Click here if you need help about '<i>Coupon Settings.</i>'" data-trigger="hover" data-placement="bottom" href="#" onclick="open_step_under_tab('#help-and-installation-tab-href','step-two-btn');" target="_self">
                &#63;
            </a>
              <form class="editcomment" method="post" id="tms_setup_form" onsubmit="appsila_wqt_setting_page_settings_tab()" action="#">
                  <div class="row subs-wc-api-key-row margin-bottom-default">
                    <div class="col-sm-12 wc-api-key-holder-class leave-space-above" id="wc-api-key" >
                       <div class="input-group">
                         <span class="input-group-addon"><span class=""> &#128273;</span></span>
                         <input type="text" class="form-control" dir="ltr" id="wc-api-key" name="wc-api-key" placeholder="WooCommerce API Consumer Key" data-toggle="popover" data-trigger="hover" data-content="Create a new Woocommerce API Consumer Key." data-placement="bottom" dir="ltr" value="<?php echo $ticaretCRMoptions['wc_api_key']; ?>">
                     </div>
                    </div>
                  </div>
                  <div class="row subs-wc-api-secret-row margin-bottom-default">
                    <div class="col-sm-12 wc-api-secret-holder-class" id="wc-api-secret" >
                      <div class="input-group">
                         <span class="input-group-addon"><span class=""> &#128274;</span></span>
                         <input type="text" class="form-control" dir="ltr" id="wc-api-secret" name="wc-api-secret" placeholder="WooCommerce API Consumer Secret" data-toggle="popover" data-trigger="hover" data-content="Create a new Woocommerce API Consumer Secret." data-placement="bottom" dir="ltr" value="<?php echo $ticaretCRMoptions['wc_api_secret']; ?>">
                     </div>
                    </div>
                  </div>
                  
                   <div class="row">
                       <div class="col-sm-6 pull-left">
                            <div class="row">
                                <div class="col-md-4 col-sm-6">
                                    <div data-toggle="popover" data-trigger="hover" data-content="Proceed to WooCommerce Settings to Create Key and Secret" data-placement="bottom" class="">
                                        <button type="button" id="create_key_and_secret" class="btn btn-success" data-toggle="modal" data-target="#create_key_and_secret_modal">Create Key and Secret</button>
                                    </div>
                                </div>
                            </div>
                        
                    
                           <?php 
                           $info_button_img = plugins_url('../images/info_icon.png',__FILE__);
                           ?>

                              <div class="modal fade" id="create_key_and_secret_modal" role="dialog">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title text-center">Directing to Creating Key and Secret Page...</h4>
                                    </div>
                                    <div class="modal-body text-center">
                                      <img class = "appsila_image center-block" src= "<?php echo $info_button_img;?>">
                                        <h3>Change the Selection:</h3>
                                        <div id="info-popup-message" class="info-popup-message">Read/Write on Permissions Option</div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-info center-block" onclick="wc_key_and_secret_page();">PROCEED</button>
                                       </div>
                                  </div>
                                </div>
                              </div>
                        </div>
                       
                     <div class="col-sm-6 subs-submit-holder-class margin-bottom-default pull-right" id="subs-submit-holder-class-id" >
                     
                            <input type="submit" data-toggle="popover" data-trigger="hover" data-content="Submit: Please Submit Your Changes." data-placement="bottom" class="btn btn-danger pull-right"  value="&#128427; SAVE CHANGES" name="product_transfer_type_button_coupon" id="product_transfer_type_button_coupon" >
                     </div>
                    
                
                <div class="page-hidden-inputs-holder">
                  <?php
                    echo '<input type="hidden" name="consumer_key" value="'. $consumer_key. '">';
                    echo '<input type="hidden" name="consumer_secret" value="'. $consumer_secret. '">';
                  ?>
                </div>
                       
                 </div>      
              </form>
          
        </div>
    </div>
</div>
</div>
