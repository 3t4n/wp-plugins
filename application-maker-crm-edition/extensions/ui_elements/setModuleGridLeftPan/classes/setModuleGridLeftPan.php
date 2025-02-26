<?php

global $Application_Maker, $oThis;
if (!class_exists('setModuleGridLeftPanCls')) {

    class setModuleGridLeftPanCls extends Application_Maker_setField {

        public function __construct() {
            $this->fieldtype = "setModuleGridLeftPan";
            $this->hasSaveField = false;
            $this->AbortGlobalSave = false;
            $this->classSubActions = array('getSearchFields');
        }

        public function getSearchFields() {
            global $current_user, $wpdb, $post_id, $oThis, $post, $meta_marker;
            $args = $_POST['args'];
            $args = stripslashes($args);
            $args = json_decode($args);
            $fields = $args->fields;
            $rtfields = array();
            foreach ($fields as $fieldname) {
                switch ($fieldname) {
                    case 'post_date':
                        $a = array(
                            'field_type' => 'post_date');
                        break;
                    default:
                        $field = $oThis->default_fields[$fieldname];
                        $label = $field['label'];
                        if (isset($field['filter_label'])) {
                            $label = $field['filter_label'];
                        }
                        $info = '';
                        if (isset($field['info'])) {
                            $info = $field['info'];
                        }
                        $data_type = '';
                        if (isset($field['data_type'])) {
                            $data_type = $field['data_type'];
                        }


                        $a = array(
                            'label' => $field['label'],
                            'info' => $info,
                            'data_type' => $data_type,
                            'field_type' => $field['field_type']
                        );
                        switch ($field['field_type']) {
                            case 'select':
                                if (isset($field['options'])) {
                                    if (isset($field['field_config']['option_text']) and $field['field_config']['option_text'] == true) {
                                        $a['options'] = $field['options'];
                                    }
                                    if (isset($field['field_config']['use_values']) and $field['field_config']['use_values'] == true) {
                                        $a['optionsvalues'] = $field['options'];
                                    }
                                }
                                break;
                        }
                        if (isset($field['field_config'])) {
                            $a['field_config'] = $field['field_config'];
                        }
                        break;
                }
                $rtfields[$fieldname] = $a;
            }
            // var_dump($rtfields);
            echo json_encode($rtfields);
            die();
        }

    }

}

$oThis->extension_class_instances['setModuleGridLeftPan'] = new setModuleGridLeftPanCls();
//$setUploadGrid=new setUploadGridCls();
?>
