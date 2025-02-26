
    <?php
    
        /*
    
        Plugin Name: Appsila WooQuote
    
        Plugin URI: http://wooquote.appsila.com
    
        Description: Appsila WooQuote is a plugin that enables your customers send quote requests from your woocommerce shop which will then be tracked in a full functional Appsila CRM backend provided with the plugin.
    
        Author: Securify Ltd.
    
        Version: 1.5.0
    
        Tags: request a quote button, woocommerce request for quote, woocommerce request a quote shortcode, request a quote, quote, appsila, woocommerce, shop, ecommerce, e-commerce, quotations, request for quote, rfq, raq, proposal, ask an estimate, email quote, CRM, Low-code, Quote template
    
        Requires at least: 4.0.0
    
        Tested up to: 4.9.4
    
        License: GPLv2 or later
    
        License URI: http://www.gnu.org/licenses/gpl-2.0.html
    
        Author URI: http://securify.com.tr
    
    
    
        */
    
    
    
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
    
    //************************************* MAINPAGE **************************************
    
    //************************************* //In this section mainpage is created.
    
    /**
    
     * @desc Defines used lang. related strings in the plugin
    
     * @var ViewStrings
    
     */
    
    // $ViewStrings={ };
    
    /**
    
     * @desc defines logo and hardcoded settings for init.
    
     * @TODO unknown relations
    
     * @return [type] [description]
    
     */
    
    function appsila_wooquote_settings() {
    
        $my_plugin_appsila=plugins_url('images/Appsila_Logo.png', __FILE__);
    
        /**Mainpage is added to the WordPress menu.*/
    
        add_menu_page(__('appsila-wooquote'), __('WooQuote'), 'edit_themes', 'mainpage', 'appsila_wqt_mainpage', $my_plugin_appsila, 150);
    
    }
    
    /**
    
     * @desc admin_menu-->hooks-->appsila_wooquote_settings
    
     * @see add_action
    
     */
    
    add_action('admin_menu', 'appsila_wooquote_settings');
    
    /**
    
     * @desc *Extending the timeout duration to 20 seconds
    
     * @see add_action
    
     */
    
    add_filter( 'http_request_timeout', 'appsila_wqt_timeout' );
    
    /**
    
     * @desc It Sets TimeOut TimeOut
    
     * @TODO unknown relation
    
     * @param  [type] $time [description]
    
     * @return [type]       [description]
    
     */    
    function appsila_wqt_timeout( $time ){
    
        return 20;
    
    }    
    global $pagenow;
    
    $currentURI=$_SERVER['REQUEST_URI'];
    
    $checkCartPageUri=strpos($currentURI,"cart");
    
    $checkShopProductPage=strpos($currentURI,"product");
    
    $checkExceptionOfadminProgressWooCommerce=strpos($currentURI, "post_type=product");
    $input_validation_plugin_settings_color="";
    
    include 'externalsPHP/IncludesWooQuote.php'; 
    
    function appsila_wqt_mainpage() {
    
      global $e_mail,$web_url,$consumer_key,$consumer_secret,$data_array,$ticaretcrm_key,$hostname_database, $wc_api_key, $wc_api_secret,$temp;//Necessary global variables are created
    
      $temp = array('email','apikey','wc_api_key','wc_api_secret','hostname','enable');
    
      include('oscommerce_import_admin.php');//Everything you see on mainpage are included in here(Tabs, informations, inputs etc.)
    
    }
    //************************************* 'SAVE CHANGES' BUTTON FROM WOOQUOTE PLUGIN SETTINGS TAB
    
    /*
    
    This section is executed if user presses the 'Save changes' button.
    
    'Email', 'apikey' and 'website' datas are taken from user and compared with correct datas,
    
    if inputs are true it updates them,
    
    if inputs are wrong it gives error and shows the wrong input in the input text place with yellow highlights.
    
    */
    
          		     if (isset($_POST['product_transfer_type_button'])) {
    
                     global $activation_email,$int,$control_parameter,$activation_apikey;
    
                     $ticaretCRMoptions_check = getTicaretCrmOptions_AppsilaWooqoute_TransferInternal();
                     $ticaretCRMoptions_message_check = getTicaretCrmOptions_Message_AppsilaWooqoute_TransferInternal();
                          if(checkSubscriptionInputs_DifferencePrevious_AppsilaWooquote_WooQuoteHelper($ticaretCRMoptions_message_check)){
                                $subscriptonSettingsInputs=getInputsOnSubscriptonSettings_AppsilaWooqoute_TransferInternal();
                                $subscriptonSettingsInputs_Sanitized=arraySanitizeAll_AppsilaWooquote_WooQuoteHelper($subscriptonSettingsInputs);                               
                                updateLastCrmOptions_AppsilaWooqoute_TransferInternal($subscriptonSettingsInputs_Sanitized);
                                $returnPostMessage = SendRequestPostSubscriptionConfirmation_AppsilaWooQuote_RequestMaker($subscriptonSettingsInputs_Sanitized);
                                SubscribtionResultValueActions_AppsilaWooquote_SettingSubscription(
                                                                                            $returnPostMessage,
                                                                                            $subscriptonSettingsInputs_Sanitized,
                                                                                            $ticaretCRMoptions_message_check);                       
                             
                              }
                          else{ //If 'email', 'apikey' and 'website' inputs are same as the last updates datas, it executes this else block.
    
    
    
                              $data_array = array( //Putting the users inputs to an array.
    
                      	      "email" => $_POST['email-api'],
    
                      	      "apikey"  => $_POST['website-api'],
    
                      	      "wc_api_key"=> $_POST['wc-api-key'],
    
                      	      "wc_api_secret"=> $_POST['wc-api-secret'],
    
                              "hostname"=> $_POST['hostname'],
    
                              "enable"=> $_POST['enable'],
    
                              "addedCss"=>"background-color:".$input_validation_plugin_settings_color,
    
                              "isSubmited"=>"false"
    
                      	      );
    
                              update_option('temp_datas',$data_array);
    
    
    
                           $bul      = "-";
    
                           $degistir = "";
    
                           $_POST['website-api'] = str_replace($bul, $degistir, $_POST['website-api']);//It deletes all '-' characters from apikey input
    
                              $ticaretCRMoptions_isnot_null = array(
    
                              'email' => sanitize_text_field($_POST['email-api']),
    
                      			  'apikey' => sanitize_text_field($_POST['website-api']),
    
                              'wc_api_key' => sanitize_text_field($_POST['wc-api-key']),
    
                              'wc_api_secret' => sanitize_text_field($_POST['wc-api-secret']),
    
                              'hostname' => sanitize_text_field($_POST['hostname']),
    
                              'enable' => sanitize_text_field($_POST['enable'])
    
    
    
                            );
    
    
    
                           $temp = get_option('ticaretCRMoptions');
    
    
    
                            $_POST['msg'] = "Your settings were saved successfully.";
    
                            $input_validation_plugin_settings_color="";
    
                            $temp['addedCss']='background-color:'.$input_validation_plugin_settings_color;
    
                            $temp['isSubmited']="true";
    
                            update_option('lastCRMoptions',$temp);
    
                            $temp['enable']=sanitize_text_field($_POST['enable']); //If enable button is checked or unchecked, it updates that.
    
                            update_option('ticaretCRMoptions',$temp);
    
    
    
                            //include('popup9.php');
    
                           }
    
                      }
    
    
    
    
    
    
    
    
    
    //************************************* 'SAVE CHANGES' BUTTON FROM COUPON SETTINGS TAB
    
    /*
    
    This section is executed if user presses the 'Save changes' button.
    
    'Woocommerce API Consumer Key' and 'Woocommerce API Consumer Secret' datas are taken from user,
    
    if other inputs are true it updates 'Woocommerce API Consumer Key' and 'Woocommerce API Consumer Secret' datas,
    
    if other inputs are wrong it gives error just like earlier button,
    
    if other inputs are wrong it does not update 'Woocommerce API Consumer Key' and 'Woocommerce API Consumer Secret' datas.
    
    */
    
    
    
    
    
    
    
    
    
    
    
    				  if (isset($_POST['product_transfer_type_button_coupon'])) { // press the save changes button
    
                     global $activation_email,$int,$control_parameter,$activation_apikey,$temp;
    
                     $ticaretCRMoptions_check = get_option('ticaretCRMoptions');
    
                     $ticaretCRMoptions_message_check = get_option('ticaretCRMoptions_message');
    
    
    
                          $data_array = array( //Putting the users inputs to an array.
    
                      	      "email" => $_POST['email-api'],
    
                      	      "apikey"  => $_POST['website-api'],
    
                      	      "wc_api_key"=> $_POST['wc-api-key'],
    
                      	      "wc_api_secret"=> $_POST['wc-api-secret'],
    
                              "hostname"=> $_POST['hostname'],
    
                              "enable"=> $_POST['enable'],
    
                              "addedCss"=>"background-color:".$input_validation_plugin_settings_color,
    
                              "isSubmited"=>"false"
    
                      	   );
    
    
    
                           $bul      = "-";
    
                           $degistir = "";
    
                           $_POST['website-api'] = str_replace($bul, $degistir, $_POST['website-api']);//It deletes all '-' characters from apikey input
    
                          $ticaretCRMoptions_isnot_null = array(  //It strips all html from inputs.
    
                              'email' => sanitize_text_field($_POST['email-api']),
    
                      			  'apikey' => sanitize_text_field($_POST['website-api']),
    
                              'wc_api_key' => sanitize_text_field($_POST['wc-api-key']),
    
                              'wc_api_secret' => sanitize_text_field($_POST['wc-api-secret']),
    
                              'hostname' => sanitize_text_field($_POST['hostname']),
    
                              'enable' => sanitize_text_field($_POST['enable'])
    
    
    
                            );
    
    
    
    
    
                          update_option('lastCRMoptions',$data_array);//Users last input datas are shown in the text part of the input.
    
                          update_option('temp_apikey',$data_array);
    
                          $returnid=appsilaSendData3($data_array); //Input datas are sent to database.
    
    
    
                          if($returnid == 0){ //Input datas are checked. If they are wrong it gives email or licence error.
    
                                 // echo "<style>#email-api{background-color:yellow;}</style>";
    
                                 // echo "<style>#website-api{background-color:yellow;}</style>";
    
    
    
    
    
                                    $_POST['msg'] = $ticaretCRMoptions_message_check['api_email_error'];
    
                                    $input_validation_plugin_settings_color="yellow";
    
                                    $data_array['isSubmited']="false";
    
                                    $data_array['addedCss']='background-color:'.$input_validation_plugin_settings_color;
    
                                    update_option('lastCRMoptions',$data_array);
    
                                    //include('popup10.php');
    
                                }
    
                          if($returnid == 2 ){
    
                                    $_POST['msg'] = $ticaretCRMoptions_message_check['licence_error'];
    
                                    $input_validation_plugin_settings_color="yellow";
    
                                    $data_array['isSubmited']="false";
    
                                    $data_array['addedCss']='background-color:'.$input_validation_plugin_settings_color;
    
                                    update_option('lastCRMoptions',$data_array);
    
                                    //include('popup10.php');
    
                                }
    
    
    
                          if($returnid == 1){//If input datas are correct, it updates all datas.
    
    
    
    
    
                                     $temp = get_option('ticaretCRMoptions');
    
                                     $_POST['msg'] = "Your settings were saved successfully.";
    
                                     $input_validation_plugin_settings_color="";
    
                                     $temp['addedCss']='background-color:'.$input_validation_plugin_settings_color;
    
                                     $temp['isSubmited']="true";
    
                                     update_option('lastCRMoptions',$temp);
    
                              $temp['email']=$ticaretCRMoptions_isnot_null['email'];
    
                              $temp['apikey']=$ticaretCRMoptions_isnot_null['apikey'];
    
                              $temp['hostname']=$ticaretCRMoptions_isnot_null['hostname'];
    
                              $temp['wc_api_key']=$ticaretCRMoptions_isnot_null['wc_api_key'];
    
                              $temp['wc_api_secret']=$ticaretCRMoptions_isnot_null['wc_api_secret'];
    
                              $temp['enable']=sanitize_text_field($_POST['enable']);
    
                              update_option('ticaretCRMoptions',$temp);
    
    
    
                                  //include('popup9.php');
    
    
    
    
    
    
    
    
    
                                }
    
    
    
                      }
    
    
    
    
    
    
    
    
    
    //************************************* 'SAVE CHANGES' BUTTON FROM LABEL TRANSLATION TAB
    
    /*
    
    This section is executed if user presses the 'Save changes' button.
    
    It takes 'Message Settings' information from the user and saves them.
    
    */
    
    
    
    
    
    
    
    
    
                      if (isset($_POST['product_transfer_type_button_message'])) { //Putting the users input to an array.
    
                        $ticaretCRMoptions_message = array(
    
                               'requestbutton' => sanitize_text_field($_POST['requestbutton']),//It strips all html from inputs.
    
                               'success_message_1' => sanitize_text_field($_POST['success_message_1']),
    
                               'licence_error' => sanitize_text_field($_POST['licence_error']),
    
                               'api_email_error' => sanitize_text_field($_POST['api_email_error']),
    
                               'settings_success' => "Your settings were saved successfully.",
    
                               'name' => sanitize_text_field($_POST['name']),
    
                               'surname' => sanitize_text_field($_POST['surname']),
    
                               'company_name' => sanitize_text_field($_POST['company_name']),
    
                               'address' => sanitize_text_field($_POST['address']),
    
                               'phone' => sanitize_text_field($_POST['phone']),
    
                               'email_address' => sanitize_text_field($_POST['email_address']),
    
                               'product' => sanitize_text_field($_POST['product']),
    
                               'quantities' => sanitize_text_field($_POST['quantities']),
    
                               'comments' => sanitize_text_field($_POST['comments']),
    
                               'submit' => sanitize_text_field($_POST['submit'])
    
    
    
                             );
    
                             update_option('ticaretCRMoptions_message', $ticaretCRMoptions_message);//Updates the datas.
    
    
    
    					  		    $_POST['msg'] ="Your settings were saved successfully.";
    
                                    //include('popup9.php');
    
                           }
    
    
    
    
    
                      $ticaretCRMoptions_message = get_option('ticaretCRMoptions_message');
    
    
    
    // If inputs are saved blankly, these 'if' blocks are executed individually.
    
    // These 'if' blocks determine the default values of the Message Settings.
    
    
    
    if(empty($ticaretCRMoptions_message['requestbutton'])){
    
        $ticaretCRMoptions_message['requestbutton'] = "Request a Quote";
    
        update_option('ticaretCRMoptions_message', $ticaretCRMoptions_message);
    
    }
    
    if(empty($ticaretCRMoptions_message['success_message_1'])){
    
        $ticaretCRMoptions_message['success_message_1'] = "Thank you for your request. We will return to you as soon as possible.";
    
        update_option('ticaretCRMoptions_message', $ticaretCRMoptions_message);
    
    }
    
    if(empty($ticaretCRMoptions_message['licence_error'])){
    
        $ticaretCRMoptions_message['licence_error'] = "WooQuote licence has expired! Please contact with your site provider.";
    
        update_option('ticaretCRMoptions_message', $ticaretCRMoptions_message);
    
    }
    
    if(empty($ticaretCRMoptions_message['api_email_error'])){
    
        $ticaretCRMoptions_message['api_email_error'] = "Wrong Apikey or E-mail! Please check your Apikey and E-mail.";
    
        update_option('ticaretCRMoptions_message', $ticaretCRMoptions_message);
    
    }
    
    if(empty($ticaretCRMoptions_message['settings_success'])){
    
        $ticaretCRMoptions_message['settings_success'] = "Your settings were saved successfully.";
    
        update_option('ticaretCRMoptions_message', $ticaretCRMoptions_message);
    
    }
    
    if(empty($ticaretCRMoptions_message['name'])){
    
        $ticaretCRMoptions_message['name'] = "Name";
    
        update_option('ticaretCRMoptions_message', $ticaretCRMoptions_message);
    
    }
    
    if(empty($ticaretCRMoptions_message['surname'])){
    
        $ticaretCRMoptions_message['surname'] = "Surname";
    
        update_option('ticaretCRMoptions_message', $ticaretCRMoptions_message);
    
    }
    
    if(empty($ticaretCRMoptions_message['company_name'])){
    
        $ticaretCRMoptions_message['company_name'] = "Company Name";
    
        update_option('ticaretCRMoptions_message', $ticaretCRMoptions_message);
    
    }
    
    if(empty($ticaretCRMoptions_message['address'])){
    
        $ticaretCRMoptions_message['address'] = "Address";
    
        update_option('ticaretCRMoptions_message', $ticaretCRMoptions_message);
    
    }
    
    if(empty($ticaretCRMoptions_message['phone'])){
    
        $ticaretCRMoptions_message['phone'] = "Phone";
    
        update_option('ticaretCRMoptions_message', $ticaretCRMoptions_message);
    
    }
    
    if(empty($ticaretCRMoptions_message['email_address'])){
    
        $ticaretCRMoptions_message['email_address'] = "E-mail Address";
    
        update_option('ticaretCRMoptions_message', $ticaretCRMoptions_message);
    
    }
    
    if(empty($ticaretCRMoptions_message['product'])){
    
        $ticaretCRMoptions_message['product'] = "Product";
    
        update_option('ticaretCRMoptions_message', $ticaretCRMoptions_message);
    
    }
    
    if(empty($ticaretCRMoptions_message['quantities'])){
    
        $ticaretCRMoptions_message['quantities'] = "Quantities";
    
        update_option('ticaretCRMoptions_message', $ticaretCRMoptions_message);
    
    }
    
    if(empty($ticaretCRMoptions_message['comments'])){
    
        $ticaretCRMoptions_message['comments'] = "Comments";
    
        update_option('ticaretCRMoptions_message', $ticaretCRMoptions_message);
    
    }
    
    if(empty($ticaretCRMoptions_message['submit'])){
    
        $ticaretCRMoptions_message['submit'] = "Submit";
    
        update_option('ticaretCRMoptions_message', $ticaretCRMoptions_message);
    
    }
    
    
    
    
    
    
    
    
    
    class WooQuoteRandom{ //Generates random coupon codes.
    
                    public static function appsila_wqt_AlphaNumeric($length)
    
                          {
    
                              $chars = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
    
                              $clen   = strlen( $chars )-1;
    
                              $id  = '';
    
    
    
                              for ($i = 0; $i < $length; $i++) {
    
                                      $id .= $chars[mt_rand(0,$clen)];
    
                              }
    
                              return ($id);
    
                          }
    
    
    
                    }
    
    
    
    
    
    //**************************************BILLING AND ORDER SETTINGS
    
    //In this section customers data and information are saved and sent to system.
    
    //Customers requests turn into quotes.
    
    
    
                $ticaretCRMoptions = get_option('ticaretCRMoptions');
    
    
    
                add_action( 'woocommerce_after_add_to_cart_form', 'appsila_wqt_add_cf_before_addtocart_in_single_products');  //add button to single product page
    
                      function appsila_wqt_add_cf_before_addtocart_in_single_products()
    
                                  {
    
                              global $product,$sp_name,$tax_status,$tax_class,$tax_rate_sp,$product;
    
                              $id = $product->id;
    
                              $currency=get_woocommerce_currency();
    
                              global $current_user,$email;
    
                              get_currentuserinfo();
    
                              $user_info = get_userdata(1);
    
                              $email=$user_info->user_email;
    
                              $ticaretCRMoptions3 = array(
    
                                     'id' =>$id,
    
                                     'currency'=>$currency,
    
                                     'email'=>$email
    
                                   );
    
                                   update_option('sendData_single_page', $ticaretCRMoptions3);
    
    
    
    
    
    
    
                              $pd_number = $product->get_id();
    
                              			$sp_name=$product->get_title();
    
                              			$quantity = apply_filters( 'woocommerce_loop_add_to_cart_link', $quantity, $product );
    
    
    
                      			    $tax_rates = WC_Tax::get_rates( $product->get_tax_class() );
    
                      			    if (!empty($tax_rates)) {
    
                      			        $tax_rate = reset($tax_rates);
    
                      			        $asd=sprintf(_x('Inclusive %.2f %% tax', 'Text for tax rate. %.2f = tax rate', 'wptheme.foundation'), $tax_rate['rate']);		//olmadan olmuyor :)
    
                      			    }
    
                      					$tax_rate_sp=$tax_rate['rate'];
    
                      					$tax_class=$product->get_tax_class('view');
    
                      					$tax_status=$product->get_tax_status('view');
    
    
    
                      					$sp_shipping_class=$product->get_shipping_class( );
    
                      					$data=$product->get_data();
    
                      					$price=$data['price'];
    
                                        $currency=get_woocommerce_currency();
    
                      					$currency_symbol=get_woocommerce_currency_symbol($currency);
    
    
    
    
    
                      					$data = $product->get_data();
    
                      					$pro_in_tax=$product->get_price_including_tax();
    
                      					$pro_price=$data['price'];
    
    
    
                      					$data=new WC_Product_Attribute();
    
                                $coupon=WooQuoteRandom::appsila_wqt_AlphaNumeric(8);
    
    
    
                                $ticaretCRMoptions = get_option('ticaretCRMoptions');
    
                                $ticaretCRMoptions_message=get_option('ticaretCRMoptions_message');
    
    
    
                                $email=get_option('sendData_single_page');
    
    
    
                                $user_info = get_userdata(1);
    
    
    
                                if($ticaretCRMoptions['enable']=="on"){
    
                                  $ticaretCRMoptions = get_option('ticaretCRMoptions');
    
    
    
                                  $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($loop->post->ID));
    
                                  $image = $featured_image[0];
    
    
    
                                   $link = $product->get_permalink();
    
    
    
                                   $description = $product->get_short_description();
    
    
    
                                   $description_normal = $product->get_description();
    
    								               $code=$product->get_sku();
    
                                    $stock=$product->get_stock_quantity();
    
    
    
                                    $ticaretCRMoptions2 = array(
    
                                       'image' =>$image ,
    
                                       'link' => $link,
    
                                       'short_description'=>$description,
    
                                       'description'=>$description_normal,
    
                                       'code'=>$code,
    
                                       'stock'=>$stock
    
                                     );
    
    
    
    								 $my_plugin_appsila=plugins_url('images/Appsila_Logo.png', __FILE__);
    
    
    
    
    
                             update_option('sp_info', $ticaretCRMoptions2);
    
    
    
    
    
                      	         include('popup3.php');
    
    
    
    
    
                                }
    
                              }
    
    
    
    
    
    
    
            add_action( 'woocommerce_cart_actions', 'appsila_wqt_insert_empty_cart_button' );
    
    
    
                    function appsila_wqt_insert_empty_cart_button() { //add button to cart page
    
    
    
                		global $display_name , $user_email;
    
    
    
    
    
    
    
    
    
                		 get_currentuserinfo();
    
    
    
    
    
    
    
                		 global $sum_quantity,$product_id_array,$woocommerce,$tax_sum, $price, $list, $items, $pnamestr,$total_cart,$ppricestr,$pquantitystr,$ptaxstr,$ptax_statusstr,$ptax_classstr,$psale_pricestr,$pregular_pricestr;
    
    
    
                		 $items = $woocommerce->cart->get_cart();
    
    
    
                		$shipping=$woocommerce->cart-> get_cart_shipping_total( );
    
                		$total_cart=$woocommerce->cart->total;
    
    
    
                		$taxes=$woocommerce->cart-> get_cart_tax( );
    
    
    
                		$total_discount=$woocommerce->cart-> get_cart_discount_total( );
    
                		$currency=get_woocommerce_currency();
    
                		$currency_symbol=get_woocommerce_currency_symbol($currency);
    
    
    
                		 $dp = wc_get_price_decimals();
    
                     $total_tax = wc_format_decimal($woocommerce->cart->get_total_tax(), $dp);
    
    
    
                		 $pnamearray = [];
    
                      $pimagearray = [];
    
                       $pimage_linkarray = [];
    
                        $pshort_descriptionarray = [];
    
                         $pdescriptionarray = [];
    
                       $pskuarray = [];
    
                        $psku_quantityarray = [];
    
                		 $ppricearray = [];
    
                		 $pline_totalarray = [];
    
                		 $pquantityarray = [];
    
                     $product_id_array = [];
    
                		 $ptaxarray = [];
    
                		 $ptax_classarray = [];
    
                		 $ptax_statusarray = [];
    
                		 $psale_pricearray = [];
    
                		 $pregular_pricearray = [];
    
                		 $taxes=new WC_Cart();
    
                		 $shipping=new WC_Shipping();
    
    
    
    
    
                		 $total_shipping=$woocommerce->cart->get_shipping_total( );
    
                     $sum_quantity=0;
    
                     $coupon=WooQuoteRandom::appsila_wqt_AlphaNumeric(8);
    
                		 foreach($items as $item => $values) {
    
              		 		$_product =  wc_get_product( $values['data']->get_id() );
    
                      $product_id=$values['product_id'];
    
                      $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($product_id));
    
                      $image = $featured_image[0];
    
                        $image_link=$_product->get_permalink();
    
    						       $product_type=$_product->get_type();
    
                       $sku=$_product->get_sku();
    
                        $sku_quantity=$_product->get_stock_quantity();
    
                        $short_description=$_product->get_short_description();
    
                        $description=$_product->get_description();
    
              		 		$getProductDetail = wc_get_product( $values['product_id'] );
    
    
    
    				if ($product_type == 'variation'){
    
                        $name=$_product->get_title();
    
                        $name=$name." (".$sku.")";
    
                      }
    
                      else{
    
              		 		$name=$_product->get_title();
    
                      }
    
              		 		$quantity=$values['quantity'];
    
                      $sum_quantity=$sum_quantity+$values['quantity'];
    
              				$tax=$values['line_tax'];
    
    
    
              				$line_subtotal=$values['line_subtotal'];
    
              				$line_subtotal_tax=$values['line_subtotal_tax'];
    
              				$line_total=$values['line_total'];
    
    					if ($product_type == 'variation'){
    
                        $price=$_product->get_price('view');
    
    
    
                      }
    
                      else{
    
                      $price = get_post_meta($values['product_id'] , '_price', true);
    
                      }
    
    
    
              				$tax_status=get_post_meta($values['product_id'] , '_tax_status', true);
    
              				$tax_class=get_post_meta($values['product_id'] , '_tax_class', true);
    
              				$regular_price=get_post_meta($values['product_id'] , '_regular_price', true);
    
              		 		$regular_price=get_post_meta($values['product_id'] , '_regular_price', true);
    
              		 		$sale_price=get_post_meta($values['product_id'] , '_sale_price', true);
    
    
    
              		 		$tax_sum=$tax_sum+$tax;
    
              		 		array_push($pnamearray, $name);
    
                      array_push($pimagearray, $image);
    
                      array_push($pskuarray, $sku);
    
                      array_push($psku_quantityarray, $sku_quantity);
    
                      array_push($pimage_linkarray, $image_link);
    
                      array_push($pshort_descriptionarray, $short_description);
    
                      array_push($pdescriptionarray, $description);
    
              				array_push($ppricearray, $price);
    
                      array_push($product_id_array, $product_id);
    
              				array_push($pline_totalarray, $line_total);
    
              				array_push($pquantityarray, $quantity);
    
              				array_push($ptaxarray, $tax);
    
              				array_push($ptax_classarray, $tax_class);
    
              				array_push($ptax_statusarray, $tax_status);
    
              				array_push($psale_pricearray, $sale_price);
    
              				array_push($pregular_pricearray, $regular_price);
    
    
    
              		 }
    
                  			$pnamestr=implode( ",", $pnamearray );
    
                        $pimagestr=implode( ",", $pimagearray );
    
                        $pskustr=implode( ",", $pskuarray );
    
                        $psku_quantitystr=implode( ",", $psku_quantityarray );
    
                        $pimage_linkstr=implode( ",", $pimage_linkarray );
    
                        $pshort_descriptionstr=implode( ",", $pshort_descriptionarray );
    
                        $pdescriptionstr=implode( ",", $pdescriptionarray );
    
              					$ppricestr=implode( ",", $ppricearray );
    
                        $pidstr=implode( ",", $product_id_array );
    
              					$pline_totalstr=implode( ",", $pline_totalarray );
    
              					$pquantitystr=implode( ",", $pquantityarray );
    
              					$ptaxstr=implode( ",", $ptaxarray );
    
              					$ptax_classstr=implode( ",", $ptax_classarray );
    
              					$ptax_statusstr=implode( ",", $ptax_statusarray );
    
              				  $psale_pricestr=implode( ",", $psale_pricearray );
    
              					$pregular_pricestr=implode( ",", $pregular_pricearray );
    
                        $ticaretCRMoptions = get_option('ticaretCRMoptions');
    
                        global $current_user,$email;
    
                        $user_info = get_userdata(1);
    
                        $email=$user_info->user_email;
    
                        $ticaretCRMoptions2 = array(
    
                               'id' =>$pidstr ,
    
                               'quantity' => $sum_quantity,
    
                               'currency'=>$currency,
    
                               'email'=>$email,
    
                               'shipping_tax'=>$woocommerce->cart->shipping_tax_total,
    
                               'image'=>$pimagestr
    
                             );
    
    
    
                             update_option('sendData_cart', $ticaretCRMoptions2);
    
                               $ticaretCRMoptions23 = get_option('sendData_cart');
    
    
    
                  if($ticaretCRMoptions['enable']=="on"){
    
    
    
    
    
    
    
              		 include('popup2.php');
    
    
    
                            }
    
                     }
    
    
    
    
    
    
    
           if (isset($_POST['submit_request_button'])) {//if click the "Request a Quote" button,connect with http://www.ofisim.com/crm/ and entegrate quote with CRM
    
    
    
    
    
    
    
                        global $dataarray;
    
                        $dataarray = array( //Saving datas to an array.
    
                        "first_name" =>  $_POST['billing_first_name'],
    
                        "last_name"  => $_POST['billing_last_name'],
    
                        "address"=> trim($_POST['billing_address_1']),
    
                        "email"=> $_POST['billing_email'],
    
                        "company_name"=> $_POST['billing_company'],
    
                        "phone"=> $_POST['billing_phone'],
    
                        "comments"=> $_POST['order_comments'],
    
                        "productnames"=>  $_POST['pnamestr'],
    
                        "pimagestr"=>  $_POST['pimagestr'],
    
                        "pskustr"=>  $_POST['pskustr'],
    
                        "psku_quantitystr"=>  $_POST['psku_quantitystr'],
    
                        "pimage_linkstr"=>  $_POST['pimage_linkstr'],
    
                        "pshort_descriptionstr"=>  $_POST['pshort_descriptionstr'],
    
                        "pdescriptionstr"=>  $_POST['pdescriptionstr'],
    
                  			"line_total"=>  $_POST['pline_totalstr'],
    
                  			"prices"=>  $_POST['ppricestr'],
    
                  			"quantities"=>  $_POST['pquantitystr'],
    
                  			"tax"=>  $_POST['ptaxstr'],
    
                  			'tax-class'=>  $_POST['ptax_classstr'],
    
                  			'tax-status'=>  $_POST['ptax_statusstr'],
    
                  			'sale-prices'=>  $_POST['psale_pricestr'],
    
                  			"total"=> $_POST['total'],
    
                  			"total_tax"=> $_POST['total_tax'],
    
                  			"total_shipping"=> $_POST['total_shipping'],
    
                  			'regular-prices'=>  $_POST['pregular_pricestr'],
    
                  			'coupon'=>  $_POST['coupon'],
    
                  			'currency'=>  $_POST['currency'],
    
                  			'currency_symbol'=>  $_POST['currency_symbol'],
    
                  			'billing_quantities'=> $_POST['billing_quantities'],
    
                  			'sp_name'=>$_POST['sp_name'],
    
                        'image'=>$_POST['image'],
    
                        'link'=>$_POST['link'],
    
                        'description'=>$_POST['description'],
    
                        'description_normal'=>$_POST['description_normal'],
    
                  			'pro_price'=>$_POST['pro_price'],
    
                  			'pro_in_tax'=>$_POST['pro_in_tax'],
    
                  			'taxrate'=>$_POST['tax_rate_sp'],
    
                  			'taxstatus'=>$_POST['tax_status'],
    
                  			'taxclass'=>$_POST['tax_class'],
    
    
    
                    );
    
    
    
    
    
                     $stringarr = var_export($dataarray, true);
    
    
    
                    include('WooQuoteSendData.php');  //Send the quote to http://www.ofisim.com/crm/
    
                    $ticaretCRMoptions_message=get_option('ticaretCRMoptions_message');
    
    
    
                  	 $sonuc = appsilaSendData($dataarray);
    
    
    
                      if($sonuc == 1){
    
    
    
                          $_POST['msg'] = $ticaretCRMoptions_message['success_message_1'];;
    
                      	 include('PartialViews/PartialView_Component_Modal_Result.php');
    
                      }elseif($sonuc == 2){
    
    
    
                        $_POST['msg'] =$ticaretCRMoptions_message['licence_error'];
    
                        include('PartialViews/PartialView_Component_Modal_Result.php');
    
                      }
    
                      elseif($sonuc == 4){
    
                        $_POST['msg'] = "There is a problem with your domain name<br>Please contact your site provider";
    
                        include('PartialViews/PartialView_Component_Modal_Result.php');
    
                      }
    
                      elseif($sonuc == 0){
    
                        $_POST['msg'] = $ticaretCRMoptions_message['api_email_error'];
    
                        include('PartialViews/PartialView_Component_Modal_Result.php');
    
                      }
    
                      else{
    
                        $_POST['msg'] = "You check your connection!";
    
                        include('PartialViews/PartialView_Component_Modal_Result.php');
    
                      }
    
    
    
    
    
    
    
    
    
    
    
    }
    

