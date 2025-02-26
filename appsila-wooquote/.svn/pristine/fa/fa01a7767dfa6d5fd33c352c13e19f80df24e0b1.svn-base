<?php
/**
 * @desc returns previous assigned verified values defined in ticaretCRMOptions
 * @return mixed|boolean
 */
function getTicaretCrmOptions_AppsilaWooqoute_TransferInternal(){
    return get_option('ticaretCRMoptions');
}
/**
 * @desc  returns previous assigned value defined in ticaretCRMoptions_message
 * @return mixed|boolean
 */
function getTicaretCrmOptions_Message_AppsilaWooqoute_TransferInternal(){
    return get_option('ticaretCRMoptions_message');
}
/**
 * @ returns user last inputs on front-end
 * @return  $inputFromSubscriptionSettings
 */
function getInputsOnSubscriptonSettings_AppsilaWooqoute_TransferInternal(){
    $inputFromSubscriptionSettings = array( //Putting the users inputs to an array.        
        "email" => $_POST['email-api'],        
        "apikey"  => $_POST['website-api'],        
        "hostname"=> $_POST['hostname'],        
        "enable"=> $_POST['enable']        
    );
    return $inputFromSubscriptionSettings;    
}
/**
 * @desc Subscription settings submited form values transforming for post-data
 * @param $post_data
 * @return string
 */
function getMakeSubscriptonPostJson_ForRequestMaker_AppsilaWooqoute_TransferInternal($post_data){
    $textHC = new TextHC_AppsilaWooqoute_ConfigInternal();
    $arr = array(
        "email"=>$post_data["email"],
        "apikey"=>$post_data["apikey"],
        "hostname"=> $post_data["hostname"] ,
        "enable"=>$post_data["enable"],
        "licencestartdate"=>$textHC->licenceStartDateForSubscriptonPost(),
        "licenceexpiredate"=>$textHC->licenceExpireDateForSubscriptonPost()
    );
    $post_subscripton_JSON= json_encode($arr);
    return $post_subscripton_JSON;
}
/**
 * @desc Users last input datas are shown in the text part of the input.
 * @param $updateLastCrmOptions
 */
function updateLastCrmOptions_AppsilaWooqoute_TransferInternal($updateLastCrmOptions){
    $lastCrmOption_Temp=getTicaretCrmOptions_AppsilaWooqoute_TransferInternal();
    foreach ($updateLastCrmOptions as $key => $value) {
        $lastCrmOption_Temp[$key]=$value;
    }
    update_option('lastCRMoptions',$lastCrmOption_Temp);
}

/**
 *@desc ticaretCRMOptions updating method
 **/
function updateTicaretCrmOptions_AppsilaWooqoute_TransferInternal($updateTicaretCrmOptions){
    $ticaretCrmOption_Temp=getTicaretCrmOptions_AppsilaWooqoute_TransferInternal();
    foreach ($updateTicaretCrmOptions as $key => $value) {
        $ticaretCrmOption_Temp[$key]=$value;
    }
    update_option('ticaretCRMoptions',$ticaretCrmOption_Temp);
}
?>