<?php

function CPIW_AdminMenu() {
    add_menu_page( __( 'Setting Pincodes', 'check-pincode-for-woocommerce'), __( 'Setting Pincodes','check-pincode-for-woocommerce'),'manage_options','pin-code','CPIW_SettingPincode','dashicons-location-alt',99);

}

add_action( 'admin_menu', 'CPIW_AdminMenu' );
function CPIW_SettingPincode() {
    global $cpiw_comman; ?>
        <div class="cpiw_container">
            <div class="wrap">
                <h2>Pincode Setting</h2>
                <div class="card cpiw_notice">
                    <h2>Please help us spread the word & keep the plugin up-to-date</h2>
                    <p>
                        <a class="button-primary button" title="Support Check Pincode" target="_blank" href="https://www.plugin999.com/support/">Support</a>
                        <a class="button-primary button" title="Rate Check Pincode" target="_blank" href="https://wordpress.org/support/plugin/check-pincode-for-woocommerce/reviews/?filter=5">Rate the plugin ★★★★★</a>
                    </p>
                </div>
                <?php if(isset($_REQUEST['message'])  && $_REQUEST['message'] == 'success'){ ?>
                    <div class="notice notice-success is-dismissible"> 
                        <p><strong>Setting Saved Successfully.</strong></p>
                    </div>
                <?php } ?>
                <form method="post">
                    <?php wp_nonce_field( 'cpiw_meta_save', 'cpiw_meta_save_nounce' ); ?>
                    <div id="poststuff">
                        <ul class="nav-tab-wrapper woo-nav-tab-wrapper">
                            <li class="nav-tab nav-tab-active" data-tab="tab-default">
                            General Settings
                            </li>
                            <li class="nav-tab" data-tab="tab-general">
                            Other Settings
                            </li>
                        </ul>
                        <div id="tab-default" class="tab-content current">
                            <div class="postbox">
                              <div class="postbox-header">
                                <h2>General Settings</h2>
                              </div>
                              <div class="inside">
                                <table>
                                    <tr>
                                        <th>
                                          Enable Plugin
                                        </th>
                                        <td>
                                          <input type="checkbox" name="cpiw_comman[cpiw_enable]" value="enable" <?php if($cpiw_comman['cpiw_enable'] == 'enable' ) { echo 'checked'; } ?>>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                          Date Show In Pincode box
                                        </th>
                                        <td>
                                          <input type="checkbox" name="cpiw_comman[cpiw_dateshow]" value="enable" <?php if($cpiw_comman['cpiw_dateshow'] == 'enable' ) { echo 'checked'; } ?>>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                          Cash on delivery In Pincode box
                                        </th>
                                        <td>
                                          <input type="checkbox" name="cpiw_comman[cpiw_codshow]" value="enable" <?php if($cpiw_comman['cpiw_codshow'] == 'enable' ) { echo 'checked'; } ?>>
                                        </td>
                                    </tr>
                                </table>  
                              </div> 
                            </div>
                            <div class="postbox">
                                <div class="postbox-header">
                                    <h2>Popup Setting</h2>
                                </div>
                                <div class="inside">
                                    <table>
                                        <tr>
                                            <th>
                                              PopUp Enable disable
                                            </th>
                                            <td >
                                              <input type="checkbox" name="cpiw_comman[cpiw_poupshow]" value="enable" <?php if($cpiw_comman['cpiw_poupshow'] == 'enable' ) { echo 'checked'; } ?>>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="postbox">
                                <div class="postbox-header">
                                    <h2>Pincode Box Color Setting</h2>
                                </div>
                                <div class="inside">
                                    <table>
                                        <tr>
                                            <th>
                                             Main pincode Background Color
                                            </th>
                                            <td>
                                                <?php 
                                                    if(!empty($cpiw_comman['mainbackcolor'])){
                                                        $mainbackcolor = '#f3f3f3';
                                                    }
                                                ?>
                                                <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr($mainbackcolor); ?>" name="cpiw_comman[mainbackcolor]" value="<?php echo esc_attr($cpiw_comman['mainbackcolor']); ?>"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                              Check Availability Color
                                            </th>
                                            <td>
                                                <?php 
                                                    if(!empty($cpiw_comman['checkavailbilitycolor'])){
                                                        $checkavailbilitycolor = '#000000';
                                                    }
                                                ?>
                                                <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr($checkavailbilitycolor); ?>" name="cpiw_comman[checkavailbilitycolor]" value="<?php echo esc_attr($cpiw_comman['checkavailbilitycolor']); ?>"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                              Check AND Change Button text Color
                                            </th>
                                            <td>
                                                <?php 
                                                    if(!empty($cpiw_comman['checkandchangetxtcolor'])){
                                                        $checkandchangetxtcolor = '#ffffff';
                                                    }
                                                ?>
                                                <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr($checkandchangetxtcolor); ?>" name="cpiw_comman[checkandchangetxtcolor]" value="<?php echo esc_attr($cpiw_comman['checkandchangetxtcolor']); ?>"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                              Check AND Change Button Background Color
                                            </th>
                                            <td>
                                                <?php 
                                                    if(!empty($cpiw_comman['checkandchangebackcolor'])){
                                                        $checkandchangebackcolor = '#000000';
                                                    }
                                                ?>
                                                <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr($checkandchangebackcolor); ?>" name="cpiw_comman[checkandchangebackcolor]" value="<?php echo esc_attr($cpiw_comman['checkandchangebackcolor']); ?>"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                              Delivery date text Color
                                            </th>
                                            <td>
                                                <?php 
                                                    if(!empty($cpiw_comman['deliverydatetextcolor'])){
                                                        $deliverydatetextcolor = '#000000';
                                                    }
                                                ?>
                                                <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr($deliverydatetextcolor); ?>" name="cpiw_comman[deliverydatetextcolor]" value="<?php echo esc_attr($cpiw_comman['deliverydatetextcolor']); ?>"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                              Cash on delivery text color
                                            </th>
                                            <td>
                                                <?php 
                                                    if(!empty($cpiw_comman['codtextcolor'])){
                                                        $codtextcolor = '#000000';
                                                    }
                                                ?>
                                                <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr($codtextcolor); ?>" name="cpiw_comman[codtextcolor]" value="<?php echo esc_attr($cpiw_comman['codtextcolor']); ?>"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                              Popup Background Color
                                            </th>
                                            <td>
                                                <?php 
                                                    if(!empty($cpiw_comman['popupbackcolor'])){
                                                        $popupbackcolor = '#ffffff';
                                                    }
                                                ?>
                                                <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr($popupbackcolor); ?>" name="cpiw_comman[popupbackcolor]" value="<?php echo esc_attr($cpiw_comman['popupbackcolor']); ?>"/>
                                            </td>
                                        </tr>
                                         <tr>
                                            <th>
                                              Popup text color
                                            </th>
                                            <td>
                                                <?php 
                                                    if(!empty($cpiw_comman['popuptextcolor'])){
                                                        $popuptextcolor = '#000000';
                                                    }
                                                ?>
                                                <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr($popuptextcolor); ?>" name="cpiw_comman[popuptextcolor]" value="<?php echo esc_attr($cpiw_comman['popuptextcolor']); ?>"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                              Popup Submit Button background color
                                            </th>
                                            <td>
                                                <?php 
                                                    if(!empty($cpiw_comman['submitbackcolor'])){
                                                        $submitbackcolor = '#000000';
                                                    }
                                                ?>
                                                <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr($submitbackcolor); ?>" name="cpiw_comman[submitbackcolor]" value="<?php echo esc_attr($cpiw_comman['submitbackcolor']); ?>"/>
                                            </td>
                                        </tr>
                                         <tr>
                                            <th>
                                              Popup Submit Button text color
                                            </th>
                                            <td>
                                                <?php 
                                                    if(!empty($cpiw_comman['submittextcolor'])){
                                                        $submittextcolor = '#ffffff';
                                                    }
                                                ?>
                                                <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr($submittextcolor); ?>" name="cpiw_comman[submittextcolor]" value="<?php echo esc_attr($cpiw_comman['submittextcolor']); ?>"/>
                                            </td>
                                        </tr>
                                    </table>  
                                </div> 
                            </div>
                        </div>
                        <div id="tab-general" class="tab-content">
                            <div class="postbox">
                                <div class="postbox-header">
                                    <h2>Check Pincode Text Setting</h2>
                                </div>
                                <div class="inside">
                                    <table>
                                        <tr>
                                            <th>
                                              Pincode Input Placeholder Text
                                            </th>
                                            <td>
                                              <?php $cpiw_pincodeplace_text = $cpiw_comman['cpiw_pincodeplace_text']; ?>
                                              <input type="text" name="cpiw_comman[cpiw_pincodeplace_text]" class="regular-text" value="<?php echo esc_attr($cpiw_pincodeplace_text); ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                              Check Availability At Text
                                            </th>
                                            <td>
                                              <?php $cpiw_checkavail_text = $cpiw_comman['cpiw_checkavail_text']; ?>
                                              <input type="text" name="cpiw_comman[cpiw_checkavail_text]" class="regular-text" value="<?php echo esc_attr($cpiw_checkavail_text); ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                              Delivery Date Text
                                            </th>
                                            <td>
                                              <?php $cpiw_delivery_date_text = $cpiw_comman['cpiw_delivery_date_text']; ?>
                                              <input type="text" name="cpiw_comman[cpiw_delivery_date_text]" class="regular-text" value="<?php echo esc_attr($cpiw_delivery_date_text); ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                              PlaceOrder Text If pincode Wrong
                                            </th>
                                            <td>
                                              <?php $cpiw_place_order_button_txt= $cpiw_comman['cpiw_place_order_button_txt']; ?>
                                              <input type="text" name="cpiw_comman[cpiw_place_order_button_txt]" class="regular-text" value="<?php echo esc_attr($cpiw_place_order_button_txt); ?>">
                                            </td>
                                        </tr>
                                    </table>  
                                </div> 
                            </div>
                             <div class="postbox">
                                <div class="postbox-header">
                                    <h2>Popup Text Setting</h2>
                                </div>
                                <div class="inside">
                                    <table>
                                        <tr>
                                            <th>
                                              Check your location availability info Text
                                            </th>
                                            <td>
                                              <?php $cpiw_checklocationtext_text = $cpiw_comman['cpiw_checklocationtext_text']; ?>
                                              <input type="text" name="cpiw_comman[cpiw_checklocationtext_text]" class="regular-text" value="<?php echo esc_attr($cpiw_checklocationtext_text); ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                             Popup Submit Button Text
                                            </th>
                                            <td>
                                              <?php $cpiw_cpopsubmit_text = $cpiw_comman['cpiw_cpopsubmit_text']; ?>
                                              <input type="text" name="cpiw_comman[cpiw_cpopsubmit_text]" class="regular-text" value="<?php echo esc_attr($cpiw_cpopsubmit_text); ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                             Popupinput placeholder Text
                                            </th>
                                            <td>
                                              <?php $cpiw_cpopplaceholder_text = $cpiw_comman['cpiw_cpopplaceholder_text']; ?>
                                              <input type="text" name="cpiw_comman[cpiw_cpopplaceholder_text]" class="regular-text" value="<?php echo esc_attr($cpiw_cpopplaceholder_text); ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                              Popup Available Text
                                            </th>
                                            <td>
                                              <?php $cpiw_popavailabletext = $cpiw_comman['cpiw_popavailabletext']; ?>
                                              <input type="text" name="cpiw_comman[cpiw_popavailabletext]" class="regular-text" value="<?php echo esc_attr($cpiw_popavailabletext); ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                             Empty Field Text
                                            </th>
                                            <td>
                                              <?php $cpiw_emptyfield_text = $cpiw_comman['cpiw_emptyfield_text']; ?>
                                              <input type="text" name="cpiw_comman[cpiw_emptyfield_text]" class="regular-text" value="<?php echo esc_attr($cpiw_emptyfield_text); ?>">
                                            </td>
                                        </tr>
                                    </table>  
                                </div> 
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="action" value="cpiw_save_option">
                    <input type="submit" value="Save changes" name="submit" class="button-primary" id="cpiw_btn_space">
                </form>
            </div>
        </div>  
    <?php
}


function  CPIW_ImageUploader($name, $value = '') {
        ?>
        <div>
            
                <?php
                echo '<a href="#"  class="misha_upload_image_button">';
                if( $image_attributes = wp_get_attachment_image_src( $value,'full') ) {
                    echo '<img src="' . esc_attr($image_attributes[0]) . '" style="width:50px;height:50px;display:block;" />';
                }else{
                    echo 'Upload image';
                }
                echo '<input type="hidden" name="' . esc_attr($name) . '" id="' . esc_attr($name) . '" value="' . esc_attr($value) . '" />';
                echo '</a>';
                if( $image_attributes = wp_get_attachment_image_src( $value,'full') ) {
                   echo '<a href="#" class="misha_remove_image_button" style="display:inline-block;display:inline-block">Remove image</a>';
                }else{
                   echo '<a href="#" class="misha_remove_image_button" style="display:inline-block;display:none">Remove image</a>';
                }
                ?>

            
        </div>
        <?php
        

}