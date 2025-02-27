<?php
/**
 * @link       https://www.floristone.com
 * @since      1.0.0
 *
 * @package    Florist_One_Flower_Delivery
 * @subpackage Florist_One_Flower_Delivery/public
 */
 if (session_status() == PHP_SESSION_ACTIVE || session_status() == PHP_SESSION_NONE) {
     session_start();
     session_write_close();
  }

  define('FD_FONE_API', 'https://www.floristone.com/api/rest');
  $config_options = get_option('florist-one-flower-delivery');
  if ($config_options['currency'] == 'c') {
    define('FD_FONE_API_KEY', '999994');
    define('FD_FONE_API_VAL', 'flowers');
  } else {
    define('FD_FONE_API_KEY', '999993');
    define('FD_FONE_API_VAL', 'flowers');
  }
  define('FD_FONE_LANGUAGE', 'ENGLISH');

  if (isset($_REQUEST['action'])) {
    if ($_REQUEST['action'] == "getProducts") {
      getProducts(sanitize_text_field($_REQUEST['category']), sanitize_text_field($_REQUEST['page']), (!is_array($_REQUEST['additionalUrlParams']))? $_REQUEST['additionalUrlParams'] : array_map('sanitize_text_field', $_REQUEST['additionalUrlParams']));
    } elseif ($_REQUEST['action'] == "getProductsMore") {
      getProductsMore(sanitize_text_field($_REQUEST['category']), sanitize_text_field($_REQUEST['page']));
    } elseif ($_REQUEST['action'] == "getProduct") {
      getProduct(sanitize_text_field($_REQUEST['code']));
    } else if ($_REQUEST['action'] == "getTree"){
      getTree(sanitize_text_field($_REQUEST['code']), sanitize_text_field($_REQUEST['facility_id']), sanitize_text_field($_REQUEST['lovedone']));
    } elseif ($_REQUEST['action'] == "addToCart") {
      addToCart(sanitize_text_field($_REQUEST['code']),sanitize_text_field($_REQUEST['num']));
    } elseif ($_REQUEST['action'] == "removeFromCart") {
      removeFromCart(sanitize_text_field($_REQUEST['code']));
    } elseif ($_REQUEST['action'] == "getCart") {
      getCart(sanitize_text_field($_REQUEST['code']));
    } elseif ($_REQUEST['action'] == "getCustomerService") {
      getCustomerService();
    } elseif ($_REQUEST['action'] == "checkout") {
      checkout(sanitize_text_field($_REQUEST['page']), $_REQUEST['formdata'] ,sanitize_text_field($_REQUEST['validated']));
    } elseif ($_REQUEST['action'] == "createAuthorizeNetHostedForm") {
      createAuthorizeNetHostedForm(sanitize_text_field($_REQUEST['amount']));
    } elseif ($_REQUEST['action'] == "checkOrder") {
      checkOrder(sanitize_text_field($_REQUEST['orderno']));
    } elseif ($_REQUEST['action'] == "get_florists_for_facility_code") {
      get_florists_for_facility_code(sanitize_text_field($_REQUEST['city']), sanitize_text_field($_REQUEST['state']));
    } elseif ($_REQUEST['action'] == "getTreesTotal") {
      getTreesTotal(sanitize_text_field($_REQUEST['code']), sanitize_text_field($_REQUEST['number']), sanitize_text_field($_REQUEST['price']));
    } else if ($_REQUEST['action'] == "setFlowerSessionData"){
      setFlowerSessionData(array_map( 'sanitize_text_field', $_REQUEST) );
    } else if ($_REQUEST['action'] == "getCartCount"){
      getCartCount(sanitize_text_field($_REQUEST));
    }
  } else {
    fill_in_missing_options();
  }

  // function for all API calls
  function fdFoneApiCall($data){

    $headers = array(
      'Authorization: Basic '.base64_encode(FD_FONE_API_KEY . ':' . FD_FONE_API_VAL)
    );

    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $data["URL"],
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => $data["METHOD"],
      CURLOPT_POSTFIELDS => (isset($data["DATA"])) ? http_build_query($data["DATA"]) : "",
      CURLOPT_HTTPHEADER => $headers,
      CURLOPT_SSL_VERIFYPEER => true,
      CURLOPT_FORBID_REUSE => false,
      CURLOPT_FRESH_CONNECT => false,
      CURLOPT_HEADER => false
    ));
    $response = curl_exec($curl);
    $info = curl_getinfo($curl);
    curl_close($curl);

    return $response;

  }

  function getProducts($category, $page, $additionalUrlParams){

    // store any additional url params
    session_start();
    if (empty($additionalUrlParams) == false){
      $_SESSION["florist-one-flower-delivery-address-url-params"] = true;
    }
    else {
      $_SESSION["florist-one-flower-delivery-address-url-params"] = false;
    }
    if (!empty($additionalUrlParams['name'])){
      $_SESSION["florist-one-flower-delivery-recipient-name"] = $additionalUrlParams['name'];
    }
    if (!empty($additionalUrlParams['institution'])){
      $_SESSION["florist-one-flower-delivery-recipient-institution"] = $additionalUrlParams['institution'];
    }
    if (!empty($additionalUrlParams['address1'])){
      $_SESSION["florist-one-flower-delivery-recipient-address-1"] = $additionalUrlParams['address1'];
    }
    if (!empty($additionalUrlParams['address2'])){
      $_SESSION["florist-one-flower-delivery-recipient-address-2"] = $additionalUrlParams['address2'];
    }
    if (!empty($additionalUrlParams['city'])){
      $_SESSION["florist-one-flower-delivery-recipient-city"] = $additionalUrlParams['city'];
    }
    if (!empty($additionalUrlParams['state'])){
      $_SESSION["florist-one-flower-delivery-recipient-state"] = $additionalUrlParams['state'];
    }
    if (!empty($additionalUrlParams['country'])){
      $_SESSION["florist-one-flower-delivery-recipient-country"] = $additionalUrlParams['country'];
    }
    if (!empty($additionalUrlParams['zip'])){
      $_SESSION["florist-one-flower-delivery-recipient-postal-code"] = $additionalUrlParams['zip'];
    }
    if (!empty($additionalUrlParams['phone'])){
      $_SESSION["florist-one-flower-delivery-recipient-phone"] = $additionalUrlParams['phone'];
    }
    if (!empty($additionalUrlParams['picture'])){
      $_SESSION["florist-one-flower-delivery-recipient-picture"] = $additionalUrlParams['picture'];
    }
    session_write_close();

    $config_options = get_option('florist-one-flower-delivery');
    $count = $config_options['products_per_page'];

    if ($category == 'default') {
       if ($config_options['products'] == 0) {
         $category = 'ao';
         if (($config_options['products_cm'] == 1) && ((date('m') == 12 && date('d') >= 15) || (date('m') == 12 && date('d') <= 26))) {
             $category = 'cm';
         }
         if (($config_options['products_ea'] == 1) && ((date('m') == 03 && date('d') >= 15) || (date('m') == 04 && date('d') <= 30))) {
             $category = 'ea';
         }
         if (($config_options['products_md'] == 1) && ((date('m') == 04 && date('d') >= 20) || (date('m') == 05 && date('d') <= 15))) {
             $category = 'md';
         }
         if (($config_options['products_tg'] == 1) && ((date('m') == 11 && date('d') >= 01) || (date('m') == 11 && date('d') <= 30))) {
             $category = 'tg';
         }
         if (($config_options['products_vd'] == 1) && ((date('m') == 01 && date('d') >= 15) || (date('m') == 02 && date('d') <= 15))) {
             $category = 'vd';
         }
       } else {
           $category = 'fa';
       }
    }

    if ($page == 1) {
       $start = 1;
    } else {
       $start = 1 + (($page - 1) * $count);
    }

    $config_options = get_option('florist-one-flower-delivery');
    $api_response_body = json_decode(fdFoneApiCall(array(
        "URL" => FD_FONE_API . '/flowershop/getproducts?category=' . $category . '&start=' . $start . '&count=' . $count . '&facilityid=' . $config_options["facility_id"],
        "METHOD" => "GET"
      )
    ), true);

    $loadmore = false;

    include 'partials/florist-one-flower-delivery-many-products.php';
    die();

  }

  function getProductsMore($category, $page){

    $config_options = get_option('florist-one-flower-delivery');
    $count = $config_options['products_per_page'];
    $start = 1 + (($page - 1) * $count);
    $api_response_body = json_decode(fdFoneApiCall(array(
        "URL" => FD_FONE_API . '/flowershop/getproducts?category=' . $category . '&start=' . $start . '&count=' . $count . '&facilityid=' . $config_options["facility_id"],
        "METHOD" => "GET"
      )
    ), true);

    $loadmore = true;
    include 'partials/florist-one-flower-delivery-many-products.php';
    die();

  }

  function getProduct($code){

    $config_options = get_option('florist-one-flower-delivery');
    $api_response_body = json_decode(fdFoneApiCall(array(
        "URL" => ($code == 'TREES')?  FD_FONE_API . '/trees/gettree?code=' . $code . '&facilityid=' . $config_options["facility_id"] : FD_FONE_API . '/flowershop/getproducts?code=' . $code . '&facilityid=' . $config_options["facility_id"],
        "METHOD" => "GET"
      )
    ), true);

    include 'partials/florist-one-flower-delivery-single-product.php';
    die();

  }

  function getTree($code, $facilityid, $lovedone){

    session_start();
    if ($lovedone != ""){
      $_SESSION["florist-one-flower-delivery-tree-certificate-name-of-loved-one"] = $lovedone;
    }
    session_write_close();
    $_SESSION['florist-one-flower-delivery-facility-id'] = $facilityid;

    $api_response_body = json_decode(fdFoneApiCall(array(
        "URL" => FD_FONE_API . '/trees/gettree?code=' . $code . '&facilityid=' . $facilityid. '&language=' . FD_FONE_LANGUAGE,
        "METHOD" => "GET"
      )
    ), true);

    include 'partials/florist-one-flower-delivery-plant-a-tree.php';
    die();

  }

  function checkOrder($orderno){

    // not currently used
    $api_response_body = json_decode(fdFoneApiCall(array(
        "URL" => FD_FONE_API . '/wordpress/flowershop-check-order?orderno=' . $orderno,
        "METHOD" => "GET"
      )
    ), true);

    $good_order = $api_response_body['SUCCESS'];

    if ($good_order == true) {
       include 'partials/florist-one-flower-delivery-checkout-5.php';
    } else {
       checkout(4, array());
    }

    die();

  }

  function createCart(){

    $api_response = json_decode(fdFoneApiCall(array(
        "URL" => FD_FONE_API . '/shoppingcart',
        "METHOD" => 'POST'
      )
    ));

    $sessionid = (json_decode(json_encode($api_response), true))["SESSIONID"];
    session_start();
    $_SESSION['sesh'] = sanitize_text_field($sessionid);
    session_write_close();

    return $sessionid;

  }

  function getCartCount(){

  if (!isset($_SESSION['sesh'])) {
    echo 0;
  }

  else {

    $sessionid = sanitize_text_field($_SESSION['sesh']);


    $sessionid = sanitize_text_field($_SESSION['sesh']);
    $api_response_body = json_decode(fdFoneApiCall(array(
        "URL" => FD_FONE_API . '/shoppingcart?sessionid=' . $sessionid,
        "METHOD" => "GET"
        )
    ), true);

    echo is_array($api_response_body) ? (isset($api_response_body['products']) ? count((array)$api_response_body['products']) :0):0;

  	}

  	die();

  }


  function getCartData(){

    if (!isset($_SESSION['sesh'])) {
      $sessionid = createCart();
    } else {
      $sessionid = sanitize_text_field($_SESSION['sesh']);
    }

    $config_options = get_option('florist-one-flower-delivery');
    $api_response_body = json_decode(fdFoneApiCall(array(
        "URL" => FD_FONE_API . '/shoppingcart?sessionid=' . $sessionid . '&language=' . FD_FONE_LANGUAGE,
        "METHOD" => "GET"
      )
    ), true);

    $errors = array();
      if(isset($api_response_body['errors'])){
      $errors = $api_response_body['errors'];
    }

    if(!isset($_SESSION)) {
  	  session_start();
	  }
    if (isset($api_response_body['products'][0]['CODE'])){
      $_SESSION["florist-one-in-cart"] = ($api_response_body['products'][0]['CODE'] == "TREES") ? "TREES" : "Flowers";
    } else {
      $_SESSION["florist-one-in-cart"] = "";
    }
    session_write_close();

    //check if tree
    if (isset($api_response_body['products'][0]['CODE'])){

      if ($api_response_body['products'][0]['CODE'] == "TREES"){

        $treeProduct = array();
        $tree = array(
          "CODE" =>  $api_response_body['products'][0]['CODE'],
          "NUMBER" => intval(preg_replace('/[^0-9.]+/', '', $api_response_body['products'][0]['NAME'])),
          "PRICE" =>  $api_response_body['products'][0]['PRICE']
        );

        array_push($treeProduct,$tree);

        $api_response_body_tree = json_decode(fdFoneApiCall(array(
            "URL" => FD_FONE_API . '/trees/gettree?code=TREES' . '&facilityid=' . sanitize_text_field($_SESSION['florist-one-flower-delivery-facility-id']) . '&language=' . FD_FONE_LANGUAGE,
            "METHOD" => "GET"
          )
        ), true);

        $get_total_response_body = json_decode(fdFoneApiCall(array(
            "URL" => FD_FONE_API . '/trees/gettotal?products=' . json_encode($treeProduct) . '&f1_storefront_id=' . $config_options['flower_storefront_id']  . '&f1_aff_id=' . $config_options['affiliate_id'] . '&facilityid=' . $config_options["facility_id"] . '&language=' . FD_FONE_LANGUAGE,
            "METHOD" => "GET"
          )
        ), true);

        $products = array();
        $products_for_display = array(
          array(
            "IMG" => $api_response_body_tree["productURL"],
            "CODE" => $api_response_body['products'][0]['CODE'],
            "PRICE" => number_format($api_response_body['products'][0]['PRICE'], 2, '.', ''),
            "NAME" =>  $api_response_body['products'][0]['NAME']
          )
        );
        $products = $products_for_display;

      } else { // done tree

        $products = array();
        $products_for_display = array();

        //$config_options = get_option('florist-one-flower-delivery');
        if (isset($_SESSION['florist-one-flower-delivery-recipient-postal-code'])) {
          $zipcode = sanitize_text_field($_SESSION['florist-one-flower-delivery-recipient-postal-code']);
        } elseif (sizeof($config_options['locations']) > 0) {
          $zipcode = $config_options['locations'][0]->address_zipcode;
        } else {
          $zipcode = '11779';
        }
        $zipcode = str_replace( ' ', '%20', $zipcode);

        for ($i=0;$i<count($api_response_body['products']);$i++) {
          $code = $api_response_body['products'][$i]['CODE'];

          $get_products_response_body =  json_decode(fdFoneApiCall(array(
              "URL" => FD_FONE_API . '/flowershop/getproducts?code=' . $code  . '&facilityid=' . $config_options["facility_id"],
              "METHOD" => "GET"
            )
          ), true);
          $product = array(
            "CODE" =>  $get_products_response_body['PRODUCTS'][0]['CODE'],
            "PRICE" => $get_products_response_body['PRODUCTS'][0]['PRICE'],
            "RECIPIENT" => array(
              "ZIPCODE" => $zipcode
            )
          );
          array_push($products, $product);
          $product = array(
            "CODE" =>  $get_products_response_body['PRODUCTS'][0]['CODE'],
            "PRICE" => $get_products_response_body['PRODUCTS'][0]['PRICE'],
            "NAME" => $get_products_response_body['PRODUCTS'][0]['NAME'],
            "IMG" => $get_products_response_body['PRODUCTS'][0]['LARGE']
          );
          array_push($products_for_display, $product);

        }

        $get_total_response_body = json_decode(fdFoneApiCall(array(
            "URL" => FD_FONE_API . '/flowershop/gettotal?products=' . json_encode($products) . '&f1_storefront_id=' . $config_options['flower_storefront_id']  . '&f1_aff_id=' . $config_options['affiliate_id'] . '&facilityid=' . $config_options["facility_id"] . '&language=' . FD_FONE_LANGUAGE,
            "METHOD" => "GET"
          )
        ), true);

      }

    }

    $vars = array(
      'get_total_response_body' => (isset($get_total_response_body)) ? $get_total_response_body : "",
      'products_for_display' => (isset($products_for_display)) ? $products_for_display: 0 ,
      'products' => (isset($products)) ? $products : "",
      'errors' => $errors
    );
    return $vars;

  }

  function getCart($code){

    $previous_cart = (isset($_SESSION["florist-one-in-cart"])) ? sanitize_text_field($_SESSION["florist-one-in-cart"]) : "" ;
    $vars = getCartData();
    if ($vars["products_for_display"] != 0){
      $get_total_response_body = $vars["get_total_response_body"];
      $products_for_display = $vars["products_for_display"];
      $products = $vars["products"];
      $errors = $vars["errors"];
      //itemAdded
      if($code != null){
        $added_to_cart = (strpos($code, 'Trees') !== false)? "TREES" : "Flowers";
        $newCart = ($products_for_display[0]['CODE'] == "TREES")? "TREES" : "Flowers";
        $previous_cart = ($previous_cart == "") ? $newCart : $previous_cart;
        if($added_to_cart != $newCart){
          $display_tree_message_seperate = __( "Sorry but flowers and trees cannot be purchased together and need to be purchased separately.", 'flower-delivery-by-florist-one' );
        }
        if($newCart != $previous_cart){
          $display_tree_message_seperate = __( "Sorry but flowers and trees cannot be purchased together and need to be purchased separately.", 'flower-delivery-by-florist-one' );
        }
      }
    } else {
      $products_for_display = 0;
    }

    $dont_show_remove_button = 0;
    include 'partials/florist-one-flower-delivery-cart.php';
    die();

  }

  function addToCart($code, $num){

    if (!isset($_SESSION['sesh'])) {
       $sessionid = createCart();
    } else {
       $sessionid = sanitize_text_field($_SESSION['sesh']);
       if (checkCartStillExists() == false) {
           $sessionid = createCart();
       }
    }

    for ($i=0;$i< (int)$num;$i++){
      $api_response = fdFoneApiCall(array(
        "URL" => FD_FONE_API . '/shoppingcart?action=add&sessionid=' . $sessionid . '&productcode=' . str_replace( ' ', '%20', $code) . '&language=' . FD_FONE_LANGUAGE,
        "METHOD" => 'PUT'
      ));
    }

    getCart($code);

  }

  function checkCartStillExists(){

    $vars = getCartData();
    $errors = $vars["errors"];

    if ($errors == 'invalid sessionid' || $errors == 'The sessionid does not exist'){
      return false;
    }

    return true;

  }

 function removeFromCart($code){

   if (!isset($_SESSION['sesh'])) {
       $sessionid = createCart();
   } else {
     $sessionid = sanitize_text_field($_SESSION['sesh']);
     if (checkCartStillExists() == false) {
         $sessionid = createCart();
     }
   }

    fdFoneApiCall(array(
      "URL" => FD_FONE_API . '/shoppingcart?action=remove&sessionid=' . $sessionid . '&productcode=' . $code,
      "METHOD" => 'PUT'
    ));
    getCart(null);

  }

  function getCustomerService(){

    $config_options = get_option('florist-one-flower-delivery');
    $api_response_body = json_decode(fdFoneApiCall(array(
        "URL" => FD_FONE_API . '/flowershop/customerservice?currency&plugin=fdp' . $config_options['currency'],
        "METHOD" => "GET"
      )
    ), true);

    include 'partials/florist-one-flower-delivery-customer-service.php';
    die();

  }

  function createAuthorizeNetHostedForm($amount, $redirect_url, $payload){

    return json_decode(fdFoneApiCall(array(
      "URL" => FD_FONE_API . '/wordpress/paymentForm',
      "METHOD" => "POST",
      "DATA" => array(
        'amount' => $amount,
        'redirect_url' => strtok($redirect_url, '?'),
        'payload' => json_encode($payload, JSON_UNESCAPED_UNICODE)
      )
    )), true);

  }

  function clearCart(){

    $sessionid = sanitize_text_field($_SESSION['sesh']);
    fdFoneApiCall(array(
      "URL" => FD_FONE_API . '/shoppingcart?action=clear&sessionid=' . $sessionid,
      "METHOD" => "PUT"
    ));

  }

  function getDeliveryDates($zipcode){

    return json_decode(fdFoneApiCall(array(
        "URL" => FD_FONE_API . '/flowershop/checkdeliverydate?zipcode=' . str_replace( ' ', '%20', $zipcode),
        "METHOD" => "GET"
      )
    ), true);

  }

  function floristonesession($value){

    if (isset($value)) {
      return $value;
    }

  }

  function checkout($page, $formdata, $validated){

    session_start();
    storeCheckoutData($formdata);
    $config_options = get_option('florist-one-flower-delivery');
    if (isset($_SESSION['florist-one-flower-delivery-recipient-postal-code']) && $_SESSION['florist-one-flower-delivery-recipient-postal-code'] != "") {
       $zipcode = sanitize_text_field($_SESSION['florist-one-flower-delivery-recipient-postal-code']);
    } elseif (isset($config_options['address_zipcode']) && strlen($config_options['address_zipcode']) > 0) {
       $zipcode = $config_options['address_zipcode'];
    } else {
       $zipcode = '11779';
    }

    $delivery_dates = getDeliveryDates($zipcode);
      $vars = getCartData();
      if ($vars["products_for_display"] != 0){
        $get_total_response_body = $vars["get_total_response_body"];
        $products_for_display = $vars["products_for_display"];
        $products = $vars["products"];
      } else {
        $products_for_display = array();
      }
      $errors = $vars["errors"];

    switch ($page) {
    case 4:

      include 'partials/florist-one-flower-delivery-checkout-4.php';
      break;
    case 5:
      $orderno = $formdata[0]["value"];
      include 'partials/florist-one-flower-delivery-checkout-5.php';
      session_unset();
      break;
    case 6:
      include 'partials/florist-one-flower-delivery-ssl-warning.php';
      break;
    }

    session_write_close();

    die();
  }

  function storeCheckoutData($formdata){

    if(isset($formdata)){
      for($i=0;$i<count((array)$formdata);$i++){
        if (isset($formdata[$i]['name'])){
          $_SESSION[''.sanitize_text_field($formdata[$i]['name']).''] = sanitize_text_field($formdata[$i]['value']);
        } else {
          $_SESSION[sanitize_text_field(array_keys($formdata)[$i])] = sanitize_text_field(array_values($formdata)[$i]);
        }
      }
    }

  }

  function get_florists_for_facility_code($city, $state){

    echo json_encode(json_decode(fdFoneApiCall(array(
        "URL" => FD_FONE_API . '/flowershop/chooseflorists?city=' . str_replace( ' ', '%20', $city) . '&state=' . str_replace( ' ', '%20', $state),
        "METHOD" => "GET"
      )
    ), true));
    die();

  }

  function getTreesTotal($code,$number,$price){

    $get_total_response_body = json_decode(fdFoneApiCall(array(
        "URL" => FD_FONE_API . '/trees/getprice?code=' . $code . '&number=' . $number . '&language=' . FD_FONE_LANGUAGE . "",
        "METHOD" => "GET"
      )
    ), true);

    echo esc_html($get_total_response_body['price']) ;
    die();

  }

  function init_flower_delivery($atts){

    //default category
     $a = shortcode_atts(array(
       'category' => '',
       'product_code' => ''
    ), $atts);
     $flower_del_def_cat = esc_attr($a["category"]);
     $flower_del_def_product = esc_attr($a["product_code"]);

     $htmlString = '';
     $htmlString = $htmlString.'<div class="florist-one-flower-delivery-container"'. (strlen($flower_del_def_cat) > 0 ? ' data-def_cat="' . $flower_del_def_cat . '"' : '') . ' ' . (strlen($flower_del_def_product) > 0 ? ' data-def_product="' . $flower_del_def_product . '"' : '') . '>';
     $htmlString = $htmlString.init_flower_delivery_menu();
     $htmlString = $htmlString.'<div class="florist-one-flower-delivery bootstrap-fhws-obituaries-container mb-5" name="florist-one-flower-delivery" id="florist-one-flower-delivery"></div>';
     $htmlString = $htmlString.'<div class="bootstrap-fhws-obituaries-container bootstrap-fhws-obituaries-container-1"><div id="florist-one-flower-delivery-loader" class="d-none d-flex justify-content-center position-fixed top-50 start-50"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div></div>';
     $htmlString = $htmlString.'</div>';

     return $htmlString;

  }

  function init_flower_delivery_menu(){

      ob_start();
      $cart_count = 0;
      echo '<div class="bootstrap-fhws-obituaries-container">';
      include 'partials/florist-one-flower-delivery-menu.php';
      $buffer = ob_get_clean();
      return $buffer;

  }

  function setFlowerSessionData($data){

    if( empty(session_id()) && !headers_sent()){
      session_start();
    }
    $checkout_data = array (

      'florist-one-flower-delivery-tree-certificate-name-of-loved-one',
      'florist-one-flower-delivery-tree-certificate-sender-display-name',
      'florist-one-flower-delivery-tree-certificate',
      'florist-one-flower-delivery-tree-certificate-email-behalf-recipient-name',
      'florist-one-flower-delivery-tree-certificate-email-behalf-recipient-email',
      'florist-one-flower-delivery-tree-certificate-email-behalf-message-to-recipient',
      'florist-one-flower-delivery-delivery-date',
      'florist-one-flower-delivery-special-card-message',
      'florist-one-flower-delivery-special-special-instructions',
      'florist-one-flower-delivery-recipient-name',
      'florist-one-flower-delivery-recipient-institution',
      'florist-one-flower-delivery-recipient-address-1',
      'florist-one-flower-delivery-recipient-city',
      'florist-one-flower-delivery-recipient-state',
      'florist-one-flower-delivery-recipient-country',
      'florist-one-flower-delivery-recipient-phone',
      'florist-one-flower-delivery-recipient-postal-code',
      'florist-one-flower-delivery-customer-name',
      'florist-one-flower-delivery-customer-email',
      'florist-one-flower-delivery-customer-address-1',
      'florist-one-flower-delivery-customer-address-2',
      'florist-one-flower-delivery-customer-state',
      'florist-one-flower-delivery-customer-city',
      'florist-one-flower-delivery-customer-country',
      'florist-one-flower-delivery-customer-postal-code',
      'florist-one-flower-delivery-customer-phone',
      'florist-one-flower-delivery-recipient-address-2'
    );

    for ($x = 0; $x < count($checkout_data); $x++) {
    //$_SESSION[$checkout_data[$x]] = (array_key_exists($checkout_data[$x], $data)) ? $data[$checkout_data[$x]] : ($_SESSION[$checkout_data[$x]] !== "" ?  $_SESSION[$checkout_data[$x]] : "" ) ;

      if(array_key_exists($checkout_data[$x], $data)){
      	$_SESSION[$checkout_data[$x]] = (array_key_exists($checkout_data[$x], $data)) ? $data[$checkout_data[$x]] : ($_SESSION[$checkout_data[$x]] !== "" ?  $_SESSION[$checkout_data[$x]] : "" ) ;
      }

    }

    //$_SESSION['florist-one-flower-delivery-facility-id'] = (array_key_exists('facility_id', $data)) ? $data['facility_id'] : ($_SESSION['florist-one-flower-delivery-facility-id'] !== "" ?  sanitize_text_field($_SESSION['florist-one-flower-delivery-facility-id']) : "" ) ;
    session_write_close();

    die();

  }

  function fill_in_missing_options(){

      $options = get_option('florist-one-flower-delivery');
      $missing = 0;

          if (!(isset($options['navigation_color']))) {
              $options['navigation_color'] = sanitize_hex_color('#8db6d9');
              $missing++;
          }
          if (!(isset($options['navigation_hover_color']))) {
              $options['navigation_hover_color'] = sanitize_hex_color('#18477d');
              $missing++;
          }
          if (!(isset($options['navigation_text_color']))) {
              $options['navigation_text_color'] = sanitize_hex_color('#FFF');
              $missing++;
          }
          if (!(isset($options['navigation_hover_text_color']))) {
              $options['navigation_hover_text_color'] = sanitize_hex_color('#000');
              $missing++;
          }
          if (!(isset($options['button_color']))) {
              $options['button_color'] = sanitize_hex_color('#8db6d9');
              $missing++;
          }
          if (!(isset($options['button_hover_color']))) {
              $options['button_hover_color'] = sanitize_hex_color('#8db6d9');
              $missing++;
          }
          if (!(isset($options['button_text_color']))) {
              $options['button_text_color'] = sanitize_hex_color('#FFF');
              $missing++;
          }
          if (!(isset($options['button_hover_text_color']))) {
              $options['button_hover_text_color'] = sanitize_hex_color('#000');
              $missing++;
          }
          if (!(isset($options['link_color']))) {
              $options['link_color'] = sanitize_hex_color('#18477d');
              $missing++;
          }
          if (!(isset($options['heading_color']))) {
              $options['heading_color'] = sanitize_hex_color('#000');
              $missing++;
          }
          if (!(isset($options['text_color']))) {
              $options['text_color'] = sanitize_hex_color('#000');
              $missing++;
          }
          if (!(isset($options['products_per_page']))) {
              $options['products_per_page'] = sanitize_text_field(12);
              $missing++;
          }
          if (!(isset($options['address_institution']))) {
              $options['address_institution'] = sanitize_text_field('');
              $missing++;
          }
          if (!(isset($options['address_1']))) {
              $options['address_1'] = sanitize_text_field('');
              $missing++;
          }
          if (!(isset($options['address_city']))) {
              $options['address_city'] = sanitize_text_field('');
              $missing++;
          }
          if (!(isset($options['address_state']))) {
              $options['address_state'] = sanitize_text_field('');
              $missing++;
          }
          if (!(isset($options['address_zipcode']))) {
              $options['address_zipcode'] = sanitize_text_field('');
              $missing++;
          }
          if (!(isset($options['address_country']))) {
              $options['address_country'] = sanitize_text_field('');
              $missing++;
          }
          if (!(isset($options['currency']))) {
              $options['currency'] = sanitize_text_field('u');
              $missing++;
          }
          if (!(isset($options['affiliate_id']))) {
              $options['affiliate_id'] = sanitize_text_field(0);
              $missing++;
          }
          if (!(isset($options['flower_storefront_id']))) {
              $options['flower_storefront_id'] = sanitize_text_field(0);
              $missing++;
          }
          if (!(isset($options['products_cw']))) {
              $options['products_cw'] = sanitize_text_field(0);
              $missing++;
          }
          if (!(isset($options['products_ea']))) {
              $options['products_ea'] = sanitize_text_field(0);
              $missing++;
          }
          if (!(isset($options['products_md']))) {
              $options['products_md'] = sanitize_text_field(0);
              $missing++;
          }
          if (!(isset($options['products_tg']))) {
              $options['products_tg'] = sanitize_text_field(0);
              $missing++;
          }
          if (!(isset($options['products_vd']))) {
              $options['products_vd'] = sanitize_text_field(0);
              $missing++;
          }
          if (!(isset($options['products_fb']))) {
              $options['products_fb'] = sanitize_text_field(0);
              $missing++;
          }
          if (!(isset($options['rotation']))) {
              $options['rotation'] = sanitize_text_field(0);
              $missing++;
          }
          if (!(isset($options['florists_of_choice']))) {
              $options['florists_of_choice'] = array();
              $missing++;
          }
          if (!(isset($options['facility_id']))) {
              $options['facility_id'] = sanitize_text_field(0);
              $missing++;
          }
          if (!(isset($options['florist_selection']))) {
              $options['florist_selection'] = sanitize_text_field(0);
              $missing++;
          }
          if (!(isset($options['locations']))) {
              $options['locations'] = array();
              if (strlen($options['address_1']) > 0) {
                $options['locations'][0] = array(
                  'address_institution' => sanitize_text_field($options['address_institution']),
                  'address_1' => sanitize_text_field($options['address_1']),
                  'address_city' => sanitize_text_field($options['address_city']),
                  'address_state' => sanitize_text_field($options['address_state']),
                  'address_country' => sanitize_text_field($options['address_country']),
                  'address_zipcode' => sanitize_text_field($options['address_zipcode']),
                  'address_phone' => sanitize_text_field($options['address_phone']),
                  'facility_id' => sanitize_text_field($options['facility_id']),
                  'florists' => array(),
                  'rotation' => sanitize_text_field($options['rotation'])
                );
              }
              $missing++;
          }
          if ($missing > 0) {
              update_option('florist-one-flower-delivery', $options);
          }

      return true;
  }


  add_shortcode('flower-delivery', 'init_flower_delivery');
