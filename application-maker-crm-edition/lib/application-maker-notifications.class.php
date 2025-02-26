<?php

if (!class_exists('Application_Maker_Notifications')) {

    class Application_Maker_Notifications extends Application_Maker {

        // CONSTRUCTOR


        public function __construct() {

        }

        //apm-post_comment-email-tpl


        public function do_notifications($comment, $post_id, $notif_type = "save") {
            global $current_user, $post, $meta_marker, $oThis;
            get_currentuserinfo();
            $post = get_post($post_id);
            $post_type = get_post_type($post_id);
            $post_type_label = '';



            $team_notif_field = get_option("team_notif_field");
            $team_notif = get_post_meta($post_id, $team_notif_field, true);

            if ($team_notif['teamnotifall'] == "on" or $team_notif['teamnotifcommentall'] == "on" or $team_notif['teamnotifme'] == "on" or $team_notif['teamnotifassignee'] == "on") {
                $do_notif = true;
            }


            if ($do_notif) {
                $action_done = 'updated';
                //echo var_dump($_REQUEST);
                if (isset($_REQUEST['apm_post_action'])) {
                    $action_done = $_REQUEST['apm_post_action'];
                }
                $full_description = "";
                if (isset($_REQUEST['full_description_rte' . $meta_marker])) {
                    $full_description = $_REQUEST['full_description_rte' . $meta_marker];
                }
                if (isset($_REQUEST['full_description' . $meta_marker])) {
                    $full_description = $_REQUEST['full_description' . $meta_marker];
                }
                //require_once APPLICATION_MAKER_VIEWS_PATH . 'apm-post_save-email-tpl.php';$emailview
                //apm-post_notif_body_email-tpl
                $filename = APPLICATION_MAKER_VIEWS_PATH . "apm-post_notif_body_email-tpl.html";
                $handle = fopen($filename, "r");
                $emailview = fread($handle, filesize($filename));
                fclose($emailview);



                switch ($notif_type) {
                    case "save":
                        $subject = '[' . $post->post_title . '] ' . $action_done . " by " . $current_user->display_name;
                        $filename = APPLICATION_MAKER_VIEWS_PATH . "apm-post_save-email-tpl.html";
                        break;
                    case "comment":
                        $subject = '[' . $post->post_title . '] Commented by ' . $current_user->display_name;
                        $filename = APPLICATION_MAKER_VIEWS_PATH . "apm-post_comment-email-tpl.html";
                        break;
                }
                $handle = fopen($filename, "r");
                $contentview = fread($handle, filesize($filename));
                fclose($handle);


                $emailview = str_replace('[[CONTENT]]', $contentview, $emailview);
                foreach ($oThis->applications as $mainkey => $application) {
                    $modules = $application ['modules'];
                    foreach ($modules as $key => $module) {
                        if ($key == $post_type) {
                            $post_type_label = $module['singular_name'];
                        }
                    }
                }
                $emailview = str_replace('[[username]]', $current_user->display_name, $emailview);
                $emailview = str_replace('[[comment_author_email]]', $current_user->user_email, $emailview);
                $emailview = str_replace('[[id]]', $post_id, $emailview);
                $emailview = str_replace('[[action]]', $action_done, $emailview);
                $emailview = str_replace('[[date]]', date('d M Y'), $emailview);
                $emailview = str_replace('[[time]]', date('H:i') . '  hrs', $emailview);
                $comment = trim($comment);
                if ($comment !== "" and !empty($comment)) {
                    $comment = "<strong style='color:#2B6FB6'>Comment:</strong><br>" . $comment;
                }
                $emailview = str_replace('[[comment]]', $comment, $emailview);
                $full_description = trim($full_description);

                if ($notif_type !== "save") {
                    $full_description = "";
                }
                if ($full_description !== "" and !empty($full_description)) {
                    $full_description = "<strong style='color:#2B6FB6'>Description:</strong><br>" . $full_description;
                }
                $emailview = str_replace('[[description]]', $full_description, $emailview);
                $emailview = str_replace('[[post_type]]', $post_type_label, $emailview);
                $emailview = str_replace('[[post_title]]', $post->post_title, $emailview);
                $emailview = str_replace('[[post_url]]', site_url() . "/wp-admin/post.php?post=" . $post_id . "&action=edit", $emailview);


                $company_name = esc_attr(get_option('company_name'));
                $system_name = esc_attr(get_option('system_name'));

                if ($system_name == false) {
                    $system_name = 'Application Maker';
                }
                if ($company_name == false) {
                    $company_name = 'My Company Name (change in Settings)';
                }
                $emailview = str_replace('[[company_name]]', $company_name, $emailview);
                $emailview = str_replace('[[system_name]]', $system_name, $emailview);
                $emailview = str_replace('[[entity]]', strtolower($post_type_label), $emailview);
                $assigntostr = "";
                $assignto = get_post_meta($post_id, 'assign_to' . $meta_marker, true);
                if ($assignto !== "" and !empty($assignto)) {
                    $assignto_user = get_users(array('include' => $assignto));
                    //var_dump($assignto_user[0]);
                    $assigntostr = "Assigned to: <a href='mailto:" . $assignto_user[0]->user_email . "' >" . $assignto_user[0]->display_name . "</a>";
                }
                $emailview = str_replace('[[assignto]]', $assigntostr, $emailview);


                $current_user->ID;

                if ($post_type_label !== "") {
                    $subject = " " . $post_type_label . ": " . $subject;
                }
                $message = $emailview;



                $notifications_list = array();
                $team_ids = $team_notif['team'];
                $team_ids_ar = explode(',', $team_ids);
                if ($team_notif['teamnotifall'] == "on" or $team_notif['teamnotifassignee'] == "on") {
                    $assignee_id = get_post_meta($post_id, 'assign_to' . $meta_marker, true);
                    if (!empty($assignee_id)) {
                        if (!in_array($assignee_id, $notifications_list) and in_array($assignee_id, $team_ids_ar)) {
                            array_push($notifications_list, $assignee_id);
                        }
                    }
                }
                $me_id = $current_user->ID;
                //echo "me  ".$me_id." notif all ".$team_notif['teamnotifall']." notif me".$team_notif['teamnotifme']." <br>";
                if (!empty($me_id) and ($team_notif['teamnotifall'] == "on" or $team_notif['teamnotifme'] == "on")) {
                    if (!in_array($me_id, $notifications_list) and in_array($me_id, $team_ids_ar)) {
                        array_push($notifications_list, $me_id);
                    }
                }
                if (count($team_ids_ar) > 0 and $team_notif['teamnotifall'] == "on") {
                    foreach ($team_ids_ar as $kt => $teamid) {
                        if (!in_array($teamid, $notifications_list)) {
                            array_push($notifications_list, $teamid);
                        }
                    }
                }
                $notifications = implode(',', $notifications_list);
                //echo "*********".$notifications;
                $do_send = false;
                if ($notif_type == "save") {
                    $do_send = true;
                } else if ($team_notif['teamnotifcommentall'] == "on") {
                    $do_send = true;
                }
                //var_dump($team_notif);
                // echo $message;
                //exit;

                if ($notifications !== "" and $do_send == true) {
                    $notify_to_list = get_users(array('include' => $notifications));
                    //var_dump($notify_to_list);
                    if (count($notify_to_list) > 0) {
                        foreach ($notify_to_list as $user) {
                            $oThis->apmSendMail($user->user_email, $subject, $message);
                        }
                    }
                }
                //echo " do send ".$do_send. " / type ".$notif_type. " / ";
            }
        }

    }

}
