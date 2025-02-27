<?php

if (!defined('ABSPATH')){
  exit;
}

function dsabafw_Query_get($tablename,$type,$userid,$id = NULL,$count=NULL){
    global $wpdb;
    if($count == 1){
    
        $results = $wpdb->get_results( $wpdb->prepare( "SELECT count(*) as count FROM `$tablename` WHERE `type`=%s  AND `userid`=%d",$type,$userid));
    } else{

      if(isset($id)){
          $results = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM `$tablename` WHERE `type`=%s  AND `userid`=%d AND `id`= %d",$type,$userid,$id));
      }else{
        $results = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM `$tablename` WHERE `type`=%s  AND `userid`=%d",$type,$userid));
      }

    }
    return   $results;
}
function dsabafw_delete_Query_get($tablename,$delete_id){
  global $wpdb;
     
    $resultss =  $wpdb->query($wpdb->prepare("DELETE FROM `$tablename` WHERE `id`= %d", $delete_id));
        return   $resultss;
   
}



// Change Addresses Tab End Point My Account Page
function get_adress_book_endpoint_url( $address_book ) {
  $url = wc_get_endpoint_url( 'edit-address', 'shipping', get_permalink() );
  return add_query_arg( 'address-book', $address_book, $url );
}

// Change Addresses Tab Name On My Account Page
function dsabafw_wc_address_book_add_to_menu( $items ) {
  foreach ( $items as $key => $value ) {
    if ( 'edit-address' === $key ) {
      $items[ $key ] = __( 'Address Book', 'woo-address-book' );
    }
  }
  return $items;
}

// For Popup Html
function dsabafw_popup_div_footer() {
  global $dsabafw_comman;
  ?>
  <div id="dsabafw_billing_popup" class="dsabafw_billing_popup_class">
  </div>
  <div id="dsabafw_shipping_popup" class="dsabafw_shipping_popup_class">
  </div>
  <?php
  $user_id  = get_current_user_id();
  global $wpdb;
  $tablename=$wpdb->prefix.'dsabafw_billingadress';
 // $user = $wpdb->get_results( "SELECT * FROM {$tablename} WHERE type='billing' AND userid=".$user_id);
  $user = dsabafw_Query_get($tablename ,'billing' ,$user_id );
  if($dsabafw_comman['dsabafw_enable_different_billing_adress'] == 'yes'){
    ?>
    <div id="address_selection_popup_main" class="address_selection_popup_main">
      <div class="billing_popup_header">
        <h3>Choice Billing Address</h3>
      </div>
      <div class="address_selection_popup_inner">
        <span class="dsabafw_close_choice_section">×</span>
        <div class="address_selection_popup_body">
          <?php
          if(!empty($user)){   
            foreach($user as $row){  

              $userdata_bil = $row->userdata;
              $user_data = unserialize($userdata_bil);
              ?>
              <div class="address_line">
                <div class="address_line_inner">
                  <h5><?php echo esc_attr($user_data['reference_field']);?></h5>
                  <ul>
                    <li><?php echo esc_attr($user_data['billing_first_name']) .'&nbsp'.esc_attr($user_data['billing_last_name']);?></li>
                    <li><?php echo esc_attr($user_data['billing_company']);?></li>
                    <li><?php echo esc_attr($user_data['billing_address_1']);?></li>
                    <li><?php echo esc_attr($user_data['billing_address_2']);?></li>
                    <li><?php echo esc_attr($user_data['billing_city']).'&nbsp'.esc_attr($user_data['billing_postcode']);?></li>
                    <li><?php echo esc_attr($user_data['billing_state']).', '.esc_attr($user_data['billing_country']);?></li>
                  </ul>
                  <div class="address_select_button">
                    <a href="javascript:void(0)" class="choice_address" data-id="<?php echo esc_attr($row->id); ?>">Choice This Address</a>
                  </div>
                </div>
              </div>
              <?php
            }
          }else{
            ?>
            <div class="billing_address_empty">
              <p class="billing_empty_message">You have no billing addresses.</p>
            </div>
            <?php
          }
          ?>
        </div>
      </div>
    </div>
    <?php 
    }    
    //$user = $wpdb->get_results( "SELECT * FROM {$tablename} WHERE type='shipping' AND userid=".$user_id);
    $user = dsabafw_Query_get($tablename ,'shipping' ,$user_id );
    if($dsabafw_comman['dsabafw_enable_different_shipping_adress'] == 'yes'){
    ?>
    <div id="shipping_address_selection_popup_main" class="shipping_address_selection_popup_main">
      <div class="shipping_popup_header">
        <h3>Choice Shipping Address</h3>
      </div>
      <div class="shipping_address_selection_popup_inner">
        <span class="shipping_dsabafw_close_choice_section">×</span>
        <div class="shipping_address_selection_popup_body">
          <?php
          if (!empty($user)) {
            foreach($user as $row){   
              $userdata_bil=$row->userdata;
              $user_data = unserialize($userdata_bil);
              ?>
              <div class="shipping_address_line">
                <div class="shipping_address_line_inner">
                  <h5><?php echo esc_attr($user_data['reference_field']);?></h5>
                  <ul>
                    <li><?php echo esc_attr($user_data['shipping_first_name']) .'&nbsp'.esc_attr($user_data['shipping_last_name']);?></li>
                    <li><?php echo esc_attr($user_data['shipping_company']);?></li>
                    <li><?php echo esc_attr($user_data['shipping_address_1']);?></li>
                    <li><?php echo esc_attr($user_data['shipping_address_2']);?></li>
                    <li><?php echo esc_attr($user_data['shipping_city']).'&nbsp'.esc_attr($user_data['shipping_postcode']);?></li>
                    <li><?php echo esc_attr($user_data['shipping_state']).', '.esc_attr($user_data['shipping_country']);?></li>
                  </ul>
                  <div class="shipping_address_select_button">
                    <a href="javascript:void(0)" class="choice_shipping_address" data-id="<?php echo esc_attr($row->id); ?>">Choice This Address</a>
                  </div>
                </div>
              </div>
              <?php
            }
          }else{
            ?>
            <div class="shipping_address_empty">
              <p class="shipping_empty_message">You have no shipping addresses.</p>
            </div>
            <?php
          }
          ?>
        </div>
      </div>
    </div>
    <?php   
  }  
}

// For My Account Page New Content
function dsabafw_my_account_endpoint_content() {  
  $user_id = get_current_user_id();
  // print_r($user_id);
  global $wpdb,$dsabafw_comman;
  $tablename=$wpdb->prefix.'dsabafw_billingadress';  
  //$user = $wpdb->get_results( "SELECT * FROM {$tablename} WHERE type='billing' AND userid=".$user_id);
  $user = dsabafw_Query_get($tablename ,'billing' ,$user_id );
  echo '<div class="dsabafwdefalte"></div>';
  echo '<div class="dsabafw_table_custom"> ';
  if($dsabafw_comman['dsabafw_enable_different_billing_adress'] == 'yes'){
    echo '<div class="dsabafw_table_bill">';
          ?>
      <div class="billling-button">
        <button class="form_option_billing " data-id="<?php echo esc_attr($user_id); ?>" style="background-color: <?php echo esc_attr($dsabafw_comman['dsabafw_btn_bg_clr']);?>; color: <?php echo esc_attr($dsabafw_comman['dsabafw_font_clr']);?>; padding: <?php echo esc_attr($dsabafw_comman['dsabafw_btn_padding']);?>; font-size: <?php echo esc_attr($dsabafw_comman['dsabafw_font_size'])."px" ?>;"><?php echo esc_html($dsabafw_comman['dsabafw_head_title']);?></button>
      </div>
      <?php
    echo '<h3>' . __('Modify Billing Address', 'different-shipping-and-billing-address-for-woocommerce') . '</h3>';
    if(!empty($user)){   
      foreach($user as $row){    
        $userdata_bil=$row->userdata;
        $defalt_addd=$row->Defalut;

        $user_data = unserialize($userdata_bil);  
        if($defalt_addd==1){
          $checked = "checkeddd";
        } else{
          $checked = "";
        } 
        ?>
        <div class="billing_address">
          <button class="defalut_address button wp-element-button wp-block-button__link <?php echo esc_attr($checked);?>"  data-value="<?php echo esc_attr($defalt_addd);?>" data-add_id="<?php echo esc_attr($row->id);?>"  data-type="billing">DefalutAddress</button><button class="form_option_edit wp-element-button wp-block-button__link" data-id="<?php echo esc_attr($user_id);?>"  data-eid-bil="<?php echo esc_attr($row->id);?>">edit</button>
          <button class="delete_bill_address wp-element-button wp-block-button__link" onclick="location.href='?action=delete_dsabafw&did=<?php echo esc_attr($row->id);?>'">Delete</button>
          <span class="billing_address_inner">
            <?php
            echo !empty($user_data['reference_field']) ? esc_attr($user_data['reference_field'])."<br>" : "";
echo (!empty($user_data['billing_first_name']) || !empty($user_data['billing_last_name'])) 
    ? esc_attr($user_data['billing_first_name']) .'&nbsp;'.esc_attr($user_data['billing_last_name'])."<br>" : "";
echo !empty($user_data['billing_company']) ? esc_attr($user_data['billing_company'])."<br>" : "";
echo !empty($user_data['billing_address_1']) ? esc_attr($user_data['billing_address_1'])."<br>" : "";
echo !empty($user_data['billing_address_2']) ? esc_attr($user_data['billing_address_2'])."<br>" : "";
echo (!empty($user_data['billing_city']) || !empty($user_data['billing_postcode'])) 
    ? esc_attr($user_data['billing_city'])." ".esc_attr($user_data['billing_postcode'])."<br>" : "";
echo (!empty($user_data['billing_state']) || !empty($user_data['billing_country'])) 
    ? esc_attr($user_data['billing_state']).', '.esc_attr($user_data['billing_country']) : "";

            ?>
          </span>
        </div>
        <?php
      }
    }else{
      ?>
      <div class="billing_address_empty">
        <p class="billing_empty_message">You have no billing addresses.</p>
      </div>
      <?php
    }
  ?>
    <div class="cus_menu">
    <?php
    if($dsabafw_comman['dsabafw_enable_different_billing_adress'] == 'yes'){
    }
    ?>
  </div>
  <?php
    echo '</div>';
  }
  //$user_shipping = $wpdb->get_results( "SELECT * FROM {$tablename} WHERE type='shipping' AND userid=".$user_id);
  $user_shipping = dsabafw_Query_get($tablename ,'shipping' ,$user_id );
  if($dsabafw_comman['dsabafw_enable_different_shipping_adress'] == 'yes'){
    echo '<div class="dsabafw_table_ship">';
        ?>
      <div class="shipping-button">
        <button class="form_option_shipping" data-id="<?php echo esc_attr($user_id); ?>" style="background-color: <?php echo esc_attr($dsabafw_comman['dsabafw_btn_bg_clr']);?>; color: <?php echo esc_attr($dsabafw_comman['dsabafw_font_clr']);?>; padding: <?php echo esc_attr($dsabafw_comman['dsabafw_btn_padding']);?>; font-size: <?php echo esc_attr($dsabafw_comman['dsabafw_font_size'])."px" ?>;"><?php echo esc_html($dsabafw_comman['dsabafw_head_title_ship']);?></button>
      </div>
      <?php  
    echo '<h3>' . __('Modify Shipping Address', 'different-shipping-and-billing-address-for-woocommerce') . '</h3>';
    if(!empty($user_shipping)){
      foreach($user_shipping as $row){    
        $userdata_ship=$row->userdata;
        $defalt_addd=$row->Defalut;
         if($defalt_addd==1){
          $checked = "checkeddd";
        } else{
          $checked = "";
        }
        $user_data = unserialize($userdata_ship);  
        ?>
        <div class="shipping_address">
          <button class="defalt_addd_shipping button wp-element-button wp-block-button__link <?php echo esc_attr($checked);?>"  data-value="<?php echo esc_attr($defalt_addd);?>" data-add_id="<?php echo esc_attr($row->id);?>"  data-type="shipping">DefalutAddress</button><button class="form_option_ship_edit wp-element-button wp-block-button__link" data-id="<?php echo esc_attr($user_id);?>"  data-eid-ship="<?php echo esc_attr($row->id);?>">edit</button>
          <button class="delete_ship_address  wp-element-button wp-block-button__lin" onclick="location.href='?action=delete_ship&did-ship=<?php echo esc_attr($row->id);?>'"> Delete</button>
          <span class="shipping_address_inner">
            <?php 
            echo !empty($user_data['reference_field']) ? esc_attr($user_data['reference_field'])."<br>" : "";
            echo (!empty($user_data['shipping_first_name']) || !empty($user_data['shipping_last_name'])) 
                ? esc_attr($user_data['shipping_first_name']) .'&nbsp;'.esc_attr($user_data['shipping_last_name'])."<br>" : "";
            echo !empty($user_data['shipping_company']) ? esc_attr($user_data['shipping_company'])."<br>" : "";
            echo !empty($user_data['shipping_address_1']) ? esc_attr($user_data['shipping_address_1'])."<br>" : "";
            echo !empty($user_data['shipping_address_2']) ? esc_attr($user_data['shipping_address_2'])."<br>" : "";
            echo (!empty($user_data['shipping_city']) || !empty($user_data['shipping_postcode'])) 
                ? esc_attr($user_data['shipping_city'])." ".esc_attr($user_data['shipping_postcode'])."<br>" : "";
            echo (!empty($user_data['shipping_state']) || !empty($user_data['shipping_country'])) 
                ? esc_attr($user_data['shipping_state']).', '.esc_attr($user_data['shipping_country']) : "";
            ?>
          </span>
        </div>
        <?php
      }      
    }else{
      ?>
      <div class="shipping_address_empty">
          <p class="shipping_empty_message">You have no shipping addresses.</p>
      </div>
      <?php
    }
    ?>
    <div class="cus_menu">
    <?php
    if($dsabafw_comman['dsabafw_enable_different_shipping_adress'] == 'yes'){

    }
    ?>
  </div>
    <?php
    echo '</div>';
  }
  echo '</div>';
}

// For Billing Popup Ajax Html Return
function dsabafw_billing_popup_open() {
  global $wpdb,$dsabafw_comman;

  $user_id = sanitize_text_field($_REQUEST['popup_id_pro']);
  $edit_id = sanitize_text_field( $_REQUEST['eid-bil']);
  $tablename = $wpdb->prefix.'dsabafw_billingadress'; 
  if(empty($edit_id)){
    //$user = $wpdb->get_results( "SELECT count(*) as count FROM {$tablename} WHERE type='billing'  AND userid=".$user_id );
    $user = dsabafw_Query_get($tablename ,'billing' ,$user_id,0, 1);   
    $save_adress=$user[0]->count;
    $max_count= $dsabafw_comman['dsabafw_max_adress'];
    if($save_adress >= $max_count){
      echo '<div class="dsabafw_modal-content">';
      echo '<span class="dsabafw_close">&times;</span>';
      echo "<h3 class='dsabafw_border'>you can add maximum  ".esc_html($dsabafw_comman['dsabafw_max_adress'])." addresses !</h3>";
      echo '</div>';
      echo '</div>';
    }else{
      echo '<div class="dsabafw_modal-content">';
      echo '<span class="dsabafw_close">&times;</span>';
      $address_fields = wc()->countries->get_address_fields(get_user_meta(get_current_user_id(), 'billing_country', true));
      ?>
      <form method="post" id="dsabafw_add_billing_form">
        <div class="dsabafw_woocommerce-address-fields">
          <div class="dsabafw_woocommerce-address-fields_field-wrapper">
            <input type="hidden" name="type"  value="billing">
            <p class="form-row form-row-wide" id="reference_field" data-priority="30">
              <label for="reference_field" class="">
                <b>Reference Name:</b>
                <abbr class="required" title="required">*</abbr>
              </label>
              <span class="woocommerce-input-wrapper">
                <input type="text" class="input-text" name="reference_field" id="dsabafw_refname">
              </span>
            </p>
            <?php
            foreach ($address_fields as $key => $field) {
              woocommerce_form_field($key, $field, wc_get_post_data_by_key($key));
            }
            ?>
             <button type="submit" name="add_billing" id="dsabafw_add_billing_form_submit" class="button wp-element-button wp-block-button__link" value="dsabafw_billpp_save_option">Save Address</button>
          </div>

        </div>
      </form>
      <?php    
      echo '</div>';
      echo '</div>';
    }
  }else{
    // echo $edit_id;
    ob_start();
    ?>
    <div class="dsabafw_modal-content">
      <span class="dsabafw_close">&times;</span> 
      <?php
      $user = $wpdb->get_results( "SELECT * FROM {$tablename} WHERE type='billing' AND userid=".$user_id." AND id=".$edit_id);
      $user_data = unserialize($user[0]->userdata);
      $address_fields = wc()->countries->get_address_fields(get_user_meta(get_current_user_id(), 'billing_country', true));
      ?>
      <form method="post" id="dsabafw_edit_billing_form">
        <div class="dsabafw_woocommerce-address-fields">
          <div class="dsabafw_woocommerce-address-fields_field-wrapper">
            <input type="hidden" name="userid"  value="<?php echo esc_attr($user_id); ?>">
            <input type="hidden" name="edit_id"  value= "<?php echo  esc_attr($edit_id); ?>">
            <input type="hidden" name="type"  value="billing">
            <p class="form-row form-row-wide" id="reference_field" data-priority="30">
              <label for="reference_field" class="">
                <b>Reference Name:</b>
                <abbr class="required" title="required">*</abbr>
              </label>
              <span class="woocommerce-input-wrapper">
                <input type="text" class="input-text" id="dsabafw_refname" name="reference_field" value="<?php echo esc_attr($user_data['reference_field']); ?>">
              </span>
            </p>
            <?php
              foreach ($address_fields as $key => $field) {  
                woocommerce_form_field($key, $field, $user_data[$key]);
              }
            ?>
            <button type="submit" name="add_billing_edit" id="dsabafw_edit_billing_form_submit" class="button wp-element-button wp-block-button__link" value="dsabafw_billpp_save_option">Update Address</button>   
         
          </div>
        </div>
      </form>                  
    </div>
    </div>
    <?php
    $edit_html = ob_get_clean();
    $return_arr[] = array("html" => $edit_html);
    echo json_encode($return_arr);
  }
  die();   
}

// For Shipping Popup Ajax Html Return
function dsabafw_shipping_popup_open() {
  global $wpdb, $dsabafw_comman;

  // Sanitize and validate input
  $user_id = intval($_REQUEST['popup_id_pro']);
  $edit_id = intval($_REQUEST['eid-ship']);
  $tablename = $wpdb->prefix . 'dsabafw_billingadress';

  // If editing an address
  if (!empty($edit_id)) {
      echo '<div class="dsabafw_modal-content">';
      echo '<span class="dsabafw_close">&times;</span>';

      // Fetch existing address details
      $query = $wpdb->prepare(
          "SELECT * FROM {$tablename} WHERE type = %s AND userid = %d AND id = %d",
          'shipping',
          $user_id,
          $edit_id
      );
      $user = $wpdb->get_results($query);

      if (!empty($user)) {
          $user_data = unserialize($user[0]->userdata);
          $countries = new WC_Countries();
          $country = $countries->get_base_country();
          $address_fields = WC()->countries->get_address_fields($country, 'shipping_');
          ?>

          <form method="post" id="dsabafw_edit_shipping_form">
              <div class="dsabafw_woocommerce-address-fields">
                  <div class="dsabafw_woocommerce-address-fields_field-wrapper">
                      <input type="hidden" name="type" value="shipping">
                      <input type="hidden" name="userid" value="<?php echo esc_attr($user_id); ?>">
                      <input type="hidden" name="edit_id" value="<?php echo esc_attr($edit_id); ?>">
                      <p class="form-row form-row-wide" id="reference_field" data-priority="30">
                          <label for="reference_field" class="">
                              <b>Reference Name:</b>
                              <abbr class="required" title="required">*</abbr>
                          </label>
                          <span class="woocommerce-input-wrapper">
                              <input type="text" class="input-text" id="dsabafw_refname" name="reference_field"
                                     value="<?php echo esc_attr($user_data['reference_field']); ?>">
                          </span>
                      </p>
                      <?php
                      foreach ($address_fields as $key => $field) {
                          woocommerce_form_field($key, $field, $user_data[$key]);
                      }
                      ?>
                      <button type="submit" name="add_shipping_edit" class="button wp-element-button wp-block-button__link"
                              id="dsabafw_edit_shipping_form_submit" value="dsabafw_shippp_save_optionn">
                          Update Address
                      </button>
                  </div>
              </div>
          </form>
          <?php
      } else {
          echo '<h3 class="dsabafw_border">Error: Address not found.</h3>';
      }
      echo '</div>';
      die();
  }

  // If adding a new address
  $query = $wpdb->prepare(
      "SELECT count(*) as count FROM {$tablename} WHERE type = %s AND userid = %d",
      'shipping',
      $user_id
  );
  $user = $wpdb->get_results($query);

  $save_address = !empty($user) ? intval($user[0]->count) : 0;
  $max_count = intval($dsabafw_comman['dsabafw_max_shipping_adress']);

  if ($save_address >= $max_count) {
      echo '<div class="dsabafw_modal-content">';
      echo '<span class="dsabafw_close">&times;</span>';
      echo "<h3 class='dsabafw_border'>You can add maximum " . esc_html($max_count) . " addresses!</h3>";
      echo '</div>';
      die();
  } else {
      echo '<div class="dsabafw_modal-content">';
      echo '<span class="dsabafw_close">&times;</span>';
      $countries = new WC_Countries();
      $country = $countries->get_base_country();
      $address_fields = WC()->countries->get_address_fields($country, 'shipping_');
      ?>

      <form method="post" id="dsabafw_add_shipping_form">
          <div class="dsabafw_woocommerce-address-fields">
              <div class="dsabafw_woocommerce-address-fields_field-wrapper">
                  <input type="hidden" name="type" value="shipping">
                  <p class="form-row form-row-wide" id="reference_field" data-priority="30">
                      <label for="reference_field" class="">
                          <b>Reference Name:</b>
                          <abbr class="required" title="required">*</abbr>
                      </label>
                      <span class="woocommerce-input-wrapper">
                          <input type="text" class="input-text" id="dsabafw_refname" name="reference_field">
                      </span>
                  </p>
                  <?php
                  foreach ($address_fields as $key => $field) {
                      woocommerce_form_field($key, $field, wc_get_post_data_by_key($key));
                  }
                  ?>
                  <button type="submit" name="add_shipping" id="dsabafw_add_shipping_form_submit" class="button wp-element-button wp-block-button__link"
                          value="dsabafw_shippp_save_optionn">Save Address
                  </button>
              </div>
          </div>
      </form>
      <?php
      echo '</div>';
      die();
  }
}

/* Billigdata */          
function dsabafw_billing_data_select(){
  global $wpdb;
  $user_id = get_current_user_id();
  $select_id = sanitize_text_field($_REQUEST['sid']);
  $tablename=$wpdb->prefix.'dsabafw_billingadress'; 
  $user = $wpdb->get_results( "SELECT * FROM {$tablename} WHERE type='billing' AND userid=".$user_id." AND id=".$select_id);
  $user_data = unserialize($user[0]->userdata);
  echo json_encode($user_data);
  exit();
}

/* Shippingdata */
function dsabafw_shipping_data_select(){
  $user_id = get_current_user_id();
  $select_id = sanitize_text_field($_REQUEST['sid']);
  global $wpdb;
  $tablename=$wpdb->prefix.'dsabafw_billingadress'; 
  $user = $wpdb->get_results( "SELECT * FROM {$tablename} WHERE type='shipping' AND userid=".$user_id." AND id=".$select_id);
  $user_data = unserialize($user[0]->userdata);
  echo json_encode($user_data);
  exit();
}

// if (isset($_COOKIE['billing_data'])) {
//   $billing_data = unserialize(stripslashes($_COOKIE['billing_data']));
//   print_r($billing_data);  // Output the data for debugging
// } else {
//   echo "No billing data found in cookies.";
// }



function DSABAFW_all_billing_address() {
  $user_id = get_current_user_id();
  global $wpdb, $dsabafw_comman;
  $tablename = $wpdb->prefix . 'dsabafw_billingadress';

  // Check if the user is logged in
  
      if ($dsabafw_comman['dsabafw_enable_different_billing_adress'] == 'yes') {
          ?>
          <div class="dsabafw_selectt">
              <select class="dsabafw_select">
                  <option value="">...Choose address...</option>
                  <?php
                  if (is_user_logged_in()) {
                    $user = $wpdb->get_results("SELECT * FROM {$tablename} WHERE type='billing' AND userid=" . $user_id);

                  foreach ($user as $row) {  
                      $userdata_bil = $row->userdata;
                      $user_data = unserialize($userdata_bil);
                      $valid = ($row->Defalut == 1) ? "selected" : ""; 
                      ?>
                      <option value="<?php echo esc_attr($row->id); ?>" <?php echo esc_attr($valid); ?> 
                          data-first-name="<?php echo esc_attr($user_data['billing_first_name']); ?>"
                          data-last-name="<?php echo esc_attr($user_data['billing_last_name']); ?>"
                          data-company="<?php echo esc_attr($user_data['billing_company']); ?>"
                          data-country="<?php echo esc_attr($user_data['billing_country']); ?>"
                          data-address1="<?php echo esc_attr($user_data['billing_address_1']); ?>"
                          data-address2="<?php echo esc_attr($user_data['billing_address_2']); ?>"
                          data-city="<?php echo esc_attr($user_data['billing_city']); ?>"
                          data-state="<?php echo esc_attr($user_data['billing_state']); ?>"
                          data-postcode="<?php echo esc_attr($user_data['billing_postcode']); ?>"
                          data-phone="<?php echo esc_attr($user_data['billing_phone']); ?>"
                          data-email="<?php echo esc_attr($user_data['billing_email']); ?>">
                          <?php echo esc_html($user_data['reference_field']); ?>
                      </option>
                  <?php 
                  }
                } else { 
                  $user = [];
                  if (isset($_COOKIE['dsabafw_guest_user_data'])) {
                    // Decode the existing cookie value
                    $user = json_decode(stripslashes($_COOKIE['dsabafw_guest_user_data']), true);
    
                    foreach ($user as $key => $row) {
                      if($row['type'] === 'billing') {
                        $userdata_bil = $row['userdata'];
                        $user_data = unserialize($userdata_bil);
                        ?>
                        <option value="<?php echo esc_attr($key); ?>"
                            data-first-name="<?php echo esc_attr($user_data['shipping_first_name']); ?>"
                            data-last-name="<?php echo esc_attr($user_data['shipping_last_name']); ?>"
                            data-company="<?php echo esc_attr($user_data['shipping_company']); ?>"
                            data-country="<?php echo esc_attr($user_data['shipping_country']); ?>"
                            data-address1="<?php echo esc_attr($user_data['shipping_address_1']); ?>"
                            data-address2="<?php echo esc_attr($user_data['shipping_address_2']); ?>"
                            data-city="<?php echo esc_attr($user_data['shipping_city']); ?>"
                            data-state="<?php echo esc_attr($user_data['shipping_state']); ?>"
                            data-postcode="<?php echo esc_attr($user_data['shipping_postcode']); ?>">
                            <?php echo esc_html($user_data['reference_field']); ?>
                        </option>
                        <?php 
                      }
    
                    }
                  }              
                }
                   ?>
              </select>
              <button class="form_option_billing" data-id="<?php echo esc_attr($user_id); ?>" 
                  style="background-color: <?php echo esc_attr($dsabafw_comman['dsabafw_btn_bg_clr']);?>; 
                  color: <?php echo esc_attr($dsabafw_comman['dsabafw_font_clr']);?>; 
                  padding: <?php echo esc_attr($dsabafw_comman['dsabafw_btn_padding']);?>; 
                  font-size: <?php echo esc_attr($dsabafw_comman['dsabafw_font_size'])."px"; ?>;">
                  <?php echo esc_html($dsabafw_comman['dsabafw_head_title']); ?>
              </button>
          </div>
          <?php
      }

}

// For All Shipping Address Section
function DSABAFW_all_shipping_address(){
  $user_id  = get_current_user_id();
  global $wpdb,$dsabafw_comman;
  $tablename=$wpdb->prefix.'dsabafw_billingadress';  

    if($dsabafw_comman['dsabafw_enable_different_shipping_adress'] == 'yes'){
        ?>
        <div  class="dsabafw_select_shippingg">
        <select class="dsabafw_select_shipping">
          <option value="">...Choose address...</option>
          <?php
            if (is_user_logged_in()) {
              $user = $wpdb->get_results("SELECT * FROM {$tablename} WHERE type='shipping' AND userid=" . $user_id);

              foreach ($user as $row) {
                $valid = ($row->Defalut == 1) ? "selected" : ""; 
                $userdata_ship = $row->userdata;
                $user_data = unserialize($userdata_ship);
                ?>
                <option value="<?php echo esc_attr($row->id); ?>" <?php echo esc_attr($valid); ?>
                    data-first-name="<?php echo esc_attr($user_data['shipping_first_name']); ?>"
                    data-last-name="<?php echo esc_attr($user_data['shipping_last_name']); ?>"
                    data-company="<?php echo esc_attr($user_data['shipping_company']); ?>"
                    data-country="<?php echo esc_attr($user_data['shipping_country']); ?>"
                    data-address1="<?php echo esc_attr($user_data['shipping_address_1']); ?>"
                    data-address2="<?php echo esc_attr($user_data['shipping_address_2']); ?>"
                    data-city="<?php echo esc_attr($user_data['shipping_city']); ?>"
                    data-state="<?php echo esc_attr($user_data['shipping_state']); ?>"
                    data-postcode="<?php echo esc_attr($user_data['shipping_postcode']); ?>">
                    <?php echo esc_html($user_data['reference_field']); ?>
                </option>
                <?php 
              } 
            }else { 
              $user = [];
              if (isset($_COOKIE['dsabafw_guest_user_data'])) {
                // Decode the existing cookie value
                $user = json_decode(stripslashes($_COOKIE['dsabafw_guest_user_data']), true);

                foreach ($user as $key => $row) {
                  if($row['type'] === 'shipping') {
                    $userdata_ship = $row['userdata'];
                    $user_data = unserialize($userdata_ship);
                    ?>
                    <option value="<?php echo esc_attr($key); ?>"
                        data-first-name="<?php echo esc_attr($user_data['shipping_first_name']); ?>"
                        data-last-name="<?php echo esc_attr($user_data['shipping_last_name']); ?>"
                        data-company="<?php echo esc_attr($user_data['shipping_company']); ?>"
                        data-country="<?php echo esc_attr($user_data['shipping_country']); ?>"
                        data-address1="<?php echo esc_attr($user_data['shipping_address_1']); ?>"
                        data-address2="<?php echo esc_attr($user_data['shipping_address_2']); ?>"
                        data-city="<?php echo esc_attr($user_data['shipping_city']); ?>"
                        data-state="<?php echo esc_attr($user_data['shipping_state']); ?>"
                        data-postcode="<?php echo esc_attr($user_data['shipping_postcode']); ?>">
                        <?php echo esc_html($user_data['reference_field']); ?>
                    </option>
                    <?php 
                  }

                }
              }              
            }
          ?>
        </select>
        <button class="form_option_shipping" data-id="<?php echo esc_attr($user_id); ?>" style="background-color: <?php echo esc_attr($dsabafw_comman['dsabafw_btn_bg_clr']);?>; color: <?php echo esc_attr($dsabafw_comman['dsabafw_font_clr']);?>; padding: <?php echo esc_attr($dsabafw_comman['dsabafw_btn_padding']);?>; font-size: <?php echo esc_attr($dsabafw_comman['dsabafw_font_size'])."px" ?>;"><?php echo esc_html($dsabafw_comman['dsabafw_head_title_ship']);?></button>
      </div>
      <?php
  }
}

// For Delete Address
function DSABAFW_save_optionsss(){
  global $wpdb; 
  $tablename=$wpdb->prefix.'dsabafw_billingadress';
   
  if( isset($_REQUEST['action']) && $_REQUEST['action']=="delete_dsabafw"){
    $delete_id=sanitize_text_field($_REQUEST['did']);
    //$sql = "DELETE  FROM {$tablename} WHERE id='".$delete_id."'" ;
    dsabafw_delete_Query_get($tablename,$delete_id);
    //$wpdb->query($sql);
    wp_safe_redirect( wc_get_endpoint_url( 'edit-address', '', wc_get_page_permalink( 'myaccount' ) ) );
    exit;
  }  

  if(isset($_REQUEST['action']) && $_REQUEST['action']=="delete_ship"){
    $delete_id=sanitize_text_field($_REQUEST['did-ship']);
    dsabafw_delete_Query_get($tablename,$delete_id);
    //$sql = "DELETE  FROM {$tablename} WHERE id='".$delete_id."'" ;
    
    //$wpdb->query($sql);
    wp_safe_redirect( wc_get_endpoint_url( 'edit-address', '', wc_get_page_permalink( 'myaccount' ) ) );
    exit;
  }             
}

// For Validation Billing Form Fields Popup
function dsabafw_validate_billing_form_fields_func() {  
  global $wpdb; 
  $tablename=$wpdb->prefix.'dsabafw_billingadress';
  
  $address_fields = wc()->countries->get_address_fields(get_user_meta(get_current_user_id(), 'billing_country', true));

  $dsabafw_userid = get_current_user_id();

  $billing_data = array();
  $field_errors = array();

  $billing_data['reference_field'] = sanitize_text_field($_REQUEST['reference_field']);

  if($_REQUEST['reference_field'] == '') {
    $field_errors['dsabafw_refname'] = '1';
  }

  foreach ($address_fields as $key => $field) {
    $billing_data[$key] = sanitize_text_field($_REQUEST[$key]);
    if($_REQUEST[$key] == '') {
      if($field['required'] == 1) {
        $field_errors[$key] = '1';
      }
    }
  }

  unset($field_errors['billing_state']);



  if (empty($field_errors)) {
    $billing_data_serlized = serialize($billing_data);
    
    if (is_user_logged_in()) {
        $wpdb->insert(
            $tablename, 
            array(
                'userid'   => $dsabafw_userid, 
                'userdata' => $billing_data_serlized, 
                'type'     => sanitize_text_field($_REQUEST['type'])
            )
        );
    } else {
      // Check if the cookie exists
      if (isset($_COOKIE['dsabafw_guest_user_data'])) {
        // Decode the existing cookie value
        $existing_cookie_data = json_decode(stripslashes($_COOKIE['dsabafw_guest_user_data']), true);
        
        // Append the new data to the existing data
        $cookie_data = array(
            'userid'   => $dsabafw_userid,
            'userdata' => $billing_data_serlized,
            'type'     => sanitize_text_field($_REQUEST['type'])
        );
        
        // Merge existing data with new data
        $existing_cookie_data[] = $cookie_data;
        
        // Convert the updated array to JSON for storage in cookie
        $cookie_value = json_encode($existing_cookie_data);
        
        // Set the updated cookie
        setcookie('dsabafw_guest_user_data', $cookie_value, time() + (7 * 24 * 60 * 60), "/");
      } else {
        // If the cookie doesn't exist, create a new one
        $cookie_data = array(
            'userid'   => $dsabafw_userid,
            'userdata' => $billing_data_serlized,
            'type'     => sanitize_text_field($_REQUEST['type'])
        );
        
        // Convert array to JSON format for storage in a cookie
        $cookie_value = json_encode(array($cookie_data)); // Store data as an array
        
        // Set cookie with 7-day expiration
        setcookie('dsabafw_guest_user_data', $cookie_value, time() + (7 * 24 * 60 * 60), "/");
      }
    }

    $added = 'true';
} else {
    $added = 'false';
}

// Return response as JSON
$return_arr = array("added" => $added, "field_errors" => $field_errors);
echo json_encode($return_arr);
exit;

}



// For Validation Shipping Form Fields Popup
function dsabafw_validate_shipping_form_fields_func() {
  global $wpdb; 

  $tablename = $wpdb->prefix . 'dsabafw_billingadress';
  $countries = new WC_Countries();
  $country = $countries->get_base_country();
  $address_fields = WC()->countries->get_address_fields( $country, 'shipping_' );

  $dsabafw_userid = get_current_user_id();
  $billing_data = array();
  $field_errors = array();

  $billing_data['reference_field'] = sanitize_text_field($_REQUEST['reference_field']);

  if ($_REQUEST['reference_field'] == '') {
    $field_errors['dsabafw_refname'] = '1';
  }

  foreach ($address_fields as $key => $field) {
    $billing_data[$key] = sanitize_text_field($_REQUEST[$key]);

    if ($_REQUEST[$key] == '') {
      if ($field['required'] == 1) {
        $field_errors[$key] = '1';
      }
    }
  }

  unset($field_errors['shipping_state']);

  // If there are no errors, proceed
  if (empty($field_errors)) {
    $billing_data_serlized = serialize($billing_data);

    // For logged-in users: Check if an address already exists in the database
    if (is_user_logged_in()) {
        $wpdb->insert(
          $tablename, 
          array(
            'userid'   => $dsabafw_userid, 
            'userdata' => $billing_data_serlized, 
            'type'     => sanitize_text_field($_REQUEST['type'])
          )
        );
    } else {
      // For guest users: Check if an address already exists in the cookie
      if (isset($_COOKIE['dsabafw_guest_user_data'])) {
        $existing_cookie_data = json_decode(stripslashes($_COOKIE['dsabafw_guest_user_data']), true);

        $address_exists = false;

        // Check if any existing guest address matches the current address
        foreach ($existing_cookie_data as $cookie_entry) {
          if ($cookie_entry['userdata'] == $billing_data_serlized) {
            $address_exists = true;
            break;
          }
        }

        if ($address_exists) {
          // Address already exists for this guest user
          $added = 'false';
        } else {
          // Append new address to the existing cookie data
          $cookie_data = array(
            'userid'   => $dsabafw_userid,
            'userdata' => $billing_data_serlized,
            'type'     => sanitize_text_field($_REQUEST['type'])
          );

          // Merge existing data with new data
          $existing_cookie_data[] = $cookie_data;

          // Update the cookie with the new data
          $cookie_value = json_encode($existing_cookie_data);
          setcookie('dsabafw_guest_user_data', $cookie_value, time() + (7 * 24 * 60 * 60), "/");

          $added = 'true';
        }
      } else {
        // If no existing cookie, create a new one
        $cookie_data = array(
          'userid'   => $dsabafw_userid,
          'userdata' => $billing_data_serlized,
          'type'     => sanitize_text_field($_REQUEST['type'])
        );

        // Convert array to JSON format for storage in a cookie
        $cookie_value = json_encode(array($cookie_data));

        // Set the cookie with 7-day expiration
        setcookie('dsabafw_guest_user_data', $cookie_value, time() + (7 * 24 * 60 * 60), "/");

        $added = 'true';
      }
    }
  } else {
    $added = 'false';
  }

  // Return response as JSON
  $return_arr = array("added" => $added, "field_errors" => $field_errors);
  echo json_encode($return_arr);
  exit;
}


// For Validation Edit Billing Form Fields
function dsabafw_validate_edit_billing_form_fields_funccc() {
  global $wpdb;
  $tablename = $wpdb->prefix.'dsabafw_billingadress';

  $address_fields = wc()->countries->get_address_fields(get_user_meta(get_current_user_id(), 'billing_country', true));

  $edit_id = sanitize_text_field($_REQUEST['edit_id']);

  $dsabafw_userid= get_current_user_id();

  $billing_data = array();
  $field_errors = array();

  $billing_data['reference_field'] = sanitize_text_field($_REQUEST['reference_field']);

  if($_REQUEST['reference_field'] == '') {
    $field_errors['dsabafw_refname'] = '1';
  }

  foreach ($address_fields as $key => $field) {
    $billing_data[$key] = sanitize_text_field($_REQUEST[$key]);

    if($_REQUEST[$key] == '') {
      if($field['required'] == 1) {
        $field_errors[$key] = '1';
      }
    }
  }
  unset($field_errors['billing_state']);

  if(empty($field_errors)) {
    $billing_data_serlized=serialize( $billing_data );
    $condition = array( 'id'=>$edit_id, 'userid' =>$dsabafw_userid, 'type' =>sanitize_text_field($_REQUEST['type']) );
    $wpdb->update($tablename, array( 'userdata' =>$billing_data_serlized),$condition);
    $added = 'true';
  } else {
    $added  = 'false';
  }

  $return_arr = array( "added" => $added, "field_errors" => $field_errors );
  echo json_encode($return_arr);
  exit;
}

// For Validation Edit Shipping Form Fields
function dsabafw_validate_edit_shipping_form_fields_funcssss() {
  global $wpdb; 
  $tablename=$wpdb->prefix.'dsabafw_billingadress';
  
  $edit_id = sanitize_text_field($_REQUEST['edit_id']);

  $countries = new WC_Countries();
  $country = $countries->get_base_country();

  $address_fields = WC()->countries->get_address_fields( $country, 'shipping_' );

  $dsabafw_userid= get_current_user_id();

  $billing_data = array();
  $field_errors = array();

  $billing_data['reference_field'] = sanitize_text_field($_REQUEST['reference_field']);

  if($_REQUEST['reference_field'] == '') {
    $field_errors['dsabafw_refname'] = '1';
  }

  foreach ($address_fields as $key => $field) {
    $billing_data[$key] = sanitize_text_field($_REQUEST[$key]);

    if($_REQUEST[$key] == '') {
      if($field['required'] == 1) {
        $field_errors[$key] = '1';
      }
    }
  }
  unset($field_errors['shipping_state']);

  if(empty($field_errors)) {
    $billing_data_serlized=serialize( $billing_data );

    $condition=array( 'id'=>$edit_id, 'userid' =>$dsabafw_userid, 'type' =>sanitize_text_field($_REQUEST['type']) );
    $wpdb->update($tablename,array( 'userdata' =>$billing_data_serlized),$condition);
    $added = 'true';
  } else {
    $added  = 'false';
  }

  $return_arr = array( "added" => $added, "field_errors" => $field_errors );
  echo json_encode($return_arr);
  exit;
}

// For Default Address Billing
function dsabafw_default_address(){
  global $wpdb; 

  $tablename=$wpdb->prefix.'dsabafw_billingadress';
  $defaltadd_id = sanitize_text_field($_REQUEST['defalteaddd_id']);
  $dealteadd_type = sanitize_text_field($_REQUEST['dealteadd_type']);
  $dsabafw_userid= get_current_user_id();

  $condition=array(
    'userid'=>$dsabafw_userid,
    'type'=>$dealteadd_type,
  );
  $wpdb->update( $tablename, array( 'Defalut' => '0' ), $condition );
  $condition=array( 'id' => $defaltadd_id, 'type' => $dealteadd_type );
  $wpdb->update( $tablename,array('Defalut' => '1'),$condition);
  exit;
}

// For Default Address Shipping
function dsabafw_default_address_shipping(){
  global $wpdb; 

  $tablename=$wpdb->prefix.'dsabafw_billingadress';
  $defaltadd_id = sanitize_text_field($_REQUEST['defalteaddd_id']);
  $dealteadd_type = sanitize_text_field($_REQUEST['dealteadd_type']);
  $dsabafw_userid= get_current_user_id();

  $condition=array( 'userid'=>$dsabafw_userid, 'type'=>$dealteadd_type, );
  $wpdb->update( $tablename, array( 'Defalut' => '0'),$condition);
  $condition=array( 'id'=>$defaltadd_id, 'type'=>$dealteadd_type );
  $wpdb->update( $tablename, array( 'Defalut' => '1' ),$condition);
  exit;
}


