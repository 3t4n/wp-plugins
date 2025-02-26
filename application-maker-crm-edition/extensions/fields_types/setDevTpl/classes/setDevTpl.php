<?php

global $Application_Maker, $oThis;
if (!class_exists('setDevTplCls')) {

    class setDevTplCls extends Application_Maker_setField {

        public function __construct() {
            $this->fieldtype = "setDevTpl";
            $this->hasSaveField = true;
            $this->AbortGlobalSave = false;
            $this->classSubActions = array('getDevData');
        }

        public function getDevData() {
            global $wpdb, $current_user, $meta_marker, $post_id;
        }

        public function saveField($post_id, $key, $meta_marker, $data, $field) {
            global $current_user, $post_id;
            if (isset($_POST[$key . $meta_marker])) {
                $data = $_POST[$key . $meta_marker];
            }
            // update_post_meta($post_id,$key . $meta_marker,$data);
        }

        public function getField($oThis, $config, $post, $meta_marker) {
            global $current_user, $post_id;
            //'test'.$this->meta_marker."**".$this->add_image;


            $this->init($oThis, $config, $post, $meta_marker);
            // print_r($oThis);exit();
            $str = "<div class='c_field_container c_setDevTpl' data-field_type='setDevTpl'
                     data-fwidthCls='" . $config['fwidthCls'] . "'
                     data-field='" . $config['field'] . "'
                     data-value ='" . $config['value'] . "'
                     data-label ='" . $config['label'] . "'
                     data-meta_marker='" . $meta_marker . "'></div>";
            return $str; //'test'.$this->meta_marker."**".$this->add_image;
            return $str;
        }

    }

}

$oThis->extension_class_instances['setDevTpl'] = new setDevTplCls();
//$setUploadGrid=new setUploadGridCls();
?>
