<?php

global $Application_Maker, $oThis;
if (!class_exists('sendNewsletterCls')) {

    class sendNewsletterCls extends Application_Maker_setField {

        public function __construct() {
            $this->fieldtype = "sendNewsletter";
            $this->hasSaveField = true;
            $this->AbortGlobalSave = false;
            $this->classSubActions = array("loadUserList", 'sendingNewsletter', 'NewsletSaveMainInfos');
        }

        public function NewsletSaveMainInfos() {
            global $wpdb, $current_user, $meta_marker, $post_id;
            $param = array(
                "email_template" => $_REQUEST['emailtpl'],
                "newsletter_status" => $_REQUEST['status'],
                "newsletter_special_subject" => $_REQUEST['emailspesubj'],
                "emails_date_sent" => $_REQUEST['date_sent'],
                "emails_time_sent" => $_REQUEST['time_sent'],
                "email_template" => $_REQUEST['emailtpl'],
                "email_template" => $_REQUEST['emailtpl'],
                "email_template" => $_REQUEST['emailtpl'],
                "email_template" => $_REQUEST['emailtpl'],
                "send_newsletter_result" => 'send',
            );
            $emailtpl = $_REQUEST['emailtpl'];
            $emailspesubj = stripslashes($_REQUEST['emailspesubj']);
            $time_sent = $_REQUEST['time_sent'];
            $date_sent = $_REQUEST['date_sent'];
            $account = $_REQUEST['account'];
            $contact = $_REQUEST['contact'];
            $lead = $_REQUEST['lead'];
            $status = $_REQUEST['status'];
            $mailing_list = $_REQUEST['mailing_list'];
            $comments = stripslashes($_REQUEST['comments']);
            $res = (object) array();
            $res->result = 'ok';
            echo json_encode($res);
            $this->update_post_metas($_REQUEST['post_id'], $param);
        }

        public function sendingNewsletter() {
            global $wpdb, $current_user, $meta_marker;
            $id = $_REQUEST['id'];
            $email = $_REQUEST['email'];
            $email_template = $_POST['email_template'];
            $email_specialsubject = $_POST['emailspesubj'];
            $tpl_post = get_post($email_template);
            $userpost = get_post($id);
            //var_dump($userpost);
            // var_dump($tpl_post);

            $email_body = get_post_meta($email_template, 'email_body' . $meta_marker, true);
            $email_footer = get_post_meta($email_template, 'email_footer' . $meta_marker, true);
            $from_parent_email = 'none';
            $from_parent_id = get_post_meta($email_template, 'from_parent' . $meta_marker, true);
            $user_from = get_users(array('include' => $from_parent_id));
            $from_parent_email = $user_from[0]->user_email;
            $from_display_name = $user_from[0]->display_name;
            $reply_to_email = get_post_meta($email_template, 'reply_to_email' . $meta_marker, true);
            $email_subject = get_post_meta($email_template, 'email_subject' . $meta_marker, true);


            if ($email_specialsubject == '') {
                $subject = $email_subject;
            } else {
                $subject = $email_specialsubject;
            }
            $reply_to_name = get_post_meta($email_template, 'reply_to_name' . $meta_marker, true);

            $reply_to_name = get_post_meta($email_template, 'reply_to_name' . $meta_marker, true);
            $add_user_signature = get_post_meta($email_template, 'add_user_signature' . $meta_marker, true);
            $signature = '';
            if ($add_user_signature == true) {
                //$signature='signature';
            }
            $account_name = "";
            if ($userpost->post_type == "ff_contacts") {
                $account_parent = get_post_meta($id, 'account_parent' . $meta_marker, true);
                $accountpost = get_post($account_parent);
                $account_name = $accountpost->post_title;
            } else if ($userpost->post_type == "ff_leads") {
                $account_name = get_post_meta($id, 'company' . $meta_marker, true);
            } else if ($userpost->post_type == "ff_accounts") {
                $account_name = $userpost->post_title;
            } else {
                $account_name = '';
            }

            $tags = array(
                'contact_lead_gender' => $userpost->post_type !== "ff_acounts" ? get_post_meta($id, 'contact_gender' . $meta_marker, true) : "",
                'contact_lead_lastname' => $userpost->post_type !== "ff_acounts" ? get_post_meta($id, 'contact_lastname' . $meta_marker, true) : "",
                'contact_lead_firstname' => $userpost->post_type !== "ff_acounts" ? get_post_meta($id, 'contact_firstname' . $meta_marker, true) : "",
                'contact_lead_email' => $email,
                'account_name' => $account_name,
            );
            foreach ($tags as $key => $value) {
                $email_body = str_replace('{{' . $key . '}}', $value, $email_body);
            }
            //echo $email_body . "*" . $email_footer . "*" . $from_parent_email;
            $message = $email_body . $email_footer . $signature;
            $charset = get_settings('blog_charset');
            $headers = 'From: ' . $from_display_name . ' <' . $from_parent_email . '> ' . "\r\n"; //$from_parent_email;//$from_display_name
            $headers .= "MIME-Version: 1.0\n";
            $headers .= "Content-Type: text/html; charset=\"{$charset}\"\n";

            $suc = wp_mail($email, $subject, $message, $headers);
            if ($suc) {
                $suc = 'ok';
            } else {
                $suc = 'nok';
            }
            $r = json_encode(array('success' => $suc));
            echo $r;
        }

        public function loadUserList() {
            global $wpdb, $current_user, $meta_marker;
            $ids = $_REQUEST['ids'];
            $maillist = $_REQUEST['maillist'];
            $idsar = explode(',', $ids);
            if ($ids == "") {
                $idsar = array();
            }
            if (is_user_logged_in()) {
                $ids_ar_isfree = array();
                if ($maillist !== "none") {
                    $idsm = get_post_meta(intval($maillist), 'mailing_list' . $meta_marker, true);
                    $idsm_ar = explode(',', $idsm);
                    foreach ($idsm_ar as $k => $id) {
                        if (!(strpos($id, '@') > -1)) {
                            if (!in_array($id, $idsar)) {
                                $idsar[] = $id;
                            }
                        } else {
                            $ids_ar_isfree[] = $id;
                        }
                    }
                }
                // var_dump($idsar);
                $sql = "SELECT * FROM $wpdb->posts  WHERE  $wpdb->posts.ID IN (" . implode(',', $idsar) . ") AND (post_status = 'publish' OR post_status = 'future' OR post_status = 'draft' OR post_status = 'private')  ORDER BY post_date DESC LIMIT 0, 300; ";
                $posts = $wpdb->get_results($sql);

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
                        $ob->type = "Free email";
                        $nam = '-None';
                        if (strpos($p, '**')) {
                            $par = explode('**', $p);
                            $p = $par[0];
                            $nam = $par[1];
                        }
                        $ob->name = $nam;
                        $ob->email = $p;
                        $ob->id = 'ran_' . rand(9999999, 9999999999999);
                        $ar[] = $ob;
                    }
                }
                echo json_encode(array('total' => count($ar), 'results' => $ar));
            }
            die();
        }

        public function saveField($post_id, $key, $meta_marker, $data, $field) {
            global $current_user, $post_id;
            if (isset($_POST[$key . $meta_marker])) {
                $send = $_POST[$key . $meta_marker];
                if ($send == "send") {//if send = start the email sending process...
                }
            }
        }

        public function getField($oThis, $config, $post, $meta_marker) {
            global $current_user, $post_id;
            //'test'.$this->meta_marker."**".$this->add_image;
            $str = '<input type="hidden" value="" id="do_sending_test" name="' . $config['field'] . $meta_marker . '">';
            return $str;
        }

        public function update_post_metas($post_id, $param) {
            global $meta_marker;
            if ($post_id != '') {
                foreach ($param as $meta_key => $meta_value) {
                    update_post_meta($post_id, $meta_key . $meta_marker, $meta_value);
                }
            }
        }

    }

}

$oThis->extension_class_instances['sendNewsletter'] = new sendNewsletterCls();
//$setUploadGrid=new setUploadGridCls();
?>
