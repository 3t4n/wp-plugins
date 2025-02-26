<?php

global $Application_Maker, $oThis;
if (!class_exists('actionRelatedUserCls')) {

    class actionRelatedUserCls extends Application_Maker_setField {

        public function __construct() {
            $this->fieldtype = "actionRelatedUser";
            $this->hasSaveField = false;
            $this->AbortGlobalSave = false;
            $this->classSubActions = array('deleteRelationshipLeadToUser', 'relateLeadToUser', 'getDetailUser', 'getUserList', 'converLeadToUser', 'getDevData');
        }

        public function deleteRelationshipLeadToUser() {
            global $current_user, $post_id, $apm_settings, $meta_marker, $wpdb;
            $userid = $_POST['userID'];
            $post_id = $_POST['post_id'];
            delete_post_meta($post_id, 'related_user', $userid);
            echo json_encode(array('status' => true));
        }

        public function relateLeadToUser() {
            global $current_user, $post_id, $apm_settings, $meta_marker, $wpdb;
            $userid = $_POST['userID'];
            $post_id = $_POST['post_id'];
            $user_data = get_userdata($userid);

            if ($user_data) {
                if (get_user_meta($userid, 'first_name', true) != '') {
                    update_user_meta($userid, 'first_name', $_POST['first_nameagent']);
                } else {
                    add_user_meta($userid, 'first_name', $_POST['first_nameagent']);
                }

                if (get_user_meta($userid, 'last_name', true) != '') {
                    update_user_meta($userid, 'last_name', $_POST['contact_lastname']);
                } else {
                    add_user_meta($userid, 'last_name', $_POST['contact_lastname']);
                }

                if (get_user_meta($userid, 'user_phone', true) != '') {
                    update_user_meta($userid, 'user_phone', $_POST['value_phone']);
                } else {
                    add_user_meta($userid, 'user_phone', $_POST['value_phone']);
                }

                if (get_user_meta($userid, 'user_street', true) != '') {
                    update_user_meta($userid, 'user_street', $_POST['value_street']);
                } else {
                    add_user_meta($userid, 'user_street', $_POST['value_street']);
                }

                if (get_user_meta($userid, 'user_zipcode', true) != '') {
                    update_user_meta($userid, 'user_zipcode', $_POST['zipcode']);
                } else {
                    add_user_meta($userid, 'user_zipcode', $_POST['zipcode']);
                }

                if (get_user_meta($userid, 'user_city', true) != '') {
                    update_user_meta($userid, 'user_city', $_POST['value_city']);
                } else {
                    add_user_meta($userid, 'user_city', $_POST['value_city']);
                }

                if (get_user_meta($userid, 'user_company', true) != '') {
                    update_user_meta($userid, 'user_company', $_POST['value_company_name']);
                } else {
                    add_user_meta($userid, 'user_company', $_POST['value_company_name']);
                }

                if (get_user_meta($userid, 'user_country', true) != '') {
                    update_user_meta($userid, 'user_country', $_POST['value_country']);
                } else {
                    add_user_meta($userid, 'user_country', $_POST['value_country']);
                }

                if (get_user_meta($userid, 'user_gender', true) != '') {
                    update_user_meta($userid, 'user_gender', $_POST['value_gender']);
                } else {
                    add_user_meta($userid, 'user_gender', $_POST['value_gender']);
                }

                if (get_user_meta($userid, 'related_user', true) != '') {
                    update_user_meta($userid, 'related_user', $post_id);
                } else {
                    add_user_meta($userid, 'related_user', $post_id);
                }

                if (!update_post_meta($post_id, 'related_user', $userid))
                    add_post_meta($post_id, 'related_user', $userid);

                echo json_encode(array('status' => true, 'userID' => $userid, 'userName' => $user_data->data->display_name));
            }else {
                echo json_encode(array('status' => false));
            }
        }

        public function getDetailUser() {
            global $current_user, $post_id, $apm_settings, $meta_marker, $wpdb;
            $userid = $_POST['userID'];
            $user_data = get_userdata($userid);

            if ($user_data) {
                $userdata = array(
                    'first_nameagent' => get_user_meta($userid, 'first_name', true),
                    'contact_lastname' => get_user_meta($userid, 'last_name', true),
                    'user_email' => $user_data->data->user_email,
                    'user_phone' => get_user_meta($userid, 'user_phone', true),
                    'user_street' => get_user_meta($userid, 'user_street', true),
                    'zipcode' => get_user_meta($userid, 'user_zipcode', true),
                    'user_country' => get_user_meta($userid, 'user_country', true),
                    'user_gender' => get_user_meta($userid, 'user_gender', true),
                    'user_company' => get_user_meta($userid, 'user_company', true),
                    'user_city' => get_user_meta($userid, 'user_city', true)
                );
                echo json_encode(array('status' => true, 'userdata' => $userdata));
            } else {
                $random_password = __('User already not exists.');
                echo json_encode(array('status' => false, 'msg' => $random_password));
            }
        }

        public function getUserList() {
            global $current_user, $post_id, $apm_settings, $meta_marker, $wpdb;

            if (isset($_POST['query_str']) && $_POST['query_str'] != '') {
                $query_str = $_POST['query_str'];
                $wp_user_search = $wpdb->get_results("SELECT ID, display_name, user_email FROM $wpdb->users WHERE user_login LIKE '%$query_str%' OR display_name LIKE '%$query_str%' OR user_email LIKE '%$query_str%' ORDER BY ID");

                $return = "";
                if (count($wp_user_search) > 0) {
                    foreach ($wp_user_search as $userid) {
                        $user_id = (int) $userid->ID;
                        $display_name = stripslashes($userid->display_name);
                        $first_name = get_user_meta($user_id, 'first_name', true);
                        $last_name = get_user_meta($user_id, 'last_name', true);

                        $return .= "<li><input type='radio' name='sel_user_id' value='$user_id'> <span>$display_name $first_name $last_name</span></li>";
                    }
                }

                echo json_encode(array('status' => true, 'listuser' => $return));
                return;
            }

            $wp_user_search = $wpdb->get_results("SELECT ID, display_name FROM $wpdb->users ORDER BY ID");

            $return = "<option value=''>--None--</option>";
            if (count($wp_user_search) > 0) {
                foreach ($wp_user_search as $userid) {
                    $user_id = (int) $userid->ID;
                    $display_name = stripslashes($userid->display_name);
                    $first_name = get_user_meta($user_id, 'first_name', true);
                    $last_name = get_user_meta($user_id, 'last_name', true);

                    $return .= "<option value='$user_id'>$display_name $first_name $last_name</option>";
                }
            }

            echo json_encode(array('status' => true, 'listuser' => $return));
        }

        public function converLeadToUser() {
            global $current_user, $post_id, $apm_settings, $meta_marker;
            // print_r($_POST);

            $post_id = $_POST['post_id'];
            $first_nameagent = $_POST['first_nameagent'];
            $contact_lastname = $_POST['contact_lastname'];
            $user_email = $_POST['email_agent'];
            $user_phone = $_POST['value_phone'];
            $user_street = $_POST['value_street'];
            $zipcode = $_POST['zipcode'];
            $user_country = $_POST['value_country'];
            $user_gender = $_POST['value_gender'];
            $user_company = $_POST['value_company_name'];
            $user_city = $_POST['value_city'];

            $user_id = username_exists($user_email);
            if (!$user_id and email_exists($user_email) == false) {
                $random_password = wp_generate_password($length = 12, $include_standard_special_chars = false);
                $random_password = 'abc123456';
                $user_id = wp_create_user($user_email, $random_password, $user_email);

                if (is_wp_error($user_id)) {
                    echo json_encode(array('status' => false, 'msg' => $user_id->get_error_message()));
                    return;
                }

                $userdata = array(
                    'ID' => $user_id,
                    'first_name' => $first_nameagent,
                    'last_name' => $contact_lastname
                );
                wp_update_user($userdata);
                add_user_meta($user_id, 'user_phone', $user_phone, false);
                add_user_meta($user_id, 'user_street', $user_street, false);
                add_user_meta($user_id, 'user_city', $user_city, false);
                add_user_meta($user_id, 'user_zipcode', $zipcode, false);
                add_user_meta($user_id, 'user_country', $user_country, false);
                add_user_meta($user_id, 'user_gender', $user_gender, false);
                add_user_meta($user_id, 'user_company', $user_company, false);

                add_user_meta($user_id, 'related_user', $post_id, false);

                if (!update_post_meta($post_id, 'related_user', $user_id))
                    add_post_meta($post_id, 'related_user', $user_id);

                echo json_encode(array('status' => true, 'userID' => $user_id));
            } else {
                $random_password = __('User already exists.  Password inherited.');
                echo json_encode(array('status' => false, 'msg' => $random_password));
            }
        }

        /* public function saveField($post_id, $key, $meta_marker, $data, $field) {

          } */

        public function getField($oThis, $config, $post, $meta_marker) {
            global $current_user, $post_id, $apm_settings, $meta_marker;
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

            $custom_listAction = '';

            if ($current_user->roles[0] == 'administrator')
                $custom_listAction .= '<li><a href="javascript:void(0);" class="apm_convert_lead_user">Convert this lead to a user</a></li>';

            $custom_listAction .= '<li><a href="javascript:void(0);" class="apm_import_user_lead">Pick and Import a user\'s data in this lead</a></li>';
            $custom_listAction .= '<li><a href="javascript:void(0);" class="apm_relate_lead_user">Relate a user with this lead</a></li>';
            $inputfieldsvalues['custom_listAction'] = $custom_listAction;

            // print_r($oThis);exit();
            $str = "<div class='c_field_container c_actionRelatedUser' data-field_type='actionRelatedUser'
                     data-fwidthCls='" . $config['fwidthCls'] . "'
                     data-imgpath='" . $apm_settings['paths']['img'] . "'
                     data-child_second_parent='" . $child_second_parent . "'
                     data-second_parent_post_type='" . $second_parent_post_type . "'
                     data-second_parent_id='" . $second_parent_id . "'
                     data-current_post_type='" . $current_post_type . "'
                     data-post_title='" . $current_post->post_title . "'
                     data-post_id='" . $post_id . "'
                     data-field='" . $config['field'] . "'
                     data-label ='" . $config['label'] . "'
                     data-value ='" . $config['value'] . "'
                     data-icons ='" . implode(',', $icons) . "'
                    data-names ='" . implode(',', $names) . "'
                    data-posttypes ='" . implode(',', $select_post_types) . "'
                     data-meta_marker='" . $meta_marker . "'></div>";
            /* */
            $str .= "<script>
                            // flg_apm.actionRelatedUser={};
                 flg_apm.actionRelatedUser.fieldsvalues=" . json_encode($inputfieldsvalues) . "
                 </script>  ";
            return $str; //'test'.$this->meta_marker."**".$this->add_image;
        }

    }

}

$oThis->extension_class_instances['actionRelatedUser'] = new actionRelatedUserCls();
//$setUploadGrid=new setUploadGridCls();
?>
