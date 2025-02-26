<?php

global $Application_Maker, $oThis;
if (!class_exists('setAddRelatedCls')) {

    class setAddRelatedCls extends Application_Maker_setField {

        public function __construct() {
            $this->fieldtype = "setAddRelated";
            $this->hasSaveField = false;
            $this->AbortGlobalSave = false;
            $this->classSubActions = array('getDevData');
        }

       /* public function saveField($post_id, $key, $meta_marker, $data, $field) {

        }*/
        public function getField($oThis, $config, $post, $meta_marker) {
            global $current_user, $post_id, $apm_settings,$meta_marker;
            //'test'.$this->meta_marker."**".$this->add_image;


            $this->init($oThis, $config, $post, $meta_marker);

            $select_post_types = explode(',', $config['field_config']['post_types']);

            $icons = array();
            $names = array();

            $child_second_parent = '';
            $second_parent_id = '';
            $second_parent_field = '';

            if ($config['field_config']['child_second_parent'] !== '' and isset($config['field_config']['child_second_parent'])) {
                $child_second_parent = $config['field_config']['child_second_parent'];
                $second_parent_field = $oThis->default_fields[$child_second_parent[0]];
                $second_parent_post_type = $second_parent_field['field_config']['post_type'];
                $second_parent_id = get_post_meta($post_id, $child_second_parent[0] . $meta_marker, true);
                if (is_array($second_parent_id)) {
                    $second_parent_id = $second_parent_id[0];
                }
            }
            foreach ($select_post_types as $skey => $select_post_type) {
                foreach ($oThis->applications as $key => $application) {
                    if (isset($application['modules'][$select_post_type])) {
                        $application = $application['modules'][$select_post_type];
                        $names[] = $application['menu_name'];
                        if (isset($application['icon'])) {
                            $icons[] = $application['icon'];
                        } else {
                            $icons[] = '';
                        }
                    }
                }
            }


            $post_id = $_GET['post'];
            $current_post = get_post($post_id);
            $current_post_type = $current_post->post_type;
            // print_r($oThis);exit();
            $str = "<div class='c_field_container c_setAddRelated' data-field_type='setAddRelated'
                     data-fwidthCls='" . $config['fwidthCls'] . "'
                     data-imgpath='" . $apm_settings['paths']['img'] . "'
                     data-child_second_parent='" . $child_second_parent . "'
                     data-second_parent_post_type='" . $second_parent_post_type . "'
                     data-second_parent_id='" . $second_parent_id . "'
                     data-current_post_type='" . $current_post_type . "'
                     data-post_title='" . $current_post->post_title  . "'
                     data-post_id='" . $post_id . "'
                     data-field='" . $config['field'] . "'
                     data-label ='" . $config['label'] . "'
                     data-value ='" . $config['value'] . "'
                     data-icons ='" . implode(',', $icons) . "'
                    data-names ='" . implode(',', $names) . "'
                    data-posttypes ='" . implode(',', $select_post_types) . "'
                     data-meta_marker='" . $meta_marker . "'></div>";
            /* */
            return $str; //'test'.$this->meta_marker."**".$this->add_image;
        }

    }

}

$oThis->extension_class_instances['setAddRelated'] = new setAddRelatedCls();
//$setUploadGrid=new setUploadGridCls();
?>
