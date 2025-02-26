<?php

global $Application_Maker, $oThis;
if (!class_exists('setModuleGridCls')) {

    class setModuleGridCls extends Application_Maker_setField {

        public function __construct() {
            $this->fieldtype = "setModuleGrid";
            $this->hasSaveField = false;
            $this->AbortGlobalSave = false;
            $this->classSubActions = array( );
        }


       /* public function getField($oThis, $config, $post, $meta_marker) {
            global $current_user, $post_id;
            //'test'.$this->meta_marker."**".$this->add_image;


            $this->init($oThis, $config, $post, $meta_marker);
            // print_r($oThis);exit();
            $str = "<div class='c_field_container c_setModuleGrid' data-field_type='setModuleGrid'
                     data-fwidthCls='" . $config['fwidthCls'] . "'
                     data-field='" . $config['field'] . "'
                     data-value ='" . $config['value'] . "'
                     data-label ='" . $config['label'] . "'
                     data-meta_marker='" . $meta_marker . "'></div>";
            return $str; //'test'.$this->meta_marker."**".$this->add_image;
            return $str;
        }*/

    }

}

$oThis->extension_class_instances['setModuleGrid'] = new setModuleGridCls();
//$setUploadGrid=new setUploadGridCls();
?>
