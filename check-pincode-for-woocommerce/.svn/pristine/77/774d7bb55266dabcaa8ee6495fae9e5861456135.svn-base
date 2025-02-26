<?php
function CPIW_ZipcodeValidatorAfterAddtoCart() {
    global $cpiw_comman;  
    ?>
    <div class="cpiw_widget">
        <div class="cpiw_main" style="display: <?php echo isset($_COOKIE['Cpiw_Pincode']) && $_COOKIE['Cpiw_Pincode'] !== "no" ? 'none' : 'flex'; ?>; background-color: <?php echo esc_attr($cpiw_comman['mainbackcolor']); ?>;">
            <div class="cpiw_inner_first">
                <input type="text" name="checkpincode" class="checkpincode" value="" placeholder="<?php echo esc_attr($cpiw_comman['cpiw_pincodeplace_text']); ?>">
                <input type="button" name="checkpincodebutton" class="checkpincodebutton" value="Check" style="color: <?php echo esc_attr($cpiw_comman['checkandchangetxtcolor']); ?>; background-color: <?php echo esc_attr($cpiw_comman['checkandchangebackcolor']); ?>;">
            </div>
            <div class="cpiw_main_inner">
                <h3 style="color: <?php echo esc_attr($cpiw_comman['checkavailbilitycolor']); ?>">
                    <?php echo esc_html($cpiw_comman['cpiw_checkavail_text']); ?> 
                    <span class="Cpiw_avaicode">
                        <?php if (isset($_COOKIE['Cpiw_Pincode']) && $_COOKIE['Cpiw_Pincode'] != "no") { 
                            echo esc_html($_COOKIE['Cpiw_Pincode']); 
                        } ?>
                    </span>
                </h3>
            </div>
            <span class="wczp_empty"><?php echo esc_html($cpiw_comman['cpiw_emptyfield_text']); ?></span>
        </div>
        <div class="cpiwc_maindiv_popup"></div>
    </div>
    
    <div class="cpiw_inner">
        <div class="cpiw_inner_inner">
            <?php    
            if (isset($_COOKIE['Cpiw_Pincode'])) {
                $pincode = sanitize_text_field($_COOKIE['Cpiw_Pincode']);
                $cpiw_record = CPIW_PincodeCheckInDataTable($pincode);
                $cpiw_totalrecord = count($cpiw_record);

                if ($cpiw_totalrecord === 1) {
                    $date = $cpiw_record[0]->ddate;
                    $cod = $cpiw_record[0]->caseondilvery;
                    $deliverydate = CPIW_DeliveryDate($date);
                    $showdate = $cpiw_comman['cpiw_dateshow'];
                    $cpiw_cash_dilivery_shw = $cpiw_comman['cpiw_codshow'];
                    $delivery_text = $cpiw_comman['cpiw_delivery_date_text'];

                    $available_message = str_replace(
                        ["{city_name}", "{state_name}"],
                        ["<strong>" . esc_html($cpiw_record[0]->city) . "</strong>", "<strong>" . esc_html($cpiw_record[0]->state) . "</strong>"],
                        "YES, We Deliver to {city_name}, {state_name}"
                    );
                    ?>
                    <div class="pincode_city_and_state">
                        <p><?php echo wp_kses_post($available_message); ?></p>
                        <input type="button" name="cpiwbtn" class="cpiwcheckbtn" value="Change" style="color: <?php echo esc_attr($cpiw_comman['checkandchangetxtcolor']); ?>; background-color: <?php echo esc_attr($cpiw_comman['checkandchangebackcolor']); ?>;">
                    </div>
                    <div class="inner" style="background-color: <?php echo esc_attr($cpiw_comman['mainbackcolor']); ?>;">
                        <?php
                        if ($cod == 1) {
                            $cod_avail = 'Cash On Delivery Available';
                        } else {
                            $cod_avail = 'Cash On Delivery Not Available';
                        }

                        if ($showdate == "enable") {
                            echo '<div class="cpiw_avaitxt"><span class="cpiw_delicons">';
                            echo '<svg aria-hidden="true" width="30" height="30" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="vertical-align: text-bottom;">
                                    <path d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z"/>
                                </svg>';
                            echo '</span><div class="cpiw_avaddate" style="color:' . esc_attr($cpiw_comman['deliverydatetextcolor']) . ';">';
                            echo '<p>' . esc_html($delivery_text) . ' ' . esc_html($deliverydate) . '</p></div></div>';
                        }

                        if ($cpiw_cash_dilivery_shw == "enable") {
                            echo '<div class="cpiw_dlvrytxt" style="color:' . esc_attr($cpiw_comman['codtextcolor']) . ';">';
                            echo '<span class="cpiw_tficon">';
                            echo '<svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24">
                                    <path d="m24,1V0h-14.221c-1.572,0-3.128.322-4.57.947l-3.706,1.605c-.587.25-1.067.743-1.318,1.353-.252.619-.246,1.298.014,1.911.26.614.743,1.092,1.362,1.345.297.121.611.183.934.183.096,0,.189-.018.284-.029l-1.409,1.88c-.35.573-.456,1.245-.299,1.89.156.652.93,1.913,2.417,1.913.513,0,1.244-.304,1.513-.503v.005c0,.977.547,1.909,1.449,2.284,1.811.752,3.551-.567,3.551-2.284v-5c0-.827.673-1.5,1.5-1.5s1.5.673,1.5,1.5c0,.861-.971,1.579-1.547,1.929-1.413.85-1.875,2.693-1.03,4.108.538.902,1.525,1.463,2.578,1.463.542,0,1.073-.147,1.536-.424.384-.229,2.358-1.474,3.549-3.464.164-.273.893-1.559,1.206-2.112h4.708v-1h-5.292s-1.271,2.251-1.479,2.599c-1.091,1.822-2.991,2.991-3.205,3.119-1.216.726-3.113-.1-2.993-1.806.048-.689.453-1.32,1.038-1.687,1.644-1.033,2.279-2.313,1.748-3.628-.311-.771-.993-1.384-1.809-1.545-1.6-.316-3.007.906-3.007,2.45v4.952c0,.788-.591,1.483-1.377,1.544-.883.068-1.623-.568-1.623-2.7v-4.795c0-3.038,2.462-5.5,5.5-5.5h12.5ZM5,6.5v4.452l-.228.344c-.195.32-.54.565-.922.658-.163.039-.329.052-.491.039-.229-.02-.445-.092-.646-.215-.339-.206-.577-.535-.672-.927-.094-.387-.029-.789.154-1.094l2.83-3.774c-.014.172-.026.344-.026.518Zm1.437-4.068l-2.572,3.432-.766.355c-.377.161-.796.166-1.161.017-.372-.152-.662-.439-.819-.81-.156-.367-.159-.773-.009-1.143.15-.367.437-.663.787-.812l3.709-1.606c.694-.3,1.41-.519,2.141-.663-.491.349-.933.762-1.31,1.231h0Zm6.563,13.568h-6c-1.103,0-2,.897-2,2v6h10v-6c0-1.103-.897-2-2-2Zm1,7H6v-5c0-.551.448-1,1-1h6c.552,0,1,.449,1,1v5Zm-5.5-4h3v1h-3v-1Z"/>
                                </svg>';
                            echo '</span><div class="cpiw_avacod"><p>' . esc_html($cod_avail) . '</p></div></div>';
                        }
                        ?>
                    </div>
                    <?php 
                } else { ?>
                    <div class="pincode_not_availabels">
                        <p>We Are Not Servicing This Place</p>
                        <input type="button" name="cpiwbtn" class="cpiwcheckbtn" value="Change" style="color: <?php echo esc_attr($cpiw_comman['checkandchangetxtcolor']); ?>; background-color: <?php echo esc_attr($cpiw_comman['checkandchangebackcolor']); ?>;">
                    </div>
                <?php }
            } ?>
        </div>
    </div>
    <div class="pincode_not_availabel" style="display: none;">
        <p><?php echo esc_html('We Are Not Servicing This Place'); ?></p>
        <input type="button" name="cpiwbtn" class="cpiwcheckbtn" value="Change" style="color: <?php echo esc_attr($cpiw_comman['checkandchangetxtcolor']); ?>; background-color: <?php echo esc_attr($cpiw_comman['checkandchangebackcolor']); ?>;">
    </div>
    <?php
}
add_action('init', 'CPIW_enable_disable_plugin');
function CPIW_enable_disable_plugin() {
    global $cpiw_comman;
    if (!empty($cpiw_comman['cpiw_enable']) && $cpiw_comman['cpiw_enable'] === 'enable') {
        add_action('woocommerce_after_add_to_cart_button', 'CPIW_ZipcodeValidatorAfterAddtoCart');
    }
}
