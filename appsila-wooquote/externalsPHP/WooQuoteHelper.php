<?php
    /**
     * @desc Comparing the 'email', 'apikey'' and 'website' inputs with the last updated datas.
     *  If they don't match, this if block is executed.
     * @param array $ticaretCRMoptions_check
     * @return boolean
     */
    function checkSubscriptionInputs_DifferencePrevious_AppsilaWooquote_WooQuoteHelper($ticaretCRMoptions_check){
        if(    $ticaretCRMoptions_check['email']!=sanitize_text_field($_POST['email-api'])
            || $ticaretCRMoptions_check['apikey']!=sanitize_text_field($_POST['website-api'])
            || $ticaretCRMoptions_check['hostname']!=sanitize_text_field($_POST['hostname'])){
            return true;
        }else{
            return false;
        }     
    }
    /**
     * @desc Sanitize the array inputs
     * @param  $arraySanitize
     * @return string[] $resultArray
     */
    function arraySanitizeAll_AppsilaWooquote_WooQuoteHelper($arraySanitize){
        $resultArray=array();
        foreach ($arraySanitize as $key => $value){
            $resultArray[$key]=sanitize_text_field($value);
        }
        return $resultArray;
    }
    /**
     *@desc It deletes all '-' characters from apikey input
     *@param $data_array
     **/
    function removeDashesInStringValue_AppsilaWooquote_WooQuoteHelper($webSiteApiCode){
        if (strpos($webSiteApiCode, '-') !== false) {
            // Code that needs to remove dashs
            $codeParts = array_map('trim', explode("-", $webSiteApiCode));
            $unDashed= implode("",$codeParts);
            return $unDashed;
        }else {
            // It is Already UnDashed
            return $webSiteApiCode;
        }
    }

?>