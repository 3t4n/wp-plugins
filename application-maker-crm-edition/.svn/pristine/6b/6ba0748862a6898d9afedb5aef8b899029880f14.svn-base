<?php

global $Application_Maker, $oThis;
if (!class_exists('setMailingListCls')) {

    class setMailingListCls extends Application_Maker_setField {

        public function __construct() {
            $this->fieldtype = "setMailingList";
            $this->hasSaveField = false;
            $this->AbortGlobalSave = false;
            $this->classSubActions = array('loadMailingList', 'loadEntityEmail');
        }

        public function loadEntityEmail() {
            global $wpdb, $post, $meta_marker;
            $id = $_REQUEST['id'];
            $countAdded = $_REQUEST['countAdded'];

            $email = get_post_meta($id, 'email' . $meta_marker, true);
            if ($email == null or empty($email) or $email == '') {
                $email = get_post_meta($id, 'secondary_email' . $meta_marker, true);
            }
            if ($email == null or empty($email) or $email == '') {
                $email = get_post_meta($id, 'perso_email' . $meta_marker, true);
            }
            echo json_encode(array('email' => $email, 'countAdded' => $countAdded));
        }

        public function loadMailingList() {
            global $wpdb, $post, $meta_marker;
            $ids = $_REQUEST['ids'];
            $ids_ar = explode(',', $ids);
            $ids_ar_isid = array();
            $ids_ar_isfree = array();
            foreach ($ids_ar as $k => $id) {
                if (strpos($id, '@') > -1) {
                    $ids_ar_isfree[] = $id;
                } else {
                    $ids_ar_isid[] = $id;
                }
            }
            $ids = implode(',', $ids_ar_isid);
// $ids='82,271';
            $sql = "SELECT * FROM $wpdb->posts   WHERE  ID IN (" . $ids . ") AND (post_status = 'publish' OR post_status = 'draft' )  ORDER BY post_date DESC LIMIT 0, 300; "; //wp_posts.
// $sql = "SELECT * FROM $wpdb->posts  ";
            $posts = $wpdb->get_results($sql);
//echo $sql;
// var_dump($posts);
            $ar = array();
            foreach ($posts as $k => $p) {
                $ob = (object) array();
                $ob->name = $p->post_title;
                $ob->id = $p->ID;
                switch ($p->post_type) {
                    case 'ff_accounts':
                        $ob->type = "Account";
                        break;
                    case 'ff_contacts':
                        $ob->type = "Contact";
                        break;
                    case 'ff_leads':
                        $ob->type = "Lead";
                        break;
                }
                $ob->name = $p->post_title;
                $ob->email = get_post_meta($p->ID, 'email' . $meta_marker, true);
                if ($ob->email == null or empty($ob->email) or $ob->email == '') {
                    $ob->email = get_post_meta($p->ID, 'secondary_email' . $meta_marker, true);
                }
                if ($ob->email == null or empty($ob->email) or $ob->email == '') {
                    $ob->email = get_post_meta($p->ID, 'perso_email' . $meta_marker, true);
                }
                $ar[] = $ob;
            }
            if (count($ids_ar_isfree) > 0) {
                foreach ($ids_ar_isfree as $k => $p) {
                    $ob = (object) array();
                    $ob->name = '-None-';
                    $ob->type = "Free email";
                    $ob->email = $p;
                    $ob->id = 'ran_' . rand(9999999, 9999999999999);
                    $ar[] = $ob;
                }
            }
            $res = array(
                "total" => count($ar),
                'items' => $ar
            );
            echo json_encode($res);
// echo "oiooiiii ".$ids;
        }

        public function saveField($post_id, $key, $meta_marker, $data, $field) {
            global$current_user;
        }

        public function getField($oThis, $config, $post, $meta_marker) {
            global $current_user, $post_id;
            $this->init($oThis, $config, $post, $meta_marker);
            wp_get_current_user();
            $curuse = strval($current_user->ID) . ',' . $current_user->display_name;
// var_dump($config);
            $str = "";
            $custom = get_post_custom($this->post->ID);
            $download_id = get_post_meta($this->post->ID, $config['field'] . $this->meta_marker, true);
// echo "---".$this->post->ID."-".$config['field'];
            $download_id_arr = false;
            if (strpos($download_id, '*****') > -1) {
                $download_id_arr = explode('*****', $download_id);
                $download_id = $download_id_arr[0];
            } else {
                $download_id_arr = array();
                if (!empty($download_id) and $download_id !== "") {
                    array_push($download_id_arr, $download_id);
                }
            }
            $max_multi_files = '0';
            if (isset($config['max_multi_files'])) {
                $max_multi_files = $config['max_multi_files'];
            }

            $cur_files_count = count($download_id_arr);
            $str.= "<br clear='all'><div class='c_field_container c_setMailingList' data-field_type='setMailingList'
                     data-fwidthCls='" . $config['fwidthCls'] . "'
                     data-field='" . $config['field'] . "'
                     data-info='" . $config['info'] . "'
                     data-value ='" . $config['value'] . "'
                     data-postid ='" . $post_id . "'
                     data-me ='" . $curuse . "'
                     data-label ='" . $config['label'] . "'
                     data-meta_marker='" . $meta_marker . "'></div>";


            return $str; //'test'.$this->meta_marker."**".$this->add_image;
        }

    }

}

$oThis->extension_class_instances['setMailingList'] = new setMailingListCls();
//$setUploadGrid=new setUploadGridCls();
?>
