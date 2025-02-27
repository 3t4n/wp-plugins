<?php

/**
 * Ticket.
 */

defined('ABSPATH') || exit;

require_once dirname(__DIR__, 2) . '/traits/Mapbd_wps_ticket_trait.php';

class Mapbd_wps_ticket extends AppsBDModel
{
    use Mapbd_wps_ticket_trait;

    public $id;
    public $ticket_track_id;
    public $cat_id;
    public $title;
    public $ticket_body;
    public $ticket_user;
    public $opened_time;
    public $re_open_time;
    public $re_open_by;
    public $re_open_by_type;
    public $user_type;
    public $status;
    public $assigned_on;
    public $assigned_date;
    public $last_replied_by;
    public $last_replied_by_type;
    public $last_reply_time;
    public $ticket_rating;
    public $priority;
    public $is_public;
    public $is_open_using_email;
    public $reply_counter;
    public $is_user_seen_last_reply;
    public $related_url;
    public $last_status_update_time;
    public $email_notification;
    // @ Dynamic
    public $ticket_stat;
    public $cat_obj;
    public $assigned_on_obj;
    public $tag_ids;


    /**
     * @property id,ticket_track_id,cat_id,title,ticket_body,ticket_user,opened_time,re_open_time,re_open_by,re_open_by_type,user_type,status,assigned_on,assigned_date,last_replied_by,last_replied_by_type,last_reply_time,ticket_rating,priority,is_public,is_open_using_email,reply_counter,is_user_seen_last_reply,email_notification
     */
    function __construct()
    {
        parent::__construct();
        $this->SetValidation();
        $this->tableName = "apbd_wps_ticket";
        $this->primaryKey = "id";
        $this->uniqueKey = array(array("ticket_track_id"));
        $this->multiKey = array();
        $this->autoIncField = array("id");
        $this->app_base_name = "support-genix-lite";
        $this->htmlInputField = ['ticket_body'];
    }

    public function SetFromPostData($isNew = false, $data = null)
    {
        $newData = [];

        $cat_id = absint(APBD_PostValue('cat_id', ''));
        $ticket_user = absint(APBD_PostValue('ticket_user', ''));
        $title = sanitize_text_field(APBD_PostValue('title', ''));
        $ticket_body = sanitize_text_field(APBD_PostValue('ticket_body', ''));

        $check__ticket_body = sanitize_text_field($ticket_body);

        $cat_id = strval($cat_id);
        $ticket_user = strval($ticket_user);

        if (
            (1 > strlen($title)) ||
            (1 > strlen($check__ticket_body))
        ) {
            return;
        }

        $userObj = get_user_by("id", $ticket_user);

        if (empty($userObj)) {
            return;
        }

        $newData['cat_id'] = $cat_id;
        $newData['ticket_user'] = $ticket_user;
        $newData['title'] = $title;
        $newData['ticket_body'] = $ticket_body;

        return parent::SetFromPostData($isNew, $newData);
    }

    function SetValidation()
    {
        $this->validations = array(
            "id" => array("Text" => "Id", "Rule" => "max_length[10]|integer"),
            "ticket_track_id" => array("Text" => "Ticket Track Id", "Rule" => "max_length[100]"),
            "cat_id" => array("Text" => "Cat Id", "Rule" => "max_length[11]"),
            "title" => array("Text" => "Title", "Rule" => "max_length[150]"),
            "ticket_body" => array("Text" => "Ticket Body", "Rule" => "required"),
            "ticket_user" => array("Text" => "Ticket User", "Rule" => "max_length[11]|integer"),
            "opened_time" => array("Text" => "Opened Time", "Rule" => "max_length[20]"),
            "re_open_time" => array("Text" => "Re Open Time", "Rule" => "max_length[20]"),
            "re_open_by" => array("Text" => "Re Open By", "Rule" => "max_length[10]"),
            "re_open_by_type" => array("Text" => "Re Open By Type", "Rule" => "max_length[1]"),
            "user_type" => array("Text" => "User Type", "Rule" => "max_length[1]"),
            "status" => array("Text" => "Status", "Rule" => "max_length[1]"),
            "assigned_on" => array("Text" => "Assigned On", "Rule" => "max_length[11]|integer"),
            "assigned_date" => array("Text" => "Assigned Date", "Rule" => "max_length[20]"),
            "last_replied_by" => array("Text" => "Last Replied By", "Rule" => "max_length[10]"),
            "last_replied_by_type" => array("Text" => "Last Replied By Type", "Rule" => "max_length[1]"),
            "last_reply_time" => array("Text" => "Last Reply Time", "Rule" => "max_length[20]"),
            "ticket_rating" => array("Text" => "Ticket Rating", "Rule" => "max_length[1]|numeric"),
            "priority" => array("Text" => "Priority", "Rule" => "max_length[1]"),
            "is_public" => array("Text" => "Is Public", "Rule" => "max_length[1]"),
            "is_open_using_email" => array("Text" => "Is Open Using Email", "Rule" => "max_length[1]|valid_email"),
            "reply_counter" => array("Text" => "Reply Counter", "Rule" => "max_length[10]|integer"),
            "is_user_seen_last_reply" => array("Text" => "Is User Seen Last Reply", "Rule" => "max_length[1]"),
            "related_url" => array("Text" => "Related Url", "Rule" => "max_length[255]"),
            "last_status_update_time" => array("Text" => "Last Status Update Time", "Rule" => "max_length[20]"),
            "email_notification" => array("Text" => "Email Notification", "Rule" => "max_length[1]"),
        );
    }

    public function GetPropertyRawOptions($property, $isWithSelect = false)
    {
        $returnObj = array();
        $settingsObj = Apbd_wps_settings::GetModuleInstance();
        switch ($property) {
            case "re_open_by_type":
                $returnObj = array("A" => "Staff", "U" => "Ticket User", "G" => "Guest Ticke User");
                break;
            case "user_type":
                $returnObj = array("G" => "Guest", "U" => "User", "A" => "Staff");
                break;
            case "status":
                $returnObj = array("N" => $this->__("New"), "C" => $this->__("Closed"), "P" => $this->__("In-progress"), "R" => $this->__("Re-open"), "A" => $this->__("Active"), "I" => $this->__("Inactive"), "D" => $this->__("Deleted"));
                break;
            case "last_replied_by_type":
                $returnObj = array("G" => "Guest", "U" => "User", "A" => "Staff");
                break;
            case "priority":
                $returnObj = array("L" => "Low", "M" => "Medium", "H" => "High", "U" => "Urgent");
                break;
            case "is_public":
                $returnObj = array("Y" => "Yes", "N" => "No");
                break;
            case "is_open_using_email":
                $returnObj = array("Y" => "Yes", "N" => "No");
                break;
            case "is_user_seen_last_reply":
                $returnObj = array("Y" => "Yes", "N" => "No");
                break;
            case "email_notification":
                $returnObj = array("Y" => "Yes", "N" => "No");
                break;
            default:
        }
        if ($isWithSelect) {
            return array_merge(array("" => "Select"), $returnObj);
        }
        return $returnObj;
    }

    public function GetPropertyOptionsColor($property)
    {
        $returnObj = array();
        switch ($property) {
            case "re_open_by_type":
                $returnObj = array("A" => "success", "U" => "success", "G" => "success");
                break;
            case "user_type":
                $returnObj = array("G" => "success", "U" => "success", "A" => "success");
                break;
            case "status":
                $returnObj = array("N" => "success", "C" => "success", "P" => "info", "R" => "success");
                break;
            case "last_replied_by_type":
                $returnObj = array("G" => "success", "U" => "success", "A" => "success");
                break;
            case "priority":
                $returnObj = array("L" => "success", "M" => "success", "H" => "success", "U" => "success");
                break;
            default:
        }
        return $returnObj;
    }

    public function GetPropertyOptionsIcon($property)
    {
        $returnObj = array();
        switch ($property) {
            case "re_open_by_type":
                $returnObj = array("A" => "fa fa-check-circle-o", "U" => "", "G" => "");
                break;
            case "user_type":
                $returnObj = array("G" => "", "U" => "", "A" => "fa fa-check-circle-o");
                break;
            case "status":
                $returnObj = array("N" => "", "C" => "", "P" => "fa fa-hourglass-1", "R" => "");
                break;
            case "last_replied_by_type":
                $returnObj = array("G" => "", "U" => "", "A" => "fa fa-check-circle-o");
                break;
            case "priority":
                $returnObj = array("L" => "", "M" => "", "H" => "", "U" => "");
                break;
            default:
        }
        return $returnObj;
    }

    //auto generated

    /**
     * @param $ticket_payload
     * @param $user_id
     * @param Mapbd_wps_ticket $ticketObj
     *
     * @return bool
     */
    static function create_ticket_by_payload($ticket_payload, $user_id, &$ticketObj = null, $isCheckedCustomField = false)
    {
        $ticketObj = new Mapbd_wps_ticket();
        $ticketObj->SetFromArray($ticket_payload);
        $ticketObj->ticket_user($user_id);
        $ticketObj->status('N');
        $ticketObj->reply_counter(0);
        $ticketObj->opened_time(gmdate("Y-m-d H:i:s"));
        $ticketObj->last_reply_time(gmdate("Y-m-d H:i:s"));

        return self::create_ticket($ticketObj, $ticket_payload, false, $isCheckedCustomField);
    }

    /**
     * @param Mapbd_wps_ticket $ticketObj
     * @return bool
     */
    static function create_ticket(&$ticketObj, $ticket_payload = null, $action_later = false, $isCheckedCustomField = false)
    {
        $customFields = null;
        if (! empty($ticket_payload['custom_fields'])) {
            $customFields = $ticket_payload['custom_fields'];
            if (!$isCheckedCustomField) {
                $isValidCustomField = apply_filters('apbd-wps/filter/ticket-custom-field-valid', true, $customFields);
                if (! $isValidCustomField) {
                    return false;
                }
            }
        }
        if (! empty($_FILES['attached'])) {
            if (!self::checkUploadedFiles($_FILES['attached'])) {
                return false;
            }
        }
        apply_filters('apbd-wps/filter/before-ticket-create', $ticketObj);

        if ($ticketObj->IsValidForm(true)) {
            $ticketObj->last_replied_by($ticketObj->ticket_user);
            $ticketObj->last_replied_by_type("U");
            $ticketObj->user_type("U");
            $ticketObj->email_notification("Y");
            if ($ticketObj->Save()) {
                $title = apbd_get_user_title_by_user($ticketObj->ticket_user);
                Mapbd_wps_ticket_log::AddTicketLog($ticketObj->id, $ticketObj->ticket_user, "U", $ticketObj->___("Ticket opened by %s", $title), $ticketObj->status);
                $ticketObj->ticket_track_id = apply_filters('apbd-wps/filter/display-track-id', $ticketObj->ticket_track_id);
                if (!$action_later) {
                    self::create_ticket_action($ticketObj, $customFields);
                }
                return true;
            }
        }
        do_action('apbd-wps/action/ticket-creation-failed', $ticketObj);
        return false;
    }

    static function create_ticket_action(&$ticketObj, &$customFields = null)
    {

        if (! empty($_FILES['attached'])) {
            do_action('apbd-wps/action/attach-files', $_FILES['attached'], $ticketObj);
        }
        do_action('apbd-wps/action/ticket-created', $ticketObj, $customFields);
        return true;
    }


    static function checkUploadedFiles($attach_files)
    {
        $obj = new self();
        $isAllOk = true;
        foreach ($attach_files['name'] as $ind => $name) {
            $isItemOk = true;
            $isItemOk = apply_filters('apbd-wps/filter/attached-file', $isItemOk, $name, $attach_files['error'][$ind], $attach_files['type'][$ind], $attach_files['size'][$ind]);
            if (!$isItemOk) {
                $obj->AddError("Unsupported file ($name) uploaded");
                $isAllOk = false;
            }
        }
        return $isAllOk;
    }
    static function increaseReplyCounter($ticket_id, $last_reply_id, $last_reply_type)
    {
        if (! empty($ticket_id) && ! empty($last_reply_id) && ! empty($last_reply_type)) {
            $obj = new self();
            $obj->reply_counter("reply_counter + 1", true);
            $obj->last_replied_by($last_reply_id);
            $obj->last_replied_by_type($last_reply_type);
            $obj->last_reply_time(gmdate("Y-m-d H:i:s"));
            $obj->SetWhereUpdate("id", $ticket_id);
            return $obj->Update();
        }
        return false;
    }
    function get_incremental_track_id($prefix, $track_id)
    {
        $ob = new self();
        if (! $ob->IsExists("ticket_track_id", $prefix . $track_id)) {
            return $prefix . $track_id;
        } else {
            return $this->get_incremental_track_id($prefix, $track_id + 1);
        }
    }

    function get_ticket_track_id($uid = "")
    {
        $track_id_type = apply_filters("apbd-wps/filter/track-id-type", "R");
        if ($track_id_type == "S") {
            //sequential
            $query  = "SELECT ticket_track_id as lastS from " . $this->db->prefix . $this->tableName . " WHERE ticket_track_id like 'S-%' ORDER BY id DESC LIMIT 1";
            $result = $this->db->get_row($query);
            if ($result) {
                if (! empty($result->lastS)) {
                    $a = (int) (preg_replace('/[^0-9]/', '', $result->lastS));
                    $a++;
                    return $this->get_incremental_track_id('S-', $a);
                }
            }
            return 'S-1';
        } else {
            if (empty($uid)) {
                $uid = $this->ticket_user;
            }
            if (empty($uid)) {
                return false;
            }

            return strtoupper(hash('crc32b', $uid . time() . rand(1, 9999)));
        }
    }
    static function AddTicketMeta($ticket_id, $meta_key, $meta_value)
    {
        $n = new Mapbd_wps_support_meta();
        $n->item_id($ticket_id);
        $n->item_type('T');
        $n->meta_key($meta_key);
        $n->meta_type('C');
        $n->meta_value($meta_value);
        return $n->Save();
    }
    static function DeleteTicketMeta($ticket_id, $meta_key, $meta_value)
    {
        $d = new Mapbd_wps_support_meta();
        $d->SetWhereUpdate('ticket_id', $ticket_id);
        $d->SetWhereUpdate('item_type', 'T');
        $d->SetWhereUpdate('meta_key', $meta_key);
        $d->SetWhereUpdate('meta_type', 'C');
        $d->SetWhereUpdate('meta_value', $meta_value);
        return $d->Delete();
    }

    /**
     * @param Mapbd_wps_ticket $ticket_obj
     * @param $agent_user_id
     */
    static function AssignOn(&$ticket_obj, $agent_user_id)
    {
        $n = new Mapbd_wps_ticket();
        $n->assigned_on($agent_user_id);
        $n->assigned_date(gmdate('Y-m-d H:i:s'));
        $n->SetWhereUpdate("id", $ticket_obj->id);
        if ($n->Update()) {
            $ticket_obj->assigned_on = $agent_user_id;
            do_action('apbd-wps/action/ticket-assigned', $ticket_obj);
            return true;
        }
        return false;
    }

    /**
     * @param $ticketObj
     * @param false $isForAdmin
     * @return string
     */
    static function getTicketLink($ticketObj)
    {

        $is_guest_user = get_user_meta($ticketObj->ticket_user, "is_guest", true) == "Y";
        if ($is_guest_user) {
            $encKey = Apbd_wps_settings::GetEncryptionKey();
            $encObj = Apbd_WPS_EncryptionLib::getInstance($encKey);
            $ticketResObj = new stdClass();
            $ticketResObj->ticket_id = $ticketObj->id;
            $ticketResObj->ticket_user = $ticketObj->ticket_user;
            $param = urlencode($encObj->encryptObj($ticketResObj));
            return site_url("sgnix/?p={$param}");
        }
        return self::getTicketAdminLink($ticketObj);
    }
    static function getTicketHotlink($ticketObj)
    {
        return self::getTicketLink($ticketObj);
    }
    static function getTicketAdminLink($ticketObj)
    {
        $page_id = absint(Apbd_wps_settings::GetModuleOption('ticket_page'));
        $page_link = ($page_id ? get_permalink($page_id) : false);
        $link_suffix = '#/ticket/' . $ticketObj->id;
        $ticket_link = ($page_link ? trailingslashit($page_link) . $link_suffix : trailingslashit(home_url()) . $link_suffix);
        return $ticket_link;
    }
    static function getOtherTicketLink($ticketObj)
    {
        $page_id = absint(Apbd_wps_settings::GetModuleOption('ticket_page'));
        $page_link = ($page_id ? get_permalink($page_id) : false);
        $link_suffix = '#/ticket/' . $ticketObj->id;
        $ticket_link = ($page_link ? trailingslashit($page_link) . $link_suffix : $link_suffix);
        return $ticket_link;
    }
    static function getCustomFieldsToEmailParams($ticket_id, $params = [])
    {
        $fields = Mapbd_wps_custom_field::FetchAllKeyValue('id', 'field_slug');
        $values = Mapbd_wps_support_meta::getTicketMeta($ticket_id);

        if (! empty($fields) && ! empty($values)) {
            foreach ($fields as $id => $slug) {
                if (! empty($id) && 0 < strlen($slug)) {
                    $key = "D" . $id;
                    $fkey = "custom_field__" . $slug;

                    if (isset($values[$key])) {
                        $params[$fkey] = $values[$key];
                    } else {
                        $params[$fkey] = '';
                    }
                }
            }
        }

        return $params;
    }
    /**
     * @param self $ticketObj
     */
    static function Send_ticket_open_email($ticketObj)
    {
        if (isset($ticketObj->email_notification) && ('N' === $ticketObj->email_notification)) {
            return;
        }

        $user = get_user_by("id", $ticketObj->ticket_user);

        $cat_id = absint($ticketObj->cat_id);
        $cateogry = Mapbd_wps_ticket_category::FindBy("id", $cat_id);
        $category_title = ((is_object($cateogry) && isset($cateogry->title)) ? sanitize_text_field($cateogry->title) : '');

        $ticket_link = self::getTicketLink($ticketObj);
        $ticket_hotlink = self::getTicketHotlink($ticketObj);
        $view_ticket_anchor = '<a href="' . esc_url($ticket_link) . '">' . $ticketObj->__("View Ticket") . '</a>';
        $view_ticket_hot_anchor = '<a href="' . esc_url($ticket_hotlink) . '">' . $ticketObj->__("View Ticket") . '</a>';

        $params = [];
        $params["ticket_user"] = apbd_get_user_title_by_user($user);
        $params["ticket_link"] = $ticket_link;
        $params["ticket_hotlink"] = $ticket_hotlink;
        $params["view_ticket_anchor"] = $view_ticket_anchor;
        $params["view_ticket_hot_anchor"] = $view_ticket_hot_anchor;
        $params["ticket_track_id"] = apply_filters('apbd-wps/filter/display-track-id', $ticketObj->ticket_track_id);
        $params["ticket_title"] = $ticketObj->title;
        $params["ticket_category"] = $cat_id; //Ticket category
        $params["ticket_category_id"] = $cat_id; //Ticket category id
        $params["ticket_category_title"] = $category_title; //Ticket category title
        $params["ticket_body"] = $ticketObj->ticket_body; //Ticket body
        $params["ticket_open_app_time"] = $ticketObj->opened_time; //Ticket open time in app timezone (UTC)

        $params = self::getCustomFieldsToEmailParams($ticketObj->id, $params);

        $is_guest_user = get_user_meta($ticketObj->ticket_user, "is_guest", true) == "Y";
        $isOpenByEmail = Mapbd_wps_ticket::GetTicketMeta($ticketObj->id, '_opened_by_email');
        $reply_to = '';

        if (! empty($isOpenByEmail)) {
            $mailbox_email = sanitize_email($isOpenByEmail->meta_value);
            $address_host = substr(strstr($mailbox_email, "@"), 1);

            if ("supportgenix.email" === $address_host) {
                $mailbox = Mapbd_wps_imap_api_settings::FindBy("email", $mailbox_email, array("status" => "A"));

                if (is_object($mailbox) && isset($mailbox->connected_email)) {
                    $connected_email = sanitize_email($mailbox->connected_email);

                    if (! empty($connected_email)) {
                        $reply_to = $connected_email;
                    }
                }
            } elseif ($is_guest_user) {
                $reply_to = $mailbox_email;
            }
        }

        $attached_files = [];
        if (! empty($ticketObj->id)) {
            $ticketDir = Apbd_wps_settings::get_upload_path();
            $attached_files = Mapbd_wps_email_templates::get_all_files($ticketDir . $ticketObj->id . "/attached_files/");
        }

        if (! empty($reply_to)) {
            Mapbd_wps_email_templates::SendEmailTemplates('EOT', $user->user_email, $params,  "", $reply_to, $attached_files);
        } else {
            Mapbd_wps_email_templates::SendEmailTemplates('UOT', $user->user_email, $params,  "", $reply_to, $attached_files);
        }
    }

    /**
     * @param self $ticketObj
     */
    static function Send_ticket_close_email($ticketObj)
    {
        if (isset($ticketObj->email_notification) && ('N' === $ticketObj->email_notification)) {
            return;
        }

        $user = get_user_by("id", $ticketObj->ticket_user);

        $cat_id = absint($ticketObj->cat_id);
        $cateogry = Mapbd_wps_ticket_category::FindBy("id", $cat_id);
        $category_title = ((is_object($cateogry) && isset($cateogry->title)) ? sanitize_text_field($cateogry->title) : '');

        $ticket_link = self::getTicketLink($ticketObj);
        $ticket_hotlink = self::getTicketHotlink($ticketObj);
        $view_ticket_anchor = '<a href="' . esc_url($ticket_link) . '">' . $ticketObj->__("View Ticket") . '</a>';
        $view_ticket_hot_anchor = '<a href="' . esc_url($ticket_hotlink) . '">' . $ticketObj->__("View Ticket") . '</a>';

        $params = [];
        $params["ticket_user"] = apbd_get_user_title_by_user($user);
        $params["ticket_link"] = $ticket_link;
        $params["ticket_hotlink"] = $ticket_hotlink;
        $params["view_ticket_anchor"] = $view_ticket_anchor;
        $params["view_ticket_hot_anchor"] = $view_ticket_hot_anchor;
        $params["ticket_track_id"] = apply_filters('apbd-wps/filter/display-track-id', $ticketObj->ticket_track_id);
        $params["ticket_title"] = $ticketObj->title;
        $params["ticket_category"] = $cat_id; //Ticket category
        $params["ticket_category_id"] = $cat_id; //Ticket category id
        $params["ticket_category_title"] = $category_title; //Ticket category title
        $params["ticket_body"] = $ticketObj->ticket_body; //Ticket body
        $params["ticket_open_app_time"] = $ticketObj->opened_time; //Ticket open time in app timezone (UTC)

        $params = self::getCustomFieldsToEmailParams($ticketObj->id, $params);

        $is_guest_user = get_user_meta($ticketObj->ticket_user, "is_guest", true) == "Y";
        $isOpenByEmail = Mapbd_wps_ticket::GetTicketMeta($ticketObj->id, '_opened_by_email');
        $reply_to = '';

        if (! empty($isOpenByEmail)) {
            $mailbox_email = sanitize_email($isOpenByEmail->meta_value);
            $address_host = substr(strstr($mailbox_email, "@"), 1);

            if ("supportgenix.email" === $address_host) {
                $mailbox = Mapbd_wps_imap_api_settings::FindBy("email", $mailbox_email, array("status" => "A"));

                if (is_object($mailbox) && isset($mailbox->connected_email)) {
                    $connected_email = sanitize_email($mailbox->connected_email);

                    if (! empty($connected_email)) {
                        $reply_to = $connected_email;
                    }
                }
            } elseif ($is_guest_user) {
                $reply_to = $mailbox_email;
            }
        }

        if (! empty($reply_to)) {
            Mapbd_wps_email_templates::SendEmailTemplates('ETC', $user->user_email, $params, "", $reply_to);
        } else {
            Mapbd_wps_email_templates::SendEmailTemplates('TCL', $user->user_email, $params, "", $reply_to);
        }
    }

    /**
     * @param Mapbd_wps_ticket_reply $replied_obj
     * @param self $ticketObj
     */
    static function Send_ticket_replied_email_admin($toEmail, $replied_obj, $ticketObj)
    {
        $user = get_user_by("id", $ticketObj->ticket_user);

        $cat_id = absint($ticketObj->cat_id);
        $cateogry = Mapbd_wps_ticket_category::FindBy("id", $cat_id);
        $category_title = ((is_object($cateogry) && isset($cateogry->title)) ? sanitize_text_field($cateogry->title) : '');

        $ticket_link = self::getTicketLink($ticketObj);
        $view_ticket_anchor = '<a href="' . esc_url($ticket_link) . '">' . $ticketObj->__("View Ticket") . '</a>';

        $params = [];
        $params["ticket_user"] = apbd_get_user_title_by_user($user);
        $params["ticket_link"] = $ticket_link;
        $params["view_ticket_anchor"] = $view_ticket_anchor;
        $params["ticket_track_id"] = apply_filters('apbd-wps/filter/display-track-id', $ticketObj->ticket_track_id);
        $params["ticket_title"] = $ticketObj->title;
        $params["ticket_category"] = $cat_id; //Ticket category
        $params["ticket_category_id"] = $cat_id; //Ticket category id
        $params["ticket_category_title"] = $category_title; //Ticket category title
        $params["ticket_body"] = $ticketObj->ticket_body; //Ticket body
        $params["ticket_open_app_time"] = $ticketObj->opened_time; //Ticket open time in app timezone (UTC)
        $params["ticket_replied_user"] = apbd_get_user_title_by_id($replied_obj->replied_by); //User who replied
        $params["replied_text"] = $replied_obj->reply_text; //Replied Text
        $params["ticket_status"] = $ticketObj->getTextByKey("status"); //Ticket current status
        $params["ticket_assigned_user"] = apbd_get_user_title_by_id($ticketObj->assigned_on); //Name of ticket assigned user
        $params["ticket_user"] = apbd_get_user_title_by_id($ticketObj->ticket_user); //Name of ticket user

        $params = self::getCustomFieldsToEmailParams($ticketObj->id, $params);

        $attached_files = [];
        if (! empty($replied_obj->reply_id) && ! empty($ticketObj->id)) {
            $ticketDir      = Apbd_wps_settings::get_upload_path();
            $attached_files = Mapbd_wps_email_templates::get_all_files($ticketDir . $ticketObj->id . "/replied/" . $replied_obj->reply_id);
        }
        Mapbd_wps_email_templates::SendEmailTemplates('ANR', $toEmail, $params, '', '', $attached_files);
    }

    static function Send_ticket_replied_email_user($replied_obj, $ticketObj)
    {
        if (isset($ticketObj->email_notification) && ('N' === $ticketObj->email_notification)) {
            return;
        }

        $user = get_user_by("id", $ticketObj->ticket_user);

        $cat_id = absint($ticketObj->cat_id);
        $cateogry = Mapbd_wps_ticket_category::FindBy("id", $cat_id);
        $category_title = ((is_object($cateogry) && isset($cateogry->title)) ? sanitize_text_field($cateogry->title) : '');

        $ticket_link = self::getTicketLink($ticketObj);
        $ticket_hotlink = self::getTicketHotlink($ticketObj);
        $view_ticket_anchor = '<a href="' . esc_url($ticket_link) . '">' . $ticketObj->__("View Ticket") . '</a>';
        $view_ticket_hot_anchor = '<a href="' . esc_url($ticket_hotlink) . '">' . $ticketObj->__("View Ticket") . '</a>';

        if ($user instanceof WP_User) {
            $params = [];
            $params["ticket_user"] = apbd_get_user_title_by_user($user);
            $params["ticket_link"] = $ticket_link;
            $params["ticket_hotlink"] = $ticket_hotlink;
            $params["view_ticket_anchor"] = $view_ticket_anchor;
            $params["view_ticket_hot_anchor"] = $view_ticket_hot_anchor;
            $params["ticket_track_id"] = apply_filters('apbd-wps/filter/display-track-id', $ticketObj->ticket_track_id);
            $params["ticket_title"] = $ticketObj->title;
            $params["ticket_category"] = $cat_id; //Ticket category
            $params["ticket_category_id"] = $cat_id; //Ticket category id
            $params["ticket_category_title"] = $category_title; //Ticket category title
            $params["ticket_body"] = $ticketObj->ticket_body; //Ticket body
            $params["ticket_open_app_time"] = $ticketObj->opened_time; //Ticket open time in app timezone (UTC)
            $params["ticket_replied_user"] = apbd_get_user_title_by_id($replied_obj->replied_by); //User who replied
            $params["replied_text"] = $replied_obj->reply_text; //Replied Text
            $params["ticket_status"] = $ticketObj->getTextByKey("status"); //Ticket current status
            $params["ticket_assigned_user"] = apbd_get_user_title_by_id($ticketObj->assigned_on); //Name of ticket assigned user
            $params["ticket_user"] = apbd_get_user_title_by_id($ticketObj->ticket_user); //Name of ticket user

            $params = self::getCustomFieldsToEmailParams($ticketObj->id, $params);

            $attached_files = [];
            if (! empty($replied_obj->reply_id) && ! empty($ticketObj->id)) {
                $ticketDir = Apbd_wps_settings::get_upload_path();
                $attached_files = Mapbd_wps_email_templates::get_all_files($ticketDir . $ticketObj->id . "/replied/" . $replied_obj->reply_id . "/attached_files");
            }

            $isOpenByEmail = Mapbd_wps_ticket::GetTicketMeta($ticketObj->id, '_opened_by_email');
            $reply_to = '';

            if (! empty($isOpenByEmail)) {
                $mailbox_email = sanitize_email($isOpenByEmail->meta_value);
                $address_host = substr(strstr($mailbox_email, "@"), 1);

                if ("supportgenix.email" === $address_host) {
                    $mailbox = Mapbd_wps_imap_api_settings::FindBy("email", $mailbox_email, array("status" => "A"));

                    if (is_object($mailbox) && isset($mailbox->connected_email)) {
                        $connected_email = sanitize_email($mailbox->connected_email);

                        if (! empty($connected_email)) {
                            $reply_to = $connected_email;
                        }
                    }
                } else {
                    $reply_to = $mailbox_email;
                }
            }

            if (! empty($reply_to)) {
                Mapbd_wps_email_templates::SendEmailTemplates('ETR', $user->user_email, $params, "", $reply_to, $attached_files);
            } else {
                Mapbd_wps_email_templates::SendEmailTemplates('TRR', $user->user_email, $params, "", $reply_to, $attached_files);
            }
        }
    }
    /**
     * @param self $ticketObj
     */
    static function Send_ticket_assigned_email($ticketObj)
    {
        if (empty($ticketObj->assigned_on)) {
            return;
        }
        $user = get_user_by("ID", $ticketObj->ticket_user);
        $assigned_on = get_user_by("ID", $ticketObj->assigned_on);

        $cat_id = absint($ticketObj->cat_id);
        $cateogry = Mapbd_wps_ticket_category::FindBy("id", $cat_id);
        $category_title = ((is_object($cateogry) && isset($cateogry->title)) ? sanitize_text_field($cateogry->title) : '');

        $ticket_link = self::getTicketLink($ticketObj);
        $view_ticket_anchor = '<a href="' . esc_url($ticket_link) . '">' . $ticketObj->__("View Ticket") . '</a>';

        if (! empty($assigned_on->ID)) {
            $params = [];
            $params["ticket_user"] = apbd_get_user_title_by_user($user);
            $params["ticket_link"] = $ticket_link;
            $params["view_ticket_anchor"] = $view_ticket_anchor;
            $params["ticket_track_id"] = apply_filters('apbd-wps/filter/display-track-id', $ticketObj->ticket_track_id);
            $params["ticket_title"] = $ticketObj->title;
            $params["ticket_category"] = $cat_id; //Ticket category
            $params["ticket_category_id"] = $cat_id; //Ticket category id
            $params["ticket_category_title"] = $category_title; //Ticket category title
            $params["ticket_body"] = $ticketObj->ticket_body; //Ticket body
            $params["ticket_open_app_time"] = $ticketObj->opened_time; //Ticket open time in app timezone (UTC)
            $params["ticket_assigned_user"] = apbd_get_user_title_by_user($assigned_on);

            $params = self::getCustomFieldsToEmailParams($ticketObj->id, $params);

            if (!Mapbd_wps_email_templates::SendEmailTemplates('AAT', $assigned_on->user_email, $params, $subject = "")) {
                Mapbd_wps_debug_log::AddEmailLog("Assigned Email sent failed");
            }
        }
    }

    static function Send_ticket_open_admin_notify_email($ticketObj, $notify_user_id)
    {
        if (empty($notify_user_id)) {
            return;
        }
        $user = get_user_by("id", $ticketObj->ticket_user);
        $notifiy_user = get_user_by("id", $notify_user_id);

        $cat_id = absint($ticketObj->cat_id);
        $cateogry = Mapbd_wps_ticket_category::FindBy("id", $cat_id);
        $category_title = ((is_object($cateogry) && isset($cateogry->title)) ? sanitize_text_field($cateogry->title) : '');

        $ticket_link = self::getTicketAdminLink($ticketObj);
        $view_ticket_anchor = '<a href="' . esc_url($ticket_link) . '">' . $ticketObj->__("View Ticket") . '</a>';

        if (! empty($notifiy_user->ID)) {
            $params = [];
            $params["ticket_user"] = apbd_get_user_title_by_user($user);
            $params["ticket_link"] = $ticket_link;
            $params["view_ticket_anchor"] = $view_ticket_anchor;
            $params["ticket_track_id"] = apply_filters('apbd-wps/filter/display-track-id', $ticketObj->ticket_track_id);
            $params["ticket_title"] = $ticketObj->title;
            $params["ticket_category"] = $cat_id; //Ticket category
            $params["ticket_category_id"] = $cat_id; //Ticket category id
            $params["ticket_category_title"] = $category_title; //Ticket category title
            $params["ticket_body"] = $ticketObj->ticket_body; //Ticket body
            $params["ticket_open_app_time"] = $ticketObj->opened_time; //Ticket open time in app timezone (UTC)
            $params["ticket_assigned_user"] = "";

            $params = self::getCustomFieldsToEmailParams($ticketObj->id, $params);

            if (! empty($ticketObj->assigned_on)) {
                $assigned_on = get_user_by("id", $ticketObj->assigned_on);
                if (! empty($assigned_on->ID)) {
                    $params["ticket_assigned_user"] = apbd_get_user_title_by_user($assigned_on);
                }
            }
            Mapbd_wps_email_templates::SendEmailTemplates('ANT', $notifiy_user->user_email, $params, $subject = "");
        }
    }
    /**
     * @param $ticket_id
     * @param $meta_key
     * @return Mapbd_wps_support_meta|null
     */
    static function GetTicketMeta($ticket_id, $meta_key)
    {
        $n = new Mapbd_wps_support_meta();
        $n->item_id($ticket_id);
        $n->item_type('T');
        $n->meta_key($meta_key);
        if ($n->Select()) {
            return $n;
        };
        return null;
    }
    function Save()
    {
        $this->title(sanitize_text_field($this->title));
        $this->ticket_body(wp_kses_post($this->ticket_body));
        $trackid = $this->get_ticket_track_id();
        if (! empty($trackid)) {
            $this->ticket_track_id($trackid);
        } else {
            $this->AddError("Ticket track id initialize failed");
            return false;
        }
        return parent::Save();
    }

    /**
     * The getTicketDetails is generated by appsbd
     *
     * @param mixed $ticket_id
     *
     * @return Mapbd_wps_ticket_details|null
     */
    static function getTicketDetails($ticket_id, $user_id = '')
    {
        $ticketDetailsObj = new Mapbd_wps_ticket_details();
        $ticketObj        = new Mapbd_wps_ticket();
        $ticketObj->id($ticket_id);
        if ($ticketObj->Select()) {
            if ($ticketObj->is_public != 'Y') {
                if (Apbd_wps_settings::isAgentLoggedIn()) {
                    $agent_user_id = get_current_user_id();
                    $manage_other_agents_ticket = current_user_can('manage-other-agents-ticket');
                    $manage_unassigned_ticket = current_user_can('manage-unassigned-ticket');
                    $ticket_assigned_on =  (isset($ticketObj->assigned_on) ? absint($ticketObj->assigned_on) : 0);

                    if (!$manage_other_agents_ticket && ! empty($ticket_assigned_on) && ($ticket_assigned_on !== $agent_user_id)) {
                        return null;
                    }

                    if (!$manage_unassigned_ticket && empty($ticket_assigned_on)) {
                        return null;
                    }
                }

                if (! empty($user_id) && $ticketObj->ticket_user != $user_id) {
                    return null;
                }
            }
            $ticketObj->ticket_track_id = apply_filters('apbd-wps/filter/display-track-id', $ticketObj->ticket_track_id);
            $ticketObj->opened_time = APBD_getWPDateTimeWithFormat($ticketObj->opened_time, true);
            $ticketObj->assigned_date = APBD_getWPDateTimeWithFormat($ticketObj->assigned_date, true);
            $ticketObj->last_reply_time = APBD_getWPDateTimeWithFormat($ticketObj->last_reply_time, true);
            $ticketObj->cat_obj          = Mapbd_wps_ticket_category::FindBy("id", $ticketObj->cat_id);
            $user                        = new WP_User($ticketObj->ticket_user);
            $getUser                     = new stdClass();
            $getUser->first_name         = $user->first_name;
            $getUser->last_name          = $user->last_name;
            $getUser->email              = $user->user_email;
            $getUser->display_name       = ! empty($user->display_name) ? $user->display_name : $user->user_login;
            $getUser->img                = get_user_meta($ticketObj->ticket_user, 'supportgenix_avatar', true) ? get_user_meta($ticketObj->ticket_user, 'supportgenix_avatar', true) : get_avatar_url($user->user_email);
            $ticketDetailsObj->user      = $getUser;
            $ticketDetailsObj->ticket    = $ticketObj;
            $ticketDetailsObj->cannedMsg = Mapbd_wps_canned_msg::GetAllCannedMsgBy($ticketObj);
            $reply_obj                   = new Mapbd_wps_ticket_reply();
            $reply_obj->ticket_id($ticketObj->id);
            $ticketDetailsObj->attached_files = [];
            $ticketDetailsObj->attached_files = apply_filters("apbd-wps/filter/ticket-read-attached-files", $ticketDetailsObj->attached_files, $ticketDetailsObj->ticket);
            $ticketDetailsObj->replies        = $reply_obj->SelectAllGridData('', 'reply_time', 'ASC');
            if (! empty($ticketDetailsObj->replies) && count($ticketDetailsObj->replies) > 0) {
                foreach ($ticketDetailsObj->replies as &$reply) {
                    $reply->reply_time =  APBD_getWPDateTimeWithFormat($reply->reply_time, true);
                }
            }
            if (! empty($ticketDetailsObj->replies)) {
                $logged_user = wp_get_current_user();

                if (! empty($logged_user)) {
                    if (Apbd_wps_settings::isAgentLoggedIn()) {
                        Mapbd_wps_ticket_reply::SetSeenAllReply($ticketObj->id, 'U');
                    } elseif ($logged_user->ID == $ticketObj->ticket_user) {
                        Mapbd_wps_ticket_reply::SetSeenAllReply($ticketObj->id, 'A');
                    }
                }
            }
            $ticketDetailsObj->custom_fields = apply_filters('apbd-wps/filter/ticket-custom-properties', $ticketDetailsObj->custom_fields, $ticketObj->id);
            $ticketDetailsObj->custom_fields = apply_filters('apbd-wps/filter/ticket-details-custom-properties', $ticketDetailsObj->custom_fields, $ticketObj->id);
            $ticketDetailsObj->notes         = Mapbd_wps_notes::getAllNotesBy($ticketObj->id);
            foreach ($ticketDetailsObj->replies as &$reply) {
                $reply->reply_text = wp_kses_post($reply->reply_text);
                $rep_user = new WP_User($reply->replied_by);
                $reUser = new stdClass();
                $reUser->first_name = $rep_user->first_name;
                $reUser->last_name = $rep_user->last_name;
                $reUser->display_name = ! empty($rep_user->display_name) ? $rep_user->display_name : $rep_user->user_login;
                $reUser->img = get_user_meta($rep_user->ID, 'supportgenix_avatar', true) ? get_user_meta($rep_user->ID, 'supportgenix_avatar', true) : get_avatar_url($rep_user->ID);
                $reply->reply_user = $reUser;
                $reply->attached_files = [];
                $reply->attached_files = apply_filters("apbd-wps/filter/reply-read-attached-files", $reply->attached_files, $reply);
            }
            $ticketDetailsObj->logs = Mapbd_wps_ticket_log::getAllLogsBy($ticketObj->id);
            $ticketDetailsObj->order_details = array('valid' => false);
            $ticketDetailsObj->envato_items = self::getEnvatoItems($ticketObj);
            $ticketDetailsObj->tutorlms_items = array('valid' => false);
            $ticketDetailsObj->edd_orders = array('valid' => false);
            $ticketDetailsObj->user_tickets = self::getUserTickets($ticketObj);
            $ticketDetailsObj->hotlink = '';
            return apply_filters('apbd-wps/filter/before-get-a-ticket-details', $ticketDetailsObj);
        } else {
            return null;
        }
    }

    private static function getEnvatoItems($ticketObj)
    {
        $mainObj = APBDWPSupportLite::GetInstance();
        $output = array('valid' => false);
        $env_items = array();

        $env_status = Apbd_wps_envato_system::GetModuleOption('login_status');
        $user_id = (isset($ticketObj->ticket_user) ? absint($ticketObj->ticket_user) : 0);

        if ('A' !== $env_status || empty($user_id)) {
            return $output;
        }

        $auth_data = get_user_meta($user_id, 'sglwenvato_auth', true);

        if (! is_array($auth_data) || empty($auth_data)) {
            return $output;
        }

        $output = array(
            'items' => array('<div class="envato-item-not-found">' . $mainObj->__("No items found!")  . '</a></div>'),
            'count' => 0,
            'valid' => true,
        );

        $ex_env_items = get_transient('apbd-wps-envato-items-' . $user_id);

        if (false !== $ex_env_items) {
            if (is_array($ex_env_items) && ! empty($ex_env_items)) {
                $output['items'] = self::getEnvatoItemsHtml($ex_env_items, $mainObj);
                $output['count'] = count($ex_env_items);
                $output['valid'] = true;
            }

            return $output;
        }

        $env_username = Apbd_wps_envato_system::GetModuleOption('login_username');
        $env_client_id = Apbd_wps_envato_system::GetModuleOption('login_client_id');
        $env_client_secret = Apbd_wps_envato_system::GetModuleOption('login_client_secret');

        if (empty($env_username) || empty($env_client_id) || empty($env_client_secret)) {
            return $output;
        }

        $access_token = isset($auth_data['access_token']) ? sanitize_text_field($auth_data['access_token']) : '';
        $refresh_token = isset($auth_data['refresh_token']) ? sanitize_text_field($auth_data['refresh_token']) : '';
        $updated_at = isset($auth_data['updated_at']) ? sanitize_text_field($auth_data['updated_at']) : '';
        $expires_in = isset($auth_data['expires_in']) ? absint($auth_data['expires_in']) : 3600;

        $expired_at = strtotime($updated_at) + $expires_in;
        $current_timestamp = current_time('U', true);
        $current_time = current_time('mysql', true);

        if ($current_timestamp > $expired_at) {
            $refresh_response = wp_remote_post('https://api.envato.com/token', array(
                'timeout' => 120,
                'headers' => array('Content-Type' => 'application/x-www-form-urlencoded'),
                'body' => array(
                    'grant_type' => 'refresh_token',
                    'refresh_token' => $refresh_token,
                    'client_id' => $env_client_id,
                    'client_secret' => $env_client_secret,
                ),
            ));

            $refresh_status = wp_remote_retrieve_response_code($refresh_response);

            if ($refresh_status === 200) {
                $refresh_body = wp_remote_retrieve_body($refresh_response);
                $refresh_data = json_decode($refresh_body, true);

                $access_token = isset($refresh_data['access_token']) ? sanitize_text_field($refresh_data['access_token']) : '';
                $expires_in = isset($refresh_data['expires_in']) ? absint($refresh_data['expires_in']) : 3600;

                if (! empty($access_token)) {
                    $auth_data['access_token'] = $access_token;
                    $auth_data['expires_in'] = $expires_in;
                    $auth_data['updated_at'] = $current_time;

                    update_user_meta($user_id, 'sglwenvato_auth', $auth_data);
                }
            }
        }

        $updated_at = isset($auth_data['updated_at']) ? sanitize_text_field($auth_data['updated_at']) : '';
        $expires_in = isset($auth_data['expires_in']) ? absint($auth_data['expires_in']) : 3600;
        $expired_at = strtotime($updated_at) + $expires_in;

        if ($current_timestamp > $expired_at) {
            return $output;
        }

        $purchases_response = wp_remote_get('https://api.envato.com/v3/market/buyer/list-purchases', array(
            'timeout' => 120,
            'headers' => array(
                'Authorization' => 'Bearer ' . $access_token,
            ),
        ));

        $purchases_status = wp_remote_retrieve_response_code($purchases_response);
        $saved_items = set_transient('apbd-wps-envato-items-' . $user_id, $env_items, 5 * MINUTE_IN_SECONDS);

        if ($purchases_status !== 200) {
            return $output;
        }

        $purchases_body = wp_remote_retrieve_body($purchases_response);
        $purchases_data = json_decode($purchases_body, true);

        if (! is_array($purchases_data) || empty($purchases_data)) {
            return $output;
        }

        $purchases_items = isset($purchases_data['results']) ? $purchases_data['results'] : array();

        if (! is_array($purchases_items) || empty($purchases_items)) {
            return $output;
        }

        $env_items = array_filter($purchases_items, function ($item) use ($env_username) {
            $item_data = isset($item['item']) ? $item['item'] : array();
            $author_username = isset($item_data['author_username']) ? sanitize_text_field($item_data['author_username']) : '';

            return ($env_username === $author_username);
        });

        if (empty($env_items)) {
            return $output;
        }

        $env_items = array_map(function ($item) {
            $item_data = isset($item['item']) ? $item['item'] : array();
            $item_name = isset($item_data['name']) ? sanitize_text_field($item_data['name']) : '';
            $item_url = isset($item_data['url']) ? esc_url_raw($item_data['url']) : '';
            $sold_at = isset($item['sold_at']) ? sanitize_text_field($item['sold_at']) : '';
            $license = isset($item['license']) ? sanitize_text_field($item['license']) : '';
            $supported_until = isset($item['supported_until']) ? sanitize_text_field($item['supported_until']) : '';
            $code = isset($item['code']) ? sanitize_text_field($item['code']) : '';

            return array(
                'name' => $item_name,
                'url' => $item_url,
                'sold_at' => $sold_at,
                'supported_until' => $supported_until,
                'license' => $license,
                'code' => $code,
            );
        }, $env_items);

        $saved_items = set_transient('apbd-wps-envato-items-' . $user_id, $env_items, 5 * MINUTE_IN_SECONDS);

        if ($saved_items) {
            $output['items'] = self::getEnvatoItemsHtml($env_items, $mainObj);
            $output['count'] = count($env_items);
            $output['valid'] = true;
        }

        return $output;
    }

    private static function getEnvatoItemsHtml($items, $mainObj)
    {
        return array_map(function ($item) use ($mainObj) {
            $item_name = isset($item['name']) ? sanitize_text_field($item['name']) : '';
            $item_url = isset($item['url']) ? esc_url_raw($item['url']) : '';
            $sold_at = isset($item['sold_at']) ? sanitize_text_field($item['sold_at']) : '';
            $supported_until = isset($item['supported_until']) ? sanitize_text_field($item['supported_until']) : '';
            $license = isset($item['license']) ? sanitize_text_field($item['license']) : '';
            $code = isset($item['code']) ? sanitize_text_field($item['code']) : '';

            $sold_at = (! empty($sold_at) ? APBD_getWPDateWithFormat($sold_at) : '');
            $supported_until = (! empty($supported_until) ? APBD_getWPDateWithFormat($supported_until) : '');

            $html = '';
            $html .= '<div class="envato-item-name"><a target="_blank" href="' . esc_url($item_url) . '" rel="noopener">' . esc_html($item_name) . '</a></div>';
            $html .= '<div class="envato-item-license">' . esc_html($license) . '</div>';
            $html .= '<div class="envato-item-purchased-at">' . sprintf('%1$s:<br>%2$s', $mainObj->__('Purchase'), esc_html($sold_at)) . '</div>';
            $html .= '<div class="envato-item-supported-until">' . sprintf('%1$s:<br>%2$s', $mainObj->__('Support'), esc_html($supported_until)) . '</div>';
            $html .= '<div class="envato-item-purchase-code">' . sprintf('%1$s:<br>%2$s', $mainObj->__('Purchase Code'), esc_html($code)) . '</div>';

            return $html;
        }, $items);
    }

    private static function getUserTickets($ticketObj)
    {
        $output = array('valid' => false);
        $items = array();

        $is_agent = Apbd_wps_settings::isAgentLoggedIn();
        $agent_id = get_current_user_id();

        if (! $is_agent || empty($agent_id)) {
            return $output;
        }

        $ticket_id = (isset($ticketObj->id) ? absint($ticketObj->id) : 0);
        $user_id = (isset($ticketObj->ticket_user) ? absint($ticketObj->ticket_user) : 0);

        if (empty($ticket_id) || empty($user_id)) {
            return $output;
        }

        $manage_other = current_user_can('manage-other-agents-ticket');
        $manage_unassigned = current_user_can('manage-unassigned-ticket');

        $mainobj = new Mapbd_wps_ticket();
        $mainobj->id("!={$ticket_id}", true);
        $mainobj->status("!='D'", true);
        $mainobj->ticket_user($user_id);

        if (! $manage_other && ! $manage_unassigned) {
            $mainobj->assigned_on("={$agent_id}", true);
        } elseif ($manage_other && ! $manage_unassigned) {
            $mainobj->assigned_on("NOT IN ('','0')", true);
        } elseif (! $manage_other && $manage_unassigned) {
            $mainobj->assigned_on("IN ($agent_id,'','0')", true);
        }

        $tickets = $mainobj->SelectAllGridData('id,title,status,last_replied_by_type', 'id', 'desc');

        if (! empty($tickets)) {
            $statuses = $mainobj->GetPropertyRawOptions('status');

            foreach ($tickets as $ticket) {
                $id = $ticket->id;

                $ticket_obj = Mapbd_wps_ticket::FindBy('id', $id);

                if (empty($ticket_obj)) {
                    continue;
                }

                $title = $ticket->title;
                $status = $ticket->status;
                $lrb_type = $ticket->last_replied_by_type;

                $ticket_link = Mapbd_wps_ticket::getOtherTicketLink($ticket_obj);
                $status_text = (isset($statuses[$status]) ? $statuses[$status] : $status);

                if (('C' !== $status) && ('U' === $lrb_type)) {
                    $status_text = sprintf('%1$s (%2$s)', $status_text, $mainobj->__('Need Reply'));
                }

                $html = '<div class="user-ticket-name"><a href="' . esc_url($ticket_link) . '" rel="noopener">' . esc_html($title) . '</a></div>';
                $html .= '<div class="user-ticket-status">' . esc_html($status_text) . '</div>';

                $items[] = $html;
            }

            $output['items'] = $items;
            $output['count'] = count($items);
            $output['valid'] = true;
        }

        return $output;
    }

    static function getTicketStat($src_by = [])
    {
        global $wpdb;
        $whereCondition = "";
        $id = get_current_user_id();
        if (Apbd_wps_settings::isClientLoggedIn()) {
            $whereCondition = " WHERE t.ticket_user='{$id}'";
        }
        $mainobj = new Mapbd_wps_ticket();
        $responseData = [];
        $src_condition = "";
        $join_condition = "";
        $aps_user = new Mapbd_wps_users();
        $aps_support_meta = new Mapbd_wps_support_meta();
        $ticket_table = "{$wpdb->prefix}apbd_wps_ticket";
        $tableName = $mainobj->GetTableName();
        $userTableName = $aps_user->GetTableName();
        $metaTableName = $aps_support_meta->GetTableName();

        $is_agent_logged_in = Apbd_wps_settings::isAgentLoggedIn();
        $filter_assigned_on = 0;

        if (! empty($src_by)) {
            foreach ($src_by as $src_item) {
                $src_item['prop'] = preg_replace('#[^a-z0-9@ _\-\.\*]#i', "", $src_item['prop']);
                $src_item['val']  = preg_replace('#[^a-z0-9@ _\-\.]#i', "", $src_item['val']);
                if (! empty($src_item['val'])) {
                    if (('assigned_on' === $src_item['prop']) && $is_agent_logged_in) {
                        $filter_assigned_on = absint($src_item['val']);
                        continue;
                    }

                    if ($src_item['prop'] == '*') {
                        if ($src_item['opr'] == 'like') {
                            $prop_like_str = "like '%" . $src_item['val'] . "%'";

                            $src_by_query = "";
                            $src_by_query .= " OR (t.title $prop_like_str)";
                            $src_by_query .= " OR (t.ticket_body $prop_like_str)";
                            $src_by_query .= " OR ($userTableName.user_email $prop_like_str)";
                            $src_by_query .= " OR ($userTableName.display_name $prop_like_str)";

                            $meta_item_str = "SELECT GROUP_CONCAT(item_id) AS item_ids FROM {$metaTableName} WHERE item_type='T' AND meta_type<>'C' AND meta_value $prop_like_str";
                            $meta_item_rlt = $aps_support_meta->SelectQuery($meta_item_str);
                            $meta_item_ids = implode(",", array_unique(array_map('absint', explode(",", strval($meta_item_rlt[0]->item_ids)))));

                            if (! empty($meta_item_ids)) {
                                $src_by_query .= " OR (t.id IN ($meta_item_ids))";
                            }

                            $src_condition .= (! empty($src_condition) ? ' AND ' : '') . "(ticket_track_id $prop_like_str" . $src_by_query . ")";
                        }
                    } else {
                        if ($src_item['opr'] == 'like') {
                            $src_condition .= (! empty($src_condition) ? ' AND ' : '') . $src_item['prop'] . " like '%" . $src_item['val'] . "%'";
                        } else {
                            $src_condition .= (! empty($src_condition) ? ' AND ' : '') . $src_item['prop'] . " = '" . $src_item['val'] . "'";
                        }
                    }
                }
            }
            if (! empty($src_condition)) {
                $join_condition = "LEFT JOIN $userTableName ON {$userTableName}.ID=t.ticket_user";
                $whereCondition .= (! empty($whereCondition) ? ' AND ' : ' WHERE ') . $src_condition;
            }
        }

        if ($is_agent_logged_in) {
            $manage_other_agents_ticket = current_user_can('manage-other-agents-ticket');
            $manage_unassigned_ticket = current_user_can('manage-unassigned-ticket');
            $assigned_on_condition = "";

            if (! $manage_other_agents_ticket && ! $manage_unassigned_ticket) {
                $assigned_on_condition = "`assigned_on`={$id}";
            } elseif ($manage_other_agents_ticket && ! $manage_unassigned_ticket) {
                if ($filter_assigned_on) {
                    $assigned_on_condition = "`assigned_on`={$filter_assigned_on}";
                } else {
                    $assigned_on_condition = "`assigned_on` NOT IN ('','0')";
                }
            } elseif (! $manage_other_agents_ticket && $manage_unassigned_ticket) {
                $assigned_on_condition = "`assigned_on` IN ($id,'','0')";
            } elseif ($filter_assigned_on) {
                $assigned_on_condition = "`assigned_on`={$filter_assigned_on}";
            }

            if ($assigned_on_condition) {
                $whereCondition .= (! empty($whereCondition) ? ' AND ' : ' WHERE ') . $assigned_on_condition;
            }
        }

        $statusList = $mainobj->GetPropertyRawOptions('status');
        $query = "SELECT `status`,count(*) total FROM  {$ticket_table} as t {$join_condition} {$whereCondition} GROUP BY `status`";
        $dbData = $mainobj->SelectQuery($query);
        foreach ($statusList as $key => $title) {
            $responseData[$key] = 0;
        }
        $total = 0;
        foreach ($dbData as $stat) {
            if ($stat->status != "D") {
                $total += (int)$stat->total;
            }
            if (in_array($stat->status, ['A', 'N', 'P', 'R'])) {
                $responseData['A'] += (int)$stat->total;
            } else {
                $responseData[$stat->status] = (int)$stat->total;
            }
        }
        $responseData['T'] = $total;
        $publicTicket = new Mapbd_wps_ticket();
        self::setSearchBy($publicTicket, $src_by);
        $publicTicket->is_public('Y');
        $responseData['PUB'] = (int)$publicTicket->CountALL();

        $publicTicket = new Mapbd_wps_ticket();
        self::setSearchBy($publicTicket, $src_by);
        $publicTicket->assigned_on($id);
        $publicTicket->status("in ('A','N','R','P')", true);
        $responseData['MY'] = (int)$publicTicket->CountALL();

        unset($responseData['N']);
        unset($responseData['P']);
        unset($responseData['R']);
        return $responseData;
    }
    private static function setSearchBy(&$mainobj, $src_by)
    {
        if (! empty($src_by)) {
            $aps_user = new Mapbd_wps_users();
            $aps_support_meta = new Mapbd_wps_support_meta();

            $mainobj->Join($aps_user, "ID", "ticket_user", "LEFT");

            $tableName = $mainobj->GetTableName();
            $userTableName = $aps_user->GetTableName();
            $metaTableName = $aps_support_meta->GetTableName();

            foreach ($src_by as $src_item) {
                $src_item['prop'] = preg_replace('#[^a-z0-9@ _\-\.\*]#i', "", $src_item['prop']);
                $src_item['val'] = preg_replace('#[^a-z0-9@ _\-\.]#i', "", $src_item['val']);
                if (! empty($src_item['val'])) {
                    if ($src_item['prop'] == '*') {
                        if ($src_item['opr'] == 'like') {
                            $prop_like_str = "like '%" . $src_item['val'] . "%'";

                            $src_by_query = "";
                            $src_by_query .= " OR ($tableName.title $prop_like_str)";
                            $src_by_query .= " OR ($tableName.ticket_body $prop_like_str)";
                            $src_by_query .= " OR ($userTableName.user_email $prop_like_str)";
                            $src_by_query .= " OR ($userTableName.display_name $prop_like_str)";

                            $meta_item_str = "SELECT GROUP_CONCAT(item_id) AS item_ids FROM {$metaTableName} WHERE item_type='T' AND meta_type<>'C' AND meta_value $prop_like_str";
                            $meta_item_rlt = $aps_support_meta->SelectQuery($meta_item_str);
                            $meta_item_ids = implode(",", array_unique(array_map('absint', explode(",", strval($meta_item_rlt[0]->item_ids)))));

                            if (! empty($meta_item_ids)) {
                                $src_by_query .= " OR ($tableName.id IN ($meta_item_ids))";
                            }

                            $mainobj->ticket_track_id($prop_like_str . $src_by_query, true);
                        }
                    } else {
                        if ($src_item['opr'] == 'like') {
                            $mainobj->{$src_item['prop']}("like '%" . $src_item['val'] . "%'", true);
                        } else {
                            $mainobj->{$src_item['prop']}($src_item['val']);
                        }
                    }
                }
            }
        }
    }

    /**
     * From version 1.1.0
     */
    static function UpdateDBTable()
    {
        $thisObj = new static();
        $table = $thisObj->db->prefix . $thisObj->tableName;

        if ($thisObj->db->get_var("show tables like '{$table}'") == $table) {
            $sql = "ALTER TABLE `{$table}` MODIFY `assigned_on` char(11)";
            $thisObj->db->query($sql);
        }
    }

    /**
     * From version 1.1.2
     */
    static function UpdateDBTableCharset()
    {
        $thisObj = new static();
        $table_name = $thisObj->db->prefix . $thisObj->tableName;
        $charset = $thisObj->db->charset;
        $collate = $thisObj->db->collate;

        $alter_query = "ALTER TABLE `{$table_name}` CONVERT TO CHARACTER SET {$charset} COLLATE {$collate}";

        $thisObj->db->query($alter_query);
    }

    /**
     * From version 1.3.5
     */
    static function UpdateDBTable2()
    {
        self::DBColumnAddOrModify('email_notification', 'char', 1, "'Y'", 'NOT NULL', '', 'bool(Y=Yes,N=No)');
    }

    static function CreateDBTable()
    {
        $thisObj = new static();
        $table = $thisObj->db->prefix . $thisObj->tableName;
        $charsetCollate = $thisObj->db->has_cap('collation') ? $thisObj->db->get_charset_collate() : '';

        if ($thisObj->db->get_var("show tables like '{$table}'") != $table) {
            $sql = "CREATE TABLE `{$table}` (
                      `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
                      `ticket_track_id` char(18) NOT NULL,
                      `cat_id` char(11) NOT NULL DEFAULT '0',
                      `title` char(150) NOT NULL DEFAULT '',
                      `ticket_body` text NOT NULL COMMENT 'textarea',
                      `ticket_user` int(11) NOT NULL DEFAULT 0,
                      `opened_time` timestamp NOT NULL DEFAULT current_timestamp(),
                      `re_open_time` timestamp NULL DEFAULT NULL,
                      `re_open_by` char(10) NOT NULL DEFAULT '',
                      `re_open_by_type` char(1) NOT NULL DEFAULT '' COMMENT 'radio(A=Staff,U=Ticket User,G=Guest Ticket User)',
                      `user_type` char(1) NOT NULL DEFAULT 'U' COMMENT 'radio(G=Guest,U=User,A=Staff)',
                      `status` char(1) NOT NULL DEFAULT 'N' COMMENT 'drop(N=New,C=Closed,P=In-progress,R=Re-open,A=Active,I=Inactive,D=Deleted)',
                      `assigned_on` char(11) NOT NULL DEFAULT '',
                      `assigned_date` timestamp NULL DEFAULT NULL,
                      `last_replied_by` char(10) NOT NULL DEFAULT '',
                      `last_replied_by_type` char(1) NOT NULL DEFAULT '' COMMENT 'radio(G=Guest,U=User,A=Staff)',
                      `last_reply_time` timestamp NULL DEFAULT NULL,
                      `ticket_rating` decimal(1,0) unsigned NOT NULL DEFAULT 0,
                      `priority` char(1) NOT NULL DEFAULT 'L' COMMENT 'drop(L=Low,M=Medium,H=High,U=Urgent)',
                      `is_public` char(1) NOT NULL DEFAULT 'N' COMMENT 'bool(Y=Yes,N=No)',
                      `is_open_using_email` char(1) NOT NULL DEFAULT 'N' COMMENT 'bool(Y=Yes,N=No)',
                      `reply_counter` int(10) unsigned NOT NULL DEFAULT 0,
                      `is_user_seen_last_reply` char(1) NOT NULL DEFAULT 'N' COMMENT 'bool(Y=Yes,N=No)',
                      `related_url` char(255) NOT NULL DEFAULT '',
                      `last_status_update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
                      `email_notification` char(1) NOT NULL DEFAULT 'Y' COMMENT 'bool(Y=Yes,N=No)',
                      PRIMARY KEY (`id`) USING BTREE,
                      UNIQUE KEY `ticket_track_id` (`ticket_track_id`) USING BTREE
                    ) $charsetCollate;";
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql);
        }
    }
    function DropDBTable()
    {
        global $wpdb;

        $table_name = $wpdb->prefix . $this->tableName;
        $sql        = "DROP TABLE IF EXISTS $table_name;";
        $wpdb->query($sql);
    }
    static function DeleteByID($id)
    {
        if (parent::DeleteByKeyValue("id", $id)) {
            Mapbd_wps_ticket_reply::DeleteByTicketID($id);
            return true;
        } else {
            return false;
        }
    }
}
