<?php

global $Application_Maker, $oThis;
if (!class_exists('setTeamFieldCls')) {

    class setTeamFieldCls extends Application_Maker_setField {

        public function __construct() {
            $this->fieldtype = "setTeamField";
            $this->hasSaveField = true;
            $this->AbortGlobalSave = true;
        }

        public function getField($oThis, $config, $post, $meta_marker) {
            global $current_user;
            $this->init($oThis, $config, $post, $meta_marker);
            $str = "";
            //$v=print_r($config['value']);
            $v = "";
            $uss_ar = explode(" - ", $config['value']);
            $usernames = array();
            if ($uss_ar[0] !== "" and !empty($uss_ar[0])) {
                $user_ar = explode(",", $uss_ar[0]);
                $args = array(
                    'include' => $user_ar
                );
                $users = get_users($args);
                $usernames = array(); //display_name
                foreach ($users as $ukey => $user) {
                    array_push($usernames, $user->display_name);
                }
            }
            $valuename = implode(',', $usernames);
            $valuename = addslashes($valuename);
            wp_get_current_user();
            $curuse = strval($current_user->ID) . ',' . $current_user->display_name; //
            $assign = get_post_meta($post->ID, 'assign_to' . $meta_marker, true);


            $args = array(
                'include' => array($assign)
            );
            $users = get_users($args);
            $usernames = array(); //display_name
            foreach ($users as $ukey => $user) {
                array_push($usernames, $user->display_name);
            }
            $assign = $assign . ',' . $usernames[0];

            $str = "<div class='c_field_container c_setTeamField' data-field_type='setTeamField'
                     data-fwidthCls='" . $config['fwidthCls'] . "'
                     data-field='" . $config['field'] . "'
                     data-info='" . $config['info'] . "'
                     data-value ='" . $config['value'] . "'
                     data-me ='" . $curuse . "'
                     data-assign ='" . $assign . "'
                     data-valuename ='" . $valuename . "'
                     data-label ='" . $config['label'] . "'
                     data-category='" . $config['field_config']['category'] . "'
                     data-meta_marker='" . $meta_marker . "'></div>";
            return $str;
        }

        public function saveField($post_id, $key, $meta_marker, $data, $field) {
            global$current_user;
            //echo $post_id."//".$key."**".$data;
            if (isset($_POST[$key . $meta_marker . '_apm_teamnotifall'])) {
                $teamnotifall = $_POST[$key . $meta_marker . '_apm_teamnotifall'];
                $teamnotifme = $_POST[$key . $meta_marker . '_apm_teamnotifme'];
                $teamnotifcommentall = $_POST[$key . $meta_marker . '_apm_teamnotifcommentall'];
                $teamnotifassignee = $_POST[$key . $meta_marker . '_apm_teamnotifassignee'];
                $cascade = $_POST[$key . $meta_marker . '_cascade'];
                $users = array();
                $me = '0';
                $assignee = '0';
                $team = '';
                $forcechild = $_POST[$key . $meta_marker . '_forcechild'];
                if ($forcechild == "on" or $forcechild == "1") {//assign_to
                } else {
                    $forcechild = "0";
                }
                if ($cascade == "on" or $cascade == "1") {
                    //MUST GET PARENT INFOS
                } else {
                    $cascade = '0';
                    $me = $_POST[$key . $meta_marker . '_me'];
                    $assignee = $_POST[$key . $meta_marker . '_assignee'];
                    $team = $_POST[$key . $meta_marker . '_team'];
                    if ($team !== "") {
                        $users = explode(',', $team);
                    } else {
                        $users = array();
                    }
                    if ($assignee == "on" or $assignee == "1") {//assign_to
                        $ass = $_POST['assign_to' . $meta_marker];
                        if (!in_array($ass, $users) and $ass !== '') {
                            array_push($users, $ass);
                        }
                    } else {
                        $assignee = "0";
                    }
                    if ($me == "on" or $me == "1") {//assign_to
                        wp_get_current_user();
                        $use = strval($current_user->ID);
                        if (!in_array($use, $users)) {
                            array_push($users, $use);
                        }
                    } else {
                        $me = "0";
                    }
                }
                $team_ar = array(
                    "team" => implode(',', $users),
                    "me" => $me,
                    "assignee" => $assignee,
                    "cascade" => $cascade,
                    "forcechild" => $forcechild,
                    "teamnotifall" => $teamnotifall,
                    "teamnotifcommentall" => $teamnotifcommentall,
                    "teamnotifme" => $teamnotifme,
                    "teamnotifassignee" => $teamnotifassignee,
                );
                update_post_meta($post_id, $key . $meta_marker, $team_ar);
                update_option("team_notif_field", $key . $meta_marker);
                $da = get_post_meta($post_id, $key . $meta_marker, true);
                // return "////".implode(' - ',$da);
                //var_dump($test);
                /*
                  $cat=$field['field_config']['category'];
                  $data=intval($data); */
                // exit;
            }
        }

        public function getSuggest($str) {
            global $wpdb;
            $query = "
                                SELECT      *
                                FROM        $wpdb->users
                                WHERE       $wpdb->users.display_name LIKE '%$str%'
                                AND         $wpdb->users.user_status = '0'
                                ORDER BY    $wpdb->users.display_name
                        ";
            $users_list = $wpdb->get_results($query);
            $data = array();
            foreach ($users_list as $key => $value) {
                //  $suggestions[] = $value->display_name;
                $da = array();
                $da['id'] = $value->ID;
                $da['name'] = $value->display_name;
                $data[] = $da;
            }
            return $data;
        }

    }

}

$oThis->extension_class_instances['setTeamField'] = new setTeamFieldCls();
//$setTeamField=new setTeamFieldCls();
?>
