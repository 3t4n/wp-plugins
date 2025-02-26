<?php
        /**
         * @TODO On Refactor change to unnested
         * @desc Nested in Subscripton Settings.
         * The function doing the actions dependent from post result value
         * @param $recievedResultValue
         */
        function SubscribtionResultValueActions_AppsilaWooquote_SettingSubscription($recievedResultValue,$subscriptonSettingsInputs_Sanitized,$ticaretCRMoptions_message_check){
            $resultStringPairSubscription = new SubscriptonSubmitResultTransformToString_AppsilaWooqoute_ConfigInternal();
            switch ($recievedResultValue)
            {
                case $resultStringPairSubscription->EmailError():{ errorWrongInputsEmailError_AppsilaWooquote_SettingSubscription($subscriptonSettingsInputs_Sanitized,
                                                                                                                                    $ticaretCRMoptions_message_check);} break;
                case $resultStringPairSubscription->LicenceError():{errorLicenseError_AppsilaWooquote_SettingSubscription($subscriptonSettingsInputs_Sanitized);}; break;
                case $resultStringPairSubscription->Success(): {successValid_AppsilaWooquote_SettingSubscription($subscriptonSettingsInputs_Sanitized);}  break;
            }
        }
        /**
         *@desc Input datas are checked. If they are wrong it gives email or licence error.
         *@see WooQute.php --> if returnId=0
         *@see  update_option('temp_datas',$data_array) external call
         **/
        function errorWrongInputsEmailError_AppsilaWooquote_SettingSubscription($data_user_inputs,$ticaretCRMoptions_message_check){
            $input_validation_plugin_settings_color="yellow";
            $_POST['msg'] = $ticaretCRMoptions_message_check['api_email_error'];
            $data_user_inputs['isSubmited']="false";
            $data_user_inputs['addedCss']='background-color:'.$input_validation_plugin_settings_color;
            updateLastCrmOptions_AppsilaWooqoute_TransferInternal($data_user_inputs);
        }
        /**
         * @desc Lisence error progress running under the this method.
         * @param array $data_array
         * @see int returnid --> WooQuote.php result 2
         */
        function helpers_errorLicenseError_AppsilaWooquote_SettingSubscription($data_user_inputs,$ticaretCRMoptions_message_check){
            $input_validation_plugin_settings_color="yellow";
            $_POST['msg'] = $ticaretCRMoptions_message_check['licence_error'];
            $data_user_inputs['isSubmited']="false";
            $data_user_inputs['addedCss']='background-color:'.$input_validation_plugin_settings_color;
            updateLastCrmOptions_AppsilaWooqoute_TransferInternal($data_user_inputs);
        }
        /**
         *@des Success for ReturnId 1. This method updates all variables on the method name written
         *@see $method helpers_upToDateAppsilaWooquoteExternalVariableLastCRMOptions updating
         *@see $method helpers_upToDateAppsilaWooquoteExternalVariableTicaretCRMOptions updateding
         **/
        function successValid_AppsilaWooquote_SettingSubscription($data_user_inputs){
            $ticaretCRmOptions_Temp = getTicaretCrmOptions_AppsilaWooqoute_TransferInternal();
            $textHC = new TextHC_AppsilaWooqoute_ConfigInternal();
            $_POST['msg'] =$textHC->SuccessSettingsSave();
            $ticaretCRmOptions_Temp['addedCss']='background-color:white;';
            $ticaretCRmOptions_Temp['isSubmited']="true";
            $ticaretCRmOptions_Temp['email']=$data_user_inputs['email'];
            $ticaretCRmOptions_Temp['apikey']=$data_user_inputs['apikey'];
            $ticaretCRmOptions_Temp['hostname']=$data_user_inputs['hostname'];
            $ticaretCRmOptions_Temp['enable']=$data_user_inputs['enable'];
            updateLastCrmOptions_AppsilaWooqoute_TransferInternal($ticaretCRmOptions_Temp);
            updateTicaretCrmOptions_AppsilaWooqoute_TransferInternal($ticaretCRmOptions_Temp);  
        }
        /**
         *@desc Are inputs are same and successed it creates fake reload and updates again the variables
         **/
        function helpers_reloadConfitionSuccessFakeUpToDateProgress_SettingSubscription(){
            $tempLastCrmOptions=transferInternal_getAppsilaWooquoteLastCRMOptions();
            $tempLastCrmOptions['enable']=sanitize_text_field($_POST['enable']); 
            updateLastCrmOptions_AppsilaWooqoute_TransferInternal($tempLastCrmOptions);
            updateTicaretCrmOptions_AppsilaWooqoute_TransferInternal($tempLastCrmOptions);
        }

?>