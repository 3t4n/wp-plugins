<?php
/**
 * @link       https://www.floristone.com
 * @since      1.0.0
 *
 * @package    Florist_One_Flower_Delivery
 * @subpackage Florist_One_Flower_Delivery/public/partials
 */
?>

<h3><?php esc_html_e( 'Checkout', 'flower-delivery-by-florist-one' );?></h3>

<?php $dont_show_remove_button=1;
$config_options = get_option('florist-one-flower-delivery');

if (!function_exists('FD_FONE_selectOptions')){
  function FD_FONE_selectOptions($label, $delivery_dates, $id, $section ){
      switch ($label) {
        case "State*":
          if($section == "Bill To"){
            if(isset($_SESSION['florist-one-flower-delivery-customer-country'])){
              if(esc_html($_SESSION['florist-one-flower-delivery-customer-country'])=='US' || esc_html($_SESSION['florist-one-flower-delivery-customer-country'])=='CA'){
                echo "<option value=''>&#8212; " . __( 'Select', 'flower-delivery-by-florist-one' ) . " &#8212;</option>";
              } else {
                echo "<option value=''>&#8212; " .  __( 'Not Required', 'flower-delivery-by-florist-one' ) . " &#8212;</option>";
              }
            } else {
              echo "<option value=''>&#8212; " . __( 'Select', 'flower-delivery-by-florist-one' ) . " &#8212;</option>";
            }
          } else {
            echo "<option value=''>&#8212; " . __( 'Select', 'flower-delivery-by-florist-one' ) . "&#8212;</option>";
          }
          if($section == "Deliver To"){
            include 'recipient-state-list.php';
          } else {
            include 'customer-state-list.php';
          }
          break;
        case "Country*":
          echo "<option value=''>&#8212; " . __( 'Select', 'flower-delivery-by-florist-one' ) . " &#8212;</option>";
          if($section == "Bill To"){
            include 'customer-country-list.php';
          } else {
            echo "<option value='US'" . (esc_attr(isset($_SESSION[$id]) ? $_SESSION[$id] : "US" ) =='US'? 'selected="selected"' : '' ) . ">" . __( 'United States', 'flower-delivery-by-florist-one' ). "</option>";
            echo "<option value='CA'" .(esc_attr(isset($_SESSION[$id]) ? $_SESSION[$id] : "" ) =='CA'? 'selected="selected"' : '' ) . ">" . __( 'Canada', 'flower-delivery-by-florist-one' ) . "</option>";
          }
          break;
        case "Delivery Date":
          for($i=0;$i<count((array)$delivery_dates['DATES']);$i++){
            if ($delivery_dates['DATES'][$i] == esc_attr(isset($_SESSION["florist-one-flower-delivery-delivery-date"])? $_SESSION["florist-one-flower-delivery-delivery-date"] : "" )){
              echo '<option value="'. esc_attr($delivery_dates['DATES'][$i]) .'" selected="selected">'.esc_html($delivery_dates['DATES'][$i]).' - '.date("l", mktime(0, 0, 0, substr(esc_html($delivery_dates['DATES'][$i]),0,2), substr(esc_html($delivery_dates['DATES'][$i]),3,2), substr(esc_html($delivery_dates['DATES'][$i]),6,4))) .'</option>';
            }
            else{
              echo '<option value="'. esc_attr($delivery_dates['DATES'][$i]) .'">'.esc_html($delivery_dates['DATES'][$i]).' - '.date("l", mktime(0, 0, 0, substr(esc_html($delivery_dates['DATES'][$i]),0,2), substr(esc_html($delivery_dates['DATES'][$i]),3,2), substr(esc_html($delivery_dates['DATES'][$i]),6,4))) .'</option>';
            }
          }
          break;
        default:
          echo __( 'No Input', 'flower-delivery-by-florist-one' );
      }
  };
}
?>
<?php
if(!function_exists('FD_FONE_create_input')){
 function FD_FONE_create_input($size, $type, $label,$comment, $section, $delivery_dates ){ ?>
  <div class="<?php echo esc_attr($size);?>">
    <?php
      switch ($label) {
        case "Delivery Date":
          $input_label =  __( 'Orders placed now can be delivered on:', 'flower-delivery-by-florist-one' );
          break;
        case "Card Message":
          $input_label = __( 'Gift Card Message*', 'flower-delivery-by-florist-one' );
          break;
        case "Special Instructions":
          $input_label = __( 'Special Delivery Instructions', 'flower-delivery-by-florist-one' );
          break;
        case "State*":
          if($section == "Bill To"){
            if (isset($_SESSION['florist-one-flower-delivery-customer-country'])){
              switch (esc_html($_SESSION['florist-one-flower-delivery-customer-country'])) {
                case "CA":
                  $input_label = __( 'Province*', 'flower-delivery-by-florist-one' );
                  break;
                case "US":
                  $input_label = __( 'State*', 'flower-delivery-by-florist-one' );
                  break;
                default:
                  $input_label = __( 'State', 'flower-delivery-by-florist-one' );
              }
            } else {
              $input_label = __( 'State*', 'flower-delivery-by-florist-one' );
            }
          } else if ($section == "Deliver To") {
            if (isset($_SESSION['florist-one-flower-delivery-recipient-country'])){
              switch (esc_html($_SESSION['florist-one-flower-delivery-recipient-country'])) {
                case "CA":
                  $input_label = __( 'Province*', 'flower-delivery-by-florist-one' );
                  break;
                case "US":
                  $input_label = __( 'State*', 'flower-delivery-by-florist-one' );
                  break;
                default:
                  $input_label = __( 'State*', 'flower-delivery-by-florist-one' );
              }
            } else {
              $input_label = __( 'State*', 'flower-delivery-by-florist-one' );
            }
          } else {
            $input_label = $label;
          }
          break;
        case "Postal Code*":
          if($section == "Bill To"){
            if (isset($_SESSION['florist-one-flower-delivery-customer-country'])){
              switch (esc_html($_SESSION['florist-one-flower-delivery-customer-country'])) {
                case "CA":
                  $input_label = __( "Postal Code*", 'flower-delivery-by-florist-one');
                  break;
                case "US":
                  $input_label = __( "Zip Code*", 'flower-delivery-by-florist-one');
                  break;
                default:
                  $input_label = __( "Postal Code", 'flower-delivery-by-florist-one');
              }
            } else {
              $input_label = __( "Zip Code*", 'flower-delivery-by-florist-one');
            }
          } else if ($section == "Deliver To") {
            if (isset($_SESSION['florist-one-flower-delivery-recipient-country'])){
              switch (esc_html($_SESSION['florist-one-flower-delivery-recipient-country'])) {
                case "CA":
                  $input_label = __( "Postal Code*", 'flower-delivery-by-florist-one');
                  break;
                case "US":
                  $input_label = __( "Zip Code*", 'flower-delivery-by-florist-one');
                  break;
                default:
                  $input_label = __( "Postal Code*", 'flower-delivery-by-florist-one');
              }
            } else {
              $input_label = __( "Postal Code", 'flower-delivery-by-florist-one');
            }
          } else {
            $input_label = __( "Postal Code", 'flower-delivery-by-florist-one');
          }
          break;
        default:
         $input_label = $label;
      }
      //generate name and ID
      switch ($section) {
        case "Delivery Date":
          $id_suffix = "-" . strtolower(preg_replace('/[\*]+/', '', preg_replace("/[\s_]/", "-", $label)));
          break;
        case "Loved One":
          $id_suffix = "-tree-certificate-" . strtolower(preg_replace('/[\*]+/', '', preg_replace("/[\s_]/", "-", $label)));
          break;
        case "Sender Display":
          $id_suffix = "-tree-certificate-" . strtolower(preg_replace('/[\*]+/', '', preg_replace("/[\s_]/", "-", $label)));
          break;

        case "Deliver Info Tree":
          $id_suffix = "-tree-certificate-email-behalf-" . strtolower(preg_replace('/[\*]+/', '', preg_replace("/[\s_]/", "-", $label)));
          break;
        case "Delivery Info":
          $id_suffix = "-special-" . strtolower(preg_replace('/[\*]+/', '', preg_replace("/[\s_]/", "-", $label)));
          break;
        case "Deliver To":
           $id_suffix = "-recipient-" . strtolower(preg_replace('/[\*]+/', '', preg_replace("/[\s_]/", "-", $label)));

          break;
        case "Bill To":
          $id_suffix = "-customer-" . strtolower(preg_replace('/[\*]+/', '', preg_replace("/[\s_]/", "-", $label)));
          break;
      }
      $fws_id = "florist-one-flower-delivery" . $id_suffix;
      ?>
      <label for="<?php echo esc_attr($fws_id); ?>" class="form-label"><?php echo esc_html($input_label);?></label>
      <?php
      switch ($type) {
        case "input":
          if ($label == "Postal Code*" && $section == "Bill To"){
            if (isset($_SESSION['florist-one-flower-delivery-customer-country'])){
              if(esc_html($_SESSION['florist-one-flower-delivery-customer-country']) == "CA" || esc_html($_SESSION['florist-one-flower-delivery-customer-country']) == "US" ){
                echo '<input type="text" class="form-control p-3" name="' . esc_attr($fws_id) . '" id="' . esc_attr($fws_id) . '" placeholder="' . ($_SESSION['florist-one-flower-delivery-customer-country'] == "US"? "Zip Code*" : "Postal Code*") .'" value="' .  $_SESSION[$fws_id] . '">';
              } else {
                echo '<input type="text" class="form-control p-3" name="' . esc_attr($fws_id) . '" id="' . esc_attr($fws_id) . '" placeholder="Postal Code" value="' .  esc_html(isset($_SESSION[$fws_id]) ? $_SESSION[$fws_id] : "") . '">';
              }
            } else {
              echo '<input type="text" class="form-control p-3" name="' . esc_attr($fws_id) . '" id="' . esc_attr($fws_id) . '" placeholder="Zip Code*" value="' .  esc_html(isset($_SESSION[$fws_id]) ? $_SESSION[$fws_id] : "") . '">';
            }
          } else {
            echo '<input type="text" class="form-control p-3" name="' . esc_attr($fws_id) . '" id="' . esc_attr($fws_id) . '" placeholder="' . esc_attr($label) .'" value="' .  esc_html(isset($_SESSION[$fws_id]) ? $_SESSION[$fws_id] : "")  . '"' . ($section == "Deliver To" || $section == "Deliver Info Tree" ? 'autocomplete="no-fill"' : '') . '>';
          }
        break;
        case "select":
          if ($label == "State*" && $section == "Bill To") {
            if (isset($_SESSION['florist-one-flower-delivery-customer-country'])){
              if($_SESSION['florist-one-flower-delivery-customer-country'] == "CA" || $_SESSION['florist-one-flower-delivery-customer-country'] == "US" ){
                echo '<select class="form-select form-control p-3" name="' . esc_attr($fws_id) . '" id="' . esc_attr($fws_id) . '" aria-label="Select">';
              } else {
                echo '<select class="form-select form-control p-3" name="' . esc_attr($fws_id) . '" id="' . esc_attr($fws_id) . '" aria-label="Select" disabled>';
              }
            } else {
              echo '<select class="form-select form-control p-3" name="' .esc_attr($fws_id) . '" id="' . esc_attr($fws_id) . '" aria-label="Select">';
            }
          } else {
            echo '<select class="form-select form-control p-3" name="' . esc_attr($fws_id) . '" id="' . esc_attr($fws_id) . '" aria-label="Select"' . ($section == "Deliver To" || $section == "Deliver Info Tree" ? 'autocomplete="no-fill"' : '') . '>';
          }
          FD_FONE_selectOptions($label, $delivery_dates, $fws_id, $section);
          echo '</select>';
          break;
        case "textarea":
          echo '<textarea class="form-control" style="height:100px" name="' . esc_attr($fws_id) . '"id="' . esc_attr($fws_id) . '" placeholder="' . esc_attr($label) .'" rows="3"  placeholder="' . esc_attr($label) . '">' .  esc_textarea(isset($_SESSION[$fws_id]) ? $_SESSION[$fws_id] : "") .'</textarea>';
          break;
        default:
          echo "no input";
      } ?>
      <?php if ($comment != null) {
        echo "<small class='fw-light'><p class='lh-sm'>" . esc_html($comment) . "</p></small>";
      }
    ?>
  </div>
<?php }
} ?>

<div class="clearfix"></div>
<div class="row mt-5">
  <div class="col-12 col-md-7">

  <?php if(count((array)$products_for_display) > 0) { ?>
      <!-- Form -->
      <form class="checkout-form">
        <?php  if (esc_html($products_for_display[0]['CODE']) == "TREES") { ?>
           <p class="mb-2 fw-bolder fs-5"><?php esc_html_e( 'Delivery Information', 'flower-delivery-by-florist-one' )?></p>
           <div class="row mb-5 g-4">
             <?php
                 FD_FONE_create_input("col-12", "input", __( "Name of Loved One*", 'flower-delivery-by-florist-one' ),  __( "The name of your loved one that has passsed. This name will be used in the tree certificate.", 'flower-delivery-by-florist-one' ), "Loved One", null);
                 FD_FONE_create_input("col-12", "input", __( "Sender Display Name*", 'flower-delivery-by-florist-one' ) , __("Who the trees are 'from'. This will be used in the tree certificate.", 'flower-delivery-by-florist-one' ), "Sender Display", null);
             ?>
            </div>
            <p class="my-3 fw-bolder"><?php esc_html_e( 'Select Delivery Method*', 'flower-delivery-by-florist-one' )?></p>
            <div id="florist-one-flower-delivery-tree-certificate-info" class="row mb-4">
                <div class="col-12">
                  <div class="form-check">
                    <div style="width:1.5em">
                      <input class="form-check-input" type="radio" name="florist-one-flower-delivery-tree-certificate" id="florist-one-flower-delivery-tree-certificate-they-email" value="Cert-they-email" <?php echo (esc_html($_SESSION["florist-one-flower-delivery-tree-certificate"]) =='Cert-they-email')? 'checked' : ''; ?>>
                    </div>
                    <label class="form-check-label fw-bold ps-2" for="florist-one-flower-delivery-tree-certificate-they-email">
                       <?php esc_html_e( 'I will email the Tree Certificate to the family', 'flower-delivery-by-florist-one' ); ?>
                    </label>
                  </div>
                </div>
                <div class="col-12 ps-sm-5">
                  <ul class="mt-2 fw-light lh-sm ms-0">
                    <li><?php esc_html_e( 'We will email you a digital copy of Tree Certificate when you have completed checkout.', 'flower-delivery-by-florist-one' ); ?></li>
                    <li><?php esc_html_e( 'Choosing this option means you will email the certificate to the family of the deceased.', 'flower-delivery-by-florist-one' ); ?></li>
                  </ul>
                </div>
              </div>
            <div class="row mt-3">
                <div class="col-12">
                  <div class="form-check">
                  <div style="width:1.5em">
                    <input class="form-check-input" type="radio" name="florist-one-flower-delivery-tree-certificate" id="florist-one-flower-delivery-tree-certificate-email-behalf" value="Cert-email-behalf" <?php echo (esc_html($_SESSION["florist-one-flower-delivery-tree-certificate"]) =='Cert-email-behalf')? 'checked' : ''; ?>>
                  </div>
                    <label class="form-check-label fw-bold ps-2" for="florist-one-flower-delivery-tree-certificate-email-behalf">
                      <?php esc_html_e( 'Email the Tree Certificate on my behalf', 'flower-delivery-by-florist-one' ); ?>
                    </label>
                  </div>
                </div>
                <div class="col-12 ps-sm-5">
                  <ul class="mt-2 fw-light lh-sm ms-0">
                    <li><?php esc_html_e( 'Choosing this option means you will email the certificate to the family of the deceased.', 'flower-delivery-by-florist-one' ); ?></li>
                    <li><?php esc_html_e( 'We will also email you the certificate (with the email address you provide on the next page)', 'flower-delivery-by-florist-one' ); ?></li>
                    <li><?php esc_html_e( 'You can optionally add a message to the family below.', 'flower-delivery-by-florist-one' ); ?></li>
                  </ul>
                </div>
              </div>
            <div class="row mb-5 ps-3 ps-sm-5 g-4 pb-3">
              <?php
              FD_FONE_create_input("col-12", "input", __( 'Recipient Name*', 'flower-delivery-by-florist-one' ), null , "Deliver Info Tree", null);
              FD_FONE_create_input("col-12", "input", __( 'Recipient Email*', 'flower-delivery-by-florist-one'), __( "The name and email of the person or family receiving the tree gift and certificate.",'flower-delivery-by-florist-one'), "Deliver Info Tree", null);
              FD_FONE_create_input("col-12", "textarea", __("Message to Recipient", 'flower-delivery-by-florist-one' ),  __( "Optional: (500 characters max)" , 'flower-delivery-by-florist-one'), "Deliver Info Tree", null);
              ?>
            </div>
         <?php } else { ?>
          <!-- Billing details -->
          <div class="row mb-5 g-4">

            <!-- Heading -->
            <p class="mb-1 fw-bolder fs-5"><?php esc_html_e( 'Delivery Information', 'flower-delivery-by-florist-one' ); ?></p>
            <?php
              FD_FONE_create_input("col-12", "select",  __( "Delivery Date", 'flower-delivery-by-florist-one' ), null, "Delivery Date", $delivery_dates);
              FD_FONE_create_input("col-12", "textarea",  __("Card Message", 'flower-delivery-by-florist-one' ), __("(200 characters max) Please remember to include who the flowers are from in your message.", 'flower-delivery-by-florist-one' ), "Delivery Info", null);
              FD_FONE_create_input("col-12", "textarea",  __("Special Instructions",'flower-delivery-by-florist-one' ), __("Optional: (100 characters max)", 'flower-delivery-by-florist-one' ), "Delivery Info", null);
            ?>
          </div>

          <!-- Delivery to details -->
          <div class="row mb-5 g-4 ">
            <p class="mb-1 fw-bolder fs-5"><?php esc_html_e( 'Deliver To', 'flower-delivery-by-florist-one' ); ?></p>
            <?php
              FD_FONE_create_input("col-12", "input", __("Name*", 'flower-delivery-by-florist-one' ), null, "Deliver To", null);?>
              
              <?php if(sizeof($config_options['locations']) > 1 && $_SESSION["florist-one-flower-delivery-address-url-params"] == 0) {?>
                <div class="col-sm-12">
                  <label for="florist-one-flower-delivery-location" class="form-label">Please Select a Location</label>
                  <select class="florist-one-flower-delivery-location form-select form-control p-3" name="florist-one-flower-delivery-location" id="florist-one-flower-delivery-location" aria-label="Select" autocomplete="no-fill" aria-required="true" aria-invalid="true">
                    <option value="">— Select—</option>
                    <?php foreach($config_options['locations'] as $location){?>
                      <option data-location-institution="<?php echo $location->address_institution; ?>" data-location-address-1="<?php echo $location->address_1; ?>" data-location-city="<?php echo $location->address_city; ?>" data-location-state="<?php echo $location->address_state; ?>" data-location-zipcode="<?php echo $location->address_zipcode; ?>" data-location-country="<?php echo $location->address_country; ?>" data-location-phone="<?php echo $location->address_phone; ?>" data-location-facility-id="<?php echo $location->facility_id; ?>" <?php if ($location->address_institution == $_SESSION["florist-one-flower-delivery-recipient-institution"]){ echo "selected=\"selected\""; } ?> ><?php echo $location->address_institution; ?></option>
                    <?php } ?>
                  </select>        
                </div>
              <?php } 
              FD_FONE_create_input("col-12", "input", __("Institution", 'flower-delivery-by-florist-one' ), null, "Deliver To", null);
              FD_FONE_create_input("col-12", "input", __("Address 1*", 'flower-delivery-by-florist-one' ), null, "Deliver To", null);
              FD_FONE_create_input("col-12", "input", __("Address 2", 'flower-delivery-by-florist-one' ), null, "Deliver To", null);
              FD_FONE_create_input("col-12", "input", __("City*", 'flower-delivery-by-florist-one' ), null, "Deliver To", null);
              FD_FONE_create_input("col-sm-6", "select", __("Country*", 'flower-delivery-by-florist-one' ), null, "Deliver To", null);
              FD_FONE_create_input("col-sm-6", "select", __("State*", 'flower-delivery-by-florist-one' ), null, "Deliver To", null);
              FD_FONE_create_input("col-sm-6", "input", __("Postal Code*", 'flower-delivery-by-florist-one' ), null, "Deliver To", null);
              FD_FONE_create_input("col-sm-6", "input", __("Phone*", 'flower-delivery-by-florist-one' ), null, "Deliver To", null);
            ?>
          </div>

        <?php } ?>

        <!-- Billing details -->
        <div class="row mb-5 g-4 ">

        <!-- Heading -->
        <p class="mb-1 fw-bolder fs-5"><?php esc_html_e( 'Bill To', 'flower-delivery-by-florist-one' ); ?></p>
          <?php
            FD_FONE_create_input("col-12", "input", __("Name*", 'flower-delivery-by-florist-one' ), null, "Bill To", null);
            FD_FONE_create_input("col-12", "input", __("Email*", 'flower-delivery-by-florist-one' ), null, "Bill To", null);
            FD_FONE_create_input("col-12", "input", __("Address 1*", 'flower-delivery-by-florist-one' ), null, "Bill To", null);
            FD_FONE_create_input("col-12", "input", __("Address 2", 'flower-delivery-by-florist-one' ), null, "Bill To", null);
            FD_FONE_create_input("col-12", "input", __("City*", 'flower-delivery-by-florist-one' ), null, "Bill To", null);
            FD_FONE_create_input("col-sm-6", "select", __("Country*", 'flower-delivery-by-florist-one' ), null, "Bill To", null);
            FD_FONE_create_input("col-sm-6 country-trigger", "select", __("State*", 'flower-delivery-by-florist-one' ), null, "Bill To", null);
            FD_FONE_create_input("col-sm-6 country-trigger", "input", __("Postal Code*", 'flower-delivery-by-florist-one' ), null, "Bill To", null);
            FD_FONE_create_input("col-sm-6", "input", __("Phone*", 'flower-delivery-by-florist-one' ), null, "Bill To", null);
          ?>
        </div>
        <input id="checkout-form-continue-next-step" name="checkout-form-continue-next-step" type="text" hidden value="2">
      </form>
      <?php if(count((array)$products_for_display) > 0){ ?>
      <button type="button" class="w-100 text-wrap fd_one_button_primary btn btn-lg checkout-form-continue-next-step"><svg viewBox="0 0 24 24" width="24" height="24" stroke="#ffffff" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg> Continue to Payment</button>
      <?php } ?>

    <?php } else { ?>
      <p><?php esc_html_e( 'Your shopping cart is empty', 'flower-delivery-by-florist-one' );?></p>
    <?php } ?>

  </div>
  <div class="col-12 col-md-5 col-lg-4 offset-lg-1">
     <p class="mb-4 fw-bolder fs-5"><?php esc_html_e( 'Order Items', 'flower-delivery-by-florist-one' );?> (<?php echo esc_html(count((array)$products_for_display)) ?>)</p>
     <?php $product_modal = 1 ?>
     <?php include 'florist-one-flower-delivery-cart-body.php'; ?>
     <p class="my-4">
      <a class="text-decoration-none btn-link text-body fw-bold florist-one-flower-delivery-menu-cart-button" id="fws-update-my-cart" data-bs-toggle="modal" data-bs-target="#florist-one-flower-delivery-view-modal"  href="#">&#8592; <?php esc_html_e( 'Update My Cart', 'flower-delivery-by-florist-one' );?></a>
     </p>
     <?php include 'florist-one-flower-delivery-cart-body-price.php'; ?>

    <?php

      if(count((array)$products_for_display) > 0){

        if($validated){
            $amount = number_format(sanitize_text_field($get_total_response_body['ORDERTOTAL']), 2);
            $redirect_url = sanitize_text_field($_SERVER['HTTP_REFERER']);
            $treeDeliveryMethod = (isset($_SESSION['florist-one-flower-delivery-tree-certificate'])) ? sanitize_text_field($_SESSION['florist-one-flower-delivery-tree-certificate']) : "";
            $config_options = get_option('florist-one-flower-delivery');

            $products = array();


            // check for trees
            if (esc_html($products_for_display[0]['CODE']) == "TREES"){ // just for trees
               $customer = array(
                'first_name' => sanitize_text_field($_SESSION['florist-one-flower-delivery-customer-name']),
                'last_name' => "",
                'address' => sanitize_text_field($_SESSION['florist-one-flower-delivery-customer-address-1']) . " " . sanitize_text_field($_SESSION['florist-one-flower-delivery-customer-address-2']) ,
                'city' => sanitize_text_field($_SESSION['florist-one-flower-delivery-customer-city']),
                'state' => (sanitize_text_field($_SESSION['florist-one-flower-delivery-customer-country']) == "CA" || sanitize_text_field($_SESSION['florist-one-flower-delivery-customer-country']) == "US") ? sanitize_text_field($_SESSION["florist-one-flower-delivery-customer-state"]) : "NA",
                'zipcode' => (sanitize_text_field($_SESSION['florist-one-flower-delivery-customer-country']) == "CA" || sanitize_text_field($_SESSION['florist-one-flower-delivery-customer-country']) == "US")? sanitize_text_field($_SESSION["florist-one-flower-delivery-customer-postal-code"]) : (sanitize_text_field($_SESSION["florist-one-flower-delivery-customer-postal-code"]) != "" ? sanitize_text_field($_SESSION["florist-one-flower-delivery-customer-postal-code"]) : 1),
                'country' => sanitize_text_field($_SESSION['florist-one-flower-delivery-customer-country']),
                'phone' => preg_replace('~\D~', '', sanitize_text_field($_SESSION['florist-one-flower-delivery-customer-phone'])),
                'email' => sanitize_email($_SESSION['florist-one-flower-delivery-customer-email']),
                'ip' => sanitize_text_field($_SERVER['REMOTE_ADDR'])
              );
              $recipient = array(
                'message' => ($treeDeliveryMethod == "Cert-email-behalf") ? sanitize_textarea_field($_SESSION['florist-one-flower-delivery-tree-certificate-email-behalf-message-to-recipient']) : "",
                'first_name' => ($treeDeliveryMethod == "Cert-email-behalf") ? sanitize_text_field($_SESSION['florist-one-flower-delivery-tree-certificate-email-behalf-recipient-name']) : "",
                'last_name' => "",
                'email' => ($treeDeliveryMethod == "Cert-email-behalf") ? sanitize_email($_SESSION['florist-one-flower-delivery-tree-certificate-email-behalf-recipient-email']):"",
                'send_certificate' => ($treeDeliveryMethod == "Cert-email-behalf") ? sanitize_text_field(1) : sanitize_text_field(0)
              );
                $product = array(
                    'code' => sanitize_text_field($products_for_display[0]['CODE']),
                    'amount' => sanitize_text_field($products_for_display[0]['PRICE']),
                    'number' =>    intval(preg_replace('/[^0-9.]+/', '', sanitize_text_field($vars["products"][0]["NAME"]))),
                  );
            } else { // all but trees

               $customer = array(
                'name' => sanitize_text_field($_SESSION["florist-one-flower-delivery-customer-name"]),
                'address1' => sanitize_text_field($_SESSION["florist-one-flower-delivery-customer-address-1"]),
                'address2' => sanitize_text_field($_SESSION["florist-one-flower-delivery-customer-address-2"]),
                'city' => sanitize_text_field($_SESSION["florist-one-flower-delivery-customer-city"]),
                'state' => (sanitize_text_field($_SESSION['florist-one-flower-delivery-customer-country']) == "CA" || sanitize_text_field($_SESSION['florist-one-flower-delivery-customer-country']) == "US") ? sanitize_text_field($_SESSION["florist-one-flower-delivery-customer-state"]) : "NA",
                'zipcode' => (sanitize_text_field($_SESSION['florist-one-flower-delivery-customer-country']) == "CA" || sanitize_text_field($_SESSION['florist-one-flower-delivery-customer-country']) == "US")? sanitize_text_field($_SESSION["florist-one-flower-delivery-customer-postal-code"]) : (sanitize_text_field($_SESSION["florist-one-flower-delivery-customer-postal-code"]) != "" ? sanitize_text_field($_SESSION["florist-one-flower-delivery-customer-postal-code"]) : 1),
                'country' => sanitize_text_field($_SESSION["florist-one-flower-delivery-customer-country"]),
                'email' => sanitize_email($_SESSION["florist-one-flower-delivery-customer-email"]),
                'phone' =>  preg_replace('~\D~', '', sanitize_text_field($_SESSION["florist-one-flower-delivery-customer-phone"])),
                'ip' => sanitize_text_field($_SERVER['REMOTE_ADDR'])
              );
              $recipient = array(
                'name' => sanitize_textarea_field($_SESSION["florist-one-flower-delivery-recipient-name"]),
                'institution' => sanitize_textarea_field($_SESSION['florist-one-flower-delivery-recipient-institution']),
                'address1' => sanitize_textarea_field($_SESSION["florist-one-flower-delivery-recipient-address-1"]),
                'address2' => sanitize_textarea_field($_SESSION["florist-one-flower-delivery-recipient-address-2"]),
                'city' =>  sanitize_textarea_field($_SESSION["florist-one-flower-delivery-recipient-city"]),
                'state' =>  sanitize_textarea_field($_SESSION["florist-one-flower-delivery-recipient-state"]),
                'zipcode' =>  sanitize_textarea_field($_SESSION["florist-one-flower-delivery-recipient-postal-code"]),
                'country' =>  sanitize_textarea_field($_SESSION["florist-one-flower-delivery-recipient-country"]),
                'phone' => preg_replace('~\D~', '',  sanitize_textarea_field($_SESSION["florist-one-flower-delivery-recipient-phone"]))
              );

              for ($i=0;$i<count($products_for_display);$i++){
                array_push(
                  $products,
                  array(
                    'code' => sanitize_text_field($products_for_display[$i]['CODE']),
                    'price' => sanitize_text_field($products_for_display[$i]['PRICE']),
                    'recipient' => $recipient,
                    'deliverydate' =>  sanitize_textarea_field($_SESSION["florist-one-flower-delivery-delivery-date"]),
                    'cardmessage' => sanitize_textarea_field($_SESSION["florist-one-flower-delivery-special-card-message"]),
                    'specialinstructions' => sanitize_textarea_field($_SESSION["florist-one-flower-delivery-special-special-instructions"])
                  )
                );
              }
            }
            if (esc_html($products_for_display[0]['CODE']) == "TREES"){//payload for Tree

              $payload = array(
                'customer' => $customer,
                'recipient' => $recipient,
                'product' => $product,
                'facilityid' => sanitize_text_field($config_options["facility_id"]),
                'referring_affiliate_id' => sanitize_text_field($config_options["affiliate_id"]),
                'f1_storefront_id' => sanitize_text_field($config_options["flower_storefront_id"]),
                'deceased_display_name' =>  sanitize_text_field($_SESSION["florist-one-flower-delivery-tree-certificate-name-of-loved-one"]),
                'apikey' =>  sanitize_text_field(FD_FONE_API_KEY),
                'sender_display_name' =>  sanitize_text_field($_SESSION["florist-one-flower-delivery-tree-certificate-sender-display-name"])
              );

            } else {

              $payload = array(
                'customer' => $customer,
                'products' => $products,
                'facilityid' => sanitize_text_field($config_options["facility_id"]),
                'f1_aff_id' => sanitize_text_field($config_options["affiliate_id"]),
                'f1_storefront_id' => sanitize_text_field($config_options["flower_storefront_id"]),
                'apikey' =>  sanitize_text_field(FD_FONE_API_KEY)
            );

            //error_log(print_r($payload,true));
            //error_log(print_r($amount,true));
            //error_log(print_r($redirect_url,true));

          }
          $fingerprint = createAuthorizeNetHostedForm($amount, $redirect_url, $payload);
          $showToken = sanitize_text_field($fingerprint['body']['token']);
        } else {
          $showToken = "";
        }

      ?>

        <button type="button" class="w-100 text-wrap fd_one_button_primary btn btn-lg checkout-form-continue-next-step">
          <svg viewBox="0 0 24 24" width="24" height="24" stroke="#ffffff" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
           <?php esc_html_e( 'Continue To Payment', 'flower-delivery-by-florist-one' );?>
        </button>

        <form class="mt-5" method="post" action="https://accept.authorize.net/payment/payment">
          <input type="hidden" name="token" value="<?php echo esc_html($showToken) ?>" />
          <div class="d-grid gap-2 p-1">
            <button id="fws-checkout-form-payment" type="submit" class="text-wrap btn btn-lg d-none"> <?php esc_html_e( 'Continue To Payment', 'flower-delivery-by-florist-one' );?></button>
          </div>
        </form>

      <?php } ?>

    </div>
  </div>
</div>
