<?php

global $Application_Maker, $oThis;
if (!class_exists('setModuleGridRightPanCls')) {

    class setModuleGridRightPanCls extends Application_Maker_setField {

        public function __construct() {
            $this->fieldtype = "setModuleGridRightPan";
            $this->hasSaveField = false;
            $this->AbortGlobalSave = false;
            $this->classSubActions = array();
        }


    }

}

$oThis->extension_class_instances['setModuleGridRightPan'] = new setModuleGridRightPanCls();
//$setUploadGrid=new setUploadGridCls();
?>
