<?php

global $Application_Maker, $oThis;
if (!class_exists('setUploadAndGridCls')) {

    class setUploadAndGridCls extends Application_Maker_setField {

        public function __construct() {
            $this->fieldtype = "setUploadAndGrid";
            $this->hasSaveField = false;
            $this->AbortGlobalSave = false;
            $this->classSubActions = array();
        }

        public function saveField($post_id, $key, $meta_marker, $data, $field) {
            global$current_user;
        }



        public function getField($oThissub, $config, $post, $meta_marker) {
            global $current_user, $post_id, $oThis;
            
            $str.= $this->getViewTpl('setUploadAndGrid','setUploadAndGrid.html');
            /*' <div  class="row-fluid">
                <div class="span12">
                    <div class="row-fluid">
                        [[grid]] 
                        [[panel]] 
                    </div>
                </div>
            </div>';*/
            $strpan = $oThis->extension_class_instances['setUploadPanel']->getField($oThissub, $config, $post, $meta_marker);
            $strgrid= $oThis->extension_class_instances['setUploadGrid']->getField($oThissub, $config, $post, $meta_marker);
            $str = str_replace('[[panel]]', $strpan, $str);
            $str = str_replace('[[grid]]', $strgrid, $str);
            return $str; 
        }

    }

}

$oThis->extension_class_instances['setUploadAndGrid'] = new setUploadAndGridCls();
?>
