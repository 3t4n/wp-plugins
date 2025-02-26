<?php

global $Application_Maker, $oThis;
if (!class_exists('setRelatedUserCls')) {

    class setRelatedUserCls extends Application_Maker_setField {

        public function __construct() {
            $this->fieldtype = "setRelatedUser";
            $this->hasSaveField = true;
            $this->AbortGlobalSave = false;
            $this->classSubActions = array('deleteRelationship','getDevData');
        }

        public function deleteRelationship() {
            global $wpdb, $current_user, $meta_marker, $post_id;
			$post_id = $_POST['post_id'];
			$userID = $_POST['userID'];
			
			if(get_post_meta($post_id , 'related_user' , true) != ''){
				delete_post_meta($post_id, 'related_user', $userID);
				echo json_encode(array('status'=>true) );
			}else{
				echo json_encode(array('status'=>false , 'msg' => 'Not exist Relationship') );
			}
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

        public function getColumnData($meta, $field, $post_id) {
            global $wpdb, $current_user, $meta_marker, $post_id;
            //$meta=get_post_meta($post_id,$key . $meta_marker,true);
            // var_dump($field);
            // echo $post_id . '++taxonomies ' . $taxonomies;
            //$metao = wp_get_object_terms($post_id, $taxonomies);
            return $meta; //$metao[0]->name;
        }

        public function getField($oThis, $config, $post, $meta_marker) {
            global $current_user, $post_id;
            //'test'.$this->meta_marker."**".$this->add_image;


            $this->init($oThis, $config, $post, $meta_marker);
            // print_r($oThis);exit();
            $str = "<div class='c_field_container c_setRelatedUser' data-field_type='setRelatedUser'
                     data-fwidthCls='" . $config['fwidthCls'] . "'
                     data-field='" . $config['field'] . "'
                     data-value ='" . $config['value'] . "'
                     data-label ='" . $config['label'] . "'
                     data-meta_marker='" . $meta_marker . "'></div>";
            $related_user = get_post_meta($post_id, 'related_user', true);
            if ($related_user == false or $related_user == '') {
                $related_user_id = 0;
                $related_username = '';
            } else {
                $related_user_id = $related_user;
                $users = get_users(array(
                    'include' => $related_user_id,
                        ));
                $user = $users[0];
                $related_username = $user->data->display_name;
            }
            $str.= "<script>
                flg_apm.related_user_id=" . $related_user_id . ";
                flg_apm.related_username='" . $related_username . "';
                </script>";
            return $str; //'test'.$this->meta_marker."**".$this->add_image;
            return $str;
        }

    }

}

$oThis->extension_class_instances['setRelatedUser'] = new setRelatedUserCls();
//$setUploadGrid=new setUploadGridCls();
?>
