<?php

global $Application_Maker, $oThis;
if (!class_exists('setSelectMailTplCls')) {

    class setSelectMailTplCls extends Application_Maker_setField {

        public function __construct() {
            $this->fieldtype = "setSelectMailTpl";
            $this->hasSaveField = true;
            $this->AbortGlobalSave = false;
            $this->classSubActions = array('getMailTpl', 'getMailTplDetail', 'getConfigSignature');
        }

        public function getConfigSignature() {

            $signature = get_post_meta($_POST['post_ID'], 'mailaccount_signature_enable', true);
            $signature_content = get_post_meta($_POST['post_ID'], 'mailaccount_signature', true);
            if ($signature_content) {
                echo json_encode(array('status' => true, 'signature_content' => $signature_content));
            }else
                echo json_encode(array('status' => false));
        }

        public function current_user_can($query_role) {
            global $current_user;
            foreach ($current_user->roles as $value)
                if ($value == $query_role)
                    return true;
            return false;
        }

        public function getMailTpl() {
            global $wpdb, $current_user, $meta_marker, $post_id;
            $uid = $current_user->ID;
            if (current_user_can('administrator')) {
                /* $str = "SELECT post_title, post_name , ID
                  FROM $wpdb->posts
                  WHERE post_type = 'ff_email_template' AND post_status = 'publish'"; */
                $str = "SELECT *
						FROM $wpdb->posts
						WHERE post_type IN ('ff_email_template') AND post_status IN ('publish')
						ORDER BY post_date DESC ";
            } else {

                /* $str = "SELECT DISTINCT post_title, post_name , ID
                  FROM $wpdb->posts
                  LEFT JOIN $wpdb->postmeta ON $wpdb->posts.ID = $wpdb->postmeta.post_id
                  WHERE post_type = 'ff_email_template' AND post_status = 'publish'
                  AND ((post_author = $uid AND $wpdb->postmeta.meta_key = 'set_privacy' AND $wpdb->postmeta.meta_value = 1) OR ($wpdb->postmeta.meta_key = 'set_privacy' AND $wpdb->postmeta.meta_value = 0) OR ($wpdb->postmeta.meta_key = 'set_privacy' AND $wpdb->postmeta.meta_value = 2 AND $wpdb->postmeta.meta_key = 'assign_to' AND $wpdb->postmeta.meta_value = $uid ))
                  "; */

                $str = "SELECT DISTINCT  post_title, post_name , ID, post_status, post_date, post_type, post_author,post_modified, metaprivacy.meta_value as set_privacy
						FROM $wpdb->posts
						INNER JOIN $wpdb->postmeta  as metaprivacy  ON $wpdb->posts.ID = metaprivacy.post_id
						INNER JOIN $wpdb->postmeta as metaassignee ON  $wpdb->posts.ID = metaassignee.post_id
						WHERE post_type IN ('ff_email_template')
						AND ((post_author = $uid AND metaprivacy.meta_value = '1'  AND metaprivacy.meta_key = '" . $meta_name . "set_privacy')
						OR ( metaprivacy.meta_value = '0'  AND metaprivacy.meta_key = '" . $meta_name . "set_privacy')
						OR ( metaprivacy.meta_value = '2'  AND metaprivacy.meta_key = '" . $meta_name . "set_privacy' AND post_author = $uid )
						OR ( metaprivacy.meta_value = '2'  AND metaprivacy.meta_key = '" . $meta_name . "set_privacy' AND metaassignee.meta_key = '" . $meta_name . "assign_to' AND metaassignee.meta_value = '$uid'  ))
						AND post_status IN ('publish')
						ORDER BY post_date DESC ";
            }
            $results = $wpdb->get_results($str);

            echo json_encode($results);
        }

        public function getMailTplDetail() {
            global $wpdb, $current_user, $meta_marker, $post_id;
            $str = "SELECT DISTINCT $wpdb->posts.ID ,$wpdb->posts.post_title , $wpdb->postmeta.meta_value, $wpdb->postmeta.meta_key
					FROM $wpdb->posts , $wpdb->postmeta
					WHERE post_type = 'ff_email_template' AND post_status = 'publish' AND $wpdb->posts.ID = $wpdb->postmeta.post_id
					AND (wp_postmeta.meta_key = 'email_subject' OR $wpdb->postmeta.meta_key = 'email_body')
					AND $wpdb->posts.ID = " . $_POST['ID_tplMail'] . "
					";
            $results = $wpdb->get_results($str);
            if ($results) {
                $resultArray = array();
                array_push($resultArray, array(
                    "ID" => $_POST['ID_tplMail'],
                    "post_title" => $results[0]->post_title,
                    $results[0]->meta_key => $results[0]->meta_value,
                    $results[1]->meta_key => $results[1]->meta_value,
                ));

                echo json_encode($resultArray);
            }
            echo false;
        }

        public function saveField($post_id, $key, $meta_marker, $data, $field) {
            global $current_user, $post_id;
            if (isset($_POST[$key . $meta_marker])) {
                $destinees = $_POST[$key . $meta_marker];
                if ($send == "send") {//if send = start the email sending process...
                }
                update_post_meta($post_id, $key . $meta_marker, $destinees);

            }
            // mail_compose_to mail_compose_cc
        }

        public function getField($oThis, $config, $post, $meta_marker) {
            global $current_user, $post_id;
            //'test'.$this->meta_marker."**".$this->add_image;


            $this->init($oThis, $config, $post, $meta_marker);
            // print_r($oThis);exit();
            $str = "<div class='c_field_container c_setSelectMailTpl' data-field_type='setSelectMailTpl'
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

$oThis->extension_class_instances['setSelectMailTpl'] = new setSelectMailTplCls();
//$setUploadGrid=new setUploadGridCls();
?>
