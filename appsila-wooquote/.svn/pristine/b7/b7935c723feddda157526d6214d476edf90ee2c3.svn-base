<?php
    /**
     * @desc Sending - Returning POST's
     * @param  $url
     * @param  $post_data
     * @return $result
     */
    function RequestMaker_AppsilaWooQuote_RequestMaker($url,$post_data){   
       
        $response = wp_remote_post( $url, array(
            'method' => 'POST',
            'headers' => getPostHeaderDefaults_AppsilaWooquote_WebConfig(),
            'body' => $post_data
        )
            );
        $result=$response["body"];
        return $result;
    }
    /**
     * @desc prepare Subscripton datas and sends request with RequestMaker 
     * Returns condition enum number 
     * @see $enums_SubscriptionCheckPost
     * @param array $post_data
     * @return $enums_SubscriptionCheckPost
     */
    function SendRequestPostSubscriptionConfirmation_AppsilaWooQuote_RequestMaker($post_data){
        $post_data["apikey"]=removeDashesInStringValue_AppsilaWooquote_WooQuoteHelper($post_data["apikey"]);
        $resultPostMessage=RequestMaker_AppsilaWooQuote_RequestMaker(
            getSubscriptonRequest_API_URL_AppsilaWooquote_WebConfig(),
            getMakeSubscriptonPostJson_ForRequestMaker_AppsilaWooqoute_TransferInternal($post_data));
        $returnMessage=subcriptonResultTransform_NumberTo_String_AppsilaWooQuote_RequestMaker(intval($resultPostMessage)); 
        return $returnMessage;
    }
    /**
     * @desc It takes response number and return string equality
     * @Param resultPostMessage {Number} 1:Success,2:LicenceError,Else:EmailError
     */
    function subcriptonResultTransform_NumberTo_String_AppsilaWooQuote_RequestMaker($value){
        $resultStringPairSubscription = new SubscriptonSubmitResultTransformToString_AppsilaWooqoute_ConfigInternal();
        $returnMessageTemp;
        switch ($value){
            case 1: $returnMessageTemp =$resultStringPairSubscription->Success(); break;
            case 2:  $returnMessageTemp = $resultStringPairSubscription->LicenceError(); break;
            default:  $returnMessageTemp = $resultStringPairSubscription->EmailError(); break;
        } 
        return $returnMessageTemp;        
    }
?>