<?php

global $Application_Maker, $oThis;
if (!class_exists('setAlertPanelCls')) {

    class setAlertPanelCls extends Application_Maker_setField {

        public function __construct() {
            $this->fieldtype = "setAlertPanel";
            $this->hasSaveField = false;
            $this->AbortGlobalSave = false;
            $this->classSubActions = array( );
        }



    }

}

$oThis->extension_class_instances['setAlertPanel'] = new setAlertPanelCls();
//$setUploadGrid=new setUploadGridCls();
?>
