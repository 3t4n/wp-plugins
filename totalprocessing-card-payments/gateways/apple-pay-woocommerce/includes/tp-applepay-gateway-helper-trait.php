<?php

trait TotalProcessingApplePayGatewayHelperTrait{
    
    protected function storeSessAddressVars($data){
        $address_fields=$this->arrStaticData('address_fields');
        //process new data
        array_walk( $address_fields, array( $this, 'setCustomerAddressField' ), $data );
        //save customer data
        WC()->customer->save();
    }
    
    protected function clearSessAddressVars(){
        //clear sess data
        $address_fields=$this->arrStaticData('address_fields');
        foreach($address_fields as $k => $field){
            if ( is_callable( array( WC()->customer, "set_billing_{$field}" ) ) ) {
                WC()->customer->{"set_billing_{$field}"}("");
            }
            if ( is_callable( array( WC()->customer, "set_shipping_{$field}" ) ) ) {
                WC()->customer->{"set_shipping_{$field}"}("");
            }
        }
        WC()->customer->save();
    }
    
    public function checkVerificationFileHttpUrl(){
        $url_parse = wp_parse_url( home_url() );
        $url = 'https://'.trailingslashit($url_parse['host']).'.well-known/' . $this->domainVerificationFileName;
        $response = wp_remote_get( $url );
        if ( is_array( $response ) && ! is_wp_error( $response ) ) {
            if($response['response']['code'] === 200){
                return true;
            }
        }
        return false;
    }
    
    public function applePayButtonsArray($buildBtn = false, $showStyle = false){
        $buttonData                  = [ 'cart', 'checkout' ];
        if( $buildBtn !== false && in_array($buildBtn, $buttonData) ){
	return '
            <ul class="wc_payment_methods payment_methods methods wc_tp_applepay_container" style="list-style:none;">
                <li class="wc_payment_method wc_tp_applepay_containerli">
                    <label for="payment_method_wc_tp_applepay" style="padding:1.41575em 0 1.41575em 0;">
                        All transactions are secured and encrypted 
                        <img src="'.TOTALPROCESSING_PAYMENTGATEWAY_APPLEPAY_BASEURL.'assets/img/apple-pay-logo@2x.png" alt="Apple Pay" style="height:24px; padding:0;float: right;margin: 2px;">
		    </label>
                    <div id="tp-appp-loader" class="tp-applepay-init-loader" style="display: flex;justify-content: center;margin-top:1.41575em;"><div class="dot-bricks"></div></div>
                    <div id="payment_method_wc_tp_applepayiframecontainer"></div>' . ( $buildBtn == 'cart' ? wc_get_template_html( 'checkout/terms.php' ) : '' ) . '
	        </li>
            </ul>';
        }
        return '';
    }

    public function inheritGatewayCrentialsFromCardProcessing(){
        if( $this->inheritcreds == 'yes' ){
            $TPPaymentObj                     = new WC_Payment_Gateway_TotalProcessing_Cards();
            $entityIdTest                     = $TPPaymentObj->get_option( 'entityId_test' );
            $accessTokenTest                  = $TPPaymentObj->get_option( 'accessToken_test' );
            $entityId                         = $TPPaymentObj->get_option( 'entityId' );
            $accessToken                      = $TPPaymentObj->get_option( 'accessToken' );
            $this->update_option('entityId_test', $entityIdTest);
            $this->update_option('accessToken_test', $accessTokenTest);
            $this->update_option('entityId', $entityId);
            $this->update_option('accessToken', $accessToken);
        }
    }

    public function getEntityID(){
        return ($this->platformBase == 'live' ? $this->entityId : $this->entityId_test);
    }

    public function getAccessToken(){
        return ($this->platformBase === 'live' ? $this->accessToken : $this->accessToken_test);
    }

    public function getPlatformBase(){
        return ($this->platformBase === 'live' ? 'eu-prod.oppwa.com' : 'eu-test.oppwa.com');
    }
    
    public function statusDomainVerifactionFile(){
        $pluginFilePath     = TOTALPROCESSING_PAYMENTGATEWAY_APPLEPAY_BASEPATH;
        $docBase            = trailingslashit($_SERVER['DOCUMENT_ROOT']);
        $certFilePath       = '.well-known/' . $this->domainVerificationFileName;
        $docFilePath        = $docBase . $certFilePath;
        $arrayFalse         = [
            "valid"       => false,
            "mark"        => "error",
            "description" => $certFilePath,
            "private"     => true,
            "button"      => [
                "value"       => "Move File",
                "pl_action"   => "moveValidationFile"
            ]
        ];
        $arrayTrue          =[
            "valid"       => true,
            "mark"        => "yes",
            "description" => $certFilePath,
            "private"     => false
        ];
        
        if( !is_writable( $docBase . '.well-known/' ) ){
            return [
                "valid"       => false,
                "mark"        => "yes",
                "description" => $certFilePath . ' is not writable',
                "private"     => false
            ];
        }

        $fileFolder         = trailingslashit( $pluginFilePath ) . 'appleValidation/';
        $location           = $fileFolder . $this->domainVerificationFileName;
        $destination        = $docFilePath;
        if( !file_exists( $destination ) ){
            return [
                "valid"       => false,
                "mark"        => "error",
                "description" => $certFilePath . ' is missing',
                "private"     => false,
                "button"      => [
                    "value"       => "Move File",
                    "pl_action"   => "moveValidationFile"
                ]
            ];
        }
        $origFileContent    = file_get_contents($location);
        $origFileContent    = trim($origFileContent);
        $destFileContent    = file_get_contents($destination);
        $destFileContent    = trim($destFileContent);
        if( file_exists( $destination ) && $origFileContent != $destFileContent ){
            return [
                "valid"       => false,
                "mark"        => "error",
                "description" => $certFilePath . ' is not right file',
                "private"     => false,
                "button"      => [
                    "value"       => "Move File",
                    "pl_action"   => "moveValidationFile"
                ]
            ];
        }
        return $arrayTrue;
    }
    
    public function moveValidationFile(){
        $status                       = false;
                                      
        $targetDir                    = $this->createRootFolderProcedure('.well-known');
                                      
        $tpapFs_docRoot               = $_SERVER["DOCUMENT_ROOT"];
        $tpapFs_homePath              = get_home_path();
        $tpapFs_pluginFilePath        = plugin_dir_path( __FILE__ );
        
        if($targetDir !== false){
            $location                 = TOTALPROCESSING_PAYMENTGATEWAY_APPLEPAY_BASEPATH . '/appleValidation/' . $this->domainVerificationFileName;
            $destination              = trailingslashit($tpapFs_docRoot) . '.well-known/' . $this->domainVerificationFileName;
            $status                   = $this->moveFileDir($location, $destination);
        }
        wp_send_json_success( [
            "valid"                  => $status,
            "containerId"            => "statusTablesContainer",
            "html"                   => $this->generateStatusArray(true)
        ] );
    }

    public function createRootFolderProcedure($dir){
        $docBase = $_SERVER['DOCUMENT_ROOT'];
        
        $docPath = trailingslashit($docBase) . $dir;
        
        if(!is_dir($docPath)){
            if(mkdir($docPath)) {
                if(chmod($docPath, 0755)){
                    return $docPath;
                }
            }
        } else {
            return $docPath;
        }
        return false;
    }
    
    public function moveFileDir($location, $destination){
        if(file_exists($location)){
            file_put_contents($destination, file_get_contents($location));
            return true;
        }
        return false;
    }
    
    public function generateStatusArray($retHtml=false,$colSpan=4){
        $array                        = [];
        if($retHtml){
            $html                     = '';
        }
        if(!is_admin()){
            return $array;
        }
        $array                        = [
            [
                "group" => "General Settings",
                "data"  => [
                    [ 
                        "name"          => "WooCommerce Apple Pay payments",
                        "status"        => $this->statusCheckIsEnabled($this->enabled,'',false)
                    ],
                    [
                        "name"          => "Apple Pay buttons restricted to only admins",
                        "status"        => $this->statusCheckIsEnabled($this->onlyadmins, '', true, 'yes', 'warning' )
                    ],
                    [
                        "name"          => "Apple Pay console.log()",
                        "status"        => $this->statusCheckIsEnabled( $this->get_option( 'jsLogging' ), '', true, ($this->jsLogging == 'yes' ? 'warning' : 'yes'), ($this->jsLogging == 'yes' ? 'warning' : 'warning') )
                    ],
                    [
                        "name"          => "SSL Protocol",
                        "status"        => $this->usingSSL()
                    ],
                ]
            ],
            [
                "group" => "Gateway Configurations",
                "data"  => [
                    [
                        "name"          => "Selected Payment Environment",
                        "status"        => [
                            "valid"           => true,
                            "mark"            => ($this->platformBase != 'test' ? 'yes' : 'warning'),
                            "description"     => $this->platformBase,
                            "private"         => false
                        ]
                    ],
                    [
                        "name"          => "TEST Processing: accessToken",
                        "helptip"       => "",
                        "status"        => $this->stringCheck($this->accessToken_test, '/[a-zA-Z0-9]{58}[=]{2}/m', ($this->platformBase != 'test' ? 'warning' : 'error'), 'yes')
                    ],
                    [
                        "name"          => "TEST Processing: entityId",
                        "helptip"       => "",
                        "status"        => $this->stringCheck($this->entityId_test, '/[a-z0-9]{32}/m', ($this->platformBase != 'test' ? 'warning' : 'error'), 'yes')
                    ],
                    [
                        "name"          => "LIVE Processing: accessToken",
                        "helptip"       => "",
                        "status"        => $this->stringCheck($this->accessToken, '/[a-zA-Z0-9]{58}[=]{2}/m', ($this->platformBase != 'live' ? 'warning' : 'error'), 'yes')
                    ],
                    [
                        "name"          => "LIVE Processing: entityId",
                        "helptip"       => "",
                        "status"        => $this->stringCheck($this->entityId, '/[a-z0-9]{32}/m', ($this->platformBase != 'live' ? 'warning' : 'error'), 'yes')
                    ],
                ]
            ],
            [
                "group" => "Apple Domain Registration",
                "data"  => [
                    [
                        "name"          => "Domain Registration Request",
                        "helptip"       => "",
                        "status"        => $this->statusDomainRegistrationRequest()
                    ],
                ]
            ],
            [
                "group" => "Apple Domain Validation",
                "data"  => [
                    [
                        "name"          => $this->domainVerificationFileName,
                        "helptip"       => "",
                        "status"        => $this->statusDomainVerifactionFile()
                    ],
                ]
            ],
            [
                "group" => "Webhook variables (for Total Processing ref.)",
                "data"  => [
                    [
                        "name"     => "var:domain",
                        "status"   => [
                            "valid"       => true,
                            "description" => $_SERVER['HTTP_HOST'],
                            "private"     => true
                        ]
                    ],
                    [
                        "name"     => "var:wp_path",
                        "status"   => [
                            "valid"       => true,
                            "description" => site_url(),
                            "private"     => true
                        ]
                    ],
                    [
                        "name"     => "get_home_path",
                        "status"   => [
                            "valid"       => true,
                            "description" => get_home_path(),
                            "private"     => true
                        ]
                    ],
                    [
                        "name"     => "SERVER_SOFTWARE",
                        "status"   => [
                            "valid"       => true,
                            "description" => $_SERVER['SERVER_SOFTWARE'] . ' PHP v' . phpversion(),
                            "private"     => false
                        ]
                    ],
                    [
                        "name"     => "SERVER_PROTOCOL",
                        "status"   => [
                            "valid"       => true,
                            "description" => $_SERVER['SERVER_PROTOCOL'],
                            "private"     => false
                        ]
                    ],
                ]
            ],
        ];
        if($retHtml){
            foreach($array as $tbl){
                $html.='<table class="wc_status_table widefat" cellspacing="0">'."\n";
                $html.='<thead>'."\n";
                $html.='<tr>'."\n";
                $html.='<th colspan="'.$colSpan.'" data-export-label="'.$tbl['group'].'">'."\n";
                $html.='<h2>'.$tbl['group'].'</h2></th>'."\n";
                $html.='</tr>'."\n";
                $html.='</thead>'."\n";
                $html.='<tbody>'."\n";
                if(isset($tbl['group']) && is_array($tbl['data'])){
                    foreach($tbl['data'] as $tr){
                        $html.='<tr>'."\n";
                        $html.='<td data-export-label="'.$tr['name'].'">'.$tr['name'].'</td>'."\n";
                        $html.='<td class="help">'."\n";
                        if(isset($tr['helptip'])){
                            $html.='<span class="woocommerce-help-tip">'.$tr['helptip'].'</span>'."\n";
                        }
                        $html.='</td>'."\n";
                        $html.='<td>'."\n";
                        if(isset($tr['status']['mark'])){
                            if((bool)$tr['status']['valid'] === true){
                                $dashIcon = $tr['status']['mark'];
                            } else {
                                $dashIcon = 'warning';
                            }
                            $html.='<mark class="'.$tr['status']['mark'].'"><span class="dashicons dashicons-'.$dashIcon.'"></span> '."\n";
                        }
                        if(isset($tr['status']['private']) && (bool)$tr['status']['private']===true){
                            $html.='<code class="private">'."\n";
                        }
                        $html.= $tr['status']['description'];
                        if(isset($tr['status']['private']) && (bool)$tr['status']['private']===true){
                            $html.='</code>'."\n";
                        }
                        if(isset($tr['status']['mark'])){
                            $html.='</mark>'."\n";
                        }
                        $html.='</td>'."\n";
                        $html.='<td style="text-align:right;">'."\n";
                        if(isset($tr['status']['button'])){
                            $html.='<button class="button tp-admin-ajax" data-pl_action="'.$tr['status']['button']['pl_action'].'" value="'.$tr['status']['button']['value'].'">'.$tr['status']['button']['value'].'</button>'."\n";
                        }
                        $html.='</td>'."\n";
                        $html.='</tr>'."\n";
                    }
                }
                $html.='</tbody>'."\n";
                $html.='</table>'."\n";
            }
            return $html;
        }
        return $array;
    }
    
    public function statusCheckIsEnabled($item,$customDescription='',$reverse=false,$errorClass='error',$successClass='yes'){
        $condition='yes';
        $arrayFalse=["valid"=>false,"mark"=>$errorClass,"description"=>"Disabled","private"=>false];
        $arrayTrue=["valid"=>true,"mark"=>$successClass,"description"=>"Enabled","private"=>false];
        if($reverse){
            $arrayFalse["valid"] = true;
        }
        if($item == $condition){
            $array = $arrayTrue;
        } else {
            $array = $arrayFalse;
        }
        if(trim($customDescription) != ''){
            $array['description'] = $array['description'].' ('. $customDescription.')';
        }
        return $array;
    }
    
    public function stringCheck($item,$pattern,$errorClass='error',$successClass='yes'){
        $arrayFalse=["valid"=>false,"mark"=>$errorClass,"description"=>"","private"=>false];
        $arrayTrue=["valid"=>true,"mark"=>$successClass,"description"=>"","private"=>false];
        preg_match_all($pattern, $item, $matches, PREG_SET_ORDER, 0);
        if(count($matches)>0){
            return $arrayTrue;
        }
        if($pattern == '/[a-zA-Z0-9]{58}[=]{2}/m' || $pattern == '/[a-z0-9]{32}/m'){
            if($errorClass == 'warning'){
                $arrayFalse['description'] = "*Not essential when in current processing environment";
            } else {
                $arrayFalse['description'] = "ERROR processing will fail in selected processing environment!";
            }
        }
        return $arrayFalse;
    }
    
    public function usingSSL($errorClass='error',$successClass='yes'){
        $arrayFalse=["valid"=>false,"mark"=>$errorClass,"description"=>"","private"=>false];
        $arrayTrue=["valid"=>true,"mark"=>$successClass,"description"=>"","private"=>false];
        if(is_ssl()){
            return $arrayTrue;
        }
        return $arrayFalse;
    }

    public function insUpPluginOption($option, $value, $unset=false){
        $value               = sanitize_text_field($value);
        if(get_option($option) !== $unset){
            return update_option($option, $value);
        } else {
            return add_option($option,$value);
        }
    }
    
    /*
     * This sends payload to generate checkoutid for checkout form payment gateway
     */
    public function requestCheckoutID( $obj = true, $forceAmount = false ){
        $requiredBillingContactFields  = $this->billingAddressFields;
        $requiredShippingContactFields = $this->shippingAddressFields;
        $supportedCountries            = [];
        /*$supportedOptions              = [];
        if(is_array($this->supportedCountries)){
            $supportedOptions          = $this->supportedCountries;
        }
        $diffSupportedCountries        = array_diff(array_keys ($this->arrStaticData('3166')), $supportedOptions);
        foreach($diffSupportedCountries as $country){
            $supportedCountries[]      = $country;
        }*/
        //get settings
        $wooAddrOption                 = get_option( 'woocommerce_ship_to_destination' , '' );
        $billingFields                 = $this->genAddrReq('GB', 'billing_');
        $shippingFields                = $this->genAddrReq('GB', 'shipping_');
        if(in_array('billing_phone', $billingFields)){
            $requiredShippingContactFields[] = "phone";
        }
        if($wooAddrOption !== 'billing_only'){
            if($this->reqShipping() === true){
                $requiredShippingContactFields[] = "postalAddress";
            }
        }

        if(isset(WC()->cart)){
            $amount                    = WC()->cart->get_total(null);
        }else{
            $amount                    = 0;
        }

        if((float)$amount === 0){
            return false;
	}

        $order_id                      = isset( WC()->session->order_awaiting_payment ) ? 
                                             absint( WC()->session->order_awaiting_payment ) : 
                                             absint( WC()->session->get( 'store_api_draft_order', 0 ) );

        if( !$order_id ){
            $order_id                  = WC()->checkout->create_order( $dataArray );
            WC()->session->set( 'order_awaiting_payment', $order_id );
        }
        $payload                       = [
            'entityId'              => $this->getEntityID(),
            'paymentType'           => $this->paymentType,
            'amount'                => number_format($amount, 2, '.', ''),
            'currency'              => get_woocommerce_currency(),
            'merchantTransactionId' => $order_id
        ];

        $remoteUrl                     = 'https://' . $this->getPlatformBase() . '/v1/checkouts';
        
        $array                         = [
            'method'          => 'POST',
            'timeout'         => 30,
            'redirection'     => 5,
            'httpversion'     => '1.0',
            'blocking'        => true,
            'headers'         => [
                'Content-Type'  => 'application/x-www-form-urlencoded; charset=UTF-8',
                'Authorization' => 'Bearer '.$this->getAccessToken()
             ],
            'body' => $payload
        ];

        $response                      = wp_remote_request( $remoteUrl , $array);
        
        if( is_wp_error( $response ) ){
            $errorMessage              = $response->get_error_message();
            return false;
        }
        $responseData                  = json_decode($response['body']);

        if(isset($responseData->id)){
            if(isset($responseData->result->code)){
                if(in_array($responseData->result->code,['000.200.000','000.200.100','000.200.101'])){
                    $id                = (string)$responseData->id;
                    $array             = [
                        "termAndConditionCheckbox"              => wc_terms_and_conditions_checkbox_enabled(),
                        "currencyCode"                          => get_woocommerce_currency(),
                        "merchantCapabilities"                  => $this->acceptedCards,
                        "supportedNetworks"                     => $this->supportedNetworks,
                        //"supportedCountries"                    => $supportedCountries,
                        "displayName"                           => empty( $this->displayName ) 
                                                                       ? get_bloginfo( 'name' ) : $this->displayName,
                        "total"                                 => [
                            "label"            => empty( $this->displayName ) ? get_bloginfo( 'name' ) : $this->displayName,
                            "amount"           => (string)WC()->cart->get_total(null),
                        ],
                        "requiredBillingContactFields"          => $requiredBillingContactFields,
                        "requiredShippingContactFields"         => $requiredShippingContactFields,
                        "shippingType"                          => "shipping",
                        "shippingMethods"                       => [],
                        "platformBase"                          => $this->getPlatformBase(),
                        "checkout_id"                           => $id,
                    ];
                }
                wp_send_json_success($array);exit;
            }
        }
        wp_send_json_error(['message' => 'failed'], 403);exit;
    }
    
    public function reqShipping(){
        if($this->forceNoShipping === true){
            return false;
        }
        $cart_contents  = WC()->cart->cart_contents;
        $needs_shipping = false;
        if ( ! empty( $cart_contents ) ) {
            foreach ( $cart_contents as $cart_item_key => $values ) {
                if ( $values['data']->needs_shipping() ) {
                    $needs_shipping = true;
                    break;
                }
            }
        }
        return $needs_shipping;
    }

    public function validateTransactionStatus(){
        $resourcePath    = $_POST['resourcePath'] ?? null;
        $order_id        = $_POST['order_id'] ?? null;
        if( empty( $resourcePath ) ){
            wc_add_notice( __('Uncertain Response. Please report this to the merchant before reattempting payment. They will need to verify if this transaction is successful. Ref:' . $resourcePath), 'error');
            wp_send_json_error(['message' => 'failed'], 403);exit;
        }
        /*if( empty( $order_id ) ){
            wc_add_notice( __('Uncertain Response. Please report this to the merchant before reattempting payment. They will need to verify if this transaction is successful. Ref:' . $resourcePath), 'error');
            return false;
	}*/
        $executionTime           = [];
        $url                     = $resourcePath;
        if( strpos( $resourcePath, 'https' ) === false ){
            $url                 = "https://" . $this->getPlatformBase() . $resourcePath;
        }
        if( strpos( $url, 'entityId' ) === false ){
            $url                .= "?entityId=".$this->getEntityID();
        }

        $headers                 = ['Content-Type' => 'application/x-www-form-urlencoded; charset=UTF-8','Authorization' => 'Bearer '.$this->getAccessToken()];
        $arg                     = [
            'method'         => 'GET',
            'timeout'        => 15,
            'redirection'    => 5,
            'httpversion'    => '1.0',
            'blocking'       => true,
            'headers'        => $headers
        ];
        
        $response                = wp_remote_request( $url, $arg );
        $secondaryCall           = false;
        if( is_wp_error( $response ) ) {
            $errorMessage        = $response->get_error_message();
            $secondaryCall       = true;
        }elseif( !isset( $response['body'] ) ) {
            $secondaryCall       = true;
        }
        if( $secondaryCall === true && !empty( $order_id ) ){
            $url                 = "https://".$this->derivePlatformBase()."/v1/query";
            $url                .= "?entityId=" . $this->getEntityID();
            $url                .= "&merchantTransactionId=" . (int)$order_id;
            
            $response      = wp_remote_request( $url, $arg );
            if( is_wp_error( $response ) ) {
                $errorMessage    = $response->get_error_message();
            }
        }
        
        if( is_wp_error( $response ) ) {
            $errorMessage        = $response->get_error_message();
            wc_add_notice( __('Uncertain Response. Please report this to the merchant before reattempting payment. They will need to verify if this transaction is successful. Ref:' . $resourcePath), 'error');
            wp_send_json_error(['message' => 'failed'], 403);exit;
        }elseif( !isset( $response['body'] ) ) {
            wc_add_notice( __('Uncertain Response. Please report this to the merchant before reattempting payment. They will need to verify if this transaction is successful. Ref:' . $resourcePath), 'error');
            wp_send_json_error(['message' => 'failed'], 403);exit;
        }
        $responseResult          = $response['body'];
        $responseData            = json_decode($responseResult);
        $responseData            = ( $secondaryCall === true ) ? 
                                       ( isset($responseData->payments[0]) ? $responseData->payments[ ( count( $responseData->payments ) - 1 ) ] : new stdClass) :
                                       $responseData;
        $responseData            = $this->parseResponseData($responseData);
        wp_send_json_success($responseData);
    }

    public function fn_tp_applepay_create_order(){
        $jsonData         = file_get_contents('php://input');
        $this->writeLog( '----- fn_tp_applepay_create_order -----', $jsonData, 'debug' );
    }

    public function statusDomainRegistrationRequest(){
        $gatewayType            = $this->get_option( 'platformBase' );
        $requestStatus          = get_option( 'applepayDomainRegStatus', 0 );
        if( $gatewayType != 'live' ){
            return [
                "valid"       => false,
                "mark"        => "error",
                "description" => 'Applepay is currently only available via Live credentials',
                "private"     => false,
            ];
        }
        if( $requestStatus == 1 ){
            return [
                "valid"       => false,
                "mark"        => "warning",
                "description" => 'Request sent for domain registration, Awaiting status. If you want to communicate, please send us email at ' . TP_APPLEPAY_SUPPORT_EMAIL,
                "private"     => false,
                "button"      => [
                    "value"       => "Re-Send Request",
                    "pl_action"   => "sendDomainRegistrationRequest"
                ]
            ];
        }
        if( $requestStatus == 2 ){
            return [
                "valid"       => true,
                "mark"        => "yes",
                "description" => 'Domain registration is done successfully. If you want to communicate, please send us email at ' . TP_APPLEPAY_SUPPORT_EMAIL,
                "private"     => false,
            ];
        }
        return [
            "valid"       => false,
            //"mark"        => "no",
            "description" => 'Click button to request for domain registration',
            "private"     => false,
            "button"      => [
                "value"       => "Send Request",
                "pl_action"   => "sendDomainRegistrationRequest"
            ]
        ];
    }

    public function sendDomainRegistrationRequest(){
        $domain                       = get_option('siteurl'); //or home
        $domain                       = str_replace('http://', '', $domain);
        $domain                       = str_replace('https://', '', $domain);
        $domain                       = str_replace('www', '', $domain);
        $adminEmail                   = get_option('admin_email');

        // Get the user object for the admin email
        $adminUser                    = get_user_by('email', $adminEmail);

        // Default name if the user is not found
        $adminName                    = $adminUser ? $adminUser->display_name : 'Admin';

        // Get the merchant email from WooCommerce settings
        $merchantEail                 = get_option('woocommerce_email_from_address');
    
        // Fallback to site admin email if not set
        if (empty($merchantEmail)) {
            $merchantEmail            = $adminEmail;
        }

        // Get the merchant name from WooCommerce email settings
        $merchantName                 = get_option('woocommerce_email_from_name');

        // Fallback to the site name if the WooCommerce setting is not set
        if (empty($merchantName)) {
            $merchantName             = $adminName;
        }

	$entityId                     = $this->get_option( 'entityId' );
        $pluginVer                    = \TotalProcessing\WC_TotalProcessing_Constants::getPluginFileData('Version');

        $hash                         = get_option('applepayDomainRegStatusHash', null);
        if( empty($hash) ){
            $hash                     = md5( time() );
            $this->insUpPluginOption('applepayDomainRegStatusHash', $hash);
        }
        $domainRegStatusLink          = admin_url( 'admin-ajax.php?action=tpApplepaydomainRegistationSuccess&hash=' . $hash );
        
        $status                       = true;
        $to                           = TP_APPLEPAY_SUPPORT_EMAIL;
	$subject                      = $domain . ' - Applepay Authorisation request';
        ob_start();
        include TOTALPROCESSING_PAYMENTGATEWAY_APPLEPAY_BASEPATH . 'emails/domain-registration-email.php';
        $body                         = ob_get_contents();
        ob_end_clean();
        $headers                      = array('Content-Type: text/html; charset=UTF-8');

        wp_mail( $to, $subject, $body, $headers );

        $this->insUpPluginOption('applepayDomainRegStatus', 1);
        wp_send_json_success( [
            "valid"                  => $status,
            "containerId"            => "statusTablesContainer",
            "html"                   => $this->generateStatusArray(true),
        ] );
    }

    public function domainRegistrationRequestThanks(){
        $rHash                        = sanitize_text_field( $_REQUEST['hash'] );
        $hash                         = get_option('applepayDomainRegStatusHash', null);
        if( !empty( $rHash ) && $hash == $rHash ){
            $this->insUpPluginOption('applepayDomainRegStatus', 2);
            ob_start();
            include TOTALPROCESSING_PAYMENTGATEWAY_APPLEPAY_BASEPATH . 'templates/domain-registration-thankyou.php';
            $body                         = ob_get_contents();
            ob_end_clean();
            die( $body );
	}
    }
}
