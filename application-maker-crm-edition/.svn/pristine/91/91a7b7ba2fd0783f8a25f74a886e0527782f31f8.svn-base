<?php

global $Application_Maker, $oThis;
if (!class_exists('setModalTipsCls')) {

    class setModalTipsCls extends Application_Maker_setField {

        public function __construct() {
            $this->fieldtype = "setModalTips";
            $this->hasSaveField = true;
            $this->AbortGlobalSave = false;
            $this->classSubActions = array('getTipDesc', 'postNewTip');
        }

        public function getTipDesc() {
            global $wpdb;
            
            $data_id = $_POST['data_id'];
            
            $query = "SELECT meta_value FROM $wpdb->postmeta WHERE meta_id = ".$data_id;
            $results = $wpdb->get_results($query);
            
            foreach ($results as $result){
                echo json_encode(array('status' => true, 'tip_desc' => $result->meta_value));
            }
        }
        
        public function postNewTip(){
            global $wpdb, $current_user;
            
            $tip_title = $_POST['tip_title'];
            $tip_information = $_POST['tip_information'];
            $tip_type = $_POST['tip_type'];
            $tip_widget = $_POST['tip_widget'];
            $tip_status = $_POST['tip_status'];
            $tip_url = $_POST['tip_url'];
            $tip_video = $_POST['tip_video'];
            
            if(current_user_can('administrator')){
                $tip_status = 'publish';
            }
                    
            $my_post = array(
                'post_title'    => $tip_title,
                'post_content' => '',
                'post_status'   => $tip_status,
                'post_author'   => $current_user->data->ID,
                'post_type' => 'ff_taxtips',
            );
            $id = wp_insert_post($my_post);
            if($id){
                update_post_meta($id, 'agent_activated', 0);
                update_post_meta($id, 'office_activated', 0);
                update_post_meta($id, 'set_privacy', 1);
                update_post_meta($id, 'tips_description', $tip_information);
                update_post_meta($id, 'tip_type', $tip_type);
                update_post_meta($id, 'tip_widget', $tip_widget);
                if($tip_url !== '')
                    update_post_meta($id, 'tip_url', $tip_url);
                if($tip_video !== '')
                    update_post_meta($id, 'tip_video', $tip_video);

                echo json_encode(array('status'=>true, 'post_id' => $id));

            }else{
                    echo json_encode(array('status'=>false , 'msg' => 'An error appeared while posting...'));
            }
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
            $str = "<div class='c_field_container c_setModalTips' data-field_type='setModalTips'
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

$oThis->extension_class_instances['setModalTips'] = new setModalTipsCls();
//$setUploadGrid=new setUploadGridCls();
?>
