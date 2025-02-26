<?php

global $Application_Maker, $oThis;
if (!class_exists('setGlobalFieldsItemsCls')) {

    class setGlobalFieldsItemsCls extends Application_Maker_setField {

        public function __construct() {
            $this->fieldtype = "setGlobalFieldsItemsCls";
            $this->hasSaveField = false;
            $this->AbortGlobalSave = false;
            $this->classSubActions = array();
        }

        public function saveField($post_id, $key, $meta_marker, $data, $field) {
            global$current_user;
        }

        public function getField($oThissub, $config, $post, $meta_marker) {
            global $current_user, $post_id, $oThis;
            $str = "";
            return $str;
        }


    }

}

$oThis->extension_class_instances['setGlobalFieldsItemsCls'] = new setGlobalFieldsItemsCls();
?>
