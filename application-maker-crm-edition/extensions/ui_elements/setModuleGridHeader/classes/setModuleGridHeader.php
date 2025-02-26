<?php

global $Application_Maker, $oThis;
if (!class_exists('setModuleGridHeaderCls')) {

    class setModuleGridHeaderCls extends Application_Maker_setField {

        public function __construct() {
            $this->fieldtype = "setModuleGridHeader";
            $this->hasSaveField = false;
            $this->AbortGlobalSave = false;
            $this->classSubActions = array();
        }

     

    }

}

$oThis->extension_class_instances['setModuleGridHeader'] = new setModuleGridHeaderCls();
//$setUploadGrid=new setUploadGridCls();
?>
